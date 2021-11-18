@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                                <th scope="col">Upload</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post["id"]}}</td>
                                <td>{{$post["title"]}}</td>
                                <td>{{$post["slug"]}}</td>

                                <td>
                                    <a href="{{route("admin.posts.show", $post["id"])}}">
                                        <button type="button" class="btn btn-primary">Visualizza</button>
                                    </a>
                                </td>

                                 <td>
                                    <a href="{{route("admin.posts.edit", $post["id"])}}">
                                        <button type="button" class="btn btn-warning">Modifica</button>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{route("admin.posts.destroy", $post["id"])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                </td>


                                <td>
                                    <form action="{{route("admin.posts.destroy", $post["id"])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Elimina</button>
                                    </form>
                                </td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">vuoi confermare la Cancellazione ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection