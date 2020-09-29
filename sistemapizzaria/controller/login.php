<?php
	ini_set("display_errors", 1);

	//Incluindo as rotas
	include_once dirname(__DIR__).'/model/urls.php';

	//Incluindo o arquivo de gerenciamento de dados
	include_once $project_path.'/model/manager.php';


	//Receber os dados do formulário
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_password'];

	/*
	echo $user_email;
	echo $user_pass;
	*/
	//verificando o usuário no banco de dados
	#filtros
	$filters['user_email'] = $user_email;
	$user_data = select_common('tb_user',null,$filters,null);

	if($user_data == false){
		//user não encontrado
		header("location: $project_index?error=user_not_found");
	}elseif($user_data[0]['user_password'] != $user_pass){
		//Senha Incorreta
		header("location: $project_index?error=password_incorrect");
	}else{
		//Se tudo estiver certo, ele cria o teste de usuário para a sessão
		#Funcionario
		if($user_data[0]['user_type'] == "funcionario"){
			//$user = $user_data;
			session_start();

			//var_dump($user_data);

			$_SESSION['funcionario'] = $user_data[0];
			header("location: $project_index");
		}
	}

	

	//echo $user_data[0]['user_password'];


?>