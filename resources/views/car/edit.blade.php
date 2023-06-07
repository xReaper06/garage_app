<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-bold text-xl">
                        <form method="post" action="{{ route('car.update',$car->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container text-center p-3 justify-center">
                            <div class="form-group mb-3">
                                <label for="platenumber">Plate Number</label>
                                <input class="" type="text" name="platenumber" placeholder="patter: XX 1234(two letters then space and 4 numbers)" value="{{ $car->platenumber }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="color">Color</label>
                                <input class="" type="text" name="color" value="{{ $car->color }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="yearbought">Date of Purchase</label>
                                <input class="" type="date" name="yearbought" id="yearbought" value="{{ $car->yearbought }}">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary text-black">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="flex">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
