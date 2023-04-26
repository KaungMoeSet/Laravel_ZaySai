@extends('admin.layout.admin')

@section('content')
    <section class="content-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ">
                            <a href="{{url('category/create')}}" class="btn btn-primary">New Category</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Parent Categories</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-head-fixed text-nowrap table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $category['name'] }}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{url('category/'.$category->id.'/edit')}}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{url('category/'.$category->id)}}" method="POST"> 
                                                        @csrf 
                                                        @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-2"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub Categories</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="subCateg" class="table table-head-fixed text-nowrap table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Parent Category</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($subCategories as $subCategory)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $subCategory['name'] }}</td>
                                                <td>{{ $subCategory->category->name }}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{url('subCategory/'.$subCategory->id.'/edit')}}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{url('subCategory/'.$subCategory->id)}}" method="POST"> 
                                                        @csrf 
                                                        @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-2"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>
@endsection
