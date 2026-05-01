
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?? 'Painel Administrativo' ?></title>

    <link rel="stylesheet" href="/salao-leila/public/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/salao-leila/public/assets/adminlte/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <span class="nav-link">Salão Leila - Painel</span>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/salao-leila/public/admin" class="brand-link">
            <span class="brand-text font-weight-light">AdminLTE</span>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="/salao-leila/public/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/salao-leila/public/appointments" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Agendamentos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/salao-leila/public/services" class="nav-link">
                            <i class="nav-icon fas fa-cut"></i>
                            <p>Serviços</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Conteúdo -->
    <div class="content-wrapper p-4">
        <?php require $view; ?>
    </div>

</div>

<script src="/salao-leila/public/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/salao-leila/public/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/salao-leila/public/assets/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>