<form class="form-news form-horizontal" enctype="multipart/form-data" method="POST"
      action="{{ route('add-news') }}">
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