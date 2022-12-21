@section('scripts-owl')
  @parent
  <script>
    $(document).ready(function () {
      $('#{{ $slider->system_name }}').owlCarousel({
        stagePadding: {!!$stagePadding!!},
        items: 1,
        dots: {!! $dots ? 'true' : 'false' !!},
        loop: {!! $loopOwl ? 'true' : 'false' !!},
        lazyLoad: true,
        margin: {!! $margin !!},
        nav: {!! $nav ? 'true' : 'false' !!},
        autoplay: {!! $autoplay ? 'true' : 'false' !!},
        autoplayHoverPause: {!! $autoplayHoverPause ? 'true' : 'false' !!},
        responsiveClass: {!! $responsiveClass ? 'true' : 'false' !!},
        responsive: {!! $responsive!!},
        autoplayTimeout: {{$autoplayTimeout}},
        mouseDrag: {!! $mouseDrag ? 'true' : 'false' !!},
        touchDrag: {!! $touchDrag ? 'true' : 'false' !!},
        {!! !empty($navText) ? 'navText: '.$navText."," : "" !!}
      });
    });
  </script>
@stop