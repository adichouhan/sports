<?php

namespace App\Http\Controllers\Admin;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use App\Http\Model\Organisation;
use App\Ticket;
use App\Transend;
use App\Transstart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $arrObjEvents = Events::all();

        return view('admin.events.list', ['arrObjEvents' => $arrObjEvents]);
    }

    public function eventCreate()
    {
        $arrObjOrganisation = Organisation::all();
        if ($arrObjOrganisation->count() > 0) {
            return view('admin.events.create', ['arrObjOrganisation' => $arrObjOrganisation]);
        } else {
            return view('admin.organisation.create');
        }
    }

    public function view($id)
    {
        $objEvent = Events::where('id', $id)->first();
        ($objEvent->eventParticipants->load('category', 'profile'));

        return view('admin.events.view', ['objEvent' => $objEvent]);
    }

    public function store(Request $request)
    {
        //        dd($request->all());
        DB::beginTransaction();
        $objEvent = new Events();
        $objEvent->name = $request->name;
        $objEvent->description = $request->description;
        //        $objEvent->registration_start_date = $request->register_start_date;
        $objEvent->registration_end_date = $request->register_expire_date;
        $objEvent->event_date = $request->eventdate;
        $objEvent->event_status = $request->event_status;
        $objEvent->venue = $request->venue;
        $objEvent->org_id = $request->organisation;
        $objEvent->banner = $request->file('banner')->store('banner');
        $objEvent->save();
        if ($request->has('transstart')) {
            $objEvent->transstart = json_encode($request->transstart);
            foreach ($request->transstart as $transstart) {
                $objTransstart = new Transstart();
                $objTransstart->location = $transstart['location'];
                $objTransstart->price = $transstart['fee'];
                $objTransstart->event_id = $objEvent->id;
                $objTransstart->save();
            }
        }
        if ($request->has('transend')) {
            $objEvent->transend = json_encode($request->transend);
            foreach ($request->transend as $transend) {
                $objTransend = new Transend();
                $objTransend->location = $transend['location'];
                $objTransend->price = $transend['fee'];
                $objTransend->event_id = $objEvent->id;
                $objTransend->save();
            }
        }
        if ($request->has('accomodation')) {
            $objEvent->accommodation = json_encode($request->accomodation);
            foreach ($request->accomodation as $accomodation) {
                $objTransend = new Accomodation();
                $objTransend->name = $accomodation['name'];
                $objTransend->price = $accomodation['fee'];
                $objTransend->event_id = $objEvent->id;
                $objTransend->save();
            }
        }
        if ($request->has('racekit')) {
            $objEvent->racekit = $request->racekit;
        }
        if ($request->has('bus_fee')) {
            $objEvent->bus_reservation_amount = $request->bus_fee;
        }
        $objEvent->save();
        $intEventkey = $objEvent->getKey();
        if ($request->has('category')) {
            foreach ($request->category as $category) {
                $objCategory = new Category();
                $objCategory->category_type = $category['type'];
                $objCategory->category_subtype = $category['subtype'];
                $objCategory->event_id = $intEventkey;
                $objCategory->fee = json_encode($category['fee']);
                $objCategory->save();
                foreach ($category['fee'] as $key => $arrfees) {
                    $objTicket = new Ticket();
                    $objTicket->category_id = $objCategory->id;
                    $objTicket->name = $key;
                    $objTicket->fee = $arrfees['fee'];
                    $objTicket->quantity = $arrfees['quantity'];
                    $objTicket->start_date = $arrfees['start_date'];
                    $objTicket->end_date = $arrfees['end_date'];
                    $objTicket->save();
                    if ('early' == $objTicket->name) {
                        $objEvent->registration_start_date = $objTicket->start_date;
                        $objEvent->save();
                    }
                    if ('late' == $objTicket->name) {
                        $objEvent->registration_end_date = $objTicket->end_date;
                        $objEvent->save();
                    }
                }
            }
        }
        DB::commit();

        return redirect('admin/events')->with('success', 'Events Created Successfully.');
    }

    public function edit($id)
    {
        $objEvent = Events::where('id', $id)->first();
        $objOrganisation = Organisation::where('id', $objEvent->org_id)->first();

        return view('admin.events.edit', ['objEvent' => $objEvent, 'objOrganisation' => $objOrganisation]);
    }

    public function setPaymentStatus($id)
    {
        $objEvent = EventParticipants::findOrFail($id);
        $objEvent->payment_status = 1;
        $objEvent->save();
        return redirect()->back()->with('success', 'Events Payment status update Successfully.');
    }

    public function update($id, Request $request)
    {
        $objEvent = Events::where('id', $id)->first();
        $objEvent->name = $request->name;
        $objEvent->description = $request->description;
        $objEvent->registration_end_date = $request->register_expire_date;
        $objEvent->event_date = $request->eventdate;
        $objEvent->venue = $request->venue;
        $objEvent->organiser_name = $request->orgname;
        $objEvent->organiser_contact_number = $request->org_contact_no;
        $objEvent->organiser_address = $request->org_address;
        if ($request->hasFile('banner')) {
            $objEvent->banner = $request->file('banner')->store('banner');
        }
        $objEvent->save();

        return redirect('admin/events')->with('success', 'Events Updated Successfully.');
    }

    public function getResulte($id)
    {
        $objEventParticipant = EventParticipants::where('id', $id)->first();

        return view('admin.events.resulte', ['objEventParticipant' => $objEventParticipant]);
    }

    public function postResulte($id, Request $request)
    {
        $objResulte = EventParticipants::where('id', $id)->first();
        $objResulte->race_time = $request->race_time;
        $objResulte->rank_status = $request->rank_status;
        $objResulte->result_status = true;
        $objResulte->file = $request->file('file')->store('resulte/' . $id);
        $objResulte->save();
        return redirect('admin/events')->with('success', 'Resulte Upload Successfully.');
    }
}


