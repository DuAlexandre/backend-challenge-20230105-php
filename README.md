<a id='ancora'></a>
# Backend Challenge 20230105

<br><br>

- [Sobre a Coodesh](#ancora1) <br>
- [Sobre o Desafio](#ancora2) <br>
- [Sobre o Projeto](#ancora3) <br>
- [Competências Desenvolvidas](#ancora4) <br>
- [Execução](#ancora5) <br>
- [Prints de Execução](#ancora6) <br>
- [Desenvolvedor](#ancora7)

<br><br>

<a id="ancora1"></a>

## Sobre a Coodesh

<br>

<p align="center">
  <img width="300px" src="https://coodesh.com/blog/wp-content/uploads/2020/08/Original.png" alt="dio-logo">
</p>

<br>

A Coodesh nasceu com o propósito de ajudar outras empresas a construir os melhores e mais diversos times de tecnologia. Acreditamos que no contexto atual das startups e transformação digital de grandes empresas, recrutamento tech eficiente e com insights relevantes para evolução das pessoas contratadas é um dos maiores diferenciais para o sucesso.

<br>

<a id="ancora2"></a>

## Sobre o Desafio

<br>

Nesse desafio trabalharemos no desenvolvimento de uma REST API para utilizar os dados do projeto Open Food Facts, que é um banco de dados aberto com informação nutricional de diversos produtos alimentícios.
O projeto tem como objetivo dar suporte a equipe de nutricionistas da empresa Fitness Foods LC para que eles possam revisar de maneira rápida a informação nutricional dos alimentos que os usuários publicam pela aplicação móvel.
<br>

Nesta formação você terá uma visão geral do que é necessário para se tornar um desenvolvedor mobile no Sistema Operacional (SO) da Apple. Além disso, conteúdos mais avançados também estão disponíveis para que você conheça algumas boas práticas e padrões arquiteturais.

<br>

<a id="ancora3"></a>
## Sobre o Projeto

<br>

Para este projeto foi utilizada a linguagem de Programação PHP em conjunto com o Framework Laravel.  

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<br>

## Requisitos Obrigatórios

<br>

### Requisito 1
Criar um banco de dados MongoDB usando Atlas: https://www.mongodb.com/cloud/atlas ou algum Banco de Dados SQL se não sentir confortável com NoSQL;
* Entrega: Por familiaridade o banco de dados escolhido para o projeto foi o MySQL. Já está incluso no arquivo `docker-compose.yml` toda a configuração necessária para criação do banco e interface com o PHPmyAdmin.

<p align="center">
  <img width="300px" src="./storage/images/phpMyAdmin.png" alt="admin">
</p>

<br>

### Requisito 2
Criar uma REST API com as melhores práticas de desenvolvimento, Design Patterns, SOLID e DDD;
* Entrega: O Framework Laravel possui uma arquitetura voltada ao MVC (Model, View, Controller), entretanto é possível com algumas alterações protegermos melhor as dependências, domínios e regras de negócio do projeto. Para a construção de um modelo arquitetural DDD foram implementadas duas camadas a mais na aplicação: Uma de Repositories e outra de Services.

#### Repositories
* A camada de Repositories ficou responsável pela relação Modelo/Entidade da aplicação e pelo controle da integração com o Banco de Dados através do `Eloquent`. Com isso conseguimos utilizar dois dos princípios SOLID: o `Single Responsability Principle` pois cada classe do repositorio tem apenas a finalidade de interagir com sua respectiva entidade, e o `Open-Closed Principle` já que fica possível integrar a interface de repositório novas formas de consulta com o `Eloquent`.

#### Services
* A camada de Services está interligada à camada Repositories pois a mesma utiliza suas interfaces para construção das regras de negócio obedecendo o Design Pattern `Dependency Injection`. Além disso, fica responsável por comandar o Controller para integração dos Endpoints da API.

#### TDD
* Também foi incorporado ao projeto o método de desenvolvimento TDD (Test Driven Development) onde todo processo de desenvolvimento obedece o chamado ciclo `red-green-refactor`.

<p align="center">
  <img width="300px" src="https://dkrn4sk0rn31v.cloudfront.net/2019/11/04105020/img-tdd.png" alt="rgr">
</p>

- RED: Primeiro teste a ser escrito, que quando for executado irá falhar.
<p align="center">
  <img width="300px" src="./storage/images/Test-red2.png" alt="rgr">
</p>

<p align="center">
  <img width="300px" src="./storage/images/Test-red.png" alt="rgr">
</p>

- GREEN: Após isso, foi implementado um código sucinto o suficiente para que faça com que os testes sejam aprovados.
<p align="center">
  <img width="300px" src="./storage/images/Test-green2.png" alt="rgr">
</p>

<p align="center">
  <img width="300px" src="./storage/images/Test-green.png" alt="rgr">
</p>

- REFACTOR: Momento em que o código foi de fato escrito, orientando-se por manter os testes aprovados.

<br>
Na árvore de Commits é possível observar que em todos os momentos de criação de uma nova entidade a branch `fature/tdd-test` antecede qualquer outra branch.





<a id="ancora4"></a>
## Competências Desenvolvidas 📝

<br>

* iOS;
* Swift;
* XCode;
* StoryBoard;
* MVC Architecture;
* Auto Layout
* Core Location
* MapKit

<br>

<br>

<a id="ancora5"></a>
## Execução 💻

<br>

1. Clone este repositório remoto em seu equipamento:
```
git clone git@github.com:DuAlexandre/app-innovation-one-food.git
```
2. Selecione o Play Icon do XCode para abrir e executar o App no Simulator.

<br>

<a id="ancora6"></a>
## Prints de Execução 📷

<br>

<img src="https://github.com/DuAlexandre/app-innovation-one-food/blob/main/AppInnovationOneFood/Pics/Captura%20de%20Tela%202023-02-02%20%C3%A0s%2016.49.09.png?raw=true">

<br>

<img src="https://github.com/DuAlexandre/app-innovation-one-food/blob/main/AppInnovationOneFood/Pics/Captura%20de%20Tela%202023-02-02%20%C3%A0s%2016.49.27.png?raw=true">

<br>

<a id="ancora7"></a>
## Desenvolvedor 🤝

Projeto desenvolvido por:

<table align="center">
  <tr>
    <td align="center">
      <a target="_blank" href="https://www.linkedin.com/in/eduardo-alexandre025/">
        <img src="https://avatars.githubusercontent.com/u/95940707?s=96&v=4" width="100px;" alt=""/><br>
        <sub>
          <b>Eduardo Alexandre</b>
           <p>Back-End | iOS Developer</p>
        </sub>
      </a>
    </td>
  </tr>
</table>

<br><br>

[Voltar ao Topo](#ancora)
