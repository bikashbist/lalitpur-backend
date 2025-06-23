@extends('admin.admin-dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Office Introductions') }}
                </h6>
                <a href="{{ route('admin.office-introduction.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> {{ __('Add New') }}
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Image') }}</th> <!-- New column -->
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Last Updated') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($introductions as $intro)
                                <tr>
                                    <td>
                                        @if ($intro->image)
                                            <img src="{{ asset($intro->image) }}" alt="Intro Image" width="80"
                                                height="80" style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">{{ __('No image') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ app()->getLocale() === 'en' ? $intro->title_en : $intro->title_np }}
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $intro->status ? 'success' : 'danger' }}">
                                            {{ $intro->status ? __('Active') : __('Inactive') }}
                                        </span>
                                    </td>
                                    <td>{{ $intro->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.office-introduction.edit', $intro->id) }}"
                                            class="btn btn-sm btn-primary" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.office-introduction.destroy', $intro->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('{{ __('Are you sure?') }}')"
                                                title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">{{ __('No office introductions found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    {{ $introductions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
