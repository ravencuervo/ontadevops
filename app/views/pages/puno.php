<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- GOOGLE FONTS para tipografía premium -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">

<!-- ====================================================
     HERO — Cinematográfico Full Screen
     ==================================================== -->
<section class="ph-hero">
    <div class="ph-hero-bg" style="background-image: url('<?php echo URLROOT; ?>/img/portadas/explora.jpg');"></div>
    <div class="ph-hero-overlay"></div>
    <div class="ph-hero-content">
        <p class="ph-hero-eyebrow">
            <span class="ph-dot-live"></span>
            <?php echo _t('puno.hero_eyebrow'); ?>
        </p>
        <h1 class="ph-hero-h1">
            <?php
$title = _t('puno.hero_title');
$parts = explode(' ', $title);
if (count($parts) >= 2) {
    $last = array_pop($parts);
    echo implode(' ', $parts) . '<br><em>' . $last . '</em>';
}
else {
    echo $title;
}
?>
        </h1>
        <p class="ph-hero-sub"><?php echo _t('puno.hero_subtitle'); ?></p>
        <div class="ph-hero-pills">
            <span><?php echo _t('puno.hero_pill1'); ?></span>
            <span><?php echo _t('puno.hero_pill2'); ?></span>
            <span><?php echo _t('puno.hero_pill3'); ?></span>
            <span><?php echo _t('puno.hero_pill4'); ?></span>
        </div>
        <a href="#cultura" class="ph-scroll-cta">
            <span><?php echo _t('puno.hero_discover'); ?></span>
            <div class="ph-scroll-ring"><i class="fa-solid fa-arrow-down"></i></div>
        </a>
    </div>
    <!-- Números flotantes -->
    <div class="ph-hero-numbers">
        <div class="ph-num"><strong><?php echo _t('puno.hero_stat1_val'); ?></strong><span><?php echo _t('puno.hero_stat1_label'); ?></span></div>
        <div class="ph-num"><strong><?php echo _t('puno.hero_stat2_val'); ?></strong><span><?php echo _t('puno.hero_stat2_label'); ?></span></div>
        <div class="ph-num"><strong><?php echo _t('puno.hero_stat3_val'); ?></strong><span><?php echo _t('puno.hero_stat3_label'); ?></span></div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Galería Inmersiva de Puno
     ==================================================== -->
<section class="ph-gallery-section" id="cultura">
    <div class="ph-gallery-header">
        <span class="ph-label"><?php echo _t('puno.gallery_badge'); ?></span>
        <?php
$gtitle = _t('puno.gallery_title');
$gparts = explode(' ', $gtitle);
echo '<h2>';
if (count($gparts) >= 2) {
    $glast = array_pop($gparts);
    echo implode(' ', $gparts) . ' <em>' . $glast . '</em>';
}
else {
    echo $gtitle;
}
echo '</h2>';
?>
    </div>
    <div class="ph-masonry">
        <div class="ph-photo ph-photo-tall">
            <img src="<?php echo URLROOT; ?>/img/puno/titicaca.jpg" alt="Lago Titicaca">
            <div class="ph-photo-caption">
                <h3>Lago Titicaca</h3>
                <p><?php echo _t('puno.gallery_titicaca_desc'); ?></p>
            </div>
        </div>
        <div class="ph-photo-col">
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/sillustani.jpg" alt="Sillustani">
                <div class="ph-photo-caption">
                    <h3>Sillustani</h3>
                    <p><?php echo _t('puno.gallery_sillustani_desc'); ?></p>
                </div>
            </div>
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/taquile.jpg" alt="Isla Taquile">
                <div class="ph-photo-caption">
                    <h3>Isla Taquile</h3>
                    <p><?php echo _t('puno.gallery_taquile_desc'); ?></p>
                </div>
            </div>
        </div>
        <div class="ph-photo-col">
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/catedral.jpg" alt="Catedral">
                <div class="ph-photo-caption">
                    <h3>Catedral de Puno</h3>
                    <p><?php echo _t('puno.gallery_catedral_desc'); ?></p>
                </div>
            </div>
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/mirador.jpg" alt="Mirador">
                <div class="ph-photo-caption">
                    <h3>Mirador Puma Uta</h3>
                    <p><?php echo _t('puno.gallery_mirador_desc'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Cultura — Bento Grid
     ==================================================== -->
<section class="ph-section ph-bento-section">
    <div class="container">
        <div class="ph-section-header">
            <span class="ph-label"><?php echo _t('puno.bento_badge'); ?></span>
            <?php
$ctitle = _t('puno.bento_title');
$cparts = explode(' ', $ctitle);
echo '<h2>';
if (count($cparts) >= 2) {
    $clast = array_pop($cparts);
    echo implode(' ', $cparts) . ' <em>' . $clast . '</em>';
}
else {
    echo $ctitle;
}
echo '</h2>';
?>
        </div>
        <div class="ph-bento">
            <!-- Card Grande — Candelaria -->
            <div class="ph-bento-card ph-bento-big" style="background: linear-gradient(to top, rgba(60,5,30,0.82) 0%, rgba(196,20,90,0.35) 60%, rgba(0,0,0,0.1) 100%), url('<?php echo URLROOT; ?>/img/puno/candelaria.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-tag"><?php echo _t('puno.bento_candelaria_tag'); ?></span>
                    <h3><?php echo _t('puno.bento_candelaria_title'); ?></h3>
                    <p><?php echo _t('puno.bento_candelaria_desc'); ?></p>
                </div>
            </div>
            <!-- Card Caporal -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(40,10,90,0.85) 0%, rgba(109,40,217,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/caporal.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🎭</span>
                    <h3><?php echo _t('puno.bento_caporal_title'); ?></h3>
                    <p><?php echo _t('puno.bento_caporal_desc'); ?></p>
                </div>
            </div>
            <!-- Card Textil -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(4,50,65,0.85) 0%, rgba(14,116,144,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/textiles.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🧶</span>
                    <h3><?php echo _t('puno.bento_textiles_title'); ?></h3>
                    <p><?php echo _t('puno.bento_textiles_desc'); ?></p>
                </div>
            </div>
            <!-- Card Gastronomía -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(80,30,0,0.85) 0%, rgba(180,83,9,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/comida.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🍽</span>
                    <h3><?php echo _t('puno.bento_food_title'); ?></h3>
                    <p><?php echo _t('puno.bento_food_desc'); ?></p>
                </div>
            </div>
            <!-- Card Naturaleza -->
            <div class="ph-bento-card ph-bento-wide" style="background: linear-gradient(to top, rgba(4,50,45,0.85) 0%, rgba(15,118,110,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/fauna.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🦙</span>
                    <h3><?php echo _t('puno.bento_fauna_title'); ?></h3>
                    <p><?php echo _t('puno.bento_fauna_desc'); ?></p>
                    <div style="display:flex;gap:1rem;margin-top:1rem;flex-wrap:wrap;">
                        <span class="ph-bento-pill"><?php echo _t('puno.bento_fauna_pill1'); ?></span>
                        <span class="ph-bento-pill"><?php echo _t('puno.bento_fauna_pill2'); ?></span>
                        <span class="ph-bento-pill"><?php echo _t('puno.bento_fauna_pill3'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Videos de Danzas — Cinema Dark
     ==================================================== -->
<section class="ph-cinema-section" id="videos">
    <div class="container">
        <div class="ph-section-header ph-light-header">
            <span class="ph-label ph-label-gold"><?php echo _t('puno.video_badge'); ?></span>
            <?php
$vtitle = _t('puno.video_title');
$vparts = explode(' ', $vtitle);
echo '<h2 style="color:white;">';
if (count($vparts) >= 2) {
    $vlast = array_pop($vparts);
    echo implode(' ', $vparts) . ' <em>' . $vlast . '</em>';
}
else {
    echo $vtitle;
}
echo '</h2>';
?>
            <p style="color:rgba(255,255,255,0.5);font-size:1rem;max-width:500px;margin:0 auto;"><?php echo _t('puno.video_subtitle'); ?></p>
        </div>

        <!-- VIDEO DESTACADO -->
        <div class="ph-video-featured">
            <div class="ph-video-frame">
                <!-- Video 1: Candelaria -->
                <iframe src="https://www.youtube.com/embed/QsDIsJg5tZg" title="Virgen de la Candelaria" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="ph-video-featured-info">
                <span class="ph-label ph-label-gold"><?php echo _t('puno.video_featured_tag'); ?></span>
                <h3><?php echo _t('puno.bento_candelaria_title'); ?></h3>
                <p><?php echo _t('puno.video_featured_desc'); ?></p>
            </div>
        </div>

        <!-- GRID DE VIDEOS SECUNDARIOS -->
        <div class="ph-video-grid">
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 2: Diablada Puneña -->
                    <iframe src="https://www.youtube.com/embed/a5UFc19fBcs" title="Diablada Puneña" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span><?php echo _t('puno.video_card1_tag'); ?></span>
                    <h4><?php echo _t('puno.video_card1_title'); ?></h4>
                </div>
            </div>
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 3: Lago Titicaca -->
                    <iframe src="https://www.youtube.com/embed/c7n87kqbqaQ" title="Lago Titicaca" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span><?php echo _t('puno.video_card2_tag'); ?></span>
                    <h4><?php echo _t('puno.video_card2_title'); ?></h4>
                </div>
            </div>
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 4: Folklore Puno -->
                    <iframe src="https://www.youtube.com/embed/sC-Nr3gUtZA" title="Folklore Puno" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span><?php echo _t('puno.video_card3_tag'); ?></span>
                    <h4><?php echo _t('puno.video_card3_title'); ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Global Gateway (Vuelos al Perú)
     ==================================================== -->
<section class="ph-section ph-global-gateway-section" id="global-gateway" style="padding-bottom: 2rem;">
    <div class="container">
        <div class="ph-section-header">
            <span class="ph-label"><?php echo _t('puno.arrival_badge'); ?></span>
            <h2 class="ph-text-white"><?php echo _t('puno.arrival_global_title'); ?></h2>
            <p class="ph-desc ph-text-gray-light"><?php echo _t('puno.arrival_global_desc'); ?></p>
        </div>
    </div> <!-- Close container to allow full-width map -->
    
    <!-- Botón para móviles para abrir mapa en pantalla completa -->
    <div class="ph-mobile-map-trigger-container">
        <button id="btn-open-interactive-map" class="ph-btn-map-trigger">
            <i class="fa-solid fa-expand"></i> <?php echo _t('puno.map_btn_open'); ?>
        </button>
    </div>

    <!-- SECCIÓN: Detalle de Ruta Peruana (Mapas Reales) -->
    <div class="ph-peru-detail-grid">
        <!-- Llamita señalando entre los dos mapas -->
        <img src="<?php echo URLROOT; ?>/img/objetos_onta/llama_puno_onta.png" alt="Guía Puno" class="ph-center-llama">

        <!-- Card: Vuelo Nacional -->
        <div class="ph-map-card">
            <div class="ph-map-card-header">
                <div class="ph-map-icon plane-bg"><i class="fa-solid fa-plane-up"></i></div>
                <div class="ph-map-title">
                    <h4><?php echo _t('puno.map_lima_jul_title'); ?></h4>
                    <span><?php echo _t('puno.map_lima_jul_sub'); ?></span>
                </div>
            </div>
            <div class="ph-map-iframe-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d12000000.840068325!2d-78.88407734291447!3d-13.716581501326518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e4!4m5!1s0x9105c5f619ee3ec7%3A0x14206cb9cc452e4a!2sLima!3m2!1d-12.0466888!2d-77.04308859999999!4m5!1s0x9167f3e5361625b9%3A0x2a1629113760cbfc!2sJuliaca!3m2!1d-15.4996879!2d-70.12965299999999!5e0!3m2!1ses-419!2spe!4v1777913123598!5m2!1ses-419!2spe" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="ph-map-info">
                <p><i class="fa-solid fa-clock"></i> <?php echo _t('puno.map_lima_jul_time'); ?></p>
                <p><i class="fa-solid fa-ticket"></i> <?php echo _t('puno.map_lima_jul_info'); ?></p>
            </div>
        </div>

        <!-- Card: Tramo Terrestre -->
        <div class="ph-map-card ph-relative-card">
            <div class="ph-map-card-header">
                <div class="ph-map-icon car-bg"><i class="fa-solid fa-car"></i></div>
                <div class="ph-map-title">
                    <h4><?php echo _t('puno.map_jul_puno_title'); ?></h4>
                    <span><?php echo _t('puno.map_jul_puno_sub'); ?></span>
                </div>
            </div>
            <div class="ph-map-iframe-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d245749.5246777083!2d-70.29267151049581!3d-15.688849645934142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x9167f3e5361625b9%3A0x2a1629113760cbfc!2sJuliaca!3m2!1d-15.4996879!2d-70.12965299999999!4m5!1s0x915d398661858e7b%3A0x8849467650f01062!2sPuno!3m2!1d-15.8402218!2d-70.021911!5e0!3m2!1ses-419!2spe!4v1777914444555!5m2!1ses-419!2spe" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="ph-map-info">
                <p><i class="fa-solid fa-van-shuttle"></i> <?php echo _t('puno.map_jul_puno_time'); ?></p>
                <p><i class="fa-solid fa-shield-check"></i> <?php echo _t('puno.map_jul_puno_info'); ?></p>
            </div>
        </div>
    </div>

    <div class="ph-gg-container">
        <!-- Interactive Map Selector -->
            <div class="ph-gg-map-area">
                <!-- Decoración: Llama ONTA sobre el mapa -->
                <img src="<?php echo URLROOT; ?>/img/objetos_onta/llama_onta.png" alt="Llama ONTA" class="ph-deco-llama">

                <!-- Botón Cerrar (Solo visible en fullscreen) -->
                <button id="btn-close-interactive-map" class="ph-gg-close-btn">
                    <i class="fa-solid fa-compress"></i> <?php echo _t('puno.map_btn_close'); ?>
                </button>
                
                <!-- Controles de Zoom -->
                <div class="ph-gg-zoom-controls">
                    <button id="btn-gg-zoom-in" title="<?php echo _t('puno.map_zoom_in'); ?>"><i class="fa-solid fa-plus"></i></button>
                    <button id="btn-gg-zoom-out" title="<?php echo _t('puno.map_zoom_out'); ?>"><i class="fa-solid fa-minus"></i></button>
                </div>

                <div class="ph-gg-map-wrapper">
                    <svg viewBox="0 0 1000 500" class="ph-gg-svg-map">
                    <!-- Real World Map Background -->
                    <image href="https://upload.wikimedia.org/wikipedia/commons/e/ec/World_map_blank_without_borders.svg" x="0" y="0" width="1000" height="500" opacity="0.15" preserveAspectRatio="xMidYMid meet" filter="url(#map-filter)" />
                    
                    <defs>
                        <filter id="map-filter">
                            <feColorMatrix type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 1 0" />
                        </filter>
                    </defs>

                    <!-- Connection Lines (Hidden by default, shown via JS) -->
                    <g id="flight-paths">
                        <!-- NA to SA -->
                        <path id="path-na" class="flight-line" d="M 200,130 Q 230,200 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- CA to LIMA -->
                        <path id="path-ca" class="flight-line" d="M 200,190 Q 230,230 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- SA to LIMA (Short path) -->
                        <path id="path-sa" class="flight-line" d="M 320,250 Q 290,255 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- EU to SA -->
                        <path id="path-eu" class="flight-line" d="M 480,110 Q 370,180 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- EE to LIMA -->
                        <path id="path-ee" class="flight-line" d="M 610,80 Q 420,180 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- AS to SA -->
                        <path id="path-as" class="flight-line" d="M 840,150 Q 550,200 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- AF to SA -->
                        <path id="path-af_ru" class="flight-line" d="M 520,200 Q 390,240 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        <!-- OC to SA -->
                        <path id="path-oc" class="flight-line" d="M 850,320 Q 550,300 260,280" fill="none" stroke="var(--ph-pink)" stroke-width="2" stroke-dasharray="6,6"/>
                        
                        <!-- LIMA to JULIACA (Domestic Plane) -->
                        <path id="path-lim-jul" class="flight-line" style="stroke-dashoffset: 0; opacity: 1; stroke-width: 1.5;" d="M 260,280 L 275,288" fill="none" stroke="#4285F4" stroke-dasharray="2,2"/>
                        
                        <!-- JULIACA to PUNO (Ground Path) -->
                        <path id="path-jul-pun" class="flight-line" style="stroke-dashoffset: 0; opacity: 1; stroke-width: 1.5;" d="M 275,288 L 285,295" fill="none" stroke="#DEB05A" />
                    </g>

                    <!-- Animated Plane (moves along the active path) -->
                    <g id="animated-plane" style="opacity: 0; filter: drop-shadow(0 0 5px var(--ph-pink));">
                        <!-- Airplane Icon rotated 90deg to point Right (0 degrees) -->
                        <path d="M21,16v-2l-8-5V3.5C13,2.67,12.33,2,11.5,2S10,2.67,10,3.5V9l-8,5v2l8-2.5V19l-2,1.5V22l3.5-1l3.5,1v-1.5L13,19v-5.5L21,16z" 
                              fill="var(--ph-pink)" 
                              transform="rotate(90) translate(-12, -12) scale(1.2)" />
                        <animateMotion dur="4s" repeatCount="indefinite" rotate="auto" path="" />
                    </g>

                    <!-- Nodes (Continents & Peru Points) -->
                    
                    <!-- LIMA (Destination/Hub) -->
                    <g class="map-node node-lima" transform="translate(260, 280)">
                        <circle cx="0" cy="0" r="8" fill="var(--ph-pink)" class="pulse-circle"/>
                        <circle cx="0" cy="0" r="4" fill="#fff"/>
                        <text x="-40" y="5" fill="#fff" font-size="12" font-weight="bold" font-family="Montserrat">LIMA</text>
                    </g>

                    <!-- JULIACA (Domestic Hub) -->
                    <g class="map-node node-juliaca" transform="translate(275, 288)">
                        <circle cx="0" cy="0" r="6" fill="#4285F4" class="pulse-circle" style="animation-delay: 0.5s;"/>
                        <circle cx="0" cy="0" r="3" fill="#fff"/>
                        <text x="10" y="5" fill="#4285F4" font-size="10" font-weight="bold" font-family="Montserrat">JULIACA</text>
                    </g>

                    <!-- PUNO (Final Destination) -->
                    <g class="map-node node-puno" transform="translate(285, 295)">
                        <circle cx="0" cy="0" r="10" fill="#DEB05A" class="pulse-circle" style="animation-delay: 1s;"/>
                        <circle cx="0" cy="0" r="5" fill="#fff"/>
                        <!-- Destination Flag -->
                        <line x1="-2" y1="-6" x2="-2" y2="-20" stroke="#fff" stroke-width="2" />
                        <path d="M -2,-20 L 8,-15 L -2,-10 Z" fill="#fff" />
                        <text x="15" y="15" fill="#DEB05A" font-size="12" font-weight="extrabold" font-family="Montserrat">PUNO</text>
                    </g>

                    <!-- North America -->
                    <g class="map-node continent-node active" data-region="na" transform="translate(200, 130)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="-40" y="-10" text-anchor="middle" class="node-label"><?php echo _t('puno.continent_na'); ?></text>
                    </g>

                    <!-- Central America -->
                    <g class="map-node continent-node" data-region="ca" transform="translate(200, 190)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="-50" y="15" class="node-label"><?php echo _t('puno.continent_ca'); ?></text>
                    </g>

                    <!-- South America -->
                    <g class="map-node continent-node" data-region="sa" transform="translate(320, 250)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="25" y="25" class="node-label"><?php echo _t('puno.continent_sa'); ?></text>
                    </g>

                    <!-- Europe -->
                    <g class="map-node continent-node" data-region="eu" transform="translate(480, 110)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="-30" y="-30" text-anchor="middle" class="node-label"><?php echo _t('puno.continent_eu'); ?></text>
                    </g>

                    <!-- Eastern Europe -->
                    <g class="map-node continent-node" data-region="ee" transform="translate(610, 80)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="30" y="-20" class="node-label"><?php echo _t('puno.continent_ee'); ?></text>
                    </g>

                    <!-- Asia -->
                    <g class="map-node continent-node" data-region="as" transform="translate(840, 150)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="0" y="-35" text-anchor="middle" class="node-label"><?php echo _t('puno.continent_as'); ?></text>
                    </g>

                    <!-- Africa -->
                    <g class="map-node continent-node" data-region="af_ru" transform="translate(520, 200)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="0" y="40" text-anchor="middle" class="node-label"><?php echo _t('puno.continent_af'); ?></text>
                    </g>

                    <!-- Oceania -->
                    <g class="map-node continent-node" data-region="oc" transform="translate(850, 320)">
                        <circle cx="0" cy="0" r="25" class="node-bg"/>
                        <circle cx="0" cy="0" r="6" class="node-dot"/>
                        <text x="0" y="40" text-anchor="middle" class="node-label"><?php echo _t('puno.continent_oc'); ?></text>
                    </g>
                </svg>
            </div>

                <!-- Dynamic Panel (Overlay Legend) - STORYTELLING VERSION -->
                <div class="ph-gg-panel ph-gg-panel-v2 ph-gg-story-panel">
                    <div class="ph-gg-panel-header">
                        <h3 id="gg-origin-marker" class="ph-gg-selected-title"><i class="fa-solid fa-earth-americas"></i> <?php echo _t('puno.continent_na'); ?></h3>
                        <div class="ph-gg-dest-badge"><?php echo _t('puno.legend_dest'); ?></div>
                    </div>
                    
                    <div class="ph-gg-story-route">
                        <!-- Step 1: International -->
                        <div class="ph-story-item">
                            <div class="ph-story-icon"><i class="fa-solid fa-plane"></i></div>
                            <div class="ph-story-text">
                                <strong><?php echo _t('puno.legend_intl'); ?></strong>
                                <span><?php echo _t('puno.legend_intl_sub'); ?></span>
                            </div>
                        </div>
                        <div class="ph-story-arrow"><i class="fa-solid fa-chevron-down"></i></div>
                        
                        <!-- Step 2: Domestic Plane -->
                        <div class="ph-story-item">
                            <div class="ph-story-icon plane-domestic"><i class="fa-solid fa-plane-up"></i></div>
                            <div class="ph-story-text">
                                <strong><?php echo _t('puno.legend_dom'); ?></strong>
                                <span><?php echo _t('puno.legend_dom_sub'); ?></span>
                            </div>
                        </div>
                        <div class="ph-story-arrow"><i class="fa-solid fa-chevron-down"></i></div>

                        <!-- Step 3: Ground -->
                        <div class="ph-story-item">
                            <div class="ph-story-icon car-icon"><i class="fa-solid fa-car-side"></i></div>
                            <div class="ph-story-text">
                                <strong><?php echo _t('puno.legend_ground'); ?></strong>
                                <span><?php echo _t('puno.legend_ground_sub'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="ph-gg-data-grid" style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid rgba(255,255,255,0.05);">
                        <div class="ph-gg-data-card">
                            <div class="ph-gg-icon"><i class="fa-solid fa-tower-observation"></i></div>
                            <div class="ph-gg-info">
                                <h5><?php echo _t('puno.hub_title'); ?></h5>
                                <p id="gg-data-hubs"><?php echo _t('puno.sa_hubs'); ?></p>
                            </div>
                        </div>
                        <div class="ph-gg-data-card">
                            <div class="ph-gg-icon"><i class="fa-solid fa-clock"></i></div>
                            <div class="ph-gg-info">
                                <h5><?php echo _t('puno.flight_time'); ?></h5>
                                <p id="gg-data-time"><?php echo _t('puno.sa_time'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="ph-gg-panel-footer">
                        <p><?php echo _t('puno.arrival_note'); ?></p>
                    </div>
                </div>
        </div>


</section>

<!-- ====================================================
     SECCIÓN: Cómo Llegar — Live Flight Tracker (Propuesta 1)
     ==================================================== -->
<!-- ====================================================
     SECCIÓN: Infografía de Viaje Integrada (HUD)
     ==================================================== -->
<section class="ph-section ph-infographic-section" id="ruta-viaje" style="background: #0b0f19; overflow: hidden; position: relative;">
    <!-- Decoraciones Flotantes -->
    <img src="<?php echo URLROOT; ?>/img/objetos_onta/persona_onta.png" alt="Guía ONTA" class="ph-deco-mascot">
    <img src="<?php echo URLROOT; ?>/img/objetos_onta/avion_onta.png" alt="Avión ONTA" class="ph-deco-plane">

    <div class="container" style="position: relative; z-index: 5;">
        <div class="ph-section-header" style="margin-bottom: 5rem;">
            <span class="ph-label" style="background: rgba(222,176,90,0.2); color: var(--ph-gold);"><?php echo _t('puno.infographic_badge'); ?></span>
            <h2 style="color: white; font-family: 'Playfair Display', serif; font-size: 3rem;"><?php echo _t('puno.infographic_title'); ?></h2>
            <p class="ph-desc" style="color: rgba(255,255,255,0.6); font-size: 1.1rem;"><?php echo _t('puno.infographic_desc'); ?></p>
        </div>

        <div class="ph-visual-timeline">
            <!-- PASO 1 -->
            <div class="ph-timeline-card">
                <div class="ph-card-num">01</div>
                <div class="ph-card-visual step-1-bg">
                    <i class="fa-solid fa-earth-americas"></i>
                </div>
                <div class="ph-card-body">
                    <h3><?php echo _t('puno.v2_step1_title'); ?></h3>
                    <span class="ph-badge-simple"><?php echo _t('puno.v2_step1_badge'); ?></span>
                    <p><?php echo _t('puno.v2_step1_desc'); ?></p>
                </div>
            </div>

            <div class="ph-timeline-connector"><i class="fa-solid fa-chevron-right"></i></div>

            <!-- PASO 2 -->
            <div class="ph-timeline-card">
                <div class="ph-card-num">02</div>
                <div class="ph-card-visual step-2-bg">
                    <i class="fa-solid fa-plane-arrival"></i>
                </div>
                <div class="ph-card-body">
                    <h3><?php echo _t('puno.v2_step2_title'); ?></h3>
                    <span class="ph-badge-simple"><?php echo _t('puno.v2_step2_badge'); ?></span>
                    <p><?php echo _t('puno.v2_step2_desc'); ?></p>
                </div>
            </div>

            <div class="ph-timeline-connector"><i class="fa-solid fa-chevron-right"></i></div>

            <!-- PASO 3 -->
            <div class="ph-timeline-card">
                <div class="ph-card-num">03</div>
                <div class="ph-card-visual step-3-bg">
                    <i class="fa-solid fa-plane-up"></i>
                </div>
                <div class="ph-card-body">
                    <h3><?php echo _t('puno.v2_step3_title'); ?></h3>
                    <span class="ph-badge-simple"><?php echo _t('puno.v2_step3_badge'); ?></span>
                    <p><?php echo _t('puno.v2_step3_desc'); ?></p>
                </div>
            </div>

            <div class="ph-timeline-connector"><i class="fa-solid fa-chevron-right"></i></div>

            <!-- PASO 4 -->
            <div class="ph-timeline-card ph-card-dest">
                <div class="ph-card-num">04</div>
                <div class="ph-card-visual step-4-bg">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="ph-card-body">
                    <h3><?php echo _t('puno.v2_step4_title'); ?></h3>
                    <span class="ph-badge-simple gold"><?php echo _t('puno.v2_step4_badge'); ?></span>
                    <p><?php echo _t('puno.v2_step4_desc'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Alojamiento (Hoteles)
     ==================================================== -->
<section class="ph-section ph-hotels-section" id="hoteles" style="background: #fdfdfd; position: relative;">
    <div class="container">
        <div class="ph-section-header" style="margin-bottom: 4rem; text-align: center;">
            <span class="ph-label" style="background: rgba(14, 116, 144, 0.1); color: #0e7490;"><i class="fa-solid fa-bed"></i> <?php echo _t('puno.hotels_badge'); ?></span>
            <h2 style="font-family: 'Playfair Display', serif; font-size: 2.8rem; color: var(--p-indigo); margin-top: 1rem;"><?php echo _t('puno.hotels_title'); ?></h2>
            <p class="ph-desc" style="color: #666; font-size: 1.1rem; max-width: 700px; margin: 1rem auto 0;"><?php echo _t('puno.hotels_desc'); ?></p>
        </div>

        <div class="ph-hotels-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2.5rem;">
            <!-- Hotel GHL Lago Titicaca — SEDE ONTA (primero) -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 15px 40px rgba(180,120,0,0.15); border: 2px solid rgba(180,120,0,0.25); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease; position: relative;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 25px 50px rgba(180,120,0,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(180,120,0,0.15)';">
                <!-- Ribbon "Sede ONTA" -->
                <div style="position: absolute; top: 0; left: 0; background: linear-gradient(135deg, #b07c00, #e8aa00); color: white; font-size: 0.7rem; font-weight: 800; padding: 6px 18px 6px 12px; border-radius: 0 0 14px 0; letter-spacing: 0.08em; text-transform: uppercase; z-index: 10; display: flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(180,120,0,0.3);">
                    <i class="fa-solid fa-star"></i> Sede ONTA
                </div>
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/hgl.jpg" alt="GHL Hotel Lago Titicaca" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.25), transparent);"></div>
                    <div style="position: absolute; top: 15px; right: 15px; background: linear-gradient(135deg, #b07c00, #e8aa00); padding: 6px 14px; border-radius: 100px; font-size: 0.75rem; font-weight: 800; color: white; box-shadow: 0 5px 15px rgba(180,120,0,0.4); backdrop-filter: blur(5px); letter-spacing: 0.05em; display: flex; align-items: center; gap: 5px;"><i class="fa-solid fa-location-pin"></i> ONTA PERÚ PUNO</div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 0.5rem; color: var(--p-indigo); line-height: 1.3;">GHL Hotel Lago Titicaca</h3>
                    <span style="font-size: 0.75rem; font-weight: 700; color: #b07c00; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 1.2rem; display: block;">★ Hotel Oficial del Congreso</span>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Isla Esteves s/n, Lago Titicaca, Sesquicentenario, Puno</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> (051) 367780</li>
                    </ul>
                    <a href="https://www.ghllagotiticaca.com/?partner=4153&utm_source=google&utm_medium=mybusiness" target="_blank" style="display: block; text-align: center; background: linear-gradient(135deg, #b07c00, #e8aa00); color: white; font-weight: 700; padding: 0.9rem; border-radius: 12px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(180,120,0,0.3);" onmouseover="this.style.opacity='0.9'; this.style.transform='scale(1.02)';" onmouseout="this.style.opacity='1'; this.style.transform='scale(1)';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 1 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h1.jpg" alt="Lake Titicaca Hotel" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-person-walking" style="color: var(--pink);"></i> 850m <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Lake Titicaca Hotel</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Av. Uros Chulluni 195, Puno 00000</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> (051) 365525</li>
                    </ul>
                    <a href="https://www.laketiti.com/" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 2 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h2.jpg" alt="Sonesta Hotel Posadas Del Inca Puno" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 1.9km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Sonesta Posadas Del Inca</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> 5XGV+7X5, Sesquicentenario 610, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 051364113</li>
                    </ul>
                    <a href="https://www.sonestapipuno.com" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 3 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h3.jpg" alt="Casa Andina Premium Puno" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-person-walking" style="color: var(--pink);"></i> 850m <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Casa Andina Premium</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Sesquicentenario 1970, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 051363992</li>
                    </ul>
                    <a href="https://www.casa-andina.com" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 4 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h4.jpg" alt="Kaaro Hotel El Buho" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 5.1km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Kaaro Hotel El Buho</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Lambayeque N° 144, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 944786258</li>
                    </ul>
                    <a href="https://hotels.cloudbeds.com/reservation/yRioiN" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 5 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h5.jpg" alt="Casa Don Jose B & B" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 5.7km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Casa Don Jose B & B</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Velasco Astete 132-134, Puno 21002</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 951890888</li>
                    </ul>
                    <a href="https://wa.me/51951890888" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><i class="fa-brands fa-whatsapp"></i> <?php echo _t('puno.hotels_contact'); ?></a>
                </div>
            </div>

            <!-- Hotel 6 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h6.jpg" alt="Titicaca Halso Lodge" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 3km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Titicaca Halso Lodge</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> 529M+3C, Puno</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 921295094</li>
                    </ul>
                    <a href="https://wa.me/51921295094" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><i class="fa-brands fa-whatsapp"></i> <?php echo _t('puno.hotels_contact'); ?></a>
                </div>
            </div>

            <!-- Hotel 7 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h7.jpg" alt="Hotel hacienda Plaza de Armas" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 5.4km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Hotel Hacienda Plaza de Armas</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Jr. Puno 419, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 051367340</li>
                    </ul>
                    <a href="https://www.hhp.com.pe/" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 8 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h8.jpg" alt="Hotel Hacienda Puno Centro Histórico" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 5.2km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Hotel Hacienda Puno Centro</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Jr. Deustua 297, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 051356109</li>
                    </ul>
                    <a href="https://www.hhp.com.pe/hotel-hacienda-puno/" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><?php echo _t('puno.hotels_website'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; margin-left: 5px;"></i></a>
                </div>
            </div>

            <!-- Hotel 9 -->
            <div class="ph-hotel-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                <div class="ph-hotel-img" style="height: 220px; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/hoteles/h9.jpg" alt="Tierra Viva Puno Plaza" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 14px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--p-indigo); box-shadow: 0 5px 15px rgba(0,0,0,0.1); backdrop-filter: blur(5px);"><i class="fa-solid fa-car" style="color: #0e7490;"></i> 5.3km <?php echo _t('puno.hotels_distance'); ?></div>
                </div>
                <div class="ph-hotel-body" style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="font-family: var(--font-serif); font-size: 1.35rem; margin-bottom: 1.2rem; color: var(--p-indigo); line-height: 1.3;">Tierra Viva Puno Plaza</h3>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; flex: 1;">
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: flex-start;"><i class="fa-solid fa-location-dot" style="color: #ccc; margin-top: 3px; min-width: 15px;"></i> Grau 270, Puno 21001</li>
                        <li style="font-size: 0.95rem; color: #555; margin-bottom: 0.8rem; display: flex; gap: 0.8rem; align-items: center;"><i class="fa-solid fa-phone" style="color: #ccc; min-width: 15px;"></i> 051602270</li>
                    </ul>
                    <a href="https://wa.me/51051602270" target="_blank" style="display: block; text-align: center; background: rgba(14, 116, 144, 0.05); color: #0e7490; font-weight: 600; padding: 0.9rem; border-radius: 12px; text-decoration: none; border: 1px solid rgba(14, 116, 144, 0.1); transition: all 0.3s ease;" onmouseover="this.style.background='#0e7490'; this.style.color='white';" onmouseout="this.style.background='rgba(14, 116, 144, 0.05)'; this.style.color='#0e7490';"><i class="fa-brands fa-whatsapp"></i> <?php echo _t('puno.hotels_contact'); ?></a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ====================================================
     SECCIÓN: Protocolo de Altura & Supervivencia
     ==================================================== -->
<section class="ph-section ph-altitude-section" id="protocolo-altura">
    <div class="container">
        <div class="ph-altitude-grid">
            <div class="ph-altitude-info">
                <span class="ph-label ph-label-medical"><?php echo _t('puno.alt_badge'); ?></span>
                <h2 class="ph-text-white"><?php echo _t('puno.alt_title'); ?> <em><?php echo _t('puno.alt_title_accent'); ?></em></h2>
                <p class="ph-desc"><?php echo _t('puno.alt_desc'); ?></p>
                
                <div class="ph-altitude-cards">
                    <div class="ph-alt-card">
                        <div class="ph-alt-icon"><i class="fa-solid fa-droplet"></i></div>
                        <div class="ph-alt-body">
                            <h4><?php echo _t('puno.alt_tip1_title'); ?></h4>
                            <p><?php echo _t('puno.alt_tip1_desc'); ?></p>
                        </div>
                    </div>
                    <div class="ph-alt-card">
                        <div class="ph-alt-icon"><i class="fa-solid fa-bed"></i></div>
                        <div class="ph-alt-body">
                            <h4><?php echo _t('puno.alt_tip2_title'); ?></h4>
                            <p><?php echo _t('puno.alt_tip2_desc'); ?></p>
                        </div>
                    </div>
                    <div class="ph-alt-card">
                        <div class="ph-alt-icon"><i class="fa-solid fa-apple-whole"></i></div>
                        <div class="ph-alt-body">
                            <h4><?php echo _t('puno.alt_tip3_title'); ?></h4>
                            <p><?php echo _t('puno.alt_tip3_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="ph-altitude-visual">
                <div class="ph-elevation-chart-wrap">
                    <div class="ph-chart-header">
                        <span><?php echo _t('puno.alt_chart_label'); ?></span>
                        <strong>0m <i class="fa-solid fa-arrow-right"></i> 3,827m</strong>
                    </div>
                    <svg viewBox="0 0 400 200" class="ph-elevation-svg">
                        <defs>
                            <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="var(--ph-pink)" stop-opacity="0.6"/>
                                <stop offset="100%" stop-color="var(--ph-pink)" stop-opacity="0"/>
                            </linearGradient>
                            <filter id="glow">
                                <feGaussianBlur stdDeviation="2.5" result="coloredBlur"/>
                                <feMerge>
                                    <feMergeNode in="coloredBlur"/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>
                        </defs>
                        <!-- Area -->
                        <path d="M 0,180 C 100,180 150,180 250,50 L 400,50 L 400,200 L 0,200 Z" fill="url(#chartGradient)" />
                        <!-- Line -->
                        <path d="M 0,180 C 100,180 150,180 250,50 L 400,50" fill="none" stroke="var(--ph-pink)" stroke-width="3" stroke-linecap="round" filter="url(#glow)" />
                        
                        <!-- Points -->
                        <circle cx="0" cy="180" r="5" fill="#fff" />
                        <text x="10" y="175" fill="rgba(255,255,255,0.6)" font-size="9" font-family="Montserrat">LIMA (0m)</text>
                        
                        <circle cx="250" cy="50" r="5" fill="#fff" />
                        <text x="180" y="40" fill="rgba(255,255,255,0.6)" font-size="9" font-family="Montserrat">JULIACA (3,825m)</text>
                        
                        <circle cx="390" cy="50" r="7" fill="var(--ph-gold)" class="pulse-gold" />
                        <text x="340" y="35" fill="var(--ph-gold)" font-size="11" font-weight="900" font-family="Montserrat">PUNO</text>
                    </svg>
                </div>
                <img src="<?php echo URLROOT; ?>/img/objetos_onta/llama_doctor.png" alt="Llama Guía" class="ph-llama-doctor-img">
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Google Flights Premium — Guía de Precios
     ==================================================== -->
<section class="ph-section ph-gf-premium-section">
    <div class="ph-gf-bg-glow"></div>
    <div class="container">
        <div class="ph-gf-grid">
            <!-- Info Content -->
            <div class="ph-gf-content">
                <span class="ph-label ph-label-google-dark"><?php echo _t('puno.gf_badge'); ?></span>
                <h2 class="ph-text-white"><?php echo _t('puno.gf_title'); ?></h2>
                <p class="ph-gf-lead ph-text-gray-light"><?php echo _t('puno.gf_subtitle'); ?></p>

                <div class="ph-gf-features-grid">
                    <div class="ph-gf-feat-card">
                        <div class="ph-feat-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="ph-feat-info">
                            <h4><?php echo _t('puno.gf_step1_title'); ?></h4>
                            <p><?php echo _t('puno.gf_step1_desc'); ?></p>
                        </div>
                    </div>
                    <div class="ph-gf-feat-card">
                        <div class="ph-feat-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                        <div class="ph-feat-info">
                            <h4><?php echo _t('puno.gf_step2_title'); ?></h4>
                            <p><?php echo _t('puno.gf_step2_desc'); ?></p>
                        </div>
                    </div>
                    <div class="ph-gf-feat-card">
                        <div class="ph-feat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="ph-feat-info">
                            <h4><?php echo _t('puno.gf_step3_title'); ?></h4>
                            <p><?php echo _t('puno.gf_step3_desc'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="ph-gf-cta-area">
                    <a id="btn-gf-global" href="https://www.google.com/travel/flights?q=Flights%20to%20JUL%20from%20LIM%20on%202026-05-10" target="_blank" class="ph-btn-gf-premium-dark">
                        <div class="ph-gf-logo-mini">
                             <svg viewBox="0 0 24 24" width="24" height="24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                        </div>
                        <span><?php echo _t('puno.gf_btn'); ?></span>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>

            <!-- Visual Column -->
            <div class="ph-gf-visual">
                <!-- Llamita buscando vuelos (Visual Principal) -->
                <div class="ph-llama-focus-wrap">
                    <img src="<?php echo URLROOT; ?>/img/objetos_onta/llama_buscando_onta.png" alt="Llama Buscando" class="ph-searching-llama-hero">
                </div>
            </div>
        </div>
    </div>
</section>



<!-- ====================================================
     SECCIÓN: Circuito Sur Andino — Ruta Interactiva
     ==================================================== -->
<section class="ph-section ph-circuit-section" id="circuito">
    <div class="container">
        <div class="ph-section-header">
            <span class="ph-label"><?php echo _t('puno.circuit_badge'); ?></span>
            <?php
$ctitle2 = _t('puno.circuit_title');
$cparts2 = explode(' ', $ctitle2);
echo '<h2>';
if (count($cparts2) >= 2) {
    $clast2 = array_pop($cparts2);
    echo implode(' ', $cparts2) . ' <em>' . $clast2 . '</em>';
}
else {
    echo $ctitle2;
}
echo '</h2>';
?>
            <p class="ph-desc"><?php echo _t('puno.circuit_desc'); ?></p>
        </div>

        <div class="ph-circuit-layout-v2">

            <!-- ===== MAPA PROTAGONISTA (Arriba, 100% ancho) ===== -->
            <div class="ph-map-col-v2">
                <div class="ph-map-container-v2">
                    <div class="ph-map-badge"><?php echo _t('puno.circuit_map_badge'); ?></div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m30!1m8!1m3!1d2448924.8516510795!2d-72.3145185!3d-14.9620779!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0x91424a487785b9b3:0xa3c4a612b9942036!2sArequipa!3m2!1d-16.4057001!2d-71.5400994!4m5!1s0x915d6985f4e74135:0x1e341dd8f24d32cf!2sPuno!3m2!1d-15.8402218!2d-70.0218805!4m5!1s0x916dd5d826598431:0x2aa996cc2318315d!2sCusco!3m2!1d-13.53195!2d-71.96746259999999!5e1!3m2!1ses!2spe!4v1773332928478!5m2!1ses!2spe"
                        width="100%" height="100%" style="border:0;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Circuito Sur Andino"></iframe>
                </div>
            </div>

            <!-- ===== PARADAS EN GRID (Abajo, 4 columnas o 2x2) ===== -->
            <div class="ph-stops-grid-v2">

                <!-- 01: Arequipa -->
                <div class="ph-route-card-v2">
                    <div class="ph-route-card-img-wrap-v2 ph-carousel" data-interval="3000">
                        <img class="ph-c-img active" src="<?php echo URLROOT; ?>/img/puno/arequipa.jpg" alt="Arequipa">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/arequipa2.jpg" alt="Arequipa">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/arequipa3.jpg" alt="Arequipa">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/arequipa4.jpg" alt="Arequipa">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/arequipa5.jpg" alt="Arequipa">
                        <span class="ph-route-num-v2">01</span>
                    </div>
                    <div class="ph-route-card-body-v2">
                        <span class="ph-route-tag-v2">Punto de Partida</span>
                        <h4><?php echo _t('puno.circuit_stop1_title'); ?></h4>
                        <p><?php echo _t('puno.circuit_stop1_desc'); ?></p>
                        <div class="ph-route-foot-v2">
                            <span>⏱ <?php echo _t('puno.circuit_stop1_time'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- 02: PUNO — SEDE ONTA 2026 -->
                <div class="ph-route-card-v2 ph-card-venue-v2">
                    <div class="ph-venue-banner-v2">⭐ SEDE ONTA 2026 — PUNO</div>
                    <div class="ph-route-card-img-wrap-v2 ph-carousel" data-interval="3000">
                        <img class="ph-c-img active" src="<?php echo URLROOT; ?>/img/puno/puno.jpg" alt="Puno">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/puno2.webp" alt="Puno">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/puno3.jpg" alt="Puno">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/puno4.jpg" alt="Puno">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/puno5.jpg" alt="Puno">
                        <span class="ph-route-num-v2">02</span>
                    </div>
                    <div class="ph-route-card-body-v2">
                        <span class="ph-route-tag-v2 ph-tag-pink-v2">🎯 SEDE PRINCIPAL</span>
                        <h4><?php echo _t('puno.circuit_stop2_title'); ?></h4>
                        <p><?php echo _t('puno.circuit_stop2_desc'); ?></p>
                        <div class="ph-route-foot-v2 ph-foot-venue">
                            <span class="ph-time-venue-v2">📍 ONTA 2026</span>
                            <a href="<?php echo URLROOT; ?>/inscriptions" class="ph-venue-cta-btn-v2">Reǵistrate →</a>
                        </div>
                    </div>
                </div>

                <!-- 03: Cusco -->
                <div class="ph-route-card-v2">
                    <div class="ph-route-card-img-wrap-v2 ph-carousel" data-interval="3000">
                        <img class="ph-c-img active" src="<?php echo URLROOT; ?>/img/puno/cuzco.jpg" alt="Cusco">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/cuzco2.jpeg" alt="Cusco">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/cuzco3.jpg" alt="Cusco">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/cuzco4.jpg" alt="Cusco">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/cuzco5.jpg" alt="Cusco">
                        <span class="ph-route-num-v2">03</span>
                    </div>
                    <div class="ph-route-card-body-v2">
                        <span class="ph-route-tag-v2">Ruta Imperial</span>
                        <h4><?php echo _t('puno.circuit_stop3_title'); ?></h4>
                        <p><?php echo _t('puno.circuit_stop3_desc'); ?></p>
                        <div class="ph-route-foot-v2">
                            <span>🚆 <?php echo _t('puno.circuit_stop3_time'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- 04: Machu Picchu -->
                <div class="ph-route-card-v2 ph-card-gold-v2">
                    <div class="ph-route-card-img-wrap-v2 ph-carousel" data-interval="3000">
                        <img class="ph-c-img active" src="<?php echo URLROOT; ?>/img/puno/MachuPichu.jpg" alt="Machu Picchu">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/MachuPichu2.jpg" alt="Machu Picchu">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/MachuPichu3.jpg" alt="Machu Picchu">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/MachuPichu4.webp" alt="Machu Picchu">
                        <img class="ph-c-img" src="<?php echo URLROOT; ?>/img/puno/MachuPichu5.webp" alt="Machu Picchu">
                        <span class="ph-route-num-v2">04</span>
                    </div>
                    <div class="ph-route-card-body-v2">
                        <span class="ph-route-tag-v2 ph-tag-gold-v2">Final de Ruta</span>
                        <h4><?php echo _t('puno.circuit_stop4_title'); ?></h4>
                        <p><?php echo _t('puno.circuit_stop4_desc'); ?></p>
                        <div class="ph-route-foot-v2">
                            <span>✨ <?php echo _t('puno.circuit_stop4_time'); ?></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- ====================================================
     CTA FINAL — Inmersivo
     ==================================================== -->
<section class="ph-final-cta">
    <div class="ph-cta-bg" style="background-image: url('<?php echo URLROOT; ?>/img/puno/titicaca.jpg');"></div>
    <div class="ph-cta-overlay"></div>
    <div class="ph-cta-body">
        <div class="ph-cta-eyebrow">
            <span class="ph-dot-live"></span>
            <?php echo _t('puno.cta_eyebrow'); ?>
        </div>
        <?php
$ctitle3 = _t('puno.cta_title');
$cparts3 = explode(' ', $ctitle3);
echo '<h2 class="ph-cta-h2">';
if (count($cparts3) >= 2) {
    $clast3 = array_pop($cparts3);
    echo implode(' ', $cparts3) . ' <em>' . $clast3 . '</em>';
}
else {
    echo $ctitle3;
}
echo '</h2>';
?>
        <p class="ph-cta-p"><?php echo _t('puno.cta_subtitle'); ?></p>
        <div class="ph-cta-buttons">
            <a href="<?php echo URLROOT; ?>/inscriptions" class="ph-cta-btn-primary">
                <i class="fa-solid fa-user-plus"></i> <?php echo _t('puno.cta_btn_register'); ?>
            </a>
            <a href="<?php echo URLROOT; ?>/pages/programacion" class="ph-cta-btn-ghost">
                <i class="fa-solid fa-calendar-days"></i> <?php echo _t('puno.cta_btn_program'); ?>
            </a>
        </div>
        <!-- Indicadores de confianza -->
        <div class="ph-trust-row">
            <div class="ph-trust-item"><i class="fa-solid fa-earth-americas"></i><span><?php echo _t('puno.trust_countries'); ?></span></div>
            <div class="ph-trust-div"></div>
            <div class="ph-trust-item"><i class="fa-solid fa-users-between-lines"></i><span><?php echo _t('puno.trust_scientists'); ?></span></div>
            <div class="ph-trust-div"></div>
            <div class="ph-trust-item"><i class="fa-solid fa-award"></i><span><?php echo _t('puno.trust_edition'); ?></span></div>
        </div>
    </div>
</section>

<!-- ====================================================
     CSS PREMIUM — EXPLORA PUNO v2
     ==================================================== -->
<style>
/* -- Variables ----------------------------------------- */
:root {
    --ph-gold:   #DEB05A;
    --ph-pink:   #E74C74;
    --ph-dark:   #0d0b18;
    --ph-indigo: #1a1625;
    --ph-glass:  rgba(255,255,255,0.04);
    --ph-border: rgba(255,255,255,0.08);
}

/* -- Hero Cinematográfico ------------------------------ */
.ph-hero {
    height: 100vh;
    min-height: 600px;
    position: relative;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}

.ph-hero-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    transform: scale(1.05);
    animation: heroZoom 20s ease-in-out infinite alternate;
}

@keyframes heroZoom {
    from { transform: scale(1.05); }
    to   { transform: scale(1.12); }
}

.ph-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(10,8,20,0.97) 0%,
        rgba(10,8,20,0.55) 50%,
        rgba(10,8,20,0.2) 100%
    );
}

.ph-hero-content {
    position: relative;
    z-index: 10;
    padding: 0 5vw 6rem;
    max-width: 100%;
}

.ph-hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    color: rgba(255,255,255,0.6);
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
}

.ph-dot-live {
    width: 8px; height: 8px;
    background: #4afe98;
    border-radius: 50%;
    box-shadow: 0 0 10px #4afe98;
    animation: livePulse 1.5s infinite;
}

@keyframes livePulse {
    0%,100% { opacity: 1; }
    50%      { opacity: 0.3; }
}

.ph-hero-h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3.2rem, 8.5vw, 7.5rem);
    color: white;
    line-height: 0.95;
    margin-bottom: 1.5rem;
    letter-spacing: -2px;
}

.ph-hero-h1 em {
    color: var(--ph-gold);
    font-style: italic;
}

.ph-hero-sub {
    font-size: clamp(1rem, 2vw, 1.3rem);
    color: rgba(255,255,255,0.65);
    margin-bottom: 2rem;
    font-weight: 300;
}

.ph-hero-pills {
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.ph-hero-pills span {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    color: rgba(255,255,255,0.8);
    padding: 0.5rem 1.2rem;
    border-radius: 100px;
    font-size: 0.85rem;
    font-weight: 500;
    backdrop-filter: blur(8px);
}

.ph-scroll-cta {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    color: white;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.ph-scroll-ring {
    width: 48px; height: 48px;
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    animation: bounceDown 2s infinite;
}

@keyframes bounceDown {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(8px); }
}

.ph-hero-numbers {
    position: absolute;
    bottom: 5rem;
    right: 5vw;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 1.5rem;
}

.ph-num {
    text-align: right;
}

.ph-num strong {
    display: block;
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--ph-gold);
    line-height: 1;
}

.ph-num span {
    display: block;
    font-size: 0.72rem;
    color: rgba(255,255,255,0.45);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* -- Galería Inmersiva ---------------------------------- */
.ph-gallery-section {
    background: #000;
}

.ph-gallery-header {
    padding: 5rem 5vw 3rem;
    color: white;
}

.ph-gallery-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: white;
    line-height: 1.1;
    margin-top: 0.8rem;
}

.ph-gallery-header h2 em { color: var(--ph-gold); font-style: italic; }

.ph-masonry {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr;
    gap: 4px;
    height: 70vh;
    min-height: 500px;
}

.ph-photo-tall { grid-row: span 2; }

.ph-photo-col {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.ph-photo {
    position: relative;
    overflow: hidden;
    flex: 1;
    cursor: pointer;
}

.ph-photo img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.4,0,0.2,1);
    display: block;
}

.ph-photo:hover img { transform: scale(1.08); }

.ph-photo-caption {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
    transform: translateY(100%);
    transition: transform 0.4s ease;
}

.ph-photo:hover .ph-photo-caption { transform: translateY(0); }

.ph-photo-caption h3 {
    color: white;
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    margin-bottom: 0.3rem;
}

.ph-photo-caption p { color: rgba(255,255,255,0.7); font-size: 0.85rem; }

/* -- Labels y helpers ---------------------------------- */
.ph-label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(222,176,90,0.12);
    border: 1px solid rgba(222,176,90,0.25);
    color: var(--ph-gold);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.ph-label-gold { background: rgba(222,176,90,0.18); }

/* -- Sections Base ------------------------------------- */
.ph-section { padding: 7rem 0; }

.ph-section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.ph-section-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 3.2rem);
    color: var(--ph-indigo);
    margin: 1rem 0 0.5rem;
    line-height: 1.15;
}

.ph-section-header h2 em { color: var(--ph-pink); font-style: italic; }

.ph-desc {
    color: #888;
    font-size: 1rem;
    max-width: 520px;
    margin: 0 auto;
    line-height: 1.6;
}

.ph-light-header h2 em { color: var(--ph-gold); }
.ph-light-header h2 { color: white; }

/* -- Bento Grid Cultura -------------------------------- */
.ph-bento-section { background: #f7f7f9; }

.ph-bento {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: auto auto;
    gap: 1rem;
}

.ph-bento-card {
    border-radius: 20px;
    padding: 2.5rem 2rem;
    min-height: 220px;
    display: flex;
    align-items: flex-end;
    transition: transform 0.4s ease;
    overflow: hidden;
    position: relative;
}

.ph-bento-card:hover { transform: scale(1.02); }

.ph-bento-big {
    grid-column: span 2;
    grid-row: span 2;
    min-height: 460px;
    align-items: flex-end;
}

.ph-bento-wide { grid-column: span 2; }

.ph-bento-content { position: relative; z-index: 2; }

.ph-bento-tag {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 100px;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.8rem;
}

.ph-bento-icon {
    display: block;
    font-size: 2.5rem;
    margin-bottom: 0.8rem;
}

.ph-bento-content h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    line-height: 1.2;
}

.ph-bento-big h3 { font-size: 2.2rem; }

.ph-bento-content p { color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.4; }

.ph-bento-pill {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 0.25rem 0.7rem;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* -- Arrival Tracker Section v4 -------------------------- */
.ph-arrival-tracker-section {
    background: #fff;
    padding: 8rem 0;
}

.ph-tracker-container {
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 4rem;
    align-items: center;
    margin-top: 4rem;
}

.ph-arrival-tracker-section {
    background: #0b0f19; /* Dark background matching the map */
}

.ph-tracker-map-area {
    background: #1a1e2d;
    border-radius: 40px;
    padding: 0;
    height: 600px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 40px 100px rgba(0,0,0,0.5);
    border: 1px solid rgba(255,255,255,0.05);
}

.ph-tracker-iframes {
    width: 100%;
    height: 100%;
    position: relative;
}

.ph-map-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.6s ease;
}

.ph-map-iframe.active {
    opacity: 1;
    visibility: visible;
}

/* Panel Lateral */
.ph-tracker-panel {
    padding-right: 2rem;
}

.ph-hub-tag {
    background: rgba(231, 76, 116, 0.1);
    color: var(--ph-pink);
    padding: 0.3rem 0.8rem;
    border-radius: 100px;
    font-size: 0.65rem;
    font-weight: 800;
    margin-bottom: 1rem;
    display: inline-block;
    border: 1px solid rgba(231, 76, 116, 0.2);
}

.ph-hub-info h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: white;
    margin-bottom: 1rem;
}

.ph-hub-info p {
    color: #94a3b8;
    line-height: 1.6;
    font-size: 1rem;
}

.ph-panel-routes {
    margin-top: 3rem;
}

.ph-routes-label {
    display: block;
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
    color: #64748b;
    letter-spacing: 1.5px;
    margin-bottom: 1.5rem;
}

.ph-route-selector {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.ph-route-selector:hover {
    border-color: rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.05);
}

.ph-route-selector.active {
    background: rgba(231, 76, 116, 0.05);
    border-color: var(--ph-pink);
    box-shadow: 0 10px 30px rgba(231,76,116,0.1);
}

.ph-route-main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.ph-route-name {
    font-weight: 800;
    color: white;
    font-size: 1.05rem;
}

.ph-route-time {
    color: var(--ph-pink);
    font-weight: 700;
    font-size: 0.9rem;
}

.ph-route-short-desc {
    color: #94a3b8;
    font-size: 0.85rem;
    margin: 0;
    line-height: 1.4;
}

.ph-route-actions {
    margin-top: 1.5rem;
}

.ph-btn-map {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    padding: 0.6rem 1.2rem;
    border-radius: 12px;
    color: white;
    font-size: 0.8rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.ph-btn-map:hover {
    background: var(--ph-pink);
    color: white;
    border-color: var(--ph-pink);
    transform: translateX(5px);
}

.ph-btn-map i {
    color: var(--ph-pink);
}

.ph-btn-map:hover i {
    color: white;
}

/* -- Global Gateway Section ---------------------------- */
.ph-global-gateway-section {
    background: #0b0f19; /* Dark background */
    padding: 6rem 0;
    display: flex;
    flex-direction: column;
}

.ph-global-gateway-section .container { order: 1; }
.ph-mobile-map-trigger-container { order: 2; }
.ph-peru-detail-grid { order: 3; }
.ph-gg-container { order: 4; }

@media (min-width: 993px) {
    .ph-gg-container { order: 2; }
    .ph-peru-detail-grid { order: 3; }
    .ph-mobile-map-trigger-container { order: 4; }
}

.ph-gg-container {
    width: 100%;
    background: #0b0f19;
    border-top: 1px solid rgba(255,255,255,0.05);
    border-bottom: 1px solid rgba(255,255,255,0.05);
    overflow: hidden;
    position: relative;
}

/* Interactive Map Area */
.ph-gg-map-area {
    width: 100%;
    height: 70vh;
    min-height: 550px;
    background: radial-gradient(circle at center, #1a1e2d 0%, #0b0f19 100%);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.ph-gg-svg-map {
    width: 100%;
    height: 100%;
    filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
}

.continent-node {
    cursor: pointer;
    transition: all 0.3s ease;
}

.continent-node .node-bg {
    fill: rgba(255,255,255,0.03);
    stroke: rgba(255,255,255,0.1);
    stroke-width: 1;
    transition: all 0.3s ease;
}

.continent-node .node-dot {
    fill: #64748b;
    transition: all 0.3s ease;
}

.continent-node .node-label {
    fill: #94a3b8;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.continent-node:hover .node-bg {
    fill: rgba(231, 76, 116, 0.1);
    stroke: var(--ph-pink);
    r: 30;
}

.continent-node:hover .node-dot {
    fill: var(--ph-pink);
    filter: drop-shadow(0 0 5px var(--ph-pink));
}

.continent-node:hover .node-label {
    fill: #fff;
    opacity: 1;
}

.continent-node.active .node-bg {
    fill: rgba(231, 76, 116, 0.2);
    stroke: var(--ph-pink);
    stroke-width: 2;
    r: 35;
}

.continent-node.active .node-dot {
    fill: var(--ph-pink);
    r: 8;
    filter: drop-shadow(0 0 10px var(--ph-pink));
}

.continent-node.active .node-label {
    fill: #fff;
    opacity: 1;
    font-weight: 800;
}

.flight-line {
    opacity: 0;
    transition: opacity 0.5s ease;
}

.flight-line.active {
    opacity: 1;
    animation: dashAnim 20s linear infinite;
}

@keyframes dashAnim {
    to { stroke-dashoffset: -100; }
}

.pulse-circle {
    animation: pulseMap 2s infinite;
}

@keyframes pulseMap {
    0% { transform: scale(1); opacity: 0.8; }
    70% { transform: scale(3); opacity: 0; }
    100% { transform: scale(1); opacity: 0; }
}

.hub-pulse {
    animation: hubPulseAnim 3s infinite;
}

@keyframes hubPulseAnim {
    0% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(2.5); opacity: 0; }
    100% { transform: scale(1); opacity: 0; }
}

.hub-marker {
    pointer-events: none;
    opacity: 0.6;
}

.hub-marker circle:first-child {
    filter: drop-shadow(0 0 3px #fff);
}

/* Panel Styles (Overlay Legend) */
.ph-gg-panel {
    position: absolute;
    bottom: 10px;
    left: 10px;
    width: auto;
    min-width: 220px;
    max-width: 260px;
    padding: 1rem;
    background: rgba(11, 15, 25, 0.85);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    transition: opacity 0.3s ease;
    z-index: 10;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5);
}

.ph-gg-panel-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.6rem;
    padding-bottom: 0.6rem;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

.ph-gg-selected-title {
    font-size: 0.85rem;
    color: #fff;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.ph-gg-selected-title i {
    color: var(--ph-pink);
    font-size: 0.9rem;
}

.ph-gg-dest-badge {
    background: rgba(231, 76, 116, 0.15);
    color: var(--ph-pink);
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.65rem;
    border: 1px solid rgba(231, 76, 116, 0.3);
}

/* IMPROVED LEGEND PANEL */
.ph-gg-panel-v2 {
    bottom: 20px;
    left: 20px;
    min-width: 320px;
    max-width: 380px;
    padding: 1.5rem;
    background: rgba(11, 15, 25, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

/* STORYTELLING ROUTE PANEL */
.ph-gg-story-panel {
    min-width: 320px;
    max-width: 360px;
    background: #0f172a; /* Solid deep blue, no opacity for maximum clarity */
    border: 2px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 25px 60px rgba(0,0,0,0.8);
    transition: all 0.3s ease;
}

@media (max-width: 1440px) {
    .ph-gg-story-panel {
        max-width: 300px;
        padding: 1rem;
    }
    .ph-story-item { padding: 0.6rem; gap: 0.8rem; }
    .ph-story-icon { width: 36px; height: 36px; font-size: 1rem; }
    .ph-story-text strong { font-size: 0.8rem; }
    .ph-story-text span { font-size: 0.7rem; }
}

@media (max-height: 850px) {
    .ph-gg-story-panel {
        transform: scale(0.9);
        transform-origin: bottom left;
    }
}


.ph-gg-story-route {
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
    margin: 1.2rem 0;
}

.ph-story-item {
    display: flex;
    align-items: center;
    gap: 1.2rem;
    padding: 0.8rem;
    background: rgba(255,255,255,0.05); /* Slightly lighter for better contrast */
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.3s ease;
}

.ph-story-item:hover {
    background: rgba(255,255,255,0.08);
    border-color: rgba(255,255,255,0.15);
}

.ph-story-icon {
    width: 42px;
    height: 42px;
    background: rgba(196, 30, 90, 0.25); /* More vivid */
    color: #ff2d70; /* Brighter pink */
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
    box-shadow: 0 0 15px rgba(196, 30, 90, 0.3);
}

.ph-story-icon.plane-domestic {
    background: rgba(66, 133, 244, 0.25);
    color: #5ea1ff; /* Brighter blue */
    box-shadow: 0 0 15px rgba(66, 133, 244, 0.3);
}

.ph-story-icon.car-icon {
    background: rgba(222, 176, 90, 0.25);
    color: #ffd700; /* Brighter gold */
    box-shadow: 0 0 15px rgba(222, 176, 90, 0.3);
}

.ph-story-text {
    display: flex;
    flex-direction: column;
}

.ph-story-text strong {
    color: #fff;
    font-size: 0.9rem;
    display: block;
    margin-bottom: 2px;
}

.ph-story-text span {
    color: #cbd5e1; /* Solid light gray instead of transparent white */
    font-size: 0.78rem;
    line-height: 1.3;
}

.ph-story-text b {
    color: #fff;
    font-weight: 700;
}

.ph-story-arrow {
    text-align: left;
    color: rgba(255,255,255,0.2);
    font-size: 0.8rem;
    margin: 0 0 0 25px;
    height: 15px;
}

/* Specific styling for Peru nodes in SVG */
.node-juliaca circle {
    filter: drop-shadow(0 0 8px #4285F4);
}

.node-puno circle {
    filter: drop-shadow(0 0 12px #DEB05A);
}

.node-puno text {
    text-shadow: 0 0 15px rgba(222, 176, 90, 0.6);
}


.ph-gg-panel-v2 .ph-gg-selected-title {
    font-size: 1.1rem;
    font-weight: 800;
}

.ph-gg-panel-v2 .ph-gg-info h5 {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.6);
}

.ph-gg-panel-v2 .ph-gg-info p {
    font-size: 1.05rem;
    line-height: 1.4;
    color: #fff;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.ph-gg-panel-v2 .ph-gg-icon {
    width: 36px;
    height: 36px;
    font-size: 1rem;
}

.ph-gg-panel-footer {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.05);
}

.ph-gg-panel-footer p {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.5);
    margin: 0;
    font-style: italic;
    display: flex;
    gap: 0.5rem;
    align-items: flex-start;
}

.ph-gg-panel-footer i {
    color: var(--ph-gold);
    margin-top: 2px;
}

.ph-gg-data-grid {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}

/* DETALLE PERU MAPS GRID */
.ph-peru-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    margin-top: 3rem;
    position: relative;
    z-index: 10;
    padding: 0 1rem 3rem;
}

.ph-map-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 24px;
    overflow: hidden; /* This might hide the llama if not changed to visible for one card */
    display: flex;
    flex-direction: column;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    transition: transform 0.3s ease;
}

.ph-relative-card {
    overflow: visible !important;
    position: relative;
}

.ph-pointing-llama {
    display: none; /* Removed from card */
}

.ph-center-llama {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 480px;
    height: auto;
    z-index: 50;
    pointer-events: none;
    filter: drop-shadow(0 20px 50px rgba(0,0,0,0.6));
    animation: llamaCenterPoint 5s ease-in-out infinite;
    opacity: 0.9;
}

@keyframes llamaCenterPoint {
    0%, 100% { transform: translate(-50%, -50%) rotate(0deg); }
    50% { transform: translate(-50%, -60%) rotate(3deg); }
}

@media (max-width: 992px) {
    .ph-center-llama {
        top: 45%;
        width: 140px;
        opacity: 0.9;
    }
}


@media (max-width: 768px) {
    .ph-pointing-llama { display: none; }
}


.ph-map-card:hover {
    transform: translateY(-5px);
    border-color: rgba(255,255,255,0.15);
}

.ph-map-card-header {
    padding: 1.2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.ph-map-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.ph-map-icon.plane-bg { background: rgba(66, 133, 244, 0.15); color: #4285F4; }
.ph-map-icon.car-bg { background: rgba(222, 176, 90, 0.15); color: var(--ph-gold); }

.ph-map-title h4 {
    color: #fff;
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
}

.ph-map-title span {
    color: rgba(255,255,255,0.5);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ph-map-iframe-wrap {
    width: 100%;
    height: 300px;
    background: #000;
}

.ph-map-info {
    padding: 1rem 1.2rem;
    display: flex;
    justify-content: space-between;
    background: rgba(0,0,0,0.2);
}

.ph-map-info p {
    color: rgba(255,255,255,0.7);
    font-size: 0.85rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.ph-map-info i {
    color: var(--ph-pink);
}

@media (max-width: 992px) {
    .ph-peru-detail-grid {
        grid-template-columns: 1fr;
        gap: 3.5rem;
        padding-top: 1rem;
    }
}

.ph-gg-data-card {
    background: transparent;
    padding: 0.3rem 0;
    border: none;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 0.6rem;
}

.ph-gg-data-card:hover {
    transform: none;
}

.ph-gg-icon {
    width: 28px;
    height: 28px;
    flex-shrink: 0;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    color: var(--ph-pink);
}

.ph-gg-info h5 {
    font-size: 0.6rem;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.1rem;
    font-weight: 600;
}

.ph-gg-info p {
    font-size: 0.75rem;
    color: #fff;
    font-weight: 500;
    margin: 0;
    line-height: 1.2;
}

@media (max-width: 992px) {
    .ph-gg-map-area {
        height: 600px;
    }
    .ph-gg-panel {
        bottom: 20px;
        left: 20px;
        width: calc(100% - 40px);
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .ph-gg-map-area {
        height: 500px;
    }
    .ph-gg-svg-map {
        transform: scale(1.6) translateY(30px);
    }
    .ph-gg-panel {
        top: auto;
        bottom: 10px;
        left: 10px;
        width: calc(100% - 20px);
        max-width: none;
        padding: 0.8rem;
    }
    .ph-gg-selected-title {
        font-size: 0.75rem;
    }
    .ph-gg-data-card {
        gap: 0.4rem;
    }
    .ph-gg-icon {
        width: 24px;
        height: 24px;
        font-size: 0.7rem;
    }
}

/* -- Google Flights Premium Section (Dark Version) -------------------- */
.ph-gf-premium-section {
    background: #0b0f19;
    padding: 6rem 0;
    overflow: hidden;
    position: relative;
}

.ph-gf-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

@media (max-width: 992px) {
    .ph-gf-grid {
        grid-template-columns: 1fr;
        gap: 4rem;
        text-align: center;
    }
    
    .ph-gf-feat-card {
        text-align: left;
    }
    
    .ph-gf-mockup-dark {
        transform: none;
        margin: 0 auto;
    }
}

.ph-gf-bg-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 800px;
    height: 800px;
    background: radial-gradient(circle, rgba(231, 76, 116, 0.08) 0%, rgba(11,15,25,0) 70%);
    transform: translate(-50%, -50%);
    pointer-events: none;
}

.ph-text-white { color: white !important; }
.ph-text-gray-light { color: #a0aec0 !important; }

.ph-label-google-dark {
    background: rgba(231, 76, 116, 0.1);
    color: var(--ph-pink);
    border: 1px solid rgba(231, 76, 116, 0.2);
    margin-bottom: 2rem;
}

.ph-gf-features-grid {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin: 2rem 0;
}

.ph-gf-feat-card {
    display: flex;
    gap: 1.5rem;
    align-items: center;
    background: rgba(255,255,255,0.03);
    padding: 1rem 1.5rem;
    border-radius: 15px;
    border: 1px solid rgba(255,255,255,0.05);
    transition: all 0.3s ease;
}

.ph-gf-feat-card:hover {
    background: rgba(255,255,255,0.06);
    transform: translateX(10px);
    border-color: rgba(66,133,244,0.3);
}

.ph-feat-icon {
    width: 40px;
    height: 40px;
    background: rgba(231, 76, 116, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--ph-pink);
    flex-shrink: 0;
}

.ph-feat-info h4 {
    color: white;
    font-size: 1.2rem;
    margin-bottom: 0.3rem;
    font-weight: 700;
}

.ph-feat-info p {
    color: #718096;
    font-size: 0.9rem;
    margin: 0;
}

.ph-btn-gf-premium-dark {
    display: inline-flex;
    align-items: center;
    gap: 1.2rem;
    background: linear-gradient(135deg, var(--ph-pink) 0%, #D6335E 100%);
    padding: 1rem 2rem;
    border-radius: 100px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    box-shadow: 0 10px 25px rgba(231, 76, 116, 0.3);
}

.ph-btn-gf-premium-dark:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(231, 76, 116, 0.4);
}

.ph-btn-gf-premium-dark span {
    font-weight: 800;
    color: white;
    font-size: 1.1rem;
}

.ph-btn-gf-premium-dark i {
    color: white;
    transition: transform 0.3s ease;
}

/* Mockup Dark Mode */
.ph-gf-mockup-dark {
    background: #1a202c;
    border-radius: 24px;
    box-shadow: 0 50px 100px rgba(0,0,0,0.5);
    border: 1px solid rgba(255,255,255,0.1);
    overflow: hidden;
    position: relative;
    transform: perspective(1000px) rotateY(-10deg);
}

.ph-mockup-header-dark {
    background: #2d3748;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 2rem;
}

.ph-mockup-address-dark {
    background: #1a202c;
    padding: 0.3rem 2rem;
    border-radius: 100px;
    font-size: 0.7rem;
    color: #718096;
    flex: 1;
    text-align: center;
}

.ph-mockup-skeleton-title-dark {
    height: 15px;
    background: rgba(255,255,255,0.1);
    width: 60%;
    border-radius: 4px;
    margin-bottom: 2rem;
}

.ph-mockup-graph {
    margin: 2rem 0;
    opacity: 0.6;
}

.ph-mockup-item-dark {
    height: 45px;
    background: rgba(255,255,255,0.03);
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    padding: 0 1.5rem;
    align-items: center;
    margin-bottom: 1rem;
}

.ph-m-left-dark { width: 30%; height: 8px; background: rgba(255,255,255,0.1); border-radius: 2px; }
.ph-m-right-dark { width: 15%; height: 8px; background: rgba(255,255,255,0.1); border-radius: 2px; }

.ph-m-active-dark {
    background: rgba(231, 76, 116, 0.1);
    border: 1px solid var(--ph-pink);
}

.ph-mockup-floating-price-dark {
    position: absolute;
    bottom: 3rem;
    right: -1rem;
    background: #48bb78;
    color: white;
    padding: 1.2rem 2rem;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(72,187,120,0.4);
    animation: floatAnim 4s infinite ease-in-out;
}

.ph-price-badge-dark {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-weight: 800;
    font-size: 1.1rem;
}

/* Mockup Visual */
.ph-gf-visual {
    position: relative;
}

.ph-gf-mockup {
    background: white;
    border-radius: 24px;
    box-shadow: 0 40px 100px rgba(0,0,0,0.1);
    border: 1px solid #eee;
    overflow: hidden;
    position: relative;
    transform: perspective(1000px) rotateY(-5deg);
    transition: transform 0.5s ease;
}

.ph-gf-mockup:hover {
    transform: perspective(1000px) rotateY(0deg);
}

.ph-mockup-header {
    background: #f1f3f4;
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 2rem;
}

.ph-mockup-dots {
    display: flex;
    gap: 6px;
}

.ph-mockup-dots span {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: #dadce0;
}

.ph-mockup-address {
    background: white;
    padding: 0.3rem 2rem;
    border-radius: 100px;
    font-size: 0.7rem;
    color: #9aa0a6;
    flex: 1;
    text-align: center;
}

.ph-mockup-body {
    padding: 3rem;
}

.ph-mockup-skeleton-title {
    height: 20px;
    background: #f1f3f4;
    width: 80%;
    border-radius: 4px;
    margin-bottom: 1rem;
}

.ph-mockup-skeleton-line {
    height: 10px;
    background: #f1f3f4;
    border-radius: 2px;
    margin-bottom: 3rem;
}

.ph-w-60 { width: 60%; }

.ph-mockup-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.ph-mockup-item {
    height: 50px;
    background: #f8f9fa;
    border-radius: 12px;
    display: flex;
    justify-content: space-between;
    padding: 0 1.5rem;
    align-items: center;
}

.ph-m-left { width: 40%; height: 10px; background: #e8eaed; border-radius: 2px; }
.ph-m-right { width: 20%; height: 10px; background: #e8eaed; border-radius: 2px; }

.ph-m-active {
    background: #e8f0fe;
    border: 1px solid #1a73e8;
}

.ph-m-active .ph-m-left, .ph-m-active .ph-m-right { background: #1a73e8; opacity: 0.3; }

.ph-mockup-floating-price {
    position: absolute;
    bottom: 3rem;
    right: -2rem;
    background: #34a853;
    color: white;
    padding: 1rem 2rem;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(52,168,83,0.3);
    animation: floatAnim 3s infinite ease-in-out;
}

.ph-price-badge {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-weight: 800;
}

@keyframes floatAnim {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

/* Quitar el estilo anterior de la card pequeña */
.ph-panel-flights { display: none; }

.ph-tip-v4 {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--ph-indigo);
    color: white;
    padding: 1.2rem 1.5rem;
    border-radius: 18px;
}

.ph-tip-v4 i {
    color: var(--ph-gold);
    font-size: 1.2rem;
}

.ph-tip-v4 span {
    font-size: 0.9rem;
    font-weight: 500;
}

/* -- Cinema Videos ------------------------------------- */

/* -- Cinema Videos ------------------------------------- */
.ph-cinema-section {
    background: var(--ph-dark);
    padding: 7rem 0;
    position: relative;
    overflow: hidden;
}

.ph-cinema-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(222,176,90,0.04) 1px, transparent 1px);
    background-size: 28px 28px;
}

.ph-video-featured {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 2.5rem;
    align-items: center;
    margin-bottom: 2rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 24px;
    overflow: hidden;
    position: relative;
}

.ph-video-frame {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}

.ph-video-frame iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.ph-video-featured-info {
    padding: 3rem 3rem 3rem 0;
}

.ph-video-featured-info h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 2rem;
    margin: 1rem 0 0.8rem;
    line-height: 1.2;
}

.ph-video-featured-info p { color: rgba(255,255,255,0.55); font-size: 1rem; line-height: 1.6; }

.ph-video-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.ph-video-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.ph-video-card:hover { transform: scale(1.03); }

.ph-video-thumb {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    background: #000;
}

.ph-video-thumb iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.ph-video-meta {
    padding: 1rem 1.2rem;
}

.ph-video-meta span {
    font-size: 0.72rem;
    font-weight: 800;
    color: var(--ph-gold);
    display: block;
    margin-bottom: 0.35rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ph-video-meta h4 { color: white; font-size: 0.95rem; font-weight: 700; line-height: 1.3; }


/* -- CTA Final ----------------------------------------- */
.ph-final-cta {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    text-align: center;
}

.ph-cta-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    animation: heroZoom 20s ease-in-out infinite alternate-reverse;
}

.ph-cta-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(10,8,20,0.7) 0%, rgba(10,8,20,0.88) 100%);
}

.ph-cta-body {
    position: relative;
    z-index: 10;
    padding: 6rem 2rem;
    max-width: 700px;
}

.ph-cta-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    color: rgba(255,255,255,0.5);
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 1.5rem;
}

.ph-cta-h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 6vw, 5rem);
    color: white;
    line-height: 1.05;
    letter-spacing: -2px;
    margin-bottom: 1.5rem;
}

.ph-cta-h2 em { color: var(--ph-gold); font-style: italic; }

.ph-cta-p { color: rgba(255,255,255,0.55); font-size: 1.1rem; margin-bottom: 3rem; }

.ph-cta-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 3rem;
}

.ph-cta-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    background: var(--ph-pink);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 14px;
    font-weight: 800;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 15px 30px rgba(231,76,116,0.35);
}

.ph-cta-btn-primary:hover {
    background: #d4365a;
    transform: translateY(-5px);
    box-shadow: 0 25px 45px rgba(231,76,116,0.45);
}

.ph-cta-btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.ph-cta-btn-ghost:hover {
    border-color: rgba(255,255,255,0.5);
    background: rgba(255,255,255,0.08);
    transform: translateY(-5px);
}

.ph-trust-row {
    display: inline-flex;
    align-items: center;
    gap: 2rem;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    padding: 1rem 2rem;
    border-radius: 100px;
    backdrop-filter: blur(10px);
}

.ph-trust-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.85rem;
    font-weight: 600;
    color: rgba(255,255,255,0.75);
}

.ph-trust-item i { color: var(--ph-gold); }

.ph-trust-div { width: 1px; height: 20px; background: rgba(255,255,255,0.12); }

/* -- Responsive ---------------------------------------- */
@media (max-width: 1200px) {
    .ph-bento { grid-template-columns: repeat(2, 1fr); }
    .ph-bento-big { grid-row: span 1; min-height: 280px; }
}

@media (max-width: 900px) {
    .ph-hero-h1 { font-size: clamp(2.8rem, 10vw, 4.5rem); letter-spacing: -1px; }
    .ph-hero-content { padding: 0 5vw 4rem; }
    .ph-masonry { grid-template-columns: 1fr 1fr; height: auto; }
    .ph-photo-tall { grid-row: span 1; min-height: 250px; }
    .ph-photo-col { display: contents; }
    .ph-photo { min-height: 220px; }
    .ph-video-featured { grid-template-columns: 1fr; }
    .ph-video-featured-info { padding: 1.5rem 2rem 2rem; }
    .ph-video-grid { grid-template-columns: 1fr 1fr; }
    .ph-hero-numbers { display: none; }
}

@media (max-width: 992px) {
    .ph-tracker-container {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    .ph-tracker-panel {
        padding-right: 0;
        order: 2;
    }
    .ph-tracker-map-area {
        height: 450px;
        order: 1;
    }
    .ph-arrival-tracker-section {
        padding: 4rem 0;
    }
}

/* -- Fullscreen Mobile Map Logic ---------------------- */
.ph-mobile-map-trigger-container {
    display: none;
    justify-content: center;
    padding: 0 1.5rem 2rem;
}

.ph-btn-map-trigger {
    background: var(--ph-pink);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 100px;
    font-weight: 800;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 10px 25px rgba(231, 76, 116, 0.3);
    width: 100%;
    justify-content: center;
}

.ph-gg-close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 10002;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 100px;
    font-weight: 700;
    display: none;
    backdrop-filter: blur(10px);
}

/* Fullscreen State */
.ph-gg-container.fullscreen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 99999;
    background: #0b0f19;
}

.ph-gg-container.fullscreen .ph-gg-map-area {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: auto;
    -webkit-overflow-scrolling: touch;
    background: #000;
    position: relative;
}

.ph-gg-map-wrapper {
    width: 100%;
    max-width: 1200px;
    height: auto;
    aspect-ratio: 2/1;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.ph-gg-container.fullscreen .ph-gg-svg-map {
    width: 100%;
    height: 100%;
    display: block;
}

.ph-gg-zoom-controls {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    display: none;
    flex-direction: column;
    gap: 10px;
    z-index: 10003;
}

.ph-gg-container.fullscreen .ph-gg-zoom-controls {
    display: flex;
}

.ph-gg-zoom-controls button {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    backdrop-filter: blur(10px);
    cursor: pointer;
    transition: all 0.3s ease;
}

.ph-gg-zoom-controls button:hover {
    background: var(--ph-pink);
    border-color: var(--ph-pink);
}

@media (max-width: 768px) {
    @media (orientation: portrait) {
        .ph-gg-zoom-controls {
            top: 20px;
            right: auto;
            left: 20px;
            transform: none;
            flex-direction: row;
        }
    }
}

.ph-gg-container.fullscreen .ph-gg-close-btn {
    display: flex;
}

.ph-gg-container.fullscreen .ph-gg-panel {
    bottom: 20px;
    left: 20px;
    background: rgba(11, 15, 25, 0.95);
}

@media (max-width: 768px) {
    .ph-mobile-map-trigger-container { display: flex; }
    .ph-gg-container { display: none; } /* Hide map by default on mobile */
    .ph-gg-container.fullscreen { display: block; } /* Show map when triggered */
    
    /* Rotation logic when portrait */
    @media (orientation: portrait) {
        .ph-gg-container.fullscreen .ph-gg-map-area {
            width: 100vh;
            height: 100vw;
            transform: rotate(90deg);
            transform-origin: top left;
            position: absolute;
            top: 0;
            left: 100%;
        }
        .ph-gg-container.fullscreen .ph-gg-panel {
            bottom: auto;
            top: 20px;
            left: 20px;
            width: auto;
            max-width: 200px;
            padding: 0.6rem;
        }
        .ph-gg-panel-header { margin-bottom: 0.4rem; padding-bottom: 0.4rem; }
        .ph-gg-selected-title { font-size: 0.7rem; }
        .ph-gg-data-card { gap: 0.3rem; padding: 0.1rem 0; }
        .ph-gg-info h5 { font-size: 0.5rem; }
        .ph-gg-info p { font-size: 0.65rem; }
        .ph-gg-icon { width: 20px; height: 20px; font-size: 0.6rem; }
    }
}

@media (max-width: 600px) {
    .ph-masonry { grid-template-columns: 1fr; height: auto; }
    .ph-video-grid { grid-template-columns: 1fr; }
    .ph-bento { grid-template-columns: 1fr; }
    .ph-bento-big { grid-column: span 1; }
    .ph-bento-wide { grid-column: span 1; }
    .ph-trust-row { flex-direction: column; gap: 1rem; border-radius: 20px; }
    .ph-trust-div { width: 40px; height: 1px; }
    
    .ph-tracker-map-area {
        height: 350px;
    }
    .ph-hub-info h4 {
        font-size: 1.5rem;
    }
    .ph-route-selector {
        padding: 1rem;
    }
    .ph-route-name {
        font-size: 0.95rem;
    }
}
/* -- Carousels ----------------------------------------- */
.ph-carousel .ph-c-img {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 0; transition: opacity 0.8s ease-in-out;
}
.ph-carousel .ph-c-img.active { opacity: 1; z-index: 2; }
.ph-carousel .ph-route-num-v2 { z-index: 10; }

/* VISUAL TIMELINE JOURNEY */
.ph-visual-timeline {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    position: relative;
    margin-top: 3rem;
}

.ph-timeline-card {
    flex: 1;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 24px;
    padding: 2.5rem 1.5rem;
    text-align: center;
    position: relative;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.ph-timeline-card:hover {
    transform: translateY(-15px);
    background: rgba(255,255,255,0.06);
    border-color: rgba(255,255,255,0.2);
}

.ph-card-num {
    position: absolute;
    top: -22px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--ph-pink);
    color: white;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    font-size: 1.2rem;
    box-shadow: 0 10px 20px rgba(196,30,90,0.4);
    border: 4px solid #0b0f19;
}

.ph-card-visual {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    transition: transform 0.3s ease;
}

.ph-timeline-card:hover .ph-card-visual {
    transform: scale(1.1) rotate(5deg);
}

.step-1-bg { background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: #fff; }
.step-2-bg { background: linear-gradient(135deg, #ec4899, #be185d); color: #fff; }
.step-3-bg { background: linear-gradient(135deg, #06b6d4, #0891b2); color: #fff; }
.step-4-bg { background: linear-gradient(135deg, #eab308, #ca8a04); color: #fff; }

.ph-card-body h3 {
    color: #fff;
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.ph-badge-simple {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    background: rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.8);
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-transform: uppercase;
}

.ph-badge-simple.gold {
    background: rgba(234,179,8,0.15);
    color: #eab308;
    border: 1px solid rgba(234,179,8,0.3);
}

.ph-card-body p {
    color: rgba(255,255,255,0.5);
    font-size: 0.9rem;
    line-height: 1.4;
    margin: 0;
}

.ph-timeline-connector {
    color: rgba(255,255,255,0.1);
    font-size: 1.5rem;
}

.ph-card-dest {
    border-color: rgba(234,179,8,0.3);
    box-shadow: 0 0 30px rgba(234,179,8,0.1);
}

@media (max-width: 991px) {
    .ph-visual-timeline {
        flex-direction: column;
        gap: 3rem;
    }
    .ph-timeline-connector {
        display: none;
    }
    .ph-timeline-card {
        width: 100%;
        max-width: 400px;
    }
}

/* DECORATIVE OBJECTS FOR INFOGRAPHIC */
.ph-deco-mascot {
    position: absolute;
    bottom: -80px;
    left: -120px;
    width: 550px;
    height: auto;
    z-index: 1;
    pointer-events: none;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.6));
    animation: mascotFloat 6s ease-in-out infinite;
    opacity: 0.85;
}

.ph-deco-plane {
    position: absolute;
    top: 40px;
    right: -20px;
    width: 320px;
    height: auto;
    z-index: 1;
    pointer-events: none;
    filter: drop-shadow(0 15px 25px rgba(0,0,0,0.4));
    animation: planeFloat 8s ease-in-out infinite;
}

@keyframes mascotFloat {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(2deg); }
}

@keyframes planeFloat {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-20px, 15px) rotate(-3deg); }
}

@media (max-width: 1200px) {
    .ph-deco-mascot { width: 200px; left: -20px; bottom: -10px; opacity: 0.6; }
    .ph-deco-plane { width: 240px; right: -10px; top: 20px; opacity: 0.4; }
}

@media (max-width: 768px) {
    .ph-deco-mascot, .ph-deco-plane { display: none; } /* Hide on small mobile to avoid clutter */
}

/* DECORATIVE LLAMA FOR MAP */
.ph-deco-llama {
    position: absolute;
    bottom: -50px;
    right: -80px;
    width: 550px;
    height: auto;
    z-index: 100; /* Over everything in the map container */
    pointer-events: none;
    filter: drop-shadow(-10px 10px 30px rgba(0,0,0,0.8));
    animation: llamaBounce 6s ease-in-out infinite;
    opacity: 0.95;
}

@keyframes llamaBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}


@media (max-width: 1600px) {
    .ph-deco-llama { width: 400px; right: -40px; bottom: -30px; }
}

@media (max-width: 1440px) {
    .ph-deco-llama { width: 300px; right: -20px; bottom: 0; }
}

@media (max-width: 1200px) {
    .ph-deco-llama { width: 200px; right: -10px; bottom: 10px; opacity: 0.7; }
}

@media (max-width: 991px) {
    .ph-deco-llama { display: none; } /* Hide on smaller screens to avoid blocking the map */
}

/* SEARCHING LLAMA HERO (Google Flights) */
.ph-llama-focus-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    position: relative;
}

.ph-searching-llama-hero {
    width: 480px;
    height: auto;
    filter: drop-shadow(0 25px 50px rgba(0,0,0,0.6));
    animation: llamaHeroSearch 5s ease-in-out infinite;
}

@keyframes llamaHeroSearch {
    0%, 100% { transform: scale(1) rotate(0deg); }
    33% { transform: scale(1.05) rotate(-3deg); }
    66% { transform: scale(0.98) rotate(3deg); }
}

@media (max-width: 1200px) {
    .ph-searching-llama-hero { width: 350px; }
}

@media (max-width: 991px) {
    .ph-llama-focus-wrap { margin-top: 3rem; }
    .ph-searching-llama-hero { width: 320px; }
}




/* -- Altitude Protocol Section ------------------------- */
.ph-altitude-section {
    background: #0f172a;
    padding: 8rem 0;
    position: relative;
    overflow: hidden;
}

.ph-altitude-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 5rem;
    align-items: center;
}

.ph-label-medical {
    background: rgba(34, 211, 238, 0.1);
    color: #22d3ee;
    border: 1px solid rgba(34, 211, 238, 0.2);
}

.ph-altitude-cards {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-top: 3rem;
}

.ph-alt-card {
    display: flex;
    gap: 1.5rem;
    padding: 1.5rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    transition: all 0.3s ease;
}

.ph-alt-card:hover {
    background: rgba(255,255,255,0.06);
    transform: translateX(10px);
    border-color: rgba(34, 211, 238, 0.3);
}

.ph-alt-icon {
    width: 50px;
    height: 50px;
    background: rgba(34, 211, 238, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: #22d3ee;
    flex-shrink: 0;
}

.ph-alt-body h4 {
    color: #fff;
    font-size: 1.1rem;
    margin-bottom: 0.4rem;
    font-weight: 700;
}

.ph-alt-body p {
    color: rgba(255,255,255,0.5);
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.5;
}

.ph-altitude-visual {
    position: relative;
}

.ph-elevation-chart-wrap {
    background: rgba(0,0,0,0.2);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 30px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

.ph-chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    color: #fff;
}

.ph-chart-header span { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.4); }
.ph-chart-header strong { font-size: 1.2rem; color: var(--ph-pink); }

.ph-elevation-svg {
    width: 100%;
    height: auto;
    overflow: visible;
}

.ph-llama-doctor-img {
    position: absolute;
    bottom: -60px;
    right: -40px;
    width: 320px;
    height: auto;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.6));
    animation: llamaDoctorFloat 5s ease-in-out infinite;
    z-index: 5;
}

@keyframes llamaDoctorFloat {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(2deg); }
}

.pulse-gold {
    animation: pulseGold 2s infinite;
}

@keyframes pulseGold {
    0% { r: 7; opacity: 1; }
    50% { r: 12; opacity: 0.5; }
    100% { r: 7; opacity: 1; }
}

@media (max-width: 991px) {
    .ph-altitude-grid { grid-template-columns: 1fr; gap: 4rem; }
    .ph-llama-doctor-img { width: 220px; bottom: -30px; right: 0; }
}

</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ph-carousel').forEach(carousel => {
        let imgs = carousel.querySelectorAll('.ph-c-img');
        if (imgs.length < 2) return;
        let index = 0;
        setInterval(() => {
            imgs[index].classList.remove('active');
            index = (index + 1) % imgs.length;
            imgs[index].classList.add('active');
        }, parseInt(carousel.dataset.interval) || 3000);
    });
    /* -- Global Gateway Map Logic -- */
    const globalData = {
        'sa': {
            hubs: "<?php echo _t('puno.sa_hubs'); ?>",
            time: "<?php echo _t('puno.sa_time'); ?>",
            airlines: "<?php echo _t('puno.sa_airlines'); ?>",
            icon: "fa-earth-americas",
            name: "<?php echo _t('puno.continent_sa'); ?>"
        },
        'na': {
            hubs: "<?php echo _t('puno.na_hubs'); ?>",
            time: "<?php echo _t('puno.na_time'); ?>",
            airlines: "<?php echo _t('puno.na_airlines'); ?>",
            icon: "fa-earth-americas",
            name: "<?php echo _t('puno.continent_na'); ?>"
        },
        'eu': {
            hubs: "<?php echo _t('puno.eu_hubs'); ?>",
            time: "<?php echo _t('puno.eu_time'); ?>",
            airlines: "<?php echo _t('puno.eu_airlines'); ?>",
            icon: "fa-earth-europe",
            name: "<?php echo _t('puno.continent_eu'); ?>"
        },
        'as': {
            hubs: "<?php echo _t('puno.as_hubs'); ?>",
            time: "<?php echo _t('puno.as_time'); ?>",
            airlines: "<?php echo _t('puno.as_airlines'); ?>",
            icon: "fa-earth-asia",
            name: "<?php echo _t('puno.continent_as'); ?>"
        },
        'oc': {
            hubs: "<?php echo _t('puno.oc_hubs'); ?>",
            time: "<?php echo _t('puno.oc_time'); ?>",
            airlines: "<?php echo _t('puno.oc_airlines'); ?>",
            icon: "fa-earth-oceania",
            name: "<?php echo _t('puno.continent_oc'); ?>"
        },
        'af_ru': {
            hubs: "<?php echo _t('puno.af_ru_hubs'); ?>",
            time: "<?php echo _t('puno.af_ru_time'); ?>",
            airlines: "<?php echo _t('puno.af_ru_airlines'); ?>",
            icon: "fa-earth-africa",
            name: "<?php echo _t('puno.continent_af'); ?>"
        },
        'ca': {
            hubs: "<?php echo _t('puno.ca_hubs'); ?>",
            time: "<?php echo _t('puno.ca_time'); ?>",
            airlines: "<?php echo _t('puno.ca_airlines'); ?>",
            icon: "fa-earth-americas",
            name: "<?php echo _t('puno.continent_ca'); ?>"
        },
        'ee': {
            hubs: "<?php echo _t('puno.ee_hubs'); ?>",
            time: "<?php echo _t('puno.ee_time'); ?>",
            airlines: "<?php echo _t('puno.ee_airlines'); ?>",
            icon: "fa-earth-europe",
            name: "<?php echo _t('puno.continent_ee'); ?>"
        }
    };

    function activateRegion(regionId) {
        let currentPlane = document.getElementById('animated-plane');
        let animateMotion = currentPlane ? currentPlane.querySelector('animateMotion') : null;

        // Update nodes
        document.querySelectorAll('.continent-node').forEach(node => {
            node.classList.remove('active');
            if (node.getAttribute('data-region') === regionId) {
                node.classList.add('active');
            }
        });

        // Update flight paths
        document.querySelectorAll('.flight-line').forEach(line => {
            if (line.id !== 'path-puno') line.classList.remove('active');
        });
        
        let targetPath = document.getElementById('path-' + regionId);
        
        // Handle SA special case (no path needed or handle gracefully)
        if (targetPath && animateMotion) {
            targetPath.classList.add('active');
            currentPlane.style.opacity = '1';
            let pathData = targetPath.getAttribute('d');
            animateMotion.setAttribute('path', pathData);
            
            // Force animation restart (trick for SVG)
            let newPlane = currentPlane.cloneNode(true);
            currentPlane.parentNode.replaceChild(newPlane, currentPlane);
        } else if (currentPlane) {
            currentPlane.style.opacity = '0';
        }

        // Update Panel Data
        const data = globalData[regionId];
        document.getElementById('gg-origin-marker').innerHTML = `<i class="fa-solid ${data.icon}"></i> ${data.name}`;
        
        document.getElementById('gg-data-hubs').innerHTML = data.hubs;
        document.getElementById('gg-data-time').innerHTML = data.time;
        // Airlines update if the element exists
        const airlinesEl = document.getElementById('gg-data-airlines');
        if (airlinesEl) airlinesEl.innerHTML = data.airlines;

    }

    // Bind click events to map nodes
    document.querySelectorAll('.continent-node').forEach(node => {
        node.addEventListener('click', function() {
            activateRegion(this.getAttribute('data-region'));
        });
    });

    // Initialize with NA
    activateRegion('na');

    /* -- Fullscreen Map Toggle -- */
    const btnOpen = document.getElementById('btn-open-interactive-map');
    const btnClose = document.getElementById('btn-close-interactive-map');
    const ggContainer = document.querySelector('.ph-gg-container');

    if (btnOpen) {
        btnOpen.addEventListener('click', () => {
            ggContainer.classList.add('fullscreen');
            document.body.style.overflow = 'hidden'; // Prevent scroll
            // Iniciar con el zoom out al máximo para ver todo el mapa
            currentZoom = 0.75;
            updateMapZoom();
        });
    }

    if (btnClose) {
        btnClose.addEventListener('click', () => {
            ggContainer.classList.remove('fullscreen');
            document.body.style.overflow = ''; // Restore scroll
            // Reset zoom when closing
            currentZoom = 1;
            updateMapZoom();
        });
    }

    /* -- Zoom Logic -- */
    let currentZoom = 1;
    const mapWrapper = document.querySelector('.ph-gg-map-wrapper');
    const btnZoomIn = document.getElementById('btn-gg-zoom-in');
    const btnZoomOut = document.getElementById('btn-gg-zoom-out');

    function updateMapZoom() {
        if (mapWrapper) {
            const baseWidth = 1000;
            const baseHeight = 500;
            
            // Aplicamos el zoom directamente al tamaño del wrapper
            // Esto asegura que el contenedor de scroll (ph-gg-map-area)
            // reconozca el nuevo tamaño y permita moverte por todo el mapa.
            mapWrapper.style.width = (baseWidth * currentZoom) + 'px';
            mapWrapper.style.height = (baseHeight * currentZoom) + 'px';
            
            // Centrado automático si el mapa es más pequeño que la pantalla
            if (currentZoom < 1) {
                mapWrapper.style.margin = 'auto';
            } else {
                mapWrapper.style.margin = '0';
            }
        }
    }

    if (btnZoomIn) {
        btnZoomIn.addEventListener('click', () => {
            if (currentZoom < 3) {
                currentZoom += 0.25;
                updateMapZoom();
            }
        });
    }

    if (btnZoomOut) {
        btnZoomOut.addEventListener('click', () => {
            if (currentZoom > 0.75) {
                currentZoom -= 0.25;
                updateMapZoom();
            }
        });
    }

});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
