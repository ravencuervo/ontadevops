    </div> <!-- End main-wrapper -->
    <footer class="main-footer">
        <div class="container footer-content">
            <div class="footer-info">
                <div class="footer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Perú 2026" class="footer-logo-img">
                </div>
                <p><?php echo _t('footer.slogan'); ?></p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/ONTAPERUOFICIAL" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/@ontaperu" target="_blank" rel="noopener noreferrer" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@onta_peru_2026" target="_blank" rel="noopener noreferrer" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/onta_peru2026?fbclid=IwY2xjawQd7SZleHRuA2FlbQIxMABicmlkETFlckZZWHFZeDJFbGV5QjZac3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHjP6Bxl30daMZ0Qrfxa5UiOwn1CUwa1UDQSuYRFfRdmzayOMvUZgzUVF5F5M_aem_mFPEwgFZl8zlDjn45_vkRQ" target="_blank" rel="noopener noreferrer" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://wa.me/51956838730" target="_blank" rel="noopener noreferrer" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-links">
                <h3><?php echo _t('footer.quick_links'); ?></h3>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>"><?php echo _t('nav.home'); ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/comite"><?php echo _t('nav.comite'); ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/areas"><?php echo _t('nav.areas'); ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/programacion"><?php echo _t('nav.programacion'); ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/abstracts"><?php echo _t('nav.abstracts'); ?></a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3><?php echo _t('footer.contact'); ?></h3>
                <p><i class="fa-solid fa-location-dot"></i> <?php echo COMPANY_ADDRESS; ?></p>
                <p><i class="fa-solid fa-phone"></i> <?php echo COMPANY_PHONE; ?></p>
                <p><i class="fa-solid fa-envelope"></i> <?php echo COMPANY_EMAIL; ?></p>
            </div>
            
            <div class="footer-payments">
                <h3><?php echo _t('footer.payment_methods'); ?></h3>
                <div class="payment-logos">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-visa.svg" height="28" alt="Visa">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-mastercard.svg" height="28" alt="Mastercard">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-de-venta-amex.svg" height="28" alt="Amex">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-diners.svg" height="28" alt="Diners">
                </div>
            </div>
        </div>

        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> ONTA - Puno, Perú. <?php echo _t('footer.rights'); ?></p>
            <div class="footer-legal-links">
                <a href="javascript:void(0)" onclick="openLegalModal('privacyModal')"><?php echo _t('footer.privacy_policy'); ?></a>
                <span class="separator">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('termsModal')"><?php echo _t('footer.terms_conditions'); ?></a>
                <span class="separator">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('refundModal')"><?php echo _t('footer.refund_policy'); ?></a>
                <span class="separator">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('complaintModal')"><?php echo _t('footer.complaint_book'); ?></a>
            </div>
            
            <div class="footer-complaint-notice" style="margin-top: 2rem; background: rgba(255,255,255,0.03); padding: 1.2rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 15px; max-width: 800px; margin-left: auto; margin-right: auto;">
                <i class="fa-solid fa-book" style="color: #d4af37; font-size: 1.5rem;"></i>
                <p style="margin: 0; font-size: 0.75rem; color: rgba(255,255,255,0.5); line-height: 1.5; text-align: left;">
                    <?php echo _t('footer.complaint_notice'); ?>
                </p>
            </div>
        </div>


    </footer>

<!-- Modal: Política de Privacidad -->
<div id="privacyModal" class="legal-modal">
    <div class="legal-modal-content">
        <span class="legal-modal-close" onclick="closeLegalModal('privacyModal')">&times;</span>
        <div class="legal-text">
            <h2><?php echo _t('footer.privacy_policy'); ?></h2>
            <p><strong><?php echo _t('footer.last_update'); ?>: Mayo 2026</strong></p>
            <p><?php echo _t('footer.privacy_content_p1'); ?></p>
            <h3><?php echo _t('footer.privacy_content_h1'); ?></h3>
            <p><?php echo _t('footer.privacy_content_p2'); ?></p>
            <h3><?php echo _t('footer.privacy_content_h2'); ?></h3>
            <p><?php echo _t('footer.privacy_content_p3'); ?></p>
            <h3><?php echo _t('footer.privacy_content_h3'); ?></h3>
            <p><?php echo _t('footer.privacy_content_p4'); ?></p>
            <h3><?php echo _t('footer.privacy_content_h4'); ?></h3>
            <p><?php echo _t('footer.privacy_content_p5'); ?></p>
        </div>
    </div>
</div>

<!-- Modal: Términos y Condiciones -->
<div id="termsModal" class="legal-modal">
    <div class="legal-modal-content">
        <span class="legal-modal-close" onclick="closeLegalModal('termsModal')">&times;</span>
        <div class="legal-text">
            <h2><?php echo _t('footer.terms_conditions'); ?></h2>
            <p><strong><?php echo _t('footer.last_update'); ?>: 15 de Mayo, 2026</strong></p>
            <p><?php echo _t('footer.terms_content_p1', [':company' => COMPANY_NAME]); ?></p>
            
            <h3><?php echo _t('footer.terms_content_h1'); ?></h3>
            <p><?php echo _t('footer.terms_content_p2', [':company' => COMPANY_NAME, ':ruc' => COMPANY_RUC, ':address' => COMPANY_ADDRESS]); ?></p>

            <h3><?php echo _t('footer.terms_content_h2'); ?></h3>
            <p><?php echo _t('footer.terms_content_p3'); ?></p>

            <h3><?php echo _t('footer.terms_content_h3'); ?></h3>
            <p><?php echo _t('footer.terms_content_p4'); ?></p>

            <h3><?php echo _t('footer.terms_content_h4'); ?></h3>
            <p><?php echo _t('footer.terms_content_p5'); ?></p>

            <h3><?php echo _t('footer.terms_content_h5'); ?></h3>
            <p><?php echo _t('footer.terms_content_p6'); ?></p>
        </div>
    </div>
</div>

<!-- Modal: Política de Reembolso -->
<div id="refundModal" class="legal-modal">
    <div class="legal-modal-content">
        <span class="legal-modal-close" onclick="closeLegalModal('refundModal')">&times;</span>
        <div class="legal-text">
            <h2><?php echo _t('footer.refund_policy'); ?></h2>
            <p><strong><?php echo _t('footer.last_update'); ?>: 15 de Mayo, 2026</strong></p>
            <h3><?php echo _t('footer.refund_content_h1'); ?></h3>
            <p><?php echo _t('footer.refund_content_p1', [':email' => COMPANY_EMAIL]); ?></p>
            <ul>
                <li><?php echo _t('footer.refund_content_item1'); ?></li>
                <li><?php echo _t('footer.refund_content_item2'); ?></li>
                <li><?php echo _t('footer.refund_content_item3'); ?></li>
            </ul>
            <h3><?php echo _t('footer.refund_content_h2'); ?></h3>
            <p><?php echo _t('footer.refund_content_p2'); ?></p>
            <h3><?php echo _t('footer.refund_content_h3'); ?></h3>
            <p><?php echo _t('footer.refund_content_p3'); ?></p>
        </div>
    </div>
</div>

<!-- Modal: Libro de Reclamaciones -->
<div id="complaintModal" class="legal-modal">
    <div class="legal-modal-content" style="max-width: 900px; padding: 0; overflow: hidden; display: flex; flex-direction: column;">
        <span class="legal-modal-close" onclick="closeLegalModal('complaintModal')" style="color: #fff; background: rgba(0,0,0,0.2); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; top: 15px; right: 15px; z-index: 10;">&times;</span>
        
        <div style="background: var(--pink); color: white; padding: 2rem 3rem;">
            <h2 style="color: white; margin: 0; border-bottom: none; font-size: 1.6rem;"><?php echo _t('complaint.title'); ?></h2>
            <p style="margin: 0.5rem 0 0; opacity: 0.8; font-size: 0.85rem;"><?php echo _t('complaint.subtitle'); ?></p>
        </div>

        <div style="padding: 2.5rem 3rem; overflow-y: auto; max-height: 75vh;">
            <div class="legal-grid-2" style="margin-bottom: 2rem;">
                <div style="background: #f9f9fb; padding: 1rem; border-radius: 12px; border: 1px solid #eee;">
                    <small style="color: #999; text-transform: uppercase; font-size: 0.65rem; font-weight: 700;">Razón Social</small>
                    <div style="font-weight: 700; color: #1a1625; font-size: 0.9rem;"><?php echo COMPANY_NAME; ?></div>
                </div>
                <div style="background: #f9f9fb; padding: 1rem; border-radius: 12px; border: 1px solid #eee;">
                    <small style="color: #999; text-transform: uppercase; font-size: 0.65rem; font-weight: 700;">RUC</small>
                    <div style="font-weight: 700; color: #1a1625; font-size: 0.9rem;"><?php echo COMPANY_RUC; ?></div>
                </div>
            </div>

            <form id="modalComplaintForm" style="display: grid; gap: 1.2rem;">
                <!-- 1. Identificación del Consumidor -->
                <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-bottom: 0.5rem;">
                    <strong style="font-size: 0.9rem; color: var(--pink);"><?php echo _t('complaint.consumer_data'); ?></strong>
                </div>
                
                <div class="legal-grid-2">
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.full_name'); ?></label>
                        <input type="text" id="comp_name" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                    </div>
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.id_doc'); ?></label>
                        <input type="text" id="comp_dni" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                    </div>
                </div>

                <div class="legal-grid-2">
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.address'); ?></label>
                        <input type="text" id="comp_address" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required placeholder="<?php echo _t('complaint.address_ph'); ?>">
                    </div>
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.phone'); ?></label>
                        <input type="text" id="comp_phone" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                    </div>
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.email'); ?></label>
                    <input type="email" id="comp_email" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                </div>

                <!-- 2. Identificación del Bien Contratado -->
                <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-top: 1rem;">
                    <strong style="font-size: 0.9rem; color: var(--pink);"><?php echo _t('complaint.good_data'); ?></strong>
                </div>

                <div class="legal-grid-2">
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.type_good'); ?></label>
                        <select id="comp_service" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                            <option value="Servicio"><?php echo _t('complaint.service'); ?></option>
                            <option value="Producto"><?php echo _t('complaint.product'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.amount'); ?></label>
                        <input type="number" step="0.01" id="comp_amount" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required placeholder="0.00">
                    </div>
                </div>

                <!-- 3. Detalle de la Reclamación -->
                <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-top: 1rem;">
                    <strong style="font-size: 0.9rem; color: var(--pink);"><?php echo _t('complaint.details_data'); ?></strong>
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.disconformity_type'); ?></label>
                    <div style="display: flex; gap: 2rem; margin-bottom: 0.5rem;">
                        <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: pointer;">
                            <input type="radio" name="type" value="Reclamo" checked> <?php echo _t('complaint.complaint'); ?>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: pointer;">
                            <input type="radio" name="type" value="Queja"> <?php echo _t('complaint.grievance'); ?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.details'); ?></label>
                    <textarea id="comp_details" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd; min-height: 100px;" required placeholder="<?php echo _t('complaint.details_ph'); ?>"></textarea>
                </div>

                <div class="form-group">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.solution'); ?></label>
                    <textarea id="comp_solution" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd; min-height: 80px;" required placeholder="<?php echo _t('complaint.solution_ph'); ?>"></textarea>
                </div>

                <p style="font-size: 0.7rem; color: #666; font-style: italic; margin-top: 1rem;">
                    <?php echo _t('complaint.footer_note'); ?>
                </p>

                <button type="submit" id="comp_submit" style="background: var(--pink); color: white; padding: 1.1rem; border-radius: 12px; border: none; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 0.5rem; font-size: 1rem; box-shadow: 0 8px 15px rgba(196, 30, 90, 0.2);"><?php echo _t('complaint.submit_btn'); ?></button>
            </form>
        </div>
    </div>
</div>


<style>
.footer-content {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    align-items: start;
}

.payment-logos {
    margin-top: 1rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.legal-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.2rem;
}

.legal-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
    backdrop-filter: blur(8px);
    overflow-y: auto;
    padding: 2rem 1rem;
    align-items: flex-start;
}

.legal-modal-content {
    background-color: #fff;
    margin: auto;
    padding: 3rem;
    border-radius: 24px;
    width: 95%;
    max-width: 800px;
    position: relative;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
    animation: modalSlideUp 0.4s ease;
}

@keyframes modalSlideUp {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.legal-modal-close {
    position: absolute;
    right: 25px;
    top: 20px;
    color: #aaa;
    font-size: 2.5rem;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    line-height: 1;
}

.legal-modal-close:hover {
    color: #d4af37;
    transform: rotate(90deg);
}

.legal-text {
    color: #333;
    line-height: 1.8;
}

.legal-text h2 {
    color: #1a1625;
    margin-bottom: 2rem;
    font-family: 'Outfit', sans-serif;
    border-bottom: 2px solid #d4af37;
    padding-bottom: 0.5rem;
    display: inline-block;
    font-weight: 700;
}

.legal-text h3 {
    color: #1a1625;
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-size: 1.25rem;
    font-weight: 600;
}

.legal-text p {
    margin-bottom: 1.2rem;
    text-align: justify;
}

.footer-legal-links {
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    font-size: 0.85rem;
}

.footer-legal-links a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    transition: all 0.3s;
}

.footer-legal-links a:hover {
    color: #d4af37;
}

.footer-legal-links .separator {
    color: rgba(255,255,255,0.2);
}

@media (max-width: 992px) {
    .footer-content {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr !important;
        text-align: center;
        gap: 3rem !important;
    }
    .footer-info, .footer-links, .footer-contact, .footer-payments {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .footer-links ul {
        padding: 0;
        list-style: none;
    }
    .social-icons {
        justify-content: center;
        margin-top: 1rem;
    }
    .footer-complaint-notice {
        flex-direction: column;
        text-align: center !important;
        margin: 2rem 1rem 0 !important;
    }
    .footer-complaint-notice p {
        text-align: center !important;
    }
    .legal-grid-2 {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .legal-modal-content {
        padding: 2rem 1.5rem;
    }
    .footer-legal-links {
        flex-direction: column;
        gap: 0.8rem;
        align-items: center;
    }
    .footer-legal-links .separator {
        display: none;
    }
}
</style>

<script>
    function openLegalModal(id) {
        document.getElementById(id).style.display = "flex";
        document.body.style.overflow = "hidden";
    }

    function closeLegalModal(id) {
        document.getElementById(id).style.display = "none";
        document.body.style.overflow = "auto";
    }

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('legal-modal')) {
            event.target.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

    const complaintForm = document.getElementById('modalComplaintForm');
    if (complaintForm) {
        complaintForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('comp_submit');
            const originalText = btn.innerText;
            btn.innerText = '<?php echo _t('complaint.processing'); ?>';
            btn.disabled = true;

            const data = {
                name: document.getElementById('comp_name').value,
                dni: document.getElementById('comp_dni').value,
                email: document.getElementById('comp_email').value,
                phone: document.getElementById('comp_phone').value,
                address: document.getElementById('comp_address').value,
                details: document.getElementById('comp_details').value,
                type: document.querySelector('input[name="type"]:checked').value,
                service: document.getElementById('comp_service').value,
                amount: document.getElementById('comp_amount').value,
                solution: document.getElementById('comp_solution').value
            };

            fetch('<?php echo URLROOT; ?>/legal/reclamaciones', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => {
                if(res.success) {
                    alert('<?php echo _t('complaint.success_msg'); ?>');
                    this.reset();
                    closeLegalModal('complaintModal');
                } else {
                    alert('<?php echo _t('complaint.error_msg'); ?> ' + (res.error || ''));
                }
            })
            .catch(err => {
                console.error(err);
                alert('<?php echo _t('complaint.conn_error'); ?>');
            })
            .finally(() => {
                btn.innerText = originalText;
                btn.disabled = false;
            });
        });
    }
</script>

<!-- Botón Flotante WhatsApp -->
<a href="https://wa.me/51956838730" target="_blank" rel="noopener noreferrer" class="whatsapp-float" title="WhatsApp Support">
    <i class="fa-brands fa-whatsapp"></i>
    <span class="whatsapp-tooltip">¿Consultas? Escríbenos</span>
</a>

<script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>
</html>
