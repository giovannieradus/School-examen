<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ga Lekker Reizen</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom/css.css">
</head>
<body class="bg-image-login">
<div class="container">
<!-- Dit is een kaart met daarin het formulier
 -->
    <div class="card mx-auto mx-5" style="width: 20rem; margin-top: 25%;">
        <div class="card-body">
            <h5 class="text-center">Login</h5>
            <div>
                <div id="login">
                    <div class="container">
                        <!-- Het Formulier wordt doorgestuurd naar het verwerkingspagina -->

                        <form id="login-form" class="form" action="login_verwerk.php" method="post">
                            <div class="form-group">
                                <label for="username" class="text-dark">Studenten Nummer:</label><br>
                                <input type="text" name="student_id" id="student_id" class="form-control">
                            </div>
                            <div class="form-group">ß
                                <label for="password" class="text-dark">Wachtwoord:</label><br>
                                <input type="password" name="wachtwoord" id="wachtwoord" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" name="Inlog" class="btn btn-light btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>