// variables
// hacer en un futuro que se puedan ajustar los datos
let time = 60;
let uptime = 0;
let time_left;
let timer = null;
let quote_infinite_update = null;
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
let quote_words = quote.split(" ").length;
let words = 0;
let wpm = 0;
let gameModeSelect = document.getElementById("mode"); // coge el select del html
let gameModeOption = gameModeSelect.options[gameModeSelect.selectedIndex]; // pilla el que esta seleccionado
let gameMode = gameModeOption.text; // la variable gameMode es igual al seleccionado  

let wpm_text = document.querySelector(".wpm");
let input_area = document.querySelector(".input_area");
let total_errors_text = document.querySelector(".ecount");
let time_left_text = document.querySelector(".time_left");
let quoteContainer = document.querySelector(".quote")
let quote_text;





// event listener para el esc 
input_area.addEventListener("keydown", function (event) {
    if (event.key === "Escape" || event.keyCode === 27) {
        event.preventDefault();
        reiniciarQuote();
        input_area.value = null; // lo pongo aquí porque he anulado el del nextQuote
    }
});


input_area.addEventListener("keydown", function (event) { // hard reset
    if (event.key === "Escape" || event.keyCode === 27) {
        if (event.keyCode == "27" && event.shiftKey) {
            event.preventDefault();
            reset();
            input_area.value = null;
        }
    }
});

input_area.addEventListener("keydown", function (event) {
    if (event.key === "Delete" || event.keyCode === 46) { //delete
        charsTypedQuote--;
        charsTyped--;
    }
});



function reset() {
    uptime = 0;
    time_left = time;
    ecount = 0;
    total_errors = 0;
    charsTyped = 0;

    input_area.value = "";

    // reinicia las quotes  
    reiniciarQuote();
}

const url = "https://api.quotable.io/random"
function randomQuote() {
    return fetch(url)                   // hace fetch the la quote y lo devuelve
        .then(response => response.json())  // pilla los datos y los convierte en json, de donde se extraerán los datos
        .then(data => data.content)         // extrae el campo llamado "content", que es lo importante
}

// los .then realizan acciones con el código que tienen encima

// async function => se ejecuta sin hacer esperar al resto del código, se ejecuta en paralelo al resto
// await => va con la async function y para la ejecución de la función hasta que se ejecute cierto código

async function nextQuote() {
    quote = await randomQuote() + " ";
    console.log(quote)
    quote_text+=quote;
    quote.split("").forEach(char => {
        const charSpan = document.createElement("span"); // crea un span para cada letra
        charSpan.classList.add('letra');
        if (char == " ") { // comprueba que el char sea un espacio, y en ese caso crea un span con un espacio
            charSpan.innerHTML = "&nbsp;"; // espacio
            charSpan.classList.add('espacio');
        }
        else {
            charSpan.innerText = char; // hace que el texto del span sea la letra
        }
        quoteContainer.appendChild(charSpan); // hace que el span de los chars se metan dentro de el contenedor del texto
    })
    
}

function reiniciarQuote() {
    while (quoteContainer.firstChild) {
        quoteContainer.removeChild(quoteContainer.firstChild);
      }
    quote_text = "";
    nextQuote();
}

function appendQuote() {
    nextQuote();
}


function comprobarTextoAcabado() {
    if (untyped_chars == 10) {
        words += quote_words;
        appendQuote();
        total_errors += ecount;
    }
}

function updateTimer() {
    if (time_left > 0) {
        time_left--;
        uptime++;
        time_left_text.innerText = time_left + "s";
        updateWPM();
    }
    else
        finishGame();
}

function updateWPM() {
    wpm = Math.round((((charsTyped / 5) / uptime) * 60))
    wpm_text.innerText = wpm + " wpm";
}

function updateErrors() {
    total_errors_text.innerText = (total_errors + ecount) + " errors"
}

function updateAcc() {
    let correctCharacters = (charsTyped - (total_errors + ecount));
    acc = ((correctCharacters / charsTyped) * 100);
    acc_text.innerText = Math.round(acc) + "% acc";
}

function startGame() {
    if (gameMode == "60s") {
        reset();
        clearInterval(timer);
        timer = setInterval(updateTimer, 1000);
    }
    else {
        endless();
    }
}

function finishGame() {
    clearInterval(timer);
    input_area.value = "";
}



function processCurrentText() {
    // pilla el texto y lo divide, con el split(""), que divide todo el string por chars
    curr_input = input_area.value;
    curr_input_array = curr_input.split("");

    // increment total characters typed
    charsTypedQuote++;
    charsTyped++;
    ecount = 0;
    
    untyped_chars = quote_text.length - charsTypedQuote;


    quoteSpanArray = quoteContainer.querySelectorAll("span");
    quoteSpanArray.forEach((char, index) => {
        char.classList.remove("sig_char");
        let typedChar = curr_input_array[index]



        if (typedChar == null) {
            char.classList.remove("correct_char");
            char.classList.remove("incorrect_char");

            // char correcto, añade los spans a la clase correct_char
        } else if (typedChar == char.innerText) {
            char.classList.add("correct_char");
            char.classList.remove("incorrect_char");

            // char incorrecto, añade los spans a la clase incorrect_char
        } else {
            if (!char.classList.contains('espacio')) {
                char.classList.add("incorrect_char");
                char.classList.remove("correct_char");
                ecount++;
            }
        }
        if (index == (curr_input_array.length)) {
            char.classList.add("sig_char");
        }



        if (typedChar == " " && quoteSpanArray[index].innerText == " ") {
            char.classList.add("correct_char");
            char.classList.remove("incorrect_char");
        }

    });
    updateWPM();
    updateErrors();
    updateAcc();
    comprobarTextoAcabado();
    if (charsTyped > 30) {
        scroll();
    }
}
    function scroll() {

        const wordsWrapperWidth = ((
            document.querySelector(".letra")
          )).offsetWidth;

        quoteContainer.scrollLeft += wordsWrapperWidth;

    }

    function updateTimerEndless() {
        uptime++;
        time_left_text.innerText = uptime + "s";
        updateWPM();
    }

    function endless() {
        reset();
        clearInterval(timer);
        timer = setInterval(updateTimerEndless, 1000);

    }