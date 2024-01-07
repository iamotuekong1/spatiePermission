<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <ul role="list" class="divide-y-8 divide-gray-100 dark:divide-gray-900">
                    <li class="flex justify-between gap-x-6 py-2">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4">
                            <div>User Name: {{ $user->name }}</div>
                            <div>User Email: {{ $user->email }}</div>
                        </div>
                    </li>

                    <li class="mt-2 px-4 py-2">
                        <h3 class="text-1xl font-semiBold">Roles</h3>
                        <div class="mb-3 mt-2">
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    <form method="POST"
                                        action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                        onsubmit="return confirm('Are you sure?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded-md bg-gray-100 border border-gray-300 hover:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 px-3 py-2 text-sm">{{ $user_role->name }}</button>
                                    </form>
                                @endforeach

                            @endif
                        </div>
                    </li>

                    <li class="mt-2 px-4 py-2">
                        <h3 class="text-1xl font-semiBold">Assign Role</h3>
                        <div class="mb-3 mt-2">
                            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                @csrf
                                <select id="role" name="role" autocomplete="role-name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                            class="mt-2 rounded-md bg-gray-100 border border-gray-300 hover:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 px-3 py-2 text-sm">Assign
                                </button>
                            </form>
                        </div>
                    </li>

                    <li class="mt-2 px-4 py-2">
                        <h3 class="text-1xl font-semiBold">Permissions</h3>
                        <div class="mb-3 mt-2">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form method="POST"
                                        action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                        onsubmit="return confirm('Are you sure?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md bg-gray-100 border border-gray-300 hover:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 px-3 py-2 text-sm">{{ $user_permission->name }}</button>
                                    </form>
                                @endforeach

                            @endif
                        </div>
                    </li>

                    <li class="mt-2 px-4 py-2">
                        <h3 class="text-1xl font-semiBold">Assign Permission</h3>
                        <div class="mb-3 mt-2">
                            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                                @csrf
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="mt-2 rounded-md bg-gray-100 border border-gray-300 hover:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 px-3 py-2 text-sm">Assign
                                </button>
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>
