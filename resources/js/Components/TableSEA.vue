<template>
<!-- TABLA PARA MOSTRAR LOS DATOS DE LOS CATALAGOS (SALA, ESTADO Y AREA)  ---
---                                                                       ---
---                                                                       --->
  <div class="container">
    <table class="table">
      <thead class="cabecera"> 
        <tr>
          <!--
          <th v-for="encabezado in arrayEncabezados" :key="encabezado.id">
            {{ encabezado.nombre }}   
          </th> --> 
          <th> ID </th>
          <th> Nombre </th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody class="cuerpo">
        <tr v-for="dato in arrayDatosPadre" :key="dato.id"> 
          <td v-text="dato.ide">  </td>
          <td v-text="dato.nombre">  </td> 
          <td>
            <button name="update" class="btn btn-green">Actualizar</button><span style="padding-left:10px;"></span>
            <button name="delete" class="btn btn-red"> Eliminar</button> 
          </td>
        </tr>
        <!--
         <tr>
          <td>1</td>
          <td>Externa</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Contaduria y Administración</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Informática</td>
        </tr> --> 
      </tbody>
    </table>
    <nav>
        <ul class="pagination">
          <li class="page-item" v-if="pagination.current_page > 1">
            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, buscar, criterio)">Anterior</a>
          </li>
          <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
            <a class="page-link" href="#" @click.prevent="cambiarPagina(page, buscar, criterio)" v-text="page"></a>
          </li>
          <li class="page-item" v-if="pagination.current_page < pagination.last_page">
            <a class="page-link" href="#" @click="cambiarPagina(pagination.current_page + 1, buscar, criterio)">Siguiente</a>
          </li>
        </ul>
    </nav> 
  </div>

  <br><br>
  <!-- Formulario de ejemplo para realizar registros!   ---
    --                                                  ---
    --   
                                                -->
    <div class="container col-md-6">
        <div class="form">
            <label>ID</label>
            <input v-model="ide" type="number" class="form-control" placeholder="Inserte el identificador (Debe ser un numero)"> <!-- este input estará relacionado con la variable id-->
            <label>Nombre</label>
            <input v-model="nombre" type="text" class="form-control" placeholder="Inserta el nombre"><!-- este input estará relacionado con la variable nombre-->
        </div><br>
          <button @click="Guardar()" class="btn btn-blue">Agregar</button><!--Este botón llama a la función guardar que hemos declarado en la parte script-->
    </div> -->
</template>

<script>
export default {
    props: {
        arrayDatosPadre: Array
    },
    data(){
      return{
        //arrayDatos: this.arrayDatosPadre, //Array que se recorre
       // ide:"",
       // nombre: "",
        pagination: {
                'total': 0, 
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
        } 
      }
    },/*
    methods:{
    Guardar(){
      var dato = {ide: this.ide, nombre:this.nombre} //creamos la variable encabezado, con la variable id y nombre 
      this.arrayDatos.push(dato);//añadimos en la variable encabezado al array
      //Limpiamos los campos
      this.ide="";
      this.nombre = "";
    },
  }*/
}
</script>