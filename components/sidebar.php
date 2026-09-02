<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistema de Clientes </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo ($page == 'home') ? ' active' : ''; ?>">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Páginas
    </div>



    <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo ($page == 'clients') ? ' active' : ''; ?>">
        <a class="nav-link" href="?p=clients">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Clientes</span>
        </a>
    </li>

      <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo ($page == 'products') ? ' active' : ''; ?>">
        <a class="nav-link" href="?p=products">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Produtos</span>
        </a>
    </li>
      <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo ($page == 'orders') ? ' active' : ''; ?>">
        <a class="nav-link" href="?p=orders">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pedidos</span>
        </a>
    </li>



     
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
   <div class="sidebar-heading">
     Configurações
   </div>
    <li class="nav-item  <?php echo ($page == 'users') ? ' active' : ''; ?>">
        <a class="nav-link" href="?p=users">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Usuários</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->