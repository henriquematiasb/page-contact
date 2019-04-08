# Page Contact

Página de contato desenvolvida em Laravel 5.8 .

## Dependências
A princípio é necessário ter instalado o [Composer](https://getcomposer.org/)(gerenciador de pacotes do PHP)  em sua máquina, além do git instalado para clone deste código.

Para confirmar se as dependências estão instaladas, use o comando `$ composer` e `$ git --version` no terminal.

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

1. É necessário gerar uma chave para utilização:

```
$ php artisan key:generate
```

2. Ainda na raiz do projeto execute o seguinte comando:

```
$ php artisan serve
```

3. Abra no seu navegador: [http://localhost:8000/contact/create](http://localhost:8000/contact/create)
