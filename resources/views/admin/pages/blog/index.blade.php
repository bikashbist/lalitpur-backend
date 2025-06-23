
@extends('admin.admin-dashboard')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 text-white">Blog Posts</h3>
                    </div>
                    <div>
                        <a href="{{ route('blog.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Image</th>
                                    <th>Title (EN)</th>
                                    <th>शीर्षक (NP)</th>
                                    <th>Category</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($blog->image_path)
                                            <img src="{{ asset($blog->image_path) }}" width="80">
                                        @endif
                                    </td>
                                    <td>{{ $blog->title_en }}</td>
                                    <td>{{ $blog->title_np }}</td>
                                 <td>{{ $categories[$blog->category]['en'] ?? 'N/A' }}</td>


                                    <td>
                                        <span class="badge text-dark {{ $blog->is_active ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $blog->is_active ? 'Hightlight' : 'News' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit', $blog->id) }}" 
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this blog post?')"
                                                    title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No blog posts found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection