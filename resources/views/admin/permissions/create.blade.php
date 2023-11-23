<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-900">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4">
                            <form method="POST" action="{{ route('admin.permissions.store') }}">
                                @csrf
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200 dark:bg-gray-800">Permission</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-500 focus:ring-0 sm:text-sm sm:leading-6 dark:text-gray-300" placeholder="Permission Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                                <div class="mt-6 flex items-center justify-start gap-x-6 px-1">
                                    <button type="button" onclick="window.location.href='{{ route('admin.permissions.index') }}'" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200 dark:bg-gray-800">Cancel</button>
                                    <button type="submit" class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                                </div>
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>
