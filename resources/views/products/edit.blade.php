@extends('layout')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

                
        <a href="{{ route('admin.index') }}" class="btn btn-info">Назад</a><br><br>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
         @endif


        <br>
        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('put')
        Название: <input type="text" name="title" value="{{ $product->title }}" class="form-control"><br>
        Описание:<br><textarea class="output-panel form-control" name="description" rows="3" placeholder="">{{ $product->description }}</textarea><br>
        Цена: <input type="text" name="price" value="{{ $product->price }}" class="form-control"><br>
        <label><input type="checkbox" class='checkbox' name="in_stock" value="1" {{ ($product->in_stock) ? 'checked' : ''; }}></input> В наличии</label><br><br>
        
        <select name="category_id" width="form-control">
        <option value="">- выбрать -</option>
        @forelse($categories as $category)
            <option value="{{ $category->id }}" 
            @if(isset($product->category->id))
                @if($product->category->id == $category->id) selected 
                @endif
            @endif 
            >{{ $category->title }}</option>
        @empty
        @endforelse
        </select><br><br>

        <img src="{{  $product->getImage() }}" alt="" width="160" class="img-thumbnail">

        Фото: <input type="file" name="image" value="">
            <br><br>
            <button type="submit" class='btn btn-warning'>Сохранить</button>
        </form>

        </div>
    </div>
</div>
@endsection