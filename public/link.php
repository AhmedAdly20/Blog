<?php

$linkName = '/home/username/public_html/mydomain.com/public/myfolder1';

$target = '/home/username/public_html/mydomain.com/storage/app/public/myfolder1';

symlink($target, $linkName);

?>