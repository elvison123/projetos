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
        <title>Listar</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!--<script src="../js/valida_cpf_cnpj.js"></script>-->
        <script src="../js/exemplo_1.js"></script>
        <script src="../js/exemplo_2.js"></script>     
        <script src="../js/exemplo_3.js"></script> 
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
                <li><a href="../chamados/cadastrar-chamado.php">Cadastrar Clientes</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ClienteController.php?acao=buscartodos" >Mostrar Clientes Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Fornecedores <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../fornecedores/cadastrar-fornecedor.php">Cadastrar Fornecedores</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/FornecedorController.php?acao=buscartodos" >Mostrar Fornecedores Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Títulos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../../controller/TituloController.php?acao=listarchamados">Cadastrar Títulos a receber</a></li>
                <li><a href="../../controller/TituloController.php?acao=listartitulos"> Mostrar todos os títulos a receber</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/TituloPagarController.php?acao=listarfornecedor">Cadastrar Títulos a pagar</a></li>
                <li><a href="../../controller/TituloPagarController.php?acao=listartitulos"> Mostrar todos os títulos a pagar</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Usuários <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../usuarios/cadastrar-usuario.php">Cadastrar Usuários</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/UsuarioController.php?acao=listarusuarios"> Mostrar todos os Usuários cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Chamados <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
                <li><a href="../../view/classificacoes/cadastrar-classificacao.php">Cadastrar Classificação</a></li>
                <li><a href="../../controller/ClassificacaoController.php?acao=buscartodos">Listar Classificacoes Cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginamodulo">Cadastrar Modulos</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarmodulo">Listar Modulos </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=paginafuncao">Cadastrar função</a></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=listarfuncoes">Listar Funções cadastradas</a></li>
                

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
      
      <?php if (!empty($_SESSION["mensagem"])): ?>
        <div class="alert alert-danger">
                    <center><?php echo $_SESSION["mensagem"]; unset($_SESSION["mensagem"]); ?></center>
                </div>
        <?php endif; ?>
         
      
    <div class="row">
        <div class="col-xs-4">
            <h1 class="h1">Listar Clientes</h1>
        </div>
    </div>
    <div class="container">
        
        
        
        
        <table class="table table-bordered table-hover">
            
            <thead>
                <tr class="info">
                <td><strong>Id</strong></td>
                <td><strong>Cliente</strong></td>
                <td><strong>Equipamento</strong></td>
                <td><strong>Classificação</strong></td>
                <td><strong>Módulo</strong></td>
                <td><strong>Função</strong></td>
                <td><strong>Prioridade</strong></td>
                <td><strong>Descrição</strong></td>
                <td><strong>Deletar</strong></td>
                <td><strong>Editar</strong></td>
                               
            </tr>
            </thead>    

            
            <?php if (isset($_SESSION["chamados1"])){foreach ($_SESSION["chamados1"] as $chamados):?>     
            <tbody>        
                <tr>
                <td><?php echo$chamados["id_chamado"];?></td>
                <td><?php echo$chamados["cliente"];?></td>
                <td><?php echo$chamados["equipamento"];?></td>
                <td><?php echo$chamados["classificacao"];?></td>
                <td><?php echo$chamados["modulo"];?></td>
                <td><?php echo$chamados["funcao"];?></td>
                <td><?php echo$chamados["prioridade"];?></td>
                <td><?php echo$chamados["descricao"];?></td>
                
                <td><button class="delete btn btn-danger" data-nome ="<?php echo$chamados["nome"]; ?>" data-id="<?php echo$chamados["id_chamado"]; ?>"data-target="#myModal">Excluir</td>
                
                <td><a class="btn btn-default" href="editar-chamado.php?id_chamado=<?php echo$chamados["id_chamado"];?>&cliente=<?php echo$chamados['cliente'];?>&equipamento=<?php echo$chamados["equipamento"];?>
                       &classificaccao=<?php echo$chamados["classificacao"];?>&modulo=<?php echo$chamados["modulo"];?>&funcao=<?php echo$chamados["funcao"];?>&
                       prioridade=<?php echo$chamados["prioridade"];?>&descricao=<?php echo$chamados["descricao"];?>" role="button">Editar</a></td>
            </tr>
            </tbody>
                    
            <?php endforeach;}?>   
            
        </table>
        </div>
        <script>
        $('.delete').on('click', function () {
                    var nome = $(this).data('cliente'); 
                    var id = $(this).data('id');
                    $('span.nome').text(nome); 
                    $('a.delete-yes').attr('href', '../../controller/ChamadosController.php?acao=deletar&id=' + id); 
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
                        Tem certeza que deseja excluir o chamado <strong><span class="nome"></span></strong>?
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
