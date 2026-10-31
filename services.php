<?php 
$page = 'services'; 
$title = 'Professional Cleaning Services in Rugby, Coventry & Warwickshire | Excellent Cleaning Ltd'; 
$desc = 'Explore our full range of 7 professional cleaning services: domestic, office, deep clean, end of tenancy, warehouse and post-construction.'; 
include 'includes/header.php'; 
?>

<!-- Hero Section with Filter Pills -->
<section class="pagehead services-hero">
  <div class="glow g1"></div>
  <div class="wrap">
    <span class="pill-badge">Full Service Catalogue</span>
    <h1>Our Cleaning Services</h1>
    <p class="lead">Every clean tailored to your exact property specifications. Explore our seven specialized cleaning services, complete with detailed checklists, transparent rates, and photographic standards.</p>
    
    <div class="services-stats-bar"><div class="s-stat"><strong>7</strong> <span>Specialised Services</span></div><div class="s-stat-sep">&bull;</div><div class="s-stat"><strong>3</strong> <span>Core Areas Covered</span></div>
</div>

    <!-- Category Filter Bar -->
    <div class="service-filters" id="service-filters">
      <button type="button" class="filter-btn active" data-filter="all">All Services (7)</button>
      <button type="button" class="filter-btn" data-filter="residential">Residential &amp; Homes</button>
      <button type="button" class="filter-btn" data-filter="commercial">Offices &amp; Commercial</button>
      <button type="button" class="filter-btn" data-filter="specialist">Specialist &amp; Turnkey</button>
    </div>
  </div>
</section>

<!-- Magazine Style Detailed Services List -->
<section class="sec" id="services-catalogue">
  <div class="wrap">
    <div class="services-showcase">
      <?php foreach($services as $idx => $s): 
        $isEven = ($idx % 2 === 1);
        $imgUrl = $asset($s['image']);
        $waServiceUrl = 'https://wa.me/'.$site['wa'].'?text='.rawurlencode('Hello Excellent Cleaning Ltd, I would like to enquire about your '.$s['title'].' service.');
      ?>
        <article class="service-feature reveal <?= $isEven ? 'row-reversed' : '' ?>" id="<?= h($s['slug']) ?>" data-category="<?= h($s['category']) ?>">
          <!-- Media Column -->
          <div class="feature-media">
            <div class="media-frame">
              <img src="<?= h($imgUrl) ?>" alt="<?= h($s['title']) ?> by Excellent Cleaning Ltd" loading="lazy" decoding="async" class="feature-img">
              <div class="media-overlay">
                <span class="media-badge"><?= h($s['badge']) ?></span>
              </div>
            </div>
            <div class="media-meta-strip">
              <div class="meta-item">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span><strong>Frequency:</strong> <?= h($s['turnaround']) ?></span>
              </div>
            </div>
          </div>

          <!-- Content Column -->
          <div class="feature-content">
            <div class="feature-header">
              <span class="cat-pill"><?= ucfirst(h($s['category'])) ?> Cleaning</span>
              <h2><?= h($s['title']) ?></h2>
            </div>
            
            <p class="feature-summary"><?= h($s['desc']) ?></p>

            <div class="ideal-callout">
              <strong>Ideal for:</strong> <?= h($s['idealFor']) ?>
            </div>

            <!-- Key Advantages -->
            <div class="feature-benefits">
              <h4>Key Service Advantages:</h4>
              <ul class="benefits-pills">
                <?php foreach($s['keyBenefits'] as $kb): ?>
                  <li>
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    <span><?= h($kb) ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- Room-by-Room Checklist -->
            <div class="feature-scope">
              <details class="scope-dropdown" open>
                <summary>
                  <span>Detailed Checklist &amp; What's Cleaned</span>
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <div class="scope-body">
                  <ul>
                    <?php foreach($s['detailedScope'] as $scopeItem): 
                      $parts = explode(':', $scopeItem, 2);
                    ?>
                      <li>
                        <?php if (count($parts) === 2): ?>
                          <strong><?= h($parts[0]) ?>:</strong> <?= h($parts[1]) ?>
                        <?php else: ?>
                          <?= h($scopeItem) ?>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </details>
            </div>

            <!-- Actions -->
            <div class="feature-actions">
              <button class="btn btn-primary" data-quote="<?= h($s['title']) ?>">
                Book <?= h($s['title']) ?>
              </button>
              <a class="btn btn-wa" target="_blank" rel="noopener" href="<?= $waServiceUrl ?>">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm4.8 13.5c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-3-.7-2.5-1.1-4.1-3.6-4.2-3.8-.1-.2-1-1.3-1-2.5s.6-1.8.9-2c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .5.4l.8 1.8c.1.2.1.3 0 .5l-.4.5c-.1.1-.3.3-.1.5.5.9 1.2 1.7 2.2 2.2.2.1.4.1.5-.1l.7-.9c.2-.2.3-.2.5-.1l1.7.8c.2.1.4.2.4.3.1.2.1.7-.1 1.2Z"/></svg>
                WhatsApp Us
              </a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- The 5-Step Process -->
<section class="sec dark process-sec">
  <div class="glow g3"></div>
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge dark-pill">Quality Standards</span>
      <h2>Our 5-Step Cleaning Process</h2>
      <p>How every booking runs, from first message to finished clean.</p>
    </div>
    
    <div class="process-steps">
      <div class="p-step">
        <span class="p-num">01</span>
        <h4>Consultation &amp; Transparent Quote</h4>
        <p>You tell us what needs cleaning and preferred dates. We send you a clear quote.</p>
      </div>

      <div class="p-step">
        <span class="p-num">02</span>
        <h4>Operative Briefing &amp; Arrival</h4>
        <p>Our team arrives on time with professional equipment and cleaning supplies.</p>
      </div>

      <div class="p-step">
        <span class="p-num">03</span>
        <h4>Systematic Deep Clean</h4>
        <p>We clean top-to-bottom and room-by-room, ensuring no surfaces, appliances, or corners are overlooked.</p>
      </div>

      <div class="p-step">
        <span class="p-num">04</span>
        <h4>Quality Audit Inspection</h4>
        <p>Every area is reviewed against our internal quality checklist before we declare the work complete.</p>
      </div>

      <div class="p-step">
        <span class="p-num">05</span>
        <h4>Sign-off &amp; 24hr Warranty</h4>
        <p>You review the finished work with us and tell us if anything needs another look.</p>
      </div>
    </div>
  </div>
</section>



<!-- Services FAQs -->
<section class="sec">
  <div class="wrap">
    <div class="head center">
      <span class="pill-badge">Common Questions</span>
      <h2>Services FAQ</h2>
      <p>Answers to questions about booking our cleaning specialists.</p>
    </div>

    <div class="faq-container">
      

      <details class="faq-item">
        <summary>Can I book a regular domestic clean with the same cleaner each time?</summary>
        <div class="faq-body">
          <p>Yes. For weekly and fortnightly residential clients, we assign a regular cleaner where possible so you get consistent quality and familiarity with your home layout and preferences.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Do you offer out-of-hours commercial and office cleaning?</summary>
        <div class="faq-body">
          <p>Yes. We understand commercial operations cannot have vacuum cleaners running during customer hours. We offer early morning (from 06:00) or evening (after 18:00) cleaning contracts, as well as weekend commercial upkeep.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>What equipment do you use for post-construction cleans?</summary>
        <div class="faq-body">
          <p>We use high-power commercial vacuum cleaners to extract micro-plaster dust without recirculating it into the air, along with specialist scrapers, microfiber buffing pads, and non-acidic residue removers for tiles and windows.</p>
        </div>
      </details>
    </div>
  </div>
</section>

<!-- Final Call to Action -->
<section class="cta">
  <div class="glow g1"></div>
  <div class="wrap">
    <div>
      <h2>Ready to book your cleaning service?</h2>
      <p>Get a fast, fixed quote today. No contracts or upfront deposit required for domestic cleans.</p>
    </div>
    <div class="cta-actions">
      <button class="btn btn-lg btn-light" data-quote>Get a Free Quote</button>
      <a class="btn btn-lg btn-wa" target="_blank" rel="noopener" href="https://wa.me/<?= $site['wa'] ?>">Chat on WhatsApp</a>
    </div>
  </div>
</section>

<!-- Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function(){
  var filters = document.getElementById('service-filters');
  if (!filters) return;
  var buttons = filters.querySelectorAll('.filter-btn');
  var items = document.querySelectorAll('.service-feature');

  buttons.forEach(function(btn){
    btn.addEventListener('click', function(){
      buttons.forEach(function(b){ b.classList.remove('active'); });
      btn.classList.add('active');
      var filter = btn.getAttribute('data-filter');

      items.forEach(function(item){
        var cat = item.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          item.style.display = 'grid';
          item.classList.add('in');
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>

<?php include 'includes/footer.php'; ?>