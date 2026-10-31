<?php 
$page = 'about'; 
$title = 'About Excellent Cleaning Ltd | Rugby, Coventry & Warwickshire Cleaners'; 
$desc = 'Learn about Excellent Cleaning Ltd, established under Mrs. Vicker Agyenkwa. Built on dependability and clear communication.'; 
include 'includes/header.php'; 
?>

<section class="pagehead">
  <div class="glow g1"></div>
  <div class="wrap">
    <span class="pill-badge">Our Story &amp; Standards</span>
    <h1>About Excellent Cleaning Ltd</h1>
    <p class="lead">A cleaning company built on an honest promise: we turn up on schedule, treat your space with meticulous care, and don't cut corners.</p>
  </div>
</section>

<!-- Story Section -->
<section class="sec">
  <div class="wrap">
    <div class="about-story-hero">
      <div class="about-story-copy">
        <h2>Dependable cleaning you can truly rely on.</h2>
        <p class="lead-p">Excellent Cleaning Ltd was established in 2026 under CEO Mrs. Vicker Agyenkwa, born out of a clear observation in the Midlands cleaning sector: too many cleaning services are inconsistent, difficult to reach, or lack accountability.</p>
        <p>We built Excellent Cleaning Ltd around a different culture. Whether we are cleaning a 1-bedroom flat in Rugby, handling an urgent end-of-tenancy reset in Coventry, or maintaining a multi-storey office complex in Warwickshire, our team approaches every property with the same rigor and dedication.</p>
      </div>
      <div class="about-story-media">
        <img src="<?= h($asset('images/about.jpg')) ?>" alt="Excellent Cleaning Ltd - Dependable Midlands Cleaning Services" class="about-img" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<!-- Core Commitments Section -->
<section class="sec tint">
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge">Our Pillars</span>
      <h2>Our Core Commitments to Every Client</h2>
      <p>Built on dependability, clear communication, and meticulous care across every single clean.</p>
    </div>
    <div class="values-grid values-grid-4">
        <div class="value-item">
          <div class="val-icon">1</div>
          <div>
            <h4>Punctual &amp; Reliable</h4>
            <p>We respect your busy schedule. We arrive on time, fully prepared with equipment, and get the job done efficiently.</p>
          </div>
        </div>
        
        <div class="value-item">
          <div class="val-icon">2</div>
          <div>
            <h4>Clear Communication</h4>
<p>We keep you updated by phone, email or WhatsApp, whichever you prefer.</p>
          </div>
        </div>

        <div class="value-item">
          <div class="val-icon">3</div>
          <div>
            <h4>Every Size of Job</h4>
<p>From quick tidy-ups to full deep cleans, for homes, offices, warehouses and building sites.</p>
          </div>
        </div>

        <div class="value-item">
          <div class="val-icon">4</div>
          <div>
            <h4>Local Coverage</h4>
<p>Based around Rugby, Coventry and Warwickshire, so we can get to you quickly.</p>
          </div>
        </div>
    </div>
  </div>
</section>

<!-- Credentials & Coverage Area Section -->
<section class="sec">
  <div class="wrap">
    <div class="about-info-grid">
      <div class="box info-card">
        <span class="cat-pill">Verified Business</span>
        <h3>Company Credentials</h3>
        <dl>
          <dt>Company Legal Name</dt>
          <dd>Excellent Cleaning Ltd</dd>

          <dt>Founded</dt>
          <dd>2026</dd>

          <dt>CEO</dt>
          <dd>Mrs. Vicker Agyenkwa</dd>

          <dt>Registered Office</dt>
          <dd><?= h($site['addr']) ?></dd>

          <dt>Primary Service Base</dt>
          <dd><?= h($site['areas']) ?></dd>

          <dt>Customer Enquiries</dt>
          <dd><a href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?></a></dd>
        </dl>
      </div>

      <div class="box info-card areas-box">
        <span class="cat-pill">Service Network</span>
        <h3>Key Areas We Serve</h3>
        <p class="areas-sub">Full domestic and commercial service coverage across central Warwickshire &amp; Coventry:</p>
        <ul class="areas-list">
          <li><strong>Rugby:</strong> CV21, CV22, CV23</li>
          <li><strong>Coventry:</strong> CV1 through CV6</li>
          <li><strong>Warwick &amp; Leamington Spa:</strong> CV31, CV32, CV34</li>
          <li><strong>Kenilworth &amp; Nuneaton:</strong> CV8, CV10, CV11</li>
          <li><strong>Stratford-upon-Avon &amp; Surrounds:</strong> CV37</li>
        </ul>
        <div class="areas-badge">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
          Surrounding towns &amp; villages also accommodated upon request.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to action -->
<section class="cta">
  <div class="glow g1"></div>
  <div class="wrap">
    <div>
      <h2>Ready to experience a cleaner space?</h2>
      <p>Request a fast, no-obligation quote today or reach out directly via WhatsApp.</p>
    </div>
    <div class="cta-actions">
      <button class="btn btn-lg btn-light" data-quote>Get a Free Quote</button>
      <a class="btn btn-lg btn-wa" target="_blank" rel="noopener" href="https://wa.me/<?= $site['wa'] ?>">Message on WhatsApp</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>