
    <section class="contenedorPrincipalRegistro"> <!-- usar un section si el contenido puede ser guardado en una DB -->
    <article class="contenedorRegistro">
        <form autocomplete="off" class="formularioRegistro" id="form-comentario" method="POST">
            <div class="inputs">
                <input type="hidden" name="id_pelicula" value="{$item_s->id}">
                <input type="hidden" name="id_usuario" value="{$UserId_s}">
                <textarea name="comentario" rows="10" cols="50" placeholder=" Tu comentario..."></textarea>
                <input type="number" name="puntaje" placeholder=" puntaje" class="input">
            </div>
            <div class="contenedorBotonesRegistro">
                <button type="submit" class="botonVisible">Comentar</button>
            </div>
        </form>
    </article>
    </section>
