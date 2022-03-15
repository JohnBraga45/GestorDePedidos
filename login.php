<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form input[type="submit"] {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
</head>
<body>

<div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>PEDIDO</h3>
            <p>Insira os dados para a confirmação do seu pedido</p>
          </div>
        </div>
        <form method="POST">
          <input type="text" placeholder="Nome do Cliente" name="client" required/>
          <input type="text" placeholder="Nº da mesa" name="mesa" required/>
          <input type="submit" value="Confirmar" name="confirm"/>
          <p class="message"> <a href="cart.php">Voltar</a></p>
        </form>
      </div>
    </div>

</body>
</html>
<?php
include("util/connecttion.php");

if(isset($_POST['confirm'])){
	$clientName = $_POST['client'];
	$table = $_POST['mesa'];
	$total = 0;
	$list = "";
	$stmt = "INSERT INTO cliente(nome) VALUES('$clientName')";
	$sucess = mysqli_query($conn, $stmt);

	if($sucess){
		$client = mysqli_query($conn, "SELECT * FROM cliente WHERE nome='$clientName'");
		if($client){
			$row = mysqli_fetch_assoc($client);
			$query = mysqli_query($conn, "SELECT * FROM carrinho");
			$quant=mysqli_num_rows($query);

			for($i=0; $i<$quant; $i++ ){
				$fetch=mysqli_fetch_row($query);
				$query2 = mysqli_query($conn, "SELECT * FROM produtos WHERE idproduto=$fetch[0]");
				$row2 = mysqli_fetch_assoc($query2);
				$total = $total+$row2['preco'];
				$product = $row2['nome'];
				$list = "$list, $product";
			}
			$id = $row['idcliente'];
			$stmt = mysqli_prepare($conn, "INSERT INTO pedidos(mesa, valortotal, idcliente, produtos) VALUES($table, $total, $id, '$list');");			$stmt->execute();

			$stmt = mysqli_prepare($conn, "DELETE FROM carrinho");
			$stmt->execute();

			$query3 = mysqli_query($conn, "SELECT * FROM pedidos WHERE valortotal=$total");
			$row3 = mysqli_fetch_assoc($query3);
			echo '<script type="text/javascript">alert("Este é o pedido '.$row3["idpedido"].', o mesmo está em Andamento");</script>';
		}
	}else{
		print('error');
	}
}
?>