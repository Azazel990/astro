<div>
    <div class="container profile_card">
        <div class="card_heading card_section d-flex justify-content-between">
            <span>My Profile</span>
            <div class="heading_icons">
                <?php 
                    if(checkIfUserAllowedToEdit($user)){
                        ?>
                            <a class="select_option" href="<?php echo route('edit') ?>"><i class="feather icon-settings"></i></a>
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal select_option"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item reload-card"><a href="<?php echo route('change_password') ?>"><iclass="feather icon-refresh-cw"></i>Change Password</a></li>
                                </ul>
                            </div>
                <?php
                    }

                    if(!checkIfUserAllowedToEdit($user)){
                        $logged_in_user = auth()->user();
                        $following = !empty($logged_in_user->following) ? explode(",",$logged_in_user->following) : [];
                        $icon = in_array($user->id,$following) ? "icon-user-check" : "icon-user-plus";
                        ?>
                            <i title='follow this user' class="feather <?php echo $icon ?>" onclick="followThisUser()"></i></a>
                        <?php
                    }
                ?>
            </div>
        </div>

        <script>
            function followThisUser(){
                const is_following = "<?php  in_array($user->id,$following) ? 1 : 0 ?>";

                if(is_following) return;
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type : "POST",
                    url : "<?php echo route('follow') ?>",
                    data : {"profile_id" : "<?php echo $user->id ?>"},
                    success : function(data){
                        // location.reload();
                    }
                })
            }
        </script>

        <div class="profile_pic card_section">
            <img class="img-radius" src="<?php echo getProfilePic() ?>" alt="User-Profile-Image">
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