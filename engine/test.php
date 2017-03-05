<?php

require_once "lib/config_class.php";

$avatar = "avatar_SERJI";
$new_password = "new_password_SERJI";
$password = "password_SERJI";

if ($avatar == Config::DIR_IMG_AVATAR . Config::DEFAULT_AVATAR) {
    $avatar = null;
}

if (!is_null($avatar)) $avatar = basename($avatar);

//if (!is_null($this->new_password) $this->password = $this->new_password;

echo "$avatar";
