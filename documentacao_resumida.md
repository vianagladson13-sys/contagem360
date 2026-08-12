# Projeto MVC com PHP, jQuery e Bootstrap

> Documentação simples da versão atual do projeto.

---

# PARTE 1 - O PROJETO

## 1. Objetivo

O projeto foi criado para aprender, de forma prática, como organizar uma aplicação PHP inspirada no padrão **MVC**.

Até o momento temos:

- Landing Page pública;
- página de Login;
- Home administrativa;
- páginas de Produtos, Clientes e Funcionários;
- sistema de rotas;
- página 404;
- formulários com Bootstrap;
- validações com jQuery Validation;
- máscaras com jQuery Mask;
- envio de dados com `fetch()`;
- Controllers PHP;
- classe `Validator`;
- Helpers JavaScript e PHP;
- arquivos de constantes JavaScript e PHP.

> Ainda não temos banco de dados, Models reais, sessão e autenticação do Login.

---

## 2. Estrutura principal

```text
a_projeto_mvc_completo/
│
├── assets/
│   ├── css/
│   ├── img/
│   └── js/
│
├── config/
│   ├── constants.js
│   └── constants.php
│
├── controllers/
│   ├── ClienteController.php
│   ├── FuncionarioController.php
│   └── ProdutoController.php
│
├── layout/
├── libs/
│   ├── js/
│   │   └── helpers.js
│   └── php/
│       ├── helpers.php
│       └── Validator.php
│
├── models/
├── views/
│   ├── 404.php
│   ├── cliente.php
│   ├── funcionario.php
│   ├── home.php
│   ├── landing.php
│   ├── login.php
│   └── produto.php
│
├── documentacao.md
├── index.php
└── routes.php
```

### Para que serve cada pasta?

| Pasta | Função |
|---|---|
| `assets/css` | CSS das páginas |
| `assets/js` | JavaScript específico de cada página |
| `assets/img` | Imagens |
| `config` | Constantes e configurações do sistema |
| `controllers` | Recebem e processam os dados |
| `libs/js` | Funções JavaScript reutilizáveis |
| `libs/php` | Funções e classes PHP reutilizáveis |
| `models` | Futuramente fará o acesso ao banco de dados |
| `views` | Páginas apresentadas ao usuário |

---

# PARTE 2 - ÁREA PÚBLICA E ADMINISTRATIVA

## 3. Landing Page

Arquivo:

```text
views/landing.php
```

A **Landing Page** apresenta as informações públicas do sistema. Ela possui um layout independente da área administrativa e pode ser personalizada livremente.

O botão **Entrar** direciona para:

```text
index.php?page=login
```

---

## 4. Login

Arquivo:

```text
views/login.php
```

A página de Login também possui layout próprio.

No momento, o Login é apenas uma demonstração visual. Ainda não existe autenticação real.

Fluxo atual:

```text
Landing
   ↓
Login
   ↓
Home
```

---

## 5. Área administrativa

As páginas administrativas são:

```text
home.php
produto.php
cliente.php
funcionario.php
```

Elas utilizam o cabeçalho, menu e rodapé definidos no `index.php`.

> Nesta etapa elas ainda não estão protegidas por Login. A proteção será feita posteriormente utilizando sessão.

---

# PARTE 3 - NAVEGAÇÃO

## 6. `index.php`

O `index.php` é a porta de entrada do sistema.

Ele captura a página pela URL:

```php
$page = $_GET["page"] ?? "landing";
```

Se nenhuma página for informada, abre a Landing Page.

As páginas públicas são definidas em um array:

```php
$paginasPublicas = [
    "landing" => __DIR__ . "/views/landing.php",
    "login" => __DIR__ . "/views/login.php",
];
```

Quando a página é pública, ela é carregada e o `exit` interrompe a execução:

```php
if (array_key_exists($page, $paginasPublicas)) {
    require $paginasPublicas[$page];
    exit;
}
```

Assim, Landing e Login não recebem o layout da área administrativa.

---

## 7. `routes.php`

O `routes.php` funciona como um mapa das páginas do sistema.

Exemplo:

```php
$paginasValidas = [
    "home" => __DIR__ . "/views/home.php",
    "produtos" => __DIR__ . "/views/produto.php",
    "clientes" => __DIR__ . "/views/cliente.php",
    "funcionarios" => __DIR__ . "/views/funcionario.php",
];
```

A URL:

```text
index.php?page=produtos
```

faz o sistema procurar a chave `produtos` e carregar a View correspondente.

Se a página não existir, é retornado o erro HTTP 404 e carregada a página:

```text
views/404.php
```

---

# PARTE 4 - MVC

## 8. View

A **View** é a interface apresentada ao usuário.

Exemplos:

```text
produto.php
cliente.php
funcionario.php
```

Ela possui formulários, campos, botões e textos.

---

## 9. Controller

O **Controller** recebe os dados enviados pelo JavaScript, valida e devolve uma resposta.

Exemplos:

```text
ProdutoController.php
ClienteController.php
FuncionarioController.php
```

Fluxo:

```text
View
 ↓
JavaScript
 ↓
Controller
 ↓
JSON
 ↓
JavaScript
 ↓
View
```

---

## 10. Model

O **Model** será responsável pelos dados e pela comunicação com o banco de dados.

A pasta já existe, mas os Models reais ainda serão desenvolvidos.

Futuramente o fluxo será:

```text
View → JavaScript → Controller → Model → Banco de Dados
```

---

# PARTE 5 - FRONTEND

## 11. JavaScript das páginas

Cada cadastro possui seu próprio JavaScript:

```text
assets/js/produto.js
assets/js/cliente.js
assets/js/funcionario.js
assets/js/login.js
```

Eles são responsáveis por comportamentos específicos da página, como:

- máscaras;
- validações;
- captura dos dados;
- `fetch()`;
- mensagens de sucesso ou erro.

---

## 12. Bibliotecas utilizadas

### Bootstrap

Utilizado para o layout e os componentes visuais.

### Bootstrap Icons

Utilizado para os ícones.

### jQuery

Utilizado para facilitar a manipulação dos elementos da página.

### jQuery Validation

Utilizado para validar os formulários no navegador.

### jQuery Mask

Utilizado para aplicar máscaras nos campos.

---

## 13. `FormData` e `fetch()`

O `FormData` captura os dados do formulário:

```javascript
const dados = new FormData(formulario);
```

O `fetch()` envia esses dados para o Controller:

```javascript
const resposta = await fetch(
    "controllers/ProdutoController.php",
    {
        method: "POST",
        body: dados
    }
);
```

---

# PARTE 6 - RECURSOS REUTILIZÁVEIS

## 14. `helpers.js`

Arquivo:

```text
libs/js/helpers.js
```

Reúne **funções JavaScript reutilizáveis**, evitando repetir o mesmo código em várias páginas.

Exemplos disponíveis:

```javascript
somenteNumeros(valor);
precoParaBackend(valor);
mostrarMensagem(elemento, tipo, texto);
limparValidacao(formulario);
```

Para carregar no HTML:

```html
<!-- Funções auxiliares -->
<script src="libs/js/helpers.js"></script>
```

---

## 15. `helpers.php`

Arquivo:

```text
libs/php/helpers.php
```

Reúne **funções PHP reutilizáveis** no backend.

Exemplos disponíveis:

```php
somenteNumeros($valor);
dataParaBanco($data);
dataParaBrasil($data);
precoParaBanco($valor);
precoParaBrasil($valor);
limparTexto($valor);
```

Dentro de um Controller, pode ser carregado assim:

```php
require_once __DIR__ . "/../libs/php/helpers.php";
```

---

## 16. `constants.js`

Arquivo:

```text
config/constants.js
```

Centraliza valores fixos utilizados pelo frontend.

Exemplos atuais:

```javascript
const APP_NAME = "Sistema MVC";
const ROTA_HOME = "index.php?page=home";
const ROTA_LOGIN = "index.php?page=login";
const MIN_SENHA = 6;
const MIN_NOME = 3;
```

Deve ser carregado antes dos arquivos que utilizarem suas constantes:

```html
<!-- Constantes do sistema -->
<script src="config/constants.js"></script>
```

---

## 17. `constants.php`

Arquivo:

```text
config/constants.php
```

Centraliza valores fixos utilizados pelo backend.

Exemplos atuais:

```php
define("APP_NAME", "Sistema MVC");
define("STATUS_ATIVO", 1);
define("STATUS_INATIVO", 0);
define("HTTP_OK", 200);
define("HTTP_NAO_AUTORIZADO", 401);
define("HTTP_NAO_ENCONTRADO", 404);
define("HTTP_ERRO_VALIDACAO", 422);
define("MIN_SENHA", 6);
define("MIN_NOME", 3);
```

Dentro de um Controller:

```php
require_once __DIR__ . "/../config/constants.php";
```

---

# PARTE 7 - BACKEND

## 18. `Validator.php`

Arquivo:

```text
libs/php/Validator.php
```

A classe `Validator` centraliza as validações realizadas no backend.

Exemplo de carregamento:

```php
require __DIR__ . "/../libs/php/Validator.php";
```

Depois podemos criar o objeto:

```php
$validator = new Validator($_POST);
```

E aplicar regras de validação aos dados recebidos.

> Mesmo que o JavaScript valide o formulário, o backend também deve validar os dados.

---

## 19. Resposta JSON

Os Controllers devolvem respostas em JSON.

Exemplo de sucesso:

```json
{
    "sucesso": true,
    "mensagem": "Cadastro realizado com sucesso.",
    "dados": {},
    "erros": null
}
```

Exemplo de erro:

```json
{
    "sucesso": false,
    "mensagem": "Corrija os campos indicados.",
    "dados": null,
    "erros": {}
}
```

No JavaScript, a resposta pode ser lida com:

```javascript
const resultado = await resposta.json();
```

---

## 20. Códigos HTTP

Alguns códigos utilizados no projeto:

| Código | Significado |
|---|---|
| `200` | Sucesso |
| `404` | Página não encontrada |
| `405` | Método não permitido |
| `422` | Erro de validação |

---

# PARTE 8 - FLUXO ATUAL

## 21. Fluxo de um cadastro

```text
Usuário
   ↓
View
   ↓
Formulário
   ↓
jQuery Validation / Mask
   ↓
FormData
   ↓
fetch()
   ↓
Controller
   ↓
Validator
   ↓
JSON
   ↓
JavaScript
   ↓
Mensagem na View
```

Neste momento os dados ainda **não são gravados no banco de dados**.

---

# PARTE 9 - PRÓXIMAS ETAPAS

## 22. O que já está pronto

- estrutura MVC inicial;
- área pública;
- área administrativa visual;
- Landing Page;
- Login visual;
- Home;
- rotas;
- página 404;
- formulários;
- validação frontend;
- validação backend;
- Controllers;
- Helpers;
- Constants;
- comunicação com JSON.

---

## 23. O que ainda será desenvolvido

```text
Autenticação do Login
        ↓
Sessão
        ↓
Proteção da área administrativa
        ↓
Logout
        ↓
Banco de dados
        ↓
Models
        ↓
CRUD completo
```

Depois do banco de dados, os cadastros poderão realmente **salvar, listar, editar e excluir** informações.

---

## 24. Resumo do projeto até aqui

```text
ÁREA PÚBLICA
Landing → Login

ÁREA ADMINISTRATIVA
Home → Produtos / Clientes / Funcionários

CADASTROS
View → JavaScript → Controller → JSON → JavaScript → View

REUTILIZAÇÃO
helpers.js / helpers.php
constants.js / constants.php
Validator.php

PRÓXIMA EVOLUÇÃO
Login → Sessão → Banco de Dados → Models → CRUD
```
