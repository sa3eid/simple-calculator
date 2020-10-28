<?php

session_start();

if($_SESSION['flag'] == 'redirected'){
    $_SESSION['flag'] = 'origin';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Calculator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="container mx-5 my-5">
    <h3 class="text-info">Simple PHP Calculator</h3><br>
    <!-- <form action="./file_process.php" method="post"> -->
    <form action="calculate.php" method="post">
        <div class="form-group">
            <b><label for="operator">Choose Operator</label></b>
            <select class="form-control" name="operator" id="operator">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">x</option>
                <option value="division">/</option>
            </select>
        </div>
        <div class="form-group">
            <b><label for="operator">Write First Number</label></b>
            <input class="form-control" id="first_number" type="text" name="first_number">
            <?= isset($_SESSION['first_error']) ? $_SESSION['first_error'] : NULL; ?>
        </div>
        <div class="form-group">
            <b><label for="operator">Write Second Number</label></b>
            <input class="form-control" id="second_number" type="text" name="second_number">
            <?= isset($_SESSION['second_error']) ? $_SESSION['second_error'] : NULL; ?>
        </div>
        <?= isset($_SESSION['invalid_input_error']) ? $_SESSION['invalid_input_error'] : NULL; ?>
        <button type="submit" name="calculate" class="btn btn-success">Calculate</button>

    </form>

    <div class="container my-3">
        <?= isset($_SESSION['result']) ? $_SESSION['result'] : NULL; ?>
    </div>

    <?php
        if($_SESSION['flag'] == 'origin'){
            $_SESSION['first_error'] = '';
            $_SESSION['second_error'] = '';
            $_SESSION['invalid_input_error'] = '';
            $_SESSION['result'] = '';
        }
    ?>

</div>
</body>
</html>