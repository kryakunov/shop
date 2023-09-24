
@extends('layout')
@section('content')
<br>
<div class="container">
    <h1 align="center">Список товаров</h1><br>
    <div class="row">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
<table class="table">
  <thead>
    <tr>
      <th scope="col" width="20%">Фото</th>
      <th scope="col">Название</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
      <th scope="col">В наличии</th>
      <th scope="col">Категория</th>
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
    </tr>
  @endforeach
</tbody>
</table>


</div>
</div>

@endsection