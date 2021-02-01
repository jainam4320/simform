<?php
    require 'dbconnection.php';
    $sql = "SELECT emp_id,name FROM employee_data";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all();
        echo json_encode($rows);
    } else {
        echo "0 results";
    }
    $conn->close();
?>