<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
	<title>Client</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="style.css">
	
	
</head>
<body class="js">
	
	<?php
	$conn = mysqli_connect("localhost","root","","danguitar");
	mysqli_query($conn,"SET danguitar 'utf8'");
	$sql = "select * from tbl_users";
	$kq = mysqli_query($conn,$sql);
	$num_rows = mysqli_num_rows($kq);


	$rs = mysqli_fetch_array($kq);
                //tạo chuỗi sql
	$sql1 = "SELECT * FROM tbl_category";
                //Thực hiện query truy vấn
	$kq1=mysqli_query($conn,$sql1);


	$rs = mysqli_fetch_array($kq);
                //tạo chuỗi sql
	$sql2 = "SELECT * FROM tbl_product";
                //Thực hiện query truy vấn
	$kq2=mysqli_query($conn,$sql2);
	?>


	<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "danguitar";
	$con = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()){
		echo "Connection Fail: ".mysqli_connect_errno();exit;
	}
	$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($con, "SELECT * FROM `tbl_product` ORDER BY `pro_id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
        $totalRecords = mysqli_query($con, "SELECT * FROM `tbl_product`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        ?>




        <!-- Preloader -->
        <div class="preloader">
        	<div class="preloader-inner">
        		<div class="preloader-icon">
        			<span></span>
        			<span></span>
        		</div>
        	</div>
        </div>
        <!-- End Preloader -->


        <!-- Header -->
        <header class="header shop">
        	<!-- Topbar -->
        	<div class="topbar">
        		<div class="container">
        			<div class="row">
        				<div class="col-lg-5 col-md-12 col-12">
        					<!-- Top Left -->
        					<div class="top-left">
        						<ul class="list-main">
        							<li><i class="ti-headphone-alt"></i> +84 0702009986</li>
        							<li><i class="ti-email"></i> duchieulp@gmail.com</li>
        						</ul>
        					</div>
        					<!--/ End Top Left -->
        				</div>
        				<div class="col-lg-7 col-md-12 col-12">
        					<!-- Top Right -->
        					<div class="right-content">
        						<ul class="list-main">
        							<li><i class="ti-location-pin"></i> Nam Định</li>
        							<li><i class="ti-alarm-clock"></i> <a href="#">7AM-10PM</a></li>
        							<?php
        							session_start();
        							if (isset($_SESSION['test'])==$rs[0]) {?>
        								<li>
        									<i class="ti-user" aria-hidden="true"></i>
        									<a href="#">
        										<?php echo $_SESSION['test'] ?></a>
        									</li>
        									<li>
        										<i class="ti-power-offr" aria-hidden="true"></i>
        										<a href="?controller=logout" style="color: #fff">
        											<a href="../../Controller/client/logout.php#">Logout</a>
        										</a>

        									</li>
        								<?php } else {?>
        									<li>
        										<i class="ti-power-off" aria-hidden="true"></i>
        										<a href="logup.php#">Logup</a>

        									</li>
        									<li>
        										<i class="ti-power-off" aria-hidden="true"></i><a href="login.php#">Login</a>

        									</li>
        								<?php }
        								?>
        							</li>
        						</ul>
        					</div>
        					<!-- End Top Right -->
        				</div>
        			</div>
        		</div>
        	</div>
        	<!-- End Topbar -->
        	<div class="middle-inner">
        		<div class="container">
        			<div class="row">
        				<div class="col-lg-2 col-md-2 col-12">
        					<!-- Logo -->
        					<div class="logo">
        						<a href="index.php"><img src="images/logo.png" alt="logo"></a>
        					</div>
        					<!--/ End Logo -->
        					<!-- Search Form -->
        					<div class="search-top">
        						<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
        						<!-- Search Form -->
        						<div class="search-top">
        							<form class="search-form">
        								<input type="text" placeholder="Search here..." name="search">
        								<button value="search" type="submit"><i class="ti-search"></i></button>
        							</form>
        						</div>
        						<!--/ End Search Form -->
        					</div>
        					<!--/ End Search Form -->
        					<div class="mobile-nav"></div>
        				</div>
        				<div class="col-lg-8 col-md-7 col-12">
        					<div class="search-bar-top">
        						<div class="search-bar">
        							<select>
        								<option selected="selected">All Category</option>
        								<option>watch</option>
        								<option>mobile</option>
        								<option>kid’s item</option>
        							</select>
        							<form>
        								<input name="search" placeholder="Search Products Here....." type="search">
        								<button class="btnn"><i class="ti-search"></i></button>
        							</form>
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-2 col-md-3 col-12">
        					<div class="right-bar">
        						<!-- Search Form -->
        						<div class="sinlge-bar">
        							<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
        						</div>
        						<div class="sinlge-bar">
        							<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
        						</div>
        						<div class="sinlge-bar shopping">
        							<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
        							<!-- Shopping Item -->
        							<div class="shopping-item">
        								<div class="dropdown-cart-header">
        									<span>2 Items</span>
        									<a href="#">View Cart</a>
        								</div>
        								<ul class="shopping-list">
        									<li>
        										<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
        										<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
        										<h4><a href="#">Woman Ring</a></h4>
        										<p class="quantity">1x - <span class="amount">$99.00</span></p>
        									</li>
        									<li>
        										<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
        										<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
        										<h4><a href="#">Woman Necklace</a></h4>
        										<p class="quantity">1x - <span class="amount">$35.00</span></p>
        									</li>
        								</ul>
        								<div class="bottom">
        									<div class="total">
        										<span>Total</span>
        										<span class="total-amount">$134.00</span>
        									</div>
        									<a href="checkout.php" class="btn animate">Checkout</a>
        								</div>
        							</div>
        							<!--/ End Shopping Item -->
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<!-- Header Inner -->
        	<div class="header-inner">
        		<div class="container">
        			<div class="cat-nav-head">
        				<div class="row">
        					<div class="col-lg-3">
        						<div class="all-category">
        							<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Menu</h3>
        							<ul class="main-category">
        								<?php
        								$j=0;
        								while(($row1 = mysqli_fetch_array($kq1))&&($j<10))
        								{   $j++;
        									?>
        									<li>
        										<a href="">
        											<?php
        											echo $row1['cat_name'];
        											?>
        										</a>
        									</li>
        									<?php           
        								}
        								?>
        							</ul>
        						</div>
        					</div>
        					<div class="col-lg-9 col-12">
        						<div class="menu-area">
        							<!-- Main Menu -->
        							<nav class="navbar navbar-expand-lg">
        								<div class="navbar-collapse">	
        									<div class="nav-inner">	
        										<ul class="nav main-menu menu navbar-nav">
        											<li class="active"><a href="index.php#">Home</a></li>
        											<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
        												<ul class="dropdown">
        													<li><a href="cart.php">Cart</a></li>
        													<li><a href="checkout.php">Checkout</a></li>
        												</ul>
        											</li>
        											<li><a href="#">Blog<i class="ti-angle-down"></i></a>
        												<ul class="dropdown">
        													<li><a href="blog-single-sidebar.php">Blog Single Sidebar</a></li>
        												</ul>
        											</li>
        											<li><a href="contact.php">Contact Us</a></li>
        										</ul>
        									</div>
        								</div>
        							</nav>
        							<!--/ End Main Menu -->	
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<!--/ End Header Inner -->
        </header>
        <!--/ End Header -->

        <!-- Slider Area -->
        <section class="hero-slider">
        	<!-- Single Slider -->
        	<div class="single-slider" style="background-image: url(../../anh/6.png);">
        		
        		<div class="container">
        			<div class="row no-gutters">
        				<div class="col-lg-9 offset-lg-3 col-12">
        					<div class="text-inner">
        						<div class="row">
        							<div class="col-lg-7 col-12">
        								<div class="hero-text">

        									<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
        									<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
        									<div class="button">
        										<a href="#" class="btn">Shop Now!</a>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<!--/ End Single Slider -->
        </section>
        <!--/ End Slider Area -->

        <!-- Start Small Banner  -->
        <section class="small-banner section">
        	<div class="container-fluid">
        		<div class="row">
        			<!-- Single Banner  -->
        			<div class="col-lg-4 col-md-6 col-12">
        				<div class="single-banner">
        					<img src="../../anh/4.png"  alt="#">
        					<div class="content">
        						<p>Man's Collectons</p>
        						<h3>Summer travel <br> collection</h3>
        						<a href="#">Discover Now</a>
        					</div>
        				</div>
        			</div>
        			<!-- /End Single Banner  -->
        			<!-- Single Banner  -->
        			<div class="col-lg-4 col-md-6 col-12">
        				<div class="single-banner">
        					<img src="../../anh/5.png"  alt="#">
        					<div class="content">
        						<p>Bag Collectons</p>
        						<h3>Awesome Bag <br> 2020</h3>
        						<a href="#">Shop Now</a>
        					</div>
        				</div>
        			</div>
        			<!-- /End Single Banner  -->
        			<!-- Single Banner  -->
        			<div class="col-lg-4 col-12">
        				<div class="single-banner tab-height">
        					<img src="../../anh/4.png" alt="#">
        					<div class="content">
        						<p>Flash Sale</p>
        						<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
        						<a href="#">Discover Now</a>
        					</div>
        				</div>
        			</div>
        			<!-- /End Single Banner  -->
        		</div>
        	</div>
        </section>
        <!-- End Small Banner -->

        <!-- Start Product Area -->
        <div class="product-area section">
        	<div class="container">
        		<div class="row">
        			<div class="col-12">
        				<div class="section-title">
        					<h2>Sản Phẩm</h2>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-12">
        				<div class="product-info">
        					<div class="nav-main">
        						<!-- Tab Nav -->
        						<ul class="nav nav-tabs" id="myTab" role="tablist">
        							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Man</a></li>
        							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Woman</a></li>
        							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
        							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>
        							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential" role="tab">Essential</a></li>
        							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prices" role="tab">Prices</a></li>
        						</ul>
        						<!--/ End Tab Nav -->
        					</div>
        					<div class="tab-content" id="myTabContent">
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade show active" id="man" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<?php
        									while ($row = mysqli_fetch_array($products)) {
        										?>

        										<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        											<div class="single-product">
        												<div class="product-img">
        													<a href="product-details.php">
        														<img src="../../<?= $row['image'] ?>" title="<?= $row['pro_name'] ?>" />
        													</a>
        													<div class="button-head">
        														<div class="product-action">
        															<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        															<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        															<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        														</div>
        														<div class="product-action-2">
        															<a title="Add to cart" href="#">Add to cart</a>
        														</div>
        													</div>
        												</div>
        												<div class="product-content">
        													<h3><a href="product-details.php"><?= $row['pro_name'] ?></a></h3>
        													<div class="product-price">
        														<span><?= number_format($row['price'], 0, ",", ".") ?> đ</span>
        													</div>
        												</div>
        											</div>
        										</div>
        									<?php } ?>


        								</div>
        								<div style="margin-top: 50px;" >
        									<?php
        									if ($current_page > 3) {
        										$first_page = 1;
        										?>
        										<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000;"> href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>
        										<?php
        									}
        									if ($current_page > 1) {
        										$prev_page = $current_page - 1;
        										?>
        										<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000;" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
        									<?php }
        									?>
        									<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
        										<?php if ($num != $current_page) { ?>
        											<?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
        												<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000;" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
        											<?php } ?>
        										<?php } else { ?>
        											<strong style=" background: #000; color: #FFF;border: 1px solid #ccc; padding: 5px 9px;"><?= $num ?></strong>
        										<?php } ?>
        									<?php } ?>
        									<?php
        									if ($current_page < $totalPages - 1) {
        										$next_page = $current_page + 1;
        										?>
        										<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000;" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
        										<?php
        									}
        									if ($current_page < $totalPages - 3) {
        										$end_page = $totalPages;
        										?>
        										<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000;" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
        										<?php
        									}
        									?>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade" id="women" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Hot Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Pink Show</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="new">New</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Pant Collectons</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="price-dec">30% Off</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Cap For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Polo Dress For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="out-of-stock">Hot</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Black Sunglass For Women</a></h3>
        												<div class="product-price">
        													<span class="old">$60.00</span>
        													<span>$50.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade" id="kids" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Hot Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Pink Show</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="new">New</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Pant Collectons</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="price-dec">30% Off</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Cap For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Polo Dress For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="out-of-stock">Hot</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Black Sunglass For Women</a></h3>
        												<div class="product-price">
        													<span class="old">$60.00</span>
        													<span>$50.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade" id="accessories" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Hot Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Pink Show</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="new">New</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Pant Collectons</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="price-dec">30% Off</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Cap For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Polo Dress For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="out-of-stock">Hot</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Black Sunglass For Women</a></h3>
        												<div class="product-price">
        													<span class="old">$60.00</span>
        													<span>$50.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade" id="essential" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Hot Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Pink Show</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="new">New</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Pant Collectons</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="price-dec">30% Off</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Cap For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Polo Dress For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="out-of-stock">Hot</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Black Sunglass For Women</a></h3>
        												<div class="product-price">
        													<span class="old">$60.00</span>
        													<span>$50.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        						<!-- Start Single Tab -->
        						<div class="tab-pane fade" id="prices" role="tabpanel">
        							<div class="tab-single">
        								<div class="row">
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Hot Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Pink Show</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="new">New</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Women Pant Collectons</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Bags Collection</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="price-dec">30% Off</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Awesome Cap For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Polo Dress For Women</a></h3>
        												<div class="product-price">
        													<span>$29.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
        										<div class="single-product">
        											<div class="product-img">
        												<a href="product-details.php">
        													<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
        													<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
        													<span class="out-of-stock">Hot</span>
        												</a>
        												<div class="button-head">
        													<div class="product-action">
        														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        													</div>
        													<div class="product-action-2">
        														<a title="Add to cart" href="#">Add to cart</a>
        													</div>
        												</div>
        											</div>
        											<div class="product-content">
        												<h3><a href="product-details.php">Black Sunglass For Women</a></h3>
        												<div class="product-price">
        													<span class="old">$60.00</span>
        													<span>$50.00</span>
        												</div>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        						<!--/ End Single Tab -->
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Product Area -->

        <!-- Start Midium Banner  -->
        <section class="midium-banner">
        	<div class="container">
        		<div class="row">
        			<!-- Single Banner  -->
        			<div class="col-lg-6 col-md-6 col-12">
        				<div class="single-banner">
        					<img src="../../anh/2.png" width="600" height="370" w alt="#">
        					<div class="content">
        						<p>Man's Collectons</p>
        						<h3>Man's items <br>Up to<span> 50%</span></h3>
        						<a href="#">Shop Now</a>
        					</div>
        				</div>
        			</div>
        			<!-- /End Single Banner  -->
        			<!-- Single Banner  -->
        			<div class="col-lg-6 col-md-6 col-12">
        				<div class="single-banner">
        					<img src="../../anh/3.png" width="600" height="370" w alt="#">
        					<div class="content">
        						<p>shoes women</p>
        						<h3>mid season <br> up to <span>70%</span></h3>
        						<a href="#" class="btn">Shop Now</a>
        					</div>
        				</div>
        			</div>
        			<!-- /End Single Banner  -->
        		</div>
        	</div>
        </section>
        <!-- End Midium Banner -->

        <!-- Start Most Popular -->
        <div class="product-area most-popular section">
        	<div class="container">
        		<div class="row">
        			<div class="col-12">
        				<div class="section-title">
        					<h2>Hot Item</h2>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-12">
        				<div class="owl-carousel popular-slider">

        					<?php
        						$i=0;
        						while (($row = mysqli_fetch_array($kq2))&&($i<7)) {
        							$i++;
        							?>

        							<!-- Start Single Product -->
        							<div class="single-product">
        								<div class="product-img">
        									<a href="product-details.php">
        										<img src="../../<?= $row['image'] ?>" title="<?= $row['pro_name'] ?>" />
        										<span class="out-of-stock">Hot</span>
        									</a>
        									<div class="button-head">
        										<div class="product-action">
        											<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
        											<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
        											<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
        										</div>
        										<div class="product-action-2">
        											<a title="Add to cart" href="#">Add to cart</a>
        										</div>
        									</div>
        								</div>
        								<div class="product-content">
        									<h3><a href="product-details.php"><?= $row['pro_name'] ?></a></h3>
        									<div class="product-price">
        										<span class="old"><?= number_format($row['price']+200000, 0, ",", ".") ?> đ</span>
        										<span><?= number_format($row['price'], 0, ",", ".") ?> đ</span>
        									</div>
        								</div>
        							</div>
        							<!-- End Single Product -->
        						<?php }?>


        					
        					
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Most Popular Area -->


        <!-- Start Footer Area -->
        <footer class="footer">
        	<!-- Footer Top -->
        	<div class="footer-top section">
        		<div class="container">
        			<div class="row">
        				<div class="col-lg-5 col-md-6 col-12">
        					<!-- Single Widget -->
        					<div class="single-footer about">
        						<div class="logo">
        							<a href="index.php"><img src="images/logo2.png" alt="#"></a>
        						</div>
        						<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
        						<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
        					</div>
        					<!-- End Single Widget -->
        				</div>
        				<div class="col-lg-2 col-md-6 col-12">
        					<!-- Single Widget -->
        					<div class="single-footer links">
        						<h4>Information</h4>
        						<ul>
        							<li><a href="#">About Us</a></li>
        							<li><a href="#">Faq</a></li>
        							<li><a href="#">Terms & Conditions</a></li>
        							<li><a href="#">Contact Us</a></li>
        							<li><a href="#">Help</a></li>
        						</ul>
        					</div>
        					<!-- End Single Widget -->
        				</div>
        				<div class="col-lg-2 col-md-6 col-12">
        					<!-- Single Widget -->
        					<div class="single-footer links">
        						<h4>Customer Service</h4>
        						<ul>
        							<li><a href="#">Payment Methods</a></li>
        							<li><a href="#">Money-back</a></li>
        							<li><a href="#">Returns</a></li>
        							<li><a href="#">Shipping</a></li>
        							<li><a href="#">Privacy Policy</a></li>
        						</ul>
        					</div>
        					<!-- End Single Widget -->
        				</div>
        				<div class="col-lg-3 col-md-6 col-12">
        					<!-- Single Widget -->
        					<div class="single-footer social">
        						<h4>Get In Tuch</h4>
        						<!-- Single Widget -->
        						<div class="contact">
        							<ul>
        								<li>NO. 342 - London Oxford Street.</li>
        								<li>012 United Kingdom.</li>
        								<li>info@eshop.com</li>
        								<li>+032 3456 7890</li>
        							</ul>
        						</div>
        						<!-- End Single Widget -->
        						<ul>
        							<li><a href="#"><i class="ti-facebook"></i></a></li>
        							<li><a href="#"><i class="ti-twitter"></i></a></li>
        							<li><a href="#"><i class="ti-flickr"></i></a></li>
        							<li><a href="#"><i class="ti-instagram"></i></a></li>
        						</ul>
        					</div>
        					<!-- End Single Widget -->
        				</div>
        			</div>
        		</div>
        	</div>
        	<!-- End Footer Top -->
        	<div class="copyright">
        		<div class="container">
        			<div class="inner">
        				<div class="row">
        					<div class="col-lg-6 col-12">
        						<div class="left">
        							<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
        						</div>
        					</div>
        					<div class="col-lg-6 col-12">
        						<div class="right">
        							<img src="images/payments.png" alt="#">
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </footer>
        <!-- /End Footer Area -->

        <!-- Jquery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.0.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <!-- Popper JS -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Color JS -->
        <script src="js/colors.js"></script>
        <!-- Slicknav JS -->
        <script src="js/slicknav.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
        <!-- Magnific Popup JS -->
        <script src="js/magnific-popup.js"></script>
        <!-- Waypoints JS -->
        <script src="js/waypoints.min.js"></script>
        <!-- Countdown JS -->
        <script src="js/finalcountdown.min.js"></script>
        <!-- Nice Select JS -->
        <script src="js/nicesellect.js"></script>
        <!-- Flex Slider JS -->
        <script src="js/flex-slider.js"></script>
        <!-- ScrollUp JS -->
        <script src="js/scrollup.js"></script>
        <!-- Onepage Nav JS -->
        <script src="js/onepage-nav.min.js"></script>
        <!-- Easing JS -->
        <script src="js/easing.js"></script>
        <!-- Active JS -->
        <script src="js/active.js"></script>
    </body>
    </html>
