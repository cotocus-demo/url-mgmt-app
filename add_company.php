<?php
    include 'company_details/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD for Company Name</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
        

    </head>
    <body>
        <div class="container">
            <button class="btn btn-primary my-4"> <a href="company_details/index.php" class="text-light">Add Company</a></button>

            <h3 style="background-color: #D8A6A6; text-align: center; color: white; padding: 8px 5px 8px 5px;">Company Form Details</h3>
            <table class="table border border-primary">
                <thead class="p-3 mb-2 bg-primary text-white">
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="Select * from company";
                        $result=mysqli_query($con,$sql);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['id'];
                                $company_name=$row['company_name'];
                                $emails=$row['emails'];
                                $mobiles=$row['mobiles'];
                                $address=$row['address'];
                                echo '<tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$company_name.'</td>
                                <td>'.$emails.'</td>
                                <td>'.$mobiles.'</td>
                                <td>'.$address.'</td>

                                <td>
                                    <button class="btn btn-primary"><a href="company_details/update.php?updateid='.$id.'" class="text-light">Edit</a></button>
                                    <button class="btn btn-danger"><a href="company_details/delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                                </td>
                                </tr>';
                            };
                        }
                    ?>

                        

                </tbody>
            </table>
        </div>
    </body>
</html>