<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Jobs\SendEmailJob;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $memeber = Member::create($request->all());

        if ($memeber) {
            $details['email'] = $memeber->email;
            dispatch(new SendEmailJob($details));
            return $memeber;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        $memeber = Member::findOrFail($id);
        $memeber->fill($request->all());
        $memeber->save();

        return response()->json($memeber);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memeber = Member::findOrFail($id);
        $memeber->delete();
    }

    public function filter($eventId)
    {
        return Member::where('event_id', $eventId)->firstOrFail();
    }
}
