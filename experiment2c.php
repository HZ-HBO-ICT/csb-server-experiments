<!DOCTYPE html>
<html>

<head>
    <title>Experiment 2C</title>
</head>

<body>
    <h1>HTML Forms</h1>

    <form method="POST">
        Your name: <input type="text" name="name"><br>
        Your password: <input type="password" name="pwd"><br>
        <input type="submit" value="Send"></input>
    </form>

    <p>
        <?php
        if (isset($_POST['name'])) {
            echo "Hello, " . $_POST['name'];
        }
        ?>
    </p>
</body>

</html>