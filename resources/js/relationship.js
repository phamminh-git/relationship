import I18n from './vendor/I18n';
window.I18n = I18n;
$(document).on('click', '#btn-unfollow', function () {
    let translator = new I18n;
    var _token = $('input[name="_token"]').val();
    var id = $('#followed_id').val();
    console.log(id);
    $.ajax({
        type: "delete",
        url: "http://127.0.0.1:8000/relationships/" + id,
        data:{
            _token:_token,
        },
        success: function(data){
            $('#btn-unfollow').html(translator.trans('message.follow'));
            $('#btn-unfollow').attr("id", "btn-follow");
        }
    });
});

$(document).on('click', '#btn-follow', function () {
    let translator = new I18n;
    var _token = $('input[name="_token"]').val();
    console.log($('#followed_id').val());
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/relationships",
        data:{
            _token:_token,
            followed_id: $('#followed_id').val(),
        },
        success: function(data){
            $('#btn-follow').html(translator.trans('message.unfollow'));
            $('#btn-follow').attr("id", "btn-unfollow");
        }
    });
});
