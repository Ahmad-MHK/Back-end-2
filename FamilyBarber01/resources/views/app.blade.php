<!DOCTYPE html>
<html>
<head>
    <title>Family Barber</title>
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="barber-image.css">
    <link rel="stylesheet" href="OurTeam.css">
    <!-- Add Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <div id="App">
        {{-- @include('Topbar') --}}
        @include('NavBar')
        @include('Main')
        @include('Blocks')
        @include('barber-image')
        @include('OurTeam')
        <div class="center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2462.759185665091!2d5.5908476999999985!3d51.88360819999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6ff0008b3ec87%3A0x8a85bb84c7079f4!2smuraddebarber!5e0!3m2!1sen!2snl!4v1715980424325!5m2!1sen!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        @include('footer')
        <div class="ffooter">
            <p>Made with 🤍 by Ahmad Mahouk</p>
        </div>
    </div>
    <!-- Add Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiperMobile = new Swiper('.swiper-container.swiper-full-mobile', {
                slidesPerView: 4,
                spaceBetween: 0,
                slideToClickedSlide: true,
                centeredSlides: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                effect: "coverflow",
                grabCursor: true,
                coverflowEffect: {
                    rotate: -10,
                    stretch: 10,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                loop: true,
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    }
                }
            });
        });
    </script>
</body>
</html>
