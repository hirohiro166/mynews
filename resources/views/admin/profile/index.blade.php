@extends('layouts.admin')
@section('title', '登録ずみのプロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('profile.add') }}" role="button" class="btn-primary">新規作成</a> 
            </div>
            <div class="col-md-8">
                <form action="{{ route('profile.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">氏名</th>
                                <th width="10%">性別</th>
                                <th width="20%">趣味</th>
                                <th width="30%">自己紹介</th>
                                <th width="30%">編集/削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                            <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ Str::limit($profile->name, 100) }}</td>
                                    <td>{{ Str::limit($profile->gender, 100) }}</td>
                                    <td>{{ Str::limit($profile->hobby, 200) }}</td>
                                    <td>{{ Str::limit($profile->introduction, 200) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('profile.edit', ['id' => $profile->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('profile.delete', ['id' => $profile->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection