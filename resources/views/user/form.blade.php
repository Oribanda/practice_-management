<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>ユーザー登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            @if($target == 'store')
            <form action="/user" method="post">
                @include('user/message')
                @elseif($target == 'update')
                <form action="/user/{{ $user->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="avter">アバター</label>
                        <input type="text" class="form-control" name="avter" value="{{ $user->avter }}">
                    </div>
                    <div class="form-group">
                        <label for="introduce">自己紹介</label>
                        <input type="text" class="form-control" name="introduce" value="{{ $user->introduce }}">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="text" class="form-control" name="password" value="{{ $user->password }}">
                    </div>
                    <button type="submit" class="btn btn-default">登録</button>
                    <a href="/user">戻る</a>
                </form>
        </div>
    </div>
</div>
