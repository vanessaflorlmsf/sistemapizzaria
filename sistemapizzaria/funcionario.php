<?php
	
	include_once 'model/urls.php';
	include_once 'controller/validate.php';
	include_once 'model/dictionary.php';


	//TESTA SE EXISTE SESSÃO FUNCIONARIO
	@session_start();
	if(!isset($_SESSION['funcionario'])){
		header("location: index.php?error=access_denied");
	}

	//Recupera os dados da Sessão
	$user = $_SESSION['funcionario'];

	//Montando os títulos
	$page_title = "Funcionário ".$user['user_name'];
	$panel_title = "Painel de Controle";

	
	//Função de conteúdo
	function page_content(){
		validate_message();
		validate_option();
		
	}

	include_once 'view/template.html';





?>