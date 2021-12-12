<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url("css/cafe/calculator.css"); ?>">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
        <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 1px blue ;
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
    </style>
        <style>
       
            .highlight { background-color: #666666; }            
            .td{
                padding-top:20px;
                padding-right: 5px;
            }
           
            .button-sear{
                height: 50px !important;
                width: 100px !important;
                border-radius: 10px;
                background-color: #13224B;
                color : white;
                text-align: center;
            }
            .button-sear-cal{
                height: 50px !important;
                width: 50px !important;
                border-radius: 10px;
                background-color: #13224B;
                color : white;
                text-align: center;
            }
            .select-sear{
               /* // margin: 10px 0 0 10px; */
                font-size: 18px;
                border: 1px solid #13224B;
                border-radius: 4px;
                width:100%;
                margin-top: 5px;
            }
            .calculator-sear{
                margin: 0 auto;
                padding: 0 0;
                width: 250px;
                background-color: white;
                border-radius: 25px;
                box-shadow: 0px 0px 0px 0px #0000;
            }
            
            .input-sear{
                margin: 10px 0 0 0;
                display: block !important;
                border: 1px solid #13224B !important;
                border-radius: 4px !important;
                padding-top: 6px !important;
                padding-bottom: 6px !important;
                font-size: 16px !important;
                line-height: 1.428571429 !important;
                vertical-align: middle !important;
                text-align: center !important;
            }
            .modal-footer{
                margin-top: 0px;
            }
            .center{
                width: 150px;
                  margin: 40px auto;
                  
            }
            #btn_cal{
                width: 75px;
                height: 60px;
                line-height: 40px;
                font-size: 18px;
            }
           .item{
            height: 30px;
            font-size: 14px;
            padding: 10px;
            line-height: 16px;
           }
           .tbl{
            margin-left: 14px;
           }
           .color-red{
                color: red
            }
            .color-blue{
                color: blue
            }
            @media only screen and (max-width: 1024px){
                .btn-xscc{
                    padding: 6px;
                }
                .input-xscc{
                    padding-right: 2px;
                    padding-left: 2px;
                }
            }
         
        </style>
        <script type="text/javascript" src="<?php echo base_url('js/numeral/numeral.js');?>"></script>
    </head>
    <body>
      <div id="frm_move_table" class="modal_form">
        <!-- Modal content -->
            <div class="modal-content-form" style="height: 90%;">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_move_table')">X</span>
                    <!--<h2>Move Table</h2>-->
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="overflow-x: auto; width:98%; margin:0; padding:0px 10px;">
                        <div class="tab" id="floor" style="height: 70px;">
                
                        </div>
                    </div>
                    <div id="table" style="overflow: auto; min-height: 100%; max-height: 100%; padding:3px 0px;">            
                    </div>
                </div>
            </div>
        </div>
<!-- marge -->
        <div id="frm_merge_table" class="modal_form">
            <div class="modal-content-form" style="height: 90%; top: -50px;">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_merge_table')">X</span>
                </div>
                <div class="vertical_tab" id="frm_merge_table_list">

                </div>
                <div id="frm_merge_table_data_order" class="vertical_tabcontent">
                    <table id="table_marge_list" class="table-table-form_order" width="100%">
                        <thead>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Note</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>%</th>
                            <th>$</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" id="frm_merge_table_table_selected" style="overflow: auto; height: 110px; padding: 6px 3px 0px 3px;">
                
                </div>
            </div>
        </div>
        <!-- end marge -->
        <div id="frm_split_table" class="modal_form">
            <div class="modal-content-form" style="height: 90%;">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_split_table')">X</span>
                </div>
                <div class="vertical_tab" id="frm_split_table_floor" style="padding: 0px 3%;width: 20%;">

                </div>
                <div class="vertical_tabcontent" id="frm_split_table_data_order" style="width: 80%;min-height: 70%;">
                    <table id="table_split_table_list" class="table-table-form_order" width="100%" >
                        <thead>
                            <th></th>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Note</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>%</th>
                            <th>$</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>                   
                        </tbody>
                        
                    </table>
                
                </div>
                <div class="modal-footer" id="frm_split_table_table" style="overflow: auto; height: 110px; padding: 6px 3px 0px 3px;">
                
                </div>
            </div>
        </div>
        <div id="frm_split_invoice" class="modal_form">
            <div class="modal-content-form" style="height: 90%;">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_split_invoice')">X</span>
                </div>
                <div class="vertical_tabcontent" id="frm_split_invoice_data_order" style="width: 100%;min-height: 90%;">
                    <table id="table_split_invoice_list" class="table-table-form_order" width="100%">
                        <thead>
                            <th></th>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Note</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>%</th>
                            <th>$</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" id="frm_split_invoice_footer" style="font-size:25px;">
                   
                </div>
            </div>
        </div>

        <div id="frm_sale_return" class="modal_form">
            <div class="modal-content-form" style="height: 90%;">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_sale_return')">X</span>
                </div>
                <div class="vertical_tabcontent" id="frm_sale_return_data_order" style="width: 100%;min-height: 90%;">
                    <table id="table_sale_return_list" class="table-table-form_order" width="100%">
                        <thead>
                            <th></th>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Note</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>%</th>
                            <th>$</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" id="frm_sale_return_footer" style="font-size:25px;">
                   
                </div>
            </div>
        </div>
        <!--End Form Modal-->
    
        <div class="col-lg-12 col-md-12 col-sm-12" id="navigate_left" style="padding-left: 0;padding-right: 0">
            <!--Panel left-->
            <div class="col-lg-5 col-md-5 col-sm-5" style="border-right:solid 2px #333333;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="btn btn-primary" type="button" onclick="table_order()" style="border-radius: 0px 0 30 0px;"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Back</button>
                         <button class="btn btn-danger hidden" type="button" onclick="openModal('frm_sale_return')" style="border-radius: 0px 0 30 0px;"><i class="fa fa-level-down"></i>&nbsp;&nbsp;Return</button>
                        
                        <label id="table_name" style="float: right;font-weight: bold;">Table:</label>
                        <div class="row">
                            <style type="text/css">
                                #panel_order_item_header::-webkit-scrollbar {
                                    width: 0px;
                                    background: transparent; 
                                }
                                #panel_order_item_header::-webkit-scrollbar-thumb {
                                    background-color: transparent;
                                }
                            </style>
                            <div class="col-lg-12 col-md-12 col-sm-12"  id="panel_order_item_header" style="overflow-x: auto;">
                                <table class="table_order" style="min-width: 400px">
                                    <thead>
                                        <tr style="background-color: #84a5fb;">
                                            <th><input type="checkbox" class="check-box-main" value="1111" id="check-box-all"></th>
                                            <th style="width: 129px">Item</th>
                                            <th style="width: 60px">Price</th>
                                            <th class="text-center" style="width: 139px">Qty</th>
                                            <th style="width: 59px">Dis(%)</th>
                                            <th style="width: 51px">Dis($)</th>
                                            <th style="width: 56px">Amount</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 " id="panel_order_item" style="height: 265px;overflow-x: auto;">
                                <div id="panel_order">
                                    <table id="table_order" class="table_order" style="min-width: 400px">
                                        <thead style="/*visibility: collapse;*/">
                                            <tr style="background-color: #84a5fb;visibility: collapse;">
                                                <th></th>
                                                <th style="width: 129px">Item</th>
                                                <th style="width: 60px">Price</th>
                                                <th class="text-center" style="width: 139px">Qty</th>
                                                <th style="width: 59px">Dis(%)</th>
                                                <th style="width: 51px">Dis($)</th>
                                                <th style="width: 56px">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        </tbody>
                                    </table>
                                </div>
                                <div id="bottom_anchor"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8" style="text-align:right;border-top: solid #333333 2px; font-size: 10px;">
                                
                    <div class="row">
                        <label class="item_list_total item_nest"><b>Total</b></label><label id="p_sign" style="font-weight: bold;" class="item_nest"></label><label class="item_list_total item_nest"><b>:</b></label><label class="item_list_total" id="p_sign" style="font-weight: bold">$ </label><label class="item_list_total item_nest" id="p_total" style="font-weight: bold">0.00</label>
                    </div>
                    <div class="row">
                        <label class="item_nest"><b>Discount</b></label><label id="p_sign" style="font-weight: bold;" class="item_nest"></label><label class="item_nest"><b>:</b></label><label class="item_nest" id="p_sign" style="font-weight: bold">$ </label><label class="item_nest" id="p_dis" style="font-weight: bold">0.00</label>
                    </div>
                    <div class="row">
                        <label class="item_nest"><b>Discount</b></label><label id="lbl_dis_all" style="font-weight: bold;" class="item_nest"></label><label class="item_nest"><b> % :</b></label><label class="item_nest" id="p_sign" style="font-weight: bold">$ </label><label class="item_nest" id="p_dis_all" style="font-weight: bold">0.00</label>
                    </div>
                    <div class="row">
                        <label class="item_nest"><b>Tax</b></label><label id="lbl_tax" style="font-weight: bold;" class="item_nest"></label><label class="item_nest"><b> % :</b></label><label class="item_nest" id="p_sign" style="font-weight: bold">$ </label><label class="item_nest" id="p_tax" style="font-weight: bold">0.00</label>
                    </div>
                    <div class="row">
                        <label class="item_list_grand_total"><b>Grand Total: $ </b></label> <label class="item_list_grand_total" id="p_grand_total" style="font-weight: bold"> 0.00</label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row" style="border-top:solid #009933 2px;"> 
                    <div class="col-lg-12 col-md-12 col-sm-12" id="panel_caculater">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button">Note</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button root" onclick="openModal('frm_move_table')">Move</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button backspace" onclick="openModal('void')">Void</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button plus-minus" onclick="openModal_dis('frm_discount_dollar')" >Dis$</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button" onclick="openModal_dis('frm_discount_percent')">Dis%</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button" onclick="openModal_dis('frm_discount_invoice')">DisInv</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button inverse hidden" onclick="openModal('frm_merge_table')">Merge</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button pi hidden" onclick="confirm_split()" >Split</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button">Del</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button id="btn-payment-form" class="btn-lg btn-block btn-smile button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#">Pay
                                    </button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3">
                                    <button class="btn btn-lg btn-block btn-smile button hidden">Order</button>
                                </div>
                                <div class="btn-col col-md-2 col-sm-3 hidden">
                                    <button class="btn btn-lg btn-block btn-smile button" onclick="load_data('bill')">Bill</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-7 col-sm-7">
                <div clsss="row" id="panel_path">
                    <div class="col-lg-4 col-md-4 col-sm-4" style="">
                        <button type="button" name="btn_" id="btn_home" onclick="go_to_admin()"><i class="fa fa-fw fa-lg fa-home"></i><i class="fa fa-fw fa-lg fa-angle-right" id="angle_right"></i><label id="lbl_category" style="margin-bottom: 0"></label>
                        </button>

                        
                        <input type="hidden" id="txt_master_id">
                        <input type="hidden" id="txt_exchange_rate">
                        <label hidden="" id="lbl_master_id" style="padding: 0% 0% 0% 10%;color: #13224B; font-size:17px;"></label>
                        <input type="hidden" name="txt_table_id" id="txt_table_id" value="<?php echo $table_id;?>" placeholder="table_id">
                        <div class="clearfix"></div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-4" style="">
                         <label style="font-size: 20px;color: red;font-weight: bold;">Sale Offline</label>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-4" style="">
                         <input type="text" name="scan_barcode" id="scan_barcode" class="pull-right form-control" style="width: 200px;border-radius: 20px" placeholder="Scan Barcode...">
                     </div>
                </div>
                <div class="category-scroller">
                    <div id="category_body">
                    
                    </div>
                </div>
                <div class="row">
                    <div class="tab_cate" id="cate_layout" style="padding:10px 0px 0px 15px;">

                    </div>
                </div>
            </div>
        </div>
        <!--End panel left-->


        <!--Modal Discount Percent-->
        <div id="frm_discount_percent" class="modal_form">
            <div class="modal-content" style="width:fit-content;top:-41px;">
                <div class="modal-header" style="background-color: #13224B;">
                    <h3 class="modal-title" style="text-align: center;color: white;">DISCOUNT FORM</h3>
                </div>
                <div class="modal-body" >
                    <div class="panel panel-default col-lg-12 col-md-12 col-sm-12"> 
                        <div class="panel-body">
                            <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                <div id="alert_dis_per" class="hidden">
                                    <p style="width: 100%;color: red;">Invalid Discount!!!</p>
                                </div>
                                <div style="height:58px;">
                                    <input type="text" id="txt_my_discount_percent" autofocus class="form-control" style="width: 100%;">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="7" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="8" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="9" onclick="get_discount('#txt_my_discount_percent',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="4" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="5" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="6" onclick="get_discount('#txt_my_discount_percent',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="1" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="2" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="3" onclick="get_discount('#txt_my_discount_percent',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="0" onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="." onclick="get_discount('#txt_my_discount_percent',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="C" onclick="get_discount('#txt_my_discount_percent',this.value)">
                                </div>
                                <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                    <div class="col-md-6 col-sm-6">
                                        <button onclick="save_discount('percent','#txt_my_discount_percent')" class="button-sear col-md-6 col-sm-6" id="btn_discount">Discount</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button class="button-sear col-md-6 col-sm-6" onclick="closeModal('frm_discount_percent')">CLOSE</button>
                                    </div >
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>   
            </div>
        </div>
        <!--End Modal Discount Percent-->
        <div id="frm_discount_invoice" class="modal_form">
            <div class="modal-content" style="width:fit-content;top:-41px;">
                <div class="modal-header" style="background-color: #13224B;">
                    <h3 class="modal-title" style="text-align: center;color: white;">DISCOUNT FORM</h3>
                </div>
                <div class="modal-body" >
                    <div class="panel panel-default col-lg-12 col-md-12 col-sm-12"> 
                        <div class="panel-body">
                            <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                <div id="alert_dis_inv" class="hidden">
                                    <p style="width: 100%;color: red;">Invalid Discount!!!</p>
                                </div>
                                <div style="height:58px;">
                                    <input type="text" id="txt_my_discount_invoice" autofocus class="form-control" style="width: 100%;">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="7" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="8" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="9" onclick="get_discount('#txt_my_discount_invoice',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="4" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="5" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="6" onclick="get_discount('#txt_my_discount_invoice',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="1" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="2" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="3" onclick="get_discount('#txt_my_discount_invoice',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="0" onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="." onclick="get_discount('#txt_my_discount_invoice',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="C" onclick="get_discount('#txt_my_discount_invoice',this.value)">
                                </div>
                                <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                    <div class="col-md-6 col-sm-6">
                                        <button onclick="save_discount('invoice','#txt_my_discount_invoice')" class="button-sear col-md-6 col-sm-6" id="btn_discount">Discount</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button class="button-sear col-md-6 col-sm-6" onclick="closeModal('frm_discount_invoice')">CLOSE</button>
                                    </div >
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>   
            </div>
        </div>
        <!--End Modal Discount Invoice-->
        <!--Modal Discount Dollar-->
        <div id="frm_discount_dollar" class="modal_form">
            <div class="modal-content" style="width:fit-content;top:-41px;">
                <div class="modal-header" style="background-color: #13224B;">
                    <h3 class="modal-title" style="text-align: center;color: white;">DISCOUNT FORM</h3>
                </div>
                <div class="modal-body" >
                    <div class="panel panel-default col-lg-12 col-md-12 col-sm-12"> 
                        <div class="panel-body">
                            <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                <div id="alert_dis_dol" class="hidden">
                                    <p style="color: red;">Invalid Discount!!!</p>
                                </div>
                                <div style="height:58px;">
                                    <input type="text" id="txt_my_discount_dollar" autofocus class="form-control" style="width: 100%;">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="7" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="8" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="9" onclick="get_discount('#txt_my_discount_dollar',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="4" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="5" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="6" onclick="get_discount('#txt_my_discount_dollar',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="1" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="2" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="3" onclick="get_discount('#txt_my_discount_dollar',this.value)">
                                </div>
                                <div class="calc-row" style="height:58px;">
                                    <input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="0" onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="." onclick="get_discount('#txt_my_discount_dollar',this.value)"><input type="button" class="button-sear-cal trigger-sear" style="margin: 8px;" value ="C" onclick="get_discount('#txt_my_discount_dollar',this.value)">
                                </div>
                                <div class="calculator calculator-sear  col-md-6 col-sm-6">
                                    <div class="col-md-6 col-sm-6">
                                        <button onclick="save_discount('dollar','#txt_my_discount_dollar')" class="button-sear col-md-6 col-sm-6" id="btn_discount">Discount</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button class="button-sear col-md-6 col-sm-6" onclick="closeModal('frm_discount_dollar')">CLOSE</button>
                                    </div >
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>   
            </div>
        </div>
        <!-----Modal form---->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="modal fade centered-modal" id="frm_payment" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="width:150%;right:145px">
                        <div class="modal-header" style="background-color: #13224B;">
                            <h3 class="modal-title" style="text-align: center;color: white;">PAYMENT FORM</h3>
                        </div>
                        <form id="form">
                        <div class="modal-body" >
                            <div class="panel col-lg-8 col-md-8 col-sm-8"> 
                                <table style="border-collapse: separate" class="table-form" width="100%" align="center">
                                    <tr>
                                        <td class="td" style="width:30%"><label class="label-sear" style="font-size:20px;color: #13224B"><?php echo "CARD"?></label></td>
                                        <td colspan="2"><input class="input-sear" style="width: 100%" id="txt_card_number" name="txt_card_number" type="password" autocomplete="off" placeholder="SCAN CARD#" onkeypress="if (event.keyCode == 13) {scan_card(this.value);return false;}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B"><?php echo "Customer"?></label>
                                        </td>
                                        <td>
                                            <input type="hidden" name="txt_customer_id" id="txt_customer_id">
                                            <input class="input-sear" id="txt_customer" name="txt_customer" type="text" placeholder="CUSTOMER" readonly>
                                        </td>
                                        <td>
                                            <input class="input-sear" id="txt_discount" name="txt_discount" type="text" placeholder="DISCOUNT(%)" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B"><?php echo "Amount"?></label></td>
                                        <td><input style="color:red;font-weight: bolder" class="input-sear" id="txt_amount_dollar" name="txt_amount_dollar" type="text" readonly placeholder=""></td>
                                        <td><input style="color:red;font-weight: bolder" class="input-sear" id="txt_amount_riel" name="txt_amount_riel" type="text" readonly placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B">Pay In</label></td>
                                        <td>
                                            <input class="input-sear color-blue" id="txt_pay_dollar" name="txt_pay_dollar" type="text" placeholder="Enter Amount​ ($)" autocomplete="off">
                                        </td>
                                        <td>
                                            <input class="input-sear color-blue" id="txt_pay_riel" name="txt_pay_riel" type="text" placeholder="សូមបញ្ចូលទឹកប្រាក់ (៛)" autocomplete="off">
                                        </td>
                                    </tr>
                                <tr>
                                    <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B">Member Card</label></td>
                                    <td colspan="2"><input class="input-sear" style="width:100%;font-size:20px;color: red;font-weight: bolder;" id="txt_member_card" name="txt_member_card" type="text" trigger="calculate"  placeholder="Card Amount($)" readonly>
                                    </td>
                                </tr>
                            <tr>
                                <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B"><?php echo "Card Payment"?></label></td>
                                <td><input class="input-sear" style="font-size:20px;color: red;font-weight: bolder;" id="txt_card_payment" name="txt_card_payment" type="text" trigger="calculate" placeholder="Amount ($)" onclick="click_card_payment()" readonly></td>
                                <td>
                                    <select class="input-sear" style="width:100%;" name="select_card" id="select_card">
                                        <option value="0">--None--</option>
                                    </select>
                                </td>
                            </tr>
                                <tr>
                                    <td class="td"><label class="label-sear" style="font-size:20px;color: #13224B"><?php echo "Return in"?></label></td>
                                    <td><input class="input-sear" id="txt_return_dollar" name="txt_return_dollar" type="text" placeholder=($) readonly style="font-size:20px;color: red;font-weight: bolder"></td>
                                    <td><input class="input-sear" id="txt_return_riel" name="txt_return_riel" type="text" placeholder="(៛)" readonly style="font-size:20px;color: red;font-weight: bolder"></td>
                                </tr>
                            </table>
                                  
                            </div>   
                            <div class="panel panel-default col-lg-4 col-md-4 col-sm-4"> 
                                <div class="panel-header">
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="calculator calculator-sear  col-md-4 col-sm-4">
                                        <div class="calc-row" >
                                            <input type="button" class="button-sear-cal trigger-sear" style="width:180px !important;" value ="C">
                                        </div>
                                        <div class="calc-row" style="height:58px;">
                                            <button type="button" class="button-sear-cal btn-keypaid">7</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">8</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">9</button>
                                        </div>
                                        <div class="calc-row" style="height:58px;">
                                            <button type="button" class="button-sear-cal btn-keypaid">4</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">5</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">6</button>
                                        </div>
                                        <div class="calc-row" style="height:58px;">
                                            <button type="button" class="button-sear-cal btn-keypaid">1</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">2</button>
                                            <button type="button" class="button-sear-cal btn-keypaid">3</button>
                                        </div>
                                        <div class="calc-row" style="height:58px;">
                                            <button type="button" class="button-sear-cal btn-keypaid">0</button>
                                            <button type="button" class="button-sear-cal btn-keypaid" data-key="110">.</button>
                                            <button type="button" class="button-sear-cal btn-keypaid" data-key="8">X</button>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div> 
                      <div class="modal-footer">
                          <div>
                              <button type="submit" class="button-sear" id="btn_pay">PAY</button>
                              <button type="button" class="button-sear" data-dismiss="modal">CLOSE</button>
                          </div>
                      </div> 
                      </form>   
                    </div>
                </div>
            </div>
        </div>  
        <div class="receipt-size" id="div"></div>
        
    <!--End Form Payment -->
    </body>
    <script type="text/javascript">
		var socket = io.connect('http://localhost:4000');
		var table_id=$("#txt_table_id").val();
        var sale_master_id = $('#txt_master_id').val();
        //Powered By Cheang
        //local variable
        var total_kh=0;
        var total_us=0;
        var rate=0,tax =0,customer_chip =null;
        var grand_return_us=0;
        var grand_return_kh=0;
        var control_focus = $("input#txt_pay_dollar");
        var $input,input_amount = 0,member_discount = 0;
        $(document).ready(function() {
            //input check
            $input = $('#frm_payment input#txt_pay_dollar, #frm_payment input#txt_pay_riel').not('[readonly]');
           $(document).on("keyup",$input, function( event ) {
           //alert(control_focus.attr('id'));
                var id = control_focus.attr('id');
                if(id!='txt_card_number'){
                    var selection = window.getSelection().toString();
                    if ( selection !== '' ) {
                        return;
                    }
                    // When the arrow keys are pressed, abort.
                    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                        return;
                    }
                    //var $this = $(this);
                    var $this = control_focus;
                    // Get the value.
                    var input = $this.val();
                    input = input.replace(/,/g,'');
                    
                    //alert(input);
                    if(isNaN(input)){
                        input = "0";
                    }
                    else
                    {
                        if ( $.inArray( event.keyCode, [110,190] ) !== -1 ) {
                            return;
                        }
                    }
                    if(input.indexOf('.')!==-1){
                        var len = input.split('.');
                        len = len[1].length;
                        $this.val( function() {
                            var num = parseFloat(input);
                            return ( input === "" ) ? 0 : num.toLocaleString(undefined, {minimumFractionDigits: len, maximumFractionDigits: len});
                        });
                        return;
                    }
                    $this.val( function() {
                        return ( input === "" ) ? 0 : parseFloat(input).toLocaleString( "en-US" );
                    });
                    return;
                }
            });
            //submit payment by cheang
            $("#form").submit(function(e) {
                e.preventDefault();
                var other_card = $("#txt_card_payment").val() == "" ? 0 : parseFloat($("#txt_card_payment").val().replace(/,/g,'').replace('$ ',''));
                var member_card =$("#txt_member_card").val() == "" ? 0 : parseFloat($("#txt_member_card").val().replace(/,/g,'').replace('$ ',''));
                //card pay
                var pay_us = $("#txt_pay_dollar").val().replace(/,/g,'');
                var pay_kh = $("#txt_pay_riel").val().replace(/,/g,'');
                pay_us = pay_us == "" ? 0 : parseFloat(pay_us);
                pay_kh = pay_kh == "" ? 0 : parseInt(pay_kh);
                if(input_amount < grand_return_us && member_card < grand_return_us && other_card < grand_return_us){
                    alert("Invalid Cash!...");
                    return;
                }
                else{
                    $.ajax({
                        url: '<?php echo site_url("cashier_order_offline/update_sale_status"); ?>',
                        type: 'POST',
                        dataType: 'html',
                        async: false,
                        data: {master_id: $("#txt_master_id").val(),customer_id: $("#txt_customer_id").val(),member_card : member_card,member_discount:member_discount,account_type_id: $("#select_card").val(),other_card : other_card,pay_us:pay_us,pay_kh:pay_kh,customer_chip:customer_chip},
                    })
                    .done(function(respone) {
                        var json = JSON.parse(respone);
                        if(json.success == 1 ){
                            load_data('receipt');
                            //window.location.href = '<?php echo site_url("table_order"); ?>';
                        }
                        //print_to_kitchen();

                    })
                    .fail(function() {
                        console.log("error");
                    })
                }
            });    
            
            //load module payment by cheang
            $('#frm_payment').on('shown.bs.modal', function (event) {

                $("#txt_pay_dollar").prop("disabled",false);
                $("#txt_pay_riel").prop("disabled",false);
                $('#frm_payment').modal({backdrop: 'static', keyboard: false});
                control_focus.focus();

            });
            $("#btn-payment-form").click(function(){
                if(check_no_order()==false)
                    return false;
                if(check_permission("Pay")==0) return;
                $('#frm_payment').modal("show");
            });
            $('#frm_payment').on('show.bs.modal', function (event) {
                //load total

                
                var invoice_no = $("#txt_master_id").val();
                var post_url="<?php echo site_url("cashier_order_offline/load_payment"); ?>"+"/"+invoice_no;
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    success: function (response){
                        var json = JSON.parse(response);
                        $("#txt_amount_dollar").val("$ " + parseFloat(json.grand_total_us).toFixed(dot_num));
                        $("#txt_amount_riel").val(parseInt(json.grand_total_kh).toLocaleString()+" ៛");
                        grand_return_us = parseFloat(json.grand_total_us).toFixed(dot_num);
                        grand_return_kh = parseInt(json.grand_total_kh);
                        total_us = parseFloat(json.total_us).toFixed(dot_num);
                        total_kh = parseInt(json.total_kh);
                        tax     = parseInt(json.tax);
                        rate     = parseInt(json.exchange_rate);
                    },
                    error: function (response) {
                        alert("An error occure while saving data!");
                    }
                });
                //load card type
                $.ajax({
                    url: '<?php echo site_url("cashier_order_offline/load_card_type"); ?>',
                    type: 'POST',
                    async: false,
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                })
                .done(function(respone) {
                    var json = $.parseJSON(respone);
                    $('#select_card').empty();
                    $('#select_card').append('<option value="0">--None--</option>');
                    $.each(json, function(index, val) {
                        $('#select_card').append('<option value="'+val.acc_type_id+'">'+val.acc_type+'</option>');
                    });
                })
                .fail(function() {
                    console.log("error");
                })                
            })
            //close modal pay
            $('#frm_payment').on('hidden.bs.modal', function (event) {
                $("#form")[0].reset();             
            })

            //select card type
            $('#select_card').change((event)=> {
                var x = $("#txt_amount_dollar").val();
                var newString;
                if($('#select_card').val()!=0){
                    newString = x.replace("$ ","");
                    $("#txt_card_payment").val("$ " + newString);
                    $("#txt_pay_dollar").prop('disabled', true);
                    $("#txt_pay_riel").prop('disabled', true);
                }
                else{
                    newString = "";
                    $("#txt_card_payment").val("");
                    $("#txt_pay_dollar").prop('disabled', false);
                    $("#txt_pay_riel").prop('disabled', false);
                }
                //clear other
                $("#txt_return_dollar").val("");
                $("#txt_return_riel").val("");
                $("#txt_pay_dollar").val("");
                $("#txt_pay_riel").val("");
                $("#txt_member_card").val("");
				socket.emit('card_pay',{
                    pay:newString
                });
            });
            ///select all item
            $('#check-box-all').change(()=>{
                //alert($('#check-box-all').val());
                if($('#check-box-all').is(':checked')==true){
                    var table = $("#table_order tbody");
                    table.find('tr.item_detail').each(function (i, el) {
                        var $tds = $(this).find('td');
                        $tds.eq(0).find('input[type=checkbox]').prop('checked',true); 
                    });
                }
                else{
                    var table = $("#table_order tbody");
                    table.find('tr.item_detail').each(function (i, el) {
                        var $tds = $(this).find('td');
                        $tds.eq(0).find('input[type=checkbox]').prop('checked',false); 
                    });
                }
            });
            //btn keypaid
            $('.btn-keypaid').click(function(e){
                //e.preventDefault();
                var id = control_focus.attr('id');
                if($(this).text()=='X'){
                    var value = control_focus.val();
                    control_focus.val(value.slice(0,-1));
                    __triggerKeyboardEvent(document.body, parseInt($(this).attr("data-key")));
                    control_focus.focus();
                }
                else{
                    if(id=='txt_pay_dollar'){
                        //debugger;
                        var value = control_focus.val();
                        var btn_num = $(this).text();
                        control_focus.val(value+btn_num);
                        __triggerKeyboardEvent(document.body, parseInt($(this).attr("data-key")));
                        control_focus.focus();
                    }
                    else if(id=='txt_pay_riel'){
                        var value = control_focus.val();
                        var btn_num = $(this).text();
                        control_focus.val(value+btn_num);
                        __triggerKeyboardEvent(document.body, parseInt($(this).attr("data-key")));
                        control_focus.focus();
                    }
                    else if(id=='txt_card_number'){
                        var value = control_focus.val();
                        var btn_num = $(this).text();
                        control_focus.val(value+btn_num);
                        control_focus.focus();
                    }
                }
                //
                if(id!="txt_card_number")
                    return_calculate(rate);
            });
            //set focus control
            $('#frm_payment input[type="text"], #frm_payment input[type="number"]').not('[readonly]').focus(function(e) {
                control_focus = $(this);
            });
            //input change value
            $('#frm_payment input[type="text"], #frm_payment input[type="number"]').not('[readonly]').on('input',function(e) {
                var id = control_focus.attr('id');
                if(id!="txt_card_number")
                    return_calculate(rate)
            })
            //scroll order
            $("#panel_order_item").scroll(function(event) {
                if($(this).scrollLeft()>0){
                    var scroll = $(this).scrollLeft();
                    $("#panel_order_item_header").scrollLeft(scroll);
                }
                else
                    $("#panel_order_item_header").scrollLeft(0);
            });
            $("#panel_order_item_header").scroll(function(event) {
                if($(this).scrollLeft()>0){
                    var scroll = $(this).scrollLeft();
                    $("#panel_order_item").scrollLeft(scroll);
                }
                else
                    $("#panel_order_item").scrollLeft(0);
            });
            //
        });
        function go_to_admin(){
            window.open("<?php echo site_url("welcome"); ?>","_self");
        }
		function close_pay(){
            socket.emit('close_pay',{
                data:'close'
            });
        }
        //calculate 
        function return_calculate(rate){
            var pay_us = $("#txt_pay_dollar").val().replace(/,/g,'');
            var pay_kh = $("#txt_pay_riel").val().replace(/,/g,'');
            //
            var return_dollar = $("#txt_return_dollar");
            var return_riel = $("#txt_return_riel");
            //
            pay_us = pay_us == "" ? 0 : parseFloat(pay_us);
            pay_kh = pay_kh == "" ? 0 : parseInt(pay_kh);
            if(pay_us!=0){
                //recieve amount
                input_amount = parseFloat(pay_us + pay_kh/rate);
                //return amount
                var return_us =  input_amount - grand_return_us < 0 ? Math.floor(parseFloat(Math.abs(input_amount - grand_return_us)).toFixed(dot_num)) : Math.floor(parseFloat(input_amount - grand_return_us).toFixed(dot_num));
                var return_kh = input_amount - grand_return_us < 0 ? parseFloat((parseFloat(Math.abs(input_amount - grand_return_us)).toFixed(dot_num)) % 1).toFixed(dot_num) : parseFloat((parseFloat(input_amount - grand_return_us).toFixed(dot_num)) % 1).toFixed(dot_num);
                //console.log(input_amount);
                //console.log(return_kh);
                if(input_amount - grand_return_us < 0){
                    return_dollar.val("($ "+return_us.toLocaleString(undefined, {minimumFractionDigits: dot_num, maximumFractionDigits: dot_num})+")");
                    return_riel.val("("+parseInt(return_kh*rate).toLocaleString()+" ៛)");
					socket.emit('payment',{
                        pay_us:pay_us,
                        pay_kh:pay_kh,
                        return_us:"($ "+return_us.toLocaleString(undefined, {minimumFractionDigits: dot_num, maximumFractionDigits: dot_num})+")",
                        return_kh:"("+parseInt(return_kh*rate).toLocaleString()+" ៛)"
                    });
                }
                else{
                    return_dollar.val("$ "+return_us.toLocaleString(undefined, {minimumFractionDigits: dot_num, maximumFractionDigits: dot_num}));
                    return_riel.val(parseInt(return_kh*rate).toLocaleString()+" ៛");
					socket.emit('payment',{
                        pay_us:pay_us,
                        pay_kh:pay_kh,
                        return_us:"$ "+return_us.toLocaleString(undefined, {minimumFractionDigits: dot_num, maximumFractionDigits: dot_num}),
                        return_kh:parseInt(return_kh*rate).toLocaleString()+" ៛"
                    });
                }
            }
            else{
                //recieve amount
                input_amount = parseInt(pay_kh);
                //return amount
                return_dollar.val("$ 0.00");
                var re_kh=0;
                if(input_amount - grand_return_kh < 0){
                    return_riel.val("("+parseInt(Math.abs(input_amount - grand_return_kh)).toLocaleString()+" ៛)");
                    re_kh="("+parseInt(Math.abs(input_amount - grand_return_kh)).toLocaleString()+" ៛)";
                }
                    
                else{
                    return_riel.val(parseInt(input_amount - grand_return_kh).toLocaleString()+" ៛");
                    re_kh=parseInt(input_amount - grand_return_kh).toLocaleString()+" ៛";
                }
				socket.emit('payment',{
                    pay_us:pay_us,
                    pay_kh:pay_kh,
                    return_us:0.00,
                    return_kh:re_kh
                });
            }
        }
        //scan card
        function scan_card(value){
            if(check_permission("Pay By Membership")==0) return;
            value = $("#txt_card_number").val();
            customer_chip = value;
            var post_url="<?php echo site_url("cashier_order_offline/get_customer_scan_card"); ?>";
            var checkboolean = false;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                data:{'card_number':value},
                success: function (response){
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        for (var i = 0; i < list.length; i++) {
                            $("#txt_customer_id").val(list[i].customer_id);
                            $("#txt_customer").val(list[i].customer_name);
                            var discount;
                            if(total_us !='' || total_us !='0'){
                                discount = (list[i].customer_discount);
                                //console.log(total_us+'-'+discount+'-'+tax);
                                member_discount = (list[i].customer_discount);
                                grand_return_us = parseFloat(total_us*(1 - discount/100)*(1+tax/100)).toFixed(dot_num);
                                grand_return_kh = grand_return_us*rate;
                               $("#txt_amount_dollar").val("$ "+parseFloat(grand_return_us).toFixed(dot_num));
                               $("#txt_amount_riel").val(parseInt(grand_return_us*rate).toLocaleString()+' ៛');
                               //
                               $("#txt_discount").val(list[i].customer_discount + " %");
                               if(parseFloat(list[i].customer_balance) !=0){
                                    if(parseFloat(list[i].customer_balance) >= grand_return_us){
                                        $("#txt_member_card").val("$ "+parseFloat(grand_return_us).toFixed(dot_num));
                                        checkboolean = true;
										socket.emit('scan_card',{
                                            balance:parseFloat(list[i].customer_balance)-grand_return_us,
                                            pay:grand_return_us
                                        })
                                    }else{
                                        alert("Sorry your balance is not enough please refil your balance");
                                        $("#txt_member_card").val('');
                                    }
                                }else{
                                    alert("Sorry your balance is not enough please refil your balance");
                                    $("#txt_member_card").val('');
                                }
                            }   
                        }
                    }
                    //clear other
                    $("#txt_card_number").val("")
                    $("#txt_return_dollar").val("");
                    $("#txt_return_riel").val("");
                    $("#txt_pay_dollar").val("");
                    $("#txt_pay_riel").val("");
                    $("#txt_card_payment").val("");
                    $("#select_card").val(0);
                    if(checkboolean==true){
                        $("#txt_pay_dollar").prop("disabled",true);
                        $("#txt_pay_riel").prop("disabled",true);
                    }
                },
                error: function (response) {
                    alert("An error occure while saving data!");
                }
            });
        }
        //Add KeybordEvent
        function __triggerKeyboardEvent(el, keyCode)
        {
            var eventObj = document.createEventObject ?
                document.createEventObject() : document.createEvent("Events");
          
            if(eventObj.initEvent){
              eventObj.initEvent("keyup", true, true);
            }
          
            eventObj.keyCode = keyCode;
            eventObj.which = keyCode;
            
            el.dispatchEvent ? el.dispatchEvent(eventObj) : el.fireEvent("onkeyup", eventObj); 
          
        }
    </script>
    <script>
        
        function save_discount(type_dis,mytxt){
            var master_id=$("#txt_master_id").val();
            var table = $("#table_order tbody");
            var discount=$(mytxt).val();
            if(type_dis=="percent"){
                if(parseFloat(discount)>100 || parseFloat(discount)<0){
                    $('#alert_dis_dol').removeClass('hidden');
                    $('#alert_dis_per').removeClass('hidden');
                    $('#alert_dis_inv').removeClass('hidden');
                    $('#txt_my_discount_percent').addClass('border border-danger');
                    $('#txt_my_discount_dollar').addClass('border border-danger');
                    $('#txt_my_discount_invoice').addClass('border border-danger');
                    //display();
                    return;
                }
            }
            else if(type_dis=="invoice"){
                if(parseFloat(discount)>100 || parseFloat(discount)<0){
                    $('#alert_dis_dol').removeClass('hidden');
                    $('#alert_dis_per').removeClass('hidden');
                    $('#alert_dis_inv').removeClass('hidden');
                    $('#txt_my_discount_percent').addClass('border border-danger');
                    $('#txt_my_discount_dollar').addClass('border border-danger');
                    $('#txt_my_discount_invoice').addClass('border border-danger');
                    //display();
                    return;
                }
            }
            else if(type_dis=="dollar"){
                var total_price=0;
                table.find('tr.item_detail').each(function (i, el) {
                    var $tds = $(this).find('td');
                        if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                            total_price= $tds.eq(6).html();
                      }     
                        
                });
                if(parseFloat(discount)>parseFloat(total_price) || parseFloat(discount)<0){
                    $('#alert_dis_dol').removeClass('hidden');
                    $('#alert_dis_per').removeClass('hidden');
                    $('#alert_dis_inv').removeClass('hidden');
                    $('#txt_my_discount_percent').addClass('border border-danger');
                    $('#txt_my_discount_dollar').addClass('border border-danger');
                    $('#txt_my_discount_invoice').addClass('border border-danger');
                    //display();
                    return;
                }
            }
            var ch_item=[];
            table.find('tr.item_detail').each(function (i, el) {
                var $tds = $(this).find('td');
                    if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                    ch_item.push({
                            detal_id:$tds.eq(0).find('input:checkbox').val()
                        });  
                  }     
                    
            });
            var ch=JSON.stringify(ch_item); 
            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('cashier_order_offline/save_discount')?>',
                    data: {'data':ch_item,'master_id':master_id,'discount':discount,'type_dis':type_dis},
                    async: false,
                    success: function (response) {
                        if(type_dis=="dollar"){
                            closeModal('frm_discount_dollar');
                        }else if(type_dis=="percent"){
                            closeModal('frm_discount_percent')
                        }
                        else if(type_dis=="invoice"){
                            closeModal('frm_discount_invoice')
                        }
                        reload_order();
                        display();
                    },
                    error: function (response) {
                    }
            });
        }
        function get_discount(mytxt,value) {
            var discount = $(mytxt).val();
            var format=/[.]/;
            if(value != 'C'){
                if(value=='0'){
                    if(format.test(discount)){
                        $(mytxt).val(discount+value);
                    }
                    else{
                        if(discount[0]!='0'){
                            $(mytxt).val(discount+value);
                        }
                    }
                }
                else if(value=='.'){
                    if(format.test(discount)){

                    }
                    else{
                        if(discount==''){
                            $(mytxt).val(0+discount+value);
                        }
                        else{
                            $(mytxt).val(discount+value);
                        }
                    }
                }
                else{
                    $(mytxt).val(discount+value);
                }
                
            }else{
                $(mytxt).val("");
            }

        }
        function discount_keyboard(mytxt){
            $(mytxt).keypress(function (event) {
            var $this = $(this);
            if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                    ((event.which < 48 || event.which > 57) &&
                            (event.which != 0 && event.which != 8))) {
                event.preventDefault();
            }

            var text = $(this).val();
            if ((event.which == 46) && (text.indexOf('.') == -1)) {
                setTimeout(function () {
                    if ($this.val().substring($this.val().indexOf('.')).length > 5) {
                        $this.val($this.val().substring(0, $this.val().indexOf('.') + 5));
                    }
                }, 1);
            }

            if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 5) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 5)) {
                event.preventDefault();
            }
            });
            $(mytxt).bind("paste", function (e) {
                var text = e.originalEvent.clipboardData.getData('Text');
                if ($.isNumeric(text)) {
                    if ((text.substring(text.indexOf('.')).length > 5) && (text.indexOf('.') > -1)) {
                        e.preventDefault();
                        $(this).val(text.substring(0, text.indexOf('.') + 5));
                    }
                } else {
                    e.preventDefault();
                }
            }); 
        }
        function openModal_dis(modal){
            if(check_no_order()==false){
                return false;
            }
            if(check_permission("Discount")==0) return false;
            if(modal=='frm_discount_percent'){
                var table = $("#table_order tbody");
                var ch_item=[];
                table.find('tr.item_detail').each(function (i, el) {
                    var $tds = $(this).find('td');
                        if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                        ch_item.push({
                                ch_status:$tds.eq(0).find('input:checkbox').val()
                            });  
                      }     
                        
                });
                if(ch_item.length>0){   
                    document.getElementById(modal).style.display = "block";
                    
                }else{
                    setTimeout(function(){swal("Information", "Please Select Item to Discount!!!", "info")},200);
                    return false;
                }
            }
            else if(modal=='frm_discount_dollar'){
                var table = $("#table_order tbody");
                var ch_item=[];
                table.find('tr.item_detail').each(function (i, el) {
                    var $tds = $(this).find('td');
                        if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                        ch_item.push({
                                ch_status:$tds.eq(0).find('input:checkbox').val()
                            });  
                      }     
                        
                });
                if(ch_item.length==1){   
                    document.getElementById(modal).style.display = "block";
                }
                else if(ch_item.length>1){
                    setTimeout(function(){swal("Information", "Please Select only 1 Item to Discount!!!", "info")},200);
                    return false;
                }
                else{
                    setTimeout(function(){swal("Information", "Please Select Item to Discount!!!", "info");},200);
                    
                    return false;
                }
            }
            else if(modal=='frm_discount_invoice'){
            
                document.getElementById(modal).style.display = "block";
            }
        }

        function openModal(modal){
            if(modal=='frm_move_table'){
                if(check_no_order()==1){
                
                    if(check_permission("Move Table")==1) {
                        document.getElementById(modal).style.display = "block";
                        load_table_move($("#txt_master_id").val()); 
                    }
                }
                
            }else if(modal=='frm_merge_table'){
                if(check_no_order()==1){
                    if(check_permission("Merge Table")==1) {
                        document.getElementById(modal).style.display = "block";
                        load_table_merge();
                    }
                }
                
            }else if(modal=='frm_split_table'){
                if(check_no_order()==1){
                    if(check_permission("Split Table")==1) {
                        document.getElementById(modal).style.display = "block";
                        load_split_table($("#txt_master_id").val());
                        list_split_table($("#txt_master_id").val());
                    }
                }
                
            }else if(modal=='frm_split_invoice'){
                if(check_no_order()==1){
                    if(check_permission("Split Invoice")==1) {
                        document.getElementById(modal).style.display = "block";
                        list_split_invoice($("#txt_master_id").val());
                    }
                }
                
            }else if(modal=='void'){
                if(check_no_order()==1){
                    var temp=true;
                    var master_id=$('#txt_master_id').val();
                    $.ajax({
                        type:"POST",
                        url:'<?php echo site_url('cashier_order_offline/get_printed_bill')?>',
                        async:false,
                        data:{'master_id':master_id},
                        success:function(respone){
                            if(respone>0){
                                if(check_permission("Delete after print bill")==0){
                                    temp=false;
                                }
                            }
                        },
                        error:function(respone){

                        }
                    });
                    if(check_permission("Void Invoice")==0) {
                        temp=false;
                    }
                    if(temp==false){
                        setTimeout(function(){ swal("Information", "You don't have permission!!!", "warning"); },200);
                    }else if(temp==true){
                        setTimeout(function(){void_invoice($("#txt_master_id").val());},200);
                    }

                }
                
            }else if(modal=='frm_sale_return'){
                if(check_no_order()==1){
                    
                        if(check_permission("Sale Order Return")==1) {
                            document.getElementById(modal).style.display = "block";
                            list_sale_return($("#txt_master_id").val());
                        }

                    
                }
                
            }
        }

        function check_permission(permission_name){
            var result=0;
             $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('cashier_order_offline/check_permission')?>',
                    async: false,
                    data:{'permission_name':permission_name},
                    success: function (response){
                        if(response==0) swal("Information", "You don't have permission!!!", "warning");
                        else swal.close();
                        result=response;
                    }
                    ,
                    error: function (response){
                        swal("Information", "You don't have permission!!!", "warning");
                    }
                });
             return result;
        }
        function check_no_order(){
            var id=$('#txt_master_id').val();

            if(id==""){
                swal("Information", "You don't have any order!!!", "warning");
                return 0;
            }else{
                return 1;
            }
           
        }

        function closeModal(modal){
            $('#txt_my_discount_dollar').val(''); 
            $('#txt_my_discount_percent').val('');
            $('#txt_my_discount_invoice').val('');
            $('#alert_dis_dol').addClass('hidden');
            $('#alert_dis_per').addClass('hidden');
            $('#alert_dis_inv').addClass('hidden');
            $('#txt_my_discount_percent').removeClass('border border-danger');
            $('#txt_my_discount_dollar').removeClass('border border-danger');
            $('#txt_my_discount_invoice').removeClass('border border-danger');

            document.getElementById(modal).style.display = "none";
            $('#frm_merge_table_table_selected').html('');
            $('#table_marge_list tbody').html('');
        }
		function display(){
            var table_id=$("#txt_table_id").val();
            var sale_master_id = $('#txt_master_id').val(); 
            var rate=$('#txt_exchange_rate').val();
            var grand_total=$('#p_grand_total').text();
                        
            socket.emit('order',{
                id:table_id,
                master:sale_master_id,
                total_dollar:numeral(parseFloat(grand_total)).format('#.00'),
                total_riel:numeral(grand_total*rate).format('#,#')
            });
        }
        function plu_qty(detail_id,item_detail_id,cut_stock){
      
            var qty=parseInt($('#txt_qty'+detail_id+'').val());
            if(cut_stock==1){
             
                 if(check_stock(item_detail_id,1)==1){

                }else{
                    return false;
                }
            }
           
            $('#txt_qty'+detail_id+'').val(qty+1);
            qty=parseInt($('#txt_qty'+detail_id+'').val());
            update_qty(detail_id,qty);
            display();
        }
        function minus_qty(detail_id,item_detail_id){

            var qty=parseInt($('#txt_qty'+detail_id+'').val());
            
            if(qty<=1)
                return false;
            var temp=true;
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('cashier_order_offline/get_printed')?>',
                async: false,
                data:{'id':detail_id},
                success: function (response){
                    if(qty==response){
                        if(check_permission("Delete After Order")==0) temp= false;
                    }
                }
                ,
                error: function (response){
                    swal("Information", "You don't have permission!!!", "warning");
                }
            });
            if(temp==false) return false;

            $('#txt_qty'+detail_id+'').val(qty-1);
            qty=parseInt($('#txt_qty'+detail_id+'').val());
            update_qty(detail_id,qty);
			display();
        }
        function qty_change(detail_id,item_id){
            var qty=parseInt($('#txt_qty'+detail_id+'').val());
      
            if(qty==0 || qty=="" || $('#txt_qty'+detail_id+'').val()==""){
                $('#txt_qty'+detail_id+'').val('1');
            }
            //return false;
            qty=parseInt($('#txt_qty'+detail_id+'').val());
            var old_qty=0;
            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('cashier_order_offline/get_de_qty')?>',
                    async: false,
                    data:{'id':detail_id},
                    success: function (response){
                        old_qty=response;

                    }
                    ,
                    error: function (response){
                        swal("Information", "You don't have permission!!!", "warning");
                    }
                });
            var real_qty=0;
         
            if(qty>parseInt(old_qty)){
                if(check_stock(item_id,qty-parseInt(old_qty))==1){
                    
                }else{
                   $('#txt_qty'+detail_id+'').val(old_qty);
                    return false;
                }
            }


            var temp=true;
            var temp1;
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('cashier_order_offline/get_printed')?>',
                async: false,
                data:{'id':detail_id},
                success: function (response){
                    if(response>qty){
                        if(check_permission("Delete After Order")==0) {
                            temp=false ;
                            temp1=response;
                        }
                    }
                }
                ,
                error: function (response){
                    swal("Information", "You don't have permission!!!", "warning");
                }
            });
            if(temp==false) {
                $('#txt_qty'+detail_id+'').val(temp1);
                return false;
            }
            
            $('#txt_qty'+detail_id+'').val(qty);
            qty=parseInt($('#txt_qty'+detail_id+'').val());
            update_qty(detail_id,qty);
        }
        function update_qty(detail_id,qty){
            var table = $("#table_order tbody");
             table.find('tr.group'+detail_id+'').each(function (i, el) {
                var $tds = $(this).find('td');
                    price=parseFloat($tds.eq(2).text());
                    if($(this).find('.item_note').length==1){
                       $tds.eq(3).text(parseInt(qty));
                    }
                    $tds.eq(6).text(numeral(price*parseInt(qty)).format('#.'+dot_0+''));    
            });
             sub_totals(detail_id);
             totals();
            $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('cashier_order_offline/update_qty')?>',
                    async: false,
                    data:{'detail_id':detail_id,'qty':qty},
                    success: function (response){
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
        }
   
        $(document).on("blur",".my-blur",function(){
            var vals=$(this).val();
            if(vals=="" || vals==null){
              $(this).val(1);
            }
        });

        function confirm_split(){
            if(check_no_order()==false){
                return false;
            }
            swal({
                    title: "Are you sure?",
                    text: "You want to split",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Invoice",
                    cancelButtonText: "Table",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm){
                        openModal('frm_split_invoice');
                        
                    } else { 
                        openModal('frm_split_table');  
                    }
                });
        }
        function list_sale_return(id){
                var post_url = '<?php echo site_url('cashier_order_offline/order_list') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data:{'master_id':id,'layout_id':""},
                    success: function (response){
                        var json = JSON.parse(response);
                        
                            var table='';
                            $.each(json.sale,function(j,k){
                                $.each(k.sale_detail, function (i, e){
                                    if(e.qty>1){
                                        for (i = 0; i < e.qty; i++){
                                        var notes='';
                                        var total=e.sale_note.length;
                                        $.each(e.sale_note,function(l,m){
                                            var slas='';
                                            if(l!=total-1){
                                                slas='/';
                                            }
                                            notes+=m.item_note_name+slas;
                                        });
                                        var no=$('#table_sale_return_list tbody tr').length;

                                        table +='<tr class="master'+e.sale_master_id+'">';
                                        table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                        table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+1+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+numeral(e.price).format('#.'+dot_0+'')+'</label></td>' +
                                                '</tr>';
                                        };
                                    }
                                    else{
                                    var notes='';
                                    var total=e.sale_note.length;
                                    $.each(e.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                    var no=$('#table_sale_return_list tbody tr').length;

                                    table +='<tr class="master'+e.sale_master_id+'">';
                                    table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                    table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.qty+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+numeral(e.price*e.qty).format('#.'+dot_0+'')+'</label></td>' +
                                            '</tr>';
                                    }
                                });
                                
                            });
                            
                        var footer='<button class="btn btn-primary btn-lg" onClick="sale_return('+id+')">Return</button>';
                        $("#table_sale_return_list tbody").html(table);  
                        $("#frm_sale_return_footer").html(footer);
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
        }
       
        function list_split_invoice(id){
                var post_url = '<?php echo site_url('cashier_order_offline/order_list') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data:{'master_id':id,'layout_id':""},
                    success: function (response){
                        var json = JSON.parse(response);
                        
                            var table='';
                            $.each(json.sale,function(j,k){
                                $.each(k.sale_detail, function (i, e){
                                    if(e.qty>1){
                                        for (i = 0; i < e.qty; i++){
                                        var notes='';
                                        var total=e.sale_note.length;
                                        $.each(e.sale_note,function(l,m){
                                            var slas='';
                                            if(l!=total-1){
                                                slas='/';
                                            }
                                            notes+=m.item_note_name+slas;
                                        });
                                        var no=$('#table_marge_list tbody tr').length;

                                        table +='<tr class="master'+e.sale_master_id+'">';
                                        table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                        table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+1+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+numeral(e.price).format('#.'+dot_0+'')+'</label></td>' +
                                                '</tr>';
                                        };
                                    }
                                    else{
                                    var notes='';
                                    var total=e.sale_note.length;
                                    $.each(e.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                    var no=$('#table_marge_list tbody tr').length;

                                    table +='<tr class="master'+e.sale_master_id+'">';
                                    table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                    table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.qty+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+numeral(e.price*e.qty).format('#.'+dot_0+'')+'</label></td>' +
                                            '</tr>';
                                    }
                                });
                                
                            });
                            
                        var footer='<button class="btn btn-primary btn-lg" onClick="split_invoice('+id+')">OK</button>';
                        $("#table_split_invoice_list tbody").html(table);  
                        $("#frm_split_invoice_footer").html(footer);
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
        }

         function load_split_table(master_id){
            var post_url = '<?php echo site_url('move_table/get_floor_table_layout') ?>';
            var floor='';
            var default_id;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response){
                    var value = JSON.parse(response);
                    floor += '<table><tbody>';
                    $.each(value.Floor, function (i, e){
                        if(e.default=='true')
                            default_id=e.floor_id;
                        floor +='<tr><td>';
                        floor += '<div class="category_list" style="margin:0; padding:0; background:#cccccc;" id="'+e.floor_id +'"'
                                +'onClick="fill_split_table(\''+ e.floor_id+'\','+'\'' + master_id+'\''+')">'
                                +'<div style="font-size:25px;"><i class="fa fa-fw fa-lg fa-cube"></i></div>'
                                + '<div class="desc" style="font-size:17px;" id="'+ e.floor_id+'desc'+'">' + e.floor_name + '</div>'
                                + '</div>';
                        
                        floor +='</td></tr>';
                    });
                    floor +='</tbody></table>';
                    $("#frm_split_table_floor").html(floor);
                    //fill_order(master_id, 'split_table');
                    fill_split_table(default_id, master_id);

                }
                ,
                error: function (response){
                    alert('Unable to load sale data!!');
                }
            });
        }
        function list_split_table(id){
                var post_url = '<?php echo site_url('cashier_order_offline/order_list') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data:{'master_id':id,'layout_id':""},
                    success: function (response){
                        var json = JSON.parse(response);
                        
                            var table='';
                            $.each(json.sale,function(j,k){
                                $.each(k.sale_detail, function (i, e){
                                    if(e.qty>1){
                                        for (i = 0; i < e.qty; i++){
                                        var notes='';
                                        var total=e.sale_note.length;
                                        $.each(e.sale_note,function(l,m){
                                            var slas='';
                                            if(l!=total-1){
                                                slas='/';
                                            }
                                            notes+=m.item_note_name+slas;
                                        });
                                        var no=$('#table_marge_list tbody tr').length;

                                        table +='<tr class="master'+e.sale_master_id+'">';
                                        table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                        table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                                '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+1+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                                '<td style="padding: 7px 0px;"><label>'+numeral(e.price).format('#.'+dot_0+'')+'</label></td>' +
                                                '</tr>';
                                        };
                                    }
                                    else{
                                    var notes='';
                                    var total=e.sale_note.length;
                                    $.each(e.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                    var no=$('#table_marge_list tbody tr').length;

                                    table +='<tr class="master'+e.sale_master_id+'">';
                                    table+='<td style="padding: 7px 0px;"><label class="container" style="margin-top: -20px;"><input class="chk" id="'+e.sale_detail_id+'" value='+e.sale_detail_id+' type="checkbox"><span class="checkmark" style="top:0;"></span></label></td>';
                                    table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+no+1)+'</lable></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.qty+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+numeral(e.price*e.qty).format('#.'+dot_0+'')+'</label></td>' +
                                            '</tr>';
                                    }
                                });
                                
                            });
                            
                        $("#table_split_table_list tbody").html(table);  
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
        }
        function fill_split_table(floor_id, master_id){
            if(master_id<=0){
                reload_order();
                return false;
            }
            $(".category_list").removeClass("border_split_table");
            $(".desc").removeClass("background_desc_split_table");
            $("#" + floor_id).addClass("border_split_table");
            $("#" + floor_id+"desc").addClass("background_desc_split_table");
            var post_url = '<?php echo site_url('move_table/get_floor_table_layout') ?>';
            var table='';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response){
                    var value = JSON.parse(response);
                    $.each(value.Floor, function (i, e){
                        if(e.floor_id==floor_id){
                           $.each(e.table_list, function (i, obj) {

                                table+='<div class="col-md-1 col-sm-2 col-xs-3 gallery" onclick="split_table(\'' + obj.layout_id+'\','+'\'' + master_id+'\''+','+'\'' + 'split_table'+'\''+')">';
                                table+=obj.layout_name;
                                table+='<img class="img-responsive" src="<?php echo base_url("img/table_active.svg"); ?>"></div>';
                            });
                        }
                    });
                    $("#frm_split_table_table").html(table);
                }
                ,
                error: function (response){
                    alert('Unable to load sale data!!');
                }
            });
        }
        function split_table(layout,master_id){
            swal({
                title: "Are you sure?",
                text: "Do you want to split table?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No",
                confirmButtonText: "Yes",  
                closeOnConfirm: false,
                closeOnCancel: true
                },function (isConfirm) {
                    var post_url = '<?php  echo site_url('cashier_order_offline/save_split_table') ?>';
                    //var ch=JSON.stringify(ch_item); 
                    if (isConfirm){
                        var table = $("#table_split_table_list tbody");
                        var ch_item=[];
                        table.find('tr').each(function (i, el) {
                            var $tds = $(this).find('td');
                                if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                                    var mytem=1;
                                    $.each(ch_item, function( key, value ) {
                                      if(value.id==$tds.eq(0).find('input:checkbox').val()){                 
                                                value.qty=value.qty+1;
                                                mytem=0;
                                        }
                                    });
                                    if(mytem==1){
                                            ch_item.push({
                                                    id:$tds.eq(0).find('input:checkbox').val(),
                                                    qty:1
                                            }); 
                                    }
                              }      
                        });
                        $.ajax({
                            type: 'POST',
                            url: post_url,
                            async: false,
                            data: {'data':ch_item,'layout_id':layout,'master_id':master_id},
                            success: function (response) {
                               window.open("<?php echo site_url("table_order_offline"); ?>","_self");
                            },
                            error: function (response) {
                            }
                        });
                    } 
                });
        }
        function sale_return(master_id){
            swal({
                title: "Are you sure?",
                text: "Do you want to return item?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No",
                confirmButtonText: "Yes",  
                closeOnConfirm: true,
                closeOnCancel: true
                },function (isConfirm) {
                    var post_url = '<?php  echo site_url('cashier_order_offline/save_sale_return') ?>';
                    //var ch=JSON.stringify(ch_item); 
                    if (isConfirm){
                        var table = $("#table_sale_return_list tbody");
                        var ch_item=[];
                        table.find('tr').each(function (i, el) {
                            var $tds = $(this).find('td');
                                if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                                    var mytem=1;
                                    $.each(ch_item, function( key, value ) {
                                      if(value.id==$tds.eq(0).find('input:checkbox').val()){                 
                                                value.qty=value.qty+1;
                                                mytem=0;
                                        }
                                    });
                                    if(mytem==1){
                                            ch_item.push({
                                                    id:$tds.eq(0).find('input:checkbox').val(),
                                                    qty:1
                                            }); 
                                    }
                              }      
                        });
            
                        $.ajax({
                            type: 'POST',
                            url: post_url,
                            async: false,
                            data: {'data':ch_item,'master_id':master_id},
                            success: function (response) {
                               reload_order();
                               document.getElementById('frm_sale_return').style.display = "none";
                            },
                            error: function (response) {
                            }
                        });
                    } 
                });
        }

        function split_invoice(master_id){
            swal({
                title: "Are you sure?",
                text: "Do you want to split invoice?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "No",
                confirmButtonText: "Yes",  
                closeOnConfirm: false,
                closeOnCancel: true
                },function (isConfirm) {
                    var post_url = '<?php  echo site_url('cashier_order_offline/save_split_invoice') ?>';
                    //var ch=JSON.stringify(ch_item); 
                    if (isConfirm){
                        var table = $("#table_split_invoice_list tbody");
                        var ch_item=[];
                        table.find('tr').each(function (i, el) {
                            var $tds = $(this).find('td');
                                if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                                    var mytem=1;
                                    $.each(ch_item, function( key, value ) {
                                      if(value.id==$tds.eq(0).find('input:checkbox').val()){                 
                                                value.qty=value.qty+1;
                                                mytem=0;
                                        }
                                    });
                                    if(mytem==1){
                                            ch_item.push({
                                                    id:$tds.eq(0).find('input:checkbox').val(),
                                                    qty:1
                                            }); 
                                    }
                              }      
                        });
                        $.ajax({
                            type: 'POST',
                            url: post_url,
                            async: false,
                            data: {'data':ch_item,'master_id':master_id},
                            success: function (response) {
                               window.open("<?php echo site_url("table_order_offline"); ?>","_self");
                            },
                            error: function (response) {
                            }
                        });
                    } 
                });
        }



        function load_table_merge() {
           // alert(1);
            //show_loading();
            var post_url = '<?php echo site_url('merge_table/get_table_layout') ?>';
            var table='';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response){
                    var value = JSON.parse(response);
                    table += '<table id="table_checkbox" class="table-table-form_order" style="width: 100%;"><thead>';
                    table +='<tr><th></th><th style="text-align:left;">ID</th><th>Table</th></tr></thead><tbody>';
                    $.each(value, function (i, e){
//                        alert(e.table_name);
                        table +='<tr><td>';
                        table +='<label class="container"><input type="checkbox" class="chk" onClick="list_merge('+e.sale_master_id+')" id="'+e.sale_master_id + '" value="'+e.sale_master_id+'">' +'<span class="checkmark"></span>' +'</label></td>';
                        table +='<td><label class="container" style="cursor: default;">'+e.invoice_no+'</label></td>';
                        table +='<td><label class="container" style="cursor: default;">'+ e.table_name +  '</label></td></tr>';
                    });
                    table +='</tbody></table>';
                    $("#frm_merge_table_list").html(table);
                    
                }
                ,
                error: function (response){
                    alert('Unable to load table data!!');
                }
            });
        }
         

        function list_merge(id){

            if(document.getElementById(id).checked==true){
                fill_select_table(id);
                var post_url = '<?php echo site_url('cashier_order_offline/order_list') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data:{'master_id':id,'layout_id':""},
                    success: function (response){
                        var json = JSON.parse(response);
                        
                            var table='';
                            $.each(json.sale,function(j,k){
                                $.each(k.sale_detail, function (i, e){
                                    var notes='';
                                    var total=e.sale_note.length;
                                    $.each(e.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                    var no=$('#table_marge_list tbody tr').length;
                                    table +='<tr class="master'+e.sale_master_id+'">';
                                    table +='<td><lable>'+(i+no+1)+'</lable></td>'+
                                            '<td><label>'+e.detail_name+'</label></td>'+
                                            '<td><label>'+notes+'</label></td>' +
                                            '<td><label>'+e.price+'</label></td>' +
                                            '<td><label>'+e.qty+'</label></td>' +
                                            '<td><label>'+e.dis_percent+'</label></td>' +
                                            '<td><label>'+e.dis_dollar+'</label></td>' +
                                            '<td><label>'+numeral(e.price*e.qty).format('#.'+dot_0+'')+'</label></td>' +
                                            '</tr>';
                                });
                                
                            });
                            
                        $("#table_marge_list tbody").append(table);
                       
                        
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
            }else{
                $('#table_marge_list tbody tr.master'+id+'').remove();
                $('.table_master'+id+'').remove();
                order_index("table_marge_list",0)
            }
            
        }
         function fill_select_table(master_id){
            var post_url = '<?php echo site_url('merge_table/fill_select_table') ?>';
            var table='';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                data:{'master_id':master_id},
                success: function (response){
                    var json = JSON.parse(response);
                    $.each(json, function (i, e){
                        table+='<div class="col-md-1 col-sm-2 col-xs-3 gallery" onclick="marge('+master_id+','+e.layout_id+')">';
                        table+=e.layout_name;
                        table+='<img class="img-responsive" src="<?php echo base_url("img/table_active.svg"); ?>"></div>';
                    });
                    $("#frm_merge_table_table_selected").append(table);
                }
                ,
                error: function (response){
                    alert('Unable to load data!!');
                }
            });
        }
        function load_table_move(master_id) {
            //show_loading();
            var post_url = '<?php echo site_url('move_table/get_floor_table_layout') ?>';
            var floor='';
            var table='';
            var count_floor=0;
            var width=0;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response){
                    var value = JSON.parse(response);
                    $.each(value.Floor, function (i, e){
                        count_floor+=1;
                        if(e.default=='true')
                            floor+='<button onClick="(openTab(event,'+e.floor_id+'))" class="tablinks" id="btn_default_tab" type="button" style="border-right: 0px;"><i class="fa fa-fw fa-lg fa-cube"></i>'+e.floor_name+'</button>';
                        else
                            floor+='<button onClick="(openTab(event,'+e.floor_id+'))" class="tablinks" id="btn_not_default" type="button" style="border-right: 0px; border-left: solid 3px white;"><i class="fa fa-fw fa-lg fa-cube"></i>'+e.floor_name+'</button>';
                        table+='<div id="'+e.floor_id+'" class="tabcontent col-lg-12" style="height:100%; padding: 5px 10px; background-color: #ffffff !important;">';
                        $.each(e.table_list, function (i, obj) {
                            table+='<div class="col-md-1 col-sm-2 col-xs-3 gallery" onclick="move(\'' + obj.layout_id+'\','+'\'' + master_id+'\''+' )">';
                            table+=obj.layout_name;
                            table+='<img class="img-responsive" src="<?php echo base_url("img/table_active.svg"); ?>"></div>';
                        });
                        table+='</div>';
                        $("#table").html(table);
                    });
                    $("#floor").html(floor);
                    document.getElementById("btn_default_tab").click();
                    
                }
                ,
                error: function (response){
                    alert('Unable to load sale data!!');
                }
            });
        }
        function order_index(des,index){
                    var tbody_length=$('#'+des+' tbody').find("tr").length;
                    var t_row=tbody_length;     
                    var table = $("#"+des+" tbody");
                     var a=1;
                     table.find('tr').each(function (i, el) {
                                var $tds = $(this).find('td');
                                $tds.eq(index).text(a);
                            a=a+1;     
                     });               
            }
        function move(table_id,master_id){
             message_box(table_id, master_id,0, 'Are you sure?','You want to move table!','<?php echo site_url("move_table/save"); ?>','<?php echo site_url("cashier_order_offline/new_order"); ?>');
        }
        function marge(master_id,table_id){
             var table = $("#table_checkbox tbody");
              var ch_item=[];
              table.find('tr').each(function (i, el) {
                var $tds = $(this).find('td');
                  if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                    ch_item.push({
                            ch_status:$tds.eq(0).find('input:checkbox').val()
                        });  
                  }     
                    
            });
              var ch=JSON.stringify(ch_item);
              
            if(ch_item.length==1){
                 swal("Information", "Please Select More than 1 table!!!", "info");
                 return false;
            }
            swal({
                title: "Information",
                text: "Are you sure to marge tabel?",
                type: "info",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
                },function (isConfirm) {
                    if (isConfirm){
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('merge_table/save')?>',
                            data: {'sale_master_id':master_id,'data':ch},
                            async: false,
                            success: function (response) {
                                //var json = JSON.parse(response);
                                window.open("<?php echo site_url('cashier_order_offline/new_order');?>" + "/" +table_id,"_self");
                            },
                            error: function (response) {
                            }
                        });
                    } 
                });

        }
        function message_box(table_id, master_id,detail_id, title, text, post_url, response_url){
            swal({
                title: title,
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
                },function (isConfirm) {
                    if (isConfirm){
                        $.ajax({
                            type: 'POST',
                            url: post_url,
                            async: false,
                            data: {'table_id':table_id,'sale_master_id':master_id,'sale_detail_id':detail_id},
                            success: function (response) {
                                var json = JSON.parse(response);
                                window.open(response_url + "/" + json.table_id + "/" + json.master_id,"_self");
                            },
                            error: function (response) {
                            }
                        });
                    } 
                });
        }

        var count=0;
        function load_category(){
            document.getElementById("table_name").setAttribute("style","float: right");
            var post_url = '<?php echo site_url('cashier_order_offline/load_category'); ?>';
            var html = '';
            var count_item=0;
            var width=0;
            var default_id ='';
            var default_name='';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response) {
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        for (var i = 0; i < list.length; i++) {
                            if(i==0){
                                default_id=list[i].item_type_id;
                                default_name=list[i].item_type_name;
                            }
                            count_item+=1;
                            if (list[i].item_type_photo == "" || list[i].item_type_photo == null) {
                                html += '<div class="category_list" id="'+ list[i].item_type_id +'" onClick="load_itemdetail(\'' + list[i].item_type_id+'\','+'\'' + list[i].item_type_name+'\',' + 'false' +')">'
                                        + '<img src="<?php echo base_url("img/icons/img_not_found.png"); ?>"  class="img-circle"  alt=""/>'
                                        + '<div class="desc" id="'+ list[i].item_type_id+'desc'+'">' + list[i].item_type_name + '</div>'
                                        + '</div>';
                            } else {
                                html += '<div class="category_list" id="'+ list[i].item_type_id +'" onClick="load_itemdetail(\'' + list[i].item_type_id+'\','+'\'' + list[i].item_type_name+'\','+ 'false' +')">'
                                        + '<img src="<?php echo base_url("img/item_type/"); ?>/' + list[i].item_type_photo + '" class="img-circle img-responsive" alt=""/>'
                                        + '<div class="desc" id="'+ list[i].item_type_id+'desc'+'"  >'  + list[i].item_type_name + '</div>'
                                        + '</div>';
                            }
                        }
                        $('#category_body').html(html);
                        for(var i=0; i<(count_item); i++)
                            width +=document.getElementsByClassName("category_list")[i].offsetWidth;
                            width +=document.getElementsByClassName("category_list")[0].offsetWidth
                            document.getElementById("category_body").setAttribute("style","width: "+(width+(20*count_item))+"px");
                            load_itemdetail(default_id, default_name,'ture');
                    }
                }
                ,
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        function table_order(){
            window.open("<?php echo site_url("table_order_offline"); ?>","_self");
        }
        function toggleFullScreen(elem) {
                if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
                    if (elem.requestFullScreen) {
                    elem.requestFullScreen();
                    } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullScreen) {
                    elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                    } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                    }
                } else {
                    if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                    } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                    }
                }
        }
        //animate on cate_layout by srieng
        function animation_item(){
            $('#cate_layout').fadeOut(50);
            $('#cate_layout').fadeIn(500);
        }
        //load item detail by srieng
        $('#scan_barcode').keyup(function(e){
            if(e.keyCode==13){
                scan_barcode($(this).val());
            }
        })
        function scan_barcode(datas=null){
            //Add style border to div category
            $(".category_list").removeClass("border_category");
            $(".desc").removeClass("background_desc");
            $('#cate_layout').html('');
            var post_url = '<?php echo site_url('cashier_order_offline/scan_barcode'); ?>';
            var html = '';
            $.ajax({
                type: 'POST',
                url: post_url,
                data:{search:datas},
                async: false,
                success: function (response) {
                    //get_category_name(type_name);
                    
                    $('#li_itemdetail').empty();
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        var img="";
                        for (var i = 0; i < list.length; i++) {
                            if (list[i].item_detail_photo == "" || list[i].item_detail_photo == null) {
                                 img="<?php echo base_url("img/company/noimgs.png"); ?>";
                            }else{
                                img="<?php  echo base_url("img/products/"); ?>"+'/'+list[i].item_detail_photo;
                            }
                            html += '<div class="item_detail_list" id="'+list[i].item_detail_id+'" onClick="order(\'' + list[i].item_detail_id+'\','+'\'' + list[i].item_detail_name+'\''+','+'\'' + list[i].price+'\''+','+'\'' + list[i].item_detail_cut_stock+'\''+')">'
                                         +'<div class="item_detail_list_img">'
                                         +'<img src="'+img+'">'
                                         +'<div class="item_detail_list_tag">' + "$ " + list[i].price +'</div>'
                                         +'</div>'
                                         +'<div class="item_detail_list_name">'
                                         + list[i].item_detail_name
                                         +'</div></div>';
                        }
                        $('#cate_layout').html(html);
                  

                    }
                }
                ,
                error: function (response) {
                    console.log('Unable to load sale data!!');
                }
            });
        }

        function load_itemdetail(type_id, type_name,load){
            //Add style border to div category
            $(".category_list").removeClass("border_category");
            $(".desc").removeClass("background_desc");
            $("#" + type_id).addClass("border_category");
            //$("#" + type_id+"desc").addClass("background_desc");
            //end style
            if(load=='false')
                animation_item();
            count=0;
            var post_url = '<?php echo site_url('cashier_order_offline/load_item_detail'); ?>' + '/' + type_id;
            var html = '';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response) {
                    get_category_name(type_name);
                    
                    $('#li_itemdetail').empty();
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        var img="";
                        for (var i = 0; i < list.length; i++) {
                            if (list[i].item_detail_photo == "" || list[i].item_detail_photo == null) {
                                 img="<?php echo base_url("img/company/noimgs.png"); ?>";
                            }else{
                                img="<?php  echo base_url("img/products/"); ?>"+'/'+list[i].item_detail_photo;
                            }
                            html += '<div class="item_detail_list" id="'+list[i].item_detail_id+'" onClick="order(\'' + list[i].item_detail_id+'\','+'\'' + list[i].item_detail_name+'\''+','+'\'' + list[i].price+'\''+','+'\'' + list[i].item_detail_cut_stock+'\''+')">'
                                         +'<div class="item_detail_list_img">'
                                         +'<img src="'+img+'">'
                                         +'<div class="item_detail_list_tag">' + "$ " + list[i].price +'</div>'
                                         +'</div>'
                                         +'<div class="item_detail_list_name">'
                                         + list[i].item_detail_name
                                         +'</div></div>';
                        }
                        $('#cate_layout').html(html);
                    }
                }
                ,
                error: function (response) {
                    console.log('Unable to load sale data!!');
                }
            });
        }
        function check_stock(item_detail_id,qty){

            var post_url="<?php echo site_url("cashier_order_offline/check_stock"); ?>";
            var a=0;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                data: {'item_id':item_detail_id,'qty':qty},
                success: function (response) {
                    var json = $.parseJSON(response);
                    if(json.status==='S0001'){
                        
                        a=1;
                    }else{
                        swal("Information", "Item is not enough in stock!!!", "warning");  
                        a=0;
                    }
                    
                },
                error: function (response) {
                    //$('#msg').html(response);
                }
            });
           
            return a;

        }
        //SAVE ORDER BY SRIENG
        function order(item_detail_id,item_detail_name,item_detail_price,cut_stock){
          
            var table_id=$("#txt_table_id").val();
            var sale_master_id = $('#txt_master_id').val();
            if(cut_stock=='1'){

                if(check_stock(item_detail_id,1)==1){

                }else{
                    return false;
                }
            }
            
            //return false;
            var post_url="<?php echo site_url("cashier_order_offline/save"); ?>";
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                data: {'txt_table_id':table_id,'item_id':item_detail_id,'txt_sale_master_id':sale_master_id},
                success: function (response) {
                    var json = $.parseJSON(response);
                    if(json.status==='S001'){
                        
                        add_to_list(json.sale_detail,item_detail_id,item_detail_name,item_detail_price,cut_stock);
                        set_invoice_no(json.sale_master);
                        var rate=json.ex_rate;
                     
                        var grand_total=$('#p_grand_total').text();
                        reload_order();
						socket.emit('order',{
                            id:table_id,
                            master:json.sale_master,
                            total_dollar:numeral(parseFloat(grand_total)).format('#.00'),
                            total_riel:numeral(grand_total*rate).format('#,#')
                        });
                    }
                    
                },
                error: function (response) {
                    //$('#msg').html(response);
                }
            });
        }
        function reload_order(){
            $('#table_order tbody').html('');
            var id="<?php echo $table_id;?>";
            var master_id="<?php echo $sale_master_id;?>";
            var post_url = '<?php echo site_url('cashier_order_offline/order_list') ?>';
            $.ajax({
            type: 'POST',
            dataType: "text",
            url: post_url,
            async: false,
            data: {'layout_id': id,'master_id':master_id},
            success: function (response) {  
                var value = JSON.parse(response);
                var item_all="";
                
                var grand_sub_total=0;
               
                
                $.each(value.sale,function(i,e){
                 
                    $('#lbl_dis_all').text(e.dis_all);
                    $('#lbl_tax').text(e.tax);
                    $('#txt_master_id').val(e.sale_master_id);
                    $('#txt_exchange_rate').val(e.sale_master_ex_rate);
                    $.each(e.sale_detail,function(k,j){

                            var item_detail_price=numeral(j.price).format('#.'+dot_0+'');
                            var ch_box='<td> <input type="checkbox" class="check-box-main" value="'+j.sale_detail_id+'" id="ch_item_detail" name="ch_item_detail[]" style="padding:1px;"></td>';

                            var item_name='<td class="item">'+j.detail_name+'</td>';
                            var item_price='<td class="item_nest">'+item_detail_price+'</td>';
                            var qtys='<div class="input-group" style=""><span class="input-group-btn"><button type="button" onclick="minus_qty('+j.sale_detail_id+','+j.item_id+')" class="btn btn-danger btn-number btn-xscc" data-type="minus" data-field="quant[2]"><span class="glyphicon glyphicon-minus"></span></button></span><input type="text" id="txt_qty'+j.sale_detail_id+'" onChange="qty_change('+j.sale_detail_id+','+j.item_id+')" name="quant[2]" class="form-control input-number text-center my-blur input-xscc" style="font-size: 17px;color: #13224B;" value="'+j.qty+'" min="1"><span class="input-group-btn"><button type="button" onclick="plu_qty('+j.sale_detail_id+','+j.item_id+','+j.cut_stock+')" class="btn btn-success btn-number btn-xscc" data-type="plus" data-field="quant[2]"><span class="glyphicon glyphicon-plus"></span></button></span></div>';

                            var qty='<td class="item_nest">'+qtys+'</td>';
                            var dis_dollar='<td class="item_nest">'+j.dis_dollar+'</td>';
                            var dis_percent='<td class="item_nest">'+j.dis_percent+'</td>';
                            var amount='<td class="item_nest">'+numeral(item_detail_price*j.qty).format('#.'+dot_0+'')+'</td>';
                            var items='<tr class="group'+j.sale_detail_id+' item_detail row'+j.sale_detail_id+'">'+ch_box+item_name+item_price+qty+dis_percent+dis_dollar+amount+'</tr>';
                           
                             var list_item_note="";
                             var notes_all="";
                             var grand_sub_total_note=0;
                             var total_sub=0;
                            $.each(j.sale_note,function(f,g){
                                    var item_note_price=numeral(g.price).format('#.'+dot_0+'');
                                        var blanks='<td id="'+j.sale_detail_id+'"></td>';
                                        var ch_box_note='<td class="item_note"> <input type="checkbox" class="check-box-note" value="'+g.id+'" >'+g.item_note_name+'</td>';
                                     
                                        var item_note_prices='<td class="item_nest">'+item_note_price+'</td>';
                                        var qty_note='<td class="item_nest text-center">'+g.qty+'</td>';
                                        var dis_dollar_note='<td class="item_nest">0.00</td>';
                                        var dis_percent_note='<td class="item_nest">0.00</td>';
                                        var amount_note='<td class="item_nest">'+numeral(item_note_price*g.qty).format('#.'+dot_0+'')+'</td>';
                                        list_item_note='<tr class="group'+g.sale_detail_id+' note'+g.item_note_id+'_'+g.sale_detail_id+' item_note note_detail'+g.sale_detail_id+' ">' +blanks+ch_box_note+item_note_prices+qty_note+dis_percent_note+dis_dollar_note+amount_note+'</tr>';
                                        total_sub=parseFloat(item_note_price*g.qty);
                                        notes_all=notes_all+list_item_note;
                                        grand_sub_total_note=parseFloat(grand_sub_total_note+total_sub);
                                        
                            });
                           
                            grand_sub_total=parseFloat(item_detail_price*j.qty)+parseFloat(grand_sub_total_note);

                            var sub_total='<tr class="sub_total sub_total'+j.sale_detail_id+'"><td style="height: 20px;"></td> <td class="item"></td><td class="item_nest"></td> <td class="item_nest"></td><td class="item_nest">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub</td>  <td class="item_nest"> Total</td> <td class="item_nest">'+numeral(grand_sub_total).format('#.'+dot_0+'')+'</td></tr> ';
                            item_all=item_all+items+notes_all+sub_total;   
                    });
                   
                });
                $('#table_order tbody').html(item_all);
                totals();
                
            }
            ,
            error: function (response) {
                alert('Unable to load sale data!!');
            }
        });
        }
        //ADD DATA DYNAMIC TO TABLE LIST 
        function add_to_list(sale_detail_id,item_detail_id,item_detail_name,item_detail_price,cut_stock){ 
                var item_detail_price=numeral(item_detail_price).format('#.'+dot_0+'');
                var ch_box='<td> <input type="checkbox" class="check-box-main" value="'+sale_detail_id+'" id="ch_item_detail" name="ch_item_detail[]"></td>';
                var item_name='<td class="item">'+item_detail_name+'</td>';
                var item_price='<td class="item_nest">'+item_detail_price+'</td>';
                var qtys='<div class="input-group" style=""><span class="input-group-btn"><button type="button" onclick="minus_qty('+sale_detail_id+','+item_detail_id+')" class="btn btn-danger btn-number btn-xscc" data-type="minus" data-field="quant[2]"><span class="glyphicon glyphicon-minus"></span></button></span><input type="text" id="txt_qty'+sale_detail_id+'" onChange="qty_change('+sale_detail_id+','+item_detail_id+')" name="quant[2]" class="form-control input-number text-center my-blur input-xscc" value="1" min="1"><span class="input-group-btn"><button type="button" onclick="plu_qty('+sale_detail_id+','+item_detail_id+','+cut_stock+')" class="btn btn-success btn-number btn-xscc" data-type="plus" data-field="quant[2]"><span class="glyphicon glyphicon-plus"></span></button></span></div>';
                var qty='<td class="item_nest">'+qtys+'</td>';
                var dis_dollar='<td class="item_nest">0.00</td>';
                var dis_percent='<td class="item_nest">0.00</td>';
                var amount='<td class="item_nest">'+item_detail_price+'</td>';
                var html='<tr class="group'+sale_detail_id+' item_detail row'+sale_detail_id+'">'+ch_box+item_name+item_price+qty+dis_percent+dis_dollar+amount+'</tr>';
                
                var sub_total='<tr class="sub_total sub_total'+sale_detail_id+'"><td style="height: 20px;"></td> <td class="item"></td> <td class="item_nest"></td> <td class="item_nest"></td> <td class="item_nest">Sub</td> <td class="item_nest">Total</td> <td class="item_nest">'+item_detail_price+'</td></tr> ';
                $('#table_order tbody').append(html+sub_total);
                order_list_auto_scroll();
                totals();
        }
        function add_to_note_list(item_note_id,item_note_name,item_note_price,sale_detail_id){ 
                var item_note_price=numeral(item_note_price).format('#.'+dot_0+'');
                var blanks='<td></td>';
                var ch_box='<td class="item_note"> <input type="checkbox" class="check-box-note" value="'+item_note_id+'" >'+item_note_name+'</td>';
             
                var item_note_prices='<td class="item_nest">'+item_note_price+'</td>';
                var qty='<td class="item_nest text-center">'+$('#txt_qty'+sale_detail_id+'').val()+'</td>';
                var dis_dollar='<td class="item_nest">0.00</td>';
                var dis_percent='<td class="item_nest">0.00</td>';
                var amount='<td class="item_nest">'+numeral(item_note_price*$('#txt_qty'+sale_detail_id+'').val()).format('#.'+dot_0+'')+'</td>';
                var html='<tr class="group'+sale_detail_id+' note'+item_note_id+'_'+sale_detail_id+' item_note note_detail'+sale_detail_id+'">'+blanks+ch_box+item_note_prices+qty+dis_percent+dis_dollar+amount+'</tr>';
                $('#table_order tbody').find('tr.sub_total'+sale_detail_id+'').before(html);
               
                order_list_auto_scroll();
                sub_totals(sale_detail_id);
                totals();
        }
        function sub_totals(sale_detail_id){
            var table = $("#table_order tbody");
            var sub_total=0;
             table.find('tr.group'+sale_detail_id+'').each(function (i, el) {
                var $tds = $(this).find('td');
                    total=parseFloat($tds.eq(6).text());
                    sub_total+=total;       
            });
            
            $('#table_order tbody tr.sub_total'+sale_detail_id+'').find('td:eq(6)').text(numeral(sub_total).format('#.'+dot_0+''));

        }
        function totals(){
                    var table = $("#table_order tbody");
                    var total=0;
                    table.find('tr.sub_total').each(function (i, el) {
                        var $tds = $(this).find('td');
                            sub_total=parseFloat($tds.eq(6).text());
                            total+=sub_total;       
                    }); 
                    
                    $('#p_total').text(numeral(total).format('#.'+dot_0+''));
                    total_dis();
                    var dis=parseFloat($('#p_dis').text());
                    var txt_dis_all=parseFloat($('#lbl_dis_all').text());
                    var grand_after_dis_item=parseFloat(numeral(total).format('#.'+dot_0+''))-parseFloat(numeral(dis).format('#.'+dot_0+''));
                    var dis_all=grand_after_dis_item*parseFloat(numeral(txt_dis_all/100).format('#.'+dot_0+''));
                    $('#p_dis_all').text(numeral(dis_all).format('#.'+dot_0+''));
                   
                    var tax_per=parseFloat($('#lbl_tax').text());
                    var tax=(parseFloat(numeral(total).format('#.'+dot_0+''))-parseFloat(numeral(dis).format('#.'+dot_0+''))-parseFloat(numeral(dis_all).format('#.'+dot_0+'')))*parseFloat(numeral(tax_per/100).format('#.'+dot_0+''));
                    $('#p_tax').text(numeral(tax).format('#.'+dot_0+''));
                    
                    var grand_total=((parseFloat(numeral(total).format('#.'+dot_0+''))-parseFloat(numeral(dis).format('#.'+dot_0+'')))-parseFloat(numeral(dis_all).format('#.'+dot_0+'')))+parseFloat(numeral(tax).format('#.'+dot_0+''));
                    $('#p_grand_total').text(numeral(grand_total).format('#.'+dot_0+''));
        }
        function total_dis(){
             var table = $("#table_order tbody");
             var grand_total_dis=0;
              table.find('tr.item_detail').each(function (i, el) {
                            var $tds = $(this).find('td');
                                u_price=parseFloat($tds.eq(2).text());
                                qty=parseInt($tds.eq(3).find('input').val());
                      
                                dis_percent=parseFloat($tds.eq(4).text());
                                dis_dollar=parseFloat($tds.eq(5).text());
                                if(dis_percent>0){
                                    grand_total_dis+=(u_price*qty)*(dis_percent/100);
                                }else{
                                    grand_total_dis+= dis_dollar;
                                }    
                        }); 
              $('#p_dis').text(numeral(grand_total_dis).format('#.'+dot_0+''));
        }
        function delete_item_detail(){
            var temp=true;
            if(check_permission("Delete Item")==0) temp=false;
            var master_id=$('#txt_master_id').val();
            $.ajax({
                type:"POST",
                url:'<?php echo site_url('cashier_order_offline/get_printed_bill')?>',
                async:false,
                data:{'master_id':master_id},
                success:function(respone){
                    if(respone>0){
                        if(check_permission("Delete after print bill")==0){
                            temp=false;
                        } 
                    }
                },
                error:function(respone){

                }
            });
            var table = $("#table_order tbody");
            var ch_item=[];
            table.find('tr').each(function (i, el) {
                var $tds = $(this).find('td');
                if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                    ch_item.push({
                        items_id:$tds.eq(0).find('input:checkbox').val()
                    });  
                    if(temp==false) return;
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('cashier_order_offline/get_printed')?>',
                        async: false,
                        data:{'id':$tds.eq(0).find('input:checkbox').val()},
                        success: function (response){
                            if(response>0){
                                if(check_permission("Delete After Order")==0) temp= false;
                            }
                        }
                        ,
                        error: function (response){
                            swal("Information", "You don't have permission!!!", "warning");
                        }
                    });
                }
            });
            if(ch_item.length<=0){
                setTimeout(function(){ swal("Information", "Please select item!!!", "info"); },200);
                return;
            }
            if(temp==false){ 
                setTimeout(function(){ swal("Information", "You don't have permission!!!", "warning"); },200);
                return false;
            }
            setTimeout(function(){
                swal({
                    title: "Are you sure?",
                    text: "You want to delete this items!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm){
                        var table = $("#table_order tbody");
                        var ch_item=[];
                        var ch_item1=[];
                        table.find('tr').each(function (i, el) {
                           // debugger;
                            var $tds = $(this).find('td');
                              if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                                ch_item.push({
                                    items_id:$tds.eq(0).find('input:checkbox').val()
                                });  
                              }
                              //
                              if($tds.eq(1).find('input:checkbox').is(':checked')==true){
                                ch_item1.push({
                                    sale_note_id:$tds.eq(1).find('input:checkbox').val()
                                });  
                              }        
                        });
                        var data=JSON.stringify(ch_item);
                        var data1=JSON.stringify(ch_item1);
                        // if(ch_item.length<0){
                        //      swal("Information", "Please Select Item to Delete!!!", "info");
                        //     return false;
                           
                        // }
                        
                        $.ajax({
                            url: "<?php echo site_url('cashier_order_offline/delete_item_detail'); ?>",
                            type: 'POST',
                            async: false,
                            dataType: 'html',
                            data: {'data': data,'data1':data1},
                        })
                        .done(function() {
                            //console.log("success");
                            reload_order();
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                    } 
                }); 
            },300);
        }

        function save_item_note(item_note_id,item_note_name,item_note_price){
            var table = $("#table_order tbody");
              var ch_item=[];
              table.find('tr.item_detail').each(function (i, el) {
                var $tds = $(this).find('td');
                  if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                    ch_item.push({
                            ch_status:$tds.eq(0).find('input:checkbox').val()
                        });  
                  }       
            });
              var ch=JSON.stringify(ch_item);
              //alert(ch);return;
              if(ch_item.length==1){
                    var json=$.parseJSON(ch);
                    var s_detail_id="";
                    $.each(json, function(key, item) {
                        s_detail_id=item.ch_status;
                    });
              }else{
                //alert('multiply');
              }
              
             if($('.note'+item_note_id+'_'+s_detail_id+' ').length>0){
                alert('exist');
                return;
             }
              

              var qty=$('#txt_qty'+s_detail_id+'').val();
              var post_url = "<?php echo site_url('cashier_order_offline/save_item_note'); ?>";
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data: {'item_note_id': item_note_id,'item_note_price':item_note_price,'qty':qty,'sale_detail_id':s_detail_id,'sale_note_id':""},
                    success: function (response) {
                        add_to_note_list(item_note_id,item_note_name,item_note_price,s_detail_id);
						var table_id=$("#txt_table_id").val();
                        var sale_master_id = $('#txt_master_id').val();
                        var rate=$('#txt_exchange_rate').val();
                        var grand_total=$('#p_grand_total').text();
             
                        socket.emit('order',{
                            id:table_id,
                            master:json.sale_master_id,
                            total_dollar:numeral(parseFloat(grand_total)).format('#.00'),
                            total_riel:numeral(grand_total*rate).format('#,#')
                        });
                    },
                    error: function (response) {
                       
                        console.log("An error occure while saving data!");
                    }
                }); 
       
        }
        //load item note by srieng
        function load_item_note() {
            count=0;
            var post_url = '<?php echo site_url('cashier_order_offline/load_item_note'); ?>';
            var html = '';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response) {
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        
                        for (var i = 0; i < list.length; i++) {
                            html +=       '<div class="item_note" id="'+list[i].item_note_id+'" onClick="save_item_note(\'' + list[i].item_note_id+'\','+'\'' + list[i].item_note_name+'\''+','+'\'' + list[i].item_note_price+'\''+')">'
                                        + '<label class="label_price">' + "$" + list[i].item_note_price + '</label>'
                                        + '<img src="<?php echo base_url("img/icons/note-md.png"); ?>" alt=""/>'
                                        + '<div class="item_detail_desc">' + list[i].item_note_name + '</div>'
                                        + '</div>';
                        }
                        $('#cate_layout').html(html);
                    }
                    //hide_loading();
                }
                ,
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        
        function get_category_name(cate_name){
            $("#angle_right").show();
            $("#lbl_category").show();
            $("#lbl_category").text(cate_name);
        }
        var func='';
        function load_data(temp){
            if(check_no_order()==false)
                return false;
            if(check_permission("Pay Print Receipt")==0) return;
            //print_to_kitchen();
            var post_url = "<?php echo site_url("cashier_order_offline/order_list_bill")?>";
            var receipt = $('#txt_master_id').val(); 
            var total_us_reciep,total_kh_reciep=0.00;
            var other_card = $("#txt_card_payment").val() == "" ? 0 : parseFloat($("#txt_card_payment").val().replace(/,/g,'').replace('$ ',''));
            var member_card =$("#txt_member_card").val() == "" ? 0 : parseFloat($("#txt_member_card").val().replace(/,/g,'').replace('$ ',''));
            //card pay
            var pay_us = $("#txt_pay_dollar").val().replace(/,/g,'');
            var pay_kh = $("#txt_pay_riel").val().replace(/,/g,'');
            pay_us = pay_us == "" ? 0 : parseFloat(pay_us);
            pay_kh = pay_kh == "" ? 0 : parseInt(pay_kh);
            var my_pay=other_card+member_card+pay_us;
            var hak_return_kh=$("#txt_return_riel").val();
            var hak_return_us=$("#txt_return_dollar").val();
            hak_return_us = hak_return_us == "" ? '$ 0.00' : hak_return_us;
            hak_return_kh = hak_return_kh == "" ? 0 : hak_return_kh;
            $.ajax({
                type: 'POST',
                url: post_url,
                async:false,
                data:{"master_id":receipt,"layout_id":''},
                success: function (response) {
                        var json;
                        try {
                            json = $.parseJSON(response);
                        } catch(err){
                            showTost(err.message);
                            return;
                        }
                    $("#div").html('');
                    var index_table=0;
                    var font_small="10px";
                    var font_big="12px";
                    //try {
                    $.each(json.sale,function(i,e){
                            var printer=e.printer;
                            var item_note = "";
                            var header = "";
                            var data = "";
                            var footer = '';
                            var item ="";
                            header = '<svg xmlns="http://www.w3.org/2000/svg"> width="100%" height="100%"' +
                                 '<foreignObject width="100%" height="100%">' +
                                 '<div xmlns="http://www.w3.org/1999/xhtml" style="font-size:12px">';
                            data += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
                            data+='<tr><td colspan="6" style="text-align: center;"><img width="150px" src="'+e.com_img+'"/></td></tr>';
                            data+='<tr><td colspan="6" class="comcenter" >'+e.com_name+'</td></tr>';
                            data+='<tr><td colspan="6" class="headcenter">Tel: '+e.com_phone+'/'+e.com_email+'</td></tr>';
                            data+='<tr><td colspan="6" class="headcenter">Address: '+e.com_address+'</td></tr>';
                            var inv='';
                            if(temp=='receipt'){
                                inv='#'+e.sale_master_invoice_no;
                            }
                            data += '<tr><td colspan="1" class="headleft">'+inv+'</td>';
                            data += '<td colspan="5" class="headright">Date : '+
                            $.datepicker.formatDate( "d-M-yy",new Date(e.sale_master_start_date))+'</td></tr>';
                            data += '<td colspan="1" class="headleft">In : '+
                            new Date(e.sale_master_start_date).toLocaleTimeString()+'</td>';
                            if(temp=="bill"){
                                data += '<td colspan="5" class="headright">Out : '+
                                new Date(e.sale_master_print_date).toLocaleTimeString()+'</td></tr>';
                            }else if(temp=="receipt"){
                                data += '<td colspan="5" class="headright">Out : '+
                                new Date(e.sale_master_end_date).toLocaleTimeString()+'</td></tr>';
                            }
                            
                            data+='<tr><td colspan="1" class="headleft">Cashier : '+ e.cashier +'</td>';
                            data+='<td colspan="5" class="headright">'+$('#table_name').html()+'</td></tr>';  
                            if(temp=="bill"){
                                data+='<tr><td colspan="6" class="headcenter">BILL</td></tr>';
                            }else if(temp=="receipt"){
                                data+='<tr><td colspan="6" class="headcenter">INVOICE</td></tr>';
                            }


                            data += '<tr><td colspan="1" class="table_headleft">Item</td>';
                            data+='<td colspan="1" class="table_headcenter">Qty</td>';
                            data += '<td colspan="1" class="table_headcenter">Price</td>';
                            data +='<td colspan="1" class="table_headcenter">Dis$</td>';
                            data+='<td colspan="1" class="table_headcenter">Dis%</td>';
                            data+='<td colspan="1" class="table_headcenter">Amount</td></tr>';
                          
                            $.each(e.sale_detail,function(j,t){
                                 var notes='';
                                    var total=t.sale_note.length;
                                    $.each(t.sale_note,function(l,m){
                                        notes += '<tr><td colspan="1" class="mainleft">*'+m.item_note_name+'</td><td colspan="1" class="maincenter">'+m.qty+'</td><td colspan="1" class="maincenter">'+m.price+'</td><td colspan="1" class="maincenter"></td><td colspan="1" class="maincenter"></td><td colspan="1" class="maincenter">'+m.price+'</td></tr>';
                                    });
                                item += '<tr><td colspan="1" style="font-weight: bold;font-size: '+font_small+';font-family: Khmer OS Battambang;border-bottom: 0.5px dotted black;">'+t.detail_name+'</td><td colspan="1" class="maincenter"">'+t.qty+'</td><td colspan="1" class="maincenter">'+t.price+'</td><td colspan="1" class="maincenter">'+t.dis_dollar+'</td><td colspan="1" class="maincenter">'+t.dis_percent+'</td><td colspan="1" class="maincenter">'+((t.qty*t.price)-((t.qty*t.dis_dollar)+((t.dis_percent*t.price/100)*t.qty))).toFixed(dot_num)+'</td></tr>'+notes;
                            });   
                            data += item;
                            data+='<tr><td colspan="2" class="subright_ftborder">Sub Total:</td><td colspan="2" class="subright_ftborder">'+parseInt((e.ex_rate*$("#p_total").html()).toFixed(0)).toLocaleString( "en-US" )+' R</td><td colspan="2" class="subright_ftborder">$ '+$("#p_total").html()+'</td></tr>';
                            data+='<tr><td colspan="2" class="subright">Discount '+e.dis_inv+'%:</td><td colspan="2" class="subright">'+parseInt((e.ex_rate*$("#p_dis_all").html()).toFixed(0)).toLocaleString( "en-US" )+' R</td><td colspan="2" class="subright">$ '+$("#p_dis_all").html()+'</td></tr>';
                            var dis_member=0;
                            if(e.member_discount!=0){
                                dis_member=((($("#p_total").html()-$("#p_dis_all").html())*e.member_discount)/100).toFixed(dot_num);
                                data+='<tr><td colspan="2" class="subright">Member '+e.member_discount+'%:</td><td colspan="2" class="subright">'+parseInt((dis_member)*e.ex_rate).toLocaleString( "en-US" )+' R</td><td colspan="2" class="subright">$ '+dis_member+'</td></tr>';
                            }
                            if(e.vat!=0){
                                var temp_vat=((($("#p_total").html()-$("#p_dis_all").html()-dis_member)*e.vat)/100).toFixed(dot_num);
                               data+='<tr><td colspan="2" class="subright">VAT '+e.vat+'%:</td><td colspan="2" class="subright">'+parseInt((temp_vat)*e.ex_rate).toLocaleString( "en-US" )+' R</td><td colspan="2" class="subright">$ '+ temp_vat +'</td></tr>'; 
                            }
                            if(temp=="bill"){
                                data+='<tr><td colspan="2" class="subright_ftborder">Total:</td><td colspan="2" class="subright_ftborder">'+parseInt(e.ex_rate*$("#p_grand_total").html()).toLocaleString( "en-US" )+' R</td><td colspan="2" class="subright_ftborder">$ '+$("#p_grand_total").html()+'</td></tr>';
                            }
                            else if(temp=="receipt"){
                                data+='<tr><td colspan="2" class="subright_ftborder">Total:</td><td colspan="2" class="subright_ftborder">'+$('#txt_amount_riel').val()+' R</td><td colspan="2" class="subright_ftborder">$ '+grand_return_us+'</td></tr>';
                                var cash_type="";
                                if(other_card!=0){
                                    cash_type=$("#select_card option:selected").text();
                                }else if(member_card!=0){
                                    cash_type="Member Card";
                                }else if(pay_us!=0||pay_kh!=0){
                                    cash_type="Cash";
                                }
                                data+='<tr><td colspan="2" class="subright">'+cash_type+':</td><td colspan="2" class="subright">'+pay_kh+' R</td><td colspan="2" class="subright">$ '+my_pay.toFixed(dot_num)+'</td></tr>';
                                data+='<tr><td colspan="2" class="subright">Return:</td><td colspan="2" class="subright">'+hak_return_kh+' R</td><td colspan="2" class="subright">'+hak_return_us+'</td></tr>';
                            }
                            data+='<tr><td colspan="6" class="footcenter">WIFI: '+e.com_wifi+'</td></tr>';
                            data+='<tr><td colspan="6" class="footcenter">សូមអរគុណ!សូមអញ្ជើញមកម្តងទៀយ</td></tr>';
                            data+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                            data+='</table>';
                            footer += '</div>';
                            footer += '</foreignObject>';
                            footer += '</svg>';
                            $("#div").append(data);
                            myprint(temp,printer);
                    });

                    // } catch(err){
                    //     alert('error');
              
                    //     return;
                    // }
                },
                error: function (response) {
                    showTost('No items printed!');
                }
            });
            
        }
        function myprint(temp,printer){
            setTimeout(function(){
            var html =` <style> 
                .comcenter{
                    text-align:center;font-weight: bold;font-size: 17px;font-family: Khmer OS Battambang;
                }
                .headleft{
                    text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .headright{
                    text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .headcenter{
                    text-align:center;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }

                .table_headleft{
                    text-align:left;border-top: black solid 1px;border-bottom: black solid 1px;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }
                .table_headcenter{
                    text-align:center;border-top: black solid 1px;border-bottom: black solid 1px;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }


                .mainleft{
                    border-bottom: 0.5px dotted;text-align:left;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }
                .maincenter{
                    border-bottom: 0.5px dotted;text-align:center;padding: 2px 0px 2px 0px;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }

                .subright_ftborder{
                    border-top: black solid 1px;text-align:right;text-align:right;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }
                .subright{
                    text-align:right;text-align:right;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                }

                .footcenter{
                    text-align:center;font-weight: bold;font-size:9px;font-family: Khmer OS Battambang;
                }

             </style> `+ $("#div").html();

            $("html").empty();
            $("html").append(html);
            window.print();
            if(temp=='bill'){
                location.reload();
            }
            else if(temp=='receipt'){
                $.ajax ({
                    url:"<?php echo site_url("cashier_order_offline/cash_drawer")?>",
                    type:'post',
                    async: false,
                    data:{"printer":printer},
                    success:function(){
                    }
                });
                window.location.href = '<?php echo site_url("table_order_offline"); ?>';
            }
            
            }, 100);

        }
        $(document).ready(function () {
            
            discount_keyboard('#txt_my_discount_dollar');
            discount_keyboard('#txt_my_discount_percent');
            discount_keyboard('#txt_my_discount_invoice');

            $(document).on("keypress",".input-number",function(e){
                var num=$(this).val().length;
                if(num>=3){
                    return false;
                }
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
            $(document).on("paste",".input-number",function(e){
                var text = e.originalEvent.clipboardData.getData('Text');
                if(Math.floor(text) == text && $.isNumeric(text))
                {
                }else{
                    e.preventDefault();
                }
            }); 
            //LOAD DATA
            load_table_name();
            load_category();
            reload_order();
            if($('#txt_master_id').val()==""){
                load_tax();
            }
            
            
            order_list_auto_scroll();
			var table_id=$("#txt_table_id").val();
            var master_id = $('#txt_master_id').val();
            
            if(master_id!="" && table_id!=""){
                display();
            }else{
                socket.emit('dis_welcome',{
                    status:'none'
                });
            }
            //
            var result = 0;
            var prevEntry = 0;
            var operation = null;
            var currentEntry = '0';
            
            updateScreen(result);
             //button calculator by srieng
            $('.button').on('click', function (evt) {
                var buttonPressed = $(this).html();
                //console.log(buttonPressed);
               
               
                //add class selected to button by srieng
                $('.button').removeClass('selected');
                $(this).addClass('selected');
                //
                if (buttonPressed === "C") {
                    result = 0;
                    currentEntry = '0';
                } else if (buttonPressed === "CE") {
                    currentEntry = '0';
                } else if (buttonPressed === "Note") {
                    if(check_permission("Item note")==0) return;
                    setTimeout(function(){var table = $("#table_order tbody");
                      var ch_item=[];
                      table.find('tr.item_detail').each(function (i, el) {
                        var $tds = $(this).find('td');
                          if($tds.eq(0).find('input:checkbox').is(':checked')==true){
                            ch_item.push({
                                    ch_status:$tds.eq(0).find('input:checkbox').val()
                                });  
                          }     
                            
                    });
                      var ch=JSON.stringify(ch_item);
                      //get_sale_detail_id
                      if(ch_item.length==1){   
                        get_category_name("Item Note");
                        load_item_note(); 
                      }else{
                         swal("Information", "Please Select Item to add Note!!!", "info");
                         return false;
                      }
                },200);
                    //currentEntry = currentEntry.substring(0, currentEntry.length-1);
                } else if (buttonPressed === "Qty") {
                    func='qty';
                    result = 0;
                    currentEntry = '0';

                } else if (buttonPressed === '.') {

                    currentEntry += '.';
                } else if (isNumber(buttonPressed)) {
                    if (currentEntry === '0')
                        currentEntry = buttonPressed;
                    else
                        currentEntry = currentEntry + buttonPressed;
                        updateScreen(currentEntry);
                } else if (isOperator(buttonPressed)) {
                    prevEntry = parseFloat(currentEntry);
                    operation = buttonPressed;
                    //currentEntry = '';
                } else if (buttonPressed === 'Dis$') {
                    func='Dis$';
                    result = 0;
                    currentEntry = '0';
                } else if (buttonPressed === 'Del') {
                    //currentEntry = Math.sqrt(currentEntry);
                   // alert("del");
                   if(check_no_order()==1){
                        delete_item_detail();
                   }
                    
                } else if (buttonPressed === 'Order') {
                    //currentEntry = 1 / currentEntry;
                    if(check_no_order()==1){
                        if(check_permission("Order")==0) return;
                        print_to_kitchen();
                    }
                    
                } else if (buttonPressed === 'Dis%') {
                    func='Dis%';
                    result = 0;
                    currentEntry = '0';
                }else if (buttonPressed === 'DisInv') {
                    func='DisInv';
                    result = 0;
                    currentEntry = '0';
                }else if (buttonPressed === '=') {
                    currentEntry = operate(prevEntry, currentEntry, operation);
                    operation = null;
                }
                
            });
        });

        updateScreen = function (displayValue) {

            var displayValue = displayValue.toString();
            $('.screen').html(displayValue.substring(0, 10));
            if(func==="qty"){
                update_qty(displayValue.substring(0, 10));
            }else if(func==="Dis%"){
                update_discount_dollar(0);
                update_discount_percent(displayValue.substring(0, 10));
            }else if(func==="Dis$"){
                update_discount_percent(0);
                update_discount_dollar(displayValue.substring(0, 10));
            }
        };
        
        isNumber = function (value) {
            return !isNaN(value);
        }
        
        isOperator = function (value) {
            return value === '/' || value === '*' || value === '+' || value === '-';
        };
        
        operate = function (a, b, operation) {
            a = parseFloat(a);
            b = parseFloat(b);
            console.log(a, b, operation);
            if (operation === '+')
                return a + b;
            if (operation === '-')
                return a - b;
            if (operation === '*')
                return a * b;
            if (operation === '/')
                return a / b;
        }
        //reload order
        function print_to_kitchen(){
            var order_no=$("#txt_master_id").val();
            //self.close()
            window.open("<?php echo site_url("cashier_order_offline/kitchen_print"); ?>"+"/"+order_no,"_blank");

       }
        //end reload order
        //LOAD TABLE NAME TO LABEL
        function load_table_name(){
            var post_url = '<?php echo site_url('cashier_order_offline/load_table_name/'); ?>' + '/' + <?php echo $table_id; ?>;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response) {
                    var table = JSON.parse(response);
                    $("#table_name").text("Table: "+table.table_name);
                }
                ,
                error: function (response) {
                    alert('Unable to load table name!!');
                }
            });
        }
        
        function load_tax(){
            var post_url="<?php echo site_url("cashier_order_offline/load_tax"); ?>";
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                success: function (response) {
                    var tax = JSON.parse(response);
                    $("#lbl_tax").text(tax.tax_amount);
                },
                error: function (response) {
                    //$('#msg').html(response);
                }
            });
        }
        
        
       
        //SET MASTER ID TO TEXTBOX
        function set_invoice_no(invoice_no){
            $('#txt_master_id').val(invoice_no);
            var formattedInvoice = pad(invoice_no,7);
            $('#lbl_master_id').text("INVOICE: " + formattedInvoice);
        }
        //FORMAT NUMBER WITH LEADING 0
        function pad(number, length) {
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }

            return str;

        }
        
        function order_list_auto_scroll(){
           $('#panel_order_item').animate({scrollTop: $('#panel_order_item')[0].scrollHeight}, 500);
        }
        function checkbox_uncheck(){
             $(".checkbox").prop('checked', false);
        }
        $('#txt_barcode').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("cashier_order_offline/searchproduct"); ?>',
                        dataType: "json",
                        async: false,
                        data: {
                            name_startsWith: request.term,
                            type: 'product_name',
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
                    var item_detail_id,item_detail_name,item_detail_price;
                    var names = ui.item.data.split("|");
                    item_detail_name    =names[0];
                    item_detail_id      =names[1];
                    item_detail_price   =names[2];
                    
                    //order(item_detail_id,item_detail_name,item_detail_price,0,1);
                    $('#txt_barcode').text("");
                }
            });
    </script>
    <script type="text/javascript">

  
    function void_invoice(master_id){
      
            if(master_id==""){
                    reload_order();
                    return false;
            }
            setTimeout(function(){swal({
                    title: "Are you sure?",
                    text: "You want to void this invoice!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm){
                        var post_url="<?php echo site_url("cashier_order_offline/save_void"); ?>";
                        $.ajax({
                            type: 'POST',
                            url: post_url,
                            async: false,
                            data: {'sale_master_id':master_id},
                            success: function (response) {
                                window.open("<?php echo site_url("table_order_offline"); ?>","_self");
                            },
                            error: function (response) {
                            }
                        });
                    } 
                })},200);
        }
 

        
        $("[trigger='calculate']").on("change", function (e) {
//            total_exchange(isNaN(this.value) ? 0 : this.value);
            calculate_return();
        });
        $("[trigger='calculate']").on("keyup", function (e) {
            calculate_return();
        });
        function update_card_amount(){
            var post_url = '<?php echo site_url("cashier_order_offline/update_card")?>';
            var card_number = $("#txt_card_number").val();
            var invoice_no = $("#txt_master_id").val();
            var card_amount = $("#txt_member_card").val().replace("$","");
            var payment_amount = $("#txt_card_payment").val().replace("$","");
            var payment_card_type = $("#select_card").val();
            
            total_us = $("#txt_amount_dollar").val();
            total_us = total_us.replace("$","");
            
            $.ajax({
                type: 'POST',
                url: post_url,
                async: false,
                data:{'card_number':card_number,'card_amount':card_amount,'total_us':total_us,'payment_amount':payment_amount,'payment_card_type':payment_card_type},
                success: function (data){
                    var json = JSON.parse(data);
                    if(json.statusCode != 'S0001'){
                        window.open("<?php echo site_url("cashier_order_offline/payment_receipt");?>"+ "/" + invoice_no,"_self");
                    }else{
                        alert("An error occure while saving data!");
                    }
                    
                },
                error: function (response) {
                    alert("An error occure while saving data!");
                }
            });
        }
        
        function printer_receipt(invoice_no){
            
        }

        //End Button Pay
        function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
        }
        
    </script>
</html>
