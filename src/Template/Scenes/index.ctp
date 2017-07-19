
<!-- Content Wrapper. Contains page content -->
<div id="content"  class="content-wrapper">
  <section class="content-header">
    <h1>Add Scene</h1>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
          <div class="form-group">
            <label for="exampleInputFile">Select image</label>
            <input type="file" name="files[]" id="fileupload" multiple>
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="files" class="files"></div>
          </div>
      </div>
      <form  id="formScene" role="form" method="post" action="/scenes/addEdit/">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input class="form-control width-title" name="txtSceneName"  placeholder="Enter name" type="text">
          </div>
          <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input class="form-control width-title" name="txtSceneTitle" placeholder="Enter title" type="text">
          </div>
          <!--Text editer-->
          <div class="form-group">
              <label for="exampleDescription">Description</label>
              <textarea class="form-control" rows="8" name="txtSceneDescription"></textarea>
          </div>
          <input type="hidden" name="txtNameFile" id="txtNameFile">
          <input type="hidden" name="txtIdFile" id="txtIdFile" value="<?php echo $scene->id ?>">
          <img id="imgThumbnail" alt="Thumbnail" class="img-margin" >
        </div>
        <div class="box-footer">
          <!-- <button type="submit" class="btn btn-primary">View</button> -->
          <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
      </form>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->