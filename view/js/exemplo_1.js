// Testando a validação usando jQuery
$(function(){

    // ## EXEMPLO 1
    // Aciona a validação a cada tecla pressionada
    var temporizador = false;
    $('.cpf_cnpj').keypress(function(){
    
        // O input que estamos utilizando
        var input = $(this);
        
        // Limpa o timeout antigo
        if ( temporizador ) {
            clearTimeout( temporizador );
        }
        
        // Cria um timeout novo de 500ms
        temporizador = setTimeout(function(){
            // Remove as classes de válido e inválido
            input.removeClass('');
            input.removeClass('');
        
            // O CPF ou CNPJ
            var cpf_cnpj = input.val();
            
            // Valida
            //var valida = valida_cpf_cnpj( cpf_cnpj );
            
            // Testa a validaçãofff
//            if ( valida ) {
//                input.addClass('valido');
//            } else {
//                input.addClass('invalido');
//            }
        }, 500);
    
    });
});
$.validator.addMethod(
        "ValidarCPF", 
        function(cpf, element) {
            cpf = cpf.replace(/[^\d]+/g,'');	
							if(cpf == '') return false;	
							// Elimina CPFs invalidos conhecidos	
							if (cpf.length != 11 || 
								cpf == "00000000000" || 
								cpf == "11111111111" || 
								cpf == "22222222222" || 
								cpf == "33333333333" || 
								cpf == "44444444444" || 
								cpf == "55555555555" || 
								cpf == "66666666666" || 
								cpf == "77777777777" || 
								cpf == "88888888888" || 
								cpf == "99999999999")
									return false;		
							// Valida 1o digito	
							add = 0;	
							for (i=0; i < 9; i ++)		
								add += parseInt(cpf.charAt(i)) * (10 - i);	
								rev = 11 - (add % 11);	
								if (rev == 10 || rev == 11)		
									rev = 0;	
								if (rev != parseInt(cpf.charAt(9)))		
									return false;		
							// Valida 2o digito	
							add = 0;	
							for (i = 0; i < 10; i ++)		
								add += parseInt(cpf.charAt(i)) * (11 - i);	
							rev = 11 - (add % 11);	
							if (rev == 10 || rev == 11)	
								rev = 0;	
							if (rev != parseInt(cpf.charAt(10)))
								return false;		
							return true;   
        },
        ""
    );

$.validator.addMethod(
        "ValidarData", 
        function(data, element) {
            var pattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
var arrayDate = data.match(pattern);
var dt = new Date(arrayDate[3], arrayDate[2] - 1, arrayDate[1]);
    return dt >= new Date().setHours(0,0,0,0);
        },
        ""
    );