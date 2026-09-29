<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomeerce2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario (idusuario, nome_usuario, senha_usuario, email_usuario) VALUES (?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("isss", $idusuario, $nome_usuario, $senha_usuario, $email_usuario);

    $idusuario = 1;
     $nome_usuario = "John";
      $senha_usuario = "password123";
       $email_usuario = "john@example.com";
        $stmt->execute();
    $idusuario = 2;
     $nome_usuario = "Mary";
      $senha_usuario = "password456";
       $email_usuario = "mary@example.com";
        $stmt->execute();
    $idusuario = 3; 
     $nome_usuario = "Julie";
      $senha_usuario = "password789"; 
      $email_usuario = "julie@example.com";
       $stmt->execute();
    
    echo "Usuários criados com sucesso!<br>";
    $stmt->close();
} else {
    echo "Erro (Usuario): " . $conn->error . "<br>";
}

$sql = "INSERT INTO pedido (idpedido, data_pedido, valor_total_pedido, forma_pagamento) VALUES (?, ?, ?, ?)";
if($stmt = $conn->prepare($sql)) {
  
    $stmt->bind_param("isds", $idpedido, $data_pedido, $valor_total_pedido, $forma_pagamento);

    $idpedido = 1; $data_pedido = "2023-01-01";
     $valor_total_pedido = 100.00;
      $forma_pagamento = "john@example.com";
       $stmt->execute();
    $idpedido = 2;
     $data_pedido = "2023-01-02";
      $valor_total_pedido = 200.00; 
      $forma_pagamento = "mary@example.com";
       $stmt->execute();
    $idpedido = 3;
     $data_pedido = "2023-01-03"; 
     $valor_total_pedido = 300.00;
      $forma_pagamento = "julie@example.com";
       $stmt->execute(); 
    
    echo "Pedidos criados com sucesso!<br>";
    $stmt->close();
} else {
    echo "Erro (Pedido): " . $conn->error . "<br>";
}


$sql = "INSERT INTO produto (idproduto, nome_produto, preco_produto, foto_produto) VALUES (?, ?, ?, ?)";
if($stmt = $conn->prepare($sql)) {
   
    $stmt->bind_param("isds", $idproduto, $nome_produto, $preco_produto, $foto_produto);

    $idproduto = 1; $nome_produto = "Produto 1"; $preco_produto = 100.00; $foto_produto = ""; $stmt->execute();
    $idproduto = 2; $nome_produto = "Produto 2"; $preco_produto = 200.00; $foto_produto = ""; $stmt->execute();
    $idproduto = 3; $nome_produto = "Produto 3"; $preco_produto = 300.00; $foto_produto = ""; $stmt->execute();
    
    echo "Produtos criados com sucesso!<br>";
    $stmt->close();
} else {
    echo "Erro (Produto): " . $conn->error . "<br>";
}


$sql = "INSERT INTO contem (pedido_idpedido, produto_idproduto, quantidade_contem) VALUES (?, ?, ?)";
if($stmt = $conn->prepare($sql)) {
    
    $stmt->bind_param("iii", $pedido_idpedido, $produto_idproduto, $quantidade_contem);

    $pedido_idpedido = 1; $produto_idproduto = 1; $quantidade_contem = 2; $stmt->execute();
    $pedido_idpedido = 2; $produto_idproduto = 2; $quantidade_contem = 3; $stmt->execute();
    $pedido_idpedido = 3; $produto_idproduto = 3; $quantidade_contem = 1; $stmt->execute();
    
    echo "Tabela contem atualizada com sucesso!<br>";
    $stmt->close();
} else {
    echo "Erro (Contem): " . $conn->error . "<br>";
}

$conn->close(); 
?>