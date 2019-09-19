
<?php
	include 'conexao.php';

	$sql = "SELECT nome, idade FROM 'tabelaBancoDeDados'";
	$buscar = mysqli_query($con, $sql);

	while($array = mysqli_fetch_array($buscar)){

		$nome =  $array['nome'];
		$idade =  $array['idade'];
?>
	<tr>
		<td><?php echo $nome; ?></td>
		<td><?php echo $idade; ?></td>
	</tr>
<?php } ?>
