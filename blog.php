<!doctype html>
<html lang="en">

<?php include("components/header.php"); ?>

<body>

	<!-- Navigation -->
	<?php include("components/navigation.php"); ?>

	<!--==========================
   +INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">BLOG</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">
				<main id="main" class="col-md-8">
					<div class="row">

					<?php
							$sql = "SELECT * FROM posts";
							$stmt1 = $conn->prepare($sql);
							$stmt1->execute();

							
								while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {

									$post_id = $row['post_id'];
									$post_title = $row['post_title'];
									$post_author = $row['post_author'];
									$post_date = $row['post_date'];
									$post_image = $row['post_image'];
									$post_content = substr($row['post_content'], 0, 150);

									echo "<div class='col-md-6'>";
									echo "<div class='blog'>";
									echo "<div class='blog-img'>";
									echo "<img class='img-fluid' src='img/blog/$post_image' alt=''>";
									echo "</div>"; // end of blog-img
									echo "<div class='blog-content'>";
									echo "<ul class='blog-meta'>";
									echo "<li><i class='fa fa-user'></i>$post_author</li>";
									echo "<li><i class='fa fa-clock-o'></i>$post_date</li>";
									echo "</ul>"; // end of blog-meta
									echo "<h3>$post_title</h3>";
									echo "<p>$post_content</p>";
									echo "<a href='post.php?p_id=$post_id' class='read-more'>Read More <i class='fa fa-long-arrow-right'></i></a>";
									echo "</div>"; // end of blog-content
									
									
									echo "</div>";  // blog
									echo '</div>'; // col-md-6
								}
							

							?>

						<div class="col-md-6">

			

							<div class="blog">
								<div class="blog-img">
									<img src="img/blog1.jpg" class="img-fluid">
								</div>
								<div class="blog-content">
									<ul class="blog-meta">
										<li><i class="fas fa-users"></i><span class="writer">John Doe</span></li>
										<li><i class="fas fa-clock"></i><span class="writer">17 Dec 2018</span></li>
										<li><i class="fas fa-comments"></i><span class="writer">13</span></li>
									</ul>
									<h3>Lorem Ipsum</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
									<a href="blog-single.html">Read More</a>
								</div>
							</div>
						</div>



						<div class="col-md-6">
							<div class="blog">
								<div class="blog-img">
									<img src="img/blog2.jpg" class="img-fluid">
								</div>
								<div class="blog-content">
									<ul class="blog-meta">
										<li><i class="fas fa-users"></i><span class="writer">John Doe</span></li>
										<li><i class="fas fa-clock"></i><span class="writer">17 Dec 2018</span></li>
										<li><i class="fas fa-comments"></i><span class="writer">13</span></li>
									</ul>
									<h3>Lorem Ipsum</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
									<a href="blog-single.html">Read More</a>
								</div>
							</div>
						</div>
				

						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
					</div>
				</main>

				<aside id="aside" class="col-md-4">

					<div class="widget">
						<div class="widget-search">
							<input class="search-input form-control" type="text" placeholder="Search">
							<button class="search-btn" type="button"><i class="fas fa-search"></i></button>
						</div>
					</div>
					<!-- /Search -->


					<!-- Category -->
					<div class="widget">
						<h3 class="mb-3">Categories</h3>
						<div class="widget-category">


							<?php
							//get data from database
							$sql = "SELECT * FROM categories";
							$stmt = $conn->prepare($sql);
							$stmt->execute();
							$result = $stmt->fetchAll();



							foreach ($result as $row) {

								switch ($row["cat_name"]) {
									case "Web Programming":
										echo "<a href='#'>" . $row['cat_name'] . "</a>";
										break;
									case "JavaScript":
										echo "<a href='#'>" . $row['cat_name'] . "</a>";
										break;
									case "Mobile Programming":
										echo "<a href='#'>" . $row['cat_name'] . "</a>";
										break;
									default:
										echo "<a href='#'>" . $row['cat_name'] . "</a>";
										break;
								}
							}




							?>


							<!-- <a href="#">Web Design<span>(7)</span></a>
							<a href="#">Marketing<span>(142)</span></a>
							<a href="#">Web Development<span>(74)</span></a>
							<a href="#">Branding<span>(60)</span></a>
							<a href="#">Photography<span>(5)</span></a> -->
						</div>
					</div>
					<!-- /Category -->

					<!-- Posts sidebar -->
					<div class="widget">
						<h3 class="mb-3">Latest Posts</h3>

						<!-- single post -->
						<div class="widget-post">
							<a href="#">
								<img class="img-fluid" src="./img/post1.jpg" alt="">Lorem Ipsum
							</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->

						<!-- single post -->
						<div class="widget-post">
							<a href="#">
								<img src="./img/post2.jpg" alt="">Lorem Ipsum
							</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->


						<!-- single post -->
						<div class="widget-post">
							<a href="#">
								<img src="./img/post3.jpg" alt="">Lorem Ipsum
							</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->

					</div>
					<!-- /Posts sidebar -->

				</aside>



			</div>

		</div>
	</section>
	<!--include footer.php-->
	<?php include("components/footer.php"); ?>
	<!--/footer-->

	<!--back to top-->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>
	<!--/back to top-->

	<!-- Jquery -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-migrate-3.0.0.js"></script>

	<!-- Bootstrap 4 -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/jquery.sticky.js"></script>


	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="js/lightbox-plus-jquery.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>