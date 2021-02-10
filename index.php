<?php
    function isPalindrome($inputString){
       
        // check palindrome
        $isPalindrome = "";

        $tempString = strtolower(preg_replace("/[^A-Za-z0-9]/","",$inputString));
    
        if ($tempString == strrev($tempString)){
            $isPalindrome = "Yes";
        } else{
            $isPalindrome = "No";
        }

        return $isPalindrome;
    }

    function vowelCount($inputString){
        // count vowels
        return $vowelsCount = preg_match_all('/[aeiou]/i',$inputString);
    }

    require "index-view.php";
?>

            