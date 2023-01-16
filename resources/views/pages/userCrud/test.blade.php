@extends('pages.layout.master')


@section('content')

<section class="section">
    <div class="card">

        <div class="card-header" style="display: flex; justify-content:space-between; align-items:center">
            <div>Users Table</div>
            <a href="/add-user"><button class="btn btn-primary">Add User</button></a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>image</th>
                        {{-- <th>User Last Name</th> --}}
                        <th>User Email</th>

                        <th>User Phone</th>
                        <th>User Type</th>
                        <th >Action</th>
                        {{-- <th>??</th> --}}
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td><img src="/images/{{ $user->image }}"  width="80px" height="80px"></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->type }}</td>

                            <td>
                                <!-- edit button -->
                                <a href="" class="ms-3 "></a>
                                <form style="display: inline-block" method="POST"
                                    action="{{ route('test.destroy',$user->id) }}"onsubmit="return confirm('Are you sure?');" >
                                    <a class="btn btn-primary" href="{{ route('test.edit', $user->id) }}"><i class="fas fa-user-edit"></i></a>

                                  <!-- Delete button -->
                                  @csrf
                                  @method('DELETE')
                                    <button class="btn text-primary"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>




@endsection
