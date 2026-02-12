@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Vincular Grupos AD</h2>
        <form method="POST" action="{{ route('profiles.link-ad-groups', $profile->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-2">Grupos AD</label>
                <div class="space-y-2">
                    <!-- Checkbox múltiplo para grupos AD -->
                    @foreach($adGroups as $group)
                        <div>
                            <input type="checkbox" name="ad_groups[]" value="{{ $group->id }}" id="ad_group_{{ $group->id }}">
                            <label for="ad_group_{{ $group->id }}">{{ $group->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
        </form>
    </div>
</div>
@endsection