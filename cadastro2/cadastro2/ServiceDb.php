<?php

class ServiceDb
{

    private $db;
    private $cadastroinicial;

    public function __construct(\PDO $db, cadastroinicial $cadastroinicial)
    {
        $this->db = $db;
        $this->cadastroinicial = $cadastroinicial;
    }

    public function find($id)
    {
        $query = "SELECT * from usuarios where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);


    }

    public function listar()
    {
        $query = "select * from usuarios";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function inserir()
    {
        $query = "insert into usuarios(login, senha, usuario_nome, usuario_level, usuario_hierarquia) values(:login, :senha, :usuario_nome, :usuario_level, :usuario_hierarquia)";
		
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':login', $this->cadastroinicial->getLogin());
        $stmt->bindValue(':senha', $this->cadastroinicial->getSenha());
        $stmt->bindValue(':usuario_nome', $this->cadastroinicial->getUsuarioNome());
        $stmt->bindValue(':usuario_level', $this->cadastroinicial->getUsuarioLevel());
		$stmt->bindValue(':usuario_hierarquia', $this->cadastroinicial->getUsuarioHierarquia());
        
		$stmt->execute();
		print_r($stmt->errorInfo());

        if($stmt->execute()) {
            return true;
        }
    }

    public function alterar()
    {
        $query = "UPDATE usuarios set login=:login, senha=:senha, usuario_nome=:usuario_nome where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->cadastroinicial->getId());
        $stmt->bindValue(':login', $this->cadastroinicial->getLogin());
        $stmt->bindValue(':senha', $this->cadastroinicial->getSenha());
        $stmt->bindValue(':usuario_nome', $this->cadastroinicial->getUsuarioNome());
        $stmt->execute();

        if($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "DELETE from usuarios where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id());

        if($stmt->execute()) {
            return true;
        }

    }





}