<template>
    <main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Proyectos</li>
        <li class="breadcrumb-item active">Milestones</li>
    </ol>
    
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Milestones
                <button type="button" @click="abrirModal('milestone','registrar')" class="btn btn-secondary">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
               
            </div>
`           
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                        <select class="form-control col-md-3" v-model="criterio">
                            <option value="title">Title</option>
                            <option value="descripcion">Descripción</option>
                        </select>
                        <input type="text" v-model="buscar" @keyup.enter="listarMilestone(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" @click="listarMilestone(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                
                <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Title</th>
                    <th>Descripción</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Estado</th>
                </tr>
                </thead>
                
                <tbody>
                    <tr v-for="milestone in arrayMilestone" :key="milestone.id">
                        <td>
                            <button type="button" @click="abrirModal('milestone','actualizar',milestone)" class="btn btn-warning btn-sm">
                                 <i class="icon-pencil"></i>
                            </button> &nbsp;
                            <template v-if="milestone.status">
                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarMilestone(milestone.id)">
                                    <i class="icon-trash"></i>
                                </button>
                            </template>
                            
                            <template v-else>
                                <button type="button" class="btn btn-info btn-sm" @click="activarMilestone(milestone.id)">
                                    <i class="icon-check"></i>
                                </button>
                            </template>
                        </td>
    
                        <td v-text="milestone.nombre"></td>
                        <td v-text="milestone.descripcion"></td>
                        <td v-text="milestone.fecha_inicio"></td>
                        <td v-text="milestone.fecha_fin"></td>                       
                        <td>
                        
                            <div v-if="milestone.status">
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
        </div>
    </div>
    <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" v-text="tituloModal"></h4>
    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group row">
    <label class="col-md-3 form-control-label" for="text-input">Title(*)</label>
    <div class="col-md-9">
    <input type="text" v-model="title" class="form-control" placeholder="Nombre de categoría">

    </div>
    </div>
    <div class="form-group row">
    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
    <div class="col-md-9">
    <input type="email" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-md-3 form-control-label" for="email-input">Fecha inicio</label>
    <div class="col-md-9">
    <input type="date" v-model="fecha_inicio" class="form-control" placeholder="Ingrese fecha">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-md-3 form-control-label" for="email-input">Fecha finalización</label>
    <div class="col-md-9">
    <input type="date" v-model="descripcion" class="form-control" placeholder="Ingrese fecha">
    </div>
    </div>
    <div v-show="errorMilestone" class="form-group row div-error">
    <div class="text-center text-error">
    <div v-for="error in errorMostrarMsjMilestone" :key="error" v-text="error">

    </div>
    </div>
    </div>

    </form>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
    <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarMilestone()">Guardar</button>
    <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarMilestone()">Actualizar</button>
    </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    </main>
</template>

<script>

export default 
{
    
    data ()
    {
        return {
        id: 0,
        title : '',
        descripcion : '',
        fecha_inicio : '',
        fecha_fin : '',
        arrayMilestone : [],
        modal : 0,
        tituloModal : '',
        tipoAccion : 0,
        errorMilestone : 0,
        errorMostrarMsjMilestone : [],
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
        criterio : 'title',
        buscar : ''
         }
    },

    computed:
    {
        isActived: function(){
            return this.pagination.current_page;
        },

        //Calcula los elementos de la paginación
        pagesNumber: function() {
            if(!this.pagination.to) {
            return [];
        }

        var from = this.pagination.current_page - this.offset;
        if(from < 1) {
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
    },
    
    methods : {
        listarMilestone(page,buscar,criterio){
        let me=this;
        var url='/milestones?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
        
        axios.get(url).then(function (response) {
        var respuesta= response.data;
        me.arrayMilestones = respuesta.milestones.data;
        me.pagination= respuesta.pagination;
        })
        
        .catch(function (error) {
            console.log(error);
        });
    },
    
    

    cambiarPagina(page,buscar,criterio){
        let me = this;
    //Actualiza la página actual
    me.pagination.current_page = page;
    //Envia la petición para visualizar la data de esa página
    me.listarMilestone(page,buscar,criterio);
    },

    registrarMilestone(){
        if (this.validarMilestone()){
            return;
        }
    
        let me = this;

        axios.post('/mielstone/registrar',{
        'title': this.title,
        'descripcion': this.descripcion,
        'fecha_incio': this.fecha_incio,
        'fecha_fin': this.fecha_fin
        }).then(function (response) {
        me.cerrarModal();
        me.listarMilestone(1,'','title');
        }).catch(function (error) {
        console.log(error);
        });
    },

    actualizarMilestone(){
        if (this.validarMilestone()){
        return;
        }

        let me = this;

        axios.put('/milestone/actualizar',{
        'nombre': this.nombre,
        'descripcion': this.descripcion,
        'fecha_inicio': this.fecha_inicio,
        'fecha_fin': this.fecha_fin,
        'id': this.id
        }).then(function (response) {
        me.cerrarModal();
        me.listarMilestone(1,'','title');
        }).catch(function (error) {
        console.log(error);
        });
    },

    desactivarMilestone(id){
        swal.fire({
        title: 'Esta seguro de desactivar este milestone?',
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
        }).then((result) => {
            if (result.value) {
                let me = this;
                
                axios.put('/milestone/desactivar',{
                'id': id
                }).then(function (response) {
                me.listarMilestone(1,'','title');
                swal.fire(
                'Desactivado!',
                'El registro ha sido desactivado con éxito.',
                'success'
                )
                }).catch(function (error) {
                console.log(error);
                });
            } 
            else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) 
            {}
        })
    },

    activarMilestone(id){
        swal.fire({
        title: 'Esta seguro de activar este milestone?',
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
        }).then((result) => {
        if (result.value) {
        let me = this;

        axios.put('/milestone/activar',{
        'id': id
        }).then(function (response) {
        me.listarMilestone(1,'','title');
        swal.fire(
        'Activado!',
        'El registro ha sido activado con éxito.',
        'success'
        )
        }).catch(function (error) {
        console.log(error);
        });
        }
        else if (
        // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
        ) {}
        })
    },

    validarMilestone(){
        this.errorMilestone=0;
        this.errorMostrarMsjMilestone =[];
        if (!this.title) this.errorMostrarMsjMilestone.push("El nombre del milestone no puede estar vacío.");
        if (this.errorMostrarMsjMilestone.length) this.errorMilestone = 1;
        return this.errorMilestone;
    },

    cerrarModal(){
        this.modal=0;
        this.tituloModal='';
        this.nombre='';
        this.descripcion='';
        this.fecha_inicio='';
        this.fecha_fin='';
    },

    abrirModal(modelo, accion, data = [])
    {
        switch(modelo)
        {
            case "milestone":
            {
                switch(accion)
                {
                    case 'registrar':
                    {
                        this.modal = 1;
                        this.tituloModal = 'Registrar Milestone';
                        this.nombre= '';
                        this.descripcion = '';
                        this.fecha_inicio = '';
                        this.fecha_fin = '';
                        this.tipoAccion = 1;
                        break;
                    }
                    case 'actualizar':
                    {
                        //console.log(data);
                        this.modal=1;
                        this.tituloModal='Actualizar milestone';
                        this.tipoAccion=2;
                        this.id=data['id'];
                        this.title = data['title'];
                        this.descripcion= data['descripcion'];
                        this.fecha_inicio= data['fecha_inicio'];
                        this.fecha_fin= data['fecha_fin'];
                        break;
                    }

                    
                }
            }
        }
    }
    
    },

    mounted() 
    {
        this.listarMilestone(1,this.buscar,this.criterio);
    }
}
</script>

<style>
.modal-content{
width: 100% !important;
position: absolute !important;
}
.mostrar{
display: list-item !important;
opacity: 1 !important;
position: absolute !important;
background-color: #3c29297a !important;
}
.div-error{
display: flex;
justify-content: center;
}
.text-error{
color: red !important;
font-weight: bold;
}
</style>