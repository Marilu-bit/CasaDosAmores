<?php
    require_once "../factory/conexao.php";
    if($_POST['cxnome']!=""){
        $conn = new Banco;
        $query = "insert into tbuser (nome,senha,imagem,pro_salvo) values (:nome,:senha,:imagem,:pro_salvo)";

        $foto = $_FILES["cxfoto"];  
        if (!empty($foto["name"])) { // Verifica se um arquivo foi enviado, e se o campo nome não  está vazio através da condição "empty".  
            $largura = 1500; // Define a largura máxima permitida  para a imagem. 
            $altura = 1800; // Define a altura máxima permitida para  a imagem. 
            $tamanho = 2048000; // Define o tamanho máximo permitido  para a imagem, em bytes. 
            $error = array(); // : Cria um array para armazenar  possíveis erros encontrados durante o processo de validação da imagem. 
            if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/",  
            $foto["type"])){ 
                // Verifica se o tipo de arquivo enviado é uma imagem  válida (JPEG, PNG, GIF ou BMP).
                $error[0] = "Isso não é uma imagem."; // Define a mensagem de erro "Isso não é uma imagem." no índice 0 do array $error  caso o tipo de arquivo não seja uma imagem válido. 
            }  
            $dimensoes = getimagesize($foto["tmp_name"]); // Obtém as  dimensões (largura e altura) da imagem enviada. 
            if($dimensoes[0] > $largura) { // Verifica se a largura da imagem excede a largura  máxima permitida. 
                $error[1] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; // Define a mensagem de erro "A largura da imagem  não deve ultrapassar [largura] pixels" no índice 1 do array $error } 
                if($dimensoes[1] > $altura) { // Verifica se a altura da imagem excede a altura máxima  permitida. 
                    $error[2] = "Altura da imagem não deve ultrapassar  ".$altura." pixels"; // Define a mensagem de erro "Altura da imagem não  deve ultrapassar [altura] pixels" no índice 2 do array $error. } 
                    if($foto["size"] > $tamanho) { // Verifica se o tamanho do arquivo excede o tamanho  máximo permitido. 
                        $error[3] = "A imagem deve ter no máximo ".$tamanho." bytes"; // Define a mensagem de erro "A imagem deve ter no máximo  [tamanho] bytes" no índice 3 do array $error. 
                    } if (count($error) == 0) { // Verifica se não houve erros durante a validação da  imagem. 
                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",  
                        $foto["name"], $ext); // Extrai a extensão do nome do arquivo usando uma  expressão regular e armazena-a na variável $ext. 
                        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];  
                        // Gera um nome único para a imagem usando o tempo atual e a extensão  extraída, e o armazena na variável $nome_imagem.
                        $caminho_imagem = "../fotos/" . $nome_imagem; //  Define o caminho onde a imagem será salva, concatenando o diretório  "fotos/" com o nome da imagem. 
                        move_uploaded_file($foto["tmp_name"],  
                        $caminho_imagem); // Move o arquivo enviado para o caminho especificado. 
                    }}}}

        $cadastrar=$conn->getConn()->prepare($query);
        $cadastrar->bindParam(':nome',$_POST['cxnome'],PDO::PARAM_STR);
        $cadastrar->bindParam(':setor',$_POST['cxsenha'],PDO::PARAM_STR);
        $cadastrar->bindParam(':pro_salvo',$_POST['cxpro_salvo'],PDO::PARAM_STR);

    
        $cadastrar->execute();

        if($cadastrar->rowcount()){
            echo"<scipt>alert('Cadastrado com sucesso!);
            window.location.href='../view/login.php'
            </script>"
        }else{
            echo"<scipt>alert('Algo deu errado!);
            window.location.href='../view/cadastro.php'
            </script>"
        }
    }else{
        echo "Dados incompletos.";
    }


?>