<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="legal-page-header" style="background: var(--p-indigo); padding: 8rem 0 4rem; color: white; text-align: center;">
    <div class="container">
        <span class="premium-flair-badge" style="margin-bottom: 1.5rem;">Privacidad y Seguridad</span>
        <h1 class="hero-title-serif" style="font-size: 3.5rem; margin-bottom: 1rem;"><?php echo $data['title']; ?></h1>
        <p style="opacity: 0.7; max-width: 700px; margin: 0 auto;">Su confianza es nuestra prioridad. Cumplimos con la Ley N° 29733 (Ley de Protección de Datos Personales de Perú).</p>
    </div>
</section>

<section class="legal-content-section" style="padding: 5rem 0; background: #fcfcfd;">
    <div class="container">
        <div class="legal-card" style="background: white; padding: 4rem; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); max-width: 900px; margin: 0 auto;">
            <div class="legal-text-body" style="color: #444; line-height: 1.8; font-size: 1.05rem;">
                <h2 style="color: var(--p-indigo); margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">1. Recopilación de Información</h2>
                <p>Recopilamos información personal que usted nos proporciona voluntariamente al registrarse para el congreso ONTA 2026. Esto incluye, entre otros: nombre completo, DNI/Pasaporte, correo electrónico, número de teléfono, afiliación institucional y datos de facturación.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">2. Finalidad del Tratamiento</h2>
                <p>Sus datos personales serán utilizados exclusivamente para los siguientes fines:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>Gestión de inscripción y participación en la 56ª Reunión Anual ONTA.</li>
                    <li>Procesamiento de pagos y emisión de comprobantes.</li>
                    <li>Envío de comunicaciones relevantes sobre el evento (cronograma, cambios, avisos).</li>
                    <li>Elaboración de certificados de participación y ponencias.</li>
                </ul>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">3. Seguridad de los Datos</h2>
                <p>Hemos implementado medidas de seguridad técnicas para proteger su información contra pérdida, uso indebido, acceso no autorizado o alteración. El acceso a sus datos está restringido al personal administrativo debidamente autorizado del comité organizador.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">4. Procesamiento de Pagos</h2>
                <p>Para los pagos electrónicos, utilizamos <strong>Culqi</strong>. Sus datos financieros (número de tarjeta, CVV) son transmitidos de forma encriptada directamente a los servidores de Culqi bajo estándares PCI-DSS. ONTA NO almacena sus datos bancarios.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">5. Derechos ARCO</h2>
                <p>Usted tiene derecho a Acceder, Rectificar, Cancelar u Oponerse (Derechos ARCO) al tratamiento de sus datos personales. Para ejercer estos derechos, puede enviarnos una solicitud a <strong><?php echo COMPANY_EMAIL; ?></strong> con el asunto "Derechos ARCO".</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">6. Cambios en la Política</h2>
                <p>Nos reservamos el derecho de modificar esta política en cualquier momento. Cualquier cambio será publicado en este sitio web con la fecha de actualización correspondiente.</p>
            </div>
            
            <div class="legal-footer" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #eee; text-align: center;">
                <a href="<?php echo URLROOT; ?>/legal/terminos" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Términos y Condiciones</a>
                <a href="<?php echo URLROOT; ?>/legal/devoluciones" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Reembolsos y Cancelación</a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
