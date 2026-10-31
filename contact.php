<?php 
$page = 'contact'; 
$title = 'Contact Excellent Cleaning Ltd | Free Quotes in Rugby & Coventry'; 
$desc = 'Contact Excellent Cleaning Ltd for cleaning services in Rugby, Coventry & Warwickshire. Call, WhatsApp, or request an instant free online quote.'; 
include 'includes/header.php'; 
?>

<section class="pagehead">
  <div class="glow g1"></div>
  <div class="wrap">
    <span class="pill-badge">Fast &amp; Responsive Support</span>
    <h1>Contact Our Team</h1>
    <p class="lead">Have a question or need an urgent cleaning quote? Choose the quickest channel to reach us.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap two contact-wrap">
    <!-- Left: Direct Booking Form on Page -->
    <div class="contact-form-panel">
      <h2>Send Us a Message or Quote Request</h2>
      <p class="muted">Fill out this quick form and we will get back to you with pricing and available dates.</p>
      
      <form id="page-contact-form" method="post" action="<?= h($url('send-mail.php')) ?>" class="styled-form" novalidate>
        <label>
          <span>Full Name <b class="req">*</b></span>
          <input name="name" required autocomplete="name" placeholder="Your full name">
        </label>
        
        <div class="row2">
          <label>
            <span>Email Address <b class="req">*</b></span>
            <input type="email" name="email" required autocomplete="email" placeholder="name@example.com">
          </label>
          <label>
            <span>Phone Number <b class="req">*</b></span>
            <input type="tel" name="phone" required autocomplete="tel" placeholder="07123 456789">
          </label>
        </div>

        <div class="row2">
          <label>
            <span>Service Required <b class="req">*</b></span>
            <select name="service" required>
              <option value="">Select a service</option>
              <?php foreach($services as $s): ?>
                <option value="<?= h($s['title']) ?>"><?= h($s['title']) ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <label>
            <span>Postcode or Town <b class="req">*</b></span>
            <input name="postcode" required autocomplete="postal-code" placeholder="e.g. CV21 3HN">
          </label>
        </div>

        <label>
          <span>Cleaning Details &amp; Preferred Timeframe <b class="req">*</b></span>
          <textarea name="details" rows="4" required placeholder="Tell us about the property, rooms to clean, frequency, preferred dates or any specific requirements..."></textarea>
        </label>

        <!-- Honeypot -->
        <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">

        <div id="page-form-status" role="status" aria-live="polite"></div>

        <div class="actions">
          <button class="btn btn-primary" type="submit">Submit Request</button>
          <a class="btn btn-wa" target="_blank" rel="noopener" href="https://wa.me/<?= $site['wa'] ?>?text=<?= rawurlencode('Hello Excellent Cleaning Ltd, I would like to enquire about a cleaning quote.') ?>">
            Message on WhatsApp
          </a>
        </div>
      </form>
    </div>

    <!-- Right: Channels & Details -->
    <aside class="contact-channels">
      <div class="channel-card">
        <div class="chan-icon wa"><svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm4.8 13.5c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-3-.7-2.5-1.1-4.1-3.6-4.2-3.8-.1-.2-1-1.3-1-2.5s.6-1.8.9-2c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .5.4l.8 1.8c.1.2.1.3 0 .5l-.4.5c-.1.1-.3.3-.1.5.5.9 1.2 1.7 2.2 2.2.2.1.4.1.5-.1l.7-.9c.2-.2.3-.2.5-.1l1.7.8c.2.1.4.2.4.3.1.2.1.7-.1 1.2Z"/></svg></div>
        <div>
          <h4>WhatsApp Instant Chat</h4>
          <p>The fastest way to send property photos, get instant quotes, and confirm dates.</p>
          <a class="chan-link" target="_blank" rel="noopener" href="https://wa.me/<?= $site['wa'] ?>">Open WhatsApp Chat &rarr;</a>
        </div>
      </div>

      <div class="channel-card">
        <div class="chan-icon phone"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
        <div>
          <h4>Direct Phone Call</h4>
          <p>Speak directly with our team to discuss your cleaning schedule or commercial contract.</p>
          <a class="chan-link" href="tel:<?= h($site['telraw']) ?>"><?= h($site['tel']) ?> &rarr;</a>
        </div>
      </div>

      <div class="channel-card">
        <div class="chan-icon email"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
        <div>
          <h4>Email Enquiries</h4>
          <p>Send specification sheets, tenancy checklists, or architectural drawings.</p>
          <a class="chan-link" href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?> &rarr;</a>
        </div>
      </div>

      <div class="box contact-meta-box">
        <h3>Operational Details</h3>
        <dl>

          <dt>Registered Office</dt>
          <dd><?= h($site['addr']) ?></dd>

          <dt>Key Coverage Area</dt>
          <dd><?= h($site['areas']) ?></dd>
        </dl>
      </div>
    </aside>
  </div>
</section>

<?php include 'includes/footer.php'; ?>