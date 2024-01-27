// html elements
let wpm_text = document.querySelector('.wpm');
let input_area = document.querySelector('.input_area');
let total_errors_text = document.querySelector('.ecount');
let time_left_text = document.querySelector('.time_left');
let quoteContainer = document.querySelector('.quote')
let acc_text = document.querySelector('.acc');
let gameModeSelect = document.getElementById("mode");

const letter_width = document.getElementsByClassName("letra")[0].offsetWidth;

// variables
let time = 60;
let uptime = 0;
let time_left;
let timer = null;
let acc = 0;    // accuracy
let ecount = 0; // error count
let charsTyped = 0;
let quote = "";
let error_text = "";
let total_errors = 0;
let curr_input = 0;
let curr_input_array = 0;
let untyped_chars = 0;
let quote_text;
let wpm = 0;
let gameModeOption = gameModeSelect.options[gameModeSelect.selectedIndex];
let gameMode = gameModeOption.text;
let cooldown = false;

input_area.addEventListener("keydown", function (event) {
    switch (event.key) {
        case "Escape":
            if (event.shiftKey) {
                event.preventDefault();
                reset();
                input_area.value = null;
            }
            else {
                event.preventDefault();
                resetQuote();
                input_area.value = null;
            }
            break;
        case "Delete":
            event.preventDefault();
            console.log("asd");
            scrollDelete();
            break;
    }

});

function endless() {
    reset();
    clearInterval(timer);
    timer = setInterval(updateTimerEndless, 1000);
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

function reset() {
    uptime = 0;
    time_left = time;
    ecount = 0;
    total_errors = 0;
    charsTyped = 0;
    acc_text.innerText = "0% acc";
    total_errors_text.innerText = "0 errors";
    input_area.value = "";
    resetQuote();
}

function randomQuote() {
    return fetch("https://api.quotable.io/random")                   // hace fetch the la quote y lo devuelve
        .then(response => response.json())  // pilla los datos y los convierte en json, de donde se extraerán los datos
        .then(data => data.content)         // extrae el campo llamado "content", que es lo importante
    // data.lenght -> lenght of the quote, could be useful 
}

// los .then realizan acciones con el código que tienen encima, como los || en linux, van con el fech

// async function => se ejecuta sin hacer esperar al resto del código, se ejecuta en paralelo al resto
// await => va con la async function y para la ejecución de la función hasta que se ejecute cierto código

async function nextQuote() {
    quote = await randomQuote() + " ";
    console.log(quote)
    quote_text += quote;
    quote.split("").forEach(char => {
        const charSpan = document.createElement("span"); // crea un span para cada letra
        charSpan.classList.add('letra');

        if (char == " ") { // comprueba que el char sea un espacio, y en ese caso crea un span con un espacio
            charSpan.innerHTML = "&nbsp;"; // space
            charSpan.classList.add('space');
            charSpan.classList.remove('letra');
        }
        else {
            charSpan.innerText = char; // hace que el texto del span sea la letra
        }
        quoteContainer.appendChild(charSpan); // hace que el span de los chars se metan dentro de el contenedor del texto
    })

}

function resetQuote() {
    while (quoteContainer.firstChild) {
        quoteContainer.removeChild(quoteContainer.firstChild);
    }
    quote_text = "";
    nextQuote();
}

function checkTextFinished() {
    if (input_area.value.length >= quote_text.length / 2 && !cooldown) {
        cooldown = true;
        nextQuote();
        setTimeout(() => {
            cooldown=false;
        }, 3000);

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

function updateTimerEndless() {
    uptime++;
    time_left_text.innerText = uptime + "s";
    updateWPM();
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
/*
function createIncorrSpan(charSpan, incorrChar) {
    const incorrCharSpan = document.createElement("span");
    incorrCharSpan.classList.add("incorr_char");
    incorrCharSpan.style.marginTop = "10px"
    incorrCharSpan.textContent = incorrChar;
    charSpan.appendChild(incorrCharSpan);
}
*/
function processCurrentText() {
    curr_input = input_area.value;
    curr_input_array = curr_input.split("");

    charsTyped++;

    quoteSpanArray = quoteContainer.querySelectorAll('span');
    quoteSpanArray.forEach((char, index) => {
        char.classList.remove("cursor");
        if(index>=curr_input.length-1){
        char.classList.remove("correct_char");
        char.classList.remove("incorrect_char");
    }

        if (index <= curr_input.length - 1 && index > curr_input.length - 10) {
        char.classList.remove("correct_char");
        char.classList.remove("incorrect_char");

            let typedChar = curr_input_array[index]

            const isSpace = char.classList.contains("space");
            if (typedChar === char.innerText || (isSpace && typedChar === " ")) {
                char.classList.add("correct_char");
                char.classList.remove("incorrect_char");
            } else {
                char.classList.add("incorrect_char");
                char.classList.remove("correct_char");
            }
        }
        if (index == (curr_input_array.length)) {
            char.classList.add("cursor");
            const cursorXPosition = char.offsetLeft + char.offsetWidth + window.scrollX;
            console.log(cursorXPosition);
            if (cursorXPosition > 260) {
                scroll();
            }
        }

    });
    ecount = quoteContainer.querySelectorAll(".incorrect_char").length;
    updateWPM();
    updateErrors();
    updateAcc();
    checkTextFinished();
}

function scroll() {
    quoteContainer.scrollLeft += 9;
}

function scrollDelete() {
    quoteContainer.scrollLeft -= 18;
}

