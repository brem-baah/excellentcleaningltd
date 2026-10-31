<?php
if (!headers_sent()) {
    header("Cache-Control: no-cache, must-revalidate");
}

$site = [
    'name' => 'Excellent Cleaning Ltd',
    'tag' => 'Trusted Hands, Spotless Spaces.',
    'email' => 'excellentcleaningltd@yahoo.com',
    'tel' => '+44 7597 409836',
    'telraw' => '+447597409836',
    'wa' => '447597409836',
    'addr' => '66, Paul Street, London EC2A 4NA',
        'areas' => 'Rugby, Coventry, Warwickshire, Leamington Spa & surrounding areas',
    'domain' => 'https://excellentcleaningltd.com'
];

$services = [
    [
        'slug' => 'residential-cleaning',
        'title' => 'Residential Cleaning',
        'desc' => 'Reliable, bespoke upkeep for kitchens, bathrooms, bedrooms, and living spaces across Warwickshire.',
        'items' => ['Kitchen degreasing & sanitized bathrooms', 'Dusting, vacuuming and precision mopping', 'Weekly, fortnightly or flexible one-off visits'],
        'price' => 'Free quote',
        'badge' => 'Residential',
        'category' => 'residential',
        'image' => 'images/residential.jpg',
        'turnaround' => 'Weekly, Fortnightly, or One-Off',
        'idealFor' => 'Busy professionals, families, and rental property owners.',
        'keyBenefits' => ['Regular slots for repeat visits', 'All professional detergents & supplies provided', 'Flexible visit frequency'],
        'detailedScope' => [
            'Kitchen: Hob & splashback degreasing, exterior appliance wipe, sinks sanitized and taps descaled.',
            'Bathrooms: Full shower screen limescale removal, bathtub scrubbing, toilet disinfection and mirrors buffed.',
            'Living & Bedrooms: High/low furniture dusting, mattress and upholstery vacuuming, skirting boards wiped.',
            'Floors: Complete edge-to-edge vacuuming on carpets and precision microfibre damp mopping on hard flooring.'
        ]
    ],
    [
        'slug' => 'office-commercial-cleaning',
        'title' => 'Office & Commercial Cleaning',
        'desc' => 'Immaculate workstations, executive meeting rooms, and shared staff facilities that elevate your workplace hygiene.',
        'items' => ['Desks, screens and high-touch surface sanitising', 'Kitchenettes, breakrooms & washrooms restocked', 'Flexible early morning or out-of-hours visits'],
        'price' => 'Free quote',
        'badge' => 'Commercial',
        'category' => 'commercial',
        'image' => 'images/office.jpg',
        'turnaround' => 'Daily, Multi-Weekly, or Weekly Out-of-Hours',
        'idealFor' => 'Corporate offices, coworking spaces, agencies, clinics, and professional practices.',
        'keyBenefits' => ['Flexible early morning or late evening visits', 'Flexible commercial arrangements', 'Consistent checklists for every visit'],
        'detailedScope' => [
            'Workstations & Tech: Keyboard and desktop surface sanitising with anti-static electronics-safe products.',
            'Conference Rooms: Boardroom tables polished, glass partitions buffed, chairs straightened, whiteboards reset.',
            'Kitchenettes & Canteens: Microwaves disinfected, sinks descaled, countertops wiped, waste & recyclables removed.',
            'Sanitary Restrooms: Deep basin and cubicle sanitisation, dispenser replenishment, floor disinfection.'
        ]
    ],
    [
        'slug' => 'deep-cleaning',
        'title' => 'Deep Cleaning & Sanitisation',
        'desc' => 'Intensive head-to-toe property reset targeting accumulated limescale, baked-in grime, and neglected high-touch zones.',
        'items' => ['Limescale & grime extraction', 'Behind & under heavy appliances', 'Full door frame, skirting & tile scrubbing'],
        'price' => 'Free quote',
        'badge' => 'Deep Clean',
        'category' => 'residential',
        'image' => 'images/deep-clean.jpg',
        'turnaround' => 'Half-Day or Full-Day Thorough Service',
        'idealFor' => 'Homes needing a spring refresh, post-illness sanitisation, or pre-hosting preparation.',
        'keyBenefits' => ['Reaches beneath, behind, and on top of heavy furniture', 'Steam & high-grade sanitisation across wet rooms', 'Transforms heavily scaled tile grout and fixtures'],
        'detailedScope' => [
            'Wet Zones: Intense bathroom descaling, grout scrubbing, shower head decalcification, drain cleansing.',
            'Kitchen Deep Scrub: Appliance pull-out cleaning where accessible, tile grease breakdown, extractor hood exterior.',
            'Architectural Woodwork: Doors, frames, light switches, plug sockets, radiators and all skirting boards washed.',
            'Windows & Air: Interior glass buffed, window track vacuuming, ventilation grille dusting.'
        ]
    ],
    [
        'slug' => 'move-in-out-cleaning',
        'title' => 'Move-In & End of Tenancy Cleaning',
        'desc' => 'End-of-tenancy cleans prepared for letting agent and inventory clerk checklists.',
        'items' => ['Comprehensive landlord checklist compliance', 'Oven, fridge & cupboard interior degreasing', 'Prepared against letting agent checklists'],
        'price' => 'Free quote',
        'badge' => 'Move-In / Move-Out',
        'category' => 'specialist',
        'image' => 'images/tenancy.jpg',
        'turnaround' => 'One-off Clean',
        'idealFor' => 'Tenants moving out, estate agents, landlords, and property management firms.',
        'keyBenefits' => ['Prepared against agent and inventory checklists', 'Full kitchen appliances internal cleaning included', 'Receipt available on request'],
        'detailedScope' => [
            'All Appliances: Complete internal and external cleaning of oven, extractor, fridge/freezer, and washing machine drawer.',
            'Cabinetry & Storage: Every cupboard, drawer, wardrobe, and shelving unit cleaned inside and out.',
            'Sanitary Ware: Limescale-free taps, de-moulded silicone seals where treatable, sparkling bathtubs and showers.',
            'Full Walls & Woodwork: Cobweb removal, spot cleaning light scuffs, doors, handles, sockets, and sills.'
        ]
    ],
    [
        'slug' => 'post-construction-cleaning',
        'title' => 'Post-Construction & Builders Cleaning',
        'desc' => 'Specialist industrial fine-dust extraction that transforms messy construction sites into turnkey living spaces.',
        'items' => ['Fine plaster, grout & paint splatter removal', 'Fine-dust vacuuming', 'Window glass, frames, switches and sills polished'],
        'price' => 'Free quote',
        'badge' => 'Post-Build',
        'category' => 'specialist',
        'image' => 'images/construction.jpg',
        'turnaround' => 'Single or Phased Cleans (Rough & Final)',
        'idealFor' => 'Main contractors, home renovators, architects, interior designers, and property developers.',
        'keyBenefits' => ['Fine plaster dust extraction', 'Careful cleaning around new floors and joinery', 'Site-appropriate protective equipment'],
        'detailedScope' => [
            'Dust Abatement: High-level pipework, joists, door tops, and walls vacuumed with fine-dust vacuums.',
            'Residue Extraction: Paint spots, silicone excess, grout haze, and plaster tags carefully stripped from tiles and glass.',
            'Joinery & Fixtures: Protective films removed, newly installed cabinetry wiped inside and out.',
            'Window Glass & Tracks: Scratch-free window blade buffing, track vacuuming, frame washing.'
        ]
    ],
    [
        'slug' => 'warehouse-cleaning',
        'title' => 'Warehouse & Industrial Cleaning',
        'desc' => 'Heavy-duty floor sweeping, scrubber drying, and hygiene management for logistics facilities, distribution hubs and workshops.',
        'items' => ['High-traffic industrial floor sweeping & scrubbing', 'Loading bay, packing zone & mezzanine upkeep', 'Staff canteen, locker room & hygiene facilities'],
        'price' => 'Free quote',
        'badge' => 'Industrial',
        'category' => 'commercial',
        'image' => 'images/warehouse.jpg',
        'turnaround' => 'Scheduled Shifts or Periodic Industrial Deep Cleans',
        'idealFor' => 'Logistics parks, fulfillment centres, storage units, manufacturing plants, and trade depots.',
        'keyBenefits' => ['Reduces slip-and-fall hazards and tyre dust build-up', 'Site-specific cleaning plans', 'Flexible shift scheduling around operational logistics'],
        'detailedScope' => [
            'Floor Maintenance: Mechanical industrial sweeping, power scrubber-drying, line marking degreasing.',
            'High-Bay Dusting: Structural beams, HVAC ducts, lighting gantries, and racking tops vacuumed.',
            'Loading & Packing Bays: Waste pallet segregation, packaging debris clearing, bay door wipe-down.',
            'Welfare & Locker Rooms: Industrial washrooms disinfected, antibacterial surface wipe, locker exteriors.'
        ]
    ],
    [
        'slug' => 'event-cleaning',
        'title' => 'Event & Venue Cleaning',
        'desc' => 'Pre-event sparkle prep and lightning-fast post-event turnaround for weddings, corporate galas, exhibitions, and parties.',
        'items' => ['Pre-guest venue setup & high-touch sanitisation', 'Rapid turnaround post-event clearing', 'Safe waste segregation, bagging and disposal'],
        'price' => 'Free quote',
        'badge' => 'Events',
        'category' => 'specialist',
        'image' => 'images/event.jpg',
        'turnaround' => 'Pre-Event Preparation & Overnight Post-Event Reset',
        'idealFor' => 'Event planners, wedding venues, conference centres, community halls, and private hosts.',
        'keyBenefits' => ['Overnight or early dawn turnaround before the next booking', 'Complete rubbish bagging and recycling segregation', 'Flexible timings around your event'],
        'detailedScope' => [
            'Pre-Event Sparkle: Entrance foyers, glass doors, table surfaces, dance floor buffing, and restroom setup.',
            'Post-Event Clear: Rapid table clearance, floor sweeping and wet scrubbing, drink spill neutralization.',
            'Waste Logistics: Safe gathering, sorting into recyclable streams, and transport to on-site disposal bins.',
            'Complete Handover: Kitchen prep areas sanitised, venue reset to original inventory condition.'
        ]
    ],
];

$page = $page ?? 'home';
$title = $title ?? $site['name'].' | '.$site['tag'];
$desc = $desc ?? 'Trusted home, office, warehouse, deep and end of tenancy cleaning in Rugby, Coventry & Warwickshire. Get a free quote today.';

$documentRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
$projectRoot = realpath(__DIR__.'/..');
$basePath = ($documentRoot && $projectRoot && strpos($projectRoot, $documentRoot) === 0)
    ? str_replace('\\', '/', substr($projectRoot, strlen($documentRoot)))
    : '';

$url = function($path = '') use ($basePath) {
    return $basePath.'/'.ltrim($path, '/');
};

$asset = function($path) use ($url) {
    $f = __DIR__.'/../'.ltrim($path, '/');
    return $url($path).(is_file($f) ? '?v='.filemtime($f).'-'.filesize($f) : '');
};
function h($s){return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$canonicalUrl = $site['domain'] . rtrim($basePath ? substr($currentPath, strlen($basePath)) : $currentPath, '/');
if ($canonicalUrl === $site['domain']) { $canonicalUrl = $site['domain'] . '/'; }

$logo = $asset('images/excellent-cleaning-ltd.png');
$ogImage = $site['domain'] . '/images/excellent-cleaning-ltd.png';

function logo($src, $class = 'mark'){
    return '<img class="'.h($class).'" src="'.h($src).'" alt="Excellent Cleaning Ltd" loading="eager">';
}
?><!DOCTYPE html>
<html lang="en-GB">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= h($title) ?></title>
<meta name="description" content="<?= h($desc) ?>">
<meta name="theme-color" content="#0A2540">
<link rel="canonical" href="<?= h($canonicalUrl) ?>">

<!-- Open Graph / Social Sharing -->
<meta property="og:type" content="business.business">
<meta property="og:title" content="<?= h($title) ?>">
<meta property="og:description" content="<?= h($desc) ?>">
<meta property="og:url" content="<?= h($canonicalUrl) ?>">
<meta property="og:site_name" content="<?= h($site['name']) ?>">
<meta property="og:locale" content="en_GB">
<meta property="og:image" content="<?= h($ogImage) ?>">
<meta property="og:image:alt" content="Excellent Cleaning Ltd - Spotless Spaces Across Warwickshire">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= h($title) ?>">
<meta name="twitter:description" content="<?= h($desc) ?>">
<meta name="twitter:image" content="<?= h($ogImage) ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;700;800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= h($url('css/style.css')) ?>?v=<?= filemtime(__DIR__.'/../css/style.css') ?>">
<link rel="icon" type="image/png" href="<?= h($logo) ?>">

<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CleaningService',
    'name' => $site['name'],
    'image' => $ogImage,
    'description' => $desc,
    'email' => $site['email'],
    'telephone' => $site['telraw'],
    'foundingDate' => '2026',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '66 Paul Street',
        'addressLocality' => 'London',
        'postalCode' => 'EC2A 4NA',
        'addressCountry' => 'GB'
    ],
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Rugby'],
        ['@type' => 'City', 'name' => 'Coventry'],
        ['@type' => 'AdministrativeArea', 'name' => 'Warwickshire'],
        ['@type' => 'City', 'name' => 'Leamington Spa'],
        ['@type' => 'City', 'name' => 'Warwick'],
        ['@type' => 'City', 'name' => 'Kenilworth'],
        ['@type' => 'City', 'name' => 'Nuneaton']
    ],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Cleaning Services',
        'itemListElement' => array_map(function($s) {
            return [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $s['title'],
                    'description' => $s['desc']
                ]
            ];
        }, $services)
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
</head>
<body>
<header class="nav">
  <div class="wrap">
    <a class="brand" href="<?= h($url()) ?>">
      <?= logo($logo) ?>
      <span>Excellent Cleaning<small><?= h($site['tag']) ?></small></span>
    </a>
    <button class="burger" aria-label="Toggle navigation menu" aria-expanded="false" data-burger>
      <span></span><span></span><span></span>
      <span class="burger-text">Menu</span>
    </button>
    <nav id="menu">
      <?php 
      $navItems = [
          'home' => ['', 'Home'],
          'about' => ['about', 'About Us'],
          'services' => ['services', 'Services'],
          'contact' => ['contact', 'Contact & Booking']
      ];
      foreach($navItems as $k => $l): 
          $isHash = strpos($l[0], '#') === 0;
          $link = $isHash ? ($page === 'home' ? $l[0] : $url(''.$l[0])) : $url($l[0]);
      ?>
        <a href="<?= h($link) ?>"<?= $page === $k ? ' aria-current="page"' : '' ?>><?= $l[1] ?></a>
      <?php endforeach; ?>
      <button class="btn btn-sm" data-quote>Get a Free Quote</button>
    </nav>
  </div>
</header>
<main>