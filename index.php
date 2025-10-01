<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#B1E5E2">
    <title>Casa dos Amores</title>
</head>
<body>
<?php
    require_once "factory/conexao.php";
    
    $conn = new Banco;
    
    // Consulta para buscar todos os produtos
    $query = "SELECT * FROM tbproduto ORDER BY codproduto DESC";
    $stmt = $conn->getConn()->prepare($query);
    $stmt->execute();
    
    $todos_produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

    <div id="banner">
        <div id="barra">
            <a id="top" href="view/cad_user.php">Cadastrar</a>
            <a id="top" href="view/login_user.php">Entrar</a>
        </div>
        <img src="img/padrao/banner.jpg" alt="">
        <div id="texto-banner">
            <h1>Casa dos <br> Amores</h1>
            <p>Lar dos melhores doces do mundo!</p>
        </div>
    </div>

    <main id="menu">

        <h2>Menu</h2>
        <select id="filtrar">
            <option>Filtre...</option>
            <option value="bolo">Bolo</option>
            <option value="torta">Tortas</option>
            <option value="sorvete">Sorvete</option>
            <option value="doce">Doces</option>
        </select>


        <div class="opcoes">

        <div class="content_grid">
    <?php
        if (count($todos_produtos) > 0) {
            foreach ($todos_produtos as $produto) {
    ?>
    <div class="card" data-categoria="<?php echo htmlspecialchars($produto['tipo']); ?>">
        <img src="img/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
        <div class="card_content">
            <h2 class="card_title"><?php echo htmlspecialchars($produto['nome']); ?></h2>
            <p class="card_text"><?php echo htmlspecialchars($produto['tipo']); ?></p>
            <p class="card_text">R$ <?php echo htmlspecialchars(number_format((float)$produto['preco'], 2, ',', '.')); ?></p>
            <a href="#" class="card_button">Comprar</a>
        </div>
    </div>
    <?php
            }
        } else {
            echo "<p>Nenhum produto cadastrado no momento.</p>";
        }
    ?>
</div>


        
        </div>
</main>

    <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>

    <script>
        document.getElementById('filtrar').addEventListener('change', function() {
            var categoriaSelecionada = this.value;
            var cards = document.querySelectorAll('.card');

            cards.forEach(function(card) {
                if (categoriaSelecionada === 'bolo' || categoriaSelecionada === 'torta' || categoriaSelecionada === 'sorvete' || categoriaSelecionada === 'doce') {
                    if (card.getAttribute('data-categoria') === categoriaSelecionada) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                } else {
                    card.style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>