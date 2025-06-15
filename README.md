  <h1 align="center">📋 To-Do List - Sistema de Tarefas com PHP + MySQL</h1>

  <p align="center"><em>Organize suas tarefas de forma simples, com cadastro, login, temas e um banco de dados MySQL por trás.</em></p>

  <p align="center">
  <img src="https://img.shields.io/badge/último%20commit-junho-blue?style=flat-square" />
  <img src="https://img.shields.io/badge/php-100%25-3776AB?style=flat-square&logo=python&logoColor=white" />
  <img src="https://img.shields.io/badge/tecnologias-5-blue?style=flat-square" />
</p>

<h3 align="center">Tecnologias e ferramentas utilizadas:</h3>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Badge" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript Badge" />
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5 Badge" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3 Badge" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL Badge" />
</p>

---

## 📋 Sobre o Projeto

O **Extractify** é uma aplicação web desenvolvida com **Python (Flask)** que permite ao usuário fazer o **upload de um arquivo PDF** e **converter automaticamente o conteúdo para um arquivo Word (.docx)**.

Essa ferramenta realiza a **extração de texto de documentos PDF** usando a biblioteca **pdfplumber** e a **geração de arquivos Word** com a biblioteca **python-docx**.

> ⚠️ *O sistema faz apenas extração de texto simples. Layouts mais complexos, como tabelas ou imagens, podem não ser preservados.*

---

## 📌 Funcionalidades principais:
 
✅ Sistema de cadastro e login de usuários
✅ Tela de lista de tarefas com CRUD (Criar, Listar, Atualizar, Excluir)
✅ Modo claro e escuro (Dark Mode)
✅ Interface com animações e vídeo de fundo
✅ Banco de dados relacional com MySQL para armazenar as tarefas
  

  <h2>📂 Estrutura de Pastas:</h2>

  <pre>
  ├── public/
  │   ├── css/
  │   └── js/
  ├── visao/
  │   ├── login.php
  |   ├── cadastro.php
  |   ├── adicionar_tarefa.php
  |   ├── editar_tarefa.php
  |   ├── excluir.php
  |   └── listar_tarefas.php
  ├── banco/
  │   └── conexão.php
  ├── model/
  |   ├── Tarefa.php
  |   └── Usuario.php
  ├── responsavel/
  |   ├── LoginResponsavel.php
  |   └── UsuarioResponsavel.php
  ├── assets/    ---> Imagens
  ├── logout.php 
  ├── index.php
  ├── package-lock.json
  ├── package.json
  └── README.md
  </pre>

  <h2>💻 Como executar localmente:</h2>

  <ol>
    <li>Instale um servidor local como o <strong>XAMPP</strong> ou <strong>WAMP</strong>.</li>
    <li>Coloque a pasta do projeto dentro da pasta <code>htdocs</code>.</li>
    <li>Crie o banco de dados MySQL usando o script SQL disponível na pasta <code>banco/</code>.</li>
    <li>Configure a conexão com o banco no arquivo <code>banco/conexão.php</code>.</li>
    <li>Acesse no navegador: <code>http://localhost/nome-do-projeto/</code></li>
  </ol>

  <h2>⚙️ Banco de Dados:</h2>
  <p>O sistema utiliza MySQL. Dentro da pasta <code>banco/</code> está o script SQL para criação das tabelas.</p>

  <h2>🌐 Deploy:</h2>
  <p>Este projeto é feito para rodar localmente em um ambiente com suporte a PHP e MySQL. Caso queira colocar online, é necessário um servidor com suporte a PHP (ex: Hostinger, 000webhost, InfinityFree, etc).</p>

  ## 📦 Versão

  1.0.0

  ---

  ## 📄 Licença

  Este projeto está sob a licença MIT.

  ---

  ## 📬 Contato

  Giovana Marques Silva  
  giovanamarquessilva24@gmail.com

