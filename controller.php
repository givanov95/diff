<?php
session_name("diff");
session_start();


if (isset($_POST['text1'])) {

    $_SESSION['unique'] = 0;

    function clean($string) {
        $string = mb_strtolower($string, 'UTF-8');
        $string = str_replace( array( '\'', '–', '-', '*', '!', '.', '?', ':', '"',
        ',', ';', '<', '>', '(', ')' ), '', $string);
        return $string;
     }
    
    $string_to_split = clean($_POST['text1']);
    $stringexploded=explode(" ",$string_to_split);
    $string_five=array_chunk($stringexploded, 4);
    
    for ($x=0;$x<count($string_five);$x++){
        $needles[] =  implode(" ",$string_five[$x]);
    }
    
    $text =  ' '.clean($_POST['text2']);
    
    $text2 = $text;
    
    foreach ($needles as $value) {
        if (strpos($text, $value)) {
            $match[] = $value;
            $text2 = preg_replace('/'.$value.'/', '<span class="text-danger font-weight-bold">'.$value.'</span>', $text2, 1);
        }
    }
    
    $text_words = count(preg_split('/\s+/', $text));

    if (is_array($match) && count($match) > 0) {
        $unique = (count($match) * 4) / $text_words * 100;
        $_SESSION['unique'] = number_format($unique, 0).'%';
    }

    $_SESSION['text1'] = $_POST['text1'];
    $_SESSION['text2'] = $_POST['text2'];
    $_SESSION['final_diff'] = $text2;

    header("Location: /");
}