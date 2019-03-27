<?php

function flash($title, $message)
{
	
        session()->flash('flash_title', $title);
        session()->flash('flash_message', $message);  	
}

function sub_array(array $haystack, array $needle)
{
    return array_intersect_key($haystack, array_flip($needle));
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}