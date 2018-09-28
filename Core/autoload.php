<?php
function autoload() {
  getDirContents(getcwd());
}

spl_autoload_register('autoload');

function getDirContents($dir) {

    $files = scandir($dir);

    foreach($files as $key => $value) {

      if ($value != ".htaccess") {

        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);

        if(!is_dir($path) && $value != 'autoload') {
          require_once ($path);
        }
        else if ($value != "." && $value != ".." && $value != ".git" && $value && $value != 'webroot' && $value != 'View') {
            getDirContents($path);
        }
      }

   }

}
