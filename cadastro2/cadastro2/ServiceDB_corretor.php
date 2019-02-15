<?php

include('conexao.php');

class ServiceDB_corretor
{
    public $db1;
    public $cadastro_corretor;

    public function __construct(\PDO $db1, cadastro_corretor $cadastro_corretor)
    {
        $this->db1 = $db1;
        $this->cadastro_corretor = $cadastro_corretor;

    }

	//chamar essa função para atualizar o cliente
	
	public function atualizar_cliente()
	{
		
		$query_atualizar = "UPDATE cd_clientes 
		SET emp = :emp, cnpj = :cnpj, end_emp = :end_emp, nr_emp = :nr_emp, compl_emp = :compl_emp, bairro_emp = :bairro_emp, cep_emp = :cep_emp, cid_emp = :cid_emp, ddd1 = :ddd1, ddd2 = :ddd2, ddd3 = :ddd3, fone1 = :fone1, fone2 = :fone2, fone3 = :fone3, ctt1 = :ctt1, ctt2 = :ctt2, email1 = :email1, email2 = :email2, dt_nasc1 = :dt_nasc1, dt_nasc2 = :dt_nasc2
		WHERE cd_emp = :cd_emp
		";
		
		$stmt = $this->db1->prepare($query_atualizar);
        $stmt->bindValue(':emp', $this->cadastro_corretor->getEmp());
        $stmt->bindValue(':cnpj', $this->cadastro_corretor->getCnpj());
        $stmt->bindValue(':end_emp', $this->cadastro_corretor->getEndEmp());
        $stmt->bindValue(':nr_emp', $this->cadastro_corretor->getNrEmp());
        $stmt->bindValue(':compl_emp', $this->cadastro_corretor->getComplEmp());
        $stmt->bindValue(':bairro_emp', $this->cadastro_corretor->getBairroEmp());
        $stmt->bindValue(':cep_emp', $this->cadastro_corretor->getCepEmp());
        $stmt->bindValue(':cid_emp', $this->cadastro_corretor->getCidEmp());
        $stmt->bindValue(':ddd1', $this->cadastro_corretor->getDdd1());
        $stmt->bindValue(':ddd2', $this->cadastro_corretor->getDdd2());
        $stmt->bindValue(':ddd3', $this->cadastro_corretor->getDdd3());
        $stmt->bindValue(':fone1', $this->cadastro_corretor->getFone1());
        $stmt->bindValue(':fone2', $this->cadastro_corretor->getFone2());
        $stmt->bindValue(':fone3', $this->cadastro_corretor->getFone3());
        $stmt->bindValue(':ctt1', $this->cadastro_corretor->getCtt1());
        $stmt->bindValue(':ctt2', $this->cadastro_corretor->getCtt2());
        $stmt->bindValue(':email1', $this->cadastro_corretor->getEmail1());
        $stmt->bindValue(':email2', $this->cadastro_corretor->getEmail2());
        $stmt->bindValue(':dt_nasc1', $this->cadastro_corretor->getDtNasc1());
        $stmt->bindValue(':dt_nasc2', $this->cadastro_corretor->getDtNasc2());
		$stmt->bindValue(':cd_emp', $_GET['nconsulta']);
		
		$stmt->execute();
		#print_r($stmt->errorInfo());
		
	}
	
	//função para inserir novo cliente na agenda do cliente correspondente
	public function inserir_agenda()
	{
		$query_agenda = "insert into ag_clientes(cd_emp, mensagem, visita_data, usr_msg, tipo_ctt, tipo_neg)
		values(:cd_emp, :mensagem, :visita_data, :usr_msg, :tipo_ctt, :tipo_neg)";
		
		$stmt = $this->db1->prepare($query_agenda);
		$stmt->bindValue(':cd_emp', $_GET['nconsulta']);
		$stmt->bindValue(':mensagem', $this->cadastro_corretor->getMensagem());
		$stmt->bindValue(':visita_data', $this->cadastro_corretor->getVisitaData());
		$stmt->bindValue(':usr_msg', $_SESSION['user_id']);
		$stmt->bindValue(':tipo_ctt', $this->cadastro_corretor->getTipoCtt());
		$stmt->bindValue(':tipo_neg', $this->cadastro_corretor->getTipoNeg());
		$stmt->execute();		
		print_r($stmt->errorInfo());
	}
	
	//inserir cnpj
    public function inserir()
		{
        $query = "insert into cd_clientes(emp, cnpj, end_emp, nr_emp, compl_emp, bairro_emp, cep_emp, cid_emp, UF, ddd1, ddd2, ddd3, fone1, fone2, cnae, fone3, vidas, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, status, usr)
        values(:emp, :cnpj, :end_emp, :nr_emp, :compl_emp, :bairro_emp, :cep_emp, :cid_emp, :UF, :ddd1, :ddd2, :ddd3, :fone1, :fone2, :cnae, :fone3, :vidas, :ctt1, :ctt2, :email1, :email2, :dt_nasc1, :dt_nasc2, :status,:usr)";

        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':emp', $this->cadastro_corretor->getEmp());
        $stmt->bindValue(':cnpj', $this->cadastro_corretor->getCnpj());
        $stmt->bindValue(':end_emp', $this->cadastro_corretor->getEndEmp());
        $stmt->bindValue(':nr_emp', $this->cadastro_corretor->getNrEmp());
        $stmt->bindValue(':compl_emp', $this->cadastro_corretor->getComplEmp());
        $stmt->bindValue(':bairro_emp', $this->cadastro_corretor->getBairroEmp());
        $stmt->bindValue(':cep_emp', $this->cadastro_corretor->getCepEmp());
        $stmt->bindValue(':cid_emp', $this->cadastro_corretor->getCidEmp());
        $stmt->bindValue(':UF', $this->cadastro_corretor->getUF());
        $stmt->bindValue(':ddd1', $this->cadastro_corretor->getDdd1());
        $stmt->bindValue(':ddd2', $this->cadastro_corretor->getDdd2());
        $stmt->bindValue(':ddd3', $this->cadastro_corretor->getDdd3());
        $stmt->bindValue(':fone1', $this->cadastro_corretor->getFone1());
        $stmt->bindValue(':fone2', $this->cadastro_corretor->getFone2());
		$stmt->bindValue(':cnae', $this->cadastro_corretor->getCnae());
        $stmt->bindValue(':fone3', $this->cadastro_corretor->getFone3());
		$stmt->bindValue(':vidas', $this->cadastro_corretor->getVidas());
        $stmt->bindValue(':ctt1', $this->cadastro_corretor->getCtt1());
        $stmt->bindValue(':ctt2', $this->cadastro_corretor->getCtt2());
        $stmt->bindValue(':email1', $this->cadastro_corretor->getEmail1());
        $stmt->bindValue(':email2', $this->cadastro_corretor->getEmail2());
        $stmt->bindValue(':dt_nasc1', $this->cadastro_corretor->getDtNasc1());
        $stmt->bindValue(':dt_nasc2', $this->cadastro_corretor->getDtNasc2());
        $stmt->bindValue(':status', $this->cadastro_corretor->getStatus());
        $stmt->bindValue(':usr', $this->cadastro_corretor->getUsr());
		
		$stmt->execute();
		#print_r($stmt->errorInfo());
		}
		
		public function inserir_pf()
		{
        $query = "insert into cd_clientes_pf(nm_pf, cpf, end_pf, nr_pf, compl_pf, bairro_pf, cep_pf, cid_pf, UF_pf, ddd1, ddd2, ddd3, fone1, fone2, fone3, vidas, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, status, usr)
        values(:nm_pf, :cpf, :end_pf, :nr_pf, :compl_pf, :bairro_pf, :cep_pf, :cid_pf, :UF_pf, :ddd1, :ddd2, :ddd3, :fone1, :fone2, :fone3, :vidas, :ctt1, :ctt2, :email1, :email2, :dt_nasc1, :dt_nasc2, :status,:usr)";

        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':nm_pf', $this->cadastro_corretor->getPf());
        $stmt->bindValue(':cpf', $this->cadastro_corretor->getCpf());
        $stmt->bindValue(':end_pf', $this->cadastro_corretor->getEndPf());
        $stmt->bindValue(':nr_pf', $this->cadastro_corretor->getNrPf());
        $stmt->bindValue(':compl_pf', $this->cadastro_corretor->getComplPf());
        $stmt->bindValue(':bairro_pf', $this->cadastro_corretor->getBairroPf());
        $stmt->bindValue(':cep_pf', $this->cadastro_corretor->getCepPf());
        $stmt->bindValue(':cid_pf', $this->cadastro_corretor->getCidPf());
        $stmt->bindValue(':UF_pf', $this->cadastro_corretor->getUFPf());
        $stmt->bindValue(':ddd1', $this->cadastro_corretor->getDdd1());
        $stmt->bindValue(':ddd2', $this->cadastro_corretor->getDdd2());
        $stmt->bindValue(':ddd3', $this->cadastro_corretor->getDdd3());
        $stmt->bindValue(':fone1', $this->cadastro_corretor->getFone1());
        $stmt->bindValue(':fone2', $this->cadastro_corretor->getFone2());
        $stmt->bindValue(':fone3', $this->cadastro_corretor->getFone3());
		$stmt->bindValue(':vidas', $this->cadastro_corretor->getVidas());
        $stmt->bindValue(':ctt1', $this->cadastro_corretor->getCtt1());
        $stmt->bindValue(':ctt2', $this->cadastro_corretor->getCtt2());
        $stmt->bindValue(':email1', $this->cadastro_corretor->getEmail1());
        $stmt->bindValue(':email2', $this->cadastro_corretor->getEmail2());
        $stmt->bindValue(':dt_nasc1', $this->cadastro_corretor->getDtNasc1());
        $stmt->bindValue(':dt_nasc2', $this->cadastro_corretor->getDtNasc2());
        $stmt->bindValue(':status', $this->cadastro_corretor->getStatus());
        $stmt->bindValue(':usr', $this->cadastro_corretor->getUsr());
		
		$stmt->execute();
		#print_r($stmt->errorInfo());
		}

	public function hist_agenda()
		{
		
        $query_hist = "SELECT ag_clientes.cd_emp, mensagem, visita_data, cd_clientes.emp, cd_clientes.cnpj
                FROM ag_clientes
				INNER JOIN cd_clientes
				ON ag_clientes.cd_emp = cd_clientes.cd_emp
				where ag_clientes.cd_emp = :cd_emp";
        $stmt = $this->db1->prepare($query_hist);
        $stmt->bindValue(':cd_emp', $_GET['hist_nconsulta']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
	
    public function tb_clientes()
		{
        $query = "SELECT cd_emp, emp
                FROM cd_clientes
				where usr = :usr and status = 2";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
		
		public function tb_clientes_pf()
		{
        $query = "SELECT cd_pf, nm_pf
                FROM cd_clientes_pf
				where usr = :usr and status = 2";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
		
				
	public function tb_clientes_susepado()
		{
        $query = "SELECT cd_emp, emp
                FROM cd_clientes
				where usr = :usr and status = 3";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;	
		}
		
		public function tb_clientes_susepado_pf()
		{
        $query = "SELECT cd_pf, nm_pf
                FROM cd_clientes_pf
				where usr = :usr and status = 3";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
		
	public function tb_clientes_novo_cliente()
		{
        $query = "SELECT cd_emp, emp
                FROM cd_clientes
				where usr = :usr and status = 1";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	
		}
		
		public function tb_clientes_novo_cliente_pf()
		{
        $query = "SELECT cd_pf, nm_pf
                FROM cd_clientes_pf
				where usr = :usr and status = 1";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $_SESSION['user_id']);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		}
		
		public function carteira()
		{
        $query = "SELECT cd_emp, emp, cnpj, end_emp, nr_emp, compl_emp, bairro_emp, cep_emp, cid_emp, UF, ddd1, ddd2, ddd3, fone1, fone2, fone3, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, ds_status_cliente.status_cliente, usr, usuario_nome
                FROM cd_clientes
				inner join usuarios
                on cd_clientes.usr = usuarios.ID
				inner join ds_status_cliente
				on cd_clientes.status = cd_status_cliente
				where usr = :usr";
        $stmt = $this->db1->prepare($query);
        $stmt->bindValue(':usr', $this->cadastro_corretor->getUsrCarteira());
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	
		}
		
	public function pesquisa_cliente()
		{
        $query = "SELECT *
		FROM usuarios
		where usuario_hierarquia = :usuario";
		$stmt = $this->db1->prepare($query);
		$stmt->bindValue(':usuario', $_SESSION['user_id']);
        $stmt->execute();
		print_r($stmt->errorInfo());
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        #self::arrayToObject($result, $this->cadastro_corretor);	
		return $result;
		
		}		
		
	public function pesquisa_relatorio()
		{
		if($_POST['analistas'] != '00' && $_POST['tipo_ctt'] != '00' && $_POST['tipo_neg'] != '00')
		{
			$query = "SELECT cd_clientes.emp, cd_clientes.cnpj, cd_clientes.status, usuarios.usuario_nome, ag_clientes.mensagem, ag_clientes.visita_data, ds_tipo_ctt.tipo_ctt, ds_tipo_neg.tipo_neg
			FROM cd_clientes
			INNER JOIN ag_clientes
			ON ag_clientes.cd_emp = cd_clientes.cd_emp
			INNER JOIN ds_tipo_ctt 
			ON ds_tipo_ctt.cd_tipo_ctt = ag_clientes.tipo_ctt
			INNER JOIN ds_tipo_neg
			ON ds_tipo_neg.cd_tipo_neg = ag_clientes.tipo_neg
            INNER JOIN usuarios
            on cd_clientes.usr = usuarios.ID
			where cd_clientes.usr = :usuario AND ag_clientes.tipo_ctt = :tipo_ctt AND ag_clientes.tipo_neg = :tipo_neg
			and STR_TO_DATE(visita_data, '%d/%m/%Y') 
			BETWEEN STR_TO_DATE(:data_ini, '%d/%m/%Y') 
			AND STR_TO_DATE(:data_fim, '%d/%m/%Y')
			ORDER BY visita_data ASC";
			$stmt = $this->db1->prepare($query);
			$stmt->bindValue(':usuario', $_POST['analistas']);
			$stmt->bindValue(':tipo_ctt', $_POST['tipo_ctt']);
			$stmt->bindValue(':tipo_neg', $_POST['tipo_neg']);
		}
		if($_POST['analistas'] == '00' && $_POST['tipo_ctt'] != '00' && $_POST['tipo_neg'] != '00')
		{
			$query = "SELECT cd_clientes.emp, cd_clientes.cnpj, ds_status_cliente.status_cliente, usuarios.usuario_nome, ag_clientes.mensagem, ag_clientes.visita_data, ds_tipo_ctt.tipo_ctt, ds_tipo_neg.tipo_neg
			FROM cd_clientes
			INNER JOIN ag_clientes
			ON ag_clientes.cd_emp = cd_clientes.cd_emp
			INNER JOIN ds_tipo_ctt 
			ON ds_tipo_ctt.cd_tipo_ctt = ag_clientes.tipo_ctt
			INNER JOIN ds_tipo_neg
			ON ds_tipo_neg.cd_tipo_neg = ag_clientes.tipo_neg
            INNER JOIN usuarios
            on cd_clientes.usr = usuarios.ID
			INNER JOIN ds_status_cliente
			on cd_clientes.status = ds_status_cliente.cd_status_cliente
			where ag_clientes.tipo_ctt = :tipo_ctt AND ag_clientes.tipo_neg = :tipo_neg
			and STR_TO_DATE(visita_data, '%d/%m/%Y') 
			BETWEEN STR_TO_DATE(:data_ini, '%d/%m/%Y') 
			AND STR_TO_DATE(:data_fim, '%d/%m/%Y')
			ORDER BY visita_data ASC";
			$stmt = $this->db1->prepare($query);
			$stmt->bindValue(':tipo_ctt', $_POST['tipo_ctt']);
			$stmt->bindValue(':tipo_neg', $_POST['tipo_neg']);
		}
		if($_POST['analistas'] != '00' && $_POST['tipo_ctt'] == '00' && $_POST['tipo_neg'] == '00')
		{
			$query = "SELECT cd_clientes.emp, cd_clientes.cnpj, ds_status_cliente.status_cliente, usuarios.usuario_nome, ag_clientes.mensagem, ag_clientes.visita_data, ds_tipo_ctt.tipo_ctt, ds_tipo_neg.tipo_neg
			FROM cd_clientes
			INNER JOIN ag_clientes
			ON ag_clientes.cd_emp = cd_clientes.cd_emp
			INNER JOIN ds_tipo_ctt 
			ON ds_tipo_ctt.cd_tipo_ctt = ag_clientes.tipo_ctt
			INNER JOIN ds_tipo_neg
			ON ds_tipo_neg.cd_tipo_neg = ag_clientes.tipo_neg
            INNER JOIN usuarios
            on cd_clientes.usr = usuarios.ID
			INNER JOIN ds_status_cliente
			on cd_clientes.status = ds_status_cliente.cd_status_cliente
			where usr = :usuario 
			and STR_TO_DATE(visita_data, '%d/%m/%Y') 
			BETWEEN STR_TO_DATE(:data_ini, '%d/%m/%Y') 
			AND STR_TO_DATE(:data_fim, '%d/%m/%Y')
			ORDER BY visita_data ASC";
			$stmt = $this->db1->prepare($query);
			$stmt->bindValue(':usuario', $_POST['analistas']);
		}
		if($_POST['analistas'] == '00' && $_POST['tipo_ctt'] == '00' && $_POST['tipo_neg'] == '00')
		{
			$query = "SELECT cd_clientes.emp, cd_clientes.cnpj, ds_status_cliente.status_cliente, usuarios.usuario_nome, ag_clientes.mensagem, ag_clientes.visita_data, ds_tipo_ctt.tipo_ctt, ds_tipo_neg.tipo_neg
			FROM cd_clientes
			INNER JOIN ag_clientes
			ON ag_clientes.cd_emp = cd_clientes.cd_emp
			INNER JOIN ds_tipo_ctt 
			ON ds_tipo_ctt.cd_tipo_ctt = ag_clientes.tipo_ctt
			INNER JOIN ds_tipo_neg
			ON ds_tipo_neg.cd_tipo_neg = ag_clientes.tipo_neg
            INNER JOIN usuarios
            on cd_clientes.usr = usuarios.ID
			INNER JOIN ds_status_cliente
			on cd_clientes.status = ds_status_cliente.cd_status_cliente
			where STR_TO_DATE(visita_data, '%d/%m/%Y') 
			BETWEEN STR_TO_DATE(:data_ini, '%d/%m/%Y') 
			AND STR_TO_DATE(:data_fim, '%d/%m/%Y')
			ORDER BY visita_data ASC";
			$stmt = $this->db1->prepare($query);
		}
			$stmt->bindValue(':data_ini', strftime('%d/%m/%Y',strtotime($_POST['data_ini'])));
			$stmt->bindValue(':data_fim', strftime('%d/%m/%Y',strtotime($_POST['data_fim'])));
			$stmt->execute();
			#print_r($stmt->errorInfo());
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			#self::arrayToObject($result, $this->cadastro_corretor);	
			return $result;
		
		}
		
	public function consulta_tipo_ctt()
	{
		$query = "SELECT * FROM ds_tipo_ctt";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function consulta_uf()
	{
		$query = "SELECT * FROM cd_uf";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function consulta_tipo_neg()
	{
		$query = "SELECT * FROM ds_tipo_neg";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function consulta_status_cliente()
	{
		$query = "SELECT * FROM ds_status_cliente";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function consulta_qt_vidas()
	{
		$query = "SELECT * FROM ds_qt_vidas";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function consulta_cnae()
	{
		$query = "SELECT * FROM cd_cnae";
		$stmt = $this->db1->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
		
	public function consulta_level()
	{
		$query = "SELECT usuario_level FROM usuarios WHERE ID = :ID";
		$stmt = $this->db1->prepare($query);
		$stmt->bindValue(':ID', $_SESSION['user_id']);
		$stmt->execute();
		$result = $stmt->fetch();
		
	}

	public function nconsulta()
    {
        $query_consulta = "SELECT cd_emp, emp, cnpj, end_emp, nr_emp, compl_emp, bairro_emp, cep_emp, cid_emp, UF, ddd1, ddd2, ddd3, fone1, fone2, cnae, fone3, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, ds_status_cliente.status_cliente, usuario_nome
                          FROM cd_clientes
                          inner join usuarios
                          on cd_clientes.usr = usuarios.ID
						  inner join ds_status_cliente
						  on ds_status_cliente.cd_status_cliente = cd_clientes.status
                          where cd_emp = :cd_emp";
        $stmt = $this->db1->prepare($query_consulta);
        $stmt->bindValue(':cd_emp', $_GET['nconsulta']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
    }
	
    public function consultar()
    {
        $query_consulta = "SELECT cd_emp, emp, cnpj, end_emp, nr_emp, compl_emp, bairro_emp, cep_emp, cid_emp, UF, ddd1, ddd2, ddd3, fone1, fone2, cnae, fone3, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, ds_status_cliente.status_cliente, usuario_nome
                          FROM cd_clientes
                          inner join usuarios
                          on cd_clientes.usr = usuarios.ID
						  inner join ds_status_cliente
						  on ds_status_cliente.cd_status_cliente = cd_clientes.status
                          where emp = :emp or cnpj = :cnpj";
        $stmt = $this->db1->prepare($query_consulta);
        $stmt->bindValue(':emp', $this->cadastro_corretor->getEmp());
        $stmt->bindValue(':cnpj', $this->cadastro_corretor->getCnpj());
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
    }


    public static function arrayToObject($source = [], &$destination) {
        foreach ($source as $key => $sourceProperty) {
            $name = $key;

            if (property_exists($destination, $name)) {
                if (is_array($source[$name]) && !empty($source[$name])) {
                    self::arrayToObject($source[$name], $destination->{$name});
                }
                else {
                    if (gettype($source[$name]) === "object") {
                        $value = (string) $source[$name];
                    }
                    else {
                        $value = $source[$name];
                    }

                    $destination->{$name} = $value;
                }
            }
        }
    }

    public function get_cadastro_corretor()
    {
        return $this->cadastro_corretor;
    }

}