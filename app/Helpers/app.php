<?php 
if(!function_exists('clearNumber')){
    function clearNumber($number)
    {
        return str_replace([',', '.'], '', $number);
    }
}



?>