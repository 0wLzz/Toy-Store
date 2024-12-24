@extends('admin.admin')

@section('content')
    <div class="d-flex justify-content-center align-items-start flex-column gap-4 table-responsive">
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{route('add_toy')}}">
            + Add Toy
        </a>

        <div class="d-flex justify-content-center align-items-center gap-4">
            <a class="btn btn-outline-dark" href="{{route('admin_table')}}">All Categories</a>
            @foreach ($categories as $category)
                <a class="btn btn-outline-dark" href="{{ route('category_toy', $category) }}"> {{ $category->name }} </a>
            @endforeach
        </div>

        <h3>Toy List</h3>
        <table class="table table-hover table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($toys as $toy)
                    <tr style="vertical-align: middle">
                        <th scope="row">{{$num++}}</th>
                        <td class="text-center">
                            <img src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=Toy' }}" alt="food-image">
                        </td>
                        <td>
                            {{$toy->name}}
                        </td>
                        <td>{{$toy->category->name}}</td>
                        <td>{{"$" . number_format($toy->price, 0, ',', '.')}}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <a class="btn btn-outline-primary" href="{{route('edit_toy', $toy)}}">
                                    <i class="bi bi-pen"></i>
                                </a>

                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Modal{{$num}}">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <div class="modal fade" id="Modal{{$num}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">Apakah {{$toy->name}} ingin dihapus?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer justify-content-center">
                                          <form action="{{ route('delete_toy', $toy) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Iya
                                                </button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


