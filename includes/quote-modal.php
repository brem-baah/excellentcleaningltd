<dialog id="quote" aria-labelledby="qt" aria-modal="true">
  <form id="quote-form" method="post" action="<?= h($url('send-mail.php')) ?>" novalidate>
    <button type="button" class="x" data-close aria-label="Close modal">
      <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="modal-badge"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Free quote</div>
    <h2 id="qt">Request Your Free Cleaning Quote</h2>
    <p class="muted">Tell us about the job and we will get back to you with a quote.</p>
    
    <label>
      <span>Full Name <b class="req">*</b></span>
      <input name="name" required autocomplete="name" placeholder="e.g. Sarah Jenkins">
    </label>
    
    <div class="row2">
      <label>
        <span>Email Address <b class="req">*</b></span>
        <input type="email" name="email" required autocomplete="email" placeholder="sarah@example.co.uk">
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
          <option value="">Choose a service</option>
          <?php foreach($services as $s): ?>
            <option value="<?= h($s['title']) ?>"><?= h($s['title']) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <label>
        <span>Postcode or Town <b class="req">*</b></span>
        <input name="postcode" required autocomplete="postal-code" placeholder="e.g. CV21 2DN / Rugby">
      </label>
    </div>

    <label>
      <span>Preferred Date / Frequency</span>
      <input type="text" name="preferred_date" placeholder="e.g. Next Tuesday / Weekly">
    </label>
    
    <label>
      <span>Job Details & Special Instructions <b class="req">*</b></span>
      <textarea name="details" rows="3" required placeholder="Tell us about the property: number of bedrooms, bathrooms, condition, parking, or special requirements..."></textarea>
    </label>
    
    <!-- Honeypot -->
    <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
    
    <div id="form-status" role="status" aria-live="polite"></div>
    
    <div class="actions modal-actions">
      <button class="btn btn-primary" type="submit">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        Send Quote Request
      </button>
      <button class="btn btn-wa" type="button" data-wa-form>
        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm4.8 13.5c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-3-.7-2.5-1.1-4.1-3.6-4.2-3.8-.1-.2-1-1.3-1-2.5s.6-1.8.9-2c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .5.4l.8 1.8c.1.2.1.3 0 .5l-.4.5c-.1.1-.3.3-.1.5.5.9 1.2 1.7 2.2 2.2.2.1.4.1.5-.1l.7-.9c.2-.2.3-.2.5-.1l1.7.8c.2.1.4.2.4.3.1.2.1.7-.1 1.2Z"/></svg>
        Chat on WhatsApp
      </button>
    </div>
    <div class="modal-trust-note">
      <small>🔒 Your details are used only to respond to your enquiry.</small>
    </div>
  </form>
</dialog>