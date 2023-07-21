<?php


namespace Modules\Slider\Services;

use Illuminate\Http\Request;
use Modules\Isite\Services\AiService;

class SliderContentAi
{
  public $aiService;
  private $log = "Slider: Services|SliderContentAi|";
  private $sliderRepository;
  private $slideRepository;
  private $maxAttempts;
  private $slideQuantity;
  private $systemName = "sliderHome";

  function __construct($maxAttempts = 3, $slideQuantity = 2)
  {
    $this->aiService = new AiService();
    $this->maxAttempts = $maxAttempts;
    $this->slideQuantity = $slideQuantity;
    $this->sliderRepository = app("Modules\Slider\Repositories\SliderApiRepository");
    $this->slideRepository = app("Modules\Slider\Repositories\SlideApiRepository");
  }

  public function getSlides($quantity = 2)
  { 
    \Log::info($this->log."getSlides|INIT");

    //instance the prompt to generate the posts
    $prompt = "Contenido llamativo para slides rotatorios de una pagina WEB con los siguientes atributos ";
    //Instance attributes
    $prompt .= $this->aiService->getStandardPrompts(["title", "summary"]) .
      "custom_html: Que contenga entre 200 y 300 palabras, el texto sea en formato HTML, {$this->aiService->translatablePrompt} " .
      "caption: texto corto de maximo 2 palabras que pueda ser usado para un boton el slide, {$this->aiService->translatablePrompt} ";
    //Call IA Service
    $response = $this->aiService->getContent($prompt, $quantity);
    \Log::info($this->log."getSlides|END");
    //Return response
    return $response;
  }

   /**
  * Principal
  */
  public function startProcesses()
  {

    \Log::info($this->log."startProcesses");

    $newData = $this->getNewData();
    if(!is_null($newData)){

      //Get principal slider
      $params = ["filter" => ["field" => "system_name"]];
      $slider = $this->sliderRepository->getItem($this->systemName,json_decode(json_encode($params)));

      $this->deleteOldSlides($slider);
      $this->createSlides($newData,$slider);
      
    }

  }
  /**
  * Get the New Data
  */
  public function getNewData()
  {
    
    $newData = null;

    $attempts = 0;
    do {
      \Log::info($this->log."getNewData|Attempt:".($attempts+1)."/Max:".$this->maxAttempts);
      $newData = $this->getSlides($this->slideQuantity);
  
      if(is_null($newData)){
        $attempts++;
      }else{
        if(isset($newData[0]['es']) && isset($newData[0]['en']))
          break;
        else
          $attempts++;
      }
    }while($attempts < $this->maxAttempts);

    return $newData;
  }

  /**
  * Slides to Create
  */
  public function createSlides($slides,$slider)
  {

    \Log::info($this->log."createSlides");
    foreach ($slides as $key => $slide) {

      $slide['slider_id'] = $slider->id;
      $slide['type'] = NULL;

      $result = $this->slideRepository->create($slide);

      //TODO
      //Proceso to create image

    }
  }

  /**
   * Delete old Slides
   */
  public function deleteOldSlides($slider)
  {

    \Log::info($this->log."deleteOldSlides");
    $slider->slides()->delete();

  }

}