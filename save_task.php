<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $cantidad_del_producto = $_POST['cantidad_del_producto'];
  $descripcion_del_producto = $_POST['descripcion_del_producto'];
  $precio = $_POST['precio'];
  $peso = $_POST['peso'];
  $sucursal = $_POST['sucursal'];
  $query = "INSERT INTO task(cantidad_del_producto, descripcion_del_producto, precio, peso, sucursal) VALUES ('$cantidad_del_producto', '$descripcion_del_producto','$precio','$peso','$sucursal')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
