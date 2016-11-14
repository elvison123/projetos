<?php 
session_start();
if(!isset($_SESSION["nomeusuario"])){
    header('Location: LoginUsuario.php');
   
}
?>
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
        <li role="presentation" class="active"><a href="../home/home-usuario.php">Home</a></li>
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
                <li><a href="../../controller/UsuarioController.php?acao=listarusuarios"> Mostrar Usuários Cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Chamados <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Modulos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../view/classificacoes/cadastrar-classificacao.php">Cadastrar Classificação</a></li>
                <li><a href="../../controller/ClassificacaoController.php?acao=buscartodos">Listar Classificacoes Cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginamodulo">Cadastrar Modulos</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarmodulo">Listar Modulos </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=paginafuncao">Cadastrar função</a></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=listarfuncoes">Listar Funções cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../view/prioridade/cadastrar-prioridade.php">Cadastrar Prioridade</a></li>
                <li><a href="../../controller/PrioridadeController.php?acao=buscartodos">Listar Prioridades Cadastradas</a></li>
                

            </ul></li>
            
            <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php  if (isset($_SESSION['nomeusuario'])){echo "Olá, " . $_SESSION["nomeusuario"];}; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"></a></li>
                    <li><a href="#">Configurações do perfil</a></li>
                    
                    
                </ul>
            </li>
            <li><a href="../../controller/LoginUsuarioController.php?acao=logout">Sair</a></li>
        </ul>
    </ul>
    
    <div class="container">
        <?php if (isset($_GET['status'])) { ?>
                <div class="alert alert-info">
                    <center><?php echo $_GET['status']; ?></center>
                </div>
           

        <?php }; ?>
        <h1>Listar Prioridades</h1>
        <div class="row col-xs-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="info">
                        <td>ID</td>
                        <td><strong>NOME DA PRIORIDADE</strong></td>
                        <td><strong>DELETAR<strong></td>
                        <td><strong>EDITAR<strong></td>
                        
                    </tr>
                </thead>
                <?php if (isset($_SESSION["linha"])){foreach ($_SESSION["linha"] as $linha):?>   
                <tbody>
                    <tr>
                        <td><?php echo $linha["id_prioridade"];?></td>
                        <td><?php echo $linha["nome"];?></td>
                        <td><button class="delete btn btn-danger" data-nome ="<?php echo $linha["nome"]; ?>" data-id="<?php echo $linha["id_prioridade"]; ?>"data-target="#myModal">Excluir</td>
                    <td><a class="btn btn-default" href="editar-prioridade.php?id_prioridade=<?php echo $linha["id_prioridade"];?>&nome=<?php echo $linha["nome"];?>" role="button">Editar</a></td>
                        
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
                    $('a.delete-yes').attr('href', '../../controller/PrioridadeController.php?acao=deletar&id=' + id); // mudar dinamicamente o link, href do botão confirmar da modal
                    $('#myModal').modal('show'); // modal aparece
                });
            </script>
            
            
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
                    Tem certeza que deseja excluir a função <strong><span class="nome"></span></strong>?
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-default delete-yes">Sim</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
        
            
            
        
            
            
            
            
        </form> 
        
        
</div>
</html>
