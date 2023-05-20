<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2> 	    				
					<div id="gmap" class="contact-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d7373.767663579728!2d78.43200317494214!3d22.470999340940548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d22.4738504!2d78.4375517!4m5!1s0x397e3bd3e71272bf%3A0x67a1daa45f2eda97!2sapp%20tech%20solutions%20pachmarhi%20madhya%20pradesh!3m2!1d22.4674463!2d78.4345854!5e0!3m2!1sen!2sin!4v1684580344227!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<?php echo $this->session->flashdata("flash_msg");?>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="<?php echo base_url()?>contact-form" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="contact_name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="contact_email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="contact_subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="contact_message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>Near Cariappa Park, Government College, Pachmarhi</p>
							<p>Madhya Pradesh, India, 461881</p>
							<p>Mobile: +91-9479592970</p>
							<p>Fax: N.A.</p>
							<p>Email: info@app-techsolutions.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com/apptechsolutionspcm"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.twitter.com/parvezkhanats"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com/parvezkhanats"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="https://www.linkedin.com/company/app-tech-solutions-pach/?viewAsMember=true"><i class="fa fa-linkedin"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->