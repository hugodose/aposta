<?php
session_start();
require_once 'src/Facebook/autoload.php';

$pageOriginal = 'mblivre';
$app_id = '1011974285544429';
$app_secret = '9b28ee403af9889f18c3fd6f3b9135c8';
$fb = new Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.6', // change to 2.5
  'default_access_token' => $app_id . '|' . $app_secret
]);
//&date_format=U
$response = $fb->get('/' . $pageOriginal . '?fields=posts{message,link,full_picture,created_time}');
$graphNode = $response->getGraphNode();
foreach ($graphNode['posts'] as $key => $value) {
  echo '<br>' . $key . ':' . $value['message'] . '<br>';
  echo '<br>' . $key . ':' . $value['link'] . '<br>';
  echo '<br>' . $key . ':' . $value['full_picture'] . '<br>';
  echo var_dump($value['created_time']);
  echo '<br>';
  $a = $value['created_time']->date;
  echo var_dump($a);
  echo '<br>';
  echo $a;
  //echo '<br>' . $key . ':' . $a . '<br>';
  $b = gmdate(DATE_ISO8601, $a);
  $c = strtotime($a);
  echo '<br> b' . $b . '<br>';
  echo '<br> c' . $c . '<br>';
  $curtime = gmdate(DATE_ISO8601, time());
  echo '<br> diff:' . $curtime - $b . '<br>';
  echo '<br>_______________________________________________<br>';
}



?>
