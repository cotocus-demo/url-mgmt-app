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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD for News Form Details</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
        <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-8">
                    <h3 style="background-color: #ACE1F0 ; text-align: center; color: Black; padding: 8px 5px 8px 5px;">
                        User Details
                    </h3>
                    <table class="table border border-dark">
                        <thead class="p-3 mb-2 bg-dark text-white">
                            <tr>
                                <th scope="col">SL Noss</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Headline</th>
                                <th scope="col">URL</th>
                                <th scope="col">TAGS</th>
                            </tr>
                        </thead>
                        <tbody>
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

                                                
                                            </tr>';
                                    };?>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <div class="col-4">
                    <h2>Login Form</h2>

                    <form action="/action_page.php" method="post">
                        <!-- <div class="imgcontainer">
                            <img src="img_avatar2.png" alt="Avatar" class="avatar">
                        </div> -->

                        <div class="container">
                            <label for="uname"><b>Username/Email</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                                
                            <button type="submit">Login</button>
                            <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                            </label>
                            <button type="button" class="btn btn-primary"><a href="registration.php" class="text-light">Registration</button>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>