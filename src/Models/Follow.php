namespace BanklanSteve\SocialInteractions\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follower_id', 'following_id'];
}
