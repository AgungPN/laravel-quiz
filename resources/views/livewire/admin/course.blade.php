<div>

    <div class="mx-14 mt-2">
    <h1 class="text-4xl font-bold ">{{ __("Course") }}</h1>
    <div class="flex">
       <!-- component -->
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-5 px-7">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-5 px-7 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">{{ __("Course") }}</th>
                                    <th scope="col" class="py-5 px-7 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">{{ __("Action") }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                               @forelse ($courses as $c)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td scope="col" class="py-5 px-7">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="py-4 px-7 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $c->course }}</td>
                                    <td class="py-4 px-7 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="#" class="text-green-600 dark:text-green-500 hover:underline font-bold">{{ __("Edit") }}</a>
                                        <a href="#" class="text-red-600 dark:text-red-500 hover:underline ml-2 font-bold">{{ __("Delete") }}</a>
                                    </td>
                                </tr>
                               @empty
                                    <tr>
                                        <td colspan="3"> <h1 class=" p-2 font-bold text-center bg-transparent text-red-300">{{ __("Noting Data Found") }}</h1> </td>
                                    </tr>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>


        {{-- form --}}
<div class="max-w-2xl mx-auto">
    <div class="bg-white py-8 px-12 rounded-lg drop-shadow-md">
            <h3 class="font-bold text-center text-lg uppercase">{{ __("Form Input Course") }}</h3>
            <hr class="h-0.5 bg-slate-200 my-2">
           <form wire:submit.prevent="store" action="">
            <label for="course-input" class="block font-semibold">{{ __("Course") }}</label>
            <input wire:model.defer="course" autocomplete="off" type="text" name="course" id="course-input" placeholder="Course...." class="my-1 rounded-lg border-none ring-2 text-sm @error('course') text-red-400 ring-red-400  @enderror border-slate-100">
            @error('course')
            <h1 class="text-red-400 text-sm">{{$message}}</h1>
            @enderror
           <div class="flex space-x-10">
            <button wire:laoding.attr="disabled" type="submit" class="block px-2 py-1.5 text-white mt-2  rounded-lg drop-shadow bg-blue-400 focus:bg-blue-500 hover:bg-blue-500 disabled:bg-blue-300" >{{ __("Input Course") }}</button>
           <svg wire:loading role="status" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600 mt-2" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
           </div>
           </form>

    </div>

</div>
    </div>


    </div>

</div>
