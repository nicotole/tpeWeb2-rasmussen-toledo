{include file="header.tpl"}

{foreach from=$peliculasConGenero_s item=peliculaConGenero}
    <div class="pelicula">
        <ul>
            <li>Nombre:<a href="visualizarItem/{$peliculaConGenero->titulo}"> {$peliculaConGenero->titulo} </a> </li>
            <li>Genero: {$peliculaConGenero->nombre}</li>
        </ul>
    </div>
{/foreach}            

{include file="footer.tpl"}
