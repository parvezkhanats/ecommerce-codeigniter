
<div id="page-wrapper">
    <div class="row">
         <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
         <!-- end  page header -->
    </div>
     <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     Contact Tables
                </div>
                <p class="text-success"> <?php if(isset($success_message)){
                  echo $success_message;
                 }?>
                 </p>
                 <div class="alert alert-success">
    <?php //echo $this->session->flashdata('flsh_msg'); ?>
    <?php echo $this->session->flashdata('flsh_msg'); ?>
</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="3%">Serial No</th>
                                    <th width="15%"> Name</th>                          
                                    <th width="15%">Email</th>
                                    <th width="15%">Subject</th>
                                    <th width="25%">Message</th>
                                    <th width="27%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if(isset($all_contact)){
                                  foreach ($all_contact as $value){
                                    $i++;

                                ?>
                                <tr class="gradeC">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $value->contact_name;?></td>
                                    <td><?php echo $value->contact_email;?></td>
                                    <td><?php echo $value->contact_subject;?></td>
                                    <td><?php $msg =  $value->contact_message;?>
                                         <?php
                                           $content = explode(" ",$msg);
                                           $less_content = array_slice($content, 0, 7);
                                           echo implode(" ", $less_content);
                                         ?>

                                    </td>
                                   <td> 
			                            <a href="<?php  echo base_url();?>view-contact/<?php echo $value->contact_id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myid">
			                                view
			                            </a>
			                            <div class="modal fade" id="myid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			                                <div class="modal-dialog">
			                                
			                                    <div class="modal-content">
			                                        <div class="modal-header">
			                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                                            <h4 class="modal-title" id="myModalLabel"></h4>
			                                        </div>
			                                        <div class="modal-body">
			                                           Contacer message Display here
			                                        </div>
			                                        <div class="modal-footer">
			                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                                            <button type="button" class="btn btn-primary">Save changes</button>
			                                        </div>
			                                    </div>
			                                   
			                                </div>
			                            </div>
                                        <a class="btn btn-danger" href="<?php  echo base_url();?>delete-contact/<?php echo $value->contact_id;?>">Delete</a>
                                         <a class="btn btn-info" href="<?php  echo base_url();?>replay-contact/<?php echo $value->contact_id;?>">Replay</a>
                                    </td> 
                                    
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
</div>
    <script src="<?php echo base_url()?>assets/back/plugins/dataTables/jquery.dataTables.js"></script>
   
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script> 

   