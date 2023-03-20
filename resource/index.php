<?php
// import header file
include('./common/header.php');
?>
<title>List</title>
    <div class="container">
        <div class="card mt-4">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Manage User
            <a href="./form.php" class="btn btn-success"><span>Add User</span></a>
        </h5>
        <div class="card-body">
            <table class="table">
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
                    // fetch existed record from user_master table
                    $sql = "SELECT * FROM user_master";
                    $result = mysqli_query($link, $sql);
                    $count = 1;
                    // count row of data if > 0 then will be print
                    if(mysqli_num_rows($result) > 0){
                        // while return 1 record from $result array
                        while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $count++; ?>
                            </td>
                            <td><?php echo $row['name'] ? $row['name'] : 'N.A' ?></td>
                            <td><?php echo $row['email'] ? $row['email'] : 'N.A' ?></td>
                            <td><?php echo $row['address'] ? $row['address'] : 'N.A' ?></td>
                            <td><?php echo $row['mobile'] ? $row['mobile'] : 'N.A' ?></td>
                            <td><?php echo $row['city'] ? $row['city'] : 'N.A' ?></td>
                            <td><?php echo $row['country'] ? $row['country'] : 'N.A' ?></td>
                            <td>
                                <a href="./form.php?id=<?php echo $row['id'] ?>" class="edit mr-2">Edit</a>
                                <a href="#deleteEmployeeModal" data-id="<?php echo $row['id'] ?>" class="delete" data-toggle="modal">Delete</a>
                            </td>
                        </tr>
                        <?php } 
                        // free the $result variable that will free memory
                        mysqli_free_result($result);
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
	<!-- delete modal for user data -->
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
    <?php
        include('./common/script.php');
    ?>
    <script>
        <?php include('../public/js/index.js'); ?> 
    </script>
<?php
// import footer file
include('./common/footer.php');
?>