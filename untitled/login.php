<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>reizen</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom/css.css">
</head>
<body class="bg-image">

<div id="login">
    <div class="container">
        <div id="login-row" class="row d-flex justify-content-center align-items-center">
            <div id="login-column" class="col-md-4">
                <div id="login-box" class="col-md-8">
                    <form id="login-form" class="form" action="login_verwerk.php" method="post">
                        <div class="form-group">
                            <label for="username" class="text-dark">Studenten Nummer:</label><br>
                            <input type="text" name="student_id" id="student_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-dark">Wachtwoord:</label><br>
                            <input type="password" name="wachtwoord" id="wachtwoord" class="form-control">
                        </div>
                        <div style=" margin: auto; width: 100%;"class="form-group">
                            <input type="submit" name="Inlog" class="btn btn-light btn-md" value="Login">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>

    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        background:white;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
</html>