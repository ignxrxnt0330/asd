// variables
// hacer en un futuro que se puedan ajustar los datos
let time = 60;
let uptime = 0;
let time_left;
let timer = null;
let acc = 0;    // accuracy
let acc_text = document.querySelector(".acc");
let ecount = 0; // error count
let charsTyped = 0;
let charsTypedQuote = 0;
let currQuote;
let quote = "";
let error_text = "";
let total_errors = 0;
let curr_input = 0;
let curr_input_array = 0;
let quote_words = quote.split(' ').length;
let words = 0;
let wpm = words/uptime; 
let gameModeSelect = document.getElementById("mode"); // coge el select del html
let gameModeOption = gameModeSelect.options[gameModeSelect.selectedIndex]; // pilla el que esta seleccionado
let gameMode = gameModeOption.text; // la variable gameMode es igual al seleccionado  

// let acc_text = document.querySelector(".curr_accuracy");
// let error_text = document.querySelector(".curr_errors");
// let cpm_text = document.querySelector(".curr_cpm");
let wpm_text = document.querySelector(".wpm");
let quote_text = document.querySelector(".quote");
let input_area = document.querySelector(".input_area");
let total_errors_text = document.querySelector(".ecount");
// let restart_btn = document.querySelector(".restart_btn");
// et cpm_group = document.querySelector(".cpm");
// let wpm_group = document.querySelector(".wpm");
// let error_group = document.querySelector(".errors");
// let accuracy_group = document.querySelector(".accuracy");
let time_left_text = document.querySelector(".time_left");

// event listener para el exc
input_area.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        reset();
    }
});

// event listener
input_area.addEventListener('keydown', (event) => {
    if (event.key === 'Delete') {
        charsTypedQuote--;
        charsTyped--;
        console.log('asd');
    }
});

function reset() {
    uptime = 0;
    time_left = time;
    ecount = 0;
    total_errors=0;
    charsTyped = 0;
    
    input_area.value = "";

    // reinicia las quotes  
    reiniciarQuote();
}

const url = "https://api.quotable.io/random"
function randomQuote() {
    return fetch(url) // hace fetch the la quote

    // pilla los datos que vienen en tablas json y los ordena
    .then(response => response.json())
    .then(data => data.content)
}

// async function => se ejecuta sin hacer esperar al resto del código, se ejecuta en paralelo al resto
// await => va con la async function y para la ejecución de la función hasta que se ejecute cierto código

async function nextQuote(){
    quote = await randomQuote();
    console.log(quote);
    quote_text.value = quote;
    quote.split('').forEach(char => {
    const charSpan = document.createElement('span'); // crea un span para cada letra

    if (char === ' ') { // comprueba que el char sea un espacio, y en ese caso crea un span con un espacio
    charSpan.innerHTML = '&nbsp;'; // espacio
    }
    else{
        charSpan.innerText = char ; // hace que el texto del spans sea la letra
    }
        quote_text.appendChild(charSpan); // hace que el span de los chars se metan dentro de el contenedor del texto
    })
    input_area.value = null; // borra el texto cuando se completa
}

function reiniciarQuote(){
    quote_text.innerText="";
    randomQuote();
    nextQuote();
}

function comprobarTextoAcabado(){
    if (curr_input.length == quote.length) {
    words+=quote_words;
    reiniciarQuote();
	total_errors += ecount;
	input_area.value = "";

}
}

function updateTimer(){
    if(time_left>0){
        time_left--;
        uptime++;
        time_left_text.innerText = time_left +"s";
        updateWPM();
    }
    else
        finishGame();
}

function updateWPM(){
    wpm = Math.round((((charsTyped / 5) / uptime) * 60))
    wpm_text.innerText = wpm +" wpm";
}

function updateErrors(){
    total_errors_text.innerText = (total_errors + ecount) +" errors"
}

function updateAcc(){
    let correctCharacters = (charsTyped - (total_errors + ecount));
    acc = ((correctCharacters / charsTyped) * 100);
    acc_text.innerText = Math.round(acc)+"%";
}

function startGame (){
    if(gameMode=="60s"){
        reset();
    clearInterval(timer);
    timer = setInterval(updateTimer, 1000);
    }
    else{
        endless();
    }
}

function finishGame(){
    clearInterval(timer);
    input_area.value="";
}



function processCurrentText() {
    console.log(total_errors)

// pilla el texto y lo divide, con el split(''), que divide todo el string por chars
curr_input = input_area.value;
curr_input_array = curr_input.split('');

// increment total characters typed
charsTypedQuote++;
charsTyped++;
ecount=0;

quoteSpanArray = quote_text.querySelectorAll('span');
quoteSpanArray.forEach((char, index) => {
	let typedChar = curr_input_array[index]

    if(curr_input_array[index]!=" "){
        // character not currently typed
	if (typedChar == null) {
	char.classList.remove('correct_char');
	char.classList.remove('incorrect_char');

	// char correcto, añade los spans a la clase correct_char
	} else if (typedChar === char.innerText) {
	char.classList.add('correct_char');
	char.classList.remove('incorrect_char');

	// char incorrecto, añade los spans a la clase incorrect_char
	} else{
	char.classList.add('incorrect_char');
	char.classList.remove('correct_char');
	// increment number of errors
    bien = false;
	ecount++;
    }
}

});
updateWPM();
updateErrors();
updateAcc();
comprobarTextoAcabado();

}

function updateTimerEndless(){
    uptime++;
    time_left_text.innerText = uptime +"s";
    updateWPM();
}

function endless(){
    reset();
    clearInterval(timer);
    timer = setInterval(updateTimerEndless, 1000);

}