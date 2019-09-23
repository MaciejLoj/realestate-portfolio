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
    </table>
    @foreach($users as $user)
        <form action="{{ route('admin.assign') }}" method="POST">
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
            <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : ''}} name="role_user"></td>
            <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"></td>
            <td><input type="checkbox" {{ $user->hasRole('Moderator') ? 'checked' : ''}} name="role_moderator"></td>
            {{ csrf_field() }}
            <td><button type="submit">Zatwierdz role</button></td>
        </form>
                {{-- {{ Form::open(array('action' => 'AdminController@postAdminRoles', 'method' => 'POST')) }}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    {{-- Form::checkbox('name', 'value', true); --}}
                    {{-- <input type="hidden" name="email" value="{{ $user->email }}"> --}}
                    {{-- <td class="pl-3">{{Form::checkbox('role_use', null, $user->hasRole('User'))}}</td> --}}
                    {{-- <td class="pl-3">{{Form::checkbox('role_use', null, $user->hasRole('User'))}}</td>
                    <td class="pl-4">{{Form::checkbox('role_admi', null, $user->hasRole('Admin'))}}</td>
                    <td class="pl-4">{{Form::checkbox('role_moderato', null, $user->hasRole('Moderator'))}}</td>
                    <td>{{ Form::submit('Zatwierdz role', ['class' => 'btn btn-primary']) }}</td>
                {{ Form::close() }} --}}
            {{-- </tr> --}}
    @endforeach

</div>
@endsection
