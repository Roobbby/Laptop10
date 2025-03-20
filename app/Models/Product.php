<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function calculateSimilarityDetails($input)
    {
        $weightBrand  = 0.4;
        $weightScreen = 0.2;
        $weightPrice  = 0.4;

        // Cek kecocokan Brand (jika input merek ada di nama produk)
        $pattern = '/\b' . preg_quote(strtolower(trim($input['name'])), '/') . '\b/i';
        $simBrand = ($input['name'] && preg_match($pattern, strtolower($this->brand))) ? 1 : 0;

        // Cek kecocokan ukuran layar
        if ($this->screen_size && $input['screen_size']) {
            $simScreenSize = 1 - (abs($this->screen_size - $input['screen_size']) / max($this->screen_size, $input['screen_size']));
        } else {
            $simScreenSize = 0;
        }

        // Cek kecocokan harga (harga <= input sudah difilter sebelumnya)
        $simPrice = ($this->price == $input['price']) ? 1 : 0;

        // Hitung total similarity dengan bobot masing-masing
        $totalSimilarity = ($weightBrand * $simBrand) + ($weightScreen * $simScreenSize) + ($weightPrice * $simPrice);

        return [
            'total_similarity' => $totalSimilarity,
            'details' => [
                'brand'       => $simBrand,
                'screen_size' => $simScreenSize,
                'price'       => $simPrice
            ]
        ];
    }
}
