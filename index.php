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
    <div id="banner">
        <div id="barra">
            <a id="top" href="view/cad_user.php">Cadastar</a>
            <a id="top" href="view/login_user.php">Entrar</a>
        </div>
        <img src="img/banner.jpg" alt="">
        <div id="texto-banner">
            <h1>Casa dos <br> Amores</h1>
            <p>Lar dos melhores doces do mundo!</p>
        </div>
    </div>

    <main id="menu">

        <h2>Menu</h2>
        <select id="filtrar">
            <option>🔍 Filtre...</option>
            <option value="bolo">🫖 Bolo</option>
            <option value="torta">🍵 Tortas</option>
            <option value="sorvete">🧁 Sorvete</option>
            <option value="doce">🍞 Doces</option>
        </select>


        <div class="opcoes">

            <!--BASE-->
            <article class="opcoes-caixa" data-categoria="cafe">
            <img src="img/perfil.png" alt="">
                <p>Americano</p>
                <p>Café</p>
                <p id="preco">R$8,50</p>
            </div>
            </article>
        
        </div>
</main>

    <footer>
        <p>Casa dos Amores</p>
        <p>Maria Luiza & Evelyn</p>
    </footer>












    <script>
        // Filtra os itens do menu
        document.getElementById('filtrar').addEventListener('change', function() {
            var categoriaSelecionada = this.value;
            var opcoesCaixa = document.querySelectorAll('.opcoes-caixa');

            opcoesCaixa.forEach(function(opcao) {
                if (categoriaSelecionada === 'bolo') {
                    if (opcao.getAttribute('data-categoria') === 'bolo') {
                        opcao.style.display = 'block';
                    } else {
                        opcao.style.display = 'none';
                    }
                } else if (categoriaSelecionada === 'torta') {
                    if (opcao.getAttribute('data-categoria') === 'torta') {
                        opcao.style.display = 'block';
                    } else {
                        opcao.style.display = 'none';
                    }
                } else if (categoriaSelecionada === 'sorvete') {
                    if (opcao.getAttribute('data-categoria') === 'sorvete') {
                        opcao.style.display = 'block';
                    } else {
                        opcao.style.display = 'none';
                    }
                } else if (categoriaSelecionada === 'doces') {
                    if (opcao.getAttribute('data-categoria') === 'doces') {
                        opcao.style.display = 'block';
                    } else {
                        opcao.style.display = 'none';
                    }
                } else {
                    opcao.style.display = 'block'; 
                }
            });
        });
    </script>
</body>

</html>