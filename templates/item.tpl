{include file="header.tpl"}
<div class="pelicula">
    <ul>
        <li>Nombre:{$item_s->titulo}</li>
        <li>Sinopsis:{$item_s->sinopsis}</li>
        <li>Duracion:{$item_s->duracion}</li>
        <li>Puntuacion:{$item_s->puntuacion}</li>
        <li>Precio:{$item_s->precio} rupias</li>
    </ul>
</div>
<div class="pelicula">
    {include file="vue/comentarios.vue"}
</div>
<script src="js/comentarios.js"></script>
{include file="footer.tpl"}