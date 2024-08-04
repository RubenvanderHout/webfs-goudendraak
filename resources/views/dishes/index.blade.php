<script src="https://cdn.tailwindcss.com"></script>

<a href="/dishes/create">Create a dish</a>
<table class="table:auto">
    @foreach($dishes as $dish)
    <tr><td>{{$dish->name}}</td><td>{{$dish->price}}</td><td><a href="/dishes/{{$dish->id}}">Edit</a></td></tr>
    @endforeach
</table>
