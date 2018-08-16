<!-- index.blade.php -->
@extends('district')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>District</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>District Name</th>
        <th>Region</th>
        <th>Total IPCs</th>
        <th>Total Providers</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($district as $district)
      <tr>
        <td>{{$district['id']}}</td>
        <td>{{$district['districtName']}}</td>
        <td>{{$district['ipc_id']}}</td>
        <td>{{$district['provider_id']}}</td>
        <td><a href="{{action('DistrictController@update', $district['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('DistrictController@delete', $district['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection