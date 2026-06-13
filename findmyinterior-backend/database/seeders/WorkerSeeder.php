<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class WorkerSeeder extends Seeder {
  public function run(): void {
  Worker::unguard();
  $wRoleId = DB::table('roles')->where('slug', 'worker')->value('id');

        $u = User::create(['name' => 'Vikas Pandey', 'email' => 'worker1@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580001']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Pandey', 'slug' => Str::slug('Vikas Pandey-1'),
            'skill' => 'Tile Mason', 'experience_years' => 8,
            'daily_rate' => 1124, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Pandey'),
            'phone' => '9876580001'
        ]);
        
        $u = User::create(['name' => 'Dinesh Pandey', 'email' => 'worker2@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580002']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Pandey', 'slug' => Str::slug('Dinesh Pandey-2'),
            'skill' => 'POP Expert', 'experience_years' => 20,
            'daily_rate' => 537, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Pandey'),
            'phone' => '9876580002'
        ]);
        
        $u = User::create(['name' => 'Ashok Kumar', 'email' => 'worker3@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580003']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Kumar', 'slug' => Str::slug('Ashok Kumar-3'),
            'skill' => 'POP Expert', 'experience_years' => 3,
            'daily_rate' => 778, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Kumar'),
            'phone' => '9876580003'
        ]);
        
        $u = User::create(['name' => 'Pappu Mishra', 'email' => 'worker4@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580004']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Mishra', 'slug' => Str::slug('Pappu Mishra-4'),
            'skill' => 'Electrician', 'experience_years' => 9,
            'daily_rate' => 803, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Mishra'),
            'phone' => '9876580004'
        ]);
        
        $u = User::create(['name' => 'Sanjay Pandey', 'email' => 'worker5@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580005']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sanjay Pandey', 'slug' => Str::slug('Sanjay Pandey-5'),
            'skill' => 'Tile Mason', 'experience_years' => 3,
            'daily_rate' => 826, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sanjay Pandey'),
            'phone' => '9876580005'
        ]);
        
        $u = User::create(['name' => 'Ramesh Paswan', 'email' => 'worker6@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580006']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Paswan', 'slug' => Str::slug('Ramesh Paswan-6'),
            'skill' => 'Carpenter', 'experience_years' => 2,
            'daily_rate' => 778, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Paswan'),
            'phone' => '9876580006'
        ]);
        
        $u = User::create(['name' => 'Ramesh Singh', 'email' => 'worker7@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580007']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Singh', 'slug' => Str::slug('Ramesh Singh-7'),
            'skill' => 'Carpenter', 'experience_years' => 25,
            'daily_rate' => 1453, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Singh'),
            'phone' => '9876580007'
        ]);
        
        $u = User::create(['name' => 'Manoj Paswan', 'email' => 'worker8@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580008']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Paswan', 'slug' => Str::slug('Manoj Paswan-8'),
            'skill' => 'Site Supervisor', 'experience_years' => 8,
            'daily_rate' => 760, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Paswan'),
            'phone' => '9876580008'
        ]);
        
        $u = User::create(['name' => 'Pappu Singh', 'email' => 'worker9@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580009']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Singh', 'slug' => Str::slug('Pappu Singh-9'),
            'skill' => 'Welder', 'experience_years' => 12,
            'daily_rate' => 852, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Singh'),
            'phone' => '9876580009'
        ]);
        
        $u = User::create(['name' => 'Pappu Mishra', 'email' => 'worker10@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580010']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Mishra', 'slug' => Str::slug('Pappu Mishra-10'),
            'skill' => 'Tile Mason', 'experience_years' => 24,
            'daily_rate' => 677, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Mishra'),
            'phone' => '9876580010'
        ]);
        
        $u = User::create(['name' => 'Suresh Paswan', 'email' => 'worker11@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580011']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Paswan', 'slug' => Str::slug('Suresh Paswan-11'),
            'skill' => 'Carpenter', 'experience_years' => 15,
            'daily_rate' => 1016, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Paswan'),
            'phone' => '9876580011'
        ]);
        
        $u = User::create(['name' => 'Ramesh Sharma', 'email' => 'worker12@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580012']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Sharma', 'slug' => Str::slug('Ramesh Sharma-12'),
            'skill' => 'Site Supervisor', 'experience_years' => 19,
            'daily_rate' => 1289, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Sharma'),
            'phone' => '9876580012'
        ]);
        
        $u = User::create(['name' => 'Ramesh Sharma', 'email' => 'worker13@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580013']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Sharma', 'slug' => Str::slug('Ramesh Sharma-13'),
            'skill' => 'POP Expert', 'experience_years' => 4,
            'daily_rate' => 1202, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Sharma'),
            'phone' => '9876580013'
        ]);
        
        $u = User::create(['name' => 'Rajesh Singh', 'email' => 'worker14@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580014']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Singh', 'slug' => Str::slug('Rajesh Singh-14'),
            'skill' => 'Tile Mason', 'experience_years' => 22,
            'daily_rate' => 801, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Singh'),
            'phone' => '9876580014'
        ]);
        
        $u = User::create(['name' => 'Raju Paswan', 'email' => 'worker15@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580015']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Raju Paswan', 'slug' => Str::slug('Raju Paswan-15'),
            'skill' => 'Site Supervisor', 'experience_years' => 7,
            'daily_rate' => 632, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Raju Paswan'),
            'phone' => '9876580015'
        ]);
        
        $u = User::create(['name' => 'Sunil Sharma', 'email' => 'worker16@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580016']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sunil Sharma', 'slug' => Str::slug('Sunil Sharma-16'),
            'skill' => 'Carpenter', 'experience_years' => 12,
            'daily_rate' => 1350, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sunil Sharma'),
            'phone' => '9876580016'
        ]);
        
        $u = User::create(['name' => 'Ramesh Kumar', 'email' => 'worker17@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580017']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Kumar', 'slug' => Str::slug('Ramesh Kumar-17'),
            'skill' => 'POP Expert', 'experience_years' => 16,
            'daily_rate' => 1410, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Kumar'),
            'phone' => '9876580017'
        ]);
        
        $u = User::create(['name' => 'Sunil Pandey', 'email' => 'worker18@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580018']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sunil Pandey', 'slug' => Str::slug('Sunil Pandey-18'),
            'skill' => 'Site Supervisor', 'experience_years' => 16,
            'daily_rate' => 1302, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sunil Pandey'),
            'phone' => '9876580018'
        ]);
        
        $u = User::create(['name' => 'Suresh Pandey', 'email' => 'worker19@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580019']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Pandey', 'slug' => Str::slug('Suresh Pandey-19'),
            'skill' => 'POP Expert', 'experience_years' => 11,
            'daily_rate' => 1056, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Pandey'),
            'phone' => '9876580019'
        ]);
        
        $u = User::create(['name' => 'Ramesh Paswan', 'email' => 'worker20@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580020']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Paswan', 'slug' => Str::slug('Ramesh Paswan-20'),
            'skill' => 'Welder', 'experience_years' => 16,
            'daily_rate' => 1136, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Paswan'),
            'phone' => '9876580020'
        ]);
        
        $u = User::create(['name' => 'Manoj Yadav', 'email' => 'worker21@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580021']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Yadav', 'slug' => Str::slug('Manoj Yadav-21'),
            'skill' => 'Painter', 'experience_years' => 3,
            'daily_rate' => 909, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Yadav'),
            'phone' => '9876580021'
        ]);
        
        $u = User::create(['name' => 'Dinesh Singh', 'email' => 'worker22@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580022']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Singh', 'slug' => Str::slug('Dinesh Singh-22'),
            'skill' => 'Carpenter', 'experience_years' => 17,
            'daily_rate' => 1185, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Singh'),
            'phone' => '9876580022'
        ]);
        
        $u = User::create(['name' => 'Pappu Singh', 'email' => 'worker23@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580023']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Singh', 'slug' => Str::slug('Pappu Singh-23'),
            'skill' => 'Site Supervisor', 'experience_years' => 15,
            'daily_rate' => 1374, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Singh'),
            'phone' => '9876580023'
        ]);
        
        $u = User::create(['name' => 'Sanjay Singh', 'email' => 'worker24@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580024']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sanjay Singh', 'slug' => Str::slug('Sanjay Singh-24'),
            'skill' => 'Carpenter', 'experience_years' => 8,
            'daily_rate' => 1315, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sanjay Singh'),
            'phone' => '9876580024'
        ]);
        
        $u = User::create(['name' => 'Manoj Yadav', 'email' => 'worker25@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580025']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Yadav', 'slug' => Str::slug('Manoj Yadav-25'),
            'skill' => 'Tile Mason', 'experience_years' => 15,
            'daily_rate' => 1173, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Yadav'),
            'phone' => '9876580025'
        ]);
        
        $u = User::create(['name' => 'Rajesh Kumar', 'email' => 'worker26@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580026']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Kumar', 'slug' => Str::slug('Rajesh Kumar-26'),
            'skill' => 'Electrician', 'experience_years' => 10,
            'daily_rate' => 1269, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Kumar'),
            'phone' => '9876580026'
        ]);
        
        $u = User::create(['name' => 'Sanjay Yadav', 'email' => 'worker27@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580027']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sanjay Yadav', 'slug' => Str::slug('Sanjay Yadav-27'),
            'skill' => 'Welder', 'experience_years' => 20,
            'daily_rate' => 1031, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sanjay Yadav'),
            'phone' => '9876580027'
        ]);
        
        $u = User::create(['name' => 'Manoj Sharma', 'email' => 'worker28@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580028']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Sharma', 'slug' => Str::slug('Manoj Sharma-28'),
            'skill' => 'POP Expert', 'experience_years' => 10,
            'daily_rate' => 1497, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Sharma'),
            'phone' => '9876580028'
        ]);
        
        $u = User::create(['name' => 'Rajesh Yadav', 'email' => 'worker29@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580029']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Yadav', 'slug' => Str::slug('Rajesh Yadav-29'),
            'skill' => 'Electrician', 'experience_years' => 11,
            'daily_rate' => 1352, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Yadav'),
            'phone' => '9876580029'
        ]);
        
        $u = User::create(['name' => 'Ashok Singh', 'email' => 'worker30@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580030']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Singh', 'slug' => Str::slug('Ashok Singh-30'),
            'skill' => 'Painter', 'experience_years' => 15,
            'daily_rate' => 1448, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Singh'),
            'phone' => '9876580030'
        ]);
        
        $u = User::create(['name' => 'Ramesh Pandey', 'email' => 'worker31@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580031']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Pandey', 'slug' => Str::slug('Ramesh Pandey-31'),
            'skill' => 'Tile Mason', 'experience_years' => 13,
            'daily_rate' => 1286, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Pandey'),
            'phone' => '9876580031'
        ]);
        
        $u = User::create(['name' => 'Vikas Paswan', 'email' => 'worker32@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580032']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Paswan', 'slug' => Str::slug('Vikas Paswan-32'),
            'skill' => 'Tile Mason', 'experience_years' => 7,
            'daily_rate' => 1140, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Paswan'),
            'phone' => '9876580032'
        ]);
        
        $u = User::create(['name' => 'Ashok Mishra', 'email' => 'worker33@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580033']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Mishra', 'slug' => Str::slug('Ashok Mishra-33'),
            'skill' => 'Painter', 'experience_years' => 16,
            'daily_rate' => 1057, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Mishra'),
            'phone' => '9876580033'
        ]);
        
        $u = User::create(['name' => 'Dinesh Kumar', 'email' => 'worker34@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580034']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Kumar', 'slug' => Str::slug('Dinesh Kumar-34'),
            'skill' => 'POP Expert', 'experience_years' => 9,
            'daily_rate' => 655, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Kumar'),
            'phone' => '9876580034'
        ]);
        
        $u = User::create(['name' => 'Rajesh Sharma', 'email' => 'worker35@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580035']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Sharma', 'slug' => Str::slug('Rajesh Sharma-35'),
            'skill' => 'Site Supervisor', 'experience_years' => 22,
            'daily_rate' => 1200, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Sharma'),
            'phone' => '9876580035'
        ]);
        
        $u = User::create(['name' => 'Manoj Pandey', 'email' => 'worker36@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580036']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Pandey', 'slug' => Str::slug('Manoj Pandey-36'),
            'skill' => 'POP Expert', 'experience_years' => 15,
            'daily_rate' => 549, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Pandey'),
            'phone' => '9876580036'
        ]);
        
        $u = User::create(['name' => 'Dinesh Kumar', 'email' => 'worker37@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580037']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Kumar', 'slug' => Str::slug('Dinesh Kumar-37'),
            'skill' => 'Carpenter', 'experience_years' => 19,
            'daily_rate' => 936, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Kumar'),
            'phone' => '9876580037'
        ]);
        
        $u = User::create(['name' => 'Rajesh Mishra', 'email' => 'worker38@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580038']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Mishra', 'slug' => Str::slug('Rajesh Mishra-38'),
            'skill' => 'Painter', 'experience_years' => 14,
            'daily_rate' => 1210, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Mishra'),
            'phone' => '9876580038'
        ]);
        
        $u = User::create(['name' => 'Suresh Kumar', 'email' => 'worker39@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580039']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Kumar', 'slug' => Str::slug('Suresh Kumar-39'),
            'skill' => 'Welder', 'experience_years' => 7,
            'daily_rate' => 1182, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Kumar'),
            'phone' => '9876580039'
        ]);
        
        $u = User::create(['name' => 'Ashok Mishra', 'email' => 'worker40@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580040']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Mishra', 'slug' => Str::slug('Ashok Mishra-40'),
            'skill' => 'POP Expert', 'experience_years' => 12,
            'daily_rate' => 1303, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Mishra'),
            'phone' => '9876580040'
        ]);
        
        $u = User::create(['name' => 'Amit Mishra', 'email' => 'worker41@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580041']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Amit Mishra', 'slug' => Str::slug('Amit Mishra-41'),
            'skill' => 'Tile Mason', 'experience_years' => 19,
            'daily_rate' => 1182, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Amit Mishra'),
            'phone' => '9876580041'
        ]);
        
        $u = User::create(['name' => 'Ashok Mishra', 'email' => 'worker42@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580042']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Mishra', 'slug' => Str::slug('Ashok Mishra-42'),
            'skill' => 'Tile Mason', 'experience_years' => 6,
            'daily_rate' => 1020, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Mishra'),
            'phone' => '9876580042'
        ]);
        
        $u = User::create(['name' => 'Sunil Singh', 'email' => 'worker43@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580043']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sunil Singh', 'slug' => Str::slug('Sunil Singh-43'),
            'skill' => 'Electrician', 'experience_years' => 17,
            'daily_rate' => 1135, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sunil Singh'),
            'phone' => '9876580043'
        ]);
        
        $u = User::create(['name' => 'Suresh Pandey', 'email' => 'worker44@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580044']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Pandey', 'slug' => Str::slug('Suresh Pandey-44'),
            'skill' => 'Fabricator', 'experience_years' => 12,
            'daily_rate' => 798, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Pandey'),
            'phone' => '9876580044'
        ]);
        
        $u = User::create(['name' => 'Ashok Kumar', 'email' => 'worker45@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580045']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Kumar', 'slug' => Str::slug('Ashok Kumar-45'),
            'skill' => 'Carpenter', 'experience_years' => 11,
            'daily_rate' => 895, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Kumar'),
            'phone' => '9876580045'
        ]);
        
        $u = User::create(['name' => 'Raju Pandey', 'email' => 'worker46@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580046']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Raju Pandey', 'slug' => Str::slug('Raju Pandey-46'),
            'skill' => 'Painter', 'experience_years' => 3,
            'daily_rate' => 1073, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Raju Pandey'),
            'phone' => '9876580046'
        ]);
        
        $u = User::create(['name' => 'Sanjay Mishra', 'email' => 'worker47@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580047']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sanjay Mishra', 'slug' => Str::slug('Sanjay Mishra-47'),
            'skill' => 'Electrician', 'experience_years' => 13,
            'daily_rate' => 1497, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sanjay Mishra'),
            'phone' => '9876580047'
        ]);
        
        $u = User::create(['name' => 'Vikas Paswan', 'email' => 'worker48@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580048']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Paswan', 'slug' => Str::slug('Vikas Paswan-48'),
            'skill' => 'Electrician', 'experience_years' => 3,
            'daily_rate' => 1134, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Paswan'),
            'phone' => '9876580048'
        ]);
        
        $u = User::create(['name' => 'Rajesh Paswan', 'email' => 'worker49@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580049']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Paswan', 'slug' => Str::slug('Rajesh Paswan-49'),
            'skill' => 'Welder', 'experience_years' => 8,
            'daily_rate' => 1482, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Paswan'),
            'phone' => '9876580049'
        ]);
        
        $u = User::create(['name' => 'Pappu Mishra', 'email' => 'worker50@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580050']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Mishra', 'slug' => Str::slug('Pappu Mishra-50'),
            'skill' => 'Site Supervisor', 'experience_years' => 13,
            'daily_rate' => 1160, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Mishra'),
            'phone' => '9876580050'
        ]);
        
        $u = User::create(['name' => 'Ashok Paswan', 'email' => 'worker51@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580051']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Paswan', 'slug' => Str::slug('Ashok Paswan-51'),
            'skill' => 'Site Supervisor', 'experience_years' => 13,
            'daily_rate' => 1071, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Paswan'),
            'phone' => '9876580051'
        ]);
        
        $u = User::create(['name' => 'Suresh Singh', 'email' => 'worker52@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580052']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Singh', 'slug' => Str::slug('Suresh Singh-52'),
            'skill' => 'Tile Mason', 'experience_years' => 25,
            'daily_rate' => 1111, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Singh'),
            'phone' => '9876580052'
        ]);
        
        $u = User::create(['name' => 'Sanjay Kumar', 'email' => 'worker53@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580053']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sanjay Kumar', 'slug' => Str::slug('Sanjay Kumar-53'),
            'skill' => 'POP Expert', 'experience_years' => 17,
            'daily_rate' => 1347, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sanjay Kumar'),
            'phone' => '9876580053'
        ]);
        
        $u = User::create(['name' => 'Ramesh Kumar', 'email' => 'worker54@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580054']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Kumar', 'slug' => Str::slug('Ramesh Kumar-54'),
            'skill' => 'Tile Mason', 'experience_years' => 5,
            'daily_rate' => 1101, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Kumar'),
            'phone' => '9876580054'
        ]);
        
        $u = User::create(['name' => 'Dinesh Sharma', 'email' => 'worker55@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580055']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Sharma', 'slug' => Str::slug('Dinesh Sharma-55'),
            'skill' => 'Carpenter', 'experience_years' => 17,
            'daily_rate' => 795, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Sharma'),
            'phone' => '9876580055'
        ]);
        
        $u = User::create(['name' => 'Rajesh Sharma', 'email' => 'worker56@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580056']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Sharma', 'slug' => Str::slug('Rajesh Sharma-56'),
            'skill' => 'Carpenter', 'experience_years' => 2,
            'daily_rate' => 851, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Sharma'),
            'phone' => '9876580056'
        ]);
        
        $u = User::create(['name' => 'Rajesh Sharma', 'email' => 'worker57@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580057']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Sharma', 'slug' => Str::slug('Rajesh Sharma-57'),
            'skill' => 'POP Expert', 'experience_years' => 13,
            'daily_rate' => 1008, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Sharma'),
            'phone' => '9876580057'
        ]);
        
        $u = User::create(['name' => 'Ashok Pandey', 'email' => 'worker58@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580058']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Pandey', 'slug' => Str::slug('Ashok Pandey-58'),
            'skill' => 'Carpenter', 'experience_years' => 23,
            'daily_rate' => 1240, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Pandey'),
            'phone' => '9876580058'
        ]);
        
        $u = User::create(['name' => 'Manoj Paswan', 'email' => 'worker59@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580059']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Paswan', 'slug' => Str::slug('Manoj Paswan-59'),
            'skill' => 'POP Expert', 'experience_years' => 20,
            'daily_rate' => 668, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Paswan'),
            'phone' => '9876580059'
        ]);
        
        $u = User::create(['name' => 'Rajesh Yadav', 'email' => 'worker60@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580060']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Rajesh Yadav', 'slug' => Str::slug('Rajesh Yadav-60'),
            'skill' => 'Tile Mason', 'experience_years' => 20,
            'daily_rate' => 1042, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Rajesh Yadav'),
            'phone' => '9876580060'
        ]);
        
        $u = User::create(['name' => 'Suresh Yadav', 'email' => 'worker61@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580061']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Yadav', 'slug' => Str::slug('Suresh Yadav-61'),
            'skill' => 'Tile Mason', 'experience_years' => 5,
            'daily_rate' => 1389, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Yadav'),
            'phone' => '9876580061'
        ]);
        
        $u = User::create(['name' => 'Raju Mishra', 'email' => 'worker62@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580062']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Raju Mishra', 'slug' => Str::slug('Raju Mishra-62'),
            'skill' => 'Painter', 'experience_years' => 19,
            'daily_rate' => 765, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Raju Mishra'),
            'phone' => '9876580062'
        ]);
        
        $u = User::create(['name' => 'Ashok Mishra', 'email' => 'worker63@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580063']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Mishra', 'slug' => Str::slug('Ashok Mishra-63'),
            'skill' => 'Tile Mason', 'experience_years' => 6,
            'daily_rate' => 1011, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Mishra'),
            'phone' => '9876580063'
        ]);
        
        $u = User::create(['name' => 'Ramesh Pandey', 'email' => 'worker64@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580064']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Pandey', 'slug' => Str::slug('Ramesh Pandey-64'),
            'skill' => 'Electrician', 'experience_years' => 17,
            'daily_rate' => 1242, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Pandey'),
            'phone' => '9876580064'
        ]);
        
        $u = User::create(['name' => 'Vikas Yadav', 'email' => 'worker65@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580065']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Yadav', 'slug' => Str::slug('Vikas Yadav-65'),
            'skill' => 'Painter', 'experience_years' => 17,
            'daily_rate' => 717, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Yadav'),
            'phone' => '9876580065'
        ]);
        
        $u = User::create(['name' => 'Vikas Pandey', 'email' => 'worker66@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580066']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Pandey', 'slug' => Str::slug('Vikas Pandey-66'),
            'skill' => 'Painter', 'experience_years' => 9,
            'daily_rate' => 1127, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Pandey'),
            'phone' => '9876580066'
        ]);
        
        $u = User::create(['name' => 'Ramesh Singh', 'email' => 'worker67@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580067']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Singh', 'slug' => Str::slug('Ramesh Singh-67'),
            'skill' => 'Painter', 'experience_years' => 16,
            'daily_rate' => 796, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Singh'),
            'phone' => '9876580067'
        ]);
        
        $u = User::create(['name' => 'Suresh Yadav', 'email' => 'worker68@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580068']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Yadav', 'slug' => Str::slug('Suresh Yadav-68'),
            'skill' => 'POP Expert', 'experience_years' => 10,
            'daily_rate' => 1184, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Yadav'),
            'phone' => '9876580068'
        ]);
        
        $u = User::create(['name' => 'Ashok Singh', 'email' => 'worker69@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580069']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Singh', 'slug' => Str::slug('Ashok Singh-69'),
            'skill' => 'Electrician', 'experience_years' => 18,
            'daily_rate' => 910, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Singh'),
            'phone' => '9876580069'
        ]);
        
        $u = User::create(['name' => 'Ramesh Yadav', 'email' => 'worker70@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580070']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Yadav', 'slug' => Str::slug('Ramesh Yadav-70'),
            'skill' => 'Painter', 'experience_years' => 14,
            'daily_rate' => 516, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Yadav'),
            'phone' => '9876580070'
        ]);
        
        $u = User::create(['name' => 'Pappu Singh', 'email' => 'worker71@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580071']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Singh', 'slug' => Str::slug('Pappu Singh-71'),
            'skill' => 'Painter', 'experience_years' => 22,
            'daily_rate' => 944, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Singh'),
            'phone' => '9876580071'
        ]);
        
        $u = User::create(['name' => 'Sunil Pandey', 'email' => 'worker72@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580072']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Sunil Pandey', 'slug' => Str::slug('Sunil Pandey-72'),
            'skill' => 'Fabricator', 'experience_years' => 7,
            'daily_rate' => 892, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Sunil Pandey'),
            'phone' => '9876580072'
        ]);
        
        $u = User::create(['name' => 'Pappu Sharma', 'email' => 'worker73@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580073']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Sharma', 'slug' => Str::slug('Pappu Sharma-73'),
            'skill' => 'Electrician', 'experience_years' => 20,
            'daily_rate' => 806, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Sharma'),
            'phone' => '9876580073'
        ]);
        
        $u = User::create(['name' => 'Pappu Singh', 'email' => 'worker74@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580074']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Singh', 'slug' => Str::slug('Pappu Singh-74'),
            'skill' => 'Tile Mason', 'experience_years' => 8,
            'daily_rate' => 1442, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Singh'),
            'phone' => '9876580074'
        ]);
        
        $u = User::create(['name' => 'Suresh Yadav', 'email' => 'worker75@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580075']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Yadav', 'slug' => Str::slug('Suresh Yadav-75'),
            'skill' => 'Tile Mason', 'experience_years' => 16,
            'daily_rate' => 1461, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Yadav'),
            'phone' => '9876580075'
        ]);
        
        $u = User::create(['name' => 'Dinesh Pandey', 'email' => 'worker76@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580076']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Pandey', 'slug' => Str::slug('Dinesh Pandey-76'),
            'skill' => 'POP Expert', 'experience_years' => 12,
            'daily_rate' => 1432, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Pandey'),
            'phone' => '9876580076'
        ]);
        
        $u = User::create(['name' => 'Raju Sharma', 'email' => 'worker77@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580077']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Raju Sharma', 'slug' => Str::slug('Raju Sharma-77'),
            'skill' => 'Carpenter', 'experience_years' => 8,
            'daily_rate' => 832, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Raju Sharma'),
            'phone' => '9876580077'
        ]);
        
        $u = User::create(['name' => 'Amit Yadav', 'email' => 'worker78@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580078']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Amit Yadav', 'slug' => Str::slug('Amit Yadav-78'),
            'skill' => 'POP Expert', 'experience_years' => 7,
            'daily_rate' => 1196, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Amit Yadav'),
            'phone' => '9876580078'
        ]);
        
        $u = User::create(['name' => 'Vikas Sharma', 'email' => 'worker79@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580079']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Sharma', 'slug' => Str::slug('Vikas Sharma-79'),
            'skill' => 'Site Supervisor', 'experience_years' => 11,
            'daily_rate' => 936, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Sharma'),
            'phone' => '9876580079'
        ]);
        
        $u = User::create(['name' => 'Ramesh Pandey', 'email' => 'worker80@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580080']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Pandey', 'slug' => Str::slug('Ramesh Pandey-80'),
            'skill' => 'Fabricator', 'experience_years' => 19,
            'daily_rate' => 891, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Pandey'),
            'phone' => '9876580080'
        ]);
        
        $u = User::create(['name' => 'Dinesh Sharma', 'email' => 'worker81@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580081']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Sharma', 'slug' => Str::slug('Dinesh Sharma-81'),
            'skill' => 'Electrician', 'experience_years' => 19,
            'daily_rate' => 573, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Sharma'),
            'phone' => '9876580081'
        ]);
        
        $u = User::create(['name' => 'Ramesh Kumar', 'email' => 'worker82@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580082']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Kumar', 'slug' => Str::slug('Ramesh Kumar-82'),
            'skill' => 'Carpenter', 'experience_years' => 9,
            'daily_rate' => 1365, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Kumar'),
            'phone' => '9876580082'
        ]);
        
        $u = User::create(['name' => 'Manoj Pandey', 'email' => 'worker83@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580083']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Pandey', 'slug' => Str::slug('Manoj Pandey-83'),
            'skill' => 'Fabricator', 'experience_years' => 13,
            'daily_rate' => 734, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Pandey'),
            'phone' => '9876580083'
        ]);
        
        $u = User::create(['name' => 'Manoj Singh', 'email' => 'worker84@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580084']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Singh', 'slug' => Str::slug('Manoj Singh-84'),
            'skill' => 'Painter', 'experience_years' => 17,
            'daily_rate' => 1314, 'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Singh'),
            'phone' => '9876580084'
        ]);
        
        $u = User::create(['name' => 'Ashok Yadav', 'email' => 'worker85@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580085']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Yadav', 'slug' => Str::slug('Ashok Yadav-85'),
            'skill' => 'POP Expert', 'experience_years' => 4,
            'daily_rate' => 1032, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Yadav'),
            'phone' => '9876580085'
        ]);
        
        $u = User::create(['name' => 'Suresh Paswan', 'email' => 'worker86@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580086']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Paswan', 'slug' => Str::slug('Suresh Paswan-86'),
            'skill' => 'Fabricator', 'experience_years' => 6,
            'daily_rate' => 622, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Paswan'),
            'phone' => '9876580086'
        ]);
        
        $u = User::create(['name' => 'Manoj Singh', 'email' => 'worker87@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580087']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Singh', 'slug' => Str::slug('Manoj Singh-87'),
            'skill' => 'Carpenter', 'experience_years' => 22,
            'daily_rate' => 776, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Singh'),
            'phone' => '9876580087'
        ]);
        
        $u = User::create(['name' => 'Dinesh Pandey', 'email' => 'worker88@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580088']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Pandey', 'slug' => Str::slug('Dinesh Pandey-88'),
            'skill' => 'Electrician', 'experience_years' => 2,
            'daily_rate' => 1087, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Pandey'),
            'phone' => '9876580088'
        ]);
        
        $u = User::create(['name' => 'Manoj Sharma', 'email' => 'worker89@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580089']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Manoj Sharma', 'slug' => Str::slug('Manoj Sharma-89'),
            'skill' => 'Welder', 'experience_years' => 6,
            'daily_rate' => 1162, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Manoj Sharma'),
            'phone' => '9876580089'
        ]);
        
        $u = User::create(['name' => 'Amit Paswan', 'email' => 'worker90@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580090']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Amit Paswan', 'slug' => Str::slug('Amit Paswan-90'),
            'skill' => 'POP Expert', 'experience_years' => 21,
            'daily_rate' => 1161, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Amit Paswan'),
            'phone' => '9876580090'
        ]);
        
        $u = User::create(['name' => 'Raju Singh', 'email' => 'worker91@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580091']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Raju Singh', 'slug' => Str::slug('Raju Singh-91'),
            'skill' => 'Painter', 'experience_years' => 24,
            'daily_rate' => 543, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Raju Singh'),
            'phone' => '9876580091'
        ]);
        
        $u = User::create(['name' => 'Vikas Singh', 'email' => 'worker92@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580092']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Vikas Singh', 'slug' => Str::slug('Vikas Singh-92'),
            'skill' => 'POP Expert', 'experience_years' => 8,
            'daily_rate' => 995, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Vikas Singh'),
            'phone' => '9876580092'
        ]);
        
        $u = User::create(['name' => 'Suresh Singh', 'email' => 'worker93@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580093']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Singh', 'slug' => Str::slug('Suresh Singh-93'),
            'skill' => 'POP Expert', 'experience_years' => 7,
            'daily_rate' => 858, 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Singh'),
            'phone' => '9876580093'
        ]);
        
        $u = User::create(['name' => 'Ashok Kumar', 'email' => 'worker94@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580094']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Kumar', 'slug' => Str::slug('Ashok Kumar-94'),
            'skill' => 'Painter', 'experience_years' => 17,
            'daily_rate' => 1117, 'city' => 'Patna', 'district' => 'Patna',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Kumar'),
            'phone' => '9876580094'
        ]);
        
        $u = User::create(['name' => 'Pappu Kumar', 'email' => 'worker95@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580095']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Pappu Kumar', 'slug' => Str::slug('Pappu Kumar-95'),
            'skill' => 'Welder', 'experience_years' => 8,
            'daily_rate' => 1129, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Pappu Kumar'),
            'phone' => '9876580095'
        ]);
        
        $u = User::create(['name' => 'Dinesh Pandey', 'email' => 'worker96@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580096']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Dinesh Pandey', 'slug' => Str::slug('Dinesh Pandey-96'),
            'skill' => 'POP Expert', 'experience_years' => 24,
            'daily_rate' => 587, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Dinesh Pandey'),
            'phone' => '9876580096'
        ]);
        
        $u = User::create(['name' => 'Ashok Singh', 'email' => 'worker97@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580097']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ashok Singh', 'slug' => Str::slug('Ashok Singh-97'),
            'skill' => 'POP Expert', 'experience_years' => 17,
            'daily_rate' => 1395, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ashok Singh'),
            'phone' => '9876580097'
        ]);
        
        $u = User::create(['name' => 'Suresh Pandey', 'email' => 'worker98@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580098']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Suresh Pandey', 'slug' => Str::slug('Suresh Pandey-98'),
            'skill' => 'Painter', 'experience_years' => 11,
            'daily_rate' => 1345, 'city' => 'Gaya', 'district' => 'Gaya',
            'is_available' => true,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Suresh Pandey'),
            'phone' => '9876580098'
        ]);
        
        $u = User::create(['name' => 'Amit Paswan', 'email' => 'worker99@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580099']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Amit Paswan', 'slug' => Str::slug('Amit Paswan-99'),
            'skill' => 'Carpenter', 'experience_years' => 24,
            'daily_rate' => 1122, 'city' => 'Purnia', 'district' => 'Purnia',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Amit Paswan'),
            'phone' => '9876580099'
        ]);
        
        $u = User::create(['name' => 'Ramesh Paswan', 'email' => 'worker100@example.com', 'password' => Hash::make('password'), 'verification_level' => 'identity_verified', 'is_active' => true, 'phone' => '9876580100']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $wRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 1000]);
        Worker::create([
            'user_id' => $u->id, 'name' => 'Ramesh Paswan', 'slug' => Str::slug('Ramesh Paswan-100'),
            'skill' => 'Tile Mason', 'experience_years' => 9,
            'daily_rate' => 906, 'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'is_available' => false,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode('Ramesh Paswan'),
            'phone' => '9876580100'
        ]);
          }
}
