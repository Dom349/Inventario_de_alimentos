<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'inventario_de_alimentos'
) or die(mysqli_erro($mysqli));

?>
