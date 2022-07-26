@extends('admin.template')

@section('title', 'Manage Categories')

@section('content')



            <h1 class="mt-4" style="text-align: center;">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Categories</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Categories - {{ $categories->count() }}

                    @can('author-rights')<a href="{{ route('admin.categories.new') }}" class="btn btn-success" style="float: right;">New Category</a>@endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Title / slug</th>
                                    <th style="text-align: center;">Subtitle</th>
                                    <th style="text-align: center;">Views</th>
                                    <th style="text-align: center;">Photo</th>
                                    <th style="text-align: center;">Meta / Desc/ Key</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr style="text-align: center;">
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->subtitle }}</td>
                                    <td>{{ $category->views }}</td>
                                    <td> <img class="user-avatar" src="/images/categories/{{ $category->photo }}" alt="#"> </td>
                                    <td>
                                        <span class="text-success">{{ $category->meta_description }}</span><br>
                                        <span class="text-danger">{{ $category->meta_keywords }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-success" title="Editeaza categorie">Edit</a>&nbsp;&nbsp;
                                        @can('author-rights')
                                        <form id="form-delete-{{ $category->id }}"
                                            action="{{ route('admin.categories.delete', $category->id) }}" method="POST"
                                            style="display:inline-block; ">
                                            @csrf
                                            @method('delete')
                                        </form>

                                        <button class="btn btn-danger" title="Sterge rand"

                                            onclick="
                                                if(confirm('confirmati stergerea categoriei {{ $category->title }}')){
                                                    document.getelementById('form-delete-{{ $category->id }}').submit();
                                                }
                                            "
                                        >
                                        Delete
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">Title / slug</th>
                                    <th style="text-align: center;">Subtitle</th>
                                    <th style="text-align: center;">Views</th>
                                    <th style="text-align: center;">Photo</th>
                                    <th style="text-align: center;">Meta / Desc/ Key</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


@endsection
