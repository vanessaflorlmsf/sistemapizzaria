<?php
	session_start();
	$user = $_SESSION['funcionario'];
	$page = $user['user_type'];

	ini_set("display_errors", 1);
	
	//Incluindo o arquivo de rotas
	include_once dirname(__DIR__).'/model/urls.php';

	//incluindo as funçoes de manipulação com o banco
	include_once $project_path.'/model/manager.php';

	//guardando os dados novos na variavél	
	$new_data = $_POST;

	//eliminando o filtro;
	unset($new_data['filter']);


	//var_dump($new_data);
	$update = update_common("tb_product",$new_data,array('id_product'=>$_POST['filter']),null);


	
	if($update){
		header("location: $project_index/$page.php?option=list_products&success=update_ok");
	}else{
		header("location: $project_index/$page.php?error=update_error");	
	}
	

?>