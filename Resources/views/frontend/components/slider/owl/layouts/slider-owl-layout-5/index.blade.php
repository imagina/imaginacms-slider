@if(count($slider->slides)==1)
        @php
                $mouseDrag=false;
                $touchDrag=false;
                $dots=false;
                $nav=false;
                $navText=[];
        @endphp
@endif
<div id="{{ $slider->system_name }}Slider">
<div id="{{ $slider->system_name }}"
     class="owl-carousel owl-theme owl-slider-layout-5 {{ $nav ? ' owl-with-nav carousel-nav-position-'.$navPosition : '' }} {{ $dots ? ' owl-with-dots carousel-indicators-position-'.$dotsPosition.' carousel-indicators-style-'. $dotsStyle: '' }} {{ $dots ? ' owl-with-dots carousel-indicators-position-'.$dotsPosition.' carousel-indicators-style-'. $dotsStyle: '' }} position-relative">
  @foreach($slider->slides as $index => $slide)
        <div class="slide">
            @if(!empty($itemComponentAttributes['viewMoreButtonLabel']))
                @php
                    $itemComponentAttributes['viewMoreButtonLabel'] = $slide->caption ?? trans('isite::common.menu.viewMore');
                @endphp
            @endif
            @include("isite::frontend.partials.item",["item" => $slide, "itemLayout" => $itemComponentAttributes['layout'],"itemComponentAttributes" => $itemComponentAttributes])
        </div>
  @endforeach
</div>
</div>
@include("slider::frontend.components.slider.owl.script")

@if($itemComponentAttributes['layout']=="item-list-layout-7" && $itemComponentAttributes['imagePosition']=="1")
<style>
    #{{ $slider->system_name }}Slider {
        aspect-ratio: {{$itemComponentAttributes['imageAspect']}};
    }
    @if(!is_null($itemComponentAttributes['imageAspectMobile']))
    @media (max-width: 767.98px) {
        #{{ $slider->system_name }}Slider {
            aspect-ratio: {{$itemComponentAttributes['imageAspectMobile']}};
        }
    }
    @endif
</style>
@endif