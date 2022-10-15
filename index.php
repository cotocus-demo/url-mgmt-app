<?php
    include 'news-form-details/connect.php';
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
                    <?php
                        $sql="Select * from news_details";
                        $result=mysqli_query($con,$sql);

                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
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
                            };
                        }
                    ?>
                </tbody>
            </table>
            
        </div>
    </body>
</html>