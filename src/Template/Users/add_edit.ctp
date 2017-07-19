<form  method="post" action=""> 

<div class="label">User Name:</div>
<input type="text"  name="username" value="<?php  if(!empty($user->username)) echo $user->username ?>"  required>
<div class="label">Password:</div>
<input type="text" name="password" value="<?php  if(!empty($user->password)) echo $user->password ?>" required>
<input type="submit" value="Submit">
</form>