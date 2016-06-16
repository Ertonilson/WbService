<?
require_once(“classes/class.marcaRN.php”);
//Carrega ou cria objeto
if (isset($_POST[“cod”])){
$cod = $_POST[“cod”];
$oMarca = MarcaRN::getObjeto($cod);
}
//variavel booleana que irá verificar se é um novo registro
$ehNovoRegistro = false;
//caso não exista o objeto cria um novo objeto pois é um novo registro
if(empty($oMarca)){
$oMarca = new Marca();
$ehNovoRegistro = true;
}
//Verifica se foi clicado no botão apagar
if ((isset($_POST[“btnApagar”])) && ($_POST[“btnApagar”] == “Apagar”)){
if ($cod > 0){
MarcaRN::delObjeto($oMarca);
}
}else{
$oMarca->setCod($_POST[“cod”]);
$oMarca->setDesc($_POST[“desc”]);
if ($ehNovoRegistro){
// adiciona o registro
MarcaRN::addObjeto($oMarca);
} else {
//altera o registro
MarcaRN::alterObjeto($oMarca);
}
}
unset($oMarca);
header(“location:marca_lst.php”)
?>