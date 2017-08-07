<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\News;

class Home extends Model
{

    public function saveDateFormImg()
    {
        $request = request();

        $file             = $request->file('img');
        list($usec, $sec) = explode(" ", microtime());
        $hashName         = base_convert($usec, 16, 36);
        $fileName         = $hashName . $file->getClientOriginalName();


        $path = move_uploaded_file($request->img->path(),  'storage/img/' . $fileName);

        News::create([
                'user_id' => Auth::id(),
                'title'   => $request->input('title'),
                'img'     => $fileName,
                'content' => $request->input('content')
            ]);
    }

    public function saveDateForm()
    {
        $request = request();

        News::create([
            'user_id' => Auth::id(),
            'title'   => $request->input('title'),
            'content' => $request->input('content')
        ]);
    }
}
