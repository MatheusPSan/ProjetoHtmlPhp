<?php

	$nomeCliente                 = $_GET["nomeCliente"];
	$dataMarcada                 = $_GET["dataMarcada"];
	$horaMarcada                 = $_GET["horaMarcada"];
	$celCliente                  = $_GET["celCliente"];
	$DD                          = $_GET["DD"];
	$presençaCliente             = $_GET["presençaCliente"];
	$valor                       = $_GET["valor"];
	$tipoTratamento              = $_GET["tipoTratamento"];
	$obs                         = $_GET["obs"];

	if($nomeCliente=="")
	{
		die("Nome do cliente deve ser informado. Sistema cancelado!");
	}


	if($celCliente=="")
	{
		die("O número do celular deve ser informado. Sistema cancelado!");
	}

	if($DD=="")
	{
		die("O DD do cliente deve ser informado. Sistema cancelado!");
	}


	if($valor=="")
	{
		die("O valor total deve ser informado. Sistema cancelado!");
	}

	if($tipoTratamento=="")
	{
		die("O tipo de tratamento do cliente deve ser informado. Sistema cancelado!");
	}

	echo "O nome do Cliente é <b>$nomeCliente</b>" <br>;
	echo "A data marcada pelo cliente é <b>$dataMarcada</b>" <br>;
	echo "A hora marcada pelo cliente é <b>$horaMarcada</b>" <br>;
	echo "O número do cliente é <b>$celCliente</b>" <br>;
	echo "O DD do cliente é <b>$DD</b>" <br>;
	echo "O cliente compareceu? <b>$presençaCliente</b>" <br>;
	echo "O valor do tratamento do cliente é <b>$valor</b>" <br>;
	echo "O tipo de tratamento do cliente é<b>$tipoTratamento</b>" <br>;

	$con = mysqli_connect("localhost", "root","") or
die("Erro na conexão com Servidor MYSQL");

	$db = mysqli_select_db($con, "salaoHairdresser") or
die("Erro na abertura do banco de dados: " . mysqli_error($con) );

	$sql = "INSERT INTO atendCliente (nomeCliente, dataMarcada, horaMarcada, celCliente, DD, presençaCliente, valor, tipoTratamento, obs)
	VALUES ('$nomeCliente', '$dataMarcada', '$horaMarcada', '$celCliente', '$DD', '$presençaCliente', '$valor', '$tipoTratamento', '$obs')";

	mysqli_query($con, $sql) or
die("Erro na inserção de registro do cliente: " . mysqli_error($con) );
	
	$rs = mysqli_query($con, "SELECT LAST_INSERT_ID() FROM pets");
	$dados = mysqli_fetch_array($rs);
	$idCriado = $dados[0];
	echo "<hr>";
	echo "Registro $idCriado inserido na tabela atendCliente";


?> 