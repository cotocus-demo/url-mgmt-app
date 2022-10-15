<?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $company_name=$_POST['company_name'];
        $headline=$_POST['headline'];
        $url=$_POST['url'];
        $tag=$_POST['tag'];

        $sql = "INSERT INTO news_details (company_name,headline,url,tag) VALUES('$company_name', '$headline', '$url','$tag')";

        $result=mysqli_query($con,$sql);
        if($result){
            header('location:home.php');
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

    <title>CRUD for News Details</title>
  </head>
  <body>
        <div class="container mt-5 py-2" style="background-color: #8894C9; color: white; padding: 900px 100px 809px 50px;">
        <br>
            <form method="post">
                <h4 class="text-center">Add Your News Details</h4>
                <div class="form-group">
                    <label class="control-label">Select Company</label>

                    <select name="company_name" class="form-control">
                        <option value="pick">Select Company</option>
                            <?php
                                $sql = mysqli_query($con, "SELECT company_name From company");
                                $row = mysqli_num_rows($sql);
                                while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['company_name'] ."'>" .$row['company_name'] ."</option>" ;
                                }
                            ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Headline</label>
                    <input type="emails" class="form-control" placeholder="Enter Your Headline" name="headline" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>URL</label>
                    <input type="herf" class="form-control" placeholder="Enter Your URL" name="url" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>TAGS</label>
                    <input type="text" class="form-control" placeholder="Enter Your Tags" name="tag" autocomplete="off">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <br>
            </form>
            <br>
        </div>
  </body>
</html>