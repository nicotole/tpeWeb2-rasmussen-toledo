{include file="header.tpl"}
{foreach from=$peliculas_s item=pelicula}
    <div class="pelicula">
        <ul>
            <li>Nombre: {$pelicula->titulo}</li>
            <li>Genero: {$pelicula->nombre}</li>
            <li>Sinopsis: {$pelicula->sinopsis}</li>
            <li>Duracion: {$pelicula->duracion}</li>
            <li>Puntuacion: {$pelicula->puntuacion}/5</li>
            <li>Precio: {$pelicula->precio} rupias</li>
        </ul>
            <button type="submit" class="botonVisible"> <a href="borrar/{$pelicula->id}"> Borrar </a> </button>
            <button type="submit" class="botonVisible"> <a href="borrar/{$pelicula->id}"> Editar </a> </button>
    </div>
{/foreach}
{include file="footer.tpl"}
