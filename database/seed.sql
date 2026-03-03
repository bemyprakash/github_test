INSERT INTO categories (name, slug, description) VALUES
('Heritage Collection', 'heritage-collection', 'Timeless handcrafted flagship pieces'),
('Premium Daily Use', 'premium-daily-use', 'Premium products for everyday elegance'),
('Festive Specials', 'festive-specials', 'Celebration-ready collections');

INSERT INTO products (category_id, name, slug, sku, short_description, description, specifications, price, stock_quantity, is_featured, status)
VALUES
(1, 'Emerald Heritage Trunk', 'emerald-heritage-trunk', 'APC-HR-101', 'Vintage handcrafted trunk.', 'A signature display and storage trunk inspired by 1928 catalog designs.', 'Material: Teakwood; Finish: Hand polished; Weight: 1.8kg', 4899.00, 14, 1, 'active'),
(2, '1928 Signature Brass Set', '1928-signature-brass-set', 'APC-BR-102', 'Premium engraved brass set.', 'Daily utility brass set with anti-tarnish coating and legacy patterning.', 'Material: Brass; Pieces: 4; Care: Dry cloth', 2699.00, 28, 1, 'active'),
(2, 'Royal Mint Serving Platter', 'royal-mint-serving-platter', 'APC-MT-103', 'Festive premium serving platter.', 'Elegant mint-enamel platter for premium dining and gifting.', 'Material: Alloy + enamel; Diameter: 14 inch', 3299.00, 9, 1, 'active'),
(1, 'Prakash Legacy Gift Chest', 'prakash-legacy-gift-chest', 'APC-GC-104', 'Premium gift chest.', 'Large handcrafted chest designed for milestone gifting.', 'Material: Wood + brass; Locking: Yes', 5599.00, 7, 1, 'active');

INSERT INTO product_images (product_id, image_path, sort_order, is_primary) VALUES
(1, '/public/assets/images/products/emerald-trunk.svg', 1, 1),
(2, '/public/assets/images/products/brass-set.svg', 1, 1),
(3, '/public/assets/images/products/mint-platter.svg', 1, 1),
(4, '/public/assets/images/products/gift-chest.svg', 1, 1);

INSERT INTO users (name, email, password_hash, role) VALUES
('Admin User', 'admin@aprakashco.com', '$2y$10$K2nP9Vc4I9Q2fem2Iy6v8ehYwW3GgB0TlFC3z3f9rBVvW0D3QmGz2', 'admin');
