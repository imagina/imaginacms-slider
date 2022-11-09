<?php

$vAttributes = config("asgard.isite.standardValuesForBlocksAttributes");

return [
  "sliderOwl" => [
    "title" => "sliderOwl",
    "systemName" => "slider::slider.Owl",
    "nameSpace" => "Modules\Slider\View\Components\Slider\Owl",
    "content" => [
      [
        "label" => "Slider",
        "value" => "Modules\Slider\Entities\Slider",
        "loadOptions" => [
          "apiRoute" => "apiRoutes.qslider.sliders",
          "select" => ["label" => "name", "id" => "id"]
        ]
      ]
    ],
    "childBlocks" => [
      "itemComponentAttributes" => "isite::item-list"
    ],
    "attributes" => [
      "general" => [
        "title" => "general",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" => "slider-owl-layout-5",
            "type" => "input",
            "props" => [
              "label" => "layout"
            ]
          ],
          "height" => [
            "name" => "height",
            "value" => "500px",
            "type" => "input",
            "props" => [
              "label" => "height slider",
            ]
          ],
          "autoplay" => [
            "name" => "autoplay",
            "value" => "true",
            "type" => "select",
            "props" => [
              "label" => "autoplay",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "margin" => [
            "name" => "margin",
            "value" => "0",
            "type" => "input",
            "props" => [
              "label" => "margin slider",
              "type" => "number"
            ]
          ],
          "autoplayHoverPause" => [
            "name" => "autoplayHoverPause",
            "value" => "true",
            "type" => "select",
            "props" => [
              "label" => "autoplayHoverPause",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "loop" => [
            "name" => "loop",
            "value" => "true",
            "type" => "select",
            "props" => [
              "label" => "slider loop",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "dots" => [
            "name" => "dots",
            "value" => "true",
            "type" => "select",
            "props" => [
              "label" => "slider dots",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "dotsPosition" => [
            "name" => "dotsPosition",
            "value" => "center",
            "type" => "select",
            "props" => [
              "label" => "dots position",
              "options" => [
                ["label" => "Centrado", "value" => "center"],
                ["label" => "Derecha", "value" => "right"],
                ["label" => "Izquierda", "value" => "left"],
                ["label" => "Izquierda vertical", "value" => ",left-vertical"],
                ["label" => "Derecha vertical", "value" => ",right-vertical"]
              ]
            ]
          ],
          "dotsStyle" => [
            "name" => "dotsStyle",
            "value" => "line",
            "type" => "select",
            "props" => [
              "label" => "dots style",
              "options" => [
                ["label" => "Circulo", "value" => "circle"],
                ["label" => "Cuadrado", "value" => "square"],
                ["label" => "linea", "value" => "line"]
              ]
            ]
          ],
          "nav" => [
            "name" => "nav",
            "value" => "true",
            "type" => "select",
            "props" => [
              "label" => "nav",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "navText" => [
            "name" => "navText",
            "value" => "",
            "type" => "input",
            "props" => [
              "label" => "nav text",
            ]
          ],
          "autoplayTimeOut" => [
            "name" => "autoplayTimeOut",
            "value" => "5000",
            "type" => "input",
            "props" => [
              "label" => "autoplayTimeOut",
              "type" => "number"
            ]
          ],
          "imgObjectFit" => [
            "name" => "imgObjectFit",
            "value" => "cover",
            "type" => "select",
            "props" => [
              "label" => "imgObjectFit",
              "options" => [
                ["label" => "Cover", "value" => "Cover"],
                ["label" => "fill", "value" => "fill"],
                ["label" => "Contain", "value" => "Contain"],
                ["label" => "none", "value" => "none"],
                ["label" => "Scale-Down", "value" => "Scale-Down"]
              ]
            ]
          ],
          "responsiveClass" => [
            "name" => "responsiveClass",
            "value" => "false",
            "type" => "select",
            "props" => [
              "label" => "responsiveClass",
              "options" => $vAttributes["booleanValidation"]
            ]
          ],
          "responsive" => [
            "name" => "responsive",
            "value" => "",
            "type" => "json",
            "props" => [
              "label" => "responsive"
            ]
          ],
          "stagePadding" => [
            "name" => "stagePadding",
            "value" => "0",
            "type" => "input",
            "props" => [
              "label" => "stagePadding",
              "type" => "number"
            ]
          ],
          "view" => [
            "name" => "view",
            "value" => null,
            "type" => "input",
            "props" => [
              "label" => "view",
            ]
          ],
          "navPosition" => [
            "name" => "navPosition",
            "value" => "lateral",
            "type" => "select",
            "props" => [
              "label" => "navPosition",
              "options" => [
                ["label" => "lateral", "value" => "lateral"],
                ["label" => "center-bottom", "value" => "center-bottom"],
                ["label" => "left-bottom", "value" => "left-bottom"],
                ["label" => "right-bottom", "value" => "right-bottom"]
              ]
            ]
          ],
        ]
      ]
    ]
  ]
];
