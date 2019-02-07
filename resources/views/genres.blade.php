@extends('layout')

@section('title','Genres')

@section('main')  
  <form action="/genres" method="get">
    <input type="text" name="search" value="{{$search}}">
    <button type="submit">Search</button>
    <a href="/genres" class="btn-link">Clear</a>
  </form>
  <table class="table">
    <tr>
      <th>Genre</th>
    </tr>

    @forelse($genres as $genre)
      <tr>
        <td>
            <a href="tracks?genre={{$genre->Name}}">{{$genre->Name}}</a>
        </td>
      </tr>
      @empty
        <tr>
            <td colspan="4">No invoices found</td>
        </tr>
    @endforelse

  </table>
@endsection