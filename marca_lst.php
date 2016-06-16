<?
/* Indica que o arquivo não deve ficar em cache (força o seu reprocessamento)
*/
require_once(“classes/class.marcaRN.php”);
?>
<input name=”btnNovo” type=”button” value=”Nova Marca” onClick=”location.href=’marca_frm.php’” /><br><br>
<table width=”100%” align=”center” border=”1” bordercolor=”#
000000” cellpadding=”3” cellspacing=”0”>
<tr bgcolor=”#EAEAEA”>
<td>Código</td>
<td>Descrição</td>
<td>&nbsp;</td>
</tr>
<?
$lista = MarcaRN::getListaObjeto(“”,””);
foreach($lista as $oMarca){
?>
<tr>
<td><?=$oMarca->getCod()?></td>
<td><?=$oMarca->getDesc()?></td>
<td><input
name=”btnAlterar” type=”button” value=”Alterar” onClick=”location.href=’marca_frm.php?cod=<?=$oMarca->getCod()?>’” /></td>
</tr>
<?
}//foreach
?>
</table>
<?
//Libera objetos
unset($lista);
?>