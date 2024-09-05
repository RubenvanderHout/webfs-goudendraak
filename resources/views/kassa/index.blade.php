@extends('layout.header')
@section('content')
<title>GoodPay Kassa</title>

<body>
    @auth
    @include('kassa.main');
    @endauth
    @guest
    @include('kassa.login');
    @endguest
</body>

</html>
@endsection