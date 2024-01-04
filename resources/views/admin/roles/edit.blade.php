<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-900">
                    <li class="flex justify-between gap-x-6 py-2">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4">
                            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                                @csrf
                                @method('PUT')
                                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200 dark:bg-gray-800">Roles Index</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-500 focus:ring-0 sm:text-sm sm:leading-6 dark:text-gray-300" placeholder="Role Name"
                                                value="{{ $role->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                                <div class="mt-6 flex items-center justify-start gap-x-6 px-1">
                                    <button type="button" onclick="window.location.href='{{ route('admin.roles.index') }}'" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200 dark:bg-gray-800">Cancel</button>
                                    <button type="submit" class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="mt-6 px-4 py-2">
                        <h3 class="text-1xl font-semiBold">Role Permissions</h3>
                        <div class="mb-3 mt-2">
                            @if ($role->permissions)
                                @foreach ($role->permissions as $role_permission)
                                <form method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('Are you sure?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-md bg-gray-100 border border-gray-300 hover:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 px-3 py-2 text-sm">{{ $role_permission->name }}</button>
                                </form>

                                @endforeach

                            @endif
                        </div>
                        <div class="max-w-xl">
                            <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <select id="permission" name="permission" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a Permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach

                                    </select>

                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                                <div class="mt-6 flex items-center justify-start gap-x-6 px-1">
                                    <button type="button" onclick="window.location.href='{{ route('admin.roles.index') }}'" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200 dark:bg-gray-800">Cancel</button>
                                    <button type="submit" class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>
