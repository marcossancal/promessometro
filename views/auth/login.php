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
      <h1>Área restrita</h1>
      <p>Digite seus dados para entrar</p>
      <form method="post" action="./login">
    <?php if (!empty($error)): ?>
    <p style="color:darkblue"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
        <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Senha" required><br><br>
    <button class="btn-login" type="submit">Entrar</button>
</form>
    </div>
  </section>
</header>
<footer>
  Promessômetro - Uma ferramenta para o povo Brasileiro. · <a href="./politica">Política de Privacidade</a>
</footer>

</body>
</html>