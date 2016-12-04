<?php
/**
 * Retorno Itau
 *
 * Este Addon trata os arquivos de retorno do banco Itau para baixa via boleto bancario.
 *
 * @package    RetornoItau
 * @author     Weverton Velludo <wv@brasilnetwork.com.br>
 * @copyright  Copyright (c) Weverton Velludo 2015
 * @license    http://www.brasilnetwork.com.br
 * @version    $Id$
 * @link       http://www.brasilnetwork.com.br
 */

if (!defined("WHMCS")) die("This file cannot be accessed directly");

function retornoitau_config() {
    $configarray = array(
    "name" => "Retorno Itau",
    "description" => "Processamento de arquivos de retorno do banco Itau",
    "version" => "1.0",
    "author" => "Weverton Velludo",
    "language" => "portuguese_br",
    "fields" => array(
        "processar" => array ("FriendlyName" => "Processar baixa", "Type" => "yesno", "Size" => "25", "Description" => "Marque se quiser que o módulo processe a baixa do pagamento")
    ));
    return $configarray;
}

function retornoitau_activate() {

    # Create Custom DB Table
    $query = "CREATE TABLE `mod_retornoitau` (`id` INT( 1 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`chave` TEXT NOT NULL )";
    $result = full_query($query);

    $table = "mod_retornoitau";
    $values = array("id"=>1,"chave"=>null);
    $newid = insert_query($table,$values);

    # Return Result
    return array('status'=>'success','description'=>'Módulo ativado com sucesso');
}

function retornoitau_deactivate() {

    # Remove Custom DB Table
    $query = "DROP TABLE `mod_retornoitau`";
    $result = full_query($query);

    # Return Result
    return array('status'=>'success','description'=>'Módulo desativado com sucesso');
}

function retornoitau_upgrade($vars) {

}

function retornoitau_output($vars) {

    $modulelink = $vars['modulelink'];
    $version = $vars['version'];
    $option1 = $vars['option1'];
    $option2 = $vars['option2'];
    $option3 = $vars['option3'];
    $option4 = $vars['option4'];
    $option5 = $vars['option5'];
    $LANG = $vars['_lang'];
	
    // Para maior organização aqui é feito o include da classe
    require_once(dirname(__FILE__) . "/sistema.php");
}
