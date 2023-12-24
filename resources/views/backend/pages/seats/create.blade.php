@extends('backend.layouts.app')
@section('title', 'Add Bus Trip')
@section('content')

    <div class="row">

        <div class="col-xl-12">
            <div class="callout callout-info mt-2">
                <div class="row">

                    <div class="col-md-6  mt-2">
                        <h5><i class="nav-icon fa fa-user-plus"></i> Add Bus Seat</h5>
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
                <form action="{{ route('bus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="user_id" value="1">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Bus Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="bus_name"
                                    class="form-control form-control-lg  @if ($errors->has('bus_name')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Bus Name" value="{{ old('bus_name') }}" />
                                @error('bus_name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Bus Number</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="bus_number"
                                    class="form-control form-control-lg  @if ($errors->has('bus_number')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Bus Name" value="{{ old('bus_number') }}" />
                                @error('bus_number')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->
                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Capacity</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="capacity"
                                    class="form-control form-control-lg  @if ($errors->has('capacity')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Total Capacity" value="{{ old('capacity') }}" />
                                @error('capacity')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">

                        <div class="row align-items-center py-1"><!--row Start -->
                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Company Name</h6>
                            </div>
                            <div class="col-md-10 pe-5">

                                <div class="">
                                    <select id="inputStatus" name="type" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option>AC</option>
                                        <option>Non AC</option>

                                    </select>
                                </div>
                                @error('type')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Departure Location</h6>
                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="departure_location"
                                    class="form-control form-control-lg  @if ($errors->has('departure_location')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Departure Location" value="{{ old('departure_location') }}" />
                                @error('departure_location')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Arrival Location</h6>

                            </div>
                            <div class="col-md-10 pe-5">
                                <input type="text" name="arrival_location"
                                    class="form-control form-control-lg  @if ($errors->has('arrival_location')) is-invalid @elseif(old('name')) is-valid @endif"
                                    placeholder="Arrival Location" value="{{ old('arrival_location') }}" />
                                @error('arrival_location')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Departure Time</h6>

                            </div>
                            <div class="col-md-10 pe-5">
                                <!-- Date and time -->
                                <div class="form-group">

                                    <div class="input-group date" id="datetimePicker" >
                                        <input type="text" name="departure_time" class="form-control datetimepicker-input" data-target="#datetimePicker" />
                                        <div class="input-group-append" data-target="#datetimePicker"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                @error('departure_time')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->

                        <hr class="mx-n3">
                        <div class="row align-items-center pt-2 pb-1"> <!--row Start -->

                            <div class="col-md-2 ps-5">
                                <h6 class="mb-0">Arrival Time</h6>

                            </div>
                            <div class="col-md-10 pe-5">
                                <!-- Date and time -->
                                <div class="form-group">

                                    <div class="input-group date" id="datetimePicker">
                                        <input type="text" name="arrival_time" placeholder="2023-12-24 05:30:00"
                                            class="form-control datetimepicker-input" data-target="#datetimePicker" />
                                        <div class="input-group-append" data-target="#datetimePicker"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                @error('arrival_time')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> <!--row end -->


                        <hr class="mx-n3">






                        <div class="row align-items-center py-1 mt-2"> <!--row Start -->
                            <div class="col-md-4 ps-5"> </div>
                            <div class="col-md-3 pe-5">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div> <!--row end -->

                    </div> <!--card body End-->

                </form>


                <script>
                    $(document).ready(function() {
                        // Get the Summernote content
                        var summernoteContent = $('#summernote').summernote('code');

                        // Set the Summernote content to the hidden input
                        $('#content_details').val(summernoteContent);

                        $('#summernote').summernote({
                            disableReturn: true,
                            // other options...
                        });

                        // Submit the form
                        this.submit();

                        //Date and time picker

                    });

                    function updateFileName(input) {
                        var fileName = input.files[0].name;
                        $('#fileLabel').text(fileName);
                    }

                    // $(function () {
                    //     //Date and time picker
                    //     $('#reservationdatetime').datetimepicker({
                    //         icons: { time: 'far fa-clock' }
                    //     });
                    // });
                </script>
            </div>
        </div>
    </div>





    </div>




@endsection
