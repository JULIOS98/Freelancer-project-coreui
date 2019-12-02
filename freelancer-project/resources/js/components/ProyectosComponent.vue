<template>
  <div class="main">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active">Proyectos</li>
    </ol>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <i class="icon-pie-chart"></i> Proyectos
          <button type="button" class="btn btn-success">
              <i class="icon-plus"></i>&nbsp;Nuevo
          </button>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <div class="col-md-6">
              <div class="input-group">
                <select class="form-control col-md-3">
                  <option value="">Nombre</option>
                </select>
                <input type="text" class="form-control" placeholder="Buscar proyecto">
                <button type="submit" @click="" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover table-sm">
            <thead>
              <tr>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Compañía</th>
                <th>Fecha inicio</th>
                <th>Fecha vencimiento</th>
                <th>Acción</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>