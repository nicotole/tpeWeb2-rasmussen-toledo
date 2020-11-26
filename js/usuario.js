app.superUser = 0;

//console.log("holiiiis soy usuario");


document.addEventListener('DOMContentLoaded', () => {

    document.querySelector('#form-comentario').addEventListener('submit', addComentario);

});


function addComentario(e) {
    e.preventDefault();
    //holis
    let comentario = {
       //id_libro: document.querySelector("input[name=libroId]").value,
       id_pelicula: document.querySelector('input[name=id_pelicula]').value,
       id_usuario: document.querySelector('input[name=id_usuario]').value,
       puntaje: document.querySelector("input[name=puntaje]").value,
       comentario: document.querySelector("textarea[name=comentario]").value
       }
       //console.log(id_usuario);
    fetch('api/comentarios', {
       method: 'POST',
       headers: { "Content-Type": "application/json" },
       body: JSON.stringify(comentario)
    })
    .then( () => {getComentarios();})
    .catch(error => console.log(error));
}



// fetch('api/comentarios', {
//     method: 'POST',
//     headers: {'Content-Type': 'application/json'},       
//     body: JSON.stringify(data) 
// })
// .then(response => {getComentarios();
// })
// .catch(error => console.log(error));