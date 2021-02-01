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
    
    try {  
        $sql = "DELETE FROM book WHERE title=?";
        $smt = $conn->prepare($sql);
        $smt->bind_param("s", $title);
        $smt->execute();
    } catch(Exception $e) {
        $conn->rollback();
        throw $e;
        echo "<div class='alert alert-danger alert-dismissible fade show text-center my-4' role='alert'>" .
             "Please try again" .
             "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
             "</div>";
    } finally {
        $smt->close();
        $conn->close();
        echo "<div class='alert alert-success alert-dismissible fade show text-center my-4' role='alert'>" .
             "Book data deleted successfully" .
             "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
             "</div>";
    }
?>