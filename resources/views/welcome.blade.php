<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
    <body>
        <div class="flex-center position-ref full-height"  id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/admin') }}">Admin</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
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
                        <h3 class="news__title">{{ $val_news['title'] }}</h3>
                        <div class="news__content well">
                        @if(!empty($val_news['img']))
                                <img src="{{ asset('storage/img/'.$val_news['img']) }}" alt="">
                            @endif
                            <p class="news__text">{{ $val_news['content'] }}</p>
                        </div>

                        @if($admin)
                            <div class="new__control-buttons">
                                <a class="news__edit" href="#" data-toggle="modal" data-id="{{ $val_news['id'] }}" data-target="#modalEdit">
                                    <span class="glyphicon glyphicon-edit" title="edit"></span>
                                </a>
                                <a class="news__delete" href="#" data-toggle="modal" data-id="{{ $val_news['id'] }}"
                                   data-target="#modalDelete">
                                    <span class="glyphicon glyphicon-remove-sign" title="delete" data-toggle="modal"
                                        data-target=".bs-example-modal-lg"></span>
                                </a>
                            </div>
                        @endif

                        <span class="news__author">{{ $val_news['author'] }}</span>
                        <span class="news__date">{{ date('Y-m-d' ,strtotime($val_news['dateCreate'])) }}</span>
                    </section>
                    @endforeach
                    @include('modal-news')
                </div>

                @if (Auth::check())
                    @include('form-add-news')
                @endif

            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>