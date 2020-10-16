<?php
	session_start();
	$user = $_SESSION['funcionario'];
	$page = $user['user_type'];
	ini_set("display_errors", 1);

	//Incluindo o arquivo de rotas
	include_once dirname(__DIR__).'/model/urls.php';

	//incluindo as funçoes de manipulação com o banco
	include_once $project_path.'/model/manager.php';

	$filter = $_POST['filter'];

	$filters['id_product'] = $filter;
	

	$delete = delete_common("tb_product",$filters,null);

	if($delete){
		header("location: $project_index/$page.php?option=list_products&success=delete_ok");
	}else{
		header("location: $project_index/$page.php?error=delete_error");	
	}
	

?>