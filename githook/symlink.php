<?php
$target = '/usr/local/cpanel/3rdparty/bin/git';
$shortcut = '/usr/local/bin/git';

symlink($target, $shortcut);

echo readlink($shortcut);
?>