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
                                                    <input id="checkbox-all" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="py-5 px-7 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                {{ __("Course") }}</th>
                                            <th scope="col"
                                                class="py-5 px-7 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                {{ __("Action") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @forelse ($courses as $c)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td scope="col" class="py-5 px-7">
                                                <div class="flex items-center">
                                                    <input id="{{$c->id}}" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="{{ $c->id }}" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td
                                                class="py-4 px-7 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $c->course }}</td>
                                            <td class="py-4 px-7 text-sm font-medium text-right whitespace-nowrap">
                                                <a
                                                    class="text-green-600 dark:text-green-500 hover:underline font-bold">{{
                                                    __("Edit") }}</a>
                                                <a wire:click="deleteConfirm({{$c->id}})"
                                                    class="text-red-600 dark:text-red-500 hover:underline ml-2 font-bold">{{
                                                    __("Delete") }}</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">
                                                <h1 class=" p-2 font-bold text-center bg-transparent text-red-300">{{
                                                    __("Noting Data Found") }}</h1>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$courses->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <livewire:admin.course.form>

        </div>


    </div>

</div>


@push('scripts')

<script>
    window.addEventListener("confirm:delete",function (event) {
            Swal.fire({
                title:"Are you sure?",
                text:`to delete course: ${event.detail.course}`,
                icon:"warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                @this.call('destroy',event.detail.id)
                Swal.fire( 'Deleted!', 'Your course has been deleted.', 'success')
              }else{
                Swal.fire("Operation Cancelled!","Cancelled delete course!")
              }
            })

        })
</script>

@endpush

{{-- TODO: make componen --}}
{{-- <livewire:push-script> --}}
