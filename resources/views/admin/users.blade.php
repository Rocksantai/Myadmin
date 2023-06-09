@extends('admin.template')

@section('title', 'Manage Users')

@section('content')



            <h1 class="mt-4" style="text-align: center;">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control Panel</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users - {{ $users->count() }}

                    <a href="{{ route('users.new') }}" class="btn btn-success" style="float: right;">New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><i class="fa fa-check" aria-hidden="true"></i></th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Address / Phone</th>
                                    <th style="text-align: center;">Photo</th>
                                    <th style="text-align: center;">Role</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr style="text-align: center;">
                                    <td>{!! $user->hasVerifiedEmail() ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-circle text-danger" aria-hidden="true"></i>' !!}</td>
                                    <td>{{ $user->name }}<br>
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('D j F - Y' ) }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}<br> {{ $user->phone }}</td>
                                    <td> <img class="user-avatar" src="/images/users/default.png" alt="{{ $user->name }}" </td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('users.editForm', $user->id) }}" class="btn btn-success" title="Editeaza rand">Edit</a>&nbsp;&nbsp;

                                          {{-- <form id="form-delete-{{ $user->id }}"
                                            action="{{ route('users.delete', $user->id) }}" method="POST"
                                            style="display:inline-block; ">
                                            @csrf
                                            @method('delete')
                                          </form> --}}

                                        <button class="btn btn-danger" title="Sterge rand"

                                            onclick="
                                                if(confirm('confirmati stergerea lui {{ $user->name }}')){
                                                    document.getelementById('form-delete-{{ $user->id }}').submit();
                                                }
                                            "
                                        >
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;"><i class="fa fa-check" aria-hidden="true"></i></th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Address / Phone</th>
                                    <th style="text-align: center;">Photo</th>
                                    <th style="text-align: center;">Role</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


@endsection
