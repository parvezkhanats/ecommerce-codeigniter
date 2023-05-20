<link href="<?php echo base_url()?>assets/front/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url()?>assets/front/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/price-range.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/sliderprice.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/jquery-ui.css" rel="stylesheet"> -->

	<link href="<?php echo base_url()?>assets/front/css/main.css" rel="stylesheet">
<section id="cart_items">
		<div class="container">
			<h3>Dear <?php echo $cus_full_name;?></h3>
			<h3>Dear <?php echo $to;?></h3>
<h4>Thank you for your recent purchase from our web site.</h4><hr/>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						<?php $cart_content = $this->cart->contents();
						
						?>

						<?php foreach ($cart_content as $items){ ?>
						<tr>
							<td class="cart_product">
								<a href=""><img  width="100" src="<?php echo $items['options']['pro_image']?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['name']?></a></h4>
							</td>
							<td class="cart_price">
								<p>$<?php echo $items['price']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $items['qty']?>" autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $items['subtotal']?></p>
							</td>
							
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<h2 class="text-center">Here is your amount Details.....</h2>
			<div class="row">
				<div class="col-sm-6">
					
				</div>
					<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<?php 
								$cart_total = $this->cart->total();
							?>
							<li>Cart Sub Total <span>$<?php echo $cart_total;?></span></li>
							<?php
								$tax = ($cart_total*2)/100;
							?>
							<li>Eco Tax 2% <span>$<?php echo $tax?></span></li>
							<!-- Shipping Cost Dependend Quantity, price, buyer distance etc -->
							<?php
								$shiping = "0";
								if($cart_total>0 && $cart_total<49){
									$shiping = 0;
								}elseif($cart_total>50 && $cart_total<98){
									$shiping = 2;
								}elseif($cart_total>99 && $cart_total<198){
									$shiping = 5;
								}elseif($cart_total>199){
									$shiping = 10;
								}elseif($cart_total<0){
									$shiping = 0;
								}
							?>
							<li>Shipping Cost <span>$<?php echo $shiping?></span></li>
							<?php $g_total = $cart_total+$tax+$shiping;?>
							<li>Total <span>
								<?php
									$gdata = array();
									$gdata['g_total'] = $g_total;
									$this->session->set_userdata($gdata);
							 		echo "$$g_total";
							 	?>
							 </span></li>
						</ul>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->