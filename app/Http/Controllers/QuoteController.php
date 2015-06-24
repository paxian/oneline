<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexQuoteGetRequest;		 // Request to perform validation.
use App\Http\Requests\StoreQuotePostRequest;   // Request to perform validation.

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

use app\Quote;

class QuoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(IndexQuoteGetRequest $req)
	{
		if (!$req->has('sp')) {
			$sp = 0;
		} else {
			$sp = intval($req->input('sp'));
		}

		// fetch the quotes using Quote model
		// see, no sql.
		$response = [
			'sp' => $sp+10,
			'quotes' => Quote::orderBy('created_at', 'desc')->skip($sp)->take(10)->get()
		];

		if (count($response['quotes']) > 0) {
			return response()->json($response, 200); // return the quotes
		} else {
			return response()->json($response, 404); // return nothin if there is no more quote available.
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreQuotePostRequest $req)
	{
		$quote = Quote::create($req->only('quote', 'author', 'image'));

		return response()->json($quote, 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// fetch one particular record by id
		$quote = Quote::findOrFail($id);

		return response()->json($quote, 200);
	}

}
