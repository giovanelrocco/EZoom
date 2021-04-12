<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bontempo</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<style>
		.carousel-caption{
			position: absolute;
			width: 100%;
			height: 100%;
			left: 0px;
		}
		.carousel-caption h5{
			position: relative;
			top: 50%;
			left: 5%;
			text-align: left;
			font-size: 50px;
		}
		.carousel-caption p{
			position: relative;
			top: calc(50% + 50px);
			left: 5%;
			text-align: left;
		}
		.carousel-caption a{
			position: relative;
			top: calc(50% + 100px);
			left: 5%;
			text-align: left;
		}
		.carousel-caption div{
			position: relative;
			top: calc(50% + 100px);
			text-align: left;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<div id="carousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<?php
				$active = "active";
				foreach($banners as $banner){
					?>
					<div class="carousel-item <?php echo $active; ?>">
						<img src="<?php echo $banner['imagemUrl']; ?>" class="d-block w-100" alt="<?php echo $banner['titulo']; ?>">
						<div class="carousel-caption d-none d-md-block pull-left">
							<h5><?php echo $banner['titulo']; ?></h5>
							<p><?php echo $banner['texto']; ?></p>
							<div>
								<a href="#" class="btn btn-outline-light">Acesse</a>
							</div>
						</div>
					</div>
					<?php
					$active = "";
				}
				?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
			</div>
		</div>
	</div>
	<script>
	var myCarousel = document.querySelector('#carousel');
	var carousel = new bootstrap.Carousel(myCarousel, {
	interval: 2000,
	wrap: false
	});
	</script>
</body>
</html>
