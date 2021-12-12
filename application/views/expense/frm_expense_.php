<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASE</title>

        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("#cbo_expense_name").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id;
                    $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo site_url("expense_detail/display_expense_item_detail"); ?>",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#cbo_expense_detail").html(html);
                                },
                                error: function (response) {

                                }
                            });
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
        <form class="formSale" action="<?php echo site_url("expense/save"); ?>" method="POST" id="form">
            <table width="100%" cellspacing="0" cellpadding="0" border="1" style="font-family: Calibri;font-size: 15px;">
                <tr>
                    <td colspan="2" class="form-title"><?php echo $lbl_title ?></td>
                </tr>
                <tr>
                    <td width="30%" class="v-align">
                        <table width="100%" class="table-form">
                            <tr>
                                <td colspan="2" class="form-note"><label class="star"> *</label><?php echo $lbl_note_for_form ?></td>
                            </tr>
                            <tr class="field-title hidden">
                                <td>Field</td>
                                <td>Field Value</td>
                            </tr>
                            <tr class="hidden">
                                <td>Expense Nº</td>
                                <td><input type="text" name="txtno" id="txtno" value="<?php echo $expense_no ?>"></td>
                            </tr>
                            <tr>
                                <td><?php echo $lbl_date_entry ?> <label class="star"> *</label></td>
                                <td>
                                    <input type="text" id="txt_date" name="txt_date" autocomplete="off" value="<?php echo date('Y-m-d') ?>" placeholder="yyyy-mm-dd">
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $lbl_expense_type ?><label class="star"> *</label>  </td>
                                <td>
                                    <select name="cbo_expense_name" id="cbo_expense_name" class="cbo-srieng">
                                        <option value="0">--expense type--</option>
                                        <?php
                                        foreach ($record_expense_name as $ren) {
                                            ?>
                                            <option value="<?php echo $ren->expense_type_id ?>"><?php echo $ren->expense_type_name ?></option>
                                            <?php
                                             }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $lbl_expense_detail ?> <label class="star"> *</label></td>
                                <td>
                                    <select name="cbo_expense_detail" id="cbo_expense_detail" class="cbo-srieng">
                                        <option value="0">--expense detail--</option>
                                        <?php
                                        foreach ($expense_detail_record as $en) {
                                            ?>
                                            <option value="<?php echo $en->expense_id ?>"><?php echo $en->expense_detail_name ?></option>
                                            <?php
                                              }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $lbl_amount ?>($) <label class="star"> *</label></td>
                                <td>
                                    <input type="text" id="txt_amount" name="txt_amount" placeholder="Amount" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $lbl_description ?>:</td>
                                <td>
                                    <textarea rows="0" name="txtDesc" style="width:100%"></textarea>
                                </td>
                            </tr>
                            <tr class="field-title">
                                <td colspan="2" style="text-align: right">
                                    <button name="btnSave" class="btn btn-xs btn-sad"  value="+Add"> <?php echo $btn_add ?> </button>
                                    <input type="reset" name="btnCacel" class="btn btn-xs btn-sad"  value="<?php echo $btn_cancel ?>" onclick="back()"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top;">
                        <table width="100%" class="table-form">
                            <tr>
                                <td colspan="2">
                                    <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="1">
                                        <thead>
                                            <tr style="background-color: #37773A;">
                                                <th><?php echo $lbl_no ?></th>
                                                <th><?php echo $lbl_expense_type ?></th>
                                                <th><?php echo $lbl_expense_detail ?></th>
                                                <th><?php echo $lbl_amount ?></th>
                                                <th><?php echo $lbl_date_entry ?></th>
                                                <th><?php echo $lbl_delete ?></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        foreach ($expense_detail_record as $edr) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $edr->expense_type_name ?></td>
                                                <td><?php echo $edr->expense_detail_name ?></td>
                                                <td><?php echo number_format($edr->expense_amount, 0) ?></td>
                                                <td><?php echo $edr->expense_created_date ?></td>
                                                <td class="delete-center"><a href="<?php echo site_url("expense/delete/" . $edr->expense_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right" colspan="2">
                                    <button  name="btnSave" value="Save" class="btn btn-sm btn-sad"/><?php echo $btn_save ?></button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>  
    </div>
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#txt_date").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
        <script type="text/javascript">
            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: 'purchase/searchproduct',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'product_table',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[0],
                                    value: code[0],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function (event, ui) {

                    var names = ui.item.data.split("|");
                    $('#txtpro_id').val(names[1]);

                }
            });

        </script> 

        <script type="text/javascript">
            $('#txt_supplier').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: 'supplier/search_supplier',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'supplier_table',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[0],
                                    value: code[0],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function (event, ui) {

                    var names = ui.item.data.split("|");
                    $('#txtsupplier_id').val(names[2]);

                }
            });

            function total() {
                document.getElementById("txtTotal").value = (document.getElementById("txtQty").value * document.getElementById("txtPrice").value);
            }
        </script>
    </body>
</html>
