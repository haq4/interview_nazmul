<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
//use App\BufferModel;
use Illuminate\Support\Facades\DB;

class BufferController extends Controller
{
    //
	function index()
	{

		$data = DB::table('buffer_postings')
		->join('social_post_groups', 'social_post_groups.id', '=', 'buffer_postings.group_id')
		->join('social_accounts', 'social_accounts.user_id', '=', 'buffer_postings.user_id')
		->select('buffer_postings.*', 'social_post_groups.name', 'social_post_groups.type', 'social_accounts.avatar')
		// ->get();

            ->paginate(20);
// echo "<pre>";
// print_r($data);
// exit();

          return view('pages.buffer', compact('data'));
}



}
