<template>
  <div class="main">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Proyectos</li>
    </ol>
    <div class="container-fluid">
      <div class="card">

          
          <div class="container">
            <h3 class="display-4 text-center">Nombre usuario</h3>
            <p class="lead text-center">usuario@correo.com</p>
          </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-cube-outline bg-primary text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Transacciones</h5>
                        </div>
                        <h3 class="mt-4 text-center text-warning display-4">0</h3>
                    </div>
                    <div class="card-footer bg-warning">
                      <p class="font-12 text-center">0 transaccionado</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Depósitos</h5>
                        </div>
                        <h3 class="mt-4 text-center text-danger display-4">0</h3>
                    </div>
                    <div class="card-footer bg-danger">
                      <p class="font-12 text-center text-light">0 depositado</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Retirar</h5>
                        </div>
                        <h3 class="mt-4 text-center text-success display-4">0</h3>
                    </div>
                    <div class="card-footer bg-success">
                      <p class="font-12 text-center text-light">0 retirado</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16 text-center">Enviar dinero</h5>
                        </div>
                        <h3 class="mt-4 text-center text-muted display-4">0</h3>
                    </div>
                    <div class="card-footer bg-muted">
                      <p class="font-12 text-center text-muted">0 transferido</p>
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
                  <div class="row">
                    <div class="col-xl-6">
                      <button class="col-xl-12 btn btn-primary">Agregar balance</button>
                    </div>
                    <div class="col-xl-6">
                      <button class="col-xl-12 btn btn-danger">Substraer balance</button>
                    </div>
                    <br>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</template>