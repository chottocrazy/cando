const random = [
  "http://vg.pe.hu/compilation/01/000.JPG",
  "http://vg.pe.hu/compilation/02/000.JPG",
  "http://vg.pe.hu/compilation/03/000.JPG",
  "http://vg.pe.hu/compilation/04/000.JPG"
  ];
  
  function randomImg(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function sentenceGenerator() {
    var sentence = `<img src="${randomImg(random)}">`;
    document.querySelector(".random").innerHTML = sentence;
  }
  window.setInterval(function() {
    sentenceGenerator();
  }, 2000);
  sentenceGenerator();
  
