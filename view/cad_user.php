<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/cad_user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body>

    <nav>
        <a id="top" href="login_user.php">Entrar</a>
        <a id="top" href="../index.php">Home</a>
    </nav>

    
    <div class="tabela_cad">
      <h1>Seja Bem-Vindo!</h1>
        <form action="../model/cad.php" method="POST">
          
            <div class="input-container">
                <input required type="text" id="nome" name="cxnome"/>
                <label for="nome">Nome</label>
            </div>

            <div class="input-container">
                <input required type="password" id="senha" name="cxsenha"/>
                <label for="senha">Senha</label>
            </div>


            <select name="cxpro_salvo" required>
                <option value="">Selecione o tipo</option>
                <option>Cliente</option>
                <option>Vendedor</option>
            </select>
            
            <div class="input-container">
            <input type="file" name="cxfoto" id="foto"><br><br>
                <label for="img">Adicionar Imagem</label>
            </div>
            </br>
            <button id="bt-cad">Cadastrar</button>
        </form>

        <p>Já tem uma conta?<a href="login_user.php">Faça login.</a></p>
    </div>

    <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>
</body>

</html>