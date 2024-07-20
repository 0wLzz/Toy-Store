@extends('admin.admin')

@section('content')
        <h1 class="mt-4 mb-4" style="margin-top: 200px; margin-left: 100px">Add Product</h1>
        <div class="card mb-4" style="margin: 0px 150px 100px 150px;">
            <form  action="{{ route('update_toy', $toy) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary">Save</Button>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <img id="previewImage" src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/300/orange/white?text=Toy' }}" style="max-height: 400px; max-height: 400px;">
                    </div>

                    <div class="mb-4">
                        <h4>Gambar</h4>
                        <input id="imageInput" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" type="file" name="image" >
                        @error('image')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4 for="" class="form-h4">Toy Name</h4>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ $toy->name }} ">
                        @error('name')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <h4>Category</h4>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->name == $toy->category->name ? 'selected': ''}}> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h4>Stock</h4>
                    <div class=" input-group">
                        <input type="text" class="form-control" name="stock" {{ $errors->has('stock') ? ' border-danger' : '' }} value="{{$toy->stock}}">
                        <span class="input-group-text">pcs</span>
                    </div>

                    <h4>Price</h4>
                    <div class=" input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control {{ $errors->has('price') ? ' border-danger' : '' }}" name="price" value="{{$toy->price}}">
                    </div>

                    <div class="mb-4">
                        @error('price')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h4>Deskripsi</h4>

                        <textarea id="description" name="description" style="width: 100%; padding: 10px">{{$toy->description}} </textarea>
                        @error('description')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                </div>
            </form>
        </div>
@endsection
