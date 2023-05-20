
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Forms Element</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
               <p class="text-success"> <?php if(isset($success_message)){
                echo $success_message;
                 }?>
             </p>
                <div class="panel-heading">
                    Register New user
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                                <?php echo form_open('Admin/makeadmin','');?>
                                <div class="form-group">
                                    <label>Admin Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('username')?>" name="username" required="">
                                </div>
                                 <div class="form-group">
                                    <label>Admin Email</label>
                                    <input type="email" class="form-control" value="<?php echo set_value('user_email')?>" name="user_email" required="">
                                </div>
                                 <div class="form-group">
                                    <label>Admin Password</label>
                                    <input type="password" class="form-control" name="user_password" required="">
                                </div>
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Select User Role</label>
                                    <select class="form-control" name="user_role">
                                        <option>Select One</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Moderator</option>
                                        <option value="3">Author</option>
                                        <option value="4">Editor</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Make User</button>
                                <button type="reset" class="btn btn-success">Reset Form</button>
                        
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->


