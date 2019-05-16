<?php

use App\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $Property = new Property();
       $Property->name = "OYO STATE SMALL SCALE INDUSTRIES COMPLEX";
       $Property->landlord_id = 1;
       $Property->is_new = "Pre-Occupied";
       $Property->state = "OYO";
       $Property->bank_name = "ECO BANK NIG. PLC";
       $Property->is_bank = "Yes";
       $Property->is_dormant = "";
       $Property->dormant_date = "";
       $Property->officer_id = "5";
       $Property->created_by_id = 1;
       $Property->property_type_id = 8;
       $Property->save();

       $Property = new Property();
       $Property->name = "Arijo shopping complex at Agbeni, Ibadan";
       $Property->landlord_id = 3;
       $Property->is_new = "Pre-Occupied";
       $Property->state = "OYO";
       $Property->bank_name = "First City Monument Ban";
       $Property->is_bank = "Yes";
       $Property->is_dormant = "No";
       $Property->dormant_date = "";
       $Property->officer_id = "5";
       $Property->created_by_id = 1;
       $Property->property_type_id = 9;
       $Property->save();

       $Property = new Property();
       $Property->name = "2no shops at New Gbagi Market, Ibadan of Alhaji Ibrahim Oyeleye";
       $Property->landlord_id = 4;
       $Property->is_new = "Pre-Occupied";
       $Property->state = "OYO";
       $Property->bank_name = "First Bank";
       $Property->is_bank = "Yes";
       $Property->is_dormant = "No";
       $Property->dormant_date = "2016-01-28 12:47:09";
       $Property->officer_id = "5";
       $Property->created_by_id = 1;
       $Property->property_type_id = 10;
       $Property->save();

       $Property = new Property();
       $Property->name = "OYSSIC";
       $Property->landlord_id = 1;
       $Property->is_new = "Pre-Occupied";
       $Property->state = "OYO";
       $Property->bank_name = "ECO BANK NIG. PLC";
       $Property->is_bank = "Yes";
       $Property->is_dormant = "No";
       $Property->dormant_date = "";
       $Property->officer_id = "5";
       $Property->created_by_id = 1;
       $Property->property_type_id = 8;
       $Property->save();

     }
}
