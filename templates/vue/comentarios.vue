{literal}
<div id="vue-comentarios">

    <ul id="comentarios-list" >
        <li
            v-for="comentario in comentarios"
            :data-id-comentarios="comentario.id"> 
            <!-- v-bind:class="{'list-group-item-success': task.completed == 1}" -->
            <!-- class="list-group-item">  -->
            
            {{ comentario.userName }} - {{ comentario.comentario}} - {{comentario.puntaje}}
        </li>
    </ul>

</div>
{/literal}