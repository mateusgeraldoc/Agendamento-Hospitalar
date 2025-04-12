# Projeto de Cadastro de pacientes - CRUD

Este projeto tem como objetivo criar uma aplicação simples de CRUD (Create, Read, Update, Delete) para o cadastro de pacientes e agendamento de consultas de um hospital. O sistema permite registrar, visualizar, editar e excluir dados dos pacientes, além de permitir ao colaborador ver todo o historico de consultas que estão agendadas ou que foram canceladas.

## Requisitos

### Para rodar o projeto, você precisa ter o seguinte instalado em seu computador:


```bash
    - XAMPP Server (Windows Apache MySQL PHP)
    - PHP (o XAMPP já inclui o PHP, então não é necessário instalá-lo separadamente).
    - MySQL (também incluso no XAMPP, para gerenciar o banco de dados).
```
Baixe o XAMPP [AQUI](https://www.apachefriends.org/pt_br/download.html).

## Instruções de Instalação

```bash
    Baixe o XAMPP Server no site oficial, se ainda não tiver.
    
    Instale o XAMPP Server e execute-o. O ícone do XAMPP deve aparecer na bandeja do sistema.

    Baixe ou clone este repositório:
        Se você tiver o Git instalado, pode clonar o repositório com o comando:

    git clone https://github.com/seu-usuario/agendamento-hospitalar-crud.git
```
### Coloque o projeto na pasta do XAMPP:
```bash
    Acesse a pasta htdocs dentro do diretório onde o XAMPP foi instalado.
    Mova ou copie o projeto para dentro dessa pasta.
```
### Crie o Banco de Dados e as Tabelas:
```bash
    Acesse o phpMyAdmin no seu navegador através do link: http://localhost/phpmyadmin/
    Crie um novo banco de dados chamado hospital.
    Selecione o banco de dados que você criou
    Crie as tabelas que estão dentro da pasta database, no arquivo db.txt.
    Insira dentro do banco de dados toda a linha do comando insert no arquivo db.txt, logo abaixo dos comandos de create table.
    Importe o arquivo SQL que acompanha o projeto para criar as tabelas necessárias.
```
### Configure o arquivo de conexão com o banco:
```bash
    Dentro da pasta do projeto, procure pelo arquivo config.php (ou o nome que você escolher para o arquivo de configuração).
    Verifique e altere as configurações de conexão com o banco de dados se necessário:

        $host = 'localhost';
        $usuario = 'root';   // usuário padrão do MySQL no XAMPP
        $senha = '';         // senha padrão (geralmente em branco)
        $banco = 'hospital';   // nome do banco de dados

    Execute o servidor local:
        No XAMPP, clique no ícone na bandeja do sistema e certifique-se de que o Apache e o MySQL estão iniciados (verifique se as luzes verdes estão acesas).

    Acesse a aplicação:
        No seu navegador, acesse a aplicação no seguinte link: http://localhost/agendamento-hospitalar-crud.
```


## Funcionalidades
```bash
Esta aplicação permite ao usuário:

    Cadastrar paciente: Formulário para adicionar novos pacientes com cpf, nome, idade, telefone, e endereço.
    Consultar pacientes: Página que permite pesquisar um pacientes cadastrado, com opções para alterar os seus dados ou exclui-lo do sistema.
    Agendar consulta para os paciente: Formulário para cadastrar o agendamento de pacientes com seus dados, a especialidade, hora e data da consulta.
    Consultar relatorio de agendamentos: Tabela que exibe todos agendamentos, permitindo ao usuario filtrar a busca e excluir o agendamento se necessário.
```

## Tecnologias Utilizadas
```bash
    PHP: Linguagem de programação para o backend.
    MySQL: Banco de dados utilizado para armazenar os registros dos pacientes.
    HTML/CSS: Para a estrutura e estilização das páginas.
```
## Como Contribuir
```bash
    Faça um fork do projeto.
    Crie uma nova branch (git checkout -b minha-feature).
    Faça suas modificações e commit (git commit -am 'Adicionei uma nova feature').
    Faça push para a branch (git push origin minha-feature).
    Abra um Pull Request no GitHub.
```
## Licença

Este projeto está sob a licença MIT - veja o arquivo LICENSE para mais detalhes.