namespace BanklanSteve\SocialInteractions\Traits;

use BanklanSteve\SocialInteractions\Models\Like;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like($userId)
    {
        $this->likes()->firstOrCreate(['user_id' => $userId]);
    }

    public function unlike($userId)
    {
        $this->likes()->where('user_id', $userId)->delete();
    }

    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}
