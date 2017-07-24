/**
 * Created by tanphat on 24/07/2017.
 */
$('#frm-login').submit(function () {
    $.ajax({
        url: baseUrl,
        type: "post",
        dataType: 'text',
        data: {
            password: $('#password').val()
        },
        success: function (rs) {
            // console.log(rs);
            var obj = $.parseJSON(rs);
            if (parseInt(obj.fail) === 0){
                window.location.reload();
            } else
                alert("Login failed");
        }
    });
    return false;
});

$('#logout').click(function () {
    $.get(baseUrl + "?m=common&a=logout", {},
    function (rs) {
        window.location.reload();
    }, 'text');
    return false;
});