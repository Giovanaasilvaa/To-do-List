<h1 align="center">📋 To-Do List - Task Management System with PHP + MySQL</h1>

<p align="center"><em>Organize your tasks simply, with registration, login, themes, and a MySQL database behind it all.</em></p>

<p align="center">
  <img src="https://img.shields.io/badge/last%20commit-june-blue?style=flat-square" />
  <img src="https://img.shields.io/badge/php-49.4%25-3776AB?style=flat-square&logo=python&logoColor=white" />
  <img src="https://img.shields.io/badge/technologies-5-blue?style=flat-square" />
</p>

<h3 align="center">Technologies and Tools Used:</h3>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Badge" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript Badge" />
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5 Badge" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3 Badge" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL Badge" />
</p>

---

## 📋 About the Project

**Extractify** is a web application developed with **Python (Flask)** that allows users to **upload a PDF file** and **automatically convert its content to a Word document (.docx)**.

This tool performs **text extraction from PDF documents** using the **pdfplumber** library and **Word file generation** using the **python-docx** library.

> ⚠️ *This project is focused on academic purposes and currently does not include advanced features like password recovery. These features are planned for future updates.*

---

## 📌 Main Features:

✅ User registration and login system  
✅ Task list page with CRUD (Create, Read, Update, Delete)  
✅ Light and Dark Mode toggle  
✅ Interface with animations and background video  
✅ Relational database with MySQL to store tasks  
✅ Multi-user authentication, allowing each user to have their own login and see only their tasks

<h2>📂 Folder Structure:</h2>

<pre>
├── public/
│   ├── css/
│   └── js/
├── views/
│   ├── login.php
│   ├── register.php
│   ├── add_task.php
│   ├── edit_task.php
│   ├── delete.php
│   └── list_tasks.php
├── database/
│   └── connection.php
├── model/
│   ├── Task.php
│   └── User.php
├── controller/
│   ├── LoginController.php
│   └── UserController.php
├── assets/    ---> Images
├── logout.php 
├── index.php
├── package-lock.json
├── package.json
└── README.md
</pre>

<h2>💻 How to Run Locally:</h2>

<ol>
  <li>Install a local server such as <strong>XAMPP</strong> or <strong>WAMP</strong>.</li>
  <li>Place the project folder inside the <code>htdocs</code> directory.</li>
  <li>Create the MySQL database using the SQL script located in the <code>database/</code> folder.</li>
  <li>Configure the database connection in the file <code>database/connection.php</code>.</li>
  <li>Open your browser and go to: <code>http://localhost/project-name/</code></li>
</ol>

<h2>⚙️ Database:</h2>
<p>The system uses MySQL. Inside the <code>database/</code> folder is the SQL script to create the tables.</p>

<h2>🌐 Deployment:</h2>
<p>This project is designed to run locally on an environment supporting PHP and MySQL. To deploy online, you will need a hosting provider with PHP support (e.g., Hostinger, 000webhost, InfinityFree, etc.).</p>

## 📦 Version

1.0.0

---

## 📄 License

This project is licensed under the MIT License.

---

## 📬 Contact

Giovana Marques Silva  
giovanamarquessilva24@gmail.com
