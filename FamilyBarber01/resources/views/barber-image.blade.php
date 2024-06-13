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
         @foreach($ImagesShow as $post)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $post->image) }}">
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


