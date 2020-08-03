<?php 

	$id_vendedor = $_POST['id_vendedor'];
	$valor_venda = $_POST['valor_venda'];

	$url = 'http://localhost/admin/rest/api/v1';

	$classe = 'Vendas';
	$metodo = 'lancarVendas';

	$montar = $url.'/'.$classe.'/'.$metodo. '/'.$id_vendedor.'/'.$valor_venda;

	$retorno = file_get_contents($montar);

	

	var_dump(json_decode($retorno, true));

?>