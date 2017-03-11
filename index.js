$(function(){
	$("#btn_entrar").click(function(){
		if(verificarRadio("input[name='baladaFuncionando']") && verificarRadio("input[name='amizadeComDono']") && verificarRadio("input[name='sexoAmizadeNaBalada']") && verificarInput("#idade")) {
			window.frm_entrar.submit();
		} else {
			alert("Você não preencheu todos os campos, por favor verifique a inserção");
		}
	});

	function verificarRadio(element) {
		var status = false;
		$(element).each(function(){
			if(this.checked) {
				status =  true;
			}
		});
		return status;
	}

	function verificarInput(element) {
		var value = $(element).val();
		if(value.length > 0) {
			return true;
		} else {
			return false;
		}
	}
});