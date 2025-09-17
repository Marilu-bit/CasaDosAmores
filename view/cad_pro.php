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
                <div class="input-group-image">
                    <label for="imagem" class="image-label">
                        Fazer upload da imagem
                        <input type="file" id="imagem" class="input-file">
                    </label>
                </div>
                <div class="input-group">
                    <label for="nome" class="label">Nome</label>
                    <input type="text" id="nome" class="input">
                </div>
                <div class="input-group">
                    <label for="tipo" class="label">Selecione um tipo</label>
                    <select id="tipo" class="input">
                        <option value="">Selecione...</option>
                        </select>
                </div>
                <div class="input-group">
                    <label for="valor" class="label">Valor</label>
                    <input type="text" id="valor" class="input">
                </div>
                <div class="button-group">
                    <button class="save-button">Salvar</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
