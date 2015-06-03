<?php
use League\Csv\Reader;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
		
		//PostTable
		$this->call('PostTableSeeder');
		$this->command->info('User table seeded!');
	}
}
class UserTableSeeder extends Seeder {

    public function run()
    {
    	$environment = app()->environment();
		//User 1
		User::create([
			'username' => 'user01',
			'email' => 'user_1@gmail.com',
			'password' => Hash::make('sa12345')
		]);
		//User 2
		User::create([
			'username' => 'user02',
			'email' => 'user_2@gmail.com',
			'password' => Hash::make('sa12345')
		]);
		//User 3
		User::create([
			'username' => 'user03',
			'email' => 'user_3@gmail.com',
			'password' => Hash::make('sa12345')
		]);
		//User 4
		User::create([
			'username' => 'sa1234',
			'email' => 'sa1234.'.$environment.'@gmail.com',
			'password' => Hash::make('sa12345')
		]);
    }
}
class PostTableSeeder extends Seeder {

    public function run()
    {
    	$reader = Reader::createFromPath(public_path().'/test_user.csv');
		$posts = $reader->setOffset(1)->fetchAll();
		foreach($posts as $key => $row) {
			if (!empty($row[0])) {
				Post::create([
					'user_id' => $row[1],
					'status' => $row[0],
				]);
			}
			
		}
    }
}
