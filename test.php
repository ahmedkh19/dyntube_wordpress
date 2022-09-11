<?php
require "class-dyntube_api.php";

$class = new DynTube_API();
$video = $class->DELETE_VIDEO('oHGTRFM9ykCFqlQeo8hBg');
echo $video;