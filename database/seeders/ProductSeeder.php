<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\SellingPrice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create categories
        $category1 = Category::create([
            'name' => 'Clothes',
        ]);

        $category2 = Category::create([
            'name' => 'Food & drinks',
        ]);

        $category3 = Category::create([
            'name' => 'Bath & Body',
        ]);


        // Create sub-categories
        $subCategory1 = SubCategory::create([
            'name'        => 'Men',
            'category_id' => $category1->id,
        ]);

        $subCategory2 = SubCategory::create([
            'name'        => 'Women',
            'category_id' => $category1->id,
        ]);

        $subCategory3 = SubCategory::create([
            'name'        => 'Biscuits',
            'category_id' => $category2->id,
        ]);

        $subCategory4 = SubCategory::create([
            'name'        => 'A Kyaut Kyaw',
            'category_id' => $category2->id,
        ]);

        $subCategory5 = SubCategory::create([
            'name'        => 'Sweets',
            'category_id' => $category2->id,
        ]);

        $subCategory6 = SubCategory::create([
            'name'        => 'Toothpaste',
            'category_id' => $category3->id,
        ]);

        $subCategory7 = SubCategory::create([
            'name'        => 'Soap',
            'category_id' => $category3->id,
        ]);

        // Create products with associated sub-categories and photos
        // India ပလေကပ်ပုဆိုး start
        $product1 = Product::create([
            'name'            => 'India Longyi',
            'sub_category_id' => $subCategory1->id,
            'buying_price'    => 5000,
            'quantity'        => 10,
            'description'     => 'Description for Product 1',
        ]);

        $sellingPrice1 = SellingPrice::create([
            'selling_price' => 7000,
            'product_id' => $product1->id,
        ]);
        
        $product1Image1 = ProductImage::create([
            'product_id' => $product1->id,
            'image_name' => 'indialongyi1.png',
        ]);

        $product1Image2 = ProductImage::create([
            'product_id' => $product1->id,
            'image_name' => 'indialongyi2.png',
        ]);

        $product1Image3 = ProductImage::create([
            'product_id' => $product1->id,
            'image_name' => 'indialongyi3.png',
        ]);
        // India ပလေကပ်ပုဆိုး end

        // ဦးဂျမ်း လုံချည် start
        $product2 = Product::create([
            'name'            => 'OoGyan Longyi',
            'sub_category_id' => $subCategory1->id,
            'buying_price'    => 7000,
            'quantity'        => 5,
            'description'     => 'Description for Product 2',
        ]);

        $sellingPrice2 = SellingPrice::create([
            'selling_price' => 10000,
            'product_id' => $product2->id,
        ]);

        $product2Image1 = ProductImage::create([
            'product_id' => $product2->id,
            'image_name' => 'Oogyan1.jpg',
        ]);

        $product2Image2 = ProductImage::create([
            'product_id' => $product2->id,
            'image_name' => 'Oogyan2.jpg',
        ]);

        $product2Image3 = ProductImage::create([
            'product_id' => $product2->id,
            'image_name' => 'Oogyan3.jpg',
        ]);

        $product2Image4 = ProductImage::create([
            'product_id' => $product2->id,
            'image_name' => 'Oogyan4.jpg',
        ]);
        // ဦးဂျမ်း လုံချည် end

        // လုံချည် start
        $product3 = Product::create([
            'name'            => 'Htabee',
            'sub_category_id' => $subCategory2->id,
            'buying_price'    => 5000,
            'quantity'        => 10,
            'description'     => 'Description for Product 3',
        ]);

        $sellingPrice3 = SellingPrice::create([
            'selling_price' => 7000,
            'product_id' => $product3->id,
        ]);

        $product3Image1 = ProductImage::create([
            'product_id' => $product3->id,
            'image_name' => 'htabee1.jpg',
        ]);

        $product3Image2 = ProductImage::create([
            'product_id' => $product3->id,
            'image_name' => 'htabee2.jpg',
        ]);

        $product3Image3 = ProductImage::create([
            'product_id' => $product3->id,
            'image_name' => 'htabee3.jpg',
        ]);
        // လုံချည် end

        // bourbon start 
        $product4 = Product::create([
            'name'            => 'Bourbon',
            'sub_category_id' => $subCategory3->id,
            'buying_price'    => 1000,
            'quantity'        => 15,
            'description'     => 'Description for Product 4',
        ]);

        $sellingPrice4 = SellingPrice::create([
            'selling_price' => 1700,
            'product_id' => $product4->id,
        ]);

        $product4Image1 = ProductImage::create([
            'product_id' => $product4->id,
            'image_name' => 'bourbon1.png',
        ]);

        $product4Image2 = ProductImage::create([
            'product_id' => $product4->id,
            'image_name' => 'bourbon1.png',
        ]);

        // bourbon end
        $product5 = Product::create([
            'name'            => 'Dark Fantasy',
            'sub_category_id' => $subCategory3->id,
            'buying_price'    => 1500,
            'quantity'        => 7,
            'description'     => 'Description for Product 5',
        ]);

        $sellingPrice5 = SellingPrice::create([
            'selling_price' => 2000,
            'product_id' => $product5->id,
        ]);

        $product5Image1 = ProductImage::create([
            'product_id' => $product5->id,
            'image_name' => 'darkfantasy1.png',
        ]);

        $product5Image2 = ProductImage::create([
            'product_id' => $product5->id,
            'image_name' => 'darkfantasy2.png',
        ]);

        $product5Image3 = ProductImage::create([
            'product_id' => $product5->id,
            'image_name' => 'darkfantasy3.png',
        ]);
        //dark fantasy end

        // A Kyaut Kyaw 1 start
        $product6 = Product::create([
            'name'            => 'Bikaji',
            'sub_category_id' => $subCategory4->id,
            'buying_price'    => 1500,
            'quantity'        => 15,
            'description'     => 'Description for Product 6',
        ]);

        $sellingPrice6 = SellingPrice::create([
            'selling_price' => 2000,
            'product_id' => $product6->id,
        ]);

        $product6Image1 = ProductImage::create([
            'product_id' => $product6->id,
            'image_name' => 'bikaji1.png',
        ]);

        $product6Image2 = ProductImage::create([
            'product_id' => $product6->id,
            'image_name' => 'bikaji2.png',
        ]);

        $product6Image3 = ProductImage::create([
            'product_id' => $product6->id,
            'image_name' => 'bikaji3.png',
        ]);
        // A Kyaut Kyaw 1 end

        // A Kyaut Kyaw 2 start
        $product7 = Product::create([
            'name'            => 'Par Pa Lar Lone',
            'sub_category_id' => $subCategory4->id,
            'buying_price'    => 1700,
            'quantity'        => 5,
            'description'     => 'Description for Product 7',
        ]);

        $sellingPrice7 = SellingPrice::create([
            'selling_price' => 2000,
            'product_id' => $product7->id,
        ]);

        $product7Image1 = ProductImage::create([
            'product_id' => $product7->id,
            'image_name' => 'parpalar1.png',
        ]);

        $product7Image2 = ProductImage::create([
            'product_id' => $product7->id,
            'image_name' => 'parpalar2.png',
        ]);
        // A Kyaut Kyaw 2 end

        //Sweets start
        $product8 = Product::create([
            'name'            => 'Santra Candy',
            'sub_category_id' => $subCategory5->id,
            'buying_price'    => 2000,
            'quantity'        => 10,
            'description'     => 'Description for Product 8',
        ]);

        $sellingPrice8 = SellingPrice::create([
            'selling_price' => 2500,
            'product_id' => $product8->id,
        ]);

        $product8Image1 = ProductImage::create([
            'product_id' => $product8->id,
            'image_name' => 'sweet1.png',
        ]);

        $product8Image2 = ProductImage::create([
            'product_id' => $product8->id,
            'image_name' => 'sweet2.png',
        ]);

        $product8Image3 = ProductImage::create([
            'product_id' => $product8->id,
            'image_name' => 'sweet3.png',
        ]);

        $product8Image4 = ProductImage::create([
            'product_id' => $product8->id,
            'image_name' => 'sweet4.png',
        ]);

        $product8Image5 = ProductImage::create([
            'product_id' => $product8->id,
            'image_name' => 'sweet5.png',
        ]);
        //Sweets end

        // toothpaste start
        $product9 = Product::create([
            'name'            => 'Dabur Red',
            'sub_category_id' => $subCategory6->id,
            'buying_price'    => 2300,
            'quantity'        => 5,
            'description'     => 'Description for Product 9',
        ]);

        $sellingPrice9 = SellingPrice::create([
            'selling_price' => 2800,
            'product_id' => $product9->id,
        ]);

        $product9Image1 = ProductImage::create([
            'product_id' => $product9->id,
            'image_name' => 'dabur1.png',
        ]);

        $product9Image2 = ProductImage::create([
            'product_id' => $product9->id,
            'image_name' => 'dabur2.png',
        ]);
        // toothpaste end

        // soap start
        $product10 = Product::create([
            'name'            => 'Patanjali and Santoor',
            'sub_category_id' => $subCategory7->id,
            'buying_price'    => 2000,
            'quantity'        => 10,
            'description'     => 'Description for Product 8',
        ]);

        $sellingPrice10 = SellingPrice::create([
            'selling_price' => 2500,
            'product_id' => $product10->id,
        ]);

        $product10Image1 = ProductImage::create([
            'product_id' => $product10->id,
            'image_name' => 'soap1.png',
        ]);

        $product10Image2 = ProductImage::create([
            'product_id' => $product10->id,
            'image_name' => 'soap2.png',
        ]);

        $product10Image3 = ProductImage::create([
            'product_id' => $product10->id,
            'image_name' => 'soap3.png',
        ]);

        $product10Image4 = ProductImage::create([
            'product_id' => $product10->id,
            'image_name' => 'soap4.png',
        ]);
        // soap end

        //dark fantasy end
    }
}