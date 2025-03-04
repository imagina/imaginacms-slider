@once
  @section('scripts-owl')
    @parent
    <script>
      function parseOptions(options, key, defaultValue = null) {
        if (!options[key] || (typeof options[key] != 'string')) return defaultValue
        try {
          return JSON.parse(options[key])
        } catch (error) {
          console.error(`OWL:SCRIPT::Error parsing option "${key}":`, error);
          return defaultValue;
        }
      }

      // global-slider-init.js
      function initializeSlider(slider) {
        if (slider.hasClass('owl-loaded')) return; // Prevent reinitialization
        let isMobile = window.innerWidth <= 767;
        // Filter items based on responsive classes
        slider.find(`.owl-d-${isMobile ? 'desktop' : 'mobile'}`).remove();
        // Initialize Owl Carousel
        const options = slider.data('slider-options')
        slider.owlCarousel({
          autoplay: !!parseInt(options.autoplay),
          autoplayHoverPause: !!parseInt(options['autoplay-hover-pause']),
          autoplayTimeout: parseInt(options['autoplay-timeout']) || 5000,
          dots: !!parseInt(options['dots']),
          items: 1,
          lazyLoad: true,
          loop: !!parseInt(options['loop']),
          margin: parseInt(options['margin']) || 0,
          mouseDrag: options['mouse-drag'] === true,
          nav: !!parseInt(options['nav']),
          navText: parseOptions(options, 'nav-text', []),
          responsive: parseOptions(options, 'responsive', {}),
          responsiveClass: options['responsive-class'] === true,
          stagePadding: parseInt(options['stage-padding']) || 0,
          touchDrag: options['touch-drag'] === true,
        });

        // Accessibility labels
        slider.find('.owl-dot').each((index, dot) => {
          $(dot).attr('aria-label', index + 1);
        });
        slider.find('.owl-next').attr('aria-label', '{{trans('slider::frontend.next')}}');
        slider.find('.owl-prev').attr('aria-label', '{{trans('slider::frontend.previous')}}');
      }

      // Initialize existing sliders on page load
      $(document).ready(function () {
        $('[data-slider-id]').each(function () {
          initializeSlider($(this));
        });
      });

      // Function to reinitialize sliders dynamically (e.g., after infinite scroll loads new content)
      function reinitializeNewSliders() {
        $('[data-slider-id]').not('.owl-loaded').each(function () {
          initializeSlider($(this));
        });
      }
    </script>
  @stop
@endonce
