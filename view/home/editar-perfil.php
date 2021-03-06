<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/jquery.maskMoney.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- Bootstrap -->
            <link href="../css/bootstrap.css" rel="stylesheet">

    </head>
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="../home.php">Home</a></li>
        <!-- <li role="presentation"><a href="#">Messages</a></li>-->
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Clientes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../clientes/cadastrar-cliente.php">Cadastrar Clientes</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../clientes/formCliente.php?acao=buscartodos" >Mostrar Clientes Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Títulos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../titulos/formTitulos.php?acao=listarclientes">Cadastrar Títulos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../titulos/formTitulos.php?acao=listartitulos"> Mostrar todos os títulos cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Usuários <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="cadastrar-usuario.php">Cadastrar Usuários</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="formUsuario.php?acao=listarusuarios"> Mostrar todos os Usuários cadastrados</a></li>
                

            </ul></li>
    </ul>



    <div class="container">
    <div class="row">
        <div class="col-xs-4">
            <h1 class="h1">Editar perfil</h1>
        </div>
    </div>

    <div class="container">
        <form action="formUsuario.php" method="GET" id="formcad" novalidate="" >
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_usuario" value="<?php echo ltrim($_GET["id_usuario"]) ?>" >

            <div class="form-group row">
                <label for="nome" class="col-xs-2 col-form-label"  >Nome completo</label>
                <div class="col-xs-10">
                    <input type="name" class="form-control" name="nome"   value="<?php echo ltrim($_GET["nome"]) ?>"id="nome" required maxlength="100" placeholder="Digite o nome do cliente">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-2 col-form-label">E-mail</label>
                <div class="col-xs-10" >
                    <input type="email"class="form-control" name="email"  id="email" required maxlength="50" value="<?php echo ltrim($_GET["email"]) ?>" placeholder="Digite o email do cliente">
                </div>
            </div>
            <div class="form-group row">
                <label  for="login" class="col-xs-2 col-form-label">Login</label>
                <div class="col-xs-10">
                    <input  type="text"class="form-control" name="login" id="login" value="<?php echo ltrim($_GET["login"]) ?>" required maxlength="50" placeholder="Digite o nome de acesso do usuario">
                </div>
            </div>
            <div class="form-group row">
                <label  for="senha" class="col-xs-2 col-form-label" >Senha</label>
                <div class="col-xs-10">
                    <input type="password"class="form-control"  name="senha" id="senha" value="<?php echo ltrim($_GET["senha"]) ?>" required maxlength="10" placeholder="Digite a senha">
                </div>
            </div>
            <div class="form-group row">
                <label for="senhaRep"  class="col-xs-2 col-form-label" >Confirme Senha</label>
                <div class="col-xs-10">
                    <input type="password"class="form-control"  name="senhaRep" value="<?php echo ltrim($_GET["senha"]) ?>" id="senhaRep" required maxlength="10" placeholder="Digite a senha">
                </div>
            </div>
            
            <div class="form-group row">
                <label  for="cpf" class="col-xs-2 col-form-label" >CPF/CNPJ</label>
                <div class="col-xs-10">
                    <input  type="text"class="form-control"  name="cpf" id="cpf"value="<?php echo ltrim($_GET["cpf"]) ?>" required minlength="14" maxlength="14" placeholder="Digite o cpf">
                </div>
            </div>
            <div class="form-group row">
                <label for="empresa" class="col-xs-2 col-form-label" >Empresa</label>
                <div class="col-xs-10">
                    <input  type="text"class="form-control"  name="empresa" id="empresa" value="<?php echo ltrim($_GET["empresa"]) ?>" required maxlength="100" placeholder="Digite o nome da empresa">
                </div>
            </div>
            



            <div class="form-group row">
                
                <input class="center-block btn-success" type="submit" onclick="clicked"id="myBtn" value="Editar">



                </form>

            </div>


            <script>
                $(document).ready(function () {
                    $("#formcad").validate({
                        rules: {
                            nome: {
                                required: true,
                                minlength: 2

                            },
                            email: {
                                required: true,
                                maxlength: 50
                            },
                            login: {
                                required: true,
                                maxlength: 50

                            },
                            senha: {
                                required: true,
                                rangelength: [4, 10]

                            },
                            senhaRep: {
                                required: true,
                                equalTo: "#senha"

                            },
                            
                            cpf: {
                                required: true,
                                minlength: 14,
                                maxlength: 14

                            },
                            empresa: {
                                required: true,
                                maxlength: 100
                            }
                            

                        },
                        messages: {
                            nome: {
                                required: "Preenchimento obrigatório!",
                                minlength: "Deve conter no minimo 2 caracteres!"
                            },
                            email: {
                                required: "Preenchimento obrigatório!!",
                                email: "Email invalido!!",
                                maxlength: "Deve conter no máximo 50 caracteres."
                            },
                            login: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 50 caracteres."

                            },
                            senha: {
                                required: "Preenchimento obrigatório!!",
                                rangelength: "Preencher com no minimo 4 e no máximo 10 caracteres!"

                            },
                            senhaRep: {
                                required: "Preenchimento obrigatório!!",
                                equalTo: "Senhas diferentes"

                            },
                            
                            cpf: {
                                required: "Preenchimento obrigatório!!",
                                minlength: "Deve conter no minimo 14 caracteres.",
                                maxlength: "Deve conter no máximo 14 caracteres."

                            },
                            empresa: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 100 caracteres."
                            }
                           

                        }

                    });

                });
                $(function () {
                    $("#telefone").mask("(99)99999-9999");
                    $("#cpf").mask("999.999.999-99");
                });


            </script>




    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
     



</body>
</html>

