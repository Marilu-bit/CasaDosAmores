<?php
session_start();
include_once "../factory/conexao.php";
$cod = $_POST["cxcod"];
$conn = new Banco;
$buscar = "select *from tbuser where coduser='$cod'";

$resultado = $conn->getConn()->prepare($buscar);
$resultado->execute();

if($resultado->rowcount()>0){
    $user = $resultado->fetch(PDO::FETCH_ASSOC);

    $_SESSION['codigo_user'] = $user['coduser'];
    $_SESSION['nome_user'] = $user['nome'];
    $_SESSION['senha_user'] = $user['senha'];
    $_SESSION['imagem_user'] = $user['imagem'];
    $_SESSION['produto_user'] = $user['pro_salvo'];

    echo "<script> window.location.href='../view/perfil_ven.php';</script>" ;
} else{
    echo "<script> alert('Funcionario não encontrado. Realize o cadastro.'); 
    window.location.href='../view/cad_user.php';</script> ";
}
?>