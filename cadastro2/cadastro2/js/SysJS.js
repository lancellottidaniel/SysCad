
//busca dinamica
function buscaDinamica() 
	{
			var filtro = document.getElementById('txtBusca');		
			var tabela = document.getElementById('tabela_hist');
			var paramFiltro = filtro.value;
			var x, flag = true;
			var radFiltro = document.getElementsByName("radBusca");
			for (var i = 0; i < radFiltro.length; i++) 
			{
				if (radFiltro[i].checked) 
				{
					x = radFiltro[i];
					flag = false;
				}
			}
			if(flag)
			{
				document.getElementById('erroForm').innerHTML = 'Selecione um parâmetro de busca';
			}
			else
			{
				document.getElementById('erroForm').innerHTML = '';
				for (var i = 1; i < tabela.rows.length; i++) 
				{
					var conteudoCelula = tabela.rows[i].cells[x.value].innerText;
					var corresponde = conteudoCelula.toLowerCase().indexOf(paramFiltro) >= 0;
					tabela.rows[i].style.display = corresponde ? '' : 'none';
				}
			}
	};

	//mascara cnpj / telefone / qualquer coisa (onkeyup ##/##/#### ex)
function formatar(mascara, documento)
	{
		var i = documento.value.length;
		var saida = mascara.substring(0,1);
		var texto = mascara.substring(i)
		 
		if (texto.substring(0,1) != saida)
		{
			documento.value += texto.substring(0,1);
		}
		  
	}
	
	