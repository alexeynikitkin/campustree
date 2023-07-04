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
                                    <label for="email">User phone - {{ $user->phone }}</label>
                                    <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" placeholder="Enter phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Select Faculty</label>
                                    <select name="faculty_id" class="custom-select" required>
                                        @php
                                            $facs = \App\Models\Faculty::all();
                                        @endphp
                                        @foreach($facs as $sex)
                                            <option value="{{ $sex->id }}" @if($sex->id == $user->faculty_id) selected @endif>{{ $sex->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Year</label>
                                    <select name="years_id" class="custom-select" required>
                                        @php
                                            $years = \App\Models\Year::all();
                                        @endphp
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}" @if($year->id == $user->years_id) selected @endif>{{ $year->title }}</option>
                                        @endforeach
                                    </select>
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
                                <div class="form-group">
                                    <label for="email">User socials</label><br>
                                    Instagram: <input type="text" value="{{ $user->instagram }}" name="instagram" class="form-control" placeholder="Enter insta" required>
                                    LinkedIn: <input type="text" value="{{ $user->linkedin }}" name="linkedin" class="form-control" placeholder="Enter linkedin" required>
                                    Facebook: <input type="text" value="{{ $user->facebook }}" name="facebook" class="form-control" placeholder="Enter facebook" required>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">User Image</label>
                                    <input class="form-control"  type="text" id="feature_image" name="user_img" value="{{ $user->user_img }}" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image"><img src="{{ asset($user->user_img) }}" alt="" class="img-uploaded" width="100px" height="100px" style="display: block; margin-bottom: 10px"/></a>
                                </div>
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
