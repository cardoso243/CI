# CodeIgniter
## Helpers e Libraries
Funções helper e libraries do codeIngniter 2.x a 3.x
##Form Helper
Arquivo: [addAttFormHidden_helper.php](https://github.com/cardoso243/CI/blob/master/addAttFormHidden_helper.php)
Adicionar os atributos para cada hidden.
```php
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
    )
);
    echo addAttFormHidden(form_hidden($inputHidden), $attr);
    /*
    <input id="url" class="url" type="hidden" name="url" value="" />
    *<input id="email" class="email" type="hidden" name="email" value="" />
    *<input type="hidden" name="nome" value="" />
    */
      $inputHidden = array(
             'url' => ''
     );
    $attr = array(
        'id' => 'url',
        'class' => 'url'
    );
     echo addAttFormHidden(form_hidden($inputHidden), $attr);
      /*
    <input id="url" class="url" type="hidden" name="url" value="" />
    */
```
###HTML Helper 

Arquivo: [li-helper.php](https://github.com/cardoso243/CI/blob/master/li-helper.php)
Adicionar os atributos para cada li dos ul ou ol.

```php
 $attrLi =  array(
    'class'=>'list-group-item'
 );
 $listUl =array(
        'red',
        'blue',
        'green',
        'yellow'
);
 $attrUl = array(
  'class'=>'list-group'
 );
 echo li(ul($listUl,$attrUl),$attrLi);
 /*
 *<ul class="list-group">
 *  <li class="list-group-item" >red</li>
 *  <li class="list-group-item" >blue</li>
 *  <li class="list-group-item" >green</li>
 *  <li class="list-group-item" >green</li>
 *</ul>
 */
```

##Libraries

###Modal libraries
Arquivo: [Modal.php](https://github.com/cardoso243/CI/blob/master/libraries/Modal.php)
```php
//config/autoload.php
//$autoload['libraries'] = array('modal')
   $attrBtn = array(
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#myModal'
        );
        echo form_button($attrBtn, 'info');
        $attrMdl = array(
            'title' => 'Modal 01',
            'data_target' => 'myModal',
            'sizes' => 'lg',
            'content_body' => 'Bootstrap',
            'content_footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>',
            'optios' => array(
                'backdrop' => 'false',
                'keyboard' => 'false'
            )
        );
        echo $modal->modal($attrMdl);
```
<p>Resultado</p>
![modal](https://cloud.githubusercontent.com/assets/9054137/19333126/5181d420-90c9-11e6-9c2c-0552c6c46e3d.jpg)
