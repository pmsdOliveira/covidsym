<?php
    function getFirstAndLast($string) {
        $string = explode(" ", $string);
        $firstAndLast = $string[0] . " " . $string[count($string)-1];
        return $firstAndLast;
    }
?>