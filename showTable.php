<?php
require_once 'dcConnection.php';

$query = "SELECT * FROM `employee` WHERE 1";
$result = mysqli_query($con, $query);

while ($r = mysqli_fetch_row($result)) {
    echo "<tr>
            <td>$r[0]</td>
            <td>$r[1]</td>
            <td>$r[2]</td>
            <td>$r[3]</td>
            <td> <a href='./update.php?id=$r[0]' class='btn btn-primary' >Update</a></td>
            <td> <a href='./delete.php?id=$r[0]'  class='btn btn-danger' onclick='return confirm(`Remove $r[1]?` )' >Delete</a></td>  
        </tr>";
}
