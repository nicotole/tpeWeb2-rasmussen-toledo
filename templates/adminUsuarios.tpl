{include file="header.tpl"}

{foreach from=$usuarios_s item=usuario}
    <div class="pelicula" >
        <ul>
            <li>Nombre de usuario: {$usuario->userName}</li>
            <li>Email: {$usuario->email}</li>
            
            <li>Tipo de usuario: {if $usuario->superUser == 0} No-administrador {elseif $usuario->superUser == 1 } Administrador {/if}</li>
        </ul>
        {if $usuario->superUser == 0}
            <button type="submit" class="botonVisible"> <a href="administrador/{$usuario->id}">Administrador</a> </button>
        {elseif $usuario->superUser == 1}
            <button type="submit" class="botonVisible"> <a href="no-administrador/{$usuario->id}">No-administrador</a> </button>
        {/if}
            <button type="submit" class="botonVisible"> <a href="borrarUsuario/{$usuario->id}"> Borrar </a> </button>
    </div>
{/foreach}

{include file="footer.tpl"} 