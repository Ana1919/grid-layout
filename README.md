# grid-layout

## Requisitos

- php >= 7.3

- extensão pdo_sqlite

## Instalação e configuração

1. Clonar o repositório <br>
<code>git clone https://github.com/Ana1919/grid-layout.git </code>
2. Navegar para o diretório do projeto <br>
<code>cd grid-layout </code>
3. Instalar composer <br>
<code>composer install </code>
4. Copiar ficheiro .env.example <br>
<code>cp .env.example .env</code>
5. Gerar key<br>
<code>php artisan key:generate</code>
6. No ficheiro .env criado, 
   - alterar DB_CONNECTION para sqlite<br>
     - **DB_CONNECTION=sqlite**<br>
   - remover DB_DATABASE, DB_USERNAME e DB_PASSWORD
   - adicionar FLICKR_APP_KEY, exemplo:<br>
     - **FLICKR_API_KEY=f9cc014fa76b098f9e82f1c288379ea1**
7. No diretório **database**, criar um ficheiro com o nome **database.sqlite** 
8. Correr as migrations<br>
   <code>php artisan migrate</code>
9. Correr servidor<br>
<code>php artisan serve</code>
10. Ir para o link http://127.0.0.1:8000
