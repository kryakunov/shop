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
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        Название: <input type="text" name="title" value="{{ old('title') }}" class="form-control"><br>
        Описание:<br><textarea class="output-panel form-control"  name="description" rows="3" placeholder=""></textarea><br>
        Цена: <input type="text" name="price" value="{{ old('price') }}" class="form-control"><br>
        
        Выберите категорию:
        <select name="category_id" width="form-control">
        <option value="">- выбрать -</option>
        @forelse($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @empty

        @endforelse
        </select><br><br>
        <label><input type="checkbox" class='checkbox' name="in_stock" value="1" ></input> В наличии</label><br><br>
        Фото: <input type="file" name="image" value="">
            <br><br>
            <button type="submit" class='btn btn-warning'>Создать</button>
        </form>

        </div>
    </div>
</div>
@endsection