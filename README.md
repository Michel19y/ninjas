﻿# 🥷 Ninjas

Um sistema web simples de gerenciamento de ninjas, que permite visualizar, atualizar e excluir dados de diferentes ninjas em tabelas organizadas por eventos como: Sol, Lua, Guilda e Teste de Sobrevivência.

## 📌 Funcionalidades

- ✅ Listagem de ninjas com dados como nome, preço, fragmentos atuais e totais.
- ⭐ Exibição gráfica do progresso por meio de estrelas.
- 🔄 Atualização de dados individuais dos ninjas.
- ❌ Confirmação e exclusão de registros com modal de segurança.
- 🗂️ Organização por tipo de evento (Sol, Lua, Guilda, Treino de Sobrevivência).

## 📁 Estrutura de Diretórios

![image](https://github.com/user-attachments/assets/87182599-12ce-47f6-86f6-76e20cf51b0b)




## 🛠️ Tecnologias Utilizadas

- **PHP** (backend)
- **Bootstrap 5** (estilo e modal)
- **HTML5 e CSS3**
- **JavaScript** (para modais e ações de retorno)
- **MySQL** (banco de dados relacional)

## 🚀 Como Rodar o Projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/ninjas.git
   cd ninjas
Configure o banco de dados:

Crie um banco com as tabelas:

pontos_sol

pontos_lua

guilda

treino_sobrevivencia

Estrutura básica de tabela:

sql
Copiar
Editar
CREATE TABLE pontos_sol (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ninja VARCHAR(100),
  preco INT,
  fragmentos_atual INT,
  fragmentos_total INT
);
Atualize os dados de conexão em models/index.php com seu host, usuário, senha e banco.

Execute localmente com servidor Apache (ex: XAMPP, WAMP, Laragon) ou via terminal com PHP embutido:

bash
Copiar
Editar
php -S localhost:8000
Acesse http://localhost:8000/views/index.php no navegador.

📸 Captura de Tela

🧾 Observações
Os botões de "Atualizar" levam à tela de edição, onde os dados podem ser alterados.

O botão "Excluir" abre um modal pedindo confirmação antes de remover o registro.

O cálculo de moedas faltantes considera os fragmentos restantes vezes o preço unitário.

