console.log("El js está funcionando");
"use strict"

let app = new Vue({
    el: '#vue-comentarios',
    data: {
        comentarios: []  
    }
});

document.addEventListener('DOMContentLoaded', () => {
    getComentarios();
    // document.querySelector('#form-task').addEventListener('submit', e => {
    //     // evita el envio del form default
    //     e.preventDefault();

    //     addTask();
    // });

});

function getComentarios() {
    fetch('api/comentarios')
        .then(response => response.json())
        .then(comentarios => app.comentarios = comentarios)
        .catch(error => console.log(error));
}

// function addTask() {

//     const task = {
//         title: document.querySelector('input[name="input_title"]').value,
//         description: document.querySelector('input[name="input_description"]').value,
//         completed: document.querySelector('input[name="input_completed"]').checked,
//         priority: document.querySelector('input[name="input_priority"]').value
//     }

//     fetch('api/tareas', {
//         method: 'POST',
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify(task)
//     })
//         .then(response => response.json())
//         .then(task => app.tasks.push(task))
//         .catch(error => console.log(error));

// }
