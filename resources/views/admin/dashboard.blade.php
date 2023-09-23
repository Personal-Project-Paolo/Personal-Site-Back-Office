<x-app-layout>
    @section('contents')
        <div class="min-h-screen flex flex-col justify-center items-center  ">
            <h1 class="mt-5 text-7xl text-center dark:text-red-700 font-bold">
                Welcome my Personal Site
            </h1>

            <div>
                <button class="mx-1 my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                    <a class="button mx-1" href="{{ route('admin.projects.index') }}"> Projects List </a>
                </button>

                <button class="my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                    <a class="button mx-1" href="{{ route('admin.types.index') }}"> Types List</a>
                </button>

                <button class="mx-1 my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                    <a class="button mx-1" href="{{ route('admin.technologies.index') }}"> Technologies List</a>
                </button>
            </div>

           
            <div class="mt-2 mb-12 p-4 border-8 border-sky-600 rounded-lg shadow-xl">
                <video autoplay loop muted class="video h-[40rem] border-8 border-red-900">
                    <source src="video/flag.mp4" type="video/mp4">
            
                </video>
            </div>
            
        </div> 
    @endsection
</x-app-layout>
<style>
</style>


