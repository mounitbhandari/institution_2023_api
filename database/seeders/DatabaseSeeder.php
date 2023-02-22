<?php

namespace Database\Seeders;




use App\Models\Chapter;
use App\Models\Option;
use App\Models\Organisation;
use App\Models\Question;
use App\Models\QuestionLevel;
use App\Models\FeesModeType;
use App\Models\Ledger;
use App\Models\LedgerGroup;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Models\TransactionType;
use App\Models\VoucherType;
use Carbon\Traits\Options;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
use App\Models\State;
use App\Models\Course;
use App\Models\District;
use App\Models\DurationType;
use App\Models\StudentCourseRegistration;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Adding user type');
        // \App\Models\User::factory(10)->create();
        //person_types table data
        UserType::create(['user_type_name' => 'Owner']);            #1
        UserType::create(['user_type_name' => 'Developer']);        #2
        UserType::create(['user_type_name' => 'Admin']);            #3
        UserType::create(['user_type_name' => 'Manager']);          #4
        UserType::create(['user_type_name' => 'Worker']);           #5
        UserType::create(['user_type_name' => 'Accountant']);       #6
        UserType::create(['user_type_name' => 'Office Staff']);     #7
        UserType::create(['user_type_name' => 'Student']);          #8

        $this->command->info('Adding Organisation');
        //Organisation::create(['organisation_name'=>'Master Organisation']);  #1

        Organisation::create(['organisation_name'=>'Barrackpore Academy of IT','address'=>'Barrackpore','city'=>'Kolkata'
        ,'district'=>'24pgs','pin'=>'700120','contact_number'=>'7605887990','whatsapp_number'=>'9163196112',
        'email_id'=>'ngsutradhar50@gmail.com','account_number'=>'9616641644777']); #1

        Organisation::create(['organisation_name'=>'Ace Info Solution','address'=>'Barrackpore','city'=>'Kolkata'
        ,'district'=>'24pgs','pin'=>'700122','contact_number'=>'6978456210','whatsapp_number'=>'9163196112',
        'email_id'=>'sukantahui@gmail.com','account_number'=>'9616641644745577']); #2

        Organisation::create(['organisation_name'=>'All India Yuba Computer Saksharata Mission','address'=>'Barrackpore','city'=>'Kolkata'
        ,'district'=>'24pgs','pin'=>'700121','contact_number'=>'7605887990','whatsapp_number'=>'9163196112',
        'email_id'=>'aiycsm@gmail.com','account_number'=>'961678987777']); #3

       /*  //working Days
        WorkingDays::create(['count_days'=>1,'total_days'=>30,'start_date'=>'2023-01-01'
        ,'end_date'=>'2023-01-31','description'=>"BAIT",'organisation_id'=>1]); */
        //owner
        User::create(['user_name'=>'Tanusree Hui','mobile1'=>'9836444999','mobile2'=>'100'
        ,'email'=>'owner','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'organisation_id'=>1]);

        User::create(['user_name'=>'Nanda Gopal','mobile1'=>'7605887990','mobile2'=>'9163196112'
        ,'email'=>'ngsutradhar50@gmail.com','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'organisation_id'=>2]);

        //developer
        User::create(['user_name'=>'Sukanta Hui','mobile1'=>'9836444999','mobile2'=>'101'
            ,'email'=>'developer','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>2,'organisation_id'=>1]);

        //admin
        User::create(['user_name'=>'Sreeparna Das','mobile1'=>'9836444999','mobile2'=>'102'
            ,'email'=>'admin','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>3,'organisation_id'=>1]);

        //student
        User::create(['user_name'=>'Coder Student','mobile1'=>'9836444999','mobile2'=>'108'
            ,'email'=>'student','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>8,'organisation_id'=>1]);


        //storing state
        State::insert([
            ['state_code'=>0,'state_name'=>'Not applicable'],
            ['state_code'=>1,'state_name'=>'Jammu & Kashmir'],
            ['state_code'=>2,'state_name'=>'Himachal Pradesh'],
            ['state_code'=>3,'state_name'=>'Punjab'],
            ['state_code'=>4,'state_name'=>'Chandigarh'],
            ['state_code'=>5,'state_name'=>'Uttranchal'],
            ['state_code'=>6,'state_name'=>'Haryana'],
            ['state_code'=>7,'state_name'=>'Delhi'],
            ['state_code'=>8,'state_name'=>'Rajasthan'],
            ['state_code'=>9,'state_name'=>'Uttar Pradesh'],
            ['state_code'=>10,'state_name'=>'Bihar'],
            ['state_code'=>11,'state_name'=>'Sikkim'],
            ['state_code'=>12,'state_name'=>'Arunachal Pradesh'],
            ['state_code'=>13,'state_name'=>'Nagaland'],
            ['state_code'=>14,'state_name'=>'Manipur'],
            ['state_code'=>15,'state_name'=>'Mizoram'],
            ['state_code'=>16,'state_name'=>'Tripura'],
            ['state_code'=>17,'state_name'=>'Meghalaya'],
            ['state_code'=>18,'state_name'=>'Assam'],
            ['state_code'=>19,'state_name'=>'West Bengal'],
            ['state_code'=>20,'state_name'=>'Jharkhand'],
            ['state_code'=>21,'state_name'=>'Odisha (Formerly Orissa'],
            ['state_code'=>22,'state_name'=>'Chhattisgarh'],
            ['state_code'=>23,'state_name'=>'Madhya Pradesh'],
            ['state_code'=>24,'state_name'=>'Gujarat'],
            ['state_code'=>25,'state_name'=>'Daman & Diu'],
            ['state_code'=>26,'state_name'=>'Dadra & Nagar Haveli'],
            ['state_code'=>27,'state_name'=>'Maharashtra'],
            ['state_code'=>28,'state_name'=>'Andhra Pradesh'],
            ['state_code'=>29,'state_name'=>'Karnataka'],
            ['state_code'=>30,'state_name'=>'Goa'],
            ['state_code'=>31,'state_name'=>'Lakshdweep'],
            ['state_code'=>32,'state_name'=>'Kerala'],
            ['state_code'=>33,'state_name'=>'Tamil Nadu'],
            ['state_code'=>34,'state_name'=>'Pondicherry'],
            ['state_code'=>35,'state_name'=>'Andaman & Nicobar Islands'],
            ['state_code'=>36,'state_name'=>'Telangana'],
            ['state_code'=>37,'state_name'=>'Ladak']
        ]);
        District::insert([
            ['state_id'=>2,'district_name'=>'Anantnag'],
            ['state_id'=>2,'district_name'=>'Bandipora'],
            ['state_id'=>2,'district_name'=>'Baramulla'],
            ['state_id'=>2,'district_name'=>'Budgam'],
            ['state_id'=>2,'district_name'=>'Doda'],
            ['state_id'=>2,'district_name'=>'Ganderbal'],
            ['state_id'=>2,'district_name'=>'Jammu'],
            ['state_id'=>2,'district_name'=>'Kathua'],
            ['state_id'=>2,'district_name'=>'Kishtwar'],
            ['state_id'=>2,'district_name'=>'Kulgam'],
            ['state_id'=>2,'district_name'=>'Kupwara'],
            ['state_id'=>2,'district_name'=>'Poonch'],
            ['state_id'=>2,'district_name'=>'Pulwama'],
            ['state_id'=>2,'district_name'=>'Rajouri'],
            ['state_id'=>2,'district_name'=>'Ramban'],
            ['state_id'=>2,'district_name'=>'Reasi'],
            ['state_id'=>2,'district_name'=>'Samba'],
            ['state_id'=>2,'district_name'=>'Shopian'],
            ['state_id'=>2,'district_name'=>'Srinagar'],
            ['state_id'=>2,'district_name'=>'Udhampur'],
            ['state_id'=>3,'district_name'=>'Bilaspur'],
            ['state_id'=>3,'district_name'=>'Chamba'],
            ['state_id'=>3,'district_name'=>'Hamirpur'],
            ['state_id'=>3,'district_name'=>'Kangra'],
            ['state_id'=>3,'district_name'=>'Kinnaur'],
            ['state_id'=>3,'district_name'=>'Kullu'],
            ['state_id'=>3,'district_name'=>'Lahaul Spiti'],
            ['state_id'=>3,'district_name'=>'Mandi'],
            ['state_id'=>3,'district_name'=>'Shimla'],
            ['state_id'=>3,'district_name'=>'Sirmaur'],
            ['state_id'=>3,'district_name'=>'Solan'],
            ['state_id'=>3,'district_name'=>'Una'],
            ['state_id'=>4,'district_name'=>'Amritsar'],
            ['state_id'=>4,'district_name'=>'Barnala'],
            ['state_id'=>4,'district_name'=>'Bathinda'],
            ['state_id'=>4,'district_name'=>'Faridkot'],
            ['state_id'=>4,'district_name'=>'Fatehgarh Sahib'],
            ['state_id'=>4,'district_name'=>'Fazilka'],
            ['state_id'=>4,'district_name'=>'Firozpur'],
            ['state_id'=>4,'district_name'=>'Gurdaspur'],
            ['state_id'=>4,'district_name'=>'Hoshiarpur'],
            ['state_id'=>4,'district_name'=>'Jalandhar'],
            ['state_id'=>4,'district_name'=>'Kapurthala'],
            ['state_id'=>4,'district_name'=>'Ludhiana'],
            ['state_id'=>4,'district_name'=>'Malerkotla'],
            ['state_id'=>4,'district_name'=>'Mansa'],
            ['state_id'=>4,'district_name'=>'Moga'],
            ['state_id'=>4,'district_name'=>'Mohali'],
            ['state_id'=>4,'district_name'=>'Muktsar'],
            ['state_id'=>4,'district_name'=>'Pathankot'],
            ['state_id'=>4,'district_name'=>'Patiala'],
            ['state_id'=>4,'district_name'=>'Rupnagar'],
            ['state_id'=>4,'district_name'=>'Sangrur'],
            ['state_id'=>4,'district_name'=>'Shaheed Bhagat Singh Nagar'],
            ['state_id'=>4,'district_name'=>'Tarn Taran'],
            ['state_id'=>5,'district_name'=>'Chandigarh'],
            ['state_id'=>6,'district_name'=>'Almora'],
            ['state_id'=>6,'district_name'=>'Bageshwar'],
            ['state_id'=>6,'district_name'=>'Chamoli'],
            ['state_id'=>6,'district_name'=>'Champawat'],
            ['state_id'=>6,'district_name'=>'Dehradun'],
            ['state_id'=>6,'district_name'=>'Haridwar'],
            ['state_id'=>6,'district_name'=>'Nainital'],
            ['state_id'=>6,'district_name'=>'Pauri'],
            ['state_id'=>6,'district_name'=>'Pithoragarh'],
            ['state_id'=>6,'district_name'=>'Rudraprayag'],
            ['state_id'=>6,'district_name'=>'Tehri'],
            ['state_id'=>6,'district_name'=>'Udham Singh Nagar'],
            ['state_id'=>6,'district_name'=>'Uttarkashi'],
            ['state_id'=>7,'district_name'=>'Ambala'],
            ['state_id'=>7,'district_name'=>'Bhiwani'],
            ['state_id'=>7,'district_name'=>'Charkhi Dadri'],
            ['state_id'=>7,'district_name'=>'Faridabad'],
            ['state_id'=>7,'district_name'=>'Fatehabad'],
            ['state_id'=>7,'district_name'=>'Gurugram'],
            ['state_id'=>7,'district_name'=>'Hisar'],
            ['state_id'=>7,'district_name'=>'Jhajjar'],
            ['state_id'=>7,'district_name'=>'Jind'],
            ['state_id'=>7,'district_name'=>'Kaithal'],
            ['state_id'=>7,'district_name'=>'Karnal'],
            ['state_id'=>7,'district_name'=>'Kurukshetra'],
            ['state_id'=>7,'district_name'=>'Mahendragarh'],
            ['state_id'=>7,'district_name'=>'Mewat'],
            ['state_id'=>7,'district_name'=>'Palwal'],
            ['state_id'=>7,'district_name'=>'Panchkula'],
            ['state_id'=>7,'district_name'=>'Panipat'],
            ['state_id'=>7,'district_name'=>'Rewari'],
            ['state_id'=>7,'district_name'=>'Rohtak'],
            ['state_id'=>7,'district_name'=>'Sirsa'],
            ['state_id'=>7,'district_name'=>'Sonipat'],
            ['state_id'=>7,'district_name'=>'Yamunanagar'],
            ['state_id'=>8,'district_name'=>'Central Delhi'],
            ['state_id'=>8,'district_name'=>'East Delhi'],
            ['state_id'=>8,'district_name'=>'New Delhi'],
            ['state_id'=>8,'district_name'=>'North Delhi'],
            ['state_id'=>8,'district_name'=>'North East Delhi'],
            ['state_id'=>8,'district_name'=>'North West Delhi'],
            ['state_id'=>8,'district_name'=>'Shahdara'],
            ['state_id'=>8,'district_name'=>'South Delhi'],
            ['state_id'=>8,'district_name'=>'South East Delhi'],
            ['state_id'=>8,'district_name'=>'South West Delhi'],
            ['state_id'=>8,'district_name'=>'West Delhi'],
            ['state_id'=>9,'district_name'=>'Ajmer'],
            ['state_id'=>9,'district_name'=>'Alwar'],
            ['state_id'=>9,'district_name'=>'Banswara'],
            ['state_id'=>9,'district_name'=>'Baran'],
            ['state_id'=>9,'district_name'=>'Barmer'],
            ['state_id'=>9,'district_name'=>'Bharatpur'],
            ['state_id'=>9,'district_name'=>'Bhilwara'],
            ['state_id'=>9,'district_name'=>'Bikaner'],
            ['state_id'=>9,'district_name'=>'Bundi'],
            ['state_id'=>9,'district_name'=>'Chittorgarh'],
            ['state_id'=>9,'district_name'=>'Churu'],
            ['state_id'=>9,'district_name'=>'Dausa'],
            ['state_id'=>9,'district_name'=>'Dholpur'],
            ['state_id'=>9,'district_name'=>'Dungarpur'],
            ['state_id'=>9,'district_name'=>'Hanumangarh'],
            ['state_id'=>9,'district_name'=>'Jaipur'],
            ['state_id'=>9,'district_name'=>'Jaisalmer'],
            ['state_id'=>9,'district_name'=>'Jalore'],
            ['state_id'=>9,'district_name'=>'Jhalawar'],
            ['state_id'=>9,'district_name'=>'Jhunjhunu'],
            ['state_id'=>9,'district_name'=>'Jodhpur'],
            ['state_id'=>9,'district_name'=>'Karauli'],
            ['state_id'=>9,'district_name'=>'Kota'],
            ['state_id'=>9,'district_name'=>'Nagaur'],
            ['state_id'=>9,'district_name'=>'Pali'],
            ['state_id'=>9,'district_name'=>'Pratapgarh'],
            ['state_id'=>9,'district_name'=>'Rajsamand'],
            ['state_id'=>9,'district_name'=>'Sawai Madhopur'],
            ['state_id'=>9,'district_name'=>'Sikar'],
            ['state_id'=>9,'district_name'=>'Sirohi'],
            ['state_id'=>9,'district_name'=>'Sri Ganganagar'],
            ['state_id'=>9,'district_name'=>'Tonk'],
            ['state_id'=>9,'district_name'=>'Udaipur'],
            ['state_id'=>10,'district_name'=>'Agra'],
            ['state_id'=>10,'district_name'=>'Aligarh'],
            ['state_id'=>10,'district_name'=>'Ambedkar Nagar'],
            ['state_id'=>10,'district_name'=>'Amethi'],
            ['state_id'=>10,'district_name'=>'Amroha'],
            ['state_id'=>10,'district_name'=>'Auraiya'],
            ['state_id'=>10,'district_name'=>'Ayodhya'],
            ['state_id'=>10,'district_name'=>'Azamgarh'],
            ['state_id'=>10,'district_name'=>'Baghpat'],
            ['state_id'=>10,'district_name'=>'Bahraich'],
            ['state_id'=>10,'district_name'=>'Ballia'],
            ['state_id'=>10,'district_name'=>'Balrampur'],
            ['state_id'=>10,'district_name'=>'Banda'],
            ['state_id'=>10,'district_name'=>'Barabanki'],
            ['state_id'=>10,'district_name'=>'Bareilly'],
            ['state_id'=>10,'district_name'=>'Basti'],
            ['state_id'=>10,'district_name'=>'Bhadohi'],
            ['state_id'=>10,'district_name'=>'Bijnor'],
            ['state_id'=>10,'district_name'=>'Budaun'],
            ['state_id'=>10,'district_name'=>'Bulandshahr'],
            ['state_id'=>10,'district_name'=>'Chandauli'],
            ['state_id'=>10,'district_name'=>'Chitrakoot'],
            ['state_id'=>10,'district_name'=>'Deoria'],
            ['state_id'=>10,'district_name'=>'Etah'],
            ['state_id'=>10,'district_name'=>'Etawah'],
            ['state_id'=>10,'district_name'=>'Farrukhabad'],
            ['state_id'=>10,'district_name'=>'Fatehpur'],
            ['state_id'=>10,'district_name'=>'Firozabad'],
            ['state_id'=>10,'district_name'=>'Gautam Buddha Nagar'],
            ['state_id'=>10,'district_name'=>'Ghaziabad'],
            ['state_id'=>10,'district_name'=>'Ghazipur'],
            ['state_id'=>10,'district_name'=>'Gonda'],
            ['state_id'=>10,'district_name'=>'Gorakhpur'],
            ['state_id'=>10,'district_name'=>'Hamirpur'],
            ['state_id'=>10,'district_name'=>'Hapur'],
            ['state_id'=>10,'district_name'=>'Hardoi'],
            ['state_id'=>10,'district_name'=>'Hathras'],
            ['state_id'=>10,'district_name'=>'Jalaun'],
            ['state_id'=>10,'district_name'=>'Jaunpur'],
            ['state_id'=>10,'district_name'=>'Jhansi'],
            ['state_id'=>10,'district_name'=>'Kannauj'],
            ['state_id'=>10,'district_name'=>'Kanpur Dehat'],
            ['state_id'=>10,'district_name'=>'Kanpur Nagar'],
            ['state_id'=>10,'district_name'=>'Kasganj'],
            ['state_id'=>10,'district_name'=>'Kaushambi'],
            ['state_id'=>10,'district_name'=>'Kheri'],
            ['state_id'=>10,'district_name'=>'Kushinagar'],
            ['state_id'=>10,'district_name'=>'Lalitpur'],
            ['state_id'=>10,'district_name'=>'Lucknow'],
            ['state_id'=>10,'district_name'=>'Maharajganj'],
            ['state_id'=>10,'district_name'=>'Mahoba'],
            ['state_id'=>10,'district_name'=>'Mainpuri'],
            ['state_id'=>10,'district_name'=>'Mathura'],
            ['state_id'=>10,'district_name'=>'Mau'],
            ['state_id'=>10,'district_name'=>'Meerut'],
            ['state_id'=>10,'district_name'=>'Mirzapur'],
            ['state_id'=>10,'district_name'=>'Moradabad'],
            ['state_id'=>10,'district_name'=>'Muzaffarnagar'],
            ['state_id'=>10,'district_name'=>'Pilibhit'],
            ['state_id'=>10,'district_name'=>'Pratapgarh'],
            ['state_id'=>10,'district_name'=>'Prayagraj'],
            ['state_id'=>10,'district_name'=>'Raebareli'],
            ['state_id'=>10,'district_name'=>'Rampur'],
            ['state_id'=>10,'district_name'=>'Saharanpur'],
            ['state_id'=>10,'district_name'=>'Sambhal'],
            ['state_id'=>10,'district_name'=>'Sant Kabir Nagar'],
            ['state_id'=>10,'district_name'=>'Shahjahanpur'],
            ['state_id'=>10,'district_name'=>'Shamli'],
            ['state_id'=>10,'district_name'=>'Shravasti'],
            ['state_id'=>10,'district_name'=>'Siddharthnagar'],
            ['state_id'=>10,'district_name'=>'Sitapur'],
            ['state_id'=>10,'district_name'=>'Sonbhadra'],
            ['state_id'=>10,'district_name'=>'Sultanpur'],
            ['state_id'=>10,'district_name'=>'Unnao'],
            ['state_id'=>10,'district_name'=>'Varanasi'],
            ['state_id'=>11,'district_name'=>'Araria'],
            ['state_id'=>11,'district_name'=>'Arwal'],
            ['state_id'=>11,'district_name'=>'Aurangabad'],
            ['state_id'=>11,'district_name'=>'Banka'],
            ['state_id'=>11,'district_name'=>'Begusarai'],
            ['state_id'=>11,'district_name'=>'Bhagalpur'],
            ['state_id'=>11,'district_name'=>'Bhojpur'],
            ['state_id'=>11,'district_name'=>'Buxar'],
            ['state_id'=>11,'district_name'=>'Darbhanga'],
            ['state_id'=>11,'district_name'=>'East Champaran'],
            ['state_id'=>11,'district_name'=>'Gaya'],
            ['state_id'=>11,'district_name'=>'Gopalganj'],
            ['state_id'=>11,'district_name'=>'Jamui'],
            ['state_id'=>11,'district_name'=>'Jehanabad'],
            ['state_id'=>11,'district_name'=>'Kaimur'],
            ['state_id'=>11,'district_name'=>'Katihar'],
            ['state_id'=>11,'district_name'=>'Khagaria'],
            ['state_id'=>11,'district_name'=>'Kishanganj'],
            ['state_id'=>11,'district_name'=>'Lakhisarai'],
            ['state_id'=>11,'district_name'=>'Madhepura'],
            ['state_id'=>11,'district_name'=>'Madhubani'],
            ['state_id'=>11,'district_name'=>'Munger'],
            ['state_id'=>11,'district_name'=>'Muzaffarpur'],
            ['state_id'=>11,'district_name'=>'Nalanda'],
            ['state_id'=>11,'district_name'=>'Nawada'],
            ['state_id'=>11,'district_name'=>'Patna'],
            ['state_id'=>11,'district_name'=>'Purnia'],
            ['state_id'=>11,'district_name'=>'Rohtas'],
            ['state_id'=>11,'district_name'=>'Saharsa'],
            ['state_id'=>11,'district_name'=>'Samastipur'],
            ['state_id'=>11,'district_name'=>'Saran'],
            ['state_id'=>11,'district_name'=>'Sheikhpura'],
            ['state_id'=>11,'district_name'=>'Sheohar'],
            ['state_id'=>11,'district_name'=>'Sitamarhi'],
            ['state_id'=>11,'district_name'=>'Siwan'],
            ['state_id'=>11,'district_name'=>'Supaul'],
            ['state_id'=>11,'district_name'=>'Vaishali'],
            ['state_id'=>11,'district_name'=>'West Champaran'],
            ['state_id'=>12,'district_name'=>'East Sikkim'],
            ['state_id'=>12,'district_name'=>'North Sikkim'],
            ['state_id'=>12,'district_name'=>'South Sikkim'],
            ['state_id'=>12,'district_name'=>'West Sikkim'],
            ['state_id'=>13,'district_name'=>'Anjaw'],
            ['state_id'=>13,'district_name'=>'Central Siang'],
            ['state_id'=>13,'district_name'=>'Changlang'],
            ['state_id'=>13,'district_name'=>'Dibang Valley'],
            ['state_id'=>13,'district_name'=>'East Kameng'],
            ['state_id'=>13,'district_name'=>'East Siang'],
            ['state_id'=>13,'district_name'=>'Kamle'],
            ['state_id'=>13,'district_name'=>'Kra Daadi'],
            ['state_id'=>13,'district_name'=>'Kurung Kumey'],
            ['state_id'=>13,'district_name'=>'Lepa Rada'],
            ['state_id'=>13,'district_name'=>'Lohit'],
            ['state_id'=>13,'district_name'=>'Longding'],
            ['state_id'=>13,'district_name'=>'Lower Dibang Valley'],
            ['state_id'=>13,'district_name'=>'Lower Siang'],
            ['state_id'=>13,'district_name'=>'Lower Subansiri'],
            ['state_id'=>13,'district_name'=>'Namsai'],
            ['state_id'=>13,'district_name'=>'Pakke Kessang'],
            ['state_id'=>13,'district_name'=>'Papum Pare'],
            ['state_id'=>13,'district_name'=>'Shi Yomi'],
            ['state_id'=>13,'district_name'=>'Tawang'],
            ['state_id'=>13,'district_name'=>'Tirap'],
            ['state_id'=>13,'district_name'=>'Upper Siang'],
            ['state_id'=>13,'district_name'=>'Upper Subansiri'],
            ['state_id'=>13,'district_name'=>'West Kameng'],
            ['state_id'=>13,'district_name'=>'West Siang'],
            ['state_id'=>14,'district_name'=>'Chumukedima'],
            ['state_id'=>14,'district_name'=>'Dimapur'],
            ['state_id'=>14,'district_name'=>'Kiphire'],
            ['state_id'=>14,'district_name'=>'Kohima'],
            ['state_id'=>14,'district_name'=>'Longleng'],
            ['state_id'=>14,'district_name'=>'Mokokchung'],
            ['state_id'=>14,'district_name'=>'Mon'],
            ['state_id'=>14,'district_name'=>'Niuland'],
            ['state_id'=>14,'district_name'=>'Noklak'],
            ['state_id'=>14,'district_name'=>'Peren'],
            ['state_id'=>14,'district_name'=>'Phek'],
            ['state_id'=>14,'district_name'=>'Tseminyu'],
            ['state_id'=>14,'district_name'=>'Tuensang'],
            ['state_id'=>14,'district_name'=>'Wokha'],
            ['state_id'=>14,'district_name'=>'Zunheboto'],
            ['state_id'=>15,'district_name'=>'Bishnupur'],
            ['state_id'=>15,'district_name'=>'Chandel'],
            ['state_id'=>15,'district_name'=>'Churachandpur'],
            ['state_id'=>15,'district_name'=>'Imphal East'],
            ['state_id'=>15,'district_name'=>'Imphal West'],
            ['state_id'=>15,'district_name'=>'Jiribam'],
            ['state_id'=>15,'district_name'=>'Kakching'],
            ['state_id'=>15,'district_name'=>'Kamjong'],
            ['state_id'=>15,'district_name'=>'Kangpokpi'],
            ['state_id'=>15,'district_name'=>'Noney'],
            ['state_id'=>15,'district_name'=>'Pherzawl'],
            ['state_id'=>15,'district_name'=>'Senapati'],
            ['state_id'=>15,'district_name'=>'Tamenglong'],
            ['state_id'=>15,'district_name'=>'Tengnoupal'],
            ['state_id'=>15,'district_name'=>'Thoubal'],
            ['state_id'=>15,'district_name'=>'Ukhrul'],
            ['state_id'=>16,'district_name'=>'Aizawl'],
            ['state_id'=>16,'district_name'=>'Champhai'],
            ['state_id'=>16,'district_name'=>'Hnahthial'],
            ['state_id'=>16,'district_name'=>'Khawzawl'],
            ['state_id'=>16,'district_name'=>'Kolasib'],
            ['state_id'=>16,'district_name'=>'Lawngtlai'],
            ['state_id'=>16,'district_name'=>'Lunglei'],
            ['state_id'=>16,'district_name'=>'Mamit'],
            ['state_id'=>16,'district_name'=>'Saiha'],
            ['state_id'=>16,'district_name'=>'Saitual'],
            ['state_id'=>16,'district_name'=>'Serchhip'],
            ['state_id'=>17,'district_name'=>'Dhalai'],
            ['state_id'=>17,'district_name'=>'Gomati'],
            ['state_id'=>17,'district_name'=>'Khowai'],
            ['state_id'=>17,'district_name'=>'North Tripura'],
            ['state_id'=>17,'district_name'=>'Sepahijala'],
            ['state_id'=>17,'district_name'=>'South Tripura'],
            ['state_id'=>17,'district_name'=>'Unakoti'],
            ['state_id'=>17,'district_name'=>'West Tripura'],
            ['state_id'=>18,'district_name'=>'East Garo Hills'],
            ['state_id'=>18,'district_name'=>'East Jaintia Hills'],
            ['state_id'=>18,'district_name'=>'East Khasi Hills'],
            ['state_id'=>18,'district_name'=>'Mairang'],
            ['state_id'=>18,'district_name'=>'North Garo Hills'],
            ['state_id'=>18,'district_name'=>'Ri Bhoi'],
            ['state_id'=>18,'district_name'=>'South Garo Hills'],
            ['state_id'=>18,'district_name'=>'South West Garo Hills'],
            ['state_id'=>18,'district_name'=>'South West Khasi Hills'],
            ['state_id'=>18,'district_name'=>'West Garo Hills'],
            ['state_id'=>18,'district_name'=>'West Jaintia Hills'],
            ['state_id'=>18,'district_name'=>'West Khasi Hills'],
            ['state_id'=>19,'district_name'=>'Bajali'],
            ['state_id'=>19,'district_name'=>'Baksa'],
            ['state_id'=>19,'district_name'=>'Barpeta'],
            ['state_id'=>19,'district_name'=>'Biswanath'],
            ['state_id'=>19,'district_name'=>'Bongaigaon'],
            ['state_id'=>19,'district_name'=>'Cachar'],
            ['state_id'=>19,'district_name'=>'Charaideo'],
            ['state_id'=>19,'district_name'=>'Chirang'],
            ['state_id'=>19,'district_name'=>'Darrang'],
            ['state_id'=>19,'district_name'=>'Dhemaji'],
            ['state_id'=>19,'district_name'=>'Dhubri'],
            ['state_id'=>19,'district_name'=>'Dibrugarh'],
            ['state_id'=>19,'district_name'=>'Dima Hasao'],
            ['state_id'=>19,'district_name'=>'Goalpara'],
            ['state_id'=>19,'district_name'=>'Golaghat'],
            ['state_id'=>19,'district_name'=>'Hailakandi'],
            ['state_id'=>19,'district_name'=>'Hojai'],
            ['state_id'=>19,'district_name'=>'Jorhat'],
            ['state_id'=>19,'district_name'=>'Kamrup'],
            ['state_id'=>19,'district_name'=>'Kamrup Metropolitan'],
            ['state_id'=>19,'district_name'=>'Karbi Anglong'],
            ['state_id'=>19,'district_name'=>'Karimganj'],
            ['state_id'=>19,'district_name'=>'Kokrajhar'],
            ['state_id'=>19,'district_name'=>'Lakhimpur'],
            ['state_id'=>19,'district_name'=>'Majuli'],
            ['state_id'=>19,'district_name'=>'Morigaon'],
            ['state_id'=>19,'district_name'=>'Nagaon'],
            ['state_id'=>19,'district_name'=>'Nalbari'],
            ['state_id'=>19,'district_name'=>'Sivasagar'],
            ['state_id'=>19,'district_name'=>'Sonitpur'],
            ['state_id'=>19,'district_name'=>'South Salmara-Mankachar'],
            ['state_id'=>19,'district_name'=>'Tinsukia'],
            ['state_id'=>19,'district_name'=>'Udalguri'],
            ['state_id'=>19,'district_name'=>'West Karbi Anglong'],
            ['state_id'=>20,'district_name'=>'Alipurduar'],
            ['state_id'=>20,'district_name'=>'Bankura'],
            ['state_id'=>20,'district_name'=>'Birbhum'],
            ['state_id'=>20,'district_name'=>'Cooch Behar'],
            ['state_id'=>20,'district_name'=>'Dakshin Dinajpur'],
            ['state_id'=>20,'district_name'=>'Darjeeling'],
            ['state_id'=>20,'district_name'=>'Hooghly'],
            ['state_id'=>20,'district_name'=>'Howrah'],
            ['state_id'=>20,'district_name'=>'Jalpaiguri'],
            ['state_id'=>20,'district_name'=>'Jhargram'],
            ['state_id'=>20,'district_name'=>'Kalimpong'],
            ['state_id'=>20,'district_name'=>'Kolkata'],
            ['state_id'=>20,'district_name'=>'Malda'],
            ['state_id'=>20,'district_name'=>'Murshidabad'],
            ['state_id'=>20,'district_name'=>'Nadia'],
            ['state_id'=>20,'district_name'=>'North 24 Parganas'],
            ['state_id'=>20,'district_name'=>'Paschim Bardhaman'],
            ['state_id'=>20,'district_name'=>'Paschim Medinipur'],
            ['state_id'=>20,'district_name'=>'Purba Bardhaman'],
            ['state_id'=>20,'district_name'=>'Purba Medinipur'],
            ['state_id'=>20,'district_name'=>'Purulia'],
            ['state_id'=>20,'district_name'=>'South 24 Parganas'],
            ['state_id'=>20,'district_name'=>'Uttar Dinajpur'],
            ['state_id'=>21,'district_name'=>'Bokaro'],
            ['state_id'=>21,'district_name'=>'Chatra'],
            ['state_id'=>21,'district_name'=>'Deoghar'],
            ['state_id'=>21,'district_name'=>'Dhanbad'],
            ['state_id'=>21,'district_name'=>'Dumka'],
            ['state_id'=>21,'district_name'=>'East Singhbhum'],
            ['state_id'=>21,'district_name'=>'Garhwa'],
            ['state_id'=>21,'district_name'=>'Giridih'],
            ['state_id'=>21,'district_name'=>'Godda'],
            ['state_id'=>21,'district_name'=>'Gumla'],
            ['state_id'=>21,'district_name'=>'Hazaribagh'],
            ['state_id'=>21,'district_name'=>'Jamtara'],
            ['state_id'=>21,'district_name'=>'Khunti'],
            ['state_id'=>21,'district_name'=>'Koderma'],
            ['state_id'=>21,'district_name'=>'Latehar'],
            ['state_id'=>21,'district_name'=>'Lohardaga'],
            ['state_id'=>21,'district_name'=>'Pakur'],
            ['state_id'=>21,'district_name'=>'Palamu'],
            ['state_id'=>21,'district_name'=>'Ramgarh'],
            ['state_id'=>21,'district_name'=>'Ranchi'],
            ['state_id'=>21,'district_name'=>'Sahebganj'],
            ['state_id'=>21,'district_name'=>'Seraikela Kharsawan'],
            ['state_id'=>21,'district_name'=>'Simdega'],
            ['state_id'=>21,'district_name'=>'West Singhbhum'],
            ['state_id'=>22,'district_name'=>'Angul'],
            ['state_id'=>22,'district_name'=>'Balangir'],
            ['state_id'=>22,'district_name'=>'Balasore'],
            ['state_id'=>22,'district_name'=>'Bargarh'],
            ['state_id'=>22,'district_name'=>'Bhadrak'],
            ['state_id'=>22,'district_name'=>'Boudh'],
            ['state_id'=>22,'district_name'=>'Cuttack'],
            ['state_id'=>22,'district_name'=>'Debagarh'],
            ['state_id'=>22,'district_name'=>'Dhenkanal'],
            ['state_id'=>22,'district_name'=>'Gajapati'],
            ['state_id'=>22,'district_name'=>'Ganjam'],
            ['state_id'=>22,'district_name'=>'Jagatsinghpur'],
            ['state_id'=>22,'district_name'=>'Jajpur'],
            ['state_id'=>22,'district_name'=>'Jharsuguda'],
            ['state_id'=>22,'district_name'=>'Kalahandi'],
            ['state_id'=>22,'district_name'=>'Kandhamal'],
            ['state_id'=>22,'district_name'=>'Kendrapara'],
            ['state_id'=>22,'district_name'=>'Kendujhar'],
            ['state_id'=>22,'district_name'=>'Khordha'],
            ['state_id'=>22,'district_name'=>'Koraput'],
            ['state_id'=>22,'district_name'=>'Malkangiri'],
            ['state_id'=>22,'district_name'=>'Mayurbhanj'],
            ['state_id'=>22,'district_name'=>'Nabarangpur'],
            ['state_id'=>22,'district_name'=>'Nayagarh'],
            ['state_id'=>22,'district_name'=>'Nuapada'],
            ['state_id'=>22,'district_name'=>'Puri'],
            ['state_id'=>22,'district_name'=>'Rayagada'],
            ['state_id'=>22,'district_name'=>'Sambalpur'],
            ['state_id'=>22,'district_name'=>'Subarnapur'],
            ['state_id'=>22,'district_name'=>'Sundergarh'],
            ['state_id'=>23,'district_name'=>'Balod'],
            ['state_id'=>23,'district_name'=>'Baloda Bazar'],
            ['state_id'=>23,'district_name'=>'Balrampur'],
            ['state_id'=>23,'district_name'=>'Bastar'],
            ['state_id'=>23,'district_name'=>'Bemetara'],
            ['state_id'=>23,'district_name'=>'Bijapur'],
            ['state_id'=>23,'district_name'=>'Bilaspur'],
            ['state_id'=>23,'district_name'=>'Dantewada'],
            ['state_id'=>23,'district_name'=>'Dhamtari'],
            ['state_id'=>23,'district_name'=>'Durg'],
            ['state_id'=>23,'district_name'=>'Gariaband'],
            ['state_id'=>23,'district_name'=>'Gaurela Pendra Marwahi'],
            ['state_id'=>23,'district_name'=>'Janjgir Champa'],
            ['state_id'=>23,'district_name'=>'Jashpur'],
            ['state_id'=>23,'district_name'=>'Kabirdham'],
            ['state_id'=>23,'district_name'=>'Kanker'],
            ['state_id'=>23,'district_name'=>'Kondagaon'],
            ['state_id'=>23,'district_name'=>'Korba'],
            ['state_id'=>23,'district_name'=>'Koriya'],
            ['state_id'=>23,'district_name'=>'Mahasamund'],
            ['state_id'=>23,'district_name'=>'Manendragarh'],
            ['state_id'=>23,'district_name'=>'Mohla Manpur'],
            ['state_id'=>23,'district_name'=>'Mungeli'],
            ['state_id'=>23,'district_name'=>'Narayanpur'],
            ['state_id'=>23,'district_name'=>'Raigarh'],
            ['state_id'=>23,'district_name'=>'Raipur'],
            ['state_id'=>23,'district_name'=>'Rajnandgaon'],
            ['state_id'=>23,'district_name'=>'Sakti'],
            ['state_id'=>23,'district_name'=>'Sarangarh Bilaigarh'],
            ['state_id'=>23,'district_name'=>'Sukma'],
            ['state_id'=>23,'district_name'=>'Surajpur'],
            ['state_id'=>23,'district_name'=>'Surguja'],
            ['state_id'=>24,'district_name'=>'Agar Malwa'],
            ['state_id'=>24,'district_name'=>'Alirajpur'],
            ['state_id'=>24,'district_name'=>'Anuppur'],
            ['state_id'=>24,'district_name'=>'Ashoknagar'],
            ['state_id'=>24,'district_name'=>'Balaghat'],
            ['state_id'=>24,'district_name'=>'Barwani'],
            ['state_id'=>24,'district_name'=>'Betul'],
            ['state_id'=>24,'district_name'=>'Bhind'],
            ['state_id'=>24,'district_name'=>'Bhopal'],
            ['state_id'=>24,'district_name'=>'Burhanpur'],
            ['state_id'=>24,'district_name'=>'Chachaura'],
            ['state_id'=>24,'district_name'=>'Chhatarpur'],
            ['state_id'=>24,'district_name'=>'Chhindwara'],
            ['state_id'=>24,'district_name'=>'Damoh'],
            ['state_id'=>24,'district_name'=>'Datia'],
            ['state_id'=>24,'district_name'=>'Dewas'],
            ['state_id'=>24,'district_name'=>'Dhar'],
            ['state_id'=>24,'district_name'=>'Dindori'],
            ['state_id'=>24,'district_name'=>'Guna'],
            ['state_id'=>24,'district_name'=>'Gwalior'],
            ['state_id'=>24,'district_name'=>'Harda'],
            ['state_id'=>24,'district_name'=>'Hoshangabad'],
            ['state_id'=>24,'district_name'=>'Indore'],
            ['state_id'=>24,'district_name'=>'Jabalpur'],
            ['state_id'=>24,'district_name'=>'Jhabua'],
            ['state_id'=>24,'district_name'=>'Katni'],
            ['state_id'=>24,'district_name'=>'Khandwa'],
            ['state_id'=>24,'district_name'=>'Khargone'],
            ['state_id'=>24,'district_name'=>'Maihar'],
            ['state_id'=>24,'district_name'=>'Mandla'],
            ['state_id'=>24,'district_name'=>'Mandsaur'],
            ['state_id'=>24,'district_name'=>'Morena'],
            ['state_id'=>24,'district_name'=>'Nagda'],
            ['state_id'=>24,'district_name'=>'Narsinghpur'],
            ['state_id'=>24,'district_name'=>'Neemuch'],
            ['state_id'=>24,'district_name'=>'Niwari'],
            ['state_id'=>24,'district_name'=>'Panna'],
            ['state_id'=>24,'district_name'=>'Raisen'],
            ['state_id'=>24,'district_name'=>'Rajgarh'],
            ['state_id'=>24,'district_name'=>'Ratlam'],
            ['state_id'=>24,'district_name'=>'Rewa'],
            ['state_id'=>24,'district_name'=>'Sagar'],
            ['state_id'=>24,'district_name'=>'Satna'],
            ['state_id'=>24,'district_name'=>'Sehore'],
            ['state_id'=>24,'district_name'=>'Seoni'],
            ['state_id'=>24,'district_name'=>'Shahdol'],
            ['state_id'=>24,'district_name'=>'Shajapur'],
            ['state_id'=>24,'district_name'=>'Sheopur'],
            ['state_id'=>24,'district_name'=>'Shivpuri'],
            ['state_id'=>24,'district_name'=>'Sidhi'],
            ['state_id'=>24,'district_name'=>'Singrauli'],
            ['state_id'=>24,'district_name'=>'Tikamgarh'],
            ['state_id'=>24,'district_name'=>'Ujjain'],
            ['state_id'=>24,'district_name'=>'Umaria'],
            ['state_id'=>24,'district_name'=>'Vidisha'],
            ['state_id'=>25,'district_name'=>'Ahmedabad'],
            ['state_id'=>25,'district_name'=>'Amreli'],
            ['state_id'=>25,'district_name'=>'Anand'],
            ['state_id'=>25,'district_name'=>'Aravalli'],
            ['state_id'=>25,'district_name'=>'Banaskantha'],
            ['state_id'=>25,'district_name'=>'Bharuch'],
            ['state_id'=>25,'district_name'=>'Bhavnagar'],
            ['state_id'=>25,'district_name'=>'Botad'],
            ['state_id'=>25,'district_name'=>'Chhota Udaipur'],
            ['state_id'=>25,'district_name'=>'Dahod'],
            ['state_id'=>25,'district_name'=>'Dang'],
            ['state_id'=>25,'district_name'=>'Devbhoomi Dwarka'],
            ['state_id'=>25,'district_name'=>'Gandhinagar'],
            ['state_id'=>25,'district_name'=>'Gir Somnath'],
            ['state_id'=>25,'district_name'=>'Jamnagar'],
            ['state_id'=>25,'district_name'=>'Junagadh'],
            ['state_id'=>25,'district_name'=>'Kheda'],
            ['state_id'=>25,'district_name'=>'Kutch'],
            ['state_id'=>25,'district_name'=>'Mahisagar'],
            ['state_id'=>25,'district_name'=>'Mehsana'],
            ['state_id'=>25,'district_name'=>'Morbi'],
            ['state_id'=>25,'district_name'=>'Narmada'],
            ['state_id'=>25,'district_name'=>'Navsari'],
            ['state_id'=>25,'district_name'=>'Panchmahal'],
            ['state_id'=>25,'district_name'=>'Patan'],
            ['state_id'=>25,'district_name'=>'Porbandar'],
            ['state_id'=>25,'district_name'=>'Rajkot'],
            ['state_id'=>25,'district_name'=>'Sabarkantha'],
            ['state_id'=>25,'district_name'=>'Surat'],
            ['state_id'=>25,'district_name'=>'Surendranagar'],
            ['state_id'=>25,'district_name'=>'Tapi'],
            ['state_id'=>25,'district_name'=>'Vadodara'],
            ['state_id'=>25,'district_name'=>'Valsad'],
            ['state_id'=>27,'district_name'=>'Dadra and Nagar Haveli'],
            ['state_id'=>27,'district_name'=>'Daman'],
            ['state_id'=>27,'district_name'=>'Diu'],
            ['state_id'=>28,'district_name'=>'Ahmednagar'],
            ['state_id'=>28,'district_name'=>'Akola'],
            ['state_id'=>28,'district_name'=>'Amravati'],
            ['state_id'=>28,'district_name'=>'Aurangabad'],
            ['state_id'=>28,'district_name'=>'Beed'],
            ['state_id'=>28,'district_name'=>'Bhandara'],
            ['state_id'=>28,'district_name'=>'Buldhana'],
            ['state_id'=>28,'district_name'=>'Chandrapur'],
            ['state_id'=>28,'district_name'=>'Dhule'],
            ['state_id'=>28,'district_name'=>'Gadchiroli'],
            ['state_id'=>28,'district_name'=>'Gondia'],
            ['state_id'=>28,'district_name'=>'Hingoli'],
            ['state_id'=>28,'district_name'=>'Jalgaon'],
            ['state_id'=>28,'district_name'=>'Jalna'],
            ['state_id'=>28,'district_name'=>'Kolhapur'],
            ['state_id'=>28,'district_name'=>'Latur'],
            ['state_id'=>28,'district_name'=>'Mumbai City'],
            ['state_id'=>28,'district_name'=>'Mumbai Suburban'],
            ['state_id'=>28,'district_name'=>'Nagpur'],
            ['state_id'=>28,'district_name'=>'Nanded'],
            ['state_id'=>28,'district_name'=>'Nandurbar'],
            ['state_id'=>28,'district_name'=>'Nashik'],
            ['state_id'=>28,'district_name'=>'Osmanabad'],
            ['state_id'=>28,'district_name'=>'Palghar'],
            ['state_id'=>28,'district_name'=>'Parbhani'],
            ['state_id'=>28,'district_name'=>'Pune'],
            ['state_id'=>28,'district_name'=>'Raigad'],
            ['state_id'=>28,'district_name'=>'Ratnagiri'],
            ['state_id'=>28,'district_name'=>'Sangli'],
            ['state_id'=>28,'district_name'=>'Satara'],
            ['state_id'=>28,'district_name'=>'Sindhudurg'],
            ['state_id'=>28,'district_name'=>'Solapur'],
            ['state_id'=>28,'district_name'=>'Thane'],
            ['state_id'=>28,'district_name'=>'Wardha'],
            ['state_id'=>28,'district_name'=>'Washim'],
            ['state_id'=>28,'district_name'=>'Yavatmal'],
            ['state_id'=>29,'district_name'=>'Anantapur'],
            ['state_id'=>29,'district_name'=>'Chittoor'],
            ['state_id'=>29,'district_name'=>'East Godavari'],
            ['state_id'=>29,'district_name'=>'Guntur'],
            ['state_id'=>29,'district_name'=>'Kadapa'],
            ['state_id'=>29,'district_name'=>'Krishna'],
            ['state_id'=>29,'district_name'=>'Kurnool'],
            ['state_id'=>29,'district_name'=>'Nellore'],
            ['state_id'=>29,'district_name'=>'Prakasam'],
            ['state_id'=>29,'district_name'=>'Srikakulam'],
            ['state_id'=>29,'district_name'=>'Visakhapatnam'],
            ['state_id'=>29,'district_name'=>'Vizianagaram'],
            ['state_id'=>29,'district_name'=>'West Godavari'],
            ['state_id'=>30,'district_name'=>'Bagalkot'],
            ['state_id'=>30,'district_name'=>'Bangalore Rural'],
            ['state_id'=>30,'district_name'=>'Bangalore Urban'],
            ['state_id'=>30,'district_name'=>'Belgaum'],
            ['state_id'=>30,'district_name'=>'Bellary'],
            ['state_id'=>30,'district_name'=>'Bidar'],
            ['state_id'=>30,'district_name'=>'Chamarajanagar'],
            ['state_id'=>30,'district_name'=>'Chikkaballapur'],
            ['state_id'=>30,'district_name'=>'Chikkamagaluru'],
            ['state_id'=>30,'district_name'=>'Chitradurga'],
            ['state_id'=>30,'district_name'=>'Dakshina Kannada'],
            ['state_id'=>30,'district_name'=>'Davanagere'],
            ['state_id'=>30,'district_name'=>'Dharwad'],
            ['state_id'=>30,'district_name'=>'Gadag'],
            ['state_id'=>30,'district_name'=>'Gulbarga'],
            ['state_id'=>30,'district_name'=>'Hassan'],
            ['state_id'=>30,'district_name'=>'Haveri'],
            ['state_id'=>30,'district_name'=>'Kodagu'],
            ['state_id'=>30,'district_name'=>'Kolar'],
            ['state_id'=>30,'district_name'=>'Koppal'],
            ['state_id'=>30,'district_name'=>'Mandya'],
            ['state_id'=>30,'district_name'=>'Mysore'],
            ['state_id'=>30,'district_name'=>'Raichur'],
            ['state_id'=>30,'district_name'=>'Ramanagara'],
            ['state_id'=>30,'district_name'=>'Shimoga'],
            ['state_id'=>30,'district_name'=>'Tumkur'],
            ['state_id'=>30,'district_name'=>'Udupi'],
            ['state_id'=>30,'district_name'=>'Uttara Kannada'],
            ['state_id'=>30,'district_name'=>'Vijayanagara'],
            ['state_id'=>30,'district_name'=>'Vijayapura '],
            ['state_id'=>30,'district_name'=>'Yadgir'],
            ['state_id'=>31,'district_name'=>'North Goa'],
            ['state_id'=>31,'district_name'=>'South Goa'],
            ['state_id'=>32,'district_name'=>'Lakshadweep'],
            ['state_id'=>33,'district_name'=>'Alappuzha'],
            ['state_id'=>33,'district_name'=>'Ernakulam'],
            ['state_id'=>33,'district_name'=>'Idukki'],
            ['state_id'=>33,'district_name'=>'Kannur'],
            ['state_id'=>33,'district_name'=>'Kasaragod'],
            ['state_id'=>33,'district_name'=>'Kollam'],
            ['state_id'=>33,'district_name'=>'Kottayam'],
            ['state_id'=>33,'district_name'=>'Kozhikode'],
            ['state_id'=>33,'district_name'=>'Malappuram'],
            ['state_id'=>33,'district_name'=>'Palakkad'],
            ['state_id'=>33,'district_name'=>'Pathanamthitta'],
            ['state_id'=>33,'district_name'=>'Thiruvananthapuram'],
            ['state_id'=>33,'district_name'=>'Thrissur'],
            ['state_id'=>33,'district_name'=>'Wayanad'],
            ['state_id'=>34,'district_name'=>'Ariyalur'],
            ['state_id'=>34,'district_name'=>'Chengalpattu'],
            ['state_id'=>34,'district_name'=>'Chennai'],
            ['state_id'=>34,'district_name'=>'Coimbatore'],
            ['state_id'=>34,'district_name'=>'Cuddalore'],
            ['state_id'=>34,'district_name'=>'Dharmapuri'],
            ['state_id'=>34,'district_name'=>'Dindigul'],
            ['state_id'=>34,'district_name'=>'Erode'],
            ['state_id'=>34,'district_name'=>'Kallakurichi'],
            ['state_id'=>34,'district_name'=>'Kanchipuram'],
            ['state_id'=>34,'district_name'=>'Kanyakumari'],
            ['state_id'=>34,'district_name'=>'Karur'],
            ['state_id'=>34,'district_name'=>'Krishnagiri'],
            ['state_id'=>34,'district_name'=>'Madurai'],
            ['state_id'=>34,'district_name'=>'Mayiladuthurai '],
            ['state_id'=>34,'district_name'=>'Nagapattinam'],
            ['state_id'=>34,'district_name'=>'Namakkal'],
            ['state_id'=>34,'district_name'=>'Nilgiris'],
            ['state_id'=>34,'district_name'=>'Perambalur'],
            ['state_id'=>34,'district_name'=>'Pudukkottai'],
            ['state_id'=>34,'district_name'=>'Ramanathapuram'],
            ['state_id'=>34,'district_name'=>'Ranipet'],
            ['state_id'=>34,'district_name'=>'Salem'],
            ['state_id'=>34,'district_name'=>'Sivaganga'],
            ['state_id'=>34,'district_name'=>'Tenkasi'],
            ['state_id'=>34,'district_name'=>'Thanjavur'],
            ['state_id'=>34,'district_name'=>'Theni'],
            ['state_id'=>34,'district_name'=>'Thoothukudi'],
            ['state_id'=>34,'district_name'=>'Tiruchirappalli'],
            ['state_id'=>34,'district_name'=>'Tirunelveli'],
            ['state_id'=>34,'district_name'=>'Tirupattur'],
            ['state_id'=>34,'district_name'=>'Tiruppur'],
            ['state_id'=>34,'district_name'=>'Tiruvallur'],
            ['state_id'=>34,'district_name'=>'Tiruvannamalai'],
            ['state_id'=>34,'district_name'=>'Tiruvarur'],
            ['state_id'=>34,'district_name'=>'Vellore'],
            ['state_id'=>34,'district_name'=>'Viluppuram'],
            ['state_id'=>34,'district_name'=>'Virudhunagar'],
            ['state_id'=>35,'district_name'=>'Karaikal'],
            ['state_id'=>35,'district_name'=>'Mahe'],
            ['state_id'=>35,'district_name'=>'Puducherry'],
            ['state_id'=>35,'district_name'=>'Yanam'],
            ['state_id'=>36,'district_name'=>'Nicobar'],
            ['state_id'=>36,'district_name'=>'North Middle Andaman'],
            ['state_id'=>36,'district_name'=>'South Andaman'],
            ['state_id'=>37,'district_name'=>'Adilabad'],
            ['state_id'=>37,'district_name'=>'Bhadradri Kothagudem'],
            ['state_id'=>37,'district_name'=>'Hanamkonda'],
            ['state_id'=>37,'district_name'=>'Hyderabad'],
            ['state_id'=>37,'district_name'=>'Jagtial'],
            ['state_id'=>37,'district_name'=>'Jangaon'],
            ['state_id'=>37,'district_name'=>'Jayashankar'],
            ['state_id'=>37,'district_name'=>'Jogulamba'],
            ['state_id'=>37,'district_name'=>'Kamareddy'],
            ['state_id'=>37,'district_name'=>'Karimnagar'],
            ['state_id'=>37,'district_name'=>'Khammam'],
            ['state_id'=>37,'district_name'=>'Komaram Bheem'],
            ['state_id'=>37,'district_name'=>'Mahabubabad'],
            ['state_id'=>37,'district_name'=>'Mahbubnagar'],
            ['state_id'=>37,'district_name'=>'Mancherial'],
            ['state_id'=>37,'district_name'=>'Medak'],
            ['state_id'=>37,'district_name'=>'Medchal'],
            ['state_id'=>37,'district_name'=>'Mulugu'],
            ['state_id'=>37,'district_name'=>'Nagarkurnool'],
            ['state_id'=>37,'district_name'=>'Nalgonda'],
            ['state_id'=>37,'district_name'=>'Narayanpet'],
            ['state_id'=>37,'district_name'=>'Nirmal'],
            ['state_id'=>37,'district_name'=>'Nizamabad'],
            ['state_id'=>37,'district_name'=>'Peddapalli'],
            ['state_id'=>37,'district_name'=>'Rajanna Sircilla'],
            ['state_id'=>37,'district_name'=>'Ranga Reddy'],
            ['state_id'=>37,'district_name'=>'Sangareddy'],
            ['state_id'=>37,'district_name'=>'Siddipet'],
            ['state_id'=>37,'district_name'=>'Suryapet'],
            ['state_id'=>37,'district_name'=>'Vikarabad'],
            ['state_id'=>37,'district_name'=>'Wanaparthy'],
            ['state_id'=>37,'district_name'=>'Warangal'],
            ['state_id'=>37,'district_name'=>'Yadadri Bhuvanagiri'],
            ['state_id'=>38,'district_name'=>'Kargil'],
            ['state_id'=>38,'district_name'=>'Leh'],
        ]);


        $this->command->info('All States are added');
        //Transaction types
        TransactionType::create(['transaction_name'=>'Dr.','formal_name'=>'Debit','transaction_type_value'=>1]);
        TransactionType::create(['transaction_name'=>'Cr.','formal_name'=>'Credit','transaction_type_value'=>-1]);
        $this->command->info('Transaction Type Created');

        LedgerGroup::insert([
            ['group_name'=>'Current Assets'],           //1
            ['group_name'=>'Indirect Expenses'],        //2
            ['group_name'=>'Current Liabilities'],      //3
            ['group_name'=>'Fixed Assets'],             //4
            ['group_name'=>'Direct Incomes'],           //5
            ['group_name'=>'Indirect Incomes'],         //6
            ['group_name'=>'Bank Account'],             //7
            ['group_name'=>'Loans & Liabilities'],      //8
            ['group_name'=>'Bank OD'],                  //9
            ['group_name'=>'Branch & Division'],        //10
            ['group_name'=>'Capital Account'],          //11
            ['group_name'=>'Direct Expenses'],          //12
            ['group_name'=>'Cash in Hand'],             //13
            ['group_name'=>'Stock in Hand'],            //14
            ['group_name'=>'Sundry Creditors'],         //15
            ['group_name'=>'Sundry Debtors'],           //16
            ['group_name'=>'Suspense Account'],         //17
            ['group_name'=>'Indirect Income'],          //18
            ['group_name'=>'Sales Account'],            //19
            ['group_name'=>'Duties & Taxes'],           //20
            ['group_name'=>'Investment'],               //21
            ['group_name'=>'Purchase Account'],         //22
            ['group_name'=>'Investments']               //23
        ]);

        $this->command->info('Ledger groups are added');
        VoucherType::insert([
            ['voucher_type_name'=>'Sales Voucher'],              //1
            ['voucher_type_name'=>'Purchase Voucher'],           //2
            ['voucher_type_name'=>'Payment Voucher'],            //3
            ['voucher_type_name'=>'Receipt Voucher'],            //4
            ['voucher_type_name'=>'Contra Voucher'],             //5
            ['voucher_type_name'=>'Journal Voucher'],            //6
            ['voucher_type_name'=>'Credit Note Voucher'],        //7
            ['voucher_type_name'=>'Debit Note Voucher'],         //8
            ['voucher_type_name'=>'Fees Charged Journal Voucher'],//9

        ]);
        $this->command->info('Voucher type created');

        //Ledgers to be created other than Student
        Ledger::insert([
            /*1 Cash In Hand*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Cash in Hand','billing_name'=>'Cash in Hand','ledger_group_id'=>13,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*2 Bank Account*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account','billing_name'=>'Bank Account','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*3 Back Account 1*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account 1','billing_name'=>'Bank Account 1','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*4 Bank Account 2*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Bank Account 2','billing_name'=>'Bank Account 2','ledger_group_id'=>7,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*5 Purchase*/           ['episode_id' =>Str::random(20),'ledger_name'=>'Purchase','billing_name'=>'Purchase','ledger_group_id'=>22,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
            /*6 Sale*/               ['episode_id' =>Str::random(20),'ledger_name'=>'Sale','billing_name'=>'Sale','ledger_group_id'=>19,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*7 Admission Fees*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Admission Fees','billing_name'=>'Admission Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*8 Admission Fees*/     ['episode_id' =>Str::random(20),'ledger_name'=>'Course Fees','billing_name'=>'Course Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*9 Monthly Fees*/       ['episode_id' =>Str::random(20),'ledger_name'=>'Monthly Fees','billing_name'=>'Monthly Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*10 Other Fees*/        ['episode_id' =>Str::random(20),'ledger_name'=>'Other Fees','billing_name'=>'Other Fees','ledger_group_id'=>6,'state_id'=>1,'transaction_type_id'=>2,'opening_balance'=>0,'is_student'=>0],
            /*11 Discount */         ['episode_id' =>Str::random(20),'ledger_name'=>'Discount Allowed','billing_name'=>'Discount Allowed','ledger_group_id'=>2,'state_id'=>1,'transaction_type_id'=>1,'opening_balance'=>0,'is_student'=>0],
        ]);

        Ledger::create([
            'episode_id' =>'a1',
            'ledger_name' => 'Bimal Paul',
            'billing_name' => 'Mr. Bimal Paul',
            'ledger_group_id' => 16,
            'is_student' =>1,
            'father_name' => 'Atanu Paul',
            'mother_name' => 'Aroti Paul',
            'guardian_name' => 'Atanu Paul',
            'relation_to_guardian' => 'Father',
            'dob' => '1999-08-14',
            'sex' => 'M',
            'address' => '56/7,Rabindrapally',
            'city' => 'Barrackpore',
            'district' => 'North 24 Parganas',
            'state_id' => 22,
            'pin' => '700122',
            'guardian_contact_number' => '9832700122',
            'whatsapp_number' => '7985241065',
            'email_id' => 'bimalpaul@gmail.com',
            'qualification' => 'HS'
        ]);
        Ledger::create([
            'episode_id' =>'a2',
            'is_student' =>1,
            'ledger_name' => 'Ramen Paul',
            'billing_name' => 'Mr. Ramen Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Sourav Das',
            'mother_name' => 'Kakali Das',
            'guardian_name' => 'Kakali Das',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'riya99@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a3',
            'is_student' =>1,
            'ledger_name' => 'XRamen Paul',
            'billing_name' => 'Mr. Ramen Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Sourav Das',
            'mother_name' => 'Kakali Das',
            'guardian_name' => 'Kakali Das',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'riya99@gmail.com',
            'qualification' => 'HS'

        ]);

        Ledger::create([
            'episode_id' =>'a4',
            'is_student' =>1,
            'ledger_name' => 'Ramesh Chowdhury',
            'billing_name' => 'Mr. Ramesh Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Prakash Chowdhury',
            'mother_name' => 'Sumita Chowdhury',
            'guardian_name' => 'Prakash Chowdhury',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'rameshchowdhury@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a5',
            'is_student' =>1,
            'ledger_name' => 'Smita Sen',
            'billing_name' => 'Miss. Smita Sen',
            'ledger_group_id' => 16,
            'father_name' => 'Rohit Sen',
            'mother_name' => 'Susmita Sen',
            'guardian_name' => 'Susmita Sen',
            'relation_to_guardian' => 'Mother',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'sensusmita@gmail.com',
            'qualification' => 'Graduate'

        ]);
        Ledger::create([
            'episode_id' =>'a6',
            'is_student' =>1,
            'ledger_name' => 'Joy Paul',
            'billing_name' => 'Mr. Joy Paul',
            'ledger_group_id' => 16,
            'father_name' => 'Raja Paul',
            'mother_name' => 'Anita Paul',
            'guardian_name' => 'Raja Paul',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'pauljoy@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a7',
            'is_student' =>1,
            'ledger_name' => 'Dinesh Agarwal',
            'billing_name' => 'Mr. Dinesh Agarwal',
            'ledger_group_id' => 16,
            'father_name' => 'Sitesh Agarwal',
            'mother_name' => 'Dipti Agarwal',
            'guardian_name' => 'Dipti Agarwal',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'dinagarwal@gmail.com',
            'qualification' => '10th'

        ]);
        Ledger::create([
            'episode_id' =>'a8',
            'is_student' =>1,
            'ledger_name' => 'Prasen Chowdhury',
            'billing_name' => 'Mr. Prasen Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Susen Chowdhury',
            'mother_name' => 'Priya Chowdhury',
            'guardian_name' => 'priya Chowdhury',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'prasenchowdhury@gmail.com',
            'qualification' => '12th'

        ]);
        Ledger::create([
            'episode_id' =>'a9',
            'is_student' =>1,
            'ledger_name' => 'Anandi Das',
            'billing_name' => 'Miss. Anandi Das',
            'ledger_group_id' => 16,
            'father_name' => 'Ananda Das',
            'mother_name' => 'Smrity Das',
            'guardian_name' => 'Ananda Das',
            'relation_to_guardian' => 'father',
            'dob' => '2000-05-15',
            'sex' => 'F',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'dasanandi001@gmail.com',
            'qualification' => 'HS'

        ]);
        Ledger::create([
            'episode_id' =>'a10',
            'is_student' =>1,
            'ledger_name' => 'Priyobrata Chowdhury',
            'billing_name' => 'Mr. Priyobrata Chowdhury',
            'ledger_group_id' => 16,
            'father_name' => 'Surya Chowdhury',
            'mother_name' => 'Rini Chowdhury',
            'guardian_name' => 'Rini Chowdhury',
            'relation_to_guardian' => 'mother',
            'dob' => '2000-05-15',
            'sex' => 'M',
            'address' => '13/c,R.N.Tagore Road',
            'city' => 'Kolkata',
            'district' => 'Kolkata',
            'state_id' => 22,
            'pin' => '70010',
            'guardian_contact_number' => '9835700182',
            'whatsapp_number' => '9903652417',
            'email_id' => 'priyobratachowdhury@gmail.com',
            'qualification' => 'HS'

        ]);
    /*insert into durationType table*/
    DurationType::insert([
        /*1*/    ['duration_name' => 'Not Applicable'],
        /*1*/    ['duration_name' => 'Days'],
        /*2*/    ['duration_name' => 'Year'],
        /*3*/    ['duration_name' => 'Month'],
        /*4*/    ['duration_name' => 'Week'],
        /*5*/    ['duration_name' => 'Hours']
   ]);

    //Fees Modes
    FeesModeType::insert([
        ['fees_mode_type_name'=>'Monthly'],
        ['fees_mode_type_name'=>'Single']
    ]);
    //storing course
        Course::create([
           'fees_mode_type_id'=>1,
           'course_code' => 'ab',
           'short_name' => 'Tally',
           'full_name' => 'Tally',
           'course_duration' => 100,
           'duration_type_id' => '4'
        ]);

        Course::create([
            'fees_mode_type_id'=>2,
            'course_code' => 'az',
            'short_name' => 'Ms word',
            'full_name' => 'Micro soft office word',
            'course_duration' => 200,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>2,
            'course_code' => 'bc',
            'short_name' => 'Excel',
            'full_name' => 'Micro soft excel',
            'course_duration' => 300,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'cd',
            'short_name' => 'Web Based Software Devolopment',
            'full_name' => 'Tally',
            'course_duration' => 100,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'gh',
            'short_name' => 'Powerpoint',
            'full_name' => 'Powerpoint',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);
         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ef',
            'short_name' => 'Office 10',
            'full_name' => 'Micosoft Office 10',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ij',
            'short_name' => 'C',
            'full_name' => 'Programming Language C',
            'course_duration' => 20,
            'duration_type_id' => '4'

         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'kl',
            'short_name' => 'CP',
            'full_name' => 'Programming Language C+',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'mn',
            'short_name' => 'CPP',
            'full_name' => 'Programming Language C++',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'jv',
            'short_name' => 'JAVA',
            'full_name' => 'Programming Language JAVA',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'ph',
            'short_name' => 'PYTHON',
            'full_name' => 'Programming Language PYTHON',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'html',
            'short_name' => 'HTML',
            'full_name' => 'Hyper Text Markup Language',
            'course_duration' => 20,
            'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'js',
            'short_name' => 'JavaScript',
            'full_name' => 'Programming Language JavaScript',
            'course_duration' => 20,
             'duration_type_id' => '4'
         ]);

         Course::create([
            'fees_mode_type_id'=>1,
            'course_code' => 'sql',
            'short_name' => 'SQL',
            'full_name' => 'Structured Query Language',
            'course_duration' => 20,
             'duration_type_id' => '4'
         ]);






        Subject::insert([
            /*1*/    ['subject_code'=>'MSW','subject_short_name'=>'MS-Word','subject_full_name'=>'Microsoft Office','subject_duration'=>5,'duration_type_id' => '4','subject_description'=>'Microsoft office Word for beginners'],
            /*2*/    ['subject_code'=>'MSWA','subject_short_name'=>'MS-Word Advance','subject_full_name'=>'Advance Microsoft Office','subject_duration'=>10,'duration_type_id' => '4','subject_description'=>'Microsoft office word for advance user'],
            /*3*/    ['subject_code'=>'MSEX','subject_short_name'=>'MS-Excel','subject_full_name'=>'Microsoft Excel','subject_duration'=>10,'duration_type_id' => '4','subject_description'=>'Microsoft office excel for beginners'],
            /*4*/    ['subject_code'=>'MSEXA','subject_short_name'=>'MS-Excel Advance','subject_full_name'=>'Advance Microsoft Excel','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Microsoft office excel for advance user'],
            /*4*/    ['subject_code'=>'MSPPT','subject_short_name'=>'MS-PowerPoint','subject_full_name'=>'Microsoft Power Point','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Microsoft office Power Point'],

            /*5*/    ['subject_code'=>'EXCAXI-III','subject_short_name'=>'Computer Application','subject_full_name'=>'Computer Application for Class I to III','subject_duration'=>0,'duration_type_id' => '1','subject_description'=>'Computer Application for ClassI to III'],
            /*6*/    ['subject_code'=>'EXCAXIV-V','subject_short_name'=>'Computer Application','subject_full_name'=>'Computer Application for Class IV to V','subject_duration'=>0,'duration_type_id' => '1','subject_description'=>'Computer Application for Class IV to V'],


            /**/    ['subject_code'=>'C','subject_short_name'=>'C','subject_full_name'=>'Programming Language C','subject_duration'=>20,'duration_type_id' => '4','subject_description'=>'Programming Language For C'],
            /**/    ['subject_code'=>'C-S','subject_short_name'=>'CompSc','subject_full_name'=>'Computer Science','subject_duration'=>00,'duration_type_id' => '1','subject_description'=>'Computer Science'],
            /**/    ['subject_code'=>'JICSE','subject_short_name'=>'JAVA ICSE','subject_full_name'=>'JAVA for ICSE','subject_duration'=>00,'duration_type_id' => '1','subject_description'=>'JAVA for ICSE'],
        ]);
        QuestionLevel::insert([
            ['level_name'=>'Easy'],
            ['level_name'=>'Moderate'],
            ['level_name'=>'Expert']
        ]);
        Chapter::insert([
            ['chapter_name'=>'General','subject_id'=>10],
            ['chapter_name'=>'Operators','subject_id'=>10]
        ]);
        QuestionType::insert([
            ['question_type_name'=>'MCQ'],
            ['question_type_name'=>'Descriptive'],
            ['question_type_name'=>'True False']
        ]);






        $x=StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>1,'reference_number'=>1,'base_fee'=>3000,'discount_allowed'=>1200,'joining_date'=>'2019-01-08','effective_date'=>'2019-02-01','completion_date'=>'2019-11-05','is_started'=>1,'is_completed'=>1]);
        $x=StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>2,'reference_number'=>2,'base_fee'=>6900,'discount_allowed'=>3200,'joining_date'=>'2019-11-28','effective_date'=>'2019-12-01','completion_date'=>'2020-11-05', 'is_started'=>1,'is_completed'=>1]);

        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>3,'reference_number'=>3,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2020-12-28','effective_date'=>'2020-12-29','completion_date'=>'2021-04-05', 'is_started'=>1,'is_completed'=>1]);
        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>4,'reference_number'=>4,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-04-02','effective_date'=>'2021-04-05','is_started'=>1, 'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>12,'course_id'=>4,'reference_number'=>5,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2020-02-28','effective_date'=>'2020-03-05','completion_date'=>'2020-11-05', 'is_started'=>1,'is_completed'=>1]);
        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>6,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2','effective_date'=>'2020-03-01', 'completion_date'=>'2020-10-05','is_started'=>1,'is_completed'=>1]);

        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>7,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2','effective_date'=>'2021-03-01','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>13,'course_id'=>4,'reference_number'=>8,'base_fee'=>6900,'discount_allowed'=>5200,'joining_date'=>'2021-02-2',]);
        StudentCourseRegistration::create(['ledger_id'=>17,'course_id'=>4,'reference_number'=>9,'base_fee'=>350,'discount_allowed'=>0,'joining_date'=>'2021-02-2','effective_date'=>'2021-03-01','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>11,'course_id'=>5,'reference_number'=>10,'base_fee'=>1350,'discount_allowed'=>0,'joining_date'=>'2021-04-02','effective_date'=>'2021-04-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>15,'course_id'=>5,'reference_number'=>11,'base_fee'=>1350,'discount_allowed'=>0,'joining_date'=>'2021-03-02','effective_date'=>'2021-03-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>18,'course_id'=>14,'reference_number'=>12,'base_fee'=>2500,'discount_allowed'=>0,'joining_date'=>'2021-05-18','effective_date'=>'2021-05-20','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>20,'course_id'=>11,'reference_number'=>13,'base_fee'=>3000,'discount_allowed'=>0,'joining_date'=>'2021-01-18','effective_date'=>'2021-03-20','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>16,'course_id'=>9,'reference_number'=>14,'base_fee'=>1200,'discount_allowed'=>0,'joining_date'=>'2021-06-01','effective_date'=>'2021-06-05','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>14,'course_id'=>9,'reference_number'=>15,'base_fee'=>1500,'discount_allowed'=>0,'joining_date'=>'2021-05-01','effective_date'=>'2021-06-10','is_started'=>1,'is_completed'=>0]);
        StudentCourseRegistration::create(['ledger_id'=>19,'course_id'=>12,'reference_number'=>16,'base_fee'=>2600,'discount_allowed'=>100,'joining_date'=>'2021-04-18','effective_date'=>'2021-05-05','is_started'=>1,'is_completed'=>0]);

        //*****************************************************************************************
        $x=Question::create(['question_level_id'=>1,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            class X { int x; X(int x){x=2;}}
            class Y extends X{ Y(){} void displayX(){
            System.out.print(x);}
            public static void main(String args[]){
             new Y().displayX();}}']);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 2','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and runs without any output','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 0','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            class Test{ private void display(){
            System.out.println(  Display()  );}
            private static  void show() { display();
            System.out.println(  show()  );}
            public static void main(String arg[]){
            show();}}']);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and prints show()','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and prints Display() show()','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles but throws runtime exception','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            class A{ A(){System.out.print(  From A  );}}
            class B extends A{ B(int z){z=2;}
            public static void main(String args[]){
              new B(3);}}']);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Comiples and prints From A','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles but throws runtime exception','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 3','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class One{
            int var1;
            One (int x){
            var1 = x;
            }}
            class Derived extends One{
            int var2;
            void display(){
            System.out.println(  var 1=  +var1+  var2=  +var2);
            }}
            class Main{
            public static void main(String[] args){
            Derived obj = new Derived();
            obj.display();
            }}
            consider the code above & select the proper output from the options.']);
        Option::create(['question_id'=>$x->id,'option'=>'0 , 0','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'compiles successfully but runtime error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'none of these','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            package aj; class A{ protected int j; }
            package bj; class B extends A
            { public static void main(String ar[]){
            System.out.print(new A().j=23);}}']);
        Option::create(['question_id'=>$x->id,'option'=>'code compiles fine and will display 23','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'code compiles but will not display output','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'j can not be initialized','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'compliation error','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Order{
            Order(){
            System.out.println(  Cat  );
            }
            public static void main(String... Args){
            Order obj = new Order();
            System.out.println(  Ant  );
            }
            static{
            System.out.println(  Dog  );
            }
            {
            System.out.println(  Man  );
            }}
            consider the code above & select the proper output from the options.']);
        Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Man Dog Cat Ant','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Dog Man Cat Ant','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Cat Ant Dog Man','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyAr {
             public static void main(String argv[]) {
              MyAr m = new MyAr();
              m.amethod();
             }
             public void amethod() {
              final int i1;
              System.out.println(i1);
             }
            }
            What is the Output of the Program?']);
        Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Unresolved compilation problem: The local variable i1 may not have been initialized','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation and output of null','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'None of the given options','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class MyClass1
             {
              private int area(int side)
              {
               return(side * side);
              }
              public static void main(String args[ ])
              {
               MyClass1 MC = new MyClass1( );
               int area = MC.area(50);
               System.out.println(area);
              }
             }
              What would be the output?']);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'2500','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'50','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Sample
            {int a,b;
            Sample()
            { a=1; b=2;
            System.out.println(a+  \t  +b);
            }
            Sample(int x)
            { this(10,20);
            a=b=x;
            System.out.println(a+  \t  +b);
            }
            Sample(int a,int b)
            { this();
            this.a=a;
            this.b=b;
            System.out.println(a+  \t  +b);
            }
            }
            class This2
            { public static void main(String args[])
            {
            Sample s1=new Sample (100);
            }
            }
            What is the Output of the Program?']);
        Option::create(['question_id'=>$x->id,'option'=>'100 100 1 2 10 20','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'1 2 100 100 10 20','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'10 20 1 2 100 100','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'1 2 10 20 100 100','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            public class MyClass {
             public static void main(String arguments[]) {
              amethod(arguments);
             }
             public void amethod(String[] arguments) {
              System.out.println(arguments[0]);
              System.out.println(arguments[1]);
             }
            }
            Command Line arguments - Hi, Hello']);
        Option::create(['question_id'=>$x->id,'option'=>'prints Hi Hello','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiler Error','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Runs but no output','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Runtime Error','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
             public class Yikes {

             public static void go(Long n) {System.out.print(  Long   );}
             public static void go(Short n) {System.out.print(  Short   );}
             public static void go(int n) {System.out.print(  int   );}
             public static void main(String [] args) {
             short y = 6;
             long z = 7;
             go(y);
             go(z);
             }
             }
            What is the result?']);
        Option::create(['question_id'=>$x->id,'option'=>'int Long','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Short Long','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'abstract class MineBase {
             abstract void amethod();
             static int i;
            }
            public class Mine extends MineBase {
             public static void main(String argv[]){
             int[] ar=new int[5];
             for(i=0;i < ar.length;i++)
             System.out.println(ar[i]);
             }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'A Sequence of 5 zeros will be printed like 0 0 0 0 0','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'A Sequence of 5 ones will be printed like 1 1 1 1 1','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'IndexOutOfBoundes Error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation Error occurs and to avoid them we need to declare Mine class as abstract','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the result when you attempt to compile this program?
            public class Rand{
                public static void main(String argv[]){
             int iRand;
             iRand = Math.random();
             System.out.println(iRand);
                }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'Compile time error referring to a cast problem','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'A random number between 1 and 10','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'A random number between 0 and 1','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'A compile time error as random being an undefined method','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following declarations are correct? (Choose TWO)']);
        Option::create(['question_id'=>$x->id,'option'=>'boolean b = TRUE;','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'byte b = 256;','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'String s = “null”;','is_answer'=>0.5]);
        Option::create(['question_id'=>$x->id,'option'=>'int i = new Integer(“56”);','is_answer'=>0.5]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class A, B and C are in multilevel inheritance hierarchy repectively . In the main method of some other class if class C object is created, in what sequence the three constructors execute?']);
        Option::create(['question_id'=>$x->id,'option'=>'Constructor of A executes first, followed by the constructor of B and C','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Constructor of C executes first followed by the constructor of A and B','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Constructor of C executes first followed by the constructor of B and A','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Constructor of A executes first followed by the constructor of C and B','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the result when you try to compile and run the following code?
            private class Base{
                Base(){
             int i = 100;
             System.out.println(i);
                }
            }

            public class Pri extends Base{
                static int i = 200;
                public static void main(String argv[]){
             Pri p = new Pri();
             System.out.println(i);
                }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'200','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'100 followed by 200','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'100','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Suppose class B is sub class of class A:
            A) If class A does not have any constructor, then class B also must not have any constructor
            B) If class A has parameterized constructor, then class B can have default as well as  parameterized constructor
            C) If class A has parameterized constructor then call to class A constructor should be made explicitly by constructor of class B']);
        Option::create(['question_id'=>$x->id,'option'=>'Only B and C is TRUE','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'All are FALSE','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Only A and C is TRUE','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be printed out if you attempt to compile and run the following code ?
            public class AA {
                    public static void main(String[] args) {
              int i = 9;
              switch (i) {
              default:
               System.out.println(  default  );
              case 0:
               System.out.println(  zero  );
               break;
              case 1:
               System.out.println(  one  );
              case 2:
               System.out.println(  two  );
              }
             }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'default zero one two','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'default zero','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            package aj; private class S{ int roll;
                S(){roll=1;} }
            package aj; class T
                { public static void main(String ar[]){
            System.out.print(new S().roll);}}']);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and diplay 0','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 1','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class Q {
                public static void main(String argv[]) {
          int anar[] = new int[] { 1, 2, 3 };
          System.out.println(anar[1]);
         }
        }']);
        Option::create(['question_id'=>$x->id,'option'=>'Compiler Error: anar is referenced before it is initialized','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiler Error: size of array must be defined','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statements, when inserted at (1), will not result in compile-time errors?
            public class ThisUsage {
                int planets;
                    static int suns;
            public void gaze() {
            int i;
            // (1) INSERT STATEMENT HERE
            }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'i = this.planets;','is_answer'=>0.33]);
        Option::create(['question_id'=>$x->id,'option'=>'i = this.suns;','is_answer'=>0.33]);
        Option::create(['question_id'=>$x->id,'option'=>'this = new ThisUsage();','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'this.i = 4;','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given the following code what will be output?
            public class Pass{
                    static int j=20;
                public static void main(String argv[]){
             int i=10;
             Pass p = new Pass();
             p.amethod(i);
             System.out.println(i);
             System.out.println(j);
                }

                public void amethod(int x){
                    x=x*2;
                    j=j*2;
                }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'Error: amethod parameter does not match variable','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'10 and 40','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'10, and 20','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'20 and 40','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Order{
            Order(){
            System.out.println(  Cat  );
            }
        public static void main(String... Args){
                System.out.println(  Ant  );
            }
        static{
                System.out.println(  Dog  );
            }
        {
            System.out.println(  Man  );
        }}
        consider the code above & select the proper output from the options.']);
        Option::create(['question_id'=>$x->id,'option'=>'Dog Ant','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Dog Man Cat Ant','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Man Dog Ant','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Dog Man Ant','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class c123 {
                    private c123() {
              System.out.println(  Hellow  );
             }
             public static void main(String args[]) {
                    c123 o1 = new c123();
              c213 o2 = new c213();
             }
            }
            class c213 {
                private c213() {
              System.out.println(  Hello123  );
             }
            }

            What is the output?']);
        Option::create(['question_id'=>$x->id,'option'=>'Hellow','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'It is not possible to declare a constructor as private','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Runs without any output','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class A {
                int i, j;

                A(int a, int b) {
                i = a;
                j = b;
                }
              void show() {
                System.out.println(  i and j:    + i +       + j);
              }
            }
            class B extends A {
            int k;

            B(int a, int b, int c) {
            super(a, b);
            k = c;
            }
              void show(String msg) {
                    System.out.println(msg + k);
                }
            }
            class Override {
                public static void main(String args[]) {
                B subOb = new B(3, 5, 7);
                subOb.show(  This is k:   ); // this calls show() in B
                subOb.show(); // this calls show() in A
              }
            } What would be the ouput?']);
        Option::create(['question_id'=>$x->id,'option'=>'This is j: 5 i and k: 3 7','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'This is i: 3 j and k: 5 7','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'This is i: 7 j and k: 3 5','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'This is k: 7 i and j: 3 7','is_answer'=>1]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyAr {
                    static int i1;
             public static void main(String argv[]) {
              MyAr m = new MyAr();
              m.amethod();
             }
             public void amethod() {
                System.out.println(i1);
             }
            }
            What is the output of the program?']);
        Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Garbage Value','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'It is not possible to access a static variable in side of non static method','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
            package QB;

            class Meal {
            Meal() {
            System.out.println(  Meal()  );
            }
            }
            class Cheese {
            Cheese() {
            System.out.println(  Cheese()  );
            }
            }
            class Lunch extends Meal {
            Lunch() {
            System.out.println(  Lunch()  );
            }
            }
            class PortableLunch extends Lunch {
            PortableLunch() {
            System.out.println(  PortableLunch()  );
            }
            }
            class Sandwich extends PortableLunch {
                private Cheese c = new Cheese();

              public Sandwich() {
                System.out.println(  Sandwich()  );
              }
            }
            public class MyClass7 {
                    public static void main(String[] args) {
                new Sandwich();
              }
            } What would be the output?']);
        Option::create(['question_id'=>$x->id,'option'=>'Meal() Lunch() PortableLunch() Cheese() Sandwich()','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Meal() Cheese() Lunch() PortableLunch() Sandwich()','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Meal() Lunch() PortableLunch() Sandwich() Cheese()','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Cheese() Sandwich() Meal() Lunch() PortableLunch()','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
            class A{ int a; A(int a){a=4;}}
            class B extends A{ B(){super(3);} void displayA(){
                System.out.print(a);}
            public static void main(String args[]){
                    new B().displayA();}}']);
        Option::create(['question_id'=>$x->id,'option'=>'compiles and display 0','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 4','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 3','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Order{
                Order(){
                System.out.println(  Cat  );
                }
            public static void main(String... Args){
                    Order obj = new Order();
            System.out.println(  Ant  );
            }
            static{
                    System.out.println(  Dog  );
                }}
            consider the code above & select the proper output from the options.']);
        Option::create(['question_id'=>$x->id,'option'=>'Cat Ant Dog','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Dog Cat Ant','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'Ant Cat Dog','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'none','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will happen if a main() method of a  testing  class tries to access a private instance variable of an object using dot notation?']);
        Option::create(['question_id'=>$x->id,'option'=>'The compiler will automatically change the private variable to a public variable','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'The compiler will find the error and will not make a .class file','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'The program will compile and run successfully','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'The program will compile successfully, but the .class file will not run correctly','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the result of compiling the following program?
            public class MyClass {
                long var;
                    public void MyClass(long param) { var = param; } // (Line no 1)
            public static void main(String[] args) {
                    MyClass a, b;
            a = new MyClass(); // (Line no 2)
            }
            }']);
        Option::create(['question_id'=>$x->id,'option'=>'The program will compile without errors.','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'A compilation error will occur at (Line no 2), since the class does not have a constructor that takes one argument of type int.','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'A compilation error will occur at (Line no 1), since constructors cannot specify a return value','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'A compilation error will occur at (2), since the class does not have a default constructor','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyClass {
                    static void print(String s, int i) {
                System.out.println(  String:    + s +   , int:    + i);
              }

              static void print(int i, String s) {
                    System.out.println(  int:    + i +   , String:    + s);
              }

              public static void main(String[] args) {
                    print(  String first  , 11);
                print(99,   Int first  );
              }
            }What would be the output?']);
        Option::create(['question_id'=>$x->id,'option'=>'String: String first, int: 11 int: 99, String: Int first','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'int: 27, String: Int first String: String first, int: 27','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Here is the general syntax for method definition:

                    accessModifier returnType methodName( parameterList )
                {
                Java statements

              return returnValue;
            }


            What is true for the returnType and the returnValue?']);
        Option::create(['question_id'=>$x->id,'option'=>'The returnValue can be any type, but will be automatically converted to returnType when the method returns to the caller','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'If the returnType is void then the returnValue can be any type','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'The returnValue must be the same type as the returnType, or be of a type that can be converted to returnType without loss of information','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'The returnValue must be exactly the same type as the returnType.','is_answer'=>0]);

        $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'11. class Mud {
                12. // insert code here
                13. System.out.println(  hi  );
                14. }
            15. }
            And the following five fragments:
            public static void main(String...a) {
            public static void main(String.* a) {
            public static void main(String... a) {
            public static void main(String[]... a) {
            public static void main(String...[] a) {
            How many of the code fragments, inserted independently at line 12, compile?']);
        Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>1]);
        Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'package QB;
 class Sphere {
             protected int methodRadius(int r) {
      System.out.println(  Radious is:   +r);
   return 0;
    }
}
package QB;
public class MyClass {
    public static void main(String[] args) {
 double x = 0.89;
  Sphere sp = new Sphere();
  // Some code missing
}
} to get the radius value what is the code of line to be added ?']); Option::create(['question_id'=>$x->id,'option'=>'methodRadius(x);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'sp.methodRadius(x);','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Nothing to add','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Sphere.methodRadius();','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) A call to instance method can not be made from static context.
B) A call to static method can  be  made from non static context.']); Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both are TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Both are FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{ private void display(){ System.out.print(  Hi  );}
public static void main(String ar[]){
    display();}}']);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles and displays Hi','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles and throws run time exception','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles but does not display anything','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class One{
int var1;
One (int x){
var1 = x;
}}
class Derived extends One{
int var2;
Derived(){
super(10);
var2=10;
}
void display(){
System.out.println(  var1=  +var1+   , var2=  +var2);
}}
class Main{
public static void main(String[] args){
Derived obj = new Derived();
obj.display();
}}
consider the code above & select the proper output from the options.']);
 Option::create(['question_id'=>$x->id,'option'=>'var1=10 , var2=10','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'0,0','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyAr {
 public static void main(String argv[]) {
  MyAr m = new MyAr();
  m.amethod();
 }
 public void amethod() {
  static int i1;
  System.out.println(i1);
 }
}
What is the Output of the Program?']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time error because i has not been initialized','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation and output of null','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'It is not possible to declare a static variable in side of non static method or instance method. Because Static variables are class level dependencies.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{  int z; A(int x){z=x;} }
class B extends A{
public static void main(String arg){
new B();}}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but throws run time exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and displays nothing','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) No argument constructor is provided to all Java classes by default
B) No argument constructor is provided to the class only when no constructor is defined.
C) Constructor can have another class object as an argument
D) Access specifiers are not applicable to Constructor']); Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'All are TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B and C is TRUE','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'All are FALSE','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which modifier is used to control access to critical code in multi-threaded programs?']);
Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'transient','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'synchronized','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class c1 {
private c1()
{
 System.out.println(  Hello  );
}
public static void main(String args[])
{
 c1 o1=new c1();
}
}

What is the output?']);
 Option::create(['question_id'=>$x->id,'option'=>'Hello','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'It is not possible to declare a constructor private','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Can not create object because constructor is private','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following sentences is true?
    A)  Access to data member depends on the scope of the class and the scope of data members
B) Access to data member depends only on the scope of the data members
C) Access to data member depends on the scope of the method from where it is accessed']);
 Option::create(['question_id'=>$x->id,'option'=>'Only A and C is TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'All are TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'All are FALSE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{ private static void display(){
System.out.println(  Display()  );}
private static  void show() { display();
System.out.println(  show()  );}
public static void main(String arg[]){
    show();}}']); Option::create(['question_id'=>$x->id,'option'=>'Compiles and prints show()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and prints Display() show()','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but throws runtime exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{ private static void display(){ System.out.print(  Hi  );}
public static void main(String ar[]){
    display();}}']); Option::create(['question_id'=>$x->id,'option'=>'Compiles and display Hi','is_answer'=>1]);
    Option::create(['question_id'=>$x->id,'option'=>'Compiles and throw run time exception','is_answer'=>0]);
    Option::create(['question_id'=>$x->id,'option'=>'Compiles but does not display anything','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following will print -4.0']); Option::create(['question_id'=>$x->id,'option'=>'System.out.println(Math.ceil(-4.7));','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'System.out.println(Math.floor(-4.7));','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'System.out.println(Math.round(-4.7));','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'System.out.println(Math.min(-4.7));','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Test{
static void method(){
this.display();
}
static display(){
System.out.println((  hello  );
}
public static void main(String[] args){
new Test().method();
}
}
consider the code above & select the proper output from the options.']);
 Option::create(['question_id'=>$x->id,'option'=>'hello','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Runtime Error','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'compiles but no output','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'does not compile','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the best option:
class Super{ int x; Super(){x=2;}}
class Sub extends Super { void displayX(){
System.out.print(x);}
public static void main(String args[]){
   new Sub().displayX();}}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 2','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles and runs without any output','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which modifier indicates that the variable might be modified asynchronously, so that all threads will get the correct value of the variable.']);
Option::create(['question_id'=>$x->id,'option'=>'synchronized','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'volatile','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'transient','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A constructor may return value including class type']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
package aj; class S{ int roll =23;
private S(){} }
package aj; class T
{ public static void main(String ar[]){
System.out.print(new S().roll);}}']);
 Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 0','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles and display 23','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will happen when you attempt to compile and run this code?
abstract class Base{
        abstract public void myfunc();
        public void another(){
        System.out.println(  Another method  );
        }
}

public class Abs extends Base{
        public static void main(String argv[]){
        Abs a = new Abs();
        a.amethod();
        }
        public void myfunc(){
                System.out.println(  My Func  );
                }
        public void amethod(){
        myfunc();
        }
}']);
 Option::create(['question_id'=>$x->id,'option'=>'The code will compile and run, printing out the words   My Func  ','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'The compiler will complain that the Base class has non abstract methods','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'The code will compile but complain at run time that the Base class has non abstract methods','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'The compiler will complain that the method myfunc in the base class has no body, nobody at all to print it','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 class Pizza {
 java.util.ArrayList toppings;
 public final void addTopping(String topping) {
 toppings.add(topping);
 }
 }
 public class PepperoniPizza extends Pizza {
 public void addTopping(String topping) {
 System.out.println(  Cannot add Toppings  );
 }
 public static void main(String[] args) {
 Pizza pizza = new PepperoniPizza();
 pizza.addTopping(  Mushrooms  );
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'Cannot add Toppings','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'The code runs with no output.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'A NullPointerException is thrown','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'When we use both implements & extends keywords in a single java program then what is the order of keywords to follow?']);
Option::create(['question_id'=>$x->id,'option'=>'we must use always extends and later we must use implements keyword.','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'we must use always implements and later we must use extends keyword.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'we can use in any order its not at all a problem','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'extends and implements can not be used together','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface employee{
void saldetails();
void perdetails();
}
abstract class perEmp implements employee{
    public void perdetails(){
  System.out.println(  per details  ); }}
 class Programmer extends perEmp{
     public void saldetails(){
  perdetails();
  System.out.println(  sal details  ); }
 public static void main(String[] args) {
    perEmp emp=new Programmer();
  emp.saldetails(); }}']);
 Option::create(['question_id'=>$x->id,'option'=>'sal details','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'sal details per details','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'per details sal details','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface A{
int i=3;}
interface B{
int i=4;}
class Test implements A,B{
    public static void main(String[] args) {
  System.out.println(i);
 }
}']);
 Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code:
// Class declarations:
class Super {}
class Sub extends Super {}
// Reference declarations:
Super x;
Sub y;
Which of the following statements is correct for the code: y = (Sub) x?']); Option::create(['question_id'=>$x->id,'option'=>'Illegal at compile time','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Legal at compile time, but might be illegal at runtime','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Definitely legal at runtime, but the cast operator (Sub) is not strictly needed.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Definitely legal at runtime, and the cast operator (Sub) is needed.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{
void display(){  System.out.println(  Hello A  ); }}
class B extends A{
void display(){
System.out.println(  Hello B  ); }}
public class Test {
        public static void main(String[] args) {
  A a=new B();
  B b=  a;
  b.display(); }}']);
 Option::create(['question_id'=>$x->id,'option'=>'Hello A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Hello B','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of these field declarations are legal in an interface? (Choose all applicable)']); Option::create(['question_id'=>$x->id,'option'=>'public static int answer = 42;','is_answer'=>0.25]);  Option::create(['question_id'=>$x->id,'option'=>'int answer;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'final static int answer = 42;','is_answer'=>0.25]); Option::create(['question_id'=>$x->id,'option'=>'public int answer = 42;','is_answer'=>0.25]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
abstract class Car{
    abstract void accelerate();
}class Lamborghini extends Car{
    @Override
    void accelerate() {
    System.out.println(  90 mph  );
    } void nitroBooster(){
    System.out.print(  150 mph  ); }
 public static void main(String[] args) {
        Car mycar=new Lamborghini();
  mycar.nitroBooster(); }}']); Option::create(['question_id'=>$x->id,'option'=>'150 mph','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'90 mph','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below & select the correct ouput from the options:
1. public class Mountain {
    2. protected int height(int x) { return 0; }
3. }
4. class Alps extends Mountain {
    5. // insert code here
    6. }
Which five methods, inserted independently at line 5, will compile? (Choose three.)
A. public int height(int x) { return 0; }
B. private int height(int x) { return 0; }
C. private int height(long x) { return 0; }
D. protected long height(long x) { return 0; }
E. protected long height(int x) { return 0; }']); Option::create(['question_id'=>$x->id,'option'=>'A,B,E','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A,C,D','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'B,D,E','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'C,D,E','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{
void display(byte a, byte b){
System.out.println(  sum of byte  +(a+b)); }
 void display(int a, int b){
        System.out.println(  sum of int  +(a+b)); }
  public static void main(String[] args) {
        new A().display(3, 4); }}']); Option::create(['question_id'=>$x->id,'option'=>'sum of byte 7','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'sum of int7','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface console{
int line;
void print();}
class a implements console{
    public void print(){
  System.out.print(  A  );}
 public static void main(String ar[]){
        new a().print();}}']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runs but no output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{
void display(){  System.out.println(  Hello A  ); }}
class B extends A{
void display(){
System.out.println(  Hello B  ); }}
public class Test {
        public static void main(String[] args) {
  A a=new B();
  B b=  (B)a;
  b.display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'Hello A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Hello B','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following defines a legal abstract class?']); Option::create(['question_id'=>$x->id,'option'=>'class Vehicle { abstract void display(); }','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'abstract Vehicle { abstract void display(); }','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'class abstract Vehicle { abstract void display(); }','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'abstract class Vehicle { abstract void display(); { System.out.println( Car ); }}','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Choose the correct declaration of variable in an interface:']); Option::create(['question_id'=>$x->id,'option'=>'public final data type varaibale=intialization;','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'static data type variable;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'static final data type varaiblename;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'final data type variablename=intialization;','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
11. class ClassA {}
12. class ClassB extends ClassA {}
13. class ClassC extends ClassA {}
and:
21. ClassA p0 = new ClassA();
22. ClassB p1 = new ClassB();
23. ClassC p2 = new ClassC();
24. ClassA p3 = new ClassB();
25. ClassA p4 = new ClassC();
Which TWO are valid? (Choose two.)']); Option::create(['question_id'=>$x->id,'option'=>'p0 = p1;','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'p2 = p4;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'p1 = (ClassB)p3;','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'p1 = p2;','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A{
void display(){  System.out.println(  Hello A  ); }}
class B extends A{
void display(){
System.out.println(  Hello B  ); }}
public class Test {
        public static void main(String[] args) {
  B b=(B)  new A();
  b.display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'Hello A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Hello B','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A class Animal has a subclass Mammal. Which of the following is true:']); Option::create(['question_id'=>$x->id,'option'=>'Because of single inheritance, Mammal can have no subclasses','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Because of single inheritance, Mammal can have no other parent than Animal','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Because of single inheritance, Animal can have only one subclass','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Because of single inheritance, Mammal can have no siblings.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 interface DeclareStuff {
     public static final int Easy = 3;
void doStuff(int t); }
public class TestDeclare implements DeclareStuff {
        public static void main(String [] args) {
int x = 5;
 new TestDeclare().doStuff(++x);
}
 void doStuff(int s) {
        s += Easy + ++s;
        System.out.println(  s    + s);
    }
} What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'s 14','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s 16','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s 10','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface console{
int line=10;
void print();}
class a implements console{
void print(){
System.out.print(  A  );}
 public static void main(String ar[]){
        new a().print();}}']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runs but no output','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following is correct for an abstract class. (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'An abstract class is one which contains general purpose methods','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'An abstract class is one which contains some defined methods and some undefined methods','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'An abstract class is one which contains only static methods','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Abstract class can be declared final','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which declaration can be inserted at (1) without causing a compilation error?
interface MyConstants {
int r = 42;
int s = 69;
// (1) INSERT CODE HERE
    }']); Option::create(['question_id'=>$x->id,'option'=>'int total = total + r + s;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'final double circumference = 2 * Math.PI * r;','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'protected int CODE = 31337;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'int AREA = r * s;','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given :

Day d;
BirthDay bd = new BirthDay(  Raj  , 25);
d = bd;   //  Line X

Where Birthday is a subclass of Day. State whether the code given at Line X is correct:']); Option::create(['question_id'=>$x->id,'option'=>'No—there must always be an exact match between the variable and the object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'No—but a object of parent type can be assigned to a variable of child type.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Yes—an object can be assigned to a reference variable of the parent type.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Yes—any object can be assigned to any reference variable.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Animal {
    void makeNoise() {System.out.println(  generic noise  ); }
}
class Dog extends Animal {
void makeNoise() {System.out.println(  bark  ); }
void playDead() { System.out.println(  roll over  ); }
}
class CastTest2 {
    public static void main(String [] args) {
Animal  a = new Dog();
a.makeNoise();
}
}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'run time error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'generic noise','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'bark','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'interface Vehicle{
    void drive();
    }
final class TwoWheeler implements Vehicle{
int wheels = 2;
    public void drive(){
System.out.println(  Bicycle  );
}
}
class ThreeWheeler extends TwoWheeler{
    public void drive(){
System.out.println(  Auto  );
}}
class Test{
    public static void main(String[] args){
ThreeWheeler obj = new ThreeWheeler();
obj.drive();
}}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'Auto','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Bicycle Auto','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Select the correct statement:']); Option::create(['question_id'=>$x->id,'option'=>'Private methods cannot be overridden in subclasses','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'A subclass can override any method in a superclass','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An overriding method can declare that it throws checked exceptions that are not thrown by the method it is overriding','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The parameter list of an overriding method can be a subset of the parameter list of the method that it is overriding','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
class A{
    static int sq(int n){
  return n*n; }}
public class Test extends A{
        static int sq(int n){
  return super.sq(n); }
 public static void main(String[] args) {
        System.out.println(new Test().sq(3)); }}']); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'9','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
public static void main( String[] args ) { SomeInterface x; ... }
Can an interface name be used as the type of a variable']); Option::create(['question_id'=>$x->id,'option'=>'No—a variable must always be an object reference type','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'No—a variable must always be an object reference type or a primitive type','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'No—a variable must always be a primitive type','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Yes—the variable can refer to any object whose class implements the interface','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given :
What would be the result of compiling and running the following program?
// Filename: MyClass.java
public class MyClass {
        public static void main(String[] args) {
C c = new C();
System.out.println(c.max(13, 29));
}
}
class A {
int max(int x, int y) { if (x>y) return x; else return y; }
}
class B extends A{
int max(int x, int y) { return super.max(y, x) - 10; }
}
class C extends B {
int max(int x, int y) { return super.max(x+10, y+10); }
}']); Option::create(['question_id'=>$x->id,'option'=>'The code will fail to compile because the max() method in B passes the arguments in the call super.max(y, x) in the wrong order.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will fail to compile because a call to a max() method is ambiguous.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will compile and print 23, when run.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The code will compile and print 29, when run.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
interface A { public void methodA(); }
interface B { public void methodB(); }
interface C extends A,B{ public void methodC(); } //Line 3
class D implements B {
    public void methodB() { } //Line 5
}
class E extends D implements C { //Line 7
    public void methodA() { }
public void methodB() { } //Line 9
public void methodC() { }
}
What would be the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails, due to an error in line 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If you define D e = (D) (new E()), then e.methodB() invokes the version of methodB() defined at line 9','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails, due to an error in line 7','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If you define D e = (D) (new E()), then e.methodB() invokes the version of methodB() defined at line 5','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Select the correct statement:']); Option::create(['question_id'=>$x->id,'option'=>'A super() or this() call must always be provided explicitly as the first statement in the body of a constructor.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If both a subclass and its superclass do not have any declared constructors, the implicit default constructor of the subclass will call super() when run','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'If neither super() nor this() is declared as the first statement in the body of a constructor, this() will implicitly be inserted as the first statement.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If super() is the first statement in the body of a constructor, this() can be declared as the second statement','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Animal {
    void makeNoise() {System.out.println(  generic noise  ); }
}
class Dog extends Animal {
void makeNoise() {System.out.println(  bark  ); }
void playDead() { System.out.println(  roll over  ); }
}
class CastTest2 {
    public static void main(String [] args) {
Dog  a = (Dog) new Animal();
a.makeNoise();
}
}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'run time error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'generic noise','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'bark','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:

class Money {
    private String country =   Canada  ;
 public String getC() { return country; } }
 class Yen extends Money {
     public String getC() { return super.country; }
 public static void main(String[] args) {
        System.out.print(new Yen().getC() ); } }']); Option::create(['question_id'=>$x->id,'option'=>'Canada','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'null','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which Man class properly represents the relationship   Man has a best friend who is a Dog  ?
        A)class Man extends Dog { }
B)class Man implements Dog { }
C)class Man { private BestFriend dog; }
D)class Man { private Dog bestFriend; }']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'D','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface Output{
void display();
void show();
}
class Screen implements Output{
void show() {System.out.println(  show  );}
  void display(){ System.out.println(  display  ); }public static void main(String[] args) {
        new Screen().display();}}']); Option::create(['question_id'=>$x->id,'option'=>'display','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runs but no output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'The concept of multiple inheritance is implemented in Java by

    (A) extending two or more classes
    (B) extending one class and implementing one or more interfaces
    (C) implementing two or more interfaces
    (D) all of these']); Option::create(['question_id'=>$x->id,'option'=>'(A)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'(A) & (C)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'(D)','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'(B) & (C)','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface Output{
void display();
void show();
}
class Screen implements Output{
void display(){ System.out.println(  display  ); }public static void main(String[] args) {
        new Screen().display();}}']); Option::create(['question_id'=>$x->id,'option'=>'display','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runs but no output','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given a derived class method which overrides one of it’s base class methods. With derived class object you can invoke the overridden base method using:']); Option::create(['question_id'=>$x->id,'option'=>'super keyword','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'this keyword','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'by creating an instance of the base class','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'cannot call because it is overridden in derived class','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
abstract class Car{
    abstract void accelerate();
}
class Lamborghini extends Car{
@Override
void accelerate() {
System.out.println(  90 mph  );   }
  void nitroBooster(){
    System.out.print(  150 mph  ); }
  public static void main(String[] args) {
        Car mycar=new Lamborghini();
  Lamborghini lambo=(Lamborghini) mycar;
  lambo.nitroBooster();}}']); Option::create(['question_id'=>$x->id,'option'=>'150 mph','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'90 mph','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given the following classes and declarations, which statements are true?
// Classes
class Foo {
    private int i;
public void f() { /* ... */ }
public void g() { /* ... */ }
}
class Bar extends Foo {
    public int j;
public void g() { /* ... */ }
}
// Declarations:
Foo a = new Foo();
Bar b = new Bar();']); Option::create(['question_id'=>$x->id,'option'=>'The Bar class is a subclass of Foo.','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'The statement a.j = 5; is legal.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The statement b.f(); is legal.','is_answer'=>0.333333]); Option::create(['question_id'=>$x->id,'option'=>'The statement a.g(); is legal.','is_answer'=>0.333333]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'All data members in an interface are by default']); Option::create(['question_id'=>$x->id,'option'=>'abstract and final','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public and abstract','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public ,static and final','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'default and abstract','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the given code and select the correct output:

class SomeException {
}

class A {
    public void doSomething() { }
}

class B extends A {
    public void doSomething() throws SomeException { }
}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation of both classes A & B will fail','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation of both classes will succeed','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation of class A will fail. Compilation of class B will succeed','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation of class B will fail. Compilation of class A will succeed','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
class A {
    final void meth() {
      System.out.println(  This is a final method.  );
    }
  }
   class B extends A {
   void meth() {
   System.out.println(  Illegal!  );
   }
  }
  class MyClass8{
      public static void main(String[] args) {
    A a = new A();
    a.meth();
    B b= new B();
    b.meth();
   }
  }What would be the result?']); Option::create(['question_id'=>$x->id,'option'=>'This is a final method illegal','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'This is a final method Some error message','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'illegal Some error message','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
abstract class Ab{ public int getN(){return 0;}}
class Bc extends Ab{ public int getN(){return 7;}}
class Cd extends Bc { public int getN(){return 47;}}
class Test{
    public static void main(String[] args) {
  Cd cd=new Cd();
  Bc bc=new Cd();
  Ab ab=new Cd();
  System.out.println(cd.getN()+     +
    bc.getN()+     +ab.getN()); }}']); Option::create(['question_id'=>$x->id,'option'=>'0 0 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'47 7 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'47 47 47','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
interface DoMath
{
double getArea(int r);
}
interface MathPlus
{
double getVolume(int b, int h);
}
/* Missing Statements ? */
Select the correct missing statements.']); Option::create(['question_id'=>$x->id,'option'=>'class AllMath extends DoMath { double getArea(int r); }','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'interface AllMath implements MathPlus { double getVol(int x, int y); }','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'abstract class AllMath implements DoMath, MathPlus { public double getArea(int rad) { return rad * rad * 3.14; } }','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'class AllMath implements MathPlus { double getArea(int rad); }','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'interface interface_1 {
    void f1();
    }
class Class_1 implements interface_1 {
void f1() {
System.out.println(  From F1 funtion in Class_1 Class  );
}
}
public class Demo1 {
        public static void main(String args[]) {
  Class_1 o11 = new Class_1();
  o11.f1();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'From F1 function in Class_1 Class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Create an object for Interface only','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'interface A{}
class B implements A{}
class C extends B{}
public class Test extends C{
        public static void main(String[] args) {
 C c=new C();
 /* Line6 */}}

Which code, inserted at line 6, will cause a java.lang.ClassCastException?']); Option::create(['question_id'=>$x->id,'option'=>'B b=c;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A a2=(B)c;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C c2=(C)(B)c;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A a1=(Test)c;','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given the following classes and declarations, which statements are true?
// Classes
class A {
    private int i;
public void f() { /* ... */ }
public void g() { /* ... */ }
}
class B extends A{
    public int j;
public void g() { /* ... */ }
}
// Declarations:
A a = new A();
B b = new B();
Select the three correct answers.']); Option::create(['question_id'=>$x->id,'option'=>'The B class is a subclass of A.','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'The statement b.f(); is legal','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'The statement a.j = 5; is legal.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The statement a.g(); is legal','is_answer'=>0.333333]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements is true regarding the super() method?']);
Option::create(['question_id'=>$x->id,'option'=>'It can only be used in the parents constructor','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only one child class can use it','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'It must be used in the last statement of the constructor.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'It must be used in the first statement of the constructor.','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Is it possible if a class definition implements two interfaces, each of which has the same definition for the constant?']); Option::create(['question_id'=>$x->id,'option'=>'No—if a class implements several interfaces, each constant must be defined in only one interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'No—a class may not implement more than one interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Yes— either of the two variables can be accessed through : interfaceName.variableName','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Yes—since the definitions are the same it will not matter','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:

class Mountain{
 int height;
 protected Mountain(int x) {  height=x; }
 public int getH(){return height;}}

class Alps extends Mountain{
 public Alps(int h){  super(h); }
 public Alps(){  this(100); }
 public static void main(String[] args) {
 System.out.println(new Alps().getH());
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'100','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
interface employee{
 void saldetails();
 void perdetails();
}
abstract class perEmp implements employee{
 public void perdetails(){
  System.out.println(  per details  ); }}
 class Programmer extends perEmp{
 public static void main(String[] args) {
  perEmp emp=new Programmer();
  emp.saldetails(); }}']); Option::create(['question_id'=>$x->id,'option'=>'sal details','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'sal details per details','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'per details sal details','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
abstract class Fun{
 void time(){
  System.out.println(  Fun Time  ); }}
class Run extends Fun{
 void time(){
  System.out.println(  Fun Run  ); }
 public static void main(String[] args) {
  Fun f1=new Run();
  f1.time(); }}']); Option::create(['question_id'=>$x->id,'option'=>'Fun Time','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Fun Run','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the result when you try to compile and run the following code?
class Base1 {
 Base1() {
  int i = 100;
  System.out.println(i);
 }
}

public class Pri1 extends Base1 {
 static int i = 200;

 public static void main(String argv[]) {
  Pri1 p = new Pri1();
  System.out.println(i);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Error at compile time','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'200','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'100 followed by 200','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'100','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

class SuperClass
{
    public Integer getLength()
    {
        return new Integer(4);
    }
}

public class SubClass extends SuperClass
{
    public Long getLength()
    {
        return new Long(5);
    }

    public static void main(String[] args)
    {
        SuperClass sp = new SuperClass();
        SubClass sb = new SubClass();
        System.out.println(
        sp.getLength().toString() +   ,   + sub.getLength().toString() );
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'4, 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4, 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5, 4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output for the following code:
abstract class One{
private abstract void test();
}
class Two extends One{
void test(){
System.out.println(  hello  );
}}
class Test{
public static void main(String[] args){
Two obj = new Two();
obj.test();
}
}']); Option::create(['question_id'=>$x->id,'option'=>'run time exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile time error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'hello','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'hellohello','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output :
interface A{
void method1();
void method2();
}
class Test implements A{
public void method1(){
System.out.println(  hello  );}}
class RunTest{
public static void main(String[] args){
Test obj = new Test();
obj.method1();
}}']); Option::create(['question_id'=>$x->id,'option'=>'hello','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the result of attempting to compile and run the following code?
 import java.util.Vector; import java.util.LinkedList; public class Test1{ public static void main(String[] args) { Integer int1 = new Integer(10); Vector vec1 = new Vector(); LinkedList list = new LinkedList(); vec1.add(int1); list.add(int1); if(vec1.equals(list)) System.out.println(  equal  ); else System.out.println(  not equal  ); } } 1. The code will fail to compile. 2. Runtime error due to incompatible object comparison 3. Will run and print   equal  . 4. Will run and print   not equal  .']); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'TreeSet<String> s = new TreeSet<String>();
 TreeSet<String> subs = new TreeSet<String>();
 s.add(  a  ); s.add(  b  ); s.add(  c  ); s.add(  d  ); s.add(  e  );

 subs = (TreeSet)s.subSet(  b  , true,   d  , true);
 s.add(  g  );
 s.pollFirst();
 s.pollFirst();
 s.add(  c2  );
 System.out.println(s.size() +     + subs.size());']); Option::create(['question_id'=>$x->id,'option'=>'The size of s is 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The size of s is 5','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'The size of subs is 3','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'The size of s is 7','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which collection class allows you to grow or shrink its size and provides indexed access to
its elements, but its methods are not synchronized?']); Option::create(['question_id'=>$x->id,'option'=>'java.util.HashSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.LinkedHashSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.List','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.util.ArrayList','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statement is true about the following program?
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
public class WhatISThis {
public static void main(String[] na){
List<StringBuilder> list=new ArrayList<StringBuilder>();
list.add(new StringBuilder(  B  ));
list.add(new StringBuilder(  A  ));
list.add(new StringBuilder(  C  ));
Collections.sort(list,Collections.reverseOrder());
System.out.println(list.subList(1,2));
}
}']); Option::create(['question_id'=>$x->id,'option'=>'The program will compile and print the following output: [B]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile and print the following output: [B,A]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile and throw a runtime exception','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The program will not compile','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'static int binarySearch(List list, Object key) is a method of __________']); Option::create(['question_id'=>$x->id,'option'=>'Vector class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ArrayList class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Collection interface','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Collections class','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Venus {
 public static void main(String[] args) {
 int [] x = {1,2,3};
 int y[] = {4,5,6};
 new Venus().go(x,y);
 }
 void go(int[]... z) {
 for(int[] a : z)
 System.out.print(a[0]);
 }
 } What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'12','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'14','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'123','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'static void sort(List list) method is part of ________']); Option::create(['question_id'=>$x->id,'option'=>'Collection interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Collections class','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Vector class','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'ArrayList class','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
public class Test{
 public static void main(String[] args) {
  String []colors={  orange  ,  blue  ,  red  ,  green  ,  ivory  };
  Arrays.sort(colors);
 int s1=Arrays.binarySearch(colors,   ivory  );
  int s2=Arrays.binarySearch(colors,   silver  );
  System.out.println(s1+     +s2); }}']); Option::create(['question_id'=>$x->id,'option'=>'2 -4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3 -5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2 -6','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'3 -4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code was executed on June 01, 1983. What will be the output?
class Test{
 public static void main(String args[]){
   Date date=new Date();
   SimpleDateFormat sd;
  sd=new SimplpeDateFormat(  E MMM dd yyyy  );
  System.out.print(sd.format(date));}}']); Option::create(['question_id'=>$x->id,'option'=>'Wed Jun 01 1983','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'244 JUN 01 1983','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'PST JUN 01 1983','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'GMT JUN 01 1983','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Data{ Integer data; Data(Integer d){data=d;}
 public boolean equals(Object o){return true;}
 public int hasCode(){return 1;}}
class Test{
 public static void main(String ar[]){
   Set<Data> s=new HashSet<Data>();
   s.add(new Data(4));
   s.add(new Data(2));
    s.add(new Data(4));
    s.add(new Data(1));
   s.add(new Data(2));
  System.out.print(s.size());}}']); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'next() method of Scanner class will return _________']); Option::create(['question_id'=>$x->id,'option'=>'Integer','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Long','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'String','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public static Iterator reverse(List list) {
 Collections.reverse(list);
 return list.iterator();
 }
 public static void main(String[] args) {
 List list = new ArrayList();
 list.add(  1  ); list.add(  2  ); list.add(  3  );
 for (Object obj: reverse(list))
 System.out.print(obj +   ,   );
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'3, 2, 1,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1, 2, 3,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The code runs with no output.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
import java.util.Arrays;
import java.util.HashSet;
import java.util.Set;

public class MainClass {

  public static void main(String[] a) {
    String elements[] = {   A  ,   B  ,   C  ,   D  ,   E   };
    Set set = new HashSet(Arrays.asList(elements));

    elements = new String[] {   A  ,   B  ,   C  ,   D   };
    Set set2 = new HashSet(Arrays.asList(elements));

    System.out.println(set.equals(set2));
  }
} What is the result of given code?']); Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'import java.util.StringTokenizer;
class ST{
public static void main(String[] args){
String input =   Today is$Holiday  ;
StringTokenizer st = new StringTokenizer(input,  $  );
while(st.hasMoreTokens()){
System.out.println(st.nextElement());
}}']); Option::create(['question_id'=>$x->id,'option'=>'Today is Holiday','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Today is Holiday','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Both','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'int indexOf(Object o) - What does this method return if the element is not found in the List?']); Option::create(['question_id'=>$x->id,'option'=>'null','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'-1','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
   Integer arr[]={3,4,3,2};
   Set<Integer> s=new TreeSet<Integer>(Arrays.asList(arr));
   s.add(1);
   for(Integer ele :s){
    System.out.println(ele);   }  }}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'prints 3,4,2,1,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'prints 1,2,3,4','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but exception at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) It is a good practice to store heterogenous data in a TreeSet.
B) HashSet has default initial capacity (16) and loadfactor(0.75)
C)HashSet  does not maintain order of Insertion
D)TreeSet maintains order of Inserstion']); Option::create(['question_id'=>$x->id,'option'=>'A and B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and D is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and C is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'B and C is TRUE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
   TreeSet<Integer> ts=new TreeSet<Integer>();
   ts.add(1);
   ts.add(8);
   ts.add(6);
   ts.add(4);
   SortedSet<Integer> ss=ts.subSet(2, 10);
   ss.add(9);
   System.out.println(ts);
   System.out.println(ss);
 }}']); Option::create(['question_id'=>$x->id,'option'=>'[1,4,6,8] [4,6,8,9]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'[1,8,6,4] [8,6,4,9]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'[1,4,6,8,9] [4,6,8,9]','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'[1,4,6,8,9] [4,6,8]','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Inorder to remove one element from the given Treeset, place the appropriate line of code
public class Main {
  public static void main(String[] args) {
    TreeSet<Integer> tSet = new TreeSet<Integer>();
    System.out.println(  Size of TreeSet :    + tSet.size());
    tSet.add(new Integer(  1  ));
    tSet.add(new Integer(  2  ));
    tSet.add(new Integer(  3  ));
   System.out.println(tSet.size());
   // remove the one element from the Treeset
    System.out.println(  Size of TreeSet after removal :    + tSet.size());
  }
}']); Option::create(['question_id'=>$x->id,'option'=>'tSet.clear(new Integer(  1  ));','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'tSetdelete(new Integer(  1  ));','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'tSet.remove(new Integer(  1  ));','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'tSet.drop(new Integer(  1  ));','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A)Property files help to decrease coupling
B) DateFormat class allows you to format dates and times with customized styles.
C) Calendar class allows to perform date calculation and conversion of dates and times between timezones.
D) Vector class is not synchronized']); Option::create(['question_id'=>$x->id,'option'=>'A and B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and D is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and C is TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'B and D is TRUE','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which interface does java.util.Hashtable implement?']); Option::create(['question_id'=>$x->id,'option'=>'Java.util.Map','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Java.util.List','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Java.util.Table','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Java.util.Collection','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public static void before() {
Set set = new TreeSet();
set.add(  2  );
set.add(3);
set.add(  1  );
Iterator it = set.iterator();
while (it.hasNext())
System.out.print(it.next() +      );
}']); Option::create(['question_id'=>$x->id,'option'=>'The before() method will print 1 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The before() method will print 1 2 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The before() method will throw an exception at runtime','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The before() method will not compile','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 import java.util.*;

 public class LetterASort{
 public static void main(String[] args) {
 ArrayList<String> strings = new ArrayList<String>();
 strings.add(  aAaA  );
 strings.add(  AaA  );
 strings.add(  aAa  );
 strings.add(  AAaa  );
 Collections.sort(strings);
 for (String s : strings) { System.out.print(s +      ); }
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'aAaA aAa AAaa AaA','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'AAaa AaA aAa aAaA','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'AaA AAaa aAaA aAa','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which collection class allows you to access its elements by associating a key with an elements value, and provides synchronization?']); Option::create(['question_id'=>$x->id,'option'=>'java.util.SortedMap','is_answer'=>0]);
  Option::create(['question_id'=>$x->id,'option'=>'java.util.TreeMap','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.TreeSet','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.util.Hashtable','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and select the correct output:
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;
public class Lists {
        public static void main(String[] args) {
List<String> list=new ArrayList<String>();
list.add(  1  );
list.add(  2  );
list.add(1,   3  );
List<String> list2=new LinkedList<String>(list);
list.addAll(list2);
list2 =list.subList(2,5);
list2.clear();
System.out.println(list);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'[1,3,2]','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'[1,3,3,2]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'[1,3,2,1,3,2]','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'[3,1,2]','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public static Collection get() {
    Collection sorted = new LinkedList();
 sorted.add(  B  ); sorted.add(  C  ); sorted.add(  A  );
 return sorted;
 }
 public static void main(String[] args) {
        for (Object obj: get()) {
            System.out.print(obj +   ,   );
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'A, B, C,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B, C, A,','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'You wish to store a small amount of data and make it available for rapid access. You do not have a need for the data to be sorted, uniqueness is not an issue and the data will remain fairly static Which data structure might be most suitable for this requirement?

        1) TreeSet
2) HashMap
3) LinkedList
4) an array']); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
10. interface A { void x(); }
11. class B implements A {
        public void x() { }
     public void y() { }        }
12. class C extends B {
        public void x() {}         }
And:
20. java.util.List<a> list = new       java.util.ArrayList</a>();
21. list.add(new B());
22. list.add(new C());
23. for (A a:list) {
        24. a.x();
25. a.y();;
26. }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails because of an error in line 25','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The code runs with no output.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails because of an error in line 21','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) Iterator does not allow to insert elements during traversal
B) Iterator allows bidirectional navigation.
        C) ListIterator allows insertion of elements during traversal
D) ListIterator does not support bidirectional navigation']); Option::create(['question_id'=>$x->id,'option'=>'A and B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and D is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A and C is TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'B and D is TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of following code?
class Test{
    public static void main(String args[]){
  TreeSet<Integer> ts=new TreeSet<Integer>();
  ts.add(2);
  ts.add(3);
  ts.add(7);
  ts.add(5);
SortedSet<Integer> ss=ts.subSet(1,7);
  ss.add(4);
  ss.add(6);
System.out.print(ss);}}']); Option::create(['question_id'=>$x->id,'option'=>'[2,3,7,5]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'[2,3,4,5,6]','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'[2,3,7,5,4,6]','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'[2,3,4,5,6,7]','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Object get(Object key) - What does this method return if the key is not found in the Map?']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'-1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'null','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
class Test{
    public static void main(String args[]){
   TreeMap<Integer, String> hm=new TreeMap<Integer, String>();
  hm.put(2,  Two  );
 hm.put(4,  Four  );
 hm.put(1,  One  );
 hm.put(6,  Six  );
 hm.put(7,  Seven  );
 SortedMap<Integer, String> sm=hm.subMap(2,7);
 SortedMap<Integer,String> sm2=sm.tailMap(4);
 System.out.print(sm2);
 }}']); Option::create(['question_id'=>$x->id,'option'=>'{2=Two, 4=Four, 6=Six, 7=Seven}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'{4=Four, 6=Six, 7=Seven}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'{4=Four, 6=Six}','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'{2=Two, 4=Four, 6=Six}','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the given options is similar to the following code:

value += sum++ ;']); Option::create(['question_id'=>$x->id,'option'=>'value = value + sum; sum = sum + 1;','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'sum = sum + 1; value = value + sum;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'value = value + sum;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'value = value + ++sum;','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which will legally declare, construct, and initialize an array?']); Option::create(['question_id'=>$x->id,'option'=>'int [] myList = { 1 ,  2 ,  3 };','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int [] myList = (5, 8, 2);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int myList [] [] = {4,9,7,0};','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'int myList [] = {4, 3, 7};','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
public class Test {
            public static void main(String[] args) {
  String[] elements = {   for  ,   tea  ,   too   };
  String first = (elements.length > 0) ?elements[0] : null;
  System.out.println(first); }}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The variable first is set to null.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The variable first is set to elements[0].','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
interface Y{
void display(); }
 public static void main(String[] args) {
            new Y(){
                public void display(){
                System.out.println(  Hello World  ); }
  }.display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'Hello World','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but run without output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Test{
            public static void main(String[] args){
  byte b=(byte) (45 << 1);
  b+=4;
  System.out.println(b); }}
What should be the output for the code written above?']); Option::create(['question_id'=>$x->id,'option'=>'48','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'94','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the value of y when the code below is executed?
            int a = 4;
   int b = (int)Math.ceil(a % 3 + a / 3.0);']); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
interface Y{
void display(); }
 public static void main(String[] args) {
            Y y=new Y(){
                public void display(){
                System.out.println(  Hello World  );   }  };
  y.display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'Hello World','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but run without output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output of the following program?
public class demo {
            public static void main(String[] args) {
 int arr[5];
 for (int i = 0; i < arr.length; i++) {
 arr[i] = arr[i] + 10;
 }
 for (int j = 0; j < arr.length; j++)
 System.out.println(arr[j]);

 }
}']); Option::create(['question_id'=>$x->id,'option'=>'A sequence of five 10s are printed','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A sequence of Garbage Values are printed','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile time Error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the result of the following program?
public class Init {
String title;
boolean published;
static int total;
static double maxPrice;
public static void main(String[] args) {
Init initMe = new Init();
double price;
if (true)
price = 100.00;
System.out.println(  |   + initMe.title +   |   + initMe.published +   |   +
Init.total +   |   + Init.maxPrice +   |   + price+   |  );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'The program will compile, and print |null|false|0|0.0|0.0|, when run','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile, and print |null|true|0|0.0|100.0|, when run','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile, and print | |false|0|0.0|0.0|, when run','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The program will compile, and print |null|false|0|0.0|100.0|, when run','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  static class A{
   interface X{
    int z=4;   } }
 static void display(){
  System.out.println(A.X.z); }
  public static void main(String[] args) {
  display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Here is the general syntax for method definition:

accessModifier returnType methodName( parameterList )
{
  Java statements

  return returnValue;
}


What is true for the returnType and the returnValue?']); Option::create(['question_id'=>$x->id,'option'=>'The returnValue must be exactly the same type as the returnType','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The returnValue can be any type, but will be automatically converted to returnType when the method returns to the caller.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If the returnType is void then the returnValue can be any type','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The returnValue must be the same type as the returnType, or be of a type that can be converted to returnType without loss of information.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class C{
public static void main (String[] args) {
byte b1=33;              //1
b1++;                    //2
byte b2=55;              //3
b2=b1+1;                 //4
System.out.println(b1+    +b2);
}}
Consider the code above & select the correct output.']); Option::create(['question_id'=>$x->id,'option'=>'compile time error at line 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile time error at line 4','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'prints 34,56','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'runtime exception','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

public class CommandArgs
{
    public static void main(String [] args)
    {
        String s1 = args[1];
        String s2 = args[2];
        String s3 = args[3];
        String s4 = args[4];
        System.out.print(   args[2] =    + s2);
    }
}

and the command-line invocation is

> java CommandArgs 1 2 3 4']); Option::create(['question_id'=>$x->id,'option'=>'args[2] = 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'args[2] = 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'args[2] = null','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) The purpose of the method overriding is to perform different operation, though input remains the same.
B) one of the important Object Oriented principle is the code  reusability that can be achieved using abstraction']); Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is True','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both A and B is True','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code snippet:
int i = 10;
int n = ++i%5;
What are the values of i and n after the code is executed?']); Option::create(['question_id'=>$x->id,'option'=>'10, 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'11, 1','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'10, 0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'11 , 0','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
 class A{  static int x=3; }
 static void display(){
  System.out.println(A.x); }
  public static void main(String[] args) {
  display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:

int value = 0;
int count = 1;
value = count++ ;
System.out.println(  value:   + value  +    count:    + count);']); Option::create(['question_id'=>$x->id,'option'=>'value: 0 count: 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'value: 0 count: 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'value: 1 count: 1','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'value: 1 count: 2','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

public class CommandArgsTwo
{
    public static void main(String [] argh)
    {
        int x;
        x = argh.length;
        for (int y = 1; y <= x; y++)
        {
            System.out.print(      + argh[y]);
        }
    }
}

and the command-line invocation is

> java CommandArgsTwo 1 2 3']); Option::create(['question_id'=>$x->id,'option'=>'0 1 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'0 0 0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Test{
public static void main(String[] args){
int var;
var = var +1;
System.out.println(  var =  +var);
}}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'compiles and runs with no output','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'var = 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'does not compile','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'run time error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and select the correct output:
class Test{
 interface Y{
  void display(); }
 public static void main(String[] args) {
  new Y(){
   public void display(){
    System.out.println(  Hello World  );   }  };
 }}']); Option::create(['question_id'=>$x->id,'option'=>'Hello World','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but run without output','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following will declare an array and initialize it with five numbers?']); Option::create(['question_id'=>$x->id,'option'=>'Array a = new Array(5);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int [] a = {23,22,21,20,19};','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'int a [] = new int[5];','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'int [5] array;','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which three are legal array declarations? (Choose THREE)']); Option::create(['question_id'=>$x->id,'option'=>'int [] myScores [];','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'char [] myChars;','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'int [6] myScores;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Dog myDogs [];','is_answer'=>0.333333]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output of the following program?
public class MyClass
{
public static void main( String[] args )
{
private static final int value =9;
float total;
total = value + value / 2;
System.out.println( total );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'13','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'13.5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'13','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'As per the following code fragment, what is the value of a?
String s;
int a;
s =   Foolish boy.  ;
a = s.indexOf(  fool  );']); Option::create(['question_id'=>$x->id,'option'=>'-1','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'random value','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
class Test{
 public static void main(String[] args) {
  parse(  Four  ); }
 static void parse(String s){
  try {
   double d=Double.parseDouble(s);
  }catch(NumberFormatException nfe){
   d=0.0;  }finally{
   System.out.println(d);  } }}']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'A ParseException is thrown by the parse method at runtime','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A NumberFormatException is thrown by the parse method at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
class A{
 public int a=7;
 public void add(){
  this.a+=2; System.out.print(  a  ); }}

public class Test extends A{
 public int a=2;
 public void add(){
  this.a+=2; System.out.print(  t  ); }
 public static void main(String[] args) {
  A a =new Test();
  a.add();
  System.out.print(a.a); }}']); Option::create(['question_id'=>$x->id,'option'=>'t 7','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'t 9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'a 9','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code:
int x, y, z;
y = 1;
z = 5;
x = 0 - (++y) + z++;
After execution of this, what will be the values of x, y and z?']); Option::create(['question_id'=>$x->id,'option'=>'x = -7, y = 1, z = 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x = 3, y = 2, z = 6','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'x = 4, y = 1, z = 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'x = 4, y = 2, z = 6','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program ?

public class Test
{
    public static void main(String [] args)
    {
        signed int x = 10;
        for (int y=0; y<5; y++, x--)
            System.out.print(x +   ,   );
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'10, 9, 8, 7, 6,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'9, 8, 7, 6, 5,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code snippet:
int i = 10;
int n = i++%5;
What are the values of i and n after the code is executed?']); Option::create(['question_id'=>$x->id,'option'=>'10, 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'11, 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'10, 0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'11 , 0','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output of the following:

int a = 0;
int b = 10;

a = --b ;
System.out.println(  a:    + a +     b:    + b );']); Option::create(['question_id'=>$x->id,'option'=>'a: 9 b:11','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'a: 10 b: 9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'a: 9 b:9','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'a: 0 b:9','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider  the given code and select the correct output:
class Test{
 public static void main(String[] args){
  int num1 = 012;
  int num2 = 0x110;
  int sum =num1+=num2;
  System.out.println(  Ans =   +sum); }}']); Option::create(['question_id'=>$x->id,'option'=>'26','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'282','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will happen if you attempt to compile and run the following code?
Integer ten=new Integer(10);
Long nine=new Long (9);
System.out.println(ten + nine);
int i=1;
System.out.println(i + ten);']); Option::create(['question_id'=>$x->id,'option'=>'19 followed by 11','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'19 follwed by 20','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'10 followed by 1','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following are correct variable names? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'int #ss;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int 1ah;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'int _;','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'int $abc;','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following lines of code will compile without warning or error?
1) float f=1.3;
2) char c=  a  ;
3) byte b=257;
4) boolean b=null;
5) int i=10;']); Option::create(['question_id'=>$x->id,'option'=>'Line 1, Line 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Line 5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Line 1, Line 3, Line 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Line 3','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:

 public class Test {
 public static void main(String [] args) {
 int x = 5;
 boolean b1 = true;
 boolean b2 = false;
 if ((x == 4) && !b2 )
 System.out.print(  1   );
 System.out.print(  2   );
 if ((b2 = true) && b1 )
 System.out.print(  3   ); }']); Option::create(['question_id'=>$x->id,'option'=>'2 3','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'1 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
public class Test {
 public static void main(String[] args) {
  int x=5;
  Test t=new Test();
  t.disp(x);
  System.out.println(  main X=  +x);
 }
void disp(int x) {
  System.out.println(  disp X =   +x++);
 }}']); Option::create(['question_id'=>$x->id,'option'=>'disp X = 6 main X=6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'disp X = 5 main X=5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'disp X = 5 main X=6','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given the following piece of code:
public class Test {
public static void main(String args[]) {
int i = 0, j = 5 ;
for( ; (i < 3) && (j++ < 10) ; i++ ) {
System.out.print(      + i +       + j );
}
System.out.print(      + i +       + j );
}
}
what will be the output?']); Option::create(['question_id'=>$x->id,'option'=>'0 6 1 7 2 8 3 8','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'0 6 1 7 2 8 3 9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'0 5 1 5 2 5 3 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'compilation fails','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Identify the statements that are correct:
(A) int a = 13, a>>2 = 3
(B) int b = -8, b>>1 = -4
(C) int a = 13, a>>>2 = 3
(D) int b = -8, b>>>1 = -4']); Option::create(['question_id'=>$x->id,'option'=>'(A), (B) & (C)','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'(A), (B), (C) & (D)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'(C) & (D)','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'(A) & (B)','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  class A{
   interface X{
    int z=4;   } }
  static void display(){
  System.out.println(new A().X.z); }
  public static void main(String[] args) {
  display(); }}']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given
class MybitShift
{
    public static void main(String [] args)
    {
        int a = 0x5000000;
        System.out.print(a +    and    );
        a = a >>> 25;
        System.out.println(a);
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'83886080 and -2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2 and 83886080','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2 and -83886080','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'83886080 and 2','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'1. public class LineUp {
2. public static void main(String[] args) {
3. double d = 12.345;
4. // insert code here
5. }
6. }
Which code fragment, inserted at line 4, produces the output | 12.345|?

A. System.out.printf(  |%7f| \n  , d);
B. System.out.printf(  |%3.7f| \n  , d);
C. System.out.printf(  |%7.3d| \n  , d);
D. System.out.printf(  |%7.3f| \n  , d);']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'D','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Here is the general syntax for method definition:

accessModifier returnType methodName( parameterList )
{
  Java statements

  return returnValue;
}


What is true for the accessModifier?']); Option::create(['question_id'=>$x->id,'option'=>'It must always be private or public','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'It can be omitted, but if not omitted there are several choices, including private and public','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The access modifier must agree with the type of the return value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'It can be omitted, but if not omitted it must be private or public','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given classes A, B, and C, where B extends A, and C extends B, and where all classes
implement the instance method void doIt(). How can the doIt() method in A be
called from an instance method in C?']); Option::create(['question_id'=>$x->id,'option'=>'It is not possible','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'super.doIt()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'his.super.doIt()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'((A) this).doIt();','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'State the class relationship that is being implemented by the following code:
class Employee
{
private int empid;
private String ename;
public double getBonus()
{
Accounts acc = new Accounts();
return acc.calculateBonus();
}
}

class Accounts
{
public double calculateBonus(){//methods code}
}']); Option::create(['question_id'=>$x->id,'option'=>'Aggregation','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Simple Association','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Dependency','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Composition','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Say that class Rodent has a child class Rat and another child class Mouse. Class Mouse has a child class PocketMouse. Examine the following

Rodent rod;
Rat rat = new Rat();
Mouse mos = new Mouse();
PocketMouse pkt = new PocketMouse();

Which one of the following will cause a compiler error?']); Option::create(['question_id'=>$x->id,'option'=>'rod = mos','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'pkt = rat','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'pkt = null','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'rod = rat','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'How many objects and reference variables are created by the following lines of code?
            Employee emp1, emp2;
emp1 = new Employee() ;
Employee emp3 = new Employee() ;']); Option::create(['question_id'=>$x->id,'option'=>'Two objects and three reference variables.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Three objects and two reference variables','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Four objects and two reference variables','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Two objects and two reference variables.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:

public class Test {
        int squares = 81;
            public static void main(String[] args) {
 new Test().go(); }
void go() {
        incr(++squares);
 System.out.println(squares); }
 void incr(int squares) { squares += 10; } }']); Option::create(['question_id'=>$x->id,'option'=>'92','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'91','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'82','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String name=  ALDPR7882E  ;
  System.out.println(name.endsWith(  E  ) & name.matches(  [A-Z]{5}[0-9]{4}[A-Z]  ));}}']); Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  StringBuffer sb=new StringBuffer(  YamunaRiver  );
  System.out.println(sb.capacity()); }}']); Option::create(['question_id'=>$x->id,'option'=>'10','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'27','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'24','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'11','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Examine this code:

String stringA =   Wild  ;
String stringB =    Irish  ;
String stringC =    Rose  ;
String result;

Which of the following puts a reference to   Wild Irish Rose   in result?']); Option::create(['question_id'=>$x->id,'option'=>'result = stringA.concat( stringB.concat( stringC ) );','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'result.concat( stringA, stringB, stringC );','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'result+stringA+stringB+stringC;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'result = concat(StringA).concat(StringB).concat(StringC)','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A)A string buffer is a mutable sequence of characters.
        B) sequece of characters in the string buffer can not be changed.']); Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both A and B is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test {
    public static void main(String[] args) {
  new Test().display(1,  hi  );
  new Test().display(2,  hi  ,   world   ); }
  public void display(int x,String... s) {
            System.out.print(s[s.length-x] +      ); }}']); Option::create(['question_id'=>$x->id,'option'=>'hi hi','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'hi world','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'world','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String name=  vikaramaditya  ;
  System.out.println(name.substring(2, 5).toUpperCase().charAt(2));}}']); Option::create(['question_id'=>$x->id,'option'=>'K','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'R','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'I','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'For two string objects obj1 and obj2:
A) Use of obj1 == obj2 tests whether two String object references refer to the same object
B) obj1.equals(obj2) compares the sequence of characters in obj1 and obj2.']); Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both A and B is TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"What will be the result when you attempt to compile and run the following code?.
public class Conv
        {
            public static void main(String argv[]){
 Conv c=new Conv();
 String s=new String(  ello  );
 c.amethod(s);
    }

    public void amethod(String s){
            char c='H';
 c+=s;
 System.out.println(c);
    }
}"]);
 Option::create(['question_id'=>$x->id,'option'=>'Compilation and output the string   Hello  ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation and output the string   ello  ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation and output the string elloH','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Examine this code:

String stringA =   Hello   ;
String stringB =    World  ;
String stringC =    Java  ;
String result;
Which of the following puts a reference to   Hello World Java   in result?']); Option::create(['question_id'=>$x->id,'option'=>'result = stringA.concat( stringB.concat( stringC ) );','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'result.concat( stringA, stringB, stringC );','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'result+stringA+stringB+stringC;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'result = concat(StringA).concat(StringB).concat(StringC)','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String name=  vikaramaditya  ;  System.out.println(name.codePointAt(2)+name.charAt(3));  }}']); Option::create(['question_id'=>$x->id,'option'=>'203','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'204','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'205','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  StringBuffer sb = new StringBuffer(  antarctica  );
      sb.reverse();
      sb.replace(2, 7,   c  );
      sb.delete(0,2);
      System.out.println(sb); }}']); Option::create(['question_id'=>$x->id,'option'=>'acctna','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'iccratna','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ctna','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'tna','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which code can be inserted at Line X to print   Equal  ?
public class EqTest{
            public static void main(String argv[]){
   EqTest e=new EqTest();
  }

 EqTest(){
 String s=  Java  ;
   String s2=  java  ;
   // Line X
    {
        System.out.println(  Equal  );
    }else
    {
        System.out.println(  Not equal  );
   }
  }
}']); Option::create(['question_id'=>$x->id,'option'=>'if(s==s2)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'if(s.equals(s2))','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'if(s.equalsIgnoreCase(s2))','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'if(s.noCaseMatch(s2))','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
public class Theory {
            public static void main(String[] args) {
String s1 =   abc  ;
String s2 = s1;
s1 +=   d  ;
System.out.println(s1 +       + s2 +       + (s1==s2));

StringBuffer sb1 = new StringBuffer(  abc  );
StringBuffer sb2 = sb1;
sb1.append(  d  );
System.out.println(sb1 +       + sb2 +       + (sb1==sb2));
}
}
Which are true? (Choose all that apply.)']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The first line of output is abc abc false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The first line of output is abcd abc false','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'The second line of output is abcd abc false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test {
    public static void main(String args[]) {
 String name=new String(  batman  );
 int ibegin=1;
 char iend=3;
 System.out.println(name.substring(ibegin, iend));
 } }']); Option::create(['question_id'=>$x->id,'option'=>'bat','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'at','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'atm','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String data=  78  ;
  System.out.println(data.append(  abc  ));   }}']); Option::create(['question_id'=>$x->id,'option'=>'78abc','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'abc78','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but exception at run time','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 String test =   This is a test  ;
 String[] tokens = test.split(  \s  );
 System.out.println(tokens.length);
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  StringBuffer sb = new StringBuffer(  antarctica  );
      sb.reverse();
      sb.insert(4, 'r');
      sb.replace(2, 4,   c  );
      System.out.println(sb); }}"]); Option::create(['question_id'=>$x->id,'option'=>'acitcratna','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'acitrcratna','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'accircratna','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'accrcratna','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test {
    public static void main(String[] args) {
  new Test().display(  hi  , 1);
  new Test().display(  hi  ,   world  , 2); }
  public void display(String... s, int x) {
            System.out.print(s[s.length-x] +      ); } }']); Option::create(['question_id'=>$x->id,'option'=>'hi hi','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hi world','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'world','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What does this code write:

StringTokenizer stuff = new StringTokenizer(   abc def+ghi  ,   +  );
System.out.println( stuff.nextToken() );
System.out.println( stuff.nextToken() );']); Option::create(['question_id'=>$x->id,'option'=>'abc def','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'abc def ghi','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'abc def +','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'abc def +ghi','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test {
    public static void main(String args[]) {
 String s1 =   abc  ;
 String s2 =   def  ;
 String s3 = s1.concat(s2.toUpperCase( ) );
 System.out.println(s1+s2+s3); } }']); Option::create(['question_id'=>$x->id,'option'=>'abcdefabcdef','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'    abcabcDEFDEF','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'     abcdefabcDEF','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String name=  Anthony Gomes  ;
  int a=111;
  System.out.println(name.indexOf(a));  }}']); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'6','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class StringManipulation{
            public static void main(String[] args){
String str = new String(  Cognizant  );
str.concat(   Technology  );
StringBuffer sbf = new StringBuffer(   Solutions  );
System.out.println(str+sbf);
}}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'Cognizant Technology Solutions','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Cognizant Technology','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Cognizant Solutions','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Technology Solutions','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the result of the following:

String ring =   One ring to rule them all,\n  ;
String find =   One ring to find them.  ;

if ( ring.startsWith(  One  ) && find.startsWith(  One  ) )
    System.out.println( ring+find );
else
    System.out.println(   Different Starts   );']); Option::create(['question_id'=>$x->id,'option'=>'One ring to rule them all, One ring to find them.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'One ring to rule them all, One ring to find them.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'One ring to rule them all,\n One ring to find them.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Different Starts','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String name=  Anthony Gomes  ;
  System.out.println(name.replace('n', name.charAt(3)).compareTo(name));  }}"]); Option::create(['question_id'=>$x->id,'option'=>'-6','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class MyClass {
String str1=  str1  ;
String str2 =  str2  ;
String str3=  str3  ;
str1.concat(str2);
System.out.println(str3.concat(str1));
}
}']); Option::create(['question_id'=>$x->id,'option'=>'The code will fail to compile because the expression str3.concat(str1) will not result in a valid argument for the println() method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will print str3str1str2,when run','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will print str3,when run','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The program will print str3str1,when run','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  StringBuffer sb = new StringBuffer(  antarctica  );
      sb.delete(0,6);
      System.out.println(sb); }}']); Option::create(['question_id'=>$x->id,'option'=>'tica','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'anta','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Complies but exception at run time','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
            public static void main(String[] args) {
  String data=  7882  ;
  data+=32;  System.out.println(data);   }}']); Option::create(['question_id'=>$x->id,'option'=>'788232','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'7914','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but exception at run time','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class X2
        {
            public X2 x;
    public static void main(String [] args)
    {
        X2 x2 = new X2();  /* Line 6 */
        X2 x3 = new X2();  /* Line 7 */
        x2.x = x3;
        x3.x = x2;
        x2 = new X2();
        x3 = x2; /* Line 11 */
    }
}

after line 11 runs, how many objects are eligible for garbage collection?']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statement is true?
            A. A classs finalize() method CANNOT be invoked explicitly.
B. super.finalize() is called implicitly by any overriding finalize() method.
C. The finalize() method for a given object is called no more than once by the garbage collector.
D. The order in which finalize() is called on two objects is based on the order in which the two
objects became finalizable.']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'D','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following allows a programmer to destroy an object x?']); Option::create(['question_id'=>$x->id,'option'=>'x.delete()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x.finalize()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime.getRuntime().gc()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Only the garbage collection system can destroy an object.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Given :
public class MainOne {
    public static void main(String args[]) {
      String str =   this is java  ;
      System.out.println(removeChar(str,'s'));
    }

    public static String removeChar(String s, char c) {
      String r =     ;
      for (int i = 0; i < s.length(); i++) {
        if (s.charAt(i) != c)
          r += s.charAt(i);
      }
      return r;
    }
  } What would be the result?"]);
 Option::create(['question_id'=>$x->id,'option'=>'This is java','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Thi is java','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'This i java','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Thi i java','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class X
{
    public static void main(String [] args)
    {
        X x = new X();
        X x2 = m1(x); /* Line 6 */
        X x4 = new X();
        x2 = x4; /* Line 8 */
        doComplexStuff();    }
    static X m1(X mx)     {
        mx = new X();
        return mx;    }}
After line 8 runs. how many objects are eligible for garbage collection?']);
 Option::create(['question_id'=>$x->id,'option'=>'0','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'How can you force garbage collection of an object?']);
Option::create(['question_id'=>$x->id,'option'=>'Garbage collection cannot be forced','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'Call System.gc()','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Call System.gc() passing in a reference to the object to be garbage collected','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Call Runtime.gc().','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statements describe guaranteed behaviour of the garbage collection and finalization mechanisms? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'An object is deleted as soon as there are no more references that denote the object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The finilize() method will eventually be called on every object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The finalize() method will never be called more than once on an object','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'An object will not be garbage collected as long as it possible for a live thread to access it through a reference.','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Examine the following code:

    int count =  1;
    while (  ___________ )
    {
      System.out.print( count +       );
      count = count + 1;
    }
    System.out.println(  );

What condition should be used so that the code prints:

1 2 3 4 5 6 7 8']); Option::create(['question_id'=>$x->id,'option'=>'count < 9','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'count+1 <= 8','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'count < 8','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'count != 8','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Breaker2 {
 static String o =     ;
 public static void main(String[] args) {
 z:
 for(int x = 2; x < 7; x++) {
 if(x==3) continue;
 if(x==5) break z;
 o = o + x;
 }
 System.out.println(o);
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'24','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'234','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'246','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
 public static void main(String args[]){
   String hexa    =   0XFF  ;
  int number = Integer.decode(hexa);
   System.out.println(number);  }}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1515','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'255','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 class Atom {
 Atom() { System.out.print(  atom   ); }
 }
 class Rock extends Atom {
 Rock(String type) { System.out.print(type); }
}
 public class Mountain extends Rock {
 Mountain() {
 super(  granite   );
 new Rock(  granite   );
 }
 public static void main(String[] a) { new Mountain(); }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'granite granite','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'atom granite granite','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'atom granite atom granite','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements about arrays is syntactically wrong?']); Option::create(['question_id'=>$x->id,'option'=>'Person[] p [];','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Person p[][] = new Person[2][];','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Person[] p = new Person[5];','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Person p[5];','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Barn {
 public static void main(String[] args) {
 new Barn().go(  hi  , 1);
 new Barn().go(  hi  ,   world  , 2);
 }
 public void go(String... y, int x) {
 System.out.print(y[y.length - 1] +      );
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'hi hi','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hi world','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'world world','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
int n = 10;
switch(n)
{
case 10: n = n + 1;
case 15: n = n + 2;
case 20: n = n + 3;
case 25: n = n + 4;
case 30: n = n + 5;
}
System.out.println(n);
What is the value of ’n’ after executing the following code?']); Option::create(['question_id'=>$x->id,'option'=>'23','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'32','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'25','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public void go() {
 String o =     ;
 z:
 for(int x = 0; x < 3; x++) {
 for(int y = 0; y < 2; y++) {
 if(x==1) break;
 if(x==2 && y==1) break z;
 o = o + x + y;
 }
 }
 System.out.println(o);
 }
What is the result when the go() method is invoked?']); Option::create(['question_id'=>$x->id,'option'=>'00','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'0001','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'000120','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'00012021','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

public class Switch2
{
    final static short x = 2;
    public static int y = 0;
    public static void main(String [] args)
    {
        for (int z=0; z < 3; z++)
        {
            switch (z)
            {
                case y: System.out.print(  0   );   /* Line 11 */
                case x-1: System.out.print(  1   ); /* Line 12 */
                case x: System.out.print(  2   );   /* Line 13 */
            }
        }
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'0 1 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'0 1 2 1 2 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails at line 11','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails at line 12.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
class Test{
  public static void main(String args[]){
    int a=5;
   if(a=3){
   System.out.print(  Three  );}else{
  System.out.print(  Five  );}}}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Five','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Three','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public void foo( boolean a, boolean b)
{
    if( a )
    {
        System.out.println(  A  ); /* Line 5 */
    }
    else if(a && b) /* Line 7 */
    {
        System.out.println(   A && B  );
    }
    else /* Line 11 */
    {
        if ( !b )
        {
            System.out.println(   notB  ) ;
        }
        else
        {
            System.out.println(   ELSE   ) ;
        }
    }
}

What would be the result?']); Option::create(['question_id'=>$x->id,'option'=>'If a is true and b is false then the output is   notB  ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If a is true and b is true then the output is   A && B  ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If a is false and b is false then the output is   ELSE  ','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If a is false and b is true then the output is   ELSE  ','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
  Long l=0l;
  System.out.println(l.equals(0));}}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
class Test{
 public static void main(String args[]){
   boolean flag=true;
   if(flag=false){
   System.out.print(  TRUE  );}else{
   System.out.print(  FALSE  );}}}']); Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Test{
 public static void main(String[] args) {
  int x=-1,y=-1;
  if(++x=++y)
   System.out.println(  R.T. Ponting  );
  else
   System.out.println(  C.H. Gayle  );
 }
}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'R.T.Ponting','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C.H.Gayle','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Batman {
 int squares = 81;
 public static void main(String[] args) {
 new Batman().go();
 }
 void go() {
 incr(++squares);
 System.out.println(squares);
 }
 void incr(int squares) { squares += 10; }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'81','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'91','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'92','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'82','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
   int l=7;
   Long  L = (Long)l;
   System.out.println(L);  }}']); Option::create(['question_id'=>$x->id,'option'=>'7','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class SwitchTest
{
    public static void main(String[] args)
    {
        System.out.println(  value =   + switchIt(4));
    }
    public static int switchIt(int x)
    {
        int j = 1;
        switch (x)
        {
            case 1: j++;
            case 2: j++;
            case 3: j++;
            case 4: j++;
            case 5: j++;
            default: j++;
            }
        return j + x;
    }
}
What will be the output of the program?']); Option::create(['question_id'=>$x->id,'option'=>'value = 6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'value = 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'value = 2','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'value = 8','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 import java.util.*;
 public class Explorer3 {
 public static void main(String[] args) {
 TreeSet<Integer> s = new TreeSet<Integer>();
 TreeSet<Integer> subs = new TreeSet<Integer>();
 for(int i = 606; i < 613; i++)
 if(i%2 == 0) s.add(i);
 subs = (TreeSet)s.subSet(608, true, 611, true);
 subs.add(629);
 System.out.println(s +       + subs);
 }
 }
What is the result?']);
 Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'[608, 610, 612, 629] [608, 610, 629]','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'[608, 610, 612, 629] [608, 610]','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
public class Test{
public static void main(String[] args) {
 String num=    ;
 z: for(int x=0;x<3;x++)
  for(int y=0;y<2;y++){
   if(x==1) break;
   if(x==2 && y==1) break z;
   num=num+x+y;
  }System.out.println(num);}}']); Option::create(['question_id'=>$x->id,'option'=>'0001','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'000120','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'00012021','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?
int x = 3;
int y = 1;
if (x = y) /* Line 3 */
{
    System.out.println(  x =   + x);
}']); Option::create(['question_id'=>$x->id,'option'=>'x = 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x = 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The code runs with no output.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public static void test(String str) {
 int check = 4;
 if (check = str.length()) {
 System.out.print(str.charAt(check -= 1) +  ,   );
 } else {
 System.out.print(str.charAt(0) +   ,   );
 }
 }
and the invocation:
 test(  four  );
 test(  tee  );
 test(  to  );
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'r, t, t,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'r, e, o,','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which collection implementation is suitable for maintaining an ordered sequence of objects,when objects are frequently inserted in and removed from the middle of the sequence?']); Option::create(['question_id'=>$x->id,'option'=>'TreeMap','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'HashSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Vector','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'LinkedList','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'11. double input = 314159.26;
12. NumberFormat nf = NumberFormat.getInstance(Locale.ITALIAN);
13. String b;
14. //insert code here

Which code, inserted at line 14, sets the value of b to 314.159,26?']); Option::create(['question_id'=>$x->id,'option'=>'b = nf.parse( input );','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'b = nf.format( input );','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'b = nf.equals( input );','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'b = nf.parseObject( input );','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'int I = 0;
    outer:
    while (true)
    {
        I++;
        inner:
        for (int j = 0; j < 10; j++)
        {
            I += j;
            if (j == 3)
                continue inner;
            break outer;
        }
        continue outer;
    }
System.out.println(I);

What will be thr result?']); Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the range of the random number r generated by the code below?
int r = (int)(Math.floor(Math.random() * 8)) + 2;']); Option::create(['question_id'=>$x->id,'option'=>'2 <= r <= 9','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'3 <= r <= 10','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2<= r <= 10','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'3 <= r <= 9','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of these statements are true?']); Option::create(['question_id'=>$x->id,'option'=>'HashTable is a sub class of Dictionary','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'ArrayList is a sub class of Vector','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'LinkedList is a subclass of ArrayList','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Stack is a subclass of Vector','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class While
{
    public void loop()
    {
        int x= 0;
        while ( 1 ) /* Line 6 */
        {
            System.out.print(  x plus one is    + (x + 1)); /* Line 8 */
        }
    }
}

Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'There are syntax errors on lines 1 and 6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'There are syntax errors on lines 1, 6, and 8','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'There is a syntax error on line 6','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'There is a syntax error on line 1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Cosider the following code and choose the correct option:
class Test{
  public static void main(String args[]){    System.out.println(Integer.parseInt(  2147483648  , 10));
  }}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2.147483648E9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'NumberFormatException at run time','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class AutoBox {
   public static void main(String args[]) {

  int i = 10;
  Integer iOb = 100;
     i = iOb;
     System.out.println(i +       + iOb);
   }
 } whether this code work properly, if so what would be the result?']); Option::create(['question_id'=>$x->id,'option'=>'No, Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Yes, 10, 100','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'No, Runtime error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Yes, 100, 100','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
public class Test{
public static void main(String[] args) {
 int x = 0;
  int y = 10;
  do {
  y--;
  ++x;
  } while (x < 5);
  System.out.print(x +   ,   + y);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'5,6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'6,5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5,5','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'6,6','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following loop bodies DOES compute the product from 1 to 10 like (1 * 2 * 3 * 4 * 5 *
6 * 7 * 8 * 9 * 10)?
int s = 1;
for (int i = 1; i <= 10; i++)
{
<What to put here?>
}']); Option::create(['question_id'=>$x->id,'option'=>'s += i * i;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s++;','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s = s + s * i;','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'s *= i;','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements are true regarding wrapper classes? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'String is a wrapper class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Double has a compareTo() method','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Character has a intValue() method','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Byte extends Number','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'import java.util.SortedSet;
import java.util.TreeSet;

public class Main {

  public static void main(String[] args) {
    TreeSet<String> tSet = new TreeSet<String>();
    tSet.add(  1  );
    tSet.add(  2  );
    tSet.add(  3  );
    tSet.add(  4  );
    tSet.add(  5  );
    SortedSet sortedSet =_____________(  3  );
    System.out.println(  Head Set Contains :    + sortedSet);
  }
} What is the missing method in the code to get the head set of the tree set?']); Option::create(['question_id'=>$x->id,'option'=>'tSet.headSet','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'tset.headset','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'headSet','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'HeadSet','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of following code?

TreeSet map = new TreeSet();
map.add(  one  );
map.add(  two  );
map.add(  three  );
map.add(  four  );
map.add(  one  );
Iterator it = map.iterator();
while (it.hasNext() )
{
    System.out.print( it.next() +       );
}']); Option::create(['question_id'=>$x->id,'option'=>'one two three four','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'four three two one','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'four one three two','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'one two three four one','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
 Long data=23;
  System.out.println(data); }}']); Option::create(['question_id'=>$x->id,'option'=>'23','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statements are true about maps? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'The return type of the values() method is set','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Changes made in the Set view returned by keySet() will be reflected in the original map','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'The Map interface extends the Collection interface','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'All keys in a map are unique','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Test {
 public enum Dogs {collie, harrier, shepherd};
 public static void main(String [] args) {
 Dogs myDog = Dogs.shepherd;
 switch (myDog) {
 case collie:
 System.out.print(  collie   );
 case default:
 System.out.print(  retriever   );
 case harrier:
 System.out.print(  harrier   );
 }
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'harrier','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'shepherd','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'retriever','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){
   Long  L = null;    long  l = L;
  System.out.println(L);
  System.out.println(l);
  }}']); Option::create(['question_id'=>$x->id,'option'=>'0 null','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'null 0','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
class Test{
  public static void main(String args[]){
   int num=3;   switch(num){
   case 1: case 3: case 4:  {
    System.out.println(  bat man  );  }
   case 2: case 5: {
    System.out.println(  spider man  );  }break;  } }}']); Option::create(['question_id'=>$x->id,'option'=>'bat man','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'bat man spider man','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'spider man','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements is TRUE regarding a Java loop?']); Option::create(['question_id'=>$x->id,'option'=>'An overflow error can only occur in a loop','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A continue statement doesn’t transfer control to the test statement of the for loop','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A loop may have multiple exit points','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'If a variable of type int overflows during the execution of a loop, it will cause an exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the value of ’n’ after executing the following code?
int n = 10;
int p = n + 5;
int q = p - 10;
int r = 2 * (p - q);
switch(n)
{
case p: n = n + 1;
case q: n = n + 2;
case r: n = n + 3;
default: n = n + 4;
}']); Option::create(['question_id'=>$x->id,'option'=>'14','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'28','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'10','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
double height = 5.5;
   if(height-- >= 5.0)
   System.out.print(  tall   );
   if(--height >= 4.0)
   System.out.print(  average   );
   if(height-- >= 3.0)
   System.out.print(  short   );
   else
   System.out.print(  very short   );
  }
What would be the Result?']); Option::create(['question_id'=>$x->id,'option'=>'very short','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'average','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'tall','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'tall short','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
public static void main(String ar[]){
 TreeMap<Integer,String> tree = new TreeMap<Integer,String>();
 tree.put(1,   one  );
 tree.put(2,   two  );
 tree.put(3,   three  );
 tree.put(4,  Four  );
    System.out.println(tree.higherKey(2));
    System.out.println(tree.ceilingKey(2));
    System.out.println(tree.floorKey(1));
    System.out.println(tree.lowerKey(1));
}}']); Option::create(['question_id'=>$x->id,'option'=>'2 2 1 1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3 2 1 null','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'4 2 1 1','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'3 2 1 1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output of the following code :
class try1{
 public static void main(String[] args) {
  System.out.println(  good  );
  while(false){
   System.out.println(  morning  );
  }
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'good','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'good morning morning ….','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compiler error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Consider the following code and choose the correct output:
class Test{
  public static void main(String args[]){
   int num='b';   switch(num){
   default :{
   System.out.print(  default  );}
   case 100 : case 'b' : case 'c' :  {
    System.out.println(  brownie  );  break;}
   case 200: case 'e': {
    System.out.println(  pastry  );  }break;  } }}"]); Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'default brownie','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'brownie','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What does the following code fragment write to the monitor?


int sum =  21;
if ( sum != 20 )
  System.out.print(  You win   );
else
  System.out.print(  You lose    );

System.out.println(  the prize.  );

What does the code fragment prints?']); Option::create(['question_id'=>$x->id,'option'=>'You win','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'You lose','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'You win the prize','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'You lose the prize.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'what will be the result of attempting to compile and run the following class?
Public class IFTest{
public static void main(String[] args){
int i=10;
if(i==10)
if(i<10)
System.out.println(  a  );
else
System.out.println(  b  );
}}']); Option::create(['question_id'=>$x->id,'option'=>'The code will fail to compile because the syntax of the if statement is incorrect','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will fail to compile because the compiler will not be able to determine which if statement the else clause belongs to','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will compile correctly and display the letter a,when run','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The code will compile correctly and display the letter b,when run','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
static void myFunc()
   {
   int i, s = 0;
   for (int j = 0; j < 7; j++) {
   i = 0;
   do {
   i++;
   s++;
   } while (i < j);
   }
   System.out.println(s);
   }
     } What would be the result']); Option::create(['question_id'=>$x->id,'option'=>'20','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'21','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'22','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'23','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Choose TWO correct options:']); Option::create(['question_id'=>$x->id,'option'=>'To write an object to a file, you use the class ObjectFileWriter','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'To write characters to an outputstream, you have to make use of the class CharacterOutputStream.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'OutputStream is the abstract superclass of all classes that represent an outputstream of bytes.','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Subclasses of the class Reader are used to read character streams.','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
class Test{
  public static void main(String args[]){
   int num=3;   switch(num){
   default :{
   System.out.print(  default  );}
   case 1: case 3: case 4:  {
    System.out.println(  apple  );  break;}
   case 2: case 5: {
    System.out.println(  black berry  );  }break;  } }}']); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'apple','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'default apple','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'switch(x)
{
 default:
 System.out.println(  Hello  );
}
Which of the following are acceptable types for x?
1.byte
2.long
3.char
4.float
5.Short
6.Long']); Option::create(['question_id'=>$x->id,'option'=>'2 and 4','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'1 ,3 and 5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'3 and 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'4 and 6','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output :
class One{
 public static void main(String[] args) {
  int a=100;
  if(a>10)
   System.out.println(  M.S.Dhoni  );
  else if(a>20)
   System.out.println(  Sachin  );
  else if(a>30)
   System.out.println(  Virat Kohli  );}
 }']); Option::create(['question_id'=>$x->id,'option'=>'M.S.Dhoni','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'all of these','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Virat Kohli','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'M.S.Dhoni Sachin Virat Kohli','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output :
class Test{
 public static void main(String[] args) {
   int a=5,b=10,c=1;
   if(a>c){
    System.out.println(  success  );
    }
   else{
    break;
    }
   }
 }']); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compiler error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'success','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  public static void main(String args[]){    int x=034;
    int y=12;
    int ans=x+y;
    System.out.println(ans);
  }}']); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'46','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'40','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Test {
 public enum Dogs {collie, harrier};
 public static void main(String [] args) {
 Dogs myDog = Dogs.collie;
 switch (myDog) {
 case collie:
 System.out.print(  collie   );
 case harrier:
 System.out.print(  harrier   );
 }
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'collie','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'harrier','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'collie harrier','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of following code?

import java.util.*;
class I
{
    public static void main (String[] args)
    {
        Object i = new ArrayList().iterator();
        System.out.print((i instanceof List)+  ,  );
        System.out.print((i instanceof Iterator)+  ,  );
        System.out.print(i instanceof ListIterator);
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'Prints: false, false, false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Prints: false, false, true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Prints: false, true, false','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Prints: false, true, true','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class Test {
 public static void main(String [] args) {
 int x = 5;
 boolean b1 = true;
 boolean b2 = false;

 if ((x == 4) && !b2 )
 System.out.print(  1   );
 System.out.print(  2   );
 if ((b2 = true) && b1 )
System.out.print(  3   );
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'1 2 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'2 3','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
int a = 5;
int b = 5;
int c = 5;
if (a > 3)
if (b > 4)
if (c > 5)
c += 1;
else
c += 2;
else
c += 3;
c += 4;
What is the value of variable c after executing the following code?']); Option::create(['question_id'=>$x->id,'option'=>'9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'11','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 Float pi = new Float(3.14f);
 if (pi > 3) {
 System.out.print(  pi is bigger than 3.   );
 }
 else {
 System.out.print(  pi is not bigger than 3.   );
 }
 finally {
 System.out.println(  Have a nice day.  );
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'pi is bigger than 3.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception occurs at runtime.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'pi is bigger than 3. Have a nice day.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
int i = l, j = -1;
switch (i)
{
    case 0, 1: j = 1;
    case 2: j = 2;
    default: j = 0;
}
System.out.println(  j =    + j);']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'j = -1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'j = 0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'j = 1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the output :
class try1{
 public static void main(String[] args) {
  int x=1;
  if(x--)
   System.out.println(  good  );
  else
  System.out.println(  bad  );
   }
 }']); Option::create(['question_id'=>$x->id,'option'=>'run time error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'good','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compile error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'bad','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 int x = 0;
 int y = 10;
 do {
 y--;
 ++x;
 } while (x < 5);
 System.out.print(x +   ,   + y);
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'5,6','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5,5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'6,5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'6,6','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What are the thing to be placed to complete the code?
class Wrap {
  public static void main(String args[]) {

    _______________ iOb = ___________ Integer(100);

    int i = iOb.intValue();

    System.out.println(i +       + iOb); // displays 100 100
  }
}']); Option::create(['question_id'=>$x->id,'option'=>'int, int','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Integer, new','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Integer, int','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'int, Integer','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following options give the valid package names? (Choose 3)']); Option::create(['question_id'=>$x->id,'option'=>'dollorpack.$pack.$$pack','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'$$.$$.$$','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'_score.pack.__pack','is_answer'=>0.333333]); Option::create(['question_id'=>$x->id,'option'=>'p@ckage.subp@ckage.innerp@ckage','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"The term 'Java Platform' refers to ________________."]); Option::create(['question_id'=>$x->id,'option'=>'Java Compiler (Javac)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Java Runtime Environment (JRE)','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Java Database Connectivity (JDBC)','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Java Debugger','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statement gives the use of CLASSPATH?']); Option::create(['question_id'=>$x->id,'option'=>'Holds the location of Core Java Class Library (Bootstrap classes)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Holds the location of Java Extension Library','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Holds the location of User Defined classes, packages and JARs','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Holds the location of Java Software','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following options give the valid argument types for main() method? (Choose 2)']); Option::create(['question_id'=>$x->id,'option'=>'String[] args','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'String args[]','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'String [][]args','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'String args','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following are true about packages? (Choose 2)']); Option::create(['question_id'=>$x->id,'option'=>'Packages can contain only Java Source files','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Packages can contain both Classes and Interfaces (Compiled Classes)','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Packages can contain non-java elements such as images, xml files etc.','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Sub packages should be declared as private in order to deny importing them','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements are true regarding java.lang.Object class? (Choose 2)']); Option::create(['question_id'=>$x->id,'option'=>'Object class is an abstract class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Object class cannot be instantiated directly','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Object class has the core methods for thread synchronization','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Object class provides the method for Set implementation in Collection framework','is_answer'=>0.5]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Which of the following option gives one possible use of the statement 'the name of the public class should match with its file name'?"]); Option::create(['question_id'=>$x->id,'option'=>'To maintain the uniform standard','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Helps the compiler to find the source file that corresponds to a class, when it does not find a class file while compiling','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Helps JVM to find and execute the classes','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Helps Javadoc to build the Java Documentation easily','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Cthread extends Thread{
   Cthread(){start();}
  public void run(){
  System.out.print(  Hi  );}
public static void main (String args[]){
 Cthread th1=new Cthread();
Cthread th2=new Cthread();
}}']); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will display Hi once','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will create two child threads and display Hi twice','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'will not create any child thread','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyRunnable implements Runnable
{
    public void run()
    {
        // some code here
    }
}
which of these will create and start this thread?']); Option::create(['question_id'=>$x->id,'option'=>'new Thread(MyRunnable).run();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'new MyRunnable().start();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'new Runnable(MyRunnable).start();','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'new Thread(new MyRunnable()).start();','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Nthread extends Thread{
  public void run(){
  System.out.print(  Hi  );}
  public static void main(String args[]){
   Nthread th1=new Nthread();
   Nthread th2=new Nthread();
}']); Option::create(['question_id'=>$x->id,'option'=>'will not create any child thread','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Will create two child threads and display Hi twice','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will display Hi once','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Cthread extends Thread{
  public void run(){
  System.out.print(  Hi  );}
public static void main (String args[]){
 Cthread th1=new Cthread();
 th1.run();
 th1.start();
th1.run();
}}']); Option::create(['question_id'=>$x->id,'option'=>'will print Hi twice and throws Exception at run time','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will print Hi Thrice','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'will print Hi once','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'The following block of code creates a Thread using a Runnable target:

Runnable target = new MyRunnable();
Thread myThread = new Thread(target);

Which of the following classes can be used to create the target, so that the preceding code compiles correctly?']); Option::create(['question_id'=>$x->id,'option'=>'public class MyRunnable extends Runnable{public void run(){}}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public class MyRunnable implements Runnable{void run(){}}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public class MyRunnable extends Object{public void run(){}}','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'public class MyRunnable implements Runnable{public void run(){}}','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

class MyThread extends Thread
{
    MyThread() {}
    MyThread(Runnable r) {super(r); }
    public void run()
    {
        System.out.print(  Inside Thread   );
    }
}
class MyRunnable implements Runnable
{
    public void run()
    {
        System.out.print(   Inside Runnable  );
    }
}
class Test
{
    public static void main(String[] args)
    {
        new MyThread().start();
        new MyThread(new MyRunnable()).start();
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'Prints   Inside Thread Inside Thread  ','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Prints   Inside Thread Inside Runnable  ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Does not compile','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Throws exception at runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following methods are defined in class Thread? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'run()','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'notify()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'terminate()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'wait()','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'wait(), notify() and notifyAll() methods belong to ________']); Option::create(['question_id'=>$x->id,'option'=>'Thread class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Interrupt class','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Object class','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class A implements Runnable{ int k;
public void run(){
k++; }
public static void main(String args[]){
A a1=new A();
a1.run();}']); Option::create(['question_id'=>$x->id,'option'=>'It will start a new thread','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but throws run time Exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'a1 is not a Thread','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Cthread extends Thread{
  public void run(){
  System.out.print(  Hi  );}
public static void main (String args[]){
 Cthread th1=new Cthread();
 th1.run();
 th1.start();
 th1.start();
}}']); Option::create(['question_id'=>$x->id,'option'=>'will print Hi twice and throws exception at runtime','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'will print Hi Once','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will not print','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'will start two thread','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

class MyThread extends Thread
{
    public static void main(String [] args)
    {
        MyThread t = new MyThread();
        t.start();
        System.out.print(  one.   );
        t.start();
        System.out.print(  two.   );
    }
    public void run()
    {
        System.out.print(  Thread   );
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception occurs at runtime.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'It prints   Thread one. Thread two.  ','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The output cannot be determined.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class PingPong2 {
synchronized void hit(long n) {
for(int i = 1; i < 3; i++)
System.out.print(n +   -   + i +      );
}
}
 public class Tester implements Runnable {
 static PingPong2 pp2 = new PingPong2();
 public static void main(String[] args) {
 new Thread(new Tester()).start();
 new Thread(new Tester()).start();
 }
 public void run() { pp2.hit(Thread.currentThread().getId()); }
 }
Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'The output could be 6-1 6-2 5-1 7-1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The output could be 5-1 6-1 6-2 5-2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The output could be 6-1 5-2 6-2 5-1','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The output could be 6-1 6-2 5-1 5-2','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class Threads4 {
 public static void main (String[] args) {
 new Threads4().go();
 }
 public void go() {
 Runnable r = new Runnable() {
 public void run() {
 System.out.print(  run  );
 }
 };
 Thread t = new Thread(r);
 t.start();
 t.start();
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code executes normally, but nothing is printed.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The code executes normally and prints   run  .','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) Multiple processes share same memory location
B) Switching from one thread to another is easier than switching from one process to another
C) Thread makes it possible to maximize resource utilization
D) Process is a light weight program']); Option::create(['question_id'=>$x->id,'option'=>'Only C and D is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only A and B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B and C is TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'All are FALSE','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following methods registers a thread in a thread scheduler?']); Option::create(['question_id'=>$x->id,'option'=>'start();','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'register();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'construct();','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'run();','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements can be used to create a new Thread? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'Implement java.lang.Thread and implement the run() method.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Implement java.lang.Thread and implement the start() method.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Implement java.lang.Runnable and implement the run() method','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Extend java.lang.Thread and override the run() method.','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Thread2 {
 public static void main(String[] args) {
 new Thread2().go(); }
 public void go(){
 Runnable rn=new Runnable(){
 public void run(){
 System.out.println(  Good Day..  ); } };
 Thread t=new Thread(rn);
 t.start();
 }}
what should be the correct output for the code written above?']);
 Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'The code executes normally and prints   Good Day..  ','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'prints Good Day.. Twice','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Assume the following method is properly synchronized and called from a thread A on an object B:

wait(2000);

After calling this method, when will the thread A become a candidate to get another turn at the CPU?']); Option::create(['question_id'=>$x->id,'option'=>'After thread A is notified, or after two seconds.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Two seconds after thread A is notified.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Two seconds after lock B is released.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'After the lock on B is released, or after two seconds.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) Exception is the superclass of all errors and exceptions in the java language
B) RuntimeException and its subclasses are unchecked exception.']);
 Option::create(['question_id'=>$x->id,'option'=>'Both A and B are TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'Both A and B are FALSE','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Select the variable which are in java.lang.annotation.RetentionPolicy class. (Choose THREE)']); Option::create(['question_id'=>$x->id,'option'=>'METHOD','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'SOURCE','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'CLASS','is_answer'=>0.333333]); Option::create(['question_id'=>$x->id,'option'=>'RUNTIME','is_answer'=>0.333333]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Custom annotations can be created using']); Option::create(['question_id'=>$x->id,'option'=>'@interface','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'@inherit','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'@include','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'all the listed options','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Choose the meta annotations. (Choose THREE)']); Option::create(['question_id'=>$x->id,'option'=>'Override','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Retention','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'Depricated','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Documented','is_answer'=>0.333333]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'All annotation types should maually extend the Annotation interface. State TRUE/FALSE']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'If no retention policy is specified for an annotation, then the default policy of __________ is used.']); Option::create(['question_id'=>$x->id,'option'=>'method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'class','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'source','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Select the Uses of annotations. (Choose THREE)']); Option::create(['question_id'=>$x->id,'option'=>'Information For the Compiler','is_answer'=>0.333333]);  Option::create(['question_id'=>$x->id,'option'=>'Information for the JVM','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time and deploytime processing','is_answer'=>0.333333]); Option::create(['question_id'=>$x->id,'option'=>'Runtime processing','is_answer'=>0.333333]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following is not an attribute of object?']); Option::create(['question_id'=>$x->id,'option'=>'State','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Behaviour','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Inheritance','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Identity','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the advantage of runtime polymorphism?']); Option::create(['question_id'=>$x->id,'option'=>'Efficient utilization of memory at runtime','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Code reuse','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Code flexibility at runtime','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'avoiding method name confusion at runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following is an example of  IS A relationship?']); Option::create(['question_id'=>$x->id,'option'=>'Ford - Car','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Microprocessor - Computer','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Tea -Cup','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Driver -Car','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of following set of functions are example of method overloading']); Option::create(['question_id'=>$x->id,'option'=>'void add(int x,int y) char add(int x,int y)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'char add(float x) char add(float y)','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'void add(int x,int y) char add(char x,char y)','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'void add(int x,int y) void sum(double x,double y)','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following is not a valid relation between classes?']);
Option::create(['question_id'=>$x->id,'option'=>'Composition','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Inheritance','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Instantiation','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Segmentation','is_answer'=>1]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Choose the correct option:']);
Option::create(['question_id'=>$x->id,'option'=>'A try statement must have at least one corresponding catch block','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Multiple catch statements can catch the same class of exception more than once.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'An Error that might be thrown in a method must be declared as thrown by that method, or be handled within that method.','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'Except in case of VM shutdown, if a try block starts to execute, a corresponding finally block will always start to execute.','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'consider the code & choose the correct output:
class Threads2 implements Runnable {

  public void run() {
  System.out.println(  run.  );
  throw new RuntimeException(  Problem  );
  }
  public static void main(String[] args) {
  Thread t = new Thread(new Threads2());
  t.start();
  System.out.println(  End of method.  );
  }
 }']); Option::create(['question_id'=>$x->id,'option'=>'End of method. java.lang.RuntimeException: Problem','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'java.lang.RuntimeException: Problem','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'End of method. run. java.lang.RuntimeException: Problem','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'run java.lang.RuntimeException: Problem','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code:

System.out.print(  Start   );
try
{
    System.out.print(  Hello world  );
    throw new FileNotFoundException();
}
System.out.print(   Catch Here   ); /* Line 7 */
catch(EOFException e)
{
    System.out.print(  End of file exception  );
}
catch(FileNotFoundException e)
{
    System.out.print(  File not found  );
}

given that EOFException and FileNotFoundException are both subclasses of IOException. If this block of code is pasted in a method, choose the best option.']);
 Option::create(['question_id'=>$x->id,'option'=>'Code output: Start Hello world End of file exception.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Code output: Start Hello world Catch Here File not found.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Code output: Start Hello world File Not Found','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The code will not compile.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
public class ExceptionTest
{
    class TestException extends Exception {}
    public void runTest() throws TestException {}
    public void test() /* Line X */
    {
        runTest();
    }
}
At Line X, which code is necessary to make the code compile?']); Option::create(['question_id'=>$x->id,'option'=>'throw Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throws Exception','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'No code is necessary','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'throws RuntimeException','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
 public static void parse(String str) {
   try {   int num = Integer.parseInt(str);
   } catch (NumberFormatException nfe) {
   num = 0;   } finally {   System.out.println(num);
   } }  public static void main(String[] args) {
   parse(  one  );   }']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'ParseException thrown at runtime','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'NumberFormatException thrown at runtime','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements is true?']); Option::create(['question_id'=>$x->id,'option'=>'Any statement that can throw an Error must be enclosed in a try block.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Any statement that can throw an Exception must be enclosed in a try block.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'catch(X x) can catch subclasses of X where X is a subclass of Exception.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'The Error class is a RuntimeException.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Trial{
public static void main(String[] args){
try{
System.out.println(  One  );
int y = 2 / 0;
System.out.println(  Two  );
}
catch(RuntimeException ex){
System.out.println(  Catch  );
}
finally{
System.out.println(  Finally  );
}
} }']); Option::create(['question_id'=>$x->id,'option'=>'One Two Catch Finally','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'One Catch','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'One Catch Finally','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'One Two Catch','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'State True or False:
The main() method of a program can declare that it throws checked exception.']);
 Option::create(['question_id'=>$x->id,'option'=>'True','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'False','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 static void test() {
 try {
 String x = null;
 System.out.print(x.toString() +      );
 }
 finally { System.out.print(  finally   ); }
 }
 public static void main(String[] args) {
 try { test(); }
 catch (Exception ex) { System.out.print(  exception   ); }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'finally exception','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'finally','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'null','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'The notifyAll() method must be called from a synchronized context','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'To call sleep(), a thread must own the lock on the object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The notify() method is defined in class java.lang.Thread','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The notify() method causes a thread to immediately release its locks.','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following is a checked exception?']); Option::create(['question_id'=>$x->id,'option'=>'Arithmetic Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'IOException','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'NullPointerException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'ArrayIndexOutOfBoundsException','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public void testIfA() {
 if (testIfB(  True  )) {
 System.out.println(  True  );
 } else {
 System.out.println(  Not true  );
 }
 }
 public Boolean testIfB(String str) {
 return Boolean.valueOf(str);
 }
What is the result when method testIfA is invoked?']); Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Not true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given the following program,which statements is true?
 Public class Exception {
 public static void main(String[] args) {
 try {
 if(args.length == 0) return;
System.out.println(args[0]);
}finally {
System.out.println(  The end  );
}}}']); Option::create(['question_id'=>$x->id,'option'=>'If run with no arguments,the program will produce no output','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If run with no arguments,the program will produce   The end  ','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The program will throw an ArrayIndexOutOfBoundsException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If run with one arguments,the program will simply print the given argument','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
int array[] = new int[10];
array[-1] = 0;']); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'runtime error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'does not compile','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'compiles successfully','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class PropagateException{
public static void main(String[] args){
try{
method();
System.out.println(  method() called  );
}
catch(ArithmeticException ex){
System.out.println(  Arithmetic Exception  );
}
catch(RuntimeException re){
System.out.println(  Runtime Exception  );
}}
static void method(){
int y = 2 / 0;
}}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'Arithmetic Exception Runtime Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Arithmetic Exception','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'A static method cannot be synchronized.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If a class has synchronized code, multiple threads can still access the nonsynchronized code.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Variables can be protected from concurrent access problems by marking them with the synchronized keyword.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'When a thread sleeps, it releases its locks','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is wrong with the following code?

Class MyException extends Exception{}
public class Test{
public void foo() {
try {
bar();
} finally {
baz();
} catch(MyException e) {}
}
public void bar() throws MyException {
throw new MyException();
}
public void baz() throws RuntimeException {
throw new RuntimeException();
}
}']); Option::create(['question_id'=>$x->id,'option'=>'Since the method foo() does not catch the exception generated by the method baz(),it must declare the RuntimeException in a throws clause','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A try block cannot be followed by both a catch and a finally block','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An empty catch block is not allowed','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A catch block cannot follow a finally block','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'The exceptions for which the compiler doesn’t enforce the handle or declare rule']); Option::create(['question_id'=>$x->id,'option'=>'Checked exceptions','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Unchecked exceptions','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'all of these','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  static void display(){
   throw new RuntimeException();
  }  public static void main(String args[]){
      try{display();
      }catch(Exception e){ throw new NullPointerException();}
       finally{try{ display();
       }catch(NullPointerException e){   System.out.println(  caught  );}
       finally{ System.out.println(  exit  );}}}}']); Option::create(['question_id'=>$x->id,'option'=>'caught exit','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'exit RuntimeException thrown at run time','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'exit','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class X implements Runnable
{
    public static void main(String args[])
    {
        /* Missing code? */
    }
    public void run() {}
}
Which of the following line of code is suitable to start a thread ?']); Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(); x.run();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(X);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'X run = new X(); Thread t = new Thread(run); t.start();','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(X); t.start();','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which two can be used to create a new Thread?']); Option::create(['question_id'=>$x->id,'option'=>'Implement java.lang.Runnable and implement the run() method.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Extend java.lang.Thread and override the run() method.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Implement java.lang.Thread and implement the start() method.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Extend java.lang.Runnable and override the start() method.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which four can be thrown using the throw statement?

1.Error
2.Event
3.Object
4.Throwable
5.Exception
6.RuntimeException']); Option::create(['question_id'=>$x->id,'option'=>'1, 4, 5 and 6','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'1, 2, 3 and 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2, 4, 5 and 6','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'2, 3, 4 and 5','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements regarding static methods are correct? (2 answers)']); Option::create(['question_id'=>$x->id,'option'=>'static methods are difficult to maintain, because you can not change their implementation.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'static methods can be called using an object reference to an object of the class in which this method is defined.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'static methods are always public, because they are defined at class-level.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'static methods do not have direct access to non-static methods which are defined inside the same class.','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'In the given code snippet
try { int a = Integer.parseInt(  one  ); }
what is used to create an appropriate catch block? (Choose all that apply.)
A. ClassCastException
B. IllegalStateException
C. NumberFormatException
D. IllegalArgumentException']); Option::create(['question_id'=>$x->id,'option'=>'ClassCastException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'NumberFormatException','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'IllegalStateException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'IllegalArgumentException','is_answer'=>0.5]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following methods are static?']); Option::create(['question_id'=>$x->id,'option'=>'sleep()','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'yield()','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'join()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'start()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Trial{
public static void main(String[] args){
try{
System.out.println(  Try Block  );
}
finally{
System.out.println(  Finally Block  );
}
} }']); Option::create(['question_id'=>$x->id,'option'=>'Try Block Finally Block','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Try Block','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Finally Block Try Block','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Finally Block','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Animal { public String noise() { return   peep  ; } }
 class Dog extends Animal {
 public String noise() { return   bark  ; }
 }
 class Cat extends Animal {
 public String noise() { return   meow  ; }
 }
class try1{
public static void main(String[] args){
Animal animal = new Dog();
 Cat cat = (Cat)animal;
 System.out.println(cat.noise());
}}
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'bark','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'meow','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  static void display(){
   throw new RuntimeException();
  }  public static void main(String args[]){
      try{ display(); }catch(Exception e){
       throw new NullPointerException();}
      finally{try{ display();
       }catch(NullPointerException e){ System.out.println(  caught  );}
System.out.println(  exit  );}}}']); Option::create(['question_id'=>$x->id,'option'=>'caught exit','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'exit','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but exception at runtime','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
static void test() throws RuntimeException {
  try {  System.out.print(  test   );
  throw new RuntimeException();
  }  catch (Exception ex) {      System.out.print(  exception   ); }
  }  public static void main(String[] args) {
  try { test(); }  catch (RuntimeException ex) { System.out.print(  runtime   ); }  System.out.print(  end  );  }  }']); Option::create(['question_id'=>$x->id,'option'=>'test end','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'test runtime end','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'test exception runtime end','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'test exception end','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Test{
public static void main(String[] args){
try{
Integer.parseInt(  1.0  );
}
catch(Exception e){
System.out.println(  Exception occurred  );
}
catch(RuntimeException ex){
System.out.println(  RuntimeException  );
}
} }
consider the code above & select the proper output from the options.']); Option::create(['question_id'=>$x->id,'option'=>'Exception occurred','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'RuntimeException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Exception occurred RuntimeException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'does not compile','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements are true? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'Deadlock will not occur if wait()/notify() is used','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The wait() method is overloaded to accept a duration','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'A thread will resume execution as soon as its sleep duration expires.','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'The notify() method is overloaded to accept a duration','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class s implements Runnable
{
    int x, y;
    public void run()
    {
        for(int i = 0; i < 1000; i++)
            synchronized(this)
            {
                x = 12;
                y = 12;
            }
        System.out.print(x +       + y +      );
    }
    public static void main(String args[])
    {
        s run = new s();
        Thread t1 = new Thread(run);
        Thread t2 = new Thread(run);
        t1.start();
        t2.start();
    }
} What is the output?']); Option::create(['question_id'=>$x->id,'option'=>'prints 12 12 12 12','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'DeadLock','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Cannot determine output.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which can appropriately be thrown by a programmer using Java SE technology to create
a desktop application?']); Option::create(['question_id'=>$x->id,'option'=>'ClassCastException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'NullPointerException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'NoClassDefFoundError','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'NumberFormatException','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the keyword to use when the access of a method has to be restricted to only one thread at a time']); Option::create(['question_id'=>$x->id,'option'=>'volatile','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'synchronized','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'final','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'private','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will be the output of the program?

public class RTExcept
{
    public static void throwit ()
    {
        System.out.print(  throwit   );
        throw new RuntimeException();
    }
    public static void main(String [] args)
    {
        try
        {
            System.out.print(  hello   );
            throwit();
        }
        catch (Exception re )
        {
            System.out.print(  caught   );
        }
        finally
        {
            System.out.print(  finally   );
        }
        System.out.println(  after   );
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'hello throwit caught','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hello throwit RuntimeException caught after','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'hello throwit caught finally after','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:
public class Test{
 Integer i;
 int x;
 Test(int y){
  x=i+y;
  System.out.println(x);
 }
public static void main(String[] args) {
 new Test(new Integer(5));
}}']); Option::create(['question_id'=>$x->id,'option'=>'5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class Test{
  static void display(){
   throw new RuntimeException();
  }
     public static void main(String args[]){
      try{display();
      }catch(Exception e){ }
       catch(RuntimeException re){}
       finally{System.out.println(  exit  );}}}']); Option::create(['question_id'=>$x->id,'option'=>'exit','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and no output','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but exception at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) Checked Exception must be explicity caught or propagated to the calling method
B) If runtime system can not find an appropriate method to handle the exception, then the runtime system terminates and uses the default exception handler.']); Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Bothe A and B is TRUE','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class MyProgram
{
    public static void throwit()
    {
        throw new RuntimeException();
    }
    public static void main(String args[])
    {
        try
        {
            System.out.println(  Hello world   );
            throwit();
            System.out.println(  Done with try block   );
        }
        finally
        {
            System.out.println(  Finally executing   );
        }
    }
}
which answer most closely indicates the behavior of the program?']); Option::create(['question_id'=>$x->id,'option'=>'The program will not compile.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will print Hello world, then will print that a RuntimeException has occurred, then will print Done with try block, and then will print Finally executing.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will print Hello world, then will print that a RuntimeException has occurred, and then will print Finally executing.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The program will print Hello world, then will print Finally executing, then will print that a RuntimeException has occurred.','is_answer'=>1]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'If a method is capable of causing an exception that it does not handle, it must specify this behavior using throws so that callers of the method can guard themselves against such Exception']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class Trial{
public static void main(String[] args){
try{
System.out.println(  Java is portable  );
} } }']); Option::create(['question_id'=>$x->id,'option'=>'Java is portable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'We cannot have a try block without a catch block','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'We cannot have a try block block without a catch / finally block','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Nothing is diaplayed','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public static void parse(String str) {
try {
float f = Float.parseFloat(str);
} catch (NumberFormatException nfe) {
f = 0;
} finally {
System.out.println(f);
}
}
public static void main(String[] args) {
parse(  invalid  );
}']); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'A ParseException is thrown by the parse method at runtime.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A NumberFormatException is thrown by the parse method at runtime.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which digit,and in what order,will be printed when the following program is run?

Public class MyClass {
  public static void main(String[] args) {
   int k=0;
  try {
         int i=5/k;
        }
catch(ArithmeticException e) {
   System.out.println(  1  );
    }
catch(RuntimeException e) {
   System.out.println(  2  );
  return;
    }
catch(Exception e) {
   System.out.println(  3  );
    }
finally{
System.out.println(  4  );
}
System.out.println(  5  );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'The program will only print 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will only print 1 and 4 in order','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will only print 1,2 and 4 in order','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The program will only print 1 ,4 and 5 in order','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 public class TestSeven extends Thread {
 private static int x;
 public synchronized void doThings() {
 int current = x;
 current++;
 x = current;
 }
 public void run() {
 doThings();
 }
}
Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'Synchronizing the run() method would make the class thread-safe.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Declaring the doThings() method as static would make the class thread-safe.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following statements is/are true?
Statement 1: Writing finally block is optional.
Statement 2: When no exception occurs then complete try block and finally block will execute but no catch block will execute.  ']); Option::create(['question_id'=>$x->id,'option'=>'Both Statement 1 & Statement 2 are FALSE.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement 2 is TRUE but Statement 1 is FALSE.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both Statement 1 & Statement 2 are TRUE.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Statement 1 is TRUE but Statement 2 is FALSE.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
class X implements Runnable
{
    public static void main(String args[])
    {
        /* Some code */
    }
    public void run() {}
}
Which of the following line of code is suitable to start a thread ?']); Option::create(['question_id'=>$x->id,'option'=>'X run = new X(); Thread t = new Thread(run); t.start();','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(X);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(); x.run();','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Thread t = new Thread(X); t.start();','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
 class X { public void foo() { System.out.print(  X   ); } }

 public class SubB extends X {
 public void foo() throws RuntimeException {
 super.foo();
 if (true) throw new RuntimeException();
 System.out.print(  B   );
 }
 public static void main(String[] args) {
 new SubB().foo();
 }
 }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'X, followed by an Exception.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'No output, and an Exception is thrown.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'X, followed by an Exception, followed by B.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which three of the following are methods of the Object class?

1.notify();
2.notifyAll();
3.isInterrupted();
4.synchronized();
5.interrupt();
6.wait(long msecs);
7.sleep(long msecs);
8.yield();']); Option::create(['question_id'=>$x->id,'option'=>'1, 2, 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2, 4, 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1, 2, 6','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'2, 3, 4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'public class RTExcept
{
    public static void throwit ()
    {
        System.out.print(  throwit   );
        throw new RuntimeException();
    }
    public static void main(String [] args)
    {
        try
        {
            System.out.print(  hello   );
            throwit();
        }
        catch (Exception re )
        {
            System.out.print(  caught   );
        }
        finally
        {
            System.out.print(  finally   );
        }
        System.out.println(  after   );
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'hello throwit caught finally after','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'hello throwit caught','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hello throwit RuntimeException caught after','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will happen when you attempt to compile and run the following code?
public class Bground extends Thread{
public static void main(String argv[]){
                Bground b = new Bground();
                b.run();
        }
        public void start(){
                for (int i = 0; i <10; i++){
                        System.out.println(  Value of i =    + i);
                }
        }
}']); Option::create(['question_id'=>$x->id,'option'=>'A compile time error indicating that no run method is defined for the Thread class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A run time error indicating that no run method is defined for the Thread class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Clean compile and at run time the values 0 to 9 are printed out','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Clean compile but no output at runtime','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given two programs:
1. package pkgA;
2. public class Abc {
3. int a = 5;
4. protected int b = 6;
5. public int c = 7;
6. }

3. package pkgB;
4. import pkgA.*;
5. public class Def {
6. public static void main(String[] args) {
7. Abc f = new Abc();
8. System.out.print(      + f.a);
9. System.out.print(      + f.b);
10. System.out.print(      + f.c);
11. }
12. }
What is the result when the second program is run? (Choose all that apply)']); Option::create(['question_id'=>$x->id,'option'=>'5 6 7','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5 followed by an exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails with an error on line 7','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails with an error on line 8','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What will the output of following code?

try
{
    int x = 0;
    int y = 5 / x;
}
catch (Exception e)
{
    System.out.println(  Exception  );
}
catch (ArithmeticException ae)
{
    System.out.println(   Arithmetic Exception  );
}
System.out.println(  finished  );']); Option::create(['question_id'=>$x->id,'option'=>'finished','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation fails','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'ArithmeticException','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given:
11. class A {
12. public void process() { System.out.print(  A,  ); }
13. class B extends A {
14. public void process() throws IOException {
15. super.process();
16. System.out.print(  B,  );
17. throw new IOException();
18. }
19. public static void main(String[] args) {
20. try { new B().process(); }
21. catch (IOException e) { System.out.println(  Exception  ); }
22. }
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A,B,Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails because of an error in line 20.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails because of an error in line 14.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) {
  File file=new File(  D:/jlist.lst  );
  byte buffer[]=new byte[(int)file.length()+1];
  FileInputStream fis=new FileInputStream(file);
  fis.read(buffer);
  System.out.println(buffer);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and display it on console.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and display garbage value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) throws IOException {
  File file=new File(  D:/jlist.lst  );
  byte buffer[]=new byte[(int)file.length()+1];
  FileInputStream fis=new FileInputStream(file);
  int ch=0;
  while((ch=fis.read())!=-1){
   System.out.print((char)ch); } }}']); Option::create(['question_id'=>$x->id,'option'=>'reads data from file one byte at a time and display it on the console.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and display garbage value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'import java.io.EOFException;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
public class MoreEndings {
public static void main(String[] args) {
try {
FileInputStream fis = new FileInputStream(  seq.txt  );
InputStreamReader isr = new InputStreamReader(fis);
int i = isr.read();
while (i != -1) {
System.out.print((char)i +   |  );
i = isr.read();
}
} catch (FileNotFoundException fnf) {
System.out.println(  File not found  );
} catch (EOFException eofe) {
System.out.println(  End of stream  );
} catch (IOException ioe) {
System.out.println(  Input error  );
}
}
}
Assume that the file   seq.txt   exists in the current directory, has the required
access permissions, and contains the string   Hello  .
Which statement about the program is true?']); Option::create(['question_id'=>$x->id,'option'=>'The program will not compile because a certain unchecked exception is not caught.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile and print H|e|l|l|o|Input error.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The program will compile and print H|e|l|l|o|End of stream.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The program will compile, print H|e|l|l|o|, and then terminate normally.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct output:
public class Person{
public void talk(){ System.out.print(  I am a Person   ); }
}
public class Student extends Person {
public void talk(){ System.out.print(  I am a Student   ); }
}
what is the result of this piece of code:
public class Test{
public static void main(String args[]){
Person p = new Student();
p.talk();
}
}']); Option::create(['question_id'=>$x->id,'option'=>'I am a Person','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'I am a Student','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'I am a Person I am a Student','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'I am a Student I am a Person','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test{
  public static void main(String[] args) throws IOException {
  File file = new File(  d:/temp.txt  );
  FileReader reader=new FileReader(file);
  reader.skip(7);  int ch;
  while((ch=reader.read())!=-1){
   System.out.print((char)ch);  }  }}']); Option::create(['question_id'=>$x->id,'option'=>'Skip the first seven characters and then starts reading file and display it on console','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and runs without output','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) throws IOException {
  File file=new File(  D:/jlist.lst  );
  byte buffer[]=new byte[(int)file.length()+1];
  FileInputStream fis=new FileInputStream(file);
  fis.read(buffer);
  System.out.println(new String(buffer)); }}']); Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and display it on console.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and display garbage value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of these are two legal ways of accessing a File named   file.tst   for reading. Select the correct option:
A)FileReader fr = new FileReader(  file.tst  );
B)FileInputStream fr = new FileInputStream(  file.tst  );
C)InputStreamReader isr = new InputStreamReader(fr,   UTF8  );
D)FileReader fr = new FileReader(  file.tst  ,   UTF8  );']); Option::create(['question_id'=>$x->id,'option'=>'A,D','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B,C','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C,D','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A,B','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class std{
 int call; std(int c){call=c;}
 int getCall(){return call;}
}
public class Test{
  public static void main(String[] args) throws IOException {
   File file=new File(  d:/std.txt  );
  FileOutputStream fos=new FileOutputStream(file);
  ObjectOutputStream oos=new ObjectOutputStream(fos);
  std s1=new std(10);
  oos.writeObject(s1);
  oos.close();
  }}']); Option::create(['question_id'=>$x->id,'option'=>'the state of the object s1 will be store to file std.txt','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'the state of the object s1 will not be store to the file.','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) throws IOException {
  File file=new File(  D:/jlist.lst  );
  byte buffer[]=new byte[(int)file.length()+1];
  FileInputStream fis=new FileInputStream(file);
  int ch=0;
  while((ch=fis.read())!=-1){
   System.out.print(ch); } }}']); Option::create(['question_id'=>$x->id,'option'=>'reads data from file one byte at a time and display it on the console.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'reads data from file named jlist.lst in byte form and ascii value','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What happens when the constructor for FileInputStream fails to open a file for reading?']); Option::create(['question_id'=>$x->id,'option'=>'throws a DataFormatException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throws a FileNotFoundException','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'throws a ArrayIndexOutOfBoundsException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'returns null','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'import java.io.*;
public class MyClass implements Serializable {

private Tree tree = new Tree();

public static void main(String [] args) {
MyClass mc= new MyClass();
try {
FileOutputStream fs = new FileOutputStream(”MyClass.ser”);
ObjectOutputStream os = new ObjectOutputStream(fs);
os.writeObject(mc); os.close();
} catch (Exception ex) { ex.printStackTrace(); }
} }']); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An instance of MyClass is serialized','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A instance of MyClass and an instance of Tree are both serialized','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the DataOutputStream method that writes double precision floating point values to a stream?']); Option::create(['question_id'=>$x->id,'option'=>'writeBytes()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'writeFloat()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'write()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'writeDouble()','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following opens the file  myData.stuff  for output first deleting any file with that name?']); Option::create(['question_id'=>$x->id,'option'=>'FileOutputStream fos = new FileOutputStream(  myData.stuff , true )','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FileOutputStream fos = new FileOutputStream(  myData.stuff )','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'DataOutputStream dos = new DataOutputStream(  myData.stuff  )','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'FileOutputStream fos = new FileOutputStream( new BufferedOutputStream(  myData.stuff ) )','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A file is readable but not writable on the file system of the host platform. What will
be the result of calling the method canWrite() on a File object representing this file?']); Option::create(['question_id'=>$x->id,'option'=>'A SecurityException is thrown','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The boolean value false is returned','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The boolean value true is returned','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The file is modified from being unwritable to being writable.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test{
  public static void main(String[] args) {
  File dir = new File(  dir  );
  dir.mkdir();
  File f1 = new File(dir,   f1.txt  );  try {
  f1.createNewFile();  } catch (IOException e) { ; }
  File newDir = new File(  newDir  );
  dir.renameTo(newDir);}  }']); Option::create(['question_id'=>$x->id,'option'=>'The file system has a new empty directory named dir','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The file system has a new empty directory named newDir','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The file system has a directory named dir, containing a file f1.txt','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The file system has a directory named newDir, containing a file f1.txt','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) throws IOException {
  String data=  Confidential info  ;
  byte buffer[]=data.getBytes();
  FileOutputStream fos=new  FileOutputStream(  d:/temp  );
  for(byte d : buffer){
   fos.write(d);  } }}']); Option::create(['question_id'=>$x->id,'option'=>'writes data to file in byte form.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'writes data to the file in character form.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) {
  File file=new File(  d:/prj,d:/lib  );
  file.mkdirs();}}']); Option::create(['question_id'=>$x->id,'option'=>'creates directories names prj and lib in d: drive','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles and executes but directories are not created','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) throws IOException {
  File file=new File(  d:/data  );
  byte buffer[]=new byte[(int)file.length()+1];
  FileInputStream fis=new FileInputStream(file);
  fis.read(buffer);
  FileWriter fw=new FileWriter(  d:/temp.txt  );
  fw.write(new String(buffer));}}']); Option::create(['question_id'=>$x->id,'option'=>'Transfer content of file data to the temp.txt','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles and runs but content not transferred to the temp.txt','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at runtime','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
class std implements Serializable{
 int call; std(int c){call=c;}
 int getCall(){return call;}
}
public class Test{
  public static void main(String[] args) throws IOException {
   File file=new File(  d:/std.txt  );
  FileOutputStream fos=new FileOutputStream(file);
  ObjectOutputStream oos=new ObjectOutputStream(fos);
  std s1=new std(10);
  oos.writeObject(s1);
  oos.close();
  }}']); Option::create(['question_id'=>$x->id,'option'=>'the state of the object s1 will be store to file std.txt','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'the state of the object s1 will not be store to the file.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given :
import java.io.*;
 public class ReadingFor {
 public static void main(String[] args) {
 String s;
 try {
 FileReader fr = new FileReader(  myfile.txt  );
 BufferedReader br = new BufferedReader(fr);
 while((s = br.readLine()) != null)
 System.out.println(s);
 br.flush();
  } catch (IOException e) { System.out.println(  io error  ); }
 }
}
And given that myfile.txt contains the following two lines of data:
ab
cd
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'ab','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'abcd','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ab cd','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'a b c d','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code and choose the correct option:
public class Test {
 public static void main(String[] args) {
  File file=new File(  d:/prj/lib  );
  file.mkdirs();}}']); Option::create(['question_id'=>$x->id,'option'=>'creates directory d:/prj/lib','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles and executes but directory is not created','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'import java.io.*;
public class MyClass implements Serializable {
private int a;
public int getA() { return a; }
publicMyClass(int a){this.a=a; }
private void writeObject( ObjectOutputStream s)
throws IOException {
// insert code here
}
}

Which code fragment, inserted at line 15, will allow Foo objects to be
correctly serialized and deserialized?']); Option::create(['question_id'=>$x->id,'option'=>'s.writeInt(x);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s.serialize(x);','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'s.defaultWriteObject();','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'s.writeObject(x);','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) It is not possible to execute select query with execute() method
B) CallableStatement can executes store procedures  only but not functions']); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) When one use callablestatement, in that case only parameters are send over network not sql query.
B) In preparestatement sql query will compile for first time only']); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only A is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both A and B is TRUE','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'getConnection() is method available in?']); Option::create(['question_id'=>$x->id,'option'=>'DriverManager Class','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Driver Interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ResultSet Interface','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement Interface','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Sylvy wants to develop Student management system, which requires frequent insert operation about student details.  In order to insert student record which statement interface will give good performance']); Option::create(['question_id'=>$x->id,'option'=>'Statement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'CallableStatement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'PreparedStatement','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'RowSet','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which method will return boolean when we try to execute SQL Query from a JDBC program?']); Option::create(['question_id'=>$x->id,'option'=>'executeUpdate()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'executeSQL()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'execute()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'executeQuery()','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'An application can connect to different Databases at the same time. State TRUE/FALSE.']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'A) By default, all JDBC transactions are auto commit
B) PreparedStatement suitable for dynamic sql and requires one time compilation
C) with JDBC it is possible to fetch information about the database']); Option::create(['question_id'=>$x->id,'option'=>'Only A and B is TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Only B and C is True','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both A and C is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'All are TRUE','is_answer'=>1]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'how to register driver class in the memory?']); Option::create(['question_id'=>$x->id,'option'=>'Using forName() which is a static method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Using the static method registerDriver() method which is available in DriverManager Class.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Either forName() or registerDriver()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'None of the given options','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the use of wasNull() in ResultSet interface?']); Option::create(['question_id'=>$x->id,'option'=>'There is no such method in ResultSet interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'It returns true when last read column contain SQL NULL else returns false','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'It returns int value as mentioned below: > 0 if many columns Contain Null Value < 0 if no column contains Null Value = 0 if one column contains Null value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none of the listed options','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following options contains only JDBC interfaces?']); Option::create(['question_id'=>$x->id,'option'=>'1) Driver 2) Connection 3) ResultSet 4) DriverManager 5) Class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1) Driver 2) Connection 3) ResultSet 4) ResultSetMetaData 5) Statement 6) DriverManager 7) PreparedStatement 8) Callablestatement 9) DataBaseMetaData','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1) Driver 2) Connection 3) ResultSet 4) ResultSetMetaData 5) Statement 6) PreparedStatement 7) Callablestatement 8) DataBaseMetaData','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'All of the given options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'class CreateFile{
public static void main(String[] args) {
try {
File directory = new File(  c  ); //Line 13
File file = new File(directory,  myFile  );
if(!file.exists()) {
file.createNewFile(); //Line 16
}}
catch(IOException e) {
e.printStackTrace }
}}}
If the current direcory does not consists of directory   c  , Which statements are true ? (Choose TWO)']); Option::create(['question_id'=>$x->id,'option'=>'Line 16 is never executed','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Line 13 creates a File object named “c”','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Line 13 creates a directory named “c” in the file system.','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'By default all JDBC transactions are autocommit. State TRUE/FALSE.']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Give Code snipet:
{// Somecode
ResultSet rs = st.executeQuery(  SELECT * FROM survey  );

    while (rs.next()) {
      String name = rs.getString(  name  );
      System.out.println(name);
    }

    rs.close();
// somecode
} What should be imported related to ResultSet?']);
 Option::create(['question_id'=>$x->id,'option'=>'java.sql.ResultSet','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'java.sql.Driver','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'java.sql.DriverManager','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'java.sql.Connection','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the following code & select the correct option for output.
String sql =  select empno,ename from emp  ;
  PreparedStatement pst=cn.prepareStatement(sql);
    System.out.println(pst.toString());
  ResultSet rs=pst.executeQuery();
   System.out.println(rs.getString(1)+      +rs.getString(2));']); Option::create(['question_id'=>$x->id,'option'=>'will show first employee record','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but no output','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'What is the default type of ResultSet in JDBC applications?']); Option::create(['question_id'=>$x->id,'option'=>'Read Only, Forward Only','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Updatable, Forward only','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Read only, Scroll Sensitive','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Updatable, Scroll sensitive','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Consider the code below  & select the correct  ouput from the options:

String sql =  select * from ?  ;
  String table=   txyz   ;
  PreparedStatement pst=cn.prepareStatement(sql);
  pst.setString(1,table );
  ResultSet rs=pst.executeQuery();
   while(rs.next()){
   System.out.println(rs.getString(1));  }']); Option::create(['question_id'=>$x->id,'option'=>'will show all row of first column','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but run without output','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Cosider the following code & select the correct output.
String sql =  select rollno, name from student  ;
  PreparedStatement pst=cn.prepareStatement(sql);
  System.out.println(pst.toString());
  ResultSet rs=pst.executeQuery();
   while(rs.next()){
   System.out.println(rs.getString(3));  }']); Option::create(['question_id'=>$x->id,'option'=>'will show only name','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'will show city','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compiles but error at run time','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Given :
public class MoreEndings {
  public static void main(String[] args) throws Exception {
    Class driverClass = Class.forName(  sun.jdbc.odbc.JdbcOdbcDriver  );
DriverManager.registerDriver((Driver) driverClass.newInstance());
// Some code
} Inorder to compile & execute this code, what should we import?']); Option::create(['question_id'=>$x->id,'option'=>'java.sql.Driver','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.sql.Driver','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.sql.Driver java.sql.DriverManager','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'java.sql.DataSource','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following methods finds the maximum number of connections that a specific driver can obtain?']); Option::create(['question_id'=>$x->id,'option'=>'Database.getMaxConnections','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Connection.getMaxConnections','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'DatabaseMetaData.getMaxConnections','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'ResultSetMetaData.getMaxConnections','is_answer'=>0]);
$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following method can be used to execute to execute all type of queries i.e. either Selection or Updation SQL Queries?']); Option::create(['question_id'=>$x->id,'option'=>'executeAll()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'executeAllSQL()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'execute()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'executeQuery()','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'It is possible to insert/update record in a table by using ResultSet. State TRUE/FALSE']);
Option::create(['question_id'=>$x->id,'option'=>'true','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'false','is_answer'=>0]);

$x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Which of the following methods are needed for loading a database driver in JDBC?']); Option::create(['question_id'=>$x->id,'option'=>'registerDriver() method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Class.forName()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'registerDriver() method and Class.forName()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'getConnection','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
________ determines which member of a class can be used by other classes.']); Option::create(['question_id'=>$x->id,'option'=>'specifier','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Inheritance','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Implementation','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Access specifier','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
A class can be declared as _______ if you do not want the class to be subclassed. Using
the __________keyword we can abstract a class from its implementation']); Option::create(['question_id'=>$x->id,'option'=>'protected ,interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'final,interface','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'public,friend','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'final,protected','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
class Super
{
 int num=20;
 public void display()
 {
 System.out.println(  super class method  );
 }
}
public class ThisUse extends Super
{
 int num;
 public ThisUse(int num)
 {
 this.num=num;
 }
 public void display()
 {
 System.out.println(  display method  );
 }
 public void Show()
 {
 this.display();
 display();
 System.out.println(this.num);
 System.out.println(num);
 }
 public static void main(String[]args)
 {
 ThisUse o=new ThisUse(10);
 o.Show();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'super class method display method 20 20','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'display method display method 10 10','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'display method display method 20 20','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'super class method display method 10 10','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
public class Variables
{
 public static void main(String[]args)
 {
  public int i=10;
  System.out.println(i++);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'10','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'11','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);


 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
The constructor of a class must not have a return type.']);

 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
When one method is overridden in sub class the access specifier of the method in sub class should be equal as method in super class.
State True or False.']);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following method is used to initialize the instance variable of a class.']); Option::create(['question_id'=>$x->id,'option'=>'Class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Public','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Constructor','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Destructor','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
If display method in super class has a protected specifier then what should be the specifier for the overriding display method in sub class?']); Option::create(['question_id'=>$x->id,'option'=>'protected or default','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'protected or public','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'private','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
class Super
{
 static void show()
 {
 System.out.println(  super class show method  );
 }
 static class StaticMethods
 {
 void show()
 {
 System.out.println(  sub class show method  );
 }
 }
 public static void main(String[]args)
 {
 Super.show();
 new Super.StaticMethods().show();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'super class show method sub class show method','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'super class show method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'sub class show method super class show method','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following statements are true about Method Overriding?
I:  Signature must be same including return type
II: If the super class method is throwing the exception then overriding method should throw the same Exception
III: Overriding can be done in same class
IV: Overriding should be done in two different classes with no relation between the classes']); Option::create(['question_id'=>$x->id,'option'=>'I','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'II & IV','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'III','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'I & III','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
A field with default access specifier can be accessed  out side the package.
State True or False.']);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);


 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following are true about protected access specifier?']); Option::create(['question_id'=>$x->id,'option'=>'If one class is having protected method then the method is available for subclass which is present in another package','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'A class can be declared as protected.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'All members of abstract class are by default protected','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Protected is default access modifier of a child class','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output of following code?
class Super2
{
 public void display()
 {
System.out.println(  super class display method  );
 }
 public void exe()
 {
 System.out.println(  super class exe method  );
 display();
 }
}
public class InheritMethod extends Super2
{
 public void display()
 {

System.out.println(  sub class display method  );
 }

public static void main(String [] args)
 {

InheritMethod o=new InheritMethod();

 o.exe();
 }

}']); Option::create(['question_id'=>$x->id,'option'=>'super class exe method sub class display method','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'super class exe method super class display method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following are true about constructors?']); Option::create(['question_id'=>$x->id,'option'=>'Constructors can be overloaded','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Constructors can be overridden.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Constructor is a special type of method which may have return type.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Constructors should be called explicitly like methods','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
Constructor of an class is executed each time when an object of that class is created']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
class Parent {
 private int doWork(){
  System.out.println(  Do Work - Parent  );
  return 0;
 }
}
class Child extends Parent {
 public void doWork(){
  System.out.println(  Do Work - Child  );
 }
}
class Test{
 public static void main(String[] args) {
  new Child().doWork();
 }
}']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
public interface Status
{
/* insert code here */ int MY_VALUE = 10;
}
Which are valid on commented line?
1.final
2.static
3.native
4.public']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&2&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&2&4','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What is the outputof below code:
package p1;
class Parent {
 public static void doWork() {
 System.out.println(  Parent  );
 }
}
class Child extends Parent {
 public static void doWork() {
 System.out.println(  Child  );
 }
}
class Test {
 public static void main(String[] args) {
 Child.doWork();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Child Parent','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Parent','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Child','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Parent Child','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
abstract public class Employee
{
 protected abstract double getSalesAmount();
 public double getCommision() {
 return getSalesAmount() * 0.15;
 }
}
class Sales extends Employee
{
// insert method here
}
Which two methods, inserted independently, correctly complete the Sales
class?
1.double getSalesAmount() { return 1230.45; }
2. public double getSalesAmount() { return 1230.45; }
3.private double getSalesAmount() { return 1230.45; }
4.protected double getSalesAmount() { return 1230.45; }']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'3&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
Object class provides a method named getClass() which returns runtime class of an object.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
A concrete class can extend more than one super class whether that super class is either concrete or abstract class']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following keywords ensures that a method cannot be overridden?']); Option::create(['question_id'=>$x->id,'option'=>'final','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'protected','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'static','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'abstract','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
public class Client1
{
 public static void main(String [] args)
 {
 PenDrive p;
 PenDrive.Vendor v1=new PenDrive.Vendor(  WD  ,500);
 System.out.println(v1.getName());
 System.out.println(v1.getPrice());
 }
}
class PenDrive
{
 static class Vendor
 {
 String name;
 int price;
 public String getName(){ return name;}
 public int getPrice(){ return price;}

 Vendor(String name,int price)
 {
 this.name=name;
 this.price=price;
 }
 }
}
What will be the output of the given code?']); Option::create(['question_id'=>$x->id,'option'=>'Class cannot be defined inside another class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime Error.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'WD 500','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compile Error.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
abstract class LivingThings{
 public abstract void resperate();
 interface Living
 {
  public abstract void walk();
 }
}
class Human implements LivingThings.Living{
 @Override
 public void walk() {
  System.out.println(  Human Can Walk  );
 }
}
class Test {
 public static void main(String[] args) {
  new Human().walk();
 }
}']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
class super3{
int i=10;
public super3(int num){
i=num;
}
}
public class Inherite1 extends super3{
 public Inherite1(int a){
super(a);
}
 public void Exe(){
System.out.println(i);
}
public static void main(String[]args){
 Inherite1 o=new Inherite1(50);
super3 s=new Inherite1(20);
 System.out.println(s.i);
o.Exe();
}
}']); Option::create(['question_id'=>$x->id,'option'=>'10 50','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'20 50','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'20 10','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'10 20','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
An overriding method can also return a subtype of the type returned by the overridden method.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
An abstract class cannot contain non abstract methods']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The super() call can only be used in constructor calls and not method calls.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
interface A {
 public abstract void methodOne();
}
interface B extends A {
 public abstract void methodTwo();
}
class C implements B{
 @Override
 public void methodTwo() {
  System.out.println(  Method Two Body  );
 }
}
class Test {
 public static void main(String[] args) {
  new C().methodTwo();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
If any class has at least one abstract method you must declare it as abstract class']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
If any method overrides one of it’s super class methods, we can invoke the overridden method through the this keyword.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
interface Bounceable {
 void bounce();
 void setBounceFactor(int bf);
 private class BusinessLogic
 {
  int var1;
  float var2;
  double result(int var1,float var2){
   return var1*var2;
  }
 }
}
class Test {
 public static void main(String[] args) {
  System.out.println(new Bounceable.BusinessLogic().result(12,12345.22F));
 }
}']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
interface B
{
 public void bM1();
 public void bM2();
}
abstract class A implements B
{
 public abstract void aM1();
 public abstract void aM2();
 public void bM1(){}
}
public class Demo extends A
{
}
In above scenario class Demo must override which methods?']); Option::create(['question_id'=>$x->id,'option'=>'public void aM2(){}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public void aM1(){}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public void bM2(){}','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'All of the listed options','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
interface A
{
 public abstract void aM1();
 public abstract void aM2();
}
interface B extends A
{
 public void bM1();
 public void bM2();
}
public class Demo extends Object implements B
{
}
In above scenario class Demo must override which methods?']); Option::create(['question_id'=>$x->id,'option'=>'public void aM1(){} public void aM2(){}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public void bM1(){} public void bM2(){}','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'public void aM1(){} public void aM2(){} public void bM1(){} public void bM2(){}','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'public void aM1(){} public void bM2(){}','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What is the output of below code:
package p1;
public class Test {
 public static void main(String[] args) {
  Test t1 = new Test();
  Test t2 = new Test();
  if (!t1.equals(t2))
   System.out.println(  they are not equal  );
  if (t1 instanceof Object)
      System.out.println(  t1 is an Object  );
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'they are not equal','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'t1 is an Object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'they are not equal t1 is an Object','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'No Output Will be Displayed','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Choose the correct option.
Statement I: When an abstract class is sub classed, the subclass should provide the implementation for all the abstract methods in its parent class.
Statement II: If the subclass does not implement the abstract method in its parent class, then the subclass must also be declared abstract.']);
 Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
Interface can be used when common functionalities have to be implemented differently across multiple classes.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Choose the correct option.
Statement I: When all methods in a class are abstract the class can be declared as an interface.
Choose the correct option.
Statement II: An interface defines a contract for classes to implement the behavior.']); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What is the outputof below code:
package p1;
abstract class LivingThings{
 public abstract int walk();
}
class Human extends LivingThings{
 @Override
 public void walk() {
  System.out.println(  Human Can Walk  );
 }
}
class Test {
 public static void main(String[] args) {
  new Human().walk();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Human Can Walk','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'No Output will be displayed','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
abstract class Vehicle
{
 public int speed()
 {
  return 0;
 }
}
class Car extends Vehicle
{
 public int speed()
 {
  return 60;
 }
}
class RaceCar extends Car
{
 public int speed()
 {
  return 120;
 }
}
public class Demo
{
 public static void main(String [] args)
 {
  RaceCar racer = new RaceCar();
  Car car = new RaceCar();
  Vehicle vehicle = new RaceCar();
  System.out.println(racer.speed() +   ,    + car.speed()+  ,    + vehicle.speed());
 }
}
What is the result?']); Option::create(['question_id'=>$x->id,'option'=>'0, 0, 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'120, 60, 0','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'60,60,60','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'120, 120, 120','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output of following code?
class InterfaceDemo
{
 public static void main(String [] args)
 {
 new DigiCam(){}.doCharge();
 new DigiCam(){
 public void writeData (String msg)
 {
 System.out.println(  You are Sending:   +msg);
 }
 }.writeData(  MyFamily.jpg  );
 }//main
}
interface USB
{
 int readData();
 void writeData(String input);
 void doCharge();
}
abstract class DigiCam implements USB
{
 public int readData(){ return 0;}
 public void writeData(String input){}
 public void doCharge()
 {
 System.out.println(  DigiCam do Charge  );
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'DigiCam do Charge You are Sending: MyFamily.jpg','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation Error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'DigiCam do Charge','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
public class Person
{
 private String name;
 public Person(String name) { this.name = name; }
 public boolean equals(Person p)
 {
  return p.name.equals(this.name);
 }
}
Which statement is true?']); Option::create(['question_id'=>$x->id,'option'=>'The equals method does NOT properly override the Object classs equals method.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails because the private attribute p.name cannot be accessed.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'This class must also implement the hashCode method as well.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The code will compile as Object classs equals method is overridden.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Abstract classes can be used when
Statement I: Some implemented functionalities are common between classes
Statement II: Some functionalities need to be implemented in sub classes that extends the abstract class']); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
interface A {
 public abstract void methodOne();
}
interface B{
 public abstract void methodTwo();
}
interface C{
 public abstract void methodTwo();
}
class D implements B,C,A{
 public  void methodOne(){}
 public  void methodTwo(){ System.out.println(  Method Two  );}
}
class Test {
 public static void main(String[] args) {
  new D().methodTwo();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Carefully read the question and answer accordingly.
Which of the following correctly fits for the definition 'holding instances of other objects?"]); Option::create(['question_id'=>$x->id,'option'=>'Aggregation','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Composition','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Generic','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Polymorphic','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code
public class
MethodOverloading {
int m=10,n;
public void div(int a) throws Exception{
n=m/a;
System.out.println(n);
}
public void div(int a,int b) {
n=a/b;
}
public static void main(String[]args) throws Exception{
MethodOverloading o=new MethodOverloading();
o.div(0);
o.div(10,2);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'It will print ArithmeticException and prints 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'It will give ArithmeticException','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'It will print 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
class InterfaceDemo
{
 public static void main(String [] args)
 {
  DigiCam cam1=new DigiCam();
  cam1.doCharge();
 }//main
}
interface USB
{
 int readData();
 boolean writeData(String input);
 void doCharge();
}
class DigiCam implements USB
{
 public int readData(){ return 0;}
 public boolean writeData(String input){ return false; }
 void doCharge(){ return;}
}
Which of the following is correct with respect to given code?']); Option::create(['question_id'=>$x->id,'option'=>'Code will not compile due to weaker access privilege.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Code will Compile without any Error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Code will compile but wont print any message','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Choose the correct option.
Statement I: A subclass inherits all of the “public” and “protected” members of its parent, no matter what package the subclass is in.
Statement II: If the subclass of any class is in the same package then it inherits the default access members of the parent.']); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
public abstract class Shape
{
  private int x;
  private int y;
  public abstract void draw();
  public void setAnchor(int x, int y)
  {
   this.x = x;
   this.y = y;
  }
 }
Which two classes use the Shape class correctly?
1.public class Circle implements Shape {
private int radius;
}
2.public abstract class Circle extends Shape {
private int radius;
}
3.public class Circle extends Shape {
private int radius;
public void draw();
}
4.public class Circle extends Shape {
private int radius;
public void draw() {/* code here */}
}']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'3&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following is the correct syntax for suggesting that the JVM to performs garbage collection?']); Option::create(['question_id'=>$x->id,'option'=>'System.free();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'System.setGarbageCollection();','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'System.out.gc();','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'System.gc();','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Carefully read the question and answer accordingly.
Which of the following code snippets make objects eligible for Garbage Collection?
Statement A: String s =   new string  ; s = s.replace('e', '3');
Statement B:String replaceable =   replaceable  ; StringBuffer sb = new StringBuffer(replaceable);replaceable = null; sb = null;"]); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A alone','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement B alone','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Neither Statements A nor B','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
After which line the object initially referred by str (  Hello   String object) is eligible for garbage collection?
class Garbage{
public static void main(string[]args){
line 1:String str=new String(  Hello  );
line 2. String str1=str;
line 3.str=new String(  Hi  );
line 4.str1=new String(  Hello Again  );
5.return;
}
}']); Option::create(['question_id'=>$x->id,'option'=>'line 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'line 4','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'line 5','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'line 1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Statement A:finalize will always run before an object is garbage collected
Statement B:finalize method will be called only once by the garbage collector
which of the following is true?']); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is true and Statement B is false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is false and Statement B is true','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
How can you force garbage collection of an object?
1.Garbage collection cannot be forced
2.Call System.gc().
3.Call Runtime.gc().
4. Set all references to the object to new values(null, for example).']); Option::create(['question_id'=>$x->id,'option'=>'Option 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Option 3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Option 1','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Option 4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Members of the classs are accessed by _________ operator']); Option::create(['question_id'=>$x->id,'option'=>'address','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'dot','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'scope resolution','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none of these','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
public class VariableDec1
{
 public static void main(String[]args)
 {
  int I=32;
  char c=65;
  char a=c+I;
  System.out.println(a);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'97','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'a','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
public class Variabledec {
public static void main(String[]args){
boolean x = true;
int a;
if(x) a = x ? 2: 1;
else a = x ? 3: 4;
System.out.println(a);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
Garbage collector thread is a  daemon thread.
State True or False.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Find the keyword which is not used to implement exception']); Option::create(['question_id'=>$x->id,'option'=>'try','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'catch','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'finally','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'access','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
The ++ operator  postfix and prefix has the same effect']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
public class VariableDec
{
 public static void main(String[]args)
 {
  int x = 1;
  if(x>0 )
   x = 3;
  switch(x)
  {
   case 1: System.out.println(1);
   case 0: System.out.println(0);
   case 2: System.out.println(2);
   break;
   case 3: System.out.println(3);
   default: System.out.println(4);
   break;
  }
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'1 0 2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3 4','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
Garbage collection guarantee that a program will not run out of memory. State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output for following code?
public class Operators
{
 public static void main(String[]args)
 {
  int i=12;
  int j=13;
  int k=++i-j--;
  System.out.println(i);
  System.out.println(j);
  System.out.println(k);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'12,12,-1','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'13,12,0','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'13,13,0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'12,13,-1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following is not the Java keyword?']); Option::create(['question_id'=>$x->id,'option'=>'extends','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'implements','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throwed','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Integer','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
_____________ Operator is used to create an object.']); Option::create(['question_id'=>$x->id,'option'=>'class','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'new','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'print','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'main','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What is the correct structure of a java program?
I: import statement
II: class declaration
III: package statement
IV: method,variable declarations']); Option::create(['question_id'=>$x->id,'option'=>'III->I->II->IV.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'I->III->II->IV','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'I->III->IV->II','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'I->II->III->IV','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
 public class Threads
{
 public static void main (String[] args)
 {
  new Threads().go();
 }
 public void go()
 {
  Runnable r = new Runnable()
   {
   public void run()
   {
   System.out.print(  Run  );
    }
  };

  Thread t = new Thread(r);
   t.start();
   t.start();
  }
}
What will be the result?']); Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The code executes normally and prints   Run  .','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code executes normally, but nothing is printed.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Compilation fails.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
Threads are small process which run in shared memory space within a process.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Predict the output of below code:
package p1;
class MyThread extends Thread {
 public void run(int a) {
  System.out.println(  Important job running in MyThread  );
 }
 public void run(String s) {
  System.out.println(  String in run  );
 }
}
class Test {
 public static void main(String[] args) {
  MyThread t1=new MyThread();
  t1.start();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Compile Error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Important job running in MyThread','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'String in run','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Important job running in MyThread String in run','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will be the output of below code:
package p1;
class MyThread extends Thread {
 public void run() {
  System.out.println(  Important job running in MyThread  );
 }
}
class Test {
 public static void main(String[] args) {
  MyThread t1=new MyThread();
  t1.run();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Compile Error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Important job running in MyThread','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Non of the options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
class Background implements Runnable{
int i = 0;
public int run(){
while (true) {
i++;
System.out.println(  i=  +i);
}
return 1;
}
}//End class']); Option::create(['question_id'=>$x->id,'option'=>'It will compile and the run method will print out the increasing value of i.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'It will compile and calling start will print out the increasing value of i.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will cause an error at compile time.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Compilation will cause an error because while cannot take a parameter of true.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of  the following statements are true?
Statement1: When a thread is sleeping as a result of sleep(), it releases its locks.
Statement2: The Object.wait() method can be invoked only from a synchronized context.']); Option::create(['question_id'=>$x->id,'option'=>'Statement1 is TRUE but Statement2 is FALSE.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement2 is TRUE but Statement1 is FALSE.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'BOTH Statement1 & Statement2 are TRUE.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'BOTH Statement1 & Statement2 are FALSE.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
State whether TRUE or FALSE.
The below code will compile &   provide desired output:
package p1;
class MyThread extends Thread {
 public void run() {
  System.out.println(  Important job running in MyThread  );
 }
 public void run(String s) {
  System.out.println(  String in run is    + s);
 }
}
class Test {
 public static void main(String[] args) {
  MyThread t1=new MyThread();
  t1.start();
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
public class TestDemo implements Runnable
 {
 public void run()
 {
   System.out.print(  Runner  );
 }
 public static void main(String[] args)
 {
   Thread t = new Thread(new TestDemo());
   t.run();
   t.run();
   t.start();
 }
}
What will be the result?']); Option::create(['question_id'=>$x->id,'option'=>'You cannot call run() method using Thread class object.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'An exception is thrown at runtime.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code executes and prints   Runner  .','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The code executes and prints   RunnerRunnerRunner  .','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
You have created a TimeOut class as an extension of Thread, the purpose of which is to print a “Time’s Over” message if the Thread is not interrupted within 10 seconds of being started. Here is the run method that you have coded:
public void run() {
System.out.println(“Start!”);
try {
Thread.sleep(10000);
System.out.println(“Time’s Over!”);
} catch (InterruptedException e) {
System.out.println(“Interrupted!”);
}
}Given that a program creates and starts a TimeOut object, which of the following statements is true?']); Option::create(['question_id'=>$x->id,'option'=>'Exactly 10 seconds after the start method is called, “Time’s Over!” will be printed.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Exactly 10 seconds after the “Start!” is printed, “Time’s Over!” will be printed.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The delay between “Start!” being printed and “Time’s Over!” will be 10 seconds plus or minus one tick of the system clock.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If “Time’s Over!” is printed, you can be sure that at least 10 seconds have elapsed since “Start!” was printed.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the below is invalid state of thread?']); Option::create(['question_id'=>$x->id,'option'=>'Runnable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Running','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Dead','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Blocked','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which two statements are true?
1.It is possible for more than two threads to deadlock at once.
2.The JVM implementation guarantees that multiple threads cannot enter into a
deadlocked state.
3.Deadlocked threads release once their sleep() methods sleep duration has expired.
        4.If a piece of code is capable of deadlocking, you cannot eliminate the possibility of
deadlocking by inserting
invocations of Thread.yield().']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these is not valid method in Thread class']); Option::create(['question_id'=>$x->id,'option'=>'void run()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'void start()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'boolean getPriority()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'boolean isAlive()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Java provides ____ ways to create Threads.']); Option::create(['question_id'=>$x->id,'option'=>'One','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Two','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Three','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Four','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Inter thread communication is achieved using which of the below methods?']); Option::create(['question_id'=>$x->id,'option'=>'wait()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'notify()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'notifyAll()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'all the options','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Synchronization is achieved by using which of the below methods']); Option::create(['question_id'=>$x->id,'option'=>'Synchronized blocks','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Synchronized methods','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Synchronized classes','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Synchronized abstract classes','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these is not a benefit of Multithreading?']); Option::create(['question_id'=>$x->id,'option'=>'Reduce response time of process.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Support parallel operation of functions.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Increase system efficiency.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Requires less overheads compared to multitasking.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class collection1{
            public static void main(String[]args){
Collection c=new ArrayList();
c.add(10);
c.add(  abc  );
Collection l=new HashSet();
l.add(20);
l.add(  abc  );
l.add(30);
c.addAll(l);
c.removeAll(l);
System.out.println( c );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'[10,abc]','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'[10]','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'[abc]','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following are not List implementations?
            1.Vector
2.Hashtable
3.LinkedList
4.Properties']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these interface(s) are  part of Java’s core collection framework?']); Option::create(['question_id'=>$x->id,'option'=>'List','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Set','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'SortedList','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'SortedQueue','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
foreach loop is the only option to iterate over a Map']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following code:
01 import java.util.Set;
02 import java.util.TreeSet;
03
04 class TestSet {
        05   public static void main(String[] args) {
06      Set set = new TreeSet<String>();
07      set.add(  Green World  );
08      set.add(1);
09      set.add(  Green Peace  );
10      System.out.println(set);
11   }
12 }
Which of the following option gives the output for the above code?']); Option::create(['question_id'=>$x->id,'option'=>'Prints the output [Green World, 1, Green Peace] at line no 9','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error at line no 8','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Throws Runtime Exception','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Prints the output [Green World, Green Peace] at line no 9','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        LinkedList represents a collection that does not allow duplicate elements.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Under  java.util package we have   Collections   as Class and   Collection   as Interface ']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the return type of next() in Iterator?']); Option::create(['question_id'=>$x->id,'option'=>'boolean','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'void','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Object','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'String','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following partial code:
java.util.Date date = new java.util.Date();
Which of the following statement is true regarding the above partial code?']); Option::create(['question_id'=>$x->id,'option'=>'Creates a Date object with 0 as default value','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>"Creates a Date object with '01-01-1970 12:00:00 AM' as default value",'is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Creates a Date object with current date and time as default value','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Creates a Date object with current date alone as default value','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following are true statements?']); Option::create(['question_id'=>$x->id,'option'=>'The Iterator interface declares only three methods: hasNext, next and remove.','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'The ListIterator interface extends both the List and Iterator interfaces','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The ListIterator interface provides the ability to determine its position in the List.','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'The ListIterator interface provides forward and backward iteration capabilities.','is_answer'=>0.33]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the  data type of m in the following code?
            import java.util.*;
public class set1
        {
            public static void main(String [] args)
 {
  Set s=new HashSet();
  s.add(20);
  s.add(  abc  );
  for(  _____ m:s)
  System.out.println(m);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'int','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'String','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Object','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'set1','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Enumeration is having remove() method.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The add method of Set returns false if you try to add a duplicate element.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
As per the below code find which statements are true.
public class Test {
            public static void main(String[] args) {
   Line 1:  ArrayList<String> myList=new List<String>();
   Line 2:  String string = new String();
   Line 3:  myList.add(  string  );
   Line 4:  int index = myList.indexOf(  string  );
  System.out.println(index);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Line 1 has compilation error','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Line 2 has run time exceptions','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'In Line 4 null pointer exception will occur as String string contains null value','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Line 4 has neither error nor exceptions.','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State TRUE or FALSE.
        line 1: public class Test {
        line 2:  public static void main(String[] args) {
line 3: Queue queue = new LinkedList();
line 4:   queue.add(  Hello  );
line 5:   queue.add(  World  );
line 6:   List list = new ArrayList(queue);
line 7: System.out.println(list); }
line 8: }
Above code will give run time error at line number 3.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The LinkedList class supports two constructors.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these are interfaces in the collection framework']); Option::create(['question_id'=>$x->id,'option'=>'Hash Map','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Array List','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Collection','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Sorted Map','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which collection class allows you to associate its elements with key values']); Option::create(['question_id'=>$x->id,'option'=>'java.utill.Map','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.ArrayList','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.Dictionary','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'java.util.HashMap','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        TreeSet uses which two interfaces to sort the data']); Option::create(['question_id'=>$x->id,'option'=>'Serializable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'SortTable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'SortedSet','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Comparable','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Iterator i= new HashMap().entrySet().iterator();
is this correct declaration']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which statement are true for the class HashSet?']); Option::create(['question_id'=>$x->id,'option'=>'The elements in the collection are accessed using a unique key.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The elements in the collection are guaranteed to be unique','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'The elements in the collection are accessed using a unique key.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'HashSet allows at most one null element','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        which are the Basic features of implementations of interfaces in Collections Framework  in java?']); Option::create(['question_id'=>$x->id,'option'=>'All implementations are unsynchronized','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'All implementations support having null elements.','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'All implementations are serializable and cloneable','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'all implementations are immutable and supports duplicates data','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Map is the super class of Dictionary class?']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        what is the way to iterate over the elements of a Map']); Option::create(['question_id'=>$x->id,'option'=>'for loop','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'list Iterator','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'foreach','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'Iterator','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following Statements:
Statement A: The Iterator interface declares only two methods: hasMoreElements and nextElement.
        Statement B: The ListIterator interface extends both the List and Iterator interfaces.
        Which of the following option is correct regarding above given statements?']); Option::create(['question_id'=>$x->id,'option'=>'Both the Statements A and B are true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is true and Statement B is false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is false and Statement B is true','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both the statements A and B are false.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following list of code:
A) Iterator iterator = hashMap.keySet().iterator();
B) Iterator iterator = hashMap.iterator();
C) Iterator iterator = hashMap.keyMap().iterator();
D) Iterator iterator = hashMap.entrySet().iterator();
E) Iterator iterator = hashMap.entrySet.iterator();
Assume that hashMap is an instance of HashMap type collection implementation.
        Which of the following option gives the correct partial code about getting an Iterator to the HashMap entries?']); Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'B','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'C','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'D','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        List<Integer> newList=new ArrayList<integer>();   will Above statement  create a new object of Array list successfully ?']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Is   Array   a subclass of   Collection   ?']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Is this true or false. Map interface is derived from the Collection interface.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Compare
        {
            public static void main(String[]args)
 {
  String s=new String(  abc  );
  String s1=new String(  abc  );
  System.out.println(s.compareTo(s1));
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'True','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'False','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Method keySet() in Map returns a set view of the keys contained in that map.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following are synchronized?
            1.Hashtable
2.Hashmap
3.Vector
4.ArrayList']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following statements about the Map type Objects:
Statement A: Changes made in the set view returned by keySet() will be reflected in the original map.
        Statement B: All Map implementations keep the keys sorted.
        Which of the following option is true regarding the above statements?']); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is true and Statement B is false','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is false and Statement B is true','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        When comparable interface is used which method should be overridden?']); Option::create(['question_id'=>$x->id,'option'=>'comparator','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compare','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compareTo','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'compareWith','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Iterator is having previous() method.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The ArrayList<String> is immutable.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State whether TRUE or FALSE.
        StringTokenizer implements the Enumeration interface']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class StringCompare{
            public static void main(String[]args){
if(  string  ==  string  )
System.out.println(  both strings are equal  );
else
System.out.println(  both strings are  not equal  );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'both strings are equal','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'both strings are not equal','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State whether TRUE or FALSE.
        The APIS of StringBuffer are synchronized unlike that of StringBuilder']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State whether TRUE or FALSE.
        StringBuilder is not thread-safe unlike StringBuffer']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class StringBuffer1
        {
            public static void main(String[]args)
 {
  StringBuffer s1=new StringBuffer(  welcome  );
  StringBuffer s2=new StringBuffer(  welcome  );
  System.out.println(s1.equals(s2));
  System.out.println(s1.equals(s1));
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'true true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'false true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'false false','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'true false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class CompareStrings{
            public static void main(String[]args){
String a=new String(  string  );
String s=new String(  string  );
if(a==s)
System.out.println(  both strings are equal  );
else
System.out.println(  both strings are  not equal  );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'both strings are equal','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'both strings are not equal','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Strings cannot be compare using == operator','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State whether TRUE or FALSE.
        String class do not provides a method which is used to compare two strings lexicographically.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Choose the correct option.
        Statement I: StringBuilder offers faster performance than StringBuffer
Statement II: All the methods available on StringBuffer are also available on StringBuilder']); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        endsWith() member methods of String class creates new String object. State  True or False']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Choose the correct option.
        Statement I: StringBuffer is efficient than “+” concatenation
Statement II: Using API’s in StringBuffer the content and length of String can be changed which intern creates new object.']); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is TRUE & II is FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement I is FALSE & II is TRUE','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement I & II are FASLE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State whether TRUE or FALSE.
        String s = new String(); is valid statement in java']);
        Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Consider the following code snippet:
   String thought =   Green  ;
   StringBuffer bufferedThought = new StringBuffer(thought);
   String secondThought = bufferedThought.toString();
   System.out.println(thought == secondThought);
Which of the following option gives the output of the above code snippet?']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        String class contains API used for']);
        Option::create(['question_id'=>$x->id,'option'=>'Comparing strings','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Searching strings','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'Extracting strings','is_answer'=>0]);
        Option::create(['question_id'=>$x->id,'option'=>'All of above','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the output of below code:
package p1;
public class Hackathon {
            public static void main(String[] args) {
  String x =   Java  ;
  x.concat(   Rules!  );
  System.out.println(  x =    + x);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x = Java Rules','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x = Rules','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'x = Java','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class CompareStrings{
            public static void main(String[]args){
if(    string    .trim()==  string  )
System.out.println(  both strings are equal  );
else
System.out.println(  both strings are  not equal  );
}
}']); Option::create(['question_id'=>$x->id,'option'=>'both strings are equal','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'both strings are not equal','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Strings cannot be compare using == operator','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
            import java.util.*;
public class StringTokens
        {
            public static void main(String[]args)
 {
  String s=  India is a\n developing country  ;
  StringTokenizer o=new StringTokenizer(s);
  System.out.println(o.countTokens());
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'5','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'6','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the output of below code:
package p1;
public class Hackathon {
            public static void main(String[] args) {
  String x =   Java  ;
  x.toUpperCase();
  System.out.println(  x =    + x);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'x = JAVA','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x=    ','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'x = Java','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'x=  JAVA  ','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Exe3
        {
            public static void main(String[]args)
 {
   try
  {
   int i=10;
   int j=i/0;
   return;
  }catch(Exception e)
  {
      System.out.println(  welcome  );
  }
  System.out.println(  error  );
 }
}
1.welcome
2.error
3.compilation error']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'1&2&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Exe3 {
            public static void main(String[]args){
 try{
int i=10;
int j=i/0;
return;
}catch(Exception e){
            try{
                System.out.println(  welcome  );
                return;
            }catch(Exception e1){
            }
System.out.println(  error  );
}
}
}']); Option::create(['question_id'=>$x->id,'option'=>'welcome','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
class super5{
void Get()throws Exception{
System.out.println(  IOException  );
}
}
public class Exception2 extends super5{
            public static void main(String[]args){
super5 o=new super5();
try{
o.Get();
 }catch(IOException e){
        }
}
}']); Option::create(['question_id'=>$x->id,'option'=>'IOException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Propagating exceptions across modules is not possible without throw and throws keyword. State True or False.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output of following code?
public class Exception1{
            public static void main(String args[]) {
 int i=1, j=1;
try {
i++;
 j--;
if(i/j > 1)
 i++;
} catch(ArithmeticException e) {
            System.out.println(0);
        } catch(ArrayIndexOutOfBoundsException e) {
            System.out.println(1);
        } catch(Exception e) {
            System.out.println(2);
        }
 finally {
            System.out.println(3);
        }
System.out.println(4);
}
}
1.0
2.1
3.3
4.4.']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&2&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3&4','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'1&2&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
try and throws keywords are used to manually throw an exception?']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        RuntimeException is the superclass of those exceptions that can be thrown during the normal operation of the Java Virtual Machine.']);
 Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);

 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Error is the sub class of Throwable']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        At Point X in below code, which code is necessary to make the code compile?
public class Test
        {
        class TestException extends Exception {}
    public void runTest() throws TestException {}
    public void test() /* Point X */
        {
        runTest();
    }
}']); Option::create(['question_id'=>$x->id,'option'=>'throws RuntimeException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'catch ( Exception e )','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throws Exception','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'No code is necessary.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following code:
1   public class FinallyCatch {
        2      public static void main(String args[]) {
3         try {
4            throw new java.io.IOException();
5         }
6      }
7   }
Which of the following is true regarding the above code?']); Option::create(['question_id'=>$x->id,'option'=>'Shows unhandled exception type IOException at line number 4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Shows unhandled exception type IOException at line number 5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Demands a finally block at line number 4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Demands a finally block at line number 5','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which is/are true among given statements']); Option::create(['question_id'=>$x->id,'option'=>'A ClassNotFoundException is thrown when the reported class is not found by the ClassLoader in the CLASSPATH.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'NoClassDefFoundError means that the class was found by the ClassLoader however when trying to load the class, it ran into an error reading the class definition.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'NoClassDefFoundError is a subClass of ClassNotFoundException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        is it valid to place some code in between try and catch blocks.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which is the super class for Exception and Error?']); Option::create(['question_id'=>$x->id,'option'=>'Throwable','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'throws','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throw','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'RuntimeException','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
If you put a finally block after a try and its associated catch blocks, then once execution enters the try block, the code in that finally block will definitely be executed except in some circumstances.select the correct circumstance from given options:']); Option::create(['question_id'=>$x->id,'option'=>'An exception arising in the finally block itself','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'The use of System.exit()','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'finally block will be always executed in any circumstances.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The death of the thread','is_answer'=>0.33]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following are checked exceptions?
            1.ClassNotFoundException
2.InterruptedException
3.NullPointerException
4.ArrayIndexOutOfBoundsException']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'1&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following statement is true regarding try-catch-finally?']); Option::create(['question_id'=>$x->id,'option'=>'An exception which is not handled by a catch block will be handled by subsequent catch blocks','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A catch block can have another try block nested inside','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both catch block and finally block can throw exceptions','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'All of the listed options','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The finally block always executes when the try block exits.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output of following code?
try
{
    System.out.println(  Executing try  );
}
System.out.println(  After try  );
catch (Exception ex)
{
    System.out.println(  Executing catch  );
}']); Option::create(['question_id'=>$x->id,'option'=>'Executing try After try Executing catch','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Executing try Runtime Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile Time Exception','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Exception1{
            public static void main(String args[]) {
 int i=1, j=1;
try {
i++;
 j--;
if(i/j > 1)
 i++;
} catch(Exception e) {
            System.out.println(2);
        } catch(ArithmeticException e) {
            System.out.println(0);
        }
 finally {
            System.out.println(3);
        }
}
}']); Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output of the below code?
public class Test {
            public static void main(String[] args) {
  int a = 5, b = 0, c = 0;
  String s = new String();
  try {
   System.out.print(  hello   );
   System.out.print(s.charAt(0));
   c = a / b;
  } catch (ArithmeticException ae) {
            System.out.print(   Math problem occur  );
  } catch (StringIndexOutOfBoundsException se) {
            System.out.print(   string problem occur  );
  } catch (Exception e) {
            System.out.print(   problem occurs  );
  } finally {
            System.out.print(   stopped  );
  }
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'hello 0 stopped','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hello 0 Math problem occur stopped','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'hello Math problem occur string problem occur problem occurs stopped','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'hello string problem occur stopped','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these keywords is used to explicitly throw an exception?']); Option::create(['question_id'=>$x->id,'option'=>'try','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'finally','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'throw','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'throwable','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Exception1
        {
            public static void main(String[]args)
 {
  System.out.println(  A  );
  try
  {
   System.exit(0);
  }catch(Exception e)
  {
      System.out.println(  B  );
  }
   System.out.println(  C  );
 }
}
}']); Option::create(['question_id'=>$x->id,'option'=>'A,C','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        which of these are the subclass of Exception class']); Option::create(['question_id'=>$x->id,'option'=>'IOException','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'Throwable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'RunTimeException','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'FileNotFindException','is_answer'=>0.33]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these keywords are  a part of exception handling?']); Option::create(['question_id'=>$x->id,'option'=>'try','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'final','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'thrown','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'catch','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Consider the following code:
class MyException extends Throwable { }
public class TestThrowable {
            public static void main(String args[]) {
      try {
         test();
      } catch(Throwable ie) {
            System.out.println(  Exception  );
        }
   }

   static void test() throws Throwable {
            throw new MyException();
        }
}
Which of the following option gives the output for the above code?']); Option::create(['question_id'=>$x->id,'option'=>'Prints Exception','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Compiler time error User defined exceptions should extend Exception','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compile time error Cannot use Throwable to catch the exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Run time error test() method does not throw a Throwable instance','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output of the program?
public class Test {
            public static void aMethod() throws Exception {
  try {
   throw new Exception();
  } finally {
            System.out.print(  finally  );
  }
 }
 public static void main(String args[]) {
            try {
                aMethod();
            } catch (Exception e) {
                System.out.print(  exception   );
  }
  System.out.print(  finished  ); /* Line 24 */
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'exception finished','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation fails','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'finally','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'finally exception finished','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        what are true for RuntimeException']); Option::create(['question_id'=>$x->id,'option'=>'Runtime exceptions need not be explicitly caught in try catch block as it can occur anywhere in a program.','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime exceptions include arithmetic exceptions, pointer exceptions','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'RuntimeException is a class of I/O exception','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'RunTimeException are the exceptions which forces the programmer to catch them explicitly in try-catch block','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Within try block if System.exit(0) is called then also finally block is going to be executed.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        select true or false . Statement : Throwable is the super class of all exceptional type classes.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Select two runtime exceptions.
        1.SQLException
2.NullPointerException
3.FileNotFoundException
4.ArrayIndexOutOfBoundsException
5.IOException']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&5','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        which are true for try block']); Option::create(['question_id'=>$x->id,'option'=>'Try block always needed a catch block followed','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'if exception occurs, control switches to following first Catch block','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'catch block is not mandate always only finally followed by try can be executed','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'after switching from try block to catch block the control never come back to try block to execute rest of the code','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
Try can be followed with either catch or finally.
State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        which are  correct for checked exceptions']); Option::create(['question_id'=>$x->id,'option'=>'A checked exception is a subclass of throwable class','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'error and checked exceptions are same.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Checked exceptions are the object of the Exception class or any of its subclasses except Runtime Exception class.','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'All runtime exceptions are checked exceptions','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
            import java.io.*;
public class Exception1
        {
            public static void main(String[]args)
 {
  System.out.println(  A  );

   try
   {
   }
   catch(IOException t)
   {
       System.out.println(  B  );
   }

  System.out.println(  C  );
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Compile time error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'A','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'A,C','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following statement is true regarding implementing user defined exception mechanisms?
            Statement A: It is valid to derive a class from java.lang.Exception
Statement B: It is valid to derive a class from java.lang.RuntimeException']); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is true and Statement B is false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is false and Statement B is true','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        which are the Unchecked exceptions']); Option::create(['question_id'=>$x->id,'option'=>'Class Cast Exception','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'Array Index Out Of Bounds Exception','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'ClassNotFoundException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Number Format Exception','is_answer'=>0.33]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following exception is not mandatory to be handled in code?']); Option::create(['question_id'=>$x->id,'option'=>'IOException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FileNotFoundException','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'SQLException','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'NullPointerException','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Statement 1:static variables can be serialized
Statement2:transient  variables cannot be serialized
which of the following is true?']); Option::create(['question_id'=>$x->id,'option'=>'statement 1:true statement2:true','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'statement 1:false statement2:true','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'statement 1:false statement2:false','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'statement 1:true statement2:false','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        State TRUE or FALSE.
        getParent() gives the parent directory of the file and isFile() Tests whether the file denoted by the given abstract pathname is a normal file.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these interface is not a member of java.io package?']); Option::create(['question_id'=>$x->id,'option'=>'DataInput','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ObjectInput','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ObjectFilter','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'FileFilter','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        BufferedWriter constructor CAN ACCEPT Filewriter Object as a parameter.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these class are related to input and output stream in terms of functioning?']); Option::create(['question_id'=>$x->id,'option'=>'File','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Writer','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'Reader','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'OutputStream','is_answer'=>0.33]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the output of this program?
            1.    import java.io.*;
2.    class files {
        3.        public static void main(String args[]) {
4.            File obj = new File(  /java/system  );
5.            System.out.print(obj.getName());
6.        }
7.    }']); Option::create(['question_id'=>$x->id,'option'=>'java/system','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'/java/system','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'system','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        isFile() returns true if called on a file or when called on a directory']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Serialization is representing object in a sequence of bytes.  State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        An ObjectInputStream deserializes objects previously written using an ObjectOutputStream.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        InputStream is the class used for stream of characters.
        State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        select the correct  statements about BufferedOutputStream class']); Option::create(['question_id'=>$x->id,'option'=>'BufferedOutputStream class is a member of Java.io package','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'setting up BufferedOutputStreaman , an application can write bytes to the underlying output stream without necessarily causing a call to the underlying system for each byte written.','is_answer'=>0.33]);  Option::create(['question_id'=>$x->id,'option'=>'it has flush() method','is_answer'=>0.33]); Option::create(['question_id'=>$x->id,'option'=>'As bytes from the stream are read or skipped, the internal buffer is refilled as necessary from the contained input stream, many bytes at a time.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following is a marker interface used for object serialization?']); Option::create(['question_id'=>$x->id,'option'=>'Runnable','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Serializable','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Externalizable','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        DataInputStream is not necessarily safe for multithreaded access.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of these class are the member class of java.io package?']); Option::create(['question_id'=>$x->id,'option'=>'ObjectInput','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'StringReader','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'File','is_answer'=>0.5]); Option::create(['question_id'=>$x->id,'option'=>'String','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        InputStreamReader is sub class of FilterReader.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The InputStream.close() method closes this stream and releases all system resources']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Serialization is JVM independent.State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following are abstract classes?
1.Reader
2.InputStreamReader
3.InputStream
4.OutputStream']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&2&3','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'1&3&4','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'1&2&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the value of variable   I   after execution of following code?
public class Evaluate
        {
            public static void main(String[]args)
 {
  int i=10;
  if(((i++)>12)&&(++i<15))
   System.out.println(i);
  else
   System.out.println(i);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'10','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'11','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'12','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        _____________ is a multi way branch statement']); Option::create(['question_id'=>$x->id,'option'=>'switch','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'continue','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'break','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'label','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Wrapper11
        {
            public static void main(String[]args)
 {
  Long l=100;
  System.out.println(l);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'100','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'code will execute with out printing','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'runtime Exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class WrapperClass12
        {
            public static void main(String[]args)
 {
  Boolean b=true;
  boolean a=Boolean.parseBoolean(  tRUE  );
  System.out.println(b==a);
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'True','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'False','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        We can use Wrapper objects of type int, short, char in switch case.
State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the number of bytes used by Java primitive long']); Option::create(['question_id'=>$x->id,'option'=>'The number of bytes is compiler dependent','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'4','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'8','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Data can be passed to the function ____']); Option::create(['question_id'=>$x->id,'option'=>'by value','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'by reference','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both by value & reference','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'none of these','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following is a loop construct that will always be executed once?']); Option::create(['question_id'=>$x->id,'option'=>'switch','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'for','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'while','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'do …. While','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class WrapperClass1 {
            public static void main(String[]args){
String s=  10Bangalore  ;
int i=Integer.parseInt(s);
System.out.println(i);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'10Bangalore','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'10','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Runtime Exception','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class Wrapper2 {
            public static void main(String[]args){
Byte b=1;
Byte a=2;
System.out.println(a+b);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'compiles and print 3','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Runtime Error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'compiles and prints 12','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class WrapperClass1 {
            public static void main(String[]args){
Integer i=new Integer(10);
Integer j=new Integer(10);
System.out.println(i==j);
}
}']); Option::create(['question_id'=>$x->id,'option'=>'True','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'False','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        The result of 10.987+”30.765” is _________________.']); Option::create(['question_id'=>$x->id,'option'=>'10.98730.765','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'10.9873.765','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Compilation error','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'10.987','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output for following code?
public class While {
            static int i;
public static void main(String[]args){
                System.out.println(i);
                while(i<=5){
                    i++;
                }
                System.out.println(i);
            }
}']); Option::create(['question_id'=>$x->id,'option'=>'compilation error','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'0,6','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'6,0','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'0,5','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>"Carefully read the question and answer accordingly.
        What will be the output for following code?
public class While {
            public static void main(String[]args){
                int a='A';
int i=a+32;
while(a<='Z'){
    a++;
}
System.out.println(i);
System.out.println(a);
}
}"]); Option::create(['question_id'=>$x->id,'option'=>'A,Z','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'a,z','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'91,97','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'97,91','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        The ______ statement is used inside the switch to terminate a Statement sequence']); Option::create(['question_id'=>$x->id,'option'=>'break','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Jump','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'exit','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'goto','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What will be the output of below code?
public class Test {
            public static void main(String[] args) {
  int i = 1;
  Integer I = new Integer(i);
  method(i);
  method(I);
 }
 static void method(Integer I) {
            System.out.print(   Wrapper  );
 }
 static void method(int i) {
            System.out.print(   Primitive  );
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'Primitive Wrapper','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Wrapper','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Primitive','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Wrapper Primitive','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What happens when the following code is compiled and run. Select the one correct
answer.
     for(int i = 1; i < 3; i++)
        for(int j = 3; j >= 1; j--)
            assert i!=j : i;']); Option::create(['question_id'=>$x->id,'option'=>'The class compiles and runs, but does not print anything.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The number 1 gets printed with AssertionError','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'The number 2 gets printed with AssertionError','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'The number 3 gets printed with AssertionError','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Each case in switch statement should end with ________ statement']); Option::create(['question_id'=>$x->id,'option'=>'default','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'break','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'continue','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'new','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which method executes a simple query and returns a single Result Set object?']); Option::create(['question_id'=>$x->id,'option'=>'executeUpdate()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'executeQuery()','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'execute()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'noexecute()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which object allows you to execute parametrized queries?']); Option::create(['question_id'=>$x->id,'option'=>'ResultSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Parametrized','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'PreparedStatement','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'Condition','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which statements about JDBC are true?
            1.JDBC has 5 types of Drivers
2.JDBC stands for Java DataBase Connectivity
        3.JDBC is an API to access relational databases, spreadsheets and flat files
4.JDBC is an API to bridge the object-relational mismatch between OO programs and relational databases']); Option::create(['question_id'=>$x->id,'option'=>'1&2','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'3&4','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'2&3','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'1&4','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which type of Statement can execute parameterized queries?']); Option::create(['question_id'=>$x->id,'option'=>'PreparedStatement','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'ParameterizedStatement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ParameterizedStatement and CallableStatement','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'All kinds of Statements (i.e. which implement a sub interface of Statement)','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        You are using JDBC-ODBC bridge driver to establish a connection with a database. You have created a DSN Mydsn. Which statement will you use to connect to the database?']); Option::create(['question_id'=>$x->id,'option'=>'Connection cn=DriverManager.getConnection(  jdbc:odbc  );','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Connection cn=DriverManager.getConnection(  jdbc:odbc:Mydsn  ,   username  ,   password  );','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Connection cn=DriverManager.getConnection(  jdbc:odbc   ,  username  ,   password  );','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Connection cn=DriverManager.getConnection(  jdbc:odbc:dsn   ,  username  ,   password  );','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        The method Class.forName() is a part of JDBC API. State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Connection object can be initialized using which method of the Driver Manager class?']); Option::create(['question_id'=>$x->id,'option'=>'putConnection()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'setConnection()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Connection()','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'getConnetion()','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which type of driver converts JDBC calls into the network protocol used by the database management system directly?']); Option::create(['question_id'=>$x->id,'option'=>'Type 1 driver','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Type 2 driver','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Type 3 driver','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Type 4 driver','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following is true with respect to code given below?
            import java.sql.*;
public class OracleDemo
        {
            public static void main(String [] args) throws SQLException,ClassNotFoundException
 {
  Class.forName(  oracle.jdbc.driver.OracleDriver  );
  Connection con=DriverManager.getConnection(  jdbc:oracle:thin:@PC188681:1521:training  ,  scott  ,  tiger  );
  Statement stmt=con.createStatement();
  ResultSet rs=stmt.executeQuery(  SELECT * FROM Person  );
  while(rs.next())
  {
   System.out.println(rs.getString(  column1  ));
  }
 }
}']); Option::create(['question_id'=>$x->id,'option'=>'The code will not compile as no try catch block specified','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'The code will display all values in column named column1','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Class.forName must be mentioned after Connection statement','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'  SELECT * FROM Person   query must be passed as parameter to con.createStatement()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        The JDBC-ODBC Bridge driver translates the JDBC API to the ODBC API and used with which of the following:']); Option::create(['question_id'=>$x->id,'option'=>'JDBC drivers','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ODBC drivers','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Both A and B','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the above','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        Type 1 & Type 3 driver types are not vendor specific implementation of Java driver. State  True or False']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which method executes an SQL statement that may return multiple results?']); Option::create(['question_id'=>$x->id,'option'=>'executeUpdate()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'executeQuery()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'execute()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'noexecute()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which package contains classes that help in connecting to a database, sending SQL statements to the database, and processing the query results']); Option::create(['question_id'=>$x->id,'option'=>'connection.sql','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'db.sql','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'pkg.sql','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.sql','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is the state of the parameters of the PreparedStatement object when the user clicks on the Query button?']); Option::create(['question_id'=>$x->id,'option'=>'initialized','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'started','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'paused','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'stopped','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which of the following listed option gives the valid type of object to store a date and time combination using JDBC API?']); Option::create(['question_id'=>$x->id,'option'=>'java.util.Date','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.sql.Date','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.sql.Time','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.sql.Timestamp','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
If your JDBC Connection is in auto-commit mode, which it is by default, then every SQL statement is committed to the database upon its completion.  State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        How can you execute a stored procedure in the database?']); Option::create(['question_id'=>$x->id,'option'=>'Call method execute() on a CallableStatement object','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Call method executeProcedure() on a Statement object','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Call method execute() on a StoredProcedure object','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Call method run() on a ProcedureCommand object','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        Which object provides you with methods to access data from the table?']); Option::create(['question_id'=>$x->id,'option'=>'ResultSet','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Parametrized','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'TableStatement','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Condition','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        What is correct about DDL statements?']); Option::create(['question_id'=>$x->id,'option'=>'DDL statements are treated as normal SQL statements, and are executed by calling the execute() method on a Statement (or a sub interface thereof) object','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'To execute DDL statements, you have to install additional support files','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'DDL statements cannot be executed by making use of JDBC, you should use the native database tools for this.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Support for DDL statements will be a feature of a future release of JDBC','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
        executeUpdate() & execute() are valid methods that can be used for executing DDL statements. State  True or False']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
        A Java program cannot directly communicate with an ODBC driver because of which of the following:']); Option::create(['question_id'=>$x->id,'option'=>'ODBC written in C language','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'ODBC written in C# language','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ODBC written in C++ language','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'ODBC written in Basic language','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider the following statements:
Statement A: The PreparedStatement object enables you to execute parameterized queries.
Statement B: The SQL query can use the placeholders which are replaced by the INPUT  parameters at runtime.
Which of the following option is True with respect to the above statements?']); Option::create(['question_id'=>$x->id,'option'=>'Both Statement A and Statement B are True.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is True and Statement B is False.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Statement A is False and Statement B is True.','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Both Statements A and B are False.','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which packages contain the JDBC classes?']); Option::create(['question_id'=>$x->id,'option'=>'java.jdbc and javax.jdbc','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.jdbc and java.jdbc.sql','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.sql and javax.sql','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'java.rdb and javax.rdb','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which method sets the query parameters of the PreparedStatement Object?']); Option::create(['question_id'=>$x->id,'option'=>'putString()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'insertString()','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'setString()','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'setToString()','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing a JDBC application, where you have to retrieve the Employee information from the database table based on Employee id value passed at runtime as parameter. Which best statement API you will use to execute parameterized SQL statement at runtime?']); Option::create(['question_id'=>$x->id,'option'=>'Statement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'PreparedStatement','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'CallableStatement','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which collection class allows you to grow or shrink its size and provides indexed access to its elements, but whose methods are not synchronized?']); Option::create(['question_id'=>$x->id,'option'=>'java.util.HashSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.LinkedHashSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.List','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.util.ArrayList','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing a JDBC application, where you have to retrieve Employee table schema information like table columns name, columns field length and data type etc. Which API you will use to retrieve table schema information?']); Option::create(['question_id'=>$x->id,'option'=>'ResultSet','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'ResultSetMetaData','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'DataSource','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Statement','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
In Thread implementation methods like wait(), notify(), notifyAll() should be used in synchronized context .
State true or false']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing an application where you have to store and retrieve data in character format in file. Which API you will use to store and retrieve the data in character format?']); Option::create(['question_id'=>$x->id,'option'=>'Reader and Writer Stream APIs','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'InputStream and OutputStream Stream APIs','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Collection APIs','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following provides an efficient means of storing key/value pairs in sorted order, and allows rapid retrieval?']); Option::create(['question_id'=>$x->id,'option'=>'TreeMap','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'HashMap','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'LinkedHashMap','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Non of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing a JDBC application, where you have to retrieve quarterly report from database by executing database store procedure created by database developer. Which statement API you will use to execute store procedure and retrieve ResultSet information?']); Option::create(['question_id'=>$x->id,'option'=>'Statement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'PreparedStatement','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'CallableStatement','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
Interfaces are mainly used to expose behavior or functionality not the implementation code.
State true or false']); Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Select the advantages of using Collection API’s in java application development.']); Option::create(['question_id'=>$x->id,'option'=>'Reduces programming effort','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Allows interoperability among unrelated APIs','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Reduces effort to learn and to use new APIs','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Fosters software reuse','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which statements are true about comparing two instances of the same class, given that the
equals() and hashCode() methods have been properly overridden?']); Option::create(['question_id'=>$x->id,'option'=>'If the equals() method returns true, the hashCode() comparison == might return false','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'If the equals() method returns false, the hashCode() comparison == might return true','is_answer'=>0.5]);  Option::create(['question_id'=>$x->id,'option'=>'If the hashCode() comparison == returns true, the equals() method must return true','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'If the hashCode() comparison == returns true, the equals() method might return true','is_answer'=>0.5]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing java application in a team consists of 20 developers and you have been asked to develop class by Name ProgrammerAnalyst and to ensure that other developers in team use ProgrammerAnalyst class only by creating object and team member should not be given provision to inherit and modify any functionality written in ProgrammerAnalyst class using inheritance. How do you achieve this requirement in development scenario?']); Option::create(['question_id'=>$x->id,'option'=>'Declare the ProgrammerAnalyst class has abstract','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Declare the ProgrammerAnalyst class has private','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Declare the ProgrammerAnalyst class has final','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider a development scenario where you want to write the object data into persistence storage devices (like file, disk etc.).Using which of the below concept you can achieve the given requirement?']); Option::create(['question_id'=>$x->id,'option'=>'finalization','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Serialization','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Synchronization','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Deserialization','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following statement is incorrect?']); Option::create(['question_id'=>$x->id,'option'=>'By multithreading CPU’s idle time is minimized, and we can take maximum use of it.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'By multitasking CPU’s idle time is minimized, and we can take maximum use of it.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Two thread in Java can have same priority','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'A thread can exist only in two states, running and blocked.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing an ATM application for ABC Bank using java application. Several account holders of ABC Bank have opted for add-on cards. There is a chance that two users may access the same account at same time and do transaction simultaneously knowingly or unknowingly from different ATM machine from same or different bank branches. As developer you have to ensure that when one user login to account until he finishes his transaction account should be locked to other users who are trying access the same account. How do you implement given requirement programmatically using java?']); Option::create(['question_id'=>$x->id,'option'=>'Using Thread Synchronization','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Using object serialization','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Using object deserialization','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of these is executed first before execution of any other thing takes place in a program?']); Option::create(['question_id'=>$x->id,'option'=>'main method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'finalize method','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'static block code','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'private method','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are trying to persist or store object of Customer class using ObjectOutputStream class in java. When you are trying to persist customer object data java code is throwing runtime exception without persisting object information.  Please suggest what is the key important factor you have consider in code in order to persist customer object data.']); Option::create(['question_id'=>$x->id,'option'=>'Check whether you have implemented Customer class with Serializable interface','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Check whether you have implemented Customer class with Externalizable interface','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Check whether you have marked Customer class methods with synchronized keyword','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which class does not override the equals() and hashCode() methods, inheriting them directly from class Object?']); Option::create(['question_id'=>$x->id,'option'=>'java.lang.String','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.lang.Double','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.lang.StringBuffer','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'java.lang.Character','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
What will happen if two thread of same priority are called to be processed simultaneously?']); Option::create(['question_id'=>$x->id,'option'=>'Any one will be executed first lexographically','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Both of them will be executed simultaneously','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'None of them will be executed','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'It is dependent on the operating system.','is_answer'=>1]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>3,'question'=>'Carefully read the question and answer accordingly.
In Thread implementation making method synchronized is always better in order to increase application performance rather than using synchronize block to synchronize certain block of statements written in java inside the method.
State True or False.']); Option::create(['question_id'=>$x->id,'option'=>'FALSE','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'TRUE','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Which of the following is incorrect statement regarding the use of generics and parameterized types in Java?']); Option::create(['question_id'=>$x->id,'option'=>'Generics provide type safety by shifting more type checking responsibilities to the compiler.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Generics and parameterized types eliminate the need for down casts when using Java Collections.','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'When designing your own collections class (say, a linked list), generics and parameterized types allow you to achieve type safety with just a single class definition as opposed to defining multiple classes.','is_answer'=>1]); Option::create(['question_id'=>$x->id,'option'=>'All of the mentioned','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider the development scenario where you have created Employee class with implementation code and as per the project requirement you have to ensure that developer in team reusing code written in Employee class only using inheritance by extending the employee class but not by creating the instance of Employee object directly. Please suggest the solution to implement given requirement?']); Option::create(['question_id'=>$x->id,'option'=>'Mark Employee class with abstract keyword','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Mark Employee class with final keyword','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Make Employee class methods private','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'Make Employee class methods public','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
You need to store elements in a collection that guarantees that no duplicates are stored and all elements can be accessed in natural order. Which interface provides that capability?']); Option::create(['question_id'=>$x->id,'option'=>'java.util.Map','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.Set','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'java.util.List','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'java.util.Collection','is_answer'=>0]);
 $x=Question::create(['question_level_id'=>2,'chapter_id'=>1,'question_type_id'=>1,'question'=>'Carefully read the question and answer accordingly.
Consider you are developing shopping cart application you have to store details of items purchased by the each customer in intermediate memory before storing purchase details in actual database permanently note that number of different items purchased by customer is not definite it may vary. How do you implement given requirement using java considering best performance of the application?']); Option::create(['question_id'=>$x->id,'option'=>'Implement using Arrays','is_answer'=>0]);  Option::create(['question_id'=>$x->id,'option'=>'Implement using Collection API’s.','is_answer'=>1]);  Option::create(['question_id'=>$x->id,'option'=>'Implement using file API’s','is_answer'=>0]); Option::create(['question_id'=>$x->id,'option'=>'None of the listed options','is_answer'=>0]);

 
       
    }
}
