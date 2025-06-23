@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">Gallery Items</h3>
                </div>
                <div>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
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
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name (EN)</th>
                                    <th>Name (NP)</th>
                                    <th>Preview</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $key => $gallery)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ucfirst($gallery->category) }}</td>
                                    <td>{{ $gallery->image_name_en }}</td>
                                    <td>{{ $gallery->image_name_np }}</td>
                                    <td style="width: 100px;">
                                        @if($gallery->image_path)
                                            <img src="{{ asset($gallery->image_path) }}" style="width: 100px; height: auto;" class="img-thumbnail">
                                        @elseif($gallery->video_url)
                                            @php
                                                // Extract YouTube video ID from URL
                                                $video_id = '';
                                                if (preg_match('%(?:youtube(?:nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $gallery->video_url, $match)) {
                                                    $video_id = $match[1];
                                                }
                                            @endphp
                                            @if($video_id)
                                                <div style="width: 150px; height: 100px; overflow: hidden;">
                                                    <iframe width="150" 
                                                            height="100" 
                                                            src="https://www.youtube.com/embed/{{ $video_id }}" 
                                                            frameborder="0" 
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                            allowfullscreen
                                                            style="transform: scale(0.8); transform-origin: 0 0;">
                                                    </iframe>
                                                </div>
                                            @else
                                                <i class="fab fa-youtube text-danger" style="font-size: 24px;"></i>
                                            @endif
                                        @else
                                            <span class="text-muted">No media</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection