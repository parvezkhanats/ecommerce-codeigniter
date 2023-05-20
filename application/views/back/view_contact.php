<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->

    <script src="<?php echo base_url()?>assets/back/plugins/jquery-1.10.2.js"></script>
    <link href="<?php echo base_url()?>assets/back/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url()?>assets/back/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/back/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link href="<?php echo base_url()?>assets/back/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />

   </head>
   <body>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="myFunction()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Name: <?php echo $contact_message_by_id->contact_name?> & Email: <?php echo $contact_message_by_id->contact_email?></h4>
                   <h4 class="modal-title" id="myModalLabel">Subject:<?php echo $contact_message_by_id->contact_subject?></h4>
                </div>
                <div class="modal-body">
                	<strong>Message:</strong><hr/>
                   <?php echo $contact_message_by_id->contact_message?>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="myFunction()" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?php  echo base_url();?>delete-contact/<?php echo $contact_message_by_id->contact_id;?>" type="button" class="btn btn-primary">Delete Message</a>
                    
                </div>
                
            </div>
        </div>
<script>
function myFunction() {
    location.replace('contact-message-list')
    // redirect('contact-message-list'); this is location replace redirection
}
</script>
         
    <script src="<?php echo base_url()?>assets/back/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/back/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>assets/back/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url()?>assets/back/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url()?>assets/back/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/back/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>assets/back/scripts/dashboard-demo.js"></script>
    <!--Code for data table-->
   <script src="<?php echo base_url()?>assets/back/plugins/dataTables/dataTables.bootstrap.js"></script>



</body>
</html>









