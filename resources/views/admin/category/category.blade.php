@extends('admin.layout.admin')
@section('content')
    @if (session('success_message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success_message') }}",
                showConfirmButton: false,
                timer: 3000,
                toast: true
            })
        </script>
    @endif
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-8">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">
                                @if ($isNewCategory)
                                    New Category
                                @else
                                    Edit Category
                                @endif
                            </li>
                        </ol>
                        <h1 class="content-title">
                            @if ($isNewCategory)
                                New Category
                            @else
                                Edit Category
                            @endif
                        </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($isNewCategory == 'new')
                    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @method('POST')
                    @else
                        @if ($ismainCategory)
                            <form method="POST" action="{{ route('category.update', $category->id) }}"
                                enctype="multipart/form-data" class="">
                                @method('PUT')
                            @else
                                <form method="POST" action="{{ route('subCategory.update', $subCategory->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                        @endif
                @endif

                @csrf
                <!-- SELECT2 EXAMPLE -->
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Basic Information</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            @if ($isNewCategory == 'new')
                                                <input type="text" name="category_name" class="form-control">
                                            @elseif($isNewCategory == 'edit')
                                                @if ($ismainCategory)
                                                    <input type="text" name="category_name" class="form-control"
                                                        value="{{ $category['name'] }}">
                                                @else
                                                    <input type="text" name="category_name" class="form-control"
                                                        value="{{ $subCategory['name'] }}">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-outline card-info">
                                                        <div class="card-body">
                                                            <textarea id="summernote" name="description">
                                                                @if ($isNewCategory == 'new')
                                                                    <input type="text" name="category_name" class="form-control">
                                                                @elseif($isNewCategory == 'edit')
                                                                    @if ($ismainCategory)
                                                                        {{ $category['description'] }}
                                                                    @else
                                                                        {{ $subCategory['description'] }}
                                                                    @endif
                                                                @endif
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Parent Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="my-select">My Select</label>
                                            <select id="my-select" name="insert_option" class="form-control">
                                                @if ($isNewCategory == 'new')
                                                    <option value="">None</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category['id'] }}" name="parent_category">
                                                            {{ $category['name'] }}</option>
                                                    @endforeach
                                                @elseif($isNewCategory == 'edit')
                                                    @if ($ismainCategory)
                                                        <option value="" selected disabled>This is main Category
                                                        </option>
                                                    @else
                                                        <option value="{{ $category['id'] }}" name="parent_category"
                                                            {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <div class="col-12 container ">
                        <div class="row justify-content-end">
                            <a href="/admin/categories" class="btn btn-secondary col-1 mx-2">Cancel</a>

                            <input type="submit" onclick="saveSuccess()" value="Save" class="btn btn-warning col-1 mx-2">
                        </div>
                    </div>

                </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
