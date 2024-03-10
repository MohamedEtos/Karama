<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
    public function run()
    {
        $permissions = [

            'مستخدم',
            'تاجر',

            'المديرين',
            'عرض المديرين',
            'اضافه مدير',

            'عرض النقاط',
            'اضافة نقاط',
            'تعديل نقاط',
            'حذف نقاط',
            'اعدادات النقاط',

			'رئيسيه المدير',
			'رئيسيه التجار',

            'عرض التجار',
            'اضافة تاجر',
            'تعديل تاجر',
            'حذف تاجر',

            'عرض المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'عرض المنتجات',
            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',

            'المراجعات',
			'منتجات مقبوله',
			'منتجات مرفوضه',
			'رفض منتجات',
			'قبول منتجات',

            'الاقسام',
            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',

            'الاشعارات',
            'الرسائل',

            'OTP',
            'عرض رموز OTP ',

        ];
        foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
        }
    }
}
