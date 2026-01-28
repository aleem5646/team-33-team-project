@include('data.products')

<div class="max-w-[900px] mx-auto p-5">
    <h1 class="text-3xl font-bold mb-6">My Wishlist</h1>

    @if(empty($wishlist))
        <p>Your wishlist is empty.</p>
    @else
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($wishlist as $id)
                    @php $item = $products[$id]; @endphp

                    <tr class="border-b">
                        <td class="p-4 flex items-center gap-4">
                            <img src="{{ asset('imgs/' . $item['image']) }}" class="w-16 h-16 rounded">
                            {{ $item['name'] }}
                        </td>

                        <td class="p-4">£{{ number_format($item['price'], 2) }}</td>

                        <td class="p-4">
                            <form action="{{ route('wishlist.remove', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
