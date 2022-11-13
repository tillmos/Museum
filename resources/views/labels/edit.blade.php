
<x-guest-layout>
    <x-slot name="title">
        Edit label
    </x-slot>
<div class="container mx-auto p-3 overflow-hidden min-h-screen">
    <div class="mb-5">
        <h1 class="font-semibold text-3xl mb-4">Edit label</h1>
        
        <a href="/" class="text-blue-400 hover:text-blue-600 hover:underline"><i class="fas fa-long-arrow-alt-left"></i> Back to the main page</a>
    </div>

    <form
        x-data="{ name: '{{ old('name', $label->name)}}', color: '{{ old('bg-color', $label->color)}}', displayed: '{{ old('displayed', $label->displayed)}}'}"
        x-init="() => {
            new Picker({
                color: color,
                popup: 'bottom',
                parent: $refs.colorPicker,
                onDone: (color) => color = color.hex
            });
            
        }"
        action="{{route('labels.update',$label)}}"
        method="POST">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-4 lg:col-span-2 grid grid-cols-2 gap-3">
                <div class="col-span-2">
                    <label for="name" class="block font-medium text-gray-700">Label name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300" x-model="name">
                        @error('name')
                        <div class="font-medium text-red-500" style="color:red">{{$message}}</div>
                        @enderror
                    </div>
                <div class="col-span-2 lg:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Background color</label>
                    <div x-ref="colorPicker" id="color" name = "color" class="mt-1 h-8 w-full border border-black" :style="`background-color: ${color};`"></div>
                    <p x-text="color"></p>
                </div>
                <div class="col-span-2 lg:col-span-1">
                    <label for="displayed" class="block text-sm font-medium text-gray-700">Displayed</label>
                    <input type="radio" id="displayed" name ="displayed">

                </div>
            </div>
            <div class="col-span-4 lg:col-span-2">
                <div x-show="name.length > 0">
                    <label class="block font-medium text-gray-700 mb-1">preview</label>
                    <span x-text="name" :style="`background-color: ${color}; `" class="py-0.5 px-1.5 font-semibold"></span>
                </div>
            </div>
        </div>

        <input type="hidden" id="bg-color" name="bg-color" x-model="color" />


        <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold px-2 py-1 text-xl">Submit</button>
    </form>
</div>
</x-guest-layout>