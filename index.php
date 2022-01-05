<style>
    .container{
        border:solid 1px #ccc;
        border-radius:5px;
        margin:1% auto;
        width:500px;
        padding:0 30px 30px 30px;
        font-family: arial;
        background:#f3f781;
    }
    .input{
        width:320px;
    }
    .enviar{
        width:155px;
        cursor:pointer;
    }
    #messages{
        background:#fff;
        margin-top:10px;
        padding:10px;
    }
    .form{
        background:#ffa;
        padding:10px;
    }
</style>
<div class="container">
    <h4><center> Acessando o mysql com fetch API javasacript e php </center></h4>
    <div class="form">
        <div>Digite para realizar a pesquisa</div>
        <input class="input" id="pesquisa" type="text" name="busca" >
        <input class="enviar" type="submit" onclick="return verifica()" value="P E S Q U I S A R" >
        <div id="messages"></div>
    </div>
</div>

<script>
    function verifica(){
        if(pesquisa.value.length >0){

            fetch('http://localhost:80/passando-o-codigo/fetch-php/verifica.php?busca=' + pesquisa.value)
            
            .then(response => {// retorna a requisição fetch
            
                if (response.ok) {// se reornar ok

                    // console.log(response);
            
                    return response.json();// converte num objeto json
                
                }
            })

            .then(json => {
                
                messages.innerHTML = "Nome :" + json.nome + '<br>' + 
                                    "Endereço :" + json.endereco  + '<br>' + 
                                    "Telefone :" + json.telefone  + '<br>' + 
                                    "DT. Cadastro :" + json.dataCadastro  + '<br>' + 
                                    "DT. Nascimento :" + json.dataNascimento  + '<br>' + 
                                    "CPF :" + json.cpf  + '<br>' + 
                                    "Barra :" + json.barra  + '<br>' + 
                                    "Email :" + json.email;
            
            // console.log(json);

            })

            .catch(error => {
            
                messages.innerHTML = 'Nada foi encontrado';
            
            });

        }else{

            messages.innerHTML = "Nada foi digitado";

        }

       return false;

    };

</script>