<?php

function li($ul, $atributs)
{

    $ulAux = isArrayUl($ul);
    $atributsAux = '';
    if (is_array($atributs)):
        foreach ($atributs as $key => $value):
            $atributsAux .= $key . '=' . '"' . $value . '"' . ' ';
        endforeach;
    endif;
    return implode("<li $atributsAux", explode("<li", $ulAux));
}

function isArrayUl($ul)
{
    $lis = '';
    if (is_array($ul)):
        foreach ($ul as $values):
            $lis .= '<li>' . $values . '</li>' . "\n" . str_repeat("\t", 9);
        endforeach;
        return $lis;
    endif;
    return $ul;
}
