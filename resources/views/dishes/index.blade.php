<table>
    @foreach($dishes as $dish)
    <tr><td>{{$dish->name}}</td><td>{{$dish->price}}</td></tr>
    @endforeach
</table>