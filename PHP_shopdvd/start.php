<?php

mb_internal_encoding("UTF-8");
//$dir_lib = "lib/";
$path = "lib".PATH_SEPARATOR."comp";
set_include_path(get_include_path().PATH_SEPARATOR.$path);
