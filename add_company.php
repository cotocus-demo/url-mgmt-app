<?php

    include_once 'company_details/connect.php';

    $per_pages=5;
    $start=0;
    $current_page=1;
    if(isset($_GET['start'])){
        $start=$_GET['start'];
    if($start<=0){
        $start=0;
        $current_page=1;
    }else {
        $current_page=$start;
        $start--;
        $start=$start*$per_pages;
    }
    
}

$record=mysqli_num_rows(mysqli_query($con, "select id,company_name,emails,mobiles,address from company"));
$pagi=ceil($record/$per_pages);

$sql="select id,company_name,emails,mobiles,address from company limit $start,$per_pages";
$res=mysqli_query($con,$sql);
?>

<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:company_details/login.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD for Company Name</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
           
            <button class="btn btn-primary my-4"> <a href="company_details/index.php" class="text-light">Add Company</a></button>

            <button class="btn btn-danger my-4"> <a href="index.php" class="text-light">Add News Details</a></button>

            <button type="button" class="btn btn-info" style="margin-left: 65%; text-color: white;">
                <a href="company_details/logout.php" class="text-light">Logout</a><i class="fas fa-sign-out-alt"></i></a>
            </button>

            <h3 style="background-color: #D8A6A6; text-align: center; color: white; padding: 8px 5px 8px 5px;">Company Form Details</h3>
            <table class="table border border-primary">
                <thead class="p-3 mb-2 bg-primary text-white">
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Mobiles</th>
                        <th scope="col">Address</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        if(mysqli_num_rows($res)>0){
                        
                        while($row=mysqli_fetch_assoc($res)){?>
                        <?php 
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
                            };?>

                    <?php } ?>
                </tbody>
            </table>

            <ul class="pagination mt-30">
                <?php 
                    for($i=1;$i<=$pagi;$i++) {
                        $class='';
                            if($current_page==$i){
                                ?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
                            }else {
                            ?>
                                <li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
                            <?php
                            }
                            ?>
                            
                <?php } ?>
            </ul>

        </div>
    </body>
</html>