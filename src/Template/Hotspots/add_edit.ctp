<form  method="post" action=""> 

<div class="label">Target Id:</div>
<input type="text"  name="target_id" value="<?php  if(!empty($hotspot->target_id)) echo $hotspot->target_id ?>"  required>
<div class="label">Scene Id:</div>
<input type="text" name="scene_id" value="<?php  if(!empty($hotspot->scene_id)) echo $hotspot->scene_id ?>" required>
<div class="label">Scene Dentination Id:</div> 
<input type="text" name="scene_destination_id" value="<?php  if(!empty($hotspot->scene_destination_id)) echo $hotspot->scene_destination_id ?>" required>
<div class="label">Ath: </div>
<input type="text" name="ath" value="<?php  if(!empty($hotspot->ath)) echo $hotspot->ath ?>" required>

<div class="label">Atv: </div>
<input type="text" name="atv" value="<?php  if(!empty($hotspot->atv)) echo $hotspot->atv ?>" required>

<div class="label">Style Id: </div>
<input type="text" name="style_id" value="<?php  if(!empty($hotspot->style_id)) echo $hotspot->style_id ?>" required>

<input type="submit" value="Submit">
</form>