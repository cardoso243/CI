<?php

$ul = '<ul>'
        . '<li>Menu</li>'
        . '<li>Cor'
        .  '<ul>'
        .       '<li>Vermelho</li>'
        .   '</ul>'
        . '</li>'
        . '<li>Contato</li>'
        . '<li></li>'
        . '<li></li>'
        . '</ul>';
$cont =0;
$c = preg_replace('//','#',$ul);
print_r($c);

//$ul = array(
//    '<a href="">A</a>',
//    '<a href="">B</a>',
//    '<a href="">C</a>',
//    '<a href="">D</a>'
//);

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

$attrLi = array(
    'class' => 'list-group-item'
);
$attrUl = array(
    'class' => 'list-group'
);
//echo isArrayUl($ul);
//echo li($ul, $attrLi);
