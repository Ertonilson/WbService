<html>
<head>
<title>Revenda de Automóveis</title>
<meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1”>
</head>
<body>
<?
//inclui as classes
require_once(“classes/class.marcaRN.php”);
require_once(“classes/class.modeloRN.php”);
require_once(“classes/class.automovelRN.php”);
?>
<form name=”form1” method=”post”>
<table width=”100%” border=”0” cellpadding=”0” cellspacing=”0”>
<tr>
<td width=”20%” valign=”top”>
<!-- seleção de marcas e modelos -->
Marcas:
<select name=”marca_cod” onChange=”document.form1.submit();”>
<option
value=”0”>Selecione a Marca</option>
<?
$marca_cod=0;
if(isset($_POST[‘marca_cod’])){
$marca_cod = $_POST[‘marca_cod’];
}
$lista = MarcaRN::getListaObjeto(“”,””);
foreach($lista as $oMarca){
?>
<option value=”<?=$oMarca->getCod()?>” <? ($marca_cod==$oMarca->getCod())?print “selected”:print “”; ?> ><?=$oMarca->getDesc()?></option>
<?
}
?>
</select>
<br><br>
Modelos:
<select name=”mod_cod” onChange=”document.form1.submit();”>
<option
value=”0”>Selecione o Modelo</option>
<?
$condicao = “”;
if(isset($_POST[‘marca_cod’])){
$condicao = “ marca_cod = “ . $_POST[‘marca_cod’];
}
$mod_cod=0;
if(isset($_POST[‘mod_cod’])){
$mod_cod = $_POST[‘mod_cod’];
}
print $condicao . “<br>”;
$lista
= ModeloRN::getListaObjeto($condicao,””);
foreach($lista as $oModelo){
?>
<option value=”<?=$oModelo->getCod()?>”
<? ($mod_cod==$oModelo->getCod())?print “selected”:print “”; ?> ><?=$oModelo->getDesc()?></option>
<?
}
?>
</select>
</td>
<td width=”5%”>&nbsp;</td>
<td>
<!-- lista de automótveis -->
<table width=”100%” align=”center” border=”1” bordercolor=”#000000” cellpadding=”3” cellspacing=”0”>
<tr bgcolor=”#EAEAEA”>
<td>Placa</td>
<td>Ano</td>
<td>Preco</td>
</tr>
<?
$condicao = “ mod_cod = “ . $mod_cod;
$lista
= AutomovelRN::getListaObjeto($condicao,””);
foreach($lista as $oAutomovel){
?>
<tr>
<td><?=$oAutomovel->getPlaca()?></td>
<td><?=$oAutomovel->getAno()?></td>
<td><?=$oAutomovel->getPreco()?></td>
</tr>
<?
}//foreach
?>
</table>
</td>
</tr>
</table>
</form>
</body>
</html>