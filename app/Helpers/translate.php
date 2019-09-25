<?php

// Translate
if (!function_exists('t')) {
  function t($key, $params = [])
  {
    $filePath = resource_path('/lang/' . config('app.locale') . '.json');

    if (!is_readable($filePath)) {
      return false;
    }

    $fileJson = file_get_contents($filePath);
    $result = json_decode($fileJson, true);
    $partKeys = explode('.', $key);

    foreach ($partKeys as $partKey) {
      if (!isset($result[$partKey])) {
        return $key;
      }
      $result = $result[$partKey];
    }

    if (!empty($params)) {
      foreach ($params as $key => $value) {
        $result = str_replace(':' . $key, $value, $result);
      }
    }

    return $result;
  }
}
