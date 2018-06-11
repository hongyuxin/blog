@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New Permission</h1>
            </div>
        </div>
        <hr class="m-t-10">
        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="block">
                        <b-radio v-model="permissionType" name="permission_type" native-value="basic">Basic Permission</b-radio>
                        <b-radio v-model="permissionType" name="permission_type" native-value="crud">CRUD Permission</b-radio>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="display_name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="display_name" id="display_name">
                        </p>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="name" class="label">Slug</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name">
                        </p>
                    </div>
                    <div class="field" v-if="permissionType == 'basic'">
                        <label for="description" class="label">Description</label>
                        <p class="control">
                            <input type="text" class="input" name="description" id="description">
                        </p>
                    </div>
                    <div class="field" v-if="permissionType == 'crud'">
                        <label for="resource" class="label">Resource</label>
                        <p class="control">
                            <input type="text" class="input" name="resource" id="resource" v-model="resource">
                        </p>
                    </div>
                    <div class="columns" v-if="permissionType == 'crud'">
                        <div class="column">
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="read">Read</b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
                            </div>
                            <div class="field">
                                <b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
                            </div>
                        </div>
                        <input type="hidden" name="crud_selected" :value="crudSelected">
                        <div class="column">
                            <table class="table" width="100%">
                                <thead>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                </thead>
                                <tbody v-if="resource.length >= 3">
                                    <tr v-for="item in crudSelected">
                                        <td v-text="crudName(item)"></td>
                                        <td v-text="crudSlug(item)"></td>
                                        <td v-text="crudDescription(item)"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button class="button is-primary">Create Permission</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>      
        var app = new Vue({
            el: "#app",
            data: {
                permissionType: "basic",
                resource: "",
                crudSelected: [],
            },
            methods: {
                crudName: function(item){
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function(item){            
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function(item){        
                    return "Allow a User to " + item.toLowerCase() + ' a ' + app.resource.toLowerCase(); 
                },
            }
        });
    </script>
@endsection