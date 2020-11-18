<?php session_start(); // Starting session here ?>
<!DOCTYPE html>
<html>
<body>

<?php

	// Checking on press submit
	if (isset($_POST['submitBtn'])) {
		// Checking variable exists or not
		if (!isset($_POST['task'])) {
			return false;	
		}

		// Creating the array on first entry
		if (!isset($_SESSION['tasksArr'])) {
			$tasksArr = array();
		} else {
			$tasksArr = array_reverse($_SESSION['tasksArr']);
		}

		// Getting input value
		$taskName = $_POST['task'];

		// Pushing to array
		array_push($tasksArr, $taskName);

		// Storing in session
		$_SESSION['tasksArr'] = array_reverse($tasksArr);
	}
		
?>


<h2>TO-DO List App</h2>
		
<form method="post">
	<label for="taskText">Task</label> 
	<input type="text" name="task" id="taskText" required placeholder="Enter task here">
	<input type="submit" name="submitBtn" value="Add Task">


</form>


<table style="margin-top: 20px;"> 
	<thead>
		<tr>
			<th>NO.</th>
			<th>Task Name</th>
		</tr>
		<?php if (isset($_SESSION['tasksArr'])) { ?>
			<?php for ($i = 0; $i < count($_SESSION['tasksArr']); $i++) { ?>
				<tr>
					<td><?php echo $i + 1; ?></td>
					<td><?php echo $_SESSION['tasksArr'][$i]; ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</thead>

	<tbody>
		

	</tbody>



</table>	
</body>

</html>





