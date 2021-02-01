<?php
    $title = ""; 

    function test_input($data)	{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!empty($_POST))	{
        $title = test_input($_POST["title"]);
    }

    require 'dbconnection.php';
    $sql = "SELECT * FROM book WHERE title=?";
    $smt = $conn->prepare($sql);
    $smt->bind_param("s", $title);
    $smt->execute();
    $result = $smt->get_result();
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows[0]);
    } else {
        echo "0 results";
    }
    $smt->close();
    $conn->close();
?>