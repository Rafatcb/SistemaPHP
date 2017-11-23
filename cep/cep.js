$(document).ready( function() {
    $('#cep').blur(function(){ /* Executa a requisição quando o campo CEP perder o foco */
            $.ajax({ /* Configura a requisição AJAX */
                    url : 'cep/consultar-cep.php', /* URL que será chamada */ 
                    type : 'POST', /* Tipo da requisição */ 
                    data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                    dataType: 'json', /* Tipo de transmissão */
                    success: function(data){
                        if(data.sucesso == 1){
                            $('#rua').val(data.rua);
                            $('#bairro').val(data.bairro);
                            $('#cidade').val(data.cidade);
                            $('#pais').val("Brasil");
    
                            $('#numero').focus();
                        }
                    }
            });   
    return false;    
    })
});