{literal}
    <section class="contenedorPrincipalRegistro"> <!-- usar un section si el contenido puede ser guardado en una DB -->
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" action="postearComentario" method="POST">
            <div class="inputs">
                <textarea name="comentario" rows="10" cols="50" placeholder=" Tu comentario..."></textarea>
                <input type="number" name="puntaje" placeholder=" puntaje" class="input">
            </div>
            <div class="contenedorBotonesRegistro">
                <button type="submit" class="botonVisible">Comentar</button>
            </div>
        </form>
    </article>
    </section>
{/literal}