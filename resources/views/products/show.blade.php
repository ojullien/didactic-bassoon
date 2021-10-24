<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="max-w-sm rounded overflow-hidden shadow-lg">

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('Department') }}</div>
                <p class="text-gray-700 text-base">
                    {{ $department->label }} ({{$department->id }})
                </p>
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('Identifiant') }}</div>
                <p class="text-gray-700 text-base">
                    {{ $product->id }}
                </p>
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('Label') }}</div>
                <p class="text-gray-700 text-base">
                    {{ $product->label }}
                </p>
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('Json') }}</div>
                <p class="text-gray-700 text-base">
                    {{ $product->json }}
                </p>
            </div>

            <form action="{{ route('products.destroy', [ 'department_id' => $department->id, 'product' => $product->id] ) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition" type="submit">Delete</button>
            </form>

        </div>

    </div>
</x-app-layout>