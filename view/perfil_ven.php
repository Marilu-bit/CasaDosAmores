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
    session_start();
    require_once "../factory/conexao.php";

    // Verifica se o usuário está logado
    if (!isset($_SESSION['codigo_user']) || !isset($_SESSION['nome_user'])) {
        header("Location: login_user.php");
        exit();
    }
    
    // Adicione estas duas linhas para definir as variáveis
    $nome_user = $_SESSION['nome_user'];
    $codigo_user = $_SESSION['codigo_user'];

    $cod_user = $_SESSION['codigo_user'];
    $conn = new Banco;
    
    // Consulta para buscar os produtos do usuário logado
    $query = "SELECT * FROM tbproduto WHERE coduser = :coduser";
    $stmt = $conn->getConn()->prepare($query);
    $stmt->bindParam(':coduser', $cod_user, PDO::PARAM_INT);
    $stmt->execute();
    
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

          <div class="product-grid">
    <?php
        if (count($produtos) > 0) {
            foreach ($produtos as $produto) {
    ?>
    <div class="product-card">
        <img src="../img/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Imagem do Produto" class="product-image">
        <div class="product-info">
            <h3 class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></h3>
            <p class="product-price">R$ <?php echo htmlspecialchars(number_format((float) str_replace(',', '.', $produto['preco']), 2, ',', '.')); ?></p>
        </div>
        <div class="product-actions">
            <a href="editar_produto.php?id=<?php echo $produto['codproduto']; ?>" class="edit-button">Editar</a>
        </div>
    </div>
    <?php
            }
        } else {
            echo "<p>Você ainda não cadastrou nenhum produto.</p>";
        }
    ?>
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
