<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-bold text-xl text-center">
                        {{ __('Garage Items') }}  <i class="fas fa-solid fas fa-warehouse"></i><br>
                    </div>
                    <div class="flex justify-center">
                        <div class="me-3 border-s-orange-100 bg-slate-500 p-5 hover:shadow-xl hover:text-white">
                            <a href="{{ route('bike.index') }}" class="text-xl btn btn-secondary"><i class="fas fa-solid fas fa-motorcycle"></i> Bikes</a>
                        </div>
                        <div class="me-3 border-s-orange-100 bg-slate-500 p-5 hover:shadow-xl hover:text-white">
                        <a href="{{ route('car.index') }}" class="text-xl btn btn-secondary"><i class="fas fa-solid fas fa-car"></i> Cars</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
