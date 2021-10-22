<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Professor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-button class="ml-6 mt-3">
                    <a href="profcreate">
                    {{ __('Create new Course') }}
                    </a>
                </x-button><br>
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a Professor!
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
