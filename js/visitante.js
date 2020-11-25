// console.log("El js está funcionando");
"use strict"

let app = new Vue({
    el: '#vue-comentarios',
    data: {
        superUser: -1,
        comentarios: []  
    },
    methods: {
        deleteComentario: function(idComentario){
            borrarComentario(idComentario);
        }
    }

});

document.addEventListener('DOMContentLoaded', () => {
    getComentarios();

    //document.querySelector('#form-comentario').addEventListener('submit', addComentario);

});
{/* <li>Nombre:{$item_s->titulo}</li> */}
function getComentarios() {
    let id_pelicula = document.querySelector('input[name=id_pelicula]').value;
    //console.log(id_pelicula);
    //console.log('api/comentarios/peliculas/'+ id_pelicula);
                //comentarios/peliculas/:ID
    fetch('api/comentarios/peliculas/'+ id_pelicula)
    //if(isset(response)){
        //.then(response => {if(response.status != 404){ ( (response => response.json()).then(comentarios => app.comentarios = comentarios))}})
        .then(response => response.json())
        .then(response => {if(response != null){ (comentarios => app.comentarios = comentarios)}})
    //.then(comentarios => app.comentarios = comentarios)
    .catch(error => console.log(error));
    //}
}
/*
function addComentario(e) {
    e.preventDefault();
    //holis
     const comentario = {
        //id_libro: document.querySelector("input[name=libroId]").value,
        id_pelicula: document.querySelector('input[name=id_pelicula]').value,
        id_usuario: document.querySelector('input[name=id_usuario]').value
         //completed: document.querySelector('input[name="input_completed"]').checked,
         //priority: document.querySelector('input[name="input_priority"]').value
        }
        console.log(comentario);
        console.log(id_pelicula);
        console.log(id_usuario);
        
//     fetch('api/tareas', {
//         method: 'POST',
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify(task)
//     })
//         .then(response => response.json())
//         .then(task => app.tasks.push(task))
//         .catch(error => console.log(error));

}*/
