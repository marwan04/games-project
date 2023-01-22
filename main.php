<?php
    @include 'conn.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location:log.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Poppins:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h2>Gamers hood</h2>
        </div>
        <ul class="navLink">
            <li>
                <a href="">Welcome : <span><?php echo $_SESSION['user_name'] ?></a>
            </li>
            <li>
                <a href="dice.html">Roll Dice</a>
            </li>
            <li>
                <a href="Sudoko.html">Sudoko</a>
            </li>
            <li>
                <a href="GuessNum.php">Guess Number</a>
            </li>
        </ul>
    </nav>
    <section class="projects" id="projects">
        <h2 class="title">Our Games</h2>
        <hr>
        <div class="content">
            <div class="gameCard" id="game1">
                <div class="gamesImg">
                    <img src="dice-game.gif"/>
                </div>
                <div class="gameInfo">
                    <p class="gameName">Dice Game</p>
                    <strong class="gameDescription">
                        <span>The idea of this game is for each player to roll a dice, and the one with the highest number wins</span>
                        <a href="dice.html" class="play">play</a>
                    </strong>
                </div>
            </div>
            <div class="gameCard" id="game2">
                <div class="gamesImg">
                    <img src="sudoku.gif" />
                </div>
                <div class="gameInfo">
                    <p class="gameName">Sudoko</p>
                    <strong class="gameDescription">
                        <span>The game is a set of numbers from 1 to 9 and consists of squares, rows and columns.
                            You are required to have <br>in each row, column and square the numbers from <br>1 to 9 once in each row, column and square</span>
                        <a href="Sudoko.html" class="play">play</a>
                    </strong>
                </div>
            </div>
            <div class="gameCard" id="game3">
                <div class="gamesImg" >
                    <img src="guess.gif" id="img3"/>
                </div>
                <div class="gameInfo">
                    <p class="gameName">Guess Number Game</p>
                    <strong class="gameDescription">
                        <span>the computer chooses a random number between 1 and 50 and you have to guess the number</span>
                        <a href="GuessNum.html" class="play">play</a>
                    </strong>
                </div>
            </div>
        </div>
    </section>
</body>
</html>