<?php 
$page = 'privacy'; 
$title = 'Privacy Policy | Excellent Cleaning Ltd'; 
$desc = 'Our Privacy Notice explains how Excellent Cleaning Ltd collects, protects, and processes personal information in compliance with the UK GDPR.'; 
include 'includes/header.php'; 
?>

<section class="pagehead">
  <div class="glow g1"></div>
  <div class="wrap">
    <span class="pill-badge">Legal &amp; Data Protection</span>
    <h1>Privacy Policy</h1>
    <p class="lead">How Excellent Cleaning Ltd collects, uses, and protects your personal information under the UK General Data Protection Regulation (UK GDPR) and Data Protection Act 2018.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap legal-content">
    <article class="legal-article">
      <p class="effective-date"><strong>Last updated:</strong> October 2026</p>

      <h2>1. Who We Are</h2>
      <p>Excellent Cleaning Ltd ("we", "us", or "our") is a cleaning service provider registered in England &amp; Wales. Registered office: <?= h($site['addr']) ?>. For questions regarding your personal data, you can contact our Data Protection Lead at <a href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?></a> or by telephone at <a href="tel:<?= h($site['telraw']) ?>"><?= h($site['tel']) ?></a>.</p>

      <h2>2. What Personal Data We Collect</h2>
      <p>When you contact us, request a quote, or book cleaning services, we may collect:</p>
      <ul>
        <li><strong>Identity &amp; Contact Details:</strong> Name, email address, telephone number, and WhatsApp contact handle.</li>
        <li><strong>Property &amp; Location Data:</strong> Property address, postcode, property type, room count, and access details (e.g. key-safe location or parking instructions).</li>
        <li><strong>Booking &amp; Service Information:</strong> Requested cleaning services, dates, specific cleaning notes, and correspondence history.</li>
        <li><strong>Billing &amp; Payment Records:</strong> Invoicing details, transaction references, and payment status (we do not store full payment card numbers).</li>
      </ul>

      <h2>3. How and Why We Use Your Data (Lawful Bases)</h2>
      <p>We process personal data under the following legal bases:</p>
      <ul>
        <li><strong>Contractual Performance:</strong> To calculate quotes, schedule cleaning operatives, access your property, complete cleaning work, and handle invoicing.</li>
        <li><strong>Legitimate Interests:</strong> To reply to customer enquiries, manage customer relationships, ensure job quality, and protect against fraudulent activity.</li>
        <li><strong>Legal Compliance:</strong> To maintain accurate financial, tax, and accounting records as mandated by UK HMRC law.</li>
      </ul>

      <h2>4. Data Sharing and Third Parties</h2>
      <p>We do not sell, rent, or trade your personal information. We only share information with:</p>
      <ul>
        <li>Our cleaning team members who require access instructions to carry out booked work.</li>
        <li>Secure service providers, such as email delivery infrastructure, accounting software, and secure banking processors.</li>
        <li>Law enforcement or regulatory authorities if legally compelled by UK law.</li>
      </ul>

      <h2>5. Data Retention</h2>
      <p>We keep enquiry details for as long as needed to fulfill your request. Invoiced client data and accounting records are retained for 6 years in accordance with UK statutory accounting obligations, after which records are securely destroyed.</p>

      <h2>6. Your Rights Under UK GDPR</h2>
      <p>You have the right to:</p>
      <ul>
        <li>Request access to the personal data we hold about you.</li>
        <li>Request correction of inaccurate or incomplete data.</li>
        <li>Request erasure of your personal data where retention is no longer legally required.</li>
        <li>Object to or restrict our processing of your information.</li>
        <li>Lodge a complaint with the UK Information Commissioner's Office (ICO) at <a href="https://ico.org.uk" target="_blank" rel="noopener">ico.org.uk</a>.</li>
      </ul>

      <h2>7. Contact Us</h2>
      <p>If you have any questions or wish to exercise your data rights, please contact us at <a href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?></a>.</p>
    </article>
  </div>
</section>

<?php include 'includes/footer.php'; ?>