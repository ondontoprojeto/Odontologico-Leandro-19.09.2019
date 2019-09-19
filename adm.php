<!DOCTYPE html>
<html>
  <head>
    <title>Odonto - Administração</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7b04e73c30.js"></script>
    <link rel="stylesheet" type="text/css" href="styleHeader.css">
  </head>
  <body>

  <?php include 'header.php'?>  

    <h1 class = "text-center mb-4">Painel Administrativo</h1>

      <!--Botão que ativa o Modal-->
    <span class = "d-flex d-inline-flex mb-2">
      <form class="form-inline">
            <input class="form-control mr-2 ml-1" type="search" name = "nome">
            <button class="btn btn-success btn-md mr-3" type="submit">Pesquisar</button>
        </form>
           <?php
          
              if(isset($_GET["nome"])){
                  $nome = $_GET["nome"];

                  include_once 'conexao.php';
                  
                  $sql = "SELECT * FROM login WHERE login
                  LIKE '{$login}%'";
                  
                  $result = mysqli_query($con, $sql); 
              }           
            ?> 

            <?php
          
              if(isset($_GET["nome"])){
                  $nome = $_GET["nome"];

                  include_once 'conexao.php';
                  
                  $sql = "SELECT * FROM especialidade WHERE nome
                  LIKE '{$nome}%'";
                  
                  $result = mysqli_query($con, $sql); 
              }           
            ?> 
<!--Botão modal1-->
      <button type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modal1">Cadastro de Usuário</button>
      
      <input type="button" class ="btn btn-dark ml-2" onclick="window.print();" value="Imprimir">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<!--Modal modal2-->
      <button type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modal2">Cadastro de Atendimentos</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;


   <!--Modal modal3-->  

   <button type="button" class="btn btn-primary btn-md ml-2" data-toggle="modal" data-target="#modal3">Cadastro de Procedimentos</button>

      <!--Modal  Tela de Cadastro--USUÁRIO-->
      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Usuário</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <div class="modal-body">
                  <h5>Dados Pessoais:</h5>
              <form class = "form-group mt-2" action="admCadastrol.php" method="post">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" placeholder="" name = "nome">
                </div> 



                ------------------------------------------

<div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name">
    </div>
  </div>



                -----------------------------------------------               

                <div class="form-group">
                  <label for="login">Login:</label>
                  <input type="text" class="form-control" id="login" placeholder="" name = "login">
                </div> 

                <div class="form-group">
                  <label for="senha">Senha:</label>
                  <input type="password" class="form-control" id="senha" placeholder="" name = "senha">
                </div> 

                <div class="form-group">
                  <label for="perfil">Perfil:</label>
                  <input type="text" class="form-control" id="perfil" placeholder="" name = "perfil">
                </div>
                <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">

              </form>
                </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </span>
      <div class = "row">
       <div class = "col-md-8 overflow-auto ml-1 mr-1" style = "max-width:550px">
      <table class="table border table-striped">
        <thead id = "theadCadastro" class = "bg-light">
          <tr>
            <th scope="col">Nome</th>                    
            <th scope="col">Login</th>
            <th scope="col">Perfil</th>           
            
          </tr>
        </thead>
        <tbody id = "tbodyCadastro">
          <?php
            include_once 'conexao.php';

            $sql = "SELECT * FROM login";

            $busca = mysqli_query($con, $sql);

            while($array = mysqli_fetch_array($busca)){             
                        
            $nome = $array['nome']; 
            $login = $array['login'];
            $senha = $array['senha'];
            $perfil = $array['perfil'];                      

          ?>
            <tr>
              <td><?php echo $nome?></td>                
              <td><?php echo $login?></td>
               <td><?php echo $senha?></td>                
              <td><?php echo $perfil?></td>             
             

              <td>
                <a class="btn btn-warning btn-sm"  style="color:#fff" href="editarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-edit"></i></a> 
                <a class="btn btn-danger btn-sm"  style="color:#fff" href="deletarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-trash-alt"></i></a>
              </td>
         </tr>
              
          <?php } ?>
        </tbody>
      </table>
    </div>

<!--Modal  Tela de Cadastro-- TIPO DE ATENDIMENTO-->  
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Atendimentos</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <div class="modal-body2">
                  <h5>Dados Pessoais:</h5>
              <form class = "form-group mt-2" action="admCadEspecial.php" method="post">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control" id="nome" placeholder="" name = "nome">
                </div>                

                <div class="form-group">
                  <label for="observacao">observacao:</label>
                  <input type="text" class="form-control" id="observacao" placeholder="" name = "observacao">
                </div> 
                
                <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">

              </form>
                </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
  
       <div class = "col-md-4 overflow-auto ml-1 mr-1" style = "max-width:550px">
      <table class="table border table-striped">
        <thead id = "theadCadastro" class = "bg-light">
          <tr>
            <th scope="col">Nome</th>                    
            <th scope="col">observacao</th>
                  
            
          </tr>
        </thead>
        <tbody id = "tbodyCadastro">
          <?php
            include_once 'conexao.php';

            $sql = "SELECT * FROM especialidade";

            $busca = mysqli_query($con, $sql);

            while($array = mysqli_fetch_array($busca)){             
                        
            $nome = $array['nome']; 
            $observacao = $array['observacao'];
                                 

          ?>
            <tr>
              <td><?php echo $nome?></td>                
              <td><?php echo $observacao?></td>                        
             

              <td>
                <a class="btn btn-warning btn-sm"  style="color:#fff" href="editarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-edit"></i></a> 
                <a class="btn btn-danger btn-sm"  style="color:#fff" href="deletarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-trash-alt"></i></a>
              </td>
         </tr>
              
          <?php } ?>
        </tbody>
      </table>
     </div>

<!--Modal  Tela de Cadastro--PROCEDIMENTOS--> 


<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary ml-5" id="modalTitle">Cadastro de Procedimentos</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <div class="modal-body2">
                  <h5>Tipo de Procedimentos:</h5>
              <form class = "form-group mt-2" action="admCadProcedimento.php" method="post">
                <div class="form-group">
                  <label for="nomeprocedimento">Nome:</label>
                  <input type="text" class="form-control" id="nomeprocedimento" placeholder="" name = "nomeprocedimento">
                </div>                

                              
                <input type="submit" class="btn btn-primary float-right" value = "Cadastrar">

              </form>
                </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
  
       <div class = "col-md-4 overflow-auto ml-1 mr-1" style = "max-width:550px">
      <table class="table border table-striped">
        <thead id = "theadCadastro" class = "bg-light">
          <tr>
            <th scope="col">Nome do Procedimento</th>                    
           
                  
            
          </tr>
        </thead>
        <tbody id = "tbodyCadastro">
          <?php
            include_once 'conexao.php';

            $sql = "SELECT * FROM procedimento";

            $busca = mysqli_query($con, $sql);

            while($array = mysqli_fetch_array($busca)){             
                        
            $nomeprocedimento = $array['nomeprocedimento']; 
           
                                 

          ?>
            <tr>
              <td><?php echo $nomeprocedimento?></td>                
                                     
             

              <td>
                <a class="btn btn-warning btn-sm"  style="color:#fff" href="editarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-edit"></i></a> 
                <a class="btn btn-danger btn-sm"  style="color:#fff" href="deletarCadastro.php?id=<?php echo $idPessoa ?>" role="button"><i class="far fa-trash-alt"></i></a>
              </td>
         </tr>
              
          <?php } ?>
        </tbody>
      </table>
     </div>





    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>