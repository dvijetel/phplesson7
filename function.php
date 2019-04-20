<?php
function getSravnenie($login1,$gde) {
$arr = file($gde);
foreach ($arr as $users) :
$log = explode(":", $users)[0];
if ($log == $login1) {
    return true;
}
endforeach;};

?>

