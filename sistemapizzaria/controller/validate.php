<?php

	//include_once 'connect.php';
	include_once dirname(__DIR__).'/model/manager.php';

	function validate_message(){
		if(isset($_GET['error'])){
			$alert_message = $GLOBALS['dictionary'][$_GET['error']];
			$alert_icon = "warning-sign";
			$alert_class = "danger";
		}elseif(isset($_GET['success'])){
			$alert_message = $GLOBALS['dictionary'][$_GET['success']];
			$alert_icon = "ok-circle";
			$alert_class = "success";
		}else{
			return false;
		}

		//incluir o arquivo gerador de mensagens;
		include_once $GLOBALS['project_path']."/view/alert.html";

	}


	function validate_option(){
		if(!isset($_GET['option'])){
			return false;
		}

		switch($_GET['option']){
			
			case "list_clients":

				$table_content = select_common("tb_client",null,null,null);

				$table_titles['id_client'] = "ID";
				$table_titles['client_name'] = "Nome";
				$table_titles['client_cpf'] = "CPF";
				$table_titles['client_phone'] = "Telefone";

				//filtro para as ações
				$filter = "id_client";

				//Minhas ações na tabela
				$update = true;
				$delete = true;
				
				//caminho da ação
				$update_destiny = "?option=update_client";
				$delete_destiny = $GLOBALS['project_index']."controller/delete_client.php";

				//incluindo o arquivo de tabela
				include_once $GLOBALS['project_path'].'/view/list_common.html';

				echo '<a href="?option=add_client">';
				echo '<span class="glyphicon glyphicon-plus"></span>';
				echo ' Novo Cliente </a><br>';

			break;

			case "add_client":

				include_once $GLOBALS['project_path']."/view/forms/add_client.html";

			break;


			case "update_client":
				
				$filters['id_client'] = $_GET['filter'];

				//buscando dados do cliente
				$client = select_common('tb_client', null, $filters,null);

				//salvando os dados num array			
				$client = $client[0];
				
				//var_dump($client);
				include_once $GLOBALS['project_path'].'/view/forms/update_client.html';


			break;

			############  PRODUTOS ###########################

			case "list_products":


				$table_content = select_common("tb_product",null,null,null);

				$table_titles['id_product'] = "ID";
				$table_titles['product_name'] = "Nome";
				$table_titles['product_desc'] = "Descrição";
				$table_titles['product_price'] = "Preço";
				$table_titles['product_stock'] = "Quantidade(s)";

				//filtro para as ações
				$filter = "id_product";

				//Minhas ações na tabela
				$update = true;
				$delete = true;
				
				//caminho da ação
				$update_destiny = "?option=update_product";
				$delete_destiny = $GLOBALS['project_index']."controller/delete_product.php";

				//incluindo o arquivo de tabela
				include_once $GLOBALS['project_path'].'/view/list_common.html';

				echo '<a href="?option=add_product">';
				echo '<span class="glyphicon glyphicon-plus"></span>';
				echo ' Novo Produto </a><br>';

			break;


			case "add_product":

				include_once $GLOBALS['project_path']."/view/forms/add_product.html";

			break;


			case "update_product":
				
				$filters['id_product'] = $_GET['filter'];

				//buscando dados do cliente
				$product = select_common('tb_product', null, $filters,null);

				//salvando os dados num array			
				$product = $product[0];
				
				//var_dump($client);
				include_once $GLOBALS['project_path'].'/view/forms/update_product.html';


			break;
			###################### VENDAS #####################

			case "list_sales":
				/*
				$table_content = select_common("tb_product",null,null,null);

				$table_titles['id_product'] = "ID";
				$table_titles['product_name'] = "Nome";
				$table_titles['product_desc'] = "Descrição";
				$table_titles['product_price'] = "Preço";
				$table_titles['product_stock'] = "Quantidade(s)";

				//filtro para as ações
				$filter = "id_product";

				//Minhas ações na tabela
				$update = true;
				$delete = true;
				
				//caminho da ação
				$update_destiny = "?option=update_product";
				$delete_destiny = $GLOBALS['project_index']."controller/delete_product.php";
				*/
				//incluindo o arquivo de tabela
				include_once $GLOBALS['project_path'].'/view/list_common.html';
				
				echo '<a href="?option=add_sale">';
				echo '<span class="glyphicon glyphicon-plus"></span>';
				echo ' Nova Venda </a><br>';

			break;


			case "add_sale":
				@session_start();
				if(isset($_SESSION['funcionario'])){
					$user = $_SESSION['funcionario'];
				}

				//echo $user['id_user'];
				$filters['id_user'] = $user['id_user'];
				$functionary = select_common("tb_user",null,$filters,null);
				
				//salvando os dados num array			
				$functionary = $functionary[0];


				//pegando os dados dos clientes;
				$clients = select_common("tb_client",null,null,null);

				//pegando os dados dos produtos;
				$products = select_common("tb_product",null,null,null);


				include_once $GLOBALS['project_path']."/view/forms/add_sale.html";

			break;


			case "update_sale":
				/*
				$filters['id_product'] = $_GET['filter'];

				//buscando dados do cliente
				$product = select_common('tb_product', null, $filters,null);

				//salvando os dados num array			
				$product = $product[0];
				
				//var_dump($client);
				include_once $GLOBALS['project_path'].'/view/forms/update_product.html';
				*/

			break;


		}


	}



?>