# Laravel Social Interactions Package

This Laravel package provides functionalities for liking, favoriting, and following/unfollowing users and content. It is designed to be used in social media-like applications where users can engage with posts, comments, and other users.


## Features
- **Likeable**: Allows users to like posts, comments, or other types of content.
- **Favoritable**: Allows users to favorite other users, posts, comments, or other content.
- **Followable**: Allows users to follow or unfollow other users.


## Installation

You can install this package via Composer.

`composer require banklansteve/social-interactions`



## Service Provider (Optional)

If you're using a version of Laravel earlier than 5.5 (which doesn't support package auto-discovery), you'll need to add the service provider manually to the config/app.php file.

```php
'providers' => [
    // Other Service Providers

    YourVendorName\SocialInteractions\SocialInteractionsServiceProvider::class,
],
```

## Publish the Configuration (Optional)

If you want to customize the default configuration, you can publish the package's config file:

```php artisan vendor:publish --provider="YourVendorName\SocialInteractions\SocialInteractionsServiceProvider"
```



###  Usage Examples

This section should guide users on how to use your package. Since your package allows liking, favoriting, and following/unfollowing, add examples for each.


## Usage

### Liking Content
To use the `Likeable` functionality, add the `Likeable` trait to the model you want to make "likeable" (e.g., `Post`, `Comment`, etc.).

```php
use BanklanSteve\SocialInteractions\Traits\Likeable;

class Post extends Model
{
    use Likeable;
}
```

### To like a post
```
$post = Post::find(1);
$post->like(auth()->id());  // Authenticated user likes the post
```

### To check if a user has liked a post
```
if ($post->isLikedBy(auth()->id())) {
    echo "You liked this post!";
}
```



### To remove a like

```
$post->unlike(auth()->id());  // Authenticated user unlikes the post
```


### Favouriting a content/user
To enable users to favorite content, add the Favoritable trait to the model you want to make "favoritable" (e.g., Post, Comment, etc.).

```
use BanklanSteve\SocialInteractions\Traits\Favoritable;

class Post extends Model
{
    use Favoritable;
}
```


### Then to favourite a post/content/user;
```
$post = Post::find(1);
$post->favorite(auth()->id());  // Authenticated user favorites the post
```

### To check if a post/content is favourited by a user
```
if ($post->isFavoritedBy(auth()->id())) {
    echo "You favorited this post!";
}
```

### To remove a favourite

```
$post->unfavorite(auth()->id());  // Authenticated user unfavorites the post
```

## Following Users
### To enable users to follow and unfollow other users, add the Followable trait to the User model.

```
use BanklanSteve\SocialInteractions\Traits\Followable;

class User extends Model
{
    use Followable;
}
```


### To follow another user

```
$userToFollow = User::find(2);
auth()->user()->follow($userToFollow);
```


### To unfollow a user

```
auth()->user()->unfollow($userToUnFollow);
```


### To check if the authenticated user is following another user

```
if (auth()->user()->isFollowing($anotherUser)) {
    echo "You are following this user!";
}
```



### Changelog

**v1.0.0** - Initial release with like, favorite, and follow/unfollow functionalities.


### Contributing

If you'd like to contribute to this package, feel free to fork the repository and submit a pull request. Please make sure your contributions follow the code style guidelines, and add tests for any new features or bug fixes.


### Support

For any issues or questions, please open an issue in the GitHub repository.
Thank you.






