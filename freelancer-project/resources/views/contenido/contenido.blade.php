@extends ('principal')
@section ('contenido')

<template v-if="menu==0">
  <dashboard-component> </dashboard-component>
</template>

<template v-if="menu==1">
  <pagos-component> </pagos-component>
</template>


<template v-if="menu==2">
  <usuarios-component> </usuarios-component>
</template>

<template v-if="menu==3">
  <proyectos-component></proyectos-component>
</template>

<template v-if="menu==4">
  <dashboard-proyectos-component></dashboard-proyectos-component>
</template>

<template v-if="menu==5">
  <usuarios-proyectos-component></usuarios-proyectos-component>
</template>

<template v-if="menu==6">
  <task-proyectos-component></task-proyectos-component>
</template>

<template v-if="menu==7">
  <roles-component> </roles-component>
</template>

<template v-if="menu==8">
  <pagos_usuarios-component> </pagos_usuarios-component>
</template>

<template v-if="menu==9">
  <milestones-proyectos-component></milestones-proyectos-component>
</template>

<template v-if="menu==10">
  <issues-proyectos-component></issues-proyectos-component>
</template>

<template v-if="menu==11">
  <gastos-proyectos-component></gastos-proyectos-component>
</template>


<template v-if="menu==12">
  <personas-component> </personas-component>
</template>





@endsection
