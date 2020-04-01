<?php
/*
* This file needs some work, but isn't required for opening and receiving mail
* Only for sending mail!
* I suggest you take a look at php.net for guidance
*/
?>

<?php $o = imap_open('{smtp.gmail.com:993/ssl/novalidate-cert/service=imap}INBOX', 'YOUR EMAIL HERE', 'YOUR PASSWORD HERE'); ?>

<?php

     $envelope["from"] = $_POST["from"]; //"EMAIL";
     $envelope["to"] = $_POST["to"]; //"EMAIL";
     $envelope["subject"] = $_POST["sub"]; //"Send a mail..";

     $body[] = array("type" => TYPEMULTIPART, "subtype" => "mixed");
     $body[] = array('type' => 0, 'encoding' => 0, 'subtype' => "PLAIN", 'description' => $_POST["message"], 'contents.data' => $_POST["message"]);

     //echo nl2br(imap_mail_compose($envelope, $body));
?>
<style>
label,input{display:block}
</style>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <label>From</label><input type="text" name="from" value="<?php $_POST['from'];?>">
    <label>To</label><input type="text" name="to" value="<?php $_POST['to'];?>">
    <label>Subject</label><input type="text" name="sub" value="<?php $_POST['sub'];?>">
    <label>Message</label><input type="text" name="message" value="<?php $_POST['message'];?>">
    <input type="submit" name="submit">
    <input type="reset" name="reset">
</form>

<?php imap_close($o); ?>
