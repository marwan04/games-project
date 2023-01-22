let randomNumber1 = Math.floor(Math.random() * 6) + 1;
function dice1(random){

let randomDiceImage1 = "dice" + randomNumber1 + ".png"; //dice1.png - dice6.png

let image1 = document.getElementById("img1");

image1.setAttribute("src", randomDiceImage1);
}


let randomNumber2 = Math.floor(Math.random() * 6) + 1;
function dice2(random) {

let randomDiceImage2 = "dice" + randomNumber2 + ".png";

let image2 = document.getElementById("img2");

image2.setAttribute("src", randomDiceImage2);
}


dice1(randomNumber1);
dice2(randomNumber2);


function compare(random1 , random2){
  if (random1 > random2) {
    document.getElementById("result").innerHTML = "🚩 Play 1 Wins!";
  }
  else if (random2 > random1) {
    document.getElementById("result").innerHTML = "Player 2 Wins! 🚩";
  }
  else {
    document.getElementById("result").innerHTML = "Draw!";
  }
}

compare(randomNumber1 , randomNumber2);