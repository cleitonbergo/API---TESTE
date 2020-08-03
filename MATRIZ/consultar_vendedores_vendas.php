<?php 

	$id_vendedor = $_POST['id_vendedor'];

	$url = 'http://localhost/admin/rest/api/v1';

	$classe = 'Vendas';
	$metodo = 'exibirVendedores';

	$montar = $url.'/'.$classe.'/'.$metodo. '/'.$id_vendedor;

	$retorno = file_get_contents($montar);

	

	var_dump(json_decode($retorno, true));

?>