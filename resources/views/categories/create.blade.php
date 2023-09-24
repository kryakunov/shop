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


        <h3>Создать категорию</h3><br>

        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        Создать подкатегорию для
       
        <select name="parent_id" width="form-control">
        <option value="">- выбрать -</option>
        @forelse($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @empty
        @endforelse
        </select>
        <br><br>
        Название: <input type="text" name="title" value="{{ old('title') }}" class="form-control"><br>

       
        <button type="submit" class='btn btn-warning'>Создать</button>
        </form>

        <hr>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">Имя категории</th>
            <th scope="col" width="10%">Действия</th>
            </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
        <tr>
            <th>{{ $category->title }}</th>
            <th>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Вы уверены?')" class='btn btn-danger btn-sm mybutton'>Удалить</button>
                </form>
            </th>
        </tr>
        @empty

        @endforelse
        </table>
        </div>
    </div>
</div>
@endsection