<?php
    session_start();
    require_once "../factory/conexao.php";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $cod_produto = $_GET['id'];

        $conn = new Banco;
        
        $query = "SELECT * FROM tbproduto WHERE codproduto = :id";
        $stmt = $conn->getConn()->prepare($query);
        $stmt->bindParam(':id', $cod_produto, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$produto) {
            header("Location: perfil_ven.php");
            exit();
        }
    } else {
        header("Location: perfil_ven.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_produto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
    <title>Perfil</title>
</head>

<body>

<nav>
        <a id="top" href="cad_user.php">Cadastrar</a>
        <a id="top" href="../index.php">Home</a>
</nav>

<main class="container">
    <section style="display:flex;gap:20px;flex-wrap:wrap;align-items:flex-start">
      <div class="form-card" style="max-width:420px;">
        <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
          <img src="../img/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="preview" id="imagemPreview" style="width:100%;border-radius:12px;object-fit:cover">
        </div>
      </div>

      <div class="form-card" style="flex:1;min-width:280px;">
        <h3>Dados do produto</h3>

        <form class="form-campos" action="../model/editar_produto_action.php" method="POST" enctype="multipart/form-data">
          
          <input type="hidden" name="codproduto" value="<?php echo htmlspecialchars($produto['codproduto']); ?>">

          <div class="campo">
            <label for="nome-produto">Nome</label>
            <input name="cxnome" id="nome-produto" type="text" value="<?php echo htmlspecialchars($produto['nome']); ?>">
          </div>

          <div class="campo">
            <label for="tipo-produto">Selecione um tipo</label>
            <select name="cxtipo" id="tipo-produto">
              <option value="<?php echo htmlspecialchars($produto['tipo']); ?>" selected><?php echo htmlspecialchars($produto['tipo']); ?></option>
              <option>Rosquinha</option>
              <option>Torta</option>
              <option>Bolo</option>
            </select>
          </div>

          <div class="campo">
            <label for="valor-produto">Valor (R$)</label>
            <input name="cxvalor" id="valor-produto" type="text" value="<?php echo htmlspecialchars($produto['preco']); ?>">
          </div>
          
          <label>Editar imagem</label>
          <input type="file" id="atualiza-imagem" name="cximagem" accept="image/*">

          <div class="area-botoes">
            <button class="btn-cancelar" type="button" onclick="window.location.href='perfil_ven.php'">Cancelar</button>
            <button class="btn-salvar" type="submit">Salvar</button>
            
          </div>
        </form>

      </div>
    </section>
  </main>
<script>
    document.getElementById('atualiza-imagem').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('imagemPreview').src = URL.createObjectURL(file);
        }
    });
</script>
  <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>
</body>
</html>