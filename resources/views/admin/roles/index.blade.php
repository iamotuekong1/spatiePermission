<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end py-2 bg-blue-700 hover:bg-blue-500">
                    <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 rounded-md">Create Role</a>
                </div>
                <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-900">
                    @foreach ( $roles as $role )
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4">
                                {{ $role->name }}
                            </div>
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4">
                                <a href="{{ Route('admin.roles.edit', $role->id) }}">Edit</a>
                                <span> | </span>
                                <a href="">Delete</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-admin-layout>
