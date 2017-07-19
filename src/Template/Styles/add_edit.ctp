<form  method="post" action=""> 

<div class="label">Name:</div>
<input type="text"  name="name" value="<?php  if(!empty($style->username)) echo $style->name ?>"  required>
<div class="label">URL:</div>
<input type="text" name="url" value="<?php  if(!empty($style->alias)) echo $style->alias ?>" required>
<div class="label">Width:</div> 
<input type="text" name="width" value="<?php  if(!empty($style->width)) echo $style->width ?>" required>
<div class="label">Height: </div>
<input type="text" name="height" value="<?php  if(!empty($style->height)) echo $style->height ?>" required>
<input type="submit" value="Submit">
</form>