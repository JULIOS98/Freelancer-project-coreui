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
                <a class="nav-link" href="#">Dashboard</a>
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
                <a class="nav-link active" href="#">Detalles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Gastos</a>
              </li>
            </ul>
          </nav>
          
        
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="card">
                <div class="card-heading p-4">
                  <div class="mini-stat-icon float-right">
                    <i class="mdi mid-tag-text-outline bg-warning text-white"></i>
                  </div>
                  <div>
                    <h5 class="display-4 text-center text-primary">Detalles de proyecto</h5>
                  </div>
                  <div>
                    <button type="button" class="btn btn-success">
                        <i class="icon-plus"></i>&nbsp;Nuevo detalle
                      </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>Descripción</th>
                        <th>Revisado por</th>
                        <th>Asignado a</th>
                        <th>Status</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Falla el módulo 2</td>
                        <td>Administrador</td>
                        <td>Daniel Vázquez</td>
                        <td>Activo</td>
                        <td>Editar/Eliminar</td>
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