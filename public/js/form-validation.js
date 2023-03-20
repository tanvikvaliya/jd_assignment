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
    let mobileformat = /^[6,7,8,9][0-9]{0,9}$/;
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