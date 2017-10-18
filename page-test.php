<?php require_once(dirname(__FILE__) . '/class/class-load.php'); ?>
<?php
    echo 'test1';
    global $Object_MIP;
    $currentUrl = $Object_MIP->return_current_url();
    echo $currentUrl;
    var_dump($Object_MIP->pushBDAndWriteLog(
        array('http://www.zhibaifa.com/post/80.html')
        ));