@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table stripped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            @foreach($posts as $post)
                <tr>
                    <div class="row">
                        <div class="col-4">
                            <td><img class="w-100" src="/storage/cover_images/{{$post->cover_image}}"></td>
                        </div>
                        <div class="col-8">
                            <td><a href="/ogloszenia/{{ $post->id }}">{{ $post->title }}</a></td>
                            <td></td>
                            <td>{{ $post->body }}</td>
                            <td></td>
                            <td></td>
                        </div>
                    </div>
                </tr>
            @endforeach
        </table>
        {{-- {{$posts->links()}} --}}
    </div>
@endsection
