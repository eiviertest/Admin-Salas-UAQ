<template>
<!-- TABLA PARA MOSTRAR LOS DATOS DE LAS SOLICITUDES  ---
---                                                                       ---
---                                                                       --->
  <div class="container">
    <table class="table">
      <thead class="cabecera"> 
        <tr>
          <th> ID </th>
          <th> Ruta Solicitud </th>
          <th> Nombre Sala </th>
          <th> Nombre Solicitante </th>
          <th> Estado </th>
          <th> Fecha de Solicitud </th>
          <th> Hora de Inicio </th>
          <th> Hora de Termino </th>
          <th> Acciones </th>
        </tr>
      </thead>
      <tbody class="cuerpo">
        <tr v-for="solicitud in arraySolicitudes" :key="solicitud.id"> 
          <td v-text="solicitud.ide">  </td>
          <td v-text="solicitud.ruta"> </td>
          <td v-text="solicitud.sala"> </td>
          <td v-text="solicitud.nombreSolicitante">  </td> 
          <td v-text="solicitud.estado"> </td>
          <td v-text="solicitud.fecha"> </td>
          <td v-text="solicitud.horaInicio"> </td>
          <td v-text="solicitud.horaFin"> </td>
          <td>
            <button name="update" class="btn btn-green">Aceptar</button><span style="padding-left:10px;"></span>
            <button name="delete" class="btn btn-red"> Rechazar</button> 
          </td>
        </tr>
        <!--
         <tr>
          <td>1</td>
          <td>Externa</td>
        </tr> 
        -->
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
    --                                                  -->
    <div class="container col-md-6">
        <div class="form">
            <label>ID</label>
            <input v-model="ide" type="number" class="form-control" placeholder="Inserte el identificador (Debe ser un numero)"> <!-- este input estará relacionado con la variable id-->
            <label>Ruta</label>
            <input v-model="ruta" type="text" class="form-control" placeholder="Inserta el nombre"><!-- este input estará relacionado con la variable nombre-->
            <label>Sala</label>
            <input v-model="sala" type="text" class="form-control" placeholder="Inserte la sala que desea reservar (A o B)"> <!-- este input estará relacionado con la variable id-->
            <label>Nombre del Solicitante</label>
            <input v-model="nombreSolicitante" type="text" class="form-control" placeholder="Nombre del solicitante"><!-- este input estará relacionado con la variable nombre-->
            <label>Estado</label>
            <input v-model="estado" type="text" class="form-control" placeholder="Estado de la solicitud (Pendiente - Rechazado o Aceptado)"> <!-- este input estará relacionado con la variable id-->
            <label>Fecha</label>
            <input v-model="fecha" type="text" class="form-control" placeholder="Inserta la fecha de la solicitud"><!-- este input estará relacionado con la variable nombre-->
            <label>Hora de Inicio</label>
            <input v-model="horaInicio" type="text" class="form-control" placeholder="Inserte la hora de inicio de la reservación"> <!-- este input estará relacionado con la variable id-->
            <label>Hora de Termino</label>
            <input v-model="horaFin" type="text" class="form-control" placeholder="Inserte la hora de termino de la reservación"><!-- este input estará relacionado con la variable nombre-->
        </div><br>
          <button @click="Guardar()" class="btn btn-blue">Agregar</button><!--Este botón llama a la función guardar que hemos declarado en la parte script-->
    </div>
</template>

<script>
export default {
    props: {
        arrayEncabezados: Array,
        arraySolicitudes: Array
    },
    data(){
      return{
        arraySolicitudes:[], //Array que se recorre
        ide:"",
        ruta: "",
        sala: "",
        nombreSolicitante:"",
        estado:"",
        fecha:"",
        horaInicio:"",
        horaFin: "",
        pagination: {
                'total': 0, 
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
        } 
      }
    },
    methods:{
    Guardar(){
      var dato = {ide: this.ide, ruta:this.ruta, sala:this.sala, nombreSolicitante:this.nombreSolicitante, estado:this.estado, fecha:this.fecha, horaInicio:this.horaInicio, horaFin:this.horaFin } //creamos la variable encabezado, con la variable id y nombre 
      this.arraySolicitudes.push(dato);//añadimos en la variable encabezado al array
      //Limpiamos los campos
      this.ide="";
      this.ruta = "";
      this.sala ="";
      this.nombreSolicitante="";
      this.estado="";
      this.fecha="";
      this.horaInicio="";
      this.horaFin="";
    },
  }
}
</script>