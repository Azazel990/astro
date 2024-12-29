
<div>
    <div class="container profile_card">
        <div class="card_heading card_section d-flex justify-content-between">
            <span>Edit Profile</span>
            <div class="heading_icons">
                <a class="select_option" href="<?php echo route('edit') ?>"><i class="feather icon-settings"></i></a>
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal select_option"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item reload-card"><a href="<?php echo route("change_password") ?>"><i class="feather icon-refresh-cw"></i>Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>

		<div class="profile_pic card_section">
            <img class="img-radius" src="assets/images/profile/bg-2.jpg" alt="User-Profile-Image">
        </div>
						
		<div class="card_section user_info d-flex flex-column justify-content-center align-items-center">
            <form class="" action="edit_profile" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="User Name" value="<?php echo $user->username ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $user->email ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn  btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
