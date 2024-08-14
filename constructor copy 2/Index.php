<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Constructor</title>
<link rel ="stylesheet" href="style.css"/>  
    <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script> -->
</head>
<body>
    <?php
        class Student
        {
            public $id, $nama, $nilai_pbo, $nilai_web, $nilai_pkk, $kelas;
            public function __construct($dataStudents = [])
            {
                $this->id       = $dataStudents['id'] ?? null;
                $this->nama     = $dataStudents['nama'] ?? null;
                $this->nilai_pbo = $dataStudents['nilai_pbo'] ?? null;
                $this->nilai_web = $dataStudents['nilai_web'] ?? null;
                $this->nilai_pkk = $dataStudents['nilai_pkk'] ?? null;
                $this->kelas = $dataStudents['kelas'] ?? null;
            }
        }

        $dataStudents = [
            [
                'id'        => 1, 
                'nama'      => 'Rezak', 
                'nilai_pbo' => 69, 
                'nilai_web' => 80, 
                'nilai_pkk' => 85,
                'kelas'   => 'xl-rpl'
            ],
            [
                'id'        => 2, 
                'nama'      => 'Owen', 
                'nilai_pbo' => 69, 
                'nilai_web' => 69, 
                'nilai_pkk' => 96,
                'kelas'   => 'xl-rpl'
            ],
            [
                'id'        => 3, 
                'nama'      => 'William', 
                'nilai_pbo' => 86, 
                'nilai_web' => 50, 
                'nilai_pkk' => 69,
                'kelas'   => 'xl-rpl'
            ],
            [
                'id'        => 4, 
                'nama'      => 'Steven', 
                'nilai_pbo' => 0, 
                'nilai_web' => 35, 
                'nilai_pkk' => 0.69,
                'kelas'   => 'xl-rpl'
            ],
            [
                'id'        => 5, 
                'nama'      => 'Vivien', 
                'nilai_pbo' => 25, 
                'nilai_web' => 75, 
                'nilai_pkk' => 69,
                'kelas'   => 'xl-rpl'
            ],
            [
                'id'        => 6, 
                'nama'      => 'Julie', 
                'nilai_pbo' => 90, 
                'nilai_web' => 80, 
                'nilai_pkk' => 85,
                'kelas'   => '12-rpl'
            ],
            [
                'id'        => 7, 
                'nama'      => 'Vivien', 
                'nilai_pbo' => 35, 
                'nilai_web' => 79, 
                'nilai_pkk' => 100,
                'kelas'   => '12-rpl'
            ],
            [
                'id'        => 8, 
                'nama'      => 'Vivien', 
                'nilai_pbo' => 90, 
                'nilai_web' => 69, 
                'nilai_pkk' => 70,
                'kelas'   => '12-rpl'
            ],
            [
                'id'        => 9, 
                'nama'      => 'Vivien', 
                'nilai_pbo' => 100, 
                'nilai_web' => 100, 
                'nilai_pkk' => 90,
                'kelas'   => '12-rpl'
            ],
            [
                'id'        => 10, 
                'nama'      => 'Vivien', 
                'nilai_pbo' => 95, 
                'nilai_web' => 86, 
                'nilai_pkk' => 82,
                'kelas'   => '12-rpl'
            ],
        ];

        $listStudents = [];
        foreach ($dataStudents as $student) {
            $dataStudent = new Student($student);
            $listStudents[]= $dataStudent;
        }

    ?>
    <h1 class="judul"> Jumlah Data Siswa <?php echo count($listStudents)?>  </h1>
    
    <?php 
        // $dataSiswaKelasXIIRpl = [];
        

       /*  foreach ($listStudents as $student) {
            if ($student->kelas == '12-rpl') {
                $dataSiswaKelasXIIRpl[] = $student;
            }
        
            ?>        
         
            <p> ID: <?php echo $student->id; ?> </p>
            <p> Nama: <?php echo $student->nama; ?> </p>
            <p> Nilai PBO: <?php echo $student->nilai_pbo; ?> </p>
            <p> Nilai Web: <?php echo $student->nilai_web; ?> </p>
            <p> Nilai PKK: <?php echo $student->nilai_pkk; ?> </p>
            <p> kelas: <?php echo $student->kelas; ?> </p>
            <hr>
        <?php
            }
        ?> */

        
   /*  <h2>Jumlah siswa kelas 12 RPL 
        <?php  echo count($dataSiswaKelasXIIRpl)?> 
    </h2> */

    // <?php
    //         function getGrade($nilai) {
    //             if ($nilai >= 85) {
    //                 return 'A';
    //             } elseif ($nilai >= 75) {
    //                 return 'B';
    //             } elseif ($nilai >= 60) {
    //                 return 'C';
    //             } else {
    //                 return 'Remedial';
    //             }
    //         }
            

            // foreach ($dataSiswaKelasXIIRpl as $key => $siswa) {
            //     $rata_rata = round(($siswa->nilai_pbo + $siswa->nilai_pkk + $siswa->nilai_web) / 3);
            //     $grade = getGrade($rata_rata);
            //     echo "
            //         <p>Nama:  $siswa->nama </p>
            //         <ul> 
            //             <li> ID: $siswa->id </li>
            //             <li> Nama: $siswa->nama </li>
            //             <li> Nilai PBO: $siswa->nilai_pbo </li>
            //             <li> Nilai Web: $siswa->nilai_web </li>
            //             <li> Nilai PKK: $siswa->nilai_pkk </li>
            //             <li> Nilai Rata-Rata $rata_rata </li>
            //             <li> Grade: $grade </li>
            //             <hr/>
            //         </ul>
            //     ";    
            // }
        ?>
</body>
</html>