<?php
    function getFirstAndLast($string) {
        $string = explode(" ", $string);

        if($string[0] != $string[count($string)-1]) {
            $firstAndLast = $string[0] . " " . $string[count($string)-1];
        } else {
            $firstAndLast = $string[0];
        }
        return $firstAndLast;
    }
?>