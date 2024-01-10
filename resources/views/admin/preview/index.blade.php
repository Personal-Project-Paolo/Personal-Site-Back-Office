<x-app-layout>
    @section('contents')
    <div class="mx-auto mt-12">
        <h1 class="mt-4 mb-4 text-4xl font-semibold leadi text-white">{{$project->title}}</h1>
        <img src="/storage/{{ $project->image }}" alt="Preview">
        <div class="flex justify-center">
            <button class="my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                <a class="button mx-1" href="{{ route('admin.projects.index') }}">Return to list</a>
            </button>
        </div>
        
    </div>
    @endsection
</x-app-layout>