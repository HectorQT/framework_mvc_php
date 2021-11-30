#  Sumário 
<div align="rigth">
    <p>
        1. <a href="#pré-requisitos">Pré Requisitos</a> </br>
         &nbsp&nbsp&nbsp1.1 <a href="#orientação-a-objetos">Orientação a Objetos</a> </br>
         &nbsp&nbsp&nbsp1.2 <a href="#composer-e-autoload-psr-4">Composer e Autoload PSR-4</a> </br>
        2. <a href="#módulo-de-roteamento">Módulo de Roteamento</a> </br>
        3. <a href="#controller">Controller</a> </br>
        4. <a href="#view">View</a> </br>
        5. <a href="#model">Model</a>
    </p>
</div> 

 
# Pré Requisitos

## Orientação a Objetos
É de suma importância que, antes de utilizar esse repositório, se tenha conhecimentos prévios de <b>Orientação a Objetos</b> já que esta arquitetura é voltada para este paradigma. Outro motivo, é que visando um código mais limpo e organizado, há um nível de abstração considerado alto para quem não está acostumado com esse tema.
## Composer e Autoload PSR-4
O Composer é um gerenciador de pacotes no nível do aplicativo para a linguagem de programação PHP que fornece um formato padrão para gerenciar dependências do software PHP e bibliotecas necessárias. 

Primeiro você deve instalar o composer na sua pasta de projeto colocando as seguintes linhas de código no terminal: 
```PowerShell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php')
```
Em seguida, você precisa configurar um arquivo com o seguinte nome "composer.json" na raiz do seu projeto e editá-lo da seguinte forma:
```PHP
{
    "name":"vendor_name/nome_projeto",
    "require":{
        "php": ">= 7.0"
    },
    "authors": [
        {
            "name": "Héctor Queiroz Torres",
            "email": "hqt2300@gmail.com"
        }
    ],
    "autoload": {
        "psr-4": { 
            "App\\": "App/",
            "MF\\": "vendor/MF"
        }
    }
}
```
PSR-4 é a especificação de carregamento automático das classes dentro do projeto. 

Na pasta MF (abreviação de miniframework) irá conter todos os encapsulamentos das camadas MVC como também do modulo de roteamento, por isso a inserção deste diretório no autoload.

Após configurar podemos executar o código no terminal para instalar a pasta vendor no projeto:
```PowerShell
php composer.phar install
```


# Módulo de roteamento
As rotas, por sua vez, não estão diretamente ligadas a arquitetura MVC, entretanto esse sistema de roteamento tem um papel muito importante na aplicação. O cliente fara requisições HTTP enviando caminhos e solicitando diversos recursos da página, sendo assim o módulo de roteamento vai nortear as atividades do Controlador de forma que dependendo da página solicitada pelo cliente, o arquivo **Route.php** instancie o Controller respónsavel pela rota acessada e execute suas respectivas actions.

# Controller
O Controller (controlador) existe entre as camadas View e Model. Ele ouve os eventos disparados pela visualização e executa a reação apropriada a esses eventos. 

Nesta etapa temos o seguinte objetivo: <b>Receber a requisição e definir pra onde levar o usuário</b>. 

O primeiro passo é criar a classe Route e instancia-la no **index.php** (o ponto de partida da nossa aplicação). Nela será criado diversos métodos, mas o principal deles, para a compreensão do fluxo da aplicação, é o **initRoutes( )** que conterá as configurações de cada página: a rota, seu controlador e ação que devera ser acionada. 

Por exemplo:

"O cliente acessou a página 'sobre_nos'. Como essa página existe na aplicação, o modulo de roteamento irá instanciar o controlador responsável e executar sua action. Esta, por sua vez, executa outros métodos como solicitar o Model que trará os dados da base de dados e o método render, responsável por requirir o layout e o conteúdo da página presentes na camada Views."

Para cada página dentro da aplicação é recomendável criar um Controller específico.

# View
Esta camada tem a responsabilidade de guardar o conteúdo que deve ser exibido na tela. Aqui criamos um diretório para cada página da nossa aplicação (por exemplo: 'App\Views\index') onde adicionaremos arquivos com a extensão .phtml (extensão que aplica codificação php com codificação html). Dentro da pasta Views também adicionaremos **Layouts**, que nada mais são que estruturas presentes em diversas páginas da aplicação.
Um exemplo prático de layout é uma barra de menu.

# Model
 Para criar os models primeiro devemos criar dentro do diretório App um arquivo de conexão com a base de dados. O arquivo 'Connection.php', criado para este fim, contem em seu escopo uma classe estática chamada Connection e nela é implementado o método **getDb( )**,  que tem a função de realizar a conexão via PDO ao banco de dados e retornar uma variável que guarda essa conexão. A partir dai, criamos no diretório App\Models os modelos desejados dentro da aplicação.
