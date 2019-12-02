<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Acceso</li>
            <li class="breadcrumb-item active">Usuarios</li>
        </ol>
    
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Usuarios
                    <button type="button" @click="abrirModal('usuario','registrar')" class="btn btn-success">
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>

           
                </div> <!--End card header-->

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre_usuario">Nombre</option>
                                  
                                </select>
                                <input type="text" v-model="buscar" @keyup.enter="listarUsuario(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" @click="listarUsuario(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Fecha Nacimiento</th>
                                <th>Ciudad</th>
                                <th>Pais</th>
                                <th>Status</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr v-for="usuario in arrayUsuario" :key="usuario.id">
                                <td>
                                    <button type="button" @click="abrirModal('usuario','actualizar',usuario)" class="btn btn-warning btn-sm">
                                        <i class="icon-pencil"></i>
                                    </button> &nbsp;
                                    <template v-if="usuario.status">
                                        <button type="button" class="btn btn-danger btn-sm" @click="desactivarUsuario(usuario.id)">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </template>
                                    
                                    <template v-else>
                                        <button type="button" class="btn btn-info btn-sm" @click="activarUsuario(usuario.id)">
                                            <i class="icon-check"></i>
                                        </button>
                                    </template>
                                </td>
            
                                <td v-text="usuario.nombre_usuario"></td>
                                <td v-text="usuario.apellido_usuario"></td>
                                <td v-text="usuario.telefono_usuario"></td>
                                <td v-text="usuario.fecha_nacimiento"></td>
                                <td v-text="usuario.ciudad_usuario"></td>
                                <td v-text="usuario.pais_usuario"></td>
                                
                                
                                <td>                                
                                    <div v-if="usuario.status">
                                        <span class="badge badge-success">Activo</span>
                                    </div>
                                    
                                    <div v-else>
                                        <span class="badge badge-danger">Desactivado</span>
                                    </div>
                                </td>

                               <td> <button class="btn btn-primary">Ver detalles</button> </td>
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
                                <label class="col-md-3 form-control-label" for="text-input">Nombre Usuario(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre_usuario" class="form-control" placeholder="Nombre de Usuario">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Apellido Usuario</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="apellido_usuario" class="form-control" placeholder="Apellido de Usuario">
                                </div>
                            </div>
                          
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Telefono(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="telefono_usuario" class="form-control" placeholder="Telefono de Usuario">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Fecha de Nacimiento</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento">
                                </div>
                            </div>
                            
                          <div class="form-group row">
                          
                                <label class="col-md-3 form-control-label" for="text-input">Ciudad(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="ciudad_usuario" class="form-control" placeholder="Ciudad">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Pais</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="pais_usuario" class="form-control" placeholder="Pais">
                                </div>
                            </div>
            
                            <div v-show="errorUsuario" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjUsuario" :key="error" v-text="error">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- End modal Body -->
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarUsuario()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarUsuario()">Actualizar</button>
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
                categoria_id: 0,
                id: 0,
                nombre_usuario : '',
                apellido_usuario : '',
                telefono_usuario: '',
                fecha_nacimiento : '',
                ciudad_usuario: '',
                pais_usuario: '',
                arrayUsuario : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorUsuario : 0,
                errorMostrarMsjUsuario : [],
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
                criterio : 'nombre_usuario',
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
            listarUsuario(page,buscar,criterio)
            {
                let me=this;
                var url= '/usuarios?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                
                axios.get(url).then(function (response) 
                {
                    var respuesta= response.data;
                    me.arrayUsuario = respuesta.usuarios.data;
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
                me.listarUsuario(page,buscar,criterio);
            },//End cambiarPagina

            //metodo registrarCategoria
            registrarUsuario()
            {
                if (this.validarUsuario())
                {
                    return;
                }
                let me = this;
                //Metodo axios
                axios.post('/usuarios/registrar',
                {
                'nombre_usuario': this.nombre_usuario,
                'apellido_usuario': this.apellido_usuario,
                'telefono_usuario': this.telefono_usuario,
                'fecha_nacimiento': this.fecha_nacimiento,
                'ciudad_usuario': this.ciudad_usuario,
                'pais_usuario': this.pais_usuario
                })
                .then(function (response) {
                me.cerrarModal();
                me.listarUsuario(1,'','nombre_usuario');
                })
                .catch(function (error) {
                console.log(error);
                });
            }, //End de registrarCategoria

            //Metodo actualizarCategoria
            actualizarUsuario()
            {
                if (this.validarUsuario())
                {
                    return;
                }
                
                let me = this;
                //Metodo axios
                axios.put('/usuarios/actualizar',
                {
                'nombre_usuario': this.nombre_usuario,
                'apellido_usuario': this.apellido_usuario,
                'telefono_usuario': this.telefono_usuario,
                'fecha_nacimiento': this.fecha_nacimiento,
                'ciudad_usuario': this.ciudad_usuario,
                'pais_usuario': this.pais_usuario,
                'id': this.id
                })
                .then(function (response) {
                me.cerrarModal();
                me.listarUsuario(1,'','nombre_usuario');
                })
                .catch(function (error) {
                console.log(error);
                });
            },//End actualizarCategoria

            //Metodo desactivarCategoria
            desactivarUsuario(id)
            {
                swal.fire({
                    title: 'Esta seguro de desactivar este usuario?',
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
                        axios.put('/usuarios/desactivar',{
                            'id': id
                        })
                        .then(function (response) {
                        me.listarUsuario(1,'','nombre_usuario');
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
            }, //End del desactivarUsuario

            //Metodo activarUsuario
            activarUsuario(id)
            {
                swal.fire({
                    title: 'Esta seguro de activar este usuario?',
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

                        axios.put('/usuarios/activar',{
                        'id': id
                        })
                        .then(function (response) {
                            me.listarUsuario(1,'','nombre_usuario');
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
            },//End activar Usuarios

            //Metodo validarUsuarios
            validarUsuario()
            {
                this.errorUsuario=0;
                this.errorMostrarMsjUsuario =[];
                if (!this.nombre_usuario) this.errorMostrarMsjUsuario.push("El nombre del usuario no puede estar vacio.");
                if (this.errorMostrarMsjUsuario.length) this.errorUsuario = 1;
                return this.errorUsuario;
            },//End validarUsuario

            //Metodo cerrarModal  
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre_usuario="";
                this.apellido_usuario="";
                this.telefono_usuario="";
                this.fecha_nacimiento="";
                this.ciudad_usuario="";
                this.pais_usuario="";
            },//End cerrarModal

            //Metod AbrirModa;
            abrirModal(modelo, accion, data = [])
            {
                switch(modelo)
                {
                    case "usuario":
                    {
                        switch(accion)
                        {
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Usuario';
                                this.nombre_usuario="";
                                this.apellido_usuario="";
                                this.telefono_usuario="";
                                this.fecha_nacimiento="";
                                this.ciudad_usuario="";
                                this.pais_usuario="";
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Usuario';
                                this.tipoAccion=2;
                                this.id=data['id'];
                               
                                this.nombre_usuario = data['nombre_usuario'];
                                this.apellido_usuario = data['apellido_usuario'];
                                this.telefono_usuario = data['telefono_usuario'];
                                this.fecha_nacimiento = data['fecha_nacimiento'];
                                this.ciudad_usuario = data['ciudad_usuario'];
                                this.pais_usuario = data['pais_usuario'];
                              
                                break;
                            }
                        }
                    }
                }
            }
            
        },//End de Methods

        mounted() 
        {
            this.listarUsuario(1,this.buscar,this.criterio);
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