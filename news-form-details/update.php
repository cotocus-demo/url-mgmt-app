<?php
    include 'connect.php';
    $id=$_GET['updateid'];
    $sql="SELECT * from news_details where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $company_name=$row['company_name'];
    $headline=$row['headline'];
    $url=$row['url'];
    $tag=$row['tag'];


    if(isset($_POST['submit'])){
        $company_name=$_POST['company_name'];
        $headline=$_POST['headline'];
        $url=$_POST['url'];
        $tag=$_POST['tag'];

        $sql="UPDATE news_details set id=$id,company_name='$company_name',headline='$headline',url='$url',tag='$tag' 
        where id=$id";

        $result=mysqli_query($con,$sql);
        if($result){
            header('location:../index.php');
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
        <div class="container mt-5" class="container mt-5 py-2" style="background-color: #8894C9; color: white; padding: 50px 50px 50px 50px;">
            <form method="post">
            <h4 class="text-center">Updated Your News Details</h4>
                <div class="form-group">
                    <label class="control-label">Select Company</label>
                    <select name="company_name" class="form-control">
                        <option value="company_name">Select Company</option>
                            <?php
                                $sql = mysqli_query($con, "SELECT company_name From company");
                                $row = mysqli_num_rows($sql);
                                while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=". $row['company_name'] .">" .$row['company_name'] ."</option>" ;
                                }
                            ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Headline</label>
                    <input type="text" class="form-control" placeholder="Enter_Your_headline" name="headline" autocomplete="off"  value=<?php echo $headline;?>>
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <input type="herf" class="form-control" placeholder="Enter_Your_url" name="url" autocomplete="off"  value=<?php echo $url;?>>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" class="form-control" placeholder="Enter_Your_tags" name="tag" autocomplete="off" value=<?php echo $tag;?> >
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
  </body>
</html>