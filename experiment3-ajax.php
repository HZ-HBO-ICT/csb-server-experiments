<?php

$userChoice = htmlspecialchars($_POST["choice"]);
$gameChoices = array('rock', 'scissors', 'paper');
$emojiChoices = array( 'rock' => '👊', 'scissors' => '✌️', 'paper' => '✋');

//Now, let's play
if (in_array($userChoice, $gameChoices)) {
    //Let the computer make a choice
    $computerChoice = getComputerChoice();

    //Now, let's play, and return the result text!
    $returnText = "You chose ". $emojiChoices[$userChoice] .". The server chose ". $emojiChoices[$computerChoice] .". ";
    $result = compare($userChoice, $computerChoice);
    if ($result == 0) {
        $returnText .= "It's a Tie!";
    } else if ($result == 1) {
        $returnText .= 'You won!';
    } else {
        $returnText .= 'The server won!';
    }

    // Echo the result to the HTTP response
    echo $returnText;
} else {
    echo "Invalid choice!";
}


/**
 * function creates a random choice between rock, paper or scissors
 */
function getComputerChoice() {
    global $gameChoices;
    return $gameChoices[rand(0, 2)];
}

/**
 * Function Compares two gameChoices and returns a number representing the result:
 * 0 = the result is a Tie
 * 1 = $choice1 wins
 * 2 = $choice2 wins
 */
function compare($choice1, $choice2) {
    global $gameChoices;
    $posChoice1 = array_search($choice1, $gameChoices);
    $posChoice2 = array_search($choice2, $gameChoices);
    $numChoices = count($gameChoices);

    if ($posChoice1 === $posChoice2) {
        return 0;
    }
    if ($posChoice2 === ($posChoice1 + 1) % $numChoices) {
        return 1;
    } else {
        return 2;
    }
}
