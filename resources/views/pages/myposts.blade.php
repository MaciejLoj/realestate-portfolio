 @extends('layouts.app')

@section('content')

    <div class="container">
        <h5 class="jumbotron text-center">Moje ogloszenia</h5>
        <a href="/ogloszenia/dodaj" class="btn btn-primary">Dodaj ogloszenie</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Moje ogloszenia</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            {{-- zmienna $posts z RealEstateControllera  --}}
            @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td><a href="/ogloszenia/{{$post->id}}/edytuj" class="btn btn-primary">Edytuj</a></td>
                {{-- dla opcji usuniecia posta musimy stworzyc formularz --}}
                <td>
                    {{-- $post->id jest parametrem ktory zostaje przekazany do PostsController$destroy --}}
                    {{Form::open(['action'=>['PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'pull-right'])}}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Usun', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
