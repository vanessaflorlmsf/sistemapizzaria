CREATE DATABASE db_burgarias;

-- CRIANDO A TABELA DE USUÁRIOS DO SISTEMA--


CREATE TABLE tb_user(
	id_user INT(11) PRIMARY KEY AUTO_INCREMENT,
	user_name VARCHAR(255),
	user_email VARCHAR(255),
	user_password VARCHAR(255),
	user_cpf VARCHAR(20),
	user_birth DATE,
	user_phone VARCHAR(20),
	user_cellphone VARCHAR(20),
	user_address VARCHAR(255),
	user_type VARCHAR(25),
	user_status BOOLEAN
);


CREATE TABLE tb_client(
	id_client INT(11) PRIMARY KEY AUTO_INCREMENT,
	client_name VARCHAR(255),
	client_cpf VARCHAR(20),
	client_phone VARCHAR(20),
	client_cellphone VARCHAR(20),
	client_address VARCHAR(255)
);


CREATE TABLE tb_product(
	id_product INT(11) PRIMARY KEY AUTO_INCREMENT,
	product_name VARCHAR(255),
	product_desc VARCHAR(255),
	product_price FLOAT,
	product_provider VARCHAR(255)
);


CREATE TABLE tb_sale(
	id_sale INT(11) PRIMARY KEY AUTO_INCREMENT,
	user_id INT(11),
	product_id INT(11),
	client_id INT(11),
	sale_date TIMESTAMP
);
