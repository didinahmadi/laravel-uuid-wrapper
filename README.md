# laravel-uuid-wrapper
UUID Wrapper for Laravel
# How to Use
### Define in your composer.json
```
    ...
        "repositories": [
            {
                "name": "didinahmadi/laravel-uuid-wrapper",
                "type": "git",
                "url": "https://github.com/didinahmadi/laravel-uuid-wrapper.git"
            }
        ],
    ...
```
Then call it on your require part

```
    "require": {
      ...
      "didinahmadi/laravel-uuid-wrapper": "dev-master"
      ...
    }
```
Then run 

```composer update```

### Modify your User Eloquent's Model
```
    <?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    
    use UuidWrapper\UuidWrapper;

    class User extends Authenticatable
    {
        use Notifiable;
        
        // use wrapper-uuid trait 
        use UuidWrapper;
        
        // disabling record auto-incrementing
        public $incrementing = false

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];
        
        public static function boot()
        {
            parent::boot();
            
            // bind event handler to implement UUID on each row created
            self::bootUuid();
        }
    }

```
