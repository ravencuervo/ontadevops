<?php

require APPROOT . '/views/inc/header.php';

?>

<style>
/* Estilos Críticos para Modales Scientific */
.sci-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(26, 22, 37, 0.85);
    backdrop-filter: blur(10px);
    overflow-y: auto;
    opacity: 0;
    transition: opacity 0.3s ease;
    align-items: center;
    justify-content: center;
}

.sci-modal.active {
    display: flex !important;
    opacity: 1;
}

.sci-modal-content {
    background: white;
    position: relative;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    transform: translateY(-30px);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    border-radius: 32px;
    overflow: hidden;
    width: 90%;
    max-width: 800px;
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
    transition: color 0.3s ease;
    z-index: 100;
}

.sci-modal-close:hover {
    color: var(--pink);
}

.instruction-group h4 {
    font-family: var(--font-serif);
    font-size: 1.1rem;
}
</style>

<!-- ============================================
     SECCIÓN: Resúmenes - Header
     ============================================ -->
<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/resumenes.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('abstracts.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('abstracts.page_title'); ?> <span class="accent">ONTA 2026</span></h1>
            <p class="comite-intro"><?php echo _t('abstracts.page_intro'); ?></p>
        </header>

        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">15</span>
                <span class="comite-stat-label"><?php echo _t('common.september'); ?></span>
            </div>

            <div class="comite-stat">
                <span class="comite-stat-num">11</span>
                <span class="comite-stat-label"><?php echo _t('abstracts.stat_areas'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">3</span>
                <span class="comite-stat-label"><?php echo _t('abstracts.stat_modes'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('abstracts.stat_lang'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Información Principal y Countdown
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="abstracts-intro text-center">
            <h2 class="section-title"><?php echo _t('abstracts.main_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('abstracts.page_intro'); ?></p>
            
            <!-- Nuevo CTA de Envío de Resúmenes -->
            <div class="abstract-cta-box">
                <h3 class="abstract-cta-title"><?php echo _t('abstracts.cta_title'); ?></h3>
                <p class="abstract-cta-desc"><?php echo _t('abstracts.cta_desc'); ?></p>
                <div class="abstract-cta-actions">
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn-login-sci">
                        <i class="fa-solid fa-right-to-bracket"></i> <?php echo _t('abstracts.btn_login_submit'); ?>
                    </a>
                    <p style="margin-top: 15px; font-size: 0.95rem; color: var(--text-muted);">
                        <?php echo _t('abstracts.cta_footer_text'); ?> 
                        <a href="<?php echo URLROOT; ?>/pages/inscriptions?action=register" style="color: var(--pink); font-weight: 600; text-decoration: underline;"><?php echo _t('abstracts.cta_footer_link'); ?></a>
                    </p>
                </div>
            </div>

            <!-- Nueva Sección: Pasos para subir el resumen (DENTRO DEL CONTAINER) -->
            <div id="como-subir-mi-resumen" style="margin-top: 5rem; padding-bottom: 2rem;">
                <header class="comite-section-header text-center">
                    <span class="comite-badge"><?php echo _t('abstracts.steps_badge'); ?></span>
                    <h2 class="section-title"><?php echo _t('abstracts.steps_title'); ?></h2>
                    <p class="comite-section-desc"><?php echo _t('abstracts.steps_desc'); ?></p>
                </header>

                <div class="submission-steps-grid">
                    <!-- Paso 1 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/1paso.png" alt="<?php echo _t('abstracts.step1_title'); ?>">
                        </div>
                        <div class="step-content">
                            <div class="step-number">1</div>
                            <h4><?php echo _t('abstracts.step1_title'); ?></h4>
                            <p><?php echo _t('abstracts.step1_desc'); ?></p>
                        </div>
                    </article>

                    <!-- Paso 2 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/2paso.png" alt="<?php echo _t('abstracts.step2_title'); ?>">
                        </div>
                        <div class="step-content">
                            <div class="step-number">2</div>
                            <h4><?php echo _t('abstracts.step2_title'); ?></h4>
                            <p><?php echo _t('abstracts.step2_desc'); ?></p>
                        </div>
                    </article>

                    <!-- Paso 3 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/3paso.png" alt="<?php echo _t('abstracts.step3_title'); ?>">
                        </div>
                        <div class="step-content">
                            <div class="step-number">3</div>
                            <h4><?php echo _t('abstracts.step3_title'); ?></h4>
                            <p><?php echo _t('abstracts.step3_desc'); ?></p>
                        </div>
                    </article>

                    <!-- Paso 4 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/4paso.png" alt="<?php echo _t('abstracts.step4_title'); ?>">
                        </div>
                        <div class="step-content">
                            <div class="step-number">4</div>
                            <h4><?php echo _t('abstracts.step4_title'); ?></h4>
                            <p><?php echo _t('abstracts.step4_desc'); ?></p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Instrucciones con Iconos Scientific
     ============================================ -->
<section id="instrucciones" class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('abstracts.instructions_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('abstracts.instructions_desc'); ?></p>
        </header>
        
        <div class="instructions-grid">
            <!-- Instrucciones para Autores -->
            <article class="scientific-card-modern">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
                <div class="sci-card-body">
                    <h3><?php echo _t('abstracts.instructions_title'); ?></h3>
                    <p><?php echo _t('abstracts.instructions_desc'); ?></p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_authors_feat1'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_authors_feat2'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_authors_feat3'); ?></li>
                    </ul>
                    <a href="javascript:void(0)" class="sci-link-btn" onclick="openRegModal('authorInstructionsModal')">
                        <?php echo _t('common.read_more'); ?> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            
            <!-- Instrucciones para Ponentes -->
            <article class="scientific-card-modern">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div class="sci-card-body">
                    <h3><?php echo _t('abstracts.inst_speakers_title'); ?></h3>
                    <p><?php echo _t('abstracts.inst_speakers_desc'); ?></p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_speakers_feat1'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_speakers_feat2'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_speakers_feat3'); ?></li>
                    </ul>
                    <a href="javascript:void(0)" class="sci-link-btn" onclick="openRegModal('speakerInstructionsModal')">
                        <?php echo _t('common.read_more'); ?> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            
            <!-- Enviar Resumen -->
            <article class="scientific-card-modern elite">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <div class="sci-card-body">
                    <h3><?php echo _t('abstracts.inst_submit_title'); ?></h3>
                    <p><?php echo _t('abstracts.inst_submit_desc'); ?></p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_submit_feat1'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_submit_feat2'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.inst_submit_feat3'); ?></li>
                    </ul>
                    <a href="<?php echo URLROOT; ?>/users/login" class="sci-btn-primary">
                        <?php echo _t('common.send'); ?> <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                    <p style="margin-top: 10px; font-size: 0.85rem; color: var(--text-muted);">
                        <?php echo _t('abstracts.inst_submit_footer_text'); ?> <a href="<?php echo URLROOT; ?>/pages/inscriptions?action=register" style="color: var(--teal); font-weight: 600; text-decoration: underline;"><?php echo _t('abstracts.inst_submit_footer_link'); ?></a>
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Modal de Instrucciones para Autores -->
<div id="authorInstructionsModal" class="sci-modal">
    <div class="sci-modal-content" style="max-width: 800px; padding: 3rem; text-align: left;">
        <span class="sci-modal-close" onclick="closeRegModal('authorInstructionsModal')">&times;</span>
        
        <header style="margin-bottom: 2rem; border-bottom: 2px solid var(--cream); padding-bottom: 1rem;">
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin: 0;"><?php echo _t('abstracts.modal_author_title'); ?></h2>
            <p style="color: var(--text-muted);"><?php echo _t('abstracts.modal_author_subtitle'); ?></p>
        </header>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; max-height: 60vh; overflow-y: auto; padding-right: 15px;">
            <div class="instruction-group">
                <h4 style="color: var(--pink); border-left: 4px solid var(--pink); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_author_sec1_title'); ?></h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec1_item1'); ?></li>
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec1_item2'); ?></li>
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec1_item3'); ?></li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--purple); border-left: 4px solid var(--purple); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_author_sec2_title'); ?></h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec2_item1'); ?></li>
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec2_item2'); ?></li>
                    <li><i class="fa-solid fa-circle-dot"></i> <?php echo _t('abstracts.modal_author_sec2_item3'); ?></li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--teal); border-left: 4px solid var(--teal); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_author_sec3_title'); ?></h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> <?php echo _t('abstracts.modal_author_sec3_item1'); ?></li>
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> <?php echo _t('abstracts.modal_author_sec3_item2'); ?></li>
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> <?php echo _t('abstracts.modal_author_sec3_item3'); ?></li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--gold); border-left: 4px solid var(--gold); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_author_sec4_title'); ?></h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-key"></i> <?php echo _t('abstracts.modal_author_sec4_item1'); ?></li>
                    <li><i class="fa-solid fa-check-double"></i> <?php echo _t('abstracts.modal_author_sec4_item2'); ?></li>
                </ul>
            </div>
        </div>

        <div style="margin-top: 2rem; background: #f8faff; border-radius: 15px; padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="fa-solid fa-circle-info" style="font-size: 2rem; color: var(--purple);"></i>
            <p style="margin: 0; font-size: 0.85rem; color: var(--text-muted);">
                <?php echo _t('abstracts.modal_author_note'); ?>
            </p>
        </div>

        <div style="margin-top: 1.5rem; display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--cream); padding-top: 1.5rem;">
            <div style="font-size: 0.9rem; font-weight: 600; color: var(--text-dark);">
                <i class="fa-solid fa-download" style="color: var(--pink); margin-right: 5px;"></i> <?php echo _t('abstracts.modal_author_formats'); ?>
            </div>
            <div style="display: flex; gap: 1.5rem;">
                <a href="<?php echo URLROOT; ?>/uploads/formatos/Formato_de_resumen_onta_2026.docx" download style="color: #2563eb; font-weight: 600; font-size: 0.85rem; text-decoration: none; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                    <i class="fa-solid fa-file-word"></i> <?php echo _t('abstracts.modal_author_btn_word'); ?>
                </a>
                <a href="<?php echo URLROOT; ?>/uploads/formatos/Formato_de_resumen_onta_2026.zip" download style="color: #059669; font-weight: 600; font-size: 0.85rem; text-decoration: none; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                    <i class="fa-solid fa-file-zipper"></i> <?php echo _t('abstracts.modal_author_btn_latex'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Instrucciones para Ponentes -->
<div id="speakerInstructionsModal" class="sci-modal">
    <div class="sci-modal-content" style="max-width: 850px; padding: 3rem; text-align: left;">
        <span class="sci-modal-close" onclick="closeRegModal('speakerInstructionsModal')">&times;</span>
        
        <header style="margin-bottom: 2rem; border-bottom: 2px solid var(--cream); padding-bottom: 1rem;">
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin: 0;"><?php echo _t('abstracts.modal_speaker_title'); ?></h2>
            <p style="color: var(--text-muted);"><?php echo _t('abstracts.modal_speaker_subtitle'); ?></p>
            <p style="margin: 0; font-size: 0.85rem; color: var(--text-muted);">
                <?php echo _t('abstracts.modal_speaker_note'); ?> <a href="#" onclick="closeRegModal('speakerInstructionsModal'); setTimeout(function() { openRegModal('authorInstructionsModal'); }, 300); return false;" style="color: var(--pink); font-weight: 600; text-decoration: underline;"><?php echo _t('abstracts.modal_speaker_link_author'); ?></a>
            </p>
        </header>

        <div style="max-height: 65vh; overflow-y: auto; padding-right: 15px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- Presentación Oral -->
                <div class="instruction-group">
                    <h4 style="color: var(--purple); border-left: 4px solid var(--purple); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_speaker_oral_title'); ?></h4>
                    <ul class="sci-feature-list" style="font-size: 0.9rem;">
                        <li><i class="fa-solid fa-clock"></i> <?php echo _t('abstracts.modal_speaker_oral_item1'); ?></li>
                        <li><i class="fa-solid fa-file-powerpoint"></i> <?php echo _t('abstracts.modal_speaker_oral_item2'); ?></li>
                        <li><i class="fa-solid fa-laptop-code"></i> <?php echo _t('abstracts.modal_speaker_oral_item3'); ?></li>
                        <li><i class="fa-solid fa-copy"></i> <?php echo _t('abstracts.modal_speaker_oral_item4'); ?></li>
                    </ul>
                    <div style="margin-top: 10px; padding-left: 25px; font-size: 0.85rem; color: var(--text-muted);">
                        <?php echo _t('abstracts.modal_speaker_oral_content'); ?>
                    </div>
                </div>

                <!-- Presentación de Póster -->
                <div class="instruction-group">
                    <h4 style="color: var(--teal); border-left: 4px solid var(--teal); padding-left: 10px; margin-bottom: 1rem;"><?php echo _t('abstracts.modal_speaker_poster_title'); ?></h4>
                    <ul class="sci-feature-list" style="font-size: 0.9rem;">
                        <li><i class="fa-solid fa-maximize"></i> <?php echo _t('abstracts.modal_speaker_poster_item1'); ?></li>
                        <li><i class="fa-solid fa-arrows-up-down"></i> <?php echo _t('abstracts.modal_speaker_poster_item2'); ?></li>
                        <li><i class="fa-solid fa-text-height"></i> <?php echo _t('abstracts.modal_speaker_poster_item3'); ?></li>
                        <li><i class="fa-solid fa-font"></i> <?php echo _t('abstracts.modal_speaker_poster_item4'); ?></li>
                    </ul>
                    <div style="margin-top: 10px; padding-left: 25px; font-size: 0.85rem; color: var(--text-muted);">
                        <?php echo _t('abstracts.modal_speaker_poster_content'); ?>
                    </div>
                </div>
            </div>

            <!-- Recomendaciones Generales -->
            <div class="instruction-group" style="background: #fdfaf4; border: 1px solid #f3e5c2; border-radius: 15px; padding: 1.5rem;">
                <h4 style="color: var(--gold); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.8rem;">
                    <i class="fa-solid fa-person-running"></i> <?php echo _t('abstracts.modal_speaker_recom_title'); ?>
                </h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <ul class="sci-feature-list" style="font-size: 0.85rem;">
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.modal_speaker_recom_item1'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.modal_speaker_recom_item2'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.modal_speaker_recom_item3'); ?></li>
                    </ul>
                    <ul class="sci-feature-list" style="font-size: 0.85rem;">
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.modal_speaker_recom_item4'); ?></li>
                        <li><i class="fa-solid fa-check"></i> <?php echo _t('abstracts.modal_speaker_recom_item5'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

document.addEventListener('DOMContentLoaded', function() {
    window.onclick = function(event) {
        if (event.target.classList.contains('sci-modal')) {
            closeRegModal(event.target.id);
        }
    }
});
</script>

<!-- SECCIÓN: Consulta de Estado -->
<section style="background: linear-gradient(to bottom, #fff, #f8f9fa); padding: 5rem 0; margin-top: 2rem; border-top: 1px solid var(--cream);">
    <div class="container" style="max-width: 900px; text-align: center;">
        <span style="display: inline-block; background: rgba(196, 30, 90, 0.1); color: var(--pink); padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.5rem;"><?php echo _t('abstracts.track_badge'); ?></span>
        <h3 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--purple); margin-bottom: 1rem;"><?php echo _t('abstracts.track_title'); ?></h3>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto 3rem; font-size: 1.1rem;"><?php echo _t('abstracts.track_desc'); ?></p>
        
        <div style="background: white; padding: 3rem; border-radius: 30px; box-shadow: 0 20px 40px rgba(26, 22, 37, 0.06); border: 1px solid var(--cream); position: relative; overflow: hidden;">
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; position: relative; z-index: 2;">
                <input type="text" id="trackCode" placeholder="<?php echo _t('abstracts.track_placeholder'); ?>" maxlength="8" 
                       style="padding: 1.1rem 2rem; border-radius: 15px; border: 2px solid var(--cream); font-size: 1.2rem; width: 280px; text-align: center; color: var(--purple); font-weight: 700; outline: none; transition: border-color 0.3s ease; background: #fafafa;"
                       onfocus="this.style.borderColor='var(--pink)'" onblur="this.style.borderColor='var(--cream)'">
                <button onclick="checkMyStatus()" class="btn-solid pink" 
                        style="padding: 1.1rem 2.5rem; border-radius: 15px; font-weight: 700; font-size: 1rem; cursor: pointer; border: none; background: var(--pink); color: white; transition: transform 0.2s ease, box-shadow 0.2s ease; display: inline-flex; align-items: center; gap: 0.8rem;">
                    <i class="fa-solid fa-magnifying-glass"></i> <?php echo _t('abstracts.track_btn'); ?>
                </button>
            </div>
            <div id="trackResult" style="margin-top: 2rem; display: none; padding: 2rem; border-radius: 20px; text-align: left; transition: all 0.4s ease;">
                <!-- Resultado Dinámico -->
            </div>
            <i class="fa-solid fa-microscope" style="position: absolute; right: -20px; bottom: -20px; font-size: 8rem; color: rgba(196, 30, 90, 0.03); transform: rotate(-15deg);"></i>
        </div>
    </div>
</section>

<script>
async function checkMyStatus() {
    const code = document.getElementById('trackCode').value;
    const resultDiv = document.getElementById('trackResult');
    
    if (code.length !== 8) {
        alert("<?php echo _t('abstracts.track_alert_8_digits'); ?>");
        return;
    }

    resultDiv.style.display = 'block';
    resultDiv.style.opacity = '0.5';
    resultDiv.innerHTML = '<div style="text-align: center; color: var(--pink);"><i class="fa-solid fa-spinner fa-spin"></i> <?php echo _t('abstracts.track_loading'); ?></div>';
    resultDiv.style.background = '#fcfcfc';

    try {
        const formData = new FormData();
        formData.append('tracking_code', code);
        
        const response = await fetch('<?php echo URLROOT; ?>/abstracts/checkStatus', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        resultDiv.style.opacity = '1';
        
        if (data.success) {
            let statusColor = '#eab308'; 
            let statusBg = 'rgba(234, 179, 8, 0.1)';
            let statusIcon = 'fa-clock';
            if(data.status === 'aprobado' || data.status === 'accepted') { statusColor = '#22c55e'; statusBg = 'rgba(34, 197, 94, 0.1)'; statusIcon = 'fa-check-circle'; }
            if(data.status === 'rechazado' || data.status === 'rejected') { statusColor = '#ef4444'; statusBg = 'rgba(239, 68, 68, 0.1)'; statusIcon = 'fa-circle-xmark'; }

            resultDiv.style.background = '#fff';
            resultDiv.style.border = '1px solid var(--cream)';
            resultDiv.innerHTML = `
                <div style="display: flex; align-items: flex-start; gap: 1.5rem;">
                    <div style="width: 60px; height: 60px; background: \${statusBg}; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: \${statusColor}; flex-shrink: 0;">
                        <i class="fa-solid \${statusIcon}"></i>
                    </div>
                    <div style="flex-grow: 1;">
                        <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;"><?php echo _t('abstracts.track_research_title'); ?></div>
                        <div style="font-weight: 700; font-size: 1.15rem; color: var(--purple); margin-bottom: 0.8rem; font-family: var(--font-serif); line-height: 1.4;">\${data.title}</div>
                        <div style="display: inline-block; padding: 0.4rem 1rem; border-radius: 8px; background: \${statusBg}; color: \${statusColor}; font-weight: 800; font-size: 0.9rem; text-transform: uppercase;">
                            <?php echo _t('abstracts.track_status_label'); ?> \${data.status.toUpperCase()}
                        </div>
                    </div>
                </div>
            `;
        } else {
            resultDiv.style.background = 'rgba(239, 68, 68, 0.06)';
            resultDiv.style.border = '1px dashed #ef4444';
            resultDiv.innerHTML = `<div style="text-align: center; color: #ef4444; font-weight: 600;"><i class="fa-solid fa-triangle-exclamation"></i> \${data.message}</div>`;
        }
    } catch (error) {
        resultDiv.innerHTML = '<div style="text-align: center; color: #ef4444;"><?php echo _t('abstracts.track_error_connection'); ?></div>';
    }
}
</script>

<!-- Modal de Galería (Lightbox) para los Pasos -->
<div id="galleryModal" class="gallery-modal">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="modalCaption" class="modal-caption" style="font-family: var(--font-serif); font-size: 1.2rem; font-weight: 600;"></div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
