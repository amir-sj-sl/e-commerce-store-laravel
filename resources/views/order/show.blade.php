<x-layout>
    @foreach ($orders as $order)
    {{$order->id}}
        @foreach ($order->orderItems as $orderItems)
            {{$orderItems->product->name}}
            {{$orderItems->product->price}}
        @endforeach
    @endforeach
</x-layout>