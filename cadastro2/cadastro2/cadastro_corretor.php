<?php

class cadastro_corretor
{
    public $cd_pf;
    public $nm_pf;
    public $cpf;
    public $end_pf;
    public $nr_pf;
    public $compl_pf;
    public $bairro_pf;
    public $cep_pf;
    public $cid_pf;
    public $UF_pf;
    public $ddd1;
    public $ddd2;
    public $ddd3;
    public $fone1;
    public $fone2;
	public $cnae;
    public $fone3;
    public $ctt1;
    public $ctt2;
    public $email1;
    public $email2;
    public $dt_nasc1;
    public $dt_nasc2;
    public $status;
    public $usr;
	public $visita_data;
    public $mensagem;
	public $tipo_ctt;
    public $tipo_neg;
	public $vidas;
	public $usr_carteira;

	    /**
     * @return mixed
     */

	 
	public function getVidas()
    {
        return $this->vidas;
    }

    /**
     * @param mixed $emp
     */
    public function setVidas()
    {
        $this->vidas =$_POST['vidas'];
        return $this;
    } 
	 
	public function getTipoCtt()
    {
        return $this->tipo_ctt;
    }

    /**
     * @param mixed $emp
     */
    public function setTipoCtt()
    {
        $this->tipo_ctt =$_POST['tipo_ctt'];
        return $this;
    }
	 
	public function getTipoNeg()
    {
        return $this->tipo_neg;
    }

    /**
     * @param mixed $emp
     */
    public function setTipoNeg()
    {
        $this->tipo_neg =$_POST['tipo_neg'];
        return $this;
    }
	 	 
    public function getVisitaData()
    {
        return $this->visita_data;
    }

    /**
     * @param mixed $emp
     */
    public function setVisitaData()
    {
        $this->visita_data =strftime("%d/%m/%Y",strtotime($_POST['visita_data']));
        return $this;
    }
	
    /**
     * @return mixed
     */

    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $emp
     */
    public function setMensagem()
    {
        $this->mensagem =$_POST['mensagem'];
        return $this;
    }    

    /**
     * @return mixed
     */

    public function getPf()
    {
        return $this->nm_pf;
    }

    /**
     * @param mixed $emp
     */
    public function setPf()
    {
        $this->nm_pf=$_POST['nm_pf'];
		return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf()
    {
        $this->cpf=$_POST['cpf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndPf()
    {
        return $this->end_pf;
    }

    /**
     * @param mixed $end_pf
     */
    public function setEndPf()
    {
        $this->end_pf = $_POST['end_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrPf()
    {
        return $this->nr_pf;
    }

    /**
     * @param mixed $nr_pf
     */
    public function setNrPf()
    {
        $this->nr_pf = $_POST['nr_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplPf()
    {
        return $this->compl_pf;
    }

    /**
     * @param mixed $compl_pf
     */
    public function setComplPf()
    {
        $this->compl_pf = $_POST['compl_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairroPf()
    {
        return $this->bairro_pf;
    }

    /**
     * @param mixed $bairro_pf
     */
    public function setBairroPf()
    {
        $this->bairro_pf = $_POST['bairro_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCepPf()
    {
        return $this->cep_pf;
    }

    /**
     * @param mixed $cep_pf
     */
    public function setCepPf()
    {
        $this->cep_pf = $_POST['cep_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidPf()
    {
        return $this->cid_pf;
    }

    /**
     * @param mixed $cid_emp
     */
    public function setCidPf()
    {
        $this->cid_pf = $_POST['cid_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUFPf()
    {
        return $this->UFPf;
    }

    /**
     * @param mixed $UF
     */
    public function setUFPf()
    {
        $this->UFPf = $_POST['UF_pf'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDdd1()
    {
        return $this->ddd1;
    }

    /**
     * @param mixed $ddd1
     */
    public function setDdd1()
    {
        $this->ddd1 = $_POST['ddd1'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDdd2()
    {
        return $this->ddd2;
    }

    /**
     * @param mixed $ddd2
     */
    public function setDdd2()
    {
        $this->ddd2 = $_POST['ddd2'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDdd3()
    {
        return $this->ddd3;
    }

    /**
     * @param mixed $ddd3
     */
    public function setDdd3()
    {
        $this->ddd3 = $_POST['ddd3'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone1()
    {
        return $this->fone1;
    }

    /**
     * @param mixed $fone1
     */
    public function setFone1()
    {
        $this->fone1 = $_POST['fone1'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone2()
    {
        return $this->fone2;
    }

    /**
     * @param mixed $fone2
     */
    public function setFone2()
    {
        $this->fone2 = $_POST['fone2'];
        return $this;
    }
	
	public function getCnae()
    {
        return $this->cnae;
    }

    /**
     * @param mixed $fone2
     */
    public function setCnae()
    {
        $this->cnae = $_POST['cnae'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone3()
    {
        return $this->fone3;
    }

    /**
     * @param mixed $fone3
     */
    public function setFone3()
    {
        $this->fone3 = $_POST['fone3'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCtt1()
    {
        return $this->ctt1;
    }

    /**
     * @param mixed $ctt1
     */
    public function setCtt1()
    {
        $this->ctt1 = $_POST['ctt1'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCtt2()
    {
        return $this->ctt2;
    }

    /**
     * @param mixed $ctt2
     */
    public function setCtt2()
    {
        $this->ctt2 = $_POST['ctt2'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * @param mixed $email1
     */
    public function setEmail1()
    {
        $this->email1 = $_POST['email1'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param mixed $email2
     */
    public function setEmail2()
    {
        $this->email2 = $_POST['email2'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtNasc1()
    {
        return $this->dt_nasc1;
    }

    /**
     * @param mixed $dt_nasc1
     */
    public function setDtNasc1()
    {
        $this->dt_nasc1 = $_POST['dt_nasc1'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtNasc2()
    {
        return $this->dt_nasc2;
    }

    /**
     * @param mixed $dt_nasc2
     */
    public function setDtNasc2()
    {
        $this->dt_nasc2 = $_POST['dt_nasc2'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus()
    {
        $this->status = $_POST['status'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsr()
    {
        return $this->usr;
    }

    /**
     * @param mixed $usr
     */
    public function setUsr()
    {
        $this->usr = $_SESSION['user_id'];
        return $this;
    }
	
	    public function getUsrCarteira()
    {
        return $this->usr_carteira;
    }

    public function setUsrCarteira()
    {
        $this->usr_carteira = $_POST['usr_carteira'];
        return $this;
    }
}