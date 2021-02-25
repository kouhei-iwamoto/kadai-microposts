@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- お気に入り投稿一覧 --}}
            <h1>ここにお気に入りが表示される</h1>
        </div>
    </div>
@endsection