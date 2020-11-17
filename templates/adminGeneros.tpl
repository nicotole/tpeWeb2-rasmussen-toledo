{include file="header.tpl"}
<h2><span>IMPORTANTE:</span> Cuando se borre un genero tambien seran borradas las peliculas que lo contengan </h2>
{foreach from=$generos_s item=genero}
    {if (isset($id_genero_s)) && ($id_genero_s == $genero->id_genero) }
        <div class="pelicula">
            <form autocomplete="off" class="formularioRegistro" method="POST" action="guardarGenero/{$genero->id_genero}">
                <input type="text" name="nombre" value=" {$genero->nombre}" class="input"> 
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
