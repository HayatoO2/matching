@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <button type="button" class="btn btn-sm btn-warning" id="to_btn">お気に入り追加した人</button>
                &ensp;
                <button type="button" class="btn btn-sm btn-danger" id="from_btn">お気に入り追加してくれた人</button>
                &ensp;
                <button type="button" class="btn btn-sm btn-success" id="both_btn">お互いに追加</button>

                <table class="table w-75 table-striped">

@csrf
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">ニックネーム</th>
      <th scope="col">年齢</th>
      <th scope="col">身長</th>
      <th scope="col">趣味</th>
      <th scope="col">仕事</th>
      <th scope="col">詳細情報</th>
    </tr>
  </thead>

  <!-- お気に入り追加した -->
  <tbody id="to_fav">
   @foreach ($profiles_to as $index => $profile)
@csrf
    <tr>
      <th scope="row"> {{$index + 1}} </th>
      <td> {{$profile->nickname}} </td>
      <td> {{$profile->age}} </td>
      <td> {{$profile->height}} </td>
      <td> {{$profile->interest}} </td>
      <td> {{$profile->work}} </td>
      <td><a class="btn btn-primary" href=" {{ route('profiles.show', ['profile' => $profile->id])  }} " role="button">Link</a></td>
    </tr>
    @endforeach
  </tbody>

  <!-- お気に入り追加された -->
  <tbody class="d-none" id="from_fav">
   @foreach ($profiles_from as $index => $profile)
@csrf
    <tr>
      <th scope="row"> {{$index + 1}} </th>
      <td> {{$profile->nickname}} </td>
      <td> {{$profile->age}} </td>
      <td> {{$profile->height}} </td>
      <td> {{$profile->interest}} </td>
      <td> {{$profile->work}} </td>
      <td><a class="btn btn-primary" href=" {{ route('profiles.show', ['profile' => $profile->id])  }} " role="button">Link</a></td>
    </tr>
    @endforeach
  </tbody>


  <!-- お互いに追加 -->
  <tbody class="d-none" id="both_fav">
   @foreach ($profiles_both as $index => $profile)
@csrf
    <tr>
      <th scope="row"> {{$index + 1}} </th>
      <td> {{$profile->nickname}} </td>
      <td> {{$profile->age}} </td>
      <td> {{$profile->height}} </td>
      <td> {{$profile->interest}} </td>
      <td> {{$profile->work}} </td>
      <td><a class="btn btn-primary" href=" {{ route('profiles.show', ['profile' => $profile->id])  }} " role="button">Link</a></td>
    </tr>
    @endforeach
  </tbody>
  <!-- お互いに追加 -->


</table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/fav.js') }}"></script>
@endsection