<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            [
                'titulo' => 'Creamos sabores que marcan la diferencia',
                'descripcion' => 'Somos expertos en brindar suplementos de alta calidad para heladerías, transformando ingredientes comunes en experiencias irresistibles. Nos dedicamos a elevar el sabor y la innovación en cada producto, con un firme compromiso hacia el cuidado del medio ambiente y las necesidades de tus clientes.',
                'imagen' => '',
                'status' => 1,
            ],
            [
                'titulo' => 'Los valores que nos impulsan a crear productos de calidad',
                'descripcion' => 'En cada paso, nos guiamos por valores sólidos: calidad excepcional, innovación constante, sostenibilidad y un compromiso profundo con nuestros clientes. Creemos en la creación de productos que no solo mejoren tus helados, sino que también respeten el medio ambiente y contribuyan al éxito de tu heladería.',
                'imagen' => 'images/imagen/cremosonosotros.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Nuestra misión, compromiso con la innovación y calidad',
                'descripcion' => '<p>Creamos suplementos que transforman tus helados, combinando calidad, innovaci&oacute;n y responsabilidad ambiental para impulsar el &eacute;xito de tu negocio.</p>

                <p>&nbsp;</p>
                
                <p><strong>Calidad Superior en Cada Producto</strong></p>
                
                <p>Nos aseguramos de que cada suplemento est&eacute; fabricado con los m&aacute;s altos est&aacute;ndares para garantizar sabores excepcionales y consistencia en cada lote.</p>
                
                <p>&nbsp;</p>
                
                <p><strong>Innovaci&oacute;n que Eleva tu Negocio</strong></p>
                
                <p>Estamos en constante b&uacute;squeda de nuevas soluciones que permitan a tu helader&iacute;a destacarse, ofreciendo productos que marcan la diferencia y sorprenden a tus clientes.</p>
                
                <p>&nbsp;</p>
                
                <p><strong>Sostenibilidad y Responsabilidad Ambiental</strong></p>
                
                <p>Nuestra misi&oacute;n incluye el cuidado del planeta, por lo que nuestros productos son desarrollados con pr&aacute;cticas responsables, minimizando el impacto ambiental y apoyando un futuro m&aacute;s verde.</p>',
                'imagen' => 'images/imagen/cremosonosotros2.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Insumos de Calidad para Heladerías Excepcionales',
                'descripcion' => 'Sed non iaculis felis, eget egestas risus. Nullam vitae hendrerit purus. Suspendisse at sodales lectus. Nunc facilisis lorem id lacinia luctus.',
                'imagen' => 'images/imagen/conoscremoso.png',
                'status' => 1,
            ],
          
        ]);
    }
}
