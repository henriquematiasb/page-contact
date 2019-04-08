# Page Contact

Página de contato desenvolvida em Laravel 5.8, após o cadastro os dados são enviados para um gmail especificado.

## Dependências
A princípio é necessário ter instalado o [Composer](https://getcomposer.org/)(gerenciador de pacotes do PHP)  em sua máquina, além do git instalado para clone deste código.

Para confirmar se as dependências estão instaladas, use os comandos `$ composer` e `$ git --version` no terminal.

## Instalação
1. Primeiro clone o repositório:

```
$ git clone https://github.com/henriquemats/PageContact.git
```

2. Acesse a pasta do projeto no terminal:

```
$ cd PageContact
```

3. Execute o seguinte comando para instalar as dependências:

```
$ composer install
```

## Uso
1. Renomei o arquivo `env.example` para `.env`, e insira as informações referentes ao banco de dados nos campos `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`.

2. Ainda no arquivo `.env`, realize as seguintes alterações:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=e-mail para envio
MAIL_PASSWORD=senha do e-mail
MAIL_ENCRYPTION=tls
```

3. Vá até o arquivo `mail.php` em `/config`, e altere as seguintes informações:
```
'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'e-mail para envio'),
        'name' => env('MAIL_FROM_NAME', 'nome do e-mail'),
],
```

```
'to' => 'e-mail de destino',
```

4. Acesse o gmail escolhido e na sessão de segurança, habilite o acesso a Apps menos seguros.

5. Após isso é necessário gerar uma chave para utilização:

```
$ php artisan key:generate
```

5. Execute o comando para criação das tabelas no banco:

```
$ php artisan migrate
```

6. Ainda na raiz do projeto execute o seguinte comando:

```
$ php artisan serve
```

7. Abra no seu navegador: [http://localhost:8000/contact/create](http://localhost:8000/contact/create)
