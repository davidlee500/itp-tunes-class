@extends('layout')

@section('title','Tracks')

@section('main')  
  <form action="/tracks?genre={{$genre}}" method="get">
    <input type="text" name="search" value="{{$search}}">
    <button type="submit">Search</button>
    <a href="/tracks?genre={{$genre}}" class="btn-link">Clear</a>
  </form>
  <table class="table">
    <tr>
      <th>Track</th>
      <th>Album</th>
      <th>Artist</th>
      <th>Price</th>
    </tr>

    @forelse($tracks as $track)
      <tr>
        <td>
            {{$track->trackName}}
        </td>
        <td>
            {{$track->Title}}
        </td>
        <td>
            {{$track->artistName}}
        </td>
        <td>
            ${{$track->UnitPrice}}
        </td>
      </tr>
      @empty
        <tr>
            <td colspan="4">No invoices found</td>
        </tr>
      @endforelse

  </table>
@endsection