{include file="header.tpl"}
{foreach from=$peliculas_s item=pelicula}
    {if (isset($id_pelicula_s)) && ($id_pelicula_s == $pelicula->id) }
        <div class="pelicula">
            <form autocomplete="off" class="formularioRegistro" method="POST" action="guardarPelicula/{$pelicula->id}">
                <div class="inputs">
                    <input type="text" name="titulo" placeholder=" Titulo" class="input">
                    <select name="genero">
                    {foreach from=$generos_s item=genero}
                        <option value="{$genero->nombre}">{$genero->nombre}</option>
                    {/foreach}
                    </select>
                    <input type="text" name="sinopsis" placeholder=" Sinopsis" class="input">
                    <input type="text" name="duracion" placeholder=" Duracion" class="input">
                    <input type="number" name="puntuacion" placeholder=" Puntuacion" class="input">
                    <input type="number" name="precio" placeholder=" Precio en Rupias" class="input">
                </div>
                <button type="submit" class="botonVisible">Guardar</button>
            </form>
        </div>
    {else}
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
                <button type="submit" class="botonVisible"> <a href="editar/{$pelicula->id}"> Editar </a> </button>
        </div>
    {* } *}
    {/if}
{/foreach}
<section class="contenedorPrincipalRegistro">
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" method="POST" action="subirPelicula">
            <div class="inputs">
                <input type="text" name="titulo" placeholder=" Titulo" class="input">
                <select name="genero">
                    {foreach from=$generos_s item=genero}
                        <option value="{$genero->nombre}">{$genero->nombre}</option>
                    {/foreach}
                </select>
                <input type="text" name="sinopsis" placeholder=" Sinopsis" class="input">
                <input type="text" name="duracion" placeholder=" Duracion" class="input">
                <input type="number" name="puntuacion" placeholder=" Puntuacion" class="input">
                <input type="number" name="precio" placeholder=" Precio en Rupias" class="input">
            </div>
            <button type="submit" class="botonVisible">Subir</button>
        </form>
        
    </article>
</section>
<hr>
<h2><span>IMPORTANTE:</span> Cuando se borre un genero tambien seran borradas las peliculas que lo contengan </h2>
{foreach from=$generos_s item=genero}
    {if (isset($id_genero_s)) && ($id_genero_s == $genero->id_genero) }
        <div class="pelicula">
            <form autocomplete="off" class="formularioRegistro" method="POST" action="guardarGenero/{$genero->id_genero}">
                <input type="text" name="nombre" placeholder=" Nombre de genero" class="input"> 
                <button type="submit" class="botonVisible">Guardar</button>
            </form>
        </div>
    {else}
        <div class="pelicula">
            <a href="visualizarGenero/{$genero->nombre}"> <h2>{$genero->nombre} </h2> </a>
            <button type="submit" class="botonVisible"> <a href="borrarGenero/{$genero->id_genero}"> Borrar </a> </button>
            <button type="submit" class="botonVisible"> <a href="editarGenero/{$genero->id_genero}"> Editar </a> </button>
        </div>
    {/if}
{/foreach}
<section class="contenedorPrincipalRegistro">
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" method="POST" action="subirGenero">
            <div class="inputs">
                <input type="text" name="nombre" placeholder=" Nombre del genero nuevo" class="input">
            </div>
            <button type="submit" class="botonVisible">Subir</button>
        </form>
        
    </article>
</section>

{include file="footer.tpl"}
