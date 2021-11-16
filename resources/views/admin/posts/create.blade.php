@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Scrivi il Post</div>

                <div class="card-body">

                    <form action="{{route("admin.posts.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="scrivi il Titolo">
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="scrivi il Testo"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Scrivi</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection