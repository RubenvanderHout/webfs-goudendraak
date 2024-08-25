<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #2f5586;
            background-size:cover;
            background-position: center top;
            color: white;
            font-size: 14px;
        }

        /* Container */
        .container {
            width: 100%;
            /* max-width: 900px; */
            margin: 0 auto;
            padding: 40px;
        }

        /* Title */
        .menu-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        /* Grid Layout */
        .menu-columns {
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 50%;
        }

        /* Category Heading */
        .category-title {
            font-size: 20px;
            font-weight: bold;
            border-bottom: 2px solid black;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }

        /* Menu Item */
        .menu-item {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
        }

        /* Price */
        .price {
            font-weight: bold;
        }

        /* List Reset */
        ul {
            list-style: none;
            padding-left: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Menu Title -->
    <div class="menu-title">The Golden Dragon Menu</div>

    <!-- Menu Columns -->
    <div class="menu-columns">
        
        <!-- First Column -->
        <div class="column">
            <!-- Loop through categories and dishes -->
             @foreach($categories as $category)
            <div class="category">
                <div class="category-title">{{$category->name}}</div>
                <ul>
                    @foreach($category->dishes as $dish)
                    <li class="menu-item">
                        <span>
                            {{$dish->name}}
                        </span>
                        <span class="price">€{{ number_format($dish->price, 2) }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>

</body>
</html>