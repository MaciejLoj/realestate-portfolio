@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">e-mail</th>
                <th scope="col">User</th>
                <th scope="col">Admin</th>
                <th scope="col">Moderator</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        {{-- wstawic nowy controller --}}
                        {{ Form::open(array('action' => 'HomeController@postAdminRoles', 'method' => 'POST')) }}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- naprawic checkboxa --}}
                            <td class="pl-3">{{Form::checkbox("role_user", null, $user->hasRole('User'))}}</td>
                            <td class="pl-4">{{Form::checkbox("role_admin", null, $user->hasRole('Admin'))}}</td>
                            <td class="pl-4">{{Form::checkbox("role_moderator", null, $user->hasRole('Moderator'))}}</td>
                            <td>{{ Form::submit('Zatwierdz role', ['class' => 'btn btn-primary',]) }}</td>
                        {{ Form::close() }}
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection
