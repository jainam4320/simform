<?php

    $conn = mysqli_connect("localhost","root","","demo");
    extract($_POST);
    
if(isset($_POST['read'])){
    
    $data = '
    <thead>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile Number </th>
    <th>Edit Section</th>
    <th>Delete Section</th>
    </tr></thead><tbody>';
    
    $displayquery = "select * from t1;";
    $result = mysqli_query($conn,$displayquery);
    // print_r($result);
    if(mysqli_num_rows($result)>0){
     
        while($row = mysqli_fetch_array($result)){
            // print_r($row);
            $data .= '<tr>
            <td>'.$row['fname'].'</td>    
            <td>'.$row['lname'].'</td>    
            <td>'.$row['email'].'</td>    
            <td>'.$row['number'].'</td>    
            <td>
            <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
            </td>
            <td>
            <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
            </td>
            </tr>'; 
        }
    }
    
    $data .= '</tbody></table>';
    echo $data;
}

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['number'])){
        $sql = "select * from t1 where email='$email'";
        $res = mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($res)>0){
            echo json_encode(array("statusCode"=>201));
        }else{
            
            $query = "INSERT INTO `t1`(`fname`, `lname`, `email`, `number`) VALUES ('$fname','$lname','$email','$number');";
            
            mysqli_query($conn,$query);
        }
    }



if(isset($_POST['deleteid'])){
    $id = $_POST['deleteid'];

    $deletequery = "delete from t1 where id='$deleteid'"; 
    mysqli_query($conn,$deletequery);
}

if(isset($_POST['id']) && isset($_POST['id']) != ""){
    $id = $_POST['id'];
    $query = "select * from t1 where id ='$id'";
    if(!$result = mysqli_query($conn,$query)){
        exit(mysqli_error);
    } 

    if(mysqli_num_rows($result)>0){
        // print_r($result);
        while($row =mysqli_fetch_assoc($result)){
            $response = $row;
            // print_r($response);
        }
    }else{
        $response['status']=200;
        $response['msg']="Data not found";
    }

    echo json_encode($response);

}else{
    $response['status']=200;
    $response['msg']="Invalid Request";
}

if(isset($_POST['update_hidden_user_id'])){
    $id = $_POST['update_hidden_user_id'];
    $fname = $_POST['update_fname'];
    $lname = $_POST['update_lname'];
    $email = $_POST['update_email'];
    $number = $_POST['update_number'];

    $query = "UPDATE `t1` SET `fname`='$fname',`lname`='$lname',`email`='$email',`number`='$number' WHERE id = '$id'";
    mysqli_query($conn,$query);
}


?>