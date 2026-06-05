<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="legal-page-header" style="background: var(--p-indigo); padding: 8rem 0 4rem; color: white; text-align: center;">
    <div class="container">
        <span class="premium-flair-badge" style="margin-bottom: 1.5rem;"><?php echo _t('common.legal_info'); ?></span>
        <h1 class="hero-title-serif" style="font-size: 3.5rem; margin-bottom: 1rem;"><?php echo $data['title']; ?></h1>
        <p style="opacity: 0.7; max-width: 700px; margin: 0 auto;">Última actualización: 15 de Mayo, 2026</p>
    </div>
</section>

<section class="legal-content-section" style="padding: 5rem 0; background: #fcfcfd;">
    <div class="container">
        <div class="legal-card" style="background: white; padding: 4rem; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); max-width: 1000px; margin: 0 auto;">
            <div class="legal-text-body" style="color: #444; line-height: 1.8; font-size: 1.05rem;">
                
                <h2 style="color: var(--p-indigo); margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">1. Información General</h2>
                <p>El presente documento establece los Términos y Condiciones que regulan el uso de la plataforma web de la <strong>56ª Reunión Anual ONTA 2026</strong>. La gestión comercial, administrativa y el procesamiento de pagos son responsabilidad de:</p>
                <ul style="list-style: none; padding-left: 1.5rem; border-left: 3px solid var(--p-gold); margin: 1.5rem 0; background: #f9f9fb; padding: 1.5rem; border-radius: 12px;">
                    <li><strong>Razón Social:</strong> <?php echo COMPANY_NAME; ?></li>
                    <li><strong>RUC:</strong> <?php echo COMPANY_RUC; ?></li>
                    <li><strong>Dirección:</strong> <?php echo COMPANY_ADDRESS; ?></li>
                    <li><strong>Teléfono:</strong> <?php echo COMPANY_PHONE; ?></li>
                    <li><strong>Correo Electrónico:</strong> <?php echo COMPANY_EMAIL; ?></li>
                </ul>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">2. Aceptación de los Términos</h2>
                <p>El acceso y uso de esta plataforma implica la aceptación total de los presentes Términos y Condiciones. <strong><?php echo COMPANY_NAME; ?></strong> se reserva el derecho de actualizar o modificar estos términos en cualquier momento para cumplir con cambios legislativos o mejoras en el servicio, notificando a los usuarios a través del portal o correo electrónico.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">3. Registro y Cuenta de Usuario</h2>
                <p>Para inscribirse en el evento y realizar pagos, el usuario debe registrarse proporcionando datos verídicos y exactos. 
                <ul>
                    <li><strong>Edad:</strong> Solo podrán registrarse y realizar transacciones personas mayores de 18 años.</li>
                    <li><strong>Confidencialidad:</strong> Es responsabilidad del usuario mantener la reserva de su contraseña.</li>
                    <li><strong>Responsabilidad:</strong> Cualquier uso indebido de la cuenta será responsabilidad exclusiva del titular.</li>
                </ul>
                </p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">4. Productos y Servicios</h2>
                <p>La plataforma ofrece los siguientes servicios relacionados con el congreso científico ONTA 2026:
                <ul>
                    <li>Inscripciones en diversas categorías (Estudiante, Miembro, No Miembro, Acompañante).</li>
                    <li>Gestión y evaluación de resúmenes científicos (Abstracts).</li>
                    <li>Publicación de actas y memorias del evento.</li>
                </ul>
                La disponibilidad de vacantes está sujeta a los aforos máximos establecidos por la sede del evento.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">5. Precios y Formas de Pago</h2>
                <p>Los precios de inscripción se presentan exclusivamente en <strong>Dólares Americanos (USD)</strong>. 
                <ul>
                    <li><strong>Métodos aceptados:</strong> Tarjetas de crédito/débito vía <strong>Culqi</strong> y transferencias bancarias directas.</li>
                    <li><strong>Impuestos:</strong> Los precios incluyen los impuestos de ley según la normativa peruana vigente.</li>
                    <li><strong>Seguridad:</strong> El procesamiento de pagos con tarjeta se realiza mediante servidores seguros de Culqi, garantizando la protección de sus datos financieros.</li>
                </ul>
                </p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">6. Proceso de Compra</h2>
                <p>Para realizar una inscripción: 
                1. Seleccione su categoría en el Dashboard de usuario. 2. Elija "Culqi" como método de pago. 3. Complete los datos en el formulario seguro. 4. Una vez validado el pago, recibirá una confirmación automática por correo electrónico y su credencial digital se activará en la plataforma.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">7. Entrega del Servicio (Digital)</h2>
                <p>Al ser un servicio de inscripción a un evento, no existe envío físico de productos. La entrega se considera efectuada al momento de generarse la confirmación de inscripción y el acceso a los beneficios digitales del congreso.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">8. Protección de Datos Personales</h2>
                <p>En cumplimiento con la <strong>Ley N° 29733 (Ley de Protección de Datos Personales)</strong>, sus datos serán utilizados exclusivamente para la gestión de su participación en el congreso y comunicaciones relacionadas. Usted puede ejercer sus derechos ARCO escribiendo a nuestro correo oficial.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">9. Propiedad Intelectual</h2>
                <p>Todo el contenido del sitio (logos, imágenes, textos científicos) está protegido por derechos de autor. Queda prohibida su reproducción total o parcial sin autorización expresa por escrito de ONTA e INNAMA.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">10. Responsabilidad y Limitaciones</h2>
                <p>El comercio no se hace responsable por fallos técnicos derivados de la conexión a internet del usuario o interrupciones breves por mantenimiento programado de la plataforma.</p>

                <h2 style="color: var(--p-indigo); margin-top: 2.5rem; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif;">11. Legislación y Resolución de Conflictos</h2>
                <p>Este documento se rige por la legislación peruana. Cualquier controversia será resuelta preferentemente mediante conciliación o ante las instancias de INDECOPI y juzgados de la ciudad de Puno, Perú.</p>
            </div>
            
            <div class="legal-footer" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #eee; text-align: center;">
                <a href="<?php echo URLROOT; ?>/legal/privacidad" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Política de Privacidad</a>
                <a href="<?php echo URLROOT; ?>/legal/devoluciones" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Reembolsos y Cancelación</a>
                <a href="<?php echo URLROOT; ?>/legal/reclamaciones" style="color: var(--p-pink); font-weight: 600; text-decoration: none; margin: 0 1rem;">Libro de Reclamaciones</a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

