<div>
    <label for="">Name Product:</label>
    <input type="text" name="name" value="
    {{isset($product) ? $product->name : false}}
        ">
</div>
<div>
    <label for="">Description:</label>
    <input type="text" name="description" value="
    {{isset($product) ? $product->description : false}}
        ">
</div>
<div>
    <label for="">Amount:</label>
    <input type="text" name="amount" value="
    {{isset($product) ? $product->amount : false}}
        ">
</div>
<div>
    <label for="">Value:</label>
    <input type="text" name="value" value="
        {{isset($product) ? $product->value : false}}
        ">
</div>
<div>
    <label for="">Category:</label>
    <select name="category_id" id="">
        @foreach($categories as $cats)
            <option value="{{$cats->id}}" selected="{{isset($product) ? $product->category->id == $cats->id : false}}">{{$cats->name}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="">Photo:</label>
    <input type="file" name="photo">
</div>
<input type="submit" value="Enviar">
