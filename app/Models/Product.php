<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category_id', 'featured_image', 'price', 'status', 'user_id'
    ];

    public function store($params)
    {
    	$this->fill($params);
        $this->save();
    }

    public static function get($params = array())
    {
        $query = static::select('products.id', 'products.title', 'products.featured_image', 'products.price')
                    ->join('product_categories', 'product_categories.id', 'products.category_id');

        if ( ! empty($params['search']) ) {

            $search = $params['search'];

            $query->where(function($query) use ($search ){

                 $query->orWhere('products.title','like', '%'. $search .'%' )
                            ->orWhere('product_categories.name' ,'like', '%'. $search .'%');

            });

        }

        if ( ! empty( $params['category_id'] ) ) {

            $query = $query->where('product_categories.id', $params['category_id'] );
        }

        if ( ! empty( $params['orderby'] ) ) {

            $order = explode('-', $params['orderby']);

           $query = $query->orderBy('products.'.$order[0], $order[1]);
        }
        else{
            $query = $query->latest('products.id');
        }

        return $query->where('products.status',1)->paginate(config('constants.NUMBER_OF_PRODUCTS'));
    }

}
