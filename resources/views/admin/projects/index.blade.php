@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    <div
        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-helmet-safety" style="margin-right: 12px; color: #4f46e5;"></i> Quản lý dự án tiêu
            biểu
        </h2>
        <a href="{{ route('admin.projects.create') }}"
            style="background: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">
            <i class="fa-solid fa-plus"></i> Thêm dự án mới
        </a>
    </div>

    @php
    $categoryOptions = [
    'energy' => 'Lĩnh vực Năng lượng',
    'transport' => 'Hạ tầng Giao thông Trọng điểm',
    'agriculture' => 'Thủy lợi & Nông nghiệp CNC',
    'civil-industrial' => 'Công trình Dân dụng & Công nghiệp',
    ];
    @endphp

    <form method="GET" style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px;">
        <select name="category" style="padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
            <option value="">Tất cả phân loại</option>
            @foreach($categoryOptions as $key => $label)
            <option value="{{ $key }}" {{ request('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>

        <input type="number" name="year" value="{{ request('year') }}" placeholder="Năm"
            style="width: 110px; padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px;">

        <input type="text" name="location" value="{{ request('location') }}" placeholder="Địa điểm"
            style="min-width: 200px; padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px;">

        <select name="sort" style="padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
            <option value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>Mới nhất</option>
            <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
        </select>

        <button type="submit" style="background: #0f172a; color: white; padding: 8px 14px; border: none; border-radius: 8px; cursor: pointer;">
            Lọc
        </button>
        <a href="{{ route('admin.projects.index') }}" style="padding: 8px 14px; border-radius: 8px; border: 1px solid #e2e8f0; text-decoration: none; color: #475569;">
            Reset
        </a>
    </form>

    <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">HÌNH ẢNH</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">TÊN DỰ ÁN</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">PHÂN LOẠI</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">ĐỊA ĐIỂM / NĂM</th>
                <th style="padding: 15px; text-align: center; color: #64748b; font-size: 13px;">THAO TÁC</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 15px;">
                    <img src="{{ asset('images/' . $project->image) }}"
                        style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                </td>
                <td style="padding: 15px;">
                    <div style="font-weight: 600; color: #1e293b;">{{ $project->title }}</div>
                    <div style="font-size: 11px; color: #94a3b8;">SLUG: {{ $project->slug }}</div>
                </td>
                <td style="padding: 15px;">
                    @php
                    $types = [
                    'energy' => ['Năng lượng', '#fee2e2', '#991b1b'],
                    'transport' => ['Giao thông', '#dbeafe', '#1e40af'],
                    'agriculture' => ['Thủy lợi & Nông nghiệp', '#dcfce7', '#166534'],
                    'civil-industrial' => ['Dân dụng & Công nghiệp', '#ffedd5', '#9a3412']
                    ];
                    $catKey = strtolower($project->category);
                    $type = $types[$catKey] ?? ['Không xác định', '#f1f5f9', '#64748b'];
                    @endphp
                    <span
                        style="background: {{ $type[1] }}; color: {{ $type[2] }}; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                        {{ $type[0] }}
                    </span>
                </td>
                <td style="padding: 15px; color: #64748b; font-size: 14px;">
                    {{ $project->location }} <br> <span style="font-size: 12px; color: #94a3b8;">Năm:
                        {{ $project->year }}</span>
                </td>
                <td style="padding: 15px; text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 12px;">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" style="color: #3b82f6;"><i
                                class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Xóa dự án này?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                style="background:none; border:none; color: #ef4444; cursor: pointer;"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">Chưa có dự án nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection