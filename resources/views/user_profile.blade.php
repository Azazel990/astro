
<div>
    <div class="container profile_card">
        <div class="card_heading card_section d-flex justify-content-between">
            <span>My Profile</span>
            <div class="heading_icons">
                <a href="<?php echo route('edit') ?>"><i class="feather icon-settings"></i></a>
                <a><i class="feather icon-edit"></i></a>
            </div>
        </div>

		<div class="profile_pic card_section">
            <img class="img-radius" src="assets/images/profile/bg-2.jpg" alt="User-Profile-Image">
        </div>
						
		<div class="card_section user_info d-flex flex-column justify-content-center align-items-center">
            <div class="info_div">
                <label for="">User Name : </label>
                <?php echo $user->username; ?>
            </div>
            <div class="info_div">
                <label for="">Email : </label>
                <?php echo $user->email; ?>
            </div>
            <div class="info_div">
                <label for="">Member Since : </label>
                <?php echo date("d M Y",strtotime($user->created_at)); ?>
            </div>
        </div>
    </div>
</div>
