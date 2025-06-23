@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="mb-sm-0"> Message</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Sent At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



