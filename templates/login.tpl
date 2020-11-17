{include file="header.tpl"}
<section class="contenedorPrincipalRegistro"> <!-- usar un section si el contenido puede ser guardado en una DB -->
    <article class="contenedorRegistro">
        <form action="verifyUser" method="POST" autocomplete="off"  class="formularioRegistro">
            <div class="inputs">
                <input name="input_mail" type="email" class="input" placeholder=" email@dominio.com"> 
                <input name="input_password" type="password" placeholder=" Contraseña" class="input">
            </div>
            <button type="submit" class="botonVisible">Entrar</button>
        </form>
        <p> {$mensaje_s} </p>
    </article>
</section>
{include file="footer.tpl"}