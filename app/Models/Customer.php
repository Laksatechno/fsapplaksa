<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['name'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function invoiceppns()
    {
        return $this->hasMany(Invoiceppn::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_detail()
    {
        //Invoice reference ke table customers
        return $this->hasMany(ProductDetail::class);
    }

    public function call_plan_detail()
    {
        //Invoice reference ke table customers
        return $this->hasMany(Call_plan_detail::class);
    }

    public function call_plan_detail_customer()
    {
        //Invoice reference ke table customers
        return $this->belongsTo(Call_plan_detail_customer::class);
    }

    public function call_plan()
    {
        return $this->hasMany(Call_plan::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
