@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{$role->display_name}} <small><em>({{$role->name}})</em></small></h1>
                <h5>{{$role->description}}</h5>                
            </div>
            <div class="column">
                <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>Edit Role</a>
            </div>
        </div>
        <hr class="m-t-10">

        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Permissions:</h2>
                                <ul>
                                    @foreach ($role->permissions as $permission)
                                        <li>{{$permission->display_name}} <em>({{$permission->description}})</em></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection