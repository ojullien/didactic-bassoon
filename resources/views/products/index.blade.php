<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of products for ') }} {{ $department->label }} ({{ $department->id }})
        </h2>
        @if(Session::has('info'))
        <div class="">
            <p>{{Session::get('info')}}</p>
        </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-center font-bold">
                            <th class="border px-6 py-4">id</th>
                            <th class="border px-6 py-4">label</th>
                            <th class="border px-6 py-4">json</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="border px-6 py-4">{{ $product->id }}</td>
                            <td class="border px-6 py-4">{{ $product->label }}</td>
                            <td class="border px-6 py-4">{{ $product->json }}</td>
                            <td class="border px-6 py-4">
                                <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('products.show', [ 'department_id' => $department->id, 'product' => $product->id] ) }}">Show</a>
                                <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('products.edit', [ 'department_id' => $department->id, 'product' => $product->id] ) }}">Modify</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer>
                {{ $products->links() }}
            </footer>
        </div>
    </div>
</x-app-layout>