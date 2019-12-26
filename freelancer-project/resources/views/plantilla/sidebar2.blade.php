<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li  class="nav-item">
                <a class="nav-link active" href="principal"><i class="icon-speedometer"></i> Dashboard</a>
            </li>
          
       
          
       
            
          <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="proyectos"><i class="icon-pie-chart"></i> Proyectos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=16" class="nav-item">
                      <a class="nav-link" href="#"><i class="icon-speedometer"></i> Dashboard</a>
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
           
       
      </ul>
    </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>