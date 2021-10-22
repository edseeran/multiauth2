<x-app-layout>
<div class="row">
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Data') }}
        </h2>   
        <div class="col-md-4">
          <form action="searchStudent" method="get">
          @csrf
              <input type="search" name="search" class="form-control border-gray-300 rounded-md ">
                <x-button type="submit">
                  Search
                </x-button>
              </span>
          </form>
        </div> 
</x-slot>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <x-button class="ml-3">
                    <a href="studentcreate">
                    {{ ('Create new student') }}
                    </a>
                </x-button><br><br>
                @if (Session::has('studentdelete'))
                    <span>{{Session::get('studentdelete')}}</span>
                @endif
                
                @if($message=Session::get('success'))

                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                  <p class="font-bold">{{$message}}</p>
                </div>
              </div>
            </div><br>
                @endif
        <table class="min-w-full divide-y divide-gray-200 border-separate border border-black-100" id="myTable">
          <thead class="bg-gray-50">
            <tr class="bg-gray-200">
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                Id
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                First Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                Last Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-black-500 uppercase tracking-wider">
                Action
              </th>
            </tr>

            @foreach($students as $student)
        <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{++$id}}
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{$student->first_name}}
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{$student->last_name}}
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              <x-button class="mr-1 ">
                    <a href="studentedit/{{$student->id}}">
                    Edit
                    </a>
              </x-button>
              <x-button class="mr-1 ">
                    <a href="studentdelete/{{$student->id}}">
                    Delete
                    </a>
              </x-button>

            
            </form>
              </th>
        </tr>
          @endforeach
          </thead>
          
        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
