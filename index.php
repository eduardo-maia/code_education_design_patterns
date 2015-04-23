<html>
<body>

<?php
error_reporting(E_ALL);


# -----------------------------
# AUTOLOAD
# -----------------------------
define('CLASS_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR);
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(function($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = CLASS_DIR . $path . '.php';
    if (is_file($file)) {
        require_once($file);
    } else {
        throw new \ErrorException("Could not load class {$className}. File not found: {$file}");
        die();
    }
});


# -----------------------------
# GERA O FORMULÁRIO DA FASE 1
# -----------------------------
use Maia\Form\Form;

$f = new Maia\Form\Form();
$f->addElement(new Maia\Form\InputText("Email"));
$f->addElement(new Maia\Form\InputText("Assunto"));
$f->addElement(new Maia\Form\TextArea("Mensagem"));
print $f->render();



# ------------------------------------------------------------------------------------
# FASE 2: "Crie 4 instancias deste form com os campos que você quiser e renderize."
# ------------------------------------------------------------------------------------

$f = new Maia\Form\Form();
$input = new Maia\Form\InputText("Manager");
$input->createField();
$input = new Maia\Form\InputText("Registry");
$input->createField();
$input = new Maia\Form\TextArea("Como anda seu ingles");
$input->createField();
$f->close();


$f = new Maia\Form\Form();
$input1 = new Maia\Form\InputText("Nome");
$input1->createField();
$input2 = new Maia\Form\InputText("Telefone");
$input2->createField();
$input3 = new Maia\Form\TextArea("Comentarios");
$input3->createField();
$f->close();


$f = new Maia\Form\Form();
$input1 = new Maia\Form\InputText("Facebook");
$input1->createField();
$input2 = new Maia\Form\InputText("Twitter");
$input2->createField();
$input2 = new Maia\Form\InputText("LinkedIn");
$input3->createField();
$f->close();

?>

</body>
</html>
