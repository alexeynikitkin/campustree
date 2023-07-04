@extends('layouts.admin_layout')

@section('title', 'Edit Leaf')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Leaf - {{ $post->title }}</h1>
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
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="feature_image">Leaf Banner</label>
                                    <img src="/{{ $post->banner }}" alt="" class="img-uploaded" width="100px" height="100px" style="display: block; margin-bottom: 10px"/>
                                    <input class="form-control"  type="text" id="feature_image10" name="banner" value="" readonly>
                                    <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="feature_image10">Select Image</a>
                                </div>
                                <div class="form-group">
                                    <label for="title">Leaf Title - {{ $post->title }}</label>
                                    <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Leaf Title" required>
                                </div>
                                <div class="form-group">
                                    <label>Select Branch</label>
                                    <select name="cat_id" class="custom-select" required>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" @if($cat->id == $post->cat_id) selected @endif>{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="editor form-control">{{ $post->text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="input-container input-container-group input-container-datepicker __top __right">
                                        <input  type="text" value="{{ $post->event_date }}" name="event_date"  class="input" placeholder="Date" required>
                                        <span class="input-container-icon __16 __right">
													<svg class="svg svg__16">
														<use xlink:href="/campustree/images/sprite/sprite.svg#calendar-xs"></use>
													</svg>
												</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="input-container input-container-group">
                                        <input type="text" value="{{ $post->event_time }}" name="event_time" class="input" placeholder="Time" required>
                                        <span class="input-container-icon __16 __right">
													<svg class="svg svg__16">
														<use xlink:href="/campustree/images/sprite/sprite.svg#clock"></use>
													</svg>
												</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="input-container input-container-group">
                                        <input type="text" class="input" value="{{ $post->location }}" name="location" placeholder="Location" required>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="input-container input-container-group">
                                        <input type="text" name="map" class="input" value="{{ $post->map }}" placeholder="Google map link">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Leaf Image</label>
                                    <input class="form-control"  type="text" id="feature_image" name="img" value="{{ $post->img }}" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image"><img src="{{ asset($post->img) }}" alt="" class="img-uploaded" width="100px" height="100px" style="display: block; margin-bottom: 10px"/></a>
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
