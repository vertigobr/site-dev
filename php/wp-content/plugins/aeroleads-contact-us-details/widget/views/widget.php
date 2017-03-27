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
<div class="alcud-widget-body">

	<?php if(trim($business_name)!=""){ ?>
	<div class="detail_row business_name">
		<i class="md md-work"></i>
		<span><?php echo $business_name; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($contact_person)!=""){ ?>
	<div class="detail_row">
		<i class="md md-person"></i>
		<span><?php echo $contact_person; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($email_address)!=""){ ?>
	<div class="detail_row">
		<i class="md md-mail"></i>
		<?php if(strlen($email_address) > 20) {?>
		<span><a href="mailto:<?php echo $email_address; ?>">Email Us</a></span>
		<?php } else { ?>
		<span><a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></span>
		<?php } ?>
	</div>
	<?php } ?>
	<?php if(trim($contact_number)!=""){ ?>
	<div class="detail_row">
		<i class="md md-phone"></i>
		<span><a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a></span>
	</div>
	<?php } ?>
	<?php if(trim($address)!=""){ ?>
	<div class="detail_row">
		<i class="md md-location-on"></i>
		<span class="address"><?php echo $address; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($open_hours)!=""){ ?>
	<div class="detail_row">
		<i class="md md-access-time"></i>
		<span><?php echo $open_hours; ?></span>
	</div>
	<?php } ?>
	<?php if(trim($note)!=""){ ?>
	<div class="detail_row">
		<i class="md md-event-note"></i>
		<span class="address"><?php echo $note; ?></span>
	</div>
	<?php } ?>

</div>