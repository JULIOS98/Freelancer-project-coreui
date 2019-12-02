<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li @click="menu=0" class="nav-item">
                <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Dashboard</a>
            </li>
          
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket"></i> Pagos</a>
                <ul class="nav-dropdown-items">
                  <li @click="menu=1" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Metodos de Pago</a>
                  </li>
                   <li @click="menu=8" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Pagos</a>
                  </li>
                </ul>
             </li>
          
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i> Usuarios</a>
                    </li>
                    <li @click="menu=7" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
                    </li>
                  
                    <li @click="menu=12" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user-following"></i> Personas</a>
                    </li>
                    <li @click="menu=13" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user-following"></i> Perfil</a>
                    </li>
                </ul>
            </li>
            
          <li class="nav-item nav-dropdown">
                <a @click="menu=3" class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Proyectos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=4" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-speedometer"></i> Dashboard proyecto</a>
                    </li>
                    <li @click="menu=5" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-people"></i> Usuarios proyecto</a>
                    </li>
                    <li @click="menu=6" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-book-open"></i> Tareas proyecto</a>
                    </li>
                    <li @click="menu=9" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-book-open"></i> Milestones proyecto</a>
                    </li>
                    <li @click="menu=10" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-book-open"></i> Detalles proyecto</a>
                    </li>
                    <li @click="menu=11" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-book-open"></i> Gastos proyecto</a>
                    </li>
                </ul>                  
          </li>
           
          <li class="nav-item">
              <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
          </li>
      </ul>
    </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>