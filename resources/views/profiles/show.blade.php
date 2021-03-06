@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                {{$profile->nickname}}さんのページ
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    性別：@if($profile->gender===0)
                    男性
                    @else
                    女性
                    @endif
                    <br>
                    年齢：{{$profile->age}}
                    <br>
                    身長：{{$profile->height}}
                    <br>
                    職業：{{$profile->work}}
                    <br>
                    趣味：{{$profile->interest}}
                    <br>
                    自己紹介：<br>
                    {{$profile->comment}}
                    <br>
                    <a href="{{ route('profiles.edit', ['profile' => $profile-> id]) }}" class="btn btn-primary">編集する</a>
                    <a href="{{ route('profiles.index')}}" class="btn btn-primary">戻る</a>
                    <?php  if($user->profile->gender != $profile->gender) : ?>
                    
                        <?php $data = $favorites->where('to_fav', $profile->user_id)
                                        ->where('from_fav', $user->id)
                                        ->where('match_flag', 1)
                                        ->first();
                                        ?>

                        @if(empty($data))
                    <form action="{{ route('favorites.store') }}" method="POST">
                    @csrf
                    <input type="submit" value="お気に入りに追加" class="btn btn-warning">
                    <input type='hidden' value=" {{$profile->user_id}} " name='id'>
                    </form>
                    @else
                    <form action="{{ route('favorites.store') }}" method="POST">
                    @csrf
                    <input type="submit" value="お気に入り解除" class="btn btn-secondary">
                    <input type='hidden' value=" {{$profile->user_id}} " name='id'>
                    </form>
                    @endif


                    <?php endif ; ?>
                    
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection