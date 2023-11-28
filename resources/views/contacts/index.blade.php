@extends('layouts/main')

@section('content')
    <div class="row" style="margin-top: 2%">
        <div class="col-1 offset-2">
            <nav class="navbar bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contacts') }}">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('groups') }}">Groups</a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="col-6">
            <div class="alert alert-info">Contacts</div>
            <a class="btn btn-info btn-sm" href="{{ url('create') }}">New</a>
            <table class="table table-bordered">
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>PhoneNumber</th>
                    <th>Action</th>
                </tr>
                @foreach ($contacts as $contact)

                    <tr>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>
                            <a href="/{{$contact->id }}/edit">
                                edit</a> |
                            <a href="/{{$contact->id }}/delete">
                                delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
