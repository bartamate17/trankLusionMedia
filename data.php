<?php


require_once 'dbconfig.php';



if (isset($_POST['name'])) {

    $filterName = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $filterEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $filterPhone = $_POST['phone'];
    $filterSubject = $_POST['subject'];
    $filterMessage = $_POST['message'];

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        echo "Hiba a Mysql csatlakozás során: " . mysqli_connect_error();
        exit();
    }

    $sql = "INSERT INTO userdata SET name='" . $filterName . "',email='" . $filterEmail . "',phone='" . $filterPhone . "',subject='" . $filterSubject . "',message='" . $filterMessage . "'";
    if ($conn->query($sql) === TRUE) {
        echo "Sikeres üzenet küldés!";
        header('Location: index.php');
    } else {
        echo "Hiba a küldés során!" . $conn->error;
    }

    $conn->close();
}
