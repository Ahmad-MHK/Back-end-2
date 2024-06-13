<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Team Section Using HTML5 , CSS3 , Bootstrap 4</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">
</head>

<body>

	<section class="section-team">
		<div class="container">
			<!-- Start Header Section -->
			<div class="row justify-content-center text-center">
				<div class="col-md-8 col-lg-6">
					<div class="header-section">
						<h3 class="small-title">Our Experts</h3>
						<h2 class="title">Let's meet with our team members</h2>
					</div>
				</div>
			</div>
			<!-- / End Header Section -->
			<div class="row">
                @foreach ($ourteam as $post )
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="single-person">
                            <div class="person-image">
                                <img src="{{ asset('storage/' . $post->ourteamimage) }}" alt="">
                            </div>
                            <div class="person-info">
                                <h3 class="full-name">{{ $post->fullname }}</h3>
                                <span class="speciality">{{ $post->speciality}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</section>

</body>
</html>
