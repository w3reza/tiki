@extends('backend.layouts.app')
@section('title', 'Seat List List ')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if (session('success'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                iconColor: 'white',
                                customClass: {
                                    popup: 'colored-toast',
                                },
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                            })

                            ;
                            (async () => {
                                Toast.fire({
                                    icon: 'success',
                                    title: "{{ session('success') }}",
                                })

                            })()
                        </script>
                    @endif


                    <h3>{{ $seats->first()->bus->bus_name }}</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Seats</th>


                                <th>Status</th>
                                <th style="width: 300px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seats as $seat)
                                <tr>
                                    <td>{{ $seat->seat_number }}</td>
                                    <td>{{ $seat->status }}</td>
                                    <td>
                                        @if ($seat->status == 'Booked')
                                            <button class="btn btn-outline-danger btn-flat"><i
                                                    class="fas fa-pencil-alt"></i> Booked</button>
                                        @else
                                        <form method="post"
                                            action="{{ route('book.store', ['seat_id' => $seat->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-info btn-flat"><i
                                                    class="fas fa-pencil-alt"></i> Book  Seats</button>
                                        </form>

                                        @endif

                                    </td>
                                 </tr>
                            @endforeach



                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->


    </div>
    <!-- /.row -->
@endsection
