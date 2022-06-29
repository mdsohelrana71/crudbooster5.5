<?php
function menuActive($route_name)
{
    return Route::currentRouteName() == $route_name ? 'active' : '';
}


function print_value($data,$value=null){
    return $data==null?'placeholder=" You can only enter the '.$value.' only"':'value="'.$data.'"';
}
