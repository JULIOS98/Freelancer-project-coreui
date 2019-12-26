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
                <a  class="nav-link active" href="#">Dashboard</a>
              </li>
              <li @click="menu=5" class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
              </li>
              <li @click="menu=6"class="nav-item">
                <a class="nav-link" href="#">Tareas</a>
              </li>
              <li @click="menu=9" class="nav-item">
                <a class="nav-link" href="#">Milestones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Detalles</a>
              </li>
              <li @click="menu=11" class="nav-item">
                <a class="nav-link" href="#">Gastos</a>
              </li>
            </ul>
          </nav>
        
        <template v-if="menu==5">
           <usuarios-proyectos-component></usuarios-proyectos-component>
        </template>

        <template v-if="menu==6">
           <task-proyectos-component></task-proyectos-component>
        </template>

        <template v-if="menu==9">
           <milestones-proyectos-component></milestones-proyectos-component>
        </template>

        <template v-if="menu==11">
           <gastos-proyectos-component></gastos-proyectos-component>
        </template>



   

        
       </div>
  </div>
  </div>
</template>  


<script>
    export default {
      
       data()
       {
        return{
           menu : 0
         }
         
       }
    }
</script>

