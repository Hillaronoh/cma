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
            <div class="alert alert-info">Groups</div>
            <a class="btn btn-info btn-sm" href="{{ url('create') }}">New</a>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach ($groups as $group)

                    <tr>
                        <td>{{$group->name}}</td>
                        <td>{{$group->description}}</td>
                        <td>
                            <a href="/{{$group->id }}/edit">
                                edit</a> |
                            <a href="/{{$group->id }}/delete">
                                delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
