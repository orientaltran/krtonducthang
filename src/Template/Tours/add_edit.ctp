<form  method="post" action=""> 

<div class="label">Name:</div>
<input type="text"  name="name" value="<?php  if(!empty($tour->name)) echo $tour->name ?>"  required>
<div class="label">Alias:</div>
<input type="text" name="alias" value="<?php  if(!empty($tour->alias)) echo $tour->alias ?>" required>

<input type="text" name="user_id" value="<?php  if(!empty($tour->user_id)) echo $tour->user_id ?>" required>
<input type="submit" value="Submit">
</form>