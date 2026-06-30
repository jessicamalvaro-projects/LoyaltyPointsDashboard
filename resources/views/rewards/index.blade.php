<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rewards Catalogue
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Balance Banner --}}
            <div class="bg-indigo-600 rounded-2xl shadow p-5 flex items-center justify-between">
                <p class="text-white text-sm font-medium">Your available points</p>
                <p class="text-white text-3xl font-bold">{{ number_format($balance) }} pts</p>
            </div>

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 rounded-xl px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-300 text-red-700 rounded-xl px-4 py-3 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Rewards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($rewards as $reward)
                    <div class="bg-white rounded-2xl shadow p-5 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $reward->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $reward->description }}</p>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-indigo-600 font-bold text-lg">
                                {{ number_format($reward->points_cost) }} pts
                            </span>
                            <form method="POST" action="{{ route('rewards.redeem') }}">
                                @csrf
                                <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                                <button type="submit"
                                    class="px-4 py-2 rounded-xl text-sm font-medium
                                    {{ $balance >= $reward->points_cost
                                        ? 'bg-indigo-600 text-white hover:bg-indigo-700'
                                        : 'bg-gray-200 text-gray-400 cursor-not-allowed' }}"
                                    {{ $balance < $reward->points_cost ? 'disabled' : '' }}>
                                    {{ $balance >= $reward->points_cost ? 'Redeem' : 'Not enough pts' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>