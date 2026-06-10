<!DOCTYPE html>
<html lang="<?php echo strtolower(getCurrentLang()); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?> — Portal Investigador</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        // Funciones Globales de Interacción — Definidas temprano para evitar ReferenceErrors
        function openLegalModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.style.display = "flex";
                document.body.style.overflow = "hidden";
            }
        }

        function closeLegalModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.style.display = "none";
                document.body.style.overflow = "auto";
            }
        }

        function showSection(id) {
            const sections = document.querySelectorAll('.dash-content');
            const links = document.querySelectorAll('.nav-link');
            
            sections.forEach(s => s.style.display = 'none');
            const el = document.getElementById(id);
            
            if (el) { 
                el.style.display = 'block'; 
                el.style.animation = 'fadeIn .3s ease'; 
                
                // Actualizar estado activo en links
                links.forEach(l => {
                    if (l.getAttribute('href') === '#' + id) l.classList.add('active');
                    else l.classList.remove('active');
                });

                // Especial para notificaciones: Limpiar badges al entrar
                if (id === 'notificaciones') {
                    const badge = document.querySelector('.nav-badge');
                    if (badge) badge.style.display = 'none';
                    const dots = document.querySelectorAll('.unread-dot');
                    dots.forEach(dot => dot.style.display = 'none');
                    const label = document.getElementById('notif-count-label');
                    if (label) {
                        label.textContent = <?php echo json_encode(_t('dashboard.notifications.all_clear')); ?>;
                        label.style.background = 'var(--green-light)';
                        label.style.color = 'var(--green)';
                    }
                }
            }
        }

        function openPaymentModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePaymentModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Manejar Navegación por Hash
        function handleHash() {
            const hash = window.location.hash.substring(1);
            if (hash) {
                showSection(hash);
            } else {
                showSection('welcome');
            }
        }

        window.addEventListener('DOMContentLoaded', handleHash);
        window.addEventListener('load', handleHash);
        window.addEventListener('hashchange', handleHash);
    </script>

    <style>
        /* ============================================================
           ONTA 2026 — Dashboard del Investigador · Design System
           ============================================================ */
        :root {
            --purple: #1a1625;
            --purple-soft: #2c2545;
            --pink: #C41E5A;
            --pink-light: rgba(196, 30, 90, 0.10);
            --gold: #D4A853;
            --gold-light: rgba(212, 168, 83, 0.12);
            --teal: #0e7490;
            --teal-light: rgba(14, 116, 144, 0.10);
            --green: #16a34a;
            --green-light: rgba(22, 163, 74, 0.10);
            --cream: #F7F5F2;
            --white: #ffffff;
            --text: #3d3544;
            --muted: #6b7280;
            --border: #e8e1f0;
            --sidebar-w: 270px;
            --radius: 18px;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
            --shadow: 0 8px 30px rgba(26, 22, 37, 0.10);
            --shadow-lg: 0 20px 50px rgba(26, 22, 37, 0.14);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --text-dark: #1a1625;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            line-height: 1.55;
        }

        /* ─── SCROLLBAR ─── */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(196, 30, 90, 0.25);
            border-radius: 3px;
        }

        /* ──────────────────────────────────
           SIDEBAR
        ────────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--purple);
            position: fixed;
            inset: 0 auto 0 0;
            display: flex;
            flex-direction: column;
            padding: 2rem 1.25rem;
            z-index: 100;
            overflow-y: auto;
            transition: var(--transition);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            padding: 0.5rem 0.75rem 1.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-brand img {
            width: 38px;
            filter: brightness(0) invert(1);
        }

        .brand-text {
            color: #fff;
        }

        .brand-text strong {
            display: block;
            font-size: 1.1rem;
            letter-spacing: 0.3px;
        }

        .brand-text small {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 0.45;
        }

        /* Mini-avatar */
        .user-card {
            margin: 1.5rem 0;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 1.25rem;
            text-align: center;
        }

        .avatar {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--pink), #ff6b9d);
            color: #fff;
            font-size: 1.6rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.85rem;
            box-shadow: 0 8px 20px rgba(196, 30, 90, 0.3);
        }

        .user-card h4 {
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .user-card p {
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Nav */
        .sidebar-nav {
            list-style: none;
            flex: 1;
        }

        .nav-section-label {
            font-size: 0.62rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, 0.25);
            padding: 0.6rem 0.75rem 0.4rem;
            margin-top: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            padding: 0.8rem 1rem;
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: var(--transition);
            margin-bottom: 0.25rem;
            cursor: pointer;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
        }

        /* Pulse Animation */
        @keyframes pulse-gold {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4); }
            70% { transform: scale(1); box-shadow: 0 0 0 15px rgba(212, 175, 55, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(212, 175, 55, 0); }
        }
        .animate-pulse-status {
            animation: pulse-gold 2s infinite;
            border-radius: 50%;
        }

        .nav-link.active {
            color: #fff;
            background: var(--pink);
            box-shadow: 0 4px 16px rgba(196, 30, 90, 0.35);
        }

        .sidebar-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.25rem;
            margin-top: auto;
        }

        .sidebar-footer p {
            color: rgba(255, 255, 255, 0.3);
            font-size: 0.7rem;
            text-align: center;
            line-height: 1.5;
        }

        /* ──────────────────────────────────
           MAIN
        ────────────────────────────────── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            width: calc(100% - var(--sidebar-w));
            min-width: 0;
            padding: 2.5rem 3rem;
        }

        /* Top Bar */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            gap: 1rem;
        }

        .topbar-greeting h1 {
            font-family: 'Source Serif 4', serif;
            font-size: 2rem;
            color: var(--purple);
            margin-bottom: 0.2rem;
        }

        .topbar-greeting p {
            color: var(--muted);
            font-size: 0.95rem;
        }

        .topbar-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn-topbar {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.65rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition);
            border: 1.5px solid var(--border);
            color: var(--text);
            background: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-topbar:hover {
            background: var(--purple);
            color: #fff;
            border-color: var(--purple);
            transform: translateY(-2px);
        }

        .btn-topbar.danger {
            border-color: #fca5a5;
            color: #dc2626;
        }

        .btn-topbar.danger:hover {
            background: #dc2626;
            color: #fff;
            border-color: #dc2626;
        }

        /* ──────────────────────────────────
           STAT CARDS
        ────────────────────────────────── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-label {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            margin-bottom: 0.3rem;
        }

        .stat-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--purple);
            line-height: 1.1;
        }

        /* ──────────────────────────────────
           SECTION PANELS
        ────────────────────────────────── */
        .panel {
            background: var(--white);
            border-radius: 28px;
            padding: 3rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .panel-title {
            font-family: 'Source Serif 4', serif;
            font-size: 1.9rem;
            color: var(--purple);
            margin-bottom: 0.6rem;
        }

        .panel-desc {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.7;
        }

        .badge-label {
            display: inline-block;
            background: var(--pink-light);
            color: var(--pink);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.25rem;
        }

        .ghost-bg {
            position: absolute;
            right: -40px;
            bottom: -40px;
            font-size: 18rem;
            opacity: 0.025;
            pointer-events: none;
            transform: rotate(-15deg);
            color: var(--purple);
        }

        /* CTA Buttons */
        .cta-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-solid {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-solid.pink {
            background: var(--pink);
            color: #fff;
            box-shadow: 0 8px 20px rgba(196, 30, 90, 0.25);
        }

        .btn-solid.pink:hover {
            filter: brightness(1.1);
            transform: translateY(-3px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            background: transparent;
            border: 2px solid var(--pink);
            color: var(--pink);
        }

        .btn-outline:hover {
            background: var(--pink);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ──────────────────────────────────
           ABSTRACTS TABLE
        ────────────────────────────────── */
        .abstract-item {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            transition: var(--transition);
            margin-bottom: 0.85rem;
        }

        .abstract-item:hover {
            border-color: rgba(196, 30, 90, 0.3);
            box-shadow: var(--shadow-sm);
        }

        .abstract-title {
            font-weight: 600;
            color: var(--purple);
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }

        .abstract-meta {
            color: var(--muted);
            font-size: 0.82rem;
        }

        .status-pill {
            padding: 0.35rem 0.9rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            white-space: nowrap;
        }

        .status-pending {
            background: var(--gold-light);
            color: var(--gold);
        }

        .status-approved {
            background: var(--green-light);
            color: var(--green);
        }

        /* Empty State */
        .empty-state {
            border: 2px dashed var(--border);
            border-radius: 20px;
            padding: 3.5rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .empty-state i {
            font-size: 3rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--muted);
            font-weight: 500;
        }

        /* Notice Box */
        .notice-box {
            background: rgba(14, 116, 144, 0.06);
            border-left: 4px solid var(--teal);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-size: 0.87rem;
            color: var(--text);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .notice-box i {
            color: var(--teal);
            margin-right: 5px;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 2.5rem 0;
        }

        /* ──────────────────────────────────
           FORM
        ────────────────────────────────── */
        .form-card {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .form-grid-full {
            grid-column: 1 / -1;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
        }

        .form-label span {
            color: var(--pink);
        }

        .form-input {
            width: 100%;
            padding: 0.85rem 1.1rem;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            color: var(--purple);
            background: var(--white);
            outline: none;
            transition: border-color 0.25s;
            text-transform: uppercase;
        }

        .form-input:focus {
            border-color: var(--pink);
        }

        .form-input[readonly] {
            background: #f0eef6;
            color: var(--muted);
            cursor: not-allowed;
        }

        .file-drop {
            border: 2px dashed var(--border);
            border-radius: 16px;
            padding: 2.5rem;
            text-align: center;
            background: var(--white);
            transition: border-color 0.25s;
            cursor: pointer;
        }

        .file-drop:hover {
            border-color: var(--pink);
        }

        .file-drop i {
            font-size: 2.5rem;
            color: var(--pink);
            margin-bottom: 0.75rem;
        }

        .file-drop p {
            font-size: 0.85rem;
            color: var(--muted);
            margin-bottom: 0.75rem;
        }

        .file-drop input {
            cursor: pointer;
        }

        /* ──────────────────────────────────
           COUNTDOWN
        ────────────────────────────────── */
        .countdown-box {
            background: linear-gradient(135deg, var(--purple), var(--purple-soft));
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            color: #fff;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .countdown-box::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 20%, rgba(196, 30, 90, 0.2), transparent 60%);
        }

        .countdown-box h3 {
            font-family: 'Source Serif 4', serif;
            font-size: 1.7rem;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .countdown-box p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .countdown-tiles {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            position: relative;
        }

        .tile {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            min-width: 90px;
        }

        .tile-num {
            display: block;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--pink-light);
            color: #ff8fab;
            line-height: 1;
            margin-bottom: 0.3rem;
        }

        .tile-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 0.55;
        }

        /* QR info card */
        .qr-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: #fefce8;
            border: 1px solid #fde68a;
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .qr-card i {
            font-size: 3rem;
            color: var(--gold);
            flex-shrink: 0;
        }

        .qr-card h4 {
            font-size: 1rem;
            color: var(--purple);
            margin-bottom: 0.25rem;
        }

        .qr-card p {
            font-size: 0.87rem;
            color: var(--muted);
            margin: 0;
        }

        /* ──────────────────────────────────
           CREDENTIAL PREVIEW
        ────────────────────────────────── */
        .credential-wrap {
            display: flex;
            gap: 3rem;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .credential-info {
            flex: 1;
            min-width: 280px;
        }

        .payment-notice {
            background: rgba(22, 163, 74, 0.05);
            border: 2px dashed #4ade80;
            border-radius: 18px;
            padding: 1.5rem;
            display: flex;
            gap: 1.25rem;
            margin-top: 1.5rem;
            align-items: flex-start;
        }

        .pay-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--green);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .payment-notice h4 {
            color: #15803d;
            margin-bottom: 0.35rem;
            font-size: 0.95rem;
        }

        .payment-notice p {
            margin: 0;
            font-size: 0.88rem;
            color: var(--muted);
        }

        .credential-card {
            width: 190px;
            background: var(--white);
            border-radius: 18px;
            box-shadow: var(--shadow);
            padding: 1.75rem 1.5rem;
            text-align: center;
            position: relative;
            border: 1px solid var(--border);
            flex-shrink: 0;
            margin: 0 auto;
        }

        .credential-pending {
            position: absolute;
            top: 10px;
            right: -8px;
            background: #ef4444;
            color: #fff;
            font-size: 0.55rem;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 20px;
            transform: rotate(12deg);
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.4);
        }

        .credential-card img {
            width: 35px;
            margin-bottom: 1rem;
        }

        .credential-avatar {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            background: #e2e8f0;
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.3rem;
            margin: 0 auto 0.75rem;
        }

        .credential-card h4 {
            font-size: 0.85rem;
            color: var(--purple);
            margin-bottom: 0.2rem;
        }

        .credential-card p {
            font-size: 0.6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
        }

        .credential-card i.fa-qrcode {
            font-size: 3.5rem;
            color: #e2e8f0;
            margin-top: 1rem;
        }

        /* ──────────────────────────────────
           PAYMENT SELECTOR
        ────────────────────────────────── */
        .payment-selector {
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            margin-bottom: 4rem;
            padding: 0 1rem;
        }

        .method-card-large {
            cursor: pointer;
            flex: 1;
            max-width: 350px;
            padding: 3rem 2rem;
            border: 3px solid var(--border);
            border-radius: 30px;
            text-align: center;
            background: #fff;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }

        .method-card-large:hover {
            border-color: var(--pink);
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
        }

        .method-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 5px 15px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .method-badge.option-1 { background: var(--cream); color: #002a8d; }
        .method-badge.option-2 { background: #fff1e6; color: #ff6b00; }

        .method-logo {
            height: 60px;
            margin-bottom: 1.5rem;
            object-fit: contain;
        }

        .method-title {
            color: var(--purple);
            margin-bottom: 1rem;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .method-desc {
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.5;
        }

        .method-footer {
            margin-top: 2rem;
            font-weight: 700;
            transition: var(--transition);
        }

        .method-footer.pink { color: var(--pink); }
        .method-footer.orange { color: #ff6b00; }

        .method-card-large:hover .method-footer {
            transform: translateX(5px);
        }

        @media (max-width: 850px) {
            .payment-selector {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }
            .method-card-large {
                max-width: 100%;
                width: 100%;
                padding: 2.5rem 1.5rem;
            }
        }

        /* ──────────────────────────────────
           MODAL STYLES (GENERAL)
        ────────────────────────────────── */
        .sci-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(26, 22, 37, 0.6);
            backdrop-filter: blur(10px);
            opacity: 0;
            transition: opacity 0.3s ease;
            align-items: center;
            justify-content: center;
        }

        .sci-modal.active {
            display: flex;
            opacity: 1;
        }

        .sci-modal-content {
            background-color: #fff;
            transform: translateY(20px);
            transition: transform 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 95%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .sci-modal.active .sci-modal-content {
            transform: translateY(0);
        }

        .sci-modal-close {
            position: absolute;
            right: 25px;
            top: 20px;
            font-size: 2rem;
            color: var(--muted);
            cursor: pointer;
            line-height: 1;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .sci-modal-close:hover {
            color: var(--pink);
            transform: rotate(90deg);
        }

        /* Culqi Specific */
        .culqi-modal-inner { padding: 4rem 3rem; text-align: center; }
        .culqi-summary-card { background: #fcfcfd; border: 1px solid #eee; border-radius: 20px; padding: 1.5rem; margin-bottom: 2rem; text-align: left; }
        .culqi-terms-box { margin-bottom: 2rem; text-align: left; background: #fff9f5; padding: 1rem; border-radius: 12px; border: 1px solid #ffe8d6; }

        @media (max-width: 600px) {
            .culqi-modal-inner { padding: 3rem 1.5rem; }
            .culqi-summary-card { padding: 1.2rem; }
            .culqi-summary-card h4 { font-size: 0.75rem !important; }
        }

        /* ──────────────────────────────────
           TIMELINE
        ────────────────────────────────── */
        .timeline {
            position: relative;
            padding-left: 1.75rem;
            margin-left: 0.5rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--pink), var(--purple));
            border-radius: 3px;
            opacity: 0.25;
        }

        .tl-event {
            position: relative;
            margin-bottom: 2rem;
        }

        .tl-dot {
            position: absolute;
            left: -2.3rem;
            top: 0.4rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 3px solid;
            background: var(--white);
        }

        .tl-dot.pink {
            border-color: var(--pink);
            box-shadow: 0 0 0 4px var(--pink-light);
        }

        .tl-dot.gold {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px var(--gold-light);
        }

        .tl-dot.teal {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px var(--teal-light);
        }

        .tl-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .tl-card:hover {
            border-color: rgba(196, 30, 90, 0.25);
            box-shadow: var(--shadow);
        }

        .tl-date {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 0.6rem;
        }

        .tl-date.pink {
            background: var(--pink-light);
            color: var(--pink);
        }

        .tl-date.gold {
            background: var(--gold-light);
            color: var(--gold);
        }

        .tl-date.teal {
            background: var(--teal-light);
            color: var(--teal);
            background: rgba(14, 116, 144, 0.1);
        }

        .tl-card h4 {
            font-size: 1rem;
            color: var(--purple);
            margin-bottom: 0.3rem;
        }

        .tl-card p {
            font-size: 0.87rem;
            color: var(--muted);
            line-height: 1.6;
            margin: 0;
        }

        /* main event */
        .tl-card.main-event {
            background: linear-gradient(to right, rgba(14, 116, 144, 0.05), rgba(26, 22, 37, 0.03));
            border: 2px solid var(--teal);
        }

        .tl-card.main-event h4 {
            color: var(--teal);
            font-size: 1.1rem;
        }

        /* ──────────────────────────────────
           PROFILE
        ────────────────────────────────── */
        .profile-header {
            background: linear-gradient(135deg, var(--purple) 0%, #2c2545 60%, rgba(196, 30, 90, 0.8) 100%);
            padding: 2.5rem;
            border-radius: 20px 20px 0 0;
            position: relative;
            overflow: hidden;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(255, 255, 255, 0.06), transparent 60%);
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: var(--white);
            color: var(--pink);
            font-size: 2.2rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            flex-shrink: 0;
            position: relative;
        }

        .profile-info {
            color: #fff;
            position: relative;
        }

        .profile-info h3 {
            font-family: 'Source Serif 4', serif;
            font-size: 1.6rem;
            margin-bottom: 0.4rem;
        }

        .profile-badge {
            background: rgba(255, 255, 255, 0.15);
            padding: 0.25rem 0.9rem;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-body {
            background: var(--white);
            border-radius: 0 0 20px 20px;
            border: 1px solid var(--border);
            padding: 2.5rem;
            border-top: none;
        }

        /* ──────────────────────────────────
           RESPONSIVE
        ────────────────────────────────── */
        @media (max-width: 1100px) {
            :root {
                --sidebar-w: 80px;
            }

            .brand-text,
            .user-card h4,
            .user-card p,
            .nav-link span,
            .sidebar-footer p,
            .nav-section-label {
                display: none;
            }

            .sidebar {
                padding: 1.5rem 0.75rem;
                align-items: center;
            }

            .sidebar-brand {
                padding-bottom: 1.25rem;
                justify-content: center;
            }

            .user-card {
                padding: 0.75rem;
            }

            .nav-link {
                justify-content: center;
                padding: 0.9rem;
            }

            .main {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                inset: auto 0 0 0;
                width: 100%;
                height: 64px;
                flex-direction: row;
                padding: 0;
            }

            .sidebar-brand,
            .user-card,
            .sidebar-footer {
                display: none;
            }

            .sidebar-nav {
                display: flex;
                width: 100%;
                align-items: center;
                justify-content: flex-start;
                height: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                gap: 0.2rem;
                padding: 0 0.5rem;
            }

            .sidebar-nav::-webkit-scrollbar {
                display: none;
            }

            .sidebar-nav li {
                flex-shrink: 0;
            }

            .nav-section-label {
                display: none;
            }

            .nav-link {
                flex-direction: column;
                gap: 0.2rem;
                font-size: 0.6rem;
                padding: 0.5rem;
                height: 64px;
                justify-content: center;
            }

            .nav-link span {
                display: block;
                font-size: 0.6rem;
            }

            .nav-link.active {
                box-shadow: none;
                border-top: 3px solid #fff;
                background: rgba(255, 255, 255, 0.1);
            }

            .main {
                margin-left: 0;
                margin-bottom: 64px;
                padding: 1.25rem 1rem;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .topbar-actions {
                width: 100%;
            }

            .btn-topbar {
                flex: 1;
                justify-content: center;
                font-size: 0.8rem;
                padding: 0.6rem 1rem;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 1.75rem 1.25rem;
                border-radius: 20px;
            }

            .panel-title {
                font-size: 1.5rem;
            }

            .cta-row {
                flex-direction: column;
            }

            .btn-solid,
            .btn-outline {
                justify-content: center;
                width: 100%;
            }
        }
        @keyframes float-mascot {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .mascot-culqi-card {
            position: absolute;
            bottom: -20px;
            right: -50px;
            width: 120px;
            z-index: 10;
            pointer-events: none;
            filter: drop-shadow(0 12px 25px rgba(0,0,0,0.18));
            animation: float-mascot 3s ease-in-out infinite;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .mascot-verification {
            width: 160px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
            animation: float-mascot 3s ease-in-out infinite;
        }

        .method-card-large:hover .mascot-culqi-card {
            transform: scale(1.15) rotate(8deg);
        }

        @media (max-width: 768px) {
            .mascot-culqi-card {
                width: 80px;
                right: -20px;
                bottom: -10px;
            }
        }

        /* ── Credential Badge Premium ── */
        .badge-layout { display: flex; gap: 3rem; align-items: flex-start; flex-wrap: wrap; }
        
        .badge-front {
            width: 360px;
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 40px 80px rgba(0,0,0,0.15);
            overflow: hidden;
            border: 1px solid var(--border);
            flex-shrink: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .badge-holo-header {
            background: linear-gradient(135deg, #1a1040 0%, #c41e5a 50%, #6b21a8 100%) !important;
            padding: 2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            position: relative;
            overflow: hidden;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .badge-holo-overlay {
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                45deg, transparent, transparent 4px,
                rgba(255,255,255,0.04) 4px, rgba(255,255,255,0.04) 8px
            );
            pointer-events: none;
        }

        .badge-logo {
            width: 52px; height: auto;
            filter: brightness(0) invert(1);
            position: relative; z-index: 1;
        }

        .badge-header-text { position: relative; z-index: 1; }
        .badge-congress-name { font-weight: 900; font-size: 1.3rem; color: #fff !important; line-height: 1; letter-spacing: 1px; }
        .badge-congress-sub { font-size: 0.7rem; color: rgba(255,255,255,0.75) !important; margin-top: 0.3rem; }
        .badge-congress-date { font-size: 0.65rem; color: rgba(255,255,255,0.5) !important; margin-top: 0.15rem; text-transform: uppercase; letter-spacing: 1px; }

        .badge-body-new { padding: 1.75rem 1.5rem; }

        .badge-identity {
            display: flex; align-items: center; gap: 1.2rem;
            margin-bottom: 1.5rem; padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .badge-avatar-new {
            width: 70px; height: 70px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--pink), #6b21a8) !important;
            color: #fff !important; font-size: 2rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 10px 25px rgba(196, 30, 90, 0.3);
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .badge-name-new {
            font-family: 'Source Serif 4', serif;
            font-size: 1.15rem; color: var(--text-dark);
            margin-bottom: 0.5rem; line-height: 1.3;
        }

        .badge-category-pill {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 5px 12px; border-radius: 50px;
            font-size: 0.65rem; font-weight: 800; letter-spacing: 0.5px;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Colores por Categoría */
        .cat-miembro_onta { background: #fef3c7 !important; color: #92400e !important; border: 1px solid #fde68a !important; }
        .cat-no_miembro   { background: #e0f2fe !important; color: #075985 !important; border: 1px solid #bae6fd !important; }
        .cat-estudiante   { background: #dcfce7 !important; color: #166534 !important; border: 1px solid #bbf7d0 !important; }
        .cat-extranjero   { background: #f3e8ff !important; color: #6b21a8 !important; border: 1px solid #e9d5ff !important; }
        .cat-nacional     { background: #e0f2fe !important; color: #075985 !important; border: 1px solid #bae6fd !important; }
        .cat-acompanante  { background: #fce7f3 !important; color: #9d174d !important; border: 1px solid #fbcfe8 !important; }

        .badge-info-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;
        }

        .badge-info-field { display: flex; flex-direction: column; gap: 0.2rem; }

        .badge-info-label {
            font-size: 0.62rem; color: var(--muted);
            text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600;
        }

        .badge-info-value {
            font-size: 0.82rem; color: var(--text-dark); font-weight: 700;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        .badge-qr-section {
            display: flex; align-items: center; gap: 1rem;
            padding-top: 1.25rem; border-top: 1px solid var(--border);
        }

        .badge-qr-wrap {
            position: relative; flex-shrink: 0;
            background: #fff !important; padding: 8px;
            border-radius: 14px; border: 1px solid #e2e8f0 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .badge-scan-label { font-weight: 700; font-size: 0.8rem; color: var(--text-dark); margin-bottom: 0.2rem; }
        .badge-scan-sub   { font-size: 0.7rem; color: var(--muted); margin-bottom: 0.8rem; }

        .badge-security-strip {
            font-size: 0.65rem; font-weight: 700; color: var(--green) !important;
            background: var(--green-light) !important; padding: 4px 10px;
            border-radius: 50px; display: inline-flex; align-items: center; gap: 5px;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .badge-bottom-strip {
            background: linear-gradient(135deg, #1a1040, #c41e5a) !important;
            padding: 0.6rem 1.5rem;
            display: flex; justify-content: space-between;
            font-size: 0.55rem; color: rgba(255,255,255,0.8) !important;
            text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Actions column */
        .badge-actions-new { flex: 1; min-width: 260px; padding-top: 0.5rem; }

        .badge-action-title {
            display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem;
        }

        .badge-action-title h3 { font-size: 1.4rem; color: var(--text-dark); font-weight: 700; margin: 0; }

        /* ── Credential Locked Premium ── */
        .credential-locked-new { text-align: center; padding: 4rem 2rem; }

        .lock-visual {
            position: relative; width: 120px; height: 120px; margin: 0 auto 2.5rem;
        }

        .lock-ring {
            position: absolute; border-radius: 50%; border: 2px solid;
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            animation: pulse-ring 2.5s ease-in-out infinite;
        }

        .ring-1 { width: 120px; height: 120px; border-color: rgba(196,30,90,0.2); animation-delay: 0s; }
        .ring-2 { width: 90px;  height: 90px;  border-color: rgba(196,30,90,0.35); animation-delay: 0.4s; }
        .ring-3 { width: 65px;  height: 65px;  border-color: rgba(196,30,90,0.5); animation-delay: 0.8s; }

        @keyframes pulse-ring {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.6; }
            50% { transform: translate(-50%, -50%) scale(1.05); opacity: 1; }
        }

        .lock-icon-center {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 50px; height: 50px;
            background: linear-gradient(135deg, var(--pink), #6b21a8);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.4rem;
            box-shadow: 0 10px 25px rgba(196, 30, 90, 0.3);
        }

        .lock-step { display: flex; align-items: center; gap: 1rem; font-size: 0.9rem; color: var(--text-dark); font-weight: 500; }

        .lock-step-num {
            width: 32px; height: 32px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 800; flex-shrink: 0;
        }

        .lock-step-num.done    { background: var(--green-light); color: var(--green); }
        .lock-step-num.pending { background: var(--surface); color: var(--muted); border: 2px solid var(--border); }

        @media print {
            body * { visibility: hidden; }
            #badge-print-area, #badge-print-area * { 
                visibility: visible; 
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            #badge-print-area { 
                position: fixed !important; 
                left: 50% !important; 
                top: 50% !important; 
                transform: translate(-50%, -50%) !important; 
                box-shadow: none !important; 
                border: 1px solid var(--border) !important;
                border-radius: 28px !important;
            }
            .badge-actions-new { display: none !important; }
        }

        @media (max-width: 768px) {
            .badge-layout { flex-direction: column; align-items: center; }
            .badge-front { width: 100%; max-width: 360px; }
            .badge-info-grid { grid-template-columns: 1fr; }
            .badge-actions-new { width: 100%; }
        }
    </style>
</head>

<body>
    <!-- ============================================
         PRELOADER ONTA 
         ============================================ -->
    <div id="onta-preloader" class="onta-preloader">
        <div class="preloader-content">
            <div class="preloader-logo-container">
                <img src="<?php echo URLROOT; ?>/img/logo_ontaperu.png" alt="ONTA Logo" class="preloader-logo pulse-anim">
            </div>

            <div class="preloader-icons">
                <i class="fa-solid fa-flask icon-anim" style="animation-delay: 0s;"></i>
                <i class="fa-solid fa-microscope icon-anim" style="animation-delay: 0.2s;"></i>
                <i class="fa-solid fa-dna icon-anim" style="animation-delay: 0.4s;"></i>
                <i class="fa-solid fa-leaf icon-anim" style="animation-delay: 0.6s;"></i>
            </div>

            <div class="preloader-progress-container">
                <div class="preloader-progress-bar" id="preloader-bar"></div>
            </div>
            <div class="preloader-text"><span><?php echo _t('dashboard.preloader'); ?></span> <span
                    id="preloader-percent">0%</span></div>
        </div>
    </div>

    <style>
        .onta-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--pink, #c41e5a);
            z-index: 999999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
        }

        .onta-preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .preloader-content {
            text-align: center;
            width: 100%;
            max-width: 320px;
            padding: 0 20px;
        }

        .preloader-logo-container {
            margin-bottom: 2.5rem;
            position: relative;
        }

        .preloader-logo {
            width: 130px;
            height: auto;
            position: relative;
            z-index: 2;
        }

        .pulse-anim {
            animation: pulse-preloader 1.5s infinite alternate ease-in-out;
        }

        @keyframes pulse-preloader {
            0% {
                transform: scale(0.95);
                filter: brightness(0) invert(1) drop-shadow(0 0 10px rgba(255, 255, 255, 0.4));
            }

            100% {
                transform: scale(1.05);
                filter: brightness(0) invert(1) drop-shadow(0 0 25px rgba(255, 255, 255, 0.8));
            }
        }

        .preloader-icons {
            display: flex;
            justify-content: center;
            gap: 1.8rem;
            margin-bottom: 2.5rem;
        }

        .preloader-icons i {
            color: var(--white, #ffffff);
            font-size: 1.8rem;
            opacity: 0;
        }

        .icon-anim {
            animation: icon-bounce 2s infinite ease-in-out;
        }

        @keyframes icon-bounce {

            0%,
            100% {
                transform: translateY(0);
                opacity: 0.6;
                color: rgba(255, 255, 255, 0.7);
            }

            50% {
                transform: translateY(-12px);
                opacity: 1;
                color: #ffffff;
                filter: drop-shadow(0 5px 10px rgba(255, 255, 255, 0.5));
            }
        }

        .preloader-progress-container {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 1.2rem;
            position: relative;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .preloader-progress-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.7), #ffffff, rgba(255, 255, 255, 0.9));
            background-size: 200% 200%;
            border-radius: 20px;
            transition: width 0.1s ease-out;
            animation: gradient-flow 2s ease infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }

        @keyframes gradient-flow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .preloader-text {
            color: var(--white, #ffffff);
            font-family: 'Outfit', sans-serif !important;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .preloader-text span {
            color: var(--white, #ffffff);
            font-weight: 800;
            display: inline-block;
            min-width: 45px;
            text-align: right;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const preloader = document.getElementById('onta-preloader');

            // Forzar preloader desde PHP
            <?php if (isset($_SESSION['force_preloader'])): ?>
                sessionStorage.removeItem('ontaPreloaderShown');
                <?php unset($_SESSION['force_preloader']); ?>
            <?php endif; ?>

            const navEntries = performance.getEntriesByType("navigation");
            const isReload = navEntries.length > 0 && navEntries[0].type === "reload";

            if (!isReload && sessionStorage.getItem('ontaPreloaderShown')) {
                preloader.style.display = 'none';
                return;
            }

            const bar = document.getElementById('preloader-bar');
            const percent = document.getElementById('preloader-percent');
            let progress = 0;

            const loadInterval = setInterval(() => {
                if (progress < 40) progress += Math.random() * 8 + 2;
                else if (progress < 80) progress += Math.random() * 4 + 1;
                else progress += Math.random() * 1.5 + 0.5;

                if (progress > 99) progress = 99;

                const currentPercent = Math.floor(progress);
                bar.style.width = currentPercent + '%';
                percent.innerText = currentPercent + '%';
            }, 60);

            window.addEventListener('load', function () {
                clearInterval(loadInterval);
                bar.style.width = '100%';
                percent.innerText = '100%';
                sessionStorage.setItem('ontaPreloaderShown', 'true');

                setTimeout(() => {
                    preloader.classList.add('fade-out');
                    setTimeout(() => { preloader.style.display = 'none'; }, 650);
                }, 400);
            });

            setTimeout(() => {
                if (preloader.style.display !== 'none') {
                    clearInterval(loadInterval);
                    sessionStorage.setItem('ontaPreloaderShown', 'true');
                    preloader.classList.add('fade-out');
                    setTimeout(() => { preloader.style.display = 'none'; }, 650);
                }
            }, 8000);
        });
    </script>

    <!-- ────────────── SIDEBAR ────────────── -->
    <aside class="sidebar">
        <a href="<?php echo URLROOT; ?>" class="sidebar-brand">
            <img src="<?php echo URLROOT; ?>/img/logo_ontaperu.png" alt="ONTA">
            <div class="brand-text">
                <strong>ONTA 2026</strong>
                <small><?php echo _t('dashboard.portal_title'); ?></small>
            </div>
        </a>

        <div class="user-card">
            <div class="avatar"><?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></div>
            <h4><?php echo explode(' ', $_SESSION['user_name'])[0]; ?></h4>
            <p>
                <?php 
                    $cat_sidebar = strtolower(str_replace(['ñ', ' '], ['n', '_'], $data['user']->user_category));
                    echo _t('login.type_' . $cat_sidebar); 
                ?>
            </p>
        </div>

        <ul class="sidebar-nav">
            <li class="nav-section-label"><?php echo _t('dashboard.sidebar.principal'); ?></li>
            <li><a href="#welcome" onclick="showSection('welcome'); return false;" class="nav-link active"><i
                        class="fa-solid fa-house-chimney"></i><span><?php echo _t('dashboard.sidebar.inicio'); ?></span></a>
            </li>
            <li class="nav-section-label"><?php echo _t('dashboard.sidebar.participacion'); ?></li>
            <li><a href="#resumenes" onclick="showSection('resumenes'); return false;" class="nav-link"><i
                        class="fa-solid fa-file-waveform"></i><span><?php echo _t('dashboard.sidebar.resumenes'); ?></span></a>
            </li>
            <li><a href="#asistencia" onclick="showSection('asistencia'); return false;" class="nav-link"><i
                        class="fa-solid fa-clipboard-list"></i><span><?php echo _t('dashboard.sidebar.asistencia'); ?></span></a>
            </li>
            <li><a href="#credenciales" onclick="showSection('credenciales'); return false;" class="nav-link"><i
                        class="fa-solid fa-id-badge"></i><span><?php echo _t('dashboard.sidebar.credencial'); ?></span></a>
            </li>
            <li><a href="#pagos" onclick="showSection('pagos'); return false;" class="nav-link"><i
                        class="fa-solid fa-credit-card"></i><span><?php echo _t('dashboard.sidebar.pagos'); ?></span></a>
            </li>
            <li class="nav-section-label"><?php echo _t('dashboard.sidebar.evento'); ?></li>
            <li><a href="#notificaciones" onclick="showSection('notificaciones'); return false;" class="nav-link"><i
                        class="fa-solid fa-bell"></i><span><?php echo _t('dashboard.sidebar.notificaciones'); ?></span></a>
            </li>
            <li><a href="#calendario" onclick="showSection('calendario'); return false;" class="nav-link"><i
                        class="fa-solid fa-calendar-day"></i><span><?php echo _t('dashboard.sidebar.agenda'); ?></span></a>
            </li>
            <li><a href="#perfil" onclick="showSection('perfil'); return false;" class="nav-link"><i
                        class="fa-solid fa-circle-user"></i><span><?php echo _t('dashboard.sidebar.perfil'); ?></span></a>
            </li>
        </ul>

        <div class="sidebar-footer" style="padding: 1.5rem 1rem; border-top: 1px solid rgba(255,255,255,0.08); margin-top: auto;">
            <!-- Payment Logos -->
            <div style="margin-bottom: 1.2rem; text-align: center;">
                <small style="color: rgba(255,255,255,0.4); font-size: 0.6rem; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 0.5rem;"><?php echo _t('footer.payment_methods'); ?></small>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; justify-items: center;">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-visa.svg" height="20" alt="Visa">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-mastercard.svg" height="20" alt="Mastercard">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-de-venta-amex.svg" height="20" alt="Amex">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-diners.svg" height="20" alt="Diners">
                </div>
            </div>

            <div class="sidebar-legal-links" style="font-size: 0.68rem; display: flex; flex-wrap: wrap; gap: 0.4rem; justify-content: center; width: 100%; margin-bottom: 1rem;">
                <a href="javascript:void(0)" onclick="openLegalModal('privacyModal')" style="color: rgba(255,255,255,0.6); text-decoration: none;"><?php echo _t('footer.privacy_policy'); ?></a>
                <span style="color: rgba(255,255,255,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('termsModal')" style="color: rgba(255,255,255,0.6); text-decoration: none;"><?php echo _t('footer.terms_conditions'); ?></a>
                <span style="color: rgba(255,255,255,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('refundModal')" style="color: rgba(255,255,255,0.6); text-decoration: none;"><?php echo _t('footer.refund_policy'); ?></a>
                <span style="color: rgba(255,255,255,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('complaintModal')" style="color: rgba(255,255,255,0.6); text-decoration: none;"><?php echo _t('footer.complaint_book'); ?></a>
            </div>

            <p style="color: rgba(255,255,255,0.3); font-size: 0.65rem; text-align: center; line-height: 1.4;">
                &copy; <?php echo date('Y'); ?> ONTA · <?php echo _t('dashboard.stats.location'); ?><br>
                <?php echo _t('footer.rights'); ?>
            </p>

            <div style="margin-top: 1rem; background: rgba(255,255,255,0.03); padding: 0.7rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.05);">
                <p style="margin: 0; font-size: 0.6rem; color: rgba(255,255,255,0.4); line-height: 1.3; text-align: center;">
                    <?php echo _t('footer.complaint_notice'); ?>
                </p>
            </div>
        </div>

    </aside>

    <!-- ────────────── MAIN ────────────── -->
    <main class="main">

        <!-- Top Bar -->
        <header class="topbar">
            <div class="topbar-greeting">
                <h1><?php echo _t('dashboard.topbar.greeting'); ?>,
                    <?php echo h(explode(' ', $_SESSION['user_name'])[0]); ?> 👋</h1>
                <p><?php echo _t('dashboard.topbar.welcome'); ?></p>
            </div>
            <div class="topbar-actions">
                <a href="<?php echo URLROOT; ?>" class="btn-topbar">
                    <i class="fa-solid fa-globe"></i> <?php echo _t('dashboard.topbar.website'); ?>
                </a>
                <a href="<?php echo URLROOT; ?>/users/logout" class="btn-topbar danger">
                    <i class="fa-solid fa-power-off"></i> <?php echo _t('dashboard.topbar.logout'); ?>
                </a>
            </div>
        </header>

        <!-- ═══ WELCOME ═══ -->
        <div id="welcome" class="dash-content">

            <!-- Stat Cards -->
            <div class="stats-row">
                <!-- Pago -->
                <div class="stat-card">
                    <div class="stat-icon"
                        style="background:<?php echo ($data['pago_status'] == 'Aprobado') ? 'var(--green-light)' : 'var(--gold-light)'; ?>; color:<?php echo ($data['pago_status'] == 'Aprobado') ? 'var(--green)' : 'var(--gold)'; ?>;">
                        <i class="fa-solid fa-money-check-dollar"></i>
                    </div>
                    <div>
                        <div class="stat-value"
                            style="color:<?php echo (strtolower($data['pago_status']) == 'aprobado') ? 'var(--green)' : 'var(--text)'; ?>;">
                            <?php echo _t('dashboard.status_' . strtolower($data['pago_status'])); ?>
                        </div>
                    </div>
                </div>
                <!-- Resúmenes -->
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--pink-light); color: var(--pink);">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div>
                        <div class="stat-label"><?php echo _t('dashboard.stats.abstracts_sent'); ?></div>
                        <div class="stat-value"><?php echo $data['total_resumenes']; ?>
                            <?php echo ($data['total_resumenes'] == 1) ? _t('dashboard.stats.work') : _t('dashboard.stats.works'); ?>
                        </div>
                    </div>
                </div>
                <!-- Congreso -->
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(108,92,231,0.1); color: #7c3aed;">
                        <i class="fa-solid fa-map-pin"></i>
                    </div>
                    <div>
                        <div class="stat-label"><?php echo _t('dashboard.stats.venue'); ?></div>
                        <div class="stat-value"><?php echo _t('dashboard.stats.location'); ?></div>
                    </div>
                </div>
            </div>

            <!-- Main Hero Panel -->
            <div class="panel">
                <span class="badge-label"><?php echo _t('dashboard.hero.badge'); ?></span>
                <h2 class="panel-title"><?php echo _t('dashboard.hero.title'); ?></h2>
                <p class="panel-desc" style="max-width: 680px; margin-top: 0.5rem;">
                    <?php echo _t('dashboard.hero.desc'); ?> <?php echo _t('dashboard.hero.deadline'); ?>
                    <strong style="color: var(--purple);"><?php echo _t('dashboard.hero.deadline_val'); ?></strong>.
                </p>
                <div class="cta-row">
                    <a href="#resumenes" onclick="showSection('resumenes'); return false;" class="btn-solid pink nav-link"><i class="fa-solid fa-plus-circle"></i>
                        <?php echo _t('dashboard.hero.btn_submit'); ?></a>
                    <a href="#calendario" onclick="showSection('calendario'); return false;" class="btn-outline nav-link"><i class="fa-solid fa-calendar-week"></i>
                        <?php echo _t('dashboard.hero.btn_schedule'); ?></a>
                </div>
                <i class="fa-solid fa-dna ghost-bg"></i>
            </div>
        </div>

        <!-- ═══ RESÚMENES ═══ -->
        <div id="resumenes" class="dash-content" style="display:none;">
            <div class="panel">
                <h2 class="panel-title"><?php echo _t('dashboard.abstracts.title'); ?></h2>
                <p class="panel-desc" style="margin-bottom: 2rem;"><?php echo _t('dashboard.abstracts.subtitle'); ?></p>

                <?php flash('abstract_success'); ?>
                <?php flash('abstract_error'); ?>

                <?php if (empty($data['abstracts'])): ?>
                    <div class="empty-state">
                        <i class="fa-solid fa-inbox"></i>
                        <p><?php echo _t('dashboard.abstracts.empty'); ?></p>
                    </div>
                <?php else: ?>
                    <?php foreach ($data['abstracts'] as $r): ?>
                        <div class="abstract-item">
                            <div>
                                <div class="abstract-title"><?php echo htmlspecialchars($r->titulo); ?></div>
                                <div class="abstract-meta"><i class="fa-solid fa-users"></i>
                                    <?php echo htmlspecialchars($r->autores); ?></div>
                                <div class="abstract-meta"><i class="fa-solid fa-microscope"></i>
                                    <?php echo htmlspecialchars($r->linea_investigacion); ?></div>
                                <div class="abstract-meta" style="color: var(--pink); font-weight: 700;">
                                    <i class="fa-solid fa-barcode"></i> <?php echo _t('dashboard.abstracts.tracking'); ?>:
                                    <?php echo h($r->codigo_seguimiento); ?>
                                </div>
                            </div>
                            <span
                                class="status-pill <?php echo (strtolower($r->estado) == 'pendiente') ? 'status-pending' : 'status-approved'; ?>">
                                <i
                                    class="fa-solid <?php echo (strtolower($r->estado) == 'pendiente') ? 'fa-clock' : 'fa-check-circle'; ?>"></i>
                                <?php echo _t('dashboard.status_' . strtolower($r->estado)); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="notice-box">
                    <i class="fa-solid fa-circle-info"></i>
                    <strong><?php echo _t('dashboard.abstracts.important'); ?>:</strong>
                    <?php echo _t('dashboard.abstracts.notice'); ?> <?php echo _t('dashboard.abstracts.whatsapp'); ?>
                </div>


                <div class="panel-desc" style="margin-bottom: 1rem; font-weight: 500;">
                    <i class="fa-solid fa-download" style="color: var(--pink); margin-right: 5px;"></i>
                    <strong><?php echo _t('dashboard.abstracts.formats'); ?>:</strong>
                    <?php echo _t('dashboard.abstracts.formats_desc'); ?>
                </div>
                <div style="margin-bottom: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="<?php echo URLROOT; ?>/uploads/formatos/Formato_de_resumen_onta_2026.docx" download
                        class="btn-solid"
                        style="background: #2563eb; color: #fff; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
                        <i class="fa-solid fa-file-word"></i> <?php echo _t('dashboard.abstracts.btn_docx'); ?>
                    </a>
                    <a href="<?php echo URLROOT; ?>/uploads/formatos/Formato_de_resumen_onta_2026.zip" download
                        class="btn-solid"
                        style="background: #059669; color: #fff; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);">
                        <i class="fa-solid fa-file-zipper"></i> <?php echo _t('dashboard.abstracts.btn_latex'); ?>
                    </a>
                </div>

                <hr class="divider">

                <?php if (empty($data['abstracts'])): ?>
                    <h2 class="panel-title" style="font-size: 1.5rem;"><?php echo _t('dashboard.abstracts.new.title'); ?>
                    </h2>
                    <p class="panel-desc" style="margin-bottom: 1.75rem;"><?php echo _t('dashboard.abstracts.new.desc'); ?>
                    </p>

                    <form action="<?php echo URLROOT; ?>/users/submitAbstract" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-card">
                            <div class="form-grid" style="margin-bottom: 1.5rem;">
                                <div class="form-group form-grid-full">
                                    <label class="form-label" for="abstract_title"><?php echo _t('dashboard.abstracts.new.field_title'); ?>
                                        <span>*</span></label>
                                    <input type="text" id="abstract_title" name="titulo" class="form-input"
                                        placeholder="<?php echo _t('dashboard.abstracts.new.field_title_ph'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="abstract_authors"><?php echo _t('dashboard.abstracts.new.field_authors'); ?>
                                        <span>*</span></label>
                                    <input type="text" id="abstract_authors" name="autores" class="form-input"
                                        placeholder="<?php echo _t('dashboard.abstracts.new.field_authors_ph'); ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="abstract_affiliation"><?php echo _t('dashboard.abstracts.new.field_affiliation'); ?>
                                        <span>*</span></label>
                                    <input type="text" id="abstract_affiliation" name="afiliacion" class="form-input"
                                        placeholder="<?php echo _t('dashboard.abstracts.new.field_affiliation_ph'); ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="abstract_email"><?php echo _t('dashboard.abstracts.new.field_email'); ?>
                                        <span>*</span></label>
                                    <input type="email" id="abstract_email" name="correo" class="form-input"
                                        placeholder="<?php echo _t('dashboard.abstracts.new.field_email_ph'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="abstract_keywords"><?php echo _t('dashboard.abstracts.new.field_keywords'); ?>
                                        <span>*</span></label>
                                    <input type="text" id="abstract_keywords" name="keywords" class="form-input"
                                        placeholder="<?php echo _t('dashboard.abstracts.new.field_keywords_ph'); ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="abstract_line"><?php echo _t('dashboard.abstracts.new.field_line'); ?>
                                        <span>*</span></label>
                                    <select id="abstract_line" name="linea_investigacion" class="form-input" required style="text-transform: none;">
                                        <option value="" disabled selected><?php echo _t('dashboard.abstracts.new.field_line_ph'); ?></option>
                                        <option value="Extensión en Nematología Agrícola"><?php echo _t('dashboard.abstracts.new.line_option_1'); ?></option>
                                        <option value="Interacción Nematodo-Planta"><?php echo _t('dashboard.abstracts.new.line_option_2'); ?></option>
                                        <option value="Nematodos Entomopatógenos"><?php echo _t('dashboard.abstracts.new.line_option_3'); ?></option>
                                        <option value="Taxonomía, Filogenia y Biodiversidad"><?php echo _t('dashboard.abstracts.new.line_option_4'); ?></option>
                                        <option value="Manejo Integrado de Nematodos"><?php echo _t('dashboard.abstracts.new.line_option_5'); ?></option>
                                        <option value="Control Biológico de Nematodos"><?php echo _t('dashboard.abstracts.new.line_option_6'); ?></option>
                                        <option value="Manejo Químico de Nematodos"><?php echo _t('dashboard.abstracts.new.line_option_7'); ?></option>
                                        <option value="Nematodos Bioindicadores"><?php echo _t('dashboard.abstracts.new.line_option_8'); ?></option>
                                        <option value="Resistencia Genética de Plantas"><?php echo _t('dashboard.abstracts.new.line_option_9'); ?></option>
                                        <option value="Avances Moleculares"><?php echo _t('dashboard.abstracts.new.line_option_10'); ?></option>
                                        <option value="Tecnologías Emergentes e IA"><?php echo _t('dashboard.abstracts.new.line_option_11'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group form-grid-full">
                                    <label class="form-label" for="abstract_file"><?php echo _t('dashboard.abstracts.new.field_file'); ?>
                                        <span>*</span></label>
                                    <div class="file-drop">
                                        <p><?php echo _t('dashboard.abstracts.new.field_file_drop'); ?></p>
                                        <input type="file" id="abstract_file" name="file_resumen" accept="application/pdf" required>
                                        <div style="font-size: 0.75rem; color: var(--muted); margin-top: 0.5rem;">
                                            <?php echo _t('dashboard.abstracts.new.field_file_size'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn-solid pink"
                                style="width: 100%; justify-content: center; font-size: 1rem; padding: 1.1rem; border-radius: 14px;">
                                <?php echo _t('dashboard.abstracts.new.btn_send'); ?>
                            </button>
                            <p style="text-align: center; font-size: 0.78rem; color: var(--muted); margin-top: 0.85rem;">
                                <i class="fa-solid fa-lock"></i> <?php echo _t('dashboard.abstracts.new.security'); ?>
                            </p>
                        </div>
                    </form>
                <?php else: ?>
                    <div
                        style="background: var(--purple); color: #fff; padding: 2.5rem; border-radius: 20px; text-align: center; border: 2px dashed var(--pink); margin-top: 2rem;">
                        <div
                            style="width: 80px; height: 80px; background: rgba(196, 30, 90, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; border: 2px solid var(--pink);">
                            <i class="fa-solid fa-check" style="font-size: 2rem; color: var(--pink);"></i>
                        </div>
                        <h3 style="font-family: 'Source Serif 4', serif; font-size: 1.8rem; margin-bottom: 0.5rem;">
                            <?php echo _t('dashboard.abstracts.limit_reached.title'); ?></h3>
                        <p style="opacity: 0.8; font-size: 1rem; max-width: 500px; margin: 0 auto;">
                            <?php echo _t('dashboard.abstracts.limit_reached.desc'); ?>
                        </p>
                        <p style="margin-top: 1.5rem; font-size: 0.85rem; color: var(--peach);">
                            <?php echo _t('dashboard.abstracts.limit_reached.note'); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ═══ ASISTENCIA ═══ -->
        <div id="asistencia" class="dash-content" style="display:none;">
            <div class="panel">
                <h2 class="panel-title"><?php echo _t('dashboard.attendance.title'); ?></h2>
                <p class="panel-desc" style="margin-bottom: 2rem;"><?php echo _t('dashboard.attendance.desc'); ?></p>

                <div class="countdown-box">
                    <h3><?php echo _t('dashboard.attendance.countdown_title'); ?></h3>
                    <p><?php echo _t('dashboard.attendance.countdown_subtitle'); ?></p>
                    <div class="countdown-tiles">
                        <div class="tile"><span id="cnt-d" class="tile-num">--</span><span
                                class="tile-label"><?php echo _t('countdown.days'); ?></span></div>
                        <div class="tile"><span id="cnt-h" class="tile-num">--</span><span
                                class="tile-label"><?php echo _t('countdown.hours'); ?></span></div>
                        <div class="tile"><span id="cnt-m" class="tile-num">--</span><span
                                class="tile-label"><?php echo _t('countdown.minutes'); ?></span></div>
                        <div class="tile"><span id="cnt-s" class="tile-num">--</span><span
                                class="tile-label"><?php echo _t('countdown.seconds'); ?></span></div>
                    </div>
                </div>

                <div class="qr-card">
                    <i class="fa-solid fa-qrcode"></i>
                    <div>
                        <h4><?php echo _t('dashboard.attendance.qr_title'); ?></h4>
                        <p><?php echo _t('dashboard.attendance.qr_desc'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ CREDENCIALES ═══ -->
        <div id="credenciales" class="dash-content" style="display:none;">
            <div class="panel" style="padding: 0; overflow: hidden; border-radius: 32px;">

                <!-- Panel Header -->
                <div style="padding: 2.5rem 3rem; border-bottom: 1px solid var(--border); background: var(--surface);">
                    <h2 class="panel-title" style="margin-bottom: 0.25rem;"><?php echo _t('dashboard.credentials.title'); ?></h2>
                    <p class="panel-desc" style="margin: 0;"><?php echo _t('dashboard.credentials.desc'); ?></p>
                </div>

                <div class="credential-container" style="padding: 3rem;">
                    <?php if ($data['inscription'] && in_array(strtolower($data['inscription']->payment_status), ['aprobado', 'verified', 'success'])): ?>

                        <!-- ══ CREDENCIAL ACTIVA ══ -->
                        <div class="badge-layout">

                            <!-- ─── CARNET OFICIAL ─── -->
                            <div class="badge-front" id="badge-print-area">

                                <!-- Franja Holográfica Superior -->
                                <div class="badge-holo-header">
                                    <div class="badge-holo-overlay"></div>
                                    <img src="<?php echo URLROOT; ?>/img/logo_ontaperu.png" alt="ONTA 2026" class="badge-logo">
                                    <div class="badge-header-text">
                                        <div class="badge-congress-name"><?php echo _t('dashboard.credentials.congress_name'); ?></div>
                                        <div class="badge-congress-sub"><?php echo _t('dashboard.credentials.congress_sub'); ?></div>
                                        <div class="badge-congress-date"><?php echo _t('dashboard.credentials.congress_date'); ?></div>
                                    </div>
                                </div>

                                <!-- Cuerpo del carnet -->
                                <div class="badge-body-new">

                                    <!-- Avatar + Nombre -->
                                    <div class="badge-identity">
                                        <div class="badge-avatar-new">
                                            <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                                        </div>
                                        <div class="badge-identity-info">
                                            <h2 class="badge-name-new"><?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
                                            <div class="badge-category-pill cat-<?php echo strtolower(str_replace(['ñ', ' '], ['n', '_'], $data['user']->user_category)); ?>">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <?php 
                                                    $cat_badge = strtolower(str_replace(['ñ', ' '], ['n', '_'], $data['user']->user_category));
                                                    echo strtoupper(_t('login.type_' . $cat_badge)); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info Fields -->
                                    <div class="badge-info-grid">
                                        <div class="badge-info-field">
                                            <span class="badge-info-label"><i class="fa-solid fa-id-card"></i> <?php echo _t('dashboard.credentials.label_dni'); ?></span>
                                            <span class="badge-info-value"><?php echo htmlspecialchars($data['user']->dni); ?></span>
                                        </div>
                                        <div class="badge-info-field">
                                            <span class="badge-info-label"><i class="fa-solid fa-building-columns"></i> <?php echo _t('dashboard.credentials.label_inst'); ?></span>
                                            <span class="badge-info-value"><?php echo htmlspecialchars($data['user']->university ?? 'UNA - Puno'); ?></span>
                                        </div>
                                        <div class="badge-info-field">
                                            <span class="badge-info-label"><i class="fa-solid fa-envelope"></i> <?php echo _t('dashboard.credentials.label_email'); ?></span>
                                            <span class="badge-info-value"><?php echo htmlspecialchars($data['user']->email); ?></span>
                                        </div>
                                        <div class="badge-info-field">
                                            <span class="badge-info-label"><i class="fa-solid fa-fingerprint"></i> <?php echo _t('dashboard.credentials.label_id'); ?></span>
                                            <span class="badge-info-value" style="color: var(--pink); font-weight: 800;">ONTA-<?php echo str_pad($_SESSION['user_id'], 5, '0', STR_PAD_LEFT); ?></span>
                                        </div>
                                    </div>

                                    <!-- QR + Footer -->
                                    <div class="badge-qr-section">
                                        <div class="badge-qr-wrap">
                                            <div id="qrcode"></div>
                                            <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="Logo"
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 32px; height: 32px; background: #fff; padding: 3px; border-radius: 50%; box-shadow: 0 0 8px rgba(0,0,0,0.15); object-fit: contain;">
                                        </div>
                                        <div class="badge-qr-info">
                                            <p class="badge-scan-label"><?php echo _t('dashboard.credentials.scan_label'); ?></p>
                                            <p class="badge-scan-sub"><?php echo _t('dashboard.credentials.scan_sub'); ?></p>
                                            <div class="badge-security-strip">
                                                <i class="fa-solid fa-shield-check"></i> <?php echo _t('dashboard.credentials.security_verified'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Franja Inferior de Seguridad -->
                                <div class="badge-bottom-strip">
                                    <span>ONTA · PUNO · PERÚ · 2026</span>
                                    <span><?php echo _t('dashboard.credentials.official_doc'); ?></span>
                                </div>

                            </div>

                            <!-- ─── ACCIONES ─── -->
                            <div class="badge-actions-new">
                                <div class="badge-action-title">
                                    <i class="fa-solid fa-circle-check" style="color: var(--green);"></i>
                                    <h3><?php echo _t('dashboard.credentials.active_title'); ?></h3>
                                </div>
                                <p style="font-size: 0.9rem; color: var(--muted); line-height: 1.7; margin-bottom: 2rem;">
                                    <?php echo _t('dashboard.credentials.active_desc'); ?>
                                </p>

                                <!-- Info de acceso rápido -->
                                <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 1.5rem; margin-bottom: 2rem;">
                                    <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem;">
                                            <span style="color: var(--muted);"><?php echo _t('dashboard.credentials.status_label'); ?></span>
                                            <span style="color: var(--green); font-weight: 700;"><i class="fa-solid fa-circle-check"></i> <?php echo _t('dashboard.status_aprobado'); ?></span>
                                        </div>
                                        <div style="height: 1px; background: var(--border);"></div>
                                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem;">
                                            <span style="color: var(--muted);"><?php echo _t('dashboard.credentials.venue_label'); ?></span>
                                            <span style="font-weight: 600; text-align: right;"><?php echo _t('dashboard.credentials.venue_val'); ?></span>
                                        </div>
                                        <div style="height: 1px; background: var(--border);"></div>
                                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem;">
                                            <span style="color: var(--muted);"><?php echo _t('dashboard.credentials.date_label'); ?></span>
                                            <span style="font-weight: 600;"><?php echo _t('dashboard.credentials.date_val'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <button onclick="window.print()" class="btn-solid" style="background: var(--purple); color: #fff; width: 100%; justify-content: center; padding: 1.1rem; border-radius: 14px; font-size: 0.95rem; margin-bottom: 1rem; border: none; cursor: pointer;">
                                    <i class="fa-solid fa-print"></i> <?php echo _t('dashboard.credentials.btn_print'); ?>
                                </button>
                                <p style="font-size: 0.78rem; color: var(--muted); text-align: center; line-height: 1.6;">
                                    <i class="fa-solid fa-circle-info"></i> <?php echo _t('dashboard.credentials.print_tip'); ?>
                                </p>
                            </div>

                        </div>

                        <!-- Lógica QR -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                const qrData = "ONTA2026|<?php echo $data['user']->dni; ?>|<?php echo $_SESSION['user_id']; ?>";
                                new QRCode(document.getElementById("qrcode"), {
                                    text: qrData,
                                    width: 150,
                                    height: 150,
                                    colorDark : "#c41e5a",
                                    colorLight : "#ffffff",
                                    correctLevel : QRCode.CorrectLevel.H
                                });
                            });
                        </script>

                    <?php else: ?>
                        <!-- CREDENCIAL BLOQUEADA -->
                        <div class="credential-locked">
                            <div class="lock-icon"><i class="fa-solid fa-lock"></i></div>
                            <h3><?php echo _t('dashboard.credentials.locked_title'); ?></h3>
                            <p><?php echo _t('dashboard.credentials.locked_desc'); ?></p>
                            <a href="#pagos" onclick="showSection('pagos'); return false;" class="btn-outline nav-link" style="margin-top: 1.5rem;"><?php echo _t('dashboard.credentials.locked_btn'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- ═══ PAGOS ═══ -->
        <div id="pagos" class="dash-content" style="display:none;">
            <div class="panel">
                <h2 class="panel-title"><?php echo _t('dashboard.payments.title'); ?></h2>
                <p class="panel-desc"><?php echo _t('dashboard.payments.intro'); ?></p>

                <?php flash('payment_success'); ?>
                <?php flash('payment_error'); ?>

                <div class="stats-row" style="margin-top: 2rem;">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: var(--pink-light); color: var(--pink);">
                            <i class="fa-solid fa-user-tag"></i>
                        </div>
                        <div>
                            <div class="stat-label"><?php echo _t('dashboard.payments.category'); ?></div>
                            <div class="stat-value">
                                <?php 
                                    $cat_key = strtolower(str_replace(['ñ', ' '], ['n', '_'], $data['user']->user_category));
                                    echo _t('login.type_' . $cat_key); 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: var(--gold-light); color: var(--gold);">
                            <i class="fa-solid fa-coins"></i>
                        </div>
                        <div>
                            <div class="stat-label"><?php echo _t('dashboard.payments.amount'); ?></div>
                            <div class="stat-value">
                                <?php
                                $current_month = (int) date('n'); // 1 a 12
                                $cat = strtolower($data['user']->user_category);
                                $amount = 0;

                                // Lógica de Precios ONTA 2026
                                if ($cat === 'miembro_onta') {
                                    if ($current_month <= 8) $amount = 580;      // Enero - Agosto
                                    elseif ($current_month == 9) $amount = 610;   // Septiembre
                                    else $amount = 630;                          // Octubre en adelante
                                } elseif ($cat === 'no_miembro') {
                                    if ($current_month <= 8) $amount = 680;      // Enero - Agosto
                                    elseif ($current_month == 9) $amount = 710;   // Septiembre
                                    else $amount = 730;                          // Octubre en adelante
                                } elseif (strpos($cat, 'nacional') !== false) {
                                    $amount = 150;
                                } elseif (strpos($cat, 'extranjero') !== false) {
                                    $amount = 300;
                                } elseif (strpos($cat, 'acompanante') !== false || strpos($cat, 'acompañante') !== false) {
                                    $amount = 400;
                                } else {
                                    $amount = 680; // Default (No Miembro)
                                }

                                echo '$ ' . number_format($amount, 2) . ' USD';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (strpos(strtolower($data['user']->user_category), 'nacional') !== false): ?>
                    <div class="notice-box" style="margin-top: 1.5rem; background: var(--teal-light); border-left: 4px solid var(--teal); color: var(--teal); padding: 1.5rem; border-radius: 12px;">
                        <i class="fa-solid fa-circle-info" style="font-size: 1.2rem; margin-right: 0.8rem;"></i>
                        <div>
                            <strong style="display: block; margin-bottom: 0.5rem;">Inscripción Nacional Detectada</strong>
                            <p style="font-size: 0.9rem; line-height: 1.5;">
                                Para coordinar su pago nacional ($150.00 USD), por favor comuníquese a través de los siguientes canales:
                                <br><br>
                                <strong>Emails:</strong> ontaperu@unap.edu.pe | ilima@unap.edu.pe<br>
                                <strong>WhatsApp:</strong> <a href="https://wa.me/51956838730" target="_blank" style="color: var(--teal); font-weight: 700;">+51 956 838 730</a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="divider"></div>

                <?php if ($data['inscription'] && strtolower($data['inscription']->payment_status) == 'pending'): ?>
                    <!-- ESTADO: EN PROCESO DE VERIFICACIÓN -->
                    <div class="status-verification-panel" style="text-align: center; padding: 4rem 2rem; background: var(--surface); border: 2px dashed var(--gold); border-radius: 40px; margin: 2rem 0;">
                        

                        <div class="animate-pulse-status" style="width: 100px; height: 100px; background: var(--gold-light); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 2.5rem;">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <h3 style="font-family: 'Source Serif 4', serif; font-size: 2rem; color: #fff; margin-bottom: 1rem;"><?php echo _t('dashboard.payments.verifying_title'); ?></h3>
                        <p style="color: var(--muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; line-height: 1.6;">
                            <?php echo _t('dashboard.payments.verifying_desc'); ?> 
                            <br><br>
                            <span style="color: var(--gold); font-weight: 700;"><?php echo _t('dashboard.payments.verifying_note'); ?></span>
                        </p>
                    </div>

                <?php elseif ($data['inscription'] && in_array(strtolower($data['inscription']->payment_status), ['aprobado', 'verified', 'success'])): ?>
                    <!-- ESTADO: PAGO APROBADO / VALIDADO -->
                    <div class="status-success-panel" style="text-align: center; padding: 4rem 2rem; background: var(--surface); border: 2px solid var(--green); border-radius: 40px; margin: 2rem 0; position: relative; overflow: hidden;">
                        <div style="position: absolute; top: -20px; right: -20px; font-size: 15rem; color: var(--green); opacity: 0.05;"><i class="fa-solid fa-circle-check"></i></div>
                        <div style="width: 100px; height: 100px; background: var(--green-light); color: var(--green); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 3rem;">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h3 style="font-family: 'Source Serif 4', serif; font-size: 2.2rem; color: #fff; margin-bottom: 1rem;"><?php echo _t('dashboard.payments.validated_title'); ?></h3>
                        <p style="color: var(--muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; line-height: 1.6;">
                            <?php echo _t('dashboard.payments.validated_desc'); ?>
                        </p>
                        <div style="margin-top: 2rem;">
                            <a href="#credenciales" onclick="showSection('credenciales'); return false;" class="btn-solid nav-link" style="background: var(--green); color: #fff; display: inline-flex; padding: 1rem 2rem; border-radius: 12px; font-weight: 700;">
                                <i class="fa-solid fa-id-card" style="margin-right: 10px;"></i> <?php echo _t('dashboard.payments.validated_btn'); ?>
                            </a>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- ESTADO: MOSTRAR MÉTODOS DE PAGO -->
                    <h3 style="margin-bottom: 3rem; color: var(--purple); text-align:center; font-size: 1.5rem; font-weight: 700;">
                        <?php echo _t('dashboard.payments.methods_title'); ?></h3>

                    <?php if($data['inscription'] && (strtolower($data['inscription']->payment_status) == 'observed' || strtolower($data['inscription']->payment_status) == 'rechazado')): ?>
                        <div style="background: var(--red-dim); color: var(--red); padding: 1.5rem; border-radius: 15px; margin-bottom: 2rem; border: 1px solid rgba(239,68,68,0.2); display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.5rem;"></i>
                            <p><b><?php echo _t('dashboard.payments.observed_title'); ?></b> <?php echo _t('dashboard.payments.observed_desc'); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="payment-selector">
                        <div class="method-card-large" onclick="openPaymentModal('bcpModal')">
                            <div class="method-badge option-1"><?php echo _t('dashboard.payments.option_label'); ?> 1</div>
                            <img src="<?php echo URLROOT; ?>/img/bancos/BCP.png" alt="BCP" class="method-logo">
                            <h4 class="method-title"><?php echo _t('dashboard.payments.bcp_title'); ?></h4>
                            <p class="method-desc"><?php echo _t('dashboard.payments.bcp_desc'); ?></p>
                            <div class="method-footer pink"><?php echo _t('dashboard.payments.select_btn'); ?> <i class="fa-solid fa-arrow-right"></i></div>
                        </div>

                        <div class="method-card-large" onclick="openPaymentModal('culqiModal')">
                            <div class="method-badge option-2"><?php echo _t('dashboard.payments.option_label'); ?> 2</div>
                            <img src="<?php echo URLROOT; ?>/img/bancos/culqi.png" alt="Culqi" class="method-logo">
                            <h4 class="method-title"><?php echo _t('dashboard.payments.culqi_title'); ?></h4>
                            <p class="method-desc"><?php echo _t('dashboard.payments.culqi_desc'); ?></p>
                            <div class="method-footer orange"><?php echo _t('dashboard.payments.pay_now_btn'); ?> <i class="fa-solid fa-credit-card"></i></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ═══ MODAL BCP ═══ -->
        <style>
            .bcp-modal-layout { display: flex; flex-wrap: wrap; }
            .bcp-modal-form-side { flex: 1; min-width: 320px; padding: 2.5rem; }
            .bcp-modal-data-side { flex: 1.2; background: #f8fafc; padding: 2.5rem; border-left: 1px solid #e2e8f0; }
            .bcp-header-minimal { margin-bottom: 2rem; }
            .bcp-logo-small { height: 35px; margin-bottom: 0.8rem; }
            .bcp-modal-title { font-family: var(--font-serif); color: var(--purple); font-size: 1.8rem; margin-bottom: 0.5rem; }
            .bcp-modal-subtitle { color: var(--muted); font-size: 0.9rem; }
            .bcp-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
            .bcp-submit-btn { width: 100%; justify-content: center; padding: 1.1rem; border-radius: 12px; font-weight: 700; margin-top: 1rem; }
            
            .bcp-data-title { color: var(--purple); margin-bottom: 1.2rem; font-weight: 800; font-size: 1rem; text-transform: uppercase; letter-spacing: 0.5px; }
            .bcp-data-card { background: #fff; padding: 1.2rem; border-radius: 16px; border: 1px solid #e2e8f0; margin-bottom: 1.2rem; box-shadow: 0 4px 12px rgba(0,0,0,0.03); position: relative; overflow: hidden; }
            .bcp-data-card.international { background: #f0f4ff; border-color: #cbd5e1; }
            .bcp-data-badge { position: absolute; top: 0; right: 0; padding: 4px 12px; font-size: 0.65rem; font-weight: 800; border-bottom-left-radius: 12px; }
            .bcp-data-badge.national { background: #fee2e2; color: #991b1b; }
            .bcp-data-badge.global { background: #dbeafe; color: #1e40af; }
            
            .bcp-data-item { margin-bottom: 0.8rem; }
            .bcp-data-item:last-child { margin-bottom: 0; }
            .bcp-label { display: block; font-weight: 700; color: var(--pink); text-transform: uppercase; font-size: 0.65rem; letter-spacing: 0.3px; margin-bottom: 2px; }
            .bcp-value { font-size: 0.9rem; color: #1e293b; display: block; }
            .bcp-value-mono { font-family: monospace; font-size: 1.05rem; color: #002a8d; display: block; }
            .bcp-modal-note { font-size: 0.8rem; color: var(--muted); line-height: 1.5; margin-top: 1rem; background: #fffbeb; padding: 10px; border-radius: 8px; border-left: 4px solid #f59e0b; }
            
            .voucher-preview-container { margin-top: 1rem; text-align: center; }
            .voucher-img { width: 100%; max-width: 280px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 4px solid #fff; }

            @media (max-width: 850px) {
                .bcp-modal-form-side, .bcp-modal-data-side { padding: 2rem; flex: none; width: 100%; }
                .bcp-modal-data-side { border-left: none; border-top: 1px solid #e2e8f0; }
                .bcp-form-grid { grid-template-columns: 1fr; }
            }
        </style>

        <div id="bcpModal" class="sci-modal">
            <div class="sci-modal-content" style="max-width: 1000px; padding: 0; border-radius: 24px; overflow: hidden;">
                <span class="sci-modal-close" onclick="closePaymentModal('bcpModal')" style="right: 20px; top: 15px;">&times;</span>

                <div class="bcp-modal-layout">
                    <!-- Left Side: Form -->
                    <div class="bcp-modal-form-side">
                        <div class="bcp-header-minimal">
                            <img src="<?php echo URLROOT; ?>/img/bancos/BCP.png" alt="BCP" class="bcp-logo-small">
                            <h2 class="bcp-modal-title"><?php echo _t('dashboard.payments.bcp_title'); ?></h2>
                            <p class="bcp-modal-subtitle"><?php echo _t('dashboard.payments.bcp_desc'); ?></p>
                        </div>

                        <form action="<?php echo URLROOT; ?>/payments/bcp" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="bcp-form-grid">
                                <div class="form-group">
                                    <label class="form-label" style="font-weight:700; font-size:0.75rem;"><?php echo _t('dashboard.payments.form_op'); ?></label>
                                    <input type="text" name="operation_number" class="form-input" required placeholder="Ej: 015482" style="padding:0.7rem;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="font-weight:700; font-size:0.75rem;"><?php echo _t('dashboard.payments.form_payer_dni'); ?></label>
                                    <input type="text" name="payer_dni" class="form-input" required placeholder="Ej: 74859612" style="padding:0.7rem;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="font-weight:700; font-size:0.75rem;"><?php echo _t('dashboard.payments.form_date'); ?></label>
                                    <input type="date" name="payment_date" class="form-input" required style="padding:0.6rem;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="font-weight:700; font-size:0.75rem;"><?php echo _t('dashboard.payments.form_amount'); ?></label>
                                    <input type="number" step="0.01" name="amount" class="form-input" value="<?php echo $amount; ?>" required style="padding:0.7rem;">
                                </div>
                            </div>
                            <div class="form-group" style="margin: 1.2rem 0;">
                                <label class="form-label" style="font-weight:700; font-size:0.75rem;"><?php echo _t('dashboard.payments.form_file'); ?></label>
                                <input type="file" name="voucher_file" class="form-input" required accept="image/*,application/pdf" style="padding:0.6rem; background:#f8fafc; border:1px dashed #cbd5e1;">
                            </div>
                            <button type="submit" class="btn-solid pink bcp-submit-btn">
                                <i class="fa-solid fa-cloud-arrow-up"></i> <?php echo _t('dashboard.payments.btn_send_voucher'); ?>
                            </button>
                        </form>
                    </div>

                    <!-- Right Side: Data -->
                    <div class="bcp-modal-data-side">
                        <h4 class="bcp-data-title"><i class="fa-solid fa-circle-info" style="color:var(--pink);"></i> <?php echo _t('dashboard.payments.deposit_data'); ?></h4>

                        <!-- National -->
                        <div class="bcp-data-card">
                            <div class="bcp-data-badge national">PERU / NACIONAL</div>
                            <div class="bcp-data-item">
                                <span class="bcp-label"><?php echo _t('dashboard.payments.holder'); ?></span>
                                <strong class="bcp-value">INSTITUTO DE INVESTIGACION E I</strong>
                            </div>
                            <div class="bcp-data-item" style="display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
                                <div>
                                    <span class="bcp-label"><?php echo _t('dashboard.payments.acc_number'); ?></span>
                                    <strong class="bcp-value-mono" style="font-size:0.95rem;">495-7375876-1-04</strong>
                                </div>
                                <div>
                                    <span class="bcp-label"><?php echo _t('dashboard.payments.cci'); ?></span>
                                    <strong class="bcp-value-mono" style="font-size:0.95rem;">002-495-007375876104-00</strong>
                                </div>
                            </div>
                        </div>

                        <!-- International -->
                        <div class="bcp-data-card international">
                            <div class="bcp-data-badge global"><i class="fa-solid fa-globe"></i> <?php echo _t('dashboard.payments.intl_wire_title'); ?></div>
                            <div class="bcp-data-item">
                                <span class="bcp-label"><?php echo _t('dashboard.payments.intl_wire_bank'); ?></span>
                                <strong class="bcp-value" style="font-weight:700;">Wells Fargo Bank, N.A.</strong>
                            </div>
                            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:10px; margin-bottom:8px;">
                                <div>
                                    <span class="bcp-label">SWIFT</span>
                                    <strong class="bcp-value-mono" style="font-size:0.9rem;">WFBIUS6S</strong>
                                </div>
                                <div>
                                    <span class="bcp-label">ROUTING</span>
                                    <strong class="bcp-value-mono" style="font-size:0.9rem;">121000248</strong>
                                </div>
                            </div>
                            <div class="bcp-data-item">
                                <span class="bcp-label">ACCOUNT</span>
                                <strong class="bcp-value-mono" style="font-size:1rem;">2000044209247</strong>
                            </div>
                            <div class="bcp-data-item">
                                <span class="bcp-label">BENEFICIARY</span>
                                <strong class="bcp-value" style="font-size:0.75rem; line-height:1.2;">ONTA (Org. of Nematologists of Tropical Amer FL Inc)</strong>
                            </div>
                        </div>

                        <div class="bcp-modal-note">
                            <i class="fa-solid fa-triangle-exclamation" style="color:#d97706;"></i> <?php echo _t('dashboard.payments.voucher_note'); ?>
                        </div>

                        <div class="voucher-preview-container">
                             <span class="bcp-label" style="margin-bottom:8px;"><?php echo _t('dashboard.payments.voucher_guide'); ?></span>
                             <img src="<?php echo URLROOT; ?>/img/bancos/voucherbcp.jpg" alt="Voucher" class="voucher-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ MODAL CULQI ═══ -->
        <div id="culqiModal" class="sci-modal">
            <div class="sci-modal-content culqi-modal-inner" style="max-width: 500px;">
                <span class="sci-modal-close" onclick="closePaymentModal('culqiModal')">&times;</span>
                <div style="margin-bottom: 3rem; position: relative;">
                    <img src="<?php echo URLROOT; ?>/img/bancos/culqi.png" alt="Culqi" style="height: 50px; margin-bottom: 2rem;">
                    <h2 style="font-family: var(--font-serif); color: var(--purple); font-size: 2rem; margin-bottom: 1rem;">
                        <?php echo _t('dashboard.payments.culqi_title'); ?></h2>
                    <p style="color: var(--muted); line-height: 1.6;"><?php echo _t('dashboard.payments.culqi_desc'); ?></p>
                </div>

                <!-- Resumen de Compra -->
                <div class="culqi-summary-card">
                    <h4 style="font-size: 0.85rem; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; border-bottom: 1px solid #f0f0f0; padding-bottom: 0.5rem;">Resumen de Inscripción</h4>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.95rem; color: var(--purple); font-weight: 500;">
                            <?php 
                                $cat_modal = strtolower(str_replace(['ñ', ' '], ['n', '_'], $_SESSION['user_category']));
                                echo _t('login.type_' . $cat_modal); 
                            ?>
                        </span>
                        <span style="font-weight: 700;">$ <?php echo number_format($amount, 2); ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 0.8rem; border-top: 1px solid #f0f0f0; margin-top: 0.5rem;">
                        <span style="font-weight: 800; color: var(--purple);">TOTAL A PAGAR</span>
                        <span style="font-weight: 800; color: #ff6b00; font-size: 1.1rem;">$ <?php echo number_format($amount, 2); ?> USD</span>
                    </div>
                </div>

                <!-- Aceptación de Términos -->
                <div class="culqi-terms-box">
                    <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer; font-size: 0.85rem; color: var(--text);">
                        <input type="checkbox" id="accept_terms_culqi" style="margin-top: 3px; accent-color: #ff6b00;">
                        <span>He leído y acepto los <a href="<?php echo URLROOT; ?>/legal/terminos" target="_blank" style="color: #ff6b00; font-weight: 700; text-decoration: none;">Términos y Condiciones</a> y la <a href="<?php echo URLROOT; ?>/legal/devoluciones" target="_blank" style="color: #ff6b00; font-weight: 700; text-decoration: none;">Política de Reembolso</a>.</span>
                    </label>
                </div>

                <div style="margin-bottom: 2rem; display: flex; flex-direction: column; gap: 1.2rem; align-items: center;">
                    <div style="display: flex; gap: 1.2rem; opacity: 0.9;">
                        <img src="<?php echo URLROOT; ?>/img/bancos/pos-visa.svg" height="25" alt="Visa">
                        <img src="<?php echo URLROOT; ?>/img/bancos/pos-mastercard.svg" height="25" alt="Mastercard">
                        <img src="<?php echo URLROOT; ?>/img/bancos/pos-de-venta-amex.svg" height="25" alt="Amex">
                        <img src="<?php echo URLROOT; ?>/img/bancos/pos-diners.svg" height="25" alt="Diners">
                    </div>
                    <div style="font-size: 0.75rem; color: var(--muted); display: flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-shield-halved" style="color: #22c55e;"></i> Pago 100% seguro procesado por Culqi
                    </div>
                </div>

                <button id="btn-pay-culqi" class="btn-solid" style="background: #ff6b00; color: #fff; width: 100%; justify-content: center; border: none; padding: 1.5rem; border-radius: 16px; font-size: 1.2rem; font-weight: 800; box-shadow: 0 15px 30px rgba(255,107,0,0.3);">
                    <i class="fa-solid fa-credit-card"></i> <?php echo _t('dashboard.payments.btn_pay_culqi'); ?>
                </button>
            </div>
        </div>

        <style>
            .method-card-large:hover {
                border-color: var(--pink) !important;
                transform: translateY(-12px) scale(1.02);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1) !important;
            }

            .method-card-large:hover .method-footer {
                transform: translateX(5px);
                transition: transform 0.3s ease;
            }

            /* Modal Styles */
            .sci-modal {
                display: none;
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(26, 22, 37, 0.6);
                backdrop-filter: blur(10px);
                opacity: 0;
                transition: opacity 0.3s ease;
                align-items: center;
                justify-content: center;
            }

            .sci-modal.active {
                display: flex;
                opacity: 1;
            }

            .sci-modal-content {
                background-color: #fff;
                transform: translateY(20px);
                transition: transform 0.3s ease;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            }

            .sci-modal.active .sci-modal-content {
                transform: translateY(0);
            }

            .sci-modal-close {
                position: absolute;
                right: 25px;
                top: 20px;
                font-size: 2rem;
                color: var(--muted);
                cursor: pointer;
                line-height: 1;
                transition: all 0.3s ease;
                z-index: 10;
            }

            .sci-modal-close:hover {
                color: var(--pink);
                transform: rotate(90deg);
            }
        </style>

        <script src="https://checkout.culqi.com/js/v4"></script>
        <script>
            // Close modal when clicking outside
            window.onclick = function (event) {
                if (event.target.classList.contains('sci-modal')) {
                    closePaymentModal(event.target.id);
                }
            }

            // Configuración de Culqi - Envolver en una función para asegurar que Culqi esté cargado
            function initCulqi() {
                if (typeof Culqi === 'undefined') {
                    console.log("Culqi no cargado aún, reintentando...");
                    setTimeout(initCulqi, 200);
                    return;
                }

                const btnCulqi = document.getElementById('btn-pay-culqi');
                if (btnCulqi) {
                    Culqi.publicKey = '<?php echo CULQI_PUBLIC_KEY; ?>';

                    // Separar nombre y apellidos del usuario registrado
                    <?php
                        $user_name_parts = explode(' ', trim($data['user']->name ?? ''));
                        $user_first_name = $user_name_parts[0] ?? 'Cliente';
                        $user_last_name  = count($user_name_parts) > 1 ? implode(' ', array_slice($user_name_parts, 1)) : '-';
                        $user_phone_clean = preg_replace('/[^0-9]/', '', $data['user']->phone ?? '');
                        if (strlen($user_phone_clean) < 6) $user_phone_clean = '999999999';
                    ?>

                    Culqi.settings({
                        title: 'ONTA PERU 2026',
                        currency: 'USD',
                        description: 'Inscripción ONTA 2026 - <?php echo htmlspecialchars($data['user']->name); ?>',
                        amount: <?php echo (int)($amount * 100); ?>,
                        email: '<?php echo strtolower(htmlspecialchars($data['user']->email)); ?>'
                    });

                    // Enviar datos del cliente para que aparezca el nombre real en el panel de Culqi
                    Culqi.options({
                        lang: 'es',
                        installments: false,
                        client: {
                            email:        '<?php echo strtolower(htmlspecialchars($data['user']->email)); ?>',
                            first_name:   '<?php echo htmlspecialchars($user_first_name); ?>',
                            last_name:    '<?php echo htmlspecialchars($user_last_name); ?>',
                            phone_number: '<?php echo $user_phone_clean; ?>'
                        }
                    });

                    btnCulqi.addEventListener('click', function (e) {
                        e.preventDefault();
                        const check = document.getElementById('accept_terms_culqi');
                        if (!check.checked) {
                            alert('Debe aceptar los Términos y Condiciones para continuar con el pago.');
                            return;
                        }
                        
                        console.log("Abriendo Culqi Checkout...");
                        Culqi.open();
                    });
                }
            }

            document.addEventListener('DOMContentLoaded', initCulqi);

            // Función que Culqi llama automáticamente al finalizar
            function culqi() {
                if (Culqi.token) {
                    const token = Culqi.token.id;
                    const email = Culqi.token.email;

                    console.log("Token recibido: " + token);

                    // Deshabilitar botón para evitar doble click
                    const btn = document.getElementById('btn-pay-culqi');
                    if (btn) {
                        btn.disabled = true;
                        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Procesando...';
                    }

                    // Enviar al servidor mediante Fetch
                    fetch('<?php echo URLROOT; ?>/payments/culqi', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            token: token,
                            email: email,
                            amount: <?php echo (int)($amount * 100); ?>
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = '<?php echo URLROOT; ?>/users/dashboard#notificaciones';
                            location.reload();
                        } else {
                            alert('Error: ' + data.message);
                            if (btn) {
                                btn.disabled = false;
                                btn.innerHTML = '<i class="fa-solid fa-credit-card"></i> <?php echo _t('dashboard.payments.btn_pay_culqi'); ?>';
                            }
                        }
                    })
                    .catch(err => {
                        console.error("Error en fetch:", err);
                        alert('Hubo un error de conexión al procesar el pago.');
                        if (btn) {
                            btn.disabled = false;
                            btn.innerHTML = '<i class="fa-solid fa-credit-card"></i> <?php echo _t('dashboard.payments.btn_pay_culqi'); ?>';
                        }
                    });
                } else {
                    console.error("Culqi Error:", Culqi.error);
                    alert(Culqi.error.user_message);
                }
            }
        </script>

        <!-- ═══ NOTIFICACIONES ═══ -->
        <div id="notificaciones" class="dash-content" style="display:none;">
            <div class="panel">
                <div class="notif-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 class="panel-title" style="margin-bottom: 0;"><?php echo _t('dashboard.notifications.title'); ?></h2>
                    <span id="notif-count-label" style="background: var(--pink-light); color: var(--pink); padding: 5px 15px; border-radius: 100px; font-size: 0.8rem; font-weight: 700;">2 <?php echo _t('dashboard.notifications.new_tag'); ?></span>
                </div>
                
                <div class="notification-list" id="main-notification-list">
                    <?php if (!empty($data['notifications'])): ?>
                        <?php foreach($data['notifications'] as $notif): ?>
                            <div class="notif-item <?php echo $notif->is_read ? '' : 'unread'; ?>" style="display: flex; gap: 1.5rem; padding: 1.5rem; border-radius: 20px; background: #fff; border: 1px solid var(--border); margin-bottom: 1rem; position: relative; transition: all 0.3s ease; cursor: pointer;">
                                <div class="notif-icon" style="width: 50px; height: 50px; border-radius: 15px; background: <?php echo $notif->type == 'payment' ? '#e0f2fe' : 'var(--pink-light)'; ?>; color: <?php echo $notif->type == 'payment' ? '#0284c7' : 'var(--pink)'; ?>; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                                    <i class="fa-solid <?php echo $notif->type == 'payment' ? 'fa-clock-rotate-left' : 'fa-bell'; ?>"></i>
                                </div>
                                <div class="notif-body" style="flex: 1;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                                        <h4 style="margin: 0; color: var(--text-dark); font-weight: 700;"><?php echo h($notif->title); ?></h4>
                                        <span style="font-size: 0.75rem; color: var(--text-light);"><?php echo date('d M, H:i', strtotime($notif->created_at)); ?></span>
                                    </div>
                                    <p style="margin: 0; font-size: 0.9rem; color: var(--text-muted); line-height: 1.5;"><?php echo h($notif->message); ?></p>
                                </div>
                                <?php if (!$notif->is_read): ?>
                                    <span class="unread-dot" style="position: absolute; top: 15px; right: 15px; width: 10px; height: 10px; background: <?php echo $notif->type == 'payment' ? '#0284c7' : 'var(--pink)'; ?>; border-radius: 50%;"></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="text-align: center; padding: 4rem 2rem; color: var(--text-light);">
                            <div style="font-size: 4rem; opacity: 0.1; margin-bottom: 1.5rem;"><i class="fa-solid fa-bell-slash"></i></div>
                            <h3 style="margin-bottom: 0.5rem; color: var(--text-muted);"><?php echo _t('dashboard.notifications.empty_title'); ?></h3>
                            <p><?php echo _t('dashboard.notifications.empty_desc'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <style>
            .notif-item:hover {
                transform: translateX(5px);
                border-color: var(--pink) !important;
                box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            }
            .notif-item.unread {
                border-left: 4px solid var(--pink) !important;
            }
            
            @media (max-width: 600px) {
                .notif-header {
                    flex-direction: column;
                    align-items: flex-start !important;
                    gap: 0.75rem;
                }
                .notif-item {
                    padding: 1.25rem !important;
                    gap: 1rem !important;
                    border-radius: 16px !important;
                }
                .notif-icon {
                    width: 42px !important;
                    height: 42px !important;
                    font-size: 1rem !important;
                }
                .notif-body h4 {
                    font-size: 0.95rem !important;
                }
                .notif-body p {
                    font-size: 0.85rem !important;
                }
            }
        </style>

        <!-- ═══ CALENDARIO ═══ -->
        <div id="calendario" class="dash-content" style="display:none;">
            <div class="panel">
                <h2 class="panel-title"><?php echo _t('dashboard.schedule.title'); ?></h2>
                <p class="panel-desc" style="margin-bottom: 2.5rem;"><?php echo _t('dashboard.schedule.desc'); ?></p>

                <div class="timeline">
                    <div class="tl-event">
                        <span class="tl-dot pink"></span>
                        <div class="tl-card">
                            <span class="tl-date pink"><?php echo _t('dashboard.schedule.event1_date'); ?></span>
                            <h4><i class="fa-solid fa-file-pen" style="color:var(--pink);"></i>
                                <?php echo _t('dashboard.schedule.event1_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event1_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot gold"></span>
                        <div class="tl-card">
                            <span class="tl-date gold"><?php echo _t('dashboard.schedule.event2_date'); ?></span>
                            <h4><i class="fa-solid fa-envelope-open-text" style="color:var(--gold);"></i>
                                <?php echo _t('dashboard.schedule.event2_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event2_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot teal"></span>
                        <div class="tl-card main-event">
                            <span class="tl-date teal"><?php echo _t('dashboard.schedule.event3_date'); ?></span>
                            <h4><i class="fa-solid fa-flag-checkered"></i>
                                <?php echo _t('dashboard.schedule.event3_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event3_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ PERFIL ═══ -->
        <div id="perfil" class="dash-content" style="display:none;">
            <div class="panel" style="padding: 0; overflow: visible;">
                <div class="profile-header">
                    <div class="profile-avatar"><?php echo h(strtoupper(substr($data['user']->name, 0, 1))); ?></div>
                    <div class="profile-info">
                        <h3><?php echo htmlspecialchars($data['user']->name); ?></h3>
                        <span
                            class="profile-badge"><?php echo _t('login.type_' . strtolower(str_replace(['ñ', ' '], ['n', '_'], $data['user']->user_category))); ?></span>
                    </div>
                </div>
                <div class="profile-body">
                    <?php flash('profile_updated'); ?>
                    <p class="panel-desc" style="margin-bottom: 2rem;"><?php echo _t('dashboard.profile.desc'); ?></p>
                    <form action="<?php echo URLROOT; ?>/users/updateProfile" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="profile_dni"><i class="fa-solid fa-id-card"></i>
                                    <?php echo _t('dashboard.profile.form_dni'); ?></label>
                                <input type="text" id="profile_dni" class="form-input"
                                    value="<?php echo htmlspecialchars($data['user']->dni); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_email"><i class="fa-solid fa-envelope"></i>
                                    <?php echo _t('dashboard.profile.form_email'); ?></label>
                                <input type="email" id="profile_email" class="form-input" value="<?php echo h($data['user']->email); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_name"><i class="fa-solid fa-user"></i>
                                    <?php echo _t('dashboard.profile.form_name'); ?> <span
                                        style="color:var(--pink)">*</span></label>
                                <input type="text" id="profile_name" name="name" class="form-input"
                                    value="<?php echo htmlspecialchars($data['user']->name); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_university"><i class="fa-solid fa-building-columns"></i>
                                    <?php echo _t('dashboard.profile.form_university'); ?> <span
                                        style="color:var(--pink)">*</span></label>
                                <input type="text" id="profile_university" name="university" class="form-input"
                                    value="<?php echo h($data['user']->university); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_school"><i class="fa-solid fa-graduation-cap"></i>
                                    <?php echo _t('dashboard.profile.form_school'); ?></label>
                                <input type="text" id="profile_school" name="professional_school" class="form-input"
                                    value="<?php echo h($data['user']->professional_school); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_department"><i class="fa-solid fa-map-location-dot"></i>
                                    <?php echo _t('dashboard.profile.form_department'); ?> <span
                                        style="color:var(--pink)">*</span></label>
                                <input type="text" id="profile_department" name="department" class="form-input"
                                    value="<?php echo h($data['user']->department); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="profile_phone"><i class="fa-solid fa-phone"></i>
                                    <?php echo _t('dashboard.profile.form_phone'); ?> <span
                                        style="color:var(--pink)">*</span></label>
                                <input type="text" id="profile_phone" name="phone" class="form-input"
                                    value="<?php echo h($data['user']->phone); ?>" required>
                            </div>
                        </div>
                        <div style="margin-top: 2rem; text-align: right;">
                            <button type="submit" class="btn-solid pink"
                                style="border: none; padding: 0.9rem 2.5rem; border-radius: 50px; font-size: 0.95rem;">
                                <?php echo _t('dashboard.profile.btn_save'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ── Navigation via URL hash (para redirects de PHP con #section) ──
            function activateHashSection() {
                const hash = window.location.hash ? window.location.hash.substring(1) : 'welcome';
                const validSections = ['welcome','resumenes','asistencia','credenciales','pagos','notificaciones','calendario','perfil'];
                if (validSections.includes(hash)) {
                    showSection(hash);
                } else {
                    showSection('welcome');
                }
            }

            // Activar sección según hash al cargar
            activateHashSection();

            // Escuchar cambios de hash (navegación con botones Atrás/Adelante del browser)
            window.addEventListener('hashchange', activateHashSection);

            // ── Countdown ──
            const target = new Date('2026-11-09T08:00:00').getTime();
            const els = { d: document.getElementById('cnt-d'), h: document.getElementById('cnt-h'), m: document.getElementById('cnt-m'), s: document.getElementById('cnt-s') };

            function pad(n) { return String(n).padStart(2, '0'); }

            const tick = setInterval(() => {
                const diff = target - Date.now();
                if (diff <= 0) { clearInterval(tick); Object.values(els).forEach(e => { if (e) e.textContent = '00'; }); return; }
                if (els.d) els.d.textContent = Math.floor(diff / 86400000);
                if (els.h) els.h.textContent = pad(Math.floor((diff % 86400000) / 3600000));
                if (els.m) els.m.textContent = pad(Math.floor((diff % 3600000) / 60000));
                if (els.s) els.s.textContent = pad(Math.floor((diff % 60000) / 1000));
            }, 1000);

            // ── Fade-in CSS ──
            const style = document.createElement('style');
            style.textContent = '@keyframes fadeIn { from { opacity:0; transform: translateY(12px); } to { opacity:1; transform: translateY(0); } }';
            document.head.appendChild(style);
        });
    </script>

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
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
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
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.full_name'); ?></label>
                            <input type="text" id="comp_name" value="<?php echo $_SESSION['user_name']; ?>" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;"><?php echo _t('complaint.id_doc'); ?></label>
                            <input type="text" id="comp_dni" value="<?php echo $data['user']->dni; ?>" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
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
                        <input type="email" id="comp_email" value="<?php echo $_SESSION['user_email']; ?>" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                    </div>

                    <!-- 2. Identificación del Bien Contratado -->
                    <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-top: 1rem;">
                        <strong style="font-size: 0.9rem; color: var(--pink);"><?php echo _t('complaint.good_data'); ?></strong>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
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
                        alert('<?php echo _t('complaint.success_msg'); ?>' + (res.claim_id ? '\n\nID: ' + res.claim_id : ''));
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
</body>
</html>