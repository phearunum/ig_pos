<script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
<!-- javascripts -->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.dataTables.js'); ?>"></script>

<script type="text/javascript">
	 var dot_0='00';
    var dot_num=2; 
    var copy_right="Copyright &copy; www.softpointcambodia.com";
	$('#icon-close').on('click',function(evt){
      if (confirm("Close Window?")) {              
            window.location.href = '/exitkiosk';            
        }
       
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
</body>
</html>
