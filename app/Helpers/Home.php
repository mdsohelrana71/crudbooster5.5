<?php

namespace App\Helpers;

class Home 
{
   public static function HomeWidgetsData(string $table = null) {

     $data  = \DB::table($table)->get();
     
     return $data;
     
   }

   public static function similar_blog() {

     $data  = \App\Blog::take(3)->get();
     
     return $data;
     
   }
}