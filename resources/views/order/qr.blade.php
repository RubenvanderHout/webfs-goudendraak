@extends('layout.app')
@section('content')
<div class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Thank you for your order!</h1>
        <div class="mb-4">
            {!! $qrCode !!}
        </div>
        <p class="text-sm text-gray-600">Please scan this QR code to view your order details.</p>
    </div>
</div>
@endsection