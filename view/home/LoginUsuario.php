
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php if(isset($_GET['erro'])){?>
        <div class="alert alert-danger">
                <strong><?php echo $_GET['erro'];?></strong>
            </div>
            <?php };?>
        </div>
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-center">Acesso Administrativo</h1>
                    <div class="modal-body">
                        <form class="col-xs-12 center-block" id="formlogin"action="../../controller/LoginUsuarioController.php" method="get">

                            <div class="form-group row">
                                <label for="login" class="col-xs-offset-2 col-xs-2 col-form-label">Login</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control"name="login" maxlength="20" id="login" placeholder="digite o nome de acesso">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="senha"class="col-xs-offset-2 col-xs-2 col-form-label">Senha</label>
                                <div class="col-xs-5">
                                    <input type="password" class="form-control" name="senha" maxlength="20" id="senha" placeholder="digite a senha.">

                                </div>
                            </div>
                            <div class="row form-group col-xs-offset-5">
                                <input type="submit" value="Efetuar Login">
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function(){
            $("#formlogin").validate({
                rules:{
                    login:{
                        required: true
                        
                    },
                    senha:{
                        required:true
                    }
                },
                messages:{
                    login:{
                        required:"Preenchimento obrigatório!"
                        
                    },
                    senha:{
                        required:"Preenchimento obrigatório!"
                    }
                    
                }
                
               
                
            });
        });
        
        </script>

    </body>
</html>
