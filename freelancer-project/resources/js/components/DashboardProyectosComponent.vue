<template>
  <div class="main">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Proyectos</li>
    </ol>
    <div class="container-fluid">
      <div class="card">
        
          
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tareas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Milestones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Detalles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Gastos</a>
              </li>
            </ul>
          </nav>
          
          <div class="container">
            <h3 class="display-4 text-center">Nombre proyecto</h3>
          </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-cube-outline bg-primary text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Total de tareas</h5>
                        </div>
                        <h3 class="mt-4 text-center text-warning display-4">5</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Tareas debidas</h5>
                        </div>
                        <h3 class="mt-4 text-center text-danger display-4">2</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Milestones</h5>
                        </div>
                        <h3 class="mt-4 text-center text-success display-4">2<span class="text-muted">/3</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-12">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Tiempo total</h5>
                        </div>
                        <h3 class="mt-4 text-center text-muted text-lead">44 Hrs</h3>
                        <p class="text-muted mt-2 mb-0 text-center">57 min</p>
                    </div>
                </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="card">
                <div class="card-heading p-4">
                  <div class="mini-stat-icon float-right">
                    <i class="mdi mid-tag-text-outline bg-warning text-white"></i>
                  </div>
                  <div>
                    <h5 class="font-16 text-center text-primary">Equipo de proyecto</h5>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Rol</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Daniel Vázquez</td>
                        <td>Desarrollador</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>              
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</template>