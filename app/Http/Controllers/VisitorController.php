<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function getVisitor() {
        return response()->json(Visitor::get());
    }

    public function saveRecords(VisitorRequest $request) {
        return response()->json($request);
        $record = $request->get('id') === null ? new Visitor() : Visitor::find($request->get('id'));
        $record->name = $request->get('name');
        $record->address = $request->get('address');
        $record->email = $request->get('email');
        $record->mobile_number = $request->get('mobile_number');
        $record->where_from = $request->get('where_from');
        $record->where_to = $request->get('where_to');
        $record->purpose = $request->get('purpose');
        $record->company_name = $request->get('company_name');
        if(!Visitor::find($request->get('id'))) {
            $record->check_in_date = date('Y-m-d');
            $record->check_in_time = date('H:i:s');
            $record->check_out_date = NULL;
            $record->check_out_time = '00:00:00';
        }
        $record->status = $request->get('status');
        $record->visitor_card_id = $request->get('visitor_card_id');
        $request->get('description') === null ? $record->description = '---' : $record->description = $request->get('description');
        $request->get('id') === null ? $record->created_by = session('id') : $record->updated_by = session('id');
        $record->save();

        // if(!Visitor::find($request->get('id'))) {
        //     VisitorCard::where('id', $request->get('visitor_card_id'))->update(['use_status' => 'Busy']);
        // }

        // if(!Visitor::find($request->get('id'))) {
        //     $mailList = ['tahzeeb@boomerangdigitalbd.com','protik.hore@gmail.com'];
        //     foreach($mailList as $mail) {
        //         Mail::to($mail)->send(new VisitorMail(
        //             $record
        //         ));
        //     }
        // }


        return response()->json($record);
    }
}
