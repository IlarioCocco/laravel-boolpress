@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Scrivi il Post</div>

                <div class="card-body">

                    <form action="{{route("admin.posts.update", $post)}}" method="POST">
                        @csrf
                        @method("PUT")
                        
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control" @error('title') is-invalid @enderror 
                        name="title" id="title" placeholder="scrivi il Titolo" value="{{old("title") ?? $post["title"]}}">
                        {{-- {{ old("title") ? old("title") : $post["title"]}} = operatore ternario--}}
                        {{-- {{ old("title") ?? $post["title"]}}               = operatore ternario short alternative = Null Coalescing Operator--}}
                            
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control" @error('content') is-invalid @enderror 
                            name="content" id="content" cols="30" rows="10" placeholder="scrivi il Testo">{{old("content") ?? $post["content"]}}</textarea>

                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-success">Salva</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection