<?php

// // multi dim array subkey sort
// function subval_sort($a,$subkey) {
// 	if(is_array($a)){
// 	    foreach($a as $k=>$v) {
// 	        $b[$k] = strtolower($v[$subkey]);
// 	    }
// 	    if(is_array($b)) {
// 		    asort($b);
// 		    foreach($b as $key=>$val) {
// 		        $c[] = $a[$key];
// 		    }
// 	    	return $c;
// 	    } else {
// 	    	return $a;
// 	    }
// 	}
// }

// function in_arrayi($needle, $haystack) {
//     return in_array(strtolower($needle), array_map('strtolower', $haystack));
// }

// function strposa($haystack, $needle, $offset=0) {
//     if(!is_array($needle)) $needle = array($needle);
//     foreach($needle as $query) {
//         $query = trim($query);
//         if(strpos($haystack, $query , $offset) !== false) {
//             return true; // stop on first true result
//         }
//     }
//     return false;
// }
