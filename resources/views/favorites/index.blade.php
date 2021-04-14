<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ニックネーム</th>
      <th scope="col">年齢</th>
      <th scope="col">身長</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($favorites_to as $index => $favorite)
    <tr>
      <th scope="row"> {{$index + 1}} </th>
      <td class='zebra-striping' >Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    @endforeach
  </tbody>
</table>