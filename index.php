<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JD Assignment</title>
<link rel="stylesheet" type="text/css" href="./css/custom.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
// Include config file
require_once "connection.php";
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage User</h2>
					</div>
					<div class="col-sm-6">
						<a href="./form.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Sr No.</th>
                        <th>Name</th>
                        <th>Email</th>
						<th>Address</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user_master";
                    $result = mysqli_query($link, $sql);
                    $count = 1;
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $count++; ?>
                            </td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><?php echo $row['country'] ?></td>
                            <td>
                                <a href="./form.php?id=<?php echo $row['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" data-id="<?php echo $row['id'] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        <?php } 
                    }else{ ?>
                        <tr>
                            <td colspan="8" class="text-center">Data Not Found</td>
                        </tr>

                    <?php }
                    mysqli_close($link);?> 
                </tbody>
            </table>
        </div>
    </div>
	<!-- dlt modal for user -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="./delete.php" method="post">
                    <input type="hidden" name="user_id" id="user_id" value=""/>
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script>
    $(document).on('click','.delete',function(){
        $('#user_id').val($(this).attr('data-id'));
    });
</script>