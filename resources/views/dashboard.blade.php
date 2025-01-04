


<div class="mt-4">
    <div class="col-xl-12">
        <div class="row d-flex justify-content-between">
            <h5 class="">My Feed</h5>
            <a href="<?php echo route("newPost") ?>" class="btn btn-success btn-sm"><i class="feather icon-plus"></i> Create Post</a>
        </div>
        <hr>
        <div class="row card-deck">
            <?php
            foreach($posts as $index => $post){
                ?>
                    <div class="card">
                        <img class="img-fluid card-img-top" src="<?php echo getImagePath($post->post_thumb) ?>" alt="Card image cap">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $post->post_title ?></h5>
                                <p class="card-text"><?php echo $post->post_description ?></p>
                            </div>
                            <div class="actions">
                                <a href="<?php echo route('updatePost').'/'.$post->post_id ?>"><i class="feather icon-edit"></i></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                <?php
            } 
            ?>
        </div>
    </div>
</div>
        
