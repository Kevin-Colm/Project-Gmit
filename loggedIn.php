
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>
        <div>

            <h1>Logged in successfully</h1>
            <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];

                    //adapted from https://stackoverflow.com/questions/20649921/php-redirect-on-login
                    echo '<h1>Hello ' . $username . '</h1>';

                    echo "<h2>This is the Members Area</h2>";
                    include 'index.php';
                    echo "<a href='logout.php'>Logout</a>";
                }
            ?>
        </div>
    </body>
</html>


