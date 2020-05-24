<?php


use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Lecture 10 */

      $cities =  array (
          1 =>
              array (
                  'city_name' => 'Bolesławiec',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2658553',
                  'lon' => '15.5657397',
                  'province_id' => 1,
              ),
          2 =>
              array (
                  'city_name' => 'Nowogrodziec',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.1973679',
                  'lon' => '15.3983422',
                  'province_id' => 1,
              ),
          3 =>
              array (
                  'city_name' => 'Bielawa',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.6907986',
                  'lon' => '16.6229286',
                  'province_id' => 1,
              ),
          4 =>
              array (
                  'city_name' => 'Dzierżoniów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7308605',
                  'lon' => '16.6567892',
                  'province_id' => 1,
              ),
          5 =>
              array (
                  'city_name' => 'Pieszyce',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7116152',
                  'lon' => '16.5820422',
                  'province_id' => 1,
              ),
          6 =>
              array (
                  'city_name' => 'Piława Górna',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.6828036',
                  'lon' => '16.7434759',
                  'province_id' => 1,
              ),
          7 =>
              array (
                  'city_name' => 'Niemcza',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7197493',
                  'lon' => '16.8357165',
                  'province_id' => 1,
              ),
          8 =>
              array (
                  'city_name' => 'Głogów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.66358520000001',
                  'lon' => '16.0846672',
                  'province_id' => 1,
              ),
          9 =>
              array (
                  'city_name' => 'Góra',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.669945',
                  'lon' => '16.5376529',
                  'province_id' => 1,
              ),
          10 =>
              array (
                  'city_name' => 'Wąsosz',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.56238519999999',
                  'lon' => '16.69165',
                  'province_id' => 1,
              ),
          11 =>
              array (
                  'city_name' => 'Jawor',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.0545282',
                  'lon' => '16.186323',
                  'province_id' => 1,
              ),
          12 =>
              array (
                  'city_name' => 'Bolków',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.92449999999999',
                  'lon' => '16.1037801',
                  'province_id' => 1,
              ),
          13 =>
              array (
                  'city_name' => 'Karpacz',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7758815',
                  'lon' => '15.7555976',
                  'province_id' => 1,
              ),
          14 =>
              array (
                  'city_name' => 'Kowary',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.79170999999999',
                  'lon' => '15.83665',
                  'province_id' => 1,
              ),
          15 =>
              array (
                  'city_name' => 'Piechowice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.84956',
                  'lon' => '15.59851',
                  'province_id' => 1,
              ),
          16 =>
              array (
                  'city_name' => 'Szklarska Poręba',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.8274316',
                  'lon' => '15.5261477',
                  'province_id' => 1,
              ),
          17 =>
              array (
                  'city_name' => 'Kamienna Góra',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7852076',
                  'lon' => '16.0237177',
                  'province_id' => 1,
              ),
          18 =>
              array (
                  'city_name' => 'Lubawka',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7033992',
                  'lon' => '15.9996227',
                  'province_id' => 1,
              ),
          19 =>
              array (
                  'city_name' => 'Duszniki-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.404284',
                  'lon' => '16.3904406',
                  'province_id' => 1,
              ),
          20 =>
              array (
                  'city_name' => 'Kłodzko',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.4345636',
                  'lon' => '16.6613941',
                  'province_id' => 1,
              ),
          21 =>
              array (
                  'city_name' => 'Kudowa-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.4427156',
                  'lon' => '16.2426605',
                  'province_id' => 1,
              ),
          22 =>
              array (
                  'city_name' => 'Nowa Ruda',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.57971389999999',
                  'lon' => '16.5037092',
                  'province_id' => 1,
              ),
          23 =>
              array (
                  'city_name' => 'Polanica-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.4119089',
                  'lon' => '16.5148115',
                  'province_id' => 1,
              ),
          24 =>
              array (
                  'city_name' => 'Bystrzyca Kłodzka',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.2990907',
                  'lon' => '16.6417941',
                  'province_id' => 1,
              ),
          25 =>
              array (
                  'city_name' => 'Lądek-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.3430802',
                  'lon' => '16.8795362',
                  'province_id' => 1,
              ),
          26 =>
              array (
                  'city_name' => 'Międzylesie',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.1477491',
                  'lon' => '16.6670843',
                  'province_id' => 1,
              ),
          27 =>
              array (
                  'city_name' => 'Radków',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.5046222',
                  'lon' => '16.3972701',
                  'province_id' => 1,
              ),
          28 =>
              array (
                  'city_name' => 'Stronie Śląskie',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.2954526',
                  'lon' => '16.8739539',
                  'province_id' => 1,
              ),
          29 =>
              array (
                  'city_name' => 'Szczytna',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.41339',
                  'lon' => '16.4474201',
                  'province_id' => 1,
              ),
          30 =>
              array (
                  'city_name' => 'Chojnów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2732',
                  'lon' => '15.93648',
                  'province_id' => 1,
              ),
          31 =>
              array (
                  'city_name' => 'Prochowice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.27303999999999',
                  'lon' => '16.3653',
                  'province_id' => 1,
              ),
          32 =>
              array (
                  'city_name' => 'Lubań',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.11791419999999',
                  'lon' => '15.2893895',
                  'province_id' => 1,
              ),
          33 =>
              array (
                  'city_name' => 'Świeradów-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9087219',
                  'lon' => '15.3431045',
                  'province_id' => 1,
              ),
          34 =>
              array (
                  'city_name' => 'Leśna',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.02419279999999',
                  'lon' => '15.2640453',
                  'province_id' => 1,
              ),
          35 =>
              array (
                  'city_name' => 'Olszyna',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.06681',
                  'lon' => '15.37221',
                  'province_id' => 1,
              ),
          36 =>
              array (
                  'city_name' => 'Lubin',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.39772199999999',
                  'lon' => '16.2095788',
                  'province_id' => 1,
              ),
          37 =>
              array (
                  'city_name' => 'Ścinawa',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.41590000000001',
                  'lon' => '16.4275399',
                  'province_id' => 1,
              ),
          38 =>
              array (
                  'city_name' => 'Gryfów Śląski',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.0350353',
                  'lon' => '15.4122128',
                  'province_id' => 1,
              ),
          39 =>
              array (
                  'city_name' => 'Lubomierz',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.01264639999999',
                  'lon' => '15.510661',
                  'province_id' => 1,
              ),
          40 =>
              array (
                  'city_name' => 'Lwówek Śląski',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.1095792',
                  'lon' => '15.5905136',
                  'province_id' => 1,
              ),
          41 =>
              array (
                  'city_name' => 'Mirsk',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9704636',
                  'lon' => '15.3858774',
                  'province_id' => 1,
              ),
          42 =>
              array (
                  'city_name' => 'Wleń',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.0176058',
                  'lon' => '15.677587',
                  'province_id' => 1,
              ),
          43 =>
              array (
                  'city_name' => 'Milicz',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.5275957',
                  'lon' => '17.2712122',
                  'province_id' => 1,
              ),
          44 =>
              array (
                  'city_name' => 'Oleśnica',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2134346',
                  'lon' => '17.3898504',
                  'province_id' => 1,
              ),
          45 =>
              array (
                  'city_name' => 'Bierutów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.12444',
                  'lon' => '17.54603',
                  'province_id' => 1,
              ),
          46 =>
              array (
                  'city_name' => 'Międzybórz',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.3962482',
                  'lon' => '17.6660338',
                  'province_id' => 1,
              ),
          47 =>
              array (
                  'city_name' => 'Syców',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.30787',
                  'lon' => '17.72016',
                  'province_id' => 1,
              ),
          48 =>
              array (
                  'city_name' => 'Twardogóra',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.36499',
                  'lon' => '17.46841',
                  'province_id' => 1,
              ),
          49 =>
              array (
                  'city_name' => 'Oława',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9459276',
                  'lon' => '17.2924017',
                  'province_id' => 1,
              ),
          50 =>
              array (
                  'city_name' => 'Jelcz-Laskowice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.0212945',
                  'lon' => '17.3164789',
                  'province_id' => 1,
              ),
          51 =>
              array (
                  'city_name' => 'Chocianów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.41724',
                  'lon' => '15.90438',
                  'province_id' => 1,
              ),
          52 =>
              array (
                  'city_name' => 'Polkowice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.5024848',
                  'lon' => '16.0620494',
                  'province_id' => 1,
              ),
          53 =>
              array (
                  'city_name' => 'Przemków',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.52711979999999',
                  'lon' => '15.7868955',
                  'province_id' => 1,
              ),
          54 =>
              array (
                  'city_name' => 'Strzelin',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.78121669999999',
                  'lon' => '17.0646124',
                  'province_id' => 1,
              ),
          55 =>
              array (
                  'city_name' => 'Wiązów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.813798',
                  'lon' => '17.2023429',
                  'province_id' => 1,
              ),
          56 =>
              array (
                  'city_name' => 'Środa Śląska',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.1641896',
                  'lon' => '16.5925834',
                  'province_id' => 1,
              ),
          57 =>
              array (
                  'city_name' => 'Świdnica',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.8498434',
                  'lon' => '16.475679',
                  'province_id' => 1,
              ),
          58 =>
              array (
                  'city_name' => 'Świebodzice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.8575475',
                  'lon' => '16.3213376',
                  'province_id' => 1,
              ),
          59 =>
              array (
                  'city_name' => 'Jaworzyna Śląska',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9129256',
                  'lon' => '16.432166',
                  'province_id' => 1,
              ),
          60 =>
              array (
                  'city_name' => 'Strzegom',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9604662',
                  'lon' => '16.3510375',
                  'province_id' => 1,
              ),
          61 =>
              array (
                  'city_name' => 'Żarów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.94076',
                  'lon' => '16.49474',
                  'province_id' => 1,
              ),
          62 =>
              array (
                  'city_name' => 'Oborniki Śląskie',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.30098659999999',
                  'lon' => '16.9148091',
                  'province_id' => 1,
              ),
          63 =>
              array (
                  'city_name' => 'Prusice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.37042959999999',
                  'lon' => '16.9606267',
                  'province_id' => 1,
              ),
          64 =>
              array (
                  'city_name' => 'Trzebnica',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.3104211',
                  'lon' => '17.0632716',
                  'province_id' => 1,
              ),
          65 =>
              array (
                  'city_name' => 'Żmigród',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.46653999999999',
                  'lon' => '16.9058199',
                  'province_id' => 1,
              ),
          66 =>
              array (
                  'city_name' => 'Boguszów-Gorce',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7559487',
                  'lon' => '16.2042957',
                  'province_id' => 1,
              ),
          67 =>
              array (
                  'city_name' => 'Jedlina-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.71966',
                  'lon' => '16.345569',
                  'province_id' => 1,
              ),
          68 =>
              array (
                  'city_name' => 'Szczawno-Zdrój',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.810462',
                  'lon' => '16.2478969',
                  'province_id' => 1,
              ),
          69 =>
              array (
                  'city_name' => 'Głuszyca',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.68728',
                  'lon' => '16.3710701',
                  'province_id' => 1,
              ),
          70 =>
              array (
                  'city_name' => 'Mieroszów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.6659',
                  'lon' => '16.18882',
                  'province_id' => 1,
              ),
          71 =>
              array (
                  'city_name' => 'Brzeg Dolny',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2728265',
                  'lon' => '16.708557',
                  'province_id' => 1,
              ),
          72 =>
              array (
                  'city_name' => 'Wołów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.33642769999999',
                  'lon' => '16.6441164',
                  'province_id' => 1,
              ),
          73 =>
              array (
                  'city_name' => 'Kąty Wrocławskie',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.0285798',
                  'lon' => '16.7617998',
                  'province_id' => 1,
              ),
          74 =>
              array (
                  'city_name' => 'Sobótka',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.89984',
                  'lon' => '16.7445201',
                  'province_id' => 1,
              ),
          75 =>
              array (
                  'city_name' => 'Siechnice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.03364999999999',
                  'lon' => '17.14733',
                  'province_id' => 1,
              ),
          76 =>
              array (
                  'city_name' => 'Bardo',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.50505',
                  'lon' => '16.74043',
                  'province_id' => 1,
              ),
          77 =>
              array (
                  'city_name' => 'Ząbkowice Śląskie',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.5893617',
                  'lon' => '16.8132419',
                  'province_id' => 1,
              ),
          78 =>
              array (
                  'city_name' => 'Ziębice',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.59829999999999',
                  'lon' => '17.03888',
                  'province_id' => 1,
              ),
          79 =>
              array (
                  'city_name' => 'Złoty Stok',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.44459',
                  'lon' => '16.87578',
                  'province_id' => 1,
              ),
          80 =>
              array (
                  'city_name' => 'Zawidów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.02545',
                  'lon' => '15.06215',
                  'province_id' => 1,
              ),
          81 =>
              array (
                  'city_name' => 'Zgorzelec',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.1496361',
                  'lon' => '15.0065645',
                  'province_id' => 1,
              ),
          82 =>
              array (
                  'city_name' => 'Bogatynia',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9072496',
                  'lon' => '14.9561498',
                  'province_id' => 1,
              ),
          83 =>
              array (
                  'city_name' => 'Pieńsk',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2475',
                  'lon' => '15.04176',
                  'province_id' => 1,
              ),
          84 =>
              array (
                  'city_name' => 'Węgliniec',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2879708',
                  'lon' => '15.2299326',
                  'province_id' => 1,
              ),
          85 =>
              array (
                  'city_name' => 'Wojcieszów',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.95167',
                  'lon' => '15.92209',
                  'province_id' => 1,
              ),
          86 =>
              array (
                  'city_name' => 'Złotoryja',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.12593159999999',
                  'lon' => '15.9213852',
                  'province_id' => 1,
              ),
          87 =>
              array (
                  'city_name' => 'Świerzawa',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.01404729999999',
                  'lon' => '15.894809',
                  'province_id' => 1,
              ),
          88 =>
              array (
                  'city_name' => 'Jelenia Góra',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.9044171',
                  'lon' => '15.7193616',
                  'province_id' => 1,
              ),
          89 =>
              array (
                  'city_name' => 'Legnica',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.2070067',
                  'lon' => '16.1553231',
                  'province_id' => 1,
              ),
          90 =>
              array (
                  'city_name' => 'Wrocław',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '51.1078852',
                  'lon' => '17.0385376',
                  'province_id' => 1,
              ),
          91 =>
              array (
                  'city_name' => 'Wałbrzych',
                  'province_name' => 'DOLNOŚLĄSKIE',
                  'lat' => '50.7840092',
                  'lon' => '16.2843553',
                  'province_id' => 1,
              ),
          92 =>
              array (
                  'city_name' => 'Aleksandrów Kujawski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.8765762',
                  'lon' => '18.6934504',
                  'province_id' => 2,
              ),
          93 =>
              array (
                  'city_name' => 'Ciechocinek',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.8790493',
                  'lon' => '18.7948147',
                  'province_id' => 2,
              ),
          94 =>
              array (
                  'city_name' => 'Nieszawa',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.8344014',
                  'lon' => '18.8950771',
                  'province_id' => 2,
              ),
          95 =>
              array (
                  'city_name' => 'Brodnica',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.2599703',
                  'lon' => '19.3956618',
                  'province_id' => 2,
              ),
          96 =>
              array (
                  'city_name' => 'Górzno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.1980031',
                  'lon' => '19.6444061',
                  'province_id' => 2,
              ),
          97 =>
              array (
                  'city_name' => 'Jabłonowo Pomorskie',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.39009',
                  'lon' => '19.1548',
                  'province_id' => 2,
              ),
          98 =>
              array (
                  'city_name' => 'Koronowo',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.3155945',
                  'lon' => '17.924967',
                  'province_id' => 2,
              ),
          99 =>
              array (
                  'city_name' => 'Solec Kujawski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.08325310000001',
                  'lon' => '18.2258317',
                  'province_id' => 2,
              ),
          100 =>
              array (
                  'city_name' => 'Chełmno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.34842',
                  'lon' => '18.4249899',
                  'province_id' => 2,
              ),
          101 =>
              array (
                  'city_name' => 'Golub-Dobrzyń',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.110535',
                  'lon' => '19.0539107',
                  'province_id' => 2,
              ),
          102 =>
              array (
                  'city_name' => 'Kowalewo Pomorskie',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.15467',
                  'lon' => '18.89802',
                  'province_id' => 2,
              ),
          103 =>
              array (
                  'city_name' => 'Łasin',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.5193613',
                  'lon' => '19.0870908',
                  'province_id' => 2,
              ),
          104 =>
              array (
                  'city_name' => 'Radzyń Chełmiński',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.385034',
                  'lon' => '18.9371303',
                  'province_id' => 2,
              ),
          105 =>
              array (
                  'city_name' => 'Inowrocław',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.7993317',
                  'lon' => '18.2562032',
                  'province_id' => 2,
              ),
          106 =>
              array (
                  'city_name' => 'Gniewkowo',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.89463',
                  'lon' => '18.40746',
                  'province_id' => 2,
              ),
          107 =>
              array (
                  'city_name' => 'Janikowo',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.75378',
                  'lon' => '18.11328',
                  'province_id' => 2,
              ),
          108 =>
              array (
                  'city_name' => 'Kruszwica',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.67429',
                  'lon' => '18.33159',
                  'province_id' => 2,
              ),
          109 =>
              array (
                  'city_name' => 'Pakość',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.80141',
                  'lon' => '18.08517',
                  'province_id' => 2,
              ),
          110 =>
              array (
                  'city_name' => 'Lipno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.844147',
                  'lon' => '19.1784128',
                  'province_id' => 2,
              ),
          111 =>
              array (
                  'city_name' => 'Dobrzyń nad Wisłą',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.6375464',
                  'lon' => '19.3182434',
                  'province_id' => 2,
              ),
          112 =>
              array (
                  'city_name' => 'Skępe',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.8677421',
                  'lon' => '19.356164',
                  'province_id' => 2,
              ),
          113 =>
              array (
                  'city_name' => 'Mogilno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.6577648',
                  'lon' => '17.9556926',
                  'province_id' => 2,
              ),
          114 =>
              array (
                  'city_name' => 'Strzelno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.62772',
                  'lon' => '18.1726601',
                  'province_id' => 2,
              ),
          115 =>
              array (
                  'city_name' => 'Kcynia',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.99166',
                  'lon' => '17.4884299',
                  'province_id' => 2,
              ),
          116 =>
              array (
                  'city_name' => 'Mrocza',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.24285',
                  'lon' => '17.60415',
                  'province_id' => 2,
              ),
          117 =>
              array (
                  'city_name' => 'Nakło nad Notecią',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.1417565',
                  'lon' => '17.6018342',
                  'province_id' => 2,
              ),
          118 =>
              array (
                  'city_name' => 'Szubin',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.00942',
                  'lon' => '17.73989',
                  'province_id' => 2,
              ),
          119 =>
              array (
                  'city_name' => 'Radziejów',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.62669',
                  'lon' => '18.5257',
                  'province_id' => 2,
              ),
          120 =>
              array (
                  'city_name' => 'Piotrków Kujawski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.55106',
                  'lon' => '18.49897',
                  'province_id' => 2,
              ),
          121 =>
              array (
                  'city_name' => 'Rypin',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.0657106',
                  'lon' => '19.4094096',
                  'province_id' => 2,
              ),
          122 =>
              array (
                  'city_name' => 'Kamień Krajeński',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.5333481',
                  'lon' => '17.5213872',
                  'province_id' => 2,
              ),
          123 =>
              array (
                  'city_name' => 'Sępólno Krajeńskie',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.4513',
                  'lon' => '17.5316201',
                  'province_id' => 2,
              ),
          124 =>
              array (
                  'city_name' => 'Więcbork',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.3536745',
                  'lon' => '17.490565',
                  'province_id' => 2,
              ),
          125 =>
              array (
                  'city_name' => 'Nowe',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.64903',
                  'lon' => '18.7271078',
                  'province_id' => 2,
              ),
          126 =>
              array (
                  'city_name' => 'Świecie',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.4093843',
                  'lon' => '18.4473863',
                  'province_id' => 2,
              ),
          127 =>
              array (
                  'city_name' => 'Chełmża',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.1844724',
                  'lon' => '18.6045572',
                  'province_id' => 2,
              ),
          128 =>
              array (
                  'city_name' => 'Tuchola',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.58761999999999',
                  'lon' => '17.85955',
                  'province_id' => 2,
              ),
          129 =>
              array (
                  'city_name' => 'Wąbrzeźno',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.2799634',
                  'lon' => '18.9478368',
                  'province_id' => 2,
              ),
          130 =>
              array (
                  'city_name' => 'Kowal',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.53015',
                  'lon' => '19.14773',
                  'province_id' => 2,
              ),
          131 =>
              array (
                  'city_name' => 'Brześć Kujawski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.60628',
                  'lon' => '18.9012899',
                  'province_id' => 2,
              ),
          132 =>
              array (
                  'city_name' => 'Chodecz',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.4048502',
                  'lon' => '19.0274989',
                  'province_id' => 2,
              ),
          133 =>
              array (
                  'city_name' => 'Izbica Kujawska',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.4206613',
                  'lon' => '18.7626608',
                  'province_id' => 2,
              ),
          134 =>
              array (
                  'city_name' => 'Lubień Kujawski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.4062515',
                  'lon' => '19.1651495',
                  'province_id' => 2,
              ),
          135 =>
              array (
                  'city_name' => 'Lubraniec',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.5413225',
                  'lon' => '18.8315208',
                  'province_id' => 2,
              ),
          136 =>
              array (
                  'city_name' => 'Barcin',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.8661061',
                  'lon' => '17.9462614',
                  'province_id' => 2,
              ),
          137 =>
              array (
                  'city_name' => 'Janowiec Wielkopolski',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.75633999999999',
                  'lon' => '17.4897099',
                  'province_id' => 2,
              ),
          138 =>
              array (
                  'city_name' => 'Łabiszyn',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.95211',
                  'lon' => '17.91972',
                  'province_id' => 2,
              ),
          139 =>
              array (
                  'city_name' => 'Żnin',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.84938469999999',
                  'lon' => '17.719477',
                  'province_id' => 2,
              ),
          140 =>
              array (
                  'city_name' => 'Bydgoszcz',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.12348040000001',
                  'lon' => '18.0084378',
                  'province_id' => 2,
              ),
          141 =>
              array (
                  'city_name' => 'Grudziądz',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.4837486',
                  'lon' => '18.7535649',
                  'province_id' => 2,
              ),
          142 =>
              array (
                  'city_name' => 'Toruń',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '53.0137902',
                  'lon' => '18.5984437',
                  'province_id' => 2,
              ),
          143 =>
              array (
                  'city_name' => 'Włocławek',
                  'province_name' => 'KUJAWSKO-POMORSKIE',
                  'lat' => '52.6483303',
                  'lon' => '19.0677357',
                  'province_id' => 2,
              ),
          144 =>
              array (
                  'city_name' => 'Międzyrzec Podlaski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.9853496',
                  'lon' => '22.7848432',
                  'province_id' => 3,
              ),
          145 =>
              array (
                  'city_name' => 'Terespol',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '52.07322569999999',
                  'lon' => '23.6080719',
                  'province_id' => 3,
              ),
          146 =>
              array (
                  'city_name' => 'Biłgoraj',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.54099',
                  'lon' => '22.7219799',
                  'province_id' => 3,
              ),
          147 =>
              array (
                  'city_name' => 'Frampol',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.6715465',
                  'lon' => '22.6706518',
                  'province_id' => 3,
              ),
          148 =>
              array (
                  'city_name' => 'Józefów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.4810796',
                  'lon' => '23.0540598',
                  'province_id' => 3,
              ),
          149 =>
              array (
                  'city_name' => 'Tarnogród',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.3610555',
                  'lon' => '22.7406396',
                  'province_id' => 3,
              ),
          150 =>
              array (
                  'city_name' => 'Rejowiec Fabryczny',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.11424',
                  'lon' => '23.24615',
                  'province_id' => 3,
              ),
          151 =>
              array (
                  'city_name' => 'Siedliszcze',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.19453799999999',
                  'lon' => '23.163993',
                  'province_id' => 3,
              ),
          152 =>
              array (
                  'city_name' => 'Hrubieszów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.80518',
                  'lon' => '23.8909099',
                  'province_id' => 3,
              ),
          153 =>
              array (
                  'city_name' => 'Janów Lubelski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.70668999999999',
                  'lon' => '22.41078',
                  'province_id' => 3,
              ),
          154 =>
              array (
                  'city_name' => 'Modliborzyce',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.75416380000001',
                  'lon' => '22.3294471',
                  'province_id' => 3,
              ),
          155 =>
              array (
                  'city_name' => 'Krasnystaw',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.98411',
                  'lon' => '23.17194',
                  'province_id' => 3,
              ),
          156 =>
              array (
                  'city_name' => 'Kraśnik',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.92328310000001',
                  'lon' => '22.2269571',
                  'province_id' => 3,
              ),
          157 =>
              array (
                  'city_name' => 'Annopol',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.88537969999999',
                  'lon' => '21.8569158',
                  'province_id' => 3,
              ),
          158 =>
              array (
                  'city_name' => 'Urzędów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.9930804',
                  'lon' => '22.1422527',
                  'province_id' => 3,
              ),
          159 =>
              array (
                  'city_name' => 'Lubartów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.4598694',
                  'lon' => '22.6094606',
                  'province_id' => 3,
              ),
          160 =>
              array (
                  'city_name' => 'Kock',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.64122',
                  'lon' => '22.44796',
                  'province_id' => 3,
              ),
          161 =>
              array (
                  'city_name' => 'Ostrów Lubelski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.49387669999999',
                  'lon' => '22.8528812',
                  'province_id' => 3,
              ),
          162 =>
              array (
                  'city_name' => 'Bełżyce',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.17404',
                  'lon' => '22.28024',
                  'province_id' => 3,
              ),
          163 =>
              array (
                  'city_name' => 'Bychawa',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.01348470000001',
                  'lon' => '22.5301158',
                  'province_id' => 3,
              ),
          164 =>
              array (
                  'city_name' => 'Łęczna',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.3009',
                  'lon' => '22.88211',
                  'province_id' => 3,
              ),
          165 =>
              array (
                  'city_name' => 'Łuków',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.927158',
                  'lon' => '22.3830242',
                  'province_id' => 3,
              ),
          166 =>
              array (
                  'city_name' => 'Stoczek Łukowski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.961354',
                  'lon' => '21.97131',
                  'province_id' => 3,
              ),
          167 =>
              array (
                  'city_name' => 'Opole Lubelskie',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.14738',
                  'lon' => '21.96914',
                  'province_id' => 3,
              ),
          168 =>
              array (
                  'city_name' => 'Poniatowa',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.192893',
                  'lon' => '22.0650878',
                  'province_id' => 3,
              ),
          169 =>
              array (
                  'city_name' => 'Parczew',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.64027',
                  'lon' => '22.9003199',
                  'province_id' => 3,
              ),
          170 =>
              array (
                  'city_name' => 'Puławy',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.4164431',
                  'lon' => '21.969309',
                  'province_id' => 3,
              ),
          171 =>
              array (
                  'city_name' => 'Kazimierz Dolny',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.3180409',
                  'lon' => '21.9542482',
                  'province_id' => 3,
              ),
          172 =>
              array (
                  'city_name' => 'Nałęczów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.28567',
                  'lon' => '22.215293',
                  'province_id' => 3,
              ),
          173 =>
              array (
                  'city_name' => 'Radzyń Podlaski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.78320249999999',
                  'lon' => '22.6218532',
                  'province_id' => 3,
              ),
          174 =>
              array (
                  'city_name' => 'Dęblin',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.56269',
                  'lon' => '21.86528',
                  'province_id' => 3,
              ),
          175 =>
              array (
                  'city_name' => 'Ryki',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.6256317',
                  'lon' => '21.9326303',
                  'province_id' => 3,
              ),
          176 =>
              array (
                  'city_name' => 'Świdnik',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.2168207',
                  'lon' => '22.6914271',
                  'province_id' => 3,
              ),
          177 =>
              array (
                  'city_name' => 'Piaski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.13880529999999',
                  'lon' => '22.8485363',
                  'province_id' => 3,
              ),
          178 =>
              array (
                  'city_name' => 'Tomaszów Lubelski',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.447024',
                  'lon' => '23.4163099',
                  'province_id' => 3,
              ),
          179 =>
              array (
                  'city_name' => 'Lubycza Królewska',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.3410875',
                  'lon' => '23.5185723',
                  'province_id' => 3,
              ),
          180 =>
              array (
                  'city_name' => 'Łaszczów',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.5332417',
                  'lon' => '23.7255557',
                  'province_id' => 3,
              ),
          181 =>
              array (
                  'city_name' => 'Tyszowce',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.61707209999999',
                  'lon' => '23.6993741',
                  'province_id' => 3,
              ),
          182 =>
              array (
                  'city_name' => 'Włodawa',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.55178',
                  'lon' => '23.55434',
                  'province_id' => 3,
              ),
          183 =>
              array (
                  'city_name' => 'Krasnobród',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.5453129',
                  'lon' => '23.213387',
                  'province_id' => 3,
              ),
          184 =>
              array (
                  'city_name' => 'Szczebrzeszyn',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.6951326',
                  'lon' => '22.980033',
                  'province_id' => 3,
              ),
          185 =>
              array (
                  'city_name' => 'Zwierzyniec',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.61404',
                  'lon' => '22.97512',
                  'province_id' => 3,
              ),
          186 =>
              array (
                  'city_name' => 'Biała Podlaska',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '52.0387126',
                  'lon' => '23.1445026',
                  'province_id' => 3,
              ),
          187 =>
              array (
                  'city_name' => 'Chełm',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.1431232',
                  'lon' => '23.4711986',
                  'province_id' => 3,
              ),
          188 =>
              array (
                  'city_name' => 'Lublin',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '51.2464536',
                  'lon' => '22.5684463',
                  'province_id' => 3,
              ),
          189 =>
              array (
                  'city_name' => 'Zamość',
                  'province_name' => 'LUBELSKIE',
                  'lat' => '50.7230879',
                  'lon' => '23.2519685',
                  'province_id' => 3,
              ),
          190 =>
              array (
                  'city_name' => 'Kostrzyn nad Odrą',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.58718890000001',
                  'lon' => '14.6494466',
                  'province_id' => 4,
              ),
          191 =>
              array (
                  'city_name' => 'Witnica',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.67306290000001',
                  'lon' => '14.8976504',
                  'province_id' => 4,
              ),
          192 =>
              array (
                  'city_name' => 'Gubin',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.9489824',
                  'lon' => '14.7284576',
                  'province_id' => 4,
              ),
          193 =>
              array (
                  'city_name' => 'Krosno Odrzańskie',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.0550373',
                  'lon' => '15.0972099',
                  'province_id' => 4,
              ),
          194 =>
              array (
                  'city_name' => 'Międzyrzecz',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.4444808',
                  'lon' => '15.5779005',
                  'province_id' => 4,
              ),
          195 =>
              array (
                  'city_name' => 'Skwierzyna',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.5991741',
                  'lon' => '15.5060653',
                  'province_id' => 4,
              ),
          196 =>
              array (
                  'city_name' => 'Trzciel',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.363107',
                  'lon' => '15.876146',
                  'province_id' => 4,
              ),
          197 =>
              array (
                  'city_name' => 'Nowa Sól',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.80344',
                  'lon' => '15.71707',
                  'province_id' => 4,
              ),
          198 =>
              array (
                  'city_name' => 'Bytom Odrzański',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.7311819',
                  'lon' => '15.8222235',
                  'province_id' => 4,
              ),
          199 =>
              array (
                  'city_name' => 'Kożuchów',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.7454',
                  'lon' => '15.5984299',
                  'province_id' => 4,
              ),
          200 =>
              array (
                  'city_name' => 'Nowe Miasteczko',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.6904822',
                  'lon' => '15.7319389',
                  'province_id' => 4,
              ),
          201 =>
              array (
                  'city_name' => 'Cybinka',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.19456419999999',
                  'lon' => '14.7957248',
                  'province_id' => 4,
              ),
          202 =>
              array (
                  'city_name' => 'Ośno Lubuskie',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.4530993',
                  'lon' => '14.8755999',
                  'province_id' => 4,
              ),
          203 =>
              array (
                  'city_name' => 'Rzepin',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.3464071',
                  'lon' => '14.832309',
                  'province_id' => 4,
              ),
          204 =>
              array (
                  'city_name' => 'Słubice',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.351065',
                  'lon' => '14.5604649',
                  'province_id' => 4,
              ),
          205 =>
              array (
                  'city_name' => 'Dobiegniew',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.9701812',
                  'lon' => '15.7534441',
                  'province_id' => 4,
              ),
          206 =>
              array (
                  'city_name' => 'Drezdenko',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.83797',
                  'lon' => '15.83104',
                  'province_id' => 4,
              ),
          207 =>
              array (
                  'city_name' => 'Strzelce Krajeńskie',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.87728',
                  'lon' => '15.52966',
                  'province_id' => 4,
              ),
          208 =>
              array (
                  'city_name' => 'Lubniewice',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.5158607',
                  'lon' => '15.250038',
                  'province_id' => 4,
              ),
          209 =>
              array (
                  'city_name' => 'Sulęcin',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.44387',
                  'lon' => '15.11697',
                  'province_id' => 4,
              ),
          210 =>
              array (
                  'city_name' => 'Torzym',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.3123803',
                  'lon' => '15.082202',
                  'province_id' => 4,
              ),
          211 =>
              array (
                  'city_name' => 'Świebodzin',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.2472962',
                  'lon' => '15.5335722',
                  'province_id' => 4,
              ),
          212 =>
              array (
                  'city_name' => 'Zbąszynek',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.24253',
                  'lon' => '15.81632',
                  'province_id' => 4,
              ),
          213 =>
              array (
                  'city_name' => 'Babimost',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.16469',
                  'lon' => '15.8274998',
                  'province_id' => 4,
              ),
          214 =>
              array (
                  'city_name' => 'Czerwieńsk',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.0130334',
                  'lon' => '15.4233905',
                  'province_id' => 4,
              ),
          215 =>
              array (
                  'city_name' => 'Kargowa',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.0720997',
                  'lon' => '15.8653468',
                  'province_id' => 4,
              ),
          216 =>
              array (
                  'city_name' => 'Nowogród Bobrzański',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.7985281',
                  'lon' => '15.235124',
                  'province_id' => 4,
              ),
          217 =>
              array (
                  'city_name' => 'Sulechów',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.0831645',
                  'lon' => '15.6253179',
                  'province_id' => 4,
              ),
          218 =>
              array (
                  'city_name' => 'Gozdnica',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.43606',
                  'lon' => '15.09816',
                  'province_id' => 4,
              ),
          219 =>
              array (
                  'city_name' => 'Żagań',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.6178445',
                  'lon' => '15.3248325',
                  'province_id' => 4,
              ),
          220 =>
              array (
                  'city_name' => 'Iłowa',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.5000229',
                  'lon' => '15.1996268',
                  'province_id' => 4,
              ),
          221 =>
              array (
                  'city_name' => 'Małomice',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.5557695',
                  'lon' => '15.4496824',
                  'province_id' => 4,
              ),
          222 =>
              array (
                  'city_name' => 'Szprotawa',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.56695999999999',
                  'lon' => '15.53798',
                  'province_id' => 4,
              ),
          223 =>
              array (
                  'city_name' => 'Łęknica',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.54139079999999',
                  'lon' => '14.7358341',
                  'province_id' => 4,
              ),
          224 =>
              array (
                  'city_name' => 'Żary',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.6420121',
                  'lon' => '15.1369992',
                  'province_id' => 4,
              ),
          225 =>
              array (
                  'city_name' => 'Jasień',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.7515023',
                  'lon' => '15.0136526',
                  'province_id' => 4,
              ),
          226 =>
              array (
                  'city_name' => 'Lubsko',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.78437100000001',
                  'lon' => '14.9719305',
                  'province_id' => 4,
              ),
          227 =>
              array (
                  'city_name' => 'Sława',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.8759458',
                  'lon' => '16.0718133',
                  'province_id' => 4,
              ),
          228 =>
              array (
                  'city_name' => 'Szlichtyngowa',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.7119647',
                  'lon' => '16.2425128',
                  'province_id' => 4,
              ),
          229 =>
              array (
                  'city_name' => 'Wschowa',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.8071084',
                  'lon' => '16.3164767',
                  'province_id' => 4,
              ),
          230 =>
              array (
                  'city_name' => 'Gorzów Wielkopolski',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '52.7325285',
                  'lon' => '15.2369305',
                  'province_id' => 4,
              ),
          231 =>
              array (
                  'city_name' => 'Zielona Góra',
                  'province_name' => 'LUBUSKIE',
                  'lat' => '51.9356214',
                  'lon' => '15.5061862',
                  'province_id' => 4,
              ),
          232 =>
              array (
                  'city_name' => 'Bełchatów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.3687535',
                  'lon' => '19.3564248',
                  'province_id' => 5,
              ),
          233 =>
              array (
                  'city_name' => 'Zelów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.46434',
                  'lon' => '19.21982',
                  'province_id' => 5,
              ),
          234 =>
              array (
                  'city_name' => 'Kutno',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '52.230618',
                  'lon' => '19.364278',
                  'province_id' => 5,
              ),
          235 =>
              array (
                  'city_name' => 'Krośniewice',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '52.25581',
                  'lon' => '19.17067',
                  'province_id' => 5,
              ),
          236 =>
              array (
                  'city_name' => 'Żychlin',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '52.24396',
                  'lon' => '19.6259601',
                  'province_id' => 5,
              ),
          237 =>
              array (
                  'city_name' => 'Łask',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.5906364',
                  'lon' => '19.1327882',
                  'province_id' => 5,
              ),
          238 =>
              array (
                  'city_name' => 'Łęczyca',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '52.05959',
                  'lon' => '19.19969',
                  'province_id' => 5,
              ),
          239 =>
              array (
                  'city_name' => 'Łowicz',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '52.10679160000001',
                  'lon' => '19.9453743',
                  'province_id' => 5,
              ),
          240 =>
              array (
                  'city_name' => 'Koluszki',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.73828899999999',
                  'lon' => '19.819639',
                  'province_id' => 5,
              ),
          241 =>
              array (
                  'city_name' => 'Rzgów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.662929',
                  'lon' => '19.4897529',
                  'province_id' => 5,
              ),
          242 =>
              array (
                  'city_name' => 'Tuszyn',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.6061554',
                  'lon' => '19.5335486',
                  'province_id' => 5,
              ),
          243 =>
              array (
                  'city_name' => 'Drzewica',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.4506315',
                  'lon' => '20.477146',
                  'province_id' => 5,
              ),
          244 =>
              array (
                  'city_name' => 'Opoczno',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.3753379',
                  'lon' => '20.2787632',
                  'province_id' => 5,
              ),
          245 =>
              array (
                  'city_name' => 'Konstantynów Łódzki',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.7476048',
                  'lon' => '19.3254913',
                  'province_id' => 5,
              ),
          246 =>
              array (
                  'city_name' => 'Pabianice',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.6567303',
                  'lon' => '19.35776',
                  'province_id' => 5,
              ),
          247 =>
              array (
                  'city_name' => 'Działoszyn',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.1166563',
                  'lon' => '18.8651228',
                  'province_id' => 5,
              ),
          248 =>
              array (
                  'city_name' => 'Pajęczno',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.14489',
                  'lon' => '18.99908',
                  'province_id' => 5,
              ),
          249 =>
              array (
                  'city_name' => 'Sulejów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.35411999999999',
                  'lon' => '19.88512',
                  'province_id' => 5,
              ),
          250 =>
              array (
                  'city_name' => 'Wolbórz',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.501732',
                  'lon' => '19.8305259',
                  'province_id' => 5,
              ),
          251 =>
              array (
                  'city_name' => 'Poddębice',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.89325',
                  'lon' => '18.9572',
                  'province_id' => 5,
              ),
          252 =>
              array (
                  'city_name' => 'Uniejów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.9696042',
                  'lon' => '18.7966596',
                  'province_id' => 5,
              ),
          253 =>
              array (
                  'city_name' => 'Radomsko',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.0668544',
                  'lon' => '19.4449387',
                  'province_id' => 5,
              ),
          254 =>
              array (
                  'city_name' => 'Kamieńsk',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.2048619',
                  'lon' => '19.4988657',
                  'province_id' => 5,
              ),
          255 =>
              array (
                  'city_name' => 'Przedbórz',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.0880091',
                  'lon' => '19.8736305',
                  'province_id' => 5,
              ),
          256 =>
              array (
                  'city_name' => 'Rawa Mazowiecka',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.76623',
                  'lon' => '20.25623',
                  'province_id' => 5,
              ),
          257 =>
              array (
                  'city_name' => 'Biała Rawska',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.80772',
                  'lon' => '20.47248',
                  'province_id' => 5,
              ),
          258 =>
              array (
                  'city_name' => 'Sieradz',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.5956014',
                  'lon' => '18.7302994',
                  'province_id' => 5,
              ),
          259 =>
              array (
                  'city_name' => 'Błaszki',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.6515663',
                  'lon' => '18.4344355',
                  'province_id' => 5,
              ),
          260 =>
              array (
                  'city_name' => 'Warta',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.7103227',
                  'lon' => '18.6250691',
                  'province_id' => 5,
              ),
          261 =>
              array (
                  'city_name' => 'Złoczew',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.4171963',
                  'lon' => '18.6035594',
                  'province_id' => 5,
              ),
          262 =>
              array (
                  'city_name' => 'Tomaszów Mazowiecki',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.5311945',
                  'lon' => '20.0086471',
                  'province_id' => 5,
              ),
          263 =>
              array (
                  'city_name' => 'Wieluń',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.2186',
                  'lon' => '18.56892',
                  'province_id' => 5,
              ),
          264 =>
              array (
                  'city_name' => 'Wieruszów',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.29486',
                  'lon' => '18.1547499',
                  'province_id' => 5,
              ),
          265 =>
              array (
                  'city_name' => 'Zduńska Wola',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.5990328',
                  'lon' => '18.9393251',
                  'province_id' => 5,
              ),
          266 =>
              array (
                  'city_name' => 'Szadek',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.6915722',
                  'lon' => '18.976395',
                  'province_id' => 5,
              ),
          267 =>
              array (
                  'city_name' => 'Głowno',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.9643',
                  'lon' => '19.71565',
                  'province_id' => 5,
              ),
          268 =>
              array (
                  'city_name' => 'Ozorków',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.9632917',
                  'lon' => '19.291386',
                  'province_id' => 5,
              ),
          269 =>
              array (
                  'city_name' => 'Zgierz',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.85505759999999',
                  'lon' => '19.4060704',
                  'province_id' => 5,
              ),
          270 =>
              array (
                  'city_name' => 'Aleksandrów Łódzki',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.8194235',
                  'lon' => '19.3038202',
                  'province_id' => 5,
              ),
          271 =>
              array (
                  'city_name' => 'Stryków',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.90130440000001',
                  'lon' => '19.6042812',
                  'province_id' => 5,
              ),
          272 =>
              array (
                  'city_name' => 'Brzeziny',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.800255',
                  'lon' => '19.7516791',
                  'province_id' => 5,
              ),
          273 =>
              array (
                  'city_name' => 'Łódź',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.7592485',
                  'lon' => '19.4559833',
                  'province_id' => 5,
              ),
          274 =>
              array (
                  'city_name' => 'Piotrków Trybunalski',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.40517209999999',
                  'lon' => '19.7030244',
                  'province_id' => 5,
              ),
          275 =>
              array (
                  'city_name' => 'Skierniewice',
                  'province_name' => 'ŁÓDZKIE',
                  'lat' => '51.9547169',
                  'lon' => '20.1583303',
                  'province_id' => 5,
              ),
          276 =>
              array (
                  'city_name' => 'Bochnia',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.96845769999999',
                  'lon' => '20.4303286',
                  'province_id' => 6,
              ),
          277 =>
              array (
                  'city_name' => 'Nowy Wiśnicz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9158004',
                  'lon' => '20.4612616',
                  'province_id' => 6,
              ),
          278 =>
              array (
                  'city_name' => 'Brzesko',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9647187',
                  'lon' => '20.6034471',
                  'province_id' => 6,
              ),
          279 =>
              array (
                  'city_name' => 'Czchów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.8368614',
                  'lon' => '20.6802794',
                  'province_id' => 6,
              ),
          280 =>
              array (
                  'city_name' => 'Alwernia',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.0598063',
                  'lon' => '19.5394784',
                  'province_id' => 6,
              ),
          281 =>
              array (
                  'city_name' => 'Chrzanów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.13456430000001',
                  'lon' => '19.4001765',
                  'province_id' => 6,
              ),
          282 =>
              array (
                  'city_name' => 'Libiąż',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.1037928',
                  'lon' => '19.3156774',
                  'province_id' => 6,
              ),
          283 =>
              array (
                  'city_name' => 'Trzebinia',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.15847',
                  'lon' => '19.4694',
                  'province_id' => 6,
              ),
          284 =>
              array (
                  'city_name' => 'Dąbrowa Tarnowska',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.17462',
                  'lon' => '20.98638',
                  'province_id' => 6,
              ),
          285 =>
              array (
                  'city_name' => 'Szczucin',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.3094981',
                  'lon' => '21.074546',
                  'province_id' => 6,
              ),
          286 =>
              array (
                  'city_name' => 'Gorlice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.6546159',
                  'lon' => '21.1596321',
                  'province_id' => 6,
              ),
          287 =>
              array (
                  'city_name' => 'Biecz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.73554',
                  'lon' => '21.26331',
                  'province_id' => 6,
              ),
          288 =>
              array (
                  'city_name' => 'Bobowa',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.7102798',
                  'lon' => '20.9509659',
                  'province_id' => 6,
              ),
          289 =>
              array (
                  'city_name' => 'Krzeszowice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.14192',
                  'lon' => '19.63231',
                  'province_id' => 6,
              ),
          290 =>
              array (
                  'city_name' => 'Skała',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.2304098',
                  'lon' => '19.8541516',
                  'province_id' => 6,
              ),
          291 =>
              array (
                  'city_name' => 'Skawina',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9751815',
                  'lon' => '19.8288749',
                  'province_id' => 6,
              ),
          292 =>
              array (
                  'city_name' => 'Słomniki',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.23993',
                  'lon' => '20.08212',
                  'province_id' => 6,
              ),
          293 =>
              array (
                  'city_name' => 'Świątniki Górne',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.93424479999999',
                  'lon' => '19.9536485',
                  'province_id' => 6,
              ),
          294 =>
              array (
                  'city_name' => 'Limanowa',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.70587',
                  'lon' => '20.42228',
                  'province_id' => 6,
              ),
          295 =>
              array (
                  'city_name' => 'Mszana Dolna',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.67402999999999',
                  'lon' => '20.07982',
                  'province_id' => 6,
              ),
          296 =>
              array (
                  'city_name' => 'Miechów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.3568703',
                  'lon' => '20.0274127',
                  'province_id' => 6,
              ),
          297 =>
              array (
                  'city_name' => 'Dobczyce',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.8811735',
                  'lon' => '20.0890793',
                  'province_id' => 6,
              ),
          298 =>
              array (
                  'city_name' => 'Myślenice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.83347',
                  'lon' => '19.93965',
                  'province_id' => 6,
              ),
          299 =>
              array (
                  'city_name' => 'Sułkowice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.83879',
                  'lon' => '19.79959',
                  'province_id' => 6,
              ),
          300 =>
              array (
                  'city_name' => 'Grybów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.62406',
                  'lon' => '20.94789',
                  'province_id' => 6,
              ),
          301 =>
              array (
                  'city_name' => 'Krynica-Zdrój',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.4215158',
                  'lon' => '20.9594208',
                  'province_id' => 6,
              ),
          302 =>
              array (
                  'city_name' => 'Muszyna',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.3565901',
                  'lon' => '20.8971615',
                  'province_id' => 6,
              ),
          303 =>
              array (
                  'city_name' => 'Piwniczna-Zdrój',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.4396092',
                  'lon' => '20.713445',
                  'province_id' => 6,
              ),
          304 =>
              array (
                  'city_name' => 'Stary Sącz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.564452',
                  'lon' => '20.6327686',
                  'province_id' => 6,
              ),
          305 =>
              array (
                  'city_name' => 'Nowy Targ',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.4774647',
                  'lon' => '20.032096',
                  'province_id' => 6,
              ),
          306 =>
              array (
                  'city_name' => 'Szczawnica',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.4230451',
                  'lon' => '20.4829529',
                  'province_id' => 6,
              ),
          307 =>
              array (
                  'city_name' => 'Rabka-Zdrój',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.6090128',
                  'lon' => '19.9671769',
                  'province_id' => 6,
              ),
          308 =>
              array (
                  'city_name' => 'Bukowno',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.26508',
                  'lon' => '19.44484',
                  'province_id' => 6,
              ),
          309 =>
              array (
                  'city_name' => 'Olkusz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.2813157',
                  'lon' => '19.5656869',
                  'province_id' => 6,
              ),
          310 =>
              array (
                  'city_name' => 'Wolbrom',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.37939',
                  'lon' => '19.7584',
                  'province_id' => 6,
              ),
          311 =>
              array (
                  'city_name' => 'Oświęcim',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.0343982',
                  'lon' => '19.2097782',
                  'province_id' => 6,
              ),
          312 =>
              array (
                  'city_name' => 'Brzeszcze',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9815',
                  'lon' => '19.15303',
                  'province_id' => 6,
              ),
          313 =>
              array (
                  'city_name' => 'Chełmek',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.10002',
                  'lon' => '19.24873',
                  'province_id' => 6,
              ),
          314 =>
              array (
                  'city_name' => 'Kęty',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.88072990000001',
                  'lon' => '19.2228003',
                  'province_id' => 6,
              ),
          315 =>
              array (
                  'city_name' => 'Zator',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.99621',
                  'lon' => '19.4374699',
                  'province_id' => 6,
              ),
          316 =>
              array (
                  'city_name' => 'Nowe Brzesko',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.13151000000001',
                  'lon' => '20.3745725',
                  'province_id' => 6,
              ),
          317 =>
              array (
                  'city_name' => 'Proszowice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.1921916',
                  'lon' => '20.2890751',
                  'province_id' => 6,
              ),
          318 =>
              array (
                  'city_name' => 'Jordanów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.64913',
                  'lon' => '19.83001',
                  'province_id' => 6,
              ),
          319 =>
              array (
                  'city_name' => 'Sucha Beskidzka',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.7311978',
                  'lon' => '19.5771139',
                  'province_id' => 6,
              ),
          320 =>
              array (
                  'city_name' => 'Maków Podhalański',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.72953',
                  'lon' => '19.67695',
                  'province_id' => 6,
              ),
          321 =>
              array (
                  'city_name' => 'Ciężkowice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.7856205',
                  'lon' => '20.973264',
                  'province_id' => 6,
              ),
          322 =>
              array (
                  'city_name' => 'Radłów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.0839991',
                  'lon' => '20.8499278',
                  'province_id' => 6,
              ),
          323 =>
              array (
                  'city_name' => 'Ryglice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.8788079',
                  'lon' => '21.1375994',
                  'province_id' => 6,
              ),
          324 =>
              array (
                  'city_name' => 'Tuchów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.89477',
                  'lon' => '21.05416',
                  'province_id' => 6,
              ),
          325 =>
              array (
                  'city_name' => 'Wojnicz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9579835',
                  'lon' => '20.8378422',
                  'province_id' => 6,
              ),
          326 =>
              array (
                  'city_name' => 'Zakliczyn',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.8557953',
                  'lon' => '20.8093376',
                  'province_id' => 6,
              ),
          327 =>
              array (
                  'city_name' => 'Żabno',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.13334',
                  'lon' => '20.8861701',
                  'province_id' => 6,
              ),
          328 =>
              array (
                  'city_name' => 'Zakopane',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.299181',
                  'lon' => '19.949562',
                  'province_id' => 6,
              ),
          329 =>
              array (
                  'city_name' => 'Andrychów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.85489339999999',
                  'lon' => '19.3412842',
                  'province_id' => 6,
              ),
          330 =>
              array (
                  'city_name' => 'Kalwaria Zebrzydowska',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.86686',
                  'lon' => '19.67676',
                  'province_id' => 6,
              ),
          331 =>
              array (
                  'city_name' => 'Wadowice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.88278560000001',
                  'lon' => '19.4939579',
                  'province_id' => 6,
              ),
          332 =>
              array (
                  'city_name' => 'Niepołomice',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.0406662',
                  'lon' => '20.2225326',
                  'province_id' => 6,
              ),
          333 =>
              array (
                  'city_name' => 'Wieliczka',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.9870619',
                  'lon' => '20.0647971',
                  'province_id' => 6,
              ),
          334 =>
              array (
                  'city_name' => 'Kraków',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.06465009999999',
                  'lon' => '19.9449799',
                  'province_id' => 6,
              ),
          335 =>
              array (
                  'city_name' => 'Nowy Sącz',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '49.6174535',
                  'lon' => '20.7153325',
                  'province_id' => 6,
              ),
          336 =>
              array (
                  'city_name' => 'Tarnów',
                  'province_name' => 'MAŁOPOLSKIE',
                  'lat' => '50.0121011',
                  'lon' => '20.9858407',
                  'province_id' => 6,
              ),
          337 =>
              array (
                  'city_name' => 'Białobrzegi',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.6464991',
                  'lon' => '20.9565466',
                  'province_id' => 7,
              ),
          338 =>
              array (
                  'city_name' => 'Wyśmierzyce',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.6248663',
                  'lon' => '20.8139759',
                  'province_id' => 7,
              ),
          339 =>
              array (
                  'city_name' => 'Ciechanów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.8814838',
                  'lon' => '20.6197948',
                  'province_id' => 7,
              ),
          340 =>
              array (
                  'city_name' => 'Glinojeck',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.81954',
                  'lon' => '20.29179',
                  'province_id' => 7,
              ),
          341 =>
              array (
                  'city_name' => 'Garwolin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.8971987',
                  'lon' => '21.6149393',
                  'province_id' => 7,
              ),
          342 =>
              array (
                  'city_name' => 'Łaskarzew',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.78914',
                  'lon' => '21.59133',
                  'province_id' => 7,
              ),
          343 =>
              array (
                  'city_name' => 'Pilawa',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.95914',
                  'lon' => '21.53057',
                  'province_id' => 7,
              ),
          344 =>
              array (
                  'city_name' => 'Żelechów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.81054',
                  'lon' => '21.89725',
                  'province_id' => 7,
              ),
          345 =>
              array (
                  'city_name' => 'Gostynin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.4293273',
                  'lon' => '19.4619176',
                  'province_id' => 7,
              ),
          346 =>
              array (
                  'city_name' => 'Milanówek',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1185315',
                  'lon' => '20.6716234',
                  'province_id' => 7,
              ),
          347 =>
              array (
                  'city_name' => 'Podkowa Leśna',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1199928',
                  'lon' => '20.7265083',
                  'province_id' => 7,
              ),
          348 =>
              array (
                  'city_name' => 'Grodzisk Mazowiecki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1044383',
                  'lon' => '20.6350924',
                  'province_id' => 7,
              ),
          349 =>
              array (
                  'city_name' => 'Grójec',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.8655118',
                  'lon' => '20.8666034',
                  'province_id' => 7,
              ),
          350 =>
              array (
                  'city_name' => 'Mogielnica',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.6940669',
                  'lon' => '20.7235402',
                  'province_id' => 7,
              ),
          351 =>
              array (
                  'city_name' => 'Nowe Miasto nad Pilicą',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.6175744',
                  'lon' => '20.5766449',
                  'province_id' => 7,
              ),
          352 =>
              array (
                  'city_name' => 'Warka',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.78400190000001',
                  'lon' => '21.1909879',
                  'province_id' => 7,
              ),
          353 =>
              array (
                  'city_name' => 'Kozienice',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.5855328',
                  'lon' => '21.5511768',
                  'province_id' => 7,
              ),
          354 =>
              array (
                  'city_name' => 'Legionowo',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.4044483',
                  'lon' => '20.9499698',
                  'province_id' => 7,
              ),
          355 =>
              array (
                  'city_name' => 'Serock',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.5103662',
                  'lon' => '21.0691045',
                  'province_id' => 7,
              ),
          356 =>
              array (
                  'city_name' => 'Lipsko',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.159',
                  'lon' => '21.64911',
                  'province_id' => 7,
              ),
          357 =>
              array (
                  'city_name' => 'Łosice',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2115649',
                  'lon' => '22.7184846',
                  'province_id' => 7,
              ),
          358 =>
              array (
                  'city_name' => 'Maków Mazowiecki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.8649711',
                  'lon' => '21.1001154',
                  'province_id' => 7,
              ),
          359 =>
              array (
                  'city_name' => 'Różan',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.8873011',
                  'lon' => '21.391082',
                  'province_id' => 7,
              ),
          360 =>
              array (
                  'city_name' => 'Mińsk Mazowiecki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1792836',
                  'lon' => '21.5721057',
                  'province_id' => 7,
              ),
          361 =>
              array (
                  'city_name' => 'Halinów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2283049',
                  'lon' => '21.355139',
                  'province_id' => 7,
              ),
          362 =>
              array (
                  'city_name' => 'Kałuszyn',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2067049',
                  'lon' => '21.808426',
                  'province_id' => 7,
              ),
          363 =>
              array (
                  'city_name' => 'Mrozy',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1656651',
                  'lon' => '21.8024361',
                  'province_id' => 7,
              ),
          364 =>
              array (
                  'city_name' => 'Sulejówek',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.25242410000001',
                  'lon' => '21.2690107',
                  'province_id' => 7,
              ),
          365 =>
              array (
                  'city_name' => 'Mława',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.1122632',
                  'lon' => '20.3837208',
                  'province_id' => 7,
              ),
          366 =>
              array (
                  'city_name' => 'Nowy Dwór Mazowiecki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.4465078',
                  'lon' => '20.6925219',
                  'province_id' => 7,
              ),
          367 =>
              array (
                  'city_name' => 'Nasielsk',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.58991',
                  'lon' => '20.80568',
                  'province_id' => 7,
              ),
          368 =>
              array (
                  'city_name' => 'Zakroczym',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.4379891',
                  'lon' => '20.6119813',
                  'province_id' => 7,
              ),
          369 =>
              array (
                  'city_name' => 'Myszyniec',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.380492',
                  'lon' => '21.3495321',
                  'province_id' => 7,
              ),
          370 =>
              array (
                  'city_name' => 'Ostrów Mazowiecka',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.8024372',
                  'lon' => '21.8950416',
                  'province_id' => 7,
              ),
          371 =>
              array (
                  'city_name' => 'Brok',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.6973953',
                  'lon' => '21.8470553',
                  'province_id' => 7,
              ),
          372 =>
              array (
                  'city_name' => 'Józefów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1368197',
                  'lon' => '21.2354266',
                  'province_id' => 7,
              ),
          373 =>
              array (
                  'city_name' => 'Otwock',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1053186',
                  'lon' => '21.2616247',
                  'province_id' => 7,
              ),
          374 =>
              array (
                  'city_name' => 'Karczew',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.0757659',
                  'lon' => '21.2500669',
                  'province_id' => 7,
              ),
          375 =>
              array (
                  'city_name' => 'Góra Kalwaria',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.97646599999999',
                  'lon' => '21.215337',
                  'province_id' => 7,
              ),
          376 =>
              array (
                  'city_name' => 'Konstancin-Jeziorna',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.0938717',
                  'lon' => '21.117722',
                  'province_id' => 7,
              ),
          377 =>
              array (
                  'city_name' => 'Piaseczno',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.0811536',
                  'lon' => '21.0238602',
                  'province_id' => 7,
              ),
          378 =>
              array (
                  'city_name' => 'Tarczyn',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.9823186',
                  'lon' => '20.8344906',
                  'province_id' => 7,
              ),
          379 =>
              array (
                  'city_name' => 'Drobin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.7374731',
                  'lon' => '19.9917009',
                  'province_id' => 7,
              ),
          380 =>
              array (
                  'city_name' => 'Gąbin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.3974171',
                  'lon' => '19.735653',
                  'province_id' => 7,
              ),
          381 =>
              array (
                  'city_name' => 'Wyszogród',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.391799',
                  'lon' => '20.1900369',
                  'province_id' => 7,
              ),
          382 =>
              array (
                  'city_name' => 'Płońsk',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.6230132',
                  'lon' => '20.3753589',
                  'province_id' => 7,
              ),
          383 =>
              array (
                  'city_name' => 'Raciąż',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.78149999999999',
                  'lon' => '20.11774',
                  'province_id' => 7,
              ),
          384 =>
              array (
                  'city_name' => 'Piastów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1845184',
                  'lon' => '20.8400429',
                  'province_id' => 7,
              ),
          385 =>
              array (
                  'city_name' => 'Pruszków',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1704725',
                  'lon' => '20.8118862',
                  'province_id' => 7,
              ),
          386 =>
              array (
                  'city_name' => 'Brwinów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.142598',
                  'lon' => '20.7175048',
                  'province_id' => 7,
              ),
          387 =>
              array (
                  'city_name' => 'Przasnysz',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.018984',
                  'lon' => '20.880358',
                  'province_id' => 7,
              ),
          388 =>
              array (
                  'city_name' => 'Chorzele',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.2600919',
                  'lon' => '20.8970643',
                  'province_id' => 7,
              ),
          389 =>
              array (
                  'city_name' => 'Przysucha',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.3578773',
                  'lon' => '20.6317957',
                  'province_id' => 7,
              ),
          390 =>
              array (
                  'city_name' => 'Pułtusk',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.6974595',
                  'lon' => '21.0852069',
                  'province_id' => 7,
              ),
          391 =>
              array (
                  'city_name' => 'Pionki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.4757752',
                  'lon' => '21.4500545',
                  'province_id' => 7,
              ),
          392 =>
              array (
                  'city_name' => 'Iłża',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.16305',
                  'lon' => '21.23991',
                  'province_id' => 7,
              ),
          393 =>
              array (
                  'city_name' => 'Skaryszew',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.3106091',
                  'lon' => '21.2523841',
                  'province_id' => 7,
              ),
          394 =>
              array (
                  'city_name' => 'Mordy',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2117033',
                  'lon' => '22.5177976',
                  'province_id' => 7,
              ),
          395 =>
              array (
                  'city_name' => 'Sierpc',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.8568142',
                  'lon' => '19.669432',
                  'province_id' => 7,
              ),
          396 =>
              array (
                  'city_name' => 'Sochaczew',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2293372',
                  'lon' => '20.238359',
                  'province_id' => 7,
              ),
          397 =>
              array (
                  'city_name' => 'Sokołów Podlaski',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.407031',
                  'lon' => '22.2533608',
                  'province_id' => 7,
              ),
          398 =>
              array (
                  'city_name' => 'Kosów Lacki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.596028',
                  'lon' => '22.1470031',
                  'province_id' => 7,
              ),
          399 =>
              array (
                  'city_name' => 'Szydłowiec',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.2279908',
                  'lon' => '20.8611466',
                  'province_id' => 7,
              ),
          400 =>
              array (
                  'city_name' => 'Błonie',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1985472',
                  'lon' => '20.6169567',
                  'province_id' => 7,
              ),
          401 =>
              array (
                  'city_name' => 'Łomianki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.3336578',
                  'lon' => '20.8869861',
                  'province_id' => 7,
              ),
          402 =>
              array (
                  'city_name' => 'Ożarów Mazowiecki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2103507',
                  'lon' => '20.7972326',
                  'province_id' => 7,
              ),
          403 =>
              array (
                  'city_name' => 'Węgrów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.3991566',
                  'lon' => '22.0164266',
                  'province_id' => 7,
              ),
          404 =>
              array (
                  'city_name' => 'Łochów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.5307',
                  'lon' => '21.68182',
                  'province_id' => 7,
              ),
          405 =>
              array (
                  'city_name' => 'Kobyłka',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.33923799999999',
                  'lon' => '21.1959846',
                  'province_id' => 7,
              ),
          406 =>
              array (
                  'city_name' => 'Marki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.3213443',
                  'lon' => '21.1035662',
                  'province_id' => 7,
              ),
          407 =>
              array (
                  'city_name' => 'Ząbki',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.2870682',
                  'lon' => '21.1079604',
                  'province_id' => 7,
              ),
          408 =>
              array (
                  'city_name' => 'Zielonka',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.30343980000001',
                  'lon' => '21.1607239',
                  'province_id' => 7,
              ),
          409 =>
              array (
                  'city_name' => 'Radzymin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.4175467',
                  'lon' => '21.1804029',
                  'province_id' => 7,
              ),
          410 =>
              array (
                  'city_name' => 'Tłuszcz',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.42997',
                  'lon' => '21.43511',
                  'province_id' => 7,
              ),
          411 =>
              array (
                  'city_name' => 'Wołomin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.3391162',
                  'lon' => '21.2423181',
                  'province_id' => 7,
              ),
          412 =>
              array (
                  'city_name' => 'Wyszków',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.5928523',
                  'lon' => '21.458395',
                  'province_id' => 7,
              ),
          413 =>
              array (
                  'city_name' => 'Zwoleń',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.3553788',
                  'lon' => '21.587725',
                  'province_id' => 7,
              ),
          414 =>
              array (
                  'city_name' => 'Bieżuń',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.9606362',
                  'lon' => '19.8892395',
                  'province_id' => 7,
              ),
          415 =>
              array (
                  'city_name' => 'Żuromin',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.0660775',
                  'lon' => '19.9089046',
                  'province_id' => 7,
              ),
          416 =>
              array (
                  'city_name' => 'Żyrardów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.048652',
                  'lon' => '20.445988',
                  'province_id' => 7,
              ),
          417 =>
              array (
                  'city_name' => 'Mszczonów',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.98204699999999',
                  'lon' => '20.5216182',
                  'province_id' => 7,
              ),
          418 =>
              array (
                  'city_name' => 'Ostrołęka',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '53.0876544',
                  'lon' => '21.5592554',
                  'province_id' => 7,
              ),
          419 =>
              array (
                  'city_name' => 'Płock',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.5463446',
                  'lon' => '19.7065364',
                  'province_id' => 7,
              ),
          420 =>
              array (
                  'city_name' => 'Radom',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '51.40272359999999',
                  'lon' => '21.1471334',
                  'province_id' => 7,
              ),
          421 =>
              array (
                  'city_name' => 'Siedlce',
                  'province_name' => 'MAZOWIECKIE',
                  'lat' => '52.1676031',
                  'lon' => '22.2901645',
                  'province_id' => 7,
              ),
          422 =>
              array (
                  'city_name' => 'Brzeg',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.8608509',
                  'lon' => '17.466831',
                  'province_id' => 8,
              ),
          423 =>
              array (
                  'city_name' => 'Grodków',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.69625',
                  'lon' => '17.38516',
                  'province_id' => 8,
              ),
          424 =>
              array (
                  'city_name' => 'Lewin Brzeski',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.74829',
                  'lon' => '17.6187999',
                  'province_id' => 8,
              ),
          425 =>
              array (
                  'city_name' => 'Baborów',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.1575901',
                  'lon' => '17.9852459',
                  'province_id' => 8,
              ),
          426 =>
              array (
                  'city_name' => 'Głubczyce',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.20027',
                  'lon' => '17.8287',
                  'province_id' => 8,
              ),
          427 =>
              array (
                  'city_name' => 'Kietrz',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.08005',
                  'lon' => '18.00413',
                  'province_id' => 8,
              ),
          428 =>
              array (
                  'city_name' => 'Kędzierzyn-Koźle',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.3498805',
                  'lon' => '18.2261844',
                  'province_id' => 8,
              ),
          429 =>
              array (
                  'city_name' => 'Byczyna',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '51.11327',
                  'lon' => '18.21114',
                  'province_id' => 8,
              ),
          430 =>
              array (
                  'city_name' => 'Kluczbork',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.97235',
                  'lon' => '18.2180699',
                  'province_id' => 8,
              ),
          431 =>
              array (
                  'city_name' => 'Wołczyn',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '51.0184963',
                  'lon' => '18.0515704',
                  'province_id' => 8,
              ),
          432 =>
              array (
                  'city_name' => 'Gogolin',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4906175',
                  'lon' => '18.0240484',
                  'province_id' => 8,
              ),
          433 =>
              array (
                  'city_name' => 'Krapkowice',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4745052',
                  'lon' => '17.9651386',
                  'province_id' => 8,
              ),
          434 =>
              array (
                  'city_name' => 'Zdzieszowice',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.42422',
                  'lon' => '18.12477',
                  'province_id' => 8,
              ),
          435 =>
              array (
                  'city_name' => 'Namysłów',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '51.07588',
                  'lon' => '17.72244',
                  'province_id' => 8,
              ),
          436 =>
              array (
                  'city_name' => 'Głuchołazy',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.31512',
                  'lon' => '17.38347',
                  'province_id' => 8,
              ),
          437 =>
              array (
                  'city_name' => 'Korfantów',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4888579',
                  'lon' => '17.5989754',
                  'province_id' => 8,
              ),
          438 =>
              array (
                  'city_name' => 'Nysa',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4822855',
                  'lon' => '17.3295861',
                  'province_id' => 8,
              ),
          439 =>
              array (
                  'city_name' => 'Otmuchów',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4660686',
                  'lon' => '17.1733617',
                  'province_id' => 8,
              ),
          440 =>
              array (
                  'city_name' => 'Paczków',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.4635646',
                  'lon' => '17.0057255',
                  'province_id' => 8,
              ),
          441 =>
              array (
                  'city_name' => 'Dobrodzień',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.72875',
                  'lon' => '18.44502',
                  'province_id' => 8,
              ),
          442 =>
              array (
                  'city_name' => 'Gorzów Śląski',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '51.0279541',
                  'lon' => '18.4228918',
                  'province_id' => 8,
              ),
          443 =>
              array (
                  'city_name' => 'Olesno',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.87526',
                  'lon' => '18.41472',
                  'province_id' => 8,
              ),
          444 =>
              array (
                  'city_name' => 'Praszka',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '51.05359',
                  'lon' => '18.4535',
                  'province_id' => 8,
              ),
          445 =>
              array (
                  'city_name' => 'Niemodlin',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.6422',
                  'lon' => '17.61989',
                  'province_id' => 8,
              ),
          446 =>
              array (
                  'city_name' => 'Ozimek',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.6787',
                  'lon' => '18.2137899',
                  'province_id' => 8,
              ),
          447 =>
              array (
                  'city_name' => 'Prószków',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.57668289999999',
                  'lon' => '17.8714069',
                  'province_id' => 8,
              ),
          448 =>
              array (
                  'city_name' => 'Biała',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.38625740000001',
                  'lon' => '17.6604283',
                  'province_id' => 8,
              ),
          449 =>
              array (
                  'city_name' => 'Głogówek',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.35349',
                  'lon' => '17.8643499',
                  'province_id' => 8,
              ),
          450 =>
              array (
                  'city_name' => 'Prudnik',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.3206779',
                  'lon' => '17.5742265',
                  'province_id' => 8,
              ),
          451 =>
              array (
                  'city_name' => 'Kolonowskie',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.6532734',
                  'lon' => '18.38426',
                  'province_id' => 8,
              ),
          452 =>
              array (
                  'city_name' => 'Leśnica',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.43057779999999',
                  'lon' => '18.1872242',
                  'province_id' => 8,
              ),
          453 =>
              array (
                  'city_name' => 'Strzelce Opolskie',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.51092',
                  'lon' => '18.29987',
                  'province_id' => 8,
              ),
          454 =>
              array (
                  'city_name' => 'Ujazd',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.3888097',
                  'lon' => '18.3476407',
                  'province_id' => 8,
              ),
          455 =>
              array (
                  'city_name' => 'Zawadzkie',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.60435',
                  'lon' => '18.48514',
                  'province_id' => 8,
              ),
          456 =>
              array (
                  'city_name' => 'Opole',
                  'province_name' => 'OPOLSKIE',
                  'lat' => '50.6751067',
                  'lon' => '17.9212976',
                  'province_id' => 8,
              ),
          457 =>
              array (
                  'city_name' => 'Ustrzyki Dolne',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.4303242',
                  'lon' => '22.5942366',
                  'province_id' => 9,
              ),
          458 =>
              array (
                  'city_name' => 'Brzozów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.69427',
                  'lon' => '22.0193601',
                  'province_id' => 9,
              ),
          459 =>
              array (
                  'city_name' => 'Dębica',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.0516417',
                  'lon' => '21.4116964',
                  'province_id' => 9,
              ),
          460 =>
              array (
                  'city_name' => 'Brzostek',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.8794493',
                  'lon' => '21.4111386',
                  'province_id' => 9,
              ),
          461 =>
              array (
                  'city_name' => 'Pilzno',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.97976',
                  'lon' => '21.29492',
                  'province_id' => 9,
              ),
          462 =>
              array (
                  'city_name' => 'Jarosław',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.0161463',
                  'lon' => '22.6777169',
                  'province_id' => 9,
              ),
          463 =>
              array (
                  'city_name' => 'Radymno',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.94712',
                  'lon' => '22.82395',
                  'province_id' => 9,
              ),
          464 =>
              array (
                  'city_name' => 'Pruchnik',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.90613219999999',
                  'lon' => '22.5155104',
                  'province_id' => 9,
              ),
          465 =>
              array (
                  'city_name' => 'Jasło',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.7445663',
                  'lon' => '21.4722875',
                  'province_id' => 9,
              ),
          466 =>
              array (
                  'city_name' => 'Kołaczyce',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.8073734',
                  'lon' => '21.4331923',
                  'province_id' => 9,
              ),
          467 =>
              array (
                  'city_name' => 'Kolbuszowa',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.24417',
                  'lon' => '21.77627',
                  'province_id' => 9,
              ),
          468 =>
              array (
                  'city_name' => 'Dukla',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.5555137',
                  'lon' => '21.6832308',
                  'province_id' => 9,
              ),
          469 =>
              array (
                  'city_name' => 'Iwonicz-Zdrój',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.5631235',
                  'lon' => '21.7899388',
                  'province_id' => 9,
              ),
          470 =>
              array (
                  'city_name' => 'Jedlicze',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.71749',
                  'lon' => '21.64896',
                  'province_id' => 9,
              ),
          471 =>
              array (
                  'city_name' => 'Rymanów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.57642',
                  'lon' => '21.86815',
                  'province_id' => 9,
              ),
          472 =>
              array (
                  'city_name' => 'Leżajsk',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.2620534',
                  'lon' => '22.4210807',
                  'province_id' => 9,
              ),
          473 =>
              array (
                  'city_name' => 'Nowa Sarzyna',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.32035',
                  'lon' => '22.3446',
                  'province_id' => 9,
              ),
          474 =>
              array (
                  'city_name' => 'Lubaczów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.15621',
                  'lon' => '23.12379',
                  'province_id' => 9,
              ),
          475 =>
              array (
                  'city_name' => 'Cieszanów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.2447893',
                  'lon' => '23.1306266',
                  'province_id' => 9,
              ),
          476 =>
              array (
                  'city_name' => 'Narol',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.3490504',
                  'lon' => '23.3268124',
                  'province_id' => 9,
              ),
          477 =>
              array (
                  'city_name' => 'Oleszyce',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.1676885',
                  'lon' => '23.0349969',
                  'province_id' => 9,
              ),
          478 =>
              array (
                  'city_name' => 'Łańcut',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.06824',
                  'lon' => '22.2298',
                  'province_id' => 9,
              ),
          479 =>
              array (
                  'city_name' => 'Mielec',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.287063',
                  'lon' => '21.4238101',
                  'province_id' => 9,
              ),
          480 =>
              array (
                  'city_name' => 'Przecław',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.1933744',
                  'lon' => '21.4800672',
                  'province_id' => 9,
              ),
          481 =>
              array (
                  'city_name' => 'Radomyśl Wielki',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.1968867',
                  'lon' => '21.2769049',
                  'province_id' => 9,
              ),
          482 =>
              array (
                  'city_name' => 'Nisko',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.52001',
                  'lon' => '22.1395499',
                  'province_id' => 9,
              ),
          483 =>
              array (
                  'city_name' => 'Rudnik nad Sanem',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.44324',
                  'lon' => '22.24879',
                  'province_id' => 9,
              ),
          484 =>
              array (
                  'city_name' => 'Ulanów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.4902323',
                  'lon' => '22.2636037',
                  'province_id' => 9,
              ),
          485 =>
              array (
                  'city_name' => 'Przeworsk',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.05869999999999',
                  'lon' => '22.49377',
                  'province_id' => 9,
              ),
          486 =>
              array (
                  'city_name' => 'Kańczuga',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.9833529',
                  'lon' => '22.411607',
                  'province_id' => 9,
              ),
          487 =>
              array (
                  'city_name' => 'Sieniawa',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.177791',
                  'lon' => '22.6095389',
                  'province_id' => 9,
              ),
          488 =>
              array (
                  'city_name' => 'Ropczyce',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.05228',
                  'lon' => '21.60887',
                  'province_id' => 9,
              ),
          489 =>
              array (
                  'city_name' => 'Sędziszów Małopolski',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.07097',
                  'lon' => '21.70191',
                  'province_id' => 9,
              ),
          490 =>
              array (
                  'city_name' => 'Dynów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.81506',
                  'lon' => '22.23388',
                  'province_id' => 9,
              ),
          491 =>
              array (
                  'city_name' => 'Błażowa',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.8856487',
                  'lon' => '22.1027541',
                  'province_id' => 9,
              ),
          492 =>
              array (
                  'city_name' => 'Boguchwała',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.9846987',
                  'lon' => '21.9450838',
                  'province_id' => 9,
              ),
          493 =>
              array (
                  'city_name' => 'Głogów Małopolski',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.1512',
                  'lon' => '21.96286',
                  'province_id' => 9,
              ),
          494 =>
              array (
                  'city_name' => 'Sokołów Małopolski',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.22904',
                  'lon' => '22.1196401',
                  'province_id' => 9,
              ),
          495 =>
              array (
                  'city_name' => 'Tyczyn',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.9638636',
                  'lon' => '22.0339385',
                  'province_id' => 9,
              ),
          496 =>
              array (
                  'city_name' => 'Sanok',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.55501870000001',
                  'lon' => '22.2060658',
                  'province_id' => 9,
              ),
          497 =>
              array (
                  'city_name' => 'Zagórz',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.5143',
                  'lon' => '22.26707',
                  'province_id' => 9,
              ),
          498 =>
              array (
                  'city_name' => 'Stalowa Wola',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.5826005',
                  'lon' => '22.0535861',
                  'province_id' => 9,
              ),
          499 =>
              array (
                  'city_name' => 'Zaklików',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.7577772',
                  'lon' => '22.1021741',
                  'province_id' => 9,
              ),
          500 =>
              array (
                  'city_name' => 'Strzyżów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.87047',
                  'lon' => '21.79386',
                  'province_id' => 9,
              ),
          501 =>
              array (
                  'city_name' => 'Baranów Sandomierski',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.498985',
                  'lon' => '21.5417402',
                  'province_id' => 9,
              ),
          502 =>
              array (
                  'city_name' => 'Nowa Dęba',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.42959',
                  'lon' => '21.75077',
                  'province_id' => 9,
              ),
          503 =>
              array (
                  'city_name' => 'Lesko',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.4701205',
                  'lon' => '22.3304325',
                  'province_id' => 9,
              ),
          504 =>
              array (
                  'city_name' => 'Krosno',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.6824761',
                  'lon' => '21.7660531',
                  'province_id' => 9,
              ),
          505 =>
              array (
                  'city_name' => 'Przemyśl',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '49.7838623',
                  'lon' => '22.7677908',
                  'province_id' => 9,
              ),
          506 =>
              array (
                  'city_name' => 'Rzeszów',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.0411867',
                  'lon' => '21.9991196',
                  'province_id' => 9,
              ),
          507 =>
              array (
                  'city_name' => 'Tarnobrzeg',
                  'province_name' => 'PODKARPACKIE',
                  'lat' => '50.5729079',
                  'lon' => '21.6790698',
                  'province_id' => 9,
              ),
          508 =>
              array (
                  'city_name' => 'Augustów',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.84344309999999',
                  'lon' => '22.9796024',
                  'province_id' => 10,
              ),
          509 =>
              array (
                  'city_name' => 'Lipsk',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.73703640000001',
                  'lon' => '23.3921628',
                  'province_id' => 10,
              ),
          510 =>
              array (
                  'city_name' => 'Choroszcz',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.14292',
                  'lon' => '22.98815',
                  'province_id' => 10,
              ),
          511 =>
              array (
                  'city_name' => 'Czarna Białostocka',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.30215',
                  'lon' => '23.28784',
                  'province_id' => 10,
              ),
          512 =>
              array (
                  'city_name' => 'Łapy',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.9912947',
                  'lon' => '22.8843128',
                  'province_id' => 10,
              ),
          513 =>
              array (
                  'city_name' => 'Michałowo',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.0329376',
                  'lon' => '23.6062185',
                  'province_id' => 10,
              ),
          514 =>
              array (
                  'city_name' => 'Supraśl',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.2049014',
                  'lon' => '23.3393564',
                  'province_id' => 10,
              ),
          515 =>
              array (
                  'city_name' => 'Suraż',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.9490114',
                  'lon' => '22.9564233',
                  'province_id' => 10,
              ),
          516 =>
              array (
                  'city_name' => 'Tykocin',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.2062669',
                  'lon' => '22.7740605',
                  'province_id' => 10,
              ),
          517 =>
              array (
                  'city_name' => 'Wasilków',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.1986',
                  'lon' => '23.20779',
                  'province_id' => 10,
              ),
          518 =>
              array (
                  'city_name' => 'Zabłudów',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.0140919',
                  'lon' => '23.3383288',
                  'province_id' => 10,
              ),
          519 =>
              array (
                  'city_name' => 'Bielsk Podlaski',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.7650576',
                  'lon' => '23.1867524',
                  'province_id' => 10,
              ),
          520 =>
              array (
                  'city_name' => 'Brańsk',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.7433639',
                  'lon' => '22.8413044',
                  'province_id' => 10,
              ),
          521 =>
              array (
                  'city_name' => 'Grajewo',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.64715589999999',
                  'lon' => '22.455217',
                  'province_id' => 10,
              ),
          522 =>
              array (
                  'city_name' => 'Rajgród',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.7309754',
                  'lon' => '22.7049936',
                  'province_id' => 10,
              ),
          523 =>
              array (
                  'city_name' => 'Szczuczyn',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.5630405',
                  'lon' => '22.2855473',
                  'province_id' => 10,
              ),
          524 =>
              array (
                  'city_name' => 'Hajnówka',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.74514',
                  'lon' => '23.58165',
                  'province_id' => 10,
              ),
          525 =>
              array (
                  'city_name' => 'Kleszczele',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.5726288',
                  'lon' => '23.3252268',
                  'province_id' => 10,
              ),
          526 =>
              array (
                  'city_name' => 'Kolno',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.4077753',
                  'lon' => '21.9326485',
                  'province_id' => 10,
              ),
          527 =>
              array (
                  'city_name' => 'Stawiski',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.3798875',
                  'lon' => '22.1546049',
                  'province_id' => 10,
              ),
          528 =>
              array (
                  'city_name' => 'Jedwabne',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.2852876',
                  'lon' => '22.2999337',
                  'province_id' => 10,
              ),
          529 =>
              array (
                  'city_name' => 'Nowogród',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.226552',
                  'lon' => '21.8790209',
                  'province_id' => 10,
              ),
          530 =>
              array (
                  'city_name' => 'Goniądz',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.4897551',
                  'lon' => '22.735111',
                  'province_id' => 10,
              ),
          531 =>
              array (
                  'city_name' => 'Knyszyn',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.3126826',
                  'lon' => '22.9196898',
                  'province_id' => 10,
              ),
          532 =>
              array (
                  'city_name' => 'Mońki',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.40491',
                  'lon' => '22.79712',
                  'province_id' => 10,
              ),
          533 =>
              array (
                  'city_name' => 'Sejny',
                  'province_name' => 'PODLASKIE',
                  'lat' => '54.10809',
                  'lon' => '23.3469',
                  'province_id' => 10,
              ),
          534 =>
              array (
                  'city_name' => 'Siemiatycze',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.42731999999999',
                  'lon' => '22.86373',
                  'province_id' => 10,
              ),
          535 =>
              array (
                  'city_name' => 'Drohiczyn',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.4003253',
                  'lon' => '22.6585778',
                  'province_id' => 10,
              ),
          536 =>
              array (
                  'city_name' => 'Dąbrowa Białostocka',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.653655',
                  'lon' => '23.3479763',
                  'province_id' => 10,
              ),
          537 =>
              array (
                  'city_name' => 'Krynki',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.2639896',
                  'lon' => '23.7725',
                  'province_id' => 10,
              ),
          538 =>
              array (
                  'city_name' => 'Sokółka',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.4061597',
                  'lon' => '23.5030235',
                  'province_id' => 10,
              ),
          539 =>
              array (
                  'city_name' => 'Suchowola',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.5776262',
                  'lon' => '23.1058028',
                  'province_id' => 10,
              ),
          540 =>
              array (
                  'city_name' => 'Wysokie Mazowieckie',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.9148',
                  'lon' => '22.51003',
                  'province_id' => 10,
              ),
          541 =>
              array (
                  'city_name' => 'Ciechanowiec',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.6782617',
                  'lon' => '22.4981661',
                  'province_id' => 10,
              ),
          542 =>
              array (
                  'city_name' => 'Czyżew',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.7975103',
                  'lon' => '22.312295',
                  'province_id' => 10,
              ),
          543 =>
              array (
                  'city_name' => 'Szepietowo',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.870314',
                  'lon' => '22.5438703',
                  'province_id' => 10,
              ),
          544 =>
              array (
                  'city_name' => 'Zambrów',
                  'province_name' => 'PODLASKIE',
                  'lat' => '52.98499409999999',
                  'lon' => '22.2413857',
                  'province_id' => 10,
              ),
          545 =>
              array (
                  'city_name' => 'Białystok',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.13248859999999',
                  'lon' => '23.1688403',
                  'province_id' => 10,
              ),
          546 =>
              array (
                  'city_name' => 'Łomża',
                  'province_name' => 'PODLASKIE',
                  'lat' => '53.1781197',
                  'lon' => '22.0590321',
                  'province_id' => 10,
              ),
          547 =>
              array (
                  'city_name' => 'Suwałki',
                  'province_name' => 'PODLASKIE',
                  'lat' => '54.1115218',
                  'lon' => '22.9307881',
                  'province_id' => 10,
              ),
          548 =>
              array (
                  'city_name' => 'Bytów',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.1706219',
                  'lon' => '17.4916089',
                  'province_id' => 11,
              ),
          549 =>
              array (
                  'city_name' => 'Miastko',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.0026',
                  'lon' => '16.98265',
                  'province_id' => 11,
              ),
          550 =>
              array (
                  'city_name' => 'Chojnice',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.6944002',
                  'lon' => '17.5569252',
                  'province_id' => 11,
              ),
          551 =>
              array (
                  'city_name' => 'Brusy',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.88655000000001',
                  'lon' => '17.71915',
                  'province_id' => 11,
              ),
          552 =>
              array (
                  'city_name' => 'Czersk',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.79509359999999',
                  'lon' => '17.9763976',
                  'province_id' => 11,
              ),
          553 =>
              array (
                  'city_name' => 'Człuchów',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.6671796',
                  'lon' => '17.359013',
                  'province_id' => 11,
              ),
          554 =>
              array (
                  'city_name' => 'Czarne',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.6840759',
                  'lon' => '16.9383968',
                  'province_id' => 11,
              ),
          555 =>
              array (
                  'city_name' => 'Debrzno',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.5380522',
                  'lon' => '17.2364118',
                  'province_id' => 11,
              ),
          556 =>
              array (
                  'city_name' => 'Pruszcz Gdański',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.2621505',
                  'lon' => '18.6361725',
                  'province_id' => 11,
              ),
          557 =>
              array (
                  'city_name' => 'Kartuzy',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.3343',
                  'lon' => '18.1972',
                  'province_id' => 11,
              ),
          558 =>
              array (
                  'city_name' => 'Żukowo',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.3420055',
                  'lon' => '18.3650381',
                  'province_id' => 11,
              ),
          559 =>
              array (
                  'city_name' => 'Kościerzyna',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.1222457',
                  'lon' => '17.9812605',
                  'province_id' => 11,
              ),
          560 =>
              array (
                  'city_name' => 'Kwidzyn',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.72635289999999',
                  'lon' => '18.9323043',
                  'province_id' => 11,
              ),
          561 =>
              array (
                  'city_name' => 'Prabuty',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.7558642',
                  'lon' => '19.2045339',
                  'province_id' => 11,
              ),
          562 =>
              array (
                  'city_name' => 'Lębork',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.544642',
                  'lon' => '17.7532511',
                  'province_id' => 11,
              ),
          563 =>
              array (
                  'city_name' => 'Łeba',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.760117',
                  'lon' => '17.5563117',
                  'province_id' => 11,
              ),
          564 =>
              array (
                  'city_name' => 'Malbork',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.0361319',
                  'lon' => '19.0379763',
                  'province_id' => 11,
              ),
          565 =>
              array (
                  'city_name' => 'Nowy Staw',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.13607',
                  'lon' => '19.00874',
                  'province_id' => 11,
              ),
          566 =>
              array (
                  'city_name' => 'Krynica Morska',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.37999130000001',
                  'lon' => '19.4441406',
                  'province_id' => 11,
              ),
          567 =>
              array (
                  'city_name' => 'Nowy Dwór Gdański',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.20800999999999',
                  'lon' => '19.11753',
                  'province_id' => 11,
              ),
          568 =>
              array (
                  'city_name' => 'Hel',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.60838039999999',
                  'lon' => '18.8007998',
                  'province_id' => 11,
              ),
          569 =>
              array (
                  'city_name' => 'Jastarnia',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.6957333',
                  'lon' => '18.6788396',
                  'province_id' => 11,
              ),
          570 =>
              array (
                  'city_name' => 'Puck',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.71804770000001',
                  'lon' => '18.4086339',
                  'province_id' => 11,
              ),
          571 =>
              array (
                  'city_name' => 'Władysławowo',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.79074',
                  'lon' => '18.403',
                  'province_id' => 11,
              ),
          572 =>
              array (
                  'city_name' => 'Ustka',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.5805607',
                  'lon' => '16.861891',
                  'province_id' => 11,
              ),
          573 =>
              array (
                  'city_name' => 'Kępice',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.24052',
                  'lon' => '16.88967',
                  'province_id' => 11,
              ),
          574 =>
              array (
                  'city_name' => 'Czarna Woda',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.84455',
                  'lon' => '18.09998',
                  'province_id' => 11,
              ),
          575 =>
              array (
                  'city_name' => 'Skórcz',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.7937151',
                  'lon' => '18.5248959',
                  'province_id' => 11,
              ),
          576 =>
              array (
                  'city_name' => 'Starogard Gdański',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.965614',
                  'lon' => '18.5162736',
                  'province_id' => 11,
              ),
          577 =>
              array (
                  'city_name' => 'Skarszewy',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.06907',
                  'lon' => '18.4442101',
                  'province_id' => 11,
              ),
          578 =>
              array (
                  'city_name' => 'Tczew',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.0919269',
                  'lon' => '18.7773072',
                  'province_id' => 11,
              ),
          579 =>
              array (
                  'city_name' => 'Gniew',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.83546',
                  'lon' => '18.82249',
                  'province_id' => 11,
              ),
          580 =>
              array (
                  'city_name' => 'Pelplin',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.92831349999999',
                  'lon' => '18.6979422',
                  'province_id' => 11,
              ),
          581 =>
              array (
                  'city_name' => 'Reda',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.6053867',
                  'lon' => '18.3471836',
                  'province_id' => 11,
              ),
          582 =>
              array (
                  'city_name' => 'Rumia',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.5707832',
                  'lon' => '18.3878223',
                  'province_id' => 11,
              ),
          583 =>
              array (
                  'city_name' => 'Wejherowo',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.6003216',
                  'lon' => '18.2330488',
                  'province_id' => 11,
              ),
          584 =>
              array (
                  'city_name' => 'Dzierzgoń',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.92148',
                  'lon' => '19.34723',
                  'province_id' => 11,
              ),
          585 =>
              array (
                  'city_name' => 'Sztum',
                  'province_name' => 'POMORSKIE',
                  'lat' => '53.92085179999999',
                  'lon' => '19.0295929',
                  'province_id' => 11,
              ),
          586 =>
              array (
                  'city_name' => 'Gdańsk',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.35202520000001',
                  'lon' => '18.6466384',
                  'province_id' => 11,
              ),
          587 =>
              array (
                  'city_name' => 'Gdynia',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.5188898',
                  'lon' => '18.5305409',
                  'province_id' => 11,
              ),
          588 =>
              array (
                  'city_name' => 'Słupsk',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.46414799999999',
                  'lon' => '17.0284824',
                  'province_id' => 11,
              ),
          589 =>
              array (
                  'city_name' => 'Sopot',
                  'province_name' => 'POMORSKIE',
                  'lat' => '54.441581',
                  'lon' => '18.5600956',
                  'province_id' => 11,
              ),
          590 =>
              array (
                  'city_name' => 'Będzin',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3255999',
                  'lon' => '19.125412',
                  'province_id' => 12,
              ),
          591 =>
              array (
                  'city_name' => 'Czeladź',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.317273',
                  'lon' => '19.0704415',
                  'province_id' => 12,
              ),
          592 =>
              array (
                  'city_name' => 'Wojkowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.364569',
                  'lon' => '19.03572',
                  'province_id' => 12,
              ),
          593 =>
              array (
                  'city_name' => 'Siewierz',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.4665752',
                  'lon' => '19.2302203',
                  'province_id' => 12,
              ),
          594 =>
              array (
                  'city_name' => 'Sławków',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3045979',
                  'lon' => '19.3880198',
                  'province_id' => 12,
              ),
          595 =>
              array (
                  'city_name' => 'Szczyrk',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.7150006',
                  'lon' => '19.0235999',
                  'province_id' => 12,
              ),
          596 =>
              array (
                  'city_name' => 'Czechowice-Dziedzice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.9016056',
                  'lon' => '18.9917677',
                  'province_id' => 12,
              ),
          597 =>
              array (
                  'city_name' => 'Wilamowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.9166289',
                  'lon' => '19.1520875',
                  'province_id' => 12,
              ),
          598 =>
              array (
                  'city_name' => 'Cieszyn',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.7497638',
                  'lon' => '18.6354709',
                  'province_id' => 12,
              ),
          599 =>
              array (
                  'city_name' => 'Ustroń',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.719657',
                  'lon' => '18.8120576',
                  'province_id' => 12,
              ),
          600 =>
              array (
                  'city_name' => 'Wisła',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.6473215',
                  'lon' => '18.867739',
                  'province_id' => 12,
              ),
          601 =>
              array (
                  'city_name' => 'Skoczów',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.80315119999999',
                  'lon' => '18.790762',
                  'province_id' => 12,
              ),
          602 =>
              array (
                  'city_name' => 'Strumień',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.9168442',
                  'lon' => '18.7639258',
                  'province_id' => 12,
              ),
          603 =>
              array (
                  'city_name' => 'Blachownia',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.78505',
                  'lon' => '18.96224',
                  'province_id' => 12,
              ),
          604 =>
              array (
                  'city_name' => 'Koniecpol',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.77414',
                  'lon' => '19.68924',
                  'province_id' => 12,
              ),
          605 =>
              array (
                  'city_name' => 'Knurów',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.2219315',
                  'lon' => '18.6706469',
                  'province_id' => 12,
              ),
          606 =>
              array (
                  'city_name' => 'Pyskowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.39557929999999',
                  'lon' => '18.6346378',
                  'province_id' => 12,
              ),
          607 =>
              array (
                  'city_name' => 'Sośnicowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.27186409999999',
                  'lon' => '18.5286275',
                  'province_id' => 12,
              ),
          608 =>
              array (
                  'city_name' => 'Toszek',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.4542102',
                  'lon' => '18.522454',
                  'province_id' => 12,
              ),
          609 =>
              array (
                  'city_name' => 'Kłobuck',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.9009168',
                  'lon' => '18.9367931',
                  'province_id' => 12,
              ),
          610 =>
              array (
                  'city_name' => 'Krzepice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.969668',
                  'lon' => '18.7293002',
                  'province_id' => 12,
              ),
          611 =>
              array (
                  'city_name' => 'Lubliniec',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.66873529999999',
                  'lon' => '18.6846192',
                  'province_id' => 12,
              ),
          612 =>
              array (
                  'city_name' => 'Woźniki',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.58846',
                  'lon' => '19.0601901',
                  'province_id' => 12,
              ),
          613 =>
              array (
                  'city_name' => 'Łaziska Górne',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1494',
                  'lon' => '18.8402799',
                  'province_id' => 12,
              ),
          614 =>
              array (
                  'city_name' => 'Mikołów',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1790184',
                  'lon' => '18.9038037',
                  'province_id' => 12,
              ),
          615 =>
              array (
                  'city_name' => 'Orzesze',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1437776',
                  'lon' => '18.7756856',
                  'province_id' => 12,
              ),
          616 =>
              array (
                  'city_name' => 'Myszków',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.5706845',
                  'lon' => '19.3144637',
                  'province_id' => 12,
              ),
          617 =>
              array (
                  'city_name' => 'Koziegłowy',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.59990999999999',
                  'lon' => '19.16304',
                  'province_id' => 12,
              ),
          618 =>
              array (
                  'city_name' => 'Żarki',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.62508',
                  'lon' => '19.3633201',
                  'province_id' => 12,
              ),
          619 =>
              array (
                  'city_name' => 'Pszczyna',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.9857805',
                  'lon' => '18.9477092',
                  'province_id' => 12,
              ),
          620 =>
              array (
                  'city_name' => 'Racibórz',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.0915234',
                  'lon' => '18.2199166',
                  'province_id' => 12,
              ),
          621 =>
              array (
                  'city_name' => 'Krzanowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.0194143',
                  'lon' => '18.1228624',
                  'province_id' => 12,
              ),
          622 =>
              array (
                  'city_name' => 'Kuźnia Raciborska',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.20009',
                  'lon' => '18.31153',
                  'province_id' => 12,
              ),
          623 =>
              array (
                  'city_name' => 'Czerwionka-Leszczyny',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1489305',
                  'lon' => '18.6774678',
                  'province_id' => 12,
              ),
          624 =>
              array (
                  'city_name' => 'Kalety',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.56501000000001',
                  'lon' => '18.88256',
                  'province_id' => 12,
              ),
          625 =>
              array (
                  'city_name' => 'Miasteczko Śląskie',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.5018744',
                  'lon' => '18.9394888',
                  'province_id' => 12,
              ),
          626 =>
              array (
                  'city_name' => 'Radzionków',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3998141',
                  'lon' => '18.9017625',
                  'province_id' => 12,
              ),
          627 =>
              array (
                  'city_name' => 'Tarnowskie Góry',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.4359468',
                  'lon' => '18.8460247',
                  'province_id' => 12,
              ),
          628 =>
              array (
                  'city_name' => 'Bieruń',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.08999',
                  'lon' => '19.09291',
                  'province_id' => 12,
              ),
          629 =>
              array (
                  'city_name' => 'Imielin',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.145287',
                  'lon' => '19.1860157',
                  'province_id' => 12,
              ),
          630 =>
              array (
                  'city_name' => 'Lędziny',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1425364',
                  'lon' => '19.1310539',
                  'province_id' => 12,
              ),
          631 =>
              array (
                  'city_name' => 'Pszów',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.0400034',
                  'lon' => '18.3943992',
                  'province_id' => 12,
              ),
          632 =>
              array (
                  'city_name' => 'Radlin',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.0491414',
                  'lon' => '18.4768769',
                  'province_id' => 12,
              ),
          633 =>
              array (
                  'city_name' => 'Rydułtowy',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.057879',
                  'lon' => '18.4173821',
                  'province_id' => 12,
              ),
          634 =>
              array (
                  'city_name' => 'Wodzisław Śląski',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.003137',
                  'lon' => '18.4719102',
                  'province_id' => 12,
              ),
          635 =>
              array (
                  'city_name' => 'Poręba',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.48803',
                  'lon' => '19.3389389',
                  'province_id' => 12,
              ),
          636 =>
              array (
                  'city_name' => 'Zawiercie',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.48774299999999',
                  'lon' => '19.4166258',
                  'province_id' => 12,
              ),
          637 =>
              array (
                  'city_name' => 'Łazy',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.427118',
                  'lon' => '19.3948375',
                  'province_id' => 12,
              ),
          638 =>
              array (
                  'city_name' => 'Ogrodzieniec',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.45124999999999',
                  'lon' => '19.51903',
                  'province_id' => 12,
              ),
          639 =>
              array (
                  'city_name' => 'Pilica',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.467465',
                  'lon' => '19.6573856',
                  'province_id' => 12,
              ),
          640 =>
              array (
                  'city_name' => 'Szczekociny',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.62757999999999',
                  'lon' => '19.8255',
                  'province_id' => 12,
              ),
          641 =>
              array (
                  'city_name' => 'Żywiec',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.6912999',
                  'lon' => '19.1823983',
                  'province_id' => 12,
              ),
          642 =>
              array (
                  'city_name' => 'Bielsko-Biała',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.8223768',
                  'lon' => '19.0583845',
                  'province_id' => 12,
              ),
          643 =>
              array (
                  'city_name' => 'Bytom',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3483816',
                  'lon' => '18.9157176',
                  'province_id' => 12,
              ),
          644 =>
              array (
                  'city_name' => 'Chorzów',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.2974884',
                  'lon' => '18.9545728',
                  'province_id' => 12,
              ),
          645 =>
              array (
                  'city_name' => 'Częstochowa',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.8118195',
                  'lon' => '19.1203094',
                  'province_id' => 12,
              ),
          646 =>
              array (
                  'city_name' => 'Dąbrowa Górnicza',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3216897',
                  'lon' => '19.1949126',
                  'province_id' => 12,
              ),
          647 =>
              array (
                  'city_name' => 'Gliwice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.29449229999999',
                  'lon' => '18.6713802',
                  'province_id' => 12,
              ),
          648 =>
              array (
                  'city_name' => 'Jastrzębie-Zdrój',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '49.9454207',
                  'lon' => '18.6101103',
                  'province_id' => 12,
              ),
          649 =>
              array (
                  'city_name' => 'Jaworzno',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.204987',
                  'lon' => '19.2739314',
                  'province_id' => 12,
              ),
          650 =>
              array (
                  'city_name' => 'Katowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.26489189999999',
                  'lon' => '19.0237815',
                  'province_id' => 12,
              ),
          651 =>
              array (
                  'city_name' => 'Mysłowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.2080466',
                  'lon' => '19.1660513',
                  'province_id' => 12,
              ),
          652 =>
              array (
                  'city_name' => 'Piekary Śląskie',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3789108',
                  'lon' => '18.9270475',
                  'province_id' => 12,
              ),
          653 =>
              array (
                  'city_name' => 'Ruda Śląska',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.2558286',
                  'lon' => '18.8555704',
                  'province_id' => 12,
              ),
          654 =>
              array (
                  'city_name' => 'Rybnik',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.1021742',
                  'lon' => '18.5462847',
                  'province_id' => 12,
              ),
          655 =>
              array (
                  'city_name' => 'Siemianowice Śląskie',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3264314',
                  'lon' => '19.0295714',
                  'province_id' => 12,
              ),
          656 =>
              array (
                  'city_name' => 'Sosnowiec',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.28626380000001',
                  'lon' => '19.1040791',
                  'province_id' => 12,
              ),
          657 =>
              array (
                  'city_name' => 'Świętochłowice',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.2964328',
                  'lon' => '18.9171298',
                  'province_id' => 12,
              ),
          658 =>
              array (
                  'city_name' => 'Tychy',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.12180069999999',
                  'lon' => '19.0200023',
                  'province_id' => 12,
              ),
          659 =>
              array (
                  'city_name' => 'Zabrze',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.3249278',
                  'lon' => '18.7857186',
                  'province_id' => 12,
              ),
          660 =>
              array (
                  'city_name' => 'Żory',
                  'province_name' => 'ŚLĄSKIE',
                  'lat' => '50.0447236',
                  'lon' => '18.7006401',
                  'province_id' => 12,
              ),
          661 =>
              array (
                  'city_name' => 'Busko-Zdrój',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.47036199999999',
                  'lon' => '20.7191757',
                  'province_id' => 13,
              ),
          662 =>
              array (
                  'city_name' => 'Stopnica',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.4406629',
                  'lon' => '20.938154',
                  'province_id' => 13,
              ),
          663 =>
              array (
                  'city_name' => 'Jędrzejów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.639337',
                  'lon' => '20.3038771',
                  'province_id' => 13,
              ),
          664 =>
              array (
                  'city_name' => 'Małogoszcz',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8121157',
                  'lon' => '20.2650979',
                  'province_id' => 13,
              ),
          665 =>
              array (
                  'city_name' => 'Sędziszów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.565562',
                  'lon' => '20.0553412',
                  'province_id' => 13,
              ),
          666 =>
              array (
                  'city_name' => 'Kazimierza Wielka',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.26542',
                  'lon' => '20.49344',
                  'province_id' => 13,
              ),
          667 =>
              array (
                  'city_name' => 'Skalbmierz',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.31971129999999',
                  'lon' => '20.3992492',
                  'province_id' => 13,
              ),
          668 =>
              array (
                  'city_name' => 'Bodzentyn',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.94092449999999',
                  'lon' => '20.9571249',
                  'province_id' => 13,
              ),
          669 =>
              array (
                  'city_name' => 'Chęciny',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.80544889999999',
                  'lon' => '20.4781219',
                  'province_id' => 13,
              ),
          670 =>
              array (
                  'city_name' => 'Chmielnik',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.61415',
                  'lon' => '20.75212',
                  'province_id' => 13,
              ),
          671 =>
              array (
                  'city_name' => 'Daleszyce',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8022561',
                  'lon' => '20.80789',
                  'province_id' => 13,
              ),
          672 =>
              array (
                  'city_name' => 'Końskie',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.19146929999999',
                  'lon' => '20.4068498',
                  'province_id' => 13,
              ),
          673 =>
              array (
                  'city_name' => 'Stąporków',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.13737',
                  'lon' => '20.57188',
                  'province_id' => 13,
              ),
          674 =>
              array (
                  'city_name' => 'Opatów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8018537',
                  'lon' => '21.427194',
                  'province_id' => 13,
              ),
          675 =>
              array (
                  'city_name' => 'Ożarów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.88758',
                  'lon' => '21.66654',
                  'province_id' => 13,
              ),
          676 =>
              array (
                  'city_name' => 'Ostrowiec Świętokrzyski',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.9295234',
                  'lon' => '21.3851914',
                  'province_id' => 13,
              ),
          677 =>
              array (
                  'city_name' => 'Ćmielów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8900563',
                  'lon' => '21.5149892',
                  'province_id' => 13,
              ),
          678 =>
              array (
                  'city_name' => 'Kunów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.9614392',
                  'lon' => '21.2804169',
                  'province_id' => 13,
              ),
          679 =>
              array (
                  'city_name' => 'Działoszyce',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.3651987',
                  'lon' => '20.3520979',
                  'province_id' => 13,
              ),
          680 =>
              array (
                  'city_name' => 'Pińczów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.52034',
                  'lon' => '20.5264571',
                  'province_id' => 13,
              ),
          681 =>
              array (
                  'city_name' => 'Sandomierz',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.6822405',
                  'lon' => '21.7501781',
                  'province_id' => 13,
              ),
          682 =>
              array (
                  'city_name' => 'Koprzywnica',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.59302210000001',
                  'lon' => '21.5852479',
                  'province_id' => 13,
              ),
          683 =>
              array (
                  'city_name' => 'Zawichost',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8075698',
                  'lon' => '21.8528832',
                  'province_id' => 13,
              ),
          684 =>
              array (
                  'city_name' => 'Skarżysko-Kamienna',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.114294',
                  'lon' => '20.8477827',
                  'province_id' => 13,
              ),
          685 =>
              array (
                  'city_name' => 'Suchedniów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.04761999999999',
                  'lon' => '20.8292701',
                  'province_id' => 13,
              ),
          686 =>
              array (
                  'city_name' => 'Starachowice',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.0368289',
                  'lon' => '21.070977',
                  'province_id' => 13,
              ),
          687 =>
              array (
                  'city_name' => 'Wąchock',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '51.07359',
                  'lon' => '21.0124401',
                  'province_id' => 13,
              ),
          688 =>
              array (
                  'city_name' => 'Osiek',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.5132635',
                  'lon' => '21.4201958',
                  'province_id' => 13,
              ),
          689 =>
              array (
                  'city_name' => 'Połaniec',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.43302',
                  'lon' => '21.28065',
                  'province_id' => 13,
              ),
          690 =>
              array (
                  'city_name' => 'Staszów',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.5629974',
                  'lon' => '21.1659309',
                  'province_id' => 13,
              ),
          691 =>
              array (
                  'city_name' => 'Włoszczowa',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.85237',
                  'lon' => '19.9677201',
                  'province_id' => 13,
              ),
          692 =>
              array (
                  'city_name' => 'Kielce',
                  'province_name' => 'ŚWIĘTOKRZYSKIE',
                  'lat' => '50.8660773',
                  'lon' => '20.6285676',
                  'province_id' => 13,
              ),
          693 =>
              array (
                  'city_name' => 'Bartoszyce',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.2533',
                  'lon' => '20.80806',
                  'province_id' => 14,
              ),
          694 =>
              array (
                  'city_name' => 'Górowo Iławeckie',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.28534',
                  'lon' => '20.49296',
                  'province_id' => 14,
              ),
          695 =>
              array (
                  'city_name' => 'Bisztynek',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.0858374',
                  'lon' => '20.9038564',
                  'province_id' => 14,
              ),
          696 =>
              array (
                  'city_name' => 'Sępopol',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.2690259',
                  'lon' => '21.0143445',
                  'province_id' => 14,
              ),
          697 =>
              array (
                  'city_name' => 'Braniewo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.3797128',
                  'lon' => '19.8200536',
                  'province_id' => 14,
              ),
          698 =>
              array (
                  'city_name' => 'Frombork',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.3574777',
                  'lon' => '19.6800723',
                  'province_id' => 14,
              ),
          699 =>
              array (
                  'city_name' => 'Pieniężno',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.236292',
                  'lon' => '20.1285899',
                  'province_id' => 14,
              ),
          700 =>
              array (
                  'city_name' => 'Działdowo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.2356765',
                  'lon' => '20.1799787',
                  'province_id' => 14,
              ),
          701 =>
              array (
                  'city_name' => 'Lidzbark',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.2625544',
                  'lon' => '19.826521',
                  'province_id' => 14,
              ),
          702 =>
              array (
                  'city_name' => 'Młynary',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.18631689999999',
                  'lon' => '19.7204087',
                  'province_id' => 14,
              ),
          703 =>
              array (
                  'city_name' => 'Pasłęk',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.0619067',
                  'lon' => '19.6640682',
                  'province_id' => 14,
              ),
          704 =>
              array (
                  'city_name' => 'Tolkmicko',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.32020470000001',
                  'lon' => '19.5273042',
                  'province_id' => 14,
              ),
          705 =>
              array (
                  'city_name' => 'Ełk',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.8280529',
                  'lon' => '22.3646629',
                  'province_id' => 14,
              ),
          706 =>
              array (
                  'city_name' => 'Giżycko',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.03640499999999',
                  'lon' => '21.7667342',
                  'province_id' => 14,
              ),
          707 =>
              array (
                  'city_name' => 'Ryn',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.93811',
                  'lon' => '21.54633',
                  'province_id' => 14,
              ),
          708 =>
              array (
                  'city_name' => 'Iława',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.5959811',
                  'lon' => '19.5684103',
                  'province_id' => 14,
              ),
          709 =>
              array (
                  'city_name' => 'Lubawa',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.50315999999999',
                  'lon' => '19.7520301',
                  'province_id' => 14,
              ),
          710 =>
              array (
                  'city_name' => 'Kisielice',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.6085352',
                  'lon' => '19.2636541',
                  'province_id' => 14,
              ),
          711 =>
              array (
                  'city_name' => 'Susz',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.71702999999999',
                  'lon' => '19.33541',
                  'province_id' => 14,
              ),
          712 =>
              array (
                  'city_name' => 'Zalewo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.8458953',
                  'lon' => '19.6034448',
                  'province_id' => 14,
              ),
          713 =>
              array (
                  'city_name' => 'Kętrzyn',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.07657',
                  'lon' => '21.3750399',
                  'province_id' => 14,
              ),
          714 =>
              array (
                  'city_name' => 'Korsze',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.16967',
                  'lon' => '21.13909',
                  'province_id' => 14,
              ),
          715 =>
              array (
                  'city_name' => 'Reszel',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.0498',
                  'lon' => '21.1458001',
                  'province_id' => 14,
              ),
          716 =>
              array (
                  'city_name' => 'Lidzbark Warmiński',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.1249116',
                  'lon' => '20.5859507',
                  'province_id' => 14,
              ),
          717 =>
              array (
                  'city_name' => 'Orneta',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.11537999999999',
                  'lon' => '20.1302301',
                  'province_id' => 14,
              ),
          718 =>
              array (
                  'city_name' => 'Mrągowo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.8641596',
                  'lon' => '21.3048734',
                  'province_id' => 14,
              ),
          719 =>
              array (
                  'city_name' => 'Mikołajki',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.8027021',
                  'lon' => '21.5706044',
                  'province_id' => 14,
              ),
          720 =>
              array (
                  'city_name' => 'Nidzica',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.360814',
                  'lon' => '20.4274873',
                  'province_id' => 14,
              ),
          721 =>
              array (
                  'city_name' => 'Nowe Miasto Lubawskie',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.42232',
                  'lon' => '19.59222',
                  'province_id' => 14,
              ),
          722 =>
              array (
                  'city_name' => 'Olecko',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.0337279',
                  'lon' => '22.5069432',
                  'province_id' => 14,
              ),
          723 =>
              array (
                  'city_name' => 'Barczewo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.82999',
                  'lon' => '20.6905801',
                  'province_id' => 14,
              ),
          724 =>
              array (
                  'city_name' => 'Biskupiec',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.8626958',
                  'lon' => '20.9547075',
                  'province_id' => 14,
              ),
          725 =>
              array (
                  'city_name' => 'Dobre Miasto',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.9867',
                  'lon' => '20.39746',
                  'province_id' => 14,
              ),
          726 =>
              array (
                  'city_name' => 'Jeziorany',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.9755261',
                  'lon' => '20.7461768',
                  'province_id' => 14,
              ),
          727 =>
              array (
                  'city_name' => 'Olsztynek',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.58244',
                  'lon' => '20.2827',
                  'province_id' => 14,
              ),
          728 =>
              array (
                  'city_name' => 'Ostróda',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.69630069999999',
                  'lon' => '19.9647952',
                  'province_id' => 14,
              ),
          729 =>
              array (
                  'city_name' => 'Miłakowo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.0085653',
                  'lon' => '20.0706038',
                  'province_id' => 14,
              ),
          730 =>
              array (
                  'city_name' => 'Miłomłyn',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.764338',
                  'lon' => '19.8380874',
                  'province_id' => 14,
              ),
          731 =>
              array (
                  'city_name' => 'Morąg',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.9160398',
                  'lon' => '19.9279337',
                  'province_id' => 14,
              ),
          732 =>
              array (
                  'city_name' => 'Biała Piska',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.6115',
                  'lon' => '22.06311',
                  'province_id' => 14,
              ),
          733 =>
              array (
                  'city_name' => 'Orzysz',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.80989',
                  'lon' => '21.9473',
                  'province_id' => 14,
              ),
          734 =>
              array (
                  'city_name' => 'Pisz',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.62894',
                  'lon' => '21.81237',
                  'province_id' => 14,
              ),
          735 =>
              array (
                  'city_name' => 'Ruciane-Nida',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.6416538',
                  'lon' => '21.5398707',
                  'province_id' => 14,
              ),
          736 =>
              array (
                  'city_name' => 'Szczytno',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.56354',
                  'lon' => '20.99519',
                  'province_id' => 14,
              ),
          737 =>
              array (
                  'city_name' => 'Pasym',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.650729',
                  'lon' => '20.7919322',
                  'province_id' => 14,
              ),
          738 =>
              array (
                  'city_name' => 'Gołdap',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.3069111',
                  'lon' => '22.3034477',
                  'province_id' => 14,
              ),
          739 =>
              array (
                  'city_name' => 'Węgorzewo',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.21359',
                  'lon' => '21.7416301',
                  'province_id' => 14,
              ),
          740 =>
              array (
                  'city_name' => 'Elbląg',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '54.1560613',
                  'lon' => '19.4044897',
                  'province_id' => 14,
              ),
          741 =>
              array (
                  'city_name' => 'Olsztyn',
                  'province_name' => 'WARMIŃSKO-MAZURSKIE',
                  'lat' => '53.778422',
                  'lon' => '20.4801192',
                  'province_id' => 14,
              ),
          742 =>
              array (
                  'city_name' => 'Chodzież',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.995267',
                  'lon' => '16.9198184',
                  'province_id' => 15,
              ),
          743 =>
              array (
                  'city_name' => 'Margonin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.9731367',
                  'lon' => '17.0947488',
                  'province_id' => 15,
              ),
          744 =>
              array (
                  'city_name' => 'Szamocin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.0298854',
                  'lon' => '17.1246243',
                  'province_id' => 15,
              ),
          745 =>
              array (
                  'city_name' => 'Czarnków',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.90528',
                  'lon' => '16.56567',
                  'province_id' => 15,
              ),
          746 =>
              array (
                  'city_name' => 'Krzyż Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.88081',
                  'lon' => '16.01119',
                  'province_id' => 15,
              ),
          747 =>
              array (
                  'city_name' => 'Trzcianka',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.0418691',
                  'lon' => '16.4616756',
                  'province_id' => 15,
              ),
          748 =>
              array (
                  'city_name' => 'Wieleń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.8943926',
                  'lon' => '16.1713009',
                  'province_id' => 15,
              ),
          749 =>
              array (
                  'city_name' => 'Gniezno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.5349253',
                  'lon' => '17.5826575',
                  'province_id' => 15,
              ),
          750 =>
              array (
                  'city_name' => 'Czerniejewo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.42622739999999',
                  'lon' => '17.4890829',
                  'province_id' => 15,
              ),
          751 =>
              array (
                  'city_name' => 'Kłecko',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.6316439',
                  'lon' => '17.4306461',
                  'province_id' => 15,
              ),
          752 =>
              array (
                  'city_name' => 'Trzemeszno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.56166',
                  'lon' => '17.82264',
                  'province_id' => 15,
              ),
          753 =>
              array (
                  'city_name' => 'Witkowo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.43843',
                  'lon' => '17.77321',
                  'province_id' => 15,
              ),
          754 =>
              array (
                  'city_name' => 'Borek Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.91673',
                  'lon' => '17.2409601',
                  'province_id' => 15,
              ),
          755 =>
              array (
                  'city_name' => 'Gostyń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.8786',
                  'lon' => '17.01215',
                  'province_id' => 15,
              ),
          756 =>
              array (
                  'city_name' => 'Krobia',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.774',
                  'lon' => '16.98399',
                  'province_id' => 15,
              ),
          757 =>
              array (
                  'city_name' => 'Pogorzela',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.8219084',
                  'lon' => '17.2292971',
                  'province_id' => 15,
              ),
          758 =>
              array (
                  'city_name' => 'Poniec',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7633843',
                  'lon' => '16.808734',
                  'province_id' => 15,
              ),
          759 =>
              array (
                  'city_name' => 'Grodzisk Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.22553',
                  'lon' => '16.36644',
                  'province_id' => 15,
              ),
          760 =>
              array (
                  'city_name' => 'Rakoniewice',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.1388364',
                  'lon' => '16.2733584',
                  'province_id' => 15,
              ),
          761 =>
              array (
                  'city_name' => 'Wielichowo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.1155638',
                  'lon' => '16.3514938',
                  'province_id' => 15,
              ),
          762 =>
              array (
                  'city_name' => 'Jaraczewo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9688195',
                  'lon' => '17.297184',
                  'province_id' => 15,
              ),
          763 =>
              array (
                  'city_name' => 'Jarocin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9724492',
                  'lon' => '17.5019414',
                  'province_id' => 15,
              ),
          764 =>
              array (
                  'city_name' => 'Żerków',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0685167',
                  'lon' => '17.5629153',
                  'province_id' => 15,
              ),
          765 =>
              array (
                  'city_name' => 'Stawiszyn',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9177602',
                  'lon' => '18.1117273',
                  'province_id' => 15,
              ),
          766 =>
              array (
                  'city_name' => 'Kępno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.2781356',
                  'lon' => '17.9890591',
                  'province_id' => 15,
              ),
          767 =>
              array (
                  'city_name' => 'Koło',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.19986',
                  'lon' => '18.63847',
                  'province_id' => 15,
              ),
          768 =>
              array (
                  'city_name' => 'Dąbie',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0872281',
                  'lon' => '18.8224372',
                  'province_id' => 15,
              ),
          769 =>
              array (
                  'city_name' => 'Kłodawa',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.2542661',
                  'lon' => '18.9134684',
                  'province_id' => 15,
              ),
          770 =>
              array (
                  'city_name' => 'Przedecz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.3342682',
                  'lon' => '18.8991063',
                  'province_id' => 15,
              ),
          771 =>
              array (
                  'city_name' => 'Golina',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.2428641',
                  'lon' => '18.0927297',
                  'province_id' => 15,
              ),
          772 =>
              array (
                  'city_name' => 'Kleczew',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.37048',
                  'lon' => '18.1771601',
                  'province_id' => 15,
              ),
          773 =>
              array (
                  'city_name' => 'Rychwał',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0697452',
                  'lon' => '18.1662713',
                  'province_id' => 15,
              ),
          774 =>
              array (
                  'city_name' => 'Sompolno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.38826',
                  'lon' => '18.50286',
                  'province_id' => 15,
              ),
          775 =>
              array (
                  'city_name' => 'Ślesin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.37034999999999',
                  'lon' => '18.30639',
                  'province_id' => 15,
              ),
          776 =>
              array (
                  'city_name' => 'Kościan',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0816122',
                  'lon' => '16.6385474',
                  'province_id' => 15,
              ),
          777 =>
              array (
                  'city_name' => 'Czempiń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.1426031',
                  'lon' => '16.7591522',
                  'province_id' => 15,
              ),
          778 =>
              array (
                  'city_name' => 'Krzywiń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9629815',
                  'lon' => '16.8198962',
                  'province_id' => 15,
              ),
          779 =>
              array (
                  'city_name' => 'Śmigiel',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.01327',
                  'lon' => '16.52708',
                  'province_id' => 15,
              ),
          780 =>
              array (
                  'city_name' => 'Sulmierzyce',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.6059265',
                  'lon' => '17.5307939',
                  'province_id' => 15,
              ),
          781 =>
              array (
                  'city_name' => 'Kobylin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7157581',
                  'lon' => '17.2266796',
                  'province_id' => 15,
              ),
          782 =>
              array (
                  'city_name' => 'Koźmin Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.82709000000001',
                  'lon' => '17.4539199',
                  'province_id' => 15,
              ),
          783 =>
              array (
                  'city_name' => 'Krotoszyn',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.6965283',
                  'lon' => '17.4359425',
                  'province_id' => 15,
              ),
          784 =>
              array (
                  'city_name' => 'Zduny',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.64682999999999',
                  'lon' => '17.37824',
                  'province_id' => 15,
              ),
          785 =>
              array (
                  'city_name' => 'Osieczna',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.90398820000001',
                  'lon' => '16.6783382',
                  'province_id' => 15,
              ),
          786 =>
              array (
                  'city_name' => 'Rydzyna',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7864657',
                  'lon' => '16.667577',
                  'province_id' => 15,
              ),
          787 =>
              array (
                  'city_name' => 'Międzychód',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.59855',
                  'lon' => '15.89254',
                  'province_id' => 15,
              ),
          788 =>
              array (
                  'city_name' => 'Sieraków',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.65088',
                  'lon' => '16.07973',
                  'province_id' => 15,
              ),
          789 =>
              array (
                  'city_name' => 'Lwówek',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.4479565',
                  'lon' => '16.1810373',
                  'province_id' => 15,
              ),
          790 =>
              array (
                  'city_name' => 'Nowy Tomyśl',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.3181885',
                  'lon' => '16.1282552',
                  'province_id' => 15,
              ),
          791 =>
              array (
                  'city_name' => 'Opalenica',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.30876',
                  'lon' => '16.4127999',
                  'province_id' => 15,
              ),
          792 =>
              array (
                  'city_name' => 'Zbąszyń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.25053',
                  'lon' => '15.92527',
                  'province_id' => 15,
              ),
          793 =>
              array (
                  'city_name' => 'Oborniki',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.6448607',
                  'lon' => '16.8141991',
                  'province_id' => 15,
              ),
          794 =>
              array (
                  'city_name' => 'Rogoźno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.74965',
                  'lon' => '17.00343',
                  'province_id' => 15,
              ),
          795 =>
              array (
                  'city_name' => 'Ostrów Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.6549856',
                  'lon' => '17.8068258',
                  'province_id' => 15,
              ),
          796 =>
              array (
                  'city_name' => 'Nowe Skalmierzyce',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7111719',
                  'lon' => '17.993399',
                  'province_id' => 15,
              ),
          797 =>
              array (
                  'city_name' => 'Odolanów',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.57429',
                  'lon' => '17.67392',
                  'province_id' => 15,
              ),
          798 =>
              array (
                  'city_name' => 'Raszków',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7181762',
                  'lon' => '17.7257496',
                  'province_id' => 15,
              ),
          799 =>
              array (
                  'city_name' => 'Grabów nad Prosną',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.5060692',
                  'lon' => '18.1193611',
                  'province_id' => 15,
              ),
          800 =>
              array (
                  'city_name' => 'Mikstat',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.53209560000001',
                  'lon' => '17.9737831',
                  'province_id' => 15,
              ),
          801 =>
              array (
                  'city_name' => 'Ostrzeszów',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.42581999999999',
                  'lon' => '17.93378',
                  'province_id' => 15,
              ),
          802 =>
              array (
                  'city_name' => 'Piła',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.1509671',
                  'lon' => '16.7382266',
                  'province_id' => 15,
              ),
          803 =>
              array (
                  'city_name' => 'Łobżenica',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.2622714',
                  'lon' => '17.2557665',
                  'province_id' => 15,
              ),
          804 =>
              array (
                  'city_name' => 'Ujście',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.05311',
                  'lon' => '16.7323201',
                  'province_id' => 15,
              ),
          805 =>
              array (
                  'city_name' => 'Wyrzysk',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.15244',
                  'lon' => '17.26802',
                  'province_id' => 15,
              ),
          806 =>
              array (
                  'city_name' => 'Wysoka',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.180879',
                  'lon' => '17.0835566',
                  'province_id' => 15,
              ),
          807 =>
              array (
                  'city_name' => 'Chocz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9757979',
                  'lon' => '17.8695452',
                  'province_id' => 15,
              ),
          808 =>
              array (
                  'city_name' => 'Dobrzyca',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.8614232',
                  'lon' => '17.5879327',
                  'province_id' => 15,
              ),
          809 =>
              array (
                  'city_name' => 'Pleszew',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.8963285',
                  'lon' => '17.7870549',
                  'province_id' => 15,
              ),
          810 =>
              array (
                  'city_name' => 'Luboń',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.3461661',
                  'lon' => '16.8773762',
                  'province_id' => 15,
              ),
          811 =>
              array (
                  'city_name' => 'Puszczykowo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.2866049',
                  'lon' => '16.8494869',
                  'province_id' => 15,
              ),
          812 =>
              array (
                  'city_name' => 'Buk',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.35536',
                  'lon' => '16.519559',
                  'province_id' => 15,
              ),
          813 =>
              array (
                  'city_name' => 'Kostrzyn',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.3979',
                  'lon' => '17.2280901',
                  'province_id' => 15,
              ),
          814 =>
              array (
                  'city_name' => 'Kórnik',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.2467738',
                  'lon' => '17.0901297',
                  'province_id' => 15,
              ),
          815 =>
              array (
                  'city_name' => 'Mosina',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.24540690000001',
                  'lon' => '16.8470545',
                  'province_id' => 15,
              ),
          816 =>
              array (
                  'city_name' => 'Murowana Goślina',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.5738181',
                  'lon' => '17.008658',
                  'province_id' => 15,
              ),
          817 =>
              array (
                  'city_name' => 'Pobiedziska',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.47747',
                  'lon' => '17.2880008',
                  'province_id' => 15,
              ),
          818 =>
              array (
                  'city_name' => 'Stęszew',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.28375',
                  'lon' => '16.7007399',
                  'province_id' => 15,
              ),
          819 =>
              array (
                  'city_name' => 'Swarzędz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.41253709999999',
                  'lon' => '17.0855511',
                  'province_id' => 15,
              ),
          820 =>
              array (
                  'city_name' => 'Bojanowo',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.7074688',
                  'lon' => '16.7482949',
                  'province_id' => 15,
              ),
          821 =>
              array (
                  'city_name' => 'Jutrosin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.6522585',
                  'lon' => '17.1688525',
                  'province_id' => 15,
              ),
          822 =>
              array (
                  'city_name' => 'Miejska Górka',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.6551687',
                  'lon' => '16.9564844',
                  'province_id' => 15,
              ),
          823 =>
              array (
                  'city_name' => 'Rawicz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.60945',
                  'lon' => '16.85863',
                  'province_id' => 15,
              ),
          824 =>
              array (
                  'city_name' => 'Słupca',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.287267',
                  'lon' => '17.8720745',
                  'province_id' => 15,
              ),
          825 =>
              array (
                  'city_name' => 'Zagórów',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.1682974',
                  'lon' => '17.8955629',
                  'province_id' => 15,
              ),
          826 =>
              array (
                  'city_name' => 'Obrzycko',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.7029536',
                  'lon' => '16.5270775',
                  'province_id' => 15,
              ),
          827 =>
              array (
                  'city_name' => 'Ostroróg',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.626727',
                  'lon' => '16.4511988',
                  'province_id' => 15,
              ),
          828 =>
              array (
                  'city_name' => 'Pniewy',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.5089047',
                  'lon' => '16.2567164',
                  'province_id' => 15,
              ),
          829 =>
              array (
                  'city_name' => 'Szamotuły',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.6116547',
                  'lon' => '16.5779047',
                  'province_id' => 15,
              ),
          830 =>
              array (
                  'city_name' => 'Wronki',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.7103395',
                  'lon' => '16.3803948',
                  'province_id' => 15,
              ),
          831 =>
              array (
                  'city_name' => 'Środa Wielkopolska',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.22908',
                  'lon' => '17.27607',
                  'province_id' => 15,
              ),
          832 =>
              array (
                  'city_name' => 'Dolsk',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9817834',
                  'lon' => '17.0627666',
                  'province_id' => 15,
              ),
          833 =>
              array (
                  'city_name' => 'Książ Wielkopolski',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.06090409999999',
                  'lon' => '17.239347',
                  'province_id' => 15,
              ),
          834 =>
              array (
                  'city_name' => 'Śrem',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0887',
                  'lon' => '17.01506',
                  'province_id' => 15,
              ),
          835 =>
              array (
                  'city_name' => 'Turek',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0145541',
                  'lon' => '18.5009145',
                  'province_id' => 15,
              ),
          836 =>
              array (
                  'city_name' => 'Dobra',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.9160305',
                  'lon' => '18.6152438',
                  'province_id' => 15,
              ),
          837 =>
              array (
                  'city_name' => 'Tuliszków',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.0764732',
                  'lon' => '18.2955497',
                  'province_id' => 15,
              ),
          838 =>
              array (
                  'city_name' => 'Wągrowiec',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.80848',
                  'lon' => '17.19966',
                  'province_id' => 15,
              ),
          839 =>
              array (
                  'city_name' => 'Gołańcz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.9432129',
                  'lon' => '17.2996897',
                  'province_id' => 15,
              ),
          840 =>
              array (
                  'city_name' => 'Skoki',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.67225999999999',
                  'lon' => '17.1606199',
                  'province_id' => 15,
              ),
          841 =>
              array (
                  'city_name' => 'Wolsztyn',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.11504350000001',
                  'lon' => '16.1169851',
                  'province_id' => 15,
              ),
          842 =>
              array (
                  'city_name' => 'Miłosław',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.20307',
                  'lon' => '17.48955',
                  'province_id' => 15,
              ),
          843 =>
              array (
                  'city_name' => 'Nekla',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.3648742',
                  'lon' => '17.4133285',
                  'province_id' => 15,
              ),
          844 =>
              array (
                  'city_name' => 'Pyzdry',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.17057639999999',
                  'lon' => '17.6900802',
                  'province_id' => 15,
              ),
          845 =>
              array (
                  'city_name' => 'Września',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.32382',
                  'lon' => '17.56654',
                  'province_id' => 15,
              ),
          846 =>
              array (
                  'city_name' => 'Złotów',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.36381',
                  'lon' => '17.04046',
                  'province_id' => 15,
              ),
          847 =>
              array (
                  'city_name' => 'Jastrowie',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.42049',
                  'lon' => '16.81504',
                  'province_id' => 15,
              ),
          848 =>
              array (
                  'city_name' => 'Krajenka',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.29667',
                  'lon' => '16.99062',
                  'province_id' => 15,
              ),
          849 =>
              array (
                  'city_name' => 'Okonek',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '53.53584000000001',
                  'lon' => '16.8521099',
                  'province_id' => 15,
              ),
          850 =>
              array (
                  'city_name' => 'Kalisz',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.76727990000001',
                  'lon' => '18.0853462',
                  'province_id' => 15,
              ),
          851 =>
              array (
                  'city_name' => 'Konin',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.2230334',
                  'lon' => '18.251073',
                  'province_id' => 15,
              ),
          852 =>
              array (
                  'city_name' => 'Leszno',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '51.8419861',
                  'lon' => '16.5937545',
                  'province_id' => 15,
              ),
          853 =>
              array (
                  'city_name' => 'Poznań',
                  'province_name' => 'WIELKOPOLSKIE',
                  'lat' => '52.406374',
                  'lon' => '16.9251681',
                  'province_id' => 15,
              ),
          854 =>
              array (
                  'city_name' => 'Białogard',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.0029007',
                  'lon' => '15.9921375',
                  'province_id' => 16,
              ),
          855 =>
              array (
                  'city_name' => 'Karlino',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.03351',
                  'lon' => '15.8769',
                  'province_id' => 16,
              ),
          856 =>
              array (
                  'city_name' => 'Tychowo',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.9282701',
                  'lon' => '16.2579143',
                  'province_id' => 16,
              ),
          857 =>
              array (
                  'city_name' => 'Choszczno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.16928',
                  'lon' => '15.41971',
                  'province_id' => 16,
              ),
          858 =>
              array (
                  'city_name' => 'Drawno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.21982999999999',
                  'lon' => '15.75932',
                  'province_id' => 16,
              ),
          859 =>
              array (
                  'city_name' => 'Pełczyce',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.04311999999999',
                  'lon' => '15.30489',
                  'province_id' => 16,
              ),
          860 =>
              array (
                  'city_name' => 'Recz',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.26014',
                  'lon' => '15.55114',
                  'province_id' => 16,
              ),
          861 =>
              array (
                  'city_name' => 'Czaplinek',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.55802',
                  'lon' => '16.233519',
                  'province_id' => 16,
              ),
          862 =>
              array (
                  'city_name' => 'Drawsko Pomorskie',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.5316199',
                  'lon' => '15.8138245',
                  'province_id' => 16,
              ),
          863 =>
              array (
                  'city_name' => 'Kalisz Pomorski',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.29862',
                  'lon' => '15.90598',
                  'province_id' => 16,
              ),
          864 =>
              array (
                  'city_name' => 'Złocieniec',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.5326',
                  'lon' => '16.01056',
                  'province_id' => 16,
              ),
          865 =>
              array (
                  'city_name' => 'Goleniów',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.56382',
                  'lon' => '14.82843',
                  'province_id' => 16,
              ),
          866 =>
              array (
                  'city_name' => 'Maszewo',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.49633',
                  'lon' => '15.06139',
                  'province_id' => 16,
              ),
          867 =>
              array (
                  'city_name' => 'Nowogard',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.6741795',
                  'lon' => '15.1163739',
                  'province_id' => 16,
              ),
          868 =>
              array (
                  'city_name' => 'Stepnica',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.651875',
                  'lon' => '14.6247336',
                  'province_id' => 16,
              ),
          869 =>
              array (
                  'city_name' => 'Gryfice',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.91666000000001',
                  'lon' => '15.1998891',
                  'province_id' => 16,
              ),
          870 =>
              array (
                  'city_name' => 'Płoty',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.80152',
                  'lon' => '15.26727',
                  'province_id' => 16,
              ),
          871 =>
              array (
                  'city_name' => 'Trzebiatów',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.0611912',
                  'lon' => '15.2647391',
                  'province_id' => 16,
              ),
          872 =>
              array (
                  'city_name' => 'Cedynia',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.87925',
                  'lon' => '14.20222',
                  'province_id' => 16,
              ),
          873 =>
              array (
                  'city_name' => 'Chojna',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.96400999999999',
                  'lon' => '14.42781',
                  'province_id' => 16,
              ),
          874 =>
              array (
                  'city_name' => 'Gryfino',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.25238',
                  'lon' => '14.48823',
                  'province_id' => 16,
              ),
          875 =>
              array (
                  'city_name' => 'Mieszkowice',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.78747',
                  'lon' => '14.49337',
                  'province_id' => 16,
              ),
          876 =>
              array (
                  'city_name' => 'Moryń',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.85767999999999',
                  'lon' => '14.39293',
                  'province_id' => 16,
              ),
          877 =>
              array (
                  'city_name' => 'Trzcińsko-Zdrój',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.96446',
                  'lon' => '14.60461',
                  'province_id' => 16,
              ),
          878 =>
              array (
                  'city_name' => 'Dziwnów',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.02775',
                  'lon' => '14.76448',
                  'province_id' => 16,
              ),
          879 =>
              array (
                  'city_name' => 'Golczewo',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.82418999999999',
                  'lon' => '14.9782699',
                  'province_id' => 16,
              ),
          880 =>
              array (
                  'city_name' => 'Kamień Pomorski',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.9672519',
                  'lon' => '14.7714251',
                  'province_id' => 16,
              ),
          881 =>
              array (
                  'city_name' => 'Międzyzdroje',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.9283144',
                  'lon' => '14.4504845',
                  'province_id' => 16,
              ),
          882 =>
              array (
                  'city_name' => 'Wolin',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.8419317',
                  'lon' => '14.6143984',
                  'province_id' => 16,
              ),
          883 =>
              array (
                  'city_name' => 'Kołobrzeg',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.17591729999999',
                  'lon' => '15.5832667',
                  'province_id' => 16,
              ),
          884 =>
              array (
                  'city_name' => 'Gościno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.0522758',
                  'lon' => '15.6516999',
                  'province_id' => 16,
              ),
          885 =>
              array (
                  'city_name' => 'Bobolice',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.95494',
                  'lon' => '16.5876701',
                  'province_id' => 16,
              ),
          886 =>
              array (
                  'city_name' => 'Polanów',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.1192885',
                  'lon' => '16.6875425',
                  'province_id' => 16,
              ),
          887 =>
              array (
                  'city_name' => 'Sianów',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.22651',
                  'lon' => '16.29158',
                  'province_id' => 16,
              ),
          888 =>
              array (
                  'city_name' => 'Barlinek',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.99444',
                  'lon' => '15.21918',
                  'province_id' => 16,
              ),
          889 =>
              array (
                  'city_name' => 'Dębno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.739',
                  'lon' => '14.6979901',
                  'province_id' => 16,
              ),
          890 =>
              array (
                  'city_name' => 'Myślibórz',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '52.9237186',
                  'lon' => '14.8678501',
                  'province_id' => 16,
              ),
          891 =>
              array (
                  'city_name' => 'Nowe Warpno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.7222428',
                  'lon' => '14.2891772',
                  'province_id' => 16,
              ),
          892 =>
              array (
                  'city_name' => 'Police',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.5520416',
                  'lon' => '14.5720607',
                  'province_id' => 16,
              ),
          893 =>
              array (
                  'city_name' => 'Lipiany',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.00338',
                  'lon' => '14.96923',
                  'province_id' => 16,
              ),
          894 =>
              array (
                  'city_name' => 'Pyrzyce',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.14608519999999',
                  'lon' => '14.8924044',
                  'province_id' => 16,
              ),
          895 =>
              array (
                  'city_name' => 'Darłowo',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.4210664',
                  'lon' => '16.410611',
                  'province_id' => 16,
              ),
          896 =>
              array (
                  'city_name' => 'Sławno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.36262',
                  'lon' => '16.67836',
                  'province_id' => 16,
              ),
          897 =>
              array (
                  'city_name' => 'Stargard',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.3364746',
                  'lon' => '15.0503771',
                  'province_id' => 16,
              ),
          898 =>
              array (
                  'city_name' => 'Chociwel',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.46687',
                  'lon' => '15.33337',
                  'province_id' => 16,
              ),
          899 =>
              array (
                  'city_name' => 'Dobrzany',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.35897',
                  'lon' => '15.42893',
                  'province_id' => 16,
              ),
          900 =>
              array (
                  'city_name' => 'Ińsko',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.43606',
                  'lon' => '15.55039',
                  'province_id' => 16,
              ),
          901 =>
              array (
                  'city_name' => 'Suchań',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.27993',
                  'lon' => '15.32544',
                  'province_id' => 16,
              ),
          902 =>
              array (
                  'city_name' => 'Szczecinek',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.7100713',
                  'lon' => '16.6993602',
                  'province_id' => 16,
              ),
          903 =>
              array (
                  'city_name' => 'Barwice',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.74407790000001',
                  'lon' => '16.3552542',
                  'province_id' => 16,
              ),
          904 =>
              array (
                  'city_name' => 'Biały Bór',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.8964099',
                  'lon' => '16.8352157',
                  'province_id' => 16,
              ),
          905 =>
              array (
                  'city_name' => 'Borne Sulinowo',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.57639',
                  'lon' => '16.53406',
                  'province_id' => 16,
              ),
          906 =>
              array (
                  'city_name' => 'Świdwin',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.77564',
                  'lon' => '15.7742',
                  'province_id' => 16,
              ),
          907 =>
              array (
                  'city_name' => 'Połczyn-Zdrój',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.763105',
                  'lon' => '16.100159',
                  'province_id' => 16,
              ),
          908 =>
              array (
                  'city_name' => 'Wałcz',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.2734739',
                  'lon' => '16.4752847',
                  'province_id' => 16,
              ),
          909 =>
              array (
                  'city_name' => 'Człopa',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.0885',
                  'lon' => '16.12097',
                  'province_id' => 16,
              ),
          910 =>
              array (
                  'city_name' => 'Mirosławiec',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.34254',
                  'lon' => '16.089279',
                  'province_id' => 16,
              ),
          911 =>
              array (
                  'city_name' => 'Tuczno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.19462000000001',
                  'lon' => '16.155899',
                  'province_id' => 16,
              ),
          912 =>
              array (
                  'city_name' => 'Dobra',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.58620999999999',
                  'lon' => '15.30976',
                  'province_id' => 16,
              ),
          913 =>
              array (
                  'city_name' => 'Łobez',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.63918',
                  'lon' => '15.62129',
                  'province_id' => 16,
              ),
          914 =>
              array (
                  'city_name' => 'Resko',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.77303999999999',
                  'lon' => '15.40611',
                  'province_id' => 16,
              ),
          915 =>
              array (
                  'city_name' => 'Węgorzyno',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.54091',
                  'lon' => '15.55963',
                  'province_id' => 16,
              ),
          916 =>
              array (
                  'city_name' => 'Koszalin',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '54.1943219',
                  'lon' => '16.1714908',
                  'province_id' => 16,
              ),
          917 =>
              array (
                  'city_name' => 'Szczecin',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.4285438',
                  'lon' => '14.5528116',
                  'province_id' => 16,
              ),
          918 =>
              array (
                  'city_name' => 'Świnoujście',
                  'province_name' => 'ZACHODNIOPOMORSKIE',
                  'lat' => '53.9100327',
                  'lon' => '14.2475775',
                  'province_id' => 16,
              ),
      );

       $faker = Faker\Factory::create();

      foreach ($cities as $city){
          DB::table('cities')->insert([
              'name' => $city['city_name'],
              'province_id' => $city['province_id'],
              'zip_code' => $faker->postcode,
              'lon' => $city['lon'],
              'lat' => $city['lat'],
              'created_at' => $faker->dateTime,
              'created_user_id' => 1,
              'edited_at' => null,
              'edited_user_id' => null,
              'deleted_at' => null,
              'deleted_user_id' => null,
          ]);
      }
//        $table->float('lon');
//        $table->float('lat');
    }
}
