@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Permissions</h1>
            </div>
            <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-add"></i>Create New Permission</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table is-narrow" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$permission->display_name}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->description}}</td>
                                <td class="has-text-right"><a href="{{route('permissions.show', $permission->id)}}" class="button is-outlined m-r-10">View</a><a href="{{route('permissions.edit', $permission->id)}}" class="button is-outlined">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{$permissions->links('vendor.pagination.default')}} --}}
    </div>
@endsection