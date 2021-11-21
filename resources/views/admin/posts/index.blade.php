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
                                    <button type="button" class="btn btn-dark btn-delete" data-id="{{$post["id"]}}" data-toggle="modal" data-target="#deleteModal">
                                        Cancel
                                    </button>
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


<!-- Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">vuoi confermare la Cancellazione ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <form action="{{route("admin.posts.destroy", 'id')}}" method="POST">
            @csrf
            @method("DELETE")
            <input type="hidden" id="delete-id" name="id">
            <div class="modal-body text-danger">
                stai per cancellare il Post !
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Si</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection