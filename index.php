<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="cantidad_del_producto" class="form-control" placeholder="cantidad_del_producto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio" class="form-control" placeholder="precio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="peso" class="form-control" placeholder="peso" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sucursal" class="form-control" placeholder="sucursal" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion_del_producto" rows="2" class="form-control" placeholder="descripcion_del_producto"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>cantidad del producto</th>
            <th>descripcion del producto</th>
            <th>precio</th>
            <th>peso</th>
            <th>sucursal</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['cantidad_del_producto']; ?></td>
            <td><?php echo $row['descripcion_del_producto']; ?></td>
            <td><?php echo $row['descripcion_del_producto']; ?></td>
            <td><?php echo $row['peso']; ?></td>
            <td><?php echo $row['sucursal']; ?></td>
            <td>
              <a href="edit.php?cantidad_del_producto=<?php echo $row['cantidad_del_producto']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?cantidad_del_producto=<?php echo $row['cantidad_del_producto']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
