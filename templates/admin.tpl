{include file="header.tpl"}
{foreach from=$peliculas_s item=pelicula}
    <div class="pelicula">
        <ul>
            <li>Titulo: {$pelicula->titulo}</li>
            <li>Genero: {$pelicula->nombre}</li>
            <li>Sinopsis: {$pelicula->sinopsis}</li>
            <li>Duracion: {$pelicula->duracion}</li>
            <li>Puntuacion: {$pelicula->puntuacion}/5</li>
            <li>Precio: {$pelicula->precio} Rupias</li>
        </ul>
            <button type="submit" class="botonVisible"> <a href="borrar/{$pelicula->id}"> Borrar </a> </button>
            <button type="submit" class="botonVisible"> <a href="borrar/{$pelicula->id}"> Editar </a> </button>
    </div>
{/foreach}
<section class="contenedorPrincipalRegistro">
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" method="POST" action="subirPelicula">
            <div class="inputs">
                <input type="text" name="titulo" placeholder=" Titulo" class="input">
                <input type="text" name="genero" placeholder=" Genero" class="input">
                <input type="text" name="sinopsis" placeholder=" Sinopsis" class="input">
                <input type="text" name="duracion" placeholder=" Duracion" class="input">
                <input type="number" name="puntuacion" placeholder=" Puntuacion" class="input">
                <input type="number" name="precio" placeholder=" Precio en Rupias" class="input">
            </div>
            <button type="submit" class="botonVisible">Subir</button>
        </form>
        
    </article>
</section>
{include file="footer.tpl"}
