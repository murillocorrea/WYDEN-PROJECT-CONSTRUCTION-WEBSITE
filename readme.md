# Site de construção

## Como acessar frontend
Se não for alterar o backend, é só acessar o [link do GithubPages](https://murillocorrea.github.io/WYDEN-PROJECT-CONSTRUCTION-WEBSITE/).

## Como executar o backend
Atualmente o backend já está sendo executado em uma máquina. Mas se você quiser executar em outro computador, deve seguir os seguintes passos.

## 1. Baixar o repositório
Primeiro crie uma pasta. Dentro dela execute com o git bash o seguinte comando para clonar o repositório 
`git clone https://github.com/murillocorrea/WYDEN-PROJECT-CONSTRUCTION-WEBSITE.git .` 
## 2. Instalar dependências do composer (precisa ter o composer instalado no pc)
Dentro do diretório da aplicação que você clonou, digite o seguinte:

    composer install
## 3. Executar banco MySql
Fazer a instalação do XAMPP (https://www.apachefriends.org/pt_br/download.html)
Após isso, abrir xampp e iniciar o processo do MySql.
## 4. Criar arquivo .env
Crie um arquivo ".env" dentro do repositório da aplicação.
Após criado, copie e cole o conteúdo nele:

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:73yHCyojdtofAXp+1kbmxMdP8KRaCOhG8LnS2mvky+w=
    APP_DEBUG=true
    APP_TIMEZONE=UTC
    APP_URL=http://localhost
    
    
    APP_LOCALE=en
    APP_FALLBACK_LOCALE=en
    APP_FAKER_LOCALE=en_US
    
    APP_MAINTENANCE_DRIVER=file
    # APP_MAINTENANCE_STORE=database
    
    BCRYPT_ROUNDS=12
    
    LOG_CHANNEL=stack
    LOG_STACK=single
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    
    SESSION_DRIVER=database
    SESSION_LIFETIME=120
    SESSION_ENCRYPT=false
    SESSION_PATH=/
    SESSION_DOMAIN=null
    
    BROADCAST_CONNECTION=log
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=database
    
    CACHE_STORE=database
    CACHE_PREFIX=
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_CLIENT=phpredis
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=log
    MAIL_HOST=127.0.0.1
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false
    
    VITE_APP_NAME="${APP_NAME}"

## 5. Iniciar a aplicação
Antes de iniciar, lembre-se de criar um banco de dados no xampp chamado "laravel". Também deve rodar o seguinte comando no terminal pra criar as tabelas

    php artisan migrate

Pra iniciar o server, rodar no diretório da aplicação o seguinte comando

    php artisan serve
   Após isso, pode acessar ela pela URL:  http://localhost:8000/
## 6. Tornar seu backend público para internet
Necessário instalar o ngrook no teu pc (https://download.ngrok.com/windows?tab=download)
Após isso, crie uma conta no site (https://dashboard.ngrok.com/login)
Depois de criar uma conta, deve ser copiado o token do site e configurar ele no ngrook rodando no teu pc:

    ngrok config add-authtoken SEU_TOKEN_AQUI
Executar comando para iniciar ngrok:

    ngrok http 8000

Se tudo der certo aparecerá session status Online. Agora você deve copiar o link do forwording, como por exemplo https://9f0e-170-83-72-252.ngrok-free.app:

    Forwarding           https://9f0e-170-83-72-252.ngrok-free.app -> http://localhost:8000
Essa será a URL que o frontend deverá fazer as comunicações via API.

## 7. Configurar a URL do Ngrok no código e commitar no Github
**Primeiro**, execute o seguinte comando no terminal do vscode

    php artisan render:blade index index.html
    
 **Após o passo anterior**, copie a URL gerada pelo Ngrok nessa linha. 
    Forwarding                    ***https://d0b2-187-103-252-3.ngrok-free.app*** -> http://localhost:8000
    
Cole a URL na variável BACKEND_URL que fica nas primeiras linhas do arquivo "public/index.html"

 

    <script>
    
    const BACKEND_URL =  "https://fb07-170-83-72-252.ngrok-free.app";
    
    </script>
Depois é necessario commitar a alteração e subir no github para atualizar no GitHubPages.

    git add public/index.html
    git commit -m "atualizando URL do backend"
    git push
    
    

   **Atenção:** A partir desse momento, você não deve encerrar o processo do Ngrok. Pois se encerrar e iniciar novamente, será gerada uma nova URL e você deverá fazer esse processo novamente para surtir efeito.

# Passo a passo dia da apresentação

## 1. Iniciar banco de dados MySql
Abrir o xampp e dar start no MySql

## 2. Iniciar ngrok
Abra o aplicativo ngrok e cole o comando

    ngrok http 8000
## 3. Atualizar URL do backend no site e index.html
**Primeiro**, execute o seguinte comando no terminal do vscode

    php artisan render:blade index index.html
    
   **Após o passo anterior**, copie a URL gerada pelo Ngrok nessa linha. 
    Forwarding                    ***https://d0b2-187-103-252-3.ngrok-free.app*** -> http://localhost:8000
    
Cole a URL na variável BACKEND_URL que fica nas primeiras linhas do arquivo "public/index.html"

    <script>
          const BACKEND_URL = "https://d0b2-187-103-252-3.ngrok-free.app";
    </script>


   Comite essa alteração para o git e faça push para o github:
   

    git add public/index.html
    git commit -m "Atualizacao da URL de backend"
    git push

## 4. Iniciar servidor backend
Execute o seguinte comando no terminal do vscode, dentro do diretório da aplicação

    php artisan serve
  ## 5. Teste
  Acesse a URL https://murillocorrea.github.io/WYDEN-PROJECT-CONSTRUCTION-WEBSITE/ e teste criar/contratar/deletar um projeto e enviar o formulário de contato.
Todas essas funcionalidades devem estar funcionando.
Lembre-se: a partir desse momento você não pode fechar a aplicação do ngrok e o terminal do vscode. Se você fizer isso, terá que refazer todo esse processo.

## Funcionalidades
* Botões interativos para navegação entre os conteúdos do site.
* Botões para visualizar os serviços fornecidos.
* CRUD de projetos (criar, ler, atualizar e deletar). 
* Formulário de contato do cliente com a empresa.
* Validações dos campos dos formulários.

## Tecnologias utilizadas
### Front-end
* HTML
* CSS
* Bootstrap (framework para facilitar a utilização do CSS)
* Laravel (framewok do PHP foi utilizado nesse caso para fazer os arquivos ".blade.php" que geram o "index.html" do site)
* Github pages (utilizado para hospedar o front-end do site)
* Javascript (para enviar as requisições assíncronas pro backend)

### Back-end
* PHP (utilizando framework laravel. Com esse framework foi criada a API para que o front-end envie as requisições)
* Composer (gerenciador de bibliotecas do site)
* XAMPP (utilizado apenas para rodar e gerenciar o banco de dados MySql, por ser mais prática a configuração)
* Ngrok (tecnologia que atribui uma URL pública a uma porta do computador. Rodamos o backend no localhost, porta 8000 e o ngrok atribui uma URL pública para essa porta)
### Controle de versões
* Git
* Github
* Visual Studio Code
### Observação
O código do front-end e back-end estão no mesmo repositório no Github. A diferença é que o back-end está na branch "main" e o front-end está na branch "frontend"

## Design
 
Acerca do Design, anteriormente era vago, com apenas um HEADER. Agora, com a recriação do projeto, tornamos-o um site de construção civil, que emprega a venda
de projetos de imóveis.

## Sumário

- [Nome do projeto](#nomedoprojeto)
- [Descrição](#descrição)
- [Requisitos](#requisitos)
- [Progresso](#progresso)
- [Grupo](#grupo)

## Descrição

Projeto de site responsivo e funcional da instituição de ensino UnimetroCamp Wyden.

Recursos utilizados:
 - HTML 
 - CSS
 - Java Script
 - PHP
 - Framework Laravel
 - SQLite

## Requisitos

- Sistema Operacional: `Linux`, `Windows`, `macOS`
- Visual Code Studio ou outro compilador
- Composer
- Preparação do laravel localmente.
- PHP Compiler
- Subir php artisan serve (Server local)

## Progresso

O estágio atual do projeto, inclui, 4 paginas distintas em PHP e não HTML, que, são unidas e visualizadas em uma única página através
do efeito âncora. Também, possui integração e operação de um sistema de registro de contato, registro de produtos e uma simulação de venda.

Atualmente, o front-end e o back-end estão integrados.

## Laravel

Em caso de dúvidas a respeito deste framework, por favor, consultar no README.MD dentro da pasta principal.

## Grupo

 - Murillo Correa
 - Pedro Gabriel
 - Lucas Satin
