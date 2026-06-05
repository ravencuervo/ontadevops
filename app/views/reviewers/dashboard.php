<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,700;1,8..60,400&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">

    <style>
        :root {
            --bg: #f8fafc;
            --sidebar-bg: #ffffff;
            --surface: #ffffff;
            --border: #e2e8f0;
            --border-hover: #cbd5e1;
            --text: #0f172a;
            --muted: #64748b;
            --pink: #ec4899;
            --pink-dim: rgba(236, 72, 153, 0.1);
            --blue: #2563eb;
            --blue-dim: rgba(37, 99, 235, 0.1);
            --green: #10b981;
            --green-dim: rgba(16, 185, 129, 0.1);
            --yellow: #f59e0b;
            --yellow-dim: rgba(245, 158, 11, 0.1);
            --radius: 16px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            background: var(--bg); 
            color: var(--text); 
            display: flex; 
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }
        .brand {
            padding: 2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: var(--text);
        }
        .brand-logo {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--blue), #8b5cf6);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
        }
        .brand-logo img { width: 28px; height: 28px; object-fit: contain; }
        .brand-text strong { display: block; font-size: 1.1rem; font-weight: 800; letter-spacing: -0.5px; }
        .brand-text small { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; }

        .admin-badge {
            margin: 0 1.25rem 2rem;
            padding: 1rem;
            background: #f1f5f9;
            border-radius: 16px;
            display: flex; align-items: center; gap: 0.75rem;
        }
        .admin-avatar {
            width: 40px; height: 40px;
            background: var(--blue); color: #fff;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.2rem;
        }
        .admin-badge-info h4 { font-size: 0.85rem; font-weight: 700; margin-bottom: 2px; color: var(--text); }
        .admin-badge-info span { font-size: 0.65rem; color: var(--blue); font-weight: 800; text-transform: uppercase; }

        nav { padding: 0 0.75rem; flex: 1; }
        .nav-label { font-size: 0.65rem; font-weight: 800; color: var(--muted); padding: 1.5rem 1rem 0.5rem; text-transform: uppercase; letter-spacing: 1px; }
        .nav-link {
            display: flex; align-items: center; gap: 0.85rem;
            padding: 0.85rem 1rem;
            text-decoration: none;
            color: var(--muted);
            border-radius: 12px;
            font-size: 0.9rem; font-weight: 600;
            transition: var(--transition);
            margin-bottom: 4px;
        }
        .nav-link i { font-size: 1.1rem; width: 24px; text-align: center; }
        .nav-link:hover { background: #f1f5f9; color: var(--text); }
        .nav-link.active { background: var(--blue-dim); color: var(--blue); }

        .logout-area { padding: 1.5rem; border-top: 1px solid var(--border); }
        .btn-logout {
            display: flex; align-items: center; justify-content: center; gap: 0.75rem;
            width: 100%; padding: 0.85rem;
            background: #fff1f2; color: #e11d48;
            border-radius: 12px; text-decoration: none;
            font-weight: 700; font-size: 0.85rem;
            transition: var(--transition);
        }
        .btn-logout:hover { background: #ffe4e6; transform: translateY(-2px); }

        /* ─── CONTENT ─── */
        .main { flex: 1; margin-left: 280px; min-height: 100vh; display: flex; flex-direction: column; }
        .content { padding: 2.5rem; max-width: 1400px; margin: 0 auto; width: 100%; }

        .admin-section { display: none; animation: fadeIn 0.4s ease-out; }
        .admin-section.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .sec-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; }
        .sec-header h2 { font-family: 'Source Serif 4', serif; font-size: 2rem; font-weight: 700; color: var(--text); }

        /* KPI Grid */
        .kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem; }
        .kpi-card {
            background: var(--surface); border: 1px solid var(--border);
            padding: 1.5rem; border-radius: var(--radius);
            display: flex; align-items: center; gap: 1.25rem;
            box-shadow: var(--shadow); transition: var(--transition);
        }
        .kpi-card:hover { transform: translateY(-4px); border-color: var(--border-hover); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
        .kpi-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        .kpi-label { font-size: 0.72rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .kpi-value { font-size: 1.75rem; font-weight: 800; color: var(--text); }
        .count-pill { padding: 0.5rem 1rem; background: var(--blue-dim); color: var(--blue); border-radius: 100px; font-weight: 800; font-size: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }

        /* Welcome Banner */
        .welcome-banner { background: linear-gradient(135deg, #1e3a5f 0%, #0f172a 100%); border-radius: 24px; padding: 3rem; margin-bottom: 2.5rem; position: relative; overflow: hidden; }
        .welcome-banner::before { content: ''; position: absolute; top: -50%; right: -20%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, transparent 70%); border-radius: 50%; }
        .welcome-banner::after { content: ''; position: absolute; bottom: -30%; left: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(139,92,246,0.1) 0%, transparent 70%); border-radius: 50%; }
        .wb-content { position: relative; z-index: 2; }
        .wb-badge { display: inline-block; padding: 0.35rem 1rem; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15); border-radius: 100px; font-size: 0.7rem; font-weight: 800; color: rgba(255,255,255,0.8); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 1rem; backdrop-filter: blur(10px); }
        .wb-title { font-family: 'Source Serif 4', serif; font-size: 1.8rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem; }
        .wb-desc { font-size: 0.9rem; color: rgba(255,255,255,0.6); max-width: 550px; line-height: 1.6; }

        /* Charts Grid */
        .charts-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem; }
        .chart-card { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; box-shadow: var(--shadow); }
        .chart-card h3 { font-size: 0.8rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.5rem; }
        .chart-container { position: relative; height: 280px; width: 100%; }

        /* Table */
        .table-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); overflow: hidden; }
        .table-toolbar { padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: #fff; }
        .table-search-box { position: relative; width: 320px; }
        .table-search-box i { position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: var(--muted); }
        .table-search { width: 100%; padding: 0.85rem 1.25rem 0.85rem 3rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; color: var(--text); font-family: inherit; transition: var(--transition); }
        .table-search:focus { border-color: var(--blue); outline: none; box-shadow: 0 0 0 3px var(--blue-dim); }
        .filter-pills { display: flex; gap: 0.5rem; }
        .filter-pill { padding: 0.5rem 1rem; border-radius: 100px; border: 1px solid var(--border); background: #fff; font-size: 0.75rem; font-weight: 700; color: var(--muted); cursor: pointer; transition: var(--transition); }
        .filter-pill:hover { border-color: var(--blue); color: var(--blue); }
        .filter-pill.active { background: var(--blue); color: #fff; border-color: var(--blue); }

        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th { background: #f8fafc; padding: 1.25rem 1.5rem; text-align: left; font-size: 0.7rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid var(--border); }
        .admin-table td { padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); vertical-align: middle; }
        .admin-table tr { transition: var(--transition); }
        .admin-table tr:hover { background: #f8fafc; }
        .admin-table tr:last-child td { border-bottom: none; }

        .td-title { font-weight: 700; font-size: 0.95rem; color: var(--text); margin-bottom: 4px; line-height: 1.4; }
        .td-sub { font-size: 0.8rem; color: var(--muted); display: flex; align-items: center; gap: 0.5rem; }
        .td-mono { font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; color: var(--blue); font-weight: 700; background: var(--blue-dim); padding: 2px 6px; border-radius: 4px; }

        /* Pills */
        .pill { padding: 4px 10px; border-radius: 6px; font-size: 0.65rem; font-weight: 800; text-transform: uppercase; display: inline-block; }
        .pill-pending { background: var(--yellow-dim); color: var(--yellow); }
        .pill-approved { background: var(--green-dim); color: var(--green); }
        .pill-rejected { background: #fee2e2; color: #ef4444; }
        .pill-observed { background: var(--blue-dim); color: var(--blue); }

        .action-btns { display: flex; gap: 0.5rem; }
        .act-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); }
        .act-btn:hover { border-color: var(--blue); color: var(--blue); background: var(--blue-dim); transform: translateY(-2px); }

        /* Modals */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(4px); z-index: 1000; display: none; align-items: center; justify-content: center; padding: 2rem; }
        .modal-overlay.active { display: flex; }
        .modal-box { background: #fff; border-radius: 24px; width: 100%; max-width: 700px; max-height: 90vh; overflow-y: auto; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); border: 1px solid var(--border); }
        .modal-header { padding: 1.5rem 2rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .modal-close { background: #f1f5f9; border: none; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); }
        .modal-close:hover { background: #fee2e2; color: #ef4444; }
        .modal-content { padding: 2rem; }
        .modal-header h3 { font-family: 'Source Serif 4', serif; font-size: 1.25rem; font-weight: 700; }
        @keyframes modalIn { from { opacity: 0; transform: scale(0.95) translateY(20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        .modal-overlay.active .modal-box { animation: modalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1); }

        .btn-solid { background: var(--blue); color: #fff; border: none; padding: 0.85rem 1.5rem; border-radius: 12px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 0.75rem; transition: var(--transition); font-family: inherit; font-size: 0.85rem; }
        .btn-solid:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(37,99,235,0.3); }

        .pagination { padding: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; align-items: center; gap: 0.5rem; }
        .pg-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; font-weight: 700; transition: var(--transition); }
        .pg-btn:hover:not(:disabled) { border-color: var(--blue); color: var(--blue); background: var(--blue-dim); }
        .pg-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .pg-info { font-size: 0.85rem; color: var(--muted); font-weight: 600; margin: 0 1rem; }

        /* Profile */
        .profile-grid { display: grid; grid-template-columns: 300px 1fr; gap: 2rem; }
        .profile-avatar-card { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center; box-shadow: var(--shadow); }
        .profile-avatar-large { width: 120px; height: 120px; background: var(--blue-dim); color: var(--blue); border-radius: 30px; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; font-weight: 800; margin: 0 auto 1.5rem; border: 4px solid #fff; box-shadow: 0 0 0 4px var(--blue-dim); }
        .profile-form-card { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; box-shadow: var(--shadow); }
        .adm-field label { display: block; font-size: 0.72rem; font-weight: 800; color: var(--muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .adm-input { width: 100%; padding: 0.85rem 1.1rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; color: var(--text); font-family: inherit; font-size: 0.95rem; transition: var(--transition); }
        .adm-input:focus { border-color: var(--blue); outline: none; box-shadow: 0 0 0 3px var(--blue-dim); }

        /* Detail sections in modal */
        .sec-title { font-size: 0.72rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin: 2rem 0 1rem; display: flex; align-items: center; gap: 1rem; }
        .sec-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .details-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .detail-item label { display: block; font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase; margin-bottom: 4px; }
        .detail-item p { font-size: 0.95rem; font-weight: 600; color: var(--text); }

        /* Timeline */
        .timeline { position: relative; padding-left: 1.75rem; margin-left: 0.5rem; }
        .timeline::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, var(--blue), #8b5cf6); border-radius: 3px; opacity: 0.25; }
        .tl-event { position: relative; margin-bottom: 2rem; }
        .tl-dot { position: absolute; left: -2.3rem; top: 0.4rem; width: 12px; height: 12px; border-radius: 50%; border: 3px solid; background: #fff; }
        .tl-dot.pink { border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-dim); }
        .tl-dot.gold { border-color: var(--yellow); box-shadow: 0 0 0 4px var(--yellow-dim); }
        .tl-dot.teal { border-color: var(--blue); box-shadow: 0 0 0 4px var(--blue-dim); }
        .tl-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem 1.5rem; box-shadow: var(--shadow); transition: var(--transition); }
        .tl-date { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.72rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.6rem; }
        .tl-date.pink { background: var(--pink-dim); color: var(--pink); }
        .tl-date.gold { background: var(--yellow-dim); color: var(--yellow); }
        .tl-date.teal { background: var(--blue-dim); color: var(--blue); }
        .tl-card:hover { border-color: var(--blue); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
        .tl-card h4 { font-size: 1rem; color: var(--text); margin-bottom: 0.3rem; font-weight: 700; }
        .tl-card p { font-size: 0.87rem; color: var(--muted); line-height: 1.6; margin: 0; }
        .tl-card.main-event { background: linear-gradient(to right, var(--blue-dim), #fff); border: 2px solid var(--blue); }
        .tl-card.main-event h4 { color: var(--blue); font-size: 1.1rem; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <a href="<?php echo URLROOT; ?>" class="brand">
        <div class="brand-logo">
            <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
        </div>
        <div class="brand-text">
            <strong>ONTA Reviewer</strong>
            <small>Comité Científico</small>
        </div>
    </a>

    <div class="admin-badge">
        <?php $displayName = $_SESSION['user_name'] ?? 'Revisor'; ?>
        <div class="admin-avatar"><?php echo strtoupper(substr($displayName, 0, 1)); ?></div>
        <div class="admin-badge-info">
            <h4><?php echo htmlspecialchars($displayName); ?></h4>
            <span><?php echo strtoupper($_SESSION['user_role']); ?></span>
        </div>
    </div>

    <nav>
        <div class="nav-label">Evaluación</div>
        <a href="#inicio" class="nav-link active"><i class="fa-solid fa-chart-line"></i> Inicio</a>
        <a href="#revision" class="nav-link"><i class="fa-solid fa-file-signature"></i> Revisión de Trabajos</a>
        <a href="#agenda" class="nav-link"><i class="fa-solid fa-calendar-days"></i> Agenda ONTA</a>
        <div class="nav-label">Ajustes</div>
        <a href="#perfil" class="nav-link"><i class="fa-solid fa-user-gear"></i> Mi Perfil</a>
    </nav>

        <div class="sidebar-footer" style="padding: 1.5rem 1rem; border-top: 1px solid rgba(0,0,0,0.05); margin-top: auto;">
            <!-- Payment Logos -->
            <div style="margin-bottom: 1.2rem; text-align: center;">
                <small style="color: rgba(0,0,0,0.3); font-size: 0.6rem; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 0.5rem;">MÉTODOS DE PAGO</small>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; justify-items: center;">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-visa.svg" height="18" alt="Visa">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-mastercard.svg" height="18" alt="Mastercard">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-de-venta-amex.svg" height="18" alt="Amex">
                    <img src="<?php echo URLROOT; ?>/img/bancos/pos-diners.svg" height="18" alt="Diners">
                </div>
            </div>

            <div class="sidebar-legal-links" style="font-size: 0.65rem; display: flex; flex-wrap: wrap; gap: 0.4rem; justify-content: center; width: 100%; margin-bottom: 1rem;">
                <a href="javascript:void(0)" onclick="openLegalModal('privacyModal')" style="color: rgba(0,0,0,0.5); text-decoration: none;">Privacidad</a>
                <span style="color: rgba(0,0,0,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('termsModal')" style="color: rgba(0,0,0,0.5); text-decoration: none;">Términos</a>
                <span style="color: rgba(0,0,0,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('refundModal')" style="color: rgba(0,0,0,0.5); text-decoration: none;">Reembolsos</a>
                <span style="color: rgba(0,0,0,0.1);">|</span>
                <a href="javascript:void(0)" onclick="openLegalModal('complaintModal')" style="color: rgba(0,0,0,0.5); text-decoration: none;">Libro de Reclamaciones</a>
            </div>

            <p style="color: rgba(0,0,0,0.3); font-size: 0.6rem; text-align: center; line-height: 1.4;">
                &copy; <?php echo date('Y'); ?> ONTA 2026<br>
                Todos los derechos reservados.
            </p>

            <div style="margin-top: 1rem; background: rgba(0,0,0,0.02); padding: 0.6rem; border-radius: 8px; border: 1px solid rgba(0,0,0,0.03);">
                <p style="margin: 0; font-size: 0.55rem; color: rgba(0,0,0,0.4); line-height: 1.3; text-align: center;">
                    Contamos con un <strong>Libro de Reclamaciones Virtual</strong>. Plazo de respuesta: 30 días calendario.
                </p>
            </div>
        </div>
    </aside>

<main class="main">
    <div class="content">
        
        <?php flash('reviewer_msg'); ?>

        <!-- INICIO -->
        <div id="inicio" class="admin-section active">
            <div class="sec-header">
                <h2>Panel de Revisión por Pares</h2>
                <div class="count-pill"><i class="fa-solid fa-flask"></i> COMITÉ CIENTÍFICO ONTA 2026</div>
            </div>

            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="wb-content">
                    <span class="wb-badge"><i class="fa-solid fa-shield-halved"></i> &nbsp;Peer Review System · Active</span>
                    <h2 class="wb-title">Bienvenido, <?php echo htmlspecialchars(explode(' ', $displayName)[0]); ?></h2>
                    <p class="wb-desc">Tiene <strong style="color:#60a5fa;"><?php echo $data['stats']['status']['pendiente']; ?> trabajos pendientes</strong> de evaluación. Su labor garantiza la excelencia académica del congreso ONTA 2026. Revise cada resumen con criterio de rigor científico internacional.</p>
                </div>
            </div>
            
            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--blue-dim); color: var(--blue);"><i class="fa-solid fa-folder-open"></i></div>
                    <div><div class="kpi-label">Total Recibidos</div><div class="kpi-value"><?php echo $data['stats']['total']; ?></div></div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--yellow-dim); color: var(--yellow);"><i class="fa-solid fa-hourglass-half"></i></div>
                    <div><div class="kpi-label">Por Revisar</div><div class="kpi-value"><?php echo $data['stats']['status']['pendiente']; ?></div></div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--green-dim); color: var(--green);"><i class="fa-solid fa-circle-check"></i></div>
                    <div><div class="kpi-label">Aprobados</div><div class="kpi-value"><?php echo $data['stats']['status']['aprobado']; ?></div></div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: #fee2e2; color: #ef4444;"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div><div class="kpi-label">Obs. / Rechazados</div><div class="kpi-value"><?php echo $data['stats']['status']['observado'] + $data['stats']['status']['rechazado']; ?></div></div>
                </div>
            </div>

            <div class="charts-grid">
                <div class="chart-card">
                    <h3><i class="fa-solid fa-chart-pie" style="margin-right: 8px;"></i> Distribución de Evaluaciones</h3>
                    <div class="chart-container"><canvas id="chartAbstracts"></canvas></div>
                </div>
                <div class="chart-card">
                    <h3><i class="fa-solid fa-chart-bar" style="margin-right: 8px;"></i> Resumen por Estado</h3>
                    <div class="chart-container"><canvas id="chartBar"></canvas></div>
                </div>
            </div>
        </div>

        <!-- REVISIÓN -->
        <div id="revision" class="admin-section">
            <div class="sec-header">
                <h2>Revisión de Trabajos Científicos</h2>
                <div class="count-pill"><i class="fa-solid fa-file-lines"></i> <?php echo $data['stats']['total']; ?> TRABAJOS REGISTRADOS</div>
            </div>

            <div class="table-card">
                <div class="table-toolbar">
                    <div class="table-search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="table-search" id="searchAbs" placeholder="Buscar por título, autor o código...">
                    </div>
                    <div class="filter-pills">
                        <button class="filter-pill active" data-filter="all">Todos</button>
                        <button class="filter-pill" data-filter="pendiente">Pendientes</button>
                        <button class="filter-pill" data-filter="aprobado">Aprobados</button>
                        <button class="filter-pill" data-filter="observado">Observados</button>
                        <button class="filter-pill" data-filter="rechazado">Rechazados</button>
                    </div>
                </div>

                <table class="admin-table" id="table-abs">
                    <thead>
                        <tr>
                            <th>Trabajo Científico</th>
                            <th>Autores / Contacto</th>
                            <th>Código</th>
                            <th>Línea</th>
                            <th>Estado</th>
                            <th style="text-align:center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['abstracts'] as $abs): ?>
                        <tr data-status="<?php echo strtolower($abs->estado); ?>">
                            <td style="max-width: 400px;">
                                <div class="td-title"><?php echo htmlspecialchars($abs->titulo); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-university"></i> <?php echo htmlspecialchars($abs->afiliacion); ?></div>
                            </td>
                            <td>
                                <div style="font-size: 0.85rem; font-weight: 600;"><?php echo htmlspecialchars($abs->autores); ?></div>
                                <div class="td-sub"><?php echo htmlspecialchars($abs->correo); ?></div>
                            </td>
                            <td><span class="td-mono"><?php echo $abs->codigo_seguimiento; ?></span></td>
                            <td>
                                <div style="font-size: 0.75rem; font-weight: 700; color: var(--blue); text-transform: uppercase;">
                                    <?php echo htmlspecialchars($abs->linea_investigacion); ?>
                                </div>
                            </td>
                            <td>
                                <?php 
                                    $st = strtolower($abs->estado);
                                    $pill = 'pill-pending'; $txt = 'PENDIENTE';
                                    if($st == 'aprobado') { $pill = 'pill-approved'; $txt = 'APROBADO'; }
                                    elseif($st == 'rechazado') { $pill = 'pill-rejected'; $txt = 'RECHAZADO'; }
                                    elseif($st == 'observado') { $pill = 'pill-observed'; $txt = 'OBSERVADO'; }
                                ?>
                                <span class="pill <?php echo $pill; ?>"><?php echo $txt; ?></span>
                            </td>
                            <td style="text-align:center;">
                                <div class="action-btns" style="justify-content:center;">
                                    <button onclick="viewAbstractDetails(<?php echo $abs->id; ?>)" class="act-btn" title="Evaluar Trabajo" style="border-color:var(--blue); color:var(--blue);">
                                        <i class="fa-solid fa-microscope"></i>
                                    </button>
                                    <a href="<?php echo URLROOT; ?>/public/uploads/abstracts/<?php echo $abs->archivo_pdf; ?>" target="_blank" class="act-btn" title="Abrir PDF" style="color:#ef4444;">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination" id="pag-abs"></div>
            </div>
        </div>

        <!-- AGENDA -->
        <div id="agenda" class="admin-section">
            <div class="sec-header">
                <div>
                    <h2><?php echo _t('dashboard.schedule.title'); ?></h2>
                    <p class="td-sub"><?php echo _t('dashboard.schedule.desc'); ?></p>
                </div>
            </div>
            <div class="table-card" style="padding: 3rem;">
                <div class="timeline">
                    <div class="tl-event">
                        <span class="tl-dot pink"></span>
                        <div class="tl-card">
                            <span class="tl-date pink"><?php echo _t('dashboard.schedule.event1_date'); ?></span>
                            <h4><?php echo _t('dashboard.schedule.event1_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event1_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot gold"></span>
                        <div class="tl-card">
                            <span class="tl-date gold"><?php echo _t('dashboard.schedule.event2_date'); ?></span>
                            <h4><?php echo _t('dashboard.schedule.event2_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event2_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot teal"></span>
                        <div class="tl-card main-event">
                            <span class="tl-date teal"><?php echo _t('dashboard.schedule.event3_date'); ?></span>
                            <h4><?php echo _t('dashboard.schedule.event3_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event3_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PERFIL -->
        <div id="perfil" class="admin-section">
            <div class="sec-header"><h2>Mi Perfil Editorial</h2></div>
            <div class="profile-grid">
                <div class="profile-avatar-card">
                    <div class="profile-avatar-large"><?php echo strtoupper(substr($displayName,0,1)); ?></div>
                    <h3 style="margin-bottom: 0.5rem;"><?php echo htmlspecialchars($displayName); ?></h3>
                    <p style="color: var(--muted); font-size: 0.85rem;"><?php echo $_SESSION['user_email']; ?></p>
                    <div class="pill pill-observed" style="margin-top: 1rem;">REVISOR PAR AUTORIZADO</div>
                    <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid var(--border);">
                    <div style="text-align: left;">
                        <div class="adm-field" style="margin-bottom: 1rem;">
                            <label>Rol Asignado</label>
                            <p style="font-weight: 700; font-size: 0.9rem;">Comité Científico</p>
                        </div>
                        <div class="adm-field">
                            <label>Estado</label>
                            <span class="pill pill-approved">ACTIVO</span>
                        </div>
                    </div>
                </div>
                <div class="profile-form-card">
                    <h3 style="font-family: 'Source Serif 4', serif; margin-bottom: 0.5rem;">Configuración de Seguridad</h3>
                    <p style="color: var(--muted); font-size: 0.85rem; margin-bottom: 2rem;">Actualice su contraseña de acceso al sistema de revisión por pares.</p>
                    <form action="<?php echo URLROOT; ?>/users/updateProfile" method="POST">
                        <?php echo csrf_field(); ?>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <div class="adm-field">
                                <label><i class="fa-solid fa-user"></i> Nombre Completo</label>
                                <input type="text" name="name" value="<?php echo htmlspecialchars($displayName); ?>" class="adm-input" readonly style="background:#f1f5f9; cursor:not-allowed;">
                            </div>
                            <div class="adm-field">
                                <label><i class="fa-solid fa-envelope"></i> Email Institucional</label>
                                <input type="email" value="<?php echo $_SESSION['user_email']; ?>" class="adm-input" readonly style="background:#f1f5f9; cursor:not-allowed;">
                            </div>
                            <div class="adm-field" style="grid-column: span 2;">
                                <label><i class="fa-solid fa-lock"></i> Cambiar Contraseña</label>
                                <input type="password" name="password" class="adm-input" placeholder="Escriba nueva clave si desea cambiarla">
                                <small style="color: var(--muted); margin-top: 5px; display: block;">Le recomendamos cambiar su clave periódicamente por seguridad.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn-solid" style="margin-top: 2rem; width: 100%; justify-content: center;"><i class="fa-solid fa-floppy-disk"></i> ACTUALIZAR SEGURIDAD</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- MODAL: DETALLES TRABAJO -->
<div id="modalAbs" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3><i class="fa-solid fa-microscope" style="color: var(--blue); margin-right: 8px;"></i> Evaluación de Trabajo Científico</h3>
            <button class="modal-close" onclick="closeModal('modalAbs')">&times;</button>
        </div>
        <div class="modal-content">
            <div id="abs-details-view">
                <!-- Se carga vía JS -->
            </div>
            
            <hr style="margin: 2rem 0; border: none; border-top: 1px solid var(--border);">
            
            <h4 style="margin-bottom: 1.5rem; color: var(--text);">Acción de Revisión</h4>
            <form action="<?php echo URLROOT; ?>/reviewers/handleAction" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" id="form_abs_id">
                <input type="hidden" name="status" id="form_abs_status">
                <input type="hidden" name="title_notif" id="form_abs_title">

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="display:block; font-size: 0.75rem; font-weight: 800; color: var(--muted); margin-bottom: 8px;">OBSERVACIONES / COMENTARIOS AL AUTOR</label>
                    <textarea name="comment" id="form_abs_comment" style="width:100%; height: 120px; padding: 1rem; border-radius: 12px; border: 1px solid var(--border); font-family: inherit; font-size: 0.9rem;" placeholder="Escriba aquí los comentarios que el autor recibirá..."></textarea>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button type="button" onclick="submitReview('aprobado', '¡Trabajo Aprobado!')" class="btn-solid" style="background: var(--green); flex: 1; justify-content: center;">
                        <i class="fa-solid fa-check-circle"></i> APROBAR
                    </button>
                    <button type="button" onclick="submitReview('observado', 'Trabajo Observado')" class="btn-solid" style="background: var(--blue); flex: 1; justify-content: center;">
                        <i class="fa-solid fa-pen-to-square"></i> OBSERVAR
                    </button>
                    <button type="button" onclick="submitReview('rechazado', 'Trabajo Rechazado')" class="btn-solid" style="background: #ef4444; flex: 1; justify-content: center;">
                        <i class="fa-solid fa-ban"></i> RECHAZAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if(this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                
                document.querySelectorAll('.admin-section').forEach(s => s.classList.remove('active'));
                document.getElementById(targetId).classList.add('active');
                
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                window.location.hash = targetId;
            }
        });
    });

    if(window.location.hash) {
        const link = document.querySelector(`.nav-link[href="${window.location.hash}"]`);
        if(link) link.click();
    }

    // Modal
    function closeModal(id) { document.getElementById(id).classList.remove('active'); }

    async function viewAbstractDetails(id) {
        const res = await fetch('<?php echo URLROOT; ?>/reviewers/getAbstractJson/' + id);
        const abs = await res.json();
        
        document.getElementById('form_abs_id').value = abs.id;
        
        const html = `
            <div style="margin-bottom: 1.5rem;">
                <label style="font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase;">Título</label>
                <p style="font-weight: 700; color: var(--text); font-size: 1.1rem; line-height: 1.4;">${abs.titulo}</p>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label style="font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase;">Autores</label>
                    <p style="font-weight: 600; font-size: 0.9rem;">${abs.autores}</p>
                </div>
                <div style="grid-column: span 1;">
                    <label style="font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase;">Tracking</label>
                    <p class="td-mono">${abs.codigo_seguimiento}</p>
                </div>
                <div style="grid-column: span 2;">
                    <label style="font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase;">Línea de Investigación</label>
                    <p style="font-weight: 700; color: var(--blue); font-size: 0.85rem;">${abs.linea_investigacion}</p>
                </div>
                <div style="grid-column: span 2;">
                    <label style="font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase;">Palabras Clave</label>
                    <p style="font-size: 0.85rem; color: var(--muted); font-style: italic;">${abs.keywords}</p>
                </div>
            </div>
            <div style="margin-top: 1.5rem;">
                <a href="<?php echo URLROOT; ?>/public/uploads/abstracts/${abs.archivo_pdf}" target="_blank" class="btn-solid" style="background: #f1f5f9; color: var(--text); border: 1px solid var(--border); width: 100%; justify-content: center;">
                    <i class="fa-solid fa-file-pdf" style="color: #ef4444;"></i> ABRIR TRABAJO EN PDF
                </a>
            </div>
        `;
        
        document.getElementById('abs-details-view').innerHTML = html;
        document.getElementById('modalAbs').classList.add('active');
    }

    function submitReview(status, title) {
        const comment = document.getElementById('form_abs_comment').value.trim();
        if(!comment && status != 'aprobado') {
            alert('Por favor, escriba un comentario para el autor explicando la observación o el rechazo.');
            return;
        }
        
        document.getElementById('form_abs_status').value = status;
        document.getElementById('form_abs_title').value = title;
        
        if(confirm('¿Está seguro de enviar esta evaluación? El autor será notificado de inmediato.')) {
            document.querySelector('#modalAbs form').submit();
        }
    }

    // Chart 1 — Doughnut
    new Chart(document.getElementById('chartAbstracts').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Aprobados', 'Pendientes', 'Rechazados', 'Observados'],
            datasets: [{
                data: [
                    <?php echo $data['stats']['status']['aprobado']; ?>,
                    <?php echo $data['stats']['status']['pendiente']; ?>,
                    <?php echo $data['stats']['status']['rechazado']; ?>,
                    <?php echo $data['stats']['status']['observado']; ?>
                ],
                backgroundColor: ['#10b981', '#f59e0b', '#ef4444', '#2563eb'],
                borderWidth: 0, spacing: 5, borderRadius: 6
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '72%',
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, pointStyleWidth: 10, padding: 20, font: { family: 'Inter', weight: '700', size: 11 } } } }
        }
    });

    // Chart 2 — Horizontal Bar
    new Chart(document.getElementById('chartBar').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Aprobados', 'Pendientes', 'Observados', 'Rechazados'],
            datasets: [{
                data: [
                    <?php echo $data['stats']['status']['aprobado']; ?>,
                    <?php echo $data['stats']['status']['pendiente']; ?>,
                    <?php echo $data['stats']['status']['observado']; ?>,
                    <?php echo $data['stats']['status']['rechazado']; ?>
                ],
                backgroundColor: ['rgba(16,185,129,0.15)', 'rgba(245,158,11,0.15)', 'rgba(37,99,235,0.15)', 'rgba(239,68,68,0.15)'],
                borderColor: ['#10b981', '#f59e0b', '#2563eb', '#ef4444'],
                borderWidth: 2, borderRadius: 8, barThickness: 32
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, indexAxis: 'y',
            scales: { x: { grid: { display: false }, ticks: { font: { family: 'Inter', weight: '700' } } }, y: { grid: { display: false }, ticks: { font: { family: 'Inter', weight: '700', size: 12 } } } },
            plugins: { legend: { display: false } }
        }
    });

    // Filter Pills
    let activeFilter = 'all';
    document.querySelectorAll('.filter-pill').forEach(pill => {
        pill.addEventListener('click', function() {
            document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            activeFilter = this.dataset.filter;
            applyFilters();
        });
    });

    // Table with Pagination, Search & Filters
    const absTable = document.getElementById('table-abs');
    const absRows = Array.from(absTable.querySelectorAll('tbody tr'));
    const absPagination = document.getElementById('pag-abs');
    const PER_PAGE = 10;
    let absPage = 1;

    function applyFilters() {
        const term = (document.getElementById('searchAbs').value || '').toLowerCase();
        absPage = 1;
        renderAbsTable(term);
    }

    function renderAbsTable(searchTerm) {
        let visible = absRows.filter(r => {
            const text = r.textContent.toLowerCase();
            const matchSearch = !searchTerm || text.includes(searchTerm);
            const matchFilter = activeFilter === 'all' || r.dataset.status === activeFilter;
            return matchSearch && matchFilter;
        });

        const totalPages = Math.ceil(visible.length / PER_PAGE) || 1;
        if (absPage > totalPages) absPage = totalPages;
        const start = (absPage - 1) * PER_PAGE;

        absRows.forEach(r => r.style.display = 'none');
        visible.slice(start, start + PER_PAGE).forEach(r => r.style.display = '');

        // Pagination
        absPagination.innerHTML = '';
        if (totalPages <= 1) return;
        const prev = document.createElement('button');
        prev.className = 'pg-btn'; prev.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        prev.disabled = absPage === 1;
        prev.onclick = () => { absPage--; renderAbsTable(searchTerm); };
        absPagination.appendChild(prev);

        const info = document.createElement('span');
        info.className = 'pg-info'; info.textContent = `Pág. ${absPage} de ${totalPages}`;
        absPagination.appendChild(info);

        const next = document.createElement('button');
        next.className = 'pg-btn'; next.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        next.disabled = absPage === totalPages;
        next.onclick = () => { absPage++; renderAbsTable(searchTerm); };
        absPagination.appendChild(next);
    }

    document.getElementById('searchAbs').addEventListener('input', (e) => { applyFilters(); });
    renderAbsTable('');
    <!-- ────────────── LEGAL MODALS ────────────── -->
    
    <!-- Modal: Política de Privacidad -->
    <div id="privacyModal" class="legal-modal">
        <div class="legal-modal-content">
            <span class="legal-modal-close" onclick="closeLegalModal('privacyModal')">&times;</span>
            <div class="legal-text">
                <h2><?php echo _t('footer.privacy_policy'); ?></h2>
                <p><strong>Última actualización: Mayo 2026</strong></p>
                <p>En ONTA 2026, nos comprometemos a proteger su privacidad. Esta Política de Privacidad describe cómo recopilamos, usamos y protegemos su información personal al utilizar nuestro sitio web y al inscribirse en la 56ª Reunión Anual.</p>
                <h3>1. Información que recopilamos</h3>
                <p>Recopilamos información personal que usted nos proporciona directamente al registrarse, como su nombre, dirección de correo electrónico, afiliación institucional y datos de contacto.</p>
                <h3>2. Uso de la información</h3>
                <p>Utilizamos su información para gestionar su inscripción, procesar pagos a través de nuestras pasarelas oficiales (Culqi), enviarle actualizaciones sobre el evento y cumplir con requisitos administrativos.</p>
                <h3>3. Protección de datos</h3>
                <p>Implementamos medidas de seguridad técnicas y organizativas para proteger sus datos personales contra acceso no autorizado, alteración o destrucción.</p>
                <h3>4. Compartir información</h3>
                <p>No vendemos ni alquilamos su información personal a terceros. Sus datos de pago son procesados de forma segura por Culqi y no son almacenados en nuestros servidores.</p>
            </div>
        </div>
    </div>

    <!-- Modal: Términos y Condiciones -->
    <div id="termsModal" class="legal-modal">
        <div class="legal-modal-content">
            <span class="legal-modal-close" onclick="closeLegalModal('termsModal')">&times;</span>
            <div class="legal-text">
                <h2>Términos y Condiciones</h2>
                <p><strong>Última actualización: 15 de Mayo, 2026</strong></p>
                <p>El presente documento regula el uso de la plataforma de la 56ª Reunión Anual ONTA 2026. Al utilizar este sitio, usted acepta los términos y condiciones de <strong><?php echo COMPANY_NAME; ?></strong>.</p>
                
                <h3>1. Información del Comercio</h3>
                <p>Razón Social: <?php echo COMPANY_NAME; ?> | RUC: <?php echo COMPANY_RUC; ?> | Dirección: <?php echo COMPANY_ADDRESS; ?>.</p>

                <h3>2. Registro y Compras</h3>
                <p>Para realizar inscripciones, el usuario debe ser mayor de edad y proporcionar datos verídicos. La entrega del servicio es digital mediante confirmación por correo y acceso al portal.</p>

                <h3>3. Precios y Pagos</h3>
                <p>Los precios están expresados exclusivamente en <strong>Dólares Americanos (USD)</strong>. Aceptamos tarjetas de crédito/débito vía Culqi y transferencias bancarias. Los pagos son procesados de forma segura.</p>

                <h3>4. Protección de Datos</h3>
                <p>Cumplimos con la Ley N° 29733. Sus datos se usan para la gestión del evento y no se comparten con terceros para fines comerciales.</p>

                <h3>5. Legislación Aplicable</h3>
                <p>Este documento se rige por la ley peruana. Cualquier controversia será resuelta en la jurisdicción de Puno, Perú.</p>
            </div>
        </div>
    </div>

    <!-- Modal: Política de Reembolso -->
    <div id="refundModal" class="legal-modal">
        <div class="legal-modal-content">
            <span class="legal-modal-close" onclick="closeLegalModal('refundModal')">&times;</span>
            <div class="legal-text">
                <h2><?php echo _t('footer.refund_policy'); ?></h2>
                <p><strong>Última actualización: 15 de Mayo, 2026</strong></p>
                <h3>1. Condiciones de Cancelación</h3>
                <p>Solicitudes de cancelación vía correo a <strong><?php echo COMPANY_EMAIL; ?></strong>:</p>
                <ul>
                    <li>Hasta el 30 de Septiembre: Reembolso del 80%.</li>
                    <li>Hasta el 15 de Septiembre: Reembolso del 50%.</li>
                    <li>Desde el 16 de Septiembre: Sin reembolso.</li>
                </ul>
                <h3>2. Tiempos de Reembolso</h3>
                <p>Los extornos a tarjeta vía Culqi se procesan en 5-7 días internos, pero pueden tardar entre <strong>15 a 30 días hábiles</strong> en verse reflejados en su banco.</p>
                <h3>3. Cambios</h3>
                <p>Se permiten transferencias de inscripción a otros colegas hasta el 15 de Septiembre de 2026 sin costo.</p>
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
                            <input type="text" id="comp_dni" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
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
                            <input type="number" step="0.01" id="comp_amount" value="0.00" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
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
</body>
</html>
