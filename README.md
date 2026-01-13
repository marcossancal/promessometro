# 🇧🇷 Promessômetro Brasil

O **Promessômetro Brasil** é um projeto open-source criado com o objetivo de **acompanhar, organizar e analisar promessas feitas por políticos brasileiros**, promovendo **transparência**, **accountability** e **acesso à informação** para a população.

A ideia central é simples:  
👉 *promessa feita deve ser promessa acompanhada.*

---

## 🎯 Motivação

Durante campanhas eleitorais, candidatos fazem inúmeras promessas — muitas delas acabam esquecidas após a eleição.  
Este projeto nasce da necessidade de:

- Centralizar promessas políticas em um único lugar
- Tornar o acompanhamento acessível e transparente
- Permitir que qualquer cidadão veja se uma promessa foi:
  - Cumprida
  - Está em andamento
  - Foi atrasada
  - Ou não foi cumprida

Além disso, o projeto também tem um **viés educacional e técnico**, servindo como base para estudos, análises de dados, jornalismo investigativo e desenvolvimento de soluções cívicas.

---

## 🧱 Estrutura do Projeto

O sistema foi pensado desde o início para ser:
- Simples de entender
- Fácil de manter
- Modular e extensível
Ele é dividido em duas grandes áreas:

### 🔐 Painel Administrativo
- Cadastro de candidatos
- Cadastro de partidos
- Cadastro de cargos
- Cadastro de promessas
- Moderação e aprovação de conteúdo

### 🌐 Área Pública
- Visualização de promessas por candidato
- Filtros por estado, cargo e status
- Dados abertos para consulta

---

## ⚙️ Tecnologias Utilizadas

### Backend
- **PHP 8+**
- **FlightPHP** – microframework leve para rotas e controle
- **PDO** – acesso seguro ao banco de dados
- **MySQL / MariaDB**

### Arquitetura
- **MVC (Model–View–Controller)**
- Controllers estáticos
- Models reutilizáveis com `BaseModel`
- Separação clara entre:
  - Regras de negócio
  - Camada de dados
  - Camada de visualização (views)

### Frontend (Admin)
- HTML5
- CSS3
- Layout administrativo próprio
- Foco em simplicidade e produtividade

---

## 🗄️ Modelagem de Dados

O banco de dados contempla as seguintes entidades principais:

- **Users** (administradores)
- **Candidates** (candidatos)
- **Parties** (partidos)
- **Positions** (cargos)
- **States** (estados)
- **Promises** (promessas políticas)
  - Status (pendente, cumprida, em andamento, atrasada, não cumprida)
  - Fonte da informação
  - Aprovação editorial

A modelagem foi pensada com foco em **normalização**, **clareza** e **possibilidade de expansão futura**.

---

## 🔐 Autenticação

- Sistema simples de login para administradores
- Middleware de proteção via `Auth::check()`
- Painel administrativo isolado da área pública

---

## 🚀 Objetivos Futuros

Algumas ideias já planejadas para evolução do projeto:
- Área pública para visualização das promessas
- API pública para consulta dos dados
- Histórico de alterações das promessas
- Sistema de fontes e validação colaborativa
- Dashboard com métricas e gráficos
- Importação de dados eleitorais oficiais

---

## 🤝 Contribuições

Este é um projeto **open-source**.  
Contribuições são muito bem-vindas!

Você pode ajudar com:

- Código
- Modelagem de dados
- Sugestões de UX/UI
- Melhorias de performance
- Documentação
- Novas ideias e funcionalidades

Sinta-se à vontade para abrir uma **issue** ou enviar um **pull request**.

---

## 📜 Licença

Este projeto é distribuído sob a licença **MIT**, permitindo uso, modificação e redistribuição, desde que os créditos sejam mantidos.

---

## 🧠 Considerações Finais

O **Promessômetro Brasil** não é um projeto partidário.  
Ele é uma ferramenta de **cidadania**, **transparência** e **consciência política**.

Se você acredita que promessas devem ser acompanhadas — este projeto é para você.



## Como rodar esse projeto?

A instância em prod está em: https://[xxxxxxxxxxxxx].com.br
Caso queira rodar o projeto localmente (sem dados oficiais):

composer install

e aponte seu banco de dados em "app/config/database.php"