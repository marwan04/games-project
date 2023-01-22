let no1 = document.getElementById("note1");
let no2 = document.getElementById("note2");
let no3 = document.getElementById("note3");
let no4 = document.getElementById("note4");

let randomNum = Math.floor(Math.random()*50) + 1;
let noOfGuesses = 0;
let guessedNums = [];

function play(){
    let userGuess = document.getElementById("guesses").value;
    if(userGuess < 1 || userGuess > 50){
        window.alert("Please enter a number between 1 and 50.");
    }
    else{
        
        if (userGuess != randomNum) {
        guessedNums.push(userGuess);
        noOfGuesses+= 1;
        }

        if(userGuess < randomNum){
            no1.innerHTML = "Your guess is too low.";
            no2.innerHTML = "No. of guesses: " + noOfGuesses;
            no3.innerHTML = "Guessed numbers are: " +
            guessedNums;
        }
        else if(userGuess > randomNum){
            no1.innerHTML = "Your guess is too high.";
            no2.innerHTML = "No. of guesses: " + noOfGuesses;
            no3.innerHTML = "Guessed numbers are: " + guessedNums;
        }
        else if(userGuess == randomNum){
            noOfGuesses++;
            no1.innerHTML = "You Win!!";
            no2.innerHTML = "The number was: " + randomNum;
            no3.innerHTML = "You guessed it in "+ noOfGuesses + " guesses";
            no4.innerHTML = "Play agine";
            no4.style.backgroundColor = "#663399"
            document.getElementById("my_btn").disabled = true;
            return;
        }
    }
}