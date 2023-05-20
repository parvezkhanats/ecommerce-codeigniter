<style type="text/css">
	.billing_info p{color: red;font-style: bold}
</style>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step2</h2>
			</div>
		
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<h5 class="billing_info">
                   			 <?php echo validation_errors();?>
			              </h5>
							<p>Billing Address</p>
							
							<div class="form-two">
								<form action="<?php echo base_url()?>update-billing" method="post" name="billing_info">
									<input type="text" placeholder="Name" name="cus_name" value="<?php echo $cus_info->cus_name?>">
									<input type="hidden" name="cus_id" value="<?php echo $cus_info->cus_id?>">
									<input type="text" placeholder="Email*" name="cus_email" value="<?php echo $cus_info->cus_email?>" readonly="">
									<input type="text" placeholder="Mobile" name="cus_mobile" value="<?php echo $cus_info->cus_mobile?>">
									<input type="text" placeholder="Address*" name="cus_address" value="<?php echo $cus_info->cus_address?>">
									<input type="text" placeholder="City" name="cus_city" value="<?php echo $cus_info->cus_city?>">
									<select name="cus_country" value="<?php echo $cus_info->cus_country?>">
										<option>-- Country --</option>
										<option value="United_States" >United States</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="UK">UK</option>
										<option value="India">India</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Ucrane">Ucrane</option>
										<option value="Canada">Canada</option>
										<option value="Dubai">Dubai</option>
									</select>
									<input type="text" placeholder="Zip" name="cus_zip" value="<?php echo $cus_info->cus_zip?>">
									Shipping Same As Billing
									<input type="checkbox" name="shipping_info" value="on">
									<input type="submit" value="Save & Continue" class="btn btn-primary">
								</form>
							</div>
							
						</div>
					</div>
					<div class="col-sm-2">
						
					</div>					
				</div>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
	<script type="text/javascript">
		document.forms['billing_info'].elements['cus_country'].value=<?php echo $cus_info->cus_country?>

	</script>