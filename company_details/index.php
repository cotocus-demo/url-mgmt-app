<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $company_name=$_POST['company_name'];
        $emails=$_POST['emails'];
        $mobiles=$_POST['mobiles'];
        $address=$_POST['address'];

        // $sql="insert into 'company'(name,emails,mobiles,address) 
        // values('$name','$emails','$mobiles','$address')";


        $sql = "INSERT INTO company (company_name,emails,mobiles,address) VALUES('$company_name', '$emails', '$mobiles','$address')";
        

        $result=mysqli_query($con,$sql);
        if($result){
            // echo "Data inserted Successfully";
            header('location:../add_company.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>CRUD for Company Name</title>
</head>

<body>
    <div class="container mt-5 py-2" style="background-color: #B0B0B0; color: white; padding: 900px 100px 809px 50px;">
        <br>
        <form method="post">
            <h4 class="text-center">Add Your Company Details :-</h4>
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Company Name" name="company_name"
                    autocomplete="off">
            </div>

            <div class="form-group">
                <label>Emails</label>
                <input type="emails" class="form-control" placeholder="Enter Your emails" name="emails"
                    autocomplete="off">
            </div>

            <div class="form-group">
                <label>Mobiles</label>
                <input type="text" class="form-control" placeholder="Enter Your Mobiles" name="mobiles"
                    autocomplete="off">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter Your address" name="address"
                    autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <br>
        </form>
        <br>
    </div>
</body>

</html>