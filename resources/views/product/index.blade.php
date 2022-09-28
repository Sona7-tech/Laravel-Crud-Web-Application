@extends('product.layout');

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($product as $products)
    <tr>
        <td>{{ $products->id }}</td>
        <td>{{ $products->name }}</td>
        <td>{{ $products->detail }}</td>
        <td>
            <form action="{{ route('product.destroy',$products->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('product.show',$products->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('product.edit',$products->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $product->links() }}
@endsection