<?php
include("util/connecttion.php");
$product="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Comidas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/zerogrid.css" type="text/css" media="all">
<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Forum_400.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script> 
 <script type="text/javascript" src="js/css3-mediaqueries.js"></script>

</head>
<body id="page2">
<div class="body6">
	<div class="body1">
		<div class="main zerogrid">
<!-- cabeçalho -->
			<header>
				<h1><a href="index.html" id="logo"><!--<img src="#"/>--></a></h1>
				<nav>
					<ul id="top_nav">
						
						<li class="end"><a href="#"><img src="images/call.png" alt=""></a></li>
					</ul>
				</nav>
				<nav>
					<ul id="menu">
						<li><a href="index.php">Restaurante</a></li>
						<li class="active"><a href="comidas.php">Comidas</a></li>
						<li><a href="bebidas.php">Bebidas</a></li>
						<li class=""><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
										
						
					</ul>
				</nav>
			</header>
<!-- / header -->
<!-- content -->
			<article id="content">
				<div class="wrap">
				<!-- Button trigger modal -->
					<?php
					
					$query="SELECT * FROM produtos WHERE tipo='Comida'";
					$success=mysqli_query($conn, $query);

					if($success){
						$quant=mysqli_num_rows($success);
                   
					for($i=0; $i<$quant; $i++ ){
						$fetch=mysqli_fetch_row($success);
					?>
					<section class="col-1-3"><div class="wrap-col">
						<div class="box">
							<div>
								<center><h2><?php echo "$fetch[0]"?></span></h2></center>
								<figure><?php echo '<img src="data:image/png;base64,' . base64_encode($fetch[1]) . '" />'; ?></figure>
								<p class="pad_bot1"><?php echo "$fetch[3]"?></p>
						      <center> <h2 ><?php echo "$fetch[2]Kzs"?></h2></center>
							  <form method="GET" action="">
							  
							<center><a class="button1" href="../job/Controller/addCarrinho.php?produto=<?php echo $fetch[5] ?>">Adiciona na Lista</a></center>
							  </form> 
								

							</div>
						</div>
					</div></section>
					<?php
					}
				}
				?>

				
				</div>
				</div>
				</div>
				
				<article id="content">
					
			</article>
		</div>
	</div>
</div>


<div class="body3">

	<div class="main zerogrid">
<!-- footer -->
		<footer>
			<div class="wrapper">
				<section class="col-2-3"><div class="wrap-col">
					<h3>Reservas: <span>+244 222 222 000</span></h3>
					Construído pelo: Grupo-1
				</div></section>
				<section class="col-1-3"><div class="wrap-col">
					<h3>Siga-nos </h3>
					<ul id="icons">
						<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon2.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon3.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Delicious"><img src="images/icon4.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Technorati"><img src="images/icon5.gif" alt=""></a></li>
					</ul>
				</div></section>
			</div>
			
		</footer>
<!-- / footer -->
	</div>

</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

<?php
if(isset($_POST["enviar"])){
	echo "resultouuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";
	echo '<script type="text/javascript">alert("Dados foram submetidos ");</script>';
}
?>