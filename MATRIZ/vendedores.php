<?php

	$url = 'http://localhost/admin/rest/api/v1';

	$classe = 'Vendedores';
	$metodo = 'exibir';

	$montar = $url.'/'.$classe.'/'.$metodo;

	$retorno = file_get_contents($montar);

	var_dump(json_decode($retorno, 1));

?>