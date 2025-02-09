<div class="mt-4">
    <div class="col-xl-12">
        <div class="row d-flex justify-content-between">
            <h5 class="">My Feed</h5>
            <div>
                <select name="" id="" onchange="viewChange(this.value)">
                    <option value="1">All</option>
                    <option value="2">My Posts</option>
                    <option value="3">Following</option>
                </select>
                <a href="<?php echo route("newPost") ?>" class="btn btn-success btn-sm"><i class="feather icon-plus"></i> Create Post</a>
            </div>
        </div>
        <hr>

        <script>
            function viewChange(preference = 0){
                window.location = "<?php echo route("dashboard")."/" ?>" + preference;
            }
        </script>
        <div class="row card-deck">
            <?php
            foreach($posts as $index => $post){
                ?>
                    <div class="card">
                        <img class="img-fluid card-img-top" src="<?php echo getUploadPath($post->post_thumb) ?>" alt="Card image cap">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $post->post_title ?></h5>
                                <p class="card-text"><?php echo $post->post_description ?></p>
                            </div>
                            <?php 
                                if(checkUserPostUpdate($post)){
                                    ?>
                                        <div class="actions">
                                            <a href="<?php echo route('updatePost').'/'.$post->post_id ?>"><i class="feather icon-edit"></i></a>
                                        </div>
                                    <?php
                                }
                            ?>
                          
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo route('profile')."/".$post->user_id ?>"><img src="assets/images/profile/bg-2.jpg" alt=""> <small class="text-muted"><?php echo $post->username ?></small></a>
                        </div>
                    </div>
                <?php
            } 
            ?>
        </div>
    </div>
</div>
        
