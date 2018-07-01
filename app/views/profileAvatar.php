<div class="modal fade" id="profileAvatar" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center form-title">Select image to upload:</h4>
      </div>
      <div class="modal-body">
        <div class="login-box-body">
            <form id="avatar" action="/conferencer/app/controllers/profileAvatar.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="fileToUpload" class="form-control-file form-group" id="fileToUpload">
                <button class="btn btn-green" type="submit" name="submit" id="create-conf-button">Upload image</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>