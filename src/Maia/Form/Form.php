<?php
namespace Maia\Form;


class Form
{
    private $elements=array();

    public function addElement($object)
    {
        $this->elements[] = $object;
    }


    public function createField($fieldType, $nameId)
    {
        switch ($fieldType)
        {
            case "textarea":
                $this->elements[] = $nameId . ": <textarea name='" . $nameId . "' id='" . $nameId . "' cols=30 rows=4></textarea>\n\n<br /><br />\n\n";
                break;
            case "input_text":
                $this->elements[] = $nameId . ": <input type=text name='" . $nameId . "' id='" . $nameId . "' size=20>\n\n<br /><br />\n\n";
                break;
            default:
                $this->elements[] =  "Erro obtendo elemento de nome/id " . $nameId . " do tipo " . $fieldType;
        }
    }



    public function render()
    {
        for ($i=0;$i<count($this->elements);$i++)
        {
            echo $this->elements[$i];
        }
    }

    
    // deprecated devido à fase 2
    public function renderFase1()
    {
        # Foi colocado no __construct
        # $html="<form>";
        $html="";

        for ($i=0;$i<count($this->elements);$i++)
        {
            switch ($this->elements[$i]->getType())
            {
                case "textarea":
                    $html.=$this->elements[$i]->getNameId() . ": <textarea name='" . $this->elements[$i]->getNameId() . "' id='" . $this->elements[$i]->getNameId() . "' cols=30 rows=4></textarea>\n\n<br /><br />\n\n";
                    break;
                case "input_text":
                    $html.=$this->elements[$i]->getNameId() . ": <input type=text name='" . $this->elements[$i]->getNameId() . "' id='" . $this->elements[$i]->getNameId() . "' size=20>\n\n<br /><br />\n\n";
                    break;
                default:
                    $html.="Erro obtendo elemento de nome/id " . $this->elements[$i]->getNameId() . " do tipo " . $this->elements[$i]->getType();
            }
        }

        $html.="<input type=submit value='Enviar'>\n\n";
        $html.="</form>\n\n<hr />\n\n";

        return $html;
    }


    public function __construct(Validator $v=null)
    {
        echo "<form>\n";
    }

    public function close()
    {
        echo "<input type=submit value=\"Enviar\">\n\n</form>\n\n<hr />\n\n";
    }

}