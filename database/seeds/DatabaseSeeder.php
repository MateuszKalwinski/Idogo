<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(LikeablesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(AnimalSpeciesTableSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(AnimalsSeeder::class);
        $this->call(SheltersSeeder::class);
        $this->call(AnimalDictionaryTableSeeder::class);
        $this->call(AnimalColorsTableSeeder::class);
        $this->call(AnimalSizesTableSeeder::class);
        $this->call(AnimalBreedsTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(OpenHoursTableSeeder::class);
        $this->call(DaysDictionaryTableSeeder::class);
        $this->call(GlobalArticlesTableSeeder::class);
        $this->call(FurTableSeeder::class);
        $this->call(AnimalStatusTableSeeder::class);
        $this->call(AgeDictionaryTableSeeder::class);
        $this->call(CharacteristicDictionaryTableSeeder::class);
        $this->call(AnimalCharacteristicTableSeeder::class);
        $this->call(FavouriteablesTableSeeder::class);
        $this->call(ShelterApplicationTableSeeder::class);
        $this->call(ShelterApplicationStatusesTableSeeder::class);
        $this->call(AnimalBreedDescriptionsTableSeeder::class);
        $this->call(ViolationReportsTableSeeder::class);
        $this->call(AvailableColorsTableSeeder::class);
        $this->call(AvailableCharacteristicDictionaryTableSeeder::class);

    }
}
