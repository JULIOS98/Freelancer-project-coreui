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
                   <li @click="menu=14" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Envios</a>
                  </li>
                   <li @click="menu=15" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Retiros</a>
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
          
    
          
               <li @click="menu=16" class="nav-item ">
                <a  class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Proyectos</a>
               </li>
                    

           
          <li class="nav-item">
              <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
          </li>
      </ul>
    </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>