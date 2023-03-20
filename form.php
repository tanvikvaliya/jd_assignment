<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/form.css">
</head>
<?php 
    $page_title = 'Create';
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $page_title = 'Update';
        require_once "connection.php";
        $sql = "SELECT * FROM user_master where id = ".$_GET['id']." ";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
    }
?>
<title><?php echo $page_title ?></title>
<body>
    <div class="container">
        <header><?php echo $page_title ?></header>
        <form action="./store.php" id="regForm" method="post">
            <div class="form first">
                <div class="details personal">
                    <input type="hidden" name="user_id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>" />
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" placeholder="Enter your name">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>" placeholder="Enter your address" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email"  value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" placeholder="Enter your email" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile"  value="<?php echo isset($row['mobile']) ? $row['mobile'] : ''; ?>" placeholder="Enter mobile number" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <input type="text" name="city"  value="<?php echo isset($row['city']) ? $row['city'] : ''; ?>" placeholder="Enter your City" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="input-field">
                            <label>Country</label>
                            <select required name="country">
                                <option disabled selected>Select Country</option>
                                <option  <?php echo isset($row['country']) && $row['country'] == 'India' ? 'selected' : ''; ?>>India</option>
                                <option <?php echo isset($row['country']) && $row['country'] == 'USA' ? 'selected' : ''; ?>>USA</option>
                                <option <?php echo isset($row['country']) && $row['country'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
                            </select>
                        </div>
                    </div>
                    <button>Submit</button>
                </div> 
            </div>
        </form>
    </div>
    <script>
        $( document ).on('submit','#regForm',function( e ) {
            // e.preventDefault();
            
            
        });
    </script>
</body>
</html>

