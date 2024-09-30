<!DOCTYPE html>
<html>
	<head><title>Experiment 5</title></head>
	<body>
        <h1>Rock, Paper, Scissors in PHP</h1>
        <form method="POST" action="experiment4-game.php">
            <select name="choice">
                <option value="rock">Rock</option>
                <option value="paper">Paper</option>
                <option value="scissors">Scissors</option>
            </select>
            <input type="submit" value="Send"/>
        </form>
        <?php 
            if( isset( $_COOKIE['returntext'] )) {
                echo "<p><strong>".$_COOKIE['returntext']."</strong></p>";
                setcookie( 'returntext' );
            }
            if( isset( $_COOKIE['games'] )) {
                echo "<p>Games played: ".$_COOKIE['games']."</p>";
            }
            if( isset( $_COOKIE['wins'] )) {
                echo "<p>Wins: ".$_COOKIE['wins']."</p>";
            }
            if( isset( $_COOKIE['ties'] )) {
                echo "<p>Ties: ".$_COOKIE['ties']."</p>";
            }
            if( isset( $_COOKIE['losses'] )) {
                echo "<p>Losses: ".$_COOKIE['losses']."</p>";
            }
        ?>
    </body>
</html>
