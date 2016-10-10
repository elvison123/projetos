<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--        <meta http-equiv="refresh" content="1;Location: home-usuario.php">-->
        <title>Home</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php if (isset($_GET['erro'])) { ?>
                <div class="alert alert-info">
                    <strong><center><?php echo $_GET['erro']; ?></center></strong>
                </div>
            </div> 

        <?php }; ?>
        <script>
            setTimeout(function () {
                window.location.href = 'home-usuario.php'; // the redirect goes here

            }, 1000);
        </script>
    </body>
</html>
