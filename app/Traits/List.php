<?php

namespace App\Traits;


class List 
{
    /**
     * map list function
     */
    const MAP_LIST = 'mapList';
    
    /**
     * Return array
     * 
     */
     private function mapList($information)
     {
         return [ 'label' => $information->name, 'value' => $information->id ];
     }
}