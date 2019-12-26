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
                <a class="nav-link active" href="#">Usuarios</a>
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
          
        
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="card">
                <div class="card-heading p-4">
                  <div class="mini-stat-icon float-right">
                    <i class="mdi mid-tag-text-outline bg-warning text-white"></i>
                  </div>
                  <div>
                    <h5 class="display-4 text-center text-primary">Equipo de proyecto</h5>
                  </div>
                  <div>
                    <button type="button" class="btn btn-success">
                        <i class="icon-plus"></i>&nbsp;Nuevo usuario
                      </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Creado</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Daniel Vázquez</td>
                        <td>Desarrollador</td>
                        <td>2019/11/22</td>
                        <td>Activar/Desactivar</td>
                      </tr>
                      <tr>
                        <td>Angel Vázquez</td>
                        <td>Diseñador</td>
                        <td>2019/11/22</td>
                        <td>Activar/Desactivar</td>
                      </tr>
                      <tr>
                        <td>Iliana Gomez</td>
                        <td>Desarrollador</td>
                        <td>2019/11/22</td>
                        <td>Activar/Desactivar</td>
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

<script>
    export default {
        mounted() {
            console.log('Component Usuario.')
        }
    }
</script>
