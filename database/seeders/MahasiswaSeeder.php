<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->dataMahasiswa();

        foreach ($data as $value) {
            Mahasiswa::updateOrCreate([
                'nim' => $value['nim'],
            ], [
                'nama' => $value['nama'],
                'ttl' => $value['ttl'],
                'gender' => $value['gender'],
                'alamat' => $value['alamat'],
            ]);
        }
    }

    private function dataMahasiswa()
    {
        $data = [
            [
                'nim' => 10106003,
                'nama' => 'Budi Arga',
                'ttl' => '1984-10-24',
                'gender' => 'L',
                'alamat' => 'Cicaheum - Bandung',
            ],
            [
                'nim' => 10106004,
                'nama' => 'Dini Andari',
                'ttl' => '1983-01-23',
                'gender' => 'P',
                'alamat' => 'Menteng - Jakarta',
            ],
            [
                'nim' => 10106005,
                'nama' => 'Dwi Ciska',
                'ttl' => '1985-12-29',
                'gender' => 'L',
                'alamat' => 'Merdeka - Malang',
            ],
            [
                'nim' => 10106006,
                'nama' => 'Edi Prastowo',
                'ttl' => '1984-07-07',
                'gender' => 'L',
                'alamat' => 'Dago - Bandung',
            ],
            [
                'nim' => 10106007,
                'nama' => 'Eka Sapta',
                'ttl' => '1984-02-24',
                'gender' => 'L',
                'alamat' => 'Setiabudi - Bandung',
            ],
            [
                'nim' => 10106008,
                'nama' => 'Fifin Aliana',
                'ttl' => '1984-10-21',
                'gender' => 'P',
                'alamat' => 'Mande - Mataram',
            ],
            [
                'nim' => 10106009,
                'nama' => 'Giri Rekso',
                'ttl' => '1983-11-17',
                'gender' => 'P',
                'alamat' => 'Perak - Surabaya',
            ],
            [
                'nim' => 10106010,
                'nama' => 'Heri Ahmad Surya',
                'ttl' => '1985-04-06',
                'gender' => 'L',
                'alamat' => 'Antapani - Bandung',
            ],
            [
                'nim' => 10106011,
                'nama' => 'Bunga',
                'ttl' => '1983-01-01',
                'gender' => 'P',
                'alamat' => 'Surapati - Bandung',
            ],
            [
                'nim' => 10106012,
                'nama' => 'Laksama',
                'ttl' => '1983-02-01',
                'gender' => 'L',
                'alamat' => 'Perjuangan - Bandung',
            ],
        ];

        return $data;
    }
}
