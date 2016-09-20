@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <pre><code class="html">{{ $paste->paste }}</code></pre>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
