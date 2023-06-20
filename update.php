<?php
require_once 'dcConnection.php';

session_start();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query_updateCustomer = $con->prepare("SELECT * FROM `employee` WHERE id = ?");
    $query_updateCustomer->bind_param("i", $id);

    $query_updateCustomer->execute();
    $result = $query_updateCustomer->get_result();
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $position = $row['position'];
    }
}

if (isset($_POST['btnSave'])) {

    $id = $_POST['ID'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    $query_insertCustmer = $con->prepare("UPDATE `employee` SET `name`= ?,`email`= ? ,`position`= ? WHERE `id` = ?");

    $query_insertCustmer->bind_param("sssi",  $name, $email, $position, $id);

    $result = $query_insertCustmer->execute();

    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script> alert('Id already Exist'); window.location.href = 'index.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <form action="" method="post" class="w-25 text-center p-5">


        <!-- <div class="form-floating mb-3"> -->
        <input readonly type="hidden" min="0" class="form-control" require id="ID" name="ID" placeholder="ID" required value="<?php echo $id ?>">
        <!-- <label for="ID">ID</label>
        </div> -->


        <div class="form-floating mb-3">
            <input type="text" class="form-control" require id="Name" name="Name" placeholder="Name" required value="<?php echo $name ?>">
            <label for="Name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" require id="email" name="email" placeholder="Name" required value="<?php echo $email ?>">
            <label for="email">Email</label>

        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" require id="position" name="position" placeholder="Position" required value="<?php echo $position ?>">
            <label for="position">Position</label>
        </div>

        <input type="submit" class="btn btn-primary" value="Update" name="btnSave">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>

</html>