$(document).ready(function() {

    $(window).scroll(function() {
        ($(document).scrollTop() > 50) ? $("#fbox").fadeIn(100): $("#fbox").fadeOut(100);
    });

    $('#fbox a').click(function() {
        $(document).scrollTop(0);
        return false;
    });

    function hitokoto() {
        $.ajax({
            url: 'https://www.iqi7.com/hitokoto-now/api.php?encode=json',
            type: 'get',
            beforeSend: function(xhr) {
                $('#hitokoto').html('『少女祈祷中...』');
            },
            success: function(data) {
                /*if (data.status == 'success') {
                    $('#hitokoto').html(data.result.hitokoto);
                } else {
                    $('#hitokoto').html('『一言异常了呢』');
                }*/
				$('#hitokoto').html(data.hitokoto)

            },
            error: function(xhr, textStatus, errorThrown) {
                $('#hitokoto').html('『一言读取失败了呢』');
            }
        });

    }

    setInterval(function() {
        hitokoto();
    }, 2500);
});
