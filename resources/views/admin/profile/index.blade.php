<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi Mr/Mrs:<b> {{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Profile</div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nick NAME</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone</th>
                            <th scope="col">CREATED_AT</th>
                          </tr>
                        </thead>
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nick NAME</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone</th>
                            <th scope="col">CREATED_AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i=1)
                            @endphp
                            @foreach ($profiles as $prof)
                            <tr>
                                <th scope="col">{{$i++}}</th>
                                <th scope="col">{{$prof->user->name}}</th>
                                <th scope="col">{{$prof->age}}</th>
                                <th scope="col">{{$prof->phone}}</th>
                                <th scope="col">{{carbon\carbon::parse($cat->created_at)->diffForHumans()}}</th>
                              </tr>
                            @endforeach

                        </tbody>
                        <tbody>
                            @php
                                ($i=1)
                            @endphp
                            @foreach ($profiles as $prof)
                            <tr>
                                <th scope="col">{{$i++}}</th>
                                <th scope="col">{{$prof->user->name}}</th>
                                <th scope="col">{{$prof->age}}</th>
                                <th scope="col">{{$prof->phone}}</th>
                                <th scope="col">{{carbon\carbon::parse($cat->created_at)->diffForHumans()}}</th>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
       </div>
    </div>
</x-app-layout>
