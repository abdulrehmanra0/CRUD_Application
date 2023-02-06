<!DOCTYPE html>
<?php include "db.php";

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from tasks limit ".$start." , ".$perPage." ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);

//$sql= "select * from tasks";
//$rows = $db -> query($sql);
?>
<html lang="en" dir="ltr">
  <head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <meta charset="utf-8">
    <title> Todo List</title>
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin-top:70px">
        <center><h1>To Do List</h1></center>
        <div  class="col-md-10 col-md-offset-1">
          <table class="table">
            <button  type="button" data-bs-target="#myModal" data-bs-toggle="modal" class="btn btn-success">Add Task</button>
            <button  type="button" class="btn btn-light float-end">Print</button>
            <hr><br>
            <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add new Task</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <form method="post" action="insert.php" >
              <div class="form-group">
                <label>Task</label>
                <input type="text" required name="task" class="form-control"/>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time"  name="time" class="form-control"/>
              </div>
              <input type="submit" name="send" value="Add Task" class="btn btn-success" style="margin-top:20px" />
            </form>


          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">task</th>
      <th   scope="col">Time</th>
    </tr>
  </thead>
<tbody>
   <tr>
     <?php
     while ($row= $rows->fetch_assoc()):?>

    <th><?php echo $row['id'] ?></th>
    <td>  <th><?php echo $row['name'] ?></th></td>
    <td><th><?php echo $row['time'] ?></th></td>
    <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">remove</a></td>
    </tr>
      <?php  endwhile; ?>
  </tbody>
</table>
<div class="pagination justify-content-center">
  <nav aria-label="Page navigation example">
      <ul class="pagination">
      <?php for($i = 1 ; $i <= $pages; $i++): ?>
      <li class=""page-item""><a class="page-link" href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

    <?php endfor; ?>
      </ul>
        </nav>
    </div>



        </div>
      </div>
    </div>

  </body>
</html>
