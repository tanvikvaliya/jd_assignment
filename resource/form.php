<?php 
    // import header file 
    include('./master/header.php');
    $page_title = 'Create';
    //if user_id exist in get then record fetch
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $page_title = 'Update';
        $sql = "SELECT * FROM user_master where id = ".$_GET['id']." ";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>
<title><?php echo $page_title ?></title>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header"><?php echo $page_title ?></div>
            <div class="card-body">
                <form action="./store.php" id="regForm" method="post">
                    <input type="hidden" name="user_id" value="<?php echo isset($row['id']) ? $row['id'] : '' ?>"/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($row['name']) ? $row['name'] : '' ?>" placeholder="Enter your Name">
                            <div class="invalid-feedback" id="name-error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo isset($row['email']) ? $row['email'] : '' ?>" placeholder="Enter your email">
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="<?php echo isset($row['address']) ? $row['address'] : '' ?>" placeholder="Enter your address">
                            <div class="invalid-feedback" id="address-error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mobile</label>
                            <input type="number" min="0" name="mobile" class="form-control" id="mobile" value="<?php echo isset($row['mobile']) ? $row['mobile'] : '' ?>" placeholder="Enter your Mobile">
                            <div class="invalid-feedback" id="mobile-error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" id="city" value="<?php echo isset($row['city']) ? $row['city'] : '' ?>" placeholder="Enter your City">
                            <div class="invalid-feedback" id="city-error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Country</label>
                                <select class="form-control" name="country" id="country">
                                    <option value="" selected>Select Country</option>
                                    <option  <?php echo isset($row['country']) && $row['country'] == 'India' ? 'selected' : ''; ?>>India</option>
                                    <option <?php echo isset($row['country']) && $row['country'] == 'USA' ? 'selected' : ''; ?>>USA</option>
                                    <option <?php echo isset($row['country']) && $row['country'] == 'Canada' ? 'selected' : ''; ?>>Canada</option>
                                </select>
                            <div class="invalid-feedback" id="country-error"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-primary mr-3" type="submit" id="sbt-btn">Submit</button>
                            <button class="btn" id="btn-cancel">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('./master/script.php');
    ?>
    <script>
        <?php include('../public/js/form-validation.js'); ?>  
    </script>
<?php
include('./master/footer.php');
?>

