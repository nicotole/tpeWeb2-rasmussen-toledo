{include file="header.tpl"}
{foreach from=$generos_s item=genero}
    <a href="visualizarGenero/{$genero->nombre}"> <h2>{$genero->nombre} </h2></a>
{/foreach}
{include file="footer.tpl"}