<?php
use Core\Response;
function dd($value)
{
   echo "<pre>";
   var_dump($value);
   echo "</pre>";
   die();
}
function isUrl($value)
{
   return $_SERVER["REQUEST_URI"] === $value;
}
function authorize($condition, $status = Response::FORBIDDEN)
{
   if (!$condition) {
      abort($status);
   }
}
function  base($path)
{
   return BASE_PATH . $path;
}
function view($path,$attributes=[])
{
   extract($attributes);
   require base("views/".$path);
}