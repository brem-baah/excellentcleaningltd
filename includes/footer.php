</main>
<footer class="footer">
  <div class="wrap footer-grid">
    <div class="footer-col brand-col">
      <a class="brand light" href="<?= h($url()) ?>">
        <?= logo($logo) ?>
        <span>Excellent Cleaning<small><?= h($site['tag']) ?></small></span>
      </a>
      <p class="footer-desc">Professional domestic, commercial and post-construction cleaning services across Rugby, Coventry and Warwickshire.</p>
    </div>
    
    <div class="footer-col">
      <h3>Quick Links</h3>
      <ul class="footer-links">
        <li><a href="<?= h($url()) ?>">Home</a></li>
        <li><a href="<?= h($url('services')) ?>">Services</a></li>
        <li><a href="<?= h($url('about')) ?>">About Us</a></li>
        <li><a href="<?= h($url('contact')) ?>">Contact &amp; Booking</a></li>
        <li><button type="button" class="link-btn" data-quote>Get a Free Quote</button></li>
      </ul>
    </div>
    
    <div class="footer-col">
      <h3>Cleaning Services</h3>
      <ul class="footer-links">
        <?php foreach(array_slice($services, 0, 5) as $s): ?>
          <li><a href="<?= h($url('services#'.$s['slug'])) ?>"><?= h($s['title']) ?></a></li>
        <?php endforeach; ?>
        <li><a href="<?= h($url('services')) ?>" class="more-link">View all 7 services &rarr;</a></li>
      </ul>
    </div>
    
    <div class="footer-col">
      <h3>Get in Touch</h3>
      <p class="contact-line">
        <strong>Telephone:</strong><br>
        <a href="tel:<?= h($site['telraw']) ?>"><?= h($site['tel']) ?></a>
      </p>
      <p class="contact-line">
        <strong>Email Enquiries:</strong><br>
        <a href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?></a>
      </p>
      <p class="contact-line">
        <strong>Primary Coverage:</strong><br>
        <span><?= h($site['areas']) ?></span>
      </p>
      <p class="contact-line reg-office">
        <strong>Registered Office:</strong><br>
        <small><?= h($site['addr']) ?></small>
      </p>
    </div>
  </div>
  
  <div class="wrap legal-bar">
    <div class="legal-copy">
      &copy; <?= date('Y') ?> <?= h($site['name']) ?>. All rights reserved.
    </div>
    <div class="legal-links">
      <a href="<?= h($url('privacy')) ?>">Privacy Policy</a>
      <span>&bull;</span>
      <a href="<?= h($url('terms')) ?>">Terms of Service</a>
      <span>&bull;</span>
      <a href="<?= h($url('sitemap.xml')) ?>">Sitemap</a>
    </div>
    <div class="legal-credit">
      Built by <a href="https://engineerbaah.com" target="_blank" rel="noopener">Engineer Baah</a>
    </div>
  </div>
</footer>

<!-- WhatsApp Floating Button -->
<a class="wa-float" href="https://wa.me/<?= $site['wa'] ?>?text=<?= rawurlencode('Hello Excellent Cleaning Ltd, I would like to enquire about a cleaning quote.') ?>" target="_blank" rel="noopener" aria-label="Chat with our team on WhatsApp">
  <span class="wa-tooltip">Quick WhatsApp Quote</span>
  <svg viewBox="0 0 24 24" width="28" height="28" fill="#fff" aria-hidden="true">
    <path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm4.8 13.5c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-3-.7-2.5-1.1-4.1-3.6-4.2-3.8-.1-.2-1-1.3-1-2.5s.6-1.8.9-2c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .5.4l.8 1.8c.1.2.1.3 0 .5l-.4.5c-.1.1-.3.3-.1.5.5.9 1.2 1.7 2.2 2.2.2.1.4.1.5-.1l.7-.9c.2-.2.3-.2.5-.1l1.7.8c.2.1.4.2.4.3.1.2.1.7-.1 1.2Z"/>
  </svg>
</a>

<?php include __DIR__.'/quote-modal.php'; ?>
<script>
window.ECL = {
  wa: "<?= $site['wa'] ?>",
  tel: "<?= $site['telraw'] ?>"
};
</script>
<script src="<?= h($url('js/script.js')) ?>?v=<?= filemtime(__DIR__.'/../js/script.js') ?>" defer></script>
</body>
</html>