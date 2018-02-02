# selecao-fredbots

## Pre-requisito
- Docker e docker-compose

## Rodando
- Execute ```cp .env.laradock ./laradock/.env``` na raiz do projeto
- Execute: ```./run``` na raiz do projeto
- Acesse o container ```workspace``` com o usuário ```laradock```
- Execute: ```composer install```
- Execute: ```npm install```
- Execute: ```npm run dev```
- Execute: ```php artisan migrate migrate:refresh``` 
- Execute: ```php artisan storage:link```

Obs.: Ao rodar o ```./run``` já acessa o container ```workspace``` com o usuário ```laradock```

Após os passos citados a aplicação estará disponivel em ```localhost```. Será necessário criar um usuário e assim logar na aplicação.
Para acesso a documentação da api [clique aqui](https://documenter.getpostman.com/view/1774155/selective-process-fredbots/7TT68To) 
