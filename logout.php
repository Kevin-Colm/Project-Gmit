<?php
/* App Name: Gig Guide.
  * @Author's:
  * Kevin Gleeson
  * Colm Woodlock
  * Version: 1.0
  * Date: 18/02/2017
  *
*/
session_start();
//REmove the session data for logging out
session_destroy();
header('Location: index.php');


