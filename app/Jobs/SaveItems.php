<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
use App\Models\ProductTag;
use App\Models\Specifications;
use App\Models\SubCategory;
use App\Models\Tag;

use Illuminate\Support\Str;
use SoDe\Extend\Text;

class SaveItems implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private array $items;

  public function __construct(array $items)
  {
    $this->items = $items;
  }

  public function handle()
  {
    try {
      foreach ($this->items as $item) {
        // Searching or Creating a Category
        $categoryJpa = Category::where('name', $item[5])->first();
        if (!$categoryJpa) {
          $categoryJpa = Category::create([
            'name' => $item[5],
            'slug' => Str::slug($item[5])
          ]);
        }

        // Searching or Creating a Subcategory
        $subcategoryJpa = SubCategory::select()
          ->where('category_id', $categoryJpa->id)
          ->where('name', $item[6])
          ->first();
        if (!$subcategoryJpa) {
          $subcategoryJpa = SubCategory::create([
            'category_id' => $categoryJpa->id,
            'name' => $item[6],
            'slug' => Str::slug($item[6])
          ]);
        }

        // Searching or Creating a Brand
        $brandJpa = Brand::where('name', $item[7])->first();
        if (!$brandJpa) {
          $brandJpa = Brand::create(['name' => $item[7]]);
        }

        $productJpa = Products::updateOrCreate([
          'sku' => $item[0],
        ], [
          'codigo' => $item[1],
          'producto' => $item[2],
          'extract' => $item[3],
          'description' => $item[4],
          'categoria_id' => $categoryJpa->id,
          'subcategory_id' => $subcategoryJpa->id,
          'brand_id' => $brandJpa->id,
          'precio' => $item[8],
          'descuento' => $item[9] ?? 0,
          'color' => $item[10],
          'peso' => $item[12],
          'stock' => $item[13]
        ]);

        // Searching or Creating Tags
        $tags = array_map(fn($x) => trim($x), explode(',', $item[14] ?? ''));
        ProductTag::where('producto_id')->delete();
        foreach ($tags as $tag) {
          if (Text::nullOrEmpty($tag)) continue;
          $tagJpa = Tag::where('name', $tag)->first();
          if (!$tagJpa) {
            $tagJpa = Tag::create([
              'name' => $tag,
              'slug' => Str::slug($tag)
            ]);
          }

          ProductTag::create([
            'producto_id' => $productJpa->id,
            'tag_id' => $tagJpa->id
          ]);
        }

        if (!Text::nullOrEmpty($item[11])) {
          Specifications::updateOrCreate([
            'product_id' => $productJpa->id,
            'tittle' => 'Color (HEX)'
          ], [
            'specifications' => $item[11]
          ]);
        }
      }
    } catch (\Throwable $th) {
      // dump($th->getMessage());
    }
  }
}
