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
                    自己紹介：{{$profile->comment}}
                    <br>
                    <a href="{{ route('profiles.edit', ['profile' => $profile-> id]) }}" class="btn btn-primary">編集する</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection