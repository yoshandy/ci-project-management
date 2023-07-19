           
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url()?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url()?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url()?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url()?>assets/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script type="text/javascript">
var btn_poin1 = 0;
var btn_poin2 = 0;


$(".theSelect").select2();

    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();
		var table = $('#datatables2').DataTable();
		var table = $('#datatables3').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });

    $(document).ready(function() {
       
        demo.initFormExtendedDatetimepickers();
    });

    $(document).ready(function() 
{
$("#username").blur(function() 
{
var username = $('#username').val();

	if(username!="")
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/Welcome/checkUser'); ?>",
		dataType: 'html',
		data: {username: username},
		success: function(res) 
		{
			if(res==1)
			{
			$("#msg").css({"color":"red"});
			$("#msg").html("Username tidak tersedia");
            document.getElementById("btn_s").disabled = true;
			}
			else
			{
			$("#msg").css({"color":"green"});
			$("#msg").html("Username tersedia");
            document.getElementById("btn_s").disabled = false;	
			}
			
		},
		error:function()
		{
		alert('some error');	
		}
		});
	}
	else
	{
	
	}

});


$("#old_pass").blur(function() 
{
var old_pass = $('#old_pass').val();

	if(old_pass!="")
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/Welcome/checkPass'); ?>",
		dataType: 'html',
		data: {old_pass: old_pass},
		success: function(res) 
		{
			if(res==0)
			{
			$("#msg").css({"color":"red"});
			$("#msg").html("Password Salah");
            btn_poin1 = 0 ;
			}
			else
			{
			$("#msg").css({"color":"green"});
			$("#msg").html("Password Benar");
            btn_poin1 = 1 ;
			}

            if((btn_poin1 == 1) && (btn_poin2 == 1)){
                document.getElementById("btn_u").disabled = false;
            }
			
		},
		error:function()
		{
		alert('some error');	
		}
		});
	}
	else
	{
	
	}

});

$("#re_pass").blur(function() 
{

	if(re_pass!="")
	{
        var old_pass = $('#pass').val();
        var re_pass = $('#re_pass').val();
        var poin = old_pass.localeCompare(re_pass);
		
			if(poin == 0)
			{
                $("#msg1").css({"color":"green"});
			$("#msg1").html("Password Sama");
            btn_poin2 = 1 ;
			}
			else
			{
			
            $("#msg1").css({"color":"red"});
			$("#msg1").html("Password Tidak Sama");
            btn_poin2 = 0 ;
			}
			if((btn_poin1 == 1) && (btn_poin2 == 1)){
                document.getElementById("btn_u").disabled = false;
            }
	
	
	}

});
}); 

</script>
