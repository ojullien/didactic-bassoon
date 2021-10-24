<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-center font-bold">
                            <th class="border px-6 py-4">id</th>
                            <th class="border px-6 py-4">label</th>
                            <th class="border px-6 py-4">products count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td class="border px-6 py-4">{{ $department->id }}</td>
                            <td class="border px-6 py-4">{{ $department->label }}</td>
                            <td class="border px-6 py-4">{{ $department->count }}</td>
                            <td class="border px-6 py-4"><a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('products.index', $department->id ) }}">Show products</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>