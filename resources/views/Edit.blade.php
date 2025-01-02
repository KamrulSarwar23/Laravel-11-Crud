@extends('master')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Post Edit</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('posts.index') }}" class="btn" style="background-color: #4643d3; color: white;"><i
                                    class="fas fa-chevron-left"></i> Back</a>
                        </div>

                    </div>

                </div>


                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <img class="mb-2" width="150px" height="200px" src="{{asset($post->file)}}" alt=""> <br>
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="file" value="">

                                    @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$post->first_name}}">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$post->last_name}}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$post->email}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$post->phone}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">Bank Account Number</label>
                                    <input type="number" class="form-control" name="bank_account_number" value="{{$post->bank_account_number}}">
                                    @error('bank_account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">About</label>

                                    <textarea class="form-control" name="about" id="" cols="30" rows="10">{{$post->about}}</textarea>
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
