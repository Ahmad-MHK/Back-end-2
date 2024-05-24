<!DOCTYPE html>
<html>
<link rel="stylesheet" href="barber-image.css">
<section>
    <center>
      <h1 style="font-size: 36px;">Heading Should be  Here</h1>
      <p style="font-size: 18px;font-weight: 300">kappers asdgbhk hasbd ghaskd</p>

    </center>
    <div class="swiper-container swiper-full-mobile swiper-container-initialized swiper-container-horizontal">
       <div class="swiper-wrapper" >

         <div class="swiper-slide">
          <img src="https://cdn.ahead4.com/thegreatprojects/images/c/c/c/d/9/cccd9ab3a8832417497e233c1cb92b9e.jpg?width=364&height=364&format=jpg" alt="">
         </div>
          <div class="swiper-slide">
          <img src="https://i.natgeofe.com/n/56781ecf-e31b-4528-b412-6d67509aae4e/55739_4x3.jpg" alt="">
         </div>
          <div class="swiper-slide">
          <img src="https://i.guim.co.uk/img/media/343da3c152e1789691f754556a0cc5f5784a13e2/0_146_4927_2958/4927.jpg?width=460&quality=85&auto=format&fit=max&s=f59bcb613099ddccde17910633bbd990" alt="">
         </div>
         <div class="swiper-slide">
          <img src="http://md-aqil.github.io/images/attractive-beautiful-beauty-1986684.jpg" alt="">
         </div>
         <div class="swiper-slide">
          <img src="http://md-aqil.github.io/images/abstract-expressionism-abstract-painting-acrylic-1690351.jpg" alt="">
         </div>
         @foreach($images as $image)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $image->image) }}">
            </div>
         @endforeach

   </div>

     <!-- Add Pagination -->
     <div class="swiper-pagination"></div>
     <!-- Add Arrows -->
     <div class="swiper-button-next"></div>
     <div class="swiper-button-prev"></div>
</section>
</html>


