<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="legal-page-header" style="background: var(--p-indigo); padding: 8rem 0 4rem; color: white; text-align: center;">
    <div class="container">
        <span class="premium-flair-badge" style="margin-bottom: 1.5rem;">Transparencia y Garantía</span>
        <h1 class="hero-title-serif" style="font-size: 3.5rem; margin-bottom: 1rem;"><?php echo $data['title']; ?></h1>
        <p style="opacity: 0.7; max-width: 700px; margin: 0 auto;">Nuestra política de reembolsos para asegurar una experiencia justa para todos los participantes.</p>
    </div>
</section>

<section class="legal-content-section" style="padding: 5rem 0; background: #fcfcfd;">
    <div class="container">
        <div class="legal-card" style="background: white; padding: 4rem; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); max-width: 1000px; margin: 0 auto;">
            <div class="legal-text-body" style="color: #444; line-height: 1.8; font-size: 1.05rem;">
                
                <h2 style="color: var(--p-indigo); margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">1. Introducción</h2>
                <p>La presente política establece las condiciones para la solicitud de reembolsos, cancelaciones y cambios de inscripción para la 56ª Reunión Anual ONTA 2026. Al adquirir una inscripción, el usuario acepta los plazos y condiciones aquí detallados.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">2. Condiciones de Cancelación</h2>
                <p>Entendemos que pueden surgir imprevistos. Los reembolsos se procesarán de acuerdo al siguiente cronograma de plazos:</p>
                <ul style="margin-bottom: 1.5rem; background: #fff9f9; padding: 1.5rem; border-radius: 12px; border-left: 4px solid var(--p-pink);">
                    <li><strong>Hasta el 30 de Septiembre, 2026:</strong> Reembolso del 80% de la tarifa pagada.</li>
                    <li><strong>Del 1 al 15 de Septiembre, 2026:</strong> Reembolso del 50% de la tarifa pagada.</li>
                    <li><strong>A partir del 16 de Septiembre, 2026:</strong> No se realizarán reembolsos debido a los compromisos logísticos ya adquiridos.</li>
                </ul>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">3. Proceso para Solicitar Devolución</h2>
                <p>Para iniciar el proceso, el usuario debe:
                <ol>
                    <li>Enviar un correo electrónico a <strong><?php echo COMPANY_EMAIL; ?></strong> con el asunto "Solicitud de Reembolso - [Nombre Completo]".</li>
                    <li>Adjuntar el comprobante de pago enviado por la plataforma o el número de pedido.</li>
                    <li>Indicar el motivo de la cancelación.</li>
                </ol>
                El equipo administrativo responderá a su solicitud en un plazo máximo de 5 días hábiles.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">4. Opciones de Reembolso y Tiempos</h2>
                <p><strong>Modalidad:</strong> El reembolso se realizará preferentemente mediante un extorno a la misma tarjeta utilizada en la transacción de Culqi. En casos excepcionales (pagos vía transferencia), se realizará mediante depósito bancario.</p>
                <p><strong>Tiempos:</strong> 
                <ul>
                    <li><strong>Procesamiento interno:</strong> De 5 a 7 días hábiles tras la aprobación.</li>
                    <li><strong>Reflejo en cuenta bancaria:</strong> El tiempo que tarda el dinero en aparecer en su estado de cuenta depende exclusivamente de su entidad bancaria y suele oscilar entre <strong>15 a 30 días hábiles</strong>.</li>
                </ul>
                </p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">5. Transferencia de Inscripción (Cambios)</h2>
                <p>En lugar de una cancelación, se permite la transferencia de la inscripción a otro profesional o estudiante de la misma categoría sin costo adicional, previa notificación escrita hasta el 15 de septiembre de 2026.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">6. Cancelación por Fuerza Mayor</h2>
                <p>En caso de cancelación total del evento por causas ajenas a la organización (pandemias, desastres naturales, etc.), se evaluará la reprogramación o el reembolso proporcional según los costos ya incurridos en la organización.</p>
            </div>
            
            <div class="legal-footer" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #eee; text-align: center;">
                <a href="<?php echo URLROOT; ?>/legal/terminos" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Términos y Condiciones</a>
                <a href="<?php echo URLROOT; ?>/legal/privacidad" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Política de Privacidad</a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

