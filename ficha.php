<!DOCTYPE html>
<html>
	<head>
		<title>Odonto - Ficha</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styleHome.css">
		<link rel="stylesheet" type="text/css" href="styleHeader.css">
        <script>
            function excluir(id){
                if(confirm('Deseja realmente excluir esta ficha?')){
                    location.href = 'deletarFicha.php?id=' + id;   
                }
            }
        </script>
	</head>
	<body>
		
		<?php include 'header.php'?>

        <h1 class = "text-center mb-4">Fichas de Pacientes</h1>
		
		
		<div class = "pl-5 pr-5">
            <div class = "d-inline-flex">
                <form class="form-inline">
                        <input class="form-control mr-2 ml-1" type="search" name = "nome">
                        <button class="btn btn-success btn-md mr-3" type="submit">Pesquisar</button>
                </form>

                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal1">Nova Ficha</button>
                <input type="button" class ="btn btn-dark ml-5" onclick="window.print();" value="Imprimir">
            </div>
            <!--Modal-->
                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-primary" id="modalTitle">Ficha do Paciente</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="front-left">Descrição do Paciente</h5>
                                <form class = "form-group mt-2" action="cadastrarEstoque.php" method="post">

<!-- Teste Formulario ficha lado a lado -->

<div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Nome">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Numero Ficha">
    </div>
  </div>

  -------------------------


<div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Email">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Telefone">
    </div>
  </div>

   

                                    <div class="form-group">
                                        <label for="nroProduto">N° da Ficha:</label>
                                        <input type="number" class="form-control" id="nroProduto" placeholder="" name = "nroproduto">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" class="form-control" id="nome" placeholder="" name = "nomeproduto">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria">Data de Nascimento:</label>
                                        <input type="date" class="form-control" id="categoria" placeholder="" name = "categoria">
                                    </div>
                                <div class="form-group">
                                        <label for="quanti">Email:</label>
                                        <input type="email" class="form-control" id="quanti" placeholder="" name = "quantidade">
                                    </div>
                                    <div class="form-group">
                                        <label for="fornecedor">Telefone:</label>
                                        <input type="tel" class="form-control" id="fornecedor" placeholder="" name = "fornecedor">
                                    </div>
                                    <input type="submit" class="btn btn-primary float-right" value = "Gerar">
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "overflow-auto" style = "max-height: 550px">
                    <table class="table w-100 mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome </th>
                                <th scope="col">Data Nascimento</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope = "col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                include_once 'conexao.php';

                                $sql = "SELECT * FROM pessoa";

                                $busca = mysqli_query($con, $sql);

                                while($array = mysqli_fetch_array($busca)){


                                    $idPessoa = $array['id_pessoa'];
                                    $cpf = $array['cpf'];
                                    $rg = $array['rg'];
                                    $nome = $array['nome'];
                                    $orcamento = $array['orcamento'];
                                    $telefone = $array['telefone'];
                                    $celular = $array['celular'];
                                    $email = $array['email'];
                                    $cep = $array['cep'];
                                    $endereco = $array['endereco'];
                                    $complemento = $array['complemento'];
                                    $bairro = $array['bairro'];
                                    $nascimento = $array['nascimento'];
                                    $cidade = $array['cidade'];
                                    $uf= $array['uf'];
                                    $situacaoficha = $array['situacaoficha'];
                                    $doencabase = $array['doencabase'];
                                    $alergia = $array['alergia'];
                                    $medicamentos = $array['medicamentos'];
                                    $cirurgia = $array['cirurgia'];
                                    $internacoes = $array['internacoes'];
                                    $pa = $array['pa'];
                                    $queixaprinc = $array['queixaprinc']; 

                                    //Ajuste da formatação da data DD/MM/AAAA
                                    $dtNasci = explode('-', $nascimento);
                                    $dtNascimento = $dtNasci[2] . "-" . $dtNasci[1]. "-" . $dtNasci[0];


                            ?>
                                <tr>
                                    <td><?php echo $idPessoa?></td>
                                    <td><?php echo $nome?></td>
                                    <td><?php echo $dtNascimento?></td>
                                    <td><?php echo $email?></td>
                                    <td><?php echo $telefone?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"  style="color:#fff" href="editarFicha.php?id=<?php echo $id_ficha?>" role="button"><i class="far fa-edit"></i></a>

                                        <a class="btn btn-danger btn-sm"  style="color:#fff" href="deletarFicha.php" onclick="excluir(<?php echo $array['id_ficha']; ?>)" role="button"><i class="far fa-edit"></i></a>
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