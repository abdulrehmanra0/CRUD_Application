<!DOCTYPE html>
<?php include "db.php";

$id= $_GET['id'];

$sql = "select * from tasks where id='$id'";
$rows = $db -> query($sql);

$row =$rows->fetch_assoc();

if(isset($_POST['send']))
{
$task = $_POST['task'];
$time = $_POST['time'];
$sql2 = "update tasks set name='$task' where id='$id'";
$sql2 = "update tasks set time='$time' where id='$id'";
$db->query($sql2);
header('location: index.php');
} ?>

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
        <center><h1>Update To-Do List</h1></center>
        <div>
          <table class="table">
          </table>
            <hr><br>

            <form method="post" >
              <div class="form-group">
                <label>Task</label>
                <input type="text" value="<?php echo $row['name']; ?>" required name="task" class="form-control"/>
              </div>
              <div class="form-group">
                <label>Time</label>
                <input type="time"  value="<?php echo $row['time']; ?>" name="time" />
              </div>
              <input type="submit" name="send" value="Add Task" class="btn btn-success" style="margin-top:20px" />
            </form>
          </div>
      </div>
    </div>



  </body>
</html>
