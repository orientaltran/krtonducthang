
<!-- Content Wrapper. Contains page content -->
<div id="content"  class="content-wrapper">
  <section class="content-header">
    <h1>Edit Scene</h1>
  </section>
  <section class="content">
      <div class="box box-primary">
        <form role="form">
            <div class="box-body">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <div class="form-group">
                      <input class="form-control width-title" id="exampleInputTitle" type="text" value="<?php echo $scene->name ?>">
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                  <a class='inline' href="#">
                    <button type="button" class="btn btn-block btn-primary">Save</button>
                  </a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                  <a class='inline' href="#">
                    <button type="button" class="btn btn-block btn-primary">Delete</button>
                  </a>
                </div>
              </div>
                <div class="form-group">
                   <label for="exampleInputTitle">Title</label>
                <input class="form-control width-title" id="txtETitle" placeholder="Enter title" value="<?php echo $scene->title?>" type="text">
                </div>
                <!--Text editer-->
                <div class="form-group">
                    <label for="exampleInputFile">Description</label>
                    <textarea class="form-control" rows="8" id="description" value="<?php echo $scene->description ?>"></textarea>
                </div>
            </div>
        </form>
      </div>
      <div class="box box-default">
          <div id="pano"></div>
          <div class="box-delete">
              <input type="hidden" name="hpDelete" id="hpDelete"> 
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#popupAddHotspot" id="btnHpCreate">Create Hotspot</button>
              <button type="button" class="btn btn-primary" id="btnHpDelete">Delete</button>
              <button type="button" class="btn btn-primary" id="btnSaveScene">Save</button>
          </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Add form-->
<div class="modal fade" id="popupAddHotspot">
  <div class="modal-dialog modal-hotspot" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title color-model">Add Hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" id=""  method="post" action="/hotspots/addEdit">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputTitle">Title</label>
                    <input class="form-control" name="hpTitle" id="hpTitle" placeholder="Enter title" type="text" 
                    value="<?php  if(!empty($target->title)) echo $target->title ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Style</label>
                    <select  name="idStyle" id="idStyle" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                    <?php foreach($styles as $style): ?>
                      <option selected="selected " value="<?php echo $style->id; ?>"><?= h($style->name); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Type</label>
                    <select name="idType" id="idType" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                      <option value="0" selected="selected">Info</option>
                      <option value="1">Next scene</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name='hpDescription' value="<?php  if(!empty($target->description)) echo $target->description ?>" rows="8" id="hpDescription" required></textarea>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          <!-- /.box-body -->
            <div class="box-footer">
              <div class="input-group margin">
                  <h4>Propertity type</h4>
                  <div id="nextScene">
                    <div class="box box-primary">
                        <div class="box-body">
                          <div class="row">
                            <?php foreach($scenes as $scene): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                              <div class="info-box">
                                <img src="<?php echo $scene->uri;?>" alt="<?php echo $scene->title;?>" class="margin">
                                <div class="radio">
                                  <label><input type="radio" name="radioAdd" value="<?php echo $scene->name;?>"><?php echo $scene->name;?></label>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Save</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--end-->