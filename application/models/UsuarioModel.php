<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

	private $dados_user;


//carregar usuarios do banco
	public function index()
	{

		
	}

//gravar no banco de dados o usuario

	public function gravar_dados($email , $telefone, $senha)
	{

		$dados = [$email, $telefone,"usuario_ativo", $senha];

		$this->db->query('INSERT INTO usuarios(email,telefone,situacao,senha) VALUES (?,?,?,?)',$dados);

//chamar o controler inicio
// redirect('inicio');
		
	}


	public function carregar_dados()
	{

		return $query = $this->db->query('SELECT * FROM usuarios');

//$temp ['dados'] = $query -> result_array();

//return $temp;

	}


	public function alterar_senha($senha, $id)
	{
		


		$this->db->query("UPDATE usuarios
			SET senha = '$senha'
			WHERE id = '$id'");

		


	}



	public function desativar_usuario($id)
	{

            $this->db->query("UPDATE usuarios
			SET situacao = 'usuario_desativado'
			WHERE id = '$id'");


	//	$this->db->query(" INSERT INTO usuarios_desativados
	//		SELECT * FROM usuarios WHERE id='$id' ");

	//	$this->db->query("DELETE FROM usuarios WHERE id ='$id' ");
	}   


}