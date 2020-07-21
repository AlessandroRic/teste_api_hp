## Teste BackEnd ApiHelpay

Esta API REST tem como finalidade efetuar vendas de produtos por cartão de crédito, onde estes por sua vez possuem, gerenciamento de estoque, armazenamento de produtos, e utiliza da função Soft Delete para possível recuperação de um produto apagado.

- Mais sobre **[Laravel](https://laravel.com/docs/broadcasting)**.
- Mais sobre **[Soft Deleting](https://laravel.com/docs/7.x/scout#soft-deleting)**.

## Instalação

- Efetue o clone deste repositório com git clone https://github.com/AlessandroRic/teste_api_hp.git
- Renomeie o arquivo ".env.dist" para ".env"
- Gere uma APP_KEY executando o comando "php artisan key:generate"
- Crie uma Database no MySql com o comando "CREATE DATABASE api_hp"
- Configurure "DB_USERNAME" e "DB_PASSWORD" no .env (Conforme seu usuário e senha de acesso MySql)
- Execute no terminal dentro do diretório de arquivos da api "php artisan migrate"
- Adicionar o endereço do Slack WebHook em "SLACK_WEBHOOK" dentro do .env para efetuar testes com a API.

## Efetuando testes (Postman)

Para execução dos testes é necessário uma Api Client instalada.
Para testes deste foi utilizado o **[Postman](https://www.postman.com)**.
As rotas para verificação encontram-se em "routes/api.php"