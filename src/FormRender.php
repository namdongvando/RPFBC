<?php

namespace PFBC;

class FormRender
{

    const Required = "required";
    const Readonly = "readonly";
    const Disabled = "disabled";
    const Placeholder = "placeholder";
    const Autofocus = "autofocus";
    const Autocomplete = "autocomplete";
    public $element;

    function __construct($element)
    {
        $this->element = $element;
    }

    public function render()
    {
        return $this->element->render();
    }

    public function renderHTML($tooltip = "", $placement = "top")
    {
        $label = $this->element->getLabel();
        $attrStr = $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        if ($tooltip != "") {
?>
<i class="fa fa-info" <?php echo self::ToolTip("$tooltip", $placement); ?> aria-hidden="true"></i>
<?php
        }
        // data-toggle="tooltip" data-placement="top"

        $htmlTemplate = <<<HTML
                <div class="form-group">
                    <label >$label <span style="color:red" >$required</span>
                                    $tooltip
                    </label>
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }
    function renderHtml2($tooltip = "", $placement = "top", $icon = 'glyphicon glyphicon-pushpin form-control-feedback')
    {
        $label = $this->element->getLabel();
        $attrStr = $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        if ($tooltip != "") {
?>
<i class="fa fa-info" <?php echo self::ToolTip("$tooltip", $placement); ?> aria-hidden="true"></i>
<?php
        }
        // data-toggle="tooltip" data-placement="top"

        $htmlTemplate = <<<HTML
                <div class="form-group has-success has-feedback">
                                    <label for="inputSuccess2" class="text-capitalize"><em>$label</em></label>
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo '<span class="' . $icon . '"></span>
        </div>';
    }
    public function renderHTMLIcon($icon)
    {
        $label = $this->element->getLabel();
        $attrStr = $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        $htmlTemplate = <<<HTML
                <div class="form-group">
                <label >$label <span style="color:red" >$required</span> </label>
                
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }
    static public function ToolTip($var, $placement = "top")
    {
        return 'data-toggle="tooltip" data-placement="' . $placement . '" title="' . $var . '"';
    }
    static public function ToolTipElement($var, $placement = "top")
    {
?>
<i class="fa fa-info" <?php echo self::ToolTip($var, $placement); ?> aria-hidden="true"></i>
<?php
    }

}