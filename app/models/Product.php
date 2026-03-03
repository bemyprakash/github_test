<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    public function featured(int $limit = 8): array
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE is_featured = 1 AND status = "active" ORDER BY created_at DESC LIMIT :limit');
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function paginated(array $filters, int $page = 1, int $perPage = 12): array
    {
        $offset = ($page - 1) * $perPage;
        $sql = 'SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON c.id = p.category_id WHERE p.status = "active"';
        $params = [];

        if (!empty($filters['search'])) {
            $sql .= ' AND p.name LIKE :search';
            $params[':search'] = '%' . $filters['search'] . '%';
        }

        if (!empty($filters['category'])) {
            $sql .= ' AND c.slug = :category';
            $params[':category'] = $filters['category'];
        }

        $orderBy = match ($filters['sort'] ?? '') {
            'price_asc' => 'p.price ASC',
            'price_desc' => 'p.price DESC',
            'popular' => 'p.popularity_score DESC',
            default => 'p.created_at DESC',
        };

        $sql .= " ORDER BY {$orderBy} LIMIT :per_page OFFSET :offset";
        $stmt = $this->db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':per_page', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE slug = :slug LIMIT 1');
        $stmt->execute([':slug' => $slug]);
        $product = $stmt->fetch();

        return $product ?: null;
    }

    public function related(int $categoryId, int $excludeId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE category_id = :category_id AND id != :exclude_id AND status = "active" LIMIT 4');
        $stmt->execute([':category_id' => $categoryId, ':exclude_id' => $excludeId]);

        return $stmt->fetchAll();
    }
}
