@extends('layouts.app')

@section('content')
<div class="container">
    <div class="head py-3">
        <h2>
            Manage permissions
            <a href="{{ route('permissions.index') }}" class="btn btn-light float-right">Back</a>
        </h2>
    </div>
    <hr>
    <div class="row justify-content-center py-5">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="create_method" id="create_method1" v-model="insert_method" value="basic" checked>
            <label class="form-check-label" for="create_method1">
              Basic Insertion
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="create_method" id="create_method2" v-model="insert_method" value="crud">
            <label class="form-check-label" for="create_method2">
              Crud Insertion
            </label>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('permissions.store') }}" method="POST" v-if="insert_method=='basic'">
        @csrf
        <input type="hidden" name="insert_method" v-model="insert_method">
        <div class="form-group">
            <label for="name">Name (Slug)</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input type="text" name="display_name" class="form-control" id="display_name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description">
        </div>
        <button type="submit" class="btn btn-outline-success">Add permission</button>        
    </form>
    <form action="{{ route('permissions.store') }}" method="POST" v-if="insert_method=='crud'">
        @csrf
        <input type="hidden" name="insert_method" v-model="insert_method">

        <div class="form-group">
            <input type="text" name="resource" v-model="resource" placeholder="ex: posts" class="form-control" id="resource">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="crud_selected" value="create" id="create">
                    <label class="form-check-label" for="create">
                        Create
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="crud_selected" value="read" id="read">
                    <label class="form-check-label" for="read">
                        Read
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="crud_selected" value="update" id="update">
                    <label class="form-check-label" for="update">
                      Update
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="crud_selected" value="delete" id="delete">
                    <label class="form-check-label" for="delete">
                        Delete
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Name (Slug)</th>
                        <th scope="col">Display Name</th>
                        <th scope="col">Description</th>
                      </tr>
                    </thead>
                    <tbody v-if="resource.length > 2">
                        <tr v-for="item in crud_selected">
                            <td v-text="CrudName(item)"></td>
                            <td v-text="CrudSlug(item)"></td>
                            <td v-text="CrudDescription(item)"></td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <input type="hidden" name="crud_selected" v-model="crud_selected">
        <button type="submit" class="btn btn-outline-success">Add permission</button>        
    </form>
    
</div>
@endsection
@section('scripts')
<script type="module">
    new Vue({
        el:'#app',
        data:{
            insert_method: "basic",
            resource: "",
            crud_selected: ['create','read','update','delete']
        },
        methods:{
            CrudName(item){
                return item + ' ' + this.resource;
            },
            CrudSlug(item){
                return item + '-' + this.resource;
            },
            CrudDescription(item){
                return 'allow users to ' + item + ' ' + this.resource;
            }
        }
    });
</script>
@endsection