<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi Mr/Mrs:<b> {{Auth::user()->name}}</b>
            <b style="float: right">Total Users <span class="badge bg-danger">{{count($users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    {{-- <th scope="col">Age</th>
                    <th scope="col">Phone</th> --}}
                    <th scope="col">EMAIL</th>
                    <th scope="col">CREATED_AT</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    ($i = 1)
                    @endphp

                    @foreach ($users as $user)


                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$user->name}}</td>
                    {{-- <td>{{$user->profile->age}}</td>
                    <td>{{$user->profile->number}}</td> --}}
                    <td>{{$user->email}}</td>
                    <td>{{Carbon\carbon::parse($user->created_at)->diffForHumans()}}</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
        </div>
       </div>
    </div>
</x-app-layout>
