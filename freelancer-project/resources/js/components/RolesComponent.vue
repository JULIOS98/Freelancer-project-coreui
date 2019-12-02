<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Acceso</li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
    
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Roles
                </div> <!--End card header-->

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre_rol">Nombre</option>
                                  
                                </select>
                                <input type="text" v-model="buscar" @keyup.enter="listarRol(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" @click="listarRol(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Status</th>
                             
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr v-for="rol in arrayRol" :key="rol.id">
                                <td>
                                    <button type="button" @click="abrirModal('rol','actualizar',rol)" class="btn btn-warning btn-sm">
                                        <i class="icon-pencil"></i>
                                    </button> &nbsp;
                                    <template v-if="rol.status">
                                        <button type="button" class="btn btn-danger btn-sm" @click="desactivarRol(rol.id)">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </template>
                                    
                                    <template v-else>
                                        <button type="button" class="btn btn-info btn-sm" @click="activarRol(rol.id)">
                                            <i class="icon-check"></i>
                                        </button>
                                    </template>
                                </td>
            
                                <td v-text="rol.nombre_rol"></td>
                                <td v-text="rol.descripcion"></td>
                          
                                
                                
                                <td>                                
                                    <div v-if="rol.status">
                                        <span class="badge badge-success">Activo</span>
                                    </div>
                                    
                                    <div v-else>
                                        <span class="badge badge-danger">Desactivado</span>
                                    </div>
                                </td>

                            
                            </tr>
                        </tbody>
                    </table>
                    
                    <nav>
                        <ul class="pagination">
                            <li class="page-item" v-if="pagination.current_page > 1">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                            </li>
                            <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                            </li>
                            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                            </li>
                        </ul>
                    </nav>
                </div> <!---End card body--->

            </div>  <!---End card --->

        </div> <!-- End container -->
        
        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div> <!-- End modal header -->
                    
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                          <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre Rol(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre_rol" class="form-control" placeholder="Nombre de Rol">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Descripcion(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="descripcion" class="form-control" placeholder="Descripcion">
                                </div>
                            </div>
                          
                              
            
                            <div v-show="errorRol" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjRol" :key="error" v-text="error">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- End modal Body -->
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarRol()">Actualizar</button>
                    </div> <!-- End modal footer -->
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!--Fin del modal-->
    

  </main>
</template>

<script>

    export default 
    {
       data ()
        {
            return {
             
                id: 0,
                nombre_rol : '',
                descripcion : '',
                arrayRol : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorRol : 0,
                errorMostrarMsjRol : [],
                pagination : 
                {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre_rol',
                buscar : ''
            }//End del return
        }, //End de data


        computed: 
        {
            isActived: function()
            {
                return this.pagination.current_page;
            },

            //Calcula los elementos de la paginación
            pagesNumber: function() 
            {
                if(!this.pagination.to) 
                {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset;
                if(from < 1) 
                {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }
                
                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                
                return pagesArray;
            }
        }, //End del computed
        

        methods : 
        {
            //Metodo listarCategoria
            listarRol(page,buscar,criterio)
            {
                let me=this;
                var url= '/roles?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                
                axios.get(url).then(function (response) 
                {
                    var respuesta= response.data;
                    me.arrayRol = respuesta.roles.data;
                    me.pagination= respuesta.pagination;
                })
                
                .catch(function (error) { console.log(error);});
            }, //End listarCategoria
        
     

            //metodo cambiarPagina
            cambiarPagina(page,buscar,criterio)
            {
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarRol(page,buscar,criterio);
            },//End cambiarPagina

     

            //Metodo actualizarCategoria
            actualizarRol()
            {
                if (this.validarRol())
                {
                    return;
                }
                
                let me = this;
                //Metodo axios
                axios.put('/roles/actualizar',
                {
                'nombre_rol': this.nombre_rol,
                'descripcion': this.descripcion,
                'id': this.id
                })
                .then(function (response) {
                me.cerrarModal();
                me.listarRol(1,'','nombre_rol');
                })
                .catch(function (error) {
                console.log(error);
                });
            },//End actualizarRol

            //Metodo desactivarRol
            desactivarRol(id)
            {
                swal.fire({
                    title: 'Esta seguro de desactivar este Rol?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                })

                .then((result) => {
                    if (result.value) 
                    {
                        let me = this;
                        //Metodo axios
                        axios.put('/roles/desactivar',{
                            'id': id
                        })
                        .then(function (response) {
                        me.listarRol(1,'','nombre_rol');
                        swal.fire(
                            'Desactivado!',
                            'El registro ha sido desactivado con éxito.',
                            'success'
                            )
                        })
                        
                        .catch(function (error) 
                        {
                            console.log(error);
                        });
                    }  
                    else if 
                    (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) 
                    {}
                }) //End del Then
            }, //End del desactivarRol

            //Metodo activarRol
            activarRol(id)
            {
                swal.fire({
                    title: 'Esta seguro de activar este Rol?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                })
                .then((result) => {
                    if (result.value) 
                    {
                        let me = this;

                        axios.put('/roles/activar',{
                        'id': id
                        })
                        .then(function (response) {
                            me.listarRol(1,'','nombre_rol');
                            swal.fire(
                                'Activado!',
                                'El registro ha sido activado con éxito.',
                                'success'
                            )
                        })
                        
                        .catch(function (error) {
                            console.log(error);
                        });
                    }
                    else if (result.dismiss === swal.DismissReason.cancel) {}
                }) //End Then
            },//End activar Roles

            //Metodo validarRoles
            validarRol()
            {
                this.errorRol=0;
                this.errorMostrarMsjRol =[];
                if (!this.nombre_rol) this.errorMostrarMsjRol.push("El nombre del rol no puede estar vacio.");
                if (this.errorMostrarMsjRol.length) this.errorRol = 1;
                return this.errorRol;
            },//End validarRoles

            //Metodo cerrarModal  
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre_rol="";
                this.descripcion="";
      
            },//End cerrarModal

            //Metod AbrirModa;
            abrirModal(modelo, accion, data = [])
            {
                switch(modelo)
                {
                    case "rol":
                    {
                        switch(accion)
                        {
                          
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Rol';
                                this.tipoAccion=2;
                                this.id=data['id'];
                               
                                this.nombre_rol = data['nombre_rol'];
                                this.descripcion = data['descripcion'];
              
                              
                                break;
                            }
                        }
                    }
                }
            }
            
        },//End de Methods

        mounted() 
        {
            this.listarRol(1,this.buscar,this.criterio);
        }
    } //End export Default

</script>

<style>
    
    .modal-content
    {
        width: 100% !important;
        position: absolute !important;
    }
    
    .mostrar
    {
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    
    .div-error
    {
        display: flex;
        justify-content: center;
    }
    
    .text-error
    {
        color: red !important;
        font-weight: bold;
    }

</style>