<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
// $hook['post_controller_constructor'] = array(
//     'class'    => 'LanguageLoader',
//     'function' => 'initialize',
//     'filename' => 'LanguageLoader.php',
//     'filepath' => 'hooks'
// );
$hook['post_controller_constructor'][] = array( // Mind the "[]", this is not the only post_controller_constructor hook
  'class'    => 'CSRF_Protection',
  'function' => 'validate_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
$hook['display_override'] = array(
  'class'    => 'CSRF_Protection',
  'function' => 'inject_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);