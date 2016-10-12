<?php

/*
 * 
 */

$inputHidden = array(
    'url' => '',
    'email' => '',
    'nome' => ''
);
$attr = array(
    array(
        'id' => 'url',
        'class' => 'url'
    ),
    array(
        'id' => 'email',
        'class' => 'email'
    )//,
//    array(
//        'id' => 'nome',
//        'class' => 'nome'
//    ),
//    array(
//        'id' => 'data',
//        'class' => 'data'
//    )
//    ,
//    array(
//        'id' => 'hora',
//        'class' => 'hora'
//    ),
//    array(
//        'id' => 'seila',
//        'class' => 'seila'
//    )
//    ,
//    array(
//        'id' => 'vaiquevai',
//        'class' => 'vaiquevai'
//    )
);
echo addAttFormHidden(form_hidden($inputHidden), $attr);

function addAttFormHidden($strInput, $att)
{

    $arrInputsAux = $attAux = array();

    $arrInputs = isNull(explode('/>', trim($strInput)));
    if (count($att) > count($arrInputs) && count($arrInputs) != 0):
        die('Quantidade de <span style="color:red;">ATRIBUTOS</span> é maior que quantidade de <span style="color:red;">INPUTS</span');
    endif;

    if (is_array($att[0])):
        foreach ($att as $intKey => $arrValue):
            $arrInputsAux[$intKey] = addAttInputs($arrInputs[$intKey], attToString($arrValue, true)); //array final end
        endforeach;
    else:
        $arrInputsAux[0] = addAttInputs($arrInputs[0], attToString($att, true)); //array final end      
    endif;
    return arrayPushInput($arrInputs, $arrInputsAux);
}

function arrayPushInput($iniArrInput, $endArrInput)
{
    $qntIni = count($iniArrInput); //aumenta a quantidade 
    $qntEnd = count($endArrInput); // diminui a quantidade ao final
    for ($i = $qntEnd; $i <= $qntIni - 1; $i++):
        array_push($endArrInput, addAttInputs($iniArrInput[$i], null)); //adiciona valores no array $endArrInput
    endfor;
    return attToString($endArrInput);
}

function attToString($array, $returnAtt = false)
{
    $str = '';
    if (!$returnAtt):
        foreach ($array as $v):
            $str .= $v;
        endforeach;
    else:
        foreach ($array as $k => $v):
            $str .= $k . '=' . '"' . $v . '" ';
        endforeach;
    endif;
    return $str;
}

function addAttInputs($strInput, $strAtt)
{
    return implode('input ' . $strAtt, explode('input ', $strInput)) . '/>';
}

function isNull($inputs = array())
{
    if (empty($inputs)):
        return 'Erro inputs não e array!';
    endif;
    $arrInputs = array();
    foreach ($inputs as $value):
        if (!empty($value)):
            $arrInputs[] = $value;
        endif;
    endforeach;
    return $arrInputs;
}

function html_escape($var, $double_encode = TRUE)
{
    if (empty($var)) {
        return $var;
    }

    if (is_array($var)) {
        return array_map('html_escape', $var, array_fill(0, count($var), $double_encode));
    }

    return htmlspecialchars($var, ENT_QUOTES, 'utf-8', $double_encode);
}

function form_hidden($name, $value = '', $recursing = FALSE)
{
    static $form;

    if ($recursing === FALSE) {
        $form = "\n";
    }

    if (is_array($name)) {
        foreach ($name as $key => $val) {
            form_hidden($key, $val, TRUE);
        }

        return $form;
    }

    if (!is_array($value)) {
        $form .= '<input type="hidden" name="' . $name . '" value="' . html_escape($value) . "\" />\n";
    } else {
        foreach ($value as $k => $v) {
            $k = is_int($k) ? '' : $k;
            form_hidden($name . '[' . $k . ']', $v, TRUE);
        }
    }

    return $form;
}

function debug($v)
{
    var_dump($v);
}
