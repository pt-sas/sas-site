<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class About extends Seeder
{
	public function run()
	{
    $data = [
            'trx_compro_id ' 	=> '1',
            'isactive'    		=> 'Y',
            'created_at' 			=> '2021-01-01 00:00:00',
            'created_by'    	=> '1',
            'updated_at'    	=> '2021-01-01 00:00:00',
            'updated_by' 			=> '1',

						'tb_cp_overview' 			=> '<p>PT Sahabat Abadi Sejahtera didirikan pada Maret 1987, berkedudukan di Jakarta. Awal yang sederhana dimulai sebagai salah satu dari beberapa distributor resmi Philips Lighting di Indonesia.</p> <p>Namun, ia terus berspesialisasi dalam mendistribusikan Pencahayaan Philips secara eksklusif dengan rangkaian komponen yang komprehensif untuk berbagai model yang dikategorikan sebagai Pencahayaan Konsumen dan Pencahayaan Profesional.</p>',
            'tb_cp_vision'    		=> '<p>Menjadi perusahaan distribusi dengan fondasi yang kuat dan kinerja yang luar biasa, yang tumbuh bersama dengan mitra bisnis.</p>',
            'tb_cp_mision'    		=> '<p>Untuk memuaskan pelanggan dengan menyediakan produk berkualitas baik dengan layanan prima melalui kerja sama tim yang sinergis dan pemberdayaan karyawan.</p>',
            'tb_cp_objectives' 		=> '<p>Kami bertujuan untuk hasil kualitas tertinggi dan menghormati komitmen kami untuk memuaskan pelanggan, pemegang saham, dan karyawan.</p>',

						'tb_cp_overview_en' 	=> '<p>PT Sahabat Abadi Sejahtera was established on March 1987, based in Jakarta. Its humble beginning started as one of a few authorized Philips Lighting distributors in Indonesia.</p> <p>However, it continues to specialize in distributing exclusively Philips Lighting with a comprehensive range of component for various models categorized as Consumer Lighting and Professional Lighting.</p>',
            'tb_cp_vision_en'    	=> '<p>To be a distribution company with strong foundation and outstanding performance, that grows together with business partners.</p>',
            'tb_cp_mision_en'    	=> '<p>To delight customers by providing good quality products with excellent service through synergic teamwork and employee empowerment.</p>',
            'tb_cp_objectives_en' => '<p>We aim for the highest quality results and honoring our commitment to satisfy customers, shareholders, and employees.</p>'
    ];

    // Using Query Builder
    $this->db->table('trx_compro')->insert($data);
	}
}
