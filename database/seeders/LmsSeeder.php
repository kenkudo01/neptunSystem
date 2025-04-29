<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use App\Models\Solution; 
class LmsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //teacher
        $teacher = User::create([
            'name' => 'ken kudo',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'teacher',
        ]);

       
        $project1 = Project::create([
            'name' => 'Introduction to Laravel',
            'description' => 'Learn the basics of Laravel framework.',
            'code' => 'IK-LAR101',
            'credit' => 3,
            'user_id' => $teacher->id,
        ]);
    
        $project2 = Project::create([
            'name' => 'Advanced PHP',
            'description' => 'Explore advanced PHP topics and best practices.',
            'code' => 'IK-PHP201',
            'credit' => 4,
            'user_id' => $teacher->id,
        ]);
    
        $project3 = Project::create([
            'name' => 'Database Management',
            'description' => 'Learn relational databases and SQL basics.',
            'code' => 'IK-DBM301',
            'credit' => 2,
            'user_id' => $teacher->id,
        ]);
        $project1->tasks()->createMany([
            ['name' => 'Laravel Setup', 'description' => 'Install and set up Laravel.', 'points' => 10],
            ['name' => 'Routing Basics', 'description' => 'Learn about Laravel routes.', 'points' => 15],
            ['name' => 'Blade Templates', 'description' => 'Understand Blade templating engine.', 'points' => 20],
        ]);
    
        $project2->tasks()->createMany([
            ['name' => 'OOP in PHP', 'description' => 'Deep dive into object-oriented PHP.', 'points' => 20],
            ['name' => 'Design Patterns', 'description' => 'Learn common PHP design patterns.', 'points' => 25],
            ['name' => 'PHP Security', 'description' => 'Secure PHP applications.', 'points' => 30],
        ]);
    
        $project3->tasks()->createMany([
            ['name' => 'SQL Basics', 'description' => 'Introduction to SQL queries.', 'points' => 10],
            ['name' => 'Database Normalization', 'description' => 'Learn about database normalization.', 'points' => 15],
            ['name' => 'ER Diagrams', 'description' => 'Draw Entity-Relationship diagrams.', 'points' => 10],
        ]);


        $teacher2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'teacher',
        ]);
    
        $project4 = Project::create([
            'name' => 'Web Design',
            'description' => 'HTML, CSS, and UI principles.',
            'code' => 'IK-WEB101',
            'credit' => 3,
            'user_id' => $teacher2->id,
        ]);
    
        $project5 = Project::create([
            'name' => 'JavaScript Essentials',
            'description' => 'Master JS fundamentals.',
            'code' => 'IK-JS201',
            'credit' => 4,
            'user_id' => $teacher2->id,
        ]);
    
        $project6 = Project::create([
            'name' => 'React Introduction',
            'description' => 'Start building React apps.',
            'code' => 'IK-REACT301',
            'credit' => 3,
            'user_id' => $teacher2->id,
        ]);


        //student
        $student = User::create([
            'name' => 'ken',
            'email' => 'student@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);

        $student->subjects()->attach([
            $project1->id,
            $project2->id,
            $project3->id,
        ]);
        
 
        $student1 = User::create([
            'name' => 'student1',
            'email' => 'student1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
        $student1->subjects()->attach([
            $project1->id,
            $project2->id,
        ]);

        $student2 = User::create([
            'name' => 'student2',
            'email' => 'student2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
        $student2->subjects()->attach([
            $project2->id,
        ]);

        $student3 = User::create([
            'name' => 'student3',
            'email' => 'student3@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
        $student3->subjects()->attach([
            $project1->id,
            $project3->id,
        ]);


        foreach ([$student, $student1, $student2, $student3] as $studentUser) {
            foreach ([$project1, $project2, $project3] as $project) {
                foreach ($project->tasks as $task) {
                    if ($studentUser->subjects->contains($project->id)) {
                        Solution::create([
                            'task_id' => $task->id,
                            'user_id' => $studentUser->id,
                            'content' => 'samplesamplesample',
                            'points' => null,  
                        ]);
                    }
                }
            }
        }
    }
}
