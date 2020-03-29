@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center ">
                <h3>Event Participation</h3>
            </div>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="shadow-lg p-5">
               <form id="event_submit" method="POST" action="{{url('event/register')}}" autocomplete="off">
                @csrf
                <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                <h2>{{$objEvent->name}}</h2>
                <br>
                <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-6">
                    <select class="form-control custom-select" required name="event_category" id="category">
                        <option>Select event</option>
                        @foreach($objEvent->category as $index => $prate)
                            <option class="cate"
                                    data-price={{$prate->amount}} value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                        @endforeach
                    </select>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Fee</label>
                    <input type="hidden" value="" id="exampleFormControlInput1" name="fee">
                    <h6>B$ <span id="price">--</span></h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Organizer</label>
                    <h6>{{$objEvent->organisation->name}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Number</label>
                    <h6>{{$objEvent->organisation->number}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Date</label>
                    <h6>{{$objEvent->event_date}}</h6>
                </div>
                   <div>
                       <p>Team / Sponsor</p>
                       <div class="form-group">
                           <label for="inputAddress">Team / Sponsor</label>Optional
                           <input required  type="text" name="local_name" value="" class="form-control" id="inputAddress" placeholder="">
                       </div>
                   </div>
                   <div>
                       <p>Tee Shirt</p>
                       <div class="form-group">
                           <label for="tshirt">T-shirt size</label>
                           <select id="tshirt" class="form-control custom-select" name="t_shirt_size">
                               <option selected>Open this select menu</option>
                               <option value="XS">XS</option>
                               <option value="S">S</option>
                               <option value="M">M</option>
                               <option value="L">L</option>
                               <option value="XL">XL</option>
                           </select>
                       </div>
                   </div>
                   <div>
                       <p>Accommodation</p>
                       Optional accomodation. Type of room - Run of the house.
                       Single (king size) + 1 breakfast Rm155
                       Single (king size) + 2 breakfast Rm171
                       Twin + 2 breakfast Rm171
                       <select id="tshirt" class="form-control custom-select" name="t_shirt_size">
                           <option selected>Open this select menu</option>
                           <option value="">Single (king size) + 1 breakfast Rm155</option>
                           <option value=""> Single (king size) + 2 breakfast Rm171</option>
                           <option value="">Twin + 2 breakfast Rm171</option>
                       </select>
                   </div>
                   <div>
                       <p>Bus Reservation</p>
                       Optional transportation. TD plaza hotel kota kinabalu - starting / finishing - TD plaza hotel kota kinabalu. Rm80 both ways.
                       <select id="tshirt" class="form-control custom-select" name="t_shirt_size">
                           <option selected  value="no">NO need</option>
                           <option value="yes">Yes, both ways(Rm80)</option>
                       </select>

                   </div>
                <div class="radio">
                    <label for="offline"><input type="radio" required id="offline" value="offline" name="payment_type">Offline</label>
                </div>

                <div class="radio">
                    <label for="online"><input type="radio" required id="online" value="online" name="payment_type">Online</label>
                </div>

                <div class="payment-online" style="display: none">
                    <div class="demo-container">
                        <div class="card-wrapper"></div>
                        <div class="form-row mt-5">
                            <div class="form-group col-md-6">
                                <input class="form-control" placeholder="Card number" type="tel" name="number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control" placeholder="Full name" type="text" name="name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control" placeholder="MM/YY" type="tel" name="expiry">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control" placeholder="CVC" type="number" name="cvc">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                </div>
                </div>
            <div class="col-md-1">
            </div>
            </div>
        </div>
    </div>
    <script>
        $("#category").on('change', function () {
            let str = "";
            $("select option:selected").each(function () {
                str += $(this).data('price') + " ";
            });
            $('#price').html(str)
            $('input[name="fee"]').val(str)
        });

        $('#online').on('click', function () {
                $('.payment-online').css('display', 'block')
            }
        )

        $('#offline').on('click', function () {
                $('.payment-online').css('display', 'none')
            }
        )
    </script>

    <script src="{{asset('js/card.js')}}"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
@endsection
