<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



        <link id="css" rel="stylesheet" type="text/css" href="style1/style.css">
        <title>Cadastro</title>
    </head>
    <body>
        <ul class="menu">
            <li class="menuItem"><a href="cadastro.php" class="ativo">Cadastro</a></li>
            <li class="menuItem"><a href="consulta.php">Consulta</a></li>
            <li class="dropdown">
                <a href="" class="dropbtn">Estilos</a>
                <div class="dropdown-conteudo">
                    <a href="#" class="dropdown-conteudo-a ">Principal</a>
                </div>
                <li style="float:right" class="menuItem"><a href="#about"><span class="glyphicon glyphicon-log-out"></span>&nbsp&nbsp Sair</a></li>
            </li>
        </ul>
        <div id="cadastro"> 
                <table id="tabela-cadastro">
                    <tr>
                        <th colspan="2">
                            Informações básicas
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="status" value="cliente" checked="checked" id="radioCliente"/> <label for="radioCliente" class="pointer">Cliente</label>
                        </td>
                        <td>
                            <input type="radio" name="status" value="gerente" id="radioGerente"/> <label for="radioGerente" class="pointer">Gerente</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label >Nome <span class="obrigatorio">*</span></label> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group input-group-lg linha-completa">
                                <input type="text" name="nome" placeholder="Digite seu nome" class="form-control linha-completa"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>CPF <span class="obrigatorio">*</span></label> 
                        </td>
                        <td>
                            <label>Data de Aniversário</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="cpf" placeholder="Digite seu CPF" class="form-control linha-dividida"/>
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="date" name="data" placeholder="Digite sua data de aniversário" class="form-control linha-dividida"/>
                            </div>
                        </td>
                    <tr>
                        <td>
                            <label>Telefone</label>
                        </td>
                        <td>
                            <label>E-mail</label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="telefone" placeholder="Digite seu número de telefone" class="form-control linha-dividida"/>
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="email" name="email" placeholder="Digite seu e-mail" class="form-control linha-dividida"/>
                            </div>
                        </td>
                    </tr>

                    
                    <tr>
                        <th colspan="2">
                            Endereço
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <label>CEP</label> 
                        </td>
                        <td>
                            <label>Rua</label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="cep" placeholder="Digite seu CEP" class="form-control linha-dividida"/>
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="rua" placeholder="Digite sua rua" class="form-control linha-dividida"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label>Número</label> 
                        </td>
                        <td>
                        <label>Complemento</label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="numero" placeholder="Digite o numero da residência" class="form-control linha-dividida"/>
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="complemento" placeholder="Digite o complemento" class="form-control linha-dividida"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Cidade</label> 
                        </td>
                        <td>
                            <label>Estado</label> 
                        </td>                    
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <input type="text" name="cidade" placeholder="Digite a cidade" class="form-control linha-dividida"/>
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-lg linha-dividida">
                                <select name="estado" class="form-control linha-dividida">
                                        <option>Acre</option>
                                        <option>Alagoas</option>
                                        <option>Amapá</option>
                                        <option>Amazonas</option>
                                        <option>Bahia</option>
                                        <option>Ceará</option>
                                        <option>Distirto Federal</option>
                                        <option>Espírito Santo</option>
                                        <option>Goiás</option>
                                        <option>Maranhão</option>
                                        <option>Mato Grosso</option>
                                        <option>Mato Grosso do Sul</option>
                                        <option>Minas Gerais</option>
                                        <option>Pará</option>
                                        <option>Paraíba</option>
                                        <option>Paraná</option>
                                        <option>Pernambuco</option>
                                        <option>Piauí</option>
                                        <option>Rio de Janeiro</option>
                                        <option>Rio Grande do Norte</option>
                                        <option>Rio Grande do Sul</option>
                                        <option>Rondônia</option>
                                        <option>Roraima</option>
                                        <option>Santa Catarina</option>
                                        <option>São Paulo</option>
                                        <option>Sergipe</option>
                                        <option>Tocantins</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                        

                    
                    <tr>
                        <th colspan="2">
                            Acesso ao Sistema
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Usuário <span class="obrigatorio">*</span></label> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group input-group-lg linha-completa">
                                <input type="text" name="complemento" placeholder="Digite seu usuário" class="form-control linha-completa"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Senha <span class="obrigatorio">*</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group input-group-lg linha-completa">
                                <input type="password" name="cidade" placeholder="Digite sua senha" class="form-control linha-completa"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Confirmar Senha <span class="obrigatorio">*</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group input-group-lg linha-completa">
                                <input type="password" name="cidade" placeholder="Confirme sua senha" class="form-control linha-completa"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- aqui fica submit -->
                    </tr>
                </table>
        </div>
    </body>
</html>