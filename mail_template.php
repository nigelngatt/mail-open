<?php

/**
 ** mail_template
**/
class mail_template{

public function __construct(){

$outerModule = new DOMDocument();
$mailModule = new DOMDocument();

/**
 ** ADD MODS
**/

/**
 ** INSERTION POINT
**/
$outerModule->loadHTMLFile('PATH\TO\SAVED\FOLDER\mail\mainMail.html');
$insertionPoint = $outerModule->getElementsByTagName('div')->item(0);

/**
 ** INSERTION DATA
**/
$mailModule->loadHTMLFile('PATH\TO\SAVED\FOLDER\mail\mail.html');
$insertionObject = $mailModule->getElementsByTagName('div')->item(0);

/**
 ** IMPORTING INSERTION DATA
**/
$outerImport = $outerModule->importNode($insertionObject, true);

/** 
 ** APPENDING INSERTION DATA
**/
$insertionPoint->appendChild($outerImport);

/**
 ** SAVING THE DOCUMENT
**/
echo $outerModule->saveHTMLFile('PATH\TO\\mail\mainMail.html');
}
}
/**
 ** INITIALIZING FUNCTION
**/
(new mail_template);
?>
