<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submap;
use App\Host;
use App\LinkA;
use App\LinkB;
use App\PortPlusOid;
use App\Port;
use App\Oid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GeneratorController extends Controller
{
	public function doDownload(Request $request) {
		$this->validate($request, [
			'submap' => 'required'
		]);

		$submap = Submap::find($request->submap);

		//$xml->addAttribute('version', '1.0');

		$xml = new \SimpleXMLElement('<zabbix_export/>');
		$xml->addChild('version', '3.0');
		$xml->addChild('date', date('Y-m-d H:i:s'));

		$images = $xml->addChild('images');
			$image = $images->addChild('image');
				$image->addChild('name', 'Switch_(24)');
				$image->addChild('imagetype', '1');
				$image->addChild('encodedImage', 'iVBORw0KGgoAAAANSUhEUgAAABgAAAAPCAYAAAD+pA/bAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACmAAAApgBNtNH3wAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANuSURBVDjLlZRraFRHGIa/c81u9qyJ62qISXU3UYOuWk2EQEshP2oNiCLVIBKheCMBsfSHCIVCoH+CUJqgEgT7IzTQSwoVQYhiKSgoiFrRuEYj2Wazu9lNYrJJzm3mzLk4s2RLi9E0Ax8fZzjneed9z8xwnufBe4aQTGZ2Ixu1IIwHker+3Ni4dQKWMbjFBAghDYZhHDURPoItqwIhDNncBIymUu6cOv8UY/vXfHb2Smfn19PLEVhPq5U+H6XAzXTFgBCCZDoN49kcqLoOhmGCpulgmgiQaWLLce86rvNjucz1dXR0uO8U+O3a9e6D+/ae5nlOdBwHGDyVHodMJgcG0sGybNBpV1UDTGRQISpORXQqim2bQeaIa9+SBflSz/edt98SOPvNt6NKICs3f3rCbdixowphBPOqBpOTryE3NUXBGugmhRsIDNp1Qy+IWLYFBBPAFgGB56GsPAiyJD/DJu5DRPvpwvnz6YJA+1fnplPkcejz7U2QVC2rpfkwX1GxRmTZa7oG6fEsZLOThZiYOLbYPItLBZd+Hw6FQAkEgL3P3GNsQTi80pMk6RAXiUR8e/YeuOeUDO0UcA3MKbPQsn2XN4YlvOejz2SOE3j2Ecs+naWxUbE56sigbspXBGF1eNUCGBXgIi9CZeUaCCoKpDK5LwoOOI7jvzx7rtXj4TKyRkolEgJpgwLN0a3ujF2K62q3+OluKoBUjTkah5VlZVCcY2CLxlTq94FCwZIogkgrN5lr/c82bWtrk9ZFa3tez6eOEzvP+x0FVuxaCx+H6ohGgm4gGCwpAovdpEVoJKIk/gNmZei6MZ3LN751Dqgbjm65aHUk2v/X4J8NAcUPqwOlIG5bC/ViDc6jEsF2XJHBZ/KzbLuCsABlArZN7LG/E32p0UR7f3+/xb3rJLPYursvHqzdtPHyL1evhGoi1VAfrYJE2PMqZ6Lmk6GXss/nE4tgnue9zFgyPvx88MjAwEDcWwBz77sqmJumpibh2MmTF6qqq0790HdR/DBWB7G6T/C9B49LinHkp6fyI8MvO65fu9pDec6SV8ViQl1dXR9s2FjzuyB59TaR8Z37D32E/ohkYvjGqxdD7fF4fMJbBPa/BP4dW29v735MnO9u3voDkiOJM48e3b9JGe6yLrul3NDGx2IxP1217i0BeAPjpCUDfndckQAAAABJRU5ErkJggg==');

		$maps = $xml->addChild('maps');
			$map = $maps->addChild('map');
			$map->addChild('name', $submap->name);
			$map->addChild('width', '1820');
			$map->addChild('height', '800');
			$map->addChild('label_type', '0');
			$map->addChild('label_location', '0');
			$map->addChild('highlight', '1');
			$map->addChild('expandproblem', '0');
			$map->addChild('markelements', '0');
			$map->addChild('show_unack', '1');
			$map->addChild('severity_min', '3');
			$map->addChild('grid_size', '20');
			$map->addChild('grid_show', '1');
			$map->addChild('grid_align', '1');
			$map->addChild('label_format', '0');
			$map->addChild('label_type_host', '2');
			$map->addChild('label_type_hostgroup', '2');
			$map->addChild('label_type_trigger', '2');
			$map->addChild('label_type_map', '2');
			$map->addChild('label_type_image', '2');
			$map->addChild('label_string_host');
			$map->addChild('label_string_hostgroup');
			$map->addChild('label_string_trigger');
			$map->addChild('label_string_map');
			$map->addChild('label_string_image');
			$map->addChild('expand_macros', '0');
			$map->addChild('background');
			$map->addChild('iconmap');
			$map->addChild('urls');

			$selements = $map->addChild('selements');	
				foreach($submap->hosts as $host) {
					$selement = $selements->addChild('selement');
					$selement->addChild('elementtype', '0');
					$selement->addChild('label', '{HOSTNAME}');
					$selement->addChild('label_location', '-1');
					$selement->addChild('x', '20');
					$selement->addChild('y', '20');
					$selement->addChild('elementsubtype', '0');
					$selement->addChild('areatype', '0');
					$selement->addChild('width', '200');
					$selement->addChild('height', '200');
					$selement->addChild('viewtype', '0');
					$selement->addChild('use_iconmap', '0');
					$selement->addChild('selementid', $host->elementid);
					$element = $selement->addChild('element');
						$element->addChild('host', $host->name);

					$icon_off = $selement->addChild('icon_off');
						$icon_off->addChild('name', 'Switch_(24)');

					$icon_on = $selement->addChild('icon_on');
						$icon_on->addChild('name', 'Switch_(24)');

					$selement->addChild('icon_disabled');
					$selement->addChild('icon_maintenance');
					$selement->addChild('application');
					$selement->addChild('urls');
				}

			$links = $map->addChild('links');
				foreach($submap->hosts as $host) {
					foreach($host->linkAs as $linkA) {
						$link = $links->addChild('link');
						$link->addChild('drawtype', '2');
						$link->addChild('color', '00CC00');
						$link->addChild('label');
						$link->addChild('selementid1', $linkA->host->elementid);
						$link->addChild('selementid2', $linkA->linkB->host->elementid);
							$linktriggers = $link->addChild('linktriggers');
								$linktrigger = $linktriggers->addChild('linktrigger');
								$linktrigger->addChild('drawtype', '2');
								$linktrigger->addChild('color', 'DD0000');
									$trigger = $linktrigger->addChild('trigger');
									$trigger->addChild('description', $linkA->portPlusOid->port->name.' on {HOSTNAME} is down');
									$trigger->addChild('expression', '{'.$linkA->host->name.':ifOperStatus.'.$linkA->portPlusOid->oid->number.'.last(#1)}=2');

								$linktrigger = $linktriggers->addChild('linktrigger');
								$linktrigger->addChild('drawtype', '2');
								$linktrigger->addChild('color', 'DD0000');
									$trigger = $linktrigger->addChild('trigger');
									$trigger->addChild('description', $linkA->linkB->portPlusOid->port->name.' on {HOSTNAME} is down');
									$trigger->addChild('expression', '{'.$linkA->linkB->host->name.':ifOperStatus.'.$linkA->linkB->portPlusOid->oid->number.'.last(#1)}=2');
					}
				}

		$response = \Response::make($xml->asXML(), 200);
		$response->header('Content-Type', 'text/xml');
		$response->header('Content-Type', 'application/octet-stream');
		$response->header('Content-Disposition', 'attachment; filename="'.$submap->name.'.xml"');

		return $response;
	} 
}
