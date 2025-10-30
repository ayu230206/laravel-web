<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id'); // primary key
            $table->string('address_line', 255); // alamat lengkap
            $table->string('city', 100); // kota
            $table->string('state', 100)->nullable(); // provinsi/negara bagian
            $table->string('postal_code', 20)->nullable(); // kode pos
            $table->string('country', 100); // negara
            $table->enum('membership_type', ['Regular', 'Premium', 'VIP'])->default('Regular'); // jenis keanggotaan
            $table->date('registration_date'); // tanggal mendaftar
            $table->date('last_purchase_date')->nullable(); // pembelian terakhir
            $table->decimal('total_spent', 12, 2)->default(0); // total pengeluaran pelanggan
            $table->enum('preferred_contact_method', ['Email', 'Telepon', 'SMS'])->default('Email'); // metode kontak
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
