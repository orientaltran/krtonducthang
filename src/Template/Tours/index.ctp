
<!-- Content Wrapper. Contains page content -->
<div id="content"  class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="box-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h1 class="title-add"><?php echo $tour->name ?></h1>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
              <button type="button"
               id="editTour" class="btn btn-block btn-primary"
               data-toggle="modal" data-target="#popupEditTour">Edit Tour
              </button>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
              <button type="button"  
                 id="DeleteTour" class="btn btn-block btn-primary"
               data-toggle="modal" data-target="#popupAddTour">Delete Tour
              </button>
          </div>
        </div>
      </div>
  </section>
  <!-- Main content -->
  <section class="content">
       <div class="box-body">
        <div class="row">
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <h2 class="title-add add-scene">Scenes</h2>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
              <a href="/admins/scenes/<?php echo $tour->id ?>" 
                id="btnAddScene" class="btn btn-block btn-primary">
               Add Scene
              </a>
          </div>
        </div>
      </div>
      <div class="box box-primary">
        <form role="form">
          <div class="box-body">
            <div class="row">
              <?php foreach($listScene as $scene): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box da-thumbs">
                  <img src="<?php echo $scene->uri; ?>" alt="<?php echo $scene->title; ?>" class="margin">
                  <article class="da-animate da-slideFromLeft" style="display: block;">
                      <div class="align-title">
                      <h3 class="fonts-title"><?php echo $scene->title; ?></h3>
                        <span><a class="vieScene" href="#"><i class="fa fa-eye"></i></a></span>
                        <span>
                          <a class="editScene" href="/scenes/addEdit/<?php echo $scene->id; ?>" sceneId="<?php echo $scene->id; ?>" sceneName="<?php echo $scene->name ?>">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </span>
                      </div>
                  </article>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
        </form>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Add form-->
<div class="modal fade" id="popupAddTour">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title color-model">Add Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- form start -->
            <form role="form" method="post" action="/tours/addEdit">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input class="form-control" name="name" placeholder="Enter name" type="text" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputAlias">Alias</label>
                  <input class="form-control" name="alias" placeholder="Enter alias" type="text" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<!--end-->
<!--Edit form-->
<div class="modal fade" id="popupEditTour">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title color-model">Edit Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- form start -->
            <form role="form" method="post" action="/tours/addEdit">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input class="form-control" name="name" id="nameTour" placeholder="Enter name" type="text" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputAlias">Alias</label>
                  <input class="form-control" name="alias" id="aliasTour" placeholder="Enter alias" type="text" required>
                </div>
                <input type="hidden" name="tourId" id="idTour">  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<!--end-->