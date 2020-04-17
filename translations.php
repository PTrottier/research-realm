<?php
function translate($language, $key)
{
    print translate_string($language, $key);
}

function translate_string($language, $key)
{
    $translation = parse_ini_file("translations.ini", true);
    return $translation[$language][$key];
}
?>