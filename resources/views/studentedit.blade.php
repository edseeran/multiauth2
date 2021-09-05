<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="col-span-6 sm:col-span-3">
                    @if (Session::has('studentdata'))
                    <span>{{Session::get('studentdata')}}</span>
                    @endif
                    <form action="{{ route('dashboard.updateStudent') }}" method="POST">
                        @csrf
                    <input type="hidden" name="id" value="{{$students->id}}">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" name="first_name" id="first_name" value="{{$students->first_name}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"><br>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last_name" id="last_name" value="{{$students->last_name}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"><br>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                    </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
