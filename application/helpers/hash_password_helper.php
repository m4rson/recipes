<?php

function hash_password($password)
{
  $password = sha1(md5($password));
  return $password;
}
