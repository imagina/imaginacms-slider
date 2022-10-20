<div id="{{ $slider->system_name }}"
     class="owl-carousel owl-theme owl-slider-layout-5 {{ $dots ? ' owl-with-dots carousel-indicators-position-'.$dotsPosition.' carousel-indicators-style-'. $dotsStyle: '' }} position-relative">
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
@include("slider::frontend.components.slider.owl.script")