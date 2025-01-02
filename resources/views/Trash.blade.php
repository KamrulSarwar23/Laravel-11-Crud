@extends('master')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h3>Trash List</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('posts.index') }}" class="btn" style="background-color: #4643d3; color: white;"><i
                        class="fas fa-chevron-left"></i> Back</a>
                </div>
                <div class="col-md-8">
                    <form action="{{route('trash.index')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search anything..." aria-describedby="button-addon2" value="{{request()->search}}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                      <form action="{{route('trash.index')}}" method="GET" class="form-order">
                        <select class="form-select" name="order" id="" onchange="$('.form-order').submit()">
                            <option @selected(request()->order == 'desc') value="desc">Newest to Old</option>
                            <option @selected(request()->order == 'asc') value="asc">Old to Newest</option>
                        </select>
                      </form>
                    </div>
                </div>

                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered" style="border: 1px solid #dddddd">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Bank Account Number</th>
                        <th scope="col">About</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $item)

                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->first_name}}</td>
                        <td>{{$item->last_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->bank_account_number}}</td>
                        <td>{{$item->about}}</td>
                        <td>

                            <a href="{{route('post.restore', $item->id)}}" style="color: #2c2c2c;" class="ms-1 me-1" ><i class="fas fa-undo-alt"></i></a>
                            <a href="javascript:;" onclick="if(confirm('Are You Sure?')) $('.form-{{$item->id}}').submit()" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>

                            <form class="form-{{$item->id}}" action="{{route('post.permanent-delete', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>

                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                  <div>
                    {{$posts->links()}}
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
