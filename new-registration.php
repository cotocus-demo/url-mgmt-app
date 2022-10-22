<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 login-right">
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