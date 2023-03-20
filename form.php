
<?php 
    include('./master/header.html');
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
    include('./master/script.html');
    ?>
    <script>

        $(document).on('click','#btn-cancel',function(e){
            e.preventDefault();
            location.href = "./index.php";
        })
        $( document ).on('click','#sbt-btn',function( e ) {
            e.preventDefault();
            let name = $('#name').val();
            let address = $('#address').val();
            let email = $('#email').val();
            let mobile = $('#mobile').val();
            let city = $('#city').val();
            let country = $('#country').val();
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            let mobileformat = /^\d{10}$/;
            let is_valid = true;
            if(name == ''){
                $('#name-error').addClass('d-block');
                $('#name-error').text('Please enter a name.');
                is_valid = false;
            }else{
                $('#name-error').removeClass('d-block');
                $('#name-error').text('');
            }
            if(address == ''){
                $('#address-error').addClass('d-block');
                $('#address-error').text('Please enter a Address.');
                is_valid = false;
            }else{
                $('#address-error').removeClass('d-block');
                $('#address-error').text('');
            }
            if(!email.match(mailformat)){
                $('#email-error').addClass('d-block');
                $('#email-error').text('Please enter a valid email.');
                is_valid = false;
            }else{
                $('#email-error').removeClass('d-block');
                $('#email-error').text('');
            }
            if(mobile == '' || !mobile.match(mobileformat)){
                $('#mobile-error').addClass('d-block');
                $('#mobile-error').text('Please enter a valid Mobile.');
                is_valid = false;
            }else{
                $('#mobile-error').removeClass('d-block');
                $('#mobile-error').text('');
            }
            if(city == ''){
                $('#city-error').addClass('d-block');
                $('#city-error').text('Please enter a City.');
                is_valid = false;
            }else{
                $('#city-error').removeClass('d-block');
                $('#city-error').text('');
            }
            if(country == ''){
                $('#country-error').addClass('d-block');
                $('#country-error').text('Please select a Country.');
                is_valid = false;
            }else{
                $('#country-error').removeClass('d-block');
                $('#country-error').text('');
            }
            if(is_valid == true){
                $('#regForm').submit();
            }
        });
    </script>
<?php
include('./master/footer.html');
?>

