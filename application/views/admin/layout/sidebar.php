   
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Admin Feriante</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   <!-- Sidebar Menu -->
   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url("admin/dashboard") ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Principal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("admin/products") ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("admin/orders") ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Ordenes</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= "http://localhost/wordpress/" ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Ir al blog</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Ir al inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("admin/logout") ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
