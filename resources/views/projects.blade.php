@extends('layouts.app')

@section('content')


<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Du an tieu bieu</p>
        <h1 class="text-4xl md:text-5xl font-display">Danh sach du an</h1>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @forelse ($projects as $project)
        <div class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            @if ($project->featured_image)
            <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="aspect-[4/3] w-full object-cover">
            @else
            <div class="aspect-[4/3] bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)]"></div>
            @endif
            <div class="p-6">
                <h3 class="font-display text-2xl">{{ $project->title }}</h3>
                <p class="mt-2 text-sm text-black/60">{{ $project->location }} · {{ $project->year }}</p>
                <p class="mt-3 text-sm text-black/60">{{ $project->summary }}</p>
            </div>
        </div>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60">
            Chua co du an trong co so du lieu.
        </div>
        @endforelse
    </div>
</section>
@endsection