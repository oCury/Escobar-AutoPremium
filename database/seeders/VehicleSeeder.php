<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\VehicleModel;
use App\Models\Color;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $brandHonda = Brand::firstOrCreate(['name' => 'Honda']);
        $brandToyota = Brand::firstOrCreate(['name' => 'Toyota']);
        $brandHyundai = Brand::firstOrCreate(['name' => 'Hyundai']);

        $modelCivic = VehicleModel::firstOrCreate(['brand_id' => $brandHonda->id, 'name' => 'Civic']);
        $modelCorolla = VehicleModel::firstOrCreate(['brand_id' => $brandToyota->id, 'name' => 'Corolla']);
        $modelHb20 = VehicleModel::firstOrCreate(['brand_id' => $brandHyundai->id, 'name' => 'HB20']);

        $colorBlack = Color::firstOrCreate(['name' => 'Preto']);
        $colorWhite = Color::firstOrCreate(['name' => 'Branco']);
        $colorRed = Color::firstOrCreate(['name' => 'Vermelho']);

        // --- Veículo 1: Honda Civic com fotos reais ---
        Vehicle::updateOrCreate(
            ['model_id' => $modelCivic->id, 'year' => 2023],
            [
                'color_id' => $colorBlack->id,
                'price' => 145000.00,
                'mileage' => 5000,
                'main_photo_url' => 'https://s3.ecompletocarros.dev/images/lojas/285/veiculos/128986/veiculoInfoVeiculoImagesMobile/vehicle_image_1674015404_d41d8cd98f00b204e9800998ecf8427e.jpeg',
                'photo_url_2' => 'https://i.ytimg.com/vi/qBCWkCYXx8M/maxresdefault.jpg',
                'photo_url_3' => 'https://www.extrememultimarcaspg.com.br/assets/uploads/anuncios/thumb-7f7d9-WhatsApp-Image-2024-12-10-at-14.35.09.jpeg',
                'details' => 'O Honda Civic é um sedan consagrado por seu design, conforto e tecnologia. Esta versão vem equipada com motor 2.0, transmissão automática, central multimídia e um pacote completo de segurança.'
            ]
        );

        // --- Veículo 2: Toyota Corolla com fotos reais ---
        Vehicle::updateOrCreate(
            ['model_id' => $modelCorolla->id, 'year' => 2022],
            [
                'color_id' => $colorWhite->id,
                'price' => 138000.00,
                'mileage' => 12000,
                'main_photo_url' => 'https://www.autoo.com.br/fotos/2024/8/1280_960/toyota_corolla_2025_1_03082024_79723_1280_960.jpg',
                'photo_url_2' => 'https://i.ytimg.com/vi/zsB017WLPAI/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAfyXB86mgz7CHYIe3w_arbUJb24A',
                'photo_url_3' => 'https://cdn.motor1.com/images/mgl/9myQ3v/s1/4x3/toyota-corolla-gr-s-2024.webp',
                'details' => 'Líder de vendas, o Toyota Corolla é sinônimo de confiabilidade e baixo custo de manutenção. Ideal para a família, com amplo espaço interno e porta-malas generoso. Versão XEI completa.'
            ]
        );

        // --- Veículo 3: Hyundai HB20 com fotos reais ---
        Vehicle::updateOrCreate(
            ['model_id' => $modelHb20->id, 'year' => 2024],
            [
                'color_id' => $colorRed->id,
                'price' => 92000.00,
                'mileage' => 100,
                'main_photo_url' => 'https://s2-autoesporte.glbimg.com/3BN1SaoTVZoApV8egoyFHKzq80A=/0x0:620x400/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2020/L/Z/el00q7TdmmQtqwP7dxMA/2016-02-12-hyundai-hb20-r-spec-2.jpg',
                'photo_url_2' => 'https://www.mesquitaleiloes.com.br/imagens/1300x1300/f49f22ea-75bf-4a69-baee-0dfead174570.jpg',
                'photo_url_3' => 'https://carroscomcamanzi.com.br/wp-content/uploads/2023/02/hb20-colombi.jpg',
                'details' => 'O Hyundai HB20 se destaca pelo design arrojado e pela lista de equipamentos. Perfeito para o dia a dia na cidade, é ágil, econômico e vem com central multimídia BlueLink.'
            ]
        );
    }
}