<?php
session_start();
include("util/connecttion.php");

$total = 0;
?>
<meta charset="utf-8">
	<title>Carrinho de Compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate (2).css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon (2).css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap (2).css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup (2).css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min (2).css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style (2).css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<!DOCTYPE HTML>
<html>
	<body>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"> <img src="images/logoo.png ">  <a href="index.php"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="comidas.php">Voltar</a></li>
											<li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
											<li><a href="index.php"> Sair </a></li>							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/churrasco.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Minha Lista de Pedidos</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span><span>Carrinho de compras</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="text-center">
								<center><h3>Carrinho de compras</h3></center>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Detalhes dos produtos</span>
							</div>
							<div class="one-eight text-center">
								<span>Preço</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantidade</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							
						</div>
						<?php
						$query = mysqli_query($conn, "SELECT * FROM carrinho");

						$quant=mysqli_num_rows($query);
						for($i=0; $i<$quant; $i++ ){
							$fetch=mysqli_fetch_row($query);

							$query2 = mysqli_query($conn, "SELECT * FROM produtos WHERE idproduto=$fetch[0]");
							$row = mysqli_fetch_assoc($query2);
							$total = $total+$row['preco'];
						?>
						<div class="product-name">
							<div class="one-forth text-center">
							<span><?php echo '<img src="data:image/png;base64,' . base64_encode($row['img']) . '" width="50" height="50"/>'; ?></span>
								<span> <?php echo $row['nome'] ?></span>
							</div>
							<div class="one-eight text-center">
								<span><?php echo $row['preco'] ?></span>
							</div>
							<div class="one-eight text-center">
								<span><?php echo $fetch[2] ?></span>
							</div>
							<div class="one-eight text-center">
								<span><?php echo $fetch[2] ?></span>
							</div>
							<div class="one-eight text-center">
								<span></span>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
										</div>
									</form>
								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="grand-total">
										<p><span><strong>Total de Pedidos:</strong></span> <span><?php echo $quant ?></span></p>
											<p><span><strong>Valor-Total:</strong></span> <span>Kzs <?php echo $total ?></span></p>
										</div>
									</div>
									<p><a  href="login.php" class="btn btn-primary"   style="opacity: 0.5;filter: alpha(opacity=50)"> Confirmar </a disabled></p>							
										</div>
									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<span class="block">
								Desenvolvido &copy;
								<script>document.write(new Date().getFullYear());</script> 
								Todos os direitos reservados by 
								<a href="#" target="_blank">Grupo 1</a>
							</span> 
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	</body>
</html>
<?php
include("util/connecttion.php");

$total = 0;
?>