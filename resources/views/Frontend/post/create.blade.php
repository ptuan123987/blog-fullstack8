@extends('Frontend.layouts.base')
@section('title', 'About')

@section('body')
    <section class="about-us" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                                @csrf
                                <div class="position-relative row form-group">
                                    <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                    <div class="col-md-9 col-xl-8 d-flex flex-lg-column">
                                        <img src="Dashboard/assets/images/blog/default-blog.jpeg"
                                            alt="Generic placeholder image" class="img-fluid"
                                            style="width: 300px; height: 180px; object-fit: fill;" name="image"
                                            id="Image" />

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9 col-xl-8">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <label class="label">
                                                <input type="file" onchange="Img(this)" value="{{ old('image') }}"
                                                    name="image" accept="image/x-png,image/gif,image/jpeg" />
                                                <span>Chọn hình ảnh</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="product_category_id" class="col-md-3 text-md-right col-form-label">Danh
                                        mục</label>
                                    <div class="col-md-9 col-xl-8">
                                        <select name="category_id" id="category_id" class="form-control"
                                            value="{{ old('category_id') }}">
                                            <option value="">-- Danh mục --</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"{{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="title" class="col-md-3 text-md-right col-form-label">Tiêu đề</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="title" id="title" placeholder="Title" type="text"
                                            class="form-control" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="content" class="col-md-3 text-md-right col-form-label">Content</label>
                                    <div class="col-md-9 col-xl-8">
                                        <textarea name="content" id="content" placeholder="Content" type="text" class="form-control"
                                            value="{{ old('content') }}"></textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="price" class="col-md-3 text-md-right col-form-label">Tác giả</label>
                                    <div class="col-md-9 col-xl-8">
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="">-- Tác giả --</option>
                                            @foreach ($superUsers as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="{{ route('posts.index') }}" class="border-0 btn btn-outline-danger mr-1">
                                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                                <i class="fa fa-times fa-w-20"></i>
                                            </span>
                                            <span>Cancel</span>
                                        </a>

                                        <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                            <span class="btn-icon-wrapper pr-2 opacity-8">
                                                <i class="fa fa-download fa-w-20"></i>
                                            </span>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
