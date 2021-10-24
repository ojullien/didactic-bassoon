<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="max-w-sm rounded overflow-hidden shadow-lg">

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ __('Identifiant') }}</div>
                <p class="text-gray-700 text-base">
                    {{ $product->id }}
                </p>
            </div>

            <form method="POST" action="{{ route('products.update', [ 'department_id' => $department->id, 'product' => $product->id]) }}">
                @csrf
                @method('PUT')
                <div class="px-6 py-4">
                    <x-jet-label for="departments" value="{{ __('Department') }}" />
                    <select wire:model.lazy="departments" name="departments" id="departments" class="form-control" required>
                        @foreach($departments as $dept)
                        @if ($dept->id==$department->id)
                        <option value="{{ $dept->id }}" selected wire:key="{{$dept->id}}">
                            {{ $dept->label }} ({{$department->id }})
                        </option>
                        @else
                        <option value="{{ $dept->id }}" wire:key="{{$dept->id}}">
                            {{ $dept->label }} ({{$department->id }})
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="px-6 py-4">
                    <x-jet-label for="label" value="{{ __('Label') }}" />
                    <x-jet-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('label', $product->label)" required />
                </div>

                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ __('Json') }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $product->json }}
                    </p>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
            </form>

        </div>

    </div>
</x-app-layout>