<?php


	class Vendedores
	{
		public function exibir()
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');

			$sql = "SELECT * FROM vendedores ORDER BY id ASC";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Nenhum vendedor cadastrado!");
			}
			
			return $resultados;

			// $con = null;
		}


		public function inserir($nome=null,$email=null)
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');

			$sql = "INSERT into vendedores  (nome,email) 
								VALUES(:nome,:email)";
			$sql = $con->prepare($sql);

			$sql->bindParam(':nome', $nome, PDO::PARAM_STR, 12);
			$sql->bindParam(':email', $email, PDO::PARAM_STR, 12);

			$sql->execute();

			
			if ($sql==true) {
				echo "Vendedor Cadastrado com sucesso" ;
			} else{
				echo "Não foi possivel cadastradar esse vendedor";
			}

			

		}
	}


	class Vendas
	{
		public function lancarVendas($id_vendedor=null,$valor_venda=null)
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');


				$valor_formatado 	=  str_replace(",",".",$valor_venda);	
				$data				= date("d/m/Y");
				$valor_comissao 	= number_format( 8.5/100 * $valor_formatado, 2, '.', ',');



				#ATUALIZAR COMISSÃO DO VENDEDOR
				$sqlVendedor	= "SELECT comissao FROM vendedores where id = :id_vendedor";
				$sqlVendedor 	= $con->prepare($sqlVendedor);
				$sqlVendedor->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
				$sqlVendedor->execute();

				#VALOR COMISSÃO
				$result = $sqlVendedor->fetch(PDO::FETCH_ASSOC);
				$resultcomissao = $result['comissao'];
				
				$vendedorComissao = $resultcomissao + $valor_comissao;


				#ATUALIZANDO COMISSÃO DO VENDEDOR NA TABELA VENDEDOR
				$sqlVendedorUpdate 	= "UPDATE vendedores SET comissao = $vendedorComissao WHERE id = :id_vendedor";
				$sqlVendedorUpdate	= $con->prepare($sqlVendedorUpdate);
				$sqlVendedorUpdate->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
				$sqlVendedorUpdate->execute();
				
			

				#INSERINDO VENDA NA TABELA VENDA
				$sql = "INSERT INTO VENDAS (id_vendedor,valor_venda,comissao,data_venda)
								VALUES (:id_vendedor,$valor_formatado,$valor_comissao,'$data')";

				$sql = $con->prepare($sql);
				$sql->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
				// $sql->bindParam(':valor_venda', $valor_venda, PDO::PARAM_STR, 12);
				$sql->execute();

			

				if ($sql==true) {
					echo "Venda efetuada com sucesso";
				} else{
					echo "Não foi possivel efetuar essa venda";
				}
				return $sql;

			$con = null;

		}


		public function exibirTodos()
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');

			
				$sql = "SELECT * FROM vendas";
				$sql = $con->prepare($sql);
				$sql->execute();

				$resultados = array();

				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$resultados[] = $row;
				}

				if (!$resultados) {
					throw new Exception("Nenhuma venda cadastrada!");
				}
				
				return $resultados;
				
				$con = null;

		}

		public function exibirVendedores($id_vendedor=null)
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');

			
				$sql = "SELECT vd.id_vendedor,vr.nome,vr.email,vd.comissao,vd.valor_venda,vd.data_venda FROM vendas as vd
				INNER JOIN vendedores as vr
				ON vd.id_vendedor = vr.id
				 WHERE vd.id_vendedor = :id_vendedor";

				$sql = $con->prepare($sql);
				$sql->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
				$sql->execute();

				$resultados = array();

				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$resultados[] = $row;
				}

				if (!$resultados) {
					throw new Exception("Esse vendedor nao possui nenhuma venda!");
				}
				
				return $resultados;
				
				$con = null;

		}


		public function relatorioEmail()
		{
			$con = new PDO('mysql: host=127.0.0.1; dbname=admin;','root','');

			
				$data_atual = date("d/m/Y");

				$sql = "SELECT FORMAT(SUM(valor_venda),2) FROM vendas as Soma WHERE data_venda = '$data_atual' ";

				$sql = $con->prepare($sql);
				$sql->execute();

				$resultados = array();

				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$resultados[] = $row;
				}

				if (!$resultados) {
					throw new Exception("Esse vendedor nao possui nenhuma venda!");
				}
				
				return $resultados;
				
				$con = null;

		}
	}



?>