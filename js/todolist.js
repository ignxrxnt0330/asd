function createNewItem(){
    let titulo = document.querySelector(".input_title");
    let desc = document.querySelector(".input_desc");
    let fecha = document.querySelector(".input_date");
    addItemDB(titulo,desc,fecha);
    createElements();
}

function addItemDB(titulo,desc,fecha){
        $.ajax({
            type: 'POST',
            url: 'http://localhost/php/new_item_tdl.php',
            data: { titulo: titulo.value ,
                    descripcion: desc.value ,
                    fecha: fecha.value },
            success: function (response) {
                console.log(response);
                console.log("Item added correctly");
            },
            error: function (error) {
                console.error("Error adding item: " + error);
            }
        });
        titulo.value="";
        desc.value="";
        fecha.value="";
}

function completeItem(id){
        $.ajax({
            type: 'GET',
            url: 'http://localhost/php/complete_tdl.php',
            data: { id:id},
            success: function (response) {
                console.log(response);
                console.log("Item added correctly");
            },
            error: function (error) {
                console.error("Error adding item: " + error);
            }
        });
        titulo.value="";
        desc.value="";
        fecha.value="";
}

function createElements(){
    let asd = document.querySelector('#asd');
    asd.textContent ="";
}

function getItems(){

}