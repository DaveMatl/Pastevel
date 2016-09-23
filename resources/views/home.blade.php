@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <p>You are logged in!</p>

                    <form id="myDropzone" action="{{ url('/f') }}" method="POST" class="dropzone">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts.header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    <style>
        #myDropzone { margin: 3rem; }
        .dropzone { min-height:120px; border: 2px dashed #0087F7; border-radius: 10px; background: white; }
        .dropzone .dz-message { font-weight: 400; }
        .dropzone .dz-message .note { font-size: 0.8em; font-weight: 200; display: block; margin-top: 1.4rem; }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.myDropzone = {
            init: function() {
                //this.on("success", function(file) { alert("Added file."); });
            }
        };
    </script>
@endsection
