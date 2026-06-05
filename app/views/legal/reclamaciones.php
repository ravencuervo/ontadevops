<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="legal-page-header" style="background: var(--p-indigo); padding: 8rem 0 4rem; color: white; text-align: center;">
    <div class="container">
        <span class="premium-flair-badge" style="margin-bottom: 1.5rem;">Atención al Cliente</span>
        <h1 class="hero-title-serif" style="font-size: 3.5rem; margin-bottom: 1rem;">Libro de Reclamaciones</h1>
        <p style="opacity: 0.7; max-width: 700px; margin: 0 auto;">Conforme a lo establecido en el Código de Protección y Defensa del Consumidor, contamos con un libro de reclamaciones virtual a su disposición.</p>
    </div>
</section>

<section class="reclamaciones-section" style="padding: 5rem 0; background: #fcfcfd;">
    <div class="container">
        <div class="legal-text-body" style="color: #444; line-height: 1.8; font-size: 1.05rem; max-width: 1000px; margin: 0 auto 2rem;">
            <div style="background: #fff8e1; border-left: 5px solid #ffc107; padding: 1.5rem; border-radius: 8px;">
                <p style="margin: 0; color: #856404; font-size: 0.95rem;">
                    <strong>AVISO:</strong> Conforme a lo establecido en el Código de Protección y Defensa del Consumidor (Ley N° 29571) y su Reglamento (DS 011-2011-PCM), esta institución cuenta con un Libro de Reclamaciones Virtual a su disposición. Su reclamo será atendido en un plazo máximo de 30 días calendario.
                </p>
            </div>
        </div>

        <div class="reclamaciones-card" style="background: white; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); overflow: hidden; max-width: 1000px; margin: 0 auto; display: flex; flex-wrap: wrap;">
            
            <div class="reclamaciones-info" style="flex: 1; min-width: 350px; background: #f9f9fb; padding: 4rem;">
                <h3 style="color: var(--p-indigo); font-family: 'Playfair Display', serif; font-size: 2rem; margin-bottom: 1.5rem;">Hoja de Reclamación</h3>
                <p style="color: #666; margin-bottom: 2rem;">Por favor, complete todos los campos para procesar su reclamo o queja. De acuerdo a ley, el plazo de respuesta es de hasta 15 días hábiles.</p>
                
                <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #eee; margin-bottom: 1rem;">
                    <p style="margin: 0; font-size: 0.85rem; color: #999;">Razón Social:</p>
                    <p style="margin: 0; font-weight: 700; color: var(--p-indigo);"><?php echo COMPANY_NAME; ?></p>
                </div>
                
                <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #eee; margin-bottom: 1rem;">
                    <p style="margin: 0; font-size: 0.85rem; color: #999;">RUC:</p>
                    <p style="margin: 0; font-weight: 700; color: var(--p-indigo);"><?php echo COMPANY_RUC; ?></p>
                </div>
                
                <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #eee;">
                    <p style="margin: 0; font-size: 0.85rem; color: #999;">Dirección:</p>
                    <p style="margin: 0; font-weight: 700; color: var(--p-indigo); font-size: 0.9rem;"><?php echo COMPANY_ADDRESS; ?></p>
                </div>
            </div>

            <div class="reclamaciones-form-container" style="flex: 1.5; min-width: 350px; padding: 4rem;">
                <form id="complaintForm" class="premium-form">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Nombre Completo</label>
                            <input type="text" id="claim_name" placeholder="Ej: Juan Pérez" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s;" required>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">DNI / Pasaporte</label>
                            <input type="text" id="claim_dni" placeholder="Número de documento" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s;" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Domicilio</label>
                            <input type="text" id="claim_address" placeholder="Dirección completa" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s;" required>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Teléfono / WhatsApp</label>
                            <input type="text" id="claim_phone" placeholder="987654321" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s;" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Correo Electrónico</label>
                        <input type="email" id="claim_email" placeholder="correo@ejemplo.com" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s;" required>
                    </div>

                    <div style="background: #fdf6f0; padding: 1.5rem; border-radius: 16px; margin-bottom: 1.5rem; border: 1px solid #f9e2d0;">
                        <h4 style="font-size: 0.9rem; color: #b45309; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Identificación del Bien o Servicio</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.85rem;">Monto Reclamado ($ USD)</label>
                                <input type="number" id="claim_amount" step="0.01" value="0.00" style="width: 100%; padding: 0.8rem; border-radius: 10px; border: 1px solid #ddd;">
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.85rem;">Descripción del Servicio</label>
                                <select id="claim_service" style="width: 100%; padding: 0.8rem; border-radius: 10px; border: 1px solid #ddd;">
                                    <option value="inscripcion">Inscripción al Congreso</option>
                                    <option value="publicacion">Publicación de Abstract</option>
                                    <option value="otros">Otros</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Tipo de Disconformidad</label>
                        <div style="display: flex; gap: 2rem; margin-top: 0.5rem;">
                            <label style="cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                                <input type="radio" name="claim_type" value="queja" checked> Queja
                            </label>
                            <label style="cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                                <input type="radio" name="claim_type" value="reclamo"> Reclamo
                            </label>
                        </div>
                        <p style="font-size: 0.75rem; color: #888; margin-top: 0.5rem;"><strong>Reclamo:</strong> Disconformidad relacionada a los productos o servicios.<br><strong>Queja:</strong> Disconformidad no relacionada a los productos o servicios.</p>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Detalle del reclamo o queja</label>
                        <textarea id="claim_details" placeholder="Describa lo ocurrido con el mayor detalle posible..." style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s; min-height: 100px;" required></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 2rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Pedido / Solución esperada</label>
                        <textarea id="claim_request" placeholder="¿Qué solución espera de parte de la organización?" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #ddd; outline: none; transition: border-color 0.3s; min-height: 80px;" required></textarea>
                    </div>

                    <button type="submit" id="btnSubmitClaim" class="btn-royal-action" style="padding: 1.2rem; width: 100%;">
                        <span class="btn-main-txt">ENVIAR HOJA DE RECLAMACIÓN</span>
                        <div class="btn-aura"></div>
                    </button>
                    <p style="text-align: center; font-size: 0.8rem; color: #999; margin-top: 1rem;">
                        La respuesta será enviada a su correo en un plazo máximo de 30 días calendario.
                    </p>
                </form>
            </div>


        </div>
    </div>
</section>

<style>
#complaintForm input:focus, #complaintForm textarea:focus {
    border-color: var(--p-pink) !important;
}
</style>

<script>
document.getElementById('complaintForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const btn = document.getElementById('btnSubmitClaim');
    const originalText = btn.querySelector('.btn-main-txt').innerText;
    btn.disabled = true;
    btn.querySelector('.btn-main-txt').innerText = 'ENVIANDO...';

    const data = {
        name: document.getElementById('claim_name').value,
        dni: document.getElementById('claim_dni').value,
        address: document.getElementById('claim_address').value,
        phone: document.getElementById('claim_phone').value,
        email: document.getElementById('claim_email').value,
        amount: document.getElementById('claim_amount').value,
        service: document.getElementById('claim_service').value,
        type: document.querySelector('input[name="claim_type"]:checked').value,
        details: document.getElementById('claim_details').value,
        request: document.getElementById('claim_request').value
    };

    try {
        const response = await fetch('<?php echo URLROOT; ?>/legal/reclamaciones', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        
        if (result.success) {
            alert('Su hoja de reclamación ha sido enviada con éxito. El código de registro ha sido enviado a su correo. Le responderemos en un plazo máximo de 30 días calendario.');
            this.reset();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al procesar su solicitud. Por favor, intente de nuevo más tarde.');
    } finally {
        btn.disabled = false;
        btn.querySelector('.btn-main-txt').innerText = originalText;
    }
});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
