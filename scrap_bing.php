<?php

$html = file_get_html('http://www.google.com/');

//foreach($html->find('img') as $element)
//       echo $element->src . '<br>';

foreach($html->find('a') as $element)
       echo $element->href . '<br>'; 

?>
