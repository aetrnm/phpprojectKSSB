<?php

setcookie('logged_in', false);
setcookie('logged_email', null);
header("Location: /");
die();

