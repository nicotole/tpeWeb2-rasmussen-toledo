{literal}
<div id="vue-comentarios">

    <!-- <ul id="comentarios-list" >-->
       <!--  <li-->
    <h2>Comentarios</h2>
    <div
        v-for="comentario in comentarios"
        class="pelicula"
        :data-id-comentarios="comentario.id"> 
        <!-- v-bind:class="{'list-group-item-success': task.completed == 1}" -->
        <!-- class="list-group-item">  -->
        <ul>
            <li>Usuario: {{ comentario.userName }}</li>
            <li>Comentario: {{ comentario.comentario}}</li>
            <li>Puntaje: {{comentario.puntaje}}</li>
        </ul>
    </div>
   <!--     </li>-->
   <!-- </ul>-->

</div>
{/literal}