<?php
require(‘class.conexaobanco.php’);
class AcessoBanco{
private $base = “revenda”;
private $conexao;
//método construtor
public function AcessoBanco(){
	//conexão com o banco de dados
$oConexaoBanco = ConexaoBanco::getInstancia();
$this->conexao = $oConexaoBanco->getConexao();
}

//método que retorna o valor do campo informado no parmetro
public function getValorCampo($paramCampo, $paramFrom, $paramWhere){
$valorCampo = “”;


//comando SQL que busca o valor do campo informado
$comandoSql
= “SELECT “ . $paramCampo . “ FROM “ . $paramFrom . “ WHERE “ . $paramWhere;
//executa o comando SQL no banco de dados
$resultado
= mysql_db_query ($this->base, $comandoSql, $this->conexao);
//pega a qtde de registros retornados
$qtdeRegistros = mysql_num_rows ($resultado);
if ($qtdeRegistros > 0) {
$valorCampo = mysql_result($resultado,0,$paramCampo);
}
return $valorCampo;
}

//método que seleciona registros no banco de dados
public function selectRegistro($paramTabela, $paramCampos, $paramCondicao = “”, $paramOrdenacao = “”){
//comando
SQL que seleciona os dados no banco de dados
$comandoSql
= “SELECT “ . $paramCampos . “ FROM “ . $paramTabela;
//inclui condio quando existir
if (!empty($paramCondicao)){
$comandoSql .= “ WHERE “ . $paramCondicao;
}
//inclui ordenação quando existir
if (!empty($paramOrdenacao)){
$comandoSql .= “ ORDER BY “ . $paramOrdenacao;
}
//executa o comando SQL no banco de dados
$resultado
= mysql_db_query ($this->base, $comandoSql, $this->conexao);
$i = 0;
$arrayRegistro = array();
//seta
o array de Registros com os registros retornados
while ($registro = mysql_fetch_array ($resultado)) {
$arrayRegistro[$i] = $registro;
$i++;
}
return $arrayRegistro;
}
//método que insere registros no banco de dados e retorna o último id inserido
public function insertRegistro($paramTabela, $paramCampos, $paramValores){
$id = 0;
//comando SQL que insere os dados no banco de dados
$comandoSql
= “INSERT INTO “ . $paramTabela . “ (“ . $paramCampos . “) VALUES(“ . $paramValores . “) “;
//executa o comando SQL no banco de dados
$resultado
= mysql_db_query ($this->base, $comandoSql, $this->conexao);
//verifica se deve ser retornado o id
$id = mysql_insert_id($this->conexao);
//verifica se teve erro no query
if (mysql_errno($this->conexao)){
echo mysql_error($this->conexao);
}
return $id;

//método que altera registros no banco de dados
public function updateRegistro($paramTabela, $paramCampos, $paramCondicao){
$resultado = 0;
//comando SQL que altera os dados no banco de dados
$comandoSql
= “UPDATE “ . $paramTabela . “ SET “ . $paramCampos . “ WHERE “ . $paramCondicao;
//executa o comando SQL no banco de dados
$resultado
= mysql_db_query ($this->base, $comandoSql, $this->conexao);
//verifica se teve erro no query
if (mysql_errno($this->conexao)){
echo mysql_error($this->conexao);
}
return $resultado;
}
//método que altera registros no banco de dados
public function deleteRegistro($paramTabela, $paramCondicao){
//comando SQL que apaga os dados no banco de dados
$comandoSql =
“DELETE FROM “ . $paramTabela . “ WHERE “ . $paramCondicao;
//executa o comando SQL no banco de dados
$resultado = mysql_db_query ($this->base, $comandoSql, $this->conexao);
}
}
?>