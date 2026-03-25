@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-5xl px-5 py-16">
    <a href="{{ route('client.projects.index') }}" class="inline-flex items-center text-sm font-bold uppercase tracking-widest text-navy/70 hover:text-orange transition-colors">
        <i class="fa-solid fa-arrow-left-long mr-3"></i> Quay lại dự án
    </a>

    <div class="mt-8 space-y-6">
        <div class="space-y-3">
            <p class="text-xs uppercase tracking-[0.3em] text-black/40">Dự án tiêu biểu</p>
            <h1 class="text-3xl md:text-5xl font-black text-ink leading-tight">{{ $project->title }}</h1>
            <p class="text-sm text-black/60">{{ $project->location }} · {{ $project->year }}</p>
        </div>

        <div class="overflow-hidden rounded-2xl border border-black/5 bg-black/5">
            <img src="{{ $project->image ? asset('images/' . $project->image) : asset('images/placeholder.jpg') }}"
                alt="{{ $project->title }}" class="w-full max-h-[520px] object-cover">
        </div>

        @if($project->summary)
        <div class="rounded-2xl border border-black/5 bg-white p-6">
            <p class="text-base text-black/70">{{ $project->summary }}</p>
        </div>
        @endif

        <div class="rounded-2xl border border-black/5 bg-white p-6 prose max-w-none">
            {!! $project->description !!}
        </div>
    </div>
</section>
@endsection