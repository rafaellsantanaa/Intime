/*
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

		//formata de forma generica os campos
		function formataCampo(campo, Mascara, evento) { 
				var boleanoMascara; 

				var Digitato = evento.keyCode;
				exp = /\-|\.|\/|\(|\)| /g
				campoSoNumeros = campo.value.toString().replace( exp, "" ); 

				var posicaoCampo = 0;    
				var NovoValorCampo="";
				var TamanhoMascara = campoSoNumeros.length;; 

				if (Digitato != 8) { // backspace 
						for(i=0; i<= TamanhoMascara; i++) { 
								boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
																		|| (Mascara.charAt(i) == "/")) 
								boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
																		|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
								if (boleanoMascara) { 
										NovoValorCampo += Mascara.charAt(i); 
										TamanhoMascara++;
								}else { 
										NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
										posicaoCampo++; 
								}              
						}      
						campo.value = NovoValorCampo;
						return true; 
				}else { 
						return true; 
				}
		}

		//valida numero inteiro com mascara
		function mascaraInteiro(){
				if (event.keyCode < 48 || event.keyCode > 57){
						event.returnValue = false;
						return false;
				}
				return true;
		}
		//adiciona mascara ao CPF
		function MascaraCPF(cpf){
			if(mascaraInteiro(cpf)==false){
					event.returnValue = false;
			}       
			return formataCampo(cpf, '000.000.000-00', event);
		}

		//valida o CPF digitado
		function ValidarCPF(Objcpf){
			var cpf = Objcpf.value;
			exp = /\.|\-/g
			cpf = cpf.toString().replace( exp, "" ); 
			var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
			var soma1=0, soma2=0;
			var vlr =11;

			for(i=0;i<9;i++){
					soma1+=eval(cpf.charAt(i)*(vlr-1));
					soma2+=eval(cpf.charAt(i)*vlr);
					vlr--;
			}       
			soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
			soma2=(((soma2+(2*soma1))*10)%11);

			var digitoGerado=(soma1*10)+soma2;
			if(digitoGerado!=digitoDigitado)        
					alert('CPF Invalido!');         
		}
	
		

(function($) {
	


	// Breakpoints.
		skel.breakpoints({
			xlarge:	'(max-width: 1680px)',
			large:	'(max-width: 1280px)',
			medium:	'(max-width: 980px)',
			small:	'(max-width: 736px)',
			xsmall:	'(max-width: 480px)'
		});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

	// Off-Canvas Navigation.

		// Navigation Panel.
			$(
				'<div id="navPanel">' +
					$('#nav').html() +
					'<a href="#navPanel" class="close"></a>' +
				'</div>'
			)
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'left'
				});

		// Fix: Remove transitions on WP<10 (poor/buggy performance).
			if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
				$('#navPanel')
					.css('transition', 'none');

	});

})(jQuery);
