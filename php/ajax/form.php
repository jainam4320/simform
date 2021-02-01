<!DOCTYPE html>
<html>
<title>Employee Entry Form</title>

<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- JavaScript CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="./DataTables/datatables.min.css"/>
 
    <!-- Data Tables JS -->
    <script type="text/javascript" src="./DataTables/datatables.min.js"></script>

    <!-- Javascript Function -->
    <script>
        function addEmpData() {
            $.post("postData.php",
            {
                name: $('#full_name').val(),
                email: $('#email').val(),
                country_code: $('#country_code').val(),
                contact_number: $('#contact_number').val(),
                bdate: $('#bdate').val(),
                job_title: $('#job_title').val(),
                blood_group: $('#blood_group').val()
            },
            function(data, status){
                $('#data').html(data);
            });
            return true;
        }
    </script>

</head>

<body>
    <br>
    <div class="container">
    <br>
    <?php 
        include_once 'navigation.php';
    ?>
    <br>
    <center>
        <h1>Employee Entry Form</h1>
    </center>
    <br>
        <form id="entryForm" name="entryForm" method="POST" onsubmit="return addEmpData()" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Full Name :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter Your Name Here" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Phone Number :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="country_code" id="country_code">
                                            <option value="+91">+91</option>
                                            <option value="+1">+1</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" id="contact_number" name="contact_number" class="form-control" placeholder="Enter Your Phone Number Here" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Job Title :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control" name="job_title" id="job_title">
                                    <option value="Developer">Developer</option>
                                    <option value="Team Manager">Team Manager</option>
                                    <option value="Quality Analysis">Quality Analysis</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Email :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your E-mail Here" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Birth Date :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" id="bdate" class="form-control" name="bdate" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <h4>
                                    Blood Group :
                                </h4>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="blood_group" name="blood_group" class="form-control" placeholder="Enter Your Blood Group Here" maxlength="3" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <center><button type="submit" name="submit" class="btn btn-primary">Add Employee Data</button></center>
        </form>
    </div>
</body>
</html>