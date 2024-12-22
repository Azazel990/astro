
<div>
    <div class="container profile_card">
        <div class="card_heading card_section d-flex justify-content-between">
            <span><?php echo $page_title ?></span>
            <div class="heading_icons">
                <a class="select_option" href="<?php echo route('edit') ?>"><i class="feather icon-settings"></i></a>
                <!-- <a class="select_option"><i class="feather icon-edit"></i></a> -->
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal select_option"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item reload-card"><a href=""><i class="feather icon-refresh-cw"></i>Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>

		<div class="profile_pic card_section">
            <img class="img-radius" src="assets/images/profile/bg-2.jpg" alt="User-Profile-Image">
        </div>
						
		<div class="card_section user_info d-flex flex-column justify-content-center align-items-center">
            <form class="" action="change_password_post" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="current_password" class="form-control" id="inputEmail3" placeholder="" value="">
                        @error("current_password")<div class="invalid-feedback text-left">{{$message}}</div>@enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="new_password" class="form-control" id="inputEmail3" placeholder="" value="">
                        @error("new_password")<div class="invalid-feedback text-left">{{$message}}</div>@enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Confirm New Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="new_password_confirm" class="form-control" id="inputEmail3" placeholder="" value="">
                        @error("new_password_confirm")<div class="invalid-feedback text-left">{{$message}}</div>@enderror

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
