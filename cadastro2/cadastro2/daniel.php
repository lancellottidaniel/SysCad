<html>
<head>
<title>CNPJ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Adicionando JQuery -->
<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>

<!-- Adicionando Javascript -->
<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cnpj() {
            // Limpa valores do formulário de cnpj.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#nome").val("");
        }

        //Quando o campo cnpj perde o foco.
        $("#cnpj").blur(function() {

            //Nova variável "cnpj" somente com dígitos.
            var cnpj = $(this).val().replace(/\D/g, '');

            //Verifica se campo cnpj possui valor informado.
            if (cnpj != "") {

                //Expressão regular para validar o CNPJ.
                var validacnpj = /^[0-9]/;

                //Valida o formato do CNPJ.
                if(validacnpj.test(cnpj)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#logradouro").val("...")
                    $("#bairro").val("...")
                    $("#municipio").val("...")
                    $("#uf").val("...")
                    $("#nome").val("...")

                    $.getJSON("https://crossorigin.me/http://receitaws.com.br/v1/cnpj/"+ cnpj, function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#municipio").val(dados.municipio);
                            $("#uf").val(dados.uf);
                            $("#nome").val(dados.abertura);
                        } //end if.
                        else {
                            //Cnpj pesquisado não foi encontrado.
                            limpa_formulário_cnpj();
                            alert("CNPJ não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cnpj é inválido.
                    limpa_formulário_cnpj();
                    alert("Formato de CNPJ inválido.");
                }
            } //end if.
            else {
                //cnpj sem valor, limpa formulário.
                limpa_formulário_cnpj();
            }
        });
    });

</script>
</head>

<body>
<!-- Inicio do formulario -->
  <form method="get" action=".">
    <label>Cnpj:
    <input name="cnpj" type="text" id="cnpj" value="" size="10" maxlength="19" /></label><br />
    <label>Rua:
    <input name="logradouro" type="text" id="logradouro" size="60" /></label><br />
    <label>Bairro:
    <input name="bairro" type="text" id="bairro" size="40" /></label><br />
    <label>Cidade:
    <input name="municipio" type="text" id="municipio" size="40" /></label><br />
    <label>Estado:
    <input name="uf" type="text" id="uf" size="2" /></label><br />
    <label>Nome:
    <input name="nome" type="text" id="nome" size="8" /></label><br />
  </form>
</body>

</html>