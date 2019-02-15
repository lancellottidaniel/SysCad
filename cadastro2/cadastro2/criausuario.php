<?php

class cadastroinicial
{

    private $id;
    private $login;
    private $senha;
    private $usuario_nome;
    private $usuario_level;
	private $usuario_hierarquia;



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getLogin()
    {
        return $this->login;

    }


    public function setLogin()
    {
        $login= $_POST['form_usuario'];
        $this->login = $login;
        return $this;
    }


    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha()
    {
        $senha = crypt($_POST['form_senha']);
        $this->senha = $senha;
        return $this;
    }

    public function getUsuarioNome()
    {
        return $this->usuario_nome;
    }


    public function setUsuarioNome()
    {
        $usuario_nome= $_POST['form_nome'];
        $this->usuario_nome = $usuario_nome;
        return $this;
    }


    public function getUsuarioLevel()
    {
        return $this->usuario_level;
    }


    public function setUsuarioLevel()
    {
        $usuario_level = $_POST['form_level'];
        $this->usuario_level = $usuario_level;
        return $this;
    }
	
	    public function setUsuarioHierarquia()
    {
        $usuario_hierarquia = $_POST['form_hierarquia'];
        $this->usuario_hierarquia = $usuario_hierarquia;
        return $this;
    }
	
	    public function getUsuarioHierarquia()
    {
        return $this->usuario_hierarquia;
    }

}