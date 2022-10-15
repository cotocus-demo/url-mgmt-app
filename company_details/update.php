<?php
    include 'connect.php';
    $id=$_GET['updateid'];
    $sql="SELECT * from company where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $company_name=$row['company_name'];
    $emails=$row['emails'];
    $mobiles=$row['mobiles'];
    $address=$row['address'];


    if(isset($_POST['submit'])){
        $company_name=$_POST['company_name'];
        $emails=$_POST['emails'];
        $mobiles=$_POST['mobiles'];
        $address=$_POST['address'];

        // $sql="insert into 'company'(name,emails,mobiles,address) 
        // values('$name','$emails','$mobiles','$address')";
        $sql="UPDATE company set id=$id, company_name='$company_name', emails='$emails', mobiles='$mobiles', address='$address' 
        where id=$id";

        // $sql = "INSERT INTO company (name,emails,mobiles,address) VALUES('$name', '$emails', '$mobiles','$address')";
        

        $result=mysqli_query($con,$sql);
        if($result){
            // echo "Updated Successfully";
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
        <div class="container mt-5">
            <form method="post">
            <h4 class="text-center">Updated Your Company Details</h4>
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Company Name" name="company_name" autocomplete="off"  value=<?php echo $company_name;?>>
                </div>

                <div class="form-group">
                    <label>Emails</label>
                    <input type="emails" class="form-control" placeholder="Enter Your emails" name="emails" autocomplete="off"  value=<?php echo $emails;?>>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" placeholder="Enter Your Contact Number" name="mobiles" autocomplete="off"  value=<?php echo $mobiles;?>>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Enter Your address" name="address" autocomplete="off"  value=<?php echo $address;?>>
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
  </body>
</html>