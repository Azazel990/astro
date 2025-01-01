<div class="container">
    <div>
        <div class="mb-4 d-flex justify-content-center">
            <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                alt="example placeholder" style="width: 300px;" />
        </div>
    </div>
    
    <form id="samll_form" action="createNewPost" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="post_img" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')"  />
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Post Title</label>
            <div class="col-sm-9">
                <input type="text" name="post_title" class="form-control" id="inputEmail3" placeholder="User Name"
                    value="">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post Description</label>
            <textarea name="post_desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group row" align="right">
            <div class="col-sm-10" style="margin-left:auto;">
                <button type="submit" class="btn  btn-primary">Upload</button>
            </div>
        </div>
    </form>
</div>

<script defer>
const selectedImage = document.getElementById("selectedImage");

selectedImage.addEventListener("click",function(){
    document.getElementById("customFile1").click()
});

function displaySelectedImage(event, elementId) {
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>