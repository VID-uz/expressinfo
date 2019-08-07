<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Redirecting</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 26px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="code">
        Перенаправление начнется через
    </div>

    <div class="message" style="padding: 10px;">
        5
    </div>
</div>
<script src="/assets/js/core/jquery.min.js"></script>
<script>
    $(function () {
        var time = 5;
        setInterval(function () {
            $('.message').text(time);
            if(time == 0)
            {
                @if(preg_match('/https/', $catalog->url) || preg_match('/http/', $catalog->url))
                    window.location.href = '{{ $catalog->url }}';
                @else
                    window.location.href = 'http://{{ $catalog->url }}';
                @endif
            }
            if(time != 0)
            {
                time--;
            }
        }, 1000);
        {{--window.location.href = '{{ $catalog->url }}';--}}
    });
</script>
</body>
</html>
