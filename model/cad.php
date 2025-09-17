<?php
    require_once "../factory/conexao.php";

    if (isset($_POST['Cadastrar'])) {
        $conn = new Banco;
        $nome_imagem = null; // Inicializa a variável com null

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
                move_uploaded_file($foto["tmp_name"], $caminho_imagem); 
            } else {
                $totalerro = "";
                foreach ($error as $err) {
                    $totalerro .= $err . "\\n";
                }
                echo('<script>window.alert("' . $totalerro . '"); window.location.href="../view/cad_user.php";</script>');
                exit();
            }
        }
        
        $senha_hash = password_hash($_POST['cxsenha'], PASSWORD_DEFAULT);

        $query = "insert into tbuser (nome,senha,imagem) values (:nome, :senha, :nome_imagem)";
        $cadastrar = $conn->getConn()->prepare($query);
        $cadastrar->bindParam(':nome', $_POST['cxnome'], PDO::PARAM_STR);
        $cadastrar->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $cadastrar->bindParam(':nome_imagem', $nome_imagem, PDO::PARAM_STR);

        if($cadastrar->execute()){
            echo ('<script>
            alert("Cadastrado com sucesso!");
            window.location.href="../view/perfil_ven.php";
            </script>');
        }else{
            echo('<script>
            alert("Algo deu errado!");
            window.location.href="../view/cad_user.php";
            </script>');
        }
    } else {
        echo "Dados incompletos.";
    }
?>