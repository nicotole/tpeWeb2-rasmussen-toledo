{include file="header.tpl"}
<div class="pelicula" id="{$item_s->id}">
    <ul>
        <li>Nombre:{$item_s->titulo}</li>
        <li>Sinopsis:{$item_s->sinopsis}</li>
        <li>Duracion:{$item_s->duracion}</li>
        <li>Puntuacion:{$item_s->puntuacion}</li>
        <li>Precio:{$item_s->precio} rupias</li>
    </ul>
</div>
{* <div class="pelicula"> *}

{include file="vue/comentarios.vue"}
{if isset($UserName_s)}
    {include file="vue/comentarForm.vue"} 
{/if}


{* </div> *}
{* <script src="js/comentarios.js"></script> *}
<script src="js/visitante.js"></script>
{if (isset($superUser_s)) && (($superUser_s == 0) || ($superUser_s == 1))}
    <script src="js/usuario.js"></script>
    {* {if $superUser_s == 1}
        <script src="js/admin.js"></script>
    {/if} *}
{/if}
{include file="footer.tpl"}