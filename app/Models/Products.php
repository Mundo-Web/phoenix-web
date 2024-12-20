<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  use HasFactory;
  protected $fillable = [
    'producto',
    'precio',
    'descuento',
    'stock',
    'imagen',
    'imagen_2',
    'imagen_3',
    'imagen_4',
    'imagen_ambiente',
    'destacar',
    'recomendar',
    'atributes',
    'visible',
    'status',
    'extract',
    'description',
    'costo_x_art',
    'peso',
    'medidas',
    'usos',
    'categoria_id',
    'subcategory_id',
    'color',
    'image_texture',
    'slug',
    'sku',
    'max_stock', 
    'precio_reseller',
    'marca_id',
    'fit_id',
    'codigo',
    'brand_id',
    'discount_id',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'percent_discount',
  ];

  public function categoria()
  {
    return Category::find($this->categoria_id);
  }

  public function marca()
  {
    return ClientLogos::find($this->marca_id);
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'categoria_id');
  }


  public function marcas()
  {
    return $this->belongsTo(ClientLogos::class, 'marca_id');
  }

  public function colors()
  {
      return $this->hasMany(Products::class, 'producto', 'producto')
          ->whereNotNull('color') // Asegura que el color no sea nulo
          ->where('visible', 1) // Solo colores visibles
          ->select('color', 'producto', 'imagen') // Selección de columnas específicas
          ->distinct('color'); // Evitar duplicados en base al color
  }


  public function subcategory()
  {
    return SubCategory::find($this->subcategory_id);
  }

  public function galeria()
  {
    return $this->hasMany(Galerie::class, 'product_id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'tags_xproducts', 'producto_id', 'tag_id');
  }

  public function scopeActiveDestacado($query)
  {
    return $query->where('status', true)->where('destacar', true);
  }

  public function attributeValues()
  {
    return $this->hasMany(AttributeProductValues::class);
  }

  public function attributes()
  {
    return $this->belongsToMany(Attributes::class, 'attribute_product_values', 'product_id', 'attribute_id')
      ->withPivot('attribute_value_id');
  }
  public function wishedByUsers()
  {
    return $this->hasMany(Wishlist::class, 'product_id');
  }

  public function discount()
  {
        return $this->belongsTo(Discount::class, 'discount_id');
  }


  public static function obtenerProductos($categoria_id = '')
{
    $query = Products::select('products.*', 'categories.name as category_name')
        ->join('categories', 'categories.id', '=', 'products.categoria_id')
        ->where('products.status', '=', 1)
        ->where('products.visible', '=', 1);

    if (!empty($categoria_id)) {
        $query->where('products.categoria_id', '=', $categoria_id);
    }

    $productos = $query->groupBy('products.id')
        ->orderByRaw('CASE WHEN products.order IS NULL THEN 1 ELSE 0 END')
        ->orderBy('products.order', 'asc')
        ->orderBy('products.id', 'asc')
        ->orderByRaw('CASE WHEN products.destacar = 1 THEN 0 ELSE 1 END')
        ->paginate(9);

    return $productos;
}
}
