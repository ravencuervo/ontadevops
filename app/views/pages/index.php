<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
.hero-carousel {
    position: relative;
    overflow: visible;
}

.payment-floating-notice {
    position: absolute;
    top: 15%;
    right: 0;
    z-index: 1000;
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    pointer-events: none;
}

.floating-mascot {
    width: 220px;
    margin-left: -60px;
    z-index: 10;
    filter: drop-shadow(-15px 10px 25px rgba(0,0,0,0.4));
    transition: transform 0.4s ease;
}

.floating-mascot img {
    width: 100%;
    height: auto;
    display: block;
}

.payment-floating-notice:hover .floating-mascot {
    transform: scale(1.05) rotate(2deg);
}

.floating-content-wrap {
    pointer-events: auto;
}

.floating-glass-box {
    background: rgba(26, 22, 37, 0.85);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(222, 176, 90, 0.4);
    padding: 1.8rem 4.5rem 1.8rem 2.2rem;
    border-radius: 30px 0 0 30px;
    box-shadow: -20px 20px 60px rgba(0, 0, 0, 0.6);
    max-width: 350px;
    border-right: none;
    position: relative;
    text-align: right;
}

.floating-glass-box::before {
    content: '';
    position: absolute;
    top: 0; right: 0; width: 4px; height: 100%;
    background: var(--p-gold, #DEB05A);
}

.floating-badge {
    background: var(--p-gold, #DEB05A);
    color: #1a1625;
    padding: 3px 12px;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 800;
    text-transform: uppercase;
    display: inline-block;
    margin-bottom: 10px;
    box-shadow: 0 4px 10px rgba(222, 176, 90, 0.3);
}

.floating-msg {
    color: #fff;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 1.2rem;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.floating-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    flex-direction: row-reverse;
    background: #E74C74;
    color: #fff !important;
    padding: 0.8rem 1.6rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.95rem;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 20px rgba(231, 76, 116, 0.3);
}

.floating-cta:hover {
    background: #ff5e8a;
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(231, 76, 116, 0.5);
}

@media (max-width: 992px) {
    .payment-floating-notice {
        top: 100px;
        transform: scale(0.85);
        transform-origin: right center;
    }
}

@media (max-width: 600px) {
    .payment-floating-notice {
        top: 80px;
        transform: scale(0.7);
    }
    .floating-glass-box {
        max-width: 280px;
        padding: 1.5rem 3.5rem 1.5rem 1.5rem;
    }
}
</style>

<!-- ============================================
     SECCIÓN 1: Hero Principal (Carrusel)
     ============================================ -->
<section class="hero-carousel" id="home">
    <!-- Floating Payment Notice Overlay -->
    <div class="payment-floating-notice">
        <div class="floating-mascot">
            <img src="<?php echo URLROOT; ?>/img/objetos_onta/ontita_señalando.png" alt="Ontita">
        </div>
        <div class="floating-content-wrap">
            <div class="floating-glass-box">
                <span class="floating-badge"><?php echo _t('common.important'); ?></span>
                <p class="floating-msg"><?php echo _t('home_notices.payment_text'); ?></p>
                <a href="<?php echo URLROOT; ?>/pages/inscriptions#inscripcion-flujo" class="floating-cta">
                    <?php echo _t('home_notices.payment_btn'); ?>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="carousel-container">
        <!-- Slide 1: Bienvenida -->
        <div class="carousel-slide active"
            style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide01.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <div class="hero-event-dates">
                    <div class="hero-date-block">
                        <span class="day-num">09</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-connector">
                        <div class="connector-line"></div>
                        <span class="connector-label">al</span>
                        <div class="connector-line"></div>
                    </div>
                    <div class="hero-date-block">
                        <span class="day-num">13</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-year-label">
                        <span class="label-year">2026</span>
                    </div>
                </div>
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.title'); ?> <span class="accent">ONTA 2026</span></h1>
                <p><?php echo _t('hero.subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/inscriptions"
                        class="btn btn-gold"><?php echo _t('hero.btn_register'); ?> <i
                            class="fa-solid fa-arrow-right"></i></a>
                    <a href="<?php echo URLROOT; ?>/pages/inscriptions#tarifas" class="nav-btn-outline"><?php echo _t('hero.btn_presentation'); ?></a>
                </div>
            </div>
        </div>

        <!-- Slide 2: Investigación -->
        <div class="carousel-slide" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide04.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <div class="hero-event-dates">
                    <div class="hero-date-block">
                        <span class="day-num">09</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-connector">
                        <div class="connector-line"></div>
                        <span class="connector-label">al</span>
                        <div class="connector-line"></div>
                    </div>
                    <div class="hero-date-block">
                        <span class="day-num">13</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-year-label">

                        <span class="label-year">2026</span>
                    </div>
                </div>
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.slide2_title'); ?></h1>
                <p><?php echo _t('hero.slide2_subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/areas"
                        class="btn btn-gold"><?php echo _t('hero.btn_areas'); ?> <i
                            class="fa-solid fa-microscope"></i></a>
                </div>
            </div>
        </div>

        <!-- Slide 3: Networking -->
        <div class="carousel-slide" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide03.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <div class="hero-event-dates">
                    <div class="hero-date-block">
                        <span class="day-num">09</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-connector">
                        <div class="connector-line"></div>
                        <span class="connector-label">al</span>
                        <div class="connector-line"></div>
                    </div>
                    <div class="hero-date-block">
                        <span class="day-num">13</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-year-label">
                        <span class="label-year">2026</span>
                    </div>
                </div>
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.slide3_title'); ?></h1>
                <p><?php echo _t('hero.slide3_subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/abstracts"
                        class="btn btn-gold"><?php echo _t('hero.btn_abstracts'); ?> <i
                            class="fa-solid fa-file-lines"></i></a>
                    <a href="<?php echo URLROOT; ?>/pages/abstracts#instrucciones"
                        class="nav-btn-outline"><?php echo _t('hero.btn_instructions'); ?></a>
                </div>
            </div>
        </div>

        <!-- Slide 4: Cómo llegar -->
        <div class="carousel-slide" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide05.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <div class="hero-event-dates">
                    <div class="hero-date-block">
                        <span class="day-num">09</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-connector">
                        <div class="connector-line"></div>
                        <span class="connector-label">al</span>
                        <div class="connector-line"></div>
                    </div>
                    <div class="hero-date-block">
                        <span class="day-num">13</span>
                        <span class="day-month"><?php echo _t('common.november'); ?></span>
                    </div>
                    <div class="hero-date-year-label">
                        <span class="label-year">2026</span>
                    </div>
                </div>
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.slide4_title'); ?></h1>
                <p><?php echo _t('hero.slide4_subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/puno#global-gateway"
                        class="btn btn-gold"><?php echo _t('hero.btn_puno'); ?> <i
                            class="fa-solid fa-map-location-dot"></i></a>
                    <a href="<?php echo URLROOT; ?>/pages/puno#hoteles"
                        class="nav-btn-outline"><?php echo _t('hero.btn_hotels'); ?></a>
                </div>
            </div>
        </div>

        <!-- Controles del Carrusel -->
        <button class="carousel-control prev" id="prevSlide"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="carousel-control next" id="nextSlide"><i class="fa-solid fa-chevron-right"></i></button>

        <!-- Indicadores -->
        <div class="carousel-indicators">
            <div class="indicator active" data-index="0"></div>
            <div class="indicator" data-index="1"></div>
            <div class="indicator" data-index="2"></div>
            <div class="indicator" data-index="3"></div>
        </div>

        <!-- Barra de Cuenta Regresiva (Sin cuadros, centrada) -->
        <div class="hero-countdown">
            <div class="container countdown-container text-center">
                <div class="countdown-item">
                    <span id="days" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.days'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="hours" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.hours'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="minutes" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.minutes'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="seconds" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.seconds'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 2: ¿Por qué participar?
     ============================================ -->
<section class="why-section" id="presentacion">
    <div class="why-section-bg"></div>
    <div class="container">
        <header class="why-header">
            <span class="why-badge"><?php echo _t('home.why_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.why_title'); ?></h2>
            <p class="why-intro"><?php echo _t('home.why_intro'); ?></p>
        </header>

        <!-- Beneficios principales con Iconos Scientific -->
        <div class="benefits-grid">
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                <h4><?php echo _t('home.benefit1_title'); ?></h4>
                <p><?php echo _t('home.benefit1_desc'); ?></p>
            </article>
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <h4><?php echo _t('home.benefit2_title'); ?></h4>
                <p><?php echo _t('home.benefit2_desc'); ?></p>
            </article>
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-flask-vial"></i>
                </div>
                <h4><?php echo _t('home.benefit3_title'); ?></h4>
                <p><?php echo _t('home.benefit3_desc'); ?></p>
            </article>
        </div>

        <!-- Bloques de evidencia visual -->
        <div class="why-evidence">
            <h3 class="why-evidence-title"><?php echo _t('home.evidence_title'); ?></h3>
            <div class="why-grid">
                <article class="why-card why-card-featured">
                    <div class="why-card-img">
                        <img src="<?php echo URLROOT; ?>/img/participar/3.jpeg" alt="Microscopic Analysis"
                            loading="lazy">
                        <span class="why-card-badge"><?php echo _t('home.evidence1_badge'); ?></span>
                    </div>
                    <div class="why-card-body">
                        <h3><?php echo _t('home.evidence1_title'); ?></h3>
                        <p><?php echo _t('home.evidence1_desc'); ?></p>
                        <ul class="why-card-features">
                            <li><i class="fa-solid fa-check"></i> Lab-certified</li>
                            <li><i class="fa-solid fa-check"></i> International Standards</li>
                        </ul>
                    </div>
                </article>
                <article class="why-card why-card-featured">
                    <div class="why-card-img">
                        <img src="<?php echo URLROOT; ?>/img/participar/7.jpeg" alt="Specialized Lab" loading="lazy">
                        <span class="why-card-badge"><?php echo _t('home.evidence2_badge'); ?></span>
                    </div>
                    <div class="why-card-body">
                        <h3><?php echo _t('home.evidence2_title'); ?></h3>
                        <p><?php echo _t('home.evidence2_desc'); ?></p>
                        <ul class="why-card-features">
                            <li><i class="fa-solid fa-check"></i> Species ID</li>
                            <li><i class="fa-solid fa-check"></i> Advanced Diagnostics</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>

    </div>
</section>

<!-- ============================================
     SECCIÓN 3: Estadísticas
     ============================================ -->
<section class="highlights">
    <div class="container text-center">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="150">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat1_label'); ?></h4>
                <p><?php echo _t('home.stat1_sub'); ?></p>
                <i class="fa-solid fa-building-columns stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="2500">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat2_label'); ?></h4>
                <p><?php echo _t('home.stat2_sub'); ?></p>
                <i class="fa-solid fa-user-graduate stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="850">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat3_label'); ?></h4>
                <p><?php echo _t('home.stat3_sub'); ?></p>
                <i class="fa-solid fa-microphone-lines stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="25">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat4_label'); ?></h4>
                <p><?php echo _t('home.stat4_sub'); ?></p>
                <i class="fa-solid fa-earth-americas stat-icon"></i>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 4: Interacción Institucional
     ============================================ -->
<section class="institutions-section">
    <div class="institutions-bg"></div>
    <div class="container">
        <header class="institutions-header">
            <span class="institutions-badge"><?php echo _t('home.inst_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.inst_title'); ?></h2>
            <p class="institutions-intro"><?php echo _t('home.inst_intro'); ?></p>
        </header>

        <div class="institutions-grid">
            <article class="institution-card" data-role="sede">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>UNA-PUNO</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card" data-role="facultad">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/Agronomica.png" alt="Agronomía" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Ingeniería Agronómica</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card institution-card-featured" data-role="organizador">
                <span class="institution-role institution-role-featured">Organizador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Perú" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>ONTA PERÚ</h4>
                    <p>Latin American Nematologists Organization</p>
                </div>
            </article>
            <article class="institution-card" data-role="investigacion">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/Instituto.png" alt="Institute" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Instituto de Investigación</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card" data-role="investigacion">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/3.png" alt="Protección Vegetal" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Protección Vegetal</h4>
                    <p>Research Institute</p>
                </div>
            </article>
            <article class="institution-card" data-role="investigacion">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/innama.png" alt="Protección Vegetal" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>INNAMA</h4>
                    <p>Instituto de Investigación e Innovación Agropecuaria y Medio Ambiente</p>
                </div>
            </article>
        </div>

        <div class="institutions-cta">
            <p><?php echo _t('home.inst_cta'); ?></p>
            <a href="javascript:void(0)" class="institutions-link"
                id="contactBtn"><?php echo _t('common.contact_us'); ?> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 5: Galería Científica
     ============================================ -->
<section class="gallery-section">
    <div class="gallery-section-bg"></div>
    <div class="container">
        <header class="gallery-header">
            <span class="gallery-badge"><?php echo _t('home.gallery_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.gallery_title'); ?></h2>
            <p class="gallery-intro"><?php echo _t('home.gallery_intro'); ?></p>
        </header>

        <div class="gallery-grid">
            <?php for ($i = 1; $i <= 15; $i++): ?>
                <?php 
                    $extraClass = '';
                    if ($i == 1 || $i == 5 || $i == 8 || $i == 13) $extraClass = 'gallery-item-large';
                    if ($i == 14) $extraClass = 'gallery-item-vertical';
                ?>
                <div class="gallery-item <?php echo $extraClass; ?>">
                    <img src="<?php echo URLROOT; ?>/img/galeria/<?php echo $i; ?>.jpeg"
                        alt="Scientific Gallery <?php echo $i; ?>" loading="lazy">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus gallery-icon"></i>
                        <span class="gallery-caption"><?php echo _t('common.read_more'); ?></span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 6: Sede del Evento
     ============================================ -->
<section class="venue-section">
    <div class="venue-section-bg"></div>
    <div class="container">
        <header class="venue-header">
            <span class="venue-badge"><?php echo _t('home.venue_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.venue_title'); ?></h2>
            <p class="venue-intro"><?php echo _t('home.venue_intro'); ?></p>
        </header>

        <div class="venue-content">
            <div class="venue-video-info">
                <div class="venue-video-wrap">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/7u0C2pi-vXk" frameborder="0" allowfullscreen
                            title="GHL Hotel Lago Titicaca"></iframe>
                    </div>
                </div>
                <div class="venue-desc">
                    <h3><?php echo _t('home.venue_subtitle'); ?></h3>
                    <p><?php echo _t('home.venue_desc'); ?></p>
                    <ul class="venue-features">
                        <li><i class="fa-solid fa-wifi"></i> <?php echo _t('home.venue_feat1'); ?></li>
                        <li><i class="fa-solid fa-chalkboard-user"></i> <?php echo _t('home.venue_feat2'); ?></li>
                        <li><i class="fa-solid fa-mountain-sun"></i> <?php echo _t('home.venue_feat3'); ?></li>
                        <li><i class="fa-solid fa-hotel"></i> <?php echo _t('home.venue_feat4'); ?></li>
                        <li><i class="fa-solid fa-utensils"></i> <?php echo _t('home.venue_feat5'); ?></li>
                        <li><i class="fa-solid fa-parking"></i> <?php echo _t('home.venue_feat6'); ?></li>
                    </ul>
                </div>
            </div>

            <div class="venue-map-col">
                <div class="venue-map-wrap">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2644.4895373953905!2d-69.9930701098846!3d-15.827668662881308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d696b407e2caf%3A0x481f260ef00c37d7!2sGHL%20Hotel%20Lago%20Titicaca!5e1!3m2!1ses-419!2spe!4v1778604429327!5m2!1ses-419!2spe" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="GHL Hotel Lago Titicaca - Location Map"></iframe>
                    </div>
                    <div class="venue-map-actions">
                        <a href="https://maps.app.goo.gl/WwGPGJPB2VgFQgDt7" target="_blank" rel="noopener noreferrer"
                            class="btn btn-gold">
                            <i class="fa-solid fa-map-location-dot"></i> <?php echo _t('home.map_btn'); ?>
                        </a>
                        <div class="venue-location-info">
                            <h4><i class="fa-solid fa-location-dot"></i> <?php echo _t('home.loc_title'); ?></h4>
                            <p><?php echo _t('home.loc_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODALES (GALERÍA Y CONTACTO)
     ============================================ -->
<div id="galleryModal" class="gallery-modal">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="modalCaption" class="modal-caption"></div>
</div>

<div id="contactModal" class="contact-modal">
    <div class="contact-modal-content">
        <button class="close-contact-modal"><i class="fa-solid fa-xmark"></i></button>

        <div class="contact-modal-header">
            <div class="contact-logo-wrap">
                <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Perú" class="contact-modal-logo">
            </div>
            <h2><?php echo _t('footer.contact'); ?></h2>
        </div>

        <div class="contact-modal-body">
            <!-- Dirección -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.address'); ?></span>
                    <p>Av. Floral N° 1153, Ciudad Universitaria.</p>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.phone'); ?></span>
                    <p>+51 956 838 730</p>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.email'); ?></span>
                    <p>ontaperu@unap.edu.pe</p>
                </div>
            </div>
        </div>

        <div class="contact-modal-footer">
            <div class="footer-decoration"></div>
            <p>ONTA PERU 2026 — Puno</p>
        </div>
    </div>
</div>

<!-- ============================================
     MODAL DE AVISO: SUBIDA DE RESÚMENES
     ============================================ -->
<div id="abstractNoticeModal" class="abstract-notice-modal">
    <div class="abstract-notice-content">
        <button class="close-notice-modal"><i class="fa-solid fa-xmark"></i></button>
        <div class="notice-grid">
            <div class="notice-left">
                <div class="notice-logo-container">
                    <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Logo" class="notice-logo">
                </div>
            </div>
            <div class="notice-right">
                <span class="notice-badge"><?php echo _t('notice.badge'); ?></span>
                <h2><?php echo _t('notice.title'); ?></h2>
                <p><?php echo _t('notice.desc'); ?></p>
                <div class="notice-actions">
                    <a href="<?php echo URLROOT; ?>/pages/abstracts#como-subir-mi-resumen" class="btn btn-gold">
                        <?php echo _t('notice.btn'); ?> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>