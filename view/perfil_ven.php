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
    <nav>
        <a id="top" href="">Novo Produto</a>
        <a id="top" href="../index.php">Home</a>
    </nav>

    <main>
        <p id="nome"></p>
        <img src="../img/perfil.png" alt="">
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