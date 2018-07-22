# Sistema em PHP
Projeto realizado na disciplina de Programação e Desenvolvimento Web, UNICAMP - 2017.

***
### Descrição
Sistema simples para cadastro de clientes em uma loja, utilizando as ferramentas vistas na disciplina (HTML, CSS, PHP e JS).
O sistema utiliza o SGBD MySQL e permite o cadastro e consulta de clientes para usuários que estiverem autenticados (logados).

Apenas o gerente pode cadastrar um cliente. O cliente pode alterar seus dados cadastrais. Ambos podem listar os usuários cadastrados.

***
### Acesso ao Sistema
Para acessar o sistema como **gerente**, existirá o seguinte usuário padrão:
* **Login:** admin
* **Senha:** admin

Para acessar o sistema como **cliente**, existirá o seguinte usuário padrão:
* **Login:** cliente
* **Senha:** cliente

***
### Objetivo
Realizar uma integração entre um banco de dados e uma aplicação para Web através do PHP.

***
### Conhecimentos Aplicados
HTML, CSS, Javascript, PHP, SQL básico.

***
### Instruções de uso
 * Cole a pasta **SistemaPHP** dentro do diretório **C:/xampp/htdocs/**.
 * Acessa a pasta **banco**, abra o arquivo **Login do Banco.txt** e informe o nome do servidor, usuário e senha para acesso ao banco de dados.
 * Abra o arquivo **criar-banco.php** (na mesma pasta **banco**) para a criação do banco com todas as tabelas. Caso tenha sido criado, exibirá uma mensagem "Banco criado com sucesso", caso contrário, aparecerá a mensagem de erro correspondente.
 * Abra a página **index.php** dentro da pasta **C:/xampp/htdoc/** para iniciar o acesso ao sistema.
 
 **PS:** Caso não seja utilizado o **XAMPP**, basta colocar os arquivos no diretório de hospedagem do servidor e seguir os passos normalmente.
