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
        <form method="POST" class="formSale" id="form" action="<?php echo site_url("wholesale/update_edit"); ?>">
        <table align="center" style="font-size:20px;font-family: arial;margin-top: 10%;background-color: #DDDDDD">
            <?php
                foreach($records as $r){
            ?>
            <tr>
                <td>Item Name: </td>
                <td>
                    <input type="text" style="color:#900;font-weight: bold;font-size:20px" id="txtItemName" readonly name="txtItemName" class="colorblack" value="<?php echo $r->productname ?>" />
                </td>
            </tr>
            <tr>
                <td>Price($): </td>
                <td>
                    <input type="number " style="color:#900;font-weight: bold; font-size:20px" id="txtPrice" onfocus="selectprice()" name="txtPrice" class="colorblack" value="<?php echo $r->PRICE ?>" />
                </td>
            </tr>   
            <tr>
                <td>Edit Quantity: </td>
                <td>
                    <input type="number " style="color:#900;font-weight: bold; font-size:20px" id="txtaddqty" onfocus="selectqty()" name="txtaddqty" value="<?php echo $r->qty ?>" />
                </td>
            </tr>
            <tr style="display: none;">
                <td>Old Quantity: </td>
                <td>
                    <input type="number " style="color:#900;font-weight: bold; font-size:20px" id="txtoldqty" onfocus="selectqty()" name="txtoldqty" value="<?php echo $r->qty ?>" />
                    
                </td>
            </tr>
            <tr style="display: none;">
                <td>Discount($): </td>
                <td>
                    <input type="number " style="color:#900;font-weight: bold; font-size:20px" id="txtDiscount" onfocus="selectdiscount()" name="txtDiscount" class="colorblack" value="<?php echo $r->discount ?>" />
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    <input type="text" id="txtId" name="txtID" placeholder="Input id" class="form-control" required="1" value="<?php echo $r->id ?>" style="display: none">
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    <input type="text" id="txtproId" name="txtproId" placeholder="Input proid" class="form-control" required="1" value="<?php echo $r->proid ?>">
                </td>
            </tr>
            <tr>
                <td style="text-align:right" colspan="2">
                    <input type="submit" name="btnPay"   value="OK" class="colorblack">
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        </form>
        <script type="text/javascript">
            function selectqty(){
                $("#txtaddqty").select();
            }
            function selectdiscount(){
                $("#txtDiscount").select();
            }
            function selectprice(){
                $("#txtPrice").select();
            }
        </script>
    </body>
</html>
