<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller // this is self created controller which have functionality of CRUD events
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) // displays events by pagination to 10
    {
        $events = Event::paginate(10);
        
        return EventResource::collection($events);

        $search = $request->header('search');
        $search = $search ."%";
        if($search){
            return Event::where("event_name","like",$search)->get();
        }
    
       
       
        
        
    }
    public function allevents(Request $request) // displays events by pagination to 100
    {
        $events = Event::paginate(100)->sortBy("event_date");
        
        return EventResource::collection($events); 
       
        
    }
    public function search(Request $request)  // search events by event name take event name as request
    {
  
        $search = $request->header('search');
        $search = $search ."%";
        if($search){
            return Event::where("event_name","like",$search)->get(); // using where query to search events
        }
    
       
       
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // this function creates new events and updates old events
    {
        $event = $request->isMethod('put') ? Event::findOrFail // checks if requuest is update or create
        ($request->event_id): new Event;

        $event->id = $request->input('event_id');
        $event->event_name = $request->input('event_name');
        $event->event_time = $request->input('event_time');
        $event->event_date = $request->input('event_date');
        $event->event_venue = $request->input('event_venue');

        if($event->save()){
            return new EventResource($event); // saves event in database afte creating or updating it

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) /// shows events by id
    {
        $event = Event::findOrFail($id);

        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // deletes events by id
    {
        $event = Event::findOrFail($id);
        if($event->delete()){
        return new EventResource($event);
        }
    }
}
