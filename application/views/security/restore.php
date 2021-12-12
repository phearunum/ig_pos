<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo site_url('security/restoredata'); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="datafile" id="datafile">
            <input type="submit" name="btnsubmit" id="btnsubmit" value="restore"/>
        </form>
    </body>
</html>
