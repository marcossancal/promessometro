<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Promessômetro</title>
    <link rel="shortcut icon" href="./public/assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/assets/css/style.css">
</head>
<body>

<header>
  <div class="topbar">
    <div class="logo"><a href="./">📊 PROMESS<span>Ô</span>METRO</a></div>
    <nav>
      <a href="./">Início</a>
      <a href="./sobre">Sobre</a>
      <a href="./cadastro">Cadastre uma promessa</a>
    </nav>
  </div>

  <section class="hero">
    <div class="hero-content">
      <h1>Cadastro de promessas</h1>
      <p>Selecione o candidato e cadastre uma promessa feita durante a campanha.<br/>
        Para evitar SPAM e abusos, todos os cadastros passarão por uma validação manual, para verificar a fonte e veracidade do cadastro.      
      </p>

      <form class="promise-box">
        <select class="w-100">
          <option unselected>Candidato - partido</option>
        </select>
        <input type="text" name="title" placeholder="Escreva um título para a promessa">
        <textarea name="description" placeholder="Descreva a promessa do candidato"></textarea>
        <input type="text" name="source" placeholder="Envie a fonte de onde a promessa foi feita (Jornal, entrevista, discurso, redes sociais)">
        <select>
          <option>Status da promessa</option>
          <option>Pendente</option>
          <option>Concluída</option>
        </select>
        <button type="submit">Cadastrar promessa</button>
      </form>
    </div>
  </section>
</header>

<section class="features">
  <div class="features-grid">
    <div class="feature">
      🔍
      <h3>Busque Candidatos</h3>
      <p>Encontre políticos e veja suas promessas.</p>
    </div>
    <div class="feature">
      📋
      <h3>Acompanhe as Promessas</h3>
      <p>Veja o status das promessas de campanha.</p>
    </div>
    <div class="feature">
      📈
      <h3>Monitore Resultados</h3>
      <p>Saiba quem está cumprindo o que prometeu.</p>
    </div>
  </div>
</section>

<section class="promises">
  <h2>Últimas promessas cadastradas</h2>


  <div class="promise-grid">
    <div class="card">
      <span class="status ok">Cumprida</span>
      <h4>Reforma da Saúde</h4>
      <p>Nome do candidato<br/><i>Partido</i></p>
    </div>
        <div class="card">
      <span class="status ok">Cumprida</span>
      <h4>Reforma da Saúde</h4>
      <p>Nome do candidato<br/><i>Partido</i></p>
    </div>
        <div class="card">
      <span class="status ok">Cumprida</span>
      <h4>Reforma da Saúde</h4>
      <p>Nome do candidato<br/><i>Partido</i></p>
    </div>
        <div class="card">
      <span class="status ok">Cumprida</span>
      <h4>Reforma da Saúde</h4>
      <p>Nome do candidato<br/><i>Partido</i></p>
    </div>
  </div>
</section>

<footer>
  Promessômetro - Uma ferramenta para o povo Brasileiro. · <a href="./politica">Política de Privacidade</a>
</footer>

</body>
</html>