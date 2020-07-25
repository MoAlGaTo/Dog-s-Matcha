<?php

$dogs_name = array(
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
    array('1' => 'kdhfv', '2' => 'momo'),
);

$new = array_column($dogs_name, '2');

echo '<pre>';
print_r(array_unique($new));
echo '</pre>';

?>