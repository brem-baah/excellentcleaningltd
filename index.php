<?php 
$page = 'home'; 
include 'includes/header.php'; 
$wa = 'https://wa.me/'.$site['wa'].'?text='.rawurlencode('Hello Excellent Cleaning Ltd, I would like to get a quote for cleaning services.'); 
?>

<!-- Hero Section -->
<section class="hero">
  <div class="glow g1"></div>
  <div class="glow g2"></div>
  <div class="wrap">
    <div class="hero-copy">
      <span class="pill"><i></i> Now booking in Rugby, Coventry &amp; Warwickshire</span>
      <h1>Trusted hands, <span class="grad">spotless spaces.</span></h1>
      <p class="lead">From regular domestic upkeep and end-of-tenancy cleans to corporate offices and commercial facilities. We turn up on time, take pride in the details, and leave your space immaculate.</p>
      
      <div class="actions">
        <button class="btn btn-lg" data-quote>Get a Free Quote</button>
        <a class="btn btn-lg btn-glass" target="_blank" rel="noopener" href="<?= $wa ?>">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm4.8 13.5c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-3-.7-2.5-1.1-4.1-3.6-4.2-3.8-.1-.2-1-1.3-1-2.5s.6-1.8.9-2c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .5.4l.8 1.8c.1.2.1.3 0 .5l-.4.5c-.1.1-.3.3-.1.5.5.9 1.2 1.7 2.2 2.2.2.1.4.1.5-.1l.7-.9c.2-.2.3-.2.5-.1l1.7.8c.2.1.4.2.4.3.1.2.1.7-.1 1.2Z"/></svg>
          Chat on WhatsApp
        </a>
      </div>

      
    </div>

    <div class="hero-art">
      <div class="ring r1"></div>
      <div class="ring r2"></div>
      <?= logo($logo) ?>
      <span class="chip c1">Residential &amp; Deep Clean</span>
      <span class="chip c2">Commercial &amp; Offices</span>
      <span class="chip c3">Move-In &amp; Move-Out</span>
    </div>
  </div>
</section>





<!-- Services Bento Grid -->
<section class="sec">
  <div class="wrap">
    <div class="head">
      <span class="pill-badge">Our Capabilities</span>
      <h2>Every clean handled to perfection.</h2>
      <p>Seven dedicated cleaning solutions tailored for homeowners, tenants, facility managers and construction contractors.</p>
    </div>
    
    <div class="bento">
      <?php foreach($services as $i => $s): 
        $imgUrl = $asset($s['image']);
      ?>
        <article class="tile t<?= $i ?> reveal">
          <div class="tile-img-frame">
            <img src="<?= h($imgUrl) ?>" alt="<?= h($s['title']) ?>" loading="lazy" decoding="async" class="tile-thumb">
            <span class="tile-badge"><?= h($s['badge']) ?></span>
          </div>
          <h3><?= h($s['title']) ?></h3>
          <p><?= h($s['desc']) ?></p>
          <ul class="tile-features">
            <?php foreach($s['items'] as $item): ?>
              <li><?= h($item) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="tile-action">
            <button class="btn btn-sm" data-quote="<?= h($s['title']) ?>">Request Quote</button>
            <a href="<?= h($url('services#'.$s['slug'])) ?>" class="tile-more-link">Full Details &rarr;</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- How It Works -->
<section class="sec dark">
  <div class="glow g3"></div>
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge dark-pill">How It Works</span>
      <h2>Simple, fast, and completely stress-free.</h2>
      <p>Arranging a cleaner shouldn't take days of back-and-forth phone calls.</p>
    </div>
    <ol class="steps">
      <li class="reveal">
        <b>1</b>
        <h3>Tell us the job</h3>
        <p>Use our fast online form or send a message on WhatsApp with your postcode and what needs cleaning.</p>
      </li>
      <li class="reveal">
        <b>2</b>
        <h3>Receive your transparent quote</h3>
        <p>We reply with a clear quote and the time slots we have available.</p>
      </li>
      <li class="reveal">
        <b>3</b>
        <h3>We get it sorted properly</h3>
        <p>Our team arrives on time with the right equipment and leaves your space clean.</p>
      </li>
    </ol>
  </div>
</section>

<!-- Before and After Transformation Showcase -->
<section class="sec tint" id="transformations">
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge">Real Transformations</span>
      <h2>Proven results speak for themselves.</h2>
      <p>Browse our recent work across Rugby, Coventry, and Warwickshire — from tough grease resets to spotless end-of-tenancy handovers.</p>
    </div>

    <div class="ba-grid">
      <!-- Transformation 1 -->
      <article class="ba-card reveal">
        <div class="ba-media">
          <img src="<?= h($asset('images/before-and-after-1.jpg')) ?>" alt="Kitchen and oven deep cleaning before and after transformation" loading="lazy" decoding="async" class="ba-img">
        </div>
        <div class="ba-content">
          <span class="cat-pill">Deep Clean</span>
          <h3>Kitchen &amp; Heavy Degreasing</h3>
          <p>Stubborn burnt residues, tile grime, and hardened extractor grease stripped away to restore a factory-fresh finish.</p>
        </div>
      </article>

      <!-- Transformation 2 -->
      <article class="ba-card reveal">
        <div class="ba-media">
          <img src="<?= h($asset('images/before-and-after-2.jpg')) ?>" alt="Bathroom and tile restoration before and after transformation" loading="lazy" decoding="async" class="ba-img">
        </div>
        <div class="ba-content">
          <span class="cat-pill">End of Tenancy</span>
          <h3>Bathroom &amp; Limescale Descaling</h3>
          <p>Deep limescale, soap-scum and grout discolouration completely eradicated for 100% landlord deposit pass rates.</p>
        </div>
      </article>

      <!-- Transformation 3 -->
      <article class="ba-card reveal">
        <div class="ba-media">
          <img src="<?= h($asset('images/before-and-after-3.jpg')) ?>" alt="Living space and flooring transformation before and after" loading="lazy" decoding="async" class="ba-img">
        </div>
        <div class="ba-content">
          <span class="cat-pill">Domestic / Commercial</span>
          <h3>High-Traffic Surface Reset</h3>
          <p>Heavy scuffs, ingrained dirt, and dull surfaces revived with professional multi-stage sanitising and precision mopping.</p>
        </div>
      </article>
    </div>

    <div class="ba-footer-cta">
      <div class="ba-cta-box">
        <div>
          <h4>Have a space that needs serious attention?</h4>
          <p>Send photos of your property on WhatsApp for an instant, tailored estimate.</p>
        </div>
        <div class="ba-cta-btns">
          <button class="btn btn-sm btn-primary" data-quote>Get a Free Quote</button>
          <a class="btn btn-sm btn-wa" target="_blank" rel="noopener" href="<?= $wa ?>">WhatsApp Photos</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Frequently Asked Questions -->
<section class="sec">
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge">FAQs</span>
      <h2>Frequently Asked Questions</h2>
      <p>Have questions before booking? Here are answers to common questions about our services.</p>
    </div>

    <div class="faq-container">
      <details class="faq-item" open>
        <summary>Do you supply all cleaning products and equipment?</summary>
        <div class="faq-body">
          <p>Yes, absolutely. Our cleaners arrive fully equipped with professional-grade cleaning materials, vacuums, mops, microfibre cloths, and eco-friendly degreasers. If you have specific surfaces requiring specialized products or prefer your own vacuum, we are happy to accommodate your request.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Do I need to be home during the clean?</summary>
        <div class="faq-body">
          <p>No, you do not need to be present. Many of our domestic and commercial clients provide key-holder access or a key safe / lockbox code.</p>
        </div>
      </details>

      

      

      

      <details class="faq-item">
        <summary>What areas do you cover across Warwickshire?</summary>
        <div class="faq-body">
          <p>We cover Rugby, Coventry, Leamington Spa, Warwick, Kenilworth, Nuneaton, Bedworth, Stratford-upon-Avon, and surrounding villages. If your postcode is nearby, message us on WhatsApp and we will confirm availability instantly.</p>
        </div>
      </details>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta">
  <div class="glow g1"></div>
  <div class="wrap">
    <div>
      <h2>Ready for a spotless, refreshed space?</h2>
      <p>Contact us today for a fast, free, no-obligation quote or message us directly on WhatsApp.</p>
    </div>
    <div class="cta-actions">
      <button class="btn btn-lg btn-light" data-quote>Get a Free Quote</button>
      <a class="btn btn-lg btn-wa" target="_blank" rel="noopener" href="<?= $wa ?>">WhatsApp Us Now</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>