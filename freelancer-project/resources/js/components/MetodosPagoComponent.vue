<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Pagos</li>
            <li class="breadcrumb-item active">Metodos de Pago</li>
        </ol>
    
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Metodos de Pago
                    <button type="button" @click="abrirModal('metodo','registrar')" class="btn btn-success">
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>
                </div> <!--End card header-->

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre_metodo">Nombre</option>
                                </select>
                                <input type="text" v-model="buscar" @keyup.enter="listarMetodo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" @click="listarMetodo(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Monto Min</th>
                                <th>Monto Max</th>
                                <th>Carga Fija</th>
                                <th>% Carga</th>
                                <th>Tarifa</th>
                                <th>Dias Procesando</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr v-for="metodo in arrayMetodo" :key="metodo.id">
                                <td>
                                    <button type="button" @click="abrirModal('metodo','actualizar',metodo)" class="btn btn-warning btn-sm">
                                        <i class="icon-pencil"></i>
                                    </button> &nbsp;
                                    <template v-if="metodo.status">
                                        <button type="button" class="btn btn-danger btn-sm" @click="desactivarMetodo(metodo.id)">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </template>
                                    
                                    <template v-else>
                                        <button type="button" class="btn btn-info btn-sm" @click="activarMetodo(metodo.id)">
                                            <i class="icon-check"></i>
                                        </button>
                                    </template>
                                </td>
            
                                <td v-text="metodo.nombre_metodo"></td>
                                <td v-text="metodo.monto_min"></td>
                                <td v-text="metodo.monto_max"></td>
                                <td v-text="metodo.carga_fija"></td>
                                <td v-text="metodo.porcentaje_carga"></td>
                                <td v-text="metodo.tarifa"></td>
                                <td v-text="metodo.dias_procesamiento"></td>
                                
                                
                                <td>                                
                                    <div v-if="metodo.status">
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
                                <label class="col-md-3 form-control-label" for="text-input">Nombre Metodo(*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre_metodo" class="form-control" placeholder="Nombre de Metodo">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Monto Min</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="monto_min" class="form-control" placeholder="Monto Min">
                                </div>
                            </div>
                          
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Monto Max</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="monto_max" class="form-control" placeholder="Monto Max">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Carga Fija</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="carga_fija" class="form-control" placeholder="Carga Fija">
                                </div>
                            </div>
                            
                          <div class="form-group row">
                          
                                <label class="col-md-3 form-control-label" for="text-input">% de Carga</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="porcentaje_carga" class="form-control" placeholder="% de Carga">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Tarifa</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="tarifa" class="form-control" placeholder="Tarifa">
                                </div>
                            </div>
                          
                               <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="descripcion-input">Dias Procesando</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="dias_procesamiento" class="form-control" placeholder="Dias Procesando">
                                </div>
                            </div>
            
                            <div v-show="errorMetodo" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjMetodo" :key="error" v-text="error">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- End modal Body -->
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarMetodo()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarMetodo()">Actualizar</button>
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
                nombre_metodo : '',
                monto_min : '',
                monto_max: '',
                carga_fija : '',
                porcentaje_carga: '',
                tarifa: '',
                dias_procesamiento : '',
                arrayMetodo : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorMetodo : 0,
                errorMostrarMsjMetodo : [],
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
                criterio : 'nombre_metodo',
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
            
            listarMetodo(page,buscar,criterio)
            {
                let me=this;
                var url= '/metodos?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                
                axios.get(url).then(function (response) 
                {
                    var respuesta = response.data;
                    me.arrayMetodo = respuesta.metodos.data;
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
                me.listarMetodo(page,buscar,criterio);
            },//End cambiarPagina

            //metodo registrarCategoria
            registrarMetodo()
            {
                if (this.validarMetodo())
                {
                    return;
                }
                let me = this;
                //Metodo axios
                axios.post('/metodos/registrar',
                {
                'nombre_metodo': this.nombre_metodo,
                'monto_min': this.monto_min,
                'monto_max': this.monto_max,
                'carga_fija': this.carga_fija,
                'porcentaje_carga': this.porcentaje_carga,
              
                'tarifa': this.tarifa,
                'dias_procesamiento': this.dias_procesamiento
                })
                .then(function (response) {
                me.cerrarModal();
                me.listarMetodo(1,'','nombre_metodo');
                })
                .catch(function (error) {
                console.log(error);
                });
            }, //End de registrarCategoria

            //Metodo actualizarCategoria
            actualizarMetodo()
            {
                if (this.validarMetodo())
                {
                    return;
                }
                
                let me = this;
                //Metodo axios
                axios.put('/metodos/actualizar',
                {
                'nombre_metodo': this.nombre_metodo,
                'monto_min': this.monto_min,
                'monto_max': this.monto_max,
                'carga_fija': this.carga_fija,
                'porcentaje_carga': this.porcentaje_carga,
                'tarifa': this.tarifa,
                'dias_procesamiento': this.dias_procesamiento,
                'id': this.id
                })
                .then(function (response) {
                me.cerrarModal();
                me.listarMetodo(1,'','nombre_metodo');
                })
                .catch(function (error) {
                console.log(error);
                });
            },//End actualizarCategoria

            //Metodo desactivarCategoria
            desactivarMetodo(id)
            {
                swal.fire({
                    title: 'Esta seguro de desactivar este Metodo?',
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
                        axios.put('/metodos/desactivar',{
                            'id': id
                        })
                        .then(function (response) {
                        me.listarMetodo(1,'','nombre_metodo');
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
            activarMetodo(id)
            {
                swal.fire({
                    title: 'Esta seguro de activar este Metodo?',
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

                        axios.put('/metodos/activar',{
                        'id': id
                        })
                        .then(function (response) {
                            me.listarMetodo(1,'','nombre_metodo');
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
            validarMetodo()
            {
                this.errorMetodo=0;
                this.errorMostrarMsjMetodo =[];
                if (!this.nombre_metodo) this.errorMostrarMsjMetodo.push("El nombre del metodo no puede estar vacio.");
                if (this.errorMostrarMsjMetodo.length) this.errorMetodo = 1;
                return this.errorMetodo;
            },//End validarUsuario

            //Metodo cerrarModal  
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre_metodo="";
                this.monto_min="";
                this.monto_max="";
                this.carga_fija="";
                this.porcentaje_carga="";
                this.tarifa="";
                this.dias_procesamiento="";
            },//End cerrarModal

            //Metod AbrirModa;
            abrirModal(modelo, accion, data = [])
            {
                switch(modelo)
                {
                    case "metodo":
                    {
                        switch(accion)
                        {
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Metodo';
                                this.nombre_metodo="";
                                this.monto_min="";
                                this.monto_max="";
                                this.carga_fija="";
                                this.porcentaje_carga="";
                                this.tarifa="";
                                this.dias_procesamiento="";
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Metodo';
                                this.tipoAccion=2;
                                this.id=data['id'];
                               
                                this.nombre_metodo = data['nombre_metodo'];
                                this.monto_min = data['monto_min'];
                                this.monto_max = data['monto_max'];
                                this.carga_fija = data['carga_fija'];
                                this.porcentaje_carga = data['porcentaje_carga'];
                                this.tarifa = data['tarifa'];
                                this.dias_procesamiento = data['dias_procesamiento'];
                              
                                break;
                            }
                        }
                    }
                }
            }
            
        },//End de Methods

        mounted() 
        {
            this.listarMetodo(1,this.buscar,this.criterio);
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