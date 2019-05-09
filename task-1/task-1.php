<?php
$febanachi_array = array('0','1');
for ($i = 2; $i < 64; $i++) {
   $febanachi_array[$i] = bcadd($febanachi_array[$i-1], $febanachi_array[$i-2]);
}
echo implode("<br/>", $febanachi_array);

?>