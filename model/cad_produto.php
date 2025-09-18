<?php
session_start();
require_once "../factory/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CadastrarProduto'])) {
    
    $nome_produto = $_POST['cxnome'];
    $tipo_produto = $_POST['cxtipo'];
    $preco_produto = $_POST['cxvalor'];
    $quantidade = $_POST['cxqtd'];
    $cod_user = $_SESSION['codigo_user']; 
    $nome_imagem = null;
    $conn = new Banco;

    // Lógica para upload e validação da imagem
    if (isset($_FILES["cxfoto"]) && !empty($_FILES["cxfoto"]["name"])) {
        $foto = $_FILES["cxfoto"];
        $largura = 1500;  
        $altura = 1800;
        $tamanho = 2048000; 
        $error = array(); 

        if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])){ 
            $error[0] = "Isso não é uma imagem."; 
        }  

        $dimensoes = getimagesize($foto["tmp_name"]); 
        if($dimensoes[0] > $largura) { 
            $error[1] = "A largura da imagem não deve ultrapassar ".$largura." pixels."; 
        }
        if($dimensoes[1] > $altura) { 
            $error[2] = "A altura da imagem não deve ultrapassar ".$altura." pixels."; 
        }
        if($foto["size"] > $tamanho) { 
            $error[3] = "A imagem deve ter no máximo ".$tamanho." bytes."; 
        }

        if (count($error) == 0) { 
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];  
            $caminho_imagem = "../img/" . $nome_imagem; 
            
            if (move_uploaded_file($foto["tmp_name"], $caminho_imagem)) {
                 // A imagem foi movida com sucesso
            } else {
                 echo('<script>window.alert("Erro ao mover a imagem para o diretório de destino."); window.location.href="../view/cad_pro.php";</script>');
                 exit();
            }

        } else {
            $totalerro = "";
            foreach ($error as $err) {
                $totalerro .= $err . "\\n";
            }
            echo('<script>window.alert("' . $totalerro . '"); window.location.href="../view/cad_pro.php";</script>');
            exit();
        }
    }

    // Prepara a query de inserção
    $query = "INSERT INTO tbproduto (nome, tipo, preco, quantidade, imagem, coduser) VALUES (:nome, :tipo, :preco, :quantidade, :imagem, :coduser)";
    
    $stmt = $conn->getConn()->prepare($query);
    $stmt->bindParam(':nome', $nome_produto, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo_produto, PDO::PARAM_STR);
    $stmt->bindParam(':preco', $preco_produto, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
    $stmt->bindParam(':imagem', $nome_imagem, PDO::PARAM_STR);
    $stmt->bindParam(':coduser', $cod_user, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header("Location: ../view/perfil_ven.php");
        exit();
    } else {
        echo "Erro ao cadastrar o produto.";
    }
} else {
    echo "Método de requisição inválido ou dados incompletos.";
}
?>