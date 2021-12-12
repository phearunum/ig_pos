
<?php
    foreach($company_profile as $com){
?> 
<table width='100%' height='100%' style='text-align: center;margin-top: 10%' align='center'>
    <tr>
        <td style="font-family: Highpoint; font-size: 40px;color:#000080;font-weight: bold">
            <?php
                echo $com->company_profile_name;
            ?>
        </td>
    </tr>
    <tr>
        <td><img src="<?php echo base_url('img/company/'.$com->company_profile_image);?>" width="200px"/></td>
    </tr>
</table>
<?php
  }
?>

