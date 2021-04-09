@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録者一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



<a href="{{ route('profiles.show', ['profile' => $profile->id]) }}" class="btn btn-primary" >マイページ</a>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection