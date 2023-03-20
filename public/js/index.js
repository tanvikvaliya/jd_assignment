$(document).on('click','.delete',function(){
    // append id for delete record
    $('#user_id').val($(this).attr('data-id'));
});