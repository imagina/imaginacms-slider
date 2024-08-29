<?php

$transPrefix = "slider::gamification";

return [
  "categories" => [],
  "activities" => [
    [
      'systemName' => 'admin_home_actions_createSlider',
      'title' => "$transPrefix.activities.createSlider",
      'description' => "$transPrefix.activities.createSliderDescription",
      'type' => 1,
      'url' => "iadmin/#/slider/index",
      'permission' => 'slider.sliders.manage',
      'categoryId' => 'admin_home_actions',
      'icon' => 'fa-light fa-rectangle-vertical-history',
      'roles' => []
    ],
  ],
];
