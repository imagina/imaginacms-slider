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
        validateLocatable(slider)
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
        $('[data-slider-id]').filter(function () {
          return !this.classList.contains('owl-loaded'); // Evita el uso de jQuery internamente
        }).each(function () {
          initializeSlider($(this));
        });
      }

      function validateLocatable(slider) {
        // Location-based filtering
        const sessionCountry = '{{ session()->get('countryIdSelected') }}';
        const sessionProvince = '{{ session()->get('provinceIdSelected') }}';
        const sessionCity = '{{ session()->get('cityIdSelected') }}';

        slider.find('.slide').each(function () {
          const locatableData = $(this).data('slide-locatable');
          if (locatableData) {
            try {
              const {countryId, provinceId, cityId} = locatableData;

              // Skip validation if all location fields are null
              const allNull = [countryId, provinceId, cityId].every(v => v === null);
              if (allNull) return;

              const isMatch =
                (countryId && countryId == sessionCountry) ||
                (provinceId && provinceId == sessionProvince) ||
                (cityId && cityId == sessionCity);

              if (!isMatch) $(this).remove();

            } catch (e) {
              console.error('Invalid JSON in data-slide-locatable:', e);
              $(this).remove(); // Optionally remove slides with invalid data
            }
          }
        });
      }
    </script>
  @stop
@endonce
