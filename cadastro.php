<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link id="css" rel="stylesheet" type="text/css" href="style1/style.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
        <title>Cadastro</title>
    </head>
    <body>
        <ul class="menu">
            <li class="menuItem"><a href="cadastro.php" class="ativo">Cadastro</a></li>
            <li class="menuItem"><a href="consulta.php">Consulta</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Estilos</a>
                <div class="dropdown-conteudo">
                    <a href="#" class="dropdown-conteudo-a waves-effect waves-light">Principal</a>
                </div>
                <li style="float:right" class="menuItem"><a href="#about">Sair</a></li>
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
                            <input type="radio" name="status" value="cliente" checked="checked" /> <label>Cliente</label>
                        </td>
                        <td>
                            <input type="radio" name="status" value="gerente" /> <label>Gerente</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label >Nome <span class="obrigatorio">*</span></label> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" name="nome" placeholder="Digite seu nome" class="linha-completa"/>
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
                            <input type="text" name="cpf" placeholder="Digite seu CPF" class="linha-dividida"/>
                        </td>
                        <td>
                            <input type="date" name="data" placeholder="Digite sua data de aniversário" class="linha-dividida"/>
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
                            <input type="text" name="telefone" placeholder="Digite seu número de telefone" class="linha-dividida"/>
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Digite seu e-mail" class="linha-dividida"/>
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
                            <input type="text" name="cep" placeholder="Digite seu CEP" class="linha-dividida"/>
                        </td>
                        <td>
                            <input type="text" name="rua" placeholder="Digite sua rua" class="linha-dividida"/>
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
                            <input type="text" name="numero" placeholder="Digite o numero da residência" class="linha-dividida"/>
                        </td>
                        <td>
                            <input type="text" name="complemento" placeholder="Digite o complemento" class="linha-dividida"/>
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
                            <input type="text" name="cidade" placeholder="Digite a cidade" class="linha-dividida"/>
                        </td>
                        <td>
                            <select name="estado" class="linha-dividida">
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
                            <input type="text" name="complemento" placeholder="Digite seu usuário" class="linha-completa"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Senha <span class="obrigatorio">*</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="password" name="cidade" placeholder="Digite sua senha" class="linha-completa"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Confirmar Senha <span class="obrigatorio">*</span></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="password" name="cidade" placeholder="Confirme sua senha" class="linha-completa"/>
                        </td>
                    </tr>
                    <tr>
                        <!-- aqui fica submit -->
                    </tr>
                </table>
        </div>
    </body>
</html>