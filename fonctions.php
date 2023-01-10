<?php

  function get_recipes(array $recipes, int $limit) : array 
  {
    $valid_recipe = [];
    $counter = 0;

    foreach ($recipes as $recipe) {
      if ($counter = $limit) {
      return $valid_recipe;
      }
      $valid_recipe[] = $recipe;
      $counter++;
    }

    return $valid_recipe;
  }