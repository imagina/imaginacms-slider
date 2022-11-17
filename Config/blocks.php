<?php

$vAttributes = config("asgard.isite.standardValuesForBlocksAttributes");

return [
    "sliderOwl" => [
        "title" => "Slider OWL",
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
            "itemComponentAttributes" => "isite::item-list",
        ],
        "attributes" => [
            "general" => [
                "title" => "General",
                "fields" => [
                    "layout" => [
                        "name" => "layout",
                        "value" => "slider-owl-layout-5",
                        "type" => "input",
                        "props" => [
                            "label" => "layout",
                        ]
                    ],
                    "autoplay" => [
                        "name" => "autoplay",
                        "value" => "true",
                        "type" => "select",
                        "props" => [
                            "label" => "Repetición automática",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ],
                    "margin" => [
                        "name" => "margin",
                        "value" => "0",
                        "type" => "input",
                        "props" => [
                            "label" => "Margen",
                            "type" => "number"
                        ]
                    ],
                    "autoplayHoverPause" => [
                        "name" => "autoplayHoverPause",
                        "value" => "true",
                        "type" => "select",
                        "props" => [
                            "label" => "Pausa en repetición automática",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ],
                    "loop" => [
                        "name" => "loop",
                        "value" => "true",
                        "type" => "select",
                        "props" => [
                            "label" => "Loop",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ],
                    "autoplayTimeOut" => [
                        "name" => "autoplayTimeOut",
                        "value" => "5000",
                        "type" => "input",
                        "props" => [
                            "label" => "Tiempo de espera del intervalo",
                            "type" => "number"
                        ]
                    ],
                    "stagePadding" => [
                        "name" => "stagePadding",
                        "value" => "0",
                        "type" => "input",
                        "props" => [
                            "label" => "Espaciado",
                            "type" => "number"
                        ]
                    ],
                    "responsiveClass" => [
                        "name" => "responsiveClass",
                        "value" => "false",
                        "type" => "select",
                        "props" => [
                            "label" => "Clase responsive",
                            "options" => $vAttributes["booleanValidation"]
                        ]
                    ],
                    /*"responsive" => [
                        "name" => "responsive",
                        "value" => [0 => ["items" => 0]],
                        "type" => "json",
                        'columns' => 'col-12',
                        "props" => [
                            "label" => "Responsive"
                        ]
                    ]*/
                ]
            ],
            "nav" => [
                "title" => "Navegacion (Nav)",
                "fields" => [
                    "nav" => [
                        "name" => "nav",
                        "value" => "true",
                        "type" => "select",
                        "props" => [
                            "label" => "nav",
                            "options" => $vAttributes["booleanValidation"]
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
                    "navText" => [
                        "name" => "navText",
                        "value" => ['<i class=\'fa fa-angle-left fa-2x text-white\'></i>','<i class=\'fa fa-2x fa-angle-right text-white\'></i>'],
                        "type" => "json",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "nav text",
                        ]
                    ],
                ]
            ],
            "dots" => [
                "title" => "Navegacion (Dots)",
                "fields" => [
                    "dots" => [
                        "name" => "dots",
                        "value" => "true",
                        "type" => "select",
                        "props" => [
                            "label" => "Dots",
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
                                ["label" => "Izquierda vertical", "value" => "left-vertical"],
                                ["label" => "Derecha vertical", "value" => "right-vertical"]
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
                ]
            ]
        ]
    ]
];
