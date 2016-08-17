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

		$xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><zabbix_export/>');
		$xml->addChild('version', '3.0');
		$dateRaw = date('c');
		$dateZ = substr_replace($dateRaw, 'Z', 19);
		$xml->addChild('date', $dateZ);

		$images = $xml->addChild('images');
			$image = $images->addChild('image');
				$image->addChild('name', 'Cloud_(48)');
				$image->addChild('imagetype', '1');
				$image->addChild('encodedImage', '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');

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
				
				foreach($submap->hosts as $host) {
					foreach($host->linkAs as $linkA) {
						$submapA = $linkA->host->submap->id;
						$submapB = $linkA->linkB->host->submap->id;

						if($submapA != $submapB) {
							$selement = $selements->addChild('selement');	
							$selement->addChild('elementtype', '4');
							$selement->addChild('label', $linkA->linkB->host->name);
							$selement->addChild('label_location', '-1');
							$selement->addChild('x', '20');
							$selement->addChild('y', '20');
							$selement->addChild('elementsubtype', '0');
							$selement->addChild('areatype', '0');
							$selement->addChild('width', '200');
							$selement->addChild('height', '200');
							$selement->addChild('viewtype', '0');
							$selement->addChild('use_iconmap', '0');
							$selement->addChild('selementid', $linkA->linkB->host->elementid);
							$selement->addChild('element', '0');
								$icon_off = $selement->addChild('icon_off');
								$icon_off->addChild('name', 'Cloud_(48)');
								
								$icon_on = $selement->addChild('icon_on');
								$icon_on->addChild('name', 'Cloud_(48)');

							$selement->addChild('icon_disabled');
							$selement->addChild('icon_maintenance', '');
							$selement->addChild('application', '');
								$urls = $selement->addChild('urls');
									$url = $urls->addChild('url');
									$url->addChild('name', $linkA->linkB->host->submap->name);
									$url->addChild('url', 'http://vmd-noc02.santos.sp.gov.br/zabbix/zabbix.php?action=map.view&amp;sysmapid=10');
						}
					}
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
