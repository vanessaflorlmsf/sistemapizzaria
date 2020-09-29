<?php
	
	ini_set("display_errors", 1);
	

	//Incluindo o arquivo de rotas
	include_once dirname(__DIR__).'/model/urls.php';

	//incluindo as funçoes de manipulação com o banco
	include_once $project_path.'/model/manager.php';


	$data = $_POST;

	$result = insert_common("tb_user",$data);

	
	if($result){
		header("location: $project_index?success=insert_user_ok");
	}else{
		header("location: $project_index?error=insert_error");	
	}
	

?>