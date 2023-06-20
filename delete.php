<?php
require_once 'dcConnection.php';


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $query_deleteCustomer = $con->prepare("DELETE FROM `employee` WHERE `id` = ?");
    $query_deleteCustomer->bind_param("i", $id);

    $query_deleteCustomer->execute();

    $result = $query_deleteCustomer->execute();

    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script> alert('Somethign went Wrong'); window.location.href = 'index.php'</script>";
    }
}
