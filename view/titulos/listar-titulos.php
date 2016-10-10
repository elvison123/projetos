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
                <li><a href="../usuarios/cadastrar-usuario.php">Cadastrar Usuários</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/UsuarioController.php?acao=listarusuarios"> Mostrar todos os Usuários cadastrados</a></li>
                

            </ul></li>
    </ul>

<div class="container">
    <div class="row">
        <div class="">
            <h1 class="h1 col-xs-5">Listar Títulos </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <table class="table table-bordered table-hover">

                <thead>
                    <tr class="info">
                        <td><strong>NOME</strong></td>
                        <td><strong>VALOR</strong></td>
                        <td><strong>DESCRIÇÃO</strong></td>
                        <td><strong>NºDOCUMENTO</strong></td>
                        <td><strong>SITUACAO</strong></td>
                        <td><strong>PARCELAS</strong></td>
                        <td><strong>DATA</strong></td>
                        <td><strong>VENCIMENTO</strong></td>
                        <td class="danger"><strong>DELETAR</strong></td>
                        <td class="danger"><strong>EDITAR</strong></td>

                    </tr>
                </thead>

                
                <?php session_start() ?>
            <?php if (isset($_SESSION["linhas"])){foreach ($_SESSION["linhas"] as $linha):?>      
                        <tbody>
                            <tr> 
                                <td><?php echo $linha["nome"]; ?></td>
                                <td><?php echo $linha["valor_documento"]; ?></td>
                                <td><?php echo $linha["descricao"]; ?></td>
                                <td><?php echo $linha["documento"]; ?></td>
                                <td><?php echo $linha["situacao"]; ?></td>
                                <td><?php echo $linha["parcela"]; ?></td>
                                <td><?php echo $linha["data_operacao"]; ?></td>
                                <td><?php echo $linha["forma_pagamento"]; ?></td>
                                <td><button class="delete btn btn-danger" data-nome="<?php echo $linha["nome"]; ?>" data-id="<?php echo $linha["id_titulo"]; ?>"data-target="#myModal">Excluir</a>

                                        <td><a class="btn btn-default"href="editar-titulos.php?id_titulo=<?php echo $linha["id_titulo"]; ?>&nome=<?php echo $linha["nome"]; ?>&valordocumento=<?php echo $linha["valor_documento"]; ?>&descricao=<?php echo $linha["descricao"]; ?>&documento=<?php echo $linha["documento"]; ?>&situacao=<?php echo $linha["situacao"]; ?>&parcela=<?php echo $linha["parcela"]; ?>&dataoperacao=<?php echo $linha["data_operacao"]; ?>&datavencimento=<?php echo $linha["forma_pagamento"]; ?>" >Editar</a></td>
                            </tr>
                        </tbody>
                        <?php
                    endforeach;
                }
                ?>



            </table>
            <script>
                $('.delete').on('click', function () {
                    var nome = $(this).data('nome'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
                    var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
                    $('span.nome').text(nome); // inserir na o nome na pergunta de confirmação dentro da modal
                    $('a.delete-yes').attr('href', '../../controller/TituloController.php?acao=excluirtitulo&id=' + id); // mudar dinamicamente o link, href do botão confirmar da modal
                    $('#myModal').modal('show'); // modal aparece
                });
            </script>


        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="h2 center-block"> Rodape</h2>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar Ação</h4>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir o titulo de <strong><span class="nome"></span></strong>?
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-default delete-yes">Sim</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>







    


</div>





</body>
</html>
