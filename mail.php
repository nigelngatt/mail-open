<?php

$document = new DOMDocument();
$document->loadHTMLFile("LOAD/PATH");

$h1 = $document->createElement('h1');
$h3 = $document->createElement('h3');
$a = $document->createElement('a');
$document->appendChild($a);
$document->appendChild($h3);
$document->appendChild($h1);
$h1->appendChild($document->createTextNode('Run, update, test and debug'));
$h3->appendChild($document->createTextNode('Received messages'));
$a->setAttribute('href', $_SERVER['PHP_SELF']);
$a->appendChild($document->createTextNode('Check for new mail'));
$o = imap_open('{smtp.gmail.com:993/ssl/novalidate-cert/service=imap}INBOX', 'YOUR EMAIL HERE', 'YOUR PASSWORD HERE'); 
$messages = imap_fetch_overview($o, '1:100'); 
$info = imap_mailboxmsginfo($o);

$document->appendChild($document->createTextNode("No. of messages:".$info->Nmsgs."\n"));
$document->appendChild($document->createTextNode("Total size:".$info->Size."\n"));
$document->appendChild($document->createTextNode("Receieved date:".$info->Date."\n"));
$document->appendChild($document->createTextNode("Driver:".$info->Driver."\n"));
$document->appendChild($document->createTextNode("No. of deleted messages:".$info->Deleted."\n"));
$document->appendChild($document->createTextNode("Unread messages".$info->Unread."\n"));

foreach($messages as $message){
         $document->appendChild($document->createTextNode("Subject:".$message->subject."\n"));
         $document->appendChild($document->createTextNode("Msg no.:".$message->msgno."\n"));
         $document->appendChild($document->createTextNode("Sender:".$message->from."\n"));
         $document->appendChild($document->createTextNode("Message-size:".$message->size."\n"));
}

echo $document->saveHTMLFile('SAVE/PATH');

imap_close($o);
