const container2 = document.getElementById('urbanDicRandom');

    let word2 = null;
    let definition2 = null;
    let thumbsUp2 = null;
    let thumbsDown2 = null;
    let link2 = null;

    
    let spanThumbs2 = ""
    let spanword2 = "";
    let spandefinition2 = "";
    let spanTU2 = "";
    let spanTD2 = "";

const reload_btn = document.getElementById('reload_btn');
reload_btn.addEventListener('click', (event) => {
    event.preventDefault(); // ignora el href
    reset();
    randomWord();
  });

function randomWord(){
    fetch('https://api.urbandictionary.com/v0/random')
        .then(response => response.json())
    .then(data => {
    // Extract the required data
     word2 = data.list[0].word;
     definition2 = data.list[0].definition;
     thumbsUp2 = data.list[0].thumbs_up;
     thumbsDown2 = data.list[0].thumbs_down;
     link2 = data.list[0].permalink;
     console.log(definition2)
     createSpans2();
    })
    .catch(error => console.error(error));
}
    

function createSpans2(){
     spanword2 = document.createElement('a')
    spanword2.classList.add('word')
    spanword2.href=link2
    spanword2.target = "_blank"
    spanword2.innerText = word2;
    container2.appendChild(spanword2);
    
     spandefinition2 = document.createElement('span')
    spandefinition2.classList.add('definition')
    spandefinition2.innerText = definition2;
    container2.appendChild(spandefinition2);
    
     spanThumbs2 = document.createElement('span')
    container2.appendChild(spanThumbs2);
  
     spanTU2 = document.createElement('span')
    spanTU2.classList.add('thumbs_up')
    spanTU2.innerText = thumbsUp2;
    spanThumbs2.appendChild(spanTU2);
    
     spanTD2 = document.createElement('span')
    spanTD2.classList.add('thumbs_down')
    spanTD2.innerText = thumbsDown2;
    spanThumbs2.appendChild(spanTD2);
}

function reset(){
    spanword2.remove();
    spandefinition2.remove();
    spanTU2.remove();
    spanTD2.remove();
    
}

randomWord();