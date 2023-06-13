@extends('frontend.master')
@section('content')

    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="sideMenu">
                        <a href="{{url('packages')}}" class="btn btn-default">Make appointment</a>
                        <ul>
                            <li><a href="{{url('client/my/pets')}}">My Pets</a></li>
                            <li><a href="{{url('client/add/pet')}}">Add Pet</a></li>
                            <li><a href="{{url('client/visits')}}">All Visits</a></li>
                            <li><a href="{{url('client/profile')}}">Edit account</a></li>
                            <li><a href="{{url('client/signout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-9 col-md-9">
                    <!-- Form Starts -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Pet name</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($appointments as $appointment)
                            <tr>
                                <td>
                                    <a href="{{url('client/petDetails', $appointment->pet->id)}}">
                                        {{$appointment->pet->name  ?? ''}}
                                    </a>
                                </td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->price}}</td>
                                <td>{{$appointment->package->name ?? ''}}</td>

                                <td>
                                    @if ($appointment->status == 0)
                                        {{ trans('cruds.appointment.fields.active') }}
                                    @elseif($appointment->status == 1)
                                        {{ trans('cruds.appointment.fields.assigned') }}
                                    @else
                                        {{ trans('cruds.appointment.fields.done') }}
                                    @endif
                                </td>
                                <td>
                                    @if($appointment->status == 2 && !$appointment->comment()->first())
                                        <button type="button" class="btn btn-primary"
                                                onclick="setID({{$appointment->id}})"
                                                data-target-id="{{$appointment->id}}" data-toggle="modal"
                                                data-target="#exampleModal">
                                            Comment
                                        </button>
                                    @else
                                        {{ $appointment->comment()->first()->comment ?? '' }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$appointments->links() }}

                    <!-- Contact results -->
                    <div id="contact_results"></div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->

        <!-- /container-fluid-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{url('client/storeComment')}}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>

                            <input type="hidden" id="appointment_id" name="appointment_id">
                            <textarea name="comment" class="form-control input-field" required></textarea>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            function setID(id) {
                $('#appointment_id').val(id);

            }

        </script>

    </section>

@endsection