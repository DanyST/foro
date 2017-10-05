@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @foreach($errors->all() as $error)   
            <li id=error>
                {{ $error }}
            </li>         
        @endforeach
    </ul>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear post</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}">
                        {{ csrf_field() }}
                        <div>
                            <input type="text" name="title">
                        </div>
                        <div>
                            <textarea name="content" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <button type="submit">Publicar</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
