<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="comite-hero"
    style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/programacion.png'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('programacion.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('programacion.page_title'); ?> <span class="accent">ONTA 2026</span>
            </h1>
            <p class="comite-intro"><?php echo _t('programacion.page_intro'); ?></p>
        </header>
        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_days'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">93%</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_progress'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_speakers'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_countries'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Estado del Programa -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><span class="sci-icon-inline"><i class="fa-solid fa-flask-vial"></i></span>
                <?php echo _t('programacion.dev_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.dev_desc'); ?></p>
        </header>
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" style="width: 93%;">
                    <span class="progress-text">
                        <i class="fa-solid fa-chart-line"></i> 93%
                    </span>
                </div>
            </div>
            <div class="progress-steps">
                <div class="progress-step completed">
                    <i class="fa-solid fa-check-circle"></i>
                    <span><?php echo _t('programacion.step_planning'); ?></span>
                </div>
                <div class="progress-step completed">
                    <i class="fa-solid fa-check-circle"></i>
                    <span><?php echo _t('programacion.step_development'); ?></span>
                </div>
                <div class="progress-step active">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    <span><?php echo _t('programacion.step_review'); ?></span>
                </div>
                <div class="progress-step">
                    <i class="fa-solid fa-circle"></i>
                    <span><?php echo _t('programacion.step_finalization'); ?></span>
                </div>
            </div>
            <p class="progress-desc"><?php echo _t('programacion.dev_progress'); ?></p>
        </div>
        <div class="comite-organizer-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <h4><?php echo _t('programacion.info_dates'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_dates_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_dates_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                <h4><?php echo _t('programacion.info_speakers_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_speakers_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_speakers_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--coral">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <h4><?php echo _t('programacion.info_modes_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_modes_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_modes_desc'); ?></p>
            </article>
        </div>
    </div>
</section>

<!-- Conferencistas Confirmados -->
<section class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.speakers_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.speakers_desc'); ?></p>
        </header>
        <div class="comite-featured-grid">
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/Philippe.png" alt="Francia" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Philippe Castagnone-Sereno</span>
                    <h3>PhD. Philippe Castagnone-Sereno</h3>
                    <p class="comite-card-org">INRAE - Francia</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_research'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-microscope"></i> Investigación</span>
                        <span class="feature-tag"><i class="fa-solid fa-chalkboard-user"></i> Conferencia</span>
                    </div>
                </div>
            </article>

            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/paola.png" alt="Argentina" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Dra. Paola Lax</span>
                    <h3>Dra. Paola Lax</h3>
                    <p class="comite-card-org">UNC - Argentina</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_professor'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-dna"></i> Taxonomía</span>
                        <span class="feature-tag"><i class="fa-solid fa-magnifying-glass-chart"></i>
                            Clasificación</span>
                    </div>
                </div>
            </article>

            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/ernesto.png" alt="Chile" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">PhD. Ernesto San Blas</span>
                    <h3>PhD. Ernesto San Blas</h3>
                    <p class="comite-card-org">UOH - Chile</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_associate'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-shield-virus"></i> Entomopatógenos</span>
                        <span class="feature-tag"><i class="fa-solid fa-shield-halved"></i> Control</span>
                    </div>
                </div>
            </article>
        </div>

        <div class="comite-featured-grid" style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/JESUS.png" alt="Perú" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">PhD. Jesus H. Arcos Pineda</span>
                    <h3>PhD. Jesus H. Arcos Pineda</h3>
                    <p class="comite-card-org">UNA - Perú</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_researcher'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-mountain-sun"></i> Andes</span>
                        <span class="feature-tag"><i class="fa-solid fa-chart-line"></i> Distribución</span>
                    </div>
                </div>
            </article>

            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/vanessa.png" alt="Brasil" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Dra. Vanessa Mattos</span>
                    <h3>Dra. Vanessa Mattos</h3>
                    <p class="comite-card-org">Embrapa - Brasil</p>
                    <p class="comite-card-title"><?php echo _t('programacion.speaker_vanessa_role'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-dna"></i>
                            <?php echo _t('programacion.feature_taxonomy'); ?></span>
                        <span class="feature-tag"><i class="fa-solid fa-leaf"></i>
                            <?php echo _t('programacion.feature_biological'); ?></span>
                    </div>
                </div>
            </article>

        </div>
        <div class="conference-stats">
            <div class="stat-item">
                <span class="stat-number">5</span>
                <span class="stat-label"><?php echo _t('programacion.stat_speakers'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">5</span>
                <span class="stat-label"><?php echo _t('programacion.stat_countries'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">+50</span>
                <span class="stat-label"><?php echo _t('programacion.stat_exp'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label"><?php echo _t('programacion.stat_experts'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Lo que Puedes Esperar -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.expect_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.expect_desc'); ?></p>
        </header>
        <div class="comite-organizer-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <h4><?php echo _t('programacion.expect1_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect1_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-chart-area"></i>
                </div>
                <h4><?php echo _t('programacion.expect2_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect2_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-flask"></i>
                </div>
                <h4><?php echo _t('programacion.expect3_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect3_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--coral">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <h4><?php echo _t('programacion.expect4_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect4_desc'); ?></p>
            </article>
        </div>
    </div>
</section>

<?php
// ── Datos del programa oficial ───────────────────────────────────────────
$programa = _t('programacion.official_schedule_data');
?>

<!-- Cronograma Oficial -->
<section class="comite-section sch-section">
    <div class="container">
        <header class="comite-section-header">
            <span class="comite-badge"><?php echo _t('programacion.official_schedule_badge'); ?></span>
            <h2 class="section-title" style="margin-top:1rem;"><?php echo _t('programacion.schedule_title'); ?> <span
                    class="accent">ONTA 2026</span></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.official_schedule_desc'); ?></p>
        </header>

        <!-- Leyenda de tipos -->
        <div class="sch-legend">
            <span class="sch-legend-item" style="--lc:#c41e5a"><i class="fa-solid fa-star"></i> <?php echo _t('programacion.legend_plenaria'); ?></span>
            <span class="sch-legend-item" style="--lc:#6b46c1"><i class="fa-solid fa-table-columns"></i> <?php echo _t('programacion.legend_paralelas'); ?></span>
            <span class="sch-legend-item" style="--lc:#20c997"><i class="fa-solid fa-bus"></i> <?php echo _t('programacion.legend_campo'); ?></span>
            <span class="sch-legend-item" style="--lc:#f6ad55"><i class="fa-solid fa-layer-group"></i> <?php echo _t('programacion.legend_poster'); ?></span>
            <span class="sch-legend-item" style="--lc:#94a3b8"><i class="fa-solid fa-circle-dot"></i> <?php echo _t('programacion.legend_otros'); ?></span>
        </div>

        <!-- Pestañas de día -->
        <div class="sch-nav">
            <?php
            $dayIcons = ['fa-sun', 'fa-fire', 'fa-mountain-sun', 'fa-bolt', 'fa-flag-checkered'];
            foreach ($programa['dias'] as $i => $dia):
                ?>
                <button class="sch-tab <?php echo $i === 0 ? 'active' : ''; ?>" data-target="sch-dia-<?php echo $dia['dia']; ?>">
                    <i class="fa-solid <?php echo $dayIcons[$i] ?? 'fa-calendar'; ?>"></i>
                    <span class="sch-tab-num"><?php echo _t('programacion.day_label'); ?> <?php echo $dia['dia']; ?></span>
                    <span class="sch-tab-date"><?php echo $dia['fecha']; ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Paneles por día -->
        <?php foreach ($programa['dias'] as $i => $dia): ?>
            <div class="sch-panel <?php echo $i === 0 ? 'active' : ''; ?>" id="sch-dia-<?php echo $dia['dia']; ?>">
                <div class="sch-timeline">
                    <?php foreach ($dia['sesiones'] as $ses): ?>

                        <?php if ($ses['tipo'] === 'conferencia_plenaria'): ?>
                            <div class="sch-row sch-row--plenary">
                                <div class="sch-row-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo $ses['horario']; ?></span>
                                </div>
                                <div class="sch-row-dot" style="background:#c41e5a;"></div>
                                <div class="sch-row-body">
                                    <span class="sch-type-pill" style="background:#fff1f6;color:#c41e5a;"><i
                                            class="fa-solid fa-star"></i> <?php echo _t('programacion.legend_plenaria'); ?></span>
                                    <p class="sch-row-title"><?php echo htmlspecialchars($ses['titulo']); ?></p>
                                    <p class="sch-row-speaker"><i class="fa-solid fa-user-tie"></i>
                                        <strong><?php echo $ses['ponente']; ?></strong><?php if (!empty($ses['institucion'])): ?>
                                            &mdash; <em><?php echo $ses['institucion']; ?></em><?php endif; ?></p>
                                </div>
                            </div>

                        <?php elseif ($ses['tipo'] === 'sesiones_paralelas'): ?>
                            <div class="sch-row sch-row--parallel">
                                <div class="sch-row-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo $ses['horario']; ?></span>
                                </div>
                                <div class="sch-row-dot" style="background:#6b46c1;"></div>
                                <div class="sch-row-body" style="width:100%">
                                    <span class="sch-type-pill" style="background:#f5f2ff;color:#6b46c1;"><i
                                            class="fa-solid fa-table-columns"></i> <?php echo _t('programacion.legend_paralelas'); ?></span>
                                    <div class="sch-parallel-grid">
                                        <?php foreach ($ses['salas'] as $sala): ?>
                                            <div class="sch-sala">
                                                <div class="sch-sala-header"><i class="fa-solid fa-door-open"></i>
                                                    <?php echo $sala['sala']; ?></div>
                                                <?php foreach ($sala['bloques'] as $b): ?>
                                                    <?php $isBrk = stripos($b['ponente'], 'coffee') !== false || stripos($b['ponente'], 'break') !== false; ?>
                                                    <div class="sch-bloque <?php echo $isBrk ? 'sch-bloque--break' : ''; ?>">
                                                        <span class="sch-bloque-time"><?php echo $b['horario']; ?></span>
                                                        <span><?php echo $b['ponente']; ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($ses['tipo'] === 'salida_de_campo'): ?>
                            <div class="sch-row sch-row--field">
                                <div class="sch-row-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo $ses['horario']; ?></span>
                                </div>
                                <div class="sch-row-dot" style="background:#20c997;"></div>
                                <div class="sch-row-body">
                                    <span class="sch-type-pill" style="background:#e6fffa;color:#20c997;"><i
                                            class="fa-solid fa-bus"></i> <?php echo _t('programacion.legend_campo'); ?></span>
                                    <p class="sch-row-title"><?php echo $ses['descripcion']; ?></p>
                                    <?php if (!empty($ses['destinos'])): ?>
                                        <div class="sch-destinos">
                                            <?php foreach ($ses['destinos'] as $d): ?>
                                                <span class="sch-destino-tag"><i class="fa-solid fa-location-dot"></i>
                                                    <?php echo $d; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php elseif ($ses['tipo'] === 'sesion_poster'): ?>
                            <div class="sch-row sch-row--poster">
                                <div class="sch-row-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo $ses['horario']; ?></span>
                                </div>
                                <div class="sch-row-dot" style="background:#f6ad55;"></div>
                                <div class="sch-row-body">
                                    <span class="sch-type-pill" style="background:#fffdf2;color:#c07a00;"><i
                                            class="fa-solid fa-layer-group"></i> <?php echo _t('programacion.legend_poster'); ?></span>
                                    <p class="sch-row-title"><?php echo $ses['descripcion']; ?></p>
                                </div>
                            </div>

                        <?php else: ?>
                            <div class="sch-row sch-row--other">
                                <div class="sch-row-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo $ses['horario']; ?></span>
                                </div>
                                <div class="sch-row-dot" style="background:#94a3b8;"></div>
                                <div class="sch-row-body">
                                    <p class="sch-row-title" style="color:#64748b;">
                                        <?php echo $ses['descripcion'] ?? ucfirst($ses['tipo']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
    /* ── Schedule section ─────────────────────────── */
    .sch-section {
        background: #f9fafb;
    }

    /* Legend */
    .sch-legend {
        display: flex;
        flex-wrap: wrap;
        gap: .8rem;
        margin-bottom: 2.5rem;
    }

    .sch-legend-item {
        display: flex;
        align-items: center;
        gap: .5rem;
        font-size: .8rem;
        font-weight: 700;
        padding: .4rem 1rem;
        border-radius: 50px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
        color: var(--lc);
        border: 1.5px solid var(--lc);
    }

    /* Day tabs */
    .sch-nav {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding-bottom: 1.2rem;
        margin-bottom: 2.5rem;
        scrollbar-width: none;
    }

    .sch-nav::-webkit-scrollbar {
        display: none;
    }

    .sch-tab {
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .3rem;
        padding: 1rem 1.8rem;
        background: #fff;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        cursor: pointer;
        transition: all .3s ease;
        min-width: 160px;
    }

    .sch-tab i {
        font-size: 1.4rem;
        color: #94a3b8;
        transition: color .3s;
    }

    .sch-tab-num {
        font-weight: 800;
        font-size: 1rem;
        color: #334155;
    }

    .sch-tab-date {
        font-size: .75rem;
        color: #94a3b8;
    }

    .sch-tab.active {
        background: var(--pink);
        border-color: var(--pink);
        box-shadow: 0 8px 24px rgba(196, 30, 90, .25);
    }

    .sch-tab.active i,
    .sch-tab.active .sch-tab-num,
    .sch-tab.active .sch-tab-date {
        color: #fff;
    }

    /* Panel animation */
    .sch-panel {
        display: none;
    }

    .sch-panel.active {
        display: block;
        animation: schSlide .4s ease;
    }

    @keyframes schSlide {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Timeline rows */
    .sch-timeline {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .sch-row {
        display: grid;
        grid-template-columns: 130px 20px 1fr;
        align-items: start;
        gap: 1rem;
    }

    .sch-row-time {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: .3rem;
        padding-top: .6rem;
        font-weight: 700;
        font-size: .82rem;
        color: #94a3b8;
    }

    .sch-row-time i {
        font-size: .9rem;
    }

    .sch-row-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        margin-top: .7rem;
        flex-shrink: 0;
        box-shadow: 0 0 0 3px #fff, 0 0 0 5px rgba(0, 0, 0, .08);
    }

    /* Row body */
    .sch-row-body {
        background: #fff;
        border-radius: 16px;
        padding: 1.2rem 1.4rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
        transition: box-shadow .25s;
    }

    .sch-row-body:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, .1);
    }

    .sch-type-pill {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        font-size: .72rem;
        font-weight: 800;
        padding: .25rem .9rem;
        border-radius: 999px;
        margin-bottom: .7rem;
    }

    .sch-row-title {
        font-weight: 700;
        font-size: .95rem;
        color: #1e293b;
        line-height: 1.5;
        margin: .3rem 0 .5rem;
    }

    .sch-row-speaker {
        font-size: .85rem;
        color: #64748b;
    }

    /* Row variants */
    .sch-row--plenary .sch-row-body {
        border-left: 4px solid #c41e5a;
    }

    .sch-row--parallel .sch-row-body {
        border-left: 4px solid #6b46c1;
    }

    .sch-row--field .sch-row-body {
        border-left: 4px solid #20c997;
    }

    .sch-row--poster .sch-row-body {
        border-left: 4px solid #f6ad55;
    }

    /* Parallel layout */
    .sch-parallel-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
        margin-top: .5rem;
    }

    .sch-sala {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1rem;
        border: 1px solid #f0f0f0;
    }

    .sch-sala-header {
        font-weight: 800;
        font-size: .85rem;
        color: #6b46c1;
        margin-bottom: .8rem;
        padding-bottom: .5rem;
        border-bottom: 2px dashed #e9d5ff;
    }

    .sch-bloque {
        display: flex;
        gap: .8rem;
        align-items: baseline;
        font-size: .8rem;
        padding: .4rem .5rem;
        border-radius: 6px;
        margin-bottom: .3rem;
    }

    .sch-bloque-time {
        font-weight: 700;
        color: #94a3b8;
        min-width: 80px;
        flex-shrink: 0;
    }

    .sch-bloque--break {
        background: #fff9db;
        color: #92400e;
        font-weight: 700;
        border-radius: 8px;
        padding: .5rem;
    }

    .sch-bloque--break .sch-bloque-time {
        color: #92400e;
    }

    /* Destinos */
    .sch-destinos {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        margin-top: .8rem;
    }

    .sch-destino-tag {
        background: #e6fffa;
        color: #0d9488;
        font-size: .78rem;
        font-weight: 700;
        padding: .3rem .8rem;
        border-radius: 999px;
    }

    @media(max-width:768px) {
        .sch-row {
            grid-template-columns: 80px 16px 1fr;
            gap: .6rem;
        }

        .sch-row-time {
            font-size: .72rem;
        }

        .sch-parallel-grid {
            grid-template-columns: 1fr;
        }

        .sch-tab {
            min-width: 130px;
            padding: .8rem 1.2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.sch-tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                var t = tab.getAttribute('data-target');
                document.querySelectorAll('.sch-tab').forEach(function (x) { x.classList.remove('active'); });
                tab.classList.add('active');
                document.querySelectorAll('.sch-panel').forEach(function (p) {
                    p.classList.remove('active');
                    if (p.id === t) p.classList.add('active');
                });
            });
        });
    });
</script>

<!-- Información Importante -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.info_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.info_desc'); ?></p>
        </header>
        <div class="info-grid">
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-location-pin"></i>
                </div>
                <h4><?php echo _t('programacion.venue_title'); ?></h4>
                <p class="info-title"><?php echo _t('programacion.venue_val'); ?></p>
                <p class="info-desc"><?php echo _t('programacion.venue_desc'); ?></p>
                <p class="info-detail"><?php echo _t('programacion.venue_sub'); ?></p>
            </article>
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <h4><?php echo _t('programacion.modes_title_info'); ?></h4>
                <ul class="info-list">
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.mode_oral'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.mode_poster'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.mode_workshop'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.mode_roundtable'); ?></li>
                </ul>
            </article>
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <h4><?php echo _t('programacion.attendees_title'); ?></h4>
                <p class="info-title"><?php echo _t('programacion.attendees_val'); ?></p>
                <p class="info-desc"><?php echo _t('programacion.attendees_desc'); ?></p>
            </article>
            <div class="info-card-centered">
                <article class="info-card">
                    <div class="sci-icon-box sci-icon-box--coral">
                        <i class="fa-solid fa-language"></i>
                    </div>
                    <h4><?php echo _t('programacion.langs_title'); ?></h4>
                    <ul class="info-list">
                        <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang1'); ?></li>
                        <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang2'); ?></li>
                        <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang3'); ?></li>
                        <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang4'); ?></li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="comite-section-header" style="text-align: center;">
            <h2 class="section-title"><?php echo _t('programacion.cta_title_prog'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.cta_desc_prog'); ?></p>
        </div>
        <div class="comite-cta-buttons" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo URLROOT; ?>/pages/presentacion" class="comite-cta-btn">
                <i class="fa-solid fa-circle-info"></i>
                <?php echo _t('programacion.cta_presentation'); ?>
            </a>
            <a href="<?php echo URLROOT; ?>/pages/areas" class="comite-cta-btn">
                <i class="fa-solid fa-layer-group"></i>
                <?php echo _t('programacion.cta_areas'); ?>
            </a>
            <a href="<?php echo URLROOT; ?>/inscriptions" class="comite-cta-btn comite-cta-btn--primary">
                <i class="fa-solid fa-user-plus"></i>
                <?php echo _t('programacion.cta_register_now'); ?>
            </a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>