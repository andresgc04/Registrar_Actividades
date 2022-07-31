  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../public/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Actividades</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../public/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["User_Name"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Gestiones</li>
          <li class="nav-item">
            <a href="../HomeActivities/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Actividades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Empleados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-header">Mantenimientos</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-building"></i>
              <p>
                Entidades
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../HomeCompanies/" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p>Districtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeFacilities/" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p>Sub-Districtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeDepartments/" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p>Departamentos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-globe-americas"></i>
              <p>
                Localizaciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../HomeCountries/" class="nav-link">
                  <i class="far fa-flag"></i>
                  <p>Paises</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeCities/" class="nav-link">
                  <i class="fas fa-city"></i>
                  <p>Ciudades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeProvinces/" class="nav-link">
                  <i class="fas fa-city"></i>
                  <p>Provincias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeDepartments/" class="nav-link">
                  <i class="fas fa-city"></i>
                  <p>Municipios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../HomeDepartments/" class="nav-link">
                  <i class="fas fa-city"></i>
                  <p>Sectores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../HomeProfessions/" class="nav-link">
              <i class="fas fa-user-tie"></i>
              <p>
                Profesiones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../HomePositions/" class="nav-link">
              <i class="fas fa-chalkboard-teacher"></i>
              <p>
                Posiciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../HomeRoles/" class="nav-link">
              <i class="fas fa-user-tag"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../HomeStates/" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Estados
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>