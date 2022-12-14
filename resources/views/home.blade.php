@extends("layout")
@section("content")
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4>{{ auth()->user()->name }}</h4>
                    <h3>Blogs</h3>
                </div>
                <div class=" d-flex align-items-center">
                    <a href="/blog/create" class=" btn btn-success">+Create</a>
                </div>
              </div>
        </div>
        <div class="card-body">
            @foreach ($data as $row )
            <h5 class="card-title">{{$row->name}}</h5>
            <p class="card-text">{{$row->description}}</p>

            <a href="/blog/{{ $row->id }}" class="btn btn-primary">View</a>
            <a href="/blog/{{ $row->id }}/edit" class="btn btn-warning">Edit</a>
            <form class=" p-0 m-0 d-inline-block" action="/blog/{{ $row->id }}" method="post">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
            <hr>
            @endforeach

        </div>
        <div class="card-footer">
            <a href="/logout" class="btn btn-primary float-end">Logout</a>
        </div>
      </div>
</div>
@endsection
