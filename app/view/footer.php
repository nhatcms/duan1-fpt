<?php
$categories = CategoryModel::getAllCategories();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/styles/footer.css?v=<?php echo time(); ?>">
</head>

<body>
	<div class="footer-dark">
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3 item">
						<h3>Danh mục</h3>
						<ul>
							<!-- <li><a href="#">SamSung Galaxy</a></li>
							<li><a href="#">SamSung Watch</a></li>
							<li><a href="#">SamSung Tab</a></li> -->
							<!-- foreach categories echo category by php -->
							<?php
							foreach ($categories as $category) {
								echo "<li><a href='?action=category&id=" . $category['id'] . "'>" . $category['cate_name'] . "</a></li>";
							}
							?>
						</ul>
					</div>
					<div class="col-sm-6 col-md-3 item">
						<h3>Liên kết</h3>
						<ul>
							<li><a href="?act=login">Đăng nhập</a></li>
							<li><a href="?act=news">Tin tức</a></li>
							<li><a href="?act=policy">Chính sách</a></li>
						</ul>
					</div>
					<div class="col-md-6 item text">
						<h3>Giới thiệu</h3>
						<p>Từ tháng 01/2022, MobileLand – chính thức là đại lý uỷ quyền SamSung tại Việt Nam. Trở thành đối tác với SamSung giúp MobileLand giữ vững cam kết luôn đem lại giá trị tốt nhất cho người dùng sản phẩm SamSung tại Việt Nam.

						</p>
					</div>
					<div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
				</div>
				<p class="copyright">© Design by MobileLand team</p>
			</div>
		</footer>
	</div>


	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- Credit to https://epicbootstrap.com/snippets/footer-dark -->