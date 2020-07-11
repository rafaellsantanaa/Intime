
//adiciona mascara ao CPF
function mascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
            event.returnValue = false;
    }       
    return formataCampo(cpf, '000.000.000-00', event);
}

//valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
}

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


function validarCPF(cpf) {
    var Soma;
    var Resto;
    var cpf;
    var res;
    res=true;
    cpf=cpf.value;
    Soma = 0;
    cpf= (cpf.replace('.',''));
    cpf= (cpf.replace('.',''));
    cpf= (cpf.replace('-',''));
 
  if (cpf == "00000000000") res=false; 
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) ){ res=false; }
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) ){res=false;} 

    if (res==false){
        alert ('CPF inválido!'); 
        document.getElementById('cpf').value=null;
        document.getElementById('email').focus();
    }
}


function mascaraData(data){
    var v = data.value;
        if (v.match(/^\d{2}$/) !== null) {
            document.getElementById('dt_nascimento').value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            document.getElementById('dt_nascimento').value = v + '/';
        }
}

function validaData(data){
    var RegExPattern = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

    if (!((data.value.match(RegExPattern)) && (data.value!=''))) {
        alert('Data inválida');
        document.getElementById('email').focus();
        data.value=null;
       }
   }

function validaSenha(){
    NovaSenha = document.getElementById('senha').value;
    CNovaSenha = document.getElementById('Csenha').value;
    if (NovaSenha != CNovaSenha) {
       alert("Senhas divergentes!"); 
       document.getElementById('senha').value=null;
       document.getElementById('Csenha').value=null;
    }
    
 }

 function liberaCadastro(){
    NovaSenha = document.getElementById('senha').value;
    CNovaSenha = document.getElementById('Csenha').value;

    if (NovaSenha == CNovaSenha && NovaSenha!='' && CNovaSenha!='') {
        document.getElementById('cadastrar').style.display = 'inline';
    }else{
        document.getElementById('cadastrar').style.display = 'none';
    }
 }
