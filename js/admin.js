"use strict";

app.superUser = 1;


//  document.addEventListener('DOMContentLoaded', () => {

//      deleteComentario();
//  });

function borrarComentario($id){
    //console.log("holiiis estoy en deleteComentario");
    fetch('api/comentarios/' + $id,{
        method: 'DELETE'
    })
    .then(response => {getComentarios();
    })
    //.then(response => response.json())  .then(comentario => app.comentarios.push(comentario))
    .catch(error => console.log(error));
}


// let url = 'api/comentarios/' + idComentario;
// fetch(url, {
//     method: 'DELETE'
// })
// .then(response => {getComentarios();
// })
// .catch(error => console.log(error));