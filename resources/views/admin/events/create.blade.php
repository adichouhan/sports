@extends('admin.admin_template')
@section('content')
    <script>
        $(document).on('click', '.pick_up_yes', function () {
            $('#pickup_drop_available').css('display', 'block');
        });

        $(document).on('click', '.pick_up_no', function () {
            $('#pickup_drop_available').css('display', 'none');
        });

    </script>
    <div class=" ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Submit Events</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" enctype="multipart/form-data" autocomplete="off"
                              action="{{url('admin/events/store')}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Event title</label>

                                <div class="col-md-10">
                                    <input id="name" required type="text" class="form-control " name="name" value=""
                                           autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Event
                                    Description</label>

                                <div class="col-md-10">
                                    <textarea id="description" class="form-control" name="description"
                                              autocomplete="description">
                                    </textarea>
                                </div>
                            </div>

                            <label class="col-md-2 col-form-label text-md-right" for="add">Add Event Type</label>
                            <button type="button" name="add" id="add" class="btn  btn-outline-dark"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                            <div id="dynamic_field">
                                <div class="addedSection">
                                    <h3>Category Default</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_type0">Category</label>
                                            <input type="text" required
                                                   id="category_type0"
                                                   name="category[0][type]"
                                                   class="form-control item_category">
                                        </div>
                                        <input type="hidden" required id="category_fee_name0"
                                               name="category[0][fee][early][name]" class="form-control item_category"
                                               placeholder="Category fee..." value="early">
                                        <div class="col-md-6">
                                            <label for="category_subtype0">Sub-Category</label>
                                            <input required
                                                   type="text"
                                                   id="category_subtype0"
                                                   name="category[0][subtype]"
                                                   class="form-control item_category">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label for="category_type0">Early Bird Fee</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" required id="category_fee0"
                                                       name="category[0][fee][early][fee]"
                                                       class="form-control item_category" placeholder="Category fee...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">Early Bird Ticket Quantity</label><input
                                                type="number" required id="category_fee0"
                                                name="category[0][fee][early][quantity]"
                                                class="form-control item_category">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">Early Bird Ticket Start Date</label><input
                                                type="date" required id="category_fee0"
                                                name="category[0][fee][early][start_date]"
                                                class="form-control item_category">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">Early Bird Ticket End Date</label><input
                                                type="date" required id="category_fee0"
                                                name="category[0][fee][early][end_date]"
                                                class="form-control item_category">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="category_fee0">General Fee</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" required id="category_fee0"
                                                       name="category[0][fee][normal][fee]"
                                                       class="form-control item_category">
                                            </div>
                                        </div>
                                        <input type="hidden" required id="category_fee_name0"
                                               name="category[0][fee][normal][name]" class="form-control item_category"
                                               placeholder="Category fee..." value="normal">
                                        <div class="col-md-3">
                                            <label for="category_fee0">General Ticket Quantity</label><input
                                                type="number"
                                                required
                                                id="category_fee0"
                                                name="category[0][fee][normal][quantity]"
                                                class="form-control item_category">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">General Ticket Start Date</label><input
                                                type="date" required id="category_fee0"
                                                name="category[0][fee][normal][start_date]"
                                                class="form-control item_category">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">General Ticket End Date</label>
                                            <input type="date"
                                                   required
                                                   id="category_fee0"
                                                   name="category[0][fee][normal][end_date]"
                                                   class="form-control item_category">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="category_fee0">Late Fee</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" required id="category_fee0"
                                                       name="category[0][fee][late][fee]"
                                                       class="form-control item_category">
                                            </div>
                                        </div>
                                        <input type="hidden" required id="category_fee_name0"
                                               name="category[0][fee][late][name]" class="form-control item_category"
                                               placeholder="Category fee..." value="late">

                                        <div class="col-md-3">
                                            <label for="category_fee0">Late Ticket Quantity</label>
                                            <input type="number"
                                                   required
                                                   id="category_fee0"
                                                   name="category[0][fee][late][quantity]"
                                                   class="form-control item_category">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="category_fee0">Late Ticket Start Date</label>
                                            <input type="date"
                                                   required
                                                   id="category_fee0"
                                                   name="category[0][fee][late][start_date]"
                                                   class="form-control item_category">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="category_fee0">Late Ticket End Date</label>
                                            <input type="date"
                                                   required
                                                   id="category_fee0"
                                                   name="category[0][fee][late][end_date]"
                                                   class="form-control item_category">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="eventdate" class="col-md-2 col-form-label text-md-right">Registration End
                                    Date</label>
                                <div class="col-md-4">
                                    <input required type="datetime-local" class="form-control" id="register_expire_date"
                                           name="register_expire_date" placeholder="">
                                </div>

                                <label for="eventdate" class="col-md-2 col-form-label text-md-right">Event Date</label>
                                <div class="col-md-4">
                                    <input required type="datetime-local" class="form-control" id="eventdate"
                                           name="eventdate" placeholder="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="venue" class="col-md-2 col-form-label text-md-right">Venue</label>
                                <div class="col-md-4">
                                    <input required id="venue" type="text" class="form-control" name="venue"
                                           autocomplete="venue" autofocus>
                                </div>
                                <label for="org" class="col-md-2 col-form-label text-md-right">Select
                                    Organisation</label>
                                <div class="col-md-4">
                                    <select id="org" class="form-control custom-select" name="organisation">
                                        <option selected>Open this select menu</option>
                                        @foreach($arrObjOrganisation as $objOrg)
                                            <option value="{{$objOrg->id}}">{{$objOrg->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="button" name="add" id="add_start_transportation"
                                    class="btn  btn-outline-dark"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                            <div class="form-group row">
                                <label for="add_start_transportation" class="col-md-2 col-form-label text-md-right">Enter
                                    Pickup Location </label>
                                <div id="add_start_transportation_fields">
                                </div>
                            </div>

                            <button type="button" name="add" id="add_end_transportation"
                                    class="btn  btn-outline-dark"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                            <div class="form-group row">
                                <label for="add_end_transportation" class="col-md-2 col-form-label text-md-right">Enter
                                    Drop Location After Event</label>

                                <div id="add_end_transportation_field">
                                </div>
                            </div>

                            <button type="button" name="add" id="add_accomodation"
                                    class="btn  btn-outline-dark"><i
                                    class="fa fa-plus" aria-hidden="true"></i></button>
                            <div class="form-group row">
                                <label for="add_accomodation" class="col-md-2 col-form-label text-md-right">Add
                                    Accomodation</label>

                                <div id="add_accomodation_field">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Enter Racekit
                                    Amount (optional)</label>
                                <div class="addedSection">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="racekit" class="">Enter Amount</label>
                                            <input type="text" required="" id="racekit" name="racekit"
                                                   class="form-control item_category">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group evet-form-list">
                                <label for="event_status" class="event-form-input">Event Status</label>
                                <select id="event_status" class="form-control custom-select" name="event_status">
                                    <option selected>Open this select menu</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Postponed">Postponed</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="banner" class="col-md-2 col-form-label text-md-right">Upload Banner</label>
                                <div class="col-md-10">
                                    <input required id="banner" type="file" class="" name="banner">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary mx-auto">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var intIndex = 0
            $(document).on('click', '#add', function () {
                intIndex = intIndex + 1
                var html = '<div class="addedSection"><h3>Category' + intIndex + '</h3>';
                html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="category_type' + intIndex + '">Category</label> <input type="text" required id="category_type' + intIndex + '" name="category[' + intIndex + '][type]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-6"><div  class="form-group"><label for="category_subtype' + intIndex + '">Sub-Category</label><input required type="text" id="category_subtype' + intIndex + '" name="category[' + intIndex + '][subtype]" class="form-control item_category"></div></div></div>';

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][fee]" class="form-control item_category"></div></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][early][name]" class="form-control item_category" placeholder="Category fee..." value="early">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][quantity]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket Start Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][start_date]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket End Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][end_date]" class="form-control item_category"></div></div></div>';

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][fee]" class="form-control item_category"></div></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][quantity]" class="form-control item_category"></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][normal][name]" class="form-control item_category" placeholder="Category fee..." value="normal">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Start Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][start_date]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-3"> <label for="category_fee' + intIndex + '">General Ticket End Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][end_date]" class="form-control item_category"></div> </div>'

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Late Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][fee]" class="form-control item_category"></div></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Late Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][quantity]" class="form-control item_category"></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][late][name]" class="form-control item_category" placeholder="Category fee..." value="late">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Start Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][start_date]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-3"> <label for="category_fee' + intIndex + '">Late Ticket End Date</label><input type="date" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][end_date]" class="form-control item_category"></div></div>'

                html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
                $('#dynamic_field').append(html);
            });
            $(document).on('click', '.remove', function () {
                $(this).closest('.addedSection').remove();
            });
        })
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });


        var inttransportstartIndex = 0
        $(document).on('click', '#add_start_transportation', function () {
            var html = '<div class="addedSection"><h3>Add Transportation before Race</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="trans_start' + inttransportstartIndex + '">Location Name</label> <input type="text" required id="trans_start' + inttransportstartIndex + '" name="transstart[' + inttransportstartIndex + '][location]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="trans_start_fee' + inttransportstartIndex + '">Fee</label><input required type="number" id="trans_start_fee' + inttransportstartIndex + '" name="transstart[' + inttransportstartIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_start_transportation_fields').append(html);
            inttransportstartIndex = inttransportstartIndex + 1
        });

        var inttransportendIndex = 0
        $(document).on('click', '#add_end_transportation', function () {
            var html = '<div class="addedSection"><h3>Add Transportation After Race</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="trans_end' + inttransportendIndex + '">Location Name</label> <input type="text" required id="trans_end' + inttransportendIndex + '" name="transend[' + inttransportendIndex + '][location]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="trans_end_fee' + inttransportendIndex + '">Fee</label><input required type="number" id="trans_end_fee' + inttransportendIndex + '" name="transend[' + inttransportendIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_end_transportation_field').append(html);
            inttransportendIndex = inttransportendIndex + 1
        });

        var intAccomodationIndex = 0
        $(document).on('click', '#add_accomodation', function () {
            var html = '<div class="addedSection"><h3>Add Accomodation</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="accomodation' + intAccomodationIndex + '">Accomodation Name</label> <input type="text" required id="accomodation' + intAccomodationIndex + '" name="accomodation[' + intAccomodationIndex + '][name]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="accomodation_fee' + intAccomodationIndex + '">Accomodation Fee</label><input required type="number" id="accomodation_fee' + intAccomodationIndex + '" name="accomodation[' + intAccomodationIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_accomodation_field').append(html);
            intAccomodationIndex = intAccomodationIndex + 1
        });

    </script>
    <style>
        .addedSection {
            background-color: #bec4c6 !important;
            margin: 20px !important;
            padding: 10px !important;
        }
    </style>
@endsection

