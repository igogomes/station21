<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">
                <img class="main-logo-dashboard" src="./assets/img/logos/logo-station-21-horizontal.png"/>
            </span>
            <span class="brand-mini">
                <img src="./assets/img/favicon/logo-station-21-transparent.png" />
            </span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="./assets/img/admin-avatar.png" />
                    <span></span><?php echo $nome; ?>
                    <i class="fa fa-angle-down m-l-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile"><i class="fa fa-user"></i>Meu Perfil</a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="logout"><i class="fa fa-power-off"></i>Sair</a>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>