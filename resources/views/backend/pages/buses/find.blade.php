@extends('backend.layouts.app')
@section('title', 'Find Bus Trip')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Find Bus Trip</h5>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Bus Trip</li>
                        </ol>
                    </div><!-- /.col -->
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border-radius: 15px;">
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

                <div class="container">
                    <h2>Bus Search</h2>

                    <form method="post" action="{{ route('bus.find.trip') }}">
                        @csrf
                        <div class="form-group">
                            <label for="departure_location">Departure Location:</label>
                            <select name="departure_location" class="form-control">
                                <option value="">Select Departure Location</option>




                                @foreach($locations as $location)
                                    <option value="{{ $location->location_name}}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="arrival_location">Arrival Location:</label>
                            <select name="arrival_location" class="form-control">
                                <option value="">Select Arrival Location</option>

                                @foreach($locations as $location)
                                <option value="{{ $location->location_name}}">{{ $location->location_name }}</option>
                            @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="departure_time">Departure Time:</label>
                            <input type="text" name="departure_time" class="form-control" value="{{ old('departure_time') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    @if($buses->isEmpty())
                        <p>No buses found.</p>
                    @else
                        <h3>Bus Search Results</h3>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Bus Name</th>
                                <th>Departure Location</th>
                                <th>Arrival Location</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th style="width: 200px">Seats</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($buses as $bus)
                              <tr>
                                <td>{{ $bus->bus_name }}</td>
                                <td>{{ $bus->departure_location }}</td>
                                <td>{{ $bus->arrival_location }}</td>
                                <td>{{ $bus->departure_time }}</td>
                                <td>{{ $bus->arrival_time }}</td>

                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                 <a href="{{ route('seats.index', ['busId' => $bus->id]) }}"> <button type="button" class="btn btn-outline-info btn-flat"><i class="fas fa-pencil-alt"></i> Seats</button></a>
                                  <button type="button" class="btn btn-outline-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>

                                </div>
                              </td>
                              @endforeach
                              </tr>


                            </tbody>
                          </table>

                    @endif
                </div>




            </div>
        </div>
    </div>





    </div>




@endsection
