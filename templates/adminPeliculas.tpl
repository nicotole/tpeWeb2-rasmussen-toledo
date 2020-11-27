{include file="header.tpl"}
{foreach from=$peliculas_s item=pelicula}
    {if (isset($id_pelicula_s)) && ($id_pelicula_s == $pelicula->id) }
        <div class="pelicula">
            <form autocomplete="off" class="formularioRegistro" method="POST" action="guardarPelicula/{$pelicula->id}" enctype="multipart/form-data">
                <div class="inputs">
                <img src="{$pelicula->imagen}" alt="imgen de la pelicula" class="PeliculasDelUsuario">
                    <input type="text" name="titulo" value="{$pelicula->titulo}" class="input">
                    <select name="genero">
                    {foreach from=$generos_s item=genero}
                        <option value="{$genero->nombre}">{$genero->nombre}</option>
                    {/foreach}
                    </select>
                    <input type="text" name="sinopsis" value="{$pelicula->sinopsis}" class="input">
                    <input type="text" name="duracion" value="{$pelicula->duracion}" class="input">
                    <input type="number" name="puntuacion" value="{$pelicula->puntuacion}" class="input">
                    <input type="number" name="precio" value="{$pelicula->precio}" class="input">
                    <p>Para remplaza la imagen deberas seleccionar un nuevo archivo</p>
                    <p>Solo se aceptan peliculas en formato "jpg" y "jpeg"</p>
                    <input type="file" name="imagen" accept=".jpg , .jpeg">
                </div>
                <button type="submit" class="botonVisible">Guardar</button>
            </form>
        </div>
    {else}
        <div class="pelicula">
        <img src="{$pelicula->imagen}" alt="imgen de la pelicula" class="PeliculasDelUsuario">
            <ul>
                <li>Titulo: {$pelicula->titulo}</li>
                <li>Genero: {$pelicula->nombre}</li>
                <li>Sinopsis: {$pelicula->sinopsis}</li>
                <li>Duracion: {$pelicula->duracion}</li>
                <li>Puntuacion: {$pelicula->puntuacion}/5</li>
                <li>Precio: {$pelicula->precio} Rupias</li>
            </ul>
                <button type="submit" class="botonVisible"> <a href="borrar/{$pelicula->id}"> Borrar </a> </button>
                <button type="submit" class="botonVisible"> <a href="editar/{$pelicula->id}"> Editar </a> </button>
        </div>
    {* } *}
    {/if}
{/foreach}
<section class="contenedorPrincipalRegistro">
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" method="POST" action="subirPelicula" enctype="multipart/form-data">
            <div class="inputs">
                <input type="text" name="titulo" placeholder=" Titulo" class="input">
                <select name="genero">
                    {foreach from=$generos_s item=genero}
                        <option value="{$genero->nombre}">{$genero->nombre}</option>
                    {/foreach}
                </select>
                <input type="text" name="sinopsis" placeholder=" Sinopsis" class="input" required>
                <input type="text" name="duracion" placeholder=" Duracion" class="input" required>
                <input type="number" name="puntuacion" placeholder=" Puntuacion" class="input" required>
                <input type="number" name="precio" placeholder=" Precio en Rupias" class="input" required>
                <p>Solo se aceptan peliculas en formato "jpg" y "jpeg"</p>
                <input type="file" name="imagen" accept=".jpg , .jpeg" required>
            </div>
            <button type="submit" class="botonVisible">Subir</button>
        </form>
        
    </article>
</section>
{include file="footer.tpl"}
