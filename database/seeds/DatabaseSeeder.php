<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ContasPagarTableSeeder::class);
    }
}

class ContasPagarTableSeeder extends Seeder{
	public function run()
    {
    	DB::insert('INSERT INTO contas_pagar (descricao, valor) VALUES (?, ?)', 
    		array('Pagamento Luz', '50.00'));

    	DB::insert('INSERT INTO contas_pagar (descricao, valor) VALUES (?, ?)', 
    		array('Pagamento Telefone', '200.00'));

    	DB::insert('INSERT INTO contas_pagar (descricao, valor) VALUES (?, ?)', 
    		array('Pagamento TV Assinatura', '250.00'));
    }
}
