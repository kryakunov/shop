
@extends('layout')
@section('content')
<br>
<div class="container">
    <h1 align="center">Админ-панель</h1><br>
    <div class="row">

    <div class="row">
      <div class="col-md-2">
        <form action="{{ route('products.create') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success">Добавить товар</button>
        </form>
      </div>
      <div class="col-md-2">
        <form action="{{ route('category.create') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success">Добавить категорию</button>
        </form>
      </div>
    </div>
    
<br><br><br>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="20%">Фото</th>
      <th scope="col">Название</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
      <th scope="col">В наличии</th>
      <th scope="col">Категория</th>
      <th scope="col" width="10%"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <td> <img src="{{  $product->getImage() }}" alt="" width="160" class="img-thumbnail"></td>
      <td>{{ $product->title }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ ($product->in_stock) ? 'Да' : 'Нет'; }}</td>
      <td>{{ ($product->category_id) ? $product->category->title : 'Без категории' }}</td>
      <td>    
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Вы уверены?')" class='btn btn-danger btn-sm mybutton'>Удалить</button>
            </form><br>


            <a href="{{route('products.edit', $product->id)}}" class='btn btn-warning btn-sm mybutton'>Редактировать</a> 
      </td>
    </tr>
  @endforeach
</tbody>
</table>


</div>
</div>

@endsection