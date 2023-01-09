<section class="flexslider">
    <ul class="slides">
        @foreach ($slider as $key=>$item)
        <li style="background-image: url({{ asset('public/uploads/Slider/'.$item->slider_image) }})" >
        </li>
        @endforeach

    </ul>
  </section>
