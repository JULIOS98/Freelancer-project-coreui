<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Acceso</li>
            <li class="breadcrumb-item active">Personas</li>
        </ol>
    
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Personas
                </div> <!--End card header-->

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre">Nombre</option>
                                  
                                </select>
                                <input type="text" v-model="buscar" @keyup.enter="listarPersona(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" @click="listarPersona(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                             
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Balance</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Metodo Pago</th>
                                <th>Ciudad</th>
                             
                            </tr>
                        </thead>
                    
                        <tbody>
                            <tr v-for="persona in arrayPersona" :key="persona.id_persona">
                    
            
                                <td v-text="persona.nombre"></td>
                                <td v-text="persona.apellido_paterno"></td>
                                <td v-text="persona.apellido_materno"></td>
                                <td v-text="persona.email"></td>
                                <td v-text="persona.telefono"></td>
                                <td v-text="persona.balance"></td>
                                <td v-text="persona.fecha_nacimiento"></td>
                                <td v-text="persona.nombre_metodo"></td>
                                <td v-text="persona.nombre_ciudad"></td>
                              
                              
                            
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
        
     

  </main>
</template>

<script>

    export default 
    {
       data ()
        {
            return {
             
                id_persona: 0,
                nombre : '',
                apellido_paterno : '',
                apellido_materno : '',
                email : '',
                telefono : '',
                balance : 0,
                fecha_nacimiento : '',
                nombre_metodo : '',
                nombre_ciudad : '',
                arrayPersona : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
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
                criterio : 'nombre',
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
            listarPersona(page,buscar,criterio)
            {
                let me=this;
                var url= '/personas?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                
                axios.get(url).then(function (response) 
                {
                    var respuesta= response.data;
                    me.arrayPersona = respuesta.personas.data;
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
                me.listarPersona(page,buscar,criterio);
            }//End cambiarPagina

   

        },//End de Methods

        mounted() 
        {
            this.listarPersona(1,this.buscar,this.criterio);
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