<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
       public function index()
    {

        $employee = [
            'employee_name' => 'Ayu Nur Habibah',
            'birth_date'    => '2006-02-23',
            'position'      => 'Software Engineer',
            'skills'        => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'Problem Solving'],
            'join_date'     => '2022-01-10',
            'salary'        => 9000000,
            'career_goal'   => 'Menjadi pemilik 100 hektare kebun sawit',
        ];


        $employee['age'] = Carbon::parse($employee['birth_date'])->age;


        $joinDate = Carbon::parse($employee['join_date']);
        $employee['working_duration'] = $joinDate->diffInDays(Carbon::now());

        $employee['status'] = $employee['working_duration'] < 730
            ? 'Masih pegawai baru, tingkatkan pengalaman kerja!'
            : ' Sudah senior, jadilah teladan bagi rekan kerja!';


        return view('halaman-pegawai', compact('employee'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }

}
