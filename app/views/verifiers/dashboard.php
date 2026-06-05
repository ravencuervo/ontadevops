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
            --blue: #0ea5e9;
            --blue-dim: rgba(14, 165, 233, 0.1);
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

        /* ────────────── SIDEBAR (Admin Style) ────────────── */
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
            background: linear-gradient(135deg, var(--pink), #8b5cf6);
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
            background: var(--pink); color: #fff;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.2rem;
        }
        .admin-badge-info h4 { font-size: 0.85rem; font-weight: 700; margin-bottom: 2px; color: var(--text); }
        .admin-badge-info span { font-size: 0.65rem; color: var(--pink); font-weight: 800; text-transform: uppercase; }

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
        .nav-link i { font-size: 1.1rem; width: 24px; text-align: center; transition: var(--transition); }
        .nav-link:hover { background: #f1f5f9; color: var(--text); }
        .nav-link.active { background: var(--pink-dim); color: var(--pink); }
        .nav-link.active i { color: var(--pink); }

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

        /* ────────────── MAIN CONTENT ────────────── */
        .main { flex: 1; margin-left: 280px; min-height: 100vh; display: flex; flex-direction: column; }
        .content { padding: 2.5rem; max-width: 1400px; margin: 0 auto; width: 100%; }

        .admin-section { display: none; animation: fadeIn 0.4s ease-out; }
        .admin-section.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .sec-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; }
        .sec-header h2 { font-family: 'Source Serif 4', serif; font-size: 2rem; font-weight: 700; color: var(--text); }
        .count-pill { padding: 0.5rem 1rem; background: var(--blue-dim); color: var(--blue); border-radius: 100px; font-weight: 800; font-size: 0.75rem; display: flex; align-items: center; gap: 0.5rem; }

        /* KPI Grid */
        .kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem; }
        .kpi-card {
            background: var(--surface); border: 1px solid var(--border);
            padding: 1.5rem; border-radius: var(--radius);
            display: flex; align-items: center; gap: 1.25rem;
            box-shadow: var(--shadow); transition: var(--transition);
        }
        .kpi-card:hover { transform: translateY(-4px); border-color: var(--border-hover); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
        .kpi-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        .kpi-label { font-size: 0.75rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .kpi-value { font-size: 1.75rem; font-weight: 800; color: var(--text); }

        /* Table Styles (Admin Style - Light) */
        .table-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); overflow: hidden; }
        .table-toolbar { padding: 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; background: #fff; }
        .table-search-box { position: relative; width: 320px; }
        .table-search-box i { position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: var(--muted); }
        .table-search { width: 100%; padding: 0.85rem 1.25rem 0.85rem 3rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; color: var(--text); font-family: inherit; transition: var(--transition); }
        .table-search:focus { border-color: var(--pink); outline: none; box-shadow: 0 0 0 3px var(--pink-dim); }

        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th { background: #f8fafc; padding: 1.25rem 1.5rem; text-align: left; font-size: 0.7rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid var(--border); }
        .admin-table td { padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); vertical-align: middle; }
        .admin-table tr:last-child td { border-bottom: none; }
        .admin-table tr:hover { background: #f8fafc; }

        .td-name { font-weight: 700; font-size: 0.95rem; color: var(--text); margin-bottom: 4px; }
        .td-sub { font-size: 0.8rem; color: var(--muted); display: flex; align-items: center; gap: 0.5rem; }
        .td-mono { font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; color: var(--pink); font-weight: 700; background: var(--pink-dim); padding: 2px 6px; border-radius: 4px; }

        /* Pilling/Badges */
        .pill { padding: 4px 10px; border-radius: 6px; font-size: 0.65rem; font-weight: 800; text-transform: uppercase; display: inline-block; }
        .pill-blue { background: var(--blue-dim); color: var(--blue); }
        .pill-green { background: var(--green-dim); color: var(--green); }
        .pill-yellow { background: var(--yellow-dim); color: var(--yellow); }
        .pill-red { background: #fee2e2; color: #ef4444; }

        .action-btns { display: flex; gap: 0.5rem; }
        .act-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); }
        .act-btn:hover { border-color: var(--pink); color: var(--pink); background: var(--pink-dim); transform: translateY(-2px); }
        .act-btn.approve:hover { border-color: var(--green); color: var(--green); background: var(--green-dim); }
        .act-btn.reject:hover { border-color: #ef4444; color: #ef4444; background: #fee2e2; }

        /* Charts */
        .charts-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        .chart-card { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 1.5rem; box-shadow: var(--shadow); }
        .chart-card h3 { font-size: 0.85rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.5rem; }
        .chart-container { position: relative; height: 300px; width: 100%; }

        /* Modals */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(4px); z-index: 1000; display: none; align-items: center; justify-content: center; padding: 2rem; }
        .modal-overlay.active { display: flex; animation: modalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        @keyframes modalIn { from { opacity: 0; transform: scale(0.95) translateY(20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        .modal-box { background: #fff; border-radius: 24px; width: 100%; max-width: 650px; max-height: 90vh; overflow-y: auto; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); border: 1px solid var(--border); }
        .modal-header { padding: 1.5rem 2rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .modal-header h3 { font-family: 'Source Serif 4', serif; font-size: 1.25rem; font-weight: 700; color: var(--text); }
        .modal-close { background: #f1f5f9; border: none; width: 32px; height: 32px; border-radius: 50%; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--muted); transition: var(--transition); }
        .modal-close:hover { background: #fee2e2; color: #ef4444; transform: rotate(90deg); }
        .modal-content { padding: 2rem; }

        .btn-solid { background: var(--pink); color: #fff; border: none; padding: 0.85rem 1.5rem; border-radius: 12px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 0.75rem; transition: var(--transition); }
        .btn-solid:hover { background: #db2777; transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(236,72,153,0.3); }

        .pagination { padding: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; align-items: center; gap: 0.5rem; }
        .pg-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: #fff; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .pg-btn:hover:not(:disabled) { border-color: var(--pink); color: var(--pink); background: var(--pink-dim); }
        .pg-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .pg-info { font-size: 0.85rem; color: var(--muted); font-weight: 600; margin: 0 1rem; }

        /* Profile Styles */
        .profile-grid { display: grid; grid-template-columns: 300px 1fr; gap: 2rem; }
        .profile-avatar-card { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; text-align: center; box-shadow: var(--shadow); }
        .profile-avatar-large { width: 120px; height: 120px; background: var(--pink-dim); color: var(--pink); border-radius: 30px; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; font-weight: 800; margin: 0 auto 1.5rem; border: 4px solid #fff; box-shadow: 0 0 0 4px var(--pink-dim); }
        .adm-input { width: 100%; padding: 0.85rem 1.1rem; background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; color: var(--text); font-family: inherit; font-size: 0.95rem; transition: var(--transition); }
        .adm-input:focus { border-color: var(--pink); outline: none; box-shadow: 0 0 0 3px var(--pink-dim); }
        .adm-field label { display: block; font-size: 0.75rem; font-weight: 800; color: var(--muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }

        /* Details Modal Sections */
        .sec-title { font-size: 0.75rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 1px; margin: 2rem 0 1rem; display: flex; align-items: center; gap: 1rem; }
        .sec-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .details-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .detail-item label { display: block; font-size: 0.65rem; font-weight: 800; color: var(--muted); text-transform: uppercase; margin-bottom: 4px; }
        .detail-item p { font-size: 0.95rem; font-weight: 600; color: var(--text); }

        /* Timeline Styles (Adapted from User Dashboard) */
        .timeline { position: relative; padding-left: 1.75rem; margin-left: 0.5rem; }
        .timeline::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, var(--pink), var(--blue)); border-radius: 3px; opacity: 0.25; }
        .tl-event { position: relative; margin-bottom: 2rem; }
        .tl-dot { position: absolute; left: -2.3rem; top: 0.4rem; width: 12px; height: 12px; border-radius: 50%; border: 3px solid; background: #fff; }
        .tl-dot.pink { border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-dim); }
        .tl-dot.gold { border-color: var(--yellow); box-shadow: 0 0 0 4px var(--yellow-dim); }
        .tl-dot.teal { border-color: var(--blue); box-shadow: 0 0 0 4px var(--blue-dim); }
        .tl-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem 1.5rem; box-shadow: var(--shadow); transition: var(--transition); }
        .tl-card:hover { border-color: var(--pink); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
        .tl-date { display: inline-block; padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.72rem; font-weight: 800; text-transform: uppercase; margin-bottom: 0.6rem; }
        .tl-date.pink { background: var(--pink-dim); color: var(--pink); }
        .tl-date.gold { background: var(--yellow-dim); color: var(--yellow); }
        .tl-date.teal { background: var(--blue-dim); color: var(--blue); }
        .tl-card h4 { font-size: 1rem; color: var(--text); margin-bottom: 0.3rem; font-weight: 700; }
        .tl-card p { font-size: 0.87rem; color: var(--muted); line-height: 1.6; margin: 0; }
        .tl-card.main-event { background: linear-gradient(to right, var(--blue-dim), #fff); border: 2px solid var(--blue); }
        .tl-card.main-event h4 { color: var(--blue); font-size: 1.1rem; }
    </style>
</head>
<body>

<!-- ────────────── SIDEBAR ────────────── -->
<aside class="sidebar">
    <a href="<?php echo URLROOT; ?>" class="brand">
        <div class="brand-logo">
            <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
        </div>
        <div class="brand-text">
            <strong>ONTA Verifier</strong>
            <small>Validación de Pagos</small>
        </div>
    </a>

    <div class="admin-badge">
        <?php $displayName = $_SESSION['user_name'] ?? 'Verificador'; ?>
        <div class="admin-avatar"><?php echo strtoupper(substr($displayName, 0, 1)); ?></div>
        <div class="admin-badge-info">
            <h4><?php echo htmlspecialchars($displayName); ?></h4>
            <span><?php echo strtoupper($_SESSION['user_role'] ?? 'verifier'); ?></span>
        </div>
    </div>

    <nav>
        <div class="nav-label">Módulos</div>
        <a href="#inicio" class="nav-link active"><i class="fa-solid fa-house-chimney"></i> Inicio</a>
        <a href="#pagos" class="nav-link"><i class="fa-solid fa-receipt"></i> Control de Pagos</a>
        <a href="#agenda" class="nav-link"><i class="fa-solid fa-calendar-days"></i> Agenda ONTA</a>
        <div class="nav-label">Personal</div>
        <a href="#perfil" class="nav-link"><i class="fa-solid fa-id-card-clip"></i> Mi Perfil</a>
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

<!-- ────────────── MAIN ────────────── -->
<div class="main">
    <div class="content">
        <?php flash('verifier_msg'); ?>

        <!-- ═══ INICIO / DASHBOARD ═══ -->
        <div id="inicio" class="admin-section active">
            <div class="sec-header">
                <h2>Resumen de Operaciones</h2>
                <div class="count-pill"><i class="fa-solid fa-clock"></i> Actualizado hace un momento</div>
            </div>

            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--blue-dim); color: var(--blue);">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Total Participantes</div>
                        <div class="kpi-value"><?php echo $data['users_count']; ?></div>
                    </div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--yellow-dim); color: var(--yellow);">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Pagos Pendientes</div>
                        <div class="kpi-value"><?php echo $data['stats']['payments_by_status']['pendiente']; ?></div>
                    </div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--green-dim); color: var(--green);">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Pagos Validados</div>
                        <div class="kpi-value"><?php echo $data['stats']['payments_by_status']['aprobado']; ?></div>
                    </div>
                </div>
            </div>

            <div class="charts-grid">
                <div class="chart-card">
                    <h3>Estado de Validaciones Financieras</h3>
                    <div class="chart-container">
                        <canvas id="chartPayments"></canvas>
                    </div>
                </div>
                <div class="chart-card" style="display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center;">
                    <i class="fa-solid fa-shield-halved" style="font-size: 4rem; color: var(--blue-dim); margin-bottom: 1.5rem;"></i>
                    <h3 style="margin-bottom: 0.5rem;">Modo de Verificación Activo</h3>
                    <p style="color: var(--muted); font-size: 0.9rem; max-width: 300px;">Usted tiene permisos para validar comprobantes y notificar observaciones a los participantes.</p>
                </div>
            </div>
        </div>

        <!-- ═══ PAGOS ═══ -->
        <div id="pagos" class="admin-section">
            <div class="sec-header">
                <h2>Control de Pagos y Vouchers</h2>
                <a href="<?php echo URLROOT; ?>/verifiers/exportExcel" class="btn-solid" style="background: var(--green);"><i class="fa-solid fa-file-excel"></i> Exportar a Excel</a>
            </div>

            <div class="table-card">
                <div class="table-toolbar">
                    <div class="table-search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="table-search" id="searchPagos" placeholder="Buscar por DNI, Nombre o Operación...">
                    </div>
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--muted);">
                        VOUCHERS REGISTRADOS: <?php echo count($data['inscriptions']); ?>
                    </div>
                </div>

                <table class="admin-table" id="table-pagos">
                    <thead>
                        <tr>
                            <th>Fecha Registro</th>
                            <th>Investigador</th>
                            <th>Detalles Económicos</th>
                            <th>Voucher</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['inscriptions'] as $ins): ?>
                        <tr>
                            <td>
                                <div style="font-weight:700; font-size:0.85rem;"><?php echo date('d M Y', strtotime($ins->created_at)); ?></div>
                                <div class="td-sub"><?php echo date('H:i', strtotime($ins->created_at)); ?></div>
                            </td>
                            <td>
                                <div class="td-name"><?php echo htmlspecialchars($ins->full_name); ?></div>
                                <div class="td-sub"><span class="td-mono">DNI: <?php echo htmlspecialchars($ins->dni ?? 'N/A'); ?></span></div>
                                <div class="td-sub"><i class="fa-solid fa-building-columns"></i> <?php echo htmlspecialchars($ins->institution ?? 'Particular'); ?></div>
                            </td>
                            <td>
                                <div class="td-sub"><strong>Método:</strong> <span style="color: var(--pink); font-weight: 800;"><?php echo strtoupper($ins->payment_method); ?></span></div>
                                <div class="td-sub"><strong>Monto:</strong> $<?php echo number_format($ins->amount, 2); ?></div>
                                <div class="td-sub"><strong>Op:</strong> <?php echo $ins->operation_number ?? $ins->transaction_id; ?></div>
                            </td>
                            <td>
                                <?php if($ins->payment_receipt): ?>
                                <button onclick="showVoucher('<?php echo URLROOT; ?>/public/uploads/vouchers/<?php echo $ins->payment_receipt; ?>')" class="act-btn" title="Expandir Comprobante">
                                    <i class="fa-solid fa-image"></i>
                                </button>
                                <?php else: ?>
                                <span class="pill pill-red">Sin Archivo</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php 
                                    $st = strtolower($ins->payment_status);
                                    $pill = 'pill-yellow'; $txt = 'PENDIENTE';
                                    if(in_array($st, ['aprobado','verified','success'])) { $pill = 'pill-green'; $txt = 'VALIDADO'; }
                                    elseif($st == 'observado') { $pill = 'pill-blue'; $txt = 'OBSERVADO'; }
                                    elseif($st == 'rechazado') { $pill = 'pill-red'; $txt = 'RECHAZADO'; }
                                ?>
                                <span class="pill <?php echo $pill; ?>"><?php echo $txt; ?></span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button onclick="viewUserDetails(<?php echo $ins->user_id; ?>)" class="act-btn" title="Historial de Notificaciones" style="color: var(--blue);">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </button>
                                    <a href="<?php echo URLROOT; ?>/verifiers/approve/<?php echo $ins->id; ?>" class="act-btn approve" onclick="return confirm('¿Aprobar pago?')" title="Validar">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                    <button onclick="openActionModal(<?php echo $ins->id; ?>, 'rechazado')" class="act-btn reject" title="Rechazar/Observar">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination" id="pag-pagos"></div>
            </div>
        </div>

        <!-- ═══ AGENDA ═══ -->
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
                            <h4><i class="fa-solid fa-file-pen" style="color:var(--pink); margin-right: 8px;"></i>
                                <?php echo _t('dashboard.schedule.event1_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event1_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot gold"></span>
                        <div class="tl-card">
                            <span class="tl-date gold"><?php echo _t('dashboard.schedule.event2_date'); ?></span>
                            <h4><i class="fa-solid fa-envelope-open-text" style="color:var(--yellow); margin-right: 8px;"></i>
                                <?php echo _t('dashboard.schedule.event2_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event2_desc'); ?></p>
                        </div>
                    </div>
                    <div class="tl-event">
                        <span class="tl-dot teal"></span>
                        <div class="tl-card main-event">
                            <span class="tl-date teal"><?php echo _t('dashboard.schedule.event3_date'); ?></span>
                            <h4><i class="fa-solid fa-flag-checkered" style="margin-right: 8px;"></i>
                                <?php echo _t('dashboard.schedule.event3_title'); ?></h4>
                            <p><?php echo _t('dashboard.schedule.event3_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ PERFIL ═══ -->
        <div id="perfil" class="admin-section">
            <div class="sec-header">
                <h2>Configuración de Perfil</h2>
            </div>
            <div class="profile-grid">
                <div class="profile-avatar-card">
                    <div class="profile-avatar-large"><?php echo strtoupper(substr($displayName, 0, 1)); ?></div>
                    <h3 style="margin-bottom: 0.5rem;"><?php echo htmlspecialchars($displayName); ?></h3>
                    <p style="color: var(--muted); font-size: 0.85rem;"><?php echo $_SESSION['user_email']; ?></p>
                    <div class="pill pill-blue" style="margin-top: 1rem;">VERIFICADOR AUTORIZADO</div>
                </div>
                <div style="background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; box-shadow: var(--shadow);">
                    <form action="<?php echo URLROOT; ?>/users/updateProfile" method="POST" class="adm-form">
                        <?php echo csrf_field(); ?>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <div class="adm-field">
                                <label>Nombre de Usuario</label>
                                <input type="text" name="name" value="<?php echo htmlspecialchars($displayName); ?>" class="adm-input" readonly style="background:#f1f5f9; cursor:not-allowed;">
                            </div>
                            <div class="adm-field">
                                <label>Email Institucional</label>
                                <input type="email" value="<?php echo $_SESSION['user_email']; ?>" class="adm-input" readonly style="background:#f1f5f9; cursor:not-allowed;">
                            </div>
                            <div class="adm-field" style="grid-column: span 2;">
                                <label>Cambiar Contraseña (Seguridad)</label>
                                <input type="password" name="password" class="adm-input" placeholder="Escriba nueva clave si desea cambiarla">
                                <small style="color: var(--muted); margin-top: 5px; display: block;">Le recomendamos cambiar su clave periódicamente.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn-solid" style="margin-top: 2rem; width: 100%; justify-content: center;">ACTUALIZAR SEGURIDAD</button>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- /content -->
</div><!-- /main -->

<!-- ────────────── MODALS ────────────── -->

<!-- Modal: Visor de Voucher -->
<div id="modalVoucher" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3><i class="fa-solid fa-receipt"></i> Comprobante de Pago</h3>
            <button class="modal-close" onclick="closeModal('modalVoucher')">&times;</button>
        </div>
        <div class="modal-content" style="text-align: center;">
            <img id="voucherImg_v" src="" alt="Voucher" style="max-width: 100%; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div style="margin-top: 2rem;">
                <a id="downloadVoucher" href="#" download class="btn-solid" style="display: inline-flex; background: var(--blue);">
                    <i class="fa-solid fa-download"></i> DESCARGAR ORIGINAL
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Acción de Pago -->
<div id="modalPaymentAction" class="modal-overlay">
    <div class="modal-box" style="max-width: 500px;">
        <div class="modal-header">
            <h3><i class="fa-solid fa-circle-exclamation" style="color: #ef4444;"></i> Rechazar Pago</h3>
            <button class="modal-close" onclick="closeModal('modalPaymentAction')">&times;</button>
        </div>
        <div class="modal-content">
            <p style="color: var(--muted); margin-bottom: 1.5rem; font-size: 0.9rem;">Se notificará al investigador sobre los errores en su comprobante para que pueda subsanarlos.</p>
            <form action="<?php echo URLROOT; ?>/verifiers/handleAction" method="POST">
                <input type="hidden" name="id" id="action_id">
                <input type="hidden" name="status" value="rechazado">
                <div class="adm-field">
                    <label>Motivo del Rechazo / Observación</label>
                    <textarea name="message" class="adm-input" rows="5" placeholder="Ej: Imagen borrosa, monto insuficiente, etc." required style="resize: none;"></textarea>
                </div>
                <button type="submit" class="btn-solid" style="width: 100%; justify-content: center; margin-top: 1.5rem;">NOTIFICAR AL INVESTIGADOR</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Detalle de Usuario (Historial) -->
<div id="modalView" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Historial del Participante</h3>
            <button class="modal-close" onclick="closeModal('modalView')">&times;</button>
        </div>
        <div class="modal-content" id="detailsContent">
            <!-- Populated by JS -->
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ═══ NAVIGATION ═══
    const links    = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.admin-section');

    links.forEach(link => {
        link.addEventListener('click', e => {
            const href = link.getAttribute('href');
            if (!href || !href.startsWith('#')) return;
            e.preventDefault();

            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            sections.forEach(s => s.classList.remove('active'));
            const target = document.getElementById(href.substring(1));
            if (target) target.classList.add('active');
        });
    });

    // ═══ CHART ═══
    const stats = <?php echo json_encode($data['stats'] ?? []); ?>;
    new Chart(document.getElementById('chartPayments'), {
        type: 'doughnut',
        data: {
            labels: ['Aprobados', 'Pendientes', 'Rechazados', 'Observados'],
            datasets: [{
                data: [
                    stats.payments_by_status.aprobado || 0,
                    stats.payments_by_status.pendiente || 0,
                    stats.payments_by_status.rechazado || 0,
                    stats.payments_by_status.observado || 0
                ],
                backgroundColor: ['#10b981', '#f59e0b', '#ef4444', '#0ea5e9'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: { position: 'bottom', labels: { color: '#64748b', font: { weight: 'bold' } } }
            }
        }
    });

    // ═══ PAGINATION & SEARCH ═══
    const itemsPerPage = 10;
    function initTable(tableId, paginationId) {
        const table = document.getElementById(tableId);
        if (!table) return;
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const pagination = document.getElementById(paginationId);
        
        let filteredRows = [...rows];
        let currentPage = 1;

        function updateTable() {
            const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
            if (currentPage > totalPages) currentPage = Math.max(1, totalPages);
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            rows.forEach(r => r.style.display = 'none');
            filteredRows.slice(start, end).forEach(r => r.style.display = '');
            updatePagination(totalPages);
        }

        function updatePagination(totalPages) {
            pagination.innerHTML = '';
            if (totalPages <= 1) return;
            const prev = document.createElement('button');
            prev.className = 'pg-btn';
            prev.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
            prev.disabled = currentPage === 1;
            prev.onclick = () => { currentPage--; updateTable(); };
            pagination.appendChild(prev);

            const info = document.createElement('span');
            info.className = 'pg-info';
            info.textContent = `Pág. ${currentPage} de ${totalPages}`;
            pagination.appendChild(info);

            const next = document.createElement('button');
            next.className = 'pg-btn';
            next.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
            next.disabled = currentPage === totalPages;
            next.onclick = () => { currentPage++; updateTable(); };
            pagination.appendChild(next);
        }

        const searchInput = document.getElementById('searchPagos');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const term = e.target.value.toLowerCase().trim();
                filteredRows = rows.filter(row => row.textContent.toLowerCase().includes(term));
                currentPage = 1;
                updateTable();
            });
        }
        updateTable();
    }
    initTable('table-pagos', 'pag-pagos');
});

// ═══ MODAL FUNCTIONS ═══
function closeModal(id) {
    document.getElementById(id).classList.remove('active');
}

function showVoucher(src) {
    const cacheBuster = src + (src.includes('?') ? '&' : '?') + 't=' + new Date().getTime();
    document.getElementById('voucherImg_v').src = cacheBuster;
    document.getElementById('downloadVoucher').href = src;
    document.getElementById('modalVoucher').classList.add('active');
}

function openActionModal(id, status) {
    document.getElementById('action_id').value = id;
    document.getElementById('modalPaymentAction').classList.add('active');
}

async function viewUserDetails(id) {
    const overlay = document.getElementById('modalView');
    const content = document.getElementById('detailsContent');
    content.innerHTML = '<div style="text-align:center; padding: 2rem;"><i class="fa-solid fa-spinner fa-spin" style="font-size: 2rem; color: var(--pink);"></i></div>';
    overlay.classList.add('active');

    try {
        const response = await fetch('<?php echo URLROOT; ?>/verifiers/getUserJson/' + id);
        const data = await response.json();
        const u = data.user;
        const ins = data.inscriptions;
        const notifs = data.notifications;

        let html = `
            <div class="details-grid">
                <div class="detail-item"><label>Nombre</label><p>${u.name}</p></div>
                <div class="detail-item"><label>DNI</label><p>${u.dni}</p></div>
                <div class="detail-item" style="grid-column: span 2;"><label>Institución</label><p>${u.university}</p></div>
            </div>

            <div class="sec-title">Pagos Registrados</div>
            ${ins.map(i => `
                <div style="background:#f8fafc; border:1px solid var(--border); padding:0.75rem; border-radius:10px; margin-bottom:0.5rem; display:flex; justify-content:space-between; align-items:center;">
                    <div><small>${i.created_at}</small><br><strong>$${i.amount}</strong></div>
                    <span class="pill ${i.payment_status == 'aprobado' ? 'pill-green' : 'pill-yellow'}">${i.payment_status}</span>
                </div>
            `).join('')}

            <div class="sec-title">Historial de Notificaciones</div>
            <div style="max-height: 250px; overflow-y: auto;">
                ${notifs.length > 0 ? notifs.map(n => `
                    <div style="padding: 0.75rem; border-left: 4px solid var(--pink); background: #fdf2f8; border-radius: 0 8px 8px 0; margin-bottom: 0.75rem;">
                        <div style="display:flex; justify-content:space-between;"><small>${n.created_at}</small><strong>${n.title}</strong></div>
                        <p style="font-size: 0.8rem; margin-top: 5px;">${n.message}</p>
                    </div>
                `).join('') : '<p style="color:var(--muted); font-size:0.8rem;">Sin notificaciones previas.</p>'}
            </div>
        `;
        content.innerHTML = html;
    } catch (e) {
        content.innerHTML = '<p style="color:red">Error al cargar datos.</p>';
    }
}
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
                <h2>Política de Devoluciones y Cancelación</h2>
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
                <h2 style="color: white; margin: 0; border-bottom: none; font-size: 1.6rem;">Libro de Reclamaciones Virtual</h2>
                <p style="margin: 0.5rem 0 0; opacity: 0.8; font-size: 0.85rem;">Conforme a la Ley N° 29571 y el D.S. N° 011-2011-PCM.</p>
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
                        <strong style="font-size: 0.9rem; color: var(--pink);">1. Identificación del Consumidor</strong>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Nombre Completo</label>
                            <input type="text" id="comp_name" value="<?php echo $_SESSION['user_name']; ?>" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">DNI / Pasaporte / CE</label>
                            <input type="text" id="comp_dni" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Domicilio</label>
                            <input type="text" id="comp_address" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required placeholder="Ej: Av. Principal 123, Puno">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Teléfono / Celular</label>
                            <input type="text" id="comp_phone" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Correo Electrónico</label>
                        <input type="email" id="comp_email" value="<?php echo $_SESSION['user_email']; ?>" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                    </div>

                    <!-- 2. Identificación del Bien Contratado -->
                    <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-top: 1rem;">
                        <strong style="font-size: 0.9rem; color: var(--pink);">2. Identificación del Bien Contratado</strong>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Tipo de Bien</label>
                            <select id="comp_service" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                                <option value="Servicio">Servicio (Verificación)</option>
                                <option value="Producto">Producto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Monto Reclamado (USD)</label>
                            <input type="number" step="0.01" id="comp_amount" value="0.00" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd;" required>
                        </div>
                    </div>

                    <!-- 3. Detalle de la Reclamación -->
                    <div style="border-bottom: 1px solid #eee; padding-bottom: 0.5rem; margin-top: 1rem;">
                        <strong style="font-size: 0.9rem; color: var(--pink);">3. Detalle de la Reclamación</strong>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Tipo de Disconformidad</label>
                        <div style="display: flex; gap: 2rem; margin-bottom: 0.5rem;">
                            <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: pointer;">
                                <input type="radio" name="type" value="Reclamo" checked> Reclamo
                            </label>
                            <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: pointer;">
                                <input type="radio" name="type" value="Queja"> Queja
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Detalle del Reclamo o Queja</label>
                        <textarea id="comp_details" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd; min-height: 100px;" required placeholder="Describa lo sucedido..."></textarea>
                    </div>

                    <div class="form-group">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.8rem;">Pedido / Solución Esperada</label>
                        <textarea id="comp_solution" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #ddd; min-height: 80px;" required placeholder="¿Qué solución solicita?"></textarea>
                    </div>

                    <p style="font-size: 0.7rem; color: #666; font-style: italic; margin-top: 1rem;">
                        * Al enviar este formulario, usted confirma que los datos proporcionados son veraces. La empresa cuenta con un plazo de 30 días calendario para dar respuesta a su requerimiento.
                    </p>

                    <button type="submit" id="comp_submit" style="background: var(--pink); color: white; padding: 1.1rem; border-radius: 12px; border: none; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 0.5rem; font-size: 1rem; box-shadow: 0 8px 15px rgba(196, 30, 90, 0.2);">ENVIAR RECLAMACIÓN OFICIAL</button>
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
                btn.innerText = 'PROCESANDO...';
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
                        alert('✅ Reclamación registrada con éxito. Se ha enviado una copia a su correo.');
                        this.reset();
                        closeLegalModal('complaintModal');
                    } else {
                        alert('❌ Error: ' + (res.error || 'No se pudo procesar la solicitud.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('❌ Error de conexión al servidor.');
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
