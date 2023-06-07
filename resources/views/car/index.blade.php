<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars') }}
        </h2>
        <div class="flex justify-end">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary text-sm"><i class="fas fa-solid fas fa-arrow-left"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-bold text-xl">
                        <i class="fas fa-solid fas fa-car"></i>{{ __("My Car's Collection") }}<br>
                        <div class="flex justify-end">
                            <button class="btn btn-danger">
                                <a href="{{ route('car.create') }}"><i class="fas fa-solid fas fa-plus"></i><span class="pe-2"></span><i class="fas fa-solid fas fa-car"></i></a>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-wrap bg-slate-900">
                        @foreach($cars as $car)
                    <a href="{{ route('car.show',$car->id) }}">
                        <div class="w-64 rounded-lg hover:shadow-xl shadow-lg p-4 mx-2 my-2">
                            <img src="{{ asset('storage/'.$car->image) }}" alt="Image" style="width: 250px; height: 250px;">
                            <div class="p-4">
                                <p>Plate Number: {{ $car->platenumber }}</p>
                                <p>Model: {{ $car->model }}</p>
                                <p>Brand: {{ $car->brand }}</p>
                                <p>Color: {{ $car->color }}</p>
                                <p>Date of Purchase: {{ $car->yearbought }}</p>
                            </div>
                        </div>
                    </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
