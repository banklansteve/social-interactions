namespace BanklanSteve\SocialInteractions\Traits;

use BanklanSteve\SocialInteractions\Models\Favorite;

trait Favoritable
{
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function favorite($userId)
    {
        $this->favorites()->firstOrCreate(['user_id' => $userId]);
    }

    public function unfavorite($userId)
    {
        $this->favorites()->where('user_id', $userId)->delete();
    }

    public function isFavoritedBy($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
}
