<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Detalle del carrito</h2>

    <ul class="space-y-2">
        @forelse ($cartProducts as $item)
            <li class="flex justify-between items-center border-b pb-2">
                <div class="flex items-center space-x-4">
                    @if($item['image'])
                        <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                    @endif
                    <span class="font-semibold">{{ $item['name'] }}</span>
                </div>
                <div>
                    <span class="text-sm">Cantidad: {{ $item['cantidad'] }}</span>
                    <span class="ml-4 font-bold">${{ number_format($item['price'], 2) }}</span>
                </div>
            </li>
        @empty
            <li>No hay productos en el carrito.</li>
        @endforelse
    </ul>

    @if(count($cartProducts) > 0)
        <div class="mt-6 text-lg font-semibold">
            Total: ${{ number_format(collect($cartProducts)->sum(fn($i) => $i['price'] * $i['cantidad']), 2) }}
        </div>
    @endif
</x-filament::page>

