<?php
session_start();
require_once "../factory/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['codproduto'])) {
    
    $cod_produto = $_POST['codproduto'];
    $nome_produto = $_POST['cxnome'];
    $tipo_produto = $_POST['cxtipo'];
    $preco_produto = $_POST['cxvalor'];
    $nome_imagem = null;
    $conn = new Banco;

    // Lógica para upload e validação da nova imagem
    if (isset($_FILES["cximagem"]) && !empty($_FILES["cximagem"]["name"])) {
        $foto = $_FILES["cximagem"];
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
            move_uploaded_file($foto["tmp_name"], $caminho_imagem); 
        } else {
            $totalerro = "";
            foreach ($error as $err) {
                $totalerro .= $err . "\\n";
            }
            echo('<script>window.alert("' . $totalerro . '"); window.location.href="../view/editar_produto.php?id=' . $cod_produto . '";</script>');
            exit();
        }
    }

    // Prepara a query de atualização com ou sem a imagem
    if ($nome_imagem) {
        $query = "UPDATE tbproduto SET nome = :nome, tipo = :tipo, preco = :preco, imagem = :imagem WHERE codproduto = :id";
    } else {
        $query = "UPDATE tbproduto SET nome = :nome, tipo = :tipo, preco = :preco WHERE codproduto = :id";
    }
    
    $stmt = $conn->getConn()->prepare($query);
    $stmt->bindParam(':nome', $nome_produto, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo_produto, PDO::PARAM_STR);
    $stmt->bindParam(':preco', $preco_produto, PDO::PARAM_STR);
    $stmt->bindParam(':id', $cod_produto, PDO::PARAM_INT);
    
    // Vincula a imagem apenas se uma nova foi enviada
    if ($nome_imagem) {
        $stmt->bindParam(':imagem', $nome_imagem, PDO::PARAM_STR);
    }

    if ($stmt->execute()) {
        header("Location: ../view/perfil_ven.php");
        exit();
    } else {
        echo "Erro ao atualizar o produto.";
    }
} else {
    echo "Método de requisição inválido ou dados incompletos.";
}
?>