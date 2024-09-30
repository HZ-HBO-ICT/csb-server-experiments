<?php
    // Get the cookies
    $games = 0;
    if( isset( $_COOKIE['games'] ) ) {
        $games = $_COOKIE['games'];
    }
    $wins = 0;
    if( isset( $_COOKIE['wins'] ) ) {
        $wins = $_COOKIE['wins'];
    }
    $ties = 0;
    if( isset( $_COOKIE['ties'] ) ) {
        $ties = $_COOKIE['ties'];
    }
    $losses = 0;
    if( isset( $_COOKIE['losses'] ) ) {
        $losses = $_COOKIE['losses'];
    }

	//Now, let's play
	$returnText = 'You have not played yet. Select your weapon and hit the Play button';
	if (isset($_POST['choice']) && in_array($_POST['choice'], array('rock', 'paper', 'scissors')) ) {
        $games++;
		$userChoice = $_POST['choice'];

        //Let the computer make a choice
		$computerChoice = getComputerChoice();

        //Now, let's play, and return the result  text!
		$returnText = "You chose $userChoice. The server chose $computerChoice. ";
		$result = compare($userChoice, $computerChoice);
		if($result == 0) {
            $ties++;
			$returnText .= 'The result is a Tie!';
		} else if($result == 1) {
            $wins++;
			$returnText .= 'You won!';
		} else {
            $losses++;
			$returnText .= 'The server won!';
		} 
	}
    
    // Set the cookies (again) if needed
    setcookie( 'returntext', $returnText );
    setcookie( 'games', $games );
    setcookie( 'wins', $wins );
    setcookie( 'ties', $ties );
    setcookie( 'losses', $losses );

    // Echo the result to the HTTP response
    header('Location: experiment4.php');

    /**
     * function creates a random choice between rock, paper or scissors
     */
    function getComputerChoice() 
    {
		$computerChoice = rand(0, 2);
		if ($computerChoice == 0) {
			return "rock";
		} else if ($computerChoice == 1) {
			return "paper";
		} else {
			return "scissors";
		}
    }

    /**
     * Function Compares two choices and returns a number representing the result:
     * 0 = the result is a Tie
     * 1 = $choice1 wins
     * 2 = $choice2 wins
     */
    function compare($choice1, $choice2) 
    {
        if ($choice1 === $choice2) {
            return 0;
        }
        if ($choice1 === 'rock') {
            if ($choice2 === 'scissors') {
                return 1;
            } else {
                return 2;
            }
        }
        if ($choice1 === 'paper') {
            if ($choice2 === 'rock') {
                return 1;
            } else {
                return 2;
            }
        }
        if ($choice1 === 'scissors') {
            if ($choice2 === 'paper') {
                return 1;
            } else {
                return 2;
            }
        }
    }    

?>
