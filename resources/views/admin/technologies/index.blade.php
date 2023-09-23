<x-app-layout>
    @section('contents')

    {{-- *************************************************************** --}}



    {{-- *************************************************************** --}}

    

        <div class="dark:text-gray-100">

            <h2 class="mt-4 mb-4 text-2xl font-semibold leadi text-gray-100">Technologies</h2>

            <button type="button" class="my-4 px-8 py-3 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-500 hover:text-white">
                <a href="{{ route("admin.technologies.create") }}">Create a new Technology</a>
            </button>
            

            <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                <thead class="dark:bg-gray-700">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Id</th>
                        <th scope="col"><span class="flex justify-start px-8" >Actions</span></th>
                    </tr>
                </thead>
                <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                    @foreach ($technologies as $technology)
                        <tr>
                            <th scope="row">{{ $technology->name }}</th>
                            <th scope="row">{{ $technology->id }}</th>
                            
                            <td class="flex py-1 w-100 justify-end px-4">
                            <a class="ml-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 dark:hover:bg-blue-700" href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">View</a>
                            <a class="ml-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 dark:hover:bg-blue-700" href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}">Edit</a>                                <!-- <form
                                        action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}"
                                        method="post"
                                        class="d-inline-block mx-1"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                            Delete
                                        </button>
                                </form> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    @endsection
</x-app-layout>

