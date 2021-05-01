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
                    <div class="btn
                     btn-success" id="search-btn">詳細検索</div>
                     <div class="dropdown d-inline-block">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    表示する性別を絞る
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <form action=" {{ route('profiles.index') }} " method="GET">
                @csrf
                <input type='hidden' name="gender" value="all">
                <input type='submit' class="dropdown-item" value="全員">
                </form>

                <form action=" {{ route('profiles.index') }} " method="GET">
                @csrf
                <input type='hidden' name="gender" value="man">
                <input type='submit' class="dropdown-item" value="男性のみ">
                </form>

                <form action=" {{ route('profiles.index') }} " method="GET">
                @csrf
                <input type='hidden' name="gender" value="woman">
                <input type='submit' class="dropdown-item" value="女性のみ">
                </form>
                 </ul>
</div>
<a href=" {{ route('favorites.index') }} " class="btn btn-warning">お気に入り</a>
<!-- <div class="btn btn-warning">お気に入り</div> -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="container ">
                    <div >
                        <form method='GET' action='{{ route("profiles.search") }}' id='search-form' class='d-none'>
                        @csrf
                            <br>
                            <div class='form-inline'>
                            年齢<input type='text' class="form-control col-2" name='age-bottom'>〜<input type='text' name='age-top'  class='form-control col-2'>
                            </div>
                            <br>
                            <div class='form-inline'>
                            身長<input type='text' class="form-control" name='height-bottom'>〜<input type='text' name='height-top' class="form-control">
                            <br>
                            </div>
                            ニックネーム<input type='text' class="form-control col-6" name='key-nickname'>
                            <br>
                            仕事<input type='text' class="form-control col-6" name='key-work'>
                            <br>
                            趣味<input type='text' class="form-control col-6" name='key-interest'>
                            <br>
                            <input type='submit' name='submit' value='検索する'>
                        </form>
                    </div>
                        <div class="row m-auto justify-content-center ">
                            @foreach ($profiles as $index => $profile)
                            <div class="card card-member m-1 col-5 col-md-3 col-lg-2 
                            <?php if ($profile->gender === 0) echo 'card-man'; ?>
                            <?php if ($profile->gender === 1) echo 'card-woman'; ?>
                            " style="width: 18rem;">
                                <div class="card-body d-relative">
                                    <h5 class="card-title">{{$profile->nickname}}</h5>
                                    <a href="{{ route('profiles.show',['profile' => $profile->id]) }}" class="card-link my-2 btn btn-sm btn-primary d-block d-absolute">詳細</a>
                                    年齢：{{$profile->age}}  <br>
                                    性別：
                                    @if ($profile->gender == 0)
                                    男性
                                    @else
                                    女性
                                    @endif
                                    <br>
                                    身長：{{$profile->height}}<br>
                                    趣味：{{$profile->interest}}<br>
                                    仕事：{{$profile->work}}<br>
                                    
                                </div>
                            </div>
                    
@endforeach

</div>

</div>
{{$profiles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/index.js') }}"></script>
@endsection