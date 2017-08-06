<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/admin') }}">Admin</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    News
                </div>

                <div class="wrap-news">
                    @foreach($news as $key_news => $val_news)
                    <section class="news">
                        <h3 class="news__title">{{ $val_news->title }}</h3>
                        <div class="news__content well">
                            @if(!empty($val_news->img))
                                <img src="{{ asset('img/'.$val_news->img) }}" alt="">
                            @endif
                            <p class="news__text">{{ $val_news->content }}</p>
                        </div>
                        <span class="news__author"></span>
                    </section>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
