<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomeerce2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// SQL query template
$sql = "INSERT INTO produto (idproduto, nome_produto, preco_produto, foto_produto) VALUES (?, ?, ?, ?)";

// Prepare the SQL query template
if($stmt = $conn->prepare($sql)) {
  // Bind parameters
  $stmt->bind_param("sss", $idproduto, $nome_produto, $preco_produto, $foto_produto);

  // Set parameters and execute
  $idproduto = 1;
  $nome_produto = "Produto 1";
  $preco_produto = 100.00;
  $foto_produto = "foto1.jpg";
  $stmt->execute();

  $idproduto = 2;
  $nome_produto = "Produto 2";
  $preco_produto = 200.00;
  $foto_produto = "foto2.jpg";
  $stmt->execute();
  $descricao_produto = "Descrição do Produto 2";
  $stmt->execute();

  $idproduto = 3;
  $nome_produto = "Produto 3";
  $preco_produto = 300.00;
  $foto_produto = "foto3.jpg";
  $stmt->execute();
 
  echo "Sucesso!";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close(); 
?>
