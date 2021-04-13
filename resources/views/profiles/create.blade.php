@extends('layouts.app')

<!-- <?php session_start(); ?>  -->


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                詳細登録ページ
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profiles.store') }}">
                    @csrf
                    @if ($errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                    ニックネーム：
                        <input name="nickname" type=text placeholder="ニックネーム" value=" {{old('nickname')}} ">
                        <br>
                          <input name="gender" type="radio" value="0"
                           <?php if (old('gender')== 0) echo 'checked'; ?> 
                           >男性
                          <input name="gender" type="radio" value="1"
                          <?php if (old('gender')== 1) echo 'checked'; ?>
                          >女性
                          <br>

                          身長：<input type="text" name='height' placeholder='165' value=" {{old('height')}}">
                          <br>

                          年齢：<input type="text" name='age' placeholder='30' value=" {{old('age')}}">
                          <br>

                          職業：<input type="text" name= 'work' value=" {{old('work')}}">
                          <br>

                          趣味：<input type="text" name="interest" value=" {{old('interest')}}">
                          <br>

                          自己紹介<br>
                          <textarea name="comment" rows="8" cols="40" value=" {{old('comment')}}">
                          </textarea>
                          <br>

                          <input type='submit' value="登録する">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection