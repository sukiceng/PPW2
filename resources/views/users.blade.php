@extends('auth.layouts')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">All Users Data</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Original Photo</th>
                                <th>Thumbnail</th>
                                <th>Square</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->photo)
                                            <img src="{{ asset('storage/' . $user->photo) }}" width="450" alt="Original Photo">
                                        @else
                                            No photo detected
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->photo_thumbnail)
                                            <img src="{{ asset('storage/' . $user->photo_thumbnail) }}" alt="Thumbnail">
                                        @else
                                            No thumbnail detected
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->photo_square)
                                            <img src="{{ asset('storage/' . $user->photo_square) }}" alt="Square">
                                        @else
                                            No square detected
                                        @endif
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Users Data Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection