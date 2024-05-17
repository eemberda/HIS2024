<div>
    <input type="text" wire:model.lazy="query" placeholder="Search patients..." />

    @if ($query)
        <div class="pt-3">
            <ul>
                @foreach ($patients as $patient)
                    <li>{{ $patient->name }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="pt-3">
            <p>No patients found.</p>
        </div>
    @endif
</div>
