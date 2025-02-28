@if(count($slides)==1)
  @php
    $mouseDrag=false;
    $touchDrag=false;
    $dots=false;
    $nav=false;
    $navText=[];
  @endphp
@endif
@php
  $dataSliderOpt = [
    'stage-padding' => $stagePadding,
    'dots' => $dots,
    'loop' => $loopOwl,
    'margin' => $margin,
    'nav' => $nav,
    'autoplay' => $autoplay,
    'autoplay-hover-pause' => $autoplayHoverPause,
    'responsive-class' => $responsiveClass,
    'responsive' => $responsive,
    'autoplay-timeout' => $autoplayTimeout,
    'mouse-drag' => $mouseDrag,
    'touch-drag' => $touchDrag,
    'nav-text' => $navText
  ];
  $dataSliderOptJson = json_encode($dataSliderOpt)
@endphp
<div id="{{ $slider->system_name }}Slider">
  <div id="{{ $slider->system_name }}" data-slider-id="{{$id}}" data-slider-options="{{$dataSliderOptJson}}"
       class="owl-carousel owl-theme owl-slider-layout-5 {{ $nav ? ' owl-with-nav carousel-nav-position-'.$navPosition : '' }} {{ $dots ? ' owl-with-dots carousel-indicators-position-'.$dotsPosition.' carousel-indicators-style-'. $dotsStyle: '' }} position-relative">
    @foreach($slides as $index => $slide)
      <div
        class="slide {{ $slide->responsive == 2 ? 'owl-d-desktop' : '' }} {{ $slide->responsive == 3 ? 'owl-d-mobile' : '' }}">
        @if(isset($slide->code_ads) && !is_null($slide->code_ads))
          <div class="banner-{{$slide->id}} py-3">
            {!! $slide->code_ads !!}
          </div>
        @else
          @php $itemComponentAttributes += ['itemComponentTarget' => $slide->target] @endphp
          @if(!empty($itemComponentAttributes['viewMoreButtonLabel']))
            @php
              $itemComponentAttributes['viewMoreButtonLabel'] = $slide->caption ?? trans('isite::common.menu.viewMore');
            @endphp
          @else
            @php
              $itemComponentAttributes += ['viewMoreButtonLabel' => $slide->caption ?? trans('isite::common.menu.viewMore') ];
            @endphp
          @endif
          @include("isite::frontend.partials.item", [
            "item" => $slide,
            "itemLayout" => $itemComponentAttributes['layout'],
            "itemComponentAttributes" => $itemComponentAttributes
          ])
        @endif
      </div>
    @endforeach
  </div>
</div>
@include("slider::frontend.components.slider.owl.script")
@include("slider::frontend.components.slider.owl.layouts.slider-owl-layout-5.style")
