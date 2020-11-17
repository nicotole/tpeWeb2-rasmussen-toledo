{include file="header.tpl"}
<section class="contenedorPrincipalRegistro"> <!-- usar un section si el contenido puede ser guardado en una DB -->
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" action="registrarUsuario" method="POST">
            <div class="inputs">
                <input type="text" name="userName" placeholder=" Nombre de Usuario" class="input">
                <input type="email" name="email" class="input" placeholder="email@dominio.com"> 
                <input type="password" name="contraseña" placeholder=" Contraseña" class="input">
            </div>
            <div class="contenedorBotonesRegistro">
                <button type="submit" class="botonVisible">Registrarse</button>
            </div>
        </form>
        
    </article>
</section>
{include file="footer.tpl"}