<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Points Dashboard
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 rounded-xl px-4 py-3 text-sm">
        {{ session('success') }}
    </div>
@endif

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Points Balance Card --}}
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-2xl shadow-lg p-6 flex items-center justify-between text-white">                <div>
            <p class="text-sm text-indigo-100 uppercase tracking-wide">Available Points</p>
<p class="text-5xl font-bold text-white mt-1">{{ number_format($balance) }}</p>
<p class="text-sm text-indigo-200 mt-1">Keep earning to unlock more rewards</p>
                </div>
                <div class="text-white bg-white/20 rounded-full p-6">                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20A10 10 0 0012 2z" />
                    </svg>
                </div>
            </div>

            {{-- Transaction History --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Transaction History</h3>

                @if($transactions->isEmpty())
                    <p class="text-gray-400 text-sm">No transactions yet.</p>
                @else
                    <div class="divide-y divide-gray-100">
                        @foreach($transactions as $transaction)
                            <div class="flex items-center justify-between py-3">
                                <div class="flex items-center gap-3">
                                    <div class="rounded-full p-2 
                                        {{ $transaction->type === 'earned' ? 'bg-green-100' : 'bg-red-100' }}">
                                        @if($transaction->type === 'earned')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">{{ $transaction->description }}</p>
                                        <p class="text-xs text-gray-400">{{ $transaction->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="text-sm font-semibold 
                                    {{ $transaction->type === 'earned' ? 'text-green-600' : 'text-red-500' }}">
                                    {{ $transaction->type === 'earned' ? '+' : '-' }}{{ number_format($transaction->points) }} pts
                                </span>
                            </div>
                            @endforeach
</div>

<div class="mt-4">
    {{ $transactions->links() }}
</div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>