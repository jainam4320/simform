<?php 
    $title = $tpages = $aname = $emailadd = $pdate = $bgenre =""; 

    function test_input($data)	{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!empty($_POST))	{
        $title = test_input($_POST["title"]);
        $tpages = test_input($_POST["tpages"]);
        $aname = test_input($_POST["aname"]);
        $emailadd = test_input($_POST["emailadd"]);
        $pdate = test_input($_POST["pdate"]);
        $bgenre = test_input($_POST["bgenre"]);
    }

    require 'dbconnection.php';

    try {  
        
        $sql = $conn->prepare("UPDATE book SET total_pages = ?, author_name = ?, author_email = ?, published_date = ?, genre = ? WHERE title = ?");
        $sql->bind_param("isssss", $tpages, $aname, $emailadd, $pdate, $bgenre, $title);
        $sql->execute();
    } catch(Exception $e) {
        $conn->rollback();
        throw $e;
        echo "<div class='alert alert-danger alert-dismissible fade show text-center my-4' role='alert'>" .
             "Please try again" .
             "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
             "</div>";
    } finally {
        $sql->close();
        $conn->close();
        echo "<div class='alert alert-success alert-dismissible fade show text-center my-4' role='alert'>" .
             "Book data Updated successfully" .
             "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
             "</div>";
    }
    
?>