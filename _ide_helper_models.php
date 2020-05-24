<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Photo
 *
 * @property int $id
 * @property string $photoable_type
 * @property int $photoable_id
 * @property string $path
 * @property-read mixed $storagepath
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $photoable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo wherePhotoableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo wherePhotoableType($value)
 */
	class Photo extends \Eloquent {}
}

namespace App{
/**
 * App\Gender
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\AnimalDictionary $animal_dictionary
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereName($value)
 */
	class Gender extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalSpecies
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\AnimalDictionary $animal_dictionary
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSpecies whereName($value)
 */
	class AnimalSpecies extends \Eloquent {}
}

namespace App{
/**
 * App\Reservation
 *
 * @property int $id
 * @property string $day_in
 * @property string $day_out
 * @property int $status
 * @property int $user_id
 * @property int $city_id
 * @property-read \App\Room $room
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereDayIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereDayOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reservation whereUserId($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalBreed
 *
 * @property int $id
 * @property int $species_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalBreed whereSpeciesId($value)
 */
	class AnimalBreed extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalStatus whereName($value)
 */
	class AnimalStatus extends \Eloquent {}
}

namespace App{
/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property string $articleable_type
 * @property int $articleable_id
 * @property string $created_at
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $link
 * @property-read mixed $type
 * @property-read \App\TouristObject $object
 * @property-read \App\Shelter $shelter
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereArticleableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereArticleableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUserId($value)
 */
	class Article extends \Eloquent {}
}

namespace App{
/**
 * App\GlobalArticle
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GlobalArticle whereUserId($value)
 */
	class GlobalArticle extends \Eloquent {}
}

namespace App{
/**
 * App\Province
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Province whereName($value)
 */
	class Province extends \Eloquent {}
}

namespace App{
/**
 * App\OpenHour
 *
 * @property int $id
 * @property int $day_id
 * @property string $openhoursable_type
 * @property int $openhoursable_id
 * @property string|null $open_time
 * @property string|null $close_time
 * @property int $closed
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\DayDictionary $day
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $openhoursable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereOpenhoursableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OpenHour whereOpenhoursableType($value)
 */
	class OpenHour extends \Eloquent {}
}

namespace App{
/**
 * App\DayDictionary
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\OpenHour $openHour
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DayDictionary whereName($value)
 */
	class DayDictionary extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property string $content
 * @property string $commentable_type
 * @property int $commentable_id
 * @property int $rating
 * @property int $user_id
 * @property string $created_at
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Notification
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $user_id
 * @property int $shown
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereShown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUserId($value)
 */
	class Notification extends \Eloquent {}
}

namespace App{
/**
 * App\Address
 *
 * @property int $id
 * @property string $addressable_type
 * @property int $addressable_id
 * @property int $city_id
 * @property int $number
 * @property string $street
 * @property float $lon
 * @property float $lat
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $addressable
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereAddressableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 */
	class Address extends \Eloquent {}
}

namespace App{
/**
 * App\Animal
 *
 * @property int $id
 * @property string $title
 * @property string $name
 * @property int $age
 * @property string $description
 * @property int|null $price
 * @property string $animalable_type
 * @property int $animalable_id
 * @property int $species_id
 * @property int|null $color_id
 * @property int|null $fur_id
 * @property int|null $size_id
 * @property int|null $breed_id
 * @property int $breed_mix
 * @property int $spayed_castrated
 * @property int $deworming
 * @property int $animal_status_id
 * @property int $promoted
 * @property int $recommended
 * @property string $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\AnimalBreed|null $animalBreed
 * @property-read \App\AnimalColor|null $animalColor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AnimalDictionarySpecies[] $animalDictionary
 * @property-read int|null $animal_dictionary_count
 * @property-read \App\AnimalDictionarySpecies $animalDictionarySpecies
 * @property-read \App\Fur|null $animalFur
 * @property-read \App\AnimalSize|null $animalSize
 * @property-read \App\AnimalSpecies $animalSpecies
 * @property-read \App\AnimalStatus $animalStatus
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $animalable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \App\Shelter $shelter
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereAnimalStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereAnimalableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereAnimalableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereBreedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereBreedMix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereDeworming($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereFurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal wherePromoted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereSpayedCastrated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Animal whereTitle($value)
 */
	class Animal extends \Eloquent {}
}

namespace App{
/**
 * App\Fur
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fur whereName($value)
 */
	class Fur extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalSize
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalSize whereName($value)
 */
	class AnimalSize extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalColor
 *
 * @property int $id
 * @property string $name
 * @property string $class_name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Animal $animal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalColor whereName($value)
 */
	class AnimalColor extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalDictionarySpecies
 *
 * @property int $animal_id
 * @property int $animal_dictionary_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\AnimalDictionary $animal_dictionary
 * @property-read \App\Animal $animals
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereAnimalDictionaryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionarySpecies whereEditedUserId($value)
 */
	class AnimalDictionarySpecies extends \Eloquent {}
}

namespace App{
/**
 * App\Room
 *
 * @property-read \App\TouristObject $object
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room query()
 */
	class Room extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $edited_ad
 * @property string|null $deleted_ad
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addressable
 * @property-read int|null $addressable_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $larticles
 * @property-read int|null $larticles_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TouristObject[] $objects
 * @property-read int|null $objects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Animal[] $owner
 * @property-read int|null $owner_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Phone[] $phones
 * @property-read int|null $phones_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Shelter[] $shelters
 * @property-read int|null $shelters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Notification[] $unotifications
 * @property-read int|null $unotifications_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEditedAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Shelter
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $description
 * @property string $adoption_policy
 * @property int $promoted
 * @property int $recommended
 * @property string $created_at
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addressable
 * @property-read int|null $addressable_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Animal[] $animals
 * @property-read int|null $animals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \App\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OpenHour[] $openHoursable
 * @property-read int|null $open_hoursable_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Animal[] $owner
 * @property-read int|null $owner_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereAdoptionPolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter wherePromoted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shelter whereUserId($value)
 */
	class Shelter extends \Eloquent {}
}

namespace App{
/**
 * App\Phone
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property \Illuminate\Support\Carbon $created_at
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phone whereUserId($value)
 */
	class Phone extends \Eloquent {}
}

namespace App{
/**
 * App\SocialFacebookAccount
 *
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocialFacebookAccount whereUserId($value)
 */
	class SocialFacebookAccount extends \Eloquent {}
}

namespace App{
/**
 * App\AnimalDictionary
 *
 * @property int $id
 * @property int $gender_id
 * @property int $species_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\AnimalDictionarySpecies $animal_dictionary_species
 * @property-read \App\Gender $gender
 * @property-read \App\AnimalSpecies $species
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AnimalDictionary whereSpeciesId($value)
 */
	class AnimalDictionary extends \Eloquent {}
}

namespace App{
/**
 * App\TouristObject
 *
 * @property-read \App\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \App\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $link
 * @property-read mixed $name
 * @property-read mixed $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Room[] $rooms
 * @property-read int|null $rooms_count
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TouristObject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TouristObject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TouristObject ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TouristObject query()
 */
	class TouristObject extends \Eloquent {}
}

namespace App{
/**
 * App\City
 *
 * @property int $id
 * @property string $name
 * @property int $province_id
 * @property string $zip_code
 * @property float $lon
 * @property float $lat
 * @property string $created_at
 * @property int $created_user_id
 * @property string|null $edited_at
 * @property int|null $edited_user_id
 * @property string|null $deleted_at
 * @property int|null $deleted_user_id
 * @property-read \App\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Animal[] $animals
 * @property-read int|null $animals_count
 * @property-read \App\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Room[] $rooms
 * @property-read int|null $rooms_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereDeletedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereEditedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereEditedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereZipCode($value)
 */
	class City extends \Eloquent {}
}

