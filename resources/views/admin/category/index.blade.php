<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi Mr/Mrs:<b> {{Auth::user()->name}}</b>
            <b style="float: right">Total Categories </b>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">All Categories</div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category NAME</th>
                            <th scope="col">Made by</th>
                            <th scope="col">CREATED_AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i=1)
                            @endphp
                            @foreach ($categories as $cat)
                            <tr>
                                <th scope="col">{{$i++}}</th>
                                <th scope="col">{{$cat->category_name}}</th>
                                <th scope="col">{{$cat->user->name}}</th>
                                <th scope="col">{{carbon\carbon::parse($cat->created_at)->diffForHumans()}}</th>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add category</div>
                    <div class="card-body">
                        <form action="{{route('storage.category')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Category Name</label>
                              <input type="text" class="form-control" name="category_name">
                              @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                            <input type="submit" class="form-control" value="Add">
                          </form>
                    </div>
                </div>
            </div>

        </div>
       </div>
    </div>
</x-app-layout>
