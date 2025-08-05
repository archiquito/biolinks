# Biolinks - Gerenciador de Links para Perfis

O Biolinks é uma aplicação web simples e poderosa para gerenciar e compartilhar seus links em um único lugar. Crie sua página de perfil personalizada para centralizar todos os seus links importantes, como redes sociais, portfólio, projetos e muito mais.

## 🚀 Funcionalidades

- **Gerenciamento de Links:** Adicione, edite, reorganize e exclua seus links de forma fácil e intuitiva.
- **Página de Perfil Personalizada:** Cada usuário tem uma URL única (`biolinks.test/@seuhandler`) que exibe todos os seus links.
- **Autenticação de Usuário:** Sistema de login e registro para gerenciar seus próprios links com segurança.
- **Interface Amigável:** Desenvolvido com Tailwind CSS e DaisyUI para uma experiência de usuário limpa e moderna.

---

## 🛠️ Requisitos de Instalação

Antes de começar, certifique-se de ter os seguintes softwares instalados em sua máquina:

- **PHP** (versão 8.1 ou superior)
- **Laravel** (versão 12)
- **Composer** (Gerenciador de dependências PHP)
- **Node.js** (versão 16 ou superior)
- **npm** (Gerenciador de pacotes do Node.js)
- **Um banco de dados** (MySQL, PostgreSQL, SQLite, etc.)

---

## ⚙️ Guia de Instalação

Siga os passos abaixo para configurar o projeto em seu ambiente local:

**1. Clone o Repositório:**

```bash
git clone [URL_DO_SEU_REPOSITORIO]
cd biolinks

**2. Instale as Dependências do PHP:**

Use o Composer para instalar as dependências do Laravel:

```bash
composer install

**3. Configure o Ambiente:**

```bash
cp .env.example .env

Abra o arquivo .env e preencha as seguintes variáveis:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biolinks_db
DB_USERNAME=root
DB_PASSWORD=

**4. Gere a Chave da Aplicação:**

```bash
php artisan key:generate

**5. Instale as Dependências do JavaScript:**
Use o npm para instalar as dependências de front-end:

```bash
npm install

**6. Execute as Migrações do Banco de Dados:**
Isso criará as tabelas necessárias no seu banco de dados.

```bash
php artisan migrate

---

## ▶️ Como Rodar a Aplicação

Para iniciar o servidor do Laravel e o servidor do Vite (para o front-end) simultaneamente, use o script npm run start que configuramos.

```bash
npm run start

**Acessando a Aplicação**
Depois de rodar o comando acima, a aplicação estará disponível em seu navegador nos seguintes endereços:

- **Frontend (Página Principal):** http://127.0.0.1:8000

- **Dashboard (Seção de Links):** http://127.0.0.1:8000/dashboard

---

**Agora você pode se registrar e começar a gerenciar seus links!**