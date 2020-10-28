<?php
session_start();
$_SESSION['flag'] = 'redirected';
// $_SESSION['first_error'] = '';
// $_SESSION['second_error'] = '';

if(isset($_POST['calculate'])){
    if(empty($_POST['first_number']) || empty($_POST['second_number'])){
        if(empty($_POST["first_number"])){
            // $first_error = '<p class="text-danger">First Number field is empty</p>';
            $_SESSION['first_error'] = '<p class="text-danger">First Number field is empty or you input zero value | zero value not allowed</p>';
            header("Location: index.php?submit=error");
        }
        if(empty($_POST["second_number"])){
            // $second_error = '<p class="text-danger">Second Number field is empty</p>';
            $_SESSION['second_error'] = '<p class="text-danger">Second Number field is empty or you input zero value | zero value not allowed</p>';
            header("Location: index.php?submit=error");
        }
    }else{
        // echo "working good!";

        if(!is_numeric($_POST['first_number']) || !is_numeric($_POST['second_number'])){
            $_SESSION['invalid_input_error'] = '<p class="text-danger">Input field is not a number</p>';
            header("Location: index.php?submit=error");
        }else{
            if($_POST['operator'] == 'add'){
                $result = $_POST['first_number'] + $_POST['second_number'];
            }else if($_POST['operator'] == 'subtract'){
                $result = $_POST['first_number'] - $_POST['second_number'];
            }else if($_POST['operator'] == 'multiply'){
                $result = $_POST['first_number'] * $_POST['second_number'];
            }else if($_POST['operator'] == 'division'){
                if($_POST['second_number'] == 0){
                    $_SESSION['invalid_input_error'] = '<p class="text-danger">Zero Division Error</p>';
                    header("Location: index.php?submit=division-by-zero-error");
                }else{
                    $result =  $_POST['first_number'] / $_POST['second_number'];
                } 
            }
            $_SESSION['result'] = '<b><p class="text-lead text-info">Result = ' . $result . '</p></b>';
            header("Location: index.php?submit=success");
        }
    }
}