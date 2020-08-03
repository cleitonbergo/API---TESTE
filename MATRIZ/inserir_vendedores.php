<?php 

	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$url = 'http://localhost/admin/rest/api/v1';

	$classe = 'Vendedores';
	$metodo = 'inserir';

	$montar = $url.'/'.$classe.'/'.$metodo. '/'.$nome.'/'.$email;

	$retorno = file_get_contents($montar);

	

	var_dump(json_decode($retorno, true));

?>