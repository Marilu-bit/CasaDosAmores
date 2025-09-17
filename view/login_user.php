<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="../css/login_user.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
  <title>Login</title>
</head>
<body>

<nav>
        <a id="top" href="cad_user.php">Cadastrar</a>
        <a id="top" href="../index.php">Home</a>
</nav>


  <div class="tabela_log">
    <h1>Seja Bem-Vindo de volta!</h1>
    <form action="../model/login.php" method="POST" enctype="multipart/form-data">
      <div class="input-container">
        <input required type="text" id="nome" name="cxnome"/>
        <label for="nome">Nome</label>
      </div>
      <div class="input-container">
        <input required type="password" id="senha" name="cxsenha"/>
        <label for="senha">Senha</label>
      </div>
      <div class="input-container">
        <input required type="password" id="cod" name="cxcod"/>
        <label for="cod">Codigo</label>
      </div>
      <button id="bt-log">Login</button>
      <p>Ainda não tem uma conta?<a href="cad_user.php">Faça cadastro.</a></p>
    </div>
  </form>

<footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>
</body>
</html>
