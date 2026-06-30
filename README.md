# 💊 Atividade Prática: CRUD Farmácia VAV

**Modalidade:** Grupo

**Entrega:** Link do repositório no GitHub

**Critério Obrigatório:** Histórico de evolução através de **commits** (mínimo de 3 por integrante).

---

## 🎯 Objetivo

Desenvolver um sistema de gerenciamento de estoque para uma farmácia, utilizando **PHP com PDO** e aplicando conceitos modernos de design (**Mobile First** e **Regra 60-30-10**).

---

## 📂 Estrutura de Diretórios

```
config/
  └── conexao.php      (Configuração do PDO)
includes/
  ├── header.php        (Topo e Menu)
  └── footer.php         (Rodapé e Scripts)
css/
  └── style.css          (Estilização)
index.php                (Listagem de produtos)
cadastro.php              (Formulário de inserção)
editar.php                (Formulário de edição)
excluir.php                (Lógica de remoção)
database.sql              (Script de criação do banco)
```

---

## 🛠️ Requisitos Técnicos (Back-end)

1. **Banco de Dados:** Tabela `produtos` com os campos:
   - `id` (Chave Primária, Auto incremento)
   - `nome` (Varchar)
   - `fabricante` (Varchar)
   - `preco` (Decimal 10,2)
   - `estoque` (Int)
2. **Segurança:** Uso de `prepare()` e `execute()` no PDO em todas as queries, evitando SQL Injection.
3. **Modularização:** Uso de `require_once` para a conexão e para os arquivos de cabeçalho/rodapé.

---

## 🎨 Requisitos de Design (Front-end)

### 1. Mobile First

CSS desenvolvido primeiro para **telas de celular**, com `@media (min-width: 768px)` ajustando a visualização para computadores. Em telas pequenas, a listagem de produtos é exibida em **cards**; em telas maiores, em **tabela**.

### 2. Regra 60-30-10 (Cores)

| Proporção | Função | Cor utilizada |
|---|---|---|
| **60%** Dominante | Fundo / superfícies | Branco-azulado (`#F4F7F9`) |
| **30%** Secundária | Menus e botões (saúde) | Verde-água (`#1A7B8A`) |
| **10%** Destaque | Alertas e ações importantes | Laranja vibrante (`#E85C2B`) |

---

## ⚙️ Como Executar o Projeto

1. Copie a pasta do projeto para `htdocs` (XAMPP) ou equivalente.
2. Inicie os módulos **Apache** e **MySQL** no painel de controle do servidor local.
3. Acesse `http://localhost/phpmyadmin`, abra a aba **SQL** e execute o conteúdo do arquivo `database.sql` para criar o banco e a tabela.
4. Acesse `http://localhost/<pasta-do-projeto>/` no navegador.

---

## 👥 Divisão do Grupo

| Integrante | Responsabilidade |
|---|---|
| *(nome)* | Listagem (`index.php`) |
| *(nome)* | Inserção (`cadastro.php`) |
| *(nome)* | Edição e Exclusão (`editar.php`, `excluir.php`) |

---

## 📋 Checklist de Entrega

- [x] O código utiliza PDO?
- [ ] O repositório tem commits de todos os membros?
- [x] O layout é responsivo (Mobile First)?
- [x] A regra 60-30-10 foi aplicada no CSS?
- [x] O CRUD está funcionando sem erros de PHP?
