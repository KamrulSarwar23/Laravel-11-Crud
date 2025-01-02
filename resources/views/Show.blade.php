@extends('master')

@section('content')

<div class="row py-5 px-4">
    <div class="col-md-8 mx-auto"> <!-- Profile widget -->
        <a href="{{route('posts.index')}}" class="btn mb-3" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head d-flex">
                    <div class="profile mr-3">
                        <img
                            src="{{asset($post->file)}}"
                            alt="..." width="130" class="rounded mb-2 img-thumbnail">
                    </div>

                </div>
            </div>

            <div class="px-4 py-3">
                <div class="p-4 rounded shadow-sm bg-light">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 250px;">First Name</td>
                                <td>{{$post->first_name}}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Last Name</td>
                                <td>{{$post->last_name}}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Email</td>
                                <td>{{$post->email}}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Phone</td>
                                <td>{{$post->phone}}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Account Number</td>
                                <td>{{$post->bank_account_number}}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">About</td>
                                <td>{{$post->about}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
