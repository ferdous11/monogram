<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	public function order ()
	{
		return $this->belongsTo('App\Order', 'order_id', 'order_id')
					->where('is_deleted', 0)
					->select([
						'id',
						'order_id',
						'item_count',
						'order_date',
						'short_order',
						'store_id',
					]);
	}

	public function product ()
	{
		return $this->belongsTo('App\Product', 'item_id', 'id_catalog')
					->where('is_deleted', 0);
	}

	public function store ()
	{
		return $this->belongsTo('App\Store', 'store_id', 'store_id');
	}

	public function route ()
	{
		return $this->belongsTo('App\BatchRoute', 'batch_route_id', 'id');
	}

	public function groupedItems ()
	{
		return $this->hasMany('App\Item', 'batch_number', 'batch_number');
	}

	private function commaTrimmer ($string)
	{
		return trim($string, ",");
	}

	private function exploder ($string)
	{
		return explode(",", str_replace(" ", "", $this->commaTrimmer($string)));
	}

	public function scopeSearch ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'all' ) {
			return;
		} elseif ( $search_in == 'order' ) {

			return $query->where('order_id', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'order_date' ) {

			$order_ids = Order::where('order_date', 'REGEXP', implode("|", $values))
							  ->lists('order_id')
							  ->toArray();
			return $query->whereIn('order_id', $order_ids);

		} elseif ( $search_in == 'store_id' ) {

			return $query->where('store_id', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'state' ) {

			return $query->where('state', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'description' ) {

			return $query->where('item_description', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'item_id' ) {

			return $query->where('item_id', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'batch' ) {

			return $query->where('batch', 'REGEXP', implode("|", $values));

		} elseif ( $search_in == 'batch_creation_date' ) {

			return $query->where('batch_creation_date', 'REGEXP', implode("|", $values));

		} else {
			return;
		}
	}

	/*public function scopeSearchByOrderId ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByOrderDate ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order_date' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByStoreId ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByState ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByDescription ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByItemId ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByBatch ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}

	public function scopeSearchByBatchCreationDate ($query, $search_for, $search_in)
	{
		if ( !$search_for ) {
			return;
		}
		$values = $this->exploder($search_for);
		if ( $search_in == 'order' ) {
			$query->where('order_id', 'REGEXP', implode("|", $values));
		} else {
			return;
		}
	}*/


}
