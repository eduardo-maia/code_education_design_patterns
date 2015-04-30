<?php
namespace Maia\Form;


class Fieldset
{
    private $legend="";


    function setLegend($legend)
    {
        $this->legend = $legend;
    }


    function render($html)
    {
        return "<fieldset>$html</fieldset>\n";
    }

    function close()
    {
        return "</fieldset>";
    }


    function getOpenedAndLegend()
    {
        return "<fieldset><legend>" . $this->legend . "</legend>";
    }

}