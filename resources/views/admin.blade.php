@extends('layouts.app')

@section('content')
    <div class="content">
        <table class="table user-date">
            <tbody>
            @foreach($user as $key_item => $item)
                @if($key_item == 'img')
                <tr>
                    <th class="user-date__title">{{ $key_item }}:</th>
                    <td><img src="{{ asset('storage/img/'.$item) }}" alt=""></td>
                </tr>
                @else
                <tr>
                    <th class="user-date__title">{{ $key_item }}:</th>
                    <td>{{ $item }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
