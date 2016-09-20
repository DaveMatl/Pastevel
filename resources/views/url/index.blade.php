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
                    <div class="panel-heading">Shortened URLs</div>

                    <div class="panel-body">

                        <form action="{{ url('/u') }}" method="POST" class="form-inline">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="sr-only" for="key">Key</label>
                                <input class="form-control" type="text" name="key" id="key" value="{{ old('key') }}" placeholder="Key">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="url">URL:</label>
                                <input class="form-control" type="text" name="url" id="url" value="{{ old('url') }}" placeholder="URL">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="singleUse"> Single use?
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Key</th>
                                <th></th>
                                <th>URL</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($urls as $url)
                            <tr>
                                <td><a href="{{ url('/u/' . $url->key) }}">{{ $url->key }}</a></td>
                                <td>
                                    <form action="{{ url('/u/' . $url->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-warning">Delete</button>
                                    </form>

                                </td>
                                <td>{{ $url->url }}</td>
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