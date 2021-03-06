<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Generic - Transit by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/skel.min.js"></script>
		<script src="/assets/js/skel-layers.min.js"></script>
		<script src="/assets/js/init.js"></script>
    <link rel="stylesheet" href="/assets/css/skel.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-xlarge.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Weeaboo Inc.</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="/main">Home</a></li>
						<li><a href="/main/g_animes">The List</a></li>
						<li><a href="/main/g_user">The Profile</a></li>
						<li><a href="/lnr/g_login">Log In</a></li>
						<li><a href="/lnr/p_logout">Log Out</a></li>
						<li><a href="/lnr/g_registration" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2><?= $anime['title'] ?></h2>
            <h3><div class="pdr"><a href="/main/g_n_review/<?= $anime['id'] ?>">Write a Review!</a></div></h3>
						<p></p>
					</header>

          <div>
            <img class="4u" style="display:inline-block; height:25%; width:25%;" src="<?= $anime['picture'] ?>"></a>
            <div class="8u" style="display:inline-block; vertical-align:top; padding-left: 20px;">
              <h3>RELEASE YEAR: <div class="plr"><?= $anime['release_year'] ?></div></h3>
              <h3>STATUS: <div class="plr"><?= $anime['status'] ?></div></h3> 
              <h3>TOTAL EPISODES: <div class="plr"><?= $anime['total_episodes'] ?></div></h3>
              <h3>DESCRIPTION: <div class="plr"><?= $anime['description'] ?></div></h3>
            </div>
          </div>

<br />

					<!-- Table -->
            <h2>Top 5 Reviews</h2>
						<section>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Vote</th>
											<th>Likes</th>
											<th>Name</th>
											<th>Description</th>
											<th>User</th>
										</tr>
									</thead>
									<tbody>
<?php if($reviews) ?>
<?php foreach($reviews as $review){ ?>
										<tr>
<!-- think about what kind of information i want displayed for each review and what fields i need to pass into the backend int the review creation! -->
											<td><i class="fa fa-chevron-up" style="color:green"></i></td>
											<td><?= $review['likes'] ?></td>
                      <td><a href="/main/g_review/<?= $review['id'] ?>"><?= $review['title'] ?></a></td>
											<td><?= $review['review'] ?></td>
										</tr>
<?php } ?>
									</tbody>
								</table>
							</div>
						</section>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Lorem ipsum dolor</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Nesciunt itaque, alias possimus</a></li>
									<li><a href="#">Optio rerum beatae autem</a></li>
									<li><a href="#">Nostrum nemo dolorum facilis</a></li>
									<li><a href="#">Quo fugit dolor totam</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Culpa quia, nesciunt</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Reiciendis dicta laboriosam enim</a></li>
									<li><a href="#">Corporis, non aut rerum</a></li>
									<li><a href="#">Laboriosam nulla voluptas, harum</a></li>
									<li><a href="#">Facere eligendi, inventore dolor</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Neque, dolore, facere</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
									<li><a href="#">Explicabo inventore itaque autem</a></li>
									<li><a href="#">Aperiam harum, sint quibusdam</a></li>
									<li><a href="#">Labore excepturi assumenda</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Illum, tempori, saepe</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Recusandae, culpa necessita nam</a></li>
									<li><a href="#">Cupiditate, debitis adipisci blandi</a></li>
									<li><a href="#">Tempore nam, enim quia</a></li>
									<li><a href="#">Explicabo molestiae dolor labore</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>
