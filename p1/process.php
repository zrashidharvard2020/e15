<?php
session_start();
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

function isBigWord($inputString){
    if(strlen($inputString) > 7){
        return "Yes";
    } else{
        return "No";
    }
}

$inputString = $_POST['inputString']; 

$_SESSION['results'] = [
    'inputString' => $inputString,
    'isBigWord' => isBigWord($inputString),
    'isPalindrome' => isPalindrome($inputString),
    'vowelCount' => vowelCount($inputString),
];

header('Location: index.php');