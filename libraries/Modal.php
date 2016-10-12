<?php

/**
 * @author Adenilson C. da S. <cardoso.silva23@hotmail.com>
 * @version 1.0
 */
class Modal {

    /**
     * @var title string
     */
    private $title;

    /**
     * @var title string
     */
    private $sizes = null;

    /**
     * @var $remove_animation bool
     */
    private $remove_animation = false;

    /**
     * @var $data_target string
     */
    private $data_target;

    /**
     * @var $aria_labelledby string
     */
    private $aria_labelledby;

    /**
     * @var $aria_describedby string
     */
    private $aria_describedby;

    /**
     * @var  $body string
     */
    private $content_body;

    /**
     * @var $options string
     */
    private $options;

    /**
     * @var $footer string
     */
    private $content_footer;

    /**
     * @var $data_whatever string 
     *
     */
    private $data_whatever;

    /**
     * @var $backrop  bool Includes a modal-backdrop element. 
     * Alternatively, specify static for a backdrop which doesn't close the modal on click.
     */
    private $backdrop = true;

    /**
     * @var $keybord bool Closes the modal when escape key is pressed
     */
    private $keyboard = true;

    /**
     *
     * @var $show bool 	Shows the modal when initialized.
     */
    private $show = true;

    /**
     *
     * @var type $remote path 
     * @deprecated This option is deprecated since v3.3.0 and has been removed in v4. We 
     */
    private $remote = false;

    /** = 
     *
     * @var void vazio
     */
    private $void = '';

    public function __construct()
    {
        
    }

    private function create_modal()
    {
        echo $this->options;

        return '<div class="modal ' . $this->ternary(!$this->remove_animation, 'fade') . '"  '
                . $this->ternary($this->data_target, 'id="' . $this->data_target . '" ') .
                'tabindex="-1" role="dialog" ' . $this->options . '> <!-- div .modal -->
                    <div class="modal-dialog ' . $this->ternary($this->sizes, 'modal-' . $this->sizes) . '"  role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">' . $this->title . '</h4>
                        </div>
                        <div class="modal-body">
                          ' . $this->content_body . '
                        </div>
                        ' . $this->ternary($this->content_footer, //cria o footer caso não sejá vazio
                        '<div class="modal-footer">
                            ' . $this->content_footer . '
                         </div><!-- footer -->'
                ) . '                        
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->';
    }

    public function modal(array $attr)
    {
        $this->attr($attr);
        $this->create_modal();
    }

    private function ternary($check, $value)
    {
        if (!is_bool($check)):
            if (!empty($check)):
                return $value;
            endif;
        endif;
        return $check ? $value : $this->void;
    }

    private function attr(array $attr)
    {
        foreach ($attr as $key => $value):
            $this->isArrayOptions($value);
            $this->$key = $value;
        endforeach;
    }

    private function isArrayOptions($options)
    {
        if (is_array($options)):
            foreach ($options as $k => $v):
                is_string($v) ? $this->options .= 'data-' . $k . '=' . '"' . $v . '"' . "\n" :
                                $this->_error('Class:Modal options values ​​is not string', 8);
            endforeach;
        endif;
    }

    private function _error($msg, $code)
    {
        show_error($msg, $code);
    }

}
