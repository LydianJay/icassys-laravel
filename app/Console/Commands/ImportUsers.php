<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-users {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error("File does not exist: {$filePath}");
            return Command::FAILURE;
        }

        $handle = fopen($filePath, 'r');
        $rowNum = 1;

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) !== 20) {
                $this->warn("Skipping row {$rowNum}: Invalid column count (" . count($row) . ")");
                $this->info(count($row));
                $rowNum++;
                continue;
            }

            try {
                $userId = DB::table('users')->insertGetId([
                    'email'             => $row[0],
                    'fname'             => $row[1],
                    'mname'             => $row[2],
                    'lname'             => $row[3],
                    'gender'            => strtolower($row[4]),
                    'dob'               => $row[5],
                    'contactno'         => $row[6] ?: null,
                    'address'           => $row[7] ?: null,
                    'is_active'         => (bool)$row[8],
                    'e_contact'         => $row[9] ?: null,
                    'e_contact_no'      => $row[10] ?: null,
                    'email_verified_at' => $this->parseDate($row[11]),
                    'photo'             => $row[12] ?: null,
                    'password'          => $row[13], // already hashed
                    'remember_token'    => $row[14] ?: Str::random(10),
                    'created_at'        => $this->parseDate($row[15]),
                    'updated_at'        => $this->parseDate($row[16]),
                ]);

                $deptId = (int) ($row[17] ?? null); // Department ID from CSV
                $marital = strtolower($row[18] ?? 'not specified');
                $joinDate = isset($row[19]) ? Carbon::parse($row[19])->toDateString() : now()->toDateString();

                DB::table('staff')->insert([
                    'user_id'   => $userId,
                    'dept_id'   => $deptId,
                    'marital'   => $marital,
                    'join_date' => $joinDate,
                ]);

                $this->info("Row {$rowNum} imported.");
            } catch (\Throwable $e) {
                $this->error("Error on row {$rowNum}: " . $e->getMessage());
            }

            $rowNum++;
        }

        fclose($handle);

        $this->info('User import complete.');
        return Command::SUCCESS;
    }

    private function parseDate(string $value): ?string
    {
        if (empty($value)) return null;
        try {
            return Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            return null;
        }
    }
}
