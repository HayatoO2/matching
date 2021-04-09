@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">登録者一覧
                <?php if (!empty($profile)): ?>
                    <a href="{{ route('profiles.show', ['profile' => $profile->id]) }}" class="btn btn-primary ml-5" >マイページ</a>
                    <?php else: ?>
                        <a href="{{ route('profiles.create')}}" class="btn btn-primary " >詳細登録ページ</a>
                    <?php endif ?>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="container ">
                        <div class="row m-auto justify-content-center">
                            @foreach ($profiles as $index => $profile)
                            
                            <div class="card card-member m-1 col-5 col-lg-2" style="width: 18rem;">
                                <div class="card-body d-relative">
                                    <h5 class="card-title">{{$profile->nickname}}</h5>
                                    <a href="{{ route('profiles.show',['profile' => $profile->id]) }}" class="card-link my-2 btn btn-sm btn-primary d-block d-absolute">詳細</a>
                                    年齢：{{$profile->age}}  <br>
                                    性別：{{$profile->gender}}<br>
                                    身長：{{$profile->height}}<br>
                                    趣味：{{$profile->interest}}<br>
                                    仕事：{{$profile->work}}<br>
                                    
                                </div>
                            </div>
                    
@endforeach

                        </div>

                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection