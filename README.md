# Crud Sorveteria

Este é um projeto desenvolvido para a disciplina de Programação Orientada a Objetos da USCS. O objetivo é criar um sistema CRUD para uma sorveteria.

## Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

-   [Vue.JS](https://vuejs.org/): Um framework JavaScript progressivo para construir interfaces de usuário.
-   [PrimeVue](https://primevue.org/): Uma biblioteca de componentes rica para Vue.js com mais de 70 componentes de código aberto.
-   [Laravel](https://laravel.com/): Um framework PHP para desenvolvimento web, que é totalmente gratuito e de código aberto.
-   [NPM](https://www.npmjs.com/): Um gerenciador de pacotes para o ambiente de execução Node.js.
-   [Módulo de linguagem pt_BR (português brasileiro) para Laravel](https://github.com/lucascudo/laravel-pt-BR-localization): Traduções em PT-BR para o Laravel

## Como rodar

Certifique o Composer e NPM estão instalado corretamente. Depois rode os sequintes comandos:

```bash
$ git clone https://github.com/MateusF03/sorveteria_trab.git
$ cd sorveteria_trab
$ composer install
$ npm install
```

Crie um arquivo `.env` baseado no `.env.example`, e certifique-se que este está com as credencias desejadas. Após isto, migre o banco de dados e inicie o servidor com:

```bash
$ php artisan migrate
$ php artisan key:generate
$ php artisan serve
$ npm run dev
```
