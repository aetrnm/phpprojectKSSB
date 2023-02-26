<?php

setcookie('logged_in', '', time() - 3600, '/');
setcookie('logged_email', '', time() - 3600, '/');
header("Location: /");
die();