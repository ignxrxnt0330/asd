const titulo = document.getElementById('titulo')
const descripcion = document.getElementById('descripcion')
const fecha = document.getElementById('fecha')


displayItems();
function displayItems(){
    fetch('../php/displayItems.php')
    .then(response => response.json())
    .then(data => {
        // Display the data on the webpage
        const asd = document.getElementById('asd');
        data.forEach(item => {
            const divTitulo = document.createElement('div');
            divTitulo.innerText = item.titulo;
            
            const divTexto = document.createElement('div');
            divTExto.innerText = item.descripcion;
            
            const divFecha = document.createElement('div');
            divFecha.innerText = item.fecha;

            const itemDiv = document.createElement('div');
            itemDiv.setAttribute('id', 'todolist_item');

            itemDiv.appendChild('divTitulo')
            itemDiv.appendChild('divTexto')
            itemDiv.appendChild('divFecha')

            const itemA = document.createElement('a')

            itemA.appendChild(itemDiv);
            asd.appendChild('itemA')
        });
    })
    .catch(error => console.error(error));
}

function completar(){

}

function descompletar(){

}

function nuevoItem(){

}


function clearForm(){
    titulo.innerText="";
    descripcion.innerText="";
    fecha.innerText="";
}


