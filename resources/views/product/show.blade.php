<h1>{{$product->name}}</h1>
<div>
    <img src="{{Storage::url($product->photo)}}" alt="">
</div>
<div>
    <a href="{{ URL::previous() }}">Back</a>
</div>
