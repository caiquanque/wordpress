<?php

/**
* Dinh dang content
*            dong A
*			 dong B
*			 dong C
*/
function clean_br_in_string($string){
    return preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($string));
}