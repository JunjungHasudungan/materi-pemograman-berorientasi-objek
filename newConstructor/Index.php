<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Constructor</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
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

        // konsep imperative
        // $listStudents = [];
        // foreach ($dataStudents as $student) {
        //     $dataStudent = new Student($student);
        //     $listStudents[]= $dataStudent;
        // }

        // deklarative
        $listStudents = array_map(function($data){
            return new Student($data);
        }, $dataStudents);

    ?>
        
        <div class="mt-2 p-6">
            <div class="border border-gray-800 mt-2 relative bg-gray-200 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NILAI PBO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NILAI WEB
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NILAI PKK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NILAI RATA-RATA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PREDIKAT
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         function getGrade($nilai) {
                            if ($nilai >= 85) {
                                return 'A';
                            } elseif ($nilai >= 75) {
                                return 'B';
                            } elseif ($nilai >= 60) {
                                return 'C';
                            } else {
                                return 'Remedial';
                            }
                        }
                            if (count($listStudents) > 0) {
                                foreach ($listStudents as $key => $siswa) {
                                    $rata_rata = round(($siswa->nilai_pbo + $siswa->nilai_pkk + $siswa->nilai_web) / 3);
                                    $grade = getGrade($rata_rata);
                                    $gradeClass = $grade === 'Remedial' ? 'text-red-500 font-semibold' : '';
                                    $siswa->kelas == '12-rpl' ? '' : '';
                                    ?>
                                    <tr class='border-b dark:bg-gray-100 dark:border-gray-700 hover:bg-gray-600'>
                                        <td class='px-6 py-4'> 
                                            <?php echo $key +1; ?> 
                                        </td>
                                        <td class='px-6 py-4'> 
                                            <?php echo $siswa->nama; ?> 
                                        </td>
                                        <td class='px-6 py-4'> 
                                            <?php
                                                echo $siswa->kelas == '12-rpl' ?
                                                '<span class="bg-green-500 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded text-green-400 border border-green-400">' .$siswa->kelas. '</span>' :
                                                '<span class="bg-pink-500 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded text-pink-400 border border-pink-400">' . $siswa->kelas . '</span>';
                                            ?> 
                                        </td>
                                        <td class='px-6 py-4'>
                                            <?php  echo $siswa->nilai_pbo; ?>
                                        </td>
                                        <td class='px-6 py-4'>
                                            <?php echo $siswa->nilai_web; ?>
                                        </td>
                                        <td class='px-6 py-4'>
                                            <?php echo $siswa->nilai_pkk; ?>
                                        </td>
                                        <td class='px-6 py-4'>
                                            <?php echo $rata_rata; ?>
                                        </td>
                                        <td class='px-6 py-4 <?php echo $gradeClass; ?>'>
                                            <?php echo $grade; ?>
                                        </td>
                                   </tr>
                                   <?php
                                }
                                ?>
                            <?php
                            } else {
                                echo '
                                <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Data Siswa belum ada!</span>
                                    </div>
                                    </div>
                                ';
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>