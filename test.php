<?php
require "class-dyntube_api.php";

$class = new DynTube_API();
$video = $class->UPLOAD_VIDEO('http://techslides.com/demos/sample-videos/small.mp4');
echo $video;
echo "\n";
echo $video['videoId'];
echo "\n";
echo $video['channelKey'];
echo "\n";

echo $video['iframeLink'];