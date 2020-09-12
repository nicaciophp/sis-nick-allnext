<div class="order">
    <label for="">Product:</label>
    <select id="product_id">
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
    </select>
    <label for="">Amount:</label>
    <input type="text" value="
        " id="amount">
    <input type="button" value="Insert" onclick="insertOrder();">
</div>

<div>
    <label for="">Costumer:</label>
    <select name="costumer_id" id="">
        @foreach($costumers as $costumer)
            <option value="{{$costumer->id}}">{{$costumer->name}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="">Status:</label>
    <select name="order_status" id="">
        <option value="0">Pending</option>
        <option value="1">Finished</option>
    </select>
</div>
<input type="submit" value="Submit">
