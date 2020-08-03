<?php

	$url = 'http://localhost/admin/rest/api/v1';

	$classe = 'Vendas';
	$metodo = 'relatorioEmail';

	$montar = $url.'/'.$classe.'/'.$metodo;

	$retorno = file_get_contents($montar);

	var_dump(json_decode($retorno, 1));

?>