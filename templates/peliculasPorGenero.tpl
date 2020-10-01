{include file="header.tpl"}
<h2>{$genero_s}</h2>

{foreach from=$peliculasPorGenero_s item=peliculaPorGenero}
    <div class="pelicula">
        <ul>
            <li>Nombre: {$peliculaPorGenero->titulo}</li>
            <li>Sinopsis: {$peliculaPorGenero->sinopsis}</li>
            <li>Duracion: {$peliculaPorGenero->duracion}</li>
            <li>Puntuacion: {$peliculaPorGenero->puntuacion}/5</li>
            <li>Precio: {$peliculaPorGenero->precio} rupias</li>
        </ul>
    </div>
{/foreach}

{include file="footer.tpl"}