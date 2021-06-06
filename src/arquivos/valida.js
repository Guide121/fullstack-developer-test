$(document).on('click', '#valida_string', function(){
    var texto = $('#texto').val();
    var mensagem = '';
    try{
        if(texto.length > 0){
            if (/[*\[\{\(\)\}\]*]/.test(texto)) {
                texto = texto.split('');
                var pilha = [];
                $.each(texto, function (index, value) { 
                    switch (value) { 
                        case '[':  
                            pilha.push('c');
                            break;
                        case '{': 
                            pilha.push('a');
                            break;
                        case '(': 
                            pilha.push('p');
                            break;	
                        case ']':  
                            if(pilha[pilha.length-1] != 'c'){
                                throw "Erro em ']'";                            
                            }else{
                                pilha.pop();
                            }
                            break;
                        case '}': 
                            if(pilha[pilha.length-1] != 'a'){
                                throw "Erro em '}'";                            
                            }else{
                                pilha.pop();
                            }
                            break;
                        case ')': 
                            if(pilha[pilha.length-1] != 'p'){
                                throw "Erro em ')'";                            
                            }else{
                                pilha.pop();
                            }
                            break;	
                    }
                });
                if(pilha.length != 0){            
                    throw "Erro item em aberto";
                }
                mensagem = 'Validado com sucesso';
            }else{            
                throw "Não contém [,{,(,),} ou ]";
            }
        }else{            
            $('#texto').focus();
            throw "Compo não foi preenchido";
        }
    }catch(err) {
        mensagem = err;
    }finally{        
        $.alert(mensagem);
    }
})