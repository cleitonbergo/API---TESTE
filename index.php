<!DOCTYPE html>
<html>
<head>
	<title></title>


<style>
	#menu ul {
    padding:0px;
    margin:0px;
    background-color:#EDEDED;
    list-style:none;
	}
	#menu ul li { 
		display: inline; 
	}
	#menu ul li a {
    padding: 2px 10px;
    display: inline-block;

    /* visual do link */
    background-color:#EDEDED;
    color: #333;
    text-decoration: none;
    border-bottom:3px solid #EDEDED;
	}
	#menu ul li a:hover {
    background-color:#D6D6D6;
    color: #6D6D6D;
    border-bottom:3px solid #EA0000;
	}
</style>

</head>
<body>

<div class="corpo" style="background-color: #ccc; text-align: center;">
		<h1>Página principal do site </h1>
	</div>
	
<nav id="menu">
    <ul>
		<li><a href="#">Home</a></li>
		<li><a href="inserir_vendedor.php">Inserir Vendedor</a></li>
		<li><a href="MATRIZ/vendedores.php">Listar Vendedores</a></li>
        <li><a href="listar_vendas_vendedores.php">Consultar Vendas</a></li>
        <li><a href="lancar_vendas.php">Lançar Vendas</a></li>
        <li><a href="MATRIZ/relatorio.php">Relátorio</a></li>
    </ul>
</nav>
	

	
</body>
</html>