# Sistema de Carros
---

Esse foi um projeto de estudos onde é possível efetuar o cadastro de carros, marcas, cores e usuários.

### Estrutura da Aplicação
---

Esse projeto foi desenvolvido utilizando `Docker`, sendo os seguintes containers:
- `PHP`: `php-fpm:8.2` + `Composer 2`.
- `NGINX`: `NGINX 1.16`.
- `MongoDB`: `MongoDB 4`
- `MySQL`: `MySQL 8`.

### Executando a Aplicação
---

Na raiz do projeto encontra-se um arquivo chamado `config.sh` que faz toda a configuração do mesmo para a execução com os containers do `Docker`.
Caso queira trocar algo após rodar o `config.sh`, basta alterar no `.env` da aplicação.

### Login
---

O usuário e senha pré configurados para login são: `admin@mail.com` e senha `123`.
