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
        <h3>Atualizar imagem</h3>
        <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
          <img src="ovendedor.png" alt="preview" style="width:100%;border-radius:12px;object-fit:cover">
          <input type="file" id="atualiza-imagem" accept="image/*">
        </div>
      </div>

      <div class="form-card" style="flex:1;min-width:280px;">
        <h3>Dados do produto</h3>

        <form class="form-campos" onsubmit="event.preventDefault(); alert('Alterações salvas')">
          <div class="campo">
            <label for="nome-produto">Nome</label>
            <input id="nome-produto" type="text" value="Rosquinha Doce">
          </div>

          <div class="campo">
            <label for="tipo-produto">Selecione um tipo</label>
            <select id="tipo-produto">
              <option>Rosquinha</option>
              <option>Torta</option>
              <option>Bolo</option>
            </select>
          </div>

          <div class="campo">
            <label for="valor-produto">Valor (R$)</label>
            <input id="valor-produto" type="number" step="0.01" value="15.99">
          </div>

          <div class="area-botoes">
            <button class="btn-cancelar" type="button" onclick="history.back()">Cancelar</button>
            <button class="btn-salvar" type="submit" href="perfil_ven.php" >Salvar</button>
          </div>
        </form>

      </div>
    </section>
  </main>

  <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>
</body>