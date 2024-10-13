<x-layout>
    <x-slot:heading>
        Job Listing
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
        <a href="jobs/{{ $job['id'] }}" class="hover:text-blue-400 block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
                <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>