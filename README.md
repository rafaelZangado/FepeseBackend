<h1># Fepese - Aplicação Laravel(CRUD)</h1>
<lable>Quero agradecer pela oportunidade dada e espero que em breve eu faça parte de time</lable>
<lable>Essa é uma simples aplicação de cadastrar um contato com os principiso do SOLID  </lable>


🛠️  Requisitos

Antes de começar, certifique-se de que você tem os seguintes requisitos instalados:

- **PHP**: versão 8.1 ou superior.
- **Composer**: Gerenciador de dependências do PHP.
- **MySQL**: Banco de dados para rodar a aplicação.

🚀  Instalação

Siga os passos abaixo para instalar e configurar o ambiente de desenvolvimento.

### 1. Clonar o repositório

Clone o repositório para sua máquina local:

```bash
git clone https://github.com/rafaelZangado/FepeseBackend.git
cd FepeseBackend
```
### 2. Configurar o ambiente

Copie o arquivo de configuração padrão:

```bash
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=fepese_mysql   
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=root
```
### 2. Instale o composer
```bash
composer install
```

### 3. Rode o comando para subir o container do Docker 
```bash
docker-compose up -d
```

### 4. Rode o comando para as roda as migrations 
```bash
php artisan migrate
```
obs: caso de algum problema ao rodar as migrations pode entrar dentro do container e rodar ela
```bash
docker exec -it laravel_app bash
```

<h2>Atenção</h2>
Caso de algum problema em seu ambiente por causa do Linux é sempre bom da aquela permissão 
problemas com permissão :

```bash
chmod -R 777 storage bootstrap/cache

sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 755 storage bootstrap/cache

```
<hr>
<b>Por causa do docker a porta que esta sendo usada é 8010</b>
<lable>Tela que exibe os contatos</lable>
<img width="1729" height="448" alt="image" src="https://github.com/user-attachments/assets/3edb1784-5bec-4bd8-bd66-2b7a5b845744" />

<lable>Modal para cadastrar o contato</lable>
<img width="1671" height="643" alt="image" src="https://github.com/user-attachments/assets/e7446183-ca94-4918-857f-0159b0d98d83" />

<lable>Tela para editar contatos</lable>
<img width="1762" height="830" alt="image" src="https://github.com/user-attachments/assets/73fc3500-eecf-45d4-bc45-92a34bddc079" />


📌 Autor: Rafael Zangado | 🛠️ Projeto: VochTechTeste | 🌱 Tecnologia: Laravel 10




