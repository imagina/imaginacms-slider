<?php

namespace Modules\Slider\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Slider\Entities\Slide;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Repositories\Cache\CacheSlideApiDecorator;
use Modules\Slider\Repositories\Cache\CacheSlideDecorator;
use Modules\Slider\Repositories\Cache\CacheSliderApiDecorator;
use Modules\Slider\Repositories\Cache\CacheSliderDecorator;
use Modules\Slider\Repositories\Eloquent\EloquentSlideRepository;
use Modules\Slider\Repositories\Eloquent\EloquentSliderRepository;

class SliderServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterSliderSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

  /**
   * Register all online sliders on the Pingpong/Menu package
   */
    public function boot()
    {

        $this->publishConfig('slider', 'config');
        $this->publishConfig('slider', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'settings'), "asgard.slider.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'settings-fields'), "asgard.slider.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'permissions'), "asgard.slider.permissions");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'cmsPages'), "asgard.slider.cmsPages");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'cmsSidebar'), "asgard.slider.cmsSidebar");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'blocks'), "asgard.slider.blocks");
    $this->mergeConfigFrom($this->getModuleConfigFilePath('slider', 'gamification'), "asgard.slider.gamification");

    $this->registerSliders();
    $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'slider');

    $this->registerComponents();

    }

    /**
     * Get the services provided by the provider.
     */
    public function provides()
    {
        return ['sliders'];
    }

    /**
     * Register class binding
     */
    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Slider\Repositories\SliderRepository',
            function () {
                $repository = new EloquentSliderRepository(new Slider());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheSliderDecorator($repository);
            }
        );
      $this->app->bind(
        'Modules\Slider\Repositories\SlideRepository',
        function () {
          $repository = new \Modules\Slider\Repositories\Eloquent\EloquentSlideRepository(new \Modules\Slider\Entities\Slide());

          if (! config('app.cache')) {
            return $repository;
          }

          return new \Modules\Slider\Repositories\Cache\CacheSlideDecorator($repository);
        }
      );
      $this->app->bind(
        'Modules\Slider\Repositories\SlideRepository',
        function () {
          $repository = new \Modules\Slider\Repositories\Eloquent\EloquentSlideRepository(new \Modules\Slider\Entities\Slide());

          if (! config('app.cache')) {
            return $repository;
          }

          return new \Modules\Slider\Repositories\Cache\CacheSlideDecorator($repository);
        }
      );
// add bindings


    $this->app->bind('Modules\Slider\Presenters\SliderPresenter');
    }

  /**
   * Register the active sliders
   */
  private function registerSliders()
  {
    if (!$this->app['asgard.isInstalled']) {
      return;
    }
  }

    /**
     * Register Blade components
     */

    private function registerComponents(){
        Blade::componentNamespace("Modules\Slider\View\Components", 'slider');
    }

}
