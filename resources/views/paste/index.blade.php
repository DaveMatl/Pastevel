@extends('layouts.app')

@section('content')
    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pastes</div>

                    <div class="panel-body">

                        <a href="{{ url('/p/create') }}" class="btn btn-primary">Create Paste</a>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Key</th>
                                <th></th>
                                <th>Syntax</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pastes as $paste)
                                <tr>
                                    <td><a href="{{ url('/p/' . $paste->key) }}">{{ $paste->key }}</a></td>
                                    <td>
                                        <form action="{{ url('/p/' . $paste->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-warning">Delete</button>
                                        </form>

                                    </td>
                                    <td>{{ $paste->lang }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
