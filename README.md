Projeto de Controle de Acesso
==============================

Este é um projeto de controle de acesso desenvolvido em Laravel.

Descrição
---------

O projeto visa criar um sistema de controle de acesso com funcionalidades básicas, como registro de entrada e saída de usuários, gerenciamento de usuários e geração de relatórios em PDF.

Funcionalidades
---------------

- Registro de entrada de usuários
- Registro de saída de usuários
- Gerenciamento de usuários (CRUD)
- Geração de relatórios em PDF

Requisitos
----------

- PHP >= 7.3
- Composer
- Laravel
- MySQL

Instalação
----------

1. Clone o repositório:
   git clone https://github.com/seu-usuario/controle-de-acesso.git

2. Instale as dependências do Composer:
   composer install

3. Copie o arquivo .env.example para .env e configure o acesso ao banco de dados:

4. Gere uma chave de aplicativo:
   php artisan key:generate

5. Execute as migrações do banco de dados para criar as tabelas necessárias:
   php artisan migrate

6. Inicie o servidor de desenvolvimento:
   php artisan serve

7. Acesse o aplicativo em seu navegador em http://localhost:8000.

Contribuição
------------

Contribuições são bem-vindas! Sinta-se à vontade para fazer fork do projeto e enviar pull requests.

Licença
-------

Este projeto está licenciado sob a MIT License.
