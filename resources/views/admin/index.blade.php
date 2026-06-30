<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Panel — Member Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 rounded-xl px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Members Table --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">All Members</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-500 uppercase border-b">
                            <tr>
                                <th class="py-2 pr-4">Name</th>
                                <th class="py-2 pr-4">Email</th>
                                <th class="py-2 pr-4">Balance</th>
                                <th class="py-2">Credit Points</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                            <tr>
                                <td class="py-3 pr-4 font-medium text-gray-800">{{ $user->name }}</td>
                                <td class="py-3 pr-4 text-gray-500">{{ $user->email }}</td>
                                <td class="py-3 pr-4">
                                    <span class="text-indigo-600 font-semibold">
                                        {{ number_format($user->balance) }} pts
                                    </span>
                                </td>
                                <td class="py-3">
                                    <form method="POST" action="{{ route('admin.credit') }}" class="flex gap-2 items-center">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="number" name="points" placeholder="Points" min="1" max="10000"
                                            class="border rounded-lg px-2 py-1 w-24 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                        <input type="text" name="description" placeholder="Reason"
                                            class="border rounded-lg px-2 py-1 w-36 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                        <button type="submit"
                                            class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-indigo-700">
                                            Credit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>