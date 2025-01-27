<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticDataController extends Controller
{
    public function staticDataDashboard()
    {
        // Static data
        $datas = [
            ['name' => 'John Doe', 'home' => 'Developer', 'office' => 'New York', 'age' => 28, 'salary' => '$100,000'],
            ['name' => 'Jane Smith', 'home' => 'Manager', 'office' => 'London', 'age' => 35, 'salary' => '$120,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designegggggggggggggggggggfffffr', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            
            // Add more rows as needed
        ];

        return view('admin.dashboard', compact('datas'));
    }

    public function staticDataBooks()
    {
        // Static data
        $datas = [
            ['name' => 'John Doe', 'home' => 'Developer', 'office' => 'New York', 'age' => 28, 'salary' => '$100,000'],
            ['name' => 'Jane Smith', 'home' => 'Manager', 'office' => 'London', 'age' => 35, 'salary' => '$120,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designegggggggggggggggggggfffffr', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            ['name' => 'Paul Adams', 'home' => 'Designer', 'office' => 'Paris', 'age' => 40, 'salary' => '$80,000'],
            
            // Add more rows as needed
        ];

        return view('admin.books', compact('datas'));
    }
}
