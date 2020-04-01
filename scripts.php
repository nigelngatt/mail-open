<?php
//scripts.php

//variables...
#$mailbox = '{localhost/host/25}';
#$mailbox = '{smtp.gmail.com:993/ssl/novalidate-cert/service=imap}INBOX'... works!
#$username = 'YOUR EMAIL';
#$password = 'YOUR PASSWORD';
#$options = OP_SECURE;
#$retries = 2;
#$ref = '';
#$pattern  = '*';
#$msglist = ''
#$options = CP_UID|CP_MOVE;
#$sequence = X:Y;
#$type;
#$encoding = 
#$charset = 'utf-8';
#$typeparams;
#$subtype;
#int $id;
#string $description;
#$dispositiontype;
#$disposition;
#$contentsdata;
#$lines;
#$bytes;
#$md5;

function open(){
    $o = imap_open($mailbox, $username, $password, $options, $retries);
}

function close(){
    imap_close($o);
}

function errors(){
    return imap_errors() || imap_last_error();
}

function create(){
imap_mail_compose(
$envelope = array(
$params,
"message_id"        =>  $msgid,
"custom_headers"    =>  $headers,
"reply_to"          =>  $recipient,
"date" 	            =>  $date,
"to"                =>  $to
));
/*body = array(
*type'	   	    =>  $type,
*encoding'	   	=>  $encoding,
*charset'	   	=>  $charset,
*type.parameters'	=>  $typeparams,
*subtype'		=>  $subtype,
*id'			=>  $id,
*description'	=>  $description,
*disposition.type'	=>  $dispositiontype,
*disposition'	=>  $disposition,
*contents.data'	=>  $contentsdata,
*lines'		=>  $lines,
*bytes'		=>  $bytes,
*md5'		=>  $md5,
)*/
}

function get(){
    imap_getmailboxes($o, $ref, $pattern);
}

function copy(){
    imap_mail_copy($o, $msglist, $mailbox, $options);
}

function move(){
    imap_mail_move($o, $msglist, $mailbox, $options);
}

function overview(){
    imap_fetch_overview($o, $sequence, $options);
}
?>
