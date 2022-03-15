<?php

/**
 * Arquivo que vai adicionar todos os produtos selecionados pelo cliente no carrinho;
 * Primeiramente é verificado se o cliente está logado;
 * Caso esteja, recuperamos o cpf do usuario logado, e armazenamos as infomações do produto selecionado no banco
 */

session_start();
include("../util/connecttion.php");


    $produto = $_GET['produto'];
    
        $stmt = mysqli_prepare($conn, "INSERT INTO carrinho( idproduto, quantidade) VALUES($produto, 1);");
        $stmt->execute();
        $stmt = null;    
        echo '<script type="text/javascript">alert("Adicionado ao carrinho");</script>';
        header('Location: ../comidas.php'); 
?>