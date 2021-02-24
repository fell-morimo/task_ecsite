@extends('layouts.app')

@section('content')
<label>
<h1>商品詳細</h1>
</label>
@if (!empty($item))
<table>
<tr>
<td width="100">{{ '商品名: ' }}</td>
<td width="300">{{ $item->name }}</td>
</tr>
<tr>
<td>{{ '商品説明: ' }}</td>
<td>{{ $item->content }}</td>
</tr>
<tr>
<td>{{ '価格: ' }}</td>
<td>{{ $item->price . ' 円'}}</td>
</tr>
<tr>
<td>{{ '在庫数: ' }}</td>
<td>{{ $item->quantity . ' 個'}}</td>
</tr>
</table>
<p></p>
@if (0 < $item->quantity)
<form method="post" action="{{ route('cart.add') }}">
{{ csrf_field() }}
<button type="submit">カートに入れる</button>
</form>
@else
<label><p>在庫なし</p>
@endif
<label><p></p>
@if (isLogin() && getUserType() == 'User')
<p><a href="{{ route('item.index')}}">商品一覧へ</a></p>
@elseif (isLogin() && getUserType() == 'Admin')
<p><a href="{{ route('admin.item.index') }}">商品一覧へ</a></p>
<p></p>
<p><a href="{{ route('admin.item.form', ['id' => $item->id]) }}">商品編集へ</a></p>
@endif
@else
<p>その商品は存在しません。</p>
</label>
@endif
@endsection


