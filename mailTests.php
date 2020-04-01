<?php

$document = new DOMDocument();
$document->loadHTMLFile("LOAD/PATH");
$handle = $document->getElementById('mail');

$h3 = $document->createElement('h3');
$document->appendChild($h3);
$h3->appendChild($document->createTextNode('Received messages'));
$o = imap_open('{smtp.gmail.com:993/ssl/novalidate-cert/service=imap}INBOX', 'YOUR MAIL HERE', 'YOUR PASSWORD HERE'); 
$messages = imap_fetch_overview($o, '1:100'); 
$info = imap_mailboxmsginfo($o);

$document->appendChild($document->createTextNode("No. of messages:".$info->Nmsgs."\n"));
$document->appendChild($document->createTextNode("Total size:".$info->Size."\n"));
$document->appendChild($document->createTextNode("Received date:".$info->Date."\n"));
$document->appendChild($document->createTextNode("Drivers:".$info->Driver."\n"));
$document->appendChild($document->createTextNode("No. of deleted messages:".$info->Deleted."\n"));
$document->appendChild($document->createTextNode("Unread messages".$info->Unread."\n"));

foreach($messages as $message){
         $document->appendChild($document->createTextNode("Subject:".$message->subject."\n"));
         $document->appendChild($document->createTextNode("Msg no.:".$message->msgno."\n"));
         $document->appendChild($document->createTextNode("Sender:".$message->from."\n"));
         $document->appendChild($document->createTextNode("Size:".$message->size."\n"));
}

echo $document->saveHTMLFile('SAVE/PATH');

imap_close($o);
