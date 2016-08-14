<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submap;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GeneratorController extends Controller
{
	public function doDownload(Request $request) {
		$this->validate($request, [
			'submap' => 'required'
		]);

		$submap = Submap::find($request->submap);

		$xml = new \SimpleXMLElement('<map/>');
		$xml->addAttribute('version', '1.0');
		$xml->addAttribute('encoding', 'utf-8');
		$xml->addChild('datetime', date('Y-m-d H:i:s'));
		$xml->addChild('name', $submap->name);
		
		$response = \Response::make($xml->asXML(), 200);
		$response->header('Content-Type', 'application/octet-stream');
		$response->header('Content-Disposition', 'attachment; filename="'.$submap->name.'.xml"');

		return $response;
	} 
}
