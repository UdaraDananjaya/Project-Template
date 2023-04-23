<?php
if (CONFIG['temp_eng']) {
    include 'App/libraries/Template_Engine/Template.php';
}
if (CONFIG['mail_lib']) {
    include 'App/libraries/Mail/mail.php';
}