<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil_ven.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
    <title>Perfil</title>
</head>

<body>
<?php
    session_start(); //aCESSAR AS INFORMAÇÕES DO $_SESSION

    require_once "../factory/conexao.php"; 
    $nome_user = "Nome do usuraio"; 
    $codigo_user = "Código:";

    //Recuperar os dados
    if (isset($_SESSION['codigo_user'])) { 
        $codigo_usuario_logado = $_SESSION['codigo_user'];
        $nome_user = htmlspecialchars($_SESSION['nome_user']);
        $codigo_user = "Código: " . htmlspecialchars($_SESSION['codigo_user']);
    }
?>   


    <nav>
        <a id="top" href="cad_pro.php">Novo Produto</a>
        <a id="top" href="../index.php">Home</a>
    </nav>

    <main>
        <h3><?php echo $nome_user; ?></h3>
        <p><?php echo $codigo_user; ?></p>
        <img src="../img/<?php echo $_SESSION['imagem_user'];?>" alt="">
    </main>

    <main class="container" style="margin-top:26px;">
    <div id="painel-vendedor">
      <aside class="lista-mini" aria-label="lista de produtos">
      <section style="flex:1;">
        <div class="form-card">
          <h3>Lista de Produtos</h3>
          <p style="color:#555;margin-top:8px">Clique em "Editar" para alterar um produto.</p>

          <div style="margin-top:16px" class="grid-produtos">
            <!-- Cards menores -->
            <article class="opcoes-caixa" data-categoria="cafe">
            <img src="img/Cafe/americano.jpg" alt="">
                <p>Americano</p>
                <p>Café</p>
                <p id="preco">R$8,50</p>
                <div class="card-acoes">
                <button class="btn btn-editar" onclick="location.href='editar_produto.php'">Editar</button>
              </div>
            </div>
            </article>
          </div>
        </div>
      </section>
</aside>
    </div>
  </main>

    <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>
</body>
</html>