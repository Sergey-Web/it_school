@extends('layouts.app')
{{ dump($users) }}
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
        <table class="table table-hover table-users">
            <thead class="table-users__thead">
                <tr class="table-users__row">
                    <th class="table-users__title">Firstname</th>
                    <th class="table-users__title">Lastname</th>
                    <th class="table-users__title">Patronymic</th>
                    <th class="table-users__title">Group</th>
                    <th class="table-users__title"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="table-users__row" data-id-user="{{ $user['id'] }}">
                    <td class="table-users__item">{{ $user['firstName'] }}</td>
                    <td class="table-users__item">{{ $user['lastName'] }}</td>
                    @if($user['patronymic'])
                    <td class="table-users__item">{{ $user['patronymic'] }}</td>
                    @else
                    <td class="table-users__item"> - </td>
                    @endif
                    <td class="table-users__item">{{ $user['userGroup'] }}</td>
                    <td class="table-users__item">
                        <a href="#" class="table-users__icon-del glyphicon glyphicon-remove"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit news</h4>
                    </div>
                    <form class="form-edit-news" method="POST" action="{{ route('edit-news') }}">
                        {{ csrf_field() }}
                        <input type="text" class="form-control form-edit-news__title" name="newsTitle" value="">
                        <textarea class="form-control form-edit-news__content" name="newsContent" rows="5"
                                  placeholder="Content"></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Close</button>
                            <button type="submit" id="newsSendEdit" name="newsEditId" value="" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
