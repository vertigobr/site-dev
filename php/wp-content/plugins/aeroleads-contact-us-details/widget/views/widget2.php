<!-- This file is used to markup the public-facing widget. -->
<?php if ( $title ) { ?>
<div class="alcud-widget-header">
	<?php echo $title; ?> 
</div>
<?php 
}
else { ?>
<div class="alcud-widget-header">
	Contact Us  
</div>
<?php } ?>
<div class="alcud-widget-body alcud-widget-2">

	<?php if(trim($business_name)!=""){ ?>
	<div class="detail_row business_name">
		<div class="label">Business Name</div>
		<span><?php echo $business_name; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($contact_person)!=""){ ?>
	<div class="detail_row">
		<div class="label">Contact Person</div>
		<span><?php echo $contact_person; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($email_address)!=""){ ?>
	<div class="detail_row">
		<div class="label"> Email </div>
		<?php if(strlen($email_address) > 25) {?>
		<span><a href="mailto:<?php echo $email_address; ?>">Email Us</a></span>
		<?php } else { ?>
		<span><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></span>
		<?php } ?>
	</div>
	<?php } ?>
	<?php if(trim($contact_number)!=""){ ?>
	<div class="detail_row">
		<div class="label">Contact Number</div>
		<span><a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a></span>
	</div>
	<?php } ?>
	<?php if(trim($address)!=""){ ?>
	<div class="detail_row">
		<div class="label">Address</div>
		<span class="address"><?php echo $address; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($open_hours)!=""){ ?>
	<div class="detail_row">
		<div class="label">Open Hours</div>
		<span><?php echo $open_hours; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($note)!=""){ ?>
	<div class="detail_row">
		<div class="label">Note</div>
		<span class="address"><?php echo $note; ?></span>
	</div>
	<?php } ?>

</div>