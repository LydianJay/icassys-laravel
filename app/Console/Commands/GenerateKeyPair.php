<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class GenerateKeyPair extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-key-pair';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate RSA for system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $config = [
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        $res = openssl_pkey_new($config);
        if ($res === false) {
            $this->error("Key generation failed:");
            while ($msg = openssl_error_string()) {
                $this->error($msg);
            }
            return;
        }
        openssl_pkey_export($res, $privKey);
        $pubKeyDetails = openssl_pkey_get_details($res);
        $pubKey = $pubKeyDetails["key"];

        $keyDir = storage_path("app/keys");
        File::ensureDirectoryExists($keyDir);

        File::put("$keyDir/private.pem", $privKey);
        File::put("$keyDir/public.pem", $pubKey);

        $this->info("RSA key pair generated.");
        $this->info("Private key: $keyDir/private.pem");
        $this->info("Public key:  $keyDir/public.pem");
    }
}
