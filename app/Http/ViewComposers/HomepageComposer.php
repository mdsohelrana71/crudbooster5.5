<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;


class HomepageComposer
{
  
  public function compose(View $view) {

    $home_page_data  = \DB::table('home_page_info')->pluck('title', 'description');
   
    $view->with('page_info', $home_page_data);
  }

}