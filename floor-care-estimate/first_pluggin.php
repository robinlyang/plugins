<?php

/* 
 Plugin Name: Robin's first Widget
 Plugin URI: https://robinyang.me/
 Description: This is a plugin
 Author: Robin Yang
 Verions: 1.0
 Author URI: https://robinyang.me/

Robin's first Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Robin's first Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

/*TEST*/

function test() {
    //$loginPage = "/login/";
    //$currentPage = $_SERVER['REQUEST_URI'];
    if(is_page(6229))
    {
        echo 'WORKED';
    }
    else 'TEST';
    
}

add_filter('the_content', 'test');

?>