# Site de construção

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
