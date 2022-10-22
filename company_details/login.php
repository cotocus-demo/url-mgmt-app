<?php
    
    include_once 'connect.php';

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

$record=mysqli_num_rows(mysqli_query($con, "select id,company_name,emails,mobiles,address from company"));
$pagi=ceil($record/$per_page);

$sql="select id,company_name,emails,mobiles,address from company limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>



<html>
    <head>
        <title>Company login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body style="background-color: hsla(89, 43%, 51%, 0.3);">
        <div class="container mt-5 mb-5" >
            <div class="row">
                <div class="col-12" style="background-color: white;">
                
                    <h3 class="mt-4" style="background-color: #ACE1F0 ; text-align: center; color: Black; padding: 8px 8px 8px 5px;">
                        Comapany Login From
                    </h3>
                    
                    <table class="table border border-dark" >
                        <thead class="p-3 mb-2 bg-dark text-white" style="margin-buttom: -4% !important;">
                            <tr>
                                <th scope="col">SL Noss</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Emails</th>
                                <th scope="col">Mobiles</th>
                                <th scope="col">Address</th>
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
            </div>
                <br>
                
            <div class="row">
                <div class="col-6 login-left" style="background-color: #80ced6;">
                    <h2>Login Hear</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary"> Login </button>
                    </form>
                </div>

                <div class="col-6 login-right" style="background-color: #f18973;">
                    <h2>Registra Hear</h2>
                    <form action="registration.php" method="POST">
                        <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user" class="form-control" required>
                        </div>

                        <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary"> Register </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>