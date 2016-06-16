<?
require_once(“classes/class.marcaRN.php”);
// verifica se é cadastro ou alteração
if (isset($_GET[“cod”])){
// alteração
$cod = $_GET[“cod”];
$oMarca = MarcaRN::getObjeto($cod);
} else {
// cadastro
$cod = 0;
$oMarca = new Marca();
}
$desc = $oMarca->getDesc();
//Libera objetos
unset($oMarca);
?>
<form method=”post” name=”frm” action=”marca_action.php”>
<table
width=”95%” align=”center” border=”0” cellpadding=”
0” cellspacing=”0”>
<tr>
<td width=”30%” align=”right”>Código: &nbsp;</td>
<td><input name=”cod” type=”text” size=”10” maxlength=”5” value=”<?=$cod?>” /></td>
</tr>
<tr>
<td width=”30%” align=”right”>Descrição: &nbsp;</td>
<td><input name=”desc” type=”text” size=”40” maxlength=”100” value=”<?=$desc?>” /></td>
</tr>
<tr>
<td width=”30%” align=”right”>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width=”30%”>&nbsp;</td>
<td>
<input
name=”btnSalvar” type=”Submit” value=”Salvar”>
<input
name=”btnCancelar” type=”button” value=”Cancelar” onClick=”location.href=’marca_lst.php’”>
<? if($cod > 0) { ?>
<input name=”btnApagar” type=”Submit” value=”Apagar” />
<? } ?>
</td>
</tr>
</table>
</form>