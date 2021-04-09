@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                さんの詳細ページ
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profiles.update',['profile' => $profile->id]) }}">
                    @method('PATCH')
                    @csrf

                         ニックネーム：
                          <input name="nickname" type="text">
                          <br>

                          <input name="gender" type="radio" @if ($profile->gender === 0) checked @endif value="0" >男性
                          <input name="gender" type="radio" value="1" @if ($profile->gender === 1) checked @endif>女性
                          <br>
                          
                          
                          身長：<input type="text" name='height' placeholder='165' value=" {{$profile->height}} ">
                          <br>

                          年齢：<input type="text" name='age' placeholder='30' value='{{$profile->age}}'>
                          <br>

                          職業：<input type="text" name= 'work' value={{$profile->work}}>
                          <br>

                          趣味：<input type="text" name="interest" value={{$profile->interest}}>
                          <br>

                          自己紹介<br>
                          <textarea name="comment" rows="8" cols="40">
                          {{$profile->comment}}
                          </textarea>
                          <br>

                          <input type='submit' value="更新する">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection