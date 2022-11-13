<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Comment;
use App\Models\Item;
use App\Models\Label;

use Faker;
use PhpParser\Node\Stmt\Label as StmtLabel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       
    
        $faker = \Faker\Factory::create();
        DB::table('users')->truncate();
        $users = collect();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@szerveroldali.hu',
            'is_admin' => true,
            'password' => bcrypt('adminpwd')
        ]);
        

        for ($i = 1; $i <= $faker->numberBetween(0, 55); $i++) {
            $users->add(
                User::factory()->create([
                    'name' => 'user' . $i,
                    'email' => 'user' . $i . '@szerveroldali.hu',
                    'password' => bcrypt('password'),
            
                ])
            );
        }

        
        $items = Item::factory(10)->create();

        for ($i = 1; $i <= 10; $i++) {
            $items->add(
                Item::factory()->create([
                    'name' => 'item'. $i
            
                ])
            );
        }
    
        

        $labels = Label::factory(10)->create();
        
        for ($i = 1; $i <= 10; $i++) {
            $labels->add(
                Label::factory()->create([
                    'name' => 'label'. $i,

                    
            
                ])
            );

        }
        $comments = Comment::factory(10)->create();

        $items -> each(function($p) use (&$labels, &$comments){
            $p -> labels() -> sync($labels -> random());
            $p->comments()->create(['content' => Comment::factory(10)->create()]);
        });
        


       
        $comments -> each(function($p) use ($users, $items){
            $p -> author() -> associate($users -> random()) ->save();
            $p-> item() -> associate($items -> random()) -> save(); 
        });
        
        
        
        

      



       

        
    }
}
