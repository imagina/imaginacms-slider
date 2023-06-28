<?php


namespace Modules\Slider\Services;

use Illuminate\Http\Request;
use Modules\Isite\Services\IAService;

class SliderContentIA
{
  public $iaService;

  function __construct()
  {
    $this->iaService = new IAService();
  }

  public function getSlides($quantity = 2)
  {
    //instance the prompt to generate the posts
    $prompt = "Contenido llamativo para slides rotatorios de una pagina WEB con los siguientes atributos ";
    //Instance attributes
    $prompt .= $this->iaService->getStandardPrompts(["title", "summary"]) .
      "custom_html: Que contenga entre 200 y 300 palabras, el texto sea en formato HTML, {$this->iaService->translatablePrompt} " .
      "caption: texto corto de maximo 2 palabras que pueda ser usado para un boton el slide, {$this->iaService->translatablePrompt} ";
    //Call IA Service
    $response = $this->iaService->getContent($prompt, $quantity);
    //Return response
    return $response;
  }
}
