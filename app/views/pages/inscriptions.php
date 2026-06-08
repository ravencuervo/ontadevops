<?php

$hasRegError = isset($_SESSION['register_error']);
require APPROOT . '/views/inc/header.php';

?>

<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/inscripciones.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('inscriptions.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('inscriptions.page_title'); ?></h1>
            <p class="comite-intro"><?php echo _t('inscriptions.page_intro'); ?></p>
        </header>
        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">3</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_categories'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">6</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_periods'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">$300</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_from'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">500+</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_attendees'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Convocatoria Científica e Inscripción Premium Evolution -->
<section class="scientific-premium-section" id="inscripcion-flujo">
    <div class="registration-background-texture"></div>
    <div class="container relative z-10">
        <div class="master-card-evolution">
            
            <!-- Cabecera Ultra-Compacta -->
            <div class="header-premium-dark">
                <div class="header-inner-content">
                    <div class="badge-container">
                        <span class="premium-flair-badge">
                            <i class="fa-solid fa-microscope"></i>
                            <span>Portal ONTA 2026</span>
                        </span>
                    </div>
                    <div class="title-meta-wrap">
                        <h2 class="hero-title-serif"><?php echo _t('inscriptions.hero_title'); ?></h2>
                        <div class="header-meta">
                            <div class="meta-item active-tag">
                                <i class="fa-solid fa-circle-check"></i>
                                <span><?php echo _t('inscriptions.hero_meta_pre'); ?></span>
                            </div>
                            <div class="meta-item defer-tag">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span><?php echo _t('inscriptions.hero_meta_deferred'); ?></span>
                            </div>
                        </div>
                    </div>
                    <p class="hero-description">
                        <?php echo _t('inscriptions.hero_desc'); ?>
                    </p>
                </div>
            </div>

            <!-- Cuerpo del Módulo: Arquitectura de Información Refinada -->
            <div class="master-body-layout">
                
                <!-- Timeline: El Viaje del Participante -->
                <div class="journey-column">
                    <h3 class="journey-title"><?php echo _t('inscriptions.journey_title'); ?></h3>
                    
                    <div class="journey-timeline">
                        <!-- Nodo 01 -->
                        <div class="journey-node animated-step-1">
                            <div class="node-numeric">01</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step1_title'); ?></h4>
                                    <span class="status-tag tag-free"><?php echo _t('inscriptions.journey_step1_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step1_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 02 -->
                        <div class="journey-node animated-step-2">
                            <div class="node-numeric">02</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step2_title'); ?></h4>
                                    <span class="status-tag tag-free"><?php echo _t('inscriptions.journey_step2_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step2_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 03 -->
                        <div class="journey-node animated-step-3">
                            <div class="node-numeric">03</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step3_title'); ?></h4>
                                    <span class="status-tag tag-free"><?php echo _t('inscriptions.journey_step3_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step3_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 04 -->
                        <div class="journey-node animated-step-4">
                            <div class="node-numeric">04</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step4_title'); ?></h4>
                                    <span class="status-tag tag-free"><?php echo _t('inscriptions.journey_step4_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step4_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 05 -->
                        <div class="journey-node animated-step-5">
                            <div class="node-numeric">05</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step5_title'); ?></h4>
                                    <span class="status-tag tag-opt"><?php echo _t('inscriptions.journey_step5_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step5_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 06 -->
                        <div class="journey-node animated-step-6">
                            <div class="node-numeric">06</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step6_title'); ?></h4>
                                    <span class="status-tag tag-opt"><?php echo _t('inscriptions.journey_step6_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step6_desc'); ?></p>
                            </div>
                        </div>

                        <!-- Nodo 07 -->
                        <div class="journey-node animated-step-7">
                            <div class="node-numeric">07</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4><?php echo _t('inscriptions.journey_step7_title'); ?></h4>
                                    <span class="status-tag tag-soon"><?php echo _t('inscriptions.journey_step7_tag'); ?></span>
                                </div>
                                <p><?php echo _t('inscriptions.journey_step7_desc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portal de Acción Compacto -->
                <div class="portal-cta-column">
                    <div class="glass-portal-card">
                        <div class="portal-content">
                            <div class="portal-icon-box-mini">
                                <i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <h3><?php echo _t('inscriptions.portal_title'); ?></h3>
                            <p><?php echo _t('inscriptions.portal_desc'); ?></p>
                            
                            <div class="portal-cta-group" style="display: flex; flex-direction: column; gap: 1rem; width: 100%;">
                                <button class="btn-royal-action" onclick="openRegModal('registrationModal'); showRegisterView();">
                                    <span class="btn-main-txt"><?php echo _t('inscriptions.btn_register_now'); ?></span>
                                    <div class="btn-aura"></div>
                                </button>
                                
                                <a href="<?php echo URLROOT; ?>/users/login" class="btn-royal-action" style="background: var(--p-purple); text-decoration: none;">
                                    <span class="btn-main-txt" style="font-size: 1rem;"><?php echo _t('inscriptions.btn_start_inscription'); ?></span>
                                    <div class="btn-aura"></div>
                                </a>

                                <button class="btn-royal-action" onclick="openRegModal('loginRedirectModal')" style="background: var(--p-gold);">
                                    <span class="btn-main-txt" style="font-size: 1rem;"><?php echo _t('inscriptions.btn_pay_inscription'); ?></span>
                                    <div class="btn-aura"></div>
                                </button>

                                <!-- Guía de Pagos Link -->
                                <div style="margin-top: 0.5rem; text-align: center;">
                                    <?php 
                                        $pGuide = (getCurrentLang() == 'ES') ? 'guia_pagos_español.pdf' : 'guia_pagos_ingles.pdf';
                                    ?>
                                    <a href="<?php echo URLROOT; ?>/uploads/formatos/<?php echo $pGuide; ?>" target="_blank" style="color: var(--p-indigo); font-size: 0.85rem; font-weight: 700; text-decoration: underline; display: flex; align-items: center; justify-content: center; gap: 6px;">
                                        <i class="fa-solid fa-file-pdf" style="color: var(--p-pink);"></i> 
                                        <?php echo _t('inscriptions.payment_guide_btn'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sección de Tutoriales de Video -->
            <div class="tutorials-evolution-wrap">
                <div class="tutorials-header">
                    <span class="tutorials-badge"><?php echo _t('inscriptions.tutorials_title'); ?></span>
                    <h3 class="tutorials-main-title"><?php echo _t('inscriptions.tutorials_subtitle'); ?></h3>
                </div>
                
                <div class="tutorials-grid">
                    <!-- Tutorial Español -->
                    <div class="tutorial-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/MRrsSe9m1ik" title="<?php echo _t('inscriptions.tutorial_es_title'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="tutorial-info">
                            <i class="fa-solid fa-play"></i>
                            <span><?php echo _t('inscriptions.tutorial_es_title'); ?></span>
                        </div>
                    </div>

                    <!-- Tutorial Inglés -->
                    <div class="tutorial-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/ruPysWC567I" title="<?php echo _t('inscriptions.tutorial_en_title'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="tutorial-info">
                            <i class="fa-solid fa-play"></i>
                            <span><?php echo _t('inscriptions.tutorial_en_title'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* 
   SCIENTIFIC PREMIUM EVOLUTION - CSS 
   Concepto: "Elegancia Académica y Minimalismo Tecnológico"
*/

:root {
    --p-indigo: #1a1625;
    --p-purple: #2d2440;
    --p-gold: #DEB05A;
    --p-pink: #E74C74;
    --p-text-dim: rgba(255,255,255,0.7);
    --p-shadow: 0 40px 100px -20px rgba(0,0,0,0.15);
}

.scientific-premium-section {
    padding: 4rem 0; /* Achatado */
    background-color: #fcfcfd;
    position: relative;
    overflow: hidden;
}

.registration-background-texture {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: radial-gradient(#2d2440 0.5px, transparent 0.5px);
    background-size: 30px 30px;
    opacity: 0.03;
    pointer-events: none;
}

/* Master Card Logic */
.master-card-evolution {
    background: #fff;
    border-radius: 40px; /* Reducido para compactar */
    box-shadow: var(--p-shadow);
    overflow: hidden;
    position: relative;
    border: 1px solid rgba(0,0,0,0.03);
}

/* Header Evolution Ultra Compact */
.header-premium-dark {
    background: var(--p-indigo);
    padding: 2.5rem 4rem; /* Más achatado */
    color: white;
    position: relative;
    overflow: hidden;
    border-bottom: 3px solid var(--p-gold);
}

.title-meta-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    margin-bottom: 0.5rem;
}

.header-premium-dark::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(45deg, rgba(231, 76, 116, 0.05) 0%, transparent 70%);
}

.badge-container { margin-bottom: 0.8rem; }

.premium-flair-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255,255,255,0.05);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    font-size: 0.65rem;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--p-gold);
}

.hero-title-serif {
    font-family: 'Playfair Display', "Marcellus", serif;
    font-size: 2.2rem; /* Más pequeño */
    line-height: 1.2;
    margin: 0;
    letter-spacing: -0.5px;
}

.gold-text-gradient {
    background: linear-gradient(135deg, #DEB05A, #F3D9A1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.1rem; /* Compactado */
    line-height: 1.4;
    max-width: 650px;
    color: var(--p-text-dim);
    margin-top: 0.5rem;
}

.highlight-free {
    color: white;
    font-weight: 700;
    background: rgba(231,76,116,0.25);
    padding: 1px 6px;
    border-radius: 4px;
}

.header-meta {
    display: flex;
    gap: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.05);
}

.active-tag { color: #4ade80; border-color: rgba(74, 222, 128, 0.2); }
.defer-tag { color: var(--p-gold); border-color: rgba(222, 176, 90, 0.2); }

/* Master Body Compact */
.master-body-layout {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 3rem;
    padding: 2.5rem 4rem; /* Achatado */
}

.journey-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: var(--p-indigo);
    margin-bottom: 2rem;
    position: relative;
    padding-left: 1.2rem;
}

.journey-title::before {
    content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%);
    width: 4px; height: 25px; background: var(--p-pink); border-radius: 2px;
}

/* Timeline Evolution */
.journey-timeline { position: relative; }
.journey-node {
    display: flex;
    gap: 2rem;
    padding-bottom: 2rem; /* Compacto */
    position: relative;
}

.journey-node:last-child { padding-bottom: 0; }
.journey-node::before {
    content: ''; position: absolute; left: 22px; top: 50px;
    width: 1px; height: calc(100% - 50px);
    background: #eee;
}

.node-numeric {
    width: 45px; height: 45px; /* Más pequeño */
    background: #fff;
    border: 1px solid #eee;
    display: flex; align-items: center; justify-content: center;
    border-radius: 12px;
    font-weight: 900;
    font-size: 0.9rem;
    color: #bbb;
    z-index: 2;
}

.node-info-box h4 { font-size: 1.1rem; font-weight: 700; color: var(--p-indigo); margin-bottom: 0.3rem; transition: color 0.5s ease; }
.node-info-box p { color: #666; font-size: 0.95rem; line-height: 1.4; }

/* Animación Dinámica del Timeline */
@keyframes stepHighlight {
    0%, 14% { border-color: var(--p-pink); color: var(--p-pink); transform: scale(1.15); box-shadow: 0 5px 15px rgba(231,76,116,0.2); }
    15%, 100% { border-color: #eee; color: #bbb; transform: scale(1); box-shadow: none; }
}

@keyframes textHighlight {
    0%, 14% { color: var(--p-pink); }
    15%, 100% { color: var(--p-indigo); }
}

.animated-step-1 .node-numeric { animation: stepHighlight 21s infinite; }
.animated-step-1 h4 { animation: textHighlight 21s infinite; }

.animated-step-2 .node-numeric { animation: stepHighlight 21s infinite 3s; }
.animated-step-2 h4 { animation: textHighlight 21s infinite 3s; }

.animated-step-3 .node-numeric { animation: stepHighlight 21s infinite 6s; }
.animated-step-3 h4 { animation: textHighlight 21s infinite 6s; }

.animated-step-4 .node-numeric { animation: stepHighlight 21s infinite 9s; }
.animated-step-4 h4 { animation: textHighlight 21s infinite 9s; }

.animated-step-5 .node-numeric { animation: stepHighlight 21s infinite 12s; }
.animated-step-5 h4 { animation: textHighlight 21s infinite 12s; }

.animated-step-6 .node-numeric { animation: stepHighlight 21s infinite 15s; }
.animated-step-6 h4 { animation: textHighlight 21s infinite 15s; }

.animated-step-7 .node-numeric { animation: stepHighlight 21s infinite 18s; }
.animated-step-7 h4 { animation: textHighlight 21s infinite 18s; }

.status-tag {
    padding: 0.3rem 0.9rem; border-radius: 100px; font-size: 0.65rem; font-weight: 900; text-transform: uppercase;
}
.tag-free { background: #f0fdf4; color: #16a34a; }
.tag-opt { background: #eff6ff; color: #2563eb; }
.tag-soon { background: #fafafa; color: #999; border: 1px solid #eee; }

.journey-node.step-completed .node-numeric { border-color: var(--p-pink); color: var(--p-pink); box-shadow: 0 10px 20px rgba(231,76,116,0.1); }
.journey-node.step-optional .node-numeric { border-style: dashed; }
.journey-node p { color: #666; font-size: 1.05rem; line-height: 1.5; }

/* Portal CTA Compact */
.glass-portal-card {
    background: #fdfdfd;
    border-radius: 30px;
    padding: 2.5rem 3rem; /* Más pequeño */
    text-align: center;
    border: 1px solid rgba(0,0,0,0.04);
}

.portal-icon-box-mini {
    width: 70px; height: 70px;
    background: var(--p-indigo);
    color: white;
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 20px rgba(26,22,37,0.1);
}

.portal-content h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 0.8rem; color: var(--p-indigo); }
.portal-content p { color: #777; font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.5; }

/* New Royal Action Button - Improved */
.btn-royal-action {
    width: 100%;
    background: var(--p-indigo);
    color: white;
    border: none;
    padding: 1.2rem 2rem;
    border-radius: 16px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 15px 30px -5px rgba(26,22,37,0.4);
}

.btn-royal-action .btn-main-txt {
    display: block;
    font-weight: 900;
    font-size: 1.2rem;
    letter-spacing: 2px;
    position: relative; z-index: 2;
}

.btn-royal-action .btn-sub-txt {
    display: block;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    opacity: 0.7;
    margin-top: 4px;
    position: relative; z-index: 2;
}

.btn-aura {
    position: absolute;
    top: 50%; left: 50%; width: 0; height: 0;
    background: radial-gradient(circle, rgba(231, 76, 116, 0.4) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
    z-index: 1;
}

.btn-royal-action:hover {
    transform: translateY(-5px);
    background: var(--p-pink); /* Rosa Sólido */
    color: white;
    box-shadow: 0 25px 50px -10px rgba(231, 76, 116, 0.4);
}

.btn-royal-action:hover .btn-main-txt,
.btn-royal-action:hover .btn-sub-txt {
    color: white;
}

.btn-royal-action::after {
    content: '';
    position: absolute;
    top: 0; left: -100%; width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    transition: left 0.5s ease;
}

.btn-royal-action:hover::after { left: 100%; }

/* Responsive Evolution */
@media (max-width: 1200px) {
    .header-premium-dark { padding: 3rem; }
    .hero-title-serif { font-size: 2.5rem; }
    .master-body-layout { padding: 3rem; grid-template-columns: 1fr; }
    .glass-portal-card { position: relative; top: 0; }
}

@media (max-width: 768px) {
    .scientific-premium-section { padding: 2rem 0; }
    .master-card-evolution { border-radius: 24px; }
    .header-premium-dark { padding: 2rem 1.5rem; text-align: center; }
    .title-meta-wrap { flex-direction: column; gap: 1rem; align-items: center; }
    .header-meta { flex-direction: column; gap: 0.8rem; width: 100%; align-items: stretch; }
    .meta-item { justify-content: center; width: 100%; }
    .hero-title-serif { font-size: 1.8rem; }
    
    .master-body-layout { padding: 2rem 1.5rem; gap: 2rem; }
    
    .journey-title { font-size: 1.3rem; margin-bottom: 1.5rem; text-align: center; padding-left: 0; }
    .journey-title::before { display: none; }
    
    .journey-node { flex-direction: row; gap: 1rem; padding-bottom: 2rem; }
    .journey-node::before { left: 19px; top: 45px; height: calc(100% - 45px); }
    .node-numeric { width: 40px; height: 40px; font-size: 0.85rem; }
    
    .node-info-box h4 { font-size: 1.05rem; }
    .node-info-box p { font-size: 0.9rem; margin-top: 0.4rem; }
    
    .glass-portal-card { padding: 2rem 1.5rem; border-radius: 24px; }
    .btn-royal-action { padding: 1rem; }
    .btn-royal-action .btn-main-txt { font-size: 1.05rem; }
}

@media (max-width: 480px) {
    .header-premium-dark { padding: 1.5rem 1rem; }
    .master-body-layout { padding: 1.5rem 1rem; }
    .journey-node { flex-direction: column; gap: 1rem; align-items: center; text-align: center; }
    .journey-node::before { display: none; }
    .node-header { display: flex; flex-direction: column; align-items: center; gap: 0.5rem; }
}

/* Tutorial Section Styling */
.tutorials-evolution-wrap {
    margin-top: 4rem;
    padding: 3.5rem;
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(20px);
    border-radius: 40px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: 0 30px 70px rgba(0,0,0,0.04);
    position: relative;
    z-index: 20;
}

.tutorials-header {
    text-align: center;
    margin-bottom: 3.5rem;
}

.tutorials-badge {
    background: var(--p-gold);
    color: var(--p-indigo);
    padding: 0.6rem 1.8rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    display: inline-block;
    margin-bottom: 1.2rem;
    box-shadow: 0 4px 15px rgba(222, 176, 90, 0.3);
}

.tutorials-main-title {
    font-size: 2.2rem;
    color: var(--p-indigo);
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.tutorials-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
}

.tutorial-card {
    background: white;
    border-radius: 35px;
    overflow: hidden;
    box-shadow: 0 20px 45px rgba(0,0,0,0.06);
    transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    border: 1px solid rgba(0,0,0,0.02);
}

.tutorial-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 40px 80px rgba(0,0,0,0.12);
}

.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
    background: #111;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

.tutorial-info {
    padding: 2rem 2.5rem;
    display: flex;
    align-items: center;
    gap: 1.2rem;
    background: #fff;
}

.tutorial-info span {
    color: var(--p-indigo);
    font-weight: 700;
    font-size: 1.2rem;
    font-family: 'Outfit', sans-serif;
}

.tutorial-info i {
    background: var(--p-gold);
    color: white;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1rem;
    box-shadow: 0 8px 20px rgba(222, 176, 90, 0.4);
}

@media (max-width: 992px) {
    .tutorials-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .tutorials-evolution-wrap {
        padding: 2.5rem 1.5rem;
        margin-top: 3rem;
    }

    .tutorials-main-title {
        font-size: 1.8rem;
    }
}

/* Pricing Grid Responsiveness */
.pricing-grid {
    display: grid !important;
    grid-template-columns: repeat(5, 1fr) !important;
    gap: 1.5rem;
}

@media (max-width: 1400px) {
    .pricing-grid {
        grid-template-columns: repeat(3, 1fr) !important;
    }
}

@media (max-width: 992px) {
    .pricing-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 650px) {
    .pricing-grid {
        grid-template-columns: 1fr !important;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr !important;
    }
    
    .invitation-letter-box {
        flex-direction: column !important;
        padding: 2.5rem 1.5rem !important;
        gap: 2rem !important;
    }
    
    .invitation-icon {
        margin: 0 auto !important;
    }
    
    .invitation-content {
        text-align: center !important;
        min-width: 100% !important;
    }
    
    .invitation-emails {
        justify-content: center !important;
    }
}

@media (max-width: 768px) {
    .section-title {
        font-size: 2rem !important;
    }
    
    .benefit-card {
        padding: 2rem !important;
    }

    .hide-mobile {
        display: none !important;
    }
}
/* Google reCAPTCHA logic inside premium layout */
.g-recaptcha { margin: 1rem 0; transform-origin: left; transform: scale(0.9); }
@media (max-width: 768px) { .g-recaptcha { transform: scale(0.8); } }
</style>

<!-- ==============================================
     BENEFICIOS Y CARTA DE INVITACIÓN
     ============================================== -->
<section class="benefits-invitation-section" style="padding: 4rem 0; background: #fff; border-top: 1px solid rgba(0,0,0,0.03);">
    <div class="container">
        
        <!-- Beneficios -->
        <div class="registration-benefits" style="margin-bottom: 5rem;">
            <header class="comite-section-header" style="text-align: center; margin-bottom: 3.5rem;">
                <span class="premium-flair-badge" style="color: var(--pink); border-color: rgba(231,76,116,0.2); background: rgba(231,76,116,0.05); margin-bottom: 1.2rem; display: inline-flex; align-items: center; gap: 0.5rem;"><i class="fa-solid fa-gift"></i> Valor Añadido</span>
                <h2 class="section-title" style="font-size: 2.6rem; margin-bottom: 1.2rem; color: var(--p-indigo); letter-spacing: -0.5px;"><?php echo _t('inscriptions.benefits_title'); ?></h2>
                <p class="comite-section-desc" style="font-size: 1.15rem; line-height: 1.7; color: #555; max-width: 800px; margin-left: auto; margin-right: auto;"><?php echo _t('inscriptions.benefits_intro'); ?></p>
            </header>

            <div class="benefits-grid" style="display: flex; justify-content: center;">
                
                <!-- Beneficio Único Consolidado -->
                <div class="benefit-card" style="background: var(--cream); padding: 3rem; border-radius: 20px; border-left: 6px solid var(--purple); box-shadow: 0 10px 30px rgba(0,0,0,0.02); display: flex; flex-direction: column; height: 100%; position: relative; max-width: 700px; width: 100%;">
                    <h4 style="font-family: var(--font-serif); font-size: 1.4rem; color: var(--purple); margin-bottom: 1.8rem; line-height: 1.3; font-weight: 800;">Todas las categorías de inscripción incluyen:</h4>
                    <ul class="benefit-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.4rem; flex: 1;">
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-martini-glass-citrus" style="color: var(--pink); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_all_1'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-bus" style="color: var(--pink); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_all_2'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-utensils" style="color: var(--pink); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_all_3'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-award" style="color: var(--gold); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5; font-weight: 700; color: var(--p-indigo);"><?php echo _t('inscriptions.benefits_all_4'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-mug-hot" style="color: var(--gold); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_other_1'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-briefcase" style="color: var(--gold); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_other_2'); ?></span>
                        </li>
                        <li style="display: flex; gap: 1.2rem; align-items: flex-start; font-size: 1rem; color: var(--text-dark);">
                            <i class="fa-solid fa-microscope" style="color: var(--gold); margin-top: 3px; font-size: 1.3rem; width: 25px; text-align: center;"></i> <span style="line-height: 1.5;"><?php echo _t('inscriptions.benefits_other_3'); ?></span>
                        </li>
                    </ul>
                    <p style="margin-top: 2rem; font-size: 0.9rem; color: var(--text-muted); font-style: italic;">
                        <?php
                        $lang = getCurrentLang();
                        if ($lang == 'EN') {
                            echo '(*) Accompanying persons are not entitled to the scientific benefits mentioned above.';
                        } elseif ($lang == 'BR') {
                            echo '(*) Os acompanhantes não têm direito aos benefícios científicos mencionados acima.';
                        } else {
                            echo '(*) Los acompañantes no tienen derecho a los beneficios científicos mencionados anteriormente.';
                        }
                        ?>
                    </p>

                    <!-- Torito de Pucará Flotante -->
                    <div style="position: absolute; bottom: -30px; right: -20px; width: 130px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.15)); pointer-events: none;">
                        <img src="<?php echo URLROOT; ?>/img/objetos_onta/torito_onta.png" alt="Torito de Pucará" style="width: 100%; height: auto; transform: rotate(5deg);">
                    </div>
                </div>

            </div>
        </div>

        <!-- Carta de Invitación -->
        <div class="invitation-letter-box" style="background: #f9f9fb; border-radius: 28px; padding: 3.5rem; color: var(--p-indigo); display: flex; gap: 3.5rem; align-items: flex-start; flex-wrap: wrap; position: relative; overflow: hidden; border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 20px 50px rgba(0,0,0,0.03);">
            <!-- Elemento decorativo sutil -->
            <div style="position: absolute; top: -60px; right: -60px; opacity: 0.03; font-size: 20rem; pointer-events: none;"><i class="fa-solid fa-file-invoice"></i></div>
            
            <div class="invitation-icon" style="flex-shrink: 0; width: 90px; height: 90px; background: white; border: 1px solid rgba(0,0,0,0.08); border-radius: 24px; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--pink); box-shadow: 0 12px 25px rgba(0,0,0,0.04); margin-top: 0.5rem;">
                <i class="fa-solid fa-file-signature"></i>
            </div>
            
            <div class="invitation-content" style="position: relative; z-index: 2; flex: 1; min-width: 320px;">
                <h3 style="font-family: var(--font-serif); font-size: 2rem; color: var(--p-indigo); margin: 0 0 1.2rem 0; font-weight: 800; line-height: 1.2; letter-spacing: -0.5px;"><?php echo _t('inscriptions.invitation_title'); ?></h3>
                <p style="font-size: 1.1rem; line-height: 1.7; color: #444; margin: 0 0 2rem 0; text-align: justify;">
                    <?php echo _t('inscriptions.invitation_desc1'); ?>
                </p>
                
                <div class="invitation-emails" style="display: flex; gap: 1.2rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
                    <a href="mailto:ilima@unap.edu.pe" style="color: var(--p-indigo); font-weight: 700; text-decoration: none; padding: 0.9rem 1.8rem; background: white; border: 1px solid rgba(26,22,37,0.12); border-radius: 14px; display: inline-flex; align-items: center; gap: 1rem; transition: all 0.3s ease; box-shadow: 0 5px 10px rgba(0,0,0,0.03); font-size: 1.05rem;">
                        <i class="fa-solid fa-envelope" style="color: var(--pink); font-size: 1.1rem;"></i> ilima@unap.edu.pe
                    </a>
                    <a href="mailto:ontaperu@unap.edu.pe" style="color: var(--p-indigo); font-weight: 700; text-decoration: none; padding: 0.9rem 1.8rem; background: white; border: 1px solid rgba(26,22,37,0.12); border-radius: 14px; display: inline-flex; align-items: center; gap: 1rem; transition: all 0.3s ease; box-shadow: 0 5px 10px rgba(0,0,0,0.03); font-size: 1.05rem;">
                        <i class="fa-solid fa-envelope" style="color: var(--pink); font-size: 1.1rem;"></i> ontaperu@unap.edu.pe
                    </a>
                </div>

                <div style="background: rgba(231, 76, 116, 0.05); padding: 1.8rem; border-left: 6px solid var(--pink); border-radius: 4px 16px 16px 4px; box-shadow: 0 4px 12px rgba(231, 76, 116, 0.03);">
                    <p style="font-size: 1rem; color: #555; margin: 0; line-height: 1.6;">
                        <i class="fa-solid fa-circle-info" style="color: var(--pink); margin-right: 12px; font-size: 1.1rem;"></i> <?php echo _t('inscriptions.invitation_desc2'); ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>


<section id="tarifas" class="comite-section comite-section-light" style="padding-top: 4rem;">
    <div class="container">
        
        <!-- Nota de Flujo -->
        <div class="alert-info" style="background: rgba(222, 176, 90, 0.1); border: 1px solid var(--p-gold); border-radius: 16px; padding: 1.5rem; text-align: center; margin-bottom: 3rem; max-width: 800px; margin-left: auto; margin-right: auto;">
            <p style="margin: 0; color: var(--p-indigo); font-weight: 600; font-size: 1.1rem;">
                <i class="fa-solid fa-circle-exclamation" style="color: var(--p-gold); margin-right: 0.5rem;"></i>
                <?php
                $lang = getCurrentLang();
                if ($lang == 'EN') {
                    echo 'To make the payment for your registration, you must first complete your <strong>registration</strong> in the system. Once registered, you will be able to access your user panel to manage the payment.';
                } elseif ($lang == 'BR') {
                    echo 'Para efetuar o pagamento da sua inscrição, primeiro você deve concluir o seu <strong>cadastro</strong> no sistema. Após o registro, você poderá acessar seu painel de usuário para gerenciar o pagamento.';
                } else {
                    echo 'Para realizar el pago de tu inscripción, primero debes haber completado tu <strong>registro</strong> en el sistema. Una vez registrado, podrás acceder a tu panel de usuario para gestionar el pago.';
                }
                ?>
            </p>
        </div>

        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('inscriptions.pricing_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('inscriptions.pricing_desc'); ?></p>
        </header>

        <div class="pricing-grid">

            <article class="pricing-card" style="border-top: 5px solid var(--pink);">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--pink" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-id-badge"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);"><?php echo _t('inscriptions.cat_members'); ?></h3>
                </div>
                
                <div class="pricing-options" style="flex: 1;">
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--pink); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_early'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_jan_aug'); ?></span>
                        <div class="amount"><span class="currency">$</span>580</div>
                    </div>
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--purple); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_late'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_aug_sep'); ?></span>
                        <div class="amount"><span class="currency">$</span>610</div>
                    </div>
                    <div>
                        <span style="display: block; font-size: 0.8rem; color: var(--coral); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_full'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_after_sep'); ?></span>
                        <div class="amount"><span class="currency">$</span>630</div>
                    </div>
                </div>
            </article>



            <article class="pricing-card" style="border-top: 5px solid var(--purple);">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--purple" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);"><?php echo _t('inscriptions.cat_nonmembers'); ?></h3>
                </div>
                
                <div class="pricing-options" style="flex: 1;">
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--pink); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_early'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_jan_aug'); ?></span>
                        <div class="amount"><span class="currency">$</span>680</div>
                    </div>
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--purple); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_late'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_aug_sep'); ?></span>
                        <div class="amount"><span class="currency">$</span>710</div>
                    </div>
                    <div>
                        <span style="display: block; font-size: 0.8rem; color: var(--coral); font-weight: 700; text-transform: uppercase;"><?php echo _t('inscriptions.period_full'); ?></span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_after_sep'); ?></span>
                        <div class="amount"><span class="currency">$</span>730</div>
                    </div>
                </div>
            </article>


            <article class="pricing-card" style="border-top: 5px solid #0e7490;">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--teal" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);"><?php echo _t('inscriptions.contact_title'); ?></h3>
                </div>
                
                <div class="pricing-options" style="flex: 1; text-align: center; padding: 2rem 1rem;">
                    <p style="font-size: 1rem; color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                        <?php echo _t('inscriptions.contact_desc'); ?>
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <a href="mailto:ontaperu@unap.edu.pe" style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-dark); text-decoration: none; font-size: 0.9rem;">
                                <i class="fa-solid fa-envelope"></i>
                                ontaperu@unap.edu.pe
                            </a>
                            <a href="mailto:ilima@unap.edu.pe" style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-dark); text-decoration: none; font-size: 0.9rem;">
                                <i class="fa-solid fa-envelope"></i>
                                ilima@unap.edu.pe
                            </a>
                            <a href="https://wa.me/51956838730" target="_blank" style="display: flex; align-items: center; gap: 0.8rem; color: var(--green); font-weight: 600; text-decoration: none; font-size: 0.95rem;">
                            <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i>
                            WhatsApp <br> +51 956 838 730
                        </a>
                        </div>
                    </div>
                </div>
            </article>


            <article class="pricing-card featured" style="border-top: 5px solid var(--yellow);">
                <div style="position: absolute; top: 15px; right: -30px; background: var(--yellow); color: var(--text-dark); padding: 5px 40px; transform: rotate(45deg); font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">Especial</div>
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--yellow" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem; background: var(--yellow); color: var(--text-dark);">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);"><?php echo _t('inscriptions.cat_students'); ?></h3>
                </div>
                
                <div class="pricing-options" style="flex: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <div style="margin-bottom: 2rem;">
                        <span style="display: block; font-size: 1.1rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem;"><?php echo _t('inscriptions.period_preferred'); ?></span>
                        <div class="amount"><span class="currency">$</span>300<span class="asterisk">*</span></div>
                    </div>
                    <div style="padding: 1.25rem; background: var(--cream); border-radius: 12px; border: 1px dashed var(--yellow);">
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0; line-height: 1.5;">
                            <i class="fa-solid fa-circle-info" style="color: var(--yellow); margin-bottom: 0.5rem; display: block; font-size: 1.2rem;"></i> 
                            <?php echo _t('inscriptions.student_note'); ?>
                        </p>
                    </div>
                </div>
            </article>


            <article class="pricing-card" style="border-top: 5px solid var(--coral);">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--coral" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);">Acompañante</h3>
                </div>
                
                <div class="pricing-options" style="flex: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <div style="margin-bottom: 2rem;">
                        <span style="display: block; font-size: 1.1rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem;">Precio Preferencial</span>
                        <div class="amount"><span class="currency">$</span>400</div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Medios de Pago Logos -->
        <div class="payment-methods-evolution" style="margin-top: 5rem; text-align: center; padding-bottom: 2rem;">
            <p style="text-transform: uppercase; letter-spacing: 3px; font-weight: 800; color: var(--text-muted); font-size: 0.75rem; margin-bottom: 2.5rem; position: relative; display: inline-block;">
                <?php echo _t('inscriptions.payment_methods_title') ?? 'Pasarelas de Pago Oficiales'; ?>
                <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 40px; height: 2px; background: var(--p-gold); opacity: 0.5;"></span>
            </p>
            <div style="display: flex; justify-content: center; align-items: center; gap: 6rem; flex-wrap: wrap; margin-bottom: 1rem;">
                <div class="payment-logo-wrap" style="transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <img src="<?php echo URLROOT; ?>/public/img/bancos/culqi.png" alt="Culqi" style="height: 65px; width: auto; object-fit: contain; transition: all 0.4s ease;" onmouseover="this.parentElement.style.transform='scale(1.1) translateY(-5px)'" onmouseout="this.parentElement.style.transform='scale(1) translateY(0)'">
                </div>
                <div class="payment-logo-wrap" style="transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <img src="<?php echo URLROOT; ?>/public/img/bancos/BCP.png" alt="BCP" style="height: 55px; width: auto; object-fit: contain; transition: all 0.4s ease;" onmouseover="this.parentElement.style.transform='scale(1.1) translateY(-5px)'" onmouseout="this.parentElement.style.transform='scale(1) translateY(0)'">
                </div>
            </div>

            <!-- Tarjetas y Billeteras Aceptadas (Culqi) -->
            <div class="culqi-accepted-methods" style="margin-top: 4rem; text-align: center; border-top: 1px solid rgba(0,0,0,0.08); padding-top: 4rem; max-width: 1100px; margin-left: auto; margin-right: auto;">
                <p style="font-size: 0.9rem; color: var(--p-indigo); margin-bottom: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px;">Aceptamos todos los medios de pago</p>
                <div style="display: flex; justify-content: center; align-items: center; gap: 3.5rem; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 3rem; flex-wrap: wrap; justify-content: center;">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pos-visa.svg" alt="Visa" style="height: 35px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pos-mastercard.svg" alt="Mastercard" style="height: 48px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pos-de-venta-amex.svg" alt="Amex" style="height: 42px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pos-diners.svg" alt="Diners" style="height: 32px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="width: 2px; height: 50px; background: rgba(0,0,0,0.08); margin: 0 1rem;" class="hide-mobile"></div>
                    <div style="display: flex; align-items: center; gap: 3rem; flex-wrap: wrap; justify-content: center;">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pago-por-pos-yape.svg" alt="Yape" style="height: 55px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pago-por-pos-plin.svg" alt="Plin" style="height: 48px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pago-por-pos-bim.svg" alt="Bim" style="height: 35px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="width: 2px; height: 50px; background: rgba(0,0,0,0.08); margin: 0 1rem;" class="hide-mobile"></div>
                    <div style="display: flex; align-items: center; gap: 3rem; flex-wrap: wrap; justify-content: center;">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pago-en-pos-apple-pay.svg" alt="Apple Pay" style="height: 40px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo URLROOT; ?>/public/img/bancos/pago-en-pos-google-pay.svg" alt="Google Pay" style="height: 40px; width: auto; transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: pointer;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal de Inscripción Unificado -->
<div id="registrationModal" class="sci-modal">
    <div class="sci-modal-content" id="modalMainContent" style="max-width: 650px; padding: 0; overflow: hidden; max-height: 95vh; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border-radius: 32px; border: none; box-shadow: 0 30px 60px rgba(0,0,0,0.3);">
        <span class="sci-modal-close" onclick="closeRegModal('registrationModal')" style="z-index: 10; position: absolute; right: 25px; top: 20px;">&times;</span>
        
        <!-- VISTA 1: Selección de Opción -->
        <div id="selectionView" style="padding: 4rem 3rem; transition: opacity 0.3s ease;">
            <div class="sci-icon-box sci-icon-box--pink" style="width: 80px; height: 80px; margin: 0 auto 1.5rem; font-size: 2.5rem;">
                <i class="fa-solid fa-user-gear"></i>
            </div>
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin-bottom: 1rem;"><?php echo _t('inscriptions.modal_access_title'); ?></h2>
            <p style="color: var(--text-muted); margin-bottom: 2.5rem;"><?php echo _t('inscriptions.modal_access_desc'); ?></p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div onclick="showRegisterView()" class="sci-option-card" style="cursor: pointer;">
                    <i class="fa-solid fa-user-plus"></i>
                    <h4><?php echo _t('inscriptions.modal_option_new'); ?></h4>
                    <p><?php echo _t('inscriptions.modal_option_new_desc'); ?></p>
                </div>
                <a href="<?php echo URLROOT; ?>/users/login" class="sci-option-card login">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <h4><?php echo _t('inscriptions.modal_option_login'); ?></h4>
                    <p><?php echo _t('inscriptions.modal_option_login_desc'); ?></p>
                </a>
            </div>
        </div>

        <!-- VISTA 2: Formulario de Registro -->
        <div id="registerView" style="display: none; opacity: 0; transition: opacity 0.3s ease;">
            <div style="display: flex; min-height: 600px; text-align: left;">
                <!-- Left Side: Information -->
                <div class="auth-info-side" style="width: 35%; background: var(--purple); color: var(--white); padding: 3rem; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                     <div style="position: absolute; top:0; left:0; width:100%; height:100%; opacity: 0.1; background-image: url('<?php echo URLROOT; ?>/img/logo_onta.png'); background-repeat: no-repeat; background-position: center; background-size: 80%;"></div>
                     <div style="position: relative; z-index: 2;">
                         <button onclick="showSelectionView()" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; margin-bottom: 2rem;">
                             <i class="fa-solid fa-arrow-left"></i>
                         </button>
                         <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA" style="width: 70px; height: auto; margin-bottom: 1.5rem; filter: brightness(0) invert(1);">
                         <h2 style="font-family: var(--font-serif); font-size: 2rem; line-height: 1.1; margin-bottom: 1rem;"><?php echo _t('inscriptions.modal_reg_title'); ?></h2>
                         <p style="font-size: 0.9rem; opacity: 0.8; line-height: 1.6;"><?php echo _t('inscriptions.modal_reg_intro'); ?></p>
                         
                         <ul style="margin-top: 2rem; list-style: none; padding: 0;">
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> <?php echo _t('inscriptions.modal_reg_feat1'); ?>
                             </li>
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> <?php echo _t('inscriptions.modal_reg_feat2'); ?>    
                             </li>
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> <?php echo _t('inscriptions.modal_reg_feat3'); ?>
                             </li>
                         </ul>
                     </div>
                     
                     <div style="position: relative; z-index: 2; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
                         <p style="font-size: 0.8rem; opacity: 0.6; margin-bottom: 0.5rem;"><?php echo _t('inscriptions.modal_reg_footer'); ?></p>
                         <a href="<?php echo URLROOT; ?>/users/login" style="color: var(--pink); font-weight: 700; text-decoration: none; font-size: 0.9rem;"><?php echo _t('inscriptions.modal_reg_login_link'); ?> <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i></a>
                     </div>
                </div>

                <!-- Right Side: Form -->
                <div class="auth-form-side" style="width: 65%; background: var(--white); padding: 3rem; position: relative; overflow-y: auto; max-height: 95vh;">
                    <div style="margin-bottom: 2rem;">
                        <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin-bottom: 0.4rem; font-size: 2rem;"><?php echo _t('inscriptions.form_reg_title'); ?></h2>
                        <p style="color: var(--text-muted); font-size: 0.95rem;"><?php echo _t('inscriptions.form_reg_subtitle'); ?></p>
                    </div>

                    <?php flash('register_error'); ?>

                    <form action="<?php echo URLROOT; ?>/users/register" method="post">
                        <?php echo csrf_field(); ?>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                            <div class="form-group" style="grid-column: span 2;">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_name'); ?></label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-user" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--peach); font-size: 0.9rem;"></i>
                                    <input type="text" name="name" required style="width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="<?php echo _t('inscriptions.form_placeholder_name'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_dni'); ?></label>
                                <input type="text" name="dni" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="DOCUMENTO IDENTIDAD">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('login.category_label'); ?>:</label>
                                <div style="position: relative;">
                                    <select name="user_category" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); appearance: none; cursor: pointer; font-size: 0.9rem;">
                                        <option value=""><?php echo _t('inscriptions.form_type_select'); ?>...</option>
                                        <option value="miembro_onta"><?php echo _t('login.type_miembro_onta'); ?></option>
                                        <option value="no_miembro"><?php echo _t('login.type_no_miembro'); ?></option>
                                        <option value="extranjero"><?php echo _t('login.type_extranjero'); ?></option>
                                        <option value="nacional"><?php echo _t('login.type_nacional'); ?></option>
                                        <option value="acompanante"><?php echo _t('login.type_acompanante'); ?></option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted); pointer-events: none; font-size: 0.8rem;"></i>
                                </div>
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_inst'); ?></label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-building-columns" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--peach); font-size: 0.9rem;"></i>
                                    <input type="text" name="university" required style="width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="<?php echo _t('inscriptions.form_institution_ph'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_school'); ?></label>
                                <input type="text" name="professional_school" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="CARRERA">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_phone'); ?></label>
                                <input type="text" name="phone" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="+51 000 000 000">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_dept'); ?></label>
                                <input type="text" name="department" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="EJ: PUNO">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_email'); ?></label>
                                <input type="email" name="email" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="TU@CORREO.COM">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_pass'); ?></label>
                                <div style="position: relative;">
                                    <input type="password" name="password" id="regPassword" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); font-size: 0.9rem;" placeholder="******">
                                    <i class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility('regPassword', this)" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted); font-size: 0.8rem;"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_confirm'); ?></label>
                                <div style="position: relative;">
                                    <input type="password" name="confirm_password" id="regConfirmPassword" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); font-size: 0.9rem;" placeholder="******">
                                    <i class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility('regConfirmPassword', this)" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted); font-size: 0.8rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('inscriptions.form_field_captcha'); ?></label>
                                <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>"></div>
                            </div>

                        <button type="submit" class="btn btn-gold" style="width: 100%; justify-content: center; padding: 1rem; font-size: 1rem; border-radius: 50px; box-shadow: 0 10px 20px rgba(196, 30, 90, 0.2); margin-top: 1.5rem;">
                            <i class="fa-solid fa-user-plus"></i> <?php echo _t('inscriptions.form_btn_submit'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Redirección Login -->
<div id="loginRedirectModal" class="sci-modal">
    <div class="sci-modal-content" style="max-width: 500px; padding: 3rem; border-radius: 32px; text-align: center;">
        <span class="sci-modal-close" onclick="closeRegModal('loginRedirectModal')">&times;</span>
        
        <div class="modal-login-icon" style="width: 80px; height: 80px; background: var(--p-gold-light); color: var(--p-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 2.5rem; border: 2px solid var(--p-gold);">
            <i class="fa-solid fa-user-lock"></i>
        </div>

        <h3 style="font-family: var(--font-serif); font-size: 2rem; color: var(--p-indigo); margin-bottom: 1rem;">
            <?php echo _t('inscriptions.modal_login_title'); ?>
        </h3>
        
        <p style="color: var(--p-indigo); opacity: 0.8; line-height: 1.6; margin-bottom: 2.5rem;">
            <?php echo _t('inscriptions.modal_login_desc'); ?>
        </p>

        <a href="<?php echo isLoggedIn() ? URLROOT . '/users/dashboard#pagos' : URLROOT . '/users/login?next=pagos'; ?>" class="btn-royal-action" style="background: var(--p-pink); text-decoration: none; width: 100%; display: flex; justify-content: center;">
            <span class="btn-main-txt"><?php echo isLoggedIn() ? _t('inscriptions.btn_pay_inscription') : _t('inscriptions.btn_go_to_login'); ?></span>
            <div class="btn-aura"></div>
        </a>

        <!-- Guía de Pagos Link Modal -->
        <div style="margin-top: 1.5rem; text-align: center;">
            <a href="<?php echo URLROOT; ?>/uploads/formatos/guia_pagos_español.pdf" target="_blank" style="color: var(--p-indigo); font-size: 0.9rem; font-weight: 700; text-decoration: underline; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <i class="fa-solid fa-file-pdf" style="color: var(--p-pink);"></i> 
                <?php echo _t('inscriptions.payment_guide_btn'); ?>
            </a>
        </div>
    </div>
</div>

<style>
.sci-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(5px);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.sci-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
}
.sci-modal-content {
    background-color: var(--white);
    padding: 3rem;
    border-radius: 30px;
    width: 90%;
    max-width: 650px;
    position: relative;
    transform: translateY(20px);
    transition: transform 0.3s ease;
    text-align: center;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.sci-modal.active .sci-modal-content {
    transform: translateY(0);
}
.sci-modal-close {
    position: absolute;
    right: 25px;
    top: 20px;
    font-size: 2rem;
    color: var(--text-muted);
    cursor: pointer;
    line-height: 1;
    transition: var(--transition);
}
.sci-modal-close:hover { 
    color: var(--pink);
    transform: rotate(90deg);
}

.sci-option-card {
    background: var(--cream);
    padding: 2rem;
    border-radius: 20px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}
.sci-option-card i { font-size: 2.5rem; color: var(--pink); margin-bottom: 1rem; display: block; }
.sci-option-card h4 { color: var(--text-dark); margin-bottom: 0.5rem; font-size: 1.25rem; }
.sci-option-card p { color: var(--text-muted); font-size: 0.85rem; margin: 0; }
.sci-option-card:hover { transform: translateY(-5px); border-color: var(--pink); box-shadow: var(--shadow); }

.sci-option-card.login { background: #f0f7ff; }
.sci-option-card.login i { color: var(--purple); }
.sci-option-card.login:hover { border-color: var(--purple); }

/* Custom scrollbar for the form side */
.auth-form-side::-webkit-scrollbar {
    width: 6px;
}
.auth-form-side::-webkit-scrollbar-track {
    background: var(--ivory);
}
.auth-form-side::-webkit-scrollbar-thumb {
    background: var(--peach);
    border-radius: 10px;
}
.auth-form-side::-webkit-scrollbar-thumb:hover {
    background: var(--pink);
}

@media (max-width: 900px) {
    .auth-info-side { display: none !important; }
    .auth-form-side { width: 100% !important; padding: 2rem !important; }
    #modalMainContent { width: 95% !important; max-width: 500px !important; }
    #selectionView { padding: 3rem 2rem !important; }
}

@media (max-width: 650px) {
    #selectionView { padding: 2.5rem 1.5rem !important; }
    #selectionView > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
    }
    #selectionView h2 { font-size: 1.6rem !important; }
    
    #registerView .auth-form-side { padding: 2rem 1.5rem !important; }
    #registerView .auth-form-side h2 { font-size: 1.6rem !important; }
    
    /* Convertimos el Grid de 2 columnas en 1 columna */
    #registerView form > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
    
    /* Anulamos el span 2 de los inputs (Nombre, Inst.) */
    #registerView .form-group[style*="grid-column"] {
        grid-column: auto !important;
    }
    
    .sci-modal-close { top: 15px !important; right: 15px !important; font-size: 1.8rem !important; }
    .sci-icon-box { width: 60px !important; height: 60px !important; font-size: 1.8rem !important; margin-bottom: 1rem !important; }
}

@media (max-width: 480px) {
    .auth-form-side { padding: 1.5rem 1rem !important; }
    #selectionView { padding: 2rem 1rem !important; }
    .g-recaptcha { transform: scale(0.75) !important; transform-origin: left !important; }
}
</style>

<script>
function openRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    showSelectionView(); // Siempre empezar en la selección
}

function closeRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

function showRegisterView() {
    const selection = document.getElementById('selectionView');
    const register = document.getElementById('registerView');
    const content = document.getElementById('modalMainContent');

    if (selection) selection.style.opacity = '0';
    setTimeout(() => {
        if (selection) selection.style.display = 'none';
        if (register) register.style.display = 'block';
        if (content) content.style.maxWidth = '1000px';
        setTimeout(() => {
            if (register) register.style.opacity = '1';
        }, 50);
    }, 300);
}

function showSelectionView() {
    const selection = document.getElementById('selectionView');
    const register = document.getElementById('registerView');
    const content = document.getElementById('modalMainContent');

    register.style.opacity = '0';
    setTimeout(() => {
        register.style.display = 'none';
        selection.style.display = 'block';
        content.style.maxWidth = '650px';
        setTimeout(() => {
            selection.style.opacity = '1';
        }, 50);
    }, 300);
}

function togglePasswordVisibility(id, icon) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const btns = document.querySelectorAll('.open-registration-modal');
    
    btns.forEach(btn => {
        btn.onclick = function() {
            openRegModal('registrationModal');
        }
    });

    window.onclick = function(event) {
        if (event.target.classList.contains('sci-modal')) {
            closeRegModal(event.target.id);
        }
    }

    // Auto-open modal if there was a registration error or if requested via URL
    <?php if ($hasRegError || (isset($_GET['action']) && $_GET['action'] == 'register')): ?>
        openRegModal('registrationModal');
        showRegisterView();
    <?php
endif; ?>
});
</script>

<!-- Soporte -->
<section class="comite-section">
    <div class="container">
        <div class="support-info">
            <h3 class="support-title">
                <i class="fa-solid fa-headset"></i>
                <?php echo _t('inscriptions.support_title'); ?>
            </h3>
            <p class="support-desc"><?php echo _t('inscriptions.support_desc'); ?></p>
            <div class="support-methods">
                <div class="support-item">
                    <div class="sci-icon-box sci-icon-box--pink support-sci-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="support-details">
                        <h4>WhatsApp</h4>
                        <p>+51 958 274 958</p>
                    </div>
                </div>
                <div class="support-item">
                    <div class="sci-icon-box sci-icon-box--purple support-sci-icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div class="support-details">
                        <h4>Email</h4>
                        <p>ontarticulos@unap.edu.pe</p>
                    </div>
                </div>
            </div>
            <p class="support-note">
                <small><?php echo _t('inscriptions.support_response'); ?></small>
            </p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="comite-section-header" style="text-align: center;">
            <h2 class="section-title">¿Listo para ser parte de la 56ª Reunión Anual?</h2>
            <p class="comite-section-desc">Únete a nosotros en Puno para cinco días inolvidables de ciencia y colaboración</p>
        </div>
        <div class="comite-cta-buttons" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo URLROOT; ?>/pages/programacion" class="comite-cta-btn">
                <i class="fa-solid fa-circle-info"></i>
                <?php echo _t('programacion.cta_presentation'); ?>
            </a>
            <a href="<?php echo URLROOT; ?>/pages/areas" class="comite-cta-btn">
                <i class="fa-solid fa-layer-group"></i>
                <?php echo _t('programacion.cta_areas'); ?>
            </a>
            <a href="<?php echo URLROOT; ?>/pages/inscriptions" class="comite-cta-btn comite-cta-btn--primary">
                <i class="fa-solid fa-user-plus"></i>
                <?php echo _t('programacion.cta_register_now'); ?>
            </a>
        </div>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
