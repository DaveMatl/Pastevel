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
                    <div class="panel-heading">Create Paste</div>

                    <div class="panel-body">

                        <form action="{{ url('/p') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                            <div class="collapse in" id="options" aria-expanded="true">
                                <div class="well">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="key">Key</label>
                                                <input type="text" name="key" id="key" class="form-control" value="{{ old('key') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lang">Syntax</label>
                                                <select id="lang" name="lang" class="form-control">
                                                    <option value="auto">Autodetect</option>
                                                    <option value="accesslog">Access Log</option>
                                                    <option value="armasm">ARM ASM</option>
                                                    <option value="apache">Apache</option>
                                                    <option value="bash">Bash</option>
                                                    <option value="brainfuck">Brainfuck</option>
                                                    <option value="coffeescript">CoffeeScript</option>
                                                    <option value="cmake">CMake</option>
                                                    <option value="cpp">C++</option>
                                                    <option value="cs">C#</option>
                                                    <option value="css">CSS</option>
                                                    <option value="diff">Diff</option>
                                                    <option value="dns">DNS Zone File</option>
                                                    <option value="erlang">Erlang</option>
                                                    <option value="fortran">Fortran</option>
                                                    <option value="glsl">GLSL</option>
                                                    <option value="go">Go</option>
                                                    <option value="gradle">Gradle</option>
                                                    <option value="groovy">Groovy</option>
                                                    <option value="haml">HAML</option>
                                                    <option value="haskell">Haskell</option>
                                                    <option value="xml">HTML/XML</option>
                                                    <option value="http">HTTP</option>
                                                    <option value="ini">INI</option>
                                                    <option value="java">Java</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="json">JSON</option>
                                                    <option value="kotlin">Kotlin</option>
                                                    <option value="lisp">Lisp</option>
                                                    <option value="lua">Lua</option>
                                                    <option value="makefile">Makefile</option>
                                                    <option value="markdown">Markdown</option>
                                                    <option value="mathematica">Mathematica</option>
                                                    <option value="matlab">Matlab</option>
                                                    <option value="nginx">Nginx</option>
                                                    <option value="objectivec">Objective-C</option>
                                                    <option value="perl">Perl</option>
                                                    <option value="php">PHP</option>
                                                    <option value="none">Plain Text</option>
                                                    <option value="powershell">Powershell</option>
                                                    <option value="puppet">Puppet</option>
                                                    <option value="python">Python</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="rust">Rust</option>
                                                    <option value="scala">Scala</option>
                                                    <option value="scilab">Scilab</option>
                                                    <option value="scheme">Scheme</option>
                                                    <option value="scss">SCSS</option>
                                                    <option value="sql">SQL</option>
                                                    <option value="tcl">Tcl</option>
                                                    <option value="tex">TeX</option>
                                                    <option value="typescript">TypeScript</option>
                                                    <option value="vala">Vala</option>
                                                    <option value="vbnet">VB.net</option>
                                                    <option value="vbscript">VBScript</option>
                                                    <option value="vim">Vim</option>
                                                    <option value="x86asm">x86 ASM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <textarea id="paste" name="paste" class="form-control" rows="30" placeholder="Enter paste content..." autofocus="autofocus">{{ old('paste') }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
