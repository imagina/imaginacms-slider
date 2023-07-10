<?php


namespace Modules\Slider\Services;

use Illuminate\Http\Request;
use Modules\Isite\Services\AiService;

class SliderContentAi
{
  public $aiService;
  private $log = "Slider: Services|SliderContentAi|";

  function __construct()
  {
    $this->aiService = new AiService();
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
}
