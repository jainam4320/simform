<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>ajax-php</title>
  </head>
  <body class="bg-light">
    <div class="container">
    <h1 class="text-primary text-center">Ajax Curd Operation</h1>

    <div class="d-flex justify-content-end mt-3">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
  Insert Data
</button>
</div>

    <h2 class="text-light">All Records</h2>
    <div>
    <table id="table"></table>
    </div>
    
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="form-label">First Name :</label>
            <input type="text" id="fname" class="form-control" placeholder="First Name" required>
            <label class="form-label">Last Name :</label>
            <input type="text" id="lname" class="form-control" placeholder="Last Name" required>
            <label class="form-label">Email :</label>
            <input type="email" id="email" class="form-control" placeholder="Email Address" required>
            <label class="form-label">Mobile :</label>
            <input type="text" maxlength="10" id="number" class="form-control" placeholder="Mobile Number" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="addRecord()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Model -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Update First Name :</label>
            <input type="text" id="update_fname" class="form-control" placeholder="First Name" required>
            <label class="form-label">Update Last Name :</label>
            <input type="text" id="update_lname" class="form-control" placeholder="Last Name" required>
            <label class="form-label">Update Email :</label>
            <input type="email" id="update_email" class="form-control" placeholder="Email Address" required>
            <label class="form-label">Update Mobile :</label>
            <input type="text" maxlength="10" id="update_number" class="form-control" placeholder="Mobile Number" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="updateUserDetail()">Save Changes</button>
        <input type="hidden" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>



</div>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   <script>
       $(document).ready(function(){
           readRecords();
           
       })
       function readRecords(){
           var read = "read";
           $.ajax({
               url:"backend.php",
               type:"post",
               data:{read:read},
               success:function(data,status){
                   $("#table").html(data);
                   $("#table").DataTable();
               }
           })
       }
       function addRecord(){
           var fname = $("#fname").val();
           var lname = $("#lname").val();
           var email = $("#email").val();
           var number = $("#number").val();
           if(ValidateEmail(email) && allLetter(fname) && allLetter(lname) && allnumeric(number)){
            $.ajax({
               url:"backend.php",
               type:'post',
               data:{
                   fname:fname,
                   lname:lname,
                   email:email,
                   number:number,
               },
               success:function(data,status){
                 try {
                   var res = JSON.parse(data);
                   if(res.statusCode==201){
                     alert("User already exists!")
                    }
                   
                 } catch (error) {
                   readRecords();
                   
                 }
               }
           })
       }
    }

        
       
           
       function DeleteUser(deleteid){
           var con = confirm("Are You Sure?");
           if(con == true){
               $.ajax({
                   url:"backend.php",
                   type:"post",
                   data:{deleteid:deleteid},
                   success:function(data,status){
                       readRecords();
                   }
               })
           }
       }
       function GetUserDetails(id){
            $('#hidden_user_id').val(id);
            $.post("backend.php",{id:id},function(data,status){
                var user = JSON.parse(data);
                $("#update_fname").val(user.fname); 
                $("#update_lname").val(user.lname); 
                $("#update_email").val(user.email); 
                $("#update_number").val(user.number); 
            }

            );
        $('#updateModal').modal("show");
       }
       
       function updateUserDetail(){
           var update_fname = $('#update_fname').val();
           var update_lname = $('#update_lname').val();
           var update_email = $('#update_email').val();
           var update_number = $('#update_number').val();
           var update_hidden_user_id = $('#hidden_user_id').val();
           if(ValidateEmail(update_email) && allLetter(update_fname) && allLetter(update_lname) && allnumeric(update_number)){

           $.post("backend.php",{
               update_hidden_user_id:update_hidden_user_id,
               update_fname:update_fname,
               update_lname:update_lname,
               update_email:update_email,
               update_number:update_number,
           },function(data,status){
            $('#updateModal').modal("hide");
            readRecords();

           })
          }
       }
       
       
  </script>
  <script src="validate.js"></script>
  </body>
</html>