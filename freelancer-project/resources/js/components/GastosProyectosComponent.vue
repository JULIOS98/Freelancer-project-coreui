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
                <a class="nav-link" href="#">Detalles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Gastos</a>
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
                    <h5 class="display-4 text-center text-primary">Gastos de proyecto</h5>
                  </div>
                  <div>
                    <button type="button" class="btn btn-success">
                        <i class="icon-plus"></i>&nbsp;Nuevo gasto
                      </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>Facturable</th>
                        <th>Gastos</th>
                        <th>Creado en</th>
                        <th>Fecha de gasto</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Si</td>
                        <td>Extra</td>
                        <td>2019/11/16</td>
                        <td>2019/11/16</td>
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