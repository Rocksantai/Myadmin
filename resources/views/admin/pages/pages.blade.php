@extends('admin.template')

@section('title', 'Manage Categories')

@section('content')



            <h1 class="mt-4" style="text-align: center;">Manage Pages</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Categories</a></li>
                <li class="breadcrumb-item active">Pages</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Pages - articles {{ $pages->total() }} in {{ $pages->lastPage() }} pages
                    {{ $pages->links() }}
                    @can('author-rights')<a href="{{ route('admin.categories.new') }}" class="btn btn-success" style="float: right;">New Page</a>@endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                                <td scope="col">Title / Created</td>
                                <td scope="col">Author</td>
                                <td class="text-center" scope="col">Photo</td>
                                <td scope="col">Views</td>
                                <td scope="col">Meta desc / key</td>
                                <td scope="col" style="min-width: 150px; ">Actions</td>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <th><b>{{ $page->title }} <b><br> {{ $page->created_at->format('D j F - Y') }}</th>
                                <td>{{ $page->user_id }}</td>
                                <td> <img class="user-avatar mx-auto" src="/images/pages/{{ $page->photo }}"></td>
                                <td>{{ $page->views }}</td>
                                <td><span class="text-info">{{ $page->meta_description }} </span><br> {<span class="text-success">{{  $page->meta_keywords  }}</span></td>
                                <td>
                                    <a href="{{ route('users.editForm', $page->id) }}" class="btn btn-success" title="Editeaza rand">Edit</a>&nbsp;

                                      {{-- <form id="form-delete-{{ $page->id }}"
                                        action="{{ route('users.delete', $page->id) }}" method="POST"
                                        style="display:inline-block; ">
                                        @csrf
                                        @method('delete')
                                      </form> --}}

                                    <button class="btn btn-danger" title="Sterge rand"

                                        onclick="
                                            if(confirm('confirmati stergerea lui {{ $page->name }}')){
                                                document.getelementById('form-delete-{{ $page->id }}').submit();
                                            }
                                        "
                                    >
                                        Delete
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                </div>
                <div class="card-footer">
                    {{ $pages->links() }}
                </div>
            </div>


@endsection
