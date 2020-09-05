<head>
    <title>Uesr Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
@extends('user/layout')
@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">登録情報一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">生年月日</th>
                    <th class="text-center">アバター</th>
                    <th class="text-center">自己紹介</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>
                        <a href="/user/{{ $user->id }}/edit">{{ $user->id }}</a>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->avter }}</td>
                    <td>{{ $user->introduce }}</td>
                    <td>
                        <form action="/user/{{ $user->id }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div><a href="/user/create" class="btn btn-default">新規作成</a></div>
        </div>
    </div>
