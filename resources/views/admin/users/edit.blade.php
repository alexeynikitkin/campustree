@extends('layouts.admin_layout')

@section('title', 'Edit User')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User - {{ $user->name }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">User Name - {{ $user->name }}</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Leaf Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">User Name - {{ $user->email }}</label>
                                    <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Leaf Title" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="user_bio">{{ $user->user_bio }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Select Sex</label>
                                    <select name="sex_id" class="custom-select" required>
                                        @php
                                        $sexes = \App\Models\Sex::all();
                                        @endphp
                                        @foreach($sexes as $sex)
                                            <option value="{{ $sex->id }}" @if($sex->id == $user->sex_id) selected @endif>{{ $sex->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="feature_image">Leaf Image</label>--}}
{{--                                    <input class="form-control"  type="text" id="feature_image" name="img" value="{{ $post->img }}" readonly>--}}
{{--                                    <a href="" class="popup_selector" data-inputid="feature_image"><img src="{{ asset($post->img) }}" alt="" class="img-uploaded" width="100px" height="100px" style="display: block; margin-bottom: 10px"/></a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit Leaf</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
