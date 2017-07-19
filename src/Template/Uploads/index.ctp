<div id="content"  class="content-wrapper" >
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
            <div class="page-header">
                <h1> Resumable file upload<small> <br/>with Resumable.js and Resumable.php</small></h1>
            </div>
        </div>
        
        <div class="col-lg-offset-2 col-lg-8">
            <button type="button" class="btn btn-success" aria-label="Add file" id="add-file-btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add file
            </button>
            <button type="button" class="btn btn-info" aria-label="Start upload" id="start-upload-btn">
                <span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Start upload
            </button>
            <button type="button" class="btn btn-warning" aria-label="Pause upload" id="pause-upload-btn">
                <span class="glyphicon glyphicon-pause " aria-hidden="true"></span> Pause upload
            </button>
        </div>


        <div class="col-lg-offset-2 col-lg-8">
            <p>
                <div class="progress hide" id="upload-progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"   style="width: 0%">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </p>
        </div>
    </div>
</div>

