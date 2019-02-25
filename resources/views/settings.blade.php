@extends('layout')

@section('title', 'Settings')

@section('main')
  <h1>Settings</h1>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="mode">Maintenance Mode: </label>
      <input type="checkbox" id="on" name="on" value="on"> On <br>
      <input type="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>
@endsection