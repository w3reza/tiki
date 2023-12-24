@extends('backend.layouts.app')
@section('title', 'Bus List ')
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




                    @if ($buses->isEmpty())
                        <p>No buses found.</p>
                    @else
                        <h3>All Bus</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bus Name</th>
                                    <th>Departure Location</th>
                                    <th>Arrival Location</th>
                                    <th>Departure Time</th>
                                    <th style="width: 300px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buses as $bus)
                                    <tr>
                                        <td>{{ $bus->bus_name }}</td>
                                        <td>{{ $bus->departure_location }}</td>
                                        <td>{{ $bus->arrival_location }}</td>
                                        <td>{{ $bus->departure_time }}</td>


                                        <td>
                                            <div class="d-flex gap-2">
                                                <form method="post"
                                                    action="{{ route('seats.store', ['busId' => $bus->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-info btn-flat"><i
                                                            class="fas fa-pencil-alt"></i> Add Seats</button>
                                                </form>

                                                <a href="{{ route('seats.index', ['busId' => $bus->id]) }}"><button
                                                        type="button" class="btn btn-outline-danger btn-flat"><i
                                                            class="fa fa-trash"></i> Vew Seats</button></a>
                                            </div>

                                        </td>
                                @endforeach
                                </tr>


                            </tbody>
                        </table>

                    @endif
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
