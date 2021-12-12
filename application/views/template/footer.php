</section>
<!--main content end-->
</section>
<!-- container section start -->

<script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>
<script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
      
<script type="text/javascript" src="<?php echo base_url("js/webcam.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/export.js"); ?>"></script> 

<!-- javascripts -->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script src="<?php //echo base_url('js/jquery-ui-1.10.4.min.js');  ?>"></script>
<script src="<?php //echo base_url('js/jquery-1.8.3.min.js');  ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<!-- nice scroll -->
<script src="<?php echo base_url('js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.nicescroll.min.js'); ?>" type="text/javascript"></script>
<!-- charts scripts -->
<script src="<?php echo base_url('assets/jquery-knob/js/jquery.knob.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>"></script>
<script src="<?php echo base_url('js/owl.carousel.js'); ?>" ></script>
<!-- jQuery full calendar -->
<script src="<?php echo base_url('js/fullcalendar.min.js'); ?>"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url('assets/fullcalendar/fullcalendar/fullcalendar.js'); ?>"></script>
<!--script for this page only-->
<script src="<?php echo base_url('js/calendar-custom.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.rateit.min.js'); ?>"></script>
<!-- custom select -->
<script src="<?php echo base_url('js/jquery.customSelect.min.js'); ?>" ></script>
<script src="<?php echo base_url('assets/chart-master/Chart.js'); ?>"></script>

<!--custome script for all page-->
<script src="<?php echo base_url('js/scripts.js'); ?>"></script>
<!-- custom script for this page-->
<script src="<?php echo base_url('js/sparkline-chart.js'); ?>"></script>
<script src="<?php echo base_url('js/easy-pie-chart.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script src="<?php echo base_url('js/xcharts.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.autosize.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.placeholder.min.js'); ?>"></script>
<script src="<?php echo base_url('js/gdp-data.js'); ?>"></script>	
<script src="<?php echo base_url('js/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('js/sparklines.js'); ?>"></script>	
<script src="<?php echo base_url('js/charts.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?php echo base_url('js/form-validation-script.js'); ?>"></script>
<!-- jquery validate js -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js'); ?>"></script>
<!-- DataTables -->
<!--<script src="<?php //echo base_url('js/datatable/datatables.js'); ?>"></script>-->
<script src="<?php echo base_url('js/datatable/jquery.dataTables.min.js') ?>"></script>
<!--<script src="<?php //echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>-->
<!-- <script src="<?php //echo base_url('resources/syntax/shCore.js'); ?>"></script>
 --><script src="<?php echo base_url('js/jquery.table2excel.js'); ?>"></script>
<script>
    var dot_0='00';
    var dot_num=4; 
    var copy_right="Copyright &copy; www.softpointcambodia.com";
    //knob
    $(function () {

        $(".knob").knob({
            'draw': function () {
                $(this.i).val(this.cv + '%')
            }
        });

    });

    //carousel
    $(document).ready(function () {
                
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });

        $('.allow-decimal').keypress(function (event) {
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
            $('.allow-decimal').bind("paste", function (e) {
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

            $('.my_blur').on('blur',function(){
                    var vals=$(this).val();
                    if(vals=="" || vals==null){
                      $(this).val(0);
                    }
                });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function () {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                        values: gdpData,
                        scale: ['#000', '#000'],
                        normalizeFunction: 'polynomial'
                    }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
    $(document).ready(function () {
        var li = $("#li_active");
        //alert(li.parent().parent().attr('class'));
        li.parent().parent().addClass('sub_active');
        //li.parent().attr('style', 'display: block');
    });
     ////function osk 
         function node_osk() {
             $.ajax({
                url: "http://localhost:85/node_osk",
                type: 'GET',
                success: function(res) {
                    console.log(res);
                    //alert(res);
                    
                }
            });
         }
</script>
<style>
    #li_active{
        background-color: #D71A21;
    }
    .sub_active{
        background-color: #D71A21 !important;
        display: block !important;
    }
    .display_block{
        display: block !important;
    }
</style>
</body>
</html>
