<div class="alcud-row">
	<div class="ribbon"></div>
	<div class="business-col">
		<div class="business-icon-holder">
			<i class="md md-work"></i>
		</div>
	</div>
	<div class="business-name-holder">
		<div class="business-details">
			<?php if(trim($business_name)!=""){ ?>
			<div class="business_name"><?php echo $business_name; ?></div>
			<?php }
			if(trim($address)!=""){ ?>
			<div class="address"><i class="md md-location-on"></i><?php echo $address; ?></div>
			<?php } ?>
		</div>
		<div class="details-col">
			<div>
				<?php if(trim($contact_person)!=""){ ?>
				<div class="detail_row">
					<i class="md md-person"></i>
					<span><?php echo $contact_person; ?></span>
				</div>
				<?php } ?>
				<?php if(trim($email_address)!=""){ ?>
				<div class="detail_row">
					<i class="md md-mail"></i>
					<span><a href="mailto:<?php echo $email_address; ?>">Email Us</a></span>
				</div>
				<?php } ?>
				<?php if(trim($contact_number)!=""){ ?>
				<div class="detail_row">
					<i class="md md-phone"></i>
					<span><a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a></span>
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
		</div>
	</div>
</div>
