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
                                <a class="news__delete" href="" >
                                    <span class="glyphicon glyphicon-edit" title="edit"></span>
                                </a>
                                <a class="news__edit" href="">
                                    <span class="glyphicon glyphicon-remove-sign" title="delete"></span>
                                </a>
                            </div>
                        @endif
                        <span class="news__author">{{ $val_news['author'] }}</span>
                        <span class="news__date">{{ date('Y-m-d' ,strtotime($val_news['dateCreate'])) }}</span>
                    </section>
                    @endforeach
                </div>

                @if (Auth::check())

                <form class="form-news form-horizontal" enctype="multipart/form-data" method="POST"
                      action="{{ route('add_news') }}">
                    @if(count($errors) > 0)
                        <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title"
                                   value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" id="inputContent" cols="30"
                                      rows="10" placeholder="Content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile">Add image</label>
                        <input type="file" id="inputFile" name="img">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </body>
</html>
