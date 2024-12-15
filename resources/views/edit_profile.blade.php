
<div>
    <div class="container profile_card">
        <div class="card_heading card_section d-flex justify-content-between">
            <span>Edit Profile</span>
            <div class="heading_icons">
                <a ><i class="feather icon-settings"></i></a>
                <a><i class="feather icon-edit"></i></a>
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
                        <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                        <button type="submit" class="btn  btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
