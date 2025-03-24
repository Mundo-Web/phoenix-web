<?php

namespace Database\Seeders;

use App\Models\Strength;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            /*
            DashboardTableSeeder::class,
            AnalyticsTableSeeder::class,
            FintechTableSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            InvoiceSeeder::class,
            MemberSeeder::class,
            TransactionSeeder::class,
            JobSeeder::class,
            CampaignSeeder::class,
            MarketerSeeder::class,
            CampaignMarketerSeeder::class,
            */
            // CategorySeeder::class,
            // ProductSeeder::class,
            // AttributesSeeder::class,
            DiscountTypeSeeder::class,
            RoleSeeder::class,
            UsersSeeder::class,
            //MessageSeeder::class,
            GeneralSeeder::class,
            //FaqsSeeder::class,
            //BeneficiosSeeder::class,
            //SliderSeeder::class,
            // SubCategorySeeder::class,
            
            StatusSeeder::class,
            PricesTableSeeder::class,
            PoliticasDatos::class,
            AboutUsSeeder::class,
            ProjectSeeder::class,
            HomeViewSeeder::class,
            StrengthSeeder::class,
            ShortcodeSeeder::class,
            NewUserSeeder::class,
            
            //ServiceSeeder::class,
        ]);
        
    }
}
