<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
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
                <li><a href="../../controller/ClienteController.php?acao=buscartodos" >Mostrar Clientes Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Títulos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../../controller/TituloController.php?acao=listarclientes">Cadastrar Títulos a receber</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/TituloController.php?acao=listartitulos"> Mostrar todos os títulos cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Usuários <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="cadastrar-usuario.php">Cadastrar Usuários</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/UsuarioController.php?acao=listarusuarios"> Mostrar todos os Usuários cadastrados</a></li>
                

            </ul></li>
    </ul>




    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <h1 class="h1">Listar Usuarios</h1>
            </div>
        </div>

        <di class="container">
            <table class="table table-bordered table-hover">
                <thead >
                    <tr class="info">
                        <td><strong>ID</strong></td>
                        <td><strong>NOME</strong></td>
                        <td><strong>EMAIL</strong></td>
                        <td><strong>LOGIN</strong></td>
                        <td><strong>CPF</strong></td>
                        <td><strong>EMPRESA</strong></td>
                        <td><strong>SENHA</strong></td>
                        <td><strong>DELETAR</strong></td>
                        <td><strong>EDITAR</strong></td>


                    </tr>


                </thead>
                <tbody>

                    <?php session_start();
                    
                        if (isset($_SESSION["usuarios"])){foreach ($_SESSION["usuarios"] as $usuario): ?>
                            <tr>
                                <td><?php echo $usuario["id_usuario"] ?></td>
                                <td><?php echo $usuario["nome"] ?></td>
                                <td><?php echo $usuario["email"] ?></td>
                                <td><?php echo $usuario["login"] ?></td>
                                <td><?php echo $usuario["cpf"] ?></td>
                                <td><?php echo $usuario["empresa"] ?></td>
                                <td><?php echo $usuario["senha"] ?></td>
                                <td><button class="delete btn btn-danger" data-nome ="<?php echo $usuario["nome"]; ?>" data-id="<?php echo $usuario["id_usuario"]; ?>"data-target="#myModal">Excluir</td>
                                <td><a class="btn btn-default" href="editar-usuario.php?id_usuario=<?php echo $usuario["id_usuario"] ?>&nome=<?php echo $usuario["nome"] ?>&email=<?php echo $usuario["email"] ?>&login=<?php echo $usuario["login"] ?>&cpf=<?php echo $usuario["cpf"] ?>&empresa=<?php echo $usuario["empresa"] ?>&senha=<?php echo $usuario["senha"] ?>">Editar</a></td>

                            </tr>

                        </tbody>
    <?php endforeach;
                               };?>





            </table>




        </di>
        <script>
        $('.delete').on('click', function () {
                    var nome = $(this).data('nome'); 
                    var id = $(this).data('id');
                    $('span.nome').text(nome); 
                    $('a.delete-yes').attr('href', '../../controller/UsuarioController.php?acao=excluirusuario&id=' + id); 
                    $('#myModal').modal('show'); 
                });
        </script>
        
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmar Ação</h4>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o usuário <strong><span class="nome"></span></strong>?
                    </div>
                    <div class="modal-footer">
                        <a href="#" type="button" class="btn btn-default delete-yes">Sim</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>















    </body>
</html>