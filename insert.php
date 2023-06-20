<?php
require_once 'dcConnection.php';

if (isset($_POST['btnSave'])) {
    $id = $_POST['ID'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    $query_insertCustmer = $con->prepare("INSERT INTO `employee`(`id`, `name`, `email`, `position`) 
    VALUES (?,?,?,?)");

    $query_insertCustmer->bind_param("isss", $id, $name, $email, $position);

    $result = $query_insertCustmer->execute();

    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script> alert('Id already Exist'); window.location.href = 'index.php'</script>";
    }
}
