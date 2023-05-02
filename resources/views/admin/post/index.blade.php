@extends('layouts.admin_layout')

@section('title', 'All Leaves')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Leaves</h1>
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
                        <div class="card-body">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 20%">
                                        ID
                                    </th>
                                    <th style="width: 20%">
                                        Leaf Name
                                    </th>
                                    <th style="width: 20%">
                                        Leaf Branch
                                    </th>
                                    <th style="width: 20%">
                                        Post Leaf
                                    </th>
                                    <th style="width: 20%">

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            {{$post->id}}
                                        </td>
                                        <td>
                                            <a href="{{ route('showLeaf', $post->id) }}" target="_blank">
                                                {{$post->title}}
                                            </a>
                                            <br/>
                                            <small>
                                                {{$post->created_at}}
                                            </small>
                                        </td>
                                        <td>
                                            {{ $post->category->title }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($post->img) }}" alt="{{ $post->title }}" width="100px" height="100px" />
                                        </td>
                                        <td class="project-actions text-right d-flex">
                                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
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
        </div><!-- /.container-fluid -->
    </section>
@endsection
