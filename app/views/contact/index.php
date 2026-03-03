<h1>Contact A. Prakash & Co.</h1>
<div class="product-grid">
    <section class="card-block">
        <p><strong>Address:</strong> 11 Heritage Bazaar, Jaipur, Rajasthan</p>
        <p><strong>Phone:</strong> +91 90000 00000</p>
        <p><strong>Email:</strong> hello@aprakashco.com</p>
        <p><strong>Hours:</strong> Mon-Sat · 10:00 AM - 7:00 PM</p>
    </section>
    <section class="card-block">
        <form method="post" action="/contact">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input name="name" required placeholder="Name">
            <input name="email" type="email" required placeholder="Email">
            <textarea name="message" required placeholder="Message"></textarea>
            <button type="submit">Send Enquiry</button>
        </form>
    </section>
</div>
<iframe title="map" loading="lazy" src="https://maps.google.com/maps?q=jaipur&t=&z=13&ie=UTF8&iwloc=&output=embed" style="width:100%;height:260px;border:0;border-radius:12px;margin-top:1rem"></iframe>
