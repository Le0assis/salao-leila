
# 📄 Documentação do Projeto – DSIN

## 📌 Visão geral

Este projeto foi desenvolvido em **PHP puro**, sem utilização de nenhum framework. Ele tem como base um sistema administrativo com foco em organização de dados e interface administrativa feito para o salão da cabeleleila leila.

Para a interface visual, foi utilizado o template **AdminLTE**, que ajudou a estruturar o painel de forma moderna e responsiva.

----------

## 🚀 Como executar o projeto

### 1. Requisitos

Antes de rodar o projeto, você precisa ter instalado:

-   PHP (>= 7.4 recomendado)
-   Composer
-   MySQL / MariaDB
-   Servidor local (XAMPP, WAMP ou similar)

----------

### 2. Instalação das dependências

Na raiz do projeto, execute:

```
composer install
```

Esse comando irá instalar todas as dependências necessárias do projeto, depois execute:

```
composer dump-autoload
```

----------

### 3. Configuração do banco de dados

1.  Abra o **phpMyAdmin** ou seu gerenciador de banco de dados.
2.  Importe o arquivo `.sql` que está dentro da pasta do projeto.

----------

### 4. Rodando o Seeder (se houver)

O projeto funciona com  arquivo de seed , execute o script no terminal:

```
php .\database\seeder.php
```

----------

### 5. Rodando o projeto

Depois de tudo configurado:

-   Coloque o projeto dentro da pasta do servidor local (`htdocs` no XAMPP)
-   Acesse no navegador:

```
http://localhost/salao-leila
```

----------

## 🧠 Estrutura do projeto

O projeto foi desenvolvido em PHP puro, organizado da seguinte forma:

-   **/controllers** → Lógica principal das funcionalidades
-   **/models** → Manipulação direta com o banco de dados
-   **/views** → Interface do sistema (HTML + AdminLTE)
-   **/services** → A ponte entre models e controllers
-   **/public/assets** → CSS, JS e imagens
-   **/database** → Arquivo do banco de dados

----------

## 🎨 Interface (AdminLTE)

O painel administrativo foi construído utilizando o template **AdminLTE**, que forneceu:

-   Componentes prontos (tabelas, cards, menus)
-   Design moderno para dashboards

Isso acelerou o desenvolvimento da interface sem necessidade de criar tudo do zero.

----------

## ⚙️ Funcionamento do sistema

O sistema funciona com base na estrutura tradicional de PHP puro:

1.  O usuário acessa uma página via URL
2.  O controller recebe a requisição
3.  O model faz a comunicação com o banco de dados
4.  A view exibe os dados para o usuário

----------

## 📊 Observações finais

-   O projeto não utiliza nenhum framework, sendo totalmente em PHP puro.
-   Toda a lógica foi construída manualmente, incluindo rotas e conexão com banco.
-   O AdminLTE foi utilizado apenas como base visual.
-   O sistema depende de configuração manual do banco e servidor local.