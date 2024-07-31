<!DOCTYPE html>
<html>
<head>
    <title>Food Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .category {
            margin-bottom: 20px;
        }
        .category h2 {
            margin-bottom: 10px;
        }
        .dish {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Food Menu</h1>

    @foreach($categories as $category)
        <div class="category">
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>

            @foreach($category->dishes as $dish)
                <div class="dish">
                    <h3>{{ $dish->name }}</h3>
                    <p>{{ $dish->description }}</p>
                    <p>Price: ${{ $dish->price }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</body>
</html>
