<?php defined('SYSPATH') or die('No direct access allowed.');
 
return array(
 
 'driver'       => 'Orm',
 'hash_method'  => 'sha256',
 'hash_key'     => 'Cg3416rT',
 'lifetime'     => Date::HOUR * 2,
 'session_key'  => 'auth_user'
 
);