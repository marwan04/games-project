<?php
    @include 'conn.php';
    session_start();
    
        $mm = $_COOKIE["test"];
        $email = $_SESSION['user_email'];
    
        $update = "UPDATE users 
        SET score = '$mm'
        WHERE email = '$email'";
        mysqli_query($conn, $update);
       
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guess Number Game</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="GuessNum.css">
</head>
<body>
    <h1>Guess Number Game</h1>
   <div class="container" id="app">
       <h3>I am thinking of a number between 1-50.</h3>
       <h3>Can you guess it?</h3>

       <input type="text" placeholder="Num" id="guesses"><br>
       <input type="button" onclick="play();" id="theButton" name="submit" value = "guess">

       <p id="note1">No. Of Guesses: 0</p>
       <p id="note2">Guessed Numbers are: None</p>
       <p id="note3"></p>
       <a href="GuessNum.html" id="note4"></a>
       <span><?php echo $mm ?></span>
   </div>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script>
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
                    createCookie("test", noOfGuesses, "10");
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
        

        function createCookie(name, value, days) {
            var expires;
            
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            }
            else {
                expires = "";
            }
            
            document.cookie = escape(name) + "=" + 
                escape(value) + expires + "; path=/";
        }
        
   </script>
</body>
</html>