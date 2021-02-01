<?php
    session_start();
    //if(!isset($_SESSION["login"]))
    //{
     //   header("Location: http://jcinadiad.org/login");
    //}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <title> Download Blood Donor List | JCI Nadiad </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Junior Chamber International Nadiad (JCI Nadiad) - International NGO situated in Nadiad." name="description">
        <meta content="Jainam Shah" name="author">
        
        <!-- Favicons -->
        <link rel = "icon" href = "../images/logo/jci_nadiad_icon.png" type = "image/x-icon">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
        
        <!-- Bootstrap CSS File -->
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap/bootstrap.min.css">
        
        <!-- Libraries CSS Files -->
        <link rel="stylesheet" href="../lib/animate/animate.css">
        <link rel="stylesheet" href="../lib/owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../lib/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="../lib/superfish-master/src/css/superfish.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/brands.min.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/regular.min.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/solid.min.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/v4-shims.min.css">
        <link rel="stylesheet" href="../lib/font-awesome/css/fontawesome.min.css">
        
        <!-- Main Stylesheet File -->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css"/>

        
        
        <!-- Javascript -->  
        <script type="text/javascript" src="../lib/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/jQuery_function.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../lib/bootstrap/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../lib/easing/easing.min.js"></script>
        <script type="text/javascript" src="../lib/superfish-master/src/js/superfish.js"></script>
        <script type="text/javascript" src="../lib/wow/wow.min.js"></script>
        <script type="text/javascript" src="../lib/owlcarousel/dist/owl.carousel.min.js"></script>
        <script type="text/javascript" src="../lib/magnific-popup/magnific-popup.min.js"></script>
        <script type="text/javascript" src="../lib/sticky/sticky.js"></script>
        <script type="text/javascript" src="../lib/toaster/toast.js"></script>
        <script type="text/javascript" src="../lib/toaster/toast.min.js"></script>
        <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script>

        <script>
            $(document).ready(function(){
                $(".login-menu").addClass("menu-active");
                $('#displayDonor').DataTable({
                dom: 'Bfrtip',
                colReorder: true,
                rowReorder: true,
                deferRender: true,
                scrollY: 300,
                scroller: true,
                buttons: [ 'colvis', 'copy', 'excel', 'pdf', 'print' ],
                responsive: true
            }).on( 'responsive-display', function ( e, datatable, row, showHide, update ) {console.log( 'Details for row '+row.index()+' '+(showHide ? 'shown' : 'hidden') )});
            });
        </script>
        
    </head>
    <body id="body">
        
        <?php
            // include 'pop-up.php';
            include 'header.php';
        ?>
        <br><br>

        <section id="downloads" class="container" >
            <div class="section-header">
                <h2>List of Blood Donor</h2>
                <p></p>
            </div>
            <div>
                <table class="table table-hover" id="displayDonor">
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Gender</th>
                            <th>Blood group</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            try
                            {    
                                include '../db-connection-new.php';
                                $query=$dbhandler->query('SELECT * FROM register_doner');
                                while($res = $query->fetch())
                                {
                                    echo '<tr>';
                                    echo '<td>'. $res['name'] .'</td>';
                                    echo '<td>'. $res['contact_number'] .'</td>';
                                    echo '<td>'. $res['gender'] .'</td>';
                                    echo '<td>'. $res['blood_group'] .'</td>';
                                    echo '</tr>';
                                }
                            }
                            catch(PDOException $e)
                            {
                                echo $e->getMessage();
                                die();
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>