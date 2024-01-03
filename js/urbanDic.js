const container = document.getElementById('urbanDic');

    let word = null;
    let definition = null;
    let thumbsUp = null;
    let thumbsDown = null;
    let link = null;
   
        fetch('https://api.urbandictionary.com/v0/words_of_the_day')
        .then(response => response.json())
    .then(data => {
    // Extract the required data
     word = data.list[0].word;
     definition = data.list[0].definition;
     definition = definition.replace(/\r\n/g, '').replace(/[\[\]]/g, '');
     thumbsUp = data.list[0].thumbs_up;
     thumbsDown = data.list[0].thumbs_down;
     link = data.list[0].permalink;
     console.log(definition)
    createSpans();
    
  })
  .catch(error => console.error(error));
    
function createSpans(){
    let spanWord = document.createElement('a')
    spanWord.classList.add('word')
    spanWord.href=link
    spanWord.target = "_blank"
    spanWord.innerText = word;
    container.appendChild(spanWord);
    
    let spanDefinition = document.createElement('span')
    spanDefinition.classList.add('definition')
    spanDefinition.innerText = definition;
    container.appendChild(spanDefinition);
    
    let spanThumbs = document.createElement('span')
    container.appendChild(spanThumbs);
  
    let spanTU = document.createElement('span')
    spanTU.classList.add('thumbs_up')
    spanTU.innerText = thumbsUp;
    spanThumbs.appendChild(spanTU);
    
    let spanTD = document.createElement('span')
    spanTD.classList.add('thumbs_down')
    spanTD.innerText = thumbsDown;
    spanThumbs.appendChild(spanTD);
}