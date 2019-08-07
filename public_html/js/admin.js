$(function () {
    var href = window.location.href;
    var i = 0;
    $.each($('.parent-li a'), function (index, value) {

        if(href == value.href)
        {
            $('.parent-li').eq(index).addClass('open');
            $(value).addClass('active');
        }
    });
    // console.log($('.children-li').children());
    $.each($('.children-li'), function (index, value) {
        $.each($(value).children(), function (i, v) {
            if(!$(v).hasClass('nav-submenu'))
            {
                $.each($(v).children(), function (i2, v2) {
                    if($(v2).children().attr('href') == href)
                    {
                        $(v2).children().addClass('active');
                        $('.children-li').eq(index).addClass('open');
                    }
                });
            }
        });
    });

    $('#disableButton').click(function () {
        $(this).attr('disabled', '');
        $('form').submit();
    });

});