<?php
/**
 * Created by PhpStorm.
 * User: aminelahrim
 * Date: 20/03/2018
 * Time: 20:22
 */

namespace Core\HTML;

class BootstrapForm extends Form
{


    public function input($name, $label, $option = [], $placeholder = "", $other = "", $regx = "")
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        $label = '<label>' . $label . '</label>';


        if ($type === 'textarea') {
            $input = '<textarea ' . $other . '  class="form-control" name="' . $name . '">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input placeholder="' . $placeholder . '" ' . $other . '  type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"/>';
        }
        return $this->surrond($label . $input);

    }

    protected function surrond($html)
    {
        return "<div class='form-group'>{$html}</div>";
    }

    public function select($name, $label, $options = [], $other = "")
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select ' . $other . ' class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {

            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k' $attributes >$v</option>";
        }
        $input .= '</select>';
        return $this->surrond($label . $input);

    }

    public function submit($name = 'Envoyer')
    {

        return $this->surrond('<button type="submit" class="btn btn-primary">' . $name . '</button>');
    }

}