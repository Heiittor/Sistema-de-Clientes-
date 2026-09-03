# 🖥️ Sistema de Gestão — Clientes, Produtos e Pedidos

Sistema web administrativo desenvolvido em **PHP** com **MySQL**, com CRUD completo, autenticação de usuários com controle de permissões e um dashboard com métricas e gráficos dinâmicos alimentados por dados reais do banco.

## 🚀 Funcionalidades

- **Autenticação** — login e logout com sessão de usuário; rotas administrativas protegidas
- **CRUD completo** de Clientes, Produtos e Pedidos (pedidos com relatório de valor calculado automaticamente a partir do produto vinculado)
- **Usuários e permissões** — cadastro com atribuição de role, proteção contra o usuário logado remover a própria conta
- **Dashboard** — valor total em pedidos, total de clientes, % de produtos vendidos e total de pedidos em tempo real, com gráficos de receita por mês e por produto (Chart.js)

## 🛠️ Tecnologias

PHP (procedural) + PDO · MySQL · Bootstrap 4 (template SB Admin 2) · Chart.js · DataTables · Laragon (ambiente local)

## 🗄️ Banco de Dados

- **usuarios** (`id`, `nome`, `email`, `password`, `role_id`) → `roles`
- **roles** (`role_id`, `role_name`)
- **atributes** (`user_id`, ...) → `usuarios`
- **clientes** (`client_id`, `nome`, `idade`)
- **products** (`product_id`, `product_name`, `product_price`)
- **orders** (`order_id`, `client_id`, `product_id`, `data_pedido`) → `clientes` e `products`

## 📁 Estrutura do Projeto

hello/
├── components/        # partials reutilizáveis (header, footer, sidebar, topbar)
├── css/
├── functions/         # lógica de CRUD e conexão com o banco
│   ├── connect.example.php   # modelo de configuração (sem credenciais reais)
│   ├── clients.php
│   ├── products.php
│   ├── orders.php
│   ├── users.php
│   ├── roles.php
│   ├── login.php
│   └── logout.php
├── img/
├── js/
│   └── demo/           # scripts dos gráficos do dashboard
├── pages/              # views de cada seção
│   ├── home.php
│   ├── clients.php / edit_clients.php
│   ├── products.php / edit_products.php
│   ├── orders.php / edit_orders.php
│   └── users.php / edit_users.php
├── template/
├── vendor/
└── index.php           # roteador principal (?p=pagina)

## ▶️ Como Rodar Localmente

1. Clone o repositório: `git clone https://github.com/Heiittor/<seu-repositorio>.git`
2. Suba num ambiente local com PHP e MySQL (recomendado: [Laragon](https://laragon.org/))
3. Crie o banco e importe o dump em `database/schema.sql`
4. Copie `functions/connect.example.php` para `functions/connect.php` e preencha com suas credenciais
5. Acesse pelo navegador (ex: `http://hello.test`)

## 🔒 Segurança

- Todas as queries usam **PDO com prepared statements**, prevenindo SQL injection
- Sessão validada antes de operações administrativas sensíveis
- Exclusões com dependência referencial tratadas com transações
- Erros de banco tratados via `try/catch`, sem expor detalhes internos na tela
- Credenciais fora do controle de versão (`functions/connect.php` no `.gitignore`)

## 👤 Autor

**Heitor Ribeiro** — Estudante de Ciência da Computação, IESB
[GitHub](https://github.com/Heiittor) 
[LinkedIn](https://linkedin.com/in/heitor-ribeiro-010a90395/)

## 📄 Licença

Projeto desenvolvido para fins de aprendizado.