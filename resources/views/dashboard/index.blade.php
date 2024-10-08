@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row gy-5 p-3">
        @foreach($cells as $cell)
        <div class="col-lg-4 col-md-6 col-sm-12  text-center">
            <div class="card">
                <div class="card-body">
                    <div class="card-header bg-transparent border-success">{{$cell->title? $cell->title:''}}</div>
                    <a href="{{ $cell->url ? $cell->url : route('dashboard-cell.edit', $cell->id) }}" class="h-100 ">
                        <div class="flex items-center justify-center flex-grow ">
                            @if ($cell->color)
                            <i class="bi bi-link-45deg" style="font-size: 3rem; color: {{ $cell->color->color_code }};"></i>
                            @else
                            <i class="bi bi-plus-circle" style="font-size: 3rem; color: black;"></i>
                            @endif
                        </div>
                    </a>
                    <div class="card-footer">
                        @if ($cell->color || $cell->URL|| $cell->title)
                        <a class="icon-link" href="{{  route('dashboard-cell.edit', $cell->id) }}">
                            <svg class="bi bi-pencil-square" aria-hidden="true">
                                <use xlink:href="#box-seam"></use>
                            </svg>
                            Edit
                        </a>
                        <a class="icon-link" href="{{  route('dashboard-cell.clear', $cell->id) }}">
                            <svg class="bi bi-trash" aria-hidden="true">
                                <use xlink:href="#box-seam"></use>
                            </svg>
                            Clear
                        </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection