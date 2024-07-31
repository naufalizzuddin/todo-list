<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo-List</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
  <nav>
    <h1 class="judul">ToDo-List</h1>
  </nav>
  <div class="container">
    <div class="input-group">
      <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Masukkan task.." required>
        <button type="submit" name="add" class="button">Submit</button>
      </form>
    </div>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th class="task-table">Task</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        require 'config.php';
        $fetchingtasks = mysqli_query($db, "SELECT * FROM task ORDER BY task_id ASC")
        or 
        die(mysqli_error($db));
        $count = 1;
        while ($fetch = $fetchingtasks->fetch_array()) {
            ?>
        <tr class="border-bottom">
          <td>
            <?php echo $count++ ?>
          </td>
          <td>
            <?php echo $fetch['task'] ?>
          </td>
          <td>
            <?php echo $fetch['status'] ?>
          </td>
          <td class="action">
            <div class="container-action">
              <?php
                  if ($fetch['status'] != "Done")
                  {
                      echo '<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn-done">Done</a>';
                  }
              ?>
              <a href="delete_task.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn-remove">
                Remove
              </a>
            </div>
          </td>
        </tr>
        <?php
                }
            ?>
      </tbody>
    </table>
  </div>
</body>
</html>