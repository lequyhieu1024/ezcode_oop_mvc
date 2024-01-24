<?php
foreach ($contacts as $row) :
    extract($row);
    echo '<pre>';
    print_r($row);
    echo '</pre>';
endforeach;
