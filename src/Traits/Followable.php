namespace BanklanSteve\SocialInteractions\Traits;

use BanklanSteve\SocialInteractions\Models\Follow;

trait Followable
{
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function follow($userId)
    {
        $this->followings()->firstOrCreate(['following_id' => $userId]);
    }

    public function unfollow($userId)
    {
        $this->followings()->where('following_id', $userId)->delete();
    }

    public function isFollowing($userId)
    {
        return $this->followings()->where('following_id', $userId)->exists();
    }
}
