@extends ('principal')
@section ('contenido')

<template v-if="menu==0">
  <dashboard-component> </dashboard-component>
</template>

<template v-if="menu==1">
  <usuarios-component> </usuarios-component>
</template>

<template v-if="menu==3">
  <pagos-component> </pagos-component>
</template>



@endsection
