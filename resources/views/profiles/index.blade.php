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
<a href="{{ route('profiles.create') }}" class="btn btn-primary" >{{$user->name}}の詳細情報の登録</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection