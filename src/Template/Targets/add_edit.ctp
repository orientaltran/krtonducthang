<form  method="post" action=""> 

<div class="label">Title:</div>
<input type="text"  name="title" value="<?php  if(!empty($target->title)) echo $target->title ?>"  required>
<div class="label">Description:</div>
<input type="text" name="description" value="<?php  if(!empty($target->description)) echo $target->description ?>" required>
<div class="label">Name:</div>
<input type="text" name="name" value="<?php  if(!empty($target->name)) echo $target->name ?>" required>
<div class="label">Width:</div>
<input type="text" name="width" value="<?php  if(!empty($target->width)) echo $target->width ?>" required>

<div class="label">Height:</div>
<input type="text" name="height" value="<?php  if(!empty($target->height)) echo $target->height ?>" required>
<div class="label">Type:</div>
<input type="text" name="type" value="<?php  if(!empty($target->type)) echo $target->type ?>" required>
<div class="label">Html 5 Url:</div>
<input type="text" name="html5_url" value="<?php  if(!empty($target->html5_url)) echo $target->html5_url ?>" required>
<div class="label">Flash Url:</div>
<input type="text" name="flash_url" value="<?php  if(!empty($target->flash_url)) echo $target->flash_url ?>" required>

<div class="label">Video Url:</div>
<input type="text" name="video_url" value="<?php  if(!empty($target->video_url)) echo $target->video_url ?>" required>

<div class="label">Poster Url:</div>
<input type="text" name="poster_url" value="<?php  if(!empty($target->poster_url)) echo $target->poster_url ?>" required>

<div class="label">rx:</div>
<input type="text" name="rx" value="<?php  if(!empty($target->rx)) echo $target->rx ?>" required>
<div class="label">Ry:</div>
<input type="text" name="ry" value="<?php  if(!empty($target->ry)) echo $target->ry ?>" required>
<div class="label">Rz:</div>
<input type="text" name="rz" value="<?php  if(!empty($target->rz)) echo $target->rx ?>" required>

<div class="label">Ox:</div>
<input type="text" name="ox" value="<?php  if(!empty($target->ox)) echo $target->ox ?>" required>
<div class="label">Oy:</div>
<input type="text" name="oy" value="<?php  if(!empty($target->oy)) echo $target->oy ?>" required>

<div class="label">edge:</div>
<input type="text" name="edge" value="<?php  if(!empty($target->edge)) echo $target->edge ?>" required>

<input type="submit" value="Submit">
</form>