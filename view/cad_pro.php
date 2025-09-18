<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
    <link rel="stylesheet" href="../css/pro_novo.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Novo Produto</h1>
            <a href="#" class="home-link">Home</a>
        </header>

        <main class="content">
    <section class="form-section">
        <form action="../model/cad_produto.php" method="POST" enctype="multipart/form-data">
            <div class="input-group-image">
                <img id="imagemPreview" src="../img/perfil.png" alt="Pré-visualização da imagem" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; border: 2px solid #ddd;">
                <label for="imagem" class="image-label">
                    Fazer upload da imagem
                    <input type="file" id="imagem" name="cxfoto" class="input-file" accept="image/*">
                </label>
            </div>
            <div class="input-group">
                <label for="nome" class="label">Nome</label>
                <input type="text" id="nome" name="cxnome" class="input">
            </div>
            <div class="input-group">
                <label for="tipo" class="label">Selecione um tipo</label>
                <select id="tipo" name="cxtipo" class="input">
                    <option value="">Selecione...</option>
                    <option value="doce">Doce</option>
                    <option value="bolo">Bolo</option>
                    <option value="torta">Torta</option>
                    <option value="sorvete">Sorvete</option>
                </select>
            </div>
            <div class="input-group">
                <label for="quantidade" class="label">Quantidade</label>
                <input type="number" id="quantidade" name="cxqtd" class="input" value="1" min="1">
            </div>
            <div class="input-group">
                <label for="valor" class="label">Valor</label>
                <input type="text" id="valor" name="cxvalor" class="input">
            </div>
            <div class="button-group">
                <button class="save-button" type="submit" name="CadastrarProduto">Salvar</button>
            </div>
        </form>
    </section>
</main>
<script>
    document.getElementById('imagem').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('imagemPreview').src = URL.createObjectURL(file);
        }
    });
</script>
</body>
</html>