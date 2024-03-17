<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\userDetalis;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $faker = Faker::create();

        $userDetrils = userDetalis::create([
            'phone'=>'01033441143',
            'whatsapp'=>'01033441143',
            'facebook'=>'https://www.facebook.com/mohamed.etos/',
            'website'=>'www.Karama-SC.com',
            'location'=>'11 ش خالد بن الوليد المنيب الجيزه ',
            'bio'=>'اداياس هو متجر للملابس الرياضيه وخاص بكل جديد في عالم الملابس والموضه ',
            'nationalId'=>'12345678911',
            // 'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
            // 'coverImage'=>'assets/img/defultUserImg/cover.webp',
            'coverImage'=>"https://picsum.photos/1000/400?random=" . $faker->unique()->numberBetween(1, 1000),
            'ProfileImage'=>"https://picsum.photos/300/300?random=" . $faker->unique()->numberBetween(1, 1000),
        ]);

        $user = User::create([
            'name' => 'Karama-SC',
            'email' => 'admin@admin.com',
            'subtype' => 'admin',
            'userDetalis' => '1',
            'usercode' =>'11223344',
            'roles_name' =>['owner'],
            'password' => bcrypt('11223344'),
        ]);
        $role = Role::create(['name' => 'owner']);
        $role2 = Role::create(['name' => 'مدير']);
        $role3 = Role::create(['name' => 'تاجر']);
        $role4 = Role::create(['name' => 'مشترك']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}

