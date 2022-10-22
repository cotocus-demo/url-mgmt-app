<?php
    
    include_once 'news-form-details/connect.php';

    $per_page=5;
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
        $start=$start*$per_page;
    }
}

$record=mysqli_num_rows(mysqli_query($con, "select id,company_name,headline,url,tag from news_details"));
$pagi=ceil($record/$per_page);

$sql="select id,company_name,headline,url,tag from news_details limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>



<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD for News Form Details</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <button class="btn btn-dark my-4"><a href="news-form-details/edit.php" class="text-light">Add News</a></button>
            
            <button type="button" class="btn btn-info" style="margin-left: 75%; text-color: white;">
                <a href="logout.php" class="text-light">Logout</a><i class="fas fa-sign-out-alt"></i></a>
            </button>

            <h3 style="background-color: #ACE1F0 ; text-align: center; color: Black; padding: 8px 5px 8px 5px;">
                News Form Details
            </h3>
            <table class="table border border-dark">
                <thead class="p-3 mb-2 bg-dark text-white">
                    <tr>
                        <th scope="col">SL Noss</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Headline</th>
                        <th scope="col">URL</th>
                        <th scope="col">TAGS</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <ul class="list-group"> -->
                    <?php 
                        if(mysqli_num_rows($res)>0){
                        
                        while($row=mysqli_fetch_assoc($res)){?>
                        <?php 
                                $id=$row['id'];
                                $company_name=$row['company_name'];
                                $headline=$row['headline'];
                                $url=$row['url'];
                                $tag=$row['tag'];
                                echo '<tr>
                                        <th scope="row">'.$id.'</th>
                                        <td>'.$company_name.'</td>
                                        <td>'.$headline.'</td>
                                        <td><a href="'.$url.'" target="blank">'.$url.'</a></td>
                                        <td>'.$tag.'</td>

                                        <td>
                                            <button class="btn btn-primary"><a href="news-form-details/update.php?updateid='.$id.'" class="text-light">Edit</a></button>
                                            <button class="btn btn-danger"><a href="news-form-details/delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
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